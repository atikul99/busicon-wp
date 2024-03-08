<?php



use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if(!defined('ABSPATH')) exit;


class busiconNavMenu extends Widget_Base{

	public function get_name(){
		return "busicon-nav-menu";
	}
	
	public function get_title(){
		return " Nav Menu";
	}
	
	public function get_icon(){
		return "eicon-nav-menu";
	}

	public function get_categories(){
		return ['busicon-category'];
	}

	protected function _register_controls(){

		$this->start_controls_section(
			'menu_section',
			[
				'label' => esc_html__( 'Menu', 'busicon-elementor-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'show_search',
			[
				'label' => esc_html__( 'Show Search', 'busicon-elementor-extension' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'busicon-elementor-extension' ),
				'label_off' => esc_html__( 'Hide', 'busicon-elementor-extension' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

/*
==========
Style Tab
==========
*/

		$this->start_controls_section(
			'general_section',
			[
				'label' => __( 'General', 'busicon-elementor-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'select_style',
				[
					'label' => __( 'Select Style', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'one' => __( 'One', 'busicon-elementor-extension' ),
						'two' => __( 'Two', 'busicon-elementor-extension' ),
						'three' => __( 'Google Play', 'busicon-elementor-extension' ),
						'four' => __( 'App Store', 'busicon-elementor-extension' ),

					],
					'default' => 'one',
					
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'menu_style',
			[
				'label' => __( 'Menu', 'busicon-elementor-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'menu_background',
					'label' => esc_html__( 'Background', 'busicon-elementor-extension' ),
					'types' => [ 'classic', 'gradient', 'video' ],
					'selector' => '{{WRAPPER}} .busicon-nav-menu',
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'menu_item_style',
			[
				'label' => __( 'Menu Item', 'busicon-elementor-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'item_color',
				[
					'label' => __( 'Color', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .busicon-nav-menu ul li a' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'item_typography',
					'selector' => '{{WRAPPER}} .busicon-nav-menu ul li a',
				]
			);

			$this->add_responsive_control(
				'item_padding',
				[
					'label' => __( 'Padding', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .busicon-nav-menu ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'separator' => 'before',
				]
			);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

	?>

		<?php if($settings['select_style']=='one'){ ?>
			
			<?php global $busicon_opt; ?>
			<nav class="busicon-nav-menu">

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link"><img src="<?php echo $busicon_opt['default_logo']['url']; ?>" alt=""></a>
				<div class="busicon-menu-toggle">
					<i class="bi bi-grid-3x3-gap"></i>
					<i class="bi bi-x-square"></i>
				</div>

				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'menu_class'     => 'menu-ul',
							'container_class'=> 'busicon-menu-wrapper'
						)
					);
				?>

				<?php if ( 'yes' === $settings['show_search'] ) { ?>
				<div class="menu-search">
					<div class="search-toggle">
						<i class="open bi bi-search"></i>
						<i class="close bi bi-x-lg"></i>
					</div>
					<div class="search--form" style="display: block;">
						<form action="#">
							<input type="text" class="search-input" placeholder="Search Here...">
							<button><i class="bi bi-search"></i></button>
						</form>
					</div>
				</div>
				<?php } ?>
			</nav>

		<?php }elseif($settings['select_style']=='two'){ ?>	


			

		<?php } ?>

	<?php
	}
}