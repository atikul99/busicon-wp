<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if(!defined('ABSPATH')) exit;

class CopyrightMenu extends Widget_Base{

	public function get_name(){
		return "copyrightmenu";
	}
	
	public function get_title(){
		return "Copyright Menu";
	}
	
	public function get_icon(){
		return "eicon-nav-menu";
	}
	public function get_categories(){
		return ['busicon-category'];
	}
	
	protected function _register_controls(){


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

			$this->add_responsive_control(
				'text_align',
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
						'space-between' => [
							'title' => __( 'Justified', 'busicon-elementor-extension' ),
							'icon' => 'eicon-text-align-justify',
						],
					],
					'selectors' => [
						'{{WRAPPER}} .copyright-menu ul' => 'justify-content: {{VALUE}};',
					],
				]
			);
		$this->end_controls_section();

		$this->start_controls_section(
			'text_style',
			[
				'label' => __( 'Text', 'busicon-elementor-extension' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

    		$this->add_control(
    			'text_color',
    			[
    				'label' => __( 'Color', 'busicon-elementor-extension' ),
    				'type' => \Elementor\Controls_Manager::COLOR,
    				'selectors' => [
    					'{{WRAPPER}} .copyright-menu ul li a' => 'color: {{VALUE}}',
    				],
    			]
    		);
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'text_typography',
                    'label' => __( 'Typography', 'busicon-elementor-extension' ),
                    'selector' => '{{WRAPPER}} .copyright-menu ul li a',
                ]
            );
            $this->add_responsive_control(
                'text_margin',
                [
                    'label' => __( 'Margin', 'busicon-elementor-extension' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .copyright-menu ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

		$this->end_controls_section();
		
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		?>

			<div class="copyright-menu">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-2',
							'menu_id'        => 'primary-menu',
							'menu_class'        => 'menu-ul',
						)
					);
				?>
			</div>
							
		<?php
	}

}

