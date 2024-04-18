<?php

if(!defined('ABSPATH')) exit;

class IconBox extends \Elementor\Widget_Base {

	public function get_name() {
		return 'busicon-iconbox';
	}

	public function get_title() {
		return __( 'Icon Box', 'busicon-elementor-addons' );
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
				'label' => __( 'Icons', 'busicon-elementor-addons' ),
			]
		);
		$this->add_control(
			'icons_type',
			[
				'label' => esc_html__('Icon Type','busicon-elementor-addons'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' =>[
					'img' =>[
						'title' =>esc_html__('Image','busicon-elementor-addons'),
						'icon' =>'eicon-image-bold',
					],
					'icon' =>[
						'title' =>esc_html__('Icon','busicon-elementor-addons'),
						'icon' =>'fa fa-info',
					]
				],
				'default' => 'icon',
			]
		);
			 
			$this->add_control(
				'select_icon',
				[
					'label' => esc_html__( 'Icon', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'condition'=>[
						'icons_type'=> 'icon',
					],
					'label_block' => true,
				]
			);
			
			$this->add_control(
				'select_img',
				[
					'label' => esc_html__('Image','busicon-elementor-addons'),
					'type'=> \Elementor\Controls_Manager::MEDIA,
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
					'label' => __( 'Icon Position', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => [
						'left'  => __( 'Left', 'busicon-elementor-addons' ),
						'right'  => __( 'Right', 'busicon-elementor-addons' ),
					],
					'default' => 'left',
				]
			);
		$this->end_controls_section();

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Title & Description', 'busicon-elementor-addons' ),
			]
		);
			$this->add_control(
				'title_text',
				[
					'label' => __( 'Title', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => __( 'Enter your title', 'busicon-elementor-addons' ),
					'label_block' => true,
					'default' => __( 'IT Spcallist', 'busicon-elementor-addons' ),
				]
			);
			$this->add_control(
				'description_text',
				[
					'label' => __( 'Description', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => __( 'Enter your paragraph', 'busicon-elementor-addons' ),
					'default' => __( 'Choose one channel and be great at it. Work toward the goal of being the leading provider', 'busicon-elementor-addons' ),
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
					],
					'default' => 'one',
				]
			);
			$this->add_responsive_control(
				'ttext_align',
				[
					'label' => __( 'Alignment', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'start' => [
							'title' => __( 'Left', 'busicon-elementor-addons' ),
							'icon' => 'eicon-text-align-left',
						],
						'center' => [
							'title' => __( 'Center', 'busicon-elementor-addons' ),
							'icon' => 'eicon-text-align-center',
						],
						'end' => [
							'title' => __( 'Right', 'busicon-elementor-addons' ),
							'icon' => 'eicon-text-align-right',
						],
					],
					'selectors' => [
						'{{WRAPPER}} .single-icon-box' => 'justify-content: {{VALUE}};',
					],
				]
			);
			$this->add_responsive_control(
				'vertical_align',
				[
					'label' => __( 'Vartical Alignment', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'start' => [
							'title' => __( 'Left', 'busicon-elementor-addons' ),
							'icon' => 'eicon-v-align-top',
						],
						'center' => [
							'title' => __( 'Center', 'busicon-elementor-addons' ),
							'icon' => 'eicon-v-align-middle',
						],
						'end' => [
							'title' => __( 'Right', 'busicon-elementor-addons' ),
							'icon' => 'eicon-v-align-bottom',
						],
					],
					'selectors' => [
						'{{WRAPPER}} .single-icon-box' => 'align-items: {{VALUE}};',
					],
				]
			);
		$this->end_controls_section();

		$this->start_controls_section(
			'icon_section_style',
			[
				'label' => __( 'Icon', 'busicon-elementor-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'style_tabs'
		);
			$this->start_controls_tab(
				'style_normal_tab',
				[
					'label' => __( 'Normal', 'busicon-elementor-addons' ),
				]
			);
			
				$this->add_control(
					'icon_color',
					[
						'label' => __( 'Icon Color', 'busicon-elementor-addons' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .single-icon-box .box-icon i' => 'color: {{VALUE}}',
						],
					]
				);
				$this->add_control(
					'icon_background_color',
					[
						'label' => __( 'Background Color', 'busicon-elementor-addons' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .single-icon-box .box-icon i' => 'background: {{VALUE}}',
						],
					]
				);
				$this->add_group_control(
					\Elementor\Group_Control_Border::get_type(),
					[
						'name' => 'icon_border',
						'label' => __( 'Border', 'busicon-elementor-addons' ),
						'selector' => '{{WRAPPER}} .single-icon-box .box-icon i',
					]
				);
				$this->add_responsive_control(
					'icon_border_radius',
					[
						'label' => __( 'Border Radius', 'busicon-elementor-addons' ),
						'type' => \Elementor\Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', 'em', '%' ],
						'selectors' => [
							'{{WRAPPER}} .single-icon-box .box-icon i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
			$this->end_controls_tab();
			
			$this->start_controls_tab(
				'style_hover_tab',
				[
					'label' => __( 'Hover', 'busicon-elementor-addons' ),
				]
			);

				$this->add_control(
					'icon_hover_color',
					[
						'label' => __( 'Hover Color', 'busicon-elementor-addons' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .single-icon-box:hover .box-icon i' => 'color: {{VALUE}}',
						],
					]
				);
				$this->add_control(
					'hover_icon_background_color',
					[
						'label' => __( 'Background Color', 'busicon-elementor-addons' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'default' => '',
						'selectors' => [
							'{{WRAPPER}} .single-icon-box:hover .box-icon i' => 'background: {{VALUE}}',
						],
					]
				);
				$this->add_group_control(
					\Elementor\Group_Control_Border::get_type(),
					[
						'name' => 'hover_border',
						'label' => __( 'Hover Border', 'busicon-elementor-addons' ),
						'selector' => '{{WRAPPER}} .single-icon-box:hover .box-icon i',
					]
				);
				$this->add_responsive_control(
					'hover_icon_border_radius',
					[
						'label' => __( 'Border Radius', 'busicon-elementor-addons' ),
						'type' => \Elementor\Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', 'em', '%' ],
						'selectors' => [
							'{{WRAPPER}} .single-icon-box:hover .box-icon i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
			$this->end_controls_tab();
			
		$this->end_controls_tabs();

			$this->add_responsive_control(
				'icon_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .single-icon-box .box-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'separator' => 'before',
				]
			);
			$this->add_control(
				'height',
				[
					'label' => __( 'Height', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
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
						'{{WRAPPER}} .single-icon-box .box-icon i' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'width',
				[
					'label' => __( 'Width', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
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
						'{{WRAPPER}} .single-icon-box .box-icon i' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'icon_typography',
					'selector' => '{{WRAPPER}} .single-icon-box .box-icon i',
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
						'{{WRAPPER}} .single-icon-box .content h4' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'label' => __( 'Typography', 'busicon-elementor-addons' ),
					'selector' => '{{WRAPPER}} .single-icon-box .content h4',
				]
			);
			$this->add_responsive_control(
				'title_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .single-icon-box .content h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .single-icon-box .content p' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'description_typography',
					'label' => __( 'Typography', 'busicon-elementor-addons' ),
					'selector' => '{{WRAPPER}} .single-icon-box .content p',
				]
			);
			$this->add_responsive_control(
				'description_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .single-icon-box .content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		
		?>

		<?php if($settings['select_style']=='one'){ ?>

			<div class="single-icon-box style1">

				<?php if( !empty($settings['select_icon']['value']) ){ ?>
				<div class="box-icon">
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

			<div class="single-icon-box style2 <?php echo $settings['icon_position']; ?>">

				<?php if( !empty($settings['select_icon']['value']) ){ ?>
				<div class="box-icon">
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
			
		<?php }elseif($settings['select_style']=='three'){ ?>
		
			<div class="single-icon-box style3 <?php echo $settings['icon_position']; ?>">

				<?php if( !empty($settings['select_icon']['value']) ){ ?>
				<div class="box-icon">
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
			
		<?php } ?>

		<?php
	}
}