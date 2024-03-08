<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if(!defined('ABSPATH')) exit;

class ProgressBar extends \Elementor\Widget_Base{

	public function get_name(){
		return "progress-bar";
	}
	
	public function get_title(){
		return "Progress Bar";
	}
	
	public function get_icon(){
		return "eicon-skill-bar";
	}
	public function get_categories(){
		return ['busicon-category'];
	}
	
	protected function register_controls(){

		$this->start_controls_section(
			'progress_section',
			[
				'label' => __( 'Progress', 'busicon-elementor-extension' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

            $repeater = new \Elementor\Repeater();
            
            $repeater->add_control(
                'title', [
                    'label' => __( 'Title', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Software Development' , 'busicon-elementor-extension' ),
                    'label_block' => true,
                ]
            );
    		$repeater->add_control(
    			'progress_percent',
    			[
    				'label' => esc_html__( 'Progress Percent', 'busicon-elementor-extension' ),
    				'type' => \Elementor\Controls_Manager::NUMBER,
    				'min' => 1,
    				'max' => 100,
    				'step' => 1,
    				'default' => 50,
    			]
    		);
            
            $this->add_control(
                'list',
                [
                    'label' => __( 'Progress List', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'title' => __( 'Software Development', 'busicon-elementor-extension' ),
                        ],
                        [
                            'title' => __( 'UI/UX Design', 'busicon-elementor-extension' ),
                        ],
                    ],
                    'title_field' => '{{{ title }}}',
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
					],
					'default' => 'one',
					
				]
			);
			
		$this->end_controls_section();

		$this->start_controls_section(
			'bar_style',
			[
				'label' => __( 'Progress Bar', 'busicon-elementor-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'progress_color',
				[
					'label' => __( 'Color', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .progress-item .progress-per' => 'background: {{VALUE}}',
					],
				]
			);
            
		$this->end_controls_section();
		
		$this->start_controls_section(
			'title_style',
			[
				'label' => __( 'Title', 'busicon-elementor-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'title_color',
				[
					'label' => __( 'Color', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .progress-item .progress-name' => 'color: {{VALUE}}',
					],
				]
			);
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Typography', 'busicon-elementor-extension' ),
                    'selector' => '{{WRAPPER}} .progress-item .progress-name',
                ]
            );
            $this->add_responsive_control(
                'title_margin',
                [
                    'label' => __( 'Margin', 'busicon-elementor-extension' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .progress-item .progress-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
		$this->end_controls_section();

		$this->start_controls_section(
			'percent_style',
			[
				'label' => __( 'Progress Percent', 'busicon-elementor-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'percent_color',
				[
					'label' => __( 'Color', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .progress-item .progress-per::before' => 'color: {{VALUE}}',
					],
				]
			);
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'percent_typography',
                    'label' => __( 'Typography', 'busicon-elementor-extension' ),
                    'selector' => '{{WRAPPER}} .progress-item .progress-per::before',
                ]
            );
            
		$this->end_controls_section();
	}
	
	protected function render() {
	    
        $settings = $this->get_settings_for_display();
        
        ?>
        
        <?php if($settings['select_style']=='one'){ ?>
        
			<?php foreach (  $settings['list'] as $item ) { ?>
				<div class="progress-item style1">
					<div class="progress-name"><?php echo $item['title']; ?></div>
					<div class="progress-stick">
						<div class="progress-per" per="<?php echo $item['progress_percent']; ?>"></div>
					</div>
				</div>
			<?php } ?>
			
			<script>
				jQuery(document).ready(function($) {
					"use strict";

					var counted = 0;
					$(window).scroll(function() {

						var oTop = $('.progress-item').offset().top - window.innerHeight;
						if (counted == 0 && $(window).scrollTop() > oTop) {

							$('.progress-per').each(function(){
								var $this = $(this);
								var per = $this.attr('per');
								$this.css("width",per+'%');
								$({animatedValue: 0}).animate({animatedValue: per},{
									duration: 1000,
									step: function(){
										$this.attr('per', Math.floor(this.animatedValue) + '%');
									},
									complete: function(){
										$this.attr('per', Math.floor(this.animatedValue) + '%');
									}
								});
							});

							counted = 1;
						}
					});
				});
			</script>

		<?php }elseif($settings['select_style']=='two'){ ?>

			<?php foreach (  $settings['list'] as $item ) { ?>
				<div class="progress-item style2">
					<div class="progress-name"><?php echo $item['title']; ?></div>
					<div class="progress-stick">
						<div class="progress-per" per="<?php echo $item['progress_percent']; ?>"></div>
					</div>
				</div>
			<?php } ?>

			<script>
				jQuery(document).ready(function($) {
					"use strict";
					
					var counted = 0;
					$(window).scroll(function() {
						
						var oTop = $('.progress-item').offset().top - window.innerHeight;
						if (counted == 0 && $(window).scrollTop() > oTop) {
							
							$('.progress-per').each(function(){
								var $this = $(this);
								var per = $this.attr('per');
								$this.css("width",per+'%');
								$({animatedValue: 0}).animate({animatedValue: per},{
									duration: 1000,
									step: function(){
										$this.attr('per', Math.floor(this.animatedValue) + '%');
									},
									complete: function(){
										$this.attr('per', Math.floor(this.animatedValue) + '%');
									}
								});
							});
							
							counted = 1;
						}
					});
				});
			</script>
			
		<?php } ?>
	    
	    <?php
	}

}