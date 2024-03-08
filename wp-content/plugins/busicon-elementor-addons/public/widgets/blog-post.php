<?php

use Elementor\Controls_Manager;

if(!defined('ABSPATH')) exit;

class BlogPost extends \Elementor\Widget_Base{

	public function get_name(){
		return "blogpost";
	}
	
	public function get_title(){
		return "Blog Post";
	}
	
	public function get_icon(){
		return "eicon-table-of-contents";
	}
	public function get_categories(){
		return ['busicon-category'];
	}
	
	protected function register_controls(){

		$this->start_controls_section(
			'button_section',
			[
				'label' => __( 'Button', 'busicon-elementor-extension' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
			$this->add_control(
				'button_text',
				[
					'label' => __( 'Button Text', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::TEXT,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => __( 'Enter your button text', 'busicon-elementor-extension' ),
					'label_block' => true,
					'default' => __( 'Read More', 'busicon-elementor-extension' ),
				]
			);
			$this->add_control(
				'show_button',
				[
					'label' => __( 'Show Button', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::SWITCHER,
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
					'type' => Controls_Manager::ICONS,
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
						'five' => __( 'Five', 'busicon-elementor-extension' ),
					],
					'default' => 'one',
					
				]
			);
		$this->end_controls_section();

		$this->start_controls_section(
			'meta_section_style',
			[
				'label' => __( 'Post Meta', 'busicon-elementor-extension' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_control(
				'meta_color',
				[
					'label' => __( 'Color', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .blog-post .blog-box .blog-content .author span' => 'color: {{VALUE}};',
						'{{WRAPPER}} .blog-post .blog-box .blog-content .category ul li a' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'meta_typography',
					'selector' => '{{WRAPPER}} .blog-post .blog-box .blog-content .author span, {{WRAPPER}} .blog-post .blog-box .blog-content .category ul li a',
				]
			);
			$this->add_responsive_control(
				'meta_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .blog-post .blog-box .blog-content .blog-meta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .blog-post .blog-box .blog-content .blog-title a' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'selector' => '{{WRAPPER}} .blog-post .blog-box .blog-content .blog-title',
				]
			);
			$this->add_responsive_control(
				'title_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .blog-post .blog-box .blog-content .blog-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'description_style',
			[
				'label' => __( 'Description', 'busicon-elementor-extension' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'description_color',
				[
					'label' => __( 'Color', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .blog-post .blog-box .blog-content .blog-excerpt' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'description_typography',
					'selector' => '{{WRAPPER}} .blog-post .blog-box .blog-content .blog-excerpt',
				]
			);
			$this->add_responsive_control(
				'description_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .blog-post .blog-box .blog-content .blog-excerpt' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		?>

        <?php if($settings['select_style']=='one'){ ?>

			<div class="blog-post style1">
				<div class="blog-lists owl-carousel">
        			<?php $the_query = new \WP_Query( array( 'post_type' => 'post' ) ); ?>
					<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

					<?php $url = get_the_post_thumbnail_url(); ?>
					<div class="blog-box">
						<div class="post-thumb">
							<?php the_post_thumbnail(); ?>
						</div>
						<div class="blog-content">
							<?php the_category();?>
							<h4 class="blog-title"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 15 ); ?></a></h4>
						</div>
						<div class="post-footer">
							<div class="author">
								<?php 
									$get_author =  get_the_author(); 
									$first_letter = substr($get_author, 0, 1);
									echo '<span>'.esc_html($first_letter).'</span>';
								?>
								<?php the_author(); ?>
							</div>
							<div class="bar"></div>
							<div class="date"><?php echo get_the_date( 'd M, Y' ) ?></div>
						</div>
        			</div>

        			<?php endwhile; ?>
				</div>
			</div>

			<script>
        		jQuery(document).ready(function($) {
        			"use strict";
                	$('.blog-lists').owlCarousel({
                		autoplay: false,
                		loop: true,
                		dots: false,
                		nav: false,
                		margin: 20,
                		autoplayTimeout: 5000,
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
                				items: 2,
                				nav: false,
                			},
                			1024: {
                				items: 3
                			},
                			1920: {
                				items: 3
                			}
                		}
                	})
        		});
			</script>

		<?php }elseif($settings['select_style']=='two'){ ?>
		
        	<div class="blog-post style2">
        		<div class="blog-carousel owl-carousel">
        			<?php $the_query = new \WP_Query( array( 'post_type' => 'post' ) ); ?>
					<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

					<?php $url = get_the_post_thumbnail_url(); ?>
					<div class="blog-box">
						<div class="blog-thumb" style="background-image: url('<?php echo $url;?>'); background-repeat: no-repeat; background-size: cover; background-position: center;">
						</div>
						<div class="blog-content">
							<div class="blog-meta">
								<div class="category">
									<i class="bi bi-bookmark"></i>
									<?php the_category();?>
								</div>
							</div>
							<h4 class="blog-title"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 6, '' ); ?></a></h4>
							<p class="description"><?php echo wp_trim_words(get_the_content(), 10, ''); ?></p>
						</div>
						<div class="blog-footer">
						    <p>Continue Reading</p>
						    <a href="<?php the_permalink(); ?>"><i aria-hidden="true" class="flaticon flaticon-right-arrow"></i></a>
						</div>
					</div>

        			<?php endwhile; ?>
        		</div>
        	</div>

    		<script>
    			jQuery(document).ready(function($) {
    				"use strict";
                	
                	$('.blog-carousel').owlCarousel({
                		dots: false,
                		nav: false,
                		autoplayTimeout: 10000,
                		margin: 25,
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
                				items: 3
                			}
                		}
                	})	
            		});
            	</script>

		<?php }elseif($settings['select_style']=='three'){ ?>

        	<div class="blog-post style3">
        		<div class="blog-lists owl-carousel">
        			<?php $the_query = new \WP_Query( array( 'post_type' => 'post' ) ); ?>
					<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

					<?php $url = get_the_post_thumbnail_url(); ?>
					<div class="blog-box" style="background: url('<?php echo $url;?>'); background-repeat: no-repeat; background-size: cover;">
        				<div class="blog-wrapper">
        					<div class="blog-content">
        						<div class="blog-meta">
        							<div class="category">
        								<i class="fa fa-folder-o"></i>
        								<?php the_category();?>
        							</div>
        							<div class="bar"></div>
        							<div class="author">
        								<i class="fa fa-user-o"></i>
        								<span><?php the_author(); ?></span>
        							</div>
        						</div>
        						<h4 class="blog-title"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 15 ); ?></a></h4>
        						<div class="blog-description">
        							<p class="blog-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 10 ); ?></p>
        						</div>
        						<div class="blog-button">
        							<a href="<?php the_permalink(); ?>">Read More</a>
        						</div>
        					</div>
        				</div>
        			</div>

        			<?php endwhile; ?>
        		</div>
        	</div>

        	<script>
        		jQuery(document).ready(function($) {
        			"use strict";
                	$('.blog-lists').owlCarousel({
                		autoplay: true,
                		loop: true,
                		dots: false,
                		nav: false,
                		margin: 20,
                		autoplayTimeout: 5000,
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
                				items: 3
                			},
                			1920: {
                				items: 3
                			}
                		}
                	})
        		});
        	</script>

        <?php }elseif($settings['select_style']=='four'){ ?>

        	<div class="blog-post style4">
        		<div class="blog-lists owl-carousel">
        			<?php $the_query = new \WP_Query( array( 'post_type' => 'post' ) ); ?>
					<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

					<?php $url = get_the_post_thumbnail_url(); ?>
					<div class="blog-box" style="background: url('<?php echo $url;?>'); background-repeat: no-repeat; background-size: cover;">
        				<div class="blog-wrapper">
        					<div class="blog-content">
        						<div class="blog-meta">
        							<div class="category">
        								<i class="fa fa-folder-o"></i>
        								<?php the_category();?>
        							</div>
        							<div class="bar"></div>
        							<div class="author">
        								<i class="fa fa-user-o"></i>
        								<span><?php the_author(); ?></span>
        							</div>
        						</div>
        						<h4 class="blog-title"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 5 ); ?></a></h4>
        					</div>
        				</div>
        			</div>

        			<?php endwhile; ?>
        		</div>
        	</div>

        	<script>
        		jQuery(document).ready(function($) {
        			"use strict";
                	$('.blog-lists').owlCarousel({
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
                				items: 1
                			},
                			992: {
                				items: 1
                			},
                			1024: {
                				items: 2
                			},
                			1920: {
                				items: 2
                			}
                		}
                	})
        		});
        	</script>

        <?php }elseif($settings['select_style']=='five'){ ?>

        	<div class="blog-post style5">
        		<div class="blog-carousel owl-carousel">
        			
        			<?php $the_query = new \WP_Query( array( 'post_type' => 'post' ) ); ?>
					<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
        			
        			<?php $url = get_the_post_thumbnail_url(); ?>
					<div class="blog-box">
						<div class="blog-thumb" style="background-image: url('<?php echo $url;?>'); background-repeat: no-repeat; background-size: cover; background-position: center;">
						</div>
						<div class="content-wrapper">
							<div class="blog-content">
								<h3 class="blog-title"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 6 ); ?></a></h3>
								<p class="blog-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
								<div class="blog-meta">
									<div class="category">
										<i class="fa fa-folder-o"></i>
										<?php the_category();?>
									</div>
									<div class="bar"></div>
									<div class="author">
										<i class="fa fa-user-o"></i>
										<span><?php the_author(); ?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
        			
        			<?php endwhile; ?>
        			
        		</div>
        	</div>
	
    		<script>
    			jQuery(document).ready(function($) {
    				"use strict";

                	$('.blog-carousel').owlCarousel({
                		loop: true,
                		dots: false,
                		nav: false,
                		autoplayTimeout: 10000,
                		margin: 25,
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
                	});

            	});
            </script>

		<?php } ?>

		<?php
	}
}