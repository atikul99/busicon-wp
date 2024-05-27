<?php
/**
 * Function that helps import demos data by hooking them into OCDI Plugin
 *
 * @package Busicon
 */

/**
 * Define Theme Demos
 */
function ocdi_import_files() {
	return [
		[
			'import_file_name'           => 'Demo 1',
			'categories'                 => [ 'Category 1' ],
			'import_file_url'            => 'https://demo.urnoit.net/busicon/busicon.WordPress.xml',
			'import_widget_file_url'     => 'https://demo.urnoit.net/busicon/busicon-widgets.wie',
			'import_customizer_file_url' => 'https://demo.urnoit.net/busicon/busicon-export.dat',
			'import_redux'               => [
				[
					'file_url'    => 'https://demo.urnoit.net/busicon/busicon_opt.json',
					'option_name' => 'busicon_opt',
				],
			],
			'import_preview_image_url'   => 'https://demo.urnoit.net/busicon/demo-thumb.jpg',
			'preview_url'                => 'https://wp.urnoit.net/busicon/',
		],
	];
}
add_filter( 'ocdi/import_files', 'ocdi_import_files' );

/**
 * After Import Custom Code Execution
 */

function ocdi_after_import_setup() {
	
	// Set Menu
	
	$main_menu = get_term_by( 'name', esc_html__('Menu 1', 'busicon'), 'nav_menu' );

	set_theme_mod(
		'nav_menu_locations',
		[
			'menu-1' => $main_menu->term_id,
		]
	);

	// Get the front page.

	$front_page = get_posts(
		[
			'post_type'              => 'page',
			'title'                  => 'Home 1',
			'post_status'            => 'all',
			'numberposts'            => 1,
			'update_post_term_cache' => false,
			'update_post_meta_cache' => false,
		]
	);

	if ( ! empty( $front_page ) ) {
		update_option( 'page_on_front', $front_page[0]->ID );
	}

	// Get the blog page.
	
	$blog_page = get_posts(
		[
			'post_type'              => 'page',
			'title'                  => 'Classic Blog',
			'post_status'            => 'all',
			'numberposts'            => 1,
			'update_post_term_cache' => false,
			'update_post_meta_cache' => false,
		]
	);

	if ( ! empty( $blog_page ) ) {
		update_option( 'page_for_posts', $blog_page[0]->ID );
	}

	if ( ! empty( $blog_page ) || ! empty( $front_page ) ) {
		update_option( 'show_on_front', 'page' );
	}

	// Inactive inline font icons

	update_option('elementor_experiment-e_font_icon_svg', 'inactive');

	// Update the permalink structure option

	$new_permalink_structure = '/%postname%/';

	update_option( 'permalink_structure', $new_permalink_structure );

}
add_action( 'ocdi/after_import', 'ocdi_after_import_setup' );