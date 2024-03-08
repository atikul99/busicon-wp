<?php



use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if(!defined('ABSPATH')) exit;


class CircleProgress extends Widget_Base{

	public function get_name(){
		return "circleprogress";
	}
	
	public function get_title(){
		return "Circle Progress";
	}
	
	public function get_icon(){
		return "eicon-skill-bar";
	}
	public function get_categories(){
		return ['busicon-category'];
	}
	
	protected function _register_controls(){

		$this->start_controls_section(
			'text_section',
			[
				'label' => __( 'Text', 'busicon-elementor-extension' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
            $this->add_control(
                'title', [
                    'label' => __( 'Title', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( '500k+ Download' , 'busicon-elementor-extension' ),
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'description', [
                    'label' => __( 'Description', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Level is high' , 'busicon-elementor-extension' ),
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'progress', [
                    'label' => __( 'Progress', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( '50' , 'busicon-elementor-extension' ),
                    'label_block' => true,
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
				'label' => __( 'Style', 'busicon-elementor-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'progress_color',
				[
					'label' => __( 'Progress Color', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .app-download .round_per' => 'background: {{VALUE}}',
						'{{WRAPPER}} .app-download .percent_text' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_responsive_control(
				'text_align',
				[
					'label' => __( 'Alignment', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => __( 'Left', 'busicon-elementor-extension' ),
							'icon' => 'eicon-text-align-left',
						],
						'center' => [
							'title' => __( 'Center', 'busicon-elementor-extension' ),
							'icon' => 'eicon-text-align-center',
						],
						'right' => [
							'title' => __( 'Right', 'busicon-elementor-extension' ),
							'icon' => 'eicon-text-align-right',
						],
						'justify' => [
							'title' => __( 'Justified', 'busicon-elementor-extension' ),
							'icon' => 'eicon-text-align-justify',
						],
					],
					'selectors' => [
						'{{WRAPPER}} .app-info' => 'text-align: {{VALUE}};',
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
						'{{WRAPPER}} .app-download .description h3' => 'color: {{VALUE}}',
					],
				]
			);
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Typography', 'busicon-elementor-extension' ),
                    'selector' => '{{WRAPPER}} .app-download .description h3',
                ]
            );
            $this->add_responsive_control(
                'title_margin',
                [
                    'label' => __( 'Margin', 'busicon-elementor-extension' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .app-download .description h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
		$this->end_controls_section();

		$this->start_controls_section(
			'description_style',
			[
				'label' => __( 'Description', 'busicon-elementor-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'description_color',
				[
					'label' => __( 'Color', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .app-download .description p' => 'color: {{VALUE}}',
					],
				]
			);
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'description_typography',
                    'label' => __( 'Typography', 'busicon-elementor-extension' ),
                    'selector' => '{{WRAPPER}} .app-download .description p',
                ]
            );
            $this->add_responsive_control(
                'description_margin',
                [
                    'label' => __( 'Margin', 'busicon-elementor-extension' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .app-download .description p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
		$this->end_controls_section();
	}
	
	protected function render() {
	    
	    $settings = $this->get_settings_for_display();
	    
	    ?>
		    <div class="app-info">
				<div class="app-download">
					<div class="circular-progress">
						<div class="circle_percent" data-percent="<?php echo $settings['progress']; ?>">
							<div class="circle_inner">
								<div class="round_per"></div>
							</div>
						</div>
					</div>
					<div class="description">
						<h3><?php echo $settings['title']; ?></h3>
						<p><?php echo $settings['description']; ?></p>
					</div>
				</div>
			</div>

			<script>
				jQuery(document).ready(function($) {
					"use strict";
				    $(".circle_percent").each(function() {
				      var $this = $(this),
				        $dataV = $this.data("percent"),
				        $dataDeg = $dataV * 3.6,
				        $round = $this.find(".round_per");
				      $round.css("transform", "rotate(" + parseInt($dataDeg + 180) + "deg)"); 
				      $this.append('<div class="circle_inbox"><span class="percent_text"></span></div>');
				      $this.prop('Counter', 0).animate({Counter: $dataV},
				      {
				        duration: 2000, 
				        easing: 'swing', 
				        step: function (now) {
				          $this.find(".percent_text").text(Math.ceil(now)+"%");
				        }
				      });
				      if($dataV >= 51){
				        $round.css("transform", "rotate(" + 360 + "deg)");
				        setTimeout(function(){
				          $this.addClass("percent_more");
				        },1000);
				        setTimeout(function(){
				          $round.css("transform", "rotate(" + parseInt($dataDeg + 180) + "deg)");
				        },1000);
				      } 
				    });
				});
			</script>
	    
	    <?php
	}

}