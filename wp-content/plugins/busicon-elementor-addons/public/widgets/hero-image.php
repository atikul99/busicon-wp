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
				'label' => __( 'Image', 'busicon-elementor-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

			$this->add_control(
				'image',
				[
					'label' => esc_html__( 'Choose Image', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
				]
			);

			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'social_icon',
				[
					'label' => esc_html__( 'Icon', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'fa4compatibility' => 'social',
					'default' => [
						'value' => 'fab fa-wordpress',
						'library' => 'fa-brands',
					],
					'recommended' => [
						'fa-brands' => [
							'android',
							'apple',
							'behance',
							'bitbucket',
							'codepen',
							'delicious',
							'deviantart',
							'digg',
							'dribbble',
							'elementor',
							'facebook',
							'flickr',
							'foursquare',
							'free-code-camp',
							'github',
							'gitlab',
							'globe',
							'houzz',
							'instagram',
							'jsfiddle',
							'linkedin',
							'medium',
							'meetup',
							'mix',
							'mixcloud',
							'odnoklassniki',
							'pinterest',
							'product-hunt',
							'reddit',
							'shopping-cart',
							'skype',
							'slideshare',
							'snapchat',
							'soundcloud',
							'spotify',
							'stack-overflow',
							'steam',
							'telegram',
							'thumb-tack',
							'tripadvisor',
							'tumblr',
							'twitch',
							'twitter',
							'viber',
							'vimeo',
							'vk',
							'weibo',
							'weixin',
							'whatsapp',
							'wordpress',
							'xing',
							'yelp',
							'youtube',
							'500px',
						],
						'fa-solid' => [
							'envelope',
							'link',
							'rss',
						],
					],
				]
			);
			$repeater->add_control(
				'link',
				[
					'label' => esc_html__( 'Link', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::URL,
					'default' => [
						'is_external' => 'true',
					],
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => esc_html__( 'https://your-link.com', 'busicon-elementor-extension' ),
				]
			);

			$this->add_control(
				'social_icons',
				[
					'label' => esc_html__( 'Social Icons', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[
							'social_icon' => [
								'value' => 'fab fa-facebook',
								'library' => 'fa-brands',
							],
						],
						[
							'social_icon' => [
								'value' => 'fab fa-twitter',
								'library' => 'fa-brands',
							],
						],
						[
							'social_icon' => [
								'value' => 'fab fa-youtube',
								'library' => 'fa-brands',
							],
						],
						[
							'social_icon' => [
								'value' => 'fab fa-behance',
								'library' => 'fa-brands',
							],
						],
					],
					'title_field' => '<# var migrated = "undefined" !== typeof __fa4_migrated, social = ( "undefined" === typeof social ) ? false : social; #>{{{ elementor.helpers.getSocialNetworkNameFromIcon( social_icon, social, true, migrated, true ) }}}',
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
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => [
						'one' => __( 'One', 'busicon-elementor-extension' ),
						'two' => __( 'Two', 'busicon-elementor-extension' ),
						'three' => __( 'Three', 'busicon-elementor-extension' ),

					],
					'default' => 'one',
					
				]
			);
			$this->add_responsive_control(
				'text_align',
				[
					'label' => __( 'Alignment', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => __( 'Left', 'busicon-elementor-extension' ),
							'icon' => 'eicon-text-align-left',
						],
						'center' => [
							'title' => __( 'Center', 'busicon-elementor-extension' ),
							'icon' => 'eicon-text-align-center',
						],
						'right' => [
							'title' => __( 'Right', 'busicon-elementor-extension' ),
							'icon' => 'eicon-text-align-right',
						],
						'justify' => [
							'title' => __( 'Justified', 'busicon-elementor-extension' ),
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
				'label' => __( 'Image', 'busicon-elementor-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'height',
				[
					'label' => esc_html__( 'Height', 'busicon-elementor-extension' ),
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
						'{{WRAPPER}} .single-image img' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'width',
				[
					'label' => esc_html__( 'Width', 'busicon-elementor-extension' ),
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
						'{{WRAPPER}} .single-image img' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'border_style',
			[
				'label' => __( 'Border', 'busicon-elementor-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'border_color',
			[
				'label' => esc_html__( 'Color', 'busicon-elementor-extension' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-image.style1::before' => 'background-color: {{VALUE}}',
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
					<div class="circle1 rotate">
						<?php foreach (  $settings['social_icons'] as $item ) { ?>
							<a href="<?php echo esc_url($item['link']['url']); ?>"><?php \Elementor\Icons_Manager::render_icon( $item['social_icon'], [ 'aria-hidden' => 'true' ] ); ?></a>
						<?php } ?>
						<!-- <a href="#"><i class="bi bi-twitter"></i></a>
						<a href="#"><i class="bi bi-whatsapp"></i></a>
						<a href="#"><i class="bi bi-dribbble"></i></a> -->
					</div>
					<img src="<?php echo $settings['image']['url']; ?>" alt="">
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