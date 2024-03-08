<?php

if(!defined('ABSPATH')) exit;

class ItemList extends \Elementor\Widget_Base{

	public function get_name(){
		return "itemlist";
	}
	
	public function get_title(){
		return "Item List";
	}
	
	public function get_icon(){
		return "eicon-bullet-list";
	}

	public function get_categories(){
		return ['busicon-category'];
	}

	protected function _register_controls() {
		
        $this->start_controls_section(
            'list_section',
            [
                'label' => __( 'List', 'busicon-elementor-extension' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'list_icon',
                [
                    'label' => esc_html__( 'Icon', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'fas fa-check',
                        'library' => 'fa-solid',
                    ],
                ]
            );
            $repeater->add_control(
                'list_title', [
                    'label' => __( 'Title', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Perfect IT Solutions For Your Business' , 'busicon-elementor-extension' ),
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'list_link',
                [
                    'label' => esc_html__( 'Link', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => esc_html__( 'https://your-link.com', 'busicon-elementor-extension' ),
                    'options' => [ 'url', 'is_external', 'nofollow' ],
                    'default' => [
                        'url' => '',
                        'is_external' => true,
                        'nofollow' => true,
                    ],
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'list',
                [
                    'label' => __( 'Repeater List', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'list_title' => __( 'Eliminate Repeat Entry', 'busicon-elementor-extension' ),
                        ],
                        [
                            'list_title' => __( 'Drive Business Process', 'busicon-elementor-extension' ),
                        ],
                    ],
                    'title_field' => '{{{ list_title }}}',
                ]
            );

        $this->end_controls_section();


/**
 * Style Tab
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
                        'three' => __( 'Three', 'busicon-elementor-extension' ),
                    ],
                    'default' => 'one',
                    
                ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
            'icon_style', [
                'label' => __( 'Icon', 'busicon-elementor-extension' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'icon_color',
                [
                    'label' => esc_html__( 'Color', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .item-list ul li i' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'icon_typography',
                    'selector' => '{{WRAPPER}} .item-list ul li i',
                ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
            'title_style', [
                'label' => __( 'Title', 'busicon-elementor-extension' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

            $this->start_controls_tabs(
                'style_tabs'
            );

            $this->start_controls_tab(
                'style_normal_tab',
                [
                    'label' => esc_html__( 'Normal', 'busicon-elementor-extension' ),
                ]
            );

                $this->add_control(
                    'title_color', [
                        'label' => __( 'Text Color', 'busicon-elementor-extension' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .item-list ul li' => 'color: {{VALUE}};',
                            '{{WRAPPER}} .item-list ul li a' => 'color: {{VALUE}};',
                        ],
                    ]
                );

            $this->end_controls_tab();

            $this->start_controls_tab(
                'style_hover_tab',
                [
                    'label' => esc_html__( 'Hover', 'busicon-elementor-extension' ),
                ]
            );

                $this->add_control(
                    'title_hover_color', [
                        'label' => __( 'Text Color', 'busicon-elementor-extension' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .item-list ul li:hover' => 'color: {{VALUE}};',
                            '{{WRAPPER}} .item-list ul li a:hover' => 'color: {{VALUE}};',
                        ],
                    ]
                );

            $this->end_controls_tab();
            $this->end_controls_tabs();

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(), [
                    'name' => 'title_typography',
                    'selector' => '{{WRAPPER}} .item-list ul li',
                ]
            );
            $this->add_responsive_control(
                'title_margin',
                [
                    'label' => __( 'Margin', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .item-list ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
            'dot_style', [
                'label' => __( 'Dot', 'busicon-elementor-extension' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'dot_color', [
                    'label' => __( 'Color', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .item-list ul li::before' => 'background-color: {{VALUE}};',
                    ],
                ]
            );
        $this->end_controls_section();

	}

    protected function render() {

        $settings = $this->get_settings_for_display();

    ?>

    <?php if($settings['select_style']=='one'){ ?>

        <div class="item-list style1">
            <ul>
                <?php foreach (  $settings['list'] as $item ) { ?>
                    <li>
                        <?php if( !empty($item['list_link']['url']) ){ echo '<a href="'.esc_url($item['list_link']['url']).'">'; } ?>

                            <?php \Elementor\Icons_Manager::render_icon( $item['list_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            <?php echo $item['list_title']; ?>

                        <?php if( !empty($item['list_link']['url']) ){ echo '</a>'; } ?>
                    </li>
                <?php } ?>
            </ul>
        </div>

    <?php }elseif($settings['select_style']=='two'){ ?>

        <div class="item-list style2">
            <ul>
                <?php foreach ( $settings['list'] as $item ) { ?>
                    <li><i class="bi bi-check2"></i><?php echo $item['list_title']; ?></li>
                <?php } ?>
            </ul>
        </div>

    <?php }elseif($settings['select_style']=='three'){ ?>

        <div class="item-list style3">
            <ul>
                <?php foreach (  $settings['list'] as $item ) { ?>
                    <li><?php echo $item['list_title']; ?></li>
                <?php } ?>
            </ul>
        </div>

    <?php } ?>

	<?php }

}