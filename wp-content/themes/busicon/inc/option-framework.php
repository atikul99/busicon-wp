<?php
/**
 * ReduxFramework Barebones Sample Config File
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

if ( ! class_exists( 'Redux' ) ) {
	return null;
}

// This is your option name where all the Redux data is stored.
$opt_name = 'busicon_opt';

/**
 * GLOBAL ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: @link https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 */

/**
 * ---> BEGIN ARGUMENTS
 */

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
	// REQUIRED!!  Change these values as you need/desire.
	'opt_name'                  => $opt_name,

	// Name that appears at the top of your panel.
	'display_name'              => $theme->get( 'Name' ),

	// Version that appears at the top of your panel.
	'display_version'           => $theme->get( 'Version' ),

	// Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only).
	'menu_type'                 => 'menu',

	// Show the sections below the admin menu item or not.
	'allow_sub_menu'            => true,

	'menu_title'                => esc_html__( 'Busicon Options', 'busicon' ),
	'page_title'                => esc_html__( 'Busicon Options', 'busicon' ),

	// Disable this in case you want to create your own google fonts loader.
	'disable_google_fonts_link' => false,

	// Show the panel pages on the admin bar.
	'admin_bar'                 => true,

	// Choose an icon for the admin bar menu.
	'admin_bar_icon'            => 'dashicons-portfolio',

	// Choose an priority for the admin bar menu.
	'admin_bar_priority'        => 50,

	// Set a different name for your global variable other than the opt_name.
	'global_variable'           => '',

	// Show the time the page took to load, etc.
	'dev_mode'                  => true,

	// Enable basic customizer support.
	'customizer'                => true,

	// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
	'page_priority'             => 90,

	// For a full list of options, visit: @link http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters.
	'page_parent'               => 'themes.php',

	// Permissions needed to access the options panel.
	'page_permissions'          => 'manage_options',

	// Specify a custom URL to an icon.
	'menu_icon'                 => '',

	// Force your panel to always open to a specific tab (by id).
	'last_tab'                  => '',

	// Icon displayed in the admin panel next to your menu_title.
	'page_icon'                 => 'icon-themes',

	// Page slug used to denote the panel.
	'page_slug'                 => '_options',

	// On load save the defaults to DB before user clicks save or not.
	'save_defaults'             => true,

	// If true, shows the default value next to each field that is not the default value.
	'default_show'              => false,

	// What to print by the field's title if the value shown is default. Suggested: *.
	'default_mark'              => '',

	// Shows the Import/Export panel when not used as a field.
	'show_import_export'        => true,

	// CAREFUL -> These options are for advanced use only.
	'transient_time'            => 60 * MINUTE_IN_SECONDS,

	// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output.
	'output'                    => true,

	// Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head.
	'output_tag'                => true,

	// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
	// possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
	'database'                  => '',

	// If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
	'use_cdn'                   => true,
	'compiler'                  => true,

	// Enable or disable flyout menus when hovering over a menu with submenus.
	'flyout_submenus'           => true,

	// Mode to display fonts (auto|block|swap|fallback|optional)
	// See: https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display
	'font_display'              => 'swap',

	// HINTS.
	'hints'                     => array(
		'icon'          => 'el el-question-sign',
		'icon_position' => 'right',
		'icon_color'    => 'lightgray',
		'icon_size'     => 'normal',
		'tip_style'     => array(
			'color'   => 'light',
			'shadow'  => true,
			'rounded' => false,
			'style'   => '',
		),
		'tip_position'  => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect'    => array(
			'show' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'mouseover',
			),
			'hide' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'click mouseleave',
			),
		),
	),
);

Redux::set_args( $opt_name, $args );

/*
 * ---> END ARGUMENTS
 */

/*
 * ---> BEGIN HELP TABS
 */

