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
		'name' => 'Transparent Menu',
		'desc' => 'Active',
		'id'   => 'transparent_menu',
		'type' => 'checkbox',
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

	$portfolio = new_cmb2_box( array(
		'id'            => 'portfolio',
		'title'         => esc_html__( 'Project Info', 'busicon' ),
		'object_types'  => array( 'busicon_portfolio', ), // Post type
		'priority'   => 'high',
	) );
	$portfolio->add_field( array(
		'name'       => esc_html__( 'Client', 'busicon' ),
		'desc'       => esc_html__( 'Insert client name', 'busicon' ),
		'id'         => 'client_name',
		'type'       => 'text',
	) );
	$portfolio->add_field( array(
		'name'       => esc_html__( 'Category', 'busicon' ),
		'desc'       => esc_html__( 'Project category', 'busicon' ),
		'id'         => 'project_cat',
		'type'       => 'text',
	) );
	$portfolio->add_field( array(
		'name' => 'Cost',
		'desc' => 'Total cost of project',
		'id' => 'project_cost',
		'type' => 'text_money',
		// 'before_field' => '£', // Replaces default '$'
	) );
	$portfolio->add_field( array(
		'name' => 'Start Date',
		'id'   => 'project_start_date',
		'type' => 'text_date',
		// 'timezone_meta_key' => 'wiki_test_timezone',
		'date_format' => 'd-m-Y',
	) );
	$portfolio->add_field( array(
		'name' => 'End Date',
		'id'   => 'project_end_date',
		'type' => 'text_date',
		// 'timezone_meta_key' => 'wiki_test_timezone',
		'date_format' => 'd-m-Y',
	) );
            
	$project_benifits = new_cmb2_box( array(
		'id'            => 'project_benifits',
		'title'         => esc_html__( 'Project Benifits', 'busicon' ),
		'object_types'  => array( 'busicon_portfolio', ), // Post type
		'priority'   => 'high',
	) );
		
	$project_benifits->add_field( array(
		'name'    => 'Image',
		'desc'    => 'Upload an image or enter an URL.',
		'id'      => 'project_image',
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
	$project_benifits->add_field( array(
		'name'    => 'Description',
		'id'      => 'project_description',
		'type'    => 'wysiwyg',
		'options' => array(),
	) );
	
}

add_action( 'cmb2_admin_init', 'busicon_register_metabox' );