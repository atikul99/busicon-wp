<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if(!defined('ABSPATH')) exit;


class HeroSlider extends \Elementor\Widget_Base{

	public function get_name(){
		return "heroslider";
	}
	
	public function get_title(){
		return "Hero Slider";
	}
	
	public function get_icon(){
		return "eicon-slides";
	}

	public function get_categories(){
		return ['busicon-category'];
	}

	protected function register_controls() {
		
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'busicon-elementor-extension' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list_subtitle', [
                'label' => __( 'Subtitle', 'busicon-elementor-extension' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Busicon. IT Services & Solution' , 'busicon-elementor-extension' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'list_title', [
                'label' => __( 'Title', 'busicon-elementor-extension' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Creating A Better IT Solution' , 'busicon-elementor-extension' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'item_description',
            [
                'label' => __( 'Description', 'busicon-elementor-extension' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 6,
                'default' => __( 'Default description', 'busicon-elementor-extension' ),
                'placeholder' => __( 'Type your description here', 'busicon-elementor-extension' ),
            ]
        );
        $repeater->add_control(
            'button1',
            [
                'label' => __( 'Button One', 'busicon-elementor-extension' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $repeater->add_control(
            'button1_text', [
                'label' => __( 'Text', 'busicon-elementor-extension' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Get A Quote' , 'busicon-elementor-extension' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'button1_link',
            [
                'label' => __( 'Link', 'busicon-elementor-extension' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'busicon-elementor-extension' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $repeater->add_control(
            'button2',
            [
                'label' => __( 'Button Two', 'busicon-elementor-extension' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $repeater->add_control(
            'button2_text', [
                'label' => __( 'Text', 'busicon-elementor-extension' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Learn More' , 'busicon-elementor-extension' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'button2_link',
            [
                'label' => __( 'Link', 'busicon-elementor-extension' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'busicon-elementor-extension' ),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $repeater->add_control(
            'video_link',
            [
                'label' => __( 'Video Link', 'busicon-elementor-extension' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'busicon-elementor-extension' ),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $repeater->add_control(
            'background_image',
            [
                'label' => esc_html__( 'Background Image', 'busicon-elementor-extension' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
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
                        'list_title' => __( 'Creating A Better IT Solution', 'busicon-elementor-extension' ),
                        'item_description' => __( 'Item content. Click the edit button to change this text.', 'busicon-elementor-extension' ),
                    ],
                    [
                        'list_title' => __( 'Perfect IT Solutions For Your Business', 'busicon-elementor-extension' ),
                        'item_description' => __( 'Item content. Click the edit button to change this text.', 'busicon-elementor-extension' ),
                    ],
                ],
                'title_field' => '{{{ list_title }}}',
            ]
        );

        $this->end_controls_section();


/**
 * Style Tab
 */

        $this->start_controls_section(
            'general_section', [
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
                'slider_height',
                [
                    'label' => __( 'Slider Height', 'busicon-elementor-extension' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1500,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .slider-section .hero-slider .slider-item' => 'min-height: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .slider-section2 .hero-slider .slider-item' => 'min-height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
        $this->end_controls_section();

        //------------------------------ Style Title ------------------------------
        $this->start_controls_section(
            'style_title', [
                'label' => __( 'Title', 'busicon-elementor-extension' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'color_title', [
                    'label' => __( 'Text Color', 'busicon-elementor-extension' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .slider-section .hero-slider .slider-item .title h1' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .slider-section2 .hero-slider .slider-item .title h1' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name' => 'typography_title',
                    'selector' => '{{WRAPPER}} .slider-section .hero-slider .slider-item .title h1, .slider-section2 .hero-slider .slider-item .title h1',
                ]
            );
        $this->end_controls_section();

        //------------------------------ Description ------------------------------
        $this->start_controls_section(
            'style_description', [
                'label' => __( 'Description', 'busicon-elementor-extension' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'select_style' => 'two'
                ],
            ]
        );
            $this->add_control(
                'color_description', [
                    'label' => __( 'Text Color', 'busicon-elementor-extension' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .slider-section2 .hero-slider .slider-item .description p' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name' => 'typography_description',
                    'selector' => '{{WRAPPER}} .slider-section2 .hero-slider .slider-item .description p',
                ]
            );
        $this->end_controls_section();

        //------------------------------ Style subtitle ------------------------------
        $this->start_controls_section(
            'style_subtitle', [
                'label' => __( 'Subtitle', 'busicon-elementor-extension' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'select_style' => 'one'
                ],
            ]
        );
        $this->add_control(
            'color_subtitle', [
                'label' => __( 'Text Color', 'busicon-elementor-extension' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-section .hero-slider .slider-item .subtitle h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_subtitle',
                'selector' => '{{WRAPPER}} .slider-section .hero-slider .slider-item .subtitle h5',
            ]
        );
        $this->add_responsive_control(
            'subtitle_margin',
            [
                'label' => __( 'Margin', 'busicon-elementor-extension' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .slider-section .hero-slider .slider-item .subtitle h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //------------------------------ Style Support Mail ------------------------------
        $this->start_controls_section(
            'style_support', [
                'label' => __( 'Support Mail', 'busicon-elementor-extension' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'select_style' => 'one'
                ],
            ]
        );
        $this->add_control(
            'color_support', [
                'label' => __( 'Text Color', 'busicon-elementor-extension' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-section .hero-slider .slider-item .support-mail .text h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_support',
                'selector' => '{{WRAPPER}} .slider-section .hero-slider .slider-item .support-mail .text h3, {{WRAPPER}} .slider_two .hero-text h3',
            ]
        );
        $this->add_responsive_control(
            'support_margin',
            [
                'label' => __( 'Margin', 'busicon-elementor-extension' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .slider-section .hero-slider .slider-item .support-mail' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();


        //------------------------------ Style Button ------------------------------
        $this->start_controls_section(
            'style_button', [
                'label' => __( 'Button 1', 'busicon-elementor-extension' ),
                'tab' => Controls_Manager::TAB_STYLE,
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
                                '{{WRAPPER}} .slider-section .hero-slider .slider-item .button-set a' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .slider-section2 .hero-slider .slider-item .button-set a' => 'color: {{VALUE}};',
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
                                '{{WRAPPER}} .slider-section .hero-slider .slider-item .button-set a' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .slider-section2 .hero-slider .slider-item .button-set a' => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        \Elementor\Group_Control_Border::get_type(),
                        [
                            'name' => 'button_border',
                            'label' => __( 'Border', 'busicon-elementor-extension' ),
                            'selector' => '{{WRAPPER}} .slider-section .hero-slider .slider-item .button-set a, .slider-section2 .hero-slider .slider-item .button-set a',
                        ]
                    );
                    $this->add_responsive_control(
                        'button_border_radius',
                        [
                            'label' => __( 'Border Radius', 'busicon-elementor-extension' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .slider-section .hero-slider .slider-item .button-set a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .slider-section2 .hero-slider .slider-item .button-set a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .slider-section .hero-slider .slider-item .button-set a:hover' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .slider-section2 .hero-slider .slider-item .button-set a:hover' => 'color: {{VALUE}};',
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
                                '{{WRAPPER}} .slider-section .hero-slider .slider-item .button-set a:hover' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .slider-section2 .hero-slider .slider-item .button-set a:hover' => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        \Elementor\Group_Control_Border::get_type(),
                        [
                            'name' => 'hover_button_border',
                            'label' => __( 'Border', 'busicon-elementor-extension' ),
                            'selector' => '{{WRAPPER}} .slider-section .hero-slider .slider-item .button-set a:hover, .slider-section2 .hero-slider .slider-item .button-set a:hover',
                        ]
                    );
                    $this->add_responsive_control(
                        'hover_button_border_radius',
                        [
                            'label' => __( 'Border Radius', 'busicon-elementor-extension' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .slider-section .hero-slider .slider-item .button-set a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .slider-section2 .hero-slider .slider-item .button-set a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .slider-section .hero-slider .slider-item .button-set a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .slider-section2 .hero-slider .slider-item .button-set a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'button_typography',
                    'selector' => '{{WRAPPER}} .slider-section .hero-slider .slider-item .button-set a, .slider-section2 .hero-slider .slider-item .button-set a',
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_button_two', [
                'label' => __( 'Button 2', 'busicon-elementor-extension' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'select_style' => 'one'
                ],
            ]
        );

            $this->start_controls_tabs(
                'button_two_style_tabs'
            );
                $this->start_controls_tab(
                    'button_two_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'busicon-elementor-extension' ),
                    ]
                );
                
                    $this->add_control(
                        'button_two_text_color',
                        [
                            'label' => __( 'Text Color', 'busicon-elementor-extension' ),
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
                            'label' => __( 'Background Color', 'busicon-elementor-extension' ),
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
                            'label' => __( 'Border', 'busicon-elementor-extension' ),
                            'selector' => '{{WRAPPER}} .slider-section .hero-slider .slider-item .button-set a.button2',
                        ]
                    );
                    $this->add_responsive_control(
                        'button_two_border_radius',
                        [
                            'label' => __( 'Border Radius', 'busicon-elementor-extension' ),
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
                        'label' => __( 'Hover', 'busicon-elementor-extension' ),
                    ]
                );

                    $this->add_control(
                        'hover_button_two_text_color',
                        [
                            'label' => __( 'Text Color', 'busicon-elementor-extension' ),
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
                            'label' => __( 'Background Color', 'busicon-elementor-extension' ),
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
                            'label' => __( 'Border', 'busicon-elementor-extension' ),
                            'selector' => '{{WRAPPER}} .slider-section .hero-slider .slider-item .button-set a.button2:hover',
                        ]
                    );
                    $this->add_responsive_control(
                        'hover_button_two_border_radius',
                        [
                            'label' => __( 'Border Radius', 'busicon-elementor-extension' ),
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
                    'label' => __( 'Margin', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .slider-section .hero-slider .slider-item .button-set a.button2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'button_two_typography',
                    'selector' => '{{WRAPPER}} .slider-section .hero-slider .slider-item .button-set a.button2',
                ]
            );

        $this->end_controls_section();


	}

    protected function render() {

        $settings = $this->get_settings_for_display();

    ?>

    <?php if($settings['select_style']=='one'){ ?>

    <div class="slider-section style1">
        <div class="hero-slider owl-carousel">
            <?php foreach (  $settings['list'] as $item ) { ?>
            <div class="slider-item" style="background:url(<?php echo $item['background_image']['url']; ?>); background-repeat: no-repeat; background-size: cover;">
                <div class="container">
                    <div class="text-wrapper slide-up">
                        <h5 class="subtitle"><?php echo $item['list_subtitle']; ?></h5>
                        <h1 class="title"><?php echo $item['list_title']; ?></h1>
                        <div class="button-set">
                            <a class="button" href="<?php echo esc_url($item['button1_link']['url']); ?>"><?php echo $item['button1_text']; ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <script>
        jQuery(document).ready(function($) {
            "use strict";
            $(".hero-slider").owlCarousel({
                items:1,
                nav:true,
                navText:["<i class='bi bi-arrow-left'></i>","<i class='bi bi-arrow-right'></i>"],
                dots:false,
                loop:true,
                autoplay: false,
                autoplayTimeout:5000,
                animateOut: 'fadeOut',
            });
        });
    </script>

    <?php }elseif($settings['select_style']=='two'){ ?>

    <div class="slider-section2">
        <div class="hero-slider owl-carousel">
            <?php foreach (  $settings['list'] as $item ) { ?>
            <div class="slider-item" style="background-image: url('<?php echo esc_url($item['bg_image']['url']); ?>'); background-size: cover; background-repeat: no-repeat;">
                <div class="container">
                    <div class="text-area">
                        <div class="title">
                            <h1><?php echo $item['list_title']; ?></h1>
                        </div>
                        <div class="description">
                            <p><?php echo $item['item_description']; ?></p>
                        </div>
                        <div class="button-set">
                            <a href="<?php echo esc_url($item['button1_link']['url']); ?>"><?php echo $item['button1_text']; ?></a>

                            <?php if( !empty($item['video_link']['url']) ){ ?>
                                <a class="button2" href="<?php echo esc_url($item['video_link']['url']); ?>"><i class="fa fa-play"></i></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <script>
        jQuery(document).ready(function($) {
            "use strict";
            $(".hero-slider").owlCarousel({
                items:1,
                nav:true,
                navText:["<i class='bi bi-arrow-left'></i>","<i class='bi bi-arrow-right'></i>"],
                dots:false,
                loop:true,
                autoplay:true,
                autoplayTimeout:5000,
                animateOut: 'fadeOut',
            });
        });
    </script>

    <?php } ?>

	<?php }

}