$help_tabs = array(
	array(
		'id'      => 'redux-help-tab-1',
		'title'   => esc_html__( 'Theme Information 1', 'busicon' ),
		'content' => '<p>' . esc_html__( 'This is the tab content, HTML is allowed.', 'busicon' ) . '</p>',
	),

	array(
		'id'      => 'redux-help-tab-2',
		'title'   => esc_html__( 'Theme Information 2', 'busicon' ),
		'content' => '<p>' . esc_html__( 'This is the tab content, HTML is allowed.', 'busicon' ) . '</p>',
	),
);

Redux::set_help_tab( $opt_name, $help_tabs );

// Set the help sidebar.
$content = '<p>' . esc_html__( 'This is the sidebar content, HTML is allowed.', 'busicon' ) . '</p>';
Redux::set_help_sidebar( $opt_name, $content );

/*
 * <--- END HELP TABS
 */

/*
 *
 * ---> BEGIN SECTIONS
 *
 */

/* As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for. */

/* -> START Header Area. */

$section = array(
	'title' => __( 'Header', 'busicon' ),
	'id'    => 'header',
	'desc'  => __( 'These are global settings for Header. You can change the setting for each page separately from the bottom of the page.', 'busicon' ),
	'icon'  => 'el el-asterisk',
	'fields' => array(
		array(
			'id'       => 'redux_header_style',
			'type'     => 'select',
			'title'    => esc_html__('Select Header Style', 'busicon'),
			'options'  => array(
				'header-one' => 'Header One',
				'header-two' => 'Header Two',
			)
		),
		array(
			'id'       => 'transparent_switch',
			'type'     => 'switch',
			'title'    => __('Transparent Menu Switch', 'busicon'),
			'default'  => false,
		),
	),
);

Redux::set_section( $opt_name, $section );

$section = array(
	'title'      => esc_html__( 'Header Top', 'busicon' ),
	'id'         => 'header_top',
	'subsection' => true,
	'icon'   => 'el el-share-alt',
	'fields'     => array(
		array(
			'id'       => 'header_top_switch',
			'type'     => 'switch',
			'title'    => esc_html__( 'Topbar Switch', 'busicon' ),
			'default'  => false,
		),
		array(
			'id'       => 'top_location',
			'type'     => 'text',
			'title'    => esc_html__( 'Location', 'busicon' ),
			'default'     => esc_html__( '6391 Elgin St. Celina, Delaware 10299', 'busicon' ),
		),
		array(
			'id'       => 'top_phone',
			'type'     => 'text',
			'title'    => esc_html__( 'Phone Number', 'busicon' ),
			'default'     => '(209) 555-0104',
		),
		array(
			'id'       => 'top_email',
			'type'     => 'text',
			'title'    => esc_html__( 'Email Address', 'busicon' ),
			'default'     => esc_html__( 'debbie.baker@example.com', 'busicon' ),
		),
		array(
			'id'          => 'location-typography',
			'type'        => 'typography', 
			'title'       => __('Location Typography', 'busicon'),
			'google'      => true, 
			'font-backup' => true,
			'output'      => array('.top-bar .location p'),
			'units'       =>'px',
		),
		array(
			'id'          => 'contact-typography',
			'type'        => 'typography', 
			'title'       => __('Phone & Email Typography', 'busicon'),
			'google'      => true, 
			'font-backup' => true,
			'output'      => array('.top-bar .contact ul li a'),
			'units'       =>'px',
		),
	    array(         
	        'id'       => 'top-background',
	        'type'     => 'background',
	        'title'    => __('Top Bar Background', 'busicon'),
	        'subtitle' => __('Top Bar background with image, color, etc.', 'busicon'),
	        'output'    => array('.top-bar'),
	    ),
	),
);

Redux::set_section( $opt_name, $section );

$section = array(
	'title'      => esc_html__( 'Header Logo', 'busicon' ),
	'id'         => 'header_logo',
	'subsection' => true,
	'icon'   => 'el el-share-alt',
	'fields'     => array(
		array(
			'id'       => 'default_logo',
			'type'     => 'media',
			'title'    => esc_html__( 'Default Logo', 'busicon' ),
			'desc'     => esc_html__( 'Upload logo here.ex: - it is work in default menu.', 'busicon' ),
		),
		array(
			'id'       => 'transparent_logo',
			'type'     => 'media',
			'title'    => esc_html__( 'Transparent Menu Logo', 'busicon' ),
			'desc'     => esc_html__( 'Upload logo here.ex: - it is work in transparent menu.', 'busicon' ),
		),
	),
);

