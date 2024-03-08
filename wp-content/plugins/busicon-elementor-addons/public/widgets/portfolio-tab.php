<?php

if(!defined('ABSPATH')) exit;

class PortfolioTab extends \Elementor\Widget_Base{

	public function get_name(){
		return "portfolio-tab";
	}
	
	public function get_title(){
		return "Portfolio Tab";
	}
	
	public function get_icon(){
		return "eicon-star-o";
	}

	public function get_categories(){
		return ['busicon-category'];
	}

	protected function register_controls(){

		$this->start_controls_section(
			'tab_section',
			[
				'label' => __( 'Tab', 'busicon-elementor-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
			$this->add_control(
				'all_works_text',
				[
					'label' => __( 'All Works Text', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => __( 'Enter All Works text', 'busicon-elementor-extension' ),
					'label_block' => true,
					'default' => __( 'All Works', 'busicon-elementor-extension' ),
				]
			);
		$this->end_controls_section();

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'busicon-elementor-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
            $this->add_control(
                'post_number',
                [
				    'label' => esc_html__( 'Number of Posts to Show', 'busicon-elementor-extension' ),
				    'type' => \Elementor\Controls_Manager::NUMBER,
				    'min' => 1,
				    'max' => 100,
				    'step' => 1,
				    'default' => 6,
			    ]
		    );
		    $this->add_control(
                'post_offset',
                [
				    'label' => esc_html__( 'Offset Posts', 'busicon-elementor-extension' ),
				    'type' => \Elementor\Controls_Manager::NUMBER,
				    'min' => 1,
				    'max' => 100,
				    'step' => 1,
			    ]
		    );
			$this->add_control(
				'select_column',
				[
					'label' => __( 'Select Column', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => [
						'12' => __( '1 Column', 'busicon-elementor-extension' ),
						'6'	=> __( '2 Column', 'busicon-elementor-extension' ),
						'4'	=> __( '3 Column', 'busicon-elementor-extension' ),
						'3'	=> __( '4 Column', 'busicon-elementor-extension' )
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
					],
					'default' => 'one',
					
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'tab_style_section',
			[
				'label' => __( 'Tab', 'busicon-elementor-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_control(
				'tab_color',
				[
					'label' => __( 'Color', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .current_menu_item' => 'background: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border',
					'label' => __( 'Border', 'busicon-elementor-extension' ),
					'selector' => '{{WRAPPER}} .portfolio_nav ul li',
				]
			);
		$this->end_controls_section();

	}

	protected function render(){

		$settings = $this->get_settings_for_display();

		$args = array(
			'post_type' => 'busicon_portfolio',
			'posts_per_page' => $settings['post_number'],
			'offset' => $settings['post_offset'],
		);
		$the_query = new \WP_Query($args);

		?>

		<?php if($settings['select_style']=='one'){ ?>

			<div class="portfolio-tab style1">

				<div class="portfolio-nav">
					<ul id="filter" class="filter_menu ">
						<li class="current_menu_item" data-filter="*" ><?php echo $settings['all_works_text'];?></li>
						<?php $categories = get_terms('busicon_portfolio_cat');

						foreach ( $categories as $single_category ) {?>										
							<li   data-filter=".<?php echo esc_attr( $single_category->slug );?>"><?php echo esc_html( $single_category->name );?></li>
						<?php }?>
					</ul>
				</div>

				<div class="portfolio-wrap">					
					<div class="row">
						<?php while ($the_query->have_posts()) : $the_query->the_post(); 
						
							$terms = get_the_terms(get_the_ID(), 'busicon_portfolio_cat');
						?>

						<div class="col-md-6 col-lg-<?php echo $settings['select_column']; ?> grid-item <?php foreach( $terms as $single_slug){echo $single_slug->slug. ' ';}	?>" >

							<div class="protfolio-item">
								<div class="thumbnail">
									<?php the_post_thumbnail();?>
								</div>
								<div class="portfolio-content">
									<p>
										<?php if( $terms ){
											foreach( $terms as $single_slugs ){?>
												<span class="category-item">
													<?php echo $single_slugs->name ;?>
												</span>
										<?php }}?>
									</p>
									<h3 class="title"><?php the_title();?></h3>
									<a href="<?php the_permalink(); ?>"><?php echo esc_html_e("Get Started"); ?><i class="bi bi-arrow-right-short"></i></a>
								</div>
							</div>
						</div>
						<?php endwhile; ?>
						<?php wp_reset_query(); ?>
					</div>
				</div>
			</div>

			<script>
				jQuery(document).ready(function($) {
					"use strict";

					if ($.fn.isotope) {

						var $portfolio = $('.portfolio-wrap');

						$portfolio.isotope({

							itemSelector: '.grid-item',

							filter: '*',

							resizesContainer: true,

							layoutMode: 'masonry',

							transitionDuration: '0.8s'

						});
						$('.filter_menu li').on('click', function () {

							$('.filter_menu li').removeClass('current_menu_item');

							$(this).addClass('current_menu_item');

							var selector = $(this).attr('data-filter');

							$portfolio.isotope({

								filter: selector,

							});

						});

					};

				});
			</script>

		<?php }elseif($settings['select_style']=='two'){ ?>

			<div class="portfolio-tab style2">

				<div class="portfolio-nav">
					<ul id="filter" class="filter_menu ">
						<li class="current_menu_item" data-filter="*" ><?php echo $settings['all_works_text'];?></li>
						<?php $categories = get_terms('busicon_cat');

						foreach ( $categories as $single_category ) { ?>
							<li   data-filter=".<?php echo esc_attr( $single_category->slug );?>"><?php echo esc_html( $single_category->name );?></li>
						<?php }?>
					</ul>
				</div>

				<div class="portfolio-wrap">
					<div class="row">
						<?php while ($the_query->have_posts()) : $the_query->the_post();
						
							$terms = get_the_terms(get_the_ID(), 'busicon_cat');
						?>

						<div class="col-md-6 col-lg-<?php echo $settings['select_column']; ?> grid-item <?php foreach( $terms as $single_slug){echo $single_slug->slug. ' ';}	?>" >

							<div class="protfolio-item">
								<div class="thumbnail">
										
									<?php the_post_thumbnail();?>

									<div class="portfolio-content">
										<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
										<p>
											<?php if( $terms ){
											foreach( $terms as $single_slugs ){?>
												<span class="category-item">
													<?php echo $single_slugs->name ;?>
												</span>
											<?php }}?>
										</p>
									</div>
								</div>
							</div>
						</div>
						<?php endwhile; ?>	
						<?php wp_reset_query(); ?>
					</div>
				</div>
			</div>

			<script>
				jQuery(document).ready(function($) {
					"use strict";

					$('.portfolio-wrap').imagesLoaded(function () {

						if ($.fn.isotope) {

							var $portfolio = $('.portfolio-wrap');

							$portfolio.isotope({

								itemSelector: '.grid-item',

								filter: '*',

								resizesContainer: true,

								layoutMode: 'masonry',

								transitionDuration: '0.8s'

							});
							$('.filter_menu li').on('click', function () {

								$('.filter_menu li').removeClass('current_menu_item');

								$(this).addClass('current_menu_item');

								var selector = $(this).attr('data-filter');

								$portfolio.isotope({

									filter: selector,

								});

							});

						};

					});

				});
			</script>
			
		<?php }elseif($settings['select_style']=='three'){ ?>

			<div class="portfolio-tab style3">

				<div class="portfolio-nav">
					<ul id="filter" class="filter_menu ">
						<li class="current_menu_item" data-filter="*" ><?php echo $settings['all_works_text'];?></li>
						<?php $categories = get_terms('busicon_cat');

						foreach ( $categories as $single_category ) {?>										
							<li   data-filter=".<?php echo esc_attr( $single_category->slug );?>"><?php echo esc_html( $single_category->name );?></li>
						<?php }?>
					</ul>
				</div>

				<div class="portfolio-wrap">					
					<div class="row">				
						<?php while ($the_query->have_posts()) : $the_query->the_post();
						
							$terms = get_the_terms(get_the_ID(), 'busicon_cat');
						?>

						<div class="col-md-6 col-lg-<?php echo $settings['select_column']; ?> grid-item <?php foreach( $terms as $single_slug){echo $single_slug->slug. ' ';}	?>" >

							<div class="protfolio-item">
								<div class="thumbnail">
										
									<?php the_post_thumbnail();?>

									<div class="portfolio-content">
										
											<?php if( $terms ){
											foreach( $terms as $single_slugs ){?>
												<span class="category-item">
													<?php echo $single_slugs->name ;?>
												</span>
											<?php }}?>
										
										<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
									</div>
								</div>
							</div>
						</div>
						<?php endwhile; ?>	
						<?php wp_reset_query(); ?>
					</div>
				</div>
			</div>

			<script>
				jQuery(document).ready(function($) {
					"use strict";

					$('.portfolio-wrap').imagesLoaded(function () {

						if ($.fn.isotope) {

							var $portfolio = $('.portfolio-wrap');

							$portfolio.isotope({

								itemSelector: '.grid-item',

								filter: '*',

								resizesContainer: true,

								layoutMode: 'masonry',

								transitionDuration: '0.8s'

							});
							$('.filter_menu li').on('click', function () {

								$('.filter_menu li').removeClass('current_menu_item');

								$(this).addClass('current_menu_item');

								var selector = $(this).attr('data-filter');

								$portfolio.isotope({

									filter: selector,

								});

							});

						};

					});

				});
			</script>
			
		<?php }elseif($settings['select_style']=='four'){ ?>

			<div class="portfolio-tab style4">

				<div class="portfolio-nav">
					<ul id="filter" class="filter_menu ">
						<li class="current_menu_item" data-filter="*" ><?php echo $settings['all_works_text'];?></li>
						<?php $categories = get_terms('busicon_cat');

						foreach ( $categories as $single_category ) {?>										
							<li   data-filter=".<?php echo esc_attr( $single_category->slug );?>"><?php echo esc_html( $single_category->name );?></li>
						<?php }?>
					</ul>
				</div>

				<div class="portfolio-wrap">					
					<div class="row">
						<?php while ($the_query->have_posts()) : $the_query->the_post(); 
						
							$terms = get_the_terms(get_the_ID(), 'busicon_cat');
						?>

						<div class="col-md-6 col-lg-<?php echo $settings['select_column']; ?> grid-item <?php foreach( $terms as $single_slug){echo $single_slug->slug. ' ';}	?>" >

							<div class="protfolio-item">
								<div class="thumbnail">
									<?php the_post_thumbnail();?>
								</div>
								
								<div class="portfolio-content">
									<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
									<div class="button">
                                        <a href="<?php the_permalink(); ?>"><i aria-hidden="true" class="flaticon flaticon-right-arrow"></i></a>
									</div>
								</div>
								
							</div>
						</div>
						<?php endwhile; ?>
						<?php wp_reset_query(); ?>
					</div>
				</div>
			</div>

			<script>
				jQuery(document).ready(function($) {
					"use strict";

					$('.portfolio-wrap').imagesLoaded(function () {

						if ($.fn.isotope) {

							var $portfolio = $('.portfolio-wrap');

							$portfolio.isotope({

								itemSelector: '.grid-item',

								filter: '*',

								resizesContainer: true,

								layoutMode: 'masonry',

								transitionDuration: '0.8s'

							});
							$('.filter_menu li').on('click', function () {

								$('.filter_menu li').removeClass('current_menu_item');

								$(this).addClass('current_menu_item');

								var selector = $(this).attr('data-filter');

								$portfolio.isotope({

									filter: selector,

								});

							});

						};

					});

				});
			</script>
			
		<?php } ?>

		<?php

	}
}