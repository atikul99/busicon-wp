<?php

if(!defined('ABSPATH')) exit;

class busiconNavMenu extends \Elementor\Widget_Base{

	public function get_name(){
		return "busicon-nav-menu";
	}
	
	public function get_title(){
		return " Nav Menu";
	}
	
	public function get_icon(){
		return "eicon-nav-menu";
	}

	public function get_categories(){
		return ['busicon-category'];
	}

	protected $nav_menu_index = 1;

	protected function get_nav_menu_index() {
		return $this->nav_menu_index++;
	}

	private function get_available_menus() {
		$menus = wp_get_nav_menus();

		$options = [];

		foreach ( $menus as $menu ) {
			$options[ $menu->slug ] = $menu->name;
		}

		return $options;
	}

	protected function register_controls(){

		$this->start_controls_section(
			'menu_section',
			[
				'label' => esc_html__( 'Menu', 'busicon-elementor-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$menus = $this->get_available_menus();

		$this->add_control(
			'nav_menu',
			[
				'label' => esc_html__( 'Nav Menu', 'busicon-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => $menus,
				'default' => array_keys( $menus )[0],
				'save_default' => true,
				'description' => sprintf(
					esc_html__( 'Go to the %1$sMenus screen%2$s to manage your menus.', 'elementor-pro' ),
					sprintf( '<a href="%s" target="_blank">', admin_url( 'nav-menus.php' ) ),
					'</a>'
				),
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

		$this->end_controls_section();

		$this->start_controls_section(
			'menu_item_style',
			[
				'label' => __( 'Menu Item', 'busicon-elementor-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
			$this->start_controls_tabs(
				'style_tabs'
			);

			$this->start_controls_tab(
				'style_normal_tab',
				[
					'label' => esc_html__( 'Normal', 'busicon-elementor-addons' ),
				]
			);

				$this->add_control(
					'item_color',
					[
						'label' => __( 'Color', 'busicon-elementor-addons' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .busicon-nav-menu ul li a' => 'color: {{VALUE}}',
						],
					]
				);
				$this->add_group_control(
					\Elementor\Group_Control_Background::get_type(),
					[
						'name' => 'item_background',
						'types' => [ 'classic', 'gradient' ],
						'selector' => '{{WRAPPER}} .busicon-nav-menu ul li',
					]
				);
			$this->end_controls_tab();

			$this->start_controls_tab(
				'style_hover_tab',
				[
					'label' => esc_html__( 'Hover', 'busicon-elementor-addons' ),
				]
			);

				$this->add_control(
					'item_hover_color',
					[
						'label' => __( 'Color', 'busicon-elementor-addons' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .busicon-nav-menu ul li a:hover' => 'color: {{VALUE}}',
						],
					]
				);
				$this->add_group_control(
					\Elementor\Group_Control_Background::get_type(),
					[
						'name' => 'item_hover_background',
						'types' => [ 'classic', 'gradient' ],
						'selector' => '{{WRAPPER}} .busicon-nav-menu ul li:hover',
					]
				);
			$this->end_controls_tab();

			$this->end_controls_tabs();

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'item_typography',
					'selector' => '{{WRAPPER}} .busicon-nav-menu ul li a',
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'item_border',
					'selector' => '{{WRAPPER}} .busicon-nav-menu ul li',
				]
			);
			$this->add_responsive_control(
				'item_margin',
				[
					'label' => __( 'Margin', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .busicon-nav-menu ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'separator' => 'before',
				]
			);
			$this->add_responsive_control(
				'item_padding',
				[
					'label' => __( 'Padding', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em', '%' ],
					'selectors' => [
						'{{WRAPPER}} .busicon-nav-menu ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

	?>

		<?php if($settings['select_style']=='one'){ ?>
			
			<?php

				$args = [
					'menu' => $settings['nav_menu'],
					'menu_class' => 'menu-ul',
					'menu_id' => 'menu-' . $this->get_nav_menu_index(),
					'container_class'=> 'busicon-nav-menu style1'
				];

				wp_nav_menu( $args );

			?>

		<?php }elseif($settings['select_style']=='two'){ ?>

			<?php global $busicon_opt; ?>
			<nav class="busicon-nav-menu style2">

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link"><img src="<?php echo $busicon_opt['default_logo']['url']; ?>" alt=""></a>
				<div class="busicon-menu-toggle">
					<i class="bi bi-grid-3x3-gap"></i>
					<i class="bi bi-x-square"></i>
				</div>

				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'menu_class'     => 'menu-ul',
							'container_class'=> 'busicon-menu-wrapper'
						)
					);
				?>

			</nav>

		<?php } ?>

	<?php
	}
}