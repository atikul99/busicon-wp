<?php

use Elementor\Controls_Manager;

if(!defined('ABSPATH')) exit;

class LatestPost extends \Elementor\Widget_Base{

	public function get_name(){
		return "latestpost";
	}
	
	public function get_title(){
		return "Latest Post";
	}
	
	public function get_icon(){
		return "eicon-post-excerpt";
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
					'default' => __( 'Read More', 'busicon-elementor-addons' ),
				]
			);
			$this->add_control(
				'show_button',
				[
					'label' => __( 'Show Button', 'busicon-elementor-addons' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __( 'Show', 'busicon-elementor-addons' ),
					'label_off' => __( 'Hide', 'busicon-elementor-addons' ),
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
			'style_section',
			[
				'label' => __( 'Style', 'busicon-elementor-addons' ),
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
					],
					'default' => 'one',
					
				]
			);
		$this->end_controls_section();

		$this->start_controls_section(
			'meta_section_style',
			[
				'label' => __( 'Post Meta', 'busicon-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_control(
				'meta_color',
				[
					'label' => __( 'Color', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .latest-posts .single-post .post-content span' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'meta_typography',
					'selector' => '{{WRAPPER}} .latest-posts .single-post .post-content span',
				]
			);
			$this->add_responsive_control(
				'meta_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .latest-posts .single-post .post-content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .latest-posts .single-post .post-content h6 a' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'selector' => '{{WRAPPER}} .latest-posts .single-post .post-content h6 a',
				]
			);
			$this->add_responsive_control(
				'title_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .latest-posts .single-post .post-content h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		?>

        <?php if($settings['select_style']=='one'){ ?>

			<div class="latest-posts">
				<?php $the_query = new \WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 2 ) );

				while ($the_query->have_posts()) : $the_query->the_post();

				$url = get_the_post_thumbnail_url(); ?>

				<div class="single-post">
					<div class="post-thumb" style="background-image: url('<?php echo $url;?>'); background-repeat: no-repeat; background-size: cover; background-position: center;">
					</div>
					<div class="post-content">
						<h6 class="title"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 5 ); ?></a></h6>
						<span class="date"><?php echo get_the_date(); ?></span>
					</div>
				</div>
				<?php endwhile; ?>
			</div>

		<?php }elseif($settings['select_style']=='two'){ ?>
		
			<div class=" blog_style_two">				
				<div class="blog_wrap blog_carousel owl-carousel owl-loaded curosel-style">
				
					<?php $the_query = new \WP_Query( array( 'post_type' => 'post' ) ); ?>
					<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
						<!-- single blog -->
						<div class="col-md-12 col-xs-12 col-sm-12 " >
							<div class="single_blog_adn">
								<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="busicon-single-blog_adn ">

										<!-- BLOG THUMB -->
										
										<div class="busicon-blog-thumb_adn ">
											<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('busicon-blog-default'); ?></a>
											<div class="busicon-blog-meta-top">
												<?php the_category();?>
											</div>
										</div>									
										
										<!-- BLOG CONTENT -->
										<div class="em-blog-content-area_adn ">

											<!-- BLOG META -->
											<div class="busicon-blog-meta-left ">
												<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
																							</div>	

											<!-- BLOG TITLE -->
											<div class="blog-page-title_adn ">
												<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>			
											</div>

											<!-- BLOG BUTTON -->
											<?php if( 'yes'===$settings['show_button'] ){ ?>
											<div class="busicon-blog-readmore">
												<a href="<?php the_permalink(); ?>" class="learn_btn"><?php echo $settings['button_text']; ?><?php \Elementor\Icons_Manager::render_icon( $settings['button_icon'], [ 'aria-hidden' => 'true' ] ); ?></a>
											</div>
											<?php } ?>
											
										</div><!-- .em-blog-content-area_adn -->
										
									</div>
								
								</div> <!--  END SINGLE BLOG -->
	
									
							</div>
						
						</div>
					<?php endwhile; ?>
					
				</div>
			</div>
    		<script>
    			jQuery(document).ready(function($) {
    				"use strict";
                	/* Blog Curousel */
                	$('.blog_carousel').owlCarousel({
                		dots: true,
                		nav: true,
                		autoplayTimeout: 10000,
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
                			1920: {
                				items: 2
                			}
                		}
                	})	
            		});
            	</script>
		

		
		
		<?php } ?>

		<?php
	}
}