<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if(!defined('ABSPATH')) exit;

class busiconButton extends \Elementor\Widget_Base{

	public function get_name(){
		return "busiconbutton";
	}
	
	public function get_title(){
		return "Button";
	}
	
	public function get_icon(){
		return "eicon-button";
	}

	public function get_categories(){
		return ['busicon-category'];
	}

	protected function _register_controls(){

		$this->start_controls_section(
			'button_section',
			[
				'label' => __( 'Button', 'busicon-elementor-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
			$this->add_control(
				'button_text',
				[
					'label' => __( 'Button Text', 'busicon-elementor-addons' ),
					'type' => Controls_Manager::TEXT,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => __( 'Enter your button text', 'busicon-elementor-addons' ),
					'label_block' => true,
					'default' => __( 'Button', 'busicon-elementor-addons' ),
				]
			);
			$this->add_control(
				'button_url',
				[
					'label' => __( 'Button URL', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::URL,
					'placeholder' => __( 'https://your-link.com', 'busicon-elementor-addons' ),
				]
			);

			$this->add_control(
				'button_icon',
				[
					'label' => __( 'Button Icon', 'busicon-elementor-addons' ),
					'type' => Controls_Manager::ICONS,
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
					'type' => Controls_Manager::SELECT,
					'options' => [
						'one' => __( 'One', 'busicon-elementor-addons' ),
						'two' => __( 'Two', 'busicon-elementor-addons' ),
						'three' => __( 'Three', 'busicon-elementor-addons' ),
						'four' => __( 'App Store', 'busicon-elementor-addons' ),

					],
					'default' => 'one',
					
				]
			);
			$this->add_responsive_control(
				'text_align',
				[
					'label' => __( 'Alignment', 'busicon-elementor-addons' ),
					'type' => Controls_Manager::CHOOSE,
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
						'{{WRAPPER}} .single-button' => 'text-align: {{VALUE}};',
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'button_style',
			[
				'label' => __( 'Button', 'busicon-elementor-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
			$this->start_controls_tabs(
				'style_tabs'
			);

			$this->start_controls_tab(
				'style_normal_tab',
				[
					'label' => esc_html__( 'Normal', 'busicon-elementor-addons' ),
				]
			);

				$this->add_control(
					'text_color',
					[
						'label' => __( 'Color', 'busicon-elementor-addons' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .single-button a' => 'color: {{VALUE}}',
						],
					]
				);
				
                $this->add_group_control(
                    \Elementor\Group_Control_Background::get_type(),
                    [
					    'name' => 'button_background',
					    'types' => [ 'classic', 'gradient' ],
					    'fields_options' => [
						    'color' => [
							    'selectors' => [
								    '{{SELECTOR}}' => 'background: {{VALUE}};',
							    ],
						    ]
					    ],
					    'selector' => '{{WRAPPER}} .single-button a',
                    ]
                );
				
			$this->end_controls_tab();

			$this->start_controls_tab(
				'style_hover_tab',
				[
					'label' => esc_html__( 'Hover', 'busicon-elementor-addons' ),
				]
			);

				$this->add_control(
					'text_hover_color',
					[
						'label' => __( 'Color', 'busicon-elementor-addons' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .single-button a:hover' => 'color: {{VALUE}}',
						],
					]
				);
				$this->add_group_control(
					\Elementor\Group_Control_Background::get_type(),
					[
						'name' => 'hover_button_background',
						'types' => [ 'classic', 'gradient' ],
						'selector' => '{{WRAPPER}} .single-button a:hover',
					]
				);
				$this->add_control(
					'hover_background_overlay',
					[
						'label' => __( 'Background Overlay', 'busicon-elementor-addons' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .single-button a:hover::before' => 'background-color: {{VALUE}}',
						],
						'conditions' => [
							'relation' => 'or',
							'terms' => [
								[
									'terms' => [
										[
											'name' => 'select_style',
											'operator' => '==',
											'value' => 'one'
										],
									]
								],
								[
									'terms' => [
										[
											'name' => 'select_style',
											'operator' => '==',
											'value' => 'two'
										],
									]
								]
							]
						]
					]
				);
			$this->end_controls_tab();

			$this->end_controls_tabs();

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'button_border',
					'selector' => '{{WRAPPER}} .single-button a',
				]
			);
            $this->add_responsive_control(
                'button_padding',
                [
                    'label' => __( 'Padding', 'busicon-elementor-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .single-button a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

			<div class="single-button style1">
				<a class="button" href="<?php echo esc_url($settings['button_url']['url']); ?>">
					<?php echo $settings['button_text']; ?>
					<i class="<?php echo esc_attr($settings['button_icon']['value']); ?>"></i>
				</a>
			</div>

		<?php }elseif($settings['select_style']=='two'){ ?>	

			<div class="single-button style2">
				<a class="button" href="<?php echo esc_url($settings['button_url']['url']); ?>">
					<?php echo $settings['button_text']; ?>
					<?php \Elementor\Icons_Manager::render_icon( $settings['button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				</a>
			</div>

		<?php }elseif($settings['select_style']=='three'){ ?>

			<div class="single-button style3">
				<a class="button" href="<?php echo esc_url($settings['button_url']['url']); ?>">
					<?php echo $settings['button_text']; ?>
					<?php \Elementor\Icons_Manager::render_icon( $settings['button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				</a>
			</div>

		<?php }elseif($settings['select_style']=='four'){ ?>

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