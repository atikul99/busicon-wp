<?php

use Elementor\Controls_Manager;

if(!defined('ABSPATH')) exit;

class PortfolioList extends \Elementor\Widget_Base{

	public function get_name(){
		return "portfolio-list";
	}
	
	public function get_title(){
		return "Portfolio List";
	}
	
	public function get_icon(){
		return "eicon-checkbox";
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

			<div class="portfolio-list style1">
			    <div class="row">
                    <?php
                		$args = array(
                			'post_type' => 'busicon_portfolio',
                		);
                		$the_query = new \WP_Query($args);
    			    ?>
    			    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
    			    
    			    <div class="col-md-6">
        				<div class="item">
        				    <div class="thumb">
        				        <?php the_post_thumbnail();?>
        				    </div>
        				    <div class="content">
        				        <ul class="category">
            				        <?php $categories = get_the_terms(get_the_ID(), 'busicon_cat');
            				        foreach ( $categories as $single_category ) { ?>
            				            <li><?php echo esc_html( $single_category->name );?></li>
            				        <?php }?>
        				        </ul>
        				        <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
        				    </div>
        				</div>
                    </div>
                    
                    <?php endwhile; ?>
				</div>
			</div>

        	<script>
        		jQuery(document).ready(function($) {
        			"use strict";
                    $(".option").click(function(){
                        $(".option").removeClass("active");
                        $(this).addClass("active");
                    });
        		});
        	</script>

		<?php }elseif( $settings['select_style']=='two' ){ ?>

			<div class="portfolio-list style2">
			    
			    
            <div class="options">
				<div class="option active" style="--optionBackground:url(https://66.media.tumblr.com/6fb397d822f4f9f4596dff2085b18f2e/tumblr_nzsvb4p6xS1qho82wo1_1280.jpg);">
					<div class="shadow"></div>
					<div class="label">
						<div class="icon">
							<i class="fas fa-walking"></i>
						</div>
						<div class="info">
							<div class="main">Blonkisoaz</div>
							<div class="sub">Omuke trughte a otufta</div>
						</div>
					</div>
				</div>
				<div class="option" style="--optionBackground:url(https://66.media.tumblr.com/8b69cdde47aa952e4176b4200052abf4/tumblr_o51p7mFFF21qho82wo1_1280.jpg);">
					<div class="shadow"></div>
					<div class="label">
						<div class="icon">
							<i class="fas fa-snowflake"></i>
						</div>
						<div class="info">
							<div class="main">Oretemauw</div>
							<div class="sub">Omuke trughte a otufta</div>
						</div>
					</div>
				</div>
				<div class="option" style="--optionBackground:url(https://66.media.tumblr.com/5af3f8303456e376ceda1517553ba786/tumblr_o4986gakjh1qho82wo1_1280.jpg);">
					<div class="shadow"></div>
					<div class="label">
						<div class="icon">
							<i class="fas fa-tree"></i>
						</div>
						<div class="info">
							<div class="main">Iteresuselle</div>
							<div class="sub">Omuke trughte a otufta</div>
						</div>
					</div>
				</div>
				<div class="option" style="--optionBackground:url(https://66.media.tumblr.com/5516a22e0cdacaa85311ec3f8fd1e9ef/tumblr_o45jwvdsL11qho82wo1_1280.jpg);">
					<div class="shadow"></div>
					<div class="label">
						<div class="icon">
							<i class="fas fa-tint"></i>
						</div>
						<div class="info">
							<div class="main">Idiefe</div>
							<div class="sub">Omuke trughte a otufta</div>
						</div>
					</div>
				</div>
				<div class="option" style="--optionBackground:url(https://66.media.tumblr.com/f19901f50b79604839ca761cd6d74748/tumblr_o65rohhkQL1qho82wo1_1280.jpg);">
					<div class="shadow"></div>
					<div class="label">
						<div class="icon">
							<i class="fas fa-sun"></i>
						</div>
						<div class="info">
							<div class="main">Inatethi</div>
							<div class="sub">Omuke trughte a otufta</div>
						</div>
					</div>
				</div>
			</div>
				
				
			</div>

        	<script>
        		jQuery(document).ready(function($) {
        			"use strict";
                    $(".option").click(function(){
                        $(".option").removeClass("active");
                        $(this).addClass("active");
                    });
        		});
        	</script>

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