Redux::set_section( $opt_name, $section );

$section = array(
	'title'      => esc_html__( 'Header Menu', 'busicon' ),
	'id'         => 'busicon_menu',
	'subsection' => true,
	'icon'   => 'el el-share-alt',
	'fields'     => array(
	    array(
			'id'       => 'header_search_switch',
			'type'     => 'switch',
			'title'    => esc_html__( 'Search Icon Switch', 'busicon' ),
			'default'  => true,
		),
		array(
			'id'       => 'header_btn_switch',
			'type'     => 'switch',
			'title'    => esc_html__( 'Button Switch', 'busicon' ),
			'default'  => true,
		),
		array(
			'id'       => 'button_text',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Text', 'busicon' ),
			'default'  => 'Get A Quote',
		),
		array(
			'id'       => 'button_link',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Link', 'busicon' ),
			'default'  => '#',
		),
		array(
			'id'        => 'busicon_menu_bg_color',
			'type'      => 'background',
			'title'     => esc_html__('Section BG Color', 'busicon'),
			'default'  => '',
			'output'    => array('
				.site-header, .site-header1, .site-header2
			'),
			'default'  => array(
				'background-color' => '',
			)
		),
		array(
			'id'        => 'submenu_bg_color',
			'type'      => 'background',
			'title'     => esc_html__('Sub Menu BG Color', 'busicon'),
			'default'  => '',
			'output'    => array('
				.site-header .menu-bar .main-navigation li .sub-menu,
				.site-header1 .menu-bar .main-navigation li .sub-menu,
				.site-header2 .menu-bar .main-navigation li .sub-menu
			'),
			'default'  => array(
				'background-color' => '',
			)
		),
	),
);

Redux::set_section( $opt_name, $section );

/* -> START Header 2 Settings. */

Redux::set_section(
	$opt_name, 
	array(
		'title'  => esc_html__( 'Header 2', 'busicon' ),
		'id'     => 'header_2',
		'subsection' => true,
		'icon'   => 'el el-share-alt',
		'heading' => '',
		'fields' => array(
			array(
				'id'       => 'topbar2_start',
				'type'     => 'section',
				'title'    => esc_html__( 'Topbar', 'busicon' ),
				'indent' => true 
			),
			array(
				'id'       => 'topbar2_facebook',
				'type'     => 'text',
				'title'    => __('Facebook URL', 'busicon'),
				'default'  => esc_html__('#', 'busicon'),
			),
			array(
				'id'       => 'topbar2_instagram',
				'type'     => 'text',
				'title'    => __('Instagram URL', 'busicon'),
				'default'  => esc_html__('#', 'busicon'),
			),
			array(
				'id'       => 'topbar2_twitter',
				'type'     => 'text',
				'title'    => __('Twitter URL', 'busicon'),
				'default'  => esc_html__('#', 'busicon'),
			),
			array(
				'id'       => 'topbar2_linkedin',
				'type'     => 'text',
				'title'    => __('Linkedin URL', 'busicon'),
				'default'  => esc_html__('#', 'busicon'),
			),
			array(
				'id'       => 'topbar2_email',
				'type'     => 'text',
				'title'    => __('Email', 'busicon'),
				'default'  => esc_html__('info@example.com', 'busicon'),
			),
			array(
				'id'       => 'topbar2_address',
				'type'     => 'text',
				'title'    => __('Address', 'busicon'),
				'default'  => esc_html__('6391 Elgin St. Celina, 10299', 'busicon'),
			),
			array(
				'id'       => 'topbar2_btn_switch',
				'type'     => 'switch',
				'title'    => esc_html__( 'Button Switch', 'busicon' ),
				'default'  => true,
			),
			array(
				'id'       => 'topbar2_button_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Button Text', 'busicon' ),
				'default'  => 'Get A Quote',
			),
			array(
				'id'       => 'topbar2_button_link',
				'type'     => 'text',
				'title'    => esc_html__( 'Button Link', 'busicon' ),
				'default'  => '#',
			),
			array(
				'id'       => 'topbar2_button_bg',
				'type'     => 'background',
				'title'    => esc_html__( 'Button Background', 'busicon' ),
				'validate' => 'color',
				'output'    => array('.site-header2 .top-bar .contact .menu-btn a'),
			),
			array(
				'id'       => 'topbar2_end',
				'type'     => 'section',
				'indent' => false, 
			),
			array(
				'id'       => 'menu2_start',
				'type'     => 'section',
				'title'    => esc_html__( 'Menubar', 'busicon' ),
				'indent' => true 
			),
			array(
				'id'       => 'menu2_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Logo', 'busicon' ),
				'desc'     => esc_html__( 'This logo only work in header 2.', 'busicon' ),
			),
			array(
				'id'       => 'menu2_phone_switch',
				'type'     => 'switch',
				'title'    => esc_html__( 'Phone Switch', 'busicon' ),
				'default'  => true,
			),
			array(
				'id'       => 'menu2_phone_icon_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Phone Icon Color', 'busicon' ),
				'validate' => 'color',
				'output'    => array('.site-header2 .menu-bar .menu-phone .phone-icon'),
			),
			array(
				'id'       => 'menu2_phone_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Phone Text', 'busicon' ),
				'default'  => 'Requesting A Call:',
			),
			array(
				'id'       => 'menu2_phone',
				'type'     => 'text',
				'title'    => esc_html__( 'Phone Number', 'busicon' ),
				'default'  => '(629)-555-0129',
			),
			array(
				'id'       => 'menu2_end',
				'type'     => 'section',
				'indent' => false, 
			),
		)
	)
);

