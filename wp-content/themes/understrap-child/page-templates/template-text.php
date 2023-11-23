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

        </div>
    </div>


<?php
endwhile;
get_footer();
?>