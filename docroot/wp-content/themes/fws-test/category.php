<?php
/**
 * The template for displaying Blog category pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fws_test
 */

// get header
get_header();

// open main content wrappers
do_action( 'fws_test_before_main_content' );

// listing blog posts
$blog = [
	'title' => get_the_archive_title(),
	'subtitle' => get_the_archive_description()
];
fws()->render()->templateView( $blog, 'blog-listing', 'listings' );

do_action( 'fws_test_after_main_content' );

// get footer
get_footer();