/* -> START Mobile Menu Settings. */

Redux::set_section(
	$opt_name, 
	array(
		'title'  => esc_html__( 'Mobile Menu', 'busicon' ),
		'id'     => 'mobile_menu',
		'icon'   => 'el el-braille',
		'fields' => array(
			array(
				'id'       => 'mobile_logo',
				'type'     => 'media',
				'title'    => esc_html__( 'Mobile Menu Logo', 'busicon' ),
				'desc'     => esc_html__( 'Upload logo here.ex: - it is work in mobile menu.', 'busicon' ),
			),
			array(
				'id'       => 'mobile_menu_contact_switch',
				'type'     => 'switch',
				'title'    => __('Contact Info Switch', 'busicon'),
				'default'  => true,
			),
			array(
				'id'       => 'mobile_menu_contact_title',
				'type'     => 'text',
				'title'    => __('Contact Info Title', 'busicon'),
				'default'  => esc_html__('Contact Info', 'busicon'),
			),
		)
	)
);

/* -> START Preloader Settings. */

Redux::set_section( 
	$opt_name, 
	array(
		'title'  => esc_html__( 'Preloader', 'busicon' ),
		'id'     => 'preloader',
		'icon'   => 'el el-refresh',
		'fields' => array(
			array(
				'id'       => 'preloader_switch',
				'type'     => 'switch',
				'title'    => __('Preloader Switch', 'busicon'),
				'default'  => true,
			),
		)
	)
);

/* -> START Color Settings. */

Redux::set_section( 
	$opt_name, 
	array(
		'title'  => esc_html__( 'Color', 'busicon' ),
		'id'     => 'site_color',
		'icon'   => 'el el-adjust',
		'fields' => array(
			array(
				'id'       => 'main-color',
				'type'     => 'color',
				'title'    => esc_html__('Site Main Color', 'busicon'), 
				'validate' => 'color',
			)
		)
	)
);

/* -> START Typography. */

