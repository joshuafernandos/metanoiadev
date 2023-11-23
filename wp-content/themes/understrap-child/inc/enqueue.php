<?php

/**
 * Understrap enqueue scripts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!function_exists('understrap_scripts')) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function understrap_scripts()
	{
		$version = '1.0';

		wp_enqueue_style('owl.min.css', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css', array(), $version);
		wp_enqueue_style('owl.theme.default.css', get_stylesheet_directory_uri() . '/css/owl.theme.default.css', array(), $version);

		wp_enqueue_script('owl.js', get_stylesheet_directory_uri() . '/js/owl.carousel.js', array('jquery'), $version, true);

		wp_enqueue_script('navigation.js', get_stylesheet_directory_uri() . '/js/navigation.js', array('jquery'), $version, true);
		wp_enqueue_script('carousel.js', get_stylesheet_directory_uri() . '/js/carousel.js', array('jquery'), $version, true);
	}
} // End of if function_exists( 'understrap_scripts' ).

add_action('wp_enqueue_scripts', 'understrap_scripts');
