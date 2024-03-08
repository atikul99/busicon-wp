<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if(!defined('ABSPATH')) exit;

class Tabs extends Widget_Base{

	public function get_name(){
		return "theme_tabs";
	}
	
	public function get_title(){
		return "Tabs";
	}
	
	public function get_icon(){
		return "eicon-t-letter";
	}
	public function get_categories(){
		return ['busicon-category'];
	}
	
	protected function _register_controls(){

		$this->start_controls_section(
			'tab1_section',
			[
				'label' => __( 'Tab 1', 'busicon-elementor-extension' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

			$this->add_control(
				'tab1_text',
				[
					'label' => __( 'Tab Title', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::TEXT,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => __( 'Enter title', 'busicon-elementor-extension' ),
					'label_block' => true,
					'default' => __( 'Our Mission', 'busicon-elementor-extension' ),
				]
			);
			$this->add_control(
				'tab1_description',
				[
					'label' => __( 'Description', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::TEXTAREA,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => __( 'Enter description', 'busicon-elementor-extension' ),
					'label_block' => true,
					'default' => __( 'Dolor sit amet consectetur elit sed do eiusmod tempor incididunt labore et dolore magna aliqua enim ad minim veniam qui nostrud exercitation.', 'busicon-elementor-extension' ),
				]
			);

			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'list1_title', [
					'label' => esc_html__( 'Text', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'List Title' , 'busicon-elementor-extension' ),
					'label_block' => true,
				]
			);

			$this->add_control(
				'list1',
				[
					'label' => esc_html__( 'List Items', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[
							'list1_title' => esc_html__( 'Sed ut perspiciatis unde omnis iste natus', 'busicon-elementor-extension' ),
						],
						[
							'list1_title' => esc_html__( 'Nemo enim ipsam voluptatem quia voluptas sit', 'busicon-elementor-extension' ),
						],
						[
							'list1_title' => esc_html__( 'Sed ut perspiciatis unde omnis iste natus', 'busicon-elementor-extension' ),
						],
					],
					'title_field' => '{{{ list1_title }}}',
				]
			);

			$this->add_control(
				'button1_text',
				[
					'label' => __( 'Button Text', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::TEXT,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => __( 'Click Here', 'busicon-elementor-extension' ),
					'label_block' => true,
					'default' => __( 'Read More', 'busicon-elementor-extension' ),
				]
			);
			$this->add_control(
				'button1_link',
				[
					'label' => esc_html__( 'Button Link', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::URL,
					'placeholder' => esc_html__( 'https://your-link.com', 'busicon-elementor-extension' ),
					'default' => [
						'url' => '',
						'is_external' => true,
						'nofollow' => true,
						'custom_attributes' => '',
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'tab2_section',
			[
				'label' => __( 'Tab 2', 'busicon-elementor-extension' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

			$this->add_control(
				'tab2_text',
				[
					'label' => __( 'Tab Title', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::TEXT,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => __( 'Enter title', 'busicon-elementor-extension' ),
					'label_block' => true,
					'default' => __( 'Our Vission', 'busicon-elementor-extension' ),
				]
			);
			$this->add_control(
				'tab2_description',
				[
					'label' => __( 'Description', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::TEXTAREA,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => __( 'Enter description', 'busicon-elementor-extension' ),
					'label_block' => true,
					'default' => __( 'Design of choice for many of the world exercitation ullamc ex ea commodo consequat. Duis aute irure dolor in repreh esse cillum dolore eu fugiat nulla pariatur.', 'busicon-elementor-extension' ),
				]
			);

			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'list2_title', [
					'label' => esc_html__( 'Text', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'List Title' , 'busicon-elementor-extension' ),
					'label_block' => true,
				]
			);

			$this->add_control(
				'list2',
				[
					'label' => esc_html__( 'List Items', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[
							'list2_title' => esc_html__( 'Nunc iaculis libero in ipsum molestie fermentum, a molestie nulla aliquet.', 'busicon-elementor-extension' ),
						],
						[
							'list2_title' => esc_html__( 'Integer egestas metus blandit sagittis vestibulum ipsum molestie ho.', 'busicon-elementor-extension' ),
						],
						[
							'list2_title' => esc_html__( 'Integer eget massa malesuada, semper metus in, mattis diam.', 'busicon-elementor-extension' ),
						],
						[
							'list2_title' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'busicon-elementor-extension' ),
						],
					],
					'title_field' => '{{{ list2_title }}}',
				]
			);

			$this->add_control(
				'button2_text',
				[
					'label' => __( 'Button Text', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::TEXT,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => __( 'Click Here', 'busicon-elementor-extension' ),
					'label_block' => true,
					'default' => __( 'Read More', 'busicon-elementor-extension' ),
				]
			);
			$this->add_control(
				'button2_link',
				[
					'label' => esc_html__( 'Button Link', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::URL,
					'placeholder' => esc_html__( 'https://your-link.com', 'busicon-elementor-extension' ),
					'default' => [
						'url' => '',
						'is_external' => true,
						'nofollow' => true,
						'custom_attributes' => '',
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'tab3_section',
			[
				'label' => __( 'Tab 3', 'busicon-elementor-extension' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

			$this->add_control(
				'tab3_text',
				[
					'label' => __( 'Tab Title', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::TEXT,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => __( 'Enter title', 'busicon-elementor-extension' ),
					'label_block' => true,
					'default' => __( 'Awards Win', 'busicon-elementor-extension' ),
				]
			);
			$this->add_control(
				'tab3_description',
				[
					'label' => __( 'Description', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::TEXTAREA,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => __( 'Enter description', 'busicon-elementor-extension' ),
					'label_block' => true,
					'default' => __( 'Dolor sit amet consectetur elit sed do eiusmod tempor incididunt labore et dolore magna aliqua enim ad minim veniam qui nostrud exercitation.', 'busicon-elementor-extension' ),
				]
			);

			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'list3_title', [
					'label' => esc_html__( 'Text', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'List Title' , 'busicon-elementor-extension' ),
					'label_block' => true,
				]
			);

			$this->add_control(
				'list3',
				[
					'label' => esc_html__( 'List Items', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[
							'list3_title' => esc_html__( 'Sed ut perspiciatis unde omnis iste natus', 'busicon-elementor-extension' ),
						],
						[
							'list3_title' => esc_html__( 'At vero eos et accusamus et iusto odio', 'busicon-elementor-extension' ),
						],
						[
							'list3_title' => esc_html__( 'Nemo enim ipsam voluptatem quia voluptas sit', 'busicon-elementor-extension' ),
						],
						[
							'list3_title' => esc_html__( 'Sed ut perspiciatis unde omnis iste natus', 'busicon-elementor-extension' ),
						],
					],
					'title_field' => '{{{ list3_title }}}',
				]
			);

			$this->add_control(
				'button3_text',
				[
					'label' => __( 'Button Text', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::TEXT,
					'dynamic' => [
						'active' => true,
					],
					'placeholder' => __( 'Click Here', 'busicon-elementor-extension' ),
					'label_block' => true,
					'default' => __( 'Read More', 'busicon-elementor-extension' ),
				]
			);
			$this->add_control(
				'button3_link',
				[
					'label' => esc_html__( 'Button Link', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::URL,
					'placeholder' => esc_html__( 'https://your-link.com', 'busicon-elementor-extension' ),
					'default' => [
						'url' => '',
						'is_external' => true,
						'nofollow' => true,
						'custom_attributes' => '',
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
			'tab_title',
			[
				'label' => __( 'Tab Title', 'busicon-elementor-extension' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'tabtitle_color',
				[
					'label' => __( 'Color', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .about-tabs .tabs .tab' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'tabtitle_typography',
					'label' => __( 'Typography', 'busicon-elementor-extension' ),
					'selector' => '{{WRAPPER}} .about-tabs .tabs .tab',
				]
			);
			$this->add_responsive_control(
				'tabtitle_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .about-tabs .tabs .tab' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .about-tabs .content .content-item p' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'description_typography',
					'label' => __( 'Typography', 'busicon-elementor-extension' ),
					'selector' => '{{WRAPPER}} .about-tabs .content .content-item p',
				]
			);
			$this->add_responsive_control(
				'description_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .about-tabs .content .content-item p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'list_style',
			[
				'label' => __( 'List', 'busicon-elementor-extension' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'list_color',
				[
					'label' => __( 'Color', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .about-tabs .content .content-item ul li' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_control(
				'icon_color',
				[
					'label' => __( 'Icon Color', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .about-tabs .content .content-item ul li i' => 'color: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'list_typography',
					'label' => __( 'Typography', 'busicon-elementor-extension' ),
					'selector' => '{{WRAPPER}} .about-tabs .content .content-item ul li',
				]
			);
			$this->add_responsive_control(
				'list_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .about-tabs .content .content-item ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			
		$this->end_controls_section();

		$this->start_controls_section(
			'button_section_style',
			[
				'label' => __( 'Button', 'busicon-elementor-extension' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			$this->start_controls_tabs(
				'button_style_tabs'
			);
				$this->start_controls_tab(
					'button_style_normal_tab',
					[
						'label' => __( 'Normal', 'busicon-elementor-extension' ),
					]
				);
				
					$this->add_control(
						'button_text_color',
						[
							'label' => __( 'Text Color', 'busicon-elementor-extension' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .about-tabs .content .content-item a' => 'color: {{VALUE}};',
							],
						]
					);
					$this->add_control(
						'button_background_color',
						[
							'label' => __( 'Background Color', 'busicon-elementor-extension' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .about-tabs .content .content-item a' => 'background-color: {{VALUE}};',
							],
						]
					);
					$this->add_group_control(
						\Elementor\Group_Control_Border::get_type(),
						[
							'name' => 'button_border',
							'label' => __( 'Border', 'busicon-elementor-extension' ),
							'selector' => '{{WRAPPER}} .about-tabs .content .content-item a',
						]
					);
					$this->add_responsive_control(
						'button_border_radius',
						[
							'label' => __( 'Border Radius', 'busicon-elementor-extension' ),
							'type' => \Elementor\Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .about-tabs .content .content-item a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
				$this->end_controls_tab();
				
				$this->start_controls_tab(
					'button_style_hover_tab',
					[
						'label' => __( 'Hover', 'busicon-elementor-extension' ),
					]
				);

					$this->add_control(
						'hover_button_text_color',
						[
							'label' => __( 'Text Color', 'busicon-elementor-extension' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .about-tabs .content .content-item a:hover' => 'color: {{VALUE}};',
							],
						]
					);
					$this->add_control(
						'hover_button_background_color',
						[
							'label' => __( 'Background Color', 'busicon-elementor-extension' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .about-tabs .content .content-item a:hover' => 'background-color: {{VALUE}};',
							],
						]
					);
					$this->add_group_control(
						\Elementor\Group_Control_Border::get_type(),
						[
							'name' => 'hover_button_border',
							'label' => __( 'Border', 'busicon-elementor-extension' ),
							'selector' => '{{WRAPPER}} .about-tabs .content .content-item a:hover',
						]
					);
					$this->add_responsive_control(
						'hover_button_border_radius',
						[
							'label' => __( 'Border Radius', 'busicon-elementor-extension' ),
							'type' => \Elementor\Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .about-tabs .content .content-item a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
				$this->end_controls_tab();
				
			$this->end_controls_tabs();

			$this->add_responsive_control(
				'button_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .about-tabs .content .content-item a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'separator' => 'before',
				]
			);
			$this->add_responsive_control(
				'button_padding',
				[
					'label' => __( 'Padding', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .about-tabs .content .content-item a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'separator' => 'before',
				]
			);
			$this->add_control(
				'button_height',
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
						'{{WRAPPER}} .about-tabs .content .content-item a' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'button_width',
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
						'{{WRAPPER}} .about-tabs .content .content-item a' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'button_typography',
					'selector' => '{{WRAPPER}} .about-tabs .content .content-item a',
				]
			);

		$this->end_controls_section();

	}

	protected function render(){

		$settings = $this->get_settings_for_display();

		?>

		<?php if($settings['select_style']=='one'){ ?>

			<div class="about-tabs style1">
				<div class="tabs">
					<div class="tab"><?php echo $settings['tab1_text']; ?></div>
					<div class="tab active"><?php echo $settings['tab2_text']; ?></div>
					<div class="tab"><?php echo $settings['tab3_text']; ?></div>
				</div>
				<div class="content">
					<div class="content-item">
						<p><?php echo $settings['tab1_description']; ?></p>
						<ul>
							<?php foreach (  $settings['list1'] as $item ) { ?>
								<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><?php echo $item['list1_title']; ?></li>
							<?php } ?>
						</ul>
						<a href="<?php echo esc_url($settings['button1_link']['url']); ?>"><?php echo $settings['button1_text']; ?></a>
					</div>
					<div class="content-item active">
						<p><?php echo $settings['tab2_description']; ?></p>
						<ul>
							<?php foreach (  $settings['list2'] as $item ) { ?>
								<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><?php echo $item['list2_title']; ?></li>
							<?php } ?>
						</ul>
						<a href="<?php echo esc_url($settings['button2_link']['url']); ?>"><?php echo $settings['button2_text']; ?><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
					</div>
					<div class="content-item">
						<p><?php echo $settings['tab3_description']; ?></p>
						<ul>
							<?php foreach (  $settings['list3'] as $item ) { ?>
								<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><?php echo $item['list3_title']; ?></li>
							<?php } ?>
						</ul>
						<a href="<?php echo esc_url($settings['button3_link']['url']); ?>"><?php echo $settings['button3_text']; ?></a>
					</div>
				</div>
			</div>

			<script>
						
				let tabs = document.querySelectorAll('.tab');
				let content = document.querySelectorAll('.content-item');
				for (let i = 0; i < tabs.length; i++) {            
					tabs[i].addEventListener('click', () => tabClick(i));
				}

				function tabClick(currentTab) {
					removeActive();
					tabs[currentTab].classList.add('active');
					content[currentTab].classList.add('active');
					console.log(currentTab);
				}

				function removeActive() {
					for (let i = 0; i < tabs.length; i++) {
						tabs[i].classList.remove('active');
						content[i].classList.remove('active');
					}
				}

			</script>

		<?php }elseif($settings['select_style']=='two'){ ?>

			<div class="about-tabs style2">
				<div class="tabs">
					<div class="tab active">Our Mission</div>
					<div class="tab">Our Vision</div>
					<div class="tab">Awards Win</div>
				</div>
				<div class="content">
					<div class="content-item active">
						<p>Dolor sit amet consectetur elit sed do eiusmod tempor incididunt labore et dolore magna aliqua enim ad minim veniam qui nostrud exercitation.</p>
						<ul>
							<li>Sed ut perspiciatis unde omnis iste natus</li>
							<li>Nemo enim ipsam voluptatem quia voluptas sit</li>
							<li>Sed ut perspiciatis unde omnis iste natus</li>
						</ul>
						<a href="#">Read More</a>
					</div>
					<div class="content-item">
						<p>Dolor sit amet consectetur elit sed do eiusmod tempor incididunt labore et dolore magna aliqua enim ad minim veniam qui nostrud exercitation.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						<ul>
							<li>Sed ut perspiciatis unde omnis iste natus</li>
							<li>Nemo enim ipsam voluptatem quia voluptas sit</li>
						</ul>
						<a href="#">Read More</a>
					</div>
					<div class="content-item">
						<p>Dolor sit amet consectetur elit sed do eiusmod tempor incididunt labore et dolore magna aliqua enim ad minim veniam qui nostrud exercitation.</p>
						<ul>
							<li>Sed ut perspiciatis unde omnis iste natus</li>
							<li>At vero eos et accusamus et iusto odio</li>
							<li>Nemo enim ipsam voluptatem quia voluptas sit</li>
							<li>Sed ut perspiciatis unde omnis iste natus</li>
						</ul>
						<a href="#">Read More</a>
					</div>
				</div>
			</div>

			<script>
						
				let tabs = document.querySelectorAll('.tab');
				let content = document.querySelectorAll('.content-item');
				for (let i = 0; i < tabs.length; i++) {            
					tabs[i].addEventListener('click', () => tabClick(i));
				}

				function tabClick(currentTab) {
					removeActive();
					tabs[currentTab].classList.add('active');
					content[currentTab].classList.add('active');
					console.log(currentTab);
				}

				function removeActive() {
					for (let i = 0; i < tabs.length; i++) {
						tabs[i].classList.remove('active');
						content[i].classList.remove('active');
					}
				}

			</script>

		<?php } ?>

		<?php 
	}

}