<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

if (isset($_GET['s'])) {
	header('Location:' . site_url() . '?s=' . $_GET['s']);
	exit();
}

defined('ABSPATH') || exit;

$pageId = wc_get_page_id('shop');
$category = get_queried_object();

// If Parent category
// Get subcategories
$filterSubCategories = [];
$parentCategory = false;
if (isset($category->parent) && $category->parent) {
	$parentCategory = get_term_by('id', $category->parent, 'product_cat');

	$filterSubCategories = get_terms([
		'taxonomy' => 'product_cat',
		'hide_empty' => false,
		'parent' => $parentCategory->term_id
	]);
}

$subCategories = get_terms([
	'taxonomy' => 'product_cat',
	'hide_empty' => false,
	'parent' => isset($category->term_id) ? $category->term_id : 99999
]);

$categoryId = 0;
if (isset($category->term_id)) {
	$categoryId = $category->term_id;
}

// Get Categories
$args = [
	'taxonomy' => 'product_cat',
	'hide_empty' => false,
	'parent' => 0
];
$categories = get_terms($args);

$taxonomy = [];

if (!is_shop()) {
	$taxonomy = [
		'relation' => 'AND',
		[
			'taxonomy' => 'product_cat',
			'field' => 'term_id',
			'terms' => [$categoryId],
			'operator' => 'IN'
		]
	];
}

// Get Products
$args = [
	'post_status' => 'publish',
	'posts_per_page' => -1,
	'post_type' => 'product',
	'order' => 'DESC',
	'orderBy' => 'date',
	'tax_query' => $taxonomy
];

$products = new WP_query($args);

get_header('shop');
?>


<div class="shopPage">
	<div class="container custom-pblock-1">

		<ul id="breadcrumbs" class="mb-4">
			<li><a href="<?php echo home_url() . '/shop' ?>">Shop All</a></li>
			<?php if ($parentCategory) : ?>
				<li>
					<a href="<?php echo get_term_link($parentCategory->term_id, 'product_cat') ?>"><?php echo $parentCategory->name ?></a>
				</li>
			<?php endif; ?>
			<?php if (!is_shop()) : ?>
				<li>
					<a href="<?php echo get_term_link($category->term_id, 'product_cat') ?>"><?php echo $category->name ?></a>
				</li>
			<?php endif; ?>
		</ul>

		<div class="heading mb-5">
			<?php if (is_shop()) : ?>
				<h1 class="second-heading">
					Shop All
				</h1>
			<?php elseif ($parentCategory) : ?>
				<h1 class="second-heading">
					<?php echo $parentCategory->name ?>
				</h1>
				<h2 class="third-heading"><?php echo $category->name ?></h2>
			<?php elseif (!is_shop()) : ?>
				<h1 class="second-heading">
					<?php echo $category->name ?>
				</h1>
			<?php endif; ?>
		</div>

		<?php if ($products->have_posts()) : ?>
			<?php echo \Meta\Helpers\Util::getPartial('/woocommerce/products-panel.php', array(
				'products' => $products
			)) ?>
		<?php else : ?>
			<div class="d-flex justify-content-center">No product found</div>
		<?php endif ?>
	</div>
</div>


<?php
get_footer('shop');
