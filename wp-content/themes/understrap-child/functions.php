<?php

/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

/**
 * Loads theme definitions.
 */
require_once trailingslashit(get_theme_file_path()) . 'inc/app/Definitions.php';


spl_autoload_register(function ($class) {
	/*
     *  Project-specific namespace prefix
     */
	$prefix = 'Meta\\';

	/*
     *  Base directory for the namespace prefix
     */
	$base_dir = __DIR__ . '/inc/app/';

	/*
     *  Does the class use the namespace prefix?
     */
	$len = strlen($prefix);
	if (strncmp($prefix, $class, $len) !== 0) {
		// no, move to the next registered autoloader
		return;
	}

	/*
     *  Get the relative class name
     */
	$relative_class = substr($class, $len);

	/*
     *  Replace the namespace prefix with the base directory, replace namespace
     *  separators with directory separators in the relative class name, append
     *  with .php
     */
	$file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

	/*
     *  if the file exists, require it
     */
	if (file_exists($file)) {
		require $file;
	}
});

/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts()
{
	wp_dequeue_style('understrap-styles');
	wp_deregister_style('understrap-styles');

	wp_dequeue_script('understrap-scripts');
	wp_deregister_script('understrap-scripts');
}
add_action('wp_enqueue_scripts', 'understrap_remove_scripts', 20);



/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles()
{

	// Get the theme data.
	$the_theme     = wp_get_theme();
	$theme_version = $the_theme->get('Version');

	$suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/child-theme{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";

	$css_version = $theme_version . '.' . filemtime(get_stylesheet_directory() . $theme_styles);

	wp_enqueue_style('child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $css_version);
	wp_enqueue_script('jquery');

	$js_version = $theme_version . '.' . filemtime(get_stylesheet_directory() . $theme_scripts);

	wp_enqueue_script('child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $js_version, true);
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');



/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain()
{
	load_child_theme_textdomain('understrap-child', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'add_child_theme_textdomain');



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @return string
 */
function understrap_default_bootstrap_version()
{
	return 'bootstrap5';
}
add_filter('theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20);



/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js()
{
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array('customize-preview'),
		'20130508',
		true
	);
}
add_action('customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js');

/**
 * CUSTOM SEARCH FORM
 */
function custom_search_form($form)
{
	$form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url('/') . '" >
	  <div class="custom-form"><label class="screen-reader-text" for="s">' . __('Search:') . '</label>
	  <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Try search here.."/>
	  <input type="submit" id="searchsubmit" value="' . esc_attr__('Search') . '" />
	</div>
	</form>';

	return $form;
}
add_filter('get_search_form', 'custom_search_form', 40);
