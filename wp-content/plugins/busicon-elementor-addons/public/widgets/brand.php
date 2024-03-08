<?php

if(!defined('ABSPATH')) exit;

class Brand extends \Elementor\Widget_Base{

	public function get_name(){
		return "brand";
	}
	
	public function get_title(){
		return "Brand";
	}
	
	public function get_icon(){
		return "eicon-tags";
	}
	
	public function get_categories(){
		return ['busicon-category'];
	}

	protected function register_controls(){

		$this->start_controls_section(
			'brand_section',
			[
				'label' => __( 'Brand', 'busicon-elementor-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'brand_title', [
				'label' => __( 'Brand Title', 'busicon-elementor-extension' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'List Title' , 'busicon-elementor-extension' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'brand_image',
			[
				'label' => __( 'Brand Logo', 'busicon-elementor-extension' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'list',
			[
				'label' => __( 'Brand List', 'busicon-elementor-extension' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'brand_title' => __( 'Title #1', 'busicon-elementor-extension' ),
						'list_content' => __( 'Item content. Click the edit button to change this text.', 'busicon-elementor-extension' ),
					],
					[
						'brand_title' => __( 'Title #2', 'busicon-elementor-extension' ),
						'list_content' => __( 'Item content. Click the edit button to change this text.', 'busicon-elementor-extension' ),
					],
				],
				'title_field' => '{{{ brand_title }}}',
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
				'label' => __( 'Style', 'busicon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'select_style',
				[
					'label' => __( 'Select Style', 'busicon' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => [
						'one' => __( 'One', 'busicon' ),
						'two' => __( 'Two', 'busicon' ),
						'three' => __( 'Three', 'busicon' ),
					],
					'default' => 'one',
					
				]
			);
		$this->end_controls_section();
	}

	protected function render(){

		$settings = $this->get_settings_for_display();
		
		?>

		<?php if($settings['select_style']=='one'){ ?>

			<div class="brand style1">
				<div class="brand-carousel owl-carousel">
					<?php foreach (  $settings['list'] as $item ) { ?>
						<div class="brand-item">
							<img src="<?php echo $item['brand_image']['url']; ?>" alt="brand">
						</div>
					<?php } ?>
				</div>
			</div>
        	<script>
        		jQuery(document).ready(function($) {
        			"use strict";
                	$('.brand-carousel').owlCarousel({
                		dots: false,
                		nav: false,
                		margin: 20,
                		autoplay: true,
                		autoplayTimeout: 1000,
                		navText: ["<i class='fa fa-long-arrow-left'></i>", "<i class='fa fa-long-arrow-right''></i>"],
                		responsive: {
                			0: {
                				items: 2
                			},
                			768: {
                				items: 3
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

		<?php }elseif($settings['select_style']=='two'){ ?>

			<div class="brand style2">
				<div class="brand-carousel owl-carousel">
					<?php foreach (  $settings['list'] as $item ) { ?>
						<div class="brand-item">
							<img src="<?php echo $item['brand_image']['url']; ?>" alt="brand">
						</div>
					<?php } ?>
				</div>
			</div>
            <script>
                jQuery(document).ready(function($) {
                    "use strict";
                	$('.brand-carousel').owlCarousel({
                		dots: false,
                		nav: false,
                		margin: 30,
                		autoplayTimeout: 1000,
                		navText: ["<i class='fa fa-long-arrow-left'></i>", "<i class='fa fa-long-arrow-right''></i>"],
                		responsive: {
                			0: {
                				items: 2
                			},
                			768: {
                				items: 3
                			},
                			992: {
                				items: 3
                			},
                			1024: {
                				items: 3
                			},
                			1920: {
                				items: 5
                			}
                		}
                	})
        		});
        	</script>

		<?php }elseif($settings['select_style']=='three'){ ?>
	
			<div class="brand style3">
				<div class="brand-carousel owl-carousel">
					<?php foreach (  $settings['list'] as $item ) { ?>
						<div class="brand-item">
							<img src="<?php echo $item['brand_image']['url']; ?>" alt="brand">
						</div>
					<?php } ?>
				</div>
			</div>
        	<script>
        		jQuery(document).ready(function($) {
        			"use strict";
                	$('.brand-carousel').owlCarousel({
                	    loop: true,
                		dots: false,
                		nav: false,
                		margin: 120,
                		autoplay: true,
                		autoplayTimeout: 4000,
                		navText: ["<i class='fa fa-long-arrow-left'></i>", "<i class='fa fa-long-arrow-right''></i>"],
                		responsive: {
                			0: {
                				items: 2
                			},
                			768: {
                				items: 3
                			},
                			992: {
                				items: 3
                			},
                			1024: {
                				items: 3
                			},
                			1920: {
                				items: 5
                			}
                		}
                	})
        		});
        	</script>

		<?php } ?>

		<?php
	}
	
}