$section = array(
	'title'  => esc_html__( 'Typography', 'busicon' ),
	'id'     => 'typography',
	'icon'   => 'el el-fontsize',
	'fields' => array(
		array(
			'id'          => 'busicon_body_typography',
			'type'        => 'typography', 
			'title'       => esc_html__('Body Typography', 'busicon'),
			'google'      => true, 
			'font-backup' => true,
			'line-height'   => false,
			'output'      => array('body'),
			'units'       =>'px',
		),
		array(
			'id'          => 'busicon_h1_typography',
			'type'        => 'typography', 
			'title'       => esc_html__('Heading Typography H1', 'busicon'),
			'google'      => true, 
			'font-backup' => true,
			'line-height'   => false,
			'font-style'  => false, 					
			'output'      => array('h1'),
			'units'       =>'px',
			'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'busicon'),
			'default'     => array(
				'color'       => '', 
				'font-family' => '', 
				'google'      => true,
				'font-size'   => '',						
			),
		),
		array(
			'id'          => 'busicon_h2_typography',
			'type'        => 'typography', 
			'title'       => esc_html__('Heading Typography H2', 'busicon'),
			'google'      => true, 
			'font-backup' => true,
			'line-height'   => false,
			'font-style'  => false,
			'output'      => array('h2'),
			'units'       =>'px',
			'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'busicon'),
			'default'     => array(
				'color'       => '', 
				'font-family' => '', 
				'google'      => true,
				'font-size'   => '',
			),
		),
		array(
			'id'          => 'busicon_h3_typography',
			'type'        => 'typography', 
			'title'       => esc_html__('Heading Typography H3', 'busicon'),
			'google'      => true, 
			'font-backup' => true,
			'line-height'   => false,
			'font-style'  => false,
			'output'      => array('h3'),
			'units'       =>'px',
			'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'busicon'),
			'default'     => array(
				'color'       => '', 
				'font-family' => '', 
				'google'      => true,
				'font-size'   => '',
			),
		),
		array(
			'id'          => 'busicon_h4_typography',
			'type'        => 'typography', 
			'title'       => esc_html__('Heading Typography H4', 'busicon'),
			'google'      => true, 
			'font-backup' => true,
			'line-height'   => false,
			'font-style'  => false,
			'output'      => array('h4'),
			'units'       =>'px',
			'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'busicon'),
			'default'     => array(
				'color'       => '', 
				'font-family' => '', 
				'google'      => true,
				'font-size'   => '',
			),
		),
		array(
			'id'          => 'busicon_h5_typography',
			'type'        => 'typography', 
			'title'       => esc_html__('Heading Typography H5', 'busicon'),
			'google'      => true, 
			'font-backup' => true,
			'line-height'   => false,
			'font-style'  => false,
			'output'      => array('h5'),
			'units'       =>'px',
			'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'busicon'),
			'default'     => array(
				'color'       => '', 
				'font-family' => '', 
				'google'      => true,
				'font-size'   => '',
			),
		),
		array(
			'id'          => 'busicon_h6_typography',
			'type'        => 'typography', 
			'title'       => esc_html__('Heading Typography H6', 'busicon'),
			'google'      => true, 
			'font-backup' => true,
			'line-height'   => false,
			'font-style'  => false,
			'output'      => array('h6'),
			'units'       =>'px',
			'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'busicon'),
			'default'     => array(
				'color'       => '', 
				'font-family' => '', 
				'google'      => true,
				'font-size'   => '',
			),
		),
	),
);

Redux::set_section( $opt_name, $section );

/* <- END Typography. */

/* -> START Breadcrumb Area. */

