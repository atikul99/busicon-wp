<?php

use Elementor\Controls_Manager;

if(!defined('ABSPATH')) exit;


class VideoIcon extends \Elementor\Widget_Base{

	public function get_name(){
		return "videoicon";
	}
	
	public function get_title(){
		return "Video Icon";
	}
	
	public function get_icon(){
		return "eicon-play";
	}

	public function get_categories(){
		return ['busicon-category'];
	}

	protected function register_controls(){

        $this->start_controls_section(
            'youtube_section', [
                'label' => __( 'Youtube', 'busicon-elementor-extension' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
	        $this->add_control(
	        	'youtube_video_url',
					[
						'label' => __( 'Video URL', 'busicon-elementor-extension' ),
						'type' => Controls_Manager::URL,
						'label_block' => true,
                        'default' => [
                            'url' => '#'
                        ]
					]
	        );
	        $this->add_control(
	        	'youtube_video_icon',
					[
						'label' => __( 'Video Icon', 'busicon-elementor-extension' ),
						'type' => Controls_Manager::ICONS,
						'default' => [
							'value' => 'fas fa-play',
						],
					]
	        );
        $this->end_controls_section();

        $this->start_controls_section(
            'vimeo_section', [
                'label' => __( 'Vimeo', 'busicon-elementor-extension' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
	        $this->add_control(
	        	'vimeo_video_url',
					[
						'label' => __( 'Video URL', 'busicon-elementor-extension' ),
						'type' => Controls_Manager::URL,
						'label_block' => true,
					]
	        );
	        $this->add_control(
	        	'vimeo_video_icon',
					[
						'label' => __( 'Video Icon', 'busicon-elementor-extension' ),
						'type' => Controls_Manager::ICONS,
						'default' => [
							'value' => 'fas fa-play',
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
					],
					'default' => 'one',
					
				]
			);
			$this->add_responsive_control(
				'icon_align',
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
						'{{WRAPPER}} .video-icon' => 'text-align: {{VALUE}};',
					],
				]
			);
		$this->end_controls_section();

		$this->start_controls_section(
			'icon_section',
			[
				'label' => __( 'Icon', 'busicon-elementor-extension' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_control(
				'icon_color',
				[
					'label' => __( 'Color', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .video-icon a' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'wave_color',
				[
					'label' => __( 'Wave Color', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .video-icon a span' => 'border-color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'size',
				[
					'label' => __( 'Size', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .video-icon a' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border',
					'label' => __( 'Border', 'busicon-elementor-extension' ),
					'selector' => '{{WRAPPER}} .video-icon a',
				]
			);
		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		?>

		<?php if($settings['select_style']=='one'){ ?>

			<div class="video-icon style1">
				<a class="venobox" data-vbtype="video" data-autoplay="true" href="<?php echo esc_url($settings['youtube_video_url']['url']); ?>">
					<i class="fa fa-play"></i>
					<span class="circle1"></span>
					<span class="circle2"></span>
					<span class="circle3"></span>
				</a>
			</div>

			<script>
				jQuery(document).ready(function($) {
					"use strict";
					 $('.venobox').venobox();
				});
			</script>

		<?php }elseif($settings['select_style']=='two'){ ?>

			<div id="parallax-video" class="single-video style-two">
				
				<div class="choose-video-icon">	

					<div class="video-icon">
						
						<?php if( !empty($settings['youtube_video_url']['url']) ){ ?>
						<a class="video-vemo-icon venobox vbox-item" data-vbtype="youtube" data-autoplay="true" href="<?php echo esc_url($settings['youtube_video_url']['url']); ?>"><?php \Elementor\Icons_Manager::render_icon( $settings['youtube_video_icon'], [ 'aria-hidden' => 'true' ] ); ?></a>
						<?php } ?>
						
						<?php if( !empty($settings['vimeo_video_url']['url']) ){ ?>
						<a class="video-vemo-icon venobox vbox-item" data-vbtype="youtube" data-autoplay="true" href="<?php echo esc_url($settings['vimeo_video_url']['url']); ?>"><?php \Elementor\Icons_Manager::render_icon( $settings['vimeo_video_icon'], [ 'aria-hidden' => 'true' ] ); ?></a>
						<?php } ?>
						
					</div>
					
				</div>
			</div>
			
		<?php }elseif($settings['select_style']=='three'){ ?>
			
			<div class="video-icon style3">
				<a class="venobox" data-vbtype="video" data-autoplay="true" href="<?php echo esc_url($settings['youtube_video_url']['url']); ?>">
					<i class="fa fa-play"></i>
				</a>
			</div>

			<script>
				jQuery(document).ready(function($) {
					"use strict";
					 $('.venobox').venobox();
				});
			</script>
			
		<?php } ?>	

		<?php
	}
}