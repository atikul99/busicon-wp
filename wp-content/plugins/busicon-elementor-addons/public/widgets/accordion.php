<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if(!defined('ABSPATH')) exit;

class busiconAccordion extends \Elementor\Widget_Base{

	public function get_name(){
		return "busiconAccordion";
	}
	
	public function get_title(){
		return "Accordion";
	}
	
	public function get_icon(){
		return "eicon-accordion";
	}

	public function get_categories(){
		return ['busicon-category'];
	}

	protected function register_controls() {
		
        $this->start_controls_section(
            'accordion_section',
            [
                'label' => __( 'Accordion', 'busicon-elementor-extension' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        
        $repeater->add_control(
            'list_title', [
                'label' => __( 'Title', 'busicon-elementor-extension' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'General coaching and advisory services' , 'busicon-elementor-extension' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'list_description',
            [
                'label' => esc_html__( 'Description', 'busicon-elementor-extension' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum ultrices gravida. Risus commodo viverra maecenas..', 'busicon-elementor-extension' ),
                'placeholder' => esc_html__( 'Type your description here', 'busicon-elementor-extension' ),
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
                        'list_title' => __( 'General coaching and advisory services', 'busicon-elementor-extension' ),
                    ],
                    [
                        'list_title' => __( 'Experience A Ranking Factor?', 'busicon-elementor-extension' ),
                    ],
                ],
                'title_field' => '{{{ list_title }}}',
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
                        'three' => __( 'Three', 'busicon-elementor-extension' ),
                        'four' => __( 'Four', 'busicon-elementor-extension' ),
                    ],
                    'default' => 'one',
                    
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'icon_style', [
                'label' => __( 'Icon', 'busicon-elementor-extension' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        
            $this->add_control(
                'icon_background', [
                    'label' => __( 'Background Color', 'busicon-elementor-extension' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .accordion a i' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_title', [
                'label' => __( 'Title', 'busicon-elementor-extension' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_title', [
                'label' => __( 'Text Color', 'busicon-elementor-extension' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'typography_title',
                'selector' => '{{WRAPPER}} .accordion a',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'description_style', [
                'label' => __( 'Description', 'busicon-elementor-extension' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'description_color', [
                    'label' => __( 'Text Color', 'busicon-elementor-extension' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .accordion li p' => 'color: {{VALUE}};',
                    ],
                ]
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(), [
                    'name' => 'description_typography',
                    'selector' => '{{WRAPPER}} .accordion li p',
                ]
            );

        $this->end_controls_section();

	}

    protected function render() {

        $settings = $this->get_settings_for_display();

    ?>

    <?php if($settings['select_style']=='one'){ ?>

        <ul class="accordion style1">
            <?php foreach (  $settings['list'] as $item ) { ?>
                <li>
                    <a><i class="bi bi-chat-quote"></i><?php echo $item['list_title']; ?></a>
                    <p><?php echo $item['list_description']; ?></p>
                </li>
            <?php } ?>
        </ul>

        <script>
            jQuery(document).ready(function($) {
                "use strict";

                $('.accordion > li:eq(0) a').addClass('active').next().slideDown();

                $('.accordion a').click(function(j) {
                    var dropDown = $(this).closest('li').find('p');

                    $(this).closest('.accordion').find('p').not(dropDown).slideUp();

                    if ($(this).hasClass('active')) {
                        $(this).removeClass('active');
                    } else {
                        $(this).closest('.accordion').find('a.active').removeClass('active');
                        $(this).addClass('active');
                    }

                    dropDown.stop(false, true).slideToggle();

                    j.preventDefault();
                });

            });
        </script>

    <?php }elseif($settings['select_style']=='two'){ ?>

        <ul class="accordion style2">
            <?php foreach (  $settings['list'] as $item ) { ?>
                <li>
                    <a><i class="fa fa-check" aria-hidden="true"></i><?php echo $item['list_title']; ?></a>
                    <p><?php echo $item['list_description']; ?></p>
                </li>
            <?php } ?>
        </ul>

        <script>
            jQuery(document).ready(function($) {
                "use strict";

                $('.accordion > li:eq(0) a').addClass('active').next().slideDown();

                $('.accordion a').click(function(j) {
                    var dropDown = $(this).closest('li').find('p');

                    $(this).closest('.accordion').find('p').not(dropDown).slideUp();

                    if ($(this).hasClass('active')) {
                        $(this).removeClass('active');
                    } else {
                        $(this).closest('.accordion').find('a.active').removeClass('active');
                        $(this).addClass('active');
                    }

                    dropDown.stop(false, true).slideToggle();

                    j.preventDefault();
                });

            });
        </script>
        
    <?php }elseif($settings['select_style']=='three'){ ?>

        <ul class="accordion style3">
            <?php $i=0; ?>
            <?php foreach (  $settings['list'] as $item ) { ?>
                <li>
                    <a><span class="number"><?php $i++; echo sprintf("%02d", $i); ?></span><?php echo $item['list_title']; ?></a>
                    <p><?php echo $item['list_description']; ?></p>
                </li>
            <?php } ?>
        </ul>

        <script>
            jQuery(document).ready(function($) {
                "use strict";

                $('.accordion > li:eq(0) a').addClass('active').next().slideDown();

                $('.accordion a').click(function(j) {
                    var dropDown = $(this).closest('li').find('p');

                    $(this).closest('.accordion').find('p').not(dropDown).slideUp();

                    if ($(this).hasClass('active')) {
                        $(this).removeClass('active');
                    } else {
                        $(this).closest('.accordion').find('a.active').removeClass('active');
                        $(this).addClass('active');
                    }

                    dropDown.stop(false, true).slideToggle();

                    j.preventDefault();
                });

            });
        </script>

    <?php }elseif($settings['select_style']=='four'){ ?>

        <ul class="accordion style4">
            <?php foreach (  $settings['list'] as $item ) { ?>
            <li class="accordion__single">
                <a class="accordion__title"><?php echo $item['list_title']; ?><span class="meta--icon"></span></a>
                <p class="accordion__content-text"><?php echo $item['list_description']; ?></p>
            </li>
            <?php } ?>
        </ul>

        <script>
            jQuery(document).ready(function($) {
                "use strict";

                $('.accordion > li:eq(0) a').addClass('active').next().slideDown();

                $('.accordion a').click(function(j) {
                    var dropDown = $(this).closest('li').find('p');

                    $(this).closest('.accordion').find('p').not(dropDown).slideUp();

                    if ($(this).hasClass('active')) {
                        $(this).removeClass('active');
                    } else {
                        $(this).closest('.accordion').find('a.active').removeClass('active');
                        $(this).addClass('active');
                    }

                    dropDown.stop(false, true).slideToggle();

                    j.preventDefault();
                });

            });
        </script>

    <?php } ?>

	<?php }

}