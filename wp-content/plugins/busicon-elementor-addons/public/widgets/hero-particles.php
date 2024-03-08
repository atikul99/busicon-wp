<?php

if(!defined('ABSPATH')) exit;

class HeroParticles extends \Elementor\Widget_Base{

	public function get_name(){
		return "hero-particles";
	}
	
	public function get_title(){
		return "Hero Particles";
	}
	
	public function get_icon(){
		return "eicon-animation";
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
                    'default' => __( 'Endless Business Posiblittes' , 'busicon-elementor-extension' ),
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'title', [
                    'label' => __( 'Title', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Best Solution And Great Business' , 'busicon-elementor-extension' ),
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'description',
                [
                    'label' => __( 'Description', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'rows' => 6,
                    'default' => __( "There are many lorem Ipsum available but the majority have in some form randomised words which don't look even slightly believable.", 'busicon-elementor-extension' ),
                    'placeholder' => __( 'Type your description here', 'busicon-elementor-extension' ),
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
			    'single_image',
			    [
				    'label' => esc_html__( 'Choose Image', 'busicon-elementor-extension' ),
				    'type' => \Elementor\Controls_Manager::MEDIA,
				    'default' => [
					    'url' => \Elementor\Utils::get_placeholder_image_src(),
				    ],
			    ]
		    );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'background_section',
            [
                'label' => __( 'Background', 'busicon-elementor-extension' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'background',
                    'types' => [ 'classic', 'gradient', 'video' ],
                    'selector' => '{{WRAPPER}} .hero-particles',
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
                'button1_text', [
                    'label' => __( 'Button 1 Text', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'See Project' , 'busicon-elementor-extension' ),
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'button1_link',
                [
                    'label' => __( 'Button 1 Link', 'busicon-elementor-extension' ),
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

            $this->add_control(
                'button2_text', [
                    'label' => __( 'Button 2 Text', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Discover More' , 'busicon-elementor-extension' ),
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'button2_link',
                [
                    'label' => __( 'Button 2 Link', 'busicon-elementor-extension' ),
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
                        'three' => __( 'Three', 'busicon-elementor-extension' ),
                    ],
                    'default' => 'one',
                ]
            );
            $this->add_responsive_control(
                'width',
                [
                    'label' => esc_html__( 'Content Width', 'busicon-elementor-extension' ),
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
                        '{{WRAPPER}} .hero-particles .wrapper' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();
        
        $this->start_controls_section(
            'particles_section', [
                'label' => __( 'Particles', 'busicon-elementor-extension' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        
            $this->add_control(
                'particles_color',
                [
                    'label' => esc_html__( 'Particles Color', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                ]
            );
            $this->add_control(
                'line_linked_color',
                [
                    'label' => esc_html__( 'Line linked Color', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                ]
            );
    		
        $this->end_controls_section();

        $this->start_controls_section(
            'subtitle_style', [
                'label' => __( 'Subtitle', 'busicon-elementor-extension' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'subtitle_color', [
                    'label' => __( 'Text Color', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .hero-particles .subtitle' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(), [
                    'name' => 'subtitle_typography',
                    'selector' => '{{WRAPPER}} .hero-particles .subtitle',
                ]
            );
            $this->add_responsive_control(
                'subtitle_margin',
                [
                    'label' => __( 'Margin', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .hero-particles .subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'title_style', [
                'label' => __( 'Title', 'busicon-elementor-extension' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'title_color', [
                    'label' => __( 'Text Color', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .hero-particles .title' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(), [
                    'name' => 'typography_title',
                    'selector' => '{{WRAPPER}} .hero-particles .title',
                ]
            );
            $this->add_responsive_control(
                'title_margin',
                [
                    'label' => __( 'Margin', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .hero-particles .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
            'description_style', [
                'label' => __( 'Description', 'busicon-elementor-extension' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'description_color', [
                    'label' => __( 'Text Color', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .hero-particles .description' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(), [
                    'name' => 'description_typography',
                    'selector' => '{{WRAPPER}} .hero-particles .description',
                ]
            );
            $this->add_responsive_control(
                'description_margin',
                [
                    'label' => __( 'Margin', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .hero-particles .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'button_style', [
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
                                '{{WRAPPER}} .hero-particles .hero-btn1' => 'color: {{VALUE}};',
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
                                '{{WRAPPER}} .hero-particles .hero-btn1::before' => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        \Elementor\Group_Control_Border::get_type(),
                        [
                            'name' => 'button_border',
                            'label' => __( 'Border', 'busicon-elementor-extension' ),
                            'selector' => '{{WRAPPER}} .hero-particles .hero-btn1',
                        ]
                    );
                    $this->add_responsive_control(
                        'button_border_radius',
                        [
                            'label' => __( 'Border Radius', 'busicon-elementor-extension' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .hero-particles .hero-btn1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .hero-particles .hero-btn1:hover' => 'color: {{VALUE}};',
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
                                '{{WRAPPER}} .hero-particles .hero-btn1:hover::before' => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        \Elementor\Group_Control_Border::get_type(),
                        [
                            'name' => 'hover_button_border',
                            'label' => __( 'Border', 'busicon-elementor-extension' ),
                            'selector' => '{{WRAPPER}} .hero-particles .hero-btn1:hover',
                        ]
                    );
                    $this->add_responsive_control(
                        'hover_button_border_radius',
                        [
                            'label' => __( 'Border Radius', 'busicon-elementor-extension' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .hero-particles .hero-btn1:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .hero-particles .hero-btn1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'button_typography',
                    'selector' => '{{WRAPPER}} .hero-particles .hero-btn1',
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_button_two', [
                'label' => __( 'Button 2', 'busicon-elementor-extension' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
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
                                '{{WRAPPER}} .hero-particles .hero-btn2' => 'color: {{VALUE}};',
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
                                '{{WRAPPER}} .hero-particles .hero-btn2' => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        \Elementor\Group_Control_Border::get_type(),
                        [
                            'name' => 'button_two_border',
                            'label' => __( 'Border', 'busicon-elementor-extension' ),
                            'selector' => '{{WRAPPER}} .hero-particles .hero-btn2',
                        ]
                    );
                    $this->add_responsive_control(
                        'button_two_border_radius',
                        [
                            'label' => __( 'Border Radius', 'busicon-elementor-extension' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .hero-particles .hero-btn2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .hero-particles .hero-btn2:hover' => 'color: {{VALUE}};',
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
                                '{{WRAPPER}} .hero-particles .hero-btn2:hover' => 'background-color: {{VALUE}};',
                            ],
                        ]
                    );
                    $this->add_group_control(
                        \Elementor\Group_Control_Border::get_type(),
                        [
                            'name' => 'hover_button_two_border',
                            'label' => __( 'Border', 'busicon-elementor-extension' ),
                            'selector' => '{{WRAPPER}} .hero-particles .hero-btn2:hover',
                        ]
                    );
                    $this->add_responsive_control(
                        'hover_button_two_border_radius',
                        [
                            'label' => __( 'Border Radius', 'busicon-elementor-extension' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .hero-particles .hero-btn2:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .hero-particles .hero-btn2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'button_two_typography',
                    'selector' => '{{WRAPPER}} .hero-particles .hero-btn2',
                ]
            );

        $this->end_controls_section();

	}

    protected function render() {

        $settings = $this->get_settings_for_display();

    ?>

    <?php if($settings['select_style']=='one'){ ?>

        <div class="hero-particles style1">
            <div class="wrapper">
                <?php if( !empty($settings['subtitle']) ){?>
                    <h3 class="subtitle"><?php echo $settings['subtitle']; ?></h3>
                <?php } ?>

                <h1 class="title"><?php echo $settings['title']; ?></h1>

                <?php if( !empty($settings['description']) ){?>
                    <p class="description"><?php echo $settings['description']; ?></p>
                <?php } ?>

                <div class="button-set">
                    <a class="hero-btn1" href="<?php echo esc_url($settings['button1_link']['url']); ?>"><?php echo $settings['button1_text']; ?></a>
                    <a class="hero-btn2" href="<?php echo esc_url($settings['button2_link']['url']); ?>"><?php echo $settings['button2_text']; ?></a>
                </div>
                <div id="particles-js"></div>
            </div>
        </div>

        <script>
            jQuery(document).ready(function($) {
            "use strict";

            particlesJS('particles-js',

            {
              "particles": {
                "number": {
                  "value": 80,
                  "density": {
                    "enable": true,
                    "value_area": 800
                  }
                },
                "color": {
                  "value": "<?php if( !empty($settings['particles_color']) ){echo $settings['particles_color'];}else{echo '#ff7426';} ?>"
                },
                "shape": {
                  "type": "circle",
                  "stroke": {
                    "width": 0,
                    "color": "#000000"
                  },
                  "polygon": {
                    "nb_sides": 5
                  },
                  "image": {
                    "src": "img/github.svg",
                    "width": 100,
                    "height": 100
                  }
                },
                "opacity": {
                  "value": 0.5,
                  "random": false,
                  "anim": {
                    "enable": false,
                    "speed": 1,
                    "opacity_min": 0.1,
                    "sync": false
                  }
                },
                "size": {
                  "value": 3,
                  "random": true,
                  "anim": {
                    "enable": false,
                    "speed": 80,
                    "size_min": 0.1,
                    "sync": false
                  }
                },
                "line_linked": {
                  "enable": true,
                  "distance": 150,
                  "color": "<?php if( !empty($settings['line_linked_color']) ){echo $settings['line_linked_color'];}else{echo '#ff7426';} ?>",
                  "opacity": 0.4,
                  "width": 1
                },
                "move": {
                  "enable": true,
                  "speed": 6,
                  "direction": "none",
                  "random": false,
                  "straight": false,
                  "out_mode": "out",
                  "bounce": false,
                  "attract": {
                    "enable": false,
                    "rotateX": 600,
                    "rotateY": 1200
                  }
                }
              },
              "interactivity": {
                "detect_on": "canvas",
                "events": {
                  "onhover": {
                    "enable": true,
                    "mode": "repulse"
                  },
                  "onclick": {
                    "enable": true,
                    "mode": "push"
                  },
                  "resize": true
                },
                "modes": {
                  "grab": {
                    "distance": 800,
                    "line_linked": {
                      "opacity": 1
                    }
                  },
                  "bubble": {
                    "distance": 800,
                    "size": 80,
                    "duration": 2,
                    "opacity": 0.8,
                    "speed": 3
                  },
                  "repulse": {
                    "distance": 200,
                    "duration": 0.4
                  },
                  "push": {
                    "particles_nb": 4
                  },
                  "remove": {
                    "particles_nb": 2
                  }
                }
              },
              "retina_detect": true
            }
            
            );
            
            });
        </script>

    <?php }elseif($settings['select_style']=='two'){ ?>

        <div class="hero-particles style2">
            <div class="wrapper">
                <?php if( !empty($settings['subtitle']) ){?>
                    <h3 class="subtitle"><?php echo $settings['subtitle']; ?></h3>
                <?php } ?>

                <h1 class="title"><?php echo $settings['title']; ?></h1>

                <?php if( !empty($settings['description']) ){?>
                    <p class="description"><?php echo $settings['description']; ?></p>
                <?php } ?>

                <div class="button-set">
                    <a class="hero-btn1" href="<?php echo esc_url($settings['button1_link']['url']); ?>"><?php echo $settings['button1_text']; ?></a>
                    <a class="hero-btn2" href="<?php echo esc_url($settings['button2_link']['url']); ?>"><?php echo $settings['button2_text']; ?></a>
                </div>
                <div id="particles-js"></div>
            </div>
        </div>

        <script>
            jQuery(document).ready(function($) {
            "use strict";

            particlesJS('particles-js',

            {
              "particles": {
                "number": {
                  "value": 40,
                  "density": {
                    "enable": true,
                    "value_area": 800
                  }
                },
                "color": {
                  "value": "<?php if( !empty($settings['particles_color']) ){echo $settings['particles_color'];}else{echo '#ff7426';} ?>"
                },
                "shape": {
                  "type": "circle",
                  "stroke": {
                    "width": 0,
                    "color": "#000000"
                  },
                  "polygon": {
                    "nb_sides": 5
                  },
                  "image": {
                    "src": "img/github.svg",
                    "width": 100,
                    "height": 100
                  }
                },
                "opacity": {
                  "value": 0.4,
                  "random": false,
                  "anim": {
                    "enable": false,
                    "speed": 1,
                    "opacity_min": 0.1,
                    "sync": false
                  }
                },
                "size": {
                  "value": 10,
                  "random": true,
                  "anim": {
                    "enable": false,
                    "speed": 40,
                    "size_min": 0.1,
                    "sync": false
                  }
                },
                "line_linked": {
                  "enable": false,
                  "distance": 500,
                  "color": "<?php if( !empty($settings['line_linked_color']) ){echo $settings['line_linked_color'];}else{echo '#ff7426';} ?>",
                  "opacity": 0.4,
                  "width": 2
                },
                "move": {
                  "enable": true,
                  "speed": 6,
                  "direction": "bottom",
                  "random": false,
                  "straight": false,
                  "out_mode": "out",
                  "bounce": false,
                  "attract": {
                    "enable": false,
                    "rotateX": 600,
                    "rotateY": 1200
                  }
                }
              },
              "interactivity": {
                "detect_on": "canvas",
                "events": {
                  "onhover": {
                    "enable": true,
                    "mode": "repulse"
                  },
                  "onclick": {
                    "enable": true,
                    "mode": "push"
                  },
                  "resize": true
                },
                "modes": {
                  "grab": {
                    "distance": 800,
                    "line_linked": {
                      "opacity": 1
                    }
                  },
                  "bubble": {
                    "distance": 800,
                    "size": 80,
                    "duration": 2,
                    "opacity": 0.8,
                    "speed": 3
                  },
                  "repulse": {
                    "distance": 200,
                    "duration": 0.4
                  },
                  "push": {
                    "particles_nb": 4
                  },
                  "remove": {
                    "particles_nb": 2
                  }
                }
              },
              "retina_detect": true
            }

            );

            });
        </script>
        
    <?php }elseif($settings['select_style']=='three'){ ?>

        <div class="hero-particles style3">
            <div class="wrapper">
                <div class="content">
                    <?php if( !empty($settings['subtitle']) ){?>
                        <h3 class="subtitle"><?php echo $settings['subtitle']; ?></h3>
                    <?php } ?>
    
                    <h1 class="title"><?php echo $settings['title']; ?></h1>
    
                    <?php if( !empty($settings['description']) ){?>
                        <p class="description"><?php echo $settings['description']; ?></p>
                    <?php } ?>
    
                    <div class="button-set">
                        <a class="hero-btn1" href="<?php echo esc_url($settings['button1_link']['url']); ?>">
                            <?php echo $settings['button1_text']; ?>
                            <i aria-hidden="true" class="flaticon flaticon-right-arrow"></i>
                        </a>
                        <a class="hero-btn2" href="<?php echo esc_url($settings['button2_link']['url']); ?>"><?php echo $settings['button2_text']; ?></a>
                    </div>
                </div>
                <div class="single-image">
                    <img src="<?php echo $settings['single_image']['url']; ?>">
                </div>
            </div>
            <div id="particles-js"></div>
        </div>

        <script>
            jQuery(document).ready(function($) {
            "use strict";

            particlesJS('particles-js',

            {
              "particles": {
                "number": {
                  "value": 120,
                  "density": {
                    "enable": true,
                    "value_area": 800
                  }
                },
                "color": {
                  "value": "<?php if( !empty($settings['particles_color']) ){echo $settings['particles_color'];}else{echo '#ff7426';} ?>"
                },
                "shape": {
                  "type": "circle",
                  "stroke": {
                    "width": 0,
                    "color": "#000000"
                  },
                  "polygon": {
                    "nb_sides": 5
                  },
                  "image": {
                    "src": "img/github.svg",
                    "width": 100,
                    "height": 100
                  }
                },
                "opacity": {
                  "value": 0.5,
                  "random": false,
                  "anim": {
                    "enable": false,
                    "speed": 1,
                    "opacity_min": 0.1,
                    "sync": false
                  }
                },
                "size": {
                  "value": 3,
                  "random": true,
                  "anim": {
                    "enable": false,
                    "speed": 80,
                    "size_min": 0.1,
                    "sync": false
                  }
                },
                "line_linked": {
                  "enable": false,
                  "distance": 150,
                  "color": "<?php if( !empty($settings['line_linked_color']) ){echo $settings['line_linked_color'];}else{echo '#ff7426';} ?>",
                  "opacity": 0.4,
                  "width": 1
                },
                "move": {
                  "enable": true,
                  "speed": 6,
                  "direction": "none",
                  "random": false,
                  "straight": false,
                  "out_mode": "out",
                  "bounce": false,
                  "attract": {
                    "enable": false,
                    "rotateX": 600,
                    "rotateY": 1200
                  }
                }
              },
              "interactivity": {
                "detect_on": "canvas",
                "events": {
                  "onhover": {
                    "enable": true,
                    "mode": "repulse"
                  },
                  "onclick": {
                    "enable": true,
                    "mode": "push"
                  },
                  "resize": true
                },
                "modes": {
                  "grab": {
                    "distance": 800,
                    "line_linked": {
                      "opacity": 1
                    }
                  },
                  "bubble": {
                    "distance": 800,
                    "size": 80,
                    "duration": 2,
                    "opacity": 0.8,
                    "speed": 3
                  },
                  "repulse": {
                    "distance": 200,
                    "duration": 0.4
                  },
                  "push": {
                    "particles_nb": 4
                  },
                  "remove": {
                    "particles_nb": 2
                  }
                }
              },
              "retina_detect": true
            }
            
            );
            
            });
        </script>

    <?php } ?>

	<?php }

}