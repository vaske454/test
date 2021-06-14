<?php
/**
 * Load Composer and FWS Engine
 * Please run `composer install` in the theme root folder.
 *
 * DO NOT write any scripts here, all features should be written inside FWS directory.
 *
 * @package fws_test
 */

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme Options',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer',
		'menu_title'	=> 'Footer',
		'parent_slug' => 'theme-options',
	));

	acf_add_options_sub_page([
		'page_title' => 'Post Settings',
		'menu_title' => 'Post Settings',
		'menu_slug' => 'post-settings',
		'capability' => 'edit_posts',
		'parent_slug' => 'edit.php',
		'position' => false,
		'icon_url' => false
	]);

}

if ( file_exists( get_template_directory() . '/vendor/autoload.php' ) ) {
	require_once get_template_directory() . '/vendor/autoload.php';

	/**
	 * @return FWS
	 */
	function fws(): FWS
	{
		return FWS::init();
	}

	fws();
} else {
	wp_die( 'Composer is not installed. Please run `composer install` in the theme root folder.' );
}

// Our custom post type function
function team_post_type() {

	$labels = array(
		'name'               => __( 'Teams' ),
		'singular_name'      => __( 'Team' ),
		'add_new'            => __( 'Add New Team' ),
		'add_new_item'       => __( 'Add New Team' ),
		'edit_item'          => __( 'Edit Team' ),
		'new_item'           => __( 'Add New Team' ),
		'view_item'          => __( 'View Team' ),
		'search_items'       => __( 'Search Team' ),
		'not_found'          => __( 'No team found' ),
		'not_found_in_trash' => __( 'No teams found in trash' )
	);

	$supports = array(
		'title',
		'editor',
		'thumbnail',
	);

	$args = array(
		'labels'               => $labels,
		'supports'             => $supports,
		'public'               => true,
		'capability_type'      => 'post',
		'rewrite'              => array( 'slug' => 'teams' ),
		'has_archive'          => true,
		'menu_position'        => 30,
	);

	register_post_type( 'teams', $args );
}
// Hooking up our function to theme setup
add_action( 'init', 'team_post_type' );
