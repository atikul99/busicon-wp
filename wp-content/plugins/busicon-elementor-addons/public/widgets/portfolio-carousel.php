<?php

use Elementor\Controls_Manager;

if(!defined('ABSPATH')) exit;

class PortfolioCarousel extends \Elementor\Widget_Base{

	public function get_name(){
		return "portfolio-carousel";
	}
	
	public function get_title(){
		return "Portfolio Carousel";
	}
	
	public function get_icon(){
		return "eicon-slider-album";
	}

	public function get_categories(){
		return ['busicon-category'];
	}

	protected function register_controls(){

		$this->start_controls_section(
			'portfolio_section',
			[
				'label' => __( 'Portfolio', 'busicon-elementor-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
			
			$this->add_control(
				'show_category',
				[
					'label' => esc_html__( 'Show Category', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'busicon-elementor-addons' ),
					'label_off' => esc_html__( 'Hide', 'busicon-elementor-addons' ),
					'return_value' => 'yes',
					'default' => 'yes',
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
				'tab' => Controls_Manager::TAB_STYLE,
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
				],
				'default' => 'one',

			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'subtitle_style',
			[
				'label' => __( 'Subtitle', 'busicon-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'subtitle_color',
				[
					'label' => __( 'Color', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .portfolio .portfolio-item .portfolio-content ul li a' => 'color: {{VALUE}}',
						'{{WRAPPER}} .portfolio .portfolio-item .portfolio-content .category span' => 'color: {{VALUE}}',
					],
				]
			);
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'subtitle_typography',
                    'label' => __( 'Typography', 'busicon-elementor-addons' ),
                    'selector' => '{{WRAPPER}} .portfolio .portfolio-item .portfolio-content ul li a, .portfolio .portfolio-item .portfolio-content .category span',
                ]
            );
            $this->add_responsive_control(
                'subtitle_margin',
                [
                    'label' => __( 'Margin', 'busicon-elementor-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .portfolio .portfolio-item .portfolio-content ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .portfolio .portfolio-item .portfolio-content .category span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

		$this->end_controls_section();

		$this->start_controls_section(
			'title_style',
			[
				'label' => __( 'Title', 'busicon-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'title_color',
				[
					'label' => __( 'Color', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .portfolio .portfolio-item .portfolio-content .title' => 'color: {{VALUE}}',
						'{{WRAPPER}} .portfolio.style3 .swiper-slide.swiper-slide-active .content h3 a' => 'color: {{VALUE}}',
					],
				]
			);
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Typography', 'busicon-elementor-addons' ),
                    'selector' => '{{WRAPPER}} .portfolio .portfolio-item .portfolio-content .title, .portfolio.style3 .swiper-slide.swiper-slide-active .content h3 a',
                ]
            );
			$this->add_responsive_control(
				'title_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-addons' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .portfolio .portfolio-item .portfolio-content .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .portfolio.style3 .swiper-slide.swiper-slide-active .content h3 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
	}

	protected function render(){

		$settings = $this->get_settings_for_display();

		?>

		<?php if($settings['select_style']=='one'){ ?>

			<div class="portfolio style1">
				<div class="portfolio-carousel owl-carousel">
				<?php
					$the_query = new \WP_Query( array( 'post_type' => 'portfolio' ) );
					while ($the_query->have_posts()) : $the_query->the_post();
				?>

				<div class="portfolio-item">
					<div class="portfolio-thumb">
						<?php the_post_thumbnail(); ?>
					</div>
					<div class="portfolio-content">
						<div class="text">
							<?php if ( 'yes' === $settings['show_category'] ) { ?>

								<?php
									$terms = get_the_terms( get_the_ID(), 'portfolio_cat' );
									if( !empty($terms) ):
								?>
									<div class="category">
										<?php
											foreach ($terms as $term) {
												echo '<span>' . $term->name . '</span>';
											}
										?>
									</div>
								<?php endif; ?>

							<?php } ?>
							<h3 class="title"><?php the_title(); ?></h3>
						</div>
						<a class="button" href="<?php the_permalink(); ?>">
							<i class="fa-solid fa-arrow-right"></i>
						</a>
					</div>
				</div>

				<?php endwhile; ?>
				</div>
			</div>

			<script>
				jQuery(document).ready(function($) {
					"use strict";

					$('.portfolio-carousel').owlCarousel({
						loop: true,
						dots: true,
						nav: false,
						margin: 30,
						autoplayTimeout: 1000,
						navText: ["<i class='fa fa-long-arrow-left'></i>", "<i class='fa fa-long-arrow-right''></i>"],
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
							1024: {
								items: 1,
								stagePadding: 200,
							},
							1366: {
								items: 1,
								stagePadding: 300,
							},
							1920: {
								items: 1,
								stagePadding: 535,
							}
						}
					})
				});
			</script>

		<?php }elseif( $settings['select_style']=='two' ){ ?>

			<div class="portfolio style2">
				<div class="portfolio-carousel owl-carousel">
				<?php
					$the_query = new \WP_Query( array( 'post_type' => 'portfolio' ) );
					while ($the_query->have_posts()) : $the_query->the_post();
				?>

				<div class="portfolio-item">
					<div class="portfolio-thumb">
						<?php the_post_thumbnail(); ?>
					</div>
					<div class="portfolio-content">
						<div class="text">
							<?php if ( 'yes' === $settings['show_category'] ) { ?>
								<div class="category">
									<?php
										$terms = get_the_terms( get_the_ID(), 'portfolio_cat' );
										foreach ($terms as $term) {
											echo '<span>' . $term->name . '</span>';
										}
									?>
								</div>
							<?php } ?>
							<h3 class="title"><?php the_title(); ?></h3>
						</div>
						<a class="button" href="<?php the_permalink(); ?>">
							<i class="fa-solid fa-arrow-right"></i>
						</a>
					</div>
				</div>

				<?php endwhile; ?>
				</div>
			</div>

			<script>
				jQuery(document).ready(function($) {
					"use strict";

					$('.portfolio-carousel').owlCarousel({
						loop: true,
						dots: false,
						nav: false,
						margin: 30,
						autoplayTimeout: 1000,
						navText: ["<i class='fa fa-long-arrow-left'></i>", "<i class='fa fa-long-arrow-right''></i>"],
						responsive: {
							0: {
								items: 1
							},
							768: {
								items: 2
							},
							992: {
								items: 2
							},
							1200: {
								items: 3
							},
							1920: {
								items: 3,
								stagePadding: 315,
							}
						}
					})
				});
			</script>

		<?php }elseif( $settings['select_style']=='three' ){ ?>

			<div class="portfolio style3">
				<div class="portfolio-carousel owl-carousel">
				<?php
					$the_query = new \WP_Query( array( 'post_type' => 'portfolio' ) );
					while ($the_query->have_posts()) : $the_query->the_post();
				?>

				<div class="portfolio-item">
					<div class="portfolio-thumb">
						<?php the_post_thumbnail(); ?>
					</div>
					<div class="portfolio-content">
						<?php if ( 'yes' === $settings['show_category'] ) { ?>
							<div class="category">
								<?php
									$terms = get_the_terms( get_the_ID(), 'portfolio_cat' );
									foreach ($terms as $term) {
										echo '<span>' . $term->name . '</span>';
									}
								?>
							</div>
						<?php } ?>
						<h3 class="title"><?php the_title(); ?></h3>
						<a class="button" href="<?php the_permalink(); ?>">
							<?php echo esc_html('See Details'); ?>
							<i class="bi bi-arrow-right-short"></i>
						</a>
					</div>
				</div>

				<?php endwhile; ?>
				</div>
			</div>

			<script>
				jQuery(document).ready(function($) {
					"use strict";

					$('.portfolio-carousel').owlCarousel({
						loop: true,
						dots: true,
						nav: false,
						margin: 30,
						autoplayTimeout: 1000,
						navText: ["<i class='fa fa-long-arrow-left'></i>", "<i class='fa fa-long-arrow-right''></i>"],
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
							1024: {
								items: 2
							},
							1920: {
								items: 4
							}
						}
					})
				});
			</script>

		<?php } ?>

		<?php

	}
}