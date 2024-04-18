<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://urnothemes.com
 * @since      1.0.0
 *
 * @package    Busicon_Elementor_Addons
 * @subpackage Busicon_Elementor_Addons/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Busicon_Elementor_Addons
 * @subpackage Busicon_Elementor_Addons/public
 * @author     Urno IT <urnoit99@gmail.com>
 */
class Busicon_Elementor_Addons_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
		add_action( 'elementor/elements/categories_registered', [ $this, 'add_category' ] );
	}

	/**
	 * Register stylesheets
	 */

	public function enqueue_styles() {

		wp_enqueue_style( 'custom-icon', plugins_url('includes/fonts/icon-fonts/icon-fonts.css', dirname(__FILE__)), array(), $this->version, 'all' );

		wp_enqueue_style( 'owl-style', plugin_dir_url( __FILE__ ) . 'css/owl.carousel.min.css', array(), $this->version, 'all' );

		wp_enqueue_style( 'owl-theme', plugin_dir_url( __FILE__ ) . 'css/owl.theme.default.min.css', array(), $this->version, 'all' );

		wp_enqueue_style( 'venobox', plugin_dir_url( __FILE__ ) . 'css/venobox.css', array(), $this->version, 'all' );

		wp_enqueue_style( 'widget-style', plugin_dir_url( __FILE__ ) . 'css/widget-style.css', array(), $this->version, 'all' );

		wp_enqueue_style( 'widget-responsive', plugin_dir_url( __FILE__ ) . 'css/widget-responsive.css', array(), $this->version, 'all' );
	}

	/**
	 * Register JavaScript
	 */

	public function enqueue_scripts() {

		wp_enqueue_script( 'particles-script', plugin_dir_url( __FILE__ ) . 'js/particles.min.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script( 'owl-script', plugin_dir_url( __FILE__ ) . 'js/owl.carousel.min.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script( 'venobox', plugin_dir_url( __FILE__ ) . 'js/venobox.min.js', array( 'jquery' ), $this->version, true );

		wp_enqueue_script( 'isotope', plugin_dir_url( __FILE__ ) . 'js/isotope.pkgd.min.js', array( 'jquery' ), '3.0.0', true );

		wp_enqueue_script( 'widgets-script', plugin_dir_url( __FILE__ ) . 'js/widgets-script.js', array( 'jquery' ), $this->version, true );
	}

	public function init_widgets() {

		require_once( __DIR__ . '/widgets/hero-slider.php');
		require_once( __DIR__ . '/widgets/hero-text.php');
		require_once( __DIR__ . '/widgets/hero-particles.php');
		require_once( __DIR__ . '/widgets/hero-image.php');
		require_once( __DIR__ . '/widgets/item-list.php');
		require_once( __DIR__ . '/widgets/section-title.php');
		require_once( __DIR__ . '/widgets/service-carousel.php');
		require_once( __DIR__ . '/widgets/team.php');
		require_once( __DIR__ . '/widgets/team-carousel.php');
		require_once( __DIR__ . '/widgets/button.php');
		require_once( __DIR__ . '/widgets/circular-progress.php');
		require_once( __DIR__ . '/widgets/progress-bar.php');
		require_once( __DIR__ . '/widgets/testimonial.php');
		require_once( __DIR__ . '/widgets/blog-post.php');
		require_once( __DIR__ . '/widgets/latest-post.php');
		require_once( __DIR__ . '/widgets/feature-box.php');
		require_once( __DIR__ . '/widgets/flip-box.php');
		require_once( __DIR__ . '/widgets/brand.php');
		require_once( __DIR__ . '/widgets/service-box.php');
		require_once( __DIR__ . '/widgets/video-icon.php' );
		require_once( __DIR__ . '/widgets/pricing-table.php');
		require_once( __DIR__ . '/widgets/portfolio-carousel.php');
		require_once( __DIR__ . '/widgets/case-study.php');
		require_once( __DIR__ . '/widgets/portfolio-tab.php');
		require_once( __DIR__ . '/widgets/portfolio-grid.php');
		require_once( __DIR__ . '/widgets/copyright-menu.php');
		require_once( __DIR__ . '/widgets/working-process.php');
		require_once( __DIR__ . '/widgets/icon-box.php');
		require_once( __DIR__ . '/widgets/single-image.php');
		require_once( __DIR__ . '/widgets/tabs.php');
		require_once( __DIR__ . '/widgets/accordion.php');
		require_once( __DIR__ . '/widgets/heading.php');
		require_once( __DIR__ . '/widgets/nav-menu.php');
		require_once( __DIR__ . '/widgets/image-gallery.php');
		require_once( __DIR__ . '/widgets/counter-box.php');
		require_once( __DIR__ . '/widgets/signature-box.php');
		require_once( __DIR__ . '/widgets/author-card.php');

		// Register widget
		
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new HeroSlider());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new HeroText());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new HeroParticles());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new HeroImage());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ItemList());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new SectionTitle());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ServiceCarousel());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Team());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new TeamCarousel());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new busiconButton());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new CircleProgress());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ProgressBar());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Testimonial());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BlogPost());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new LatestPost());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new FeatureBox());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new FlipBox());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Brand());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new ServiceBox());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new VideoIcon());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new PricingTable());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new PortfolioCarousel());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new CaseStudy());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new PortfolioTab());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new PortfolioGrid());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new CopyrightMenu());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new WorkingProcess());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new IconBox());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new SingleImage());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Tabs());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new busiconAccordion());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new busiconHeading());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new busiconNavMenu());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new imageGallery());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new CounterBox());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new SignatureBox());
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new AuthorCard());
		
		add_action( 'elementor/elements/categories_registered', [$this, 'add_category'] );
	}

	public function add_category( $elements_manager ) {

		$elements_manager->add_category(
			'busicon-category',
			[
				'title' => __( 'Busicon Addons', 'busicon-elementor-addons' ),
				'icon' => 'fa fa-plug',
			]
		);
	}

}
