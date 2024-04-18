<?php

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
				'label' => __( 'Button', 'busicon-elementor-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
			$this->add_control(
				'button_text',
				[
					'label' => __( 'Button Text', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::TEXT,
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
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => __( 'Show', 'busicon-elementor-addons' ),
					'label_off' => __( 'Hide', 'busicon-elementor-addons' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);
			$this->add_control(
				'button_icon',
				[
					'label' => __( 'Button Icon', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::ICONS,
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
						'three' => __( 'Three', 'busicon-elementor-addons' ),
						'four' => __( 'Four', 'busicon-elementor-addons' ),
						'five' => __( 'Five', 'busicon-elementor-addons' ),
					],
					'default' => 'one',
					
				]
			);
		$this->end_controls_section();

		$this->start_controls_section(
			'meta_section_style',
			[
				'label' => __( 'Post Meta', 'busicon-elementor-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_control(
				'meta_color',
				[
					'label' => __( 'Color', 'busicon-elementor-addons' ),
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
					'label' => __( 'Margin', 'busicon-elementor-addons' ),
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
				'label' => __( 'Title', 'busicon-elementor-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'title_color',
				[
					'label' => __( 'Color', 'busicon-elementor-addons' ),
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
					'label' => __( 'Margin', 'busicon-elementor-addons' ),
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
				'label' => __( 'Description', 'busicon-elementor-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'description_color',
				[
					'label' => __( 'Color', 'busicon-elementor-addons' ),
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
					'label' => __( 'Margin', 'busicon-elementor-addons' ),
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
				<div class="blog-lists">
					
					<?php $the_query = new \WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 3 ) ); ?>
					<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
						
					<?php $url = get_the_post_thumbnail_url(); ?>
					<div class="blog-box">
						<div class="post-thumb">
							<?php the_post_thumbnail(); ?>
						</div>
						
						<div class="blog-content">
							<div class="post-meta">
								<div class="author">
									<i class="fa-regular fa-user"></i><a href="<?php echo get_the_author_meta( 'url' ) ?>"><?php the_author(); ?></a>
								</div>
								<div class="date"><?php echo get_the_date( 'd M, Y' ) ?></div>
							</div>
							<h4 class="blog-title"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 15 ); ?></a></h4>
						</div>
					</div>

					<?php endwhile; ?>
					
				</div>
			</div>

		<?php }elseif($settings['select_style']=='two'){ ?>
		
        	<div class="blog-post style2">
        		<div class="blog-lists">
        			<?php $the_query = new \WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 3 ) ); ?>
					<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

					<div class="blog-box">
						<div class="blog-thumb">
							<?php the_post_thumbnail(); ?>
						</div>
						<div class="blog-content">
							<div class="date"><?php echo get_the_date( 'd M' ) ?></div>
							<div class="blog-meta">
								<div class="author"><?php esc_html_e('By ', 'busicon-elementor-addons'); the_author();?></div>
							</div>
							<h4 class="blog-title"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 6, '' ); ?></a></h4>
							<div class="underline"></div>
							<p class="description"><?php echo wp_trim_words(get_the_content(), 15, ''); ?></p>
							<a class="read-more" href="<?php the_permalink(); ?>"><?php echo $settings['button_text']; ?><i aria-hidden="true" class="fa-solid fa-arrow-right"></i></a>
						</div>
					</div>

        			<?php endwhile; ?>
        		</div>
        	</div>

		<?php }elseif($settings['select_style']=='three'){ ?>

			<div class="blog-post style3">
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