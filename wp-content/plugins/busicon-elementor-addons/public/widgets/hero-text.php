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
                'label' => __( 'Text', 'busicon-elementor-extension' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

            $this->add_control(
                'subtitle', [
                    'label' => __( 'Subtitle', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'with Business Ideas' , 'busicon-elementor-extension' ),
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'title', [
                    'label' => __( 'Title', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'We Provide Our Best Business Services' , 'busicon-elementor-extension' ),
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'description',
                [
                    'label' => __( 'Description', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'rows' => 10,
                    'default' => __( 'Worem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor incididunt ut', 'busicon-elementor-extension' ),
                    'placeholder' => __( 'Type your description here', 'busicon-elementor-extension' ),
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
                    'placeholder' => __( 'Enter your button text', 'busicon-elementor-extension' ),
                    'label_block' => true,
                    'default' => __( 'Button', 'busicon-elementor-extension' ),
                ]
            );
            $this->add_control(
                'button_link',
                [
                    'label' => __( 'Button URL', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => __( 'https://your-link.com', 'busicon-elementor-extension' ),
                ]
            );

            $this->add_control(
                'video_icon',
                [
                    'label' => __( 'Video Icon', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'bi bi-play',
                    ],
                ]
            );
            $this->add_control(
                'video_button_url',
                [
                    'label' => __( 'Video URL', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => __( 'https://your-link.com', 'busicon-elementor-extension' ),
                ]
            );
            $this->add_control(
                'video_title',
                [
                    'label' => __( 'Video Title', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'placeholder' => __( 'Enter your title', 'busicon-elementor-extension' ),
                    'label_block' => true,
                    'default' => __( 'Watch Video', 'busicon-elementor-extension' ),
                ]
            );
        $this->end_controls_section();

/**
 * Style Tab
 */

        $this->start_controls_section(
            'general_section', [
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
                    ],
                    'default' => 'one',
                ]
            );

        $this->end_controls_section();

        //------------------------------ Style subtitle ------------------------------
        $this->start_controls_section(
            'style_subtitle', [
                'label' => __( 'Subtitle', 'busicon-elementor-extension' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'color_subtitle', [
                    'label' => __( 'Text Color', 'busicon-elementor-extension' ),
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
                    'label' => __( 'Margin', 'busicon-elementor-extension' ),
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
                'label' => __( 'Title', 'busicon-elementor-extension' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'color_title', [
                    'label' => __( 'Text Color', 'busicon-elementor-extension' ),
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
                    'label' => __( 'Margin', 'busicon-elementor-extension' ),
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
                'label' => __( 'Description', 'busicon-elementor-extension' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'color_description', [
                    'label' => __( 'Text Color', 'busicon-elementor-extension' ),
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
                    'label' => __( 'Margin', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .hero-text .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();




        //------------------------------ Style Button ------------------------------
        $this->start_controls_section(
            'style_button', [
                'label' => __( 'Button 1', 'busicon-elementor-extension' ),
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
                                '{{WRAPPER}} .hero-text .butto' => 'color: {{VALUE}};',
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
                                '{{WRAPPER}} .hero-text .butto::before' => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        \Elementor\Group_Control_Border::get_type(),
                        [
                            'name' => 'button_border',
                            'label' => __( 'Border', 'busicon-elementor-extension' ),
                            'selector' => '{{WRAPPER}} .hero-text .butto',
                        ]
                    );
                    $this->add_responsive_control(
                        'button_border_radius',
                        [
                            'label' => __( 'Border Radius', 'busicon-elementor-extension' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .hero-text .butto' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .hero-text .butto:hover' => 'color: {{VALUE}};',
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
                                '{{WRAPPER}} .hero-text .butto:hover::before' => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        \Elementor\Group_Control_Border::get_type(),
                        [
                            'name' => 'hover_button_border',
                            'label' => __( 'Border', 'busicon-elementor-extension' ),
                            'selector' => '{{WRAPPER}} .hero-text .butto:hover',
                        ]
                    );
                    $this->add_responsive_control(
                        'hover_button_border_radius',
                        [
                            'label' => __( 'Border Radius', 'busicon-elementor-extension' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .hero-text .butto:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .hero-text .butto' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'button_typography',
                    'selector' => '{{WRAPPER}} .hero-text .butto',
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_button_two', [
                'label' => __( 'Button 2', 'busicon-elementor-extension' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
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
                <a class="button" href="<?php echo esc_url($settings['button_link']['url']); ?>"><?php echo $settings['button_text']; ?></a>
                <a class="video-btn venobox" data-vbtype="video" data-autoplay="true" href="<?php echo esc_url($settings['video_button_url']['url']); ?>">
                    <?php \Elementor\Icons_Manager::render_icon( $settings['video_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                </a>
                <?php if(!empty($settings['video_title'])){ ?>
                    <span class="video-title"><?php echo $settings['video_title']; ?></span>
                <?php } ?>
            </div>
        </div>

        <script>
            jQuery(document).ready(function($) {
                "use strict";
                $('.venobox').venobox();
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