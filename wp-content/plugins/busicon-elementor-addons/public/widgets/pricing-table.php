<?php

if(!defined('ABSPATH')) exit;

class PricingTable extends \Elementor\Widget_Base{

	public function get_name(){
		return "pricingtable";
	}
	
	public function get_title(){
		return "Pricing Table";
	}
	
	public function get_icon(){
		return "eicon-price-table";
	}

	public function get_categories(){
		return ['busicon-category'];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'busicon-elementor-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
				'title',
				[
					'label' => __( 'Title', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'Basic', 'busicon-elementor-addons' ),
					'placeholder' => __( 'Enter Title', 'busicon-elementor-addons' ),
					'label_block' => true,
				]
			);
			$this->add_control(
				'currency',
				[
					'label' => __( 'Currency', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( '$', 'busicon-elementor-addons' ),
					'placeholder' => __( '$', 'busicon-elementor-addons' ),
				]
			);
			$this->add_control(
				'price',
				[
					'label' => __( 'Price', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( '99', 'busicon-elementor-addons' ),
					'placeholder' => __( '99', 'busicon-elementor-addons' ),
				]
			);
			$this->add_control(
				'month',
				[
					'label' => __( 'Month', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'Per Month', 'busicon-elementor-addons' ),
					'placeholder' => __( 'Month', 'busicon-elementor-addons' ),
				]
			);

			$this->add_control(
				'item_description',
				[
					'label' => __( 'Description', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'rows' => 10,
					'default' => __( 'Discover the amazing services for our lovely customers', 'busicon-elementor-addons' ),
					'placeholder' => __( 'Type your description here', 'busicon-elementor-addons' ),
				]
			);

			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'item_field', [
					'label' => __( 'Title', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'Add New Feature' , 'busicon-elementor-addons' ),
					'label_block' => true,
				]
			);
			$this->add_control(
				'slides',
				[
					'label' => __( 'Add Features', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[
							'item_field' => __( 'Provide Services', 'busicon-elementor-addons' ),
						],
						[
							'item_field' => __( '24/7 Fulltime Care', 'busicon-elementor-addons' ),
						],
					],
					'title_field' => '{{{ item_field }}}',
				]
			);
			$this->add_control(
				'button_text',
				[
					'label' => __( 'Button Text', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'Choose Plan', 'busicon-elementor-addons' ),
					'placeholder' => __( 'Click Here', 'busicon-elementor-addons' ),
				]
			);
			$this->add_control(
				'button_link',
				[
					'label' => __( 'Link', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::URL,
					'placeholder' => __( 'https://your-link.com', 'busicon-elementor-addons' ),
				]
			);
			$this->add_control(
				'show_active',
				[
					'label' => __( 'Active Table', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => __( 'Yes', 'busicon-elementor-addons' ),
					'label_off' => __( 'No', 'busicon-elementor-addons' ),
					'return_value' => 'yes',
				]
			);
			$this->add_control(
				'change_curve',
				[
					'label' => __( 'Change Curve', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => __( 'Yes', 'busicon-elementor-addons' ),
					'label_off' => __( 'No', 'busicon-elementor-addons' ),
					'return_value' => 'yes',
				    'conditions' => [
				    	'relation' => 'and',
						'terms' => [
							[
					            'terms' => [
					                [
					                    'name' => 'select_style',
					                    'operator' => '==',
					                    'value' => 'two'
					                ],
					            ]
							],
							[
								'terms' => [
					                [
					                    'name' => 'show_active',
					                    'operator' => '!=',
					                    'value' => 'yes'
					                ],
					            ]
							]
						]
				    ]
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
						'four' => __( 'Four', 'busicon-elementor-addons' ),
						'five' => __( 'Five', 'busicon-elementor-addons' ),
					],
					'default' => 'one',
					
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'icon_section',
			[
				'label' => __( 'Icon', 'busicon-elementor-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'icon_color',
				[
					'label' => __( 'Color', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .pricing .table-head .icon' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'icon_background',
					'label' => __( 'Background', 'busicon-elementor-addons' ),
					'types' => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .pricing .table-head .icon',
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'header_section',
			[
				'label' => __( 'Table Header', 'busicon-elementor-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'title_color',
				[
					'label' => __( 'Title Color', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .pricing .table-head .pack-name' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'label' => __( 'Title Typography', 'busicon-elementor-addons' ),
					'selector' => '{{WRAPPER}} .pricing .table-head .pack-name',
				]
			);
			$this->add_control(
				'price_color',
				[
					'label' => __( 'Price Color', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .pricing .table-head .currency' => 'color: {{VALUE}}',
						'{{WRAPPER}} .pricing .table-head .currency span' => 'color: {{VALUE}}',
					],
				]
			);
		$this->end_controls_section();

		$this->start_controls_section(
			'feature_section',
			[
				'label' => __( 'Features', 'busicon-elementor-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_control(
				'feature_color',
				[
					'label' => __( 'Color', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .pricing .feature-item' => 'color: {{VALUE}}',
						'{{WRAPPER}} .pricing-table .table-body ul li' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'feature_typography',
					'label' => __( 'Typography', 'busicon-elementor-addons' ),
					'selector' => '{{WRAPPER}} .pricing .feature-item',
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'button_section',
			[
				'label' => __( 'Button', 'busicon-elementor-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

			$this->start_controls_tabs(
				'button_tabs'
			);
				$this->start_controls_tab(
					'button_normal_tab',
					[
						'label' => __( 'Normal', 'busicon-elementor-addons' ),
					]
				);
				
					$this->add_control(
						'button_background_color',
						[
							'label' => __( 'Background Color', 'busicon-elementor-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .pricing .pricing-btn' => 'background-color: {{VALUE}}',
								'{{WRAPPER}} .pricing-table .table-body a' => 'background-color: {{VALUE}}',
							],
						]
					);
					$this->add_control(
						'button_text_color',
						[
							'label' => __( 'Text Color', 'busicon-elementor-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .pricing .pricing-btn' => 'color: {{VALUE}}',
								'{{WRAPPER}} .pricing-table .table-body a' => 'color: {{VALUE}}',
							],
						]
					);
				
				$this->end_controls_tab();
				
				$this->start_controls_tab(
					'button_hover_tab',
					[
						'label' => __( 'Hover', 'busicon-elementor-addons' ),
					]
				);

					$this->add_control(
						'button_hover_background_color',
						[
							'label' => __( 'Background Hover Color', 'busicon-elementor-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .pricing .pricing-btn:hover' => 'background-color: {{VALUE}}',
								'{{WRAPPER}} .pricing-table .button::after' => 'background-color: {{VALUE}}',
							],
						]
					);
					$this->add_control(
						'button_hover_text_color',
						[
							'label' => __( 'Text Hover Color', 'busicon-elementor-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .pricing .pricing-btn:hover' => 'color: {{VALUE}}',
								'{{WRAPPER}} .pricing-table .table-body a:hover' => 'color: {{VALUE}}',
							],
						]
					);
				
				$this->end_controls_tab();
				
			$this->end_controls_tabs();

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'button_typography',
					'label' => __( 'Typography', 'busicon-elementor-addons' ),
					'selector' => '{{WRAPPER}} .pricing .pricing-btn, .pricing-table .table-body a',
				]
			);
			$this->add_responsive_control(
				'padding',
				[
					'label' => __( 'Padding', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .pricing .pricing-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .pricing-table .table-body a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'separator' => 'before',
				]
			);

		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		?>

		<?php if($settings['select_style']=='one'){ ?>

			<div class="pricing style1 <?php if('yes' === $settings['show_active']){echo esc_attr('active');}?>">
				<div class="table-head">
					<div class="price">
						<h2 class="currency"><?php echo $settings['price']; ?><?php echo $settings['currency']; ?><span>/<?php echo $settings['month']; ?></span></h2>
						<p class="pack-name"><?php echo $settings['title']; ?></p>
					</div>
					<div class="package-icon">
						<?php \Elementor\Icons_Manager::render_icon( $settings['select_icon'], [ 'aria-hidden' => 'true' ] ); ?>
						<?php if(!empty($settings['select_img']['url'])){ ?>
							<img src="<?php echo $settings['select_img']['url']; ?>" alt="">
						<?php } ?>
					</div>
				</div>
				<div class="table-body">
    				<div class="pricing-feature">
    					<?php foreach (  $settings['slides'] as $item ) { ?>
    					<div class="feature-item">
    						<?php echo $item['item_field']; ?>
    						<i class="fa-solid fa-check"></i>	
    					</div>
    					<?php } ?>
    				</div>
				    <a class="pricing-btn" href="<?php echo esc_url($settings['button_link']['url']); ?>"><?php echo $settings['button_text']; ?></a>
				</div>
			</div>

		<?php }elseif($settings['select_style']=='two'){ ?>

			<div class="pricing style2 <?php if('yes' === $settings['show_active']){echo esc_attr('active');}?>">
				<div class="table-head">
					<div class="price">
						<h2 class="currency"><?php echo $settings['currency']; ?><?php echo $settings['price']; ?><span>/<?php echo $settings['month']; ?></span></h2>
					</div>
					<h3 class="pack-name"><?php echo $settings['title']; ?></h3>
				</div>
				<div class="table-body">
    				<div class="pricing-feature">
    					<?php foreach (  $settings['slides'] as $item ) { ?>
    					<div class="feature-item">
    						<?php echo $item['item_field']; ?>
    						<i class="fa-solid fa-check"></i>
    					</div>
    					<?php } ?>
    				</div>
				    <a class="pricing-btn" href="<?php echo esc_url($settings['button_link']['url']); ?>"><?php echo $settings['button_text']; ?></a>
				</div>
			</div>

		<?php }elseif($settings['select_style']=='three'){ ?>

			<div class="pricing style3 <?php if('yes' === $settings['show_active']){echo esc_attr('active');}?>">
				<div class="table-head">
					<h3 class="pricing-title"><?php echo $settings['title']; ?></h3>
					<h2 class="price">
						<span class="currency"><?php echo $settings['currency']; ?></span>
						<span class="net-price"><?php echo $settings['price']; ?></span>
						<span class="package-validity">/ <?php echo $settings['month']; ?></span>
					</h2>
					<div class="icon">
						<?php \Elementor\Icons_Manager::render_icon( $settings['select_icon'], [ 'aria-hidden' => 'true' ] ); ?>
						<?php if(!empty($settings['select_img']['url'])){ ?>
							<img src="<?php echo $settings['select_img']['url']; ?>" alt="">
						<?php } ?>
					</div>
				</div>
				<div class="table-body">
    				<div class="pricing-feature">
    					<?php foreach (  $settings['slides'] as $item ) { ?>
    					<div class="feature-item">
    						<span class="feature-icon"><i class="bi bi-patch-check-fill"></i></span>
    						<span class="feature-text"><?php echo $item['item_field']; ?></span>	
    					</div>
    					<?php } ?>
    				</div>
				    <a class="pricing-btn" href="<?php echo esc_url($settings['button_link']['url']); ?>"><?php echo $settings['button_text']; ?></a>
				</div>
			</div>
			
		<?php }elseif($settings['select_style']=='four'){ ?>

			<div class="pricing style4">
				<div class="table-head">
					<h3 class="pricing-title"><?php echo $settings['title']; ?></h3>
				</div>

				<div class="pricing-feature">
					<?php foreach (  $settings['slides'] as $item ) { ?>
					<div class="feature-item">
						<span class="feature-icon"><i class="bi bi-check-circle"></i></span>
						<span class="feature-text"><?php echo $item['item_field']; ?></span>	
					</div>
					<?php } ?>
				</div>

				<div class="pricing-figure">
					<h5 class="figure-title"><?php echo $settings['item_description']; ?></h5>
					<h2 class="price">
						<span class="currency"><?php echo $settings['currency']; ?></span>
						<span class="net-price"><?php echo $settings['price']; ?></span>
						<span class="package-validity">/<?php echo $settings['month']; ?></span>
					</h2>
				</div>
				<a class="pricing-btn" href="<?php echo esc_url($settings['button_link']['url']); ?>"><?php echo $settings['button_text']; ?> <span class="btn--icon"><i class="bi bi-arrow-right"></i></span></a>
			</div>

		<?php }elseif($settings['select_style']=='five'){ ?>

			<div class="pricing style5">
				<div class="table-head">
					<h3 class="pricing-title"><?php echo $settings['title']; ?></h3>
					<h2 class="price">
						<span class="currency"><?php echo $settings['currency']; ?></span>
						<span class="net-price"><?php echo $settings['price']; ?></span>
						<span class="package-validity">/<?php echo $settings['month']; ?></span>
					</h2>
				</div>
				<div class="table-body">
    				<div class="pricing-feature">
    					<?php foreach (  $settings['slides'] as $item ) { ?>
    					<div class="feature-item">
    						<span class="feature-icon"><i class="bi bi-check-circle"></i></span>
    						<span class="feature-text"><?php echo $item['item_field']; ?></span>	
    					</div>
    					<?php } ?>
    				</div>
				    <a class="pricing-btn" href="<?php echo esc_url($settings['button_link']['url']); ?>"><?php echo $settings['button_text']; ?></a>
				</div>
			</div>

		<?php } ?>

		<?php

	}
}