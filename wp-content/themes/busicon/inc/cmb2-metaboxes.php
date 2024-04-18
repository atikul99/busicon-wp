<?php

function busicon_register_metabox() {

	$header = new_cmb2_box( array(
		'id'            => 'busicon_header_metabox',
		'title'         => esc_html__( 'Header', 'busicon' ),
		'object_types'  => array( 'page' ),
	) );

	$header->add_field( array(
		'name'             => 'Select Header',
		'desc'             => 'Select an option',
		'id'               => 'select_header',
		'type'             => 'select',
		'show_option_none' => true,
		'default'          => '',
		'options'          => array(
			'header-one' => __( 'Header One', 'busicon' ),
			'header-two'   => __( 'Header Two', 'busicon' ),
		),
	) );
	
	$header->add_field( array(
		'name'    => 'Topbar',
		'id'      => 'show_topbar',
		'type'    => 'radio_inline',
		'options' => array(
			'1' => __( 'Show Topbar', 'busicon' ),
			'0'   => __( 'Hide Topbar', 'busicon' ),
		),
	) );

	$header->add_field( array(
		'name'    => 'Transparent Menu',
		'id'      => 'active_transparent_menu',
		'type'    => 'radio_inline',
		'options' => array(
			'1' => __( 'Active Transparent Menu', 'busicon' ),
			'0'   => __( 'Deactive Transparent Menu', 'busicon' ),
		),
	) );

	/*
	==================
	 Breadcrumb
	==================
	*/

	$breadcrumb = new_cmb2_box( array(
		'id'            => 'busicon_breadcrumb_metabox',
		'title'         => esc_html__( 'Breadcrumb', 'busicon' ),
		'object_types'  => array( 'page' ),
	) );

	$breadcrumb->add_field( array(
		'name'    => esc_html__('Breadcrumb Area', 'busicon'),
		'id'      => 'show_breadcrumbs',
		'type'    => 'radio_inline',
		'options' => array(
			'0'   => esc_html__( 'Hide breadcrumb', 'busicon' ),
			'1' => esc_html__( 'Show breadcrumb', 'busicon' ),
		),
		'default' => 1,
	) );

	/*
	==================
	 Portfolio
	==================
	*/

	$project_images = new_cmb2_box( array(
		'id'            => 'project_images',
		'title'         => esc_html__( 'Project Images', 'busicon' ),
		'object_types'  => array( 'portfolio', ), // Post type
		'priority'   => 'high',
	) );
	$project_images->add_field( array(
		'name'    => 'Image 1',
		'id'      => 'project_image1',
		'type'    => 'file',
		// Optional:
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
		'text'    => array(
			'add_upload_file_text' => 'Add File'
		),
		'query_args' => array(
			'type' => array(
				'image/gif',
				'image/jpeg',
				'image/png',
			),
		),
	) );
	$project_images->add_field( array(
		'name'    => 'Image 2',
		'id'      => 'project_image2',
		'type'    => 'file',
		// Optional:
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
		'text'    => array(
			'add_upload_file_text' => 'Add File'
		),
		'query_args' => array(
			'type' => array(
				'image/gif',
				'image/jpeg',
				'image/png',
			),
		),
	) );
	$project_images->add_field( array(
		'name'    => 'Image 3',
		'id'      => 'project_image3',
		'type'    => 'file',
		// Optional:
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
		'text'    => array(
			'add_upload_file_text' => 'Add File'
		),
		'query_args' => array(
			'type' => array(
				'image/gif',
				'image/jpeg',
				'image/png',
			),
		),
	) );

	$project_info = new_cmb2_box( array(
		'id'            => 'project_info',
		'title'         => esc_html__( 'Project Info', 'busicon' ),
		'object_types'  => array( 'portfolio', ), // Post type
		'priority'   => 'high',
	) );
	$project_info->add_field( array(
		'name'       => esc_html__( 'Client', 'busicon' ),
		'id'         => 'client_name',
		'type'       => 'text',
	) );
	$project_info->add_field( array(
		'name'       => esc_html__( 'Duration', 'busicon' ),
		'id'         => 'project_duration',
		'type'       => 'text',
	) );
	$project_info->add_field( array(
		'name' => 'Task',
		'id'   => 'project_task',
		'type' => 'text',
	) );
            
	$block_1 = new_cmb2_box( array(
		'id'            => 'block_1',
		'title'         => esc_html__( 'Block 1', 'busicon' ),
		'object_types'  => array( 'portfolio', ), // Post type
		'priority'   => 'high',
	) );
	$block_1->add_field( array(
		'name'    => 'Description',
		'id'      => 'block_1_description',
		'type'    => 'wysiwyg',
		'options' => array(),
	) );

	$block_2 = new_cmb2_box( array(
		'id'            => 'block_2',
		'title'         => esc_html__( 'Block 2', 'busicon' ),
		'object_types'  => array( 'portfolio', ), // Post type
		'priority'   => 'high',
	) );
	$block_2->add_field( array(
		'name'    => 'Description',
		'id'      => 'block_2_description',
		'type'    => 'wysiwyg',
		'options' => array(),
	) );
	$block_2->add_field( array(
		'name'    => 'Image',
		'id'      => 'block_2_img',
		'type'    => 'file',
		// Optional:
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
		'text'    => array(
			'add_upload_file_text' => 'Add File'
		),
		'query_args' => array(
			'type' => array(
				'image/gif',
				'image/jpeg',
				'image/png',
			),
		),
	) );

	$block_3 = new_cmb2_box( array(
		'id'            => 'block_3',
		'title'         => esc_html__( 'Block 3', 'busicon' ),
		'object_types'  => array( 'portfolio', ), // Post type
		'priority'   => 'high',
	) );
	$block_3->add_field( array(
		'name'    => 'Description',
		'id'      => 'block_3_description',
		'type'    => 'wysiwyg',
		'options' => array(),
	) );
	$block_3->add_field( array(
		'name'    => 'Image',
		'id'      => 'block_3_img',
		'type'    => 'file',
		// Optional:
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
		'text'    => array(
			'add_upload_file_text' => 'Add File'
		),
		'query_args' => array(
			'type' => array(
				'image/gif',
				'image/jpeg',
				'image/png',
			),
		),
	) );

	$block_4 = new_cmb2_box( array(
		'id'            => 'block_4',
		'title'         => esc_html__( 'Block 4', 'busicon' ),
		'object_types'  => array( 'portfolio', ), // Post type
		'priority'   => 'high',
	) );
	$block_4->add_field( array(
		'name'    => 'Description',
		'id'      => 'block_4_description',
		'type'    => 'wysiwyg',
		'options' => array(),
	) );
	
}

add_action( 'cmb2_admin_init', 'busicon_register_metabox' );