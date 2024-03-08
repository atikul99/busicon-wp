<?php

if(!defined('ABSPATH')) exit;

class ServiceBox extends \Elementor\Widget_Base{

	public function get_name(){
		return "service-box";
	}
	
	public function get_title(){
		return "Service Box";
	}
	
	public function get_icon(){
		return "eicon-info-box";
	}
	public function get_categories(){
		return ['busicon-category'];
	}
	
	protected function register_controls(){

		$this->start_controls_section(
			'icon_section',
			[
				'label' => __( 'Icon', 'busicon-elementor-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
			$this->add_control(
				'icons_type',
				[
				    'label' => esc_html__('Icon Type','busicon-elementor-extension'),
				    'type' => \Elementor\Controls_Manager::CHOOSE,
				    'options' =>[
					  'img' =>[
						'title' =>esc_html__('Image','busicon-elementor-extension'),
						'icon' =>'far fa-image',
					  ],
					  'icon' =>[
						'title' =>esc_html__('Icon','busicon-elementor-extension'),
						'icon' =>'fa fa-info',
					  ]
				    ],
				    'default' => 'icon',
				]
			 );
			 $this->add_control(
				'select_icon',
				[
					'label' => esc_html__( 'Icon', 'busicon-elementor-extension' ),
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
				    'label' => esc_html__('Image','busicon-elementor-extension'),
				    'type'=> \Elementor\Controls_Manager::MEDIA,
				    'default' => [
					  'url' => \Elementor\Utils::get_placeholder_image_src(),
				    ],
				    'condition' => [
					  'icons_type' => 'img',
				    ]
				]
			);
		$this->end_controls_section();

		$this->start_controls_section(
			'image_section',
			[
				'label' => __( 'Image', 'busicon-elementor-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
			$this->add_control(
				'single_img',
				[
				    'label' => esc_html__('Image','busicon-elementor-extension'),
				    'type'=> \Elementor\Controls_Manager::MEDIA,
				    'default' => [
					  'url' => \Elementor\Utils::get_placeholder_image_src(),
				    ],
				]
			);
		$this->end_controls_section();

		$this->start_controls_section(
			'service_section',
			[
				'label' => __( 'Title & Description', 'busicon-elementor-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
			$this->add_control(
				'title_number',
				[
					'label' => __( 'Number', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => __( 'Enter Number', 'busicon-elementor-extension' ),
					'label_block' => true,
					'default' => __( '01', 'busicon-elementor-extension' ),
				]
			);
			$this->add_control(
				'title_text',
				[
					'label' => __( 'Title', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => __( 'Enter your title', 'busicon-elementor-extension' ),
					'label_block' => true,
					'default' => __( 'This is the title', 'busicon-elementor-extension' ),
				]
			);
			$this->add_control(
				'description_text',
				[
					'label' => esc_html__( 'Description', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::WYSIWYG,
					'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'busicon-elementor-extension' ),
					'placeholder' => esc_html__( 'Type your description here', 'busicon-elementor-extension' ),
				]
			);
		$this->end_controls_section();

		$this->start_controls_section(
			'button_section',
			[
				'label' => __( 'Button', 'busicon-elementor-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
			$this->add_control(
				'button_text',
				[
					'label' => __( 'Button Text', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => __( 'Enter your button text', 'busicon-elementor-extension' ),
					'label_block' => true,
					'default' => __( 'Button', 'busicon-elementor-extension' ),
				]
			);
			$this->add_control(
				'link',
				[
					'label' => __( 'Link', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::URL,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => __( 'https://your-link.com', 'busicon-elementor-extension' ),
				]
			);
			$this->add_control(
				'show_button',
				[
					'label' => __( 'Show Button', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => __( 'Show', 'busicon-elementor-extension' ),
					'label_off' => __( 'Hide', 'busicon-elementor-extension' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);
			$this->add_control(
				'button_icon',
				[
					'label' => __( 'Button Icon', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'fa fa-angle-right',
						'library' => 'solid',
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
						'four' => __( 'Four', 'busicon-elementor-extension' ),
						'five' => __( 'Five', 'busicon-elementor-extension' ),
						'six' => __( 'Six', 'busicon-elementor-extension' ),
						'seven' => __( 'Seven', 'busicon-elementor-extension' ),
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
						'{{WRAPPER}} .service-box' => 'text-align: {{VALUE}};',
					],
				]
			);
		$this->end_controls_section();

		$this->start_controls_section(
			'icon_section_style',
			[
				'label' => __( 'Icon', 'busicon-elementor-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
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
				'icon_color',
				[
					'label' => __( 'Icon Color', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .service-box .icon i' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_control(
				'icon_background_color',
				[
					'label' => __( 'Background Color', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .service-box .icon i' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'icon_border',
					'label' => __( 'Border', 'busicon-elementor-extension' ),
					'selector' => '{{WRAPPER}} .service-box .icon i',
				]
			);
			$this->add_responsive_control(
				'icon_border_radius',
				[
					'label' => __( 'Border Radius', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .service-box .icon i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'hover_icon_color',
				[
					'label' => __( 'Icon Color', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .service-box:hover .icon i' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_control(
				'hover_background_color',
				[
					'label' => __( 'Background Color', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .service-box:hover .icon i' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'hover_icon_border',
					'label' => __( 'Border', 'busicon-elementor-extension' ),
					'selector' => '{{WRAPPER}} .service-box:hover .icon i',
				]
			);
			$this->add_responsive_control(
				'hover_icon_border_radius',
				[
					'label' => __( 'Border Radius', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .service-box:hover .icon i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		
			$this->add_responsive_control(
				'icon_align',
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
						'{{WRAPPER}} .service-box .icon i' => 'text-align: {{VALUE}};',
					],
				]
			);
			$this->add_responsive_control(
				'icon_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .service-box .icon i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'separator' => 'before',
				]
			);
			$this->add_control(
				'height',
				[
					'label' => __( 'Height', 'busicon-elementor-extension' ),
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
						'{{WRAPPER}} .service-box .icon i' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'width',
				[
					'label' => __( 'Width', 'busicon-elementor-extension' ),
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
						'{{WRAPPER}} .service-box .icon i' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'icon_typography',
					'selector' => '{{WRAPPER}} .service-box .icon i',
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'number_section_style',
			[
				'label' => __( 'Number', 'busicon-elementor-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_control(
				'number_color',
				[
					'label' => __( 'Color', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .service-box .service-number span' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'number_typography',
					'selector' => '{{WRAPPER}} .service-box .service-number span',
				]
			);
			$this->add_responsive_control(
				'number_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .service-box .service-number span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .service-box .title h3' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'selector' => '{{WRAPPER}} .service-box .title h3',
				]
			);
			$this->add_responsive_control(
				'title_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .service-box .title h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		$this->end_controls_section();

		$this->start_controls_section(
			'description_section_style',
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
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .service-box .description p' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'description_typography',
					'selector' => '{{WRAPPER}} .service-box .description p',
				]
			);
			$this->add_responsive_control(
				'description_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .service-box .description p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		$this->end_controls_section();

		$this->start_controls_section(
			'button_section_style',
			[
				'label' => __( 'Button', 'busicon-elementor-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
			$this->start_controls_tabs(
				'button_style_tabs'
			);
				$this->start_controls_tab(
					'button_style_normal_tab',
					[
						'label' => __( 'Normal', 'busicon-elementor-extension' ),
					]
				);
				
					$this->add_control(
						'button_text_color',
						[
							'label' => __( 'Text Color', 'busicon-elementor-extension' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .service-box .service-btn a' => 'color: {{VALUE}};',
							],
						]
					);
					$this->add_control(
						'button_background_color',
						[
							'label' => __( 'Background Color', 'busicon-elementor-extension' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .service-box .service-btn a' => 'background-color: {{VALUE}};',
							],
						]
					);
					$this->add_group_control(
						\Elementor\Group_Control_Border::get_type(),
						[
							'name' => 'button_border',
							'label' => __( 'Border', 'busicon-elementor-extension' ),
							'selector' => '{{WRAPPER}} .service-box .service-btn a',
						]
					);
					$this->add_responsive_control(
						'button_border_radius',
						[
							'label' => __( 'Border Radius', 'busicon-elementor-extension' ),
							'type' => \Elementor\Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .service-box .service-btn a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
				$this->end_controls_tab();
				
				$this->start_controls_tab(
					'button_style_hover_tab',
					[
						'label' => __( 'Hover', 'busicon-elementor-extension' ),
					]
				);

					$this->add_control(
						'hover_button_text_color',
						[
							'label' => __( 'Text Color', 'busicon-elementor-extension' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .service-box .service-btn a:hover' => 'color: {{VALUE}};',
							],
						]
					);
					$this->add_control(
						'hover_button_background_color',
						[
							'label' => __( 'Background Color', 'busicon-elementor-extension' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .service-box .service-btn a:hover' => 'background-color: {{VALUE}};',
							],
						]
					);
					$this->add_group_control(
						\Elementor\Group_Control_Border::get_type(),
						[
							'name' => 'hover_button_border',
							'label' => __( 'Border', 'busicon-elementor-extension' ),
							'selector' => '{{WRAPPER}} .service-box .service-btn a:hover',
						]
					);
					$this->add_responsive_control(
						'hover_button_border_radius',
						[
							'label' => __( 'Border Radius', 'busicon-elementor-extension' ),
							'type' => \Elementor\Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .service-box .service-btn a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
				$this->end_controls_tab();
				
			$this->end_controls_tabs();

			$this->add_responsive_control(
				'button_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .service-box .service-btn a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'separator' => 'before',
				]
			);
			$this->add_responsive_control(
				'button_padding',
				[
					'label' => __( 'Padding', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .service-box .service-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'separator' => 'before',
				]
			);
			$this->add_control(
				'button_height',
				[
					'label' => __( 'Height', 'busicon-elementor-extension' ),
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
						'{{WRAPPER}} .service-box .service-btn a' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'button_width',
				[
					'label' => __( 'Width', 'busicon-elementor-extension' ),
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
						'{{WRAPPER}} .service-box .service-btn a' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'button_typography',
					'selector' => '{{WRAPPER}} .service-box .service-btn a',
				]
			);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		
		?>

		<?php if($settings['select_style']=='one'){ ?>

			<div class="service-box style1">
				<div class="image">
					<img src="<?php echo $settings['single_img']['url']; ?>" alt="">
				</div>
				<div class="content">
					<div class="icon">
						<?php \Elementor\Icons_Manager::render_icon( $settings['select_icon'], [ 'aria-hidden' => 'true' ] ); ?>
						<img src="<?php echo $settings['select_img']['url']; ?>">
					</div>
					<div class="text">
						<div class="title">
							<h4><?php echo $settings['title_text']; ?></h4>
						</div>
						<div class="description">
							<p><?php echo $settings['description_text']; ?></p>
						</div>
					</div>
					<div class="button">
						<a href="<?php echo esc_url($settings['link']['url']); ?>">
							<?php echo $settings['button_text']; ?>
							<?php \Elementor\Icons_Manager::render_icon( $settings['button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
						</a>
					</div>
				</div>
			</div>

		<?php }elseif($settings['select_style']=='two'){ ?>

			<div class="service-box style2">
				<span class="number"><?php echo $settings['title_number']; ?></span>
				<div class="icon">
					<?php \Elementor\Icons_Manager::render_icon( $settings['select_icon'], [ 'aria-hidden' => 'true' ] ); ?>
					<?php if(!empty($settings['select_img'])){ ?>
						<img src="<?php echo $settings['select_img']['url']; ?>">
					<?php } ?>
				</div>
				<div class="content">
					<div class="title">
						<h3><?php echo $settings['title_text']; ?></h3>
					</div>
					<div class="description">
						<p><?php echo $settings['description_text']; ?></p>
					</div>
					<div class="service-btn">
						<a class="service-btn" href="<?php echo esc_url($settings['link']['url']); ?>">
							<?php echo $settings['button_text']; ?>
							<?php \Elementor\Icons_Manager::render_icon( $settings['button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
						</a>
					</div>
				</div>
			</div>

		<?php }elseif($settings['select_style']=='three'){ ?>

			<div class="service-box style3">
				<div class="image">
					<img src="<?php echo $settings['single_img']['url']; ?>" alt="">
				</div>
				<div class="content">
					<div class="icon">
						<?php \Elementor\Icons_Manager::render_icon( $settings['select_icon'], [ 'aria-hidden' => 'true' ] ); ?>
					</div>
					<div class="text">
						<div class="title">
							<h3><?php echo $settings['title_text']; ?></h3>
						</div>
						<div class="description">
							<p><?php echo $settings['description_text']; ?></p>
						</div>
					</div>
				</div>
			</div>

		<?php }elseif($settings['select_style']=='four'){ ?>

			<div class="service-box style4">
				<div class="content">
					<div class="icon">
						<?php \Elementor\Icons_Manager::render_icon( $settings['select_icon'], [ 'aria-hidden' => 'true' ] ); ?>
					</div>
					<div class="text">
						<div class="title">
							<h4><?php echo $settings['title_text']; ?></h4>
						</div>
						<div class="description">
							<p><?php echo $settings['description_text']; ?></p>
						</div>
						<?php if( 'yes'===$settings['show_button'] ){ ?>
						<div class="service-btn">
							<a href="<?php echo esc_url($settings['link']['url']); ?>">Read More <?php \Elementor\Icons_Manager::render_icon( $settings['button_icon'], [ 'aria-hidden' => 'true' ] ); ?></a>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>

		<?php }elseif($settings['select_style']=='five'){ ?>

			<div class="service-box style5">
			    <div class="image">
					<img src="<?php echo $settings['single_img']['url']; ?>" alt="">
				</div>
				<div class="content">
					<div class="text">
						<div class="title">
							<h3><?php echo $settings['title_text']; ?></h3>
						</div>
						<div class="description">
							<p><?php echo $settings['description_text']; ?></p>
						</div>
					</div>
					<?php if( 'yes'===$settings['show_button'] ){ ?>
						<div class="service-btn">
							<a href="<?php echo esc_url($settings['link']['url']); ?>"><?php echo $settings['button_text']; ?><?php \Elementor\Icons_Manager::render_icon( $settings['button_icon'], [ 'aria-hidden' => 'true' ] ); ?></a>
						</div>
					<?php } ?>
				</div>
			</div>

		<?php }elseif($settings['select_style']=='six'){ ?>

			<div class="service-box style6">
				<div class="content">
					<div class="text">
						<div class="title">
							<h3><?php echo $settings['title_text']; ?></h3>
						</div>
						<div class="description">
							<p><?php echo $settings['description_text']; ?></p>
						</div>
						<a href="<?php echo esc_url($settings['link']['url']); ?>">Read More</a>
					</div>
				</div>
				<div class="image" style="background-image: url(<?php echo $settings['single_img']['url']; ?>); background-repeat: no-repeat; background-position: center;">
					
				</div>
			</div>

		<?php }elseif($settings['select_style']=='seven'){ ?>

			<div class="service-box style7" style="background-image: url(<?php echo $settings['single_img']['url']; ?>); background-repeat: no-repeat; background-size: cover; background-position: center;">
				<div class="content">

					<?php if($settings['icons_type'] == 'icon' ){ ?>
					<div class="icon">
						<?php \Elementor\Icons_Manager::render_icon( $settings['select_icon'], [ 'aria-hidden' => 'true' ] ); ?>
					</div>
					<?php } ?>

					<div class="service-box-content">

						<div class="title">
							<h3><?php echo $settings['title_text']; ?></h3>
						</div>

						<div class="description">
							<p><?php echo $settings['description_text']; ?></p>
						</div>

						<?php if( 'yes'===$settings['show_button'] ){ ?>
						<div class="service-btn">
							<a href="<?php echo esc_url($settings['link']['url']); ?>">
								<?php echo $settings['button_text']; ?>
								<i <?php echo $this->get_render_attribute_string( 'j' ); ?>></i>
							</a>
						</div>
						<?php } ?>

					</div>
				</div>
			</div>

		<?php }
	}
}

