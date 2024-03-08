<?php

use Elementor\Controls_Manager;

if(!defined('ABSPATH')) exit;

class IconBox extends \Elementor\Widget_Base {

	public function get_name() {
		return 'iconbox';
	}

	public function get_title() {
		return __( 'Icon Box', 'busicon-elementor-extension' );
	}

	public function get_icon() {
		return 'eicon-icon-box';
	}

	public function get_categories(){
		return ['busicon-category'];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'icon_section',
			[
				'label' => __( 'Icons', 'busicon-elementor-extension' ),
			]
		);
		$this->add_control(
			'icons_type',
			[
				'label' => esc_html__('Icon Type','busicon-elementor-extension'),
				'type' => Controls_Manager::CHOOSE,
				'options' =>[
					'img' =>[
						'title' =>esc_html__('Image','busicon-elementor-extension'),
						'icon' =>'eicon-image-bold',
					],
					'icon' =>[
						'title' =>esc_html__('Icon','busicon-elementor-extension'),
						'icon' =>'fa fa-info',
					]
				],
				'default' => 'icon',
			]
		);
			 
			$this->add_control(
				'select_icon',
				[
					'label' => esc_html__( 'Icon', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::ICONS,
					'condition'=>[
						'icons_type'=> 'icon',
					],
					'label_block' => true,
				]
			);
			
			$this->add_control(
				'select_img',
				[
					'label' => esc_html__('Image','busicon-elementor-extension'),
					'type'=>Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
					'condition' => [
						'icons_type' => 'img',
					]
				]
			);
			$this->add_control(
				'icon_position',
				[
					'label' => __( 'Icon Position', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => [
						'left'  => __( 'Left', 'busicon-elementor-extension' ),
						'right'  => __( 'Right', 'busicon-elementor-extension' ),
					],
					'default' => 'left',
				]
			);
		$this->end_controls_section();

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Title & Description', 'busicon-elementor-extension' ),
			]
		);
			$this->add_control(
				'title_text',
				[
					'label' => __( 'Title', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::TEXT,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => __( 'Enter your title', 'busicon-elementor-extension' ),
					'label_block' => true,
					'default' => __( 'IT Spcallist', 'busicon-elementor-extension' ),
				]
			);
			$this->add_control(
				'description_text',
				[
					'label' => __( 'Description', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::TEXTAREA,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => __( 'Enter your paragraph', 'busicon-elementor-extension' ),
					'default' => __( 'Choose one channel and be great at it. Work toward the goal of being the leading provider', 'busicon-elementor-extension' ),
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
				'ttext_align',
				[
					'label' => __( 'Alignment', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::CHOOSE,
					'options' => [
						'start' => [
							'title' => __( 'Left', 'busicon-elementor-extension' ),
							'icon' => 'eicon-text-align-left',
						],
						'center' => [
							'title' => __( 'Center', 'busicon-elementor-extension' ),
							'icon' => 'eicon-text-align-center',
						],
						'end' => [
							'title' => __( 'Right', 'busicon-elementor-extension' ),
							'icon' => 'eicon-text-align-right',
						],
					],
					'selectors' => [
						'{{WRAPPER}} .icon-box' => 'justify-content: {{VALUE}};',
					],
				]
			);
			$this->add_responsive_control(
				'vertical_align',
				[
					'label' => __( 'Vartical Alignment', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::CHOOSE,
					'options' => [
						'start' => [
							'title' => __( 'Left', 'busicon-elementor-extension' ),
							'icon' => 'eicon-v-align-top',
						],
						'center' => [
							'title' => __( 'Center', 'busicon-elementor-extension' ),
							'icon' => 'eicon-v-align-middle',
						],
						'end' => [
							'title' => __( 'Right', 'busicon-elementor-extension' ),
							'icon' => 'eicon-v-align-bottom',
						],
					],
					'selectors' => [
						'{{WRAPPER}} .icon-box' => 'align-items: {{VALUE}};',
					],
				]
			);
		$this->end_controls_section();

		$this->start_controls_section(
			'icon_section_style',
			[
				'label' => __( 'Icon', 'busicon-elementor-extension' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'style_tabs'
		);
			$this->start_controls_tab(
				'style_normal_tab',
				[
					'label' => __( 'Normal', 'busicon-elementor-extension' ),
				]
			);
			
				$this->add_control(
					'icon_color',
					[
						'label' => __( 'Icon Color', 'busicon-elementor-extension' ),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .icon-box .icon i' => 'color: {{VALUE}}',
						],
					]
				);
				$this->add_control(
					'icon_background_color',
					[
						'label' => __( 'Background Color', 'busicon-elementor-extension' ),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .icon-box .icon i' => 'background: {{VALUE}}',
						],
					]
				);
				$this->add_group_control(
					\Elementor\Group_Control_Border::get_type(),
					[
						'name' => 'icon_border',
						'label' => __( 'Border', 'busicon-elementor-extension' ),
						'selector' => '{{WRAPPER}} .icon-box .icon i',
					]
				);
				$this->add_responsive_control(
					'icon_border_radius',
					[
						'label' => __( 'Border Radius', 'busicon-elementor-extension' ),
						'type' => \Elementor\Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', 'em', '%' ],
						'selectors' => [
							'{{WRAPPER}} .icon-box .icon i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
			$this->end_controls_tab();
			
			$this->start_controls_tab(
				'style_hover_tab',
				[
					'label' => __( 'Hover', 'busicon-elementor-extension' ),
				]
			);

				$this->add_control(
					'icon_hover_color',
					[
						'label' => __( 'Hover Color', 'busicon-elementor-extension' ),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .icon-box:hover .icon i' => 'color: {{VALUE}}',
						],
					]
				);
				$this->add_control(
					'hover_icon_background_color',
					[
						'label' => __( 'Background Color', 'busicon-elementor-extension' ),
						'type' => Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .icon-box:hover .icon i' => 'background: {{VALUE}}',
						],
					]
				);
				$this->add_group_control(
					\Elementor\Group_Control_Border::get_type(),
					[
						'name' => 'hover_border',
						'label' => __( 'Hover Border', 'busicon-elementor-extension' ),
						'selector' => '{{WRAPPER}} .icon-box:hover .icon i',
					]
				);
				$this->add_responsive_control(
					'hover_icon_border_radius',
					[
						'label' => __( 'Border Radius', 'busicon-elementor-extension' ),
						'type' => \Elementor\Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', 'em', '%' ],
						'selectors' => [
							'{{WRAPPER}} .icon-box:hover .icon i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
			$this->end_controls_tab();
			
		$this->end_controls_tabs();

			$this->add_responsive_control(
				'icon_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .icon-box .icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'separator' => 'before',
				]
			);
			$this->add_control(
				'height',
				[
					'label' => __( 'Height', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 5,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .icon-box .icon i' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'width',
				[
					'label' => __( 'Width', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 5,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .icon-box .icon i' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'icon_typography',
					'selector' => '{{WRAPPER}} .icon-box .icon i',
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
						'{{WRAPPER}} .icon-box .icon i' => 'text-align: {{VALUE}};',
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
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .icon-box .content h4' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'label' => __( 'Typography', 'busicon-elementor-extension' ),
					'selector' => '{{WRAPPER}} .icon-box .content h4',
				]
			);
			$this->add_responsive_control(
				'title_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .icon-box .content h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .icon-box .content p' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'description_typography',
					'label' => __( 'Typography', 'busicon-elementor-extension' ),
					'selector' => '{{WRAPPER}} .icon-box .content p',
				]
			);
			$this->add_responsive_control(
				'description_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .icon-box .content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		
		?>

		<?php if($settings['select_style']=='one'){ ?>

			<div class="icon-box style1 <?php echo $settings['icon_position']; ?>">

				<?php if( !empty($settings['select_icon']['value']) ){ ?>
				<div class="icon">
					<?php \Elementor\Icons_Manager::render_icon( $settings['select_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				</div>
				<?php } ?>

				<div class="content">
					<?php if( !empty($settings['title_text']) ){?>
						<h4><?php echo $settings['title_text']; ?></h4>
					<?php } ?>
					<?php if( !empty($settings['description_text']) ){?>
						<p><?php echo $settings['description_text']; ?></p>
					<?php } ?>
				</div>
			</div>

		<?php }elseif($settings['select_style']=='two'){ ?>

			<div class="icon-box style2 <?php echo $settings['icon_position']; ?>">

				<?php if( !empty($settings['title_text']) ){?>
					<h4 class="title"><?php echo $settings['title_text']; ?></h4>
				<?php } ?>
				
				<div class="wrapper">
					<?php if( !empty($settings['select_icon']['value']) ){ ?>
					<div class="icon">
						<?php \Elementor\Icons_Manager::render_icon( $settings['select_icon'], [ 'aria-hidden' => 'true' ] ); ?>
					</div>
					<?php } ?>

					<div class="content">
						<?php if( !empty($settings['description_text']) ){?>
							<p><?php echo $settings['description_text']; ?></p>
						<?php } ?>
					</div>
				</div>
			</div>
			
		<?php }elseif($settings['select_style']=='three'){ ?>
		
			<div class="icon-box style3 <?php echo $settings['icon_position']; ?>">
				
				<div class="wrapper">
					<?php if( !empty($settings['select_icon']['value']) ){ ?>
					<div class="icon">
						<?php \Elementor\Icons_Manager::render_icon( $settings['select_icon'], [ 'aria-hidden' => 'true' ] ); ?>
					</div>
					<?php } ?>
                    
					<div class="content">
        				<?php if( !empty($settings['title_text']) ){?>
        					<h4 class="title"><?php echo $settings['title_text']; ?></h4>
        				<?php } ?>
						<?php if( !empty($settings['description_text']) ){?>
							<p class="description"><?php echo $settings['description_text']; ?></p>
						<?php } ?>
					</div>
				</div>
			</div>
			
		<?php } ?>

		<?php
	}
}