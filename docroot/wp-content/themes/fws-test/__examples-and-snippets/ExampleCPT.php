<?php
declare( strict_types=1 );

namespace FWS\CPT;

use FWS\SingletonHook;

/**
 * Singleton Class ExampleCPT
 *
 * @package FWS
 */
class ExampleCPT extends SingletonHook {

	/** @var self */
	protected static $instance;

	/**
	 * Set CPT config here.
	 */
	private $postConfig = [
		'singularName' => 'Custom Post',
		'pluralName'   => 'Custom Posts',
		'dashIcon' => 'dashicons-admin-post'
	];

	/**
	 * Set CPTax config here.
	 */
	private $taxConfig = [
		[
			'singularName'  => 'Custom Post Category',
			'pluralName'    => 'Custom Post Categories',
		],
		[
			'singularName'  => 'Custom Post Attribute',
			'pluralName'    => 'Custom Post Attributes',
		]
	];

	/**
	 * Registers a custom post type.
	 */
	public function cptInit(): void
	{
		// get names from config
		$singular = $this->postConfig['singularName'];
		$plural   = $this->postConfig['pluralName'];
		$dashIcon = $this->postConfig['dashIcon'];

		// set slugs
		$postSlug = $this->createSlug( $singular );
		$postNiceSlug = $this->createSlug( $singular, false, true );

		// set labels and args
		$labels = $this->createPostLabels($singular, $plural);
		$args = $args = $this->createPostArgs($labels, $postNiceSlug, $dashIcon);

		// register custom post type
		register_post_type( $postSlug, $args );
	}

	/**
	 * Registers a custom taxonomy.
	 */
	public function cptInitTax(): void
	{
		// check if there are any taxonomies in config
		if ($this->taxConfig) {
			foreach ($this->taxConfig as $tax) {
				// get names from config
				$singular = $tax['singularName'];
				$plural   = $tax['pluralName'];

				// set slugs
				$taxSlug  = $this->createSlug( $singular, true );
				$taxNiceSlug = $this->createSlug( $singular, true, true );
				$postSlug = $this->createSlug( $this->postConfig['singularName'] );

				// set labels and args
				$labels = $this->createTaxLabels($singular, $plural);
				$args = $this->createTaxArgs($labels, $taxNiceSlug);

				// register custom taxonomy
				register_taxonomy( $taxSlug, $postSlug, $args );
			}
		}
	}

	/**
	 * Create post arguments
	 *
	 * @param array  $labels
	 * @param string $postNiceSlug
	 * @param string $dashIcon
	 *
	 * @return array
	 */
	private function createPostArgs( array $labels, string $postNiceSlug, string $dashIcon): array
	{
		return [
			'labels'            => $labels,
			'hierarchical'      => false,
			'public'            => true,
			'show_in_menu'      => true,
			'show_in_nav_menus' => true,
			'has_archive'       => true,
			'show_in_rest'      => true,
			'rewrite'           => ['slug' => $postNiceSlug],
			'menu_icon'         => $dashIcon,
			'supports'          => ['title', 'thumbnail', 'editor']
		];
	}

	/**
	 * Create post arguments
	 *
	 * @param array  $labels
	 * @param string $taxNiceSlug
	 *
	 * @return array
	 */
	private function createTaxArgs( array $labels, string $taxNiceSlug): array
	{
		return [
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rewrite'           => ['slug' => $taxNiceSlug],
		];
	}

	/**
	 * Create post labels
	 *
	 * @param string  $singular
	 * @param string $plural
	 *
	 * @return array
	 */
	private function createPostLabels( string $singular, string $plural): array
	{
		return [
			'name'               => _x( $plural, 'cpt_plural_name', 'fws_test' ),
			'singular_name'      => _x( $singular, 'cpt_singular_name', 'fws_test' ),
			'all_items'          => __( 'All ' . $plural, 'fws_test' ),
			'add_new'            => __( 'Add New', 'fws_test' ),
			'add_new_item'       => __( 'Add New ' . $singular, 'fws_test' ),
			'edit'               => __( 'Edit', 'fws_test' ),
			'edit_item'          => __( 'Edit ' . $singular, 'fws_test' ),
			'new_item'           => __( 'New ' . $singular, 'fws_test' ),
			'view'               => __( 'View ' . $singular, 'fws_test' ),
			'view_item'          => __( 'View ' . $singular, 'fws_test' ),
			'search_term'        => __( 'Search ' . $plural, 'fws_test' ),
			'parent'             => __( 'Parent ' . $singular, 'fws_test' ),
			'not_found'          => __( 'No ' . $plural . ' found', 'fws_test' ),
			'not_found_in_trash' => __( 'No ' . $plural . ' in Trash', 'fws_test' ),
		];
	}

	/**
	 * Create taxonomy labels
	 *
	 * @param string  $singular
	 * @param string $plural
	 *
	 * @return array
	 */
	private function createTaxLabels( string $singular, string $plural): array
	{
		return [
			'name'              => _x( $plural, 'ctax_plural_name', 'fws_test' ),
			'singular_name'     => _x( $singular, 'ctax_singular_name', 'fws_test' ),
			'search_items'      => __( 'Search ' . $plural, 'fws_test' ),
			'all_items'         => __( 'All ' . $plural, 'fws_test' ),
			'parent_item'       => __( 'Parent ' . $singular, 'fws_test' ),
			'parent_item_colon' => __( 'Parent:' . $singular, 'fws_test' ),
			'edit_item'         => __( 'Edit ' . $singular, 'fws_test' ),
			'update_item'       => __( 'Update ' . $singular, 'fws_test' ),
			'add_new_item'      => __( 'Add New ' . $singular, 'fws_test' ),
			'new_item_name'     => __( 'New ' . $singular, 'fws_test' ),
			'menu_name'         => __( $plural, 'fws_test' ),
		];
	}

	/**
	 * Create a slug
	 *
	 * @param string $name
	 * @param boolean $isTax
	 * @param boolean $niceName
	 *
	 * @return string
	 */
	private function createSlug( string $name, bool $isTax = false, bool $niceName = false): string
	{
		$replaceWidth = $niceName ? '-' : '_';
		$prefix = $isTax ? 'ctax_' : 'cpt_';
		$prefix = $niceName ? '' : $prefix;
		$slug = str_replace( ' ', $replaceWidth, strtolower( $name ) );

		return $prefix . $slug;
	}

	/**
	 * Drop your hooks here.
	 */
	protected function hooks() {
		// Actions
		add_action( 'init', [ $this, 'cptInit' ] );
		add_action( 'init', [ $this, 'cptInitTax' ] );
	}
}
