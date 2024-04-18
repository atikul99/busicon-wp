<?php

if(!defined('ABSPATH')) exit;

class PortfolioGrid extends \Elementor\Widget_Base{

	public function get_name(){
		return "portfolio-grid";
	}
	
	public function get_title(){
		return "Portfolio Grid";
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
				'label' => __( 'Portfolio', 'busicon-elementor-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

			$this->add_control(
				'column_number',
				[
					'label' => esc_html__( 'Column Number', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => [
						'12' => esc_html__( '1 Column', 'busicon-elementor-addons' ),
						'6'  => esc_html__( '2 Column', 'busicon-elementor-addons' ),
						'4'  => esc_html__( '3 Column', 'busicon-elementor-addons' ),
						'3'  => esc_html__( '4 Column', 'busicon-elementor-addons' ),
					],
					'default' => '4',
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
				],
				'default' => 'one',

			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'subtitle_style',
			[
				'label' => __( 'Subtitle', 'busicon-elementor-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'subtitle_color',
				[
					'label' => __( 'Color', 'busicon-elementor-addons' ),
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
                    'label' => __( 'Typography', 'busicon-elementor-addons' ),
                    'selector' => '{{WRAPPER}} .portfolio .portfolio-item .portfolio-content ul li a, .portfolio .portfolio-item .portfolio-content .subtitle, .portfolio.style3 .swiper-slide.swiper-slide-active .content p',
                ]
            );
            $this->add_responsive_control(
                'subtitle_margin',
                [
                    'label' => __( 'Margin', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
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
				'label' => __( 'Title', 'busicon-elementor-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'title_color',
				[
					'label' => __( 'Color', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .portfolio-grid .item .content .title a' => 'color: {{VALUE}}',
					],
				]
			);
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Typography', 'busicon-elementor-addons' ),
                    'selector' => '{{WRAPPER}} .portfolio-grid .item .content .title',
                ]
            );
			$this->add_responsive_control(
				'title_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .portfolio-grid .item .content .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();
	}

	protected function render(){

		$settings = $this->get_settings_for_display();

		?>

		<?php if($settings['select_style']=='one'){ ?>

			<div class="portfolio-grid style1">
				<div class="row">
					<?php
					$args = array(
						'post_type' => 'portfolio',
						'posts_per_page' => -1,
					);
					$the_query = new \WP_Query($args);
					?>
					<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

						<div class="col-md-6 col-lg-<?php if(!empty($settings['column_number'])){echo $settings['column_number'];} ?>">
							<div class="item">
								<div class="thumb">
									<?php the_post_thumbnail();?>
								</div>
								<div class="content">
									<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
									<a class="button" href="<?php the_permalink(); ?>"><i class="fa-solid fa-angle-right"></i></a>
								</div>
							</div>
						</div>

					<?php endwhile; ?>
				</div>
			</div>

		<?php }elseif( $settings['select_style']=='two' ){ ?>

			<div class="portfolio-grid style2">
				<div class="row">
					<?php
					$args = array(
						'post_type' => 'portfolio',
						'posts_per_page' => -1,
					);
					$the_query = new \WP_Query($args);
					?>
					<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
						
						<div class="col-md-4">
							<div class="item">
								<div class="thumb">
									<?php the_post_thumbnail();?>
								</div>
								<div class="content">
									<ul class="category">
										<?php $categories = get_the_terms(get_the_ID(), 'portfolio_cat');
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

		<?php } ?>

		<?php

	}
}