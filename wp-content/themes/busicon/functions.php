<?php
/**
 * Busicon functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Busicon
 */

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function busicon_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Busicon, use a find and replace
		* to change 'busicon' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'busicon', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'busicon' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'busicon_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'busicon_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function busicon_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'busicon_content_width', 640 );
}
add_action( 'after_setup_theme', 'busicon_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function busicon_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'busicon' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'busicon' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'busicon_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function busicon_scripts() {

	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '5.3.0');

	wp_enqueue_style('bootstrap-icon', get_template_directory_uri() . '/assets/css/bootstrap-icons.min.css', array(), '1.10.5');

	wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/fonts/fontawesome/css/all.css', array(), '6.4.0');

	wp_enqueue_style('dm-sans', get_template_directory_uri() . '/assets/css/dm-sans.css', array(), _S_VERSION);

	wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main-style.css', array(), _S_VERSION);

	wp_enqueue_style('theme-responsive', get_template_directory_uri() . '/assets/css/theme-responsive.css', array(), _S_VERSION);

	wp_enqueue_style( 'busicon-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'busicon-style', 'rtl', 'replace' );

	//  JS

	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'main-script', get_template_directory_uri() . '/js/main-script.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'busicon_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * CMB2 Metaboxes
 */
require get_template_directory() . '/inc/cmb2-metaboxes.php';

/**
 * Redux framework
 */
require get_template_directory() . '/inc/option-framework.php';

/**
 * TGM Plugin Activation
 */
require get_template_directory(). '/inc/tgm-plugin-activation/tgm-class-loader.php';

/**
 * Menu Item Icon
 */

function be_arrows_in_menus( $item_output, $item, $depth, $args ) {

	if( in_array( 'menu-item-has-children', $item->classes ) ) {
		$arrow = 0 == $depth ? '<i class="fas fa-chevron-down"></i>' : '';
		$arrow .= 1 == $depth ? '<i class="fas fa-chevron-right"></i>' : '';
		$arrow .= 2 == $depth ? '<i class="fas fa-chevron-right"></i>' : '';
		$arrow .= 3 == $depth ? '<i class="fas fa-chevron-right"></i>' : '';
		$arrow .= 4 == $depth ? '<i class="fas fa-chevron-right"></i>' : '';
		$arrow .= 5 == $depth ? '<i class="fas fa-chevron-right"></i>' : '';
		$arrow .= 6 == $depth ? '<i class="fas fa-chevron-right"></i>' : '';
		$arrow .= 7 == $depth ? '<i class="fas fa-chevron-right"></i>' : '';
		$arrow .= 8 == $depth ? '<i class="fas fa-chevron-right"></i>' : '';
		$arrow .= 9 == $depth ? '<i class="fas fa-chevron-right"></i>' : '';
		$arrow .= 10 == $depth ? '<i class="fas fa-chevron-right"></i>' : '';
		$item_output = str_replace( '</a>', $arrow . '</a>', $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'be_arrows_in_menus', 10, 4 );

/**
 * Scroll to Top
 */

function scroll_to_top() {
    ?>
 	<div class="scroll-up">
		<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
		</svg>
	</div>
    <?php
}
add_action( 'wp_footer', 'scroll_to_top' );

/**
 * Busicon breadcrumb
 */

if(!function_exists('busicon_breadcrumbs')){
	function busicon_breadcrumbs() {
		echo '<ul>';
		if (!is_home()) {
				echo '<li><a href="';
				echo esc_url( home_url( '/' ) );
				echo '">';
				echo esc_html__('Home','busicon');
				echo "</a></li>";
				echo '<li><i class="fa-solid fa-angle-right"></i></li>';		

			if (is_category()) {	
				echo "<li>";
				echo single_cat_title( '', false );
				echo '</li>';
			}
			elseif( is_archive() ) {
				the_archive_title( '<li>', '</li>' );
			}			
			elseif (is_page()) {			
				echo '<li>';
				echo get_the_title();
				echo '</li>';
			}
			elseif (is_single()) {	
				echo "<li>";
				the_title();
				echo '</li>';
			}		
			elseif (is_tag()) {
				single_tag_title();
			}

			elseif (is_day()) {
				echo"<li>";
				echo esc_html__('Archive for','busicon');
				echo'</li>';				
			}
			elseif (is_month()) {
				echo"<li>";
				echo esc_html__('Archive for','busicon');
				echo'</li>';				
			}
			elseif (is_year()) {
				echo"<li>";
				echo esc_html__('Archive for','busicon');
				echo'</li>';				
			}
			elseif (is_author()) {
				echo"<li>";
				echo esc_html__('Author','busicon');
				echo'</li>';			
			}
			elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
				echo"<li>";
				echo esc_html__('Blog Archives','busicon');
				echo'</li>';			
			}
			elseif (is_search()) {
				echo"<li>";
				echo esc_html__('Search Results','busicon');
				echo'</li>';
			}
			elseif (is_404()) {
				echo"<li>";
				echo esc_html__('404','busicon');
				echo'</li>';
			}
		}
		echo '</ul>';
	}
}

/**
 * Bootstrap Icon
 */
function bootstrap_icons_custom_tab( $tabs = array() ) {

	// Append new icons
	$new_icons = array(
		'person',
		'people',
		'house-door',
		'house',
		'envelope',
		'telephone',
		'telephone-fill',
		'arrow-left',
		'arrow-left-short',
		'arrow-right',
		'arrow-right-short',
		'check2',
		'check-lg',
		'check-circle',
		'geo-alt',
		'chevron-double-right',
		'play',
		'play-fill',
		'play-circle',
		'play-circle-fill',
	);
	
	$tabs['my-custom-icons'] = array(
		'name'          => 'bootstrap-icon',
		'label'         => esc_html__( 'Bootstrap Icon', 'busicon' ),
		'labelIcon'     => 'bi bi-bootstrap',
		'prefix'        => 'bi-',
		'displayPrefix' => 'bi',
		'url'           => get_template_directory_uri() . '/assets/css/bootstrap-icons.min.css',
		'icons'         => $new_icons,
		'ver'           => '1.10.5',
	);

	return $tabs;
}

add_filter( 'elementor/icons_manager/additional_tabs', 'bootstrap_icons_custom_tab' );

/**
 * Demo Data Import
 */
function ocdi_import_files() {
	return [
		[
			'import_file_name'           => 'Demo 1',
			'categories'                 => [ 'Category 1' ],
			'import_file_url'            => get_template_directory_uri() . '/inc/demo-data/busicon.WordPress.xml',
			'import_widget_file_url'     => get_template_directory_uri() . '/inc/demo-data/busicon-widgets.wie',
			'import_customizer_file_url' => get_template_directory_uri() . '/inc/demo-data/busicon-export.dat',
			'import_redux'               => [
				[
					'file_url'    => get_template_directory_uri() . '/inc/demo-data/busicon_opt.json',
					'option_name' => 'busicon_opt',
				],
			],
			'import_preview_image_url'   => get_template_directory_uri() . '/inc/demo-data/demo-thumb.jpg',
			'preview_url'                => 'https://wp.urnoit.net/busicon/',
		],
	];
}
add_filter( 'ocdi/import_files', 'ocdi_import_files' );