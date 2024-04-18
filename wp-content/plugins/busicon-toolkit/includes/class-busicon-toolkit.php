<?php

/**
 * The file that defines the core plugin class
 *
 * @package           BusiconToolkit
 * @author            Urno IT
 * @copyright         2024 Urno IT
 * @license           GPL-2.0-or-later
 *
 */

class Busicon_Toolkit {

	public function __construct() {

		$this->load_dependencies();

		add_action( 'init', [ $this, 'busicon_custom_post_type' ] );
	}

	private function load_dependencies() {

		/**
		 * These files are responsible for sidebar widgets
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/sidebar-widgets/post-categories.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/sidebar-widgets/recent-post.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/sidebar-widgets/tag-cloud.php';

		/**
		 * The class responsible for loading cmb2 plugin
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/cmb2/init.php';

	}

	/**
	 * Register custom post type
	 *
	 * @since    1.0.0
	 */

	public function busicon_custom_post_type(){
		
		$labels = array(
			'name'               => _x( 'Portfolios', 'post type general name', 'busicon-toolkit' ),
			'singular_name'      => _x( 'Portfolio', 'post type singular name', 'busicon-toolkit' ),
			'menu_name'          => _x( 'Portfolios', 'admin menu', 'busicon-toolkit' ),
			'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'busicon-toolkit' ),
			'add_new'            => _x( 'Add New', 'Portfolio', 'busicon-toolkit' ),
			'add_new_item'       => __( 'Add New Portfolio', 'busicon-toolkit' ),
			'new_item'           => __( 'New Portfolio', 'busicon-toolkit' ),
			'edit_item'          => __( 'Edit Portfolio', 'busicon-toolkit' ),
			'view_item'          => __( 'View Portfolio', 'busicon-toolkit' ),
			'all_items'          => __( 'All Portfolios', 'busicon-toolkit' ),
			'search_items'       => __( 'Search Portfolio', 'busicon-toolkit' ),
			'parent_item_colon'  => __( 'Parent Portfolio:', 'busicon-toolkit' ),
			'not_found'          => __( 'No Portfolio found.', 'busicon-toolkit' ),
			'not_found_in_trash' => __( 'No Portfolio found in Trash.', 'busicon-toolkit' )
		);
		
		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'menu_icon'          =>'dashicons-portfolio',		
			'exclude_from_search'=> true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array('title', 'thumbnail'),
			'taxonomies'          => array( 'post_tag' ),
		);
		
		register_post_type( 'portfolio' , $args );

		// Texonomy

		$labels = array(
			'name'                       => _x( 'Categories', 'Taxonomy General Name', 'busicon-toolkit' ),
			'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'busicon-toolkit' ),
			'menu_name'                  => __( 'Categories', 'busicon-toolkit' ),
			'all_items'                  => __( 'All Categories', 'busicon-toolkit' ),
			'parent_item'                => __( 'Parent Category', 'busicon-toolkit' ),
			'parent_item_colon'          => __( 'Parent Category:', 'busicon-toolkit' ),
			'new_item_name'              => __( 'New Category Name', 'busicon-toolkit' ),
			'add_new_item'               => __( 'Add New Category', 'busicon-toolkit' ),
			'edit_item'                  => __( 'Edit Category', 'busicon-toolkit' ),
			'update_item'                => __( 'Update Category', 'busicon-toolkit' ),
			'view_item'                  => __( 'View Category', 'busicon-toolkit' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'busicon-toolkit' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'busicon-toolkit' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'busicon-toolkit' ),
			'popular_items'              => __( 'Popular Categories', 'busicon-toolkit' ),
			'search_items'               => __( 'Search Categories', 'busicon-toolkit' ),
			'not_found'                  => __( 'Not Found', 'busicon-toolkit' ),
			'no_terms'                   => __( 'No items', 'busicon-toolkit' ),
			'items_list'                 => __( 'Categories list', 'busicon-toolkit' ),
			'items_list_navigation'      => __( 'Categories list navigation', 'busicon-toolkit' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'portfolio_cat', array( 'portfolio' ), $args );
	}

}?>