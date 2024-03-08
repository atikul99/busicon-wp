<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if(!defined('ABSPATH')) exit;

class SectionTitle extends \Elementor\Widget_Base{

	public function get_name(){
		return "sectiontitle";
	}
	
	public function get_title(){
		return "Section Title";
	}
	
	public function get_icon(){
		return "eicon-t-letter";
	}
	public function get_categories(){
		return ['busicon-category'];
	}
	
	protected function register_controls(){

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'busicon-elementor-extension' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

			$this->add_control(
				'subtitle',
				[
					'label' => __( 'Subtitle', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::TEXT,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => __( 'Enter subtitle', 'busicon-elementor-extension' ),
					'label_block' => true,
					'default' => __( 'Section subtitle', 'busicon-elementor-extension' ),
				]
			);
			$this->add_control(
				'section_title',
				[
					'label' => __( 'Title', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::TEXT,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => __( 'Enter title', 'busicon-elementor-extension' ),
					'label_block' => true,
					'default' => __( 'Section Title', 'busicon-elementor-extension' ),
				]
			);
			$this->add_control(
				'description',
				[
					'label' => __( 'Description', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::TEXTAREA,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => __( 'Enter description', 'busicon-elementor-extension' ),
					'label_block' => true,
					'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'busicon-elementor-extension' ),
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
			$this->add_control(
				'text_align',
				[
					'label' => __( 'Text Align', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => [
						'left' => __( 'Left', 'busicon-elementor-extension' ),
						'center' => __( 'Center', 'busicon-elementor-extension' ),
						'right' => __( 'Right', 'busicon-elementor-extension' ),
					],
					'default' => 'left',
					
				]
			);
			$this->add_responsive_control(
				'width',
				[
					'label' => esc_html__( 'Width', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%', 'custom' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .section-title' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);
		$this->end_controls_section();

		$this->start_controls_section(
			'subtitle_style',
			[
				'label' => __( 'Subtitle', 'busicon-elementor-extension' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'subtitle_color',
				[
					'label' => __( 'Color', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .section-title .subtitle' => 'color: {{VALUE}}',
						'{{WRAPPER}} .section-title .subtitle::before' => 'background-color: {{VALUE}}',
						'{{WRAPPER}} .section-title .subtitle::after' => 'background-color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'subtitle_typography',
					'label' => __( 'Typography', 'busicon-elementor-extension' ),
					'selector' => '{{WRAPPER}} .section-title .subtitle',
				]
			);
			$this->add_responsive_control(
				'subtitle_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .section-title .subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

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
						'{{WRAPPER}} .section-title .title' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'label' => __( 'Typography', 'busicon-elementor-extension' ),
					'selector' => '{{WRAPPER}} .section-title .title',
				]
			);
			$this->add_responsive_control(
				'title_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .section-title .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .section-title .description' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'description_typography',
					'label' => __( 'Typography', 'busicon-elementor-extension' ),
					'selector' => '{{WRAPPER}} .section-title .description',
				]
			);
			$this->add_responsive_control(
				'description_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .section-title .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
	}

	protected function render(){

		$settings = $this->get_settings_for_display();

		?>

		<?php if($settings['select_style']=='one'){ ?>

			<div class="section-title style1 <?php echo $settings['text_align']; ?>">
				<?php if(!empty($settings['subtitle'])) { ?>
					<h4 class="subtitle"><?php echo $settings['subtitle']; ?></h4>
				<?php } ?>

				<?php if(!empty($settings['section_title'])) { ?>
					<h1 class="title"><?php echo $settings['section_title']; ?></h1>
				<?php } ?>

				<?php if(!empty($settings['description'])) { ?> 
					<p class="description"><?php echo $settings['description']; ?></p>
				<?php } ?>
			</div>

		<?php }elseif($settings['select_style']=='two'){ ?>

			<div class="section-title style2 <?php echo $settings['text_align']; ?>">
				<?php if(!empty($settings['subtitle'])) { ?>
					<h4 class="subtitle"><?php echo $settings['subtitle']; ?></h4>
				<?php } ?>

				<?php if(!empty($settings['section_title'])) { ?>
					<h1 class="title"><?php echo $settings['section_title']; ?></h1>
				<?php } ?>

				<?php if(!empty($settings['description'])) { ?> 
					<p class="description"><?php echo $settings['description']; ?></p>
				<?php } ?>
			</div>
			
		<?php }elseif($settings['select_style']=='three'){ ?>

			<div class="section-title style3 <?php echo $settings['text_align']; ?>">
				<?php if(!empty($settings['subtitle'])) { ?>
					<h4 class="subtitle"><?php echo $settings['subtitle']; ?></h4>
				<?php } ?>

				<?php if(!empty($settings['section_title'])) { ?>
					<h1 class="title"><?php echo $settings['section_title']; ?></h1>
				<?php } ?>

				<?php if(!empty($settings['description'])) { ?> 
					<p class="description"><?php echo $settings['description']; ?></p>
				<?php } ?>
			</div>

		<?php } ?>

		<?php 
	}

}