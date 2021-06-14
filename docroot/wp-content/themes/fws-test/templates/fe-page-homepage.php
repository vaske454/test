<?php
/**
 * Template Name: FE Dev - Homepage
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package fws_test
 */

// get header
get_header();

// open main content wrappers
do_action( 'fws_test_before_main_content' );

// get content blocks
get_template_part( 'template-views/blocks/banner/_fe-banner' );
get_template_part( 'template-views/blocks/basic-block/_fe-basic-block' );
get_template_part( 'template-views/blocks/slider/_fe-slider' );
get_template_part( 'template-views/blocks/vue-block/vue-block' );

// close main content wrappers
do_action( 'fws_test_after_main_content' );

// get footer
get_footer();
