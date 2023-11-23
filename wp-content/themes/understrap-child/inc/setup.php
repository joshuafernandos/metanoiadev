<?php

/**
 * Theme basic setup
 *
 * @package Understrap
 */

 use Meta\Helpers\Util;

// Exit if accessed directly.
defined('ABSPATH') || exit;

// Set the content width based on the theme's design and stylesheet.
if (!isset($content_width)) {
	$content_width = 640; /* pixels */
}

add_action('after_setup_theme', 'understrap_setup');

if (!function_exists('understrap_setup')) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */

	function understrap_setup()
	{
		/**
		 * Add options page for storing site wide details
		 */
		if (function_exists('acf_add_options_page')) {
			acf_add_options_page(array(
				'page_title' => 'Site Options',
				'menu_title' => 'Site Options',
				'menu_slug' => 'site-options',
				'capability' => 'edit_posts',
				'redirect' => false
			));
		}

		/**
		 * Custom Image Sizes
		 */
		add_image_size('square_1', 100, 100, true);
		add_image_size('square_2', 250, 250, true);
		add_image_size('rectangle_1', 400, 300, true);
	}
}


/**
 * Register Menu
 */
function register_my_menu()
{
	register_nav_menu('main_menu', ('Main Menu'));
	register_nav_menu('footer_menu_1', ('Footer Menu 1'));
	register_nav_menu('footer_menu_2', ('Footer Menu 2'));
}
add_action('init', 'register_my_menu');
