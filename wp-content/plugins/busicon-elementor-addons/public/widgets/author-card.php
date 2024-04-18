<?php

if(!defined('ABSPATH')) exit;

class AuthorCard extends \Elementor\Widget_Base{

	public function get_name(){
		return "author-card";
	}
	
	public function get_title(){
		return "Author Card";
	}
	
	public function get_icon(){
		return "eicon-site-identity";
	}

	public function get_categories(){
		return ['busicon-category'];
	}

	protected function register_controls(){

		$this->start_controls_section(
			'image_section',
			[
				'label' => __( 'Image', 'busicon-elementor-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
			$this->add_control(
				'author_img',
				[
				    'label' => esc_html__('Image','busicon-elementor-addons'),
				    'type'=> \Elementor\Controls_Manager::MEDIA,
				    'default' => [
					  'url' => \Elementor\Utils::get_placeholder_image_src(),
				    ],
				]
			);
		$this->end_controls_section();

		$this->start_controls_section(
			'bio_section',
			[
				'label' => __( 'Bio', 'busicon-elementor-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

			$this->add_control(
				'author_name',
				[
					'label' => __( 'Name', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => __( 'Enter author name', 'busicon-elementor-addons' ),
					'label_block' => true,
					'default' => __( 'Leslie Alexander', 'busicon-elementor-addons' ),
				]
			);
			$this->add_control(
				'author_designation',
				[
					'label' => esc_html__( 'Designation', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'dynamic' => [
						'active' => true,
					],
					'default' => esc_html__( 'Developer', 'busicon-elementor-addons' ),
					'placeholder' => esc_html__( 'Enter author designation', 'busicon-elementor-addons' ),
					'label_block' => true,
				]
			);
			$this->add_control(
				'author_description',
				[
					'label' => esc_html__( 'Description', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'rows' => 8,
					'default' => esc_html__( 'Lorem Ipsum is simply dummy text the printing and type setting industry. Lorem Ipsum been Lorem Ipsum is simply dummy text of the printing and comment', 'busicon-elementor-addons' ),
					'placeholder' => esc_html__( 'Type your description here', 'busicon-elementor-addons' ),
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
						'four' => __( 'App Store', 'busicon-elementor-addons' ),

					],
					'default' => 'one',
					
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'image_style',
			[
				'label' => __( 'Image', 'busicon-elementor-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'image_border',
					'selector' => '{{WRAPPER}} .author-card .image img',
				]
			);
		$this->end_controls_section();

		$this->start_controls_section(
			'name_style',
			[
				'label' => __( 'Name', 'busicon-elementor-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
			$this->add_control(
				'name_color',
				[
					'label' => __( 'Color', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .author-card .content .name' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'name_typography',
					'label' => __( 'Typography', 'busicon-elementor-addons' ),
					'selector' => '{{WRAPPER}} .author-card .content .name',
				]
			);
			$this->add_responsive_control(
				'name_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .author-card .content .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'designation_style',
			[
				'label' => __( 'Designation', 'busicon-elementor-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
			$this->add_control(
				'designation_color',
				[
					'label' => __( 'Color', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .author-card .content .designation' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'designation_typography',
					'label' => __( 'Typography', 'busicon-elementor-addons' ),
					'selector' => '{{WRAPPER}} .author-card .content .designation',
				]
			);
			$this->add_responsive_control(
				'designation_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .author-card .content .designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'selectors' => [
						'{{WRAPPER}} .author-card .content .description' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'description_typography',
					'label' => __( 'Typography', 'busicon-elementor-addons' ),
					'selector' => '{{WRAPPER}} .author-card .content .description',
				]
			);
			$this->add_responsive_control(
				'description_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .author-card .content .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

	?>

		<?php if($settings['select_style']=='one'){ ?>

			<div class="author-card style1">
				<div class="image">
					<img src="<?php echo $settings['author_img']['url'] ?>" alt="author image">
				</div>
				<div class="content">
					<h3 class="designation"><?php echo $settings['author_designation']; ?></h3>
					<h2 class="name"><?php echo $settings['author_name']; ?></h2>
				</div>
			</div>

		<?php }elseif($settings['select_style']=='two'){ ?>	

			<div class="author-card style2">
				<div class="image">
					<img src="<?php echo $settings['author_img']['url'] ?>" alt="author image">
				</div>
				<div class="content">
					<h2 class="name"><?php echo $settings['author_name']; ?></h2>
					<h3 class="designation"><?php echo $settings['author_designation']; ?></h3>
					<p class="description"><?php echo $settings['author_description']; ?></p>
				</div>
			</div>

		<?php }elseif($settings['select_style']=='three'){ ?>

			<div class="single-button style3">
				<a class="button" href="<?php echo esc_url($settings['button_url']['url']); ?>">
					<?php echo $settings['button_text']; ?>
					<?php \Elementor\Icons_Manager::render_icon( $settings['button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				</a>
			</div>

		<?php }elseif($settings['select_style']=='four'){ ?>

			<div class="single-button style4">
				<a class="button" href="<?php echo esc_url($settings['button_url']['url']); ?>">
					<?php echo $settings['button_text']; ?>
					<i class="<?php echo esc_attr($settings['button_icon']['value']); ?>"></i>
				</a>
			</div>

		<?php } ?>

	<?php
	}
}