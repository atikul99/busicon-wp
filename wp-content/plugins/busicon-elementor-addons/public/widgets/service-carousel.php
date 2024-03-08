<?php



use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if(!defined('ABSPATH')) exit;


class ServiceCarousel extends Widget_Base{

	public function get_name(){
		return "servicecarousel";
	}
	
	public function get_title(){
		return "Service Carousel";
	}
	
	public function get_icon(){
		return "eicon-slides";
	}
	public function get_categories(){
		return ['busicon-category'];
	}
	
	protected function _register_controls(){

		$this->start_controls_section(
			'slider', [
				'label' => __( 'Services', 'busicon-elementor-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'slides', [
				'label' => __( 'Slide items', 'busicon-elementor-extension' ),
				'type' => Controls_Manager::REPEATER,
				'title_field' => '{{{title_text}}}',
				'fields' => [
					
					[
						'name' => 'icon',
						'label' => __( 'Icon', 'busicon-elementor-extension' ),
						'type' => Controls_Manager::ICONS,
					],
					[
						'name' => 'number',
						'label' => __( 'Number', 'busicon-elementor-extension' ),
						'type' => Controls_Manager::TEXT,
						'dynamic' => [
							'active' => true,
						],
						'placeholder' => __( 'Enter your number', 'busicon-elementor-extension' ),
						'label_block' => true,
						'default' => __( '01', 'busicon-elementor-extension' ),
					],
					[
						'name' => 'title_text',
						'label' => __( 'Title', 'busicon-elementor-extension' ),
						'type' => Controls_Manager::TEXT,
						'dynamic' => [
							'active' => true,
						],
						'placeholder' => __( 'Enter your title', 'busicon-elementor-extension' ),
						'label_block' => true,
						'default' => __( 'SEO Optimization', 'busicon-elementor-extension' ),
					],
					[
						'name' => 'description_text',
						'label' => __( 'Description', 'busicon-elementor-extension' ),
						'type' => Controls_Manager::TEXTAREA,
						'dynamic' => [
							'active' => true,
						],
						'placeholder' => __( 'Enter your paragraph', 'busicon-elementor-extension' ),
						'default' => __( 'Digital Revolution brings new channel such as mobile apps and eBooks. Will they try their best' ),
					],
					
					[
						'name' => 'button_text',
						'label' => __( 'Button Text', 'busicon-elementor-extension' ),
						'type' => Controls_Manager::TEXT,
						'dynamic' => [
							'active' => true,
						],
						'placeholder' => __( 'Click Here', 'busicon-elementor-extension' ),
						'label_block' => true,
						'default' => __( 'Read More', 'busicon-elementor-extension' ),
					],
					[
						'name' => 'link',
						'label' => __( 'Link', 'busicon-elementor-extension' ),
						'type' => Controls_Manager::URL,
						'dynamic' => [
							'active' => true,
						],
						'placeholder' => __( 'https://your-link.com', 'busicon-elementor-extension' ),
						'separator' => 'before',
					],
					[
						'name' => 'show_button',
						'label' => __( 'Show Button', 'busicon-elementor-extension' ),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => __( 'Show', 'busicon-elementor-extension' ),
						'label_off' => __( 'Hide', 'busicon-elementor-extension' ),
						'return_value' => 'yes',
						'default' => 'yes',
					],
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
				'label' => __( 'General', 'busicon-elementor-extension' ),
				'tab' => Controls_Manager::TAB_STYLE,
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
					],
					'default' => 'one',
					
				]
			);

			$this->add_responsive_control(
				'text_align',
				[
					'label' => __( 'Alignment', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::CHOOSE,
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
						'{{WRAPPER}} .service-section .service-box' => 'text-align: {{VALUE}};',
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'icon_section_style',
			[
				'label' => __( 'Icon', 'busicon-elementor-extension' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition'=>[
					'select_style'=> 'two',
				],
			]
		);
		$this->start_controls_tabs(
			'style_tabs'
		);
		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => __( 'Normal', 'busicon-elementor-extension' ),
			]
		);
			$this->add_control(
				'primary_color',
				[
					'label' => __( 'Primary Color', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .service-box .service-box-icon i' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_control(
				'background_color',
				[
					'label' => __( 'Background Color', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .service-box .service-box-icon i' => 'background-color: {{VALUE}};',
					],
				]
			);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => __( 'Hover', 'busicon-elementor-extension' ),
			]
		);
			$this->add_control(
				'hover_primary_color',
				[
					'label' => __( 'Primary Color', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .service-box:hover .service-box-icon i' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_control(
				'hover_background_color',
				[
					'label' => __( 'Background Color', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .service-box:hover .service-box-icon i' => 'background-color: {{VALUE}};',
					],
				]
			);
		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'title_style',
			[
				'label' => __( 'Title', 'busicon-elementor-extension' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'title_color',
				[
					'label' => __( 'Color', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .service-section .service-box .title h3' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'selector' => '{{WRAPPER}} .service-section .service-box .title h3',
				]
			);
			$this->add_responsive_control(
				'title_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .service-section .service-box .title h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'description_style',
			[
				'label' => __( 'Description', 'busicon-elementor-extension' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'description_color',
				[
					'label' => __( 'Color', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .service-section .service-box .description p' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'description_typography',
					'selector' => '{{WRAPPER}} .service-section .service-box .description p',
				]
			);
			$this->add_responsive_control(
				'description_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .service-section .service-box .description p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'button_style',
			[
				'label' => __( 'Button', 'busicon-elementor-extension' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'button_color',
				[
					'label' => __( 'Color', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .service-section .service-box .service-button a' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'button_typography',
					'selector' => '{{WRAPPER}} .service-section .service-box .service-button a',
				]
			);
			$this->add_responsive_control(
				'button_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .service-section .service-box .service-button a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control(
				'button_padding',
				[
					'label' => __( 'Padding', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .service-section .service-box .service-button a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		
	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		
		?>

		<?php if($settings['select_style']=='one'){ ?>

			<div class="service-section">
				<div class="service-carousel owl-carousel">
					<?php foreach (  $settings['slides'] as $item ) { ?>
					<div class="service-box">
						<span class="number"><?php echo $item['number']; ?></span>
						<div class="title">
							<h3><?php echo $item['title_text']; ?></h3>
						</div>
						<div class="description">
							<p><?php echo $item['description_text']; ?></p>
						</div>
						<div class="service-button">
							<a href="<?php echo esc_url($item['link']['url']); ?>"><?php echo $item['button_text']; ?></a>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>

			<script>
				jQuery(document).ready(function($) {
					"use strict";
					$(".service-carousel").owlCarousel({
					    items:3,
					    nav:false,
					    dots:true,
					    margin:30,
					    loop:true,
					    autoplay:true,
					    responsive:{
						    0:{
						      items:1
						    },
						    768:{
						      items:2
						    },
						    992:{
						      items:2
						    },
						    1000:{
						      items:3
						    }
					    }
					});
				});
			</script>

		<?php }elseif($settings['select_style']=='two'){ ?>

				<section class="service_cursousel_sliderr">

					<?php foreach ($slides as $slide) { 
						$this->add_render_attribute( 'i', 'class', $slide['icon'] );
						$this->add_render_attribute( 'j', 'class', $slide['button_icon'] );
					?>
					<div class="service-box service-style-two">

							<div class="service-box-icon">
								<i <?php echo $this->get_render_attribute_string( 'i' ); ?>></i>
							</div>

						<div class="service-box-content">

							<div <?php echo $this->get_render_attribute_string( 'title_text' ); ?> >
								<h3><?php echo $slide['title_text']; ?></h3>
							</div>

							<div <?php echo $this->get_render_attribute_string( 'description_text' ); ?> >
								<p><?php echo $slide['description_text']; ?></p>
							</div>

							<?php if( 'yes'===$slide['show_button'] ){ ?>
							<div class="service-btn">
								<a href="<?php echo esc_url($slide['link']['url']); ?>">
									<?php echo $slide['button_text']; } ?>
									<i <?php echo $this->get_render_attribute_string( 'j' ); ?>></i>
								</a>
							</div>						
						</div>
					</div>
					<?php } ?>
				</section>

	            <script>
	                jQuery(document).ready(function() {
	                    jQuery(".service_cursousel_sliderr").slick({
	                        <?php
	                        if(is_rtl()) { ?>
	                            dots: true,
	                            infinite: true,
	                            autoplay: false,
	                            autoplaySpeed: 7000,
	                            centerPadding: '0',
	                            arrows: false,
	                        <?php }else { ?>
	                            dots: true,
	                            infinite: true,
	                            centerMode: true,
	                            autoplay: true,
	                            autoplaySpeed: 7000,
	                            slidesToShow: 3,
	                            slidesToScroll: 3,
	                            centerPadding: '0',
	                            arrows: false
	                        <?php } ?>
	                    });
	                });
	            </script>



		<?php } ?>

		<?php
	}
}