$section = array(
	'title'  => esc_html__( 'Breadcrumb Area', 'busicon' ),
	'id'     => 'breadcrumb',
	'icon'   => 'el el-tasks',
	'fields' => array(
		array(
			'id'       => 'breadcrumb_switch',
			'type'     => 'switch',
			'title'    => __('Breadcrumb Switch', 'busicon'),
			'default'  => true,
		),
		array(
			'id'       => 'breadcrumb-background',
			'type'     => 'background',
			'title'    => __('Breadcrumb Background', 'busicon'),
			'output'    => array('.breadcrumb-area'),
		),
		array(
			'id'          => 'breadcrumb-title-typography',
			'type'        => 'typography', 
			'title'       => __('Title Typography', 'busicon'),
			'google'      => true, 
			'font-backup' => true,
			'output'      => array('.breadcrumb-area .text-wrapper h1'),
			'units'       =>'px',
			'subtitle'    => __('Typography option with each property can be called individually.', 'busicon'),
			'default'     => array(
				'color'       => '', 
				'font-style'  => '', 
				'font-family' => '', 
				'google'      => true,
				'font-size'   => '', 
				'line-height' => ''
			),
		),
		array(
			'id'             => 'breadcrumb_spacing',
			'type'           => 'spacing',
			'output'         => array('.breadcrumb-area'),
			'mode'           => 'padding',
			'units'          => array('em', 'px'),
			'units_extended' => 'false',
			'title'          => esc_html__('Padding Option', 'busicon'),
			'desc'           => esc_html__('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'busicon'),
			'default'            => array(
				'padding-top'     => '',
				'padding-right'   => '',
				'padding-bottom'  => '',
				'padding-left'    => '',
				'units'          => 'px',
			)
		),
	),
);

Redux::set_section( $opt_name, $section );

/* -> START Blog Settings */

$section = array(
	'title' => __( 'Blog Settings', 'busicon' ),
	'id'    => 'blog_settings',
	'icon'  => 'el el-file-edit',
);

Redux::set_section( $opt_name, $section );

/* -> START Blog Page */

$section = array(
	'title'  => esc_html__( 'Blog Page', 'busicon' ),
	'id'     => 'blog_page',
	'subsection' => true,
	'icon'   => 'el el-list-alt',
	'fields' => array(
		array(
			'id'       => 'blog_page_breadcrumb_title',
			'type'     => 'text',
			'title'    => __('Page Title', 'busicon'),
			'default'	=> esc_html__('Standard Blog', 'busicon'),
		),
		array(
			'id'       => 'blog_page_meta_switch',
			'type'     => 'switch',
			'title'    => __('Post Meta Switch', 'busicon'),
			'default'  => true,
		),
		array(
			'id'       => 'blog_page_btn_text',
			'type'     => 'text',
			'title'    => __('Button Text', 'busicon'),
			'default'	=> esc_html__('Read More', 'busicon'),
		),
	),
);

Redux::set_section( $opt_name, $section );

/* -> START Blog Details page */

$section = array(
	'title'  => esc_html__( 'Blog Details', 'busicon' ),
	'id'     => 'blog_details',
	'subsection' => true,
	'icon'   => 'el el-align-left',
	'fields' => array(
		array(
			'id'       => 'blog_details_breadcrumb_title',
			'type'     => 'text',
			'title'    => __('Breadcrumb Title', 'busicon'),
			'default'	=> esc_html__('Blog Details', 'busicon'),
		),
		array(
			'id'       => 'blog_details_category_switch',
			'type'     => 'switch',
			'title'    => __('Post Category Switch', 'busicon'),
			'default'	=> true,
		),
		array(
			'id'       => 'blog_details_meta_switch',
			'type'     => 'switch',
			'title'    => __('Post Meta Switch', 'busicon'),
			'default'  => true,
		),
	),
);

Redux::set_section( $opt_name, $section );

/* <- END Blog Details Page */

/* -> START Sidebar */

$section = array(
	'title'  => esc_html__( 'Sidebar', 'busicon' ),
	'id'     => 'sidebar',
	'icon'   => 'el el-asterisk',
	'fields' => array(
		array(
			'id'       => 'sidebar_widget_bg',
			'type'     => 'background',
			'title'    => __('Widget Background', 'busicon'),
			'default'	=> array(
				'background' => '',
			),
			'output'    => array('.widget-area .widget'),
		),
		array(
			'id'          => 'sidebar_widget_title_typography',
			'type'        => 'typography', 
			'title'       => __('Widget Title Typography', 'busicon'),
			'google'      => true, 
			'font-backup' => true,
			'output'      => array('.widget-area .widget h2'),
			'units'       =>'px',
			'default'     => array(
				'color'       => '',
				'font-style'  => '',
				'font-family' => '',
				'google'      => true,
				'font-size'   => '',
				'line-height' => ''
			),
		),
	),
);

Redux::set_section( $opt_name, $section );

/* <- END Sidebar */

/* -> START 404 page */

$section = array(
	'title'  => esc_html__( '404 Page', 'busicon' ),
	'id'     => '404_page',
	'icon'   => 'el el-exclamation-sign',
	'fields' => array(
		array(
			'id'       => '404_background',
			'type'     => 'background',
			'title'    => __('Page Background', 'busicon'),
			'default'	=> array(
				'background' => '',
			),
			'output'    => array('.four-zero-four'),
		),
		array(
			'id'       => '404_title',
			'type'     => 'text',
			'title'    => __('404 Title', 'busicon'),
			'default'	=> esc_html__('Oops! Page not found.', 'busicon'),
		),
		array(
			'id'       => '404_description',
			'type'     => 'editor',
			'title'    => __('404 Description', 'busicon'),
			'default'	=> esc_html__('The page you are looking for is not available or doesn’t belong to this website!', 'busicon'),
		),
		array(
			'id'       => '404_btn_text',
			'type'     => 'text',
			'title'    => __('Button Text', 'busicon'),
			'default'	=> esc_html__('Back to Home', 'busicon'),
		),
		array(
			'id'          => '404_title_typography',
			'type'        => 'typography', 
			'title'       => esc_html__('Title Typography', 'busicon'),
			'google'      => true, 
			'font-backup' => true,					
			'output'      => array('.four-zero-four .error-404 .page-title'),
			'units'       =>'px',
			'default'     => array(
				'color'       => '', 
				'font-family' => '', 
				'google'      => true,
				'font-size'   => '',
			),
		),
	),
);

Redux::set_section( $opt_name, $section );

/* <- END 404 Page */


/* -> START Footer Section. */

$section = array(
	'title' => __( 'Footer', 'busicon' ),
	'id'    => 'footer',
	'icon'  => 'el el-credit-card',
);

Redux::set_section( $opt_name, $section );

$section = array(
	'title'      => esc_html__( 'Copyright Area', 'busicon' ),
	'id'         => 'copyright_subsection',
	'subsection' => true,
	'icon'   => 'el el-share-alt',
	'fields'     => array(
		array(
			'id'        => 'copyright-text',
			'type'      => 'editor',
			'title'     => esc_html__('Copyright information', 'busicon'),
			'default'	=> esc_html__('Copyright &copy; 2024 Busicon | All Rights Reserved.', 'busicon'),
			'args'      => array(
				'teeny'            => true,
				'textarea_rows'    => 5,
				'media_buttons' => false,
			)
		),
		array(
			'id'        => 'busicon_copyright_text_color',
			'type'      => 'color',
			'title'     => esc_html__('Copyright Text Color', 'busicon'),
			'default'  => '',
			'output'    => array(
				'color' => '.site-footer .site-info .copyright-text'
			)
		),
		array(
			'id'        => 'busicon_copyright_bg_color',
			'type'      => 'background',
			'title'     => esc_html__('Copyright Section BG', 'busicon'),
			'default'  => '',
			'output'    => array('.site-footer .copyright'),
			'default'  => array(
				'background-color' => '',
			)
		),
		array(
			'id'             => 'copyright_section_spacing',
			'type'           => 'spacing',
			'output'         => array('.site-footer .copyright'),
			'mode'           => 'padding',
			'units'          => array('em', 'px'),
			'units_extended' => 'false',
			'title'          => esc_html__('Padding Option', 'busicon'),
			'desc'           => esc_html__('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'busicon'),
			'default'            => array(
				'padding-top'     => '',
				'padding-right'   => '',
				'padding-bottom'  => '',
				'padding-left'    => '',
				'units'          => 'px',
			)
		),

	),
);

Redux::set_section( $opt_name, $section );

/*
 * <--- END SECTIONS
 */

