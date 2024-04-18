<?php

if(!defined('ABSPATH')) exit;

class SingleImage extends \Elementor\Widget_Base{

	public function get_name(){
		return "singleimage";
	}
	
	public function get_title(){
		return "Image";
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
					'label' => esc_html__( 'Image One', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
				]
			);
			$this->add_control(
				'image2',
				[
					'label' => esc_html__( 'Image Two', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
				]
			);
			$this->add_control(
				'shape',
				[
					'label' => esc_html__( 'Shape', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => esc_url( plugins_url( 'images/dots.png', dirname(__FILE__) ) ),
					],
				]
			);
			$this->add_control(
				'website_link',
				[
					'label' => esc_html__( 'Link', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::URL,
					'options' => [ 'url', 'is_external', 'nofollow' ],
					'default' => [
						'url' => '#',
						'is_external' => false,
						'nofollow' => false,
						// 'custom_attributes' => '',
					],
					'label_block' => true,
				]
			);
		$this->end_controls_section();

		$this->start_controls_section(
			'text_section',
			[
				'label' => __( 'Text', 'busicon-elementor-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
			$this->add_control(
				'icons_type',
				[
					'label' => esc_html__('Icon Type','busicon-elementor-addons'),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' =>[
						'img' =>[
							'title' =>esc_html__('Image','busicon-elementor-addons'),
							'icon' =>'far fa-image',
						],
						'icon' =>[
							'title' =>esc_html__('Icon','busicon-elementor-addons'),
							'icon' =>'fa fa-info',
						]
					],
					'default' => 'icon',
				]
			);
			$this->add_control(
				'select_icon',
				[
					'label' => esc_html__( 'Icon', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'condition'=>[
						'icons_type'=> 'icon',
					],
					'label_block' => true,
				]
			);
			$this->add_control(
				'select_img',
				[
					'label' => esc_html__('Image','busicon-elementor-addons'),
					'type'=> \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
					'condition' => [
						'icons_type' => 'img',
					]
				]
			);
			$this->add_control(
				'widget_title',
				[
					'label' => esc_html__( 'Title', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Default title', 'busicon-elementor-addons' ),
					'placeholder' => esc_html__( 'Type your title here', 'busicon-elementor-addons' ),
					'label_block'  => true,
				]
			);
			$this->add_control(
				'widget_subtitle',
				[
					'label' => esc_html__( 'Subtitle', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Default subtitle', 'busicon-elementor-addons' ),
					'placeholder' => esc_html__( 'Type your subtitle here', 'busicon-elementor-addons' ),
					'label_block'  => true,
				]
			);
		$this->end_controls_section();

		$this->start_controls_section(
			'counter_box',
			[
				'label' => __( 'Counter Box', 'busicon-elementor-addons' ),
			]
		);

			$this->add_control(
				'counter_icons_type',
				[
				    'label' => esc_html__('Icon Type','busicon-elementor-addons'),
				    'type' => \Elementor\Controls_Manager::CHOOSE,
				    'options' =>[
					  'img' =>[
						'title' =>esc_html__('Image','busicon-elementor-addons'),
						'icon' =>'eicon-image',
					  ],
					  'icon' =>[
						'title' =>esc_html__('Icon','busicon-elementor-addons'),
						'icon' =>'fa fa-info',
					  ]
				    ],
				    'default' => 'icon',
				]
			 );
			 $this->add_control(
				'select_counter_icon',
				[
					'label' => esc_html__( 'Icon', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'condition'=>[
						'icons_type'=> 'icon',
					],
					'label_block' => true,
				]
			);
			$this->add_control(
				'select_counter_img',
				[
				    'label' => esc_html__('Image','busicon-elementor-addons'),
				    'type'=> \Elementor\Controls_Manager::MEDIA,
				    'default' => [
					  'url' => \Elementor\Utils::get_placeholder_image_src(),
				    ],
				    'condition' => [
					  'icons_type' => 'img',
				    ]
				]
			);

			$this->add_control(
				'number',
				[
					'label' => __( 'Number', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'default' => 100,
				]
			);

			$this->add_control(
				'suffix',
				[
					'label' => __( 'Number Suffix', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'dynamic' => [
						'active' => true,
					],
					'default' => '+',
					'placeholder' => __( 'Plus', 'busicon-elementor-addons' ),
				]
			);

			$this->add_control(
				'title',
				[
					'label' => __( 'Title', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
					'dynamic' => [
						'active' => true,
					],
					'default' => __( 'Cool Number', 'busicon-elementor-addons' ),
					'placeholder' => __( 'Cool Number', 'busicon-elementor-addons' ),
				]
			);
			$this->add_control(
				'description',
				[
					'label' => esc_html__( 'Description', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'rows' => 5,
					'default' => esc_html__( 'Default description', 'busicon-elementor-addons' ),
					'placeholder' => esc_html__( 'Type your description here', 'busicon-elementor-addons' ),
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
						'four' => __( 'Four', 'busicon-elementor-addons' ),
						'five' => __( 'Five', 'busicon-elementor-addons' ),

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
						'{{WRAPPER}} .single-image' => 'text-align: {{VALUE}};',
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
				'show_image2',
				[
					'label' => esc_html__( 'Show Image 2', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'busicon-elementor-addons' ),
					'label_off' => esc_html__( 'Hide', 'busicon-elementor-addons' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		if ( ! empty( $settings['website_link']['url'] ) ) {
			$this->add_link_attributes( 'website_link', $settings['website_link'] );
		}
	?>

		<?php if($settings['select_style']=='one'){ ?>

			<div class="single-image style1">
				<div class="image1">
					<img src="<?php echo $settings['image']['url']; ?>" alt="image1">
				</div>
				<?php if ( 'yes' === $settings['show_image2'] ) { ?>
					<div class="image2">
						<img src="<?php echo $settings['image2']['url']; ?>" alt="image2">
						<?php if ( ! empty( $settings['website_link']['url'] ) ) { ?>
							<div class="video-icon">
								<a class="venobox vbox-item" data-vbtype="youtube" data-autoplay="true" <?php echo $this->get_render_attribute_string( 'website_link' ); ?>><i class="fa fa-play"></i></a>
							</div>
						<?php } ?>
					</div>
				<?php } ?>
				<div class="text-box">
					<div class="box-icon">
						<?php \Elementor\Icons_Manager::render_icon( $settings['select_icon'], [ 'aria-hidden' => 'true' ] ); ?>
						<?php if(!empty($settings['select_img']['url'])){ ?>
							<img src="<?php echo $settings['select_img']['url']; ?>" alt="icon">
						<?php } ?>
					</div>
					<div class="content">
						<h4 class="title"><?php echo $settings['widget_title']; ?></h4>
						<p class="subtitle"><?php echo $settings['widget_subtitle']; ?></p>
					</div>
				</div>
				<?php if(!empty($settings['shape']['url'])){ ?>
					<div class="shape">
						<img src="<?php echo $settings['shape']['url']; ?>" alt="shape">
					</div>
				<?php } ?>
			</div>

		<?php }elseif($settings['select_style']=='two'){ ?>

			<div class="single-image style2">
				<div class="image1">
					<img src="<?php echo $settings['image']['url']; ?>" alt="image1">
				</div>
				<div class="image2">
					<img src="<?php echo $settings['image2']['url']; ?>" alt="image2">
				</div>
				<div class="text-box">
					<div class="content">
						<h4 class="title"><?php echo $settings['widget_title']; ?></h4>
						<p class="subtitle"><?php echo $settings['widget_subtitle']; ?></p>
					</div>
				</div>
				<div class="counter-box">
					<div class="counter">
						<div class="number">
							<h2 class="count percent" data-count="<?php echo $settings['number']; ?>">0</h2>
							<h2 class="suffix"><?php echo $settings['suffix']; ?></h2>
						</div>
						<p class="title"><?php echo $settings['title']; ?></p>
					</div>
				</div>
				<?php if(!empty($settings['shape']['url'])){ ?>
					<div class="shape">
						<img src="<?php echo $settings['shape']['url']; ?>" alt="shape">
					</div>
				<?php } ?>
			</div>

			<script>
				jQuery(document).ready(function($) {
					"use strict";

					var counted = 0;
					$(window).scroll(function() {

						var oTop = $('.counter').offset().top - window.innerHeight;
						if (counted == 0 && $(window).scrollTop() > oTop) {
							$('.count').each(function() {
								var $this = $(this),
								countTo = $this.attr('data-count');
								$({
									countNum: $this.text()
								}).animate({
									countNum: countTo
								},

								{

									duration: 2000,
									easing: 'swing',
									step: function() {
										$this.text(Math.floor(this.countNum));
									},
									complete: function() {
										$this.text(this.countNum);
									}

								});
							});
							counted = 1;
						}

					});
				});
			</script>

		<?php }elseif($settings['select_style']=='three'){ ?>

			<div class="single-image style3">
				<div class="image1">
					<img src="<?php echo $settings['image']['url']; ?>" alt="image1">
				</div>
				<div class="text-box">
					<div class="box-icon">
						<?php \Elementor\Icons_Manager::render_icon( $settings['select_icon'], [ 'aria-hidden' => 'true' ] ); ?>
						<?php if(!empty($settings['select_img'])){ ?>
							<img src="<?php echo $settings['select_img']['url']; ?>" alt="icon">
						<?php } ?>
					</div>
					<div class="content">
						<h3 class="title"><?php echo $settings['widget_title']; ?></h3>
						<p class="subtitle"><?php echo $settings['widget_subtitle']; ?></p>
					</div>
				</div>
			</div>

		<?php }elseif($settings['select_style']=='four'){ ?>

			<div class="single-image style4">
				<div class="image1">
					<img src="<?php echo $settings['image']['url']; ?>" alt="image1">
				</div>
			</div>

		<?php }elseif($settings['select_style']=='five'){ ?>

			<div class="single-image style5">
				
				<div class="image1">
					<img src="<?php echo $settings['image']['url']; ?>" alt="image1">
				</div>
				<div class="counter-box">
					<div class="counter-icon">
							<?php \Elementor\Icons_Manager::render_icon( $settings['select_counter_icon'], [ 'aria-hidden' => 'true' ] ); ?>
							<?php if(!empty($settings['select_img'])){ ?>
								<img src="<?php echo $settings['select_counter_img']['url']; ?>" alt="icon">
							<?php } ?>
							<span></span>
					</div>
					<div class="content">
						<div class="number">
							<h2 class="count percent" data-count="<?php echo $settings['number']; ?>">0</h2>
							<h2 class="suffix"><?php echo $settings['suffix']; ?></h2>
						</div>
						<p class="title"><?php echo $settings['title']; ?></p>
					</div>
				</div>
			</div>

		<?php } ?>

	<?php
	}
}