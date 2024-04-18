<?php

if(!defined('ABSPATH')) exit;

class HeroImage extends \Elementor\Widget_Base{

	public function get_name(){
		return "hero-image";
	}
	
	public function get_title(){
		return "Hero Image";
	}
	
	public function get_icon(){
		return "eicon-image";
	}

	public function get_categories(){
		return ['busicon-category'];
	}

	protected function register_controls(){

		$this->start_controls_section(
			'image_section',
			[
				'label' => __( 'Image', 'busicon-elementor-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

			$this->add_control(
				'image',
				[
					'label' => esc_html__( 'Choose Image', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
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
				'label' => __( 'General', 'busicon-elementor-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'select_style',
				[
					'label' => __( 'Select Style', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => [
						'one' => __( 'One', 'busicon-elementor-addons' ),
						'two' => __( 'Two', 'busicon-elementor-addons' ),
						'three' => __( 'Three', 'busicon-elementor-addons' ),

					],
					'default' => 'one',
					
				]
			);
			$this->add_responsive_control(
				'text_align',
				[
					'label' => __( 'Alignment', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => __( 'Left', 'busicon-elementor-addons' ),
							'icon' => 'eicon-text-align-left',
						],
						'center' => [
							'title' => __( 'Center', 'busicon-elementor-addons' ),
							'icon' => 'eicon-text-align-center',
						],
						'right' => [
							'title' => __( 'Right', 'busicon-elementor-addons' ),
							'icon' => 'eicon-text-align-right',
						],
						'justify' => [
							'title' => __( 'Justified', 'busicon-elementor-addons' ),
							'icon' => 'eicon-text-align-justify',
						],
					],
					'selectors' => [
						'{{WRAPPER}} .hero-image' => 'text-align: {{VALUE}};',
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'image_style',
			[
				'label' => __( 'Image', 'busicon-elementor-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'height',
				[
					'label' => esc_html__( 'Height', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .hero-image .main-image img' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'width',
				[
					'label' => esc_html__( 'Width', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 5,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .hero-image .wrapper' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

	?>

		<?php if($settings['select_style']=='one'){ ?>

			<div class="hero-image style1">
				<div class="wrapper">
					<div class="shape1">
						<?php echo '<img src="' . esc_url( plugins_url( 'images/hero1-shape1.png', dirname(__FILE__) ) ) . '" > '; ?>
					</div>
					<div class="main-image">
						<img src="<?php echo $settings['image']['url']; ?>" alt="hero-img">
					</div>
					<div class="shape2">
						<?php echo '<img src="' . esc_url( plugins_url( 'images/hero1-shape2.png', dirname(__FILE__) ) ) . '" > '; ?>
					</div>
				</div>
			</div>

		<?php }elseif($settings['select_style']=='two'){ ?>

			<div class="single-image style2">
				<img src="<?php echo $settings['image']['url']; ?>" alt="">
			</div>

		<?php }elseif($settings['select_style']=='three'){ ?>

			<div class="app-store">
				<a href="<?php echo esc_url($settings['button_url']['url']); ?>">
					<?php echo '<img src="' . esc_url( plugins_url( 'assets/images/app-store.png', dirname(__FILE__) ) ) . '" > '; ?>
					<p>AVAILABLE ON<br><span class="large-text">App Store</span></p>
				</a>
			</div>

		<?php } ?>

	<?php
	}
}