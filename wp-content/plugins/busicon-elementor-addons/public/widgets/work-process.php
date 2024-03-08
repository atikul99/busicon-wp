<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if(!defined('ABSPATH')) exit;

class WorkProcess extends Widget_Base{

	public function get_name(){
		return "workprocess";
	}
	
	public function get_title(){
		return "Work Process";
	}
	
	public function get_icon(){
		return "eicon-flow";
	}

	public function get_categories(){
		return ['busicon-category'];
	}

	protected function _register_controls() {
		
		$this->start_controls_section(
			'works_section',
			[
				'label' => __( 'Works', 'busicon-elementor-extension' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'list_number', [
					'label' => __( 'Number', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( '01' , 'busicon-elementor-extension' ),
					'label_block' => true,
				]
			);
			$repeater->add_control(
				'icon',
				[
					'label' => __( 'Icon', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::ICONS,
				]
			);
			$repeater->add_control(
				'list_title', [
					'label' => __( 'Title', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'Soft Manager' , 'busicon-elementor-extension' ),
					'label_block' => true,
				]
			);

			$repeater->add_control(
				'item_description',
				[
					'label' => __( 'Description', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'default' => __( 'IT Asset Management (ITAM) enables organizations..', 'busicon-elementor-extension' ),
					'placeholder' => __( 'Type your description here', 'busicon-elementor-extension' ),
				]
			);

			$this->add_control(
				'list',
				[
					'label' => __( 'Repeater List', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[
							'list_title' => __( 'Soft Manager', 'busicon-elementor-extension' ),
							'item_description' => __( 'IT Asset Management (ITAM) enables organizations..', 'busicon-elementor-extension' ),
						],
						[
							'list_title' => __( 'Soft Manager', 'busicon-elementor-extension' ),
							'item_description' => __( 'IT Asset Management (ITAM) enables organizations..', 'busicon-elementor-extension' ),
						],
					],
					'title_field' => '{{{ list_title }}}',
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
						'{{WRAPPER}} .working-process .process-box' => 'text-align: {{VALUE}};',
					],
				]
			);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'title_style',
			[
				'label' => __( 'Title', 'busicon-elementor-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

    		$this->add_control(
    			'title_color',
    			[
    				'label' => __( 'Color', 'busicon-elementor-extension' ),
    				'type' => \Elementor\Controls_Manager::COLOR,
    				'selectors' => [
    					'{{WRAPPER}} .working-process .process-box .content .process-title' => 'color: {{VALUE}}',
    				],
    			]
    		);
    		$this->add_group_control(
    			\Elementor\Group_Control_Typography::get_type(),
    			[
    				'name' => 'title_typography',
    				'label' => __( 'Typography', 'busicon-elementor-extension' ),
    				'selector' => '{{WRAPPER}} .working-process .process-box .content .process-title',
    			]
    		);
			$this->add_responsive_control(
				'title_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .working-process .process-box .content .process-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			
		$this->end_controls_section();
		
		$this->start_controls_section(
			'description_style',
			[
				'label' => __( 'Description', 'busicon-elementor-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

    		$this->add_control(
    			'description_color',
    			[
    				'label' => __( 'Color', 'busicon-elementor-extension' ),
    				'type' => \Elementor\Controls_Manager::COLOR,
    				'selectors' => [
    					'{{WRAPPER}} .working-process .process-carousel .process-box .content p' => 'color: {{VALUE}}',
    				],
    			]
    		);
    		$this->add_group_control(
    			\Elementor\Group_Control_Typography::get_type(),
    			[
    				'name' => 'description_typography',
    				'label' => __( 'Typography', 'busicon-elementor-extension' ),
    				'selector' => '{{WRAPPER}} .working-process .process-carousel .process-box .content p',
    			]
    		);
			$this->add_responsive_control(
				'description_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .working-process .process-carousel .process-box .content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		?>

		<?php if($settings['select_style']=='one'){ ?>

		<div class="working-process">
			<div class="row process__row">
				<?php foreach (  $settings['list'] as $item ) { ?>
				<div class="col-md-4 col-lg-4">
					<div class="process-box">
						<div class="icon">
							<?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
							<span class="process__number"><?php echo $item['list_number']; ?></span>
						</div>
						<div class="content">
							<h3 class="process-title"><?php echo $item['list_title']; ?></h3>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>

		<?php }elseif($settings['select_style']=='two'){ ?>

		<div class="working-process">
			<div class="working-carousel">
				<div class="process-carousel owl-carousel">
					<?php foreach (  $settings['list'] as $item ) { ?>
					<div class="process-box">
						<div class="icon">
							<?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
						</div>
						<div class="content">
							<h4 class="process-title"><?php echo $item['list_title']; ?></h4>
							<p><?php echo $item['item_description']; ?></p>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>

			<script>
				jQuery(document).ready(function($) {
					"use strict";
					$('.process-carousel').slick({
					    autoplay: true,
					    slidesToShow: 3,
					    slidesToScroll: 3,
					    dots: false,
					    prevArrow:"<button type='button' class='slick-prev'><i class='bi bi-arrow-left-short'></i></button>",
					    nextArrow:"<button type='button' class='slick-next'><i class='bi bi-arrow-right-short'></i></button>",
					    responsive: [
					      {
					        breakpoint: 1200,
					        settings: {
					          slidesToShow: 2,
					          slidesToScroll: 2,
					          infinite: true,
					        }
					      },
					      {
					        breakpoint: 992,
					        settings: {
					          slidesToShow: 1,
					          slidesToScroll: 1,
					        }
					      },
					      {
					        breakpoint: 768,
					        settings: {
					          slidesToShow: 1,
					          slidesToScroll: 1
					        }
					      },
					      {
					        breakpoint: 480,
					        settings: {
					          slidesToShow: 1,
					          slidesToScroll: 1
					        }
					      }
					    ]
					});
				});
			</script>

		<?php } ?>

		<?php
	}
}