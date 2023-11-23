<?php

/**
 * Template Name: Home Template
 *
 * Template for displaying a home page.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
?>

<?php
while (have_posts()) :
	the_post();
?>


	<div class="home__banner">
		<div class="container custom-pblock-1">
			<?php
			/**
			 * GET BIG BANNER
			 */
			$big_banner = get_field('big_banner');
			if ($big_banner) : ?>
				<div class="big-banner-carousel owl-carousel owl-theme big-banner mb-4 mb-md-5">
					<?php
					foreach ($big_banner as $i) :
						$image = $i['image'];
						$link = !empty($i['link']) ? $i['link'] : '#!';
					?>
						<?php if ($image) : ?>
							<a href="<?php echo $link ?>" class="big-banner-item">
								<div class="background" style="background: url('<?php echo $image['url'] ?>'); background-repeat: no-repeat; background-position: center center; background-size: cover;">
								</div>
							</a>
						<?php endif; ?>
					<?php endforeach ?>
				</div>
			<?php endif; ?>
			<?php
			/**
			 * GET SMALL BANNER
			 */
			$small_banner = get_field('small_banner');
			if ($small_banner) :
			?>
				<div class="small-banner">
					<div class="row">
						<?php
						foreach ($small_banner as $i) :
							$image = $i['image'];
							$link = $i['link'];
						?>
							<div class="col-6 col-md-3 mb-3 mb-md-0">
								<?php if ($image && $link) : ?>
									<div class="small-banner-item">
										<a href="<?php echo $link['url'] ?>">
											<div class="background" style="background: url('<?php echo $image['url'] ?>'); background-repeat: no-repeat; background-position: center center; background-size: cover;">
												<div class="overlay">
													<h3 class="listing-heading">
														<?php echo $link['title'] ?>
													</h3>
												</div>
											</div>
										</a>
									</div>
								<?php endif; ?>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>


	<?php
	/**
	 * GET FEATURED PRODUCTS
	 */
	$tax_query[] = array(
		'taxonomy' => 'product_visibility',
		'field'    => 'name',
		'terms'    => 'featured',
		'operator' => 'IN', // or 'NOT IN' to exclude feature products
	);
	$args = array(
		'post_type'           => 'product',
		'post_status'         => 'publish',
		'ignore_sticky_posts' => 1,
		'posts_per_page'      => -1,
		'tax_query'           => $tax_query // <===
	);
	$query = new WP_Query($args);
	if ($query->have_posts()) :
	?>
		<div class="home__featured-products">
			<div class="container custom-pbottom-1">
				<div class="heading d-flex mb-5">
					<h1 class="main-heading">Top Picks For You</h1>
				</div>
				<?php echo \Meta\Helpers\Util::getPartial('/woocommerce/products-panel.php', array(
					'products' => $query
				)) ?>
				<div class="featured-button d-flex justify-content-center mt-3">
					<a href="<?php echo home_url() ?>/shop" class="main-button">
						See All
					</a>
				</div>
			</div>
		</div>
	<?php
	endif;
	?>


	<?php
	$info = get_field('info');
	$info_video = get_field('info_video');
	$info_video_url = $info_video['url'];
	?>
	<div class="home__info">
		<div class="container custom-pbottom-1">
			<div class="row">
				<?php if ($info) : ?>
					<div class="col-md-8">
						<div class="row info-text-list">
							<?php foreach ($info as $key => $value) : ?>
								<?php
								$background = $value['background_image'];
								$link = $value['link'];
								?>
								<?php if ($background && $link && $key < 4) : ?>
									<div class="col-6 mb-4 <?php echo $key == 0 || $key == 1 ? 'mb-md-3' : 'mb-md-0' ?> <?php echo $key == 0 || $key == 3 ? 'col-md-4' : 'col-md-8' ?>">
										<div class="info-text">
											<a href="<?php echo $link['url'] ?>" class="text-decoration-none" style="background-image: linear-gradient(to bottom, rgba(245, 246, 252, 0.52), rgba(0, 0, 0, 0.73)), url('<?php echo $background['url'] ?>'); background-repeat: no-repeat; background-size: cover; background-position: center;">
												<h3 class="listing-heading"><?php echo $link['title'] ?></h3>
											</a>
										</div>
									</div>
								<?php endif; ?>
							<?php endforeach ?>
						</div>
					</div>
				<?php endif; ?>
				<?php if ($info_video_thumbnail = !empty($info_video['thumbnail']) ? $info_video['thumbnail'] : '') : ?>
					<div class="col-md-4">
						<a href="<?php echo $info_video_url ?>">
							<div class="info-video d-flex justify-content-center align-items-center" style="background: url('<?php echo $info_video_thumbnail['url'] ?>'); background-repeat: no-repeat; background-size: cover; background-position: center;">
								<svg fill="#ffffff" height="100px" width="100px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 60 60" xml:space="preserve" stroke="#ffffff">
									<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
									<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
									<g id="SVGRepo_iconCarrier">
										<g>
											<path d="M45.563,29.174l-22-15c-0.307-0.208-0.703-0.231-1.031-0.058C22.205,14.289,22,14.629,22,15v30 c0,0.371,0.205,0.711,0.533,0.884C22.679,45.962,22.84,46,23,46c0.197,0,0.394-0.059,0.563-0.174l22-15 C45.836,30.64,46,30.331,46,30S45.836,29.36,45.563,29.174z M24,43.107V16.893L43.225,30L24,43.107z"></path>
											<path d="M30,0C13.458,0,0,13.458,0,30s13.458,30,30,30s30-13.458,30-30S46.542,0,30,0z M30,58C14.561,58,2,45.439,2,30 S14.561,2,30,2s28,12.561,28,28S45.439,58,30,58z"></path>
										</g>
									</g>
								</svg>
							</div>
						</a>
					</div>
				<?php endif ?>
			</div>
		</div>
	</div>


<?php
endwhile;
get_footer();
?>