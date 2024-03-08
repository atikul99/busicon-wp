<?php

use Elementor\Controls_Manager;

if(!defined('ABSPATH')) exit;

class Testimonial extends \Elementor\Widget_Base{

	public function get_name(){
		return "testimonial";
	}
	
	public function get_title(){
		return "Testimonial";
	}
	
	public function get_icon(){
		return "eicon-blockquote";
	}
	public function get_categories(){
		return ['busicon-category'];
	}
	
	protected function register_controls(){

		$this->start_controls_section(
			'slider', [
				'label' => __( 'Testimonial', 'busicon-elementor-extension' ),
			]
		);
		
            $repeater = new \Elementor\Repeater();
            
            $repeater->add_control(
                'image',
                [
                    'label' => esc_html__( 'Choose Image', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );
    		$repeater->add_control(
    			'quote_text',
    			[
    				'label' => esc_html__( 'Quote', 'busicon-elementor-extension' ),
    				'type' => \Elementor\Controls_Manager::TEXTAREA,
    				'rows' => 6,
    				'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'busicon-elementor-extension' ),
    				'placeholder' => esc_html__( 'Enter your Quote', 'busicon-elementor-extension' ),
    			]
    		);
            $repeater->add_control(
                'title',
                [
                    'label' => __( 'Title', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Solved Very Well', 'busicon-elementor-extension' ),
                    'placeholder' => __( 'Enter your title', 'busicon-elementor-extension' ),
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'name',
                [
                    'label' => __( 'Name', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Alex Gorsky', 'busicon-elementor-extension' ),
                    'placeholder' => __( 'Enter your name', 'busicon-elementor-extension' ),
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'designation',
                [
                    'label' => __( 'Designation', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Web Developer', 'busicon-elementor-extension' ),
                    'placeholder' => __( 'Enter your designation', 'busicon-elementor-extension' ),
                    'label_block' => true,
                ]
            );
    		$repeater->add_control(
    			'rating',
    			[
    				'label' => esc_html__( 'Rating', 'busicon-elementor-extension' ),
    				'type' => \Elementor\Controls_Manager::NUMBER,
    				'min' => 1,
    				'max' => 5,
    				'step' => 1,
    				'default' => 3,
    			]
    		);
    		$repeater->add_control(
    			'icon',
    			[
    				'label' => esc_html__( 'Choose Icon', 'busicon-elementor-extension' ),
    				'type' => \Elementor\Controls_Manager::MEDIA,
    			]
    		);
    		
            $this->add_control(
                'slides',
                [
                    'label' => __( 'Testimonial List', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'name' => __( 'Alex Gorsky', 'busicon-elementor-extension' ),
                            'designation' => __( 'Web Developer', 'busicon-elementor-extension' ),
                        ],
                        [
                            'name' => __( 'Mark Ateer', 'busicon-elementor-extension' ),
                            'designation' => __( 'UI/UX Designer', 'busicon-elementor-extension' ),
                        ],
                    ],
                    'title_field' => '{{{ name }}}',
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
					],
					'default' => 'one',
					
				]
			);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'quote_style',
			[
				'label' => __( 'Quote', 'busicon-elementor-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

    		$this->add_control(
    			'quote_color',
    			[
    				'label' => __( 'Color', 'busicon-elementor-extension' ),
    				'type' => \Elementor\Controls_Manager::COLOR,
    				'selectors' => [
    					'{{WRAPPER}} .testimonial.style4 .single-testimonial .testimonial-content .quote-text h2' => 'color: {{VALUE}}',
    					'{{WRAPPER}} .testimonial .single-testimonial .quote-text p' => 'color: {{VALUE}}',
    					'{{WRAPPER}} .testimonial .single-testimonial .quote-text' => 'color: {{VALUE}}',
    				],
    			]
    		);
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'quote_typography',
                    'label' => __( 'Typography', 'busicon-elementor-extension' ),
                    'selector' => '{{WRAPPER}} .testimonial.style4 .single-testimonial .testimonial-content .quote-text h2, .testimonial .single-testimonial .quote-text p',
                ]
            );
            $this->add_responsive_control(
                'quote_margin',
                [
                    'label' => __( 'Margin', 'busicon-elementor-extension' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .testimonial.style4 .single-testimonial .testimonial-content .quote-text h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .testimonial .single-testimonial .quote-text p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

		$this->end_controls_section();

		$this->start_controls_section(
			'name_style',
			[
				'label' => __( 'Name', 'busicon-elementor-extension' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

    		$this->add_control(
    			'name_color',
    			[
    				'label' => __( 'Color', 'busicon-elementor-extension' ),
    				'type' => \Elementor\Controls_Manager::COLOR,
    				'selectors' => [
    					'{{WRAPPER}} .testimonial.style1 .single-testimonial .testimonial-content .name-designation h4' => 'color: {{VALUE}}',
    					'{{WRAPPER}} .testimonial .single-testimonial .client-profile .client-bio .name' => 'color: {{VALUE}}',
    				],
    			]
    		);
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'name_typography',
                    'label' => __( 'Typography', 'busicon-elementor-extension' ),
                    'selector' => '{{WRAPPER}} .testimonial.style1 .single-testimonial .testimonial-content .name-designation h4, .testimonial .single-testimonial .client-profile .client-bio .name',
                ]
            );
            $this->add_responsive_control(
                'name_margin',
                [
                    'label' => __( 'Margin', 'busicon-elementor-extension' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .testimonial.style1 .single-testimonial .testimonial-content .name-designation h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .testimonial .single-testimonial .client-profile .client-bio .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

		$this->end_controls_section();

		$this->start_controls_section(
			'designation_style',
			[
				'label' => __( 'Designation', 'busicon-elementor-extension' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'designation_color',
				[
					'label' => __( 'Color', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .testimonial.style1 .single-testimonial .testimonial-content .name-designation p' => 'color: {{VALUE}}',
						'{{WRAPPER}} .testimonial .single-testimonial .client-profile .client-bio .designation' => 'color: {{VALUE}}',
					],
				]
			);

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'designation_typography',
                    'label' => __( 'Typography', 'busicon-elementor-extension' ),
                    'selector' => '{{WRAPPER}} .testimonial.style1 .single-testimonial .testimonial-content .name-designation p, .testimonial .single-testimonial .client-profile .client-bio .designation',
                ]
            );
            $this->add_responsive_control(
                'designation_margin',
                [
                    'label' => __( 'Margin', 'busicon-elementor-extension' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .testimonial.style1 .single-testimonial .testimonial-content .name-designation p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .testimonial .single-testimonial .client-profile .client-bio .designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
			
		$this->end_controls_section();
		
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		?>
		
		<?php if($settings['select_style']=='one'){ ?>

			<div class="testimonial style1">
				<div class="testimonial-wrapper owl-carousel">
					<?php foreach (  $settings['slides'] as $item ) { ?>
						<div class="single-testimonial">
							<div class="content">
								<div class="icon">
									<img src="<?php echo $item['icon']['url']; ?>" alt="">
								</div>
								<div class="quote">
									<p class="quote-text">“<?php echo $item['quote_text']; ?>”</p>

									<?php if( $item['rating'] == 5 ){ ?>
										<div class="rating-stars">
											<i class="bi bi-star-fill"></i>
											<i class="bi bi-star-fill"></i>
											<i class="bi bi-star-fill"></i>
											<i class="bi bi-star-fill"></i>
											<i class="bi bi-star-fill"></i>
										</div>
									<?php }elseif( $item['rating'] == 4){?>
										<div class="rating-stars">
											<i class="bi bi-star-fill"></i>
											<i class="bi bi-star-fill"></i>
											<i class="bi bi-star-fill"></i>
											<i class="bi bi-star-fill"></i>
											<i class="bi bi-star"></i>
										</div>
									<?php }elseif( $item['rating'] == 3 ){?>
										<div class="rating-stars">
											<i class="bi bi-star-fill"></i>
											<i class="bi bi-star-fill"></i>
											<i class="bi bi-star-fill"></i>
											<i class="bi bi-star"></i>
											<i class="bi bi-star"></i>
										</div>
									<?php }elseif( $item['rating'] == 2){?>
										<div class="rating-stars">
											<i class="bi bi-star-fill"></i>
											<i class="bi bi-star-fill"></i>
											<i class="bi bi-star"></i>
											<i class="bi bi-star"></i>
											<i class="bi bi-star"></i>
										</div>
									<?php }elseif( $item['rating'] == 1){?>
										<div class="rating-stars">
											<i class="bi bi-star-fill"></i>
											<i class="bi bi-star"></i>
											<i class="bi bi-star"></i>
											<i class="bi bi-star"></i>
											<i class="bi bi-star"></i>
										</div>
									<?php } ?>
								</div>
							</div>
							<div class="client-profile">
								<div class="image">
									<img src="<?php echo $item['image']['url']; ?>" alt="">
								</div>
								<div class="client-bio">
									<h5 class="name"><?php echo $item['name']; ?></h5>
									<p class="designation"><?php echo $item['designation']; ?></p>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>

			<script>
				jQuery(document).ready(function($) {
					"use strict";
					$(".testimonial-wrapper").owlCarousel({
						items:1,
						nav:false,
						dots:true,
						margin:30,
						loop:true,
						autoplay:true,
					});
				});
			</script>

		<?php }elseif($settings['select_style']=='two'){ ?>

			<div class="testimonial style2">
				<div class="testimonial-area owl-carousel">
					<?php foreach (  $settings['slides'] as $item ) { ?>
					<div class="single-testimonial">
						
						<?php if( $item['rating'] == 5 ){ ?>
						<div class="rating-stars">
							<i class="fa fa-star active"></i>
							<i class="fa fa-star active"></i>
							<i class="fa fa-star active"></i>
							<i class="fa fa-star active"></i>
							<i class="fa fa-star active"></i>
						</div>
						<?php }elseif( $item['rating'] ==4){?>
						<div class="rating-stars">
							<i class="fa fa-star active"></i>
							<i class="fa fa-star active"></i>
							<i class="fa fa-star active"></i>
							<i class="fa fa-star active"></i>
							<i class="fa fa-star"></i>
						</div>
						<?php }elseif( $item['rating'] == 3 ){?>
						<div class="rating-stars">
							<i class="fa fa-star active"></i>
							<i class="fa fa-star active"></i>
							<i class="fa fa-star active"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
						<?php }elseif( $item['rating'] ==2){?>
						<div class="rating-stars">
							<i class="fa fa-star active"></i>
							<i class="fa fa-star active"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
						<?php }elseif( $item['rating'] ==1){?>
						<div class="rating-stars">
							<i class="fa fa-star active"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
						<?php } ?>
						
						<p class="quote-text"><?php echo $item['quote_text']; ?></p>
						
						<div class="client-profile">
							<div class="image">
								<img src="<?php echo $item['image']['url']; ?>" alt="">
							</div>
							<div class="client-bio">
								<h5 class="name"><?php echo $item['name']; ?></h5>
								<p class="designation"><?php echo $item['designation']; ?></p>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>

            <script>
            	jQuery(document).ready(function($) {
            		"use strict";
                	
                	$('.testimonial-area').owlCarousel({
                		loop: true,
                		autoplay: false,
                		autoplayTimeout: 10000,
                		margin: 20,
                		dots: true,
                		nav: false,
                		navText: ["<i class='flaticon-back-1'></i>", "<i class='fa fa-angle-right'></i>"],
                		responsive: {
                			0: {
                				items: 1
                			},
                			768: {
                				items: 1
                			},
                			992: {
                				items: 1
                			},
                			1000: {
                				items: 1
                			},
                			1920: {
                				items: 3,
                			}
                		}
                	})
            	});
            </script>

		<?php }elseif($settings['select_style']=='three'){ ?>

			<div class="testimonial style3">
				<div class="testimonial-area owl-carousel">
					<?php foreach (  $settings['slides'] as $item ) { ?>
					<div class="single-testimonial">
						<div class="client-profile">
							<div class="image">
								<img src="<?php echo $item['image']['url']; ?>" alt="">
							</div>
							<div class="client-bio">
								<h5 class="name"><?php echo $item['name']; ?></h5>
								<p class="designation"><?php echo $item['designation']; ?></p>

								<?php if( $item['rating'] == 5 ){ ?>
								<div class="rating-stars">
									<i class="fa fa-star active"></i>
									<i class="fa fa-star active"></i>
									<i class="fa fa-star active"></i>
									<i class="fa fa-star active"></i>
									<i class="fa fa-star active"></i>
								</div>
								<?php }elseif( $item['rating'] ==4){?>
								<div class="rating-stars">
									<i class="fa fa-star active"></i>
									<i class="fa fa-star active"></i>
									<i class="fa fa-star active"></i>
									<i class="fa fa-star active"></i>
									<i class="fa fa-star"></i>
								</div>
								<?php }elseif( $item['rating'] == 3 ){?>
								<div class="rating-stars">
									<i class="fa fa-star active"></i>
									<i class="fa fa-star active"></i>
									<i class="fa fa-star active"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
								<?php }elseif( $item['rating'] ==2){?>
								<div class="rating-stars">
									<i class="fa fa-star active"></i>
									<i class="fa fa-star active"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
								<?php }elseif( $item['rating'] ==1){?>
								<div class="rating-stars">
									<i class="fa fa-star active"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
								<?php } ?>

							</div>
						</div>
						<div class="quote-text">
							<p><?php echo $item['quote_text']; ?></p>
						</div>

					</div>
					<?php } ?>
				</div>
			</div>

			<script>
            	jQuery(document).ready(function($) {
            		"use strict";
                	
                	$('.testimonial-area').owlCarousel({
                		loop: true,
                		autoplay: false,
                		autoplayTimeout: 10000,
                		margin: 20,
                		dots: false,
                		nav: true,
                		navText: ["<i class='bi bi-arrow-left'></i>", "<i class='bi bi-arrow-right'></i>"],
                		responsive: {
                			0: {
                				items: 1,
                				nav: false,
                			},
                			768: {
                				items: 2,
                				nav: false,
                			},
                			992: {
                				items: 2
                			},
                			1000: {
                				items: 2
                			},
                			1920: {
                				items: 3,
                			}
                		}
                	})
				});
			</script>

		<?php }elseif($settings['select_style']=='four'){ ?>

			<div class="testimonial style4">
				<div class="testimonial-wrapper owl-carousel">
					<?php foreach (  $settings['slides'] as $item ) { ?>
						<div class="single-testimonial">
							<div class="testimonial-content">
								<div class="quote-text">
									<p>“<?php echo $item['quote_text']; ?>”</p>
								</div>
								<div class="client-profile">
									<div class="image">
										<img src="<?php echo $item['image']['url']; ?>" alt="">
									</div>
									<div class="client-bio">
										<h3 class="name"><?php echo $item['name']; ?></h3>
										<p class="designation"><?php echo $item['designation']; ?></p>
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
					$(".testimonial-wrapper").owlCarousel({
						items:1,
						nav:false,
						dots:true,
						margin:30,
						loop:true,
						autoplay:true,
					});
				});
			</script>

		<?php }elseif($settings['select_style']=='five'){ ?>

			<div class="testimonial style5">
				<div class="testimonial-area owl-carousel">
					<?php foreach (  $settings['slides'] as $item ) { ?>
					<div class="single-testimonial">
					    <div class="wrapper">
    						<div class="client-profile">
    						    <div class="image">
                                    <img src="<?php echo $item['image']['url']; ?>" alt="">
                                </div>
    							<div class="client-bio">
    								<h5 class="name"><?php echo $item['name']; ?></h5>
    								<p class="designation"><?php echo $item['designation']; ?></p>
    							</div>
    						</div>
    						<p class="quote-text"><?php echo $item['quote_text']; ?></p>
						</div>
						<div class="testi-footer">
							<div class="icon">
								<img src="<?php echo $item['icon']['url']; ?>" alt="">
							</div>
						    <div class="rating">
								<?php if( $item['rating'] == 5 ){ ?>
								<div class="rating-stars">
									<i class="fa fa-star active"></i>
									<i class="fa fa-star active"></i>
									<i class="fa fa-star active"></i>
									<i class="fa fa-star active"></i>
									<i class="fa fa-star active"></i>
								</div>
								<?php }elseif( $item['rating'] ==4){?>
								<div class="rating-stars">
									<i class="fa fa-star active"></i>
									<i class="fa fa-star active"></i>
									<i class="fa fa-star active"></i>
									<i class="fa fa-star active"></i>
									<i class="fa fa-star"></i>
								</div>
								<?php }elseif( $item['rating'] == 3 ){?>
								<div class="rating-stars">
									<i class="fa fa-star active"></i>
									<i class="fa fa-star active"></i>
									<i class="fa fa-star active"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
								<?php }elseif( $item['rating'] ==2){?>
								<div class="rating-stars">
									<i class="fa fa-star active"></i>
									<i class="fa fa-star active"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
								<?php }elseif( $item['rating'] ==1){?>
								<div class="rating-stars">
									<i class="fa fa-star active"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
								<?php } ?>
						    </div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>

            <script>
            	jQuery(document).ready(function($) {
            		"use strict";
                	
                	$('.testimonial-area').owlCarousel({
                		loop: true,
                		autoplay: false,
                		autoplayTimeout: 10000,
                		margin: 30,
                		dots: true,
                		nav: false,
                		navText: ["<i class='flaticon-back-1'></i>", "<i class='fa fa-angle-right'></i>"],
                		responsive: {
                			0: {
                				items: 1
                			},
                			768: {
                				items: 2
                			},
                			1025: {
                				items: 3
                			},
                		}
                	})
            	});
            </script>

		<?php } ?>
							
		<?php
	}

}

