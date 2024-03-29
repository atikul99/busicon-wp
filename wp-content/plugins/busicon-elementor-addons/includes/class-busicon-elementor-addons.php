<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://urnothemes.com
 * @since      1.0.0
 *
 * @package    Busicon_Elementor_Addons
 * @subpackage Busicon_Elementor_Addons/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Busicon_Elementor_Addons
 * @subpackage Busicon_Elementor_Addons/includes
 * @author     Urno IT <urnoit99@gmail.com>
 */
class Busicon_Elementor_Addons {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Busicon_Elementor_Addons_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'BUSICON_ELEMENTOR_ADDONS_VERSION' ) ) {
			$this->version = BUSICON_ELEMENTOR_ADDONS_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'busicon-elementor-addons';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

		add_filter( 'elementor/icons_manager/additional_tabs', [ $this, 'custom_icon_tab' ] );

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Busicon_Elementor_Addons_Loader. Orchestrates the hooks of the plugin.
	 * - Busicon_Elementor_Addons_i18n. Defines internationalization functionality.
	 * - Busicon_Elementor_Addons_Admin. Defines all hooks for the admin area.
	 * - Busicon_Elementor_Addons_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-busicon-elementor-addons-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-busicon-elementor-addons-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-busicon-elementor-addons-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-busicon-elementor-addons-public.php';

		$this->loader = new Busicon_Elementor_Addons_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Busicon_Elementor_Addons_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Busicon_Elementor_Addons_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Busicon_Elementor_Addons_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Busicon_Elementor_Addons_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Custom Icon Fonts
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	public function custom_icon_tab( $tabs = array() ) {

		$all_icons = array(
			'robot-man',
			'laptop',
			'road-map',
			'growth',
			'growth-2',
			'dollar-coin',
			'hand',
			'growth-hand',
			'building-2',
			'tag',
			'document',
		);
		
		$tabs['custom-icons'] = array(
			'name'          => 'custom-icon-set',
			'label'         => esc_html__( 'Custom Icon', 'busicon-elementor-addons' ),
			'labelIcon'     => 'icon-laptop',
			'prefix'        => 'icon-',
			'displayPrefix' => 'icon',
			'url'           => plugins_url( 'includes/fonts/icon-fonts/icon-fonts.css', dirname(__FILE__) ),
			'icons'         => $all_icons,
			'ver'           => '1.0.0',
		);

		return $tabs;
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Busicon_Elementor_Addons_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
