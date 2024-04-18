<?php

if(!defined('ABSPATH')) exit;

class HeroText extends \Elementor\Widget_Base{

	public function get_name(){
		return "herotext";
	}
	
	public function get_title(){
		return "Hero Text";
	}
	
	public function get_icon(){
		return "eicon-text-area";
	}

	public function get_categories(){
		return ['busicon-category'];
	}

	protected function register_controls() {
		
        $this->start_controls_section(
            'text_section',
            [
                'label' => __( 'Text', 'busicon-elementor-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

            $this->add_control(
                'subtitle', [
                    'label' => __( 'Subtitle', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Business Solution' , 'busicon-elementor-addons' ),
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'title', [
                    'label' => __( 'Title', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Simplifying your life one step' , 'busicon-elementor-addons' ),
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'description',
                [
                    'label' => __( 'Description', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'rows' => 10,
                    'default' => __( 'The construction industry plays a crucial role in the development of cities and communities It involves the planning.', 'busicon-elementor-addons' ),
                    'placeholder' => __( 'Type your description here', 'busicon-elementor-addons' ),
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'button1_section',
            [
                'label' => __( 'Button 1', 'busicon-elementor-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

            $this->add_control(
                'button1_icon',
                [
                    'label' => __( 'Icon', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'fa-solid fa-arrow-right',
                        'library' => 'fa-solid',
                    ],
                ]
            );
            $this->add_control(
                'button1_text',
                [
                    'label' => __( 'Button Text', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'placeholder' => __( 'Enter your button text', 'busicon-elementor-addons' ),
                    'label_block' => true,
                    'default' => __( 'Button', 'busicon-elementor-addons' ),
                ]
            );
            $this->add_control(
                'button1_link',
                [
                    'label' => __( 'Button URL', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'default' => [
                        'url' => '#',
                        'is_external' => false,
                        'nofollow' => false,
                        // 'custom_attributes' => '',
                    ],
                    'placeholder' => __( 'https://your-link.com', 'busicon-elementor-addons' ),
                ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
            'button2_section',
            [
                'label' => __( 'Button 2', 'busicon-elementor-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

            $this->add_control(
                'show_button2',
                [
                    'label' => esc_html__( 'Show Button', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'busicon-elementor-addons' ),
                    'label_off' => esc_html__( 'Hide', 'busicon-elementor-addons' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
            $this->add_control(
                'button2_icon',
                [
                    'label' => __( 'Icon', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'bi bi-play',
                    ],
                ]
            );
            $this->add_control(
                'button2_subtitle',
                [
                    'label' => __( 'Subtitle', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'placeholder' => __( 'Enter your subtitle', 'busicon-elementor-addons' ),
                    'label_block' => true,
                    'default' => __( 'Need help?', 'busicon-elementor-addons' ),
                ]
            );
            $this->add_control(
                'button2_title',
                [
                    'label' => __( 'Title', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'placeholder' => __( 'Enter your title', 'busicon-elementor-addons' ),
                    'label_block' => true,
                    'default' => __( '(808)-555-0111', 'busicon-elementor-addons' ),
                ]
            );
            $this->add_control(
                'button2_link',
                [
                    'label' => __( 'Button URL', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'default' => [
                        'url' => '#',
                        'is_external' => false,
                        'nofollow' => false,
                        // 'custom_attributes' => '',
                    ],
                    'placeholder' => __( 'https://your-link.com', 'busicon-elementor-addons' ),
                ]
            );
        $this->end_controls_section();

/**
 * Style Tab
 */

        $this->start_controls_section(
            'general_section', [
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
                    ],
                    'default' => 'one',
                ]
            );

        $this->end_controls_section();

        //------------------------------ Style subtitle ------------------------------
        $this->start_controls_section(
            'style_subtitle', [
                'label' => __( 'Subtitle', 'busicon-elementor-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'color_subtitle', [
                    'label' => __( 'Text Color', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .hero-text .subtitle' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(), [
                    'name' => 'typography_subtitle',
                    'selector' => '{{WRAPPER}} .hero-text .subtitle',
                ]
            );
            $this->add_responsive_control(
                'subtitle_margin',
                [
                    'label' => __( 'Margin', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .hero-text .subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

        //------------------------------ Style Title ------------------------------
        $this->start_controls_section(
            'style_title', [
                'label' => __( 'Title', 'busicon-elementor-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'color_title', [
                    'label' => __( 'Text Color', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .hero-text .title' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(), [
                    'name' => 'typography_title',
                    'selector' => '{{WRAPPER}} .hero-text .title',
                ]
            );
            $this->add_responsive_control(
                'title_margin',
                [
                    'label' => __( 'Margin', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .hero-text .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
        $this->end_controls_section();

        //------------------------------ Description ------------------------------
        $this->start_controls_section(
            'style_description', [
                'label' => __( 'Description', 'busicon-elementor-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'color_description', [
                    'label' => __( 'Text Color', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .hero-text .description' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(), [
                    'name' => 'typography_description',
                    'selector' => '{{WRAPPER}} .hero-text .description',
                ]
            );
            $this->add_responsive_control(
                'description_margin',
                [
                    'label' => __( 'Margin', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .hero-text .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'button1_style', [
                'label' => __( 'Button 1', 'busicon-elementor-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            $this->start_controls_tabs(
                'button_style_tabs'
            );
                $this->start_controls_tab(
                    'button_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'busicon-elementor-addons' ),
                    ]
                );
                
                    $this->add_control(
                        'button_text_color',
                        [
                            'label' => __( 'Text Color', 'busicon-elementor-addons' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .hero-text .button' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'button_background_color',
                        [
                            'label' => __( 'Background Color', 'busicon-elementor-addons' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .hero-text .button' => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        \Elementor\Group_Control_Border::get_type(),
                        [
                            'name' => 'button_border',
                            'label' => __( 'Border', 'busicon-elementor-addons' ),
                            'selector' => '{{WRAPPER}} .hero-text .button',
                        ]
                    );
                    $this->add_responsive_control(
                        'button_border_radius',
                        [
                            'label' => __( 'Border Radius', 'busicon-elementor-addons' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .hero-text .button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );
                $this->end_controls_tab();
                
                $this->start_controls_tab(
                    'button_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'busicon-elementor-addons' ),
                    ]
                );

                    $this->add_control(
                        'hover_button_text_color',
                        [
                            'label' => __( 'Text Color', 'busicon-elementor-addons' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .hero-text .button:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'hover_button_background_color',
                        [
                            'label' => __( 'Background Color', 'busicon-elementor-addons' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .hero-text .button:hover::after' => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        \Elementor\Group_Control_Border::get_type(),
                        [
                            'name' => 'hover_button_border',
                            'label' => __( 'Border', 'busicon-elementor-addons' ),
                            'selector' => '{{WRAPPER}} .hero-text .button:hover',
                        ]
                    );
                    $this->add_responsive_control(
                        'hover_button_border_radius',
                        [
                            'label' => __( 'Border Radius', 'busicon-elementor-addons' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .hero-text .button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );
                $this->end_controls_tab();
                
            $this->end_controls_tabs();

            $this->add_responsive_control(
                'button_margin',
                [
                    'label' => __( 'Margin', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .hero-text .button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'button_typography',
                    'selector' => '{{WRAPPER}} .hero-text .button',
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_button_two', [
                'label' => __( 'Button 2', 'busicon-elementor-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            $this->start_controls_tabs(
                'button_two_style_tabs'
            );
                $this->start_controls_tab(
                    'button_two_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'busicon-elementor-addons' ),
                    ]
                );
                
                    $this->add_control(
                        'button_two_text_color',
                        [
                            'label' => __( 'Text Color', 'busicon-elementor-addons' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .slider-section .hero-slider .slider-item .button-set a.button2' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'button_two_background_color',
                        [
                            'label' => __( 'Background Color', 'busicon-elementor-addons' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .slider-section .hero-slider .slider-item .button-set a.button2' => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        \Elementor\Group_Control_Border::get_type(),
                        [
                            'name' => 'button_two_border',
                            'label' => __( 'Border', 'busicon-elementor-addons' ),
                            'selector' => '{{WRAPPER}} .slider-section .hero-slider .slider-item .button-set a.button2',
                        ]
                    );
                    $this->add_responsive_control(
                        'button_two_border_radius',
                        [
                            'label' => __( 'Border Radius', 'busicon-elementor-addons' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .slider-section .hero-slider .slider-item .button-set a.button2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );
                $this->end_controls_tab();
                
                $this->start_controls_tab(
                    'button_two_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'busicon-elementor-addons' ),
                    ]
                );

                    $this->add_control(
                        'hover_button_two_text_color',
                        [
                            'label' => __( 'Text Color', 'busicon-elementor-addons' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .slider-section .hero-slider .slider-item .button-set a.button2:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_control(
                        'hover_button_two_background_color',
                        [
                            'label' => __( 'Background Color', 'busicon-elementor-addons' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .slider-section .hero-slider .slider-item .button-set a.button2:hover' => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        \Elementor\Group_Control_Border::get_type(),
                        [
                            'name' => 'hover_button_two_border',
                            'label' => __( 'Border', 'busicon-elementor-addons' ),
                            'selector' => '{{WRAPPER}} .slider-section .hero-slider .slider-item .button-set a.button2:hover',
                        ]
                    );
                    $this->add_responsive_control(
                        'hover_button_two_border_radius',
                        [
                            'label' => __( 'Border Radius', 'busicon-elementor-addons' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .slider-section .hero-slider .slider-item .button-set a.button2:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );
                $this->end_controls_tab();
                
            $this->end_controls_tabs();

            $this->add_responsive_control(
                'button_two_margin',
                [
                    'label' => __( 'Margin', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .slider-section .hero-slider .slider-item .button-set a.button2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'button_two_typography',
                    'selector' => '{{WRAPPER}} .slider-section .hero-slider .slider-item .button-set a.button2',
                ]
            );

        $this->end_controls_section();


	}

    protected function render() {

        $settings = $this->get_settings_for_display();

        if ( ! empty( $settings['button1_link']['url'] ) ) {
            $this->add_link_attributes( 'button1_link', $settings['button1_link'] );
        }
        if ( ! empty( $settings['button2_link']['url'] ) ) {
            $this->add_link_attributes( 'button2_link', $settings['button2_link'] );
        }
    ?>

    <?php if($settings['select_style']=='one'){ ?>

        <div class="hero-text style1">
            <?php if( !empty($settings['subtitle']) ){?>
                <h3 class="subtitle"><?php echo $settings['subtitle']; ?></h3>
            <?php } ?>

            <h1 class="title"><?php echo $settings['title']; ?></h1>

            <?php if( !empty($settings['description']) ){?>
                <p class="description"><?php echo $settings['description']; ?></p>
            <?php } ?>
            <div class="btn-set">
                <a class="button" <?php echo $this->get_render_attribute_string( 'button1_link' ); ?>>
                    <?php echo $settings['button1_text']; ?>
                    <?php \Elementor\Icons_Manager::render_icon( $settings['button1_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                </a>
                <?php if ( 'yes' === $settings['show_button2'] ) { ?>
                <div class="btn2">
                    <div class="btn-icon">
                        <?php \Elementor\Icons_Manager::render_icon( $settings['button2_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    </div>
                    <div class="text">
                        <?php if(!empty($settings['button2_subtitle'])){ ?>
                            <h5><?php echo $settings['button2_subtitle']; ?></h5>
                        <?php } ?>
                        <a <?php echo $this->get_render_attribute_string( 'button2_link' ); ?>><?php echo $settings['button2_title']; ?></a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

    <?php }elseif($settings['select_style']=='two'){ ?>

        <div class="hero-text style2">
            <?php if( !empty($settings['subtitle']) ){?>
                <h3 class="subtitle"><?php echo $settings['subtitle']; ?></h3>
            <?php } ?>

            <h1 class="title"><?php echo $settings['title']; ?></h1>

            <?php if( !empty($settings['description']) ){?>
                <p class="description"><?php echo $settings['description']; ?></p>
            <?php } ?>
            <div class="btn-set">
                <a class="button" <?php echo $this->get_render_attribute_string( 'button1_link' ); ?>>
                    <?php echo $settings['button1_text']; ?><?php \Elementor\Icons_Manager::render_icon( $settings['button1_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                </a>
                <?php if ( 'yes' === $settings['show_button2'] ) { ?>
                <div class="btn2">
                    <div class="btn-icon">
                        <?php \Elementor\Icons_Manager::render_icon( $settings['button2_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    </div>
                    <div class="text">
                        <?php if(!empty($settings['button2_subtitle'])){ ?>
                            <h5><?php echo $settings['button2_subtitle']; ?></h5>
                        <?php } ?>
                        <a <?php echo $this->get_render_attribute_string( 'button2_link' ); ?>><?php echo $settings['button2_title']; ?></a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

    <?php } ?>

	<?php }

}