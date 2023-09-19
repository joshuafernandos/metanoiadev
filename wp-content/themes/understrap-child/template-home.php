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

	<h1>TEST</h1>

<?php
endwhile;
get_footer();
?>