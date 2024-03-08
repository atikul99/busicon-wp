<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Stroke;

if(!defined('ABSPATH')) exit;

class busiconHeading extends \Elementor\Widget_Base{

	public function get_name(){
		return "busicon-heading";
	}
	
	public function get_title(){
		return "Heading";
	}
	
	public function get_icon(){
		return "eicon-heading";
	}
	public function get_categories(){
		return ['busicon-category'];
	}
	
	protected function _register_controls(){

		$this->start_controls_section(
			'text_section',
			[
				'label' => __( 'Text', 'busicon-elementor-extension' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
			
			$this->add_control(
				'heading',
				[
					'label' => __( 'Heading', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::TEXTAREA,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => __( 'Enter heading', 'busicon-elementor-extension' ),
					'default' => __( 'Default Heading', 'busicon-elementor-extension' ),
				]
			);
			$this->add_control(
				'header_size',
				[
					'label' => esc_html__( 'HTML Tag', 'elementor' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'h1' => 'H1',
						'h2' => 'H2',
						'h3' => 'H3',
						'h4' => 'H4',
						'h5' => 'H5',
						'h6' => 'H6',
						'div' => 'div',
						'span' => 'span',
						'p' => 'p',
					],
					'default' => 'h2',
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
						'{{WRAPPER}} .heading' => 'text-align: {{VALUE}};',
					],
				]
			);

		$this->end_controls_section();


		$this->start_controls_section(
			'heading_style',
			[
				'label' => __( 'Heading', 'busicon-elementor-extension' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'heading_color',
				[
					'label' => __( 'Color', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .heading .heading-text' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'heading_typography',
					'label' => __( 'Typography', 'busicon-elementor-extension' ),
					'selector' => '{{WRAPPER}} .heading .heading-text',
				]
			);
			$this->add_group_control(
				Group_Control_Text_Stroke::get_type(),
				[
					'name' => 'text_stroke',
					'selector' => '{{WRAPPER}} .heading .heading-text',
				]
			);
			$this->add_responsive_control(
				'heading_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .heading .heading-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			
		$this->end_controls_section();

	}

	protected function render(){

		$settings = $this->get_settings_for_display();

		?>

			<div class="heading">
				<<?php echo $settings['header_size']; ?> class="heading-text"><?php echo $settings['heading']; ?></<?php echo $settings['header_size']; ?>>
			</div>

		<?php
	}

}