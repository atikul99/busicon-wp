<?php

use Elementor\Controls_Manager;

if(!defined('ABSPATH')) exit;

class CaseStudy extends \Elementor\Widget_Base{

	public function get_name(){
		return "case-study";
	}
	
	public function get_title(){
		return "Case Study";
	}
	
	public function get_icon(){
		return " eicon-document-file";
	}

	public function get_categories(){
		return ['busicon-category'];
	}

	protected function register_controls(){

		$this->start_controls_section(
			'portfolio_section',
			[
				'label' => __( 'Portfolio', 'busicon-elementor-extension' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'list_subtitle', [
					'label' => __( 'Subtitle', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'List Subtitle' , 'busicon-elementor-extension' ),
					'label_block' => true,
				]
			);

			$repeater->add_control(
				'list_title', [
					'label' => __( 'Title', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'List Title' , 'busicon-elementor-extension' ),
					'label_block' => true,
				]
			);

			$repeater->add_control(
				'website_link',
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
				'image',
				[
					'label' => __( 'Choose Image', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
				]
			);

			$this->add_control(
				'list',
				[
					'label' => __( 'Portfolio List', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[
							'list_subtitle' => __( 'Tech Services', 'busicon-elementor-extension' ),
							'list_title' => __( 'IT Management', 'busicon-elementor-extension' ),
						],
						[
							'list_subtitle' => __( 'Tech Services', 'busicon-elementor-extension' ),
							'list_title' => __( 'IT Management', 'busicon-elementor-extension' ),
						],
					],
					'title_field' => '{{{ list_title }}}',
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
					'three' => __( 'Three', 'busicon-elementor-extension' ),
					'four' => __( 'Four', 'busicon-elementor-extension' ),
				],
				'default' => 'one',

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
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .portfolio .portfolio-item .portfolio-content ul li a' => 'color: {{VALUE}}',
						'{{WRAPPER}} .portfolio .portfolio-item .portfolio-content .subtitle' => 'color: {{VALUE}}',
						'{{WRAPPER}} .portfolio.style3 .swiper-slide.swiper-slide-active .content p' => 'color: {{VALUE}}',
					],
				]
			);
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'subtitle_typography',
                    'label' => __( 'Typography', 'busicon-elementor-extension' ),
                    'selector' => '{{WRAPPER}} .portfolio .portfolio-item .portfolio-content ul li a, .portfolio .portfolio-item .portfolio-content .subtitle, .portfolio.style3 .swiper-slide.swiper-slide-active .content p',
                ]
            );
            $this->add_responsive_control(
                'subtitle_margin',
                [
                    'label' => __( 'Margin', 'busicon-elementor-extension' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .portfolio .portfolio-item .portfolio-content ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .portfolio .portfolio-item .portfolio-content .subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        '{{WRAPPER}} .portfolio.style3 .swiper-slide.swiper-slide-active .content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    'label' => __( 'Typography', 'busicon-elementor-extension' ),
                    'selector' => '{{WRAPPER}} .portfolio .portfolio-item .portfolio-content .title, .portfolio.style3 .swiper-slide.swiper-slide-active .content h3 a',
                ]
            );
			$this->add_responsive_control(
				'title_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-extension' ),
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

			<div class="case-study style1">
				<div class="case-carousel owl-carousel">
				<?php
					$the_query = new \WP_Query( array( 'post_type' => 'busicon_case_study' ) );
					while ($the_query->have_posts()) : $the_query->the_post();
				?>

				<div class="case-item">
					<div class="case-thumb">
						<?php the_post_thumbnail(); ?>
						<div class="case-content">
							<h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<ul class="category">
							    <?php
							        $terms = get_the_terms( get_queried_object()->term_id, 'busicon_case_study_cat' );
					                foreach ( $terms as $term ) {
				                ?>
							    <li><?php echo $term->name; ?></li>
							    <?php } ?>
							</ul>
						</div>
					</div>
				</div>

				<?php endwhile; ?>
				</div>
			</div>

        	<script>
        		jQuery(document).ready(function($) {
        			"use strict";
                	$('.case-carousel').owlCarousel({
                		loop: true,
                		dots: false,
                		nav: false,
                		margin: 20,
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
                				items: 3
                			},
                			1024: {
                				items: 3
                			},
                			1920: {
                				items: 4
                			}
                		}
                	})
        		});
        	</script>

		<?php }elseif( $settings['select_style']=='two' ){ ?>

			<div class="portfolio style2">
				<?php foreach (  $settings['list'] as $item ) { ?>
				<div class="portfolio-item">
					<div class="portfolio-thumb" style="background-image: url(<?php echo $item['image']['url']; ?>);"></div>
					<div class="portfolio-content">
						<div class="content-wrapper">
							<h6 class="subtitle"><?php echo $item['list_subtitle']; ?></h6>
							<h3><a class="title"> href="<?php echo esc_url($item['website_link']['url']); ?>"><?php echo $item['list_title']; ?></a></h3>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>

		<?php }elseif( $settings['select_style']=='three' ){ ?>

			<div class="portfolio style3">
				<div class="swiper-container">
					<div class="swiper-wrapper">
						<?php foreach (  $settings['list'] as $item ) { ?>
						<div class="swiper-slide" style="background-image: url(<?php echo $item['image']['url']; ?>);">
							<div class="content">
								<h3><a href="<?php echo esc_url($item['website_link']['url']); ?>"><?php echo $item['list_title']; ?></a></h3>
								<p><?php echo $item['list_subtitle']; ?></p>
							</div>
						</div>
						<?php } ?>
					</div>
					<div class="swiper-nav">
						<div class="swiper-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
						<div class="swiper-next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
					</div>
				</div>
			</div>

			<script>
				jQuery(document).ready(function($) {
					"use strict";

					var $swiper = $(".swiper-container");
					var $bottomSlide = null;
					var $bottomSlideContent = null;


					var mySwiper = new Swiper(".swiper-container", {
						spaceBetween: 1,
						slidesPerView: 3,
						centeredSlides: true,
						roundLengths: true,
						loop: true,
						loopAdditionalSlides: 30,
						navigation: {
							nextEl: ".swiper-next",
							prevEl: ".swiper-prev"
						},
						breakpoints: {
							767: {
								slidesPerView: 1,
							},
							991: {
								slidesPerView: 2,
							}
						}
					});

				});
			</script>

		<?php }elseif( $settings['select_style']=='four' ){ ?>

			<div class="portfolio style4">
				<?php foreach (  $settings['list'] as $item ) { ?>
				<div class="portfolio-item">
					<div class="portfolio-thumb" style="background-image: url(<?php echo $item['image']['url']; ?>);"></div>
					<div class="portfolio-content">
						<div class="content-wrapper">
							<a class="title"> href="<?php echo esc_url($item['website_link']['url']); ?>">+</a>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>

		<?php } ?>

		<?php

	}
}