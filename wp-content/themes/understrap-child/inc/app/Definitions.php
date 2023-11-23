<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

/**
 * @package Back9 Boilerplate Theme
 *
 * @link https://www.back9.co.nz
 * @license GNU General Public License v2 or later
 * @author Back9 Creative
 */

/*
 * Theme version.
 *
 * @var string
 */
//

/*
 * Uri of theme directory.
 *
 * @var string
 */
define('META_THEME', trailingslashit(get_theme_file_path()));

/**
 * Path of theme.
 *
 * @var string
 */
define('META_ROOT', trailingslashit(get_theme_file_path()));

/**
 * Path of theme classes.
 *
 * @var string
 */
define('META_SRC', META_ROOT . 'inc' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR);


/**
 * Path of data classes.
 *
 * @var string
 */
define('META_DATA', META_SRC . 'Data' . DIRECTORY_SEPARATOR);