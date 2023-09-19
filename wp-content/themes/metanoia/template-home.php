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
wp_head();
?>

<?php
while (have_posts()) :
	the_post();
?>

	<h1>TEST</h1>

<?php
endwhile;
wp_footer();
?>