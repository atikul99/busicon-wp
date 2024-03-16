<?php

if(!defined('ABSPATH')) exit;

class WorkingProcess extends \Elementor\Widget_Base{

	public function get_name(){
		return "workingprocess";
	}
	
	public function get_title(){
		return "Working Process";
	}
	
	public function get_icon(){
		return "eicon-flip";
	}

	public function get_categories(){
		return ['busicon-category'];
	}

	protected function register_controls(){

        $this->start_controls_section(
            'icon_section', [
                'label' => __( 'Icon', 'busicon-elementor-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
	        $this->add_control(
	        	'number',
					[
						'label' => __( 'Number', 'busicon-elementor-addons' ),
						'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => __( '01', 'busicon-elementor-addons' ),
                        'placeholder' => __( 'Enter Number', 'busicon-elementor-addons' ),
					]
	        );
	        $this->add_control(
	        	'icon',
					[
						'label' => __( 'Icon', 'busicon-elementor-addons' ),
						'type' => \Elementor\Controls_Manager::ICONS,
						'default' => [
							'value' => 'fas fa-play',
						],
					]
	        );
			$this->add_control(
				'icon_after',
				[
					'label' => __( 'Icon After', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => [
						'normal'  => __( 'Normal', 'busicon-elementor-addons' ),
						'rotate'  => __( 'Rotate', 'busicon-elementor-addons' ),
						'none' => __( 'None', 'busicon-elementor-addons' ),
					],
					'default' => 'normal',
				]
			);
        $this->end_controls_section();

        $this->start_controls_section(
            'title_description', [
                'label' => __( 'Title & Description', 'busicon-elementor-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

			$this->add_control(
				'title',
				[
					'label' => __( 'Title', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'Idea Making', 'busicon-elementor-addons' ),
					'placeholder' => __( 'Type your title', 'busicon-elementor-addons' ),
					'label_block' => true,
				]
			);
			$this->add_control(
				'description',
				[
					'label' => __( 'Description', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'rows' => 10,
					'default' => __( 'Choose one channel and be great at it. Work toward the goal of being the leading provider', 'busicon-elementor-addons' ),
					'placeholder' => __( 'Type your description', 'busicon-elementor-addons' ),
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
			$this->add_responsive_control(
				'icon_align',
				[
					'label' => __( 'Alignment', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => __( 'Left', 'busicon-elementor-addons' ),
							'icon' => 'eicon-text-align-left',
						],
						'center' => [
							'title' => __( 'Center', 'busicon-elementor-addons' ),
							'icon' => 'eicon-text-align-center',
						],
						'right' => [
							'title' => __( 'Right', 'busicon-elementor-addons' ),
							'icon' => 'eicon-text-align-right',
						],
						'justify' => [
							'title' => __( 'Justified', 'busicon-elementor-addons' ),
							'icon' => 'eicon-text-align-justify',
						],
					],
					'selectors' => [
						'{{WRAPPER}} .process-box' => 'text-align: {{VALUE}};',
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
						'{{WRAPPER}} .process-box .content .title' => 'color: {{VALUE}};',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'selector' => '{{WRAPPER}} .process-box .content .title',
				]
			);
			$this->add_responsive_control(
				'title_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .process-box .content .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .process-box .content .description' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'description_typography',
					'selector' => '{{WRAPPER}} .process-box .content .description',
				]
			);
			$this->add_responsive_control(
				'description_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .process-box .content .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		?>

		<?php if($settings['select_style']=='one'){ ?>

			<div class="process-box style1 <?php echo $settings['icon_after']; ?>">
				<span class="number"><?php echo $settings['number']; ?></span>
				<div class="content">
					<h3 class="title"><?php echo $settings['title']; ?></h3>
					<p class="description"><?php echo $settings['description']; ?></p>
				</div>
			</div>

		<?php }elseif($settings['select_style']=='two'){ ?>

			<div class="process-box style2 <?php echo $settings['icon_after']; ?>">
				<div class="icon">
					<?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
					<span><?php echo $settings['number']; ?></span>
				</div>
				<div class="content">
					<h3><?php echo $settings['title']; ?></h3>
					<p><?php echo $settings['description']; ?></p>
				</div>
			</div>

		<?php } ?>
		
		<?php
	}
}