<?php

if(!defined('ABSPATH')) exit;

class TeamCarousel extends \Elementor\Widget_Base{

	public function get_name(){
		return "team-carousel";
	}
	
	public function get_title(){
		return "Team Carousel";
	}
	
	public function get_icon(){
		return "eicon-person";
	}

	public function get_categories(){
		return ['busicon-category'];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'team_section',
			[
				'label' => esc_html__( 'Team Member', 'busicon-elementor-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'member_image',
                [
                    'label' => __( 'Member Image', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );
            $repeater->add_control(
                'member_name', [
                    'label' => __( 'Name', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'David Smith' , 'busicon-elementor-addons' ),
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'member_designation', [
                    'label' => __( 'Designation', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Developer' , 'busicon-elementor-addons' ),
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'social_media',
                [
                    'label' => esc_html__( 'Social Media', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $repeater->add_control(
                'facebook_link',
                [
                    'label' => esc_html__( 'Facebook', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'options' => [ 'url', 'is_external', 'nofollow' ],
                    'default' => [
                        'url' => '#',
                        'is_external' => false,
                        'nofollow' => false,
                        // 'custom_attributes' => '',
                    ],
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'twitter_link',
                [
                    'label' => esc_html__( 'Twitter', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'options' => [ 'url', 'is_external', 'nofollow' ],
                    'default' => [
                        'url' => '',
                        'is_external' => false,
                        'nofollow' => false,
                        // 'custom_attributes' => '',
                    ],
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'linkedin_link',
                [
                    'label' => esc_html__( 'Linkedin', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'options' => [ 'url', 'is_external', 'nofollow' ],
                    'default' => [
                        'url' => '',
                        'is_external' => false,
                        'nofollow' => false,
                        // 'custom_attributes' => '',
                    ],
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'youtube_link',
                [
                    'label' => esc_html__( 'Youtube', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'options' => [ 'url', 'is_external', 'nofollow' ],
                    'default' => [
                        'url' => '',
                        'is_external' => false,
                        'nofollow' => false,
                        // 'custom_attributes' => '',
                    ],
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'whatsapp_link',
                [
                    'label' => esc_html__( 'Whatsapp', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'options' => [ 'url', 'is_external', 'nofollow' ],
                    'default' => [
                        'url' => '',
                        'is_external' => false,
                        'nofollow' => false,
                        // 'custom_attributes' => '',
                    ],
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'team_list',
                [
                    'label' => __( 'Member List', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'member_name' => esc_html__( 'Kevin Arriola', 'busicon-elementor-addons' ),
                            'member_designation' => esc_html__( 'Developer', 'busicon-elementor-addons' ),
                        ],
                        [
                            'member_name' => esc_html__( 'Mary Padilla', 'busicon-elementor-addons' ),
                            'member_designation' => esc_html__( 'Designer', 'busicon-elementor-addons' ),
                        ],
                    ],
                    'title_field' => '{{{ member_name }}}',
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
                    ],
                    'default' => 'one',
                    
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
                        '{{WRAPPER}} .team-member .team-item .bio .name' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'name_typography',
                    'label' => __( 'Typography', 'busicon-elementor-addons' ),
                    'selector' => '{{WRAPPER}} .team-member .team-item .bio .name',
                ]
            );
            $this->add_responsive_control(
                'name_margin',
                [
                    'label' => __( 'Margin', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .team-member .team-item .bio .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .team-member .team-item .bio .designation' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'designation_typography',
                    'label' => __( 'Typography', 'busicon-elementor-addons' ),
                    'selector' => '{{WRAPPER}} .team-member .team-item .bio .designation',
                ]
            );
            $this->add_responsive_control(
                'designation_margin',
                [
                    'label' => __( 'Margin', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .team-member .team-item .bio .designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
        $this->end_controls_section();
        
	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		
		?>

        <?php if($settings['select_style']=='one'){ ?>

            <div class="team-member style1">
                <div class="team-carousel owl-carousel">
                    <?php foreach (  $settings['team_list'] as $item ) { ?>
                        <div class="team-item">
                            <div class="profile-picture">
                                <img src="<?php echo $item['member_image']['url']; ?>" alt="team-member">
                                <button class="social-toggle"><i class="fa-solid fa-share-nodes"></i></button>
                                <ul class="social-icons">
                                    <?php if ( ! empty( $item['facebook_link']['url'] ) ) {
                                        $this->add_link_attributes( 'facebook_link', $item['facebook_link'] );
                                    ?>
                                    <li><a <?php echo $this->get_render_attribute_string( 'facebook_link' ); ?>><i class="fab fa-facebook-f"></i></a></li>
                                    <?php } ?>

                                    <?php if ( ! empty( $item['twitter_link']['url'] ) ) {
                                        $this->add_link_attributes( 'twitter_link', $item['twitter_link'] );
                                    ?>
                                    <li><a <?php echo $this->get_render_attribute_string( 'twitter_link' ); ?>><i class="fab fa-twitter"></i></a></li>
                                    <?php } ?>

                                    <?php if ( ! empty( $item['linkedin_link']['url'] ) ) {
                                        $this->add_link_attributes( 'linkedin_link', $item['linkedin_link'] );
                                    ?>
                                    <li><a <?php echo $this->get_render_attribute_string( 'linkedin_link' ); ?>><i class="fa-brands fa-linkedin-in"></i></a></li>
                                    <?php } ?>

                                    <?php if ( ! empty( $item['youtube_link']['url'] ) ) {
                                        $this->add_link_attributes( 'youtube_link', $item['youtube_link'] );
                                    ?>
                                    <li><a <?php echo $this->get_render_attribute_string( 'youtube_link' ); ?>><i class="fa-brands fa-youtube"></i></a></li>
                                    <?php } ?>

                                    <?php if ( ! empty( $item['whatsapp_link']['url'] ) ) {
                                        $this->add_link_attributes( 'whatsapp_link', $item['whatsapp_link'] );
                                    ?>
                                    <li><a <?php echo $this->get_render_attribute_string( 'whatsapp_link' ); ?>><i class="fa-brands fa-whatsapp"></i></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="bio">
                                <h3 class="name"><?php echo $item['member_name']; ?></h3>
                                <p class="designation"><?php echo $item['member_designation']; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <script>
                jQuery(document).ready(function($) {
                    "use strict";
                    
                    $('.team-carousel').owlCarousel({
                        loop: true,
                        dots: false,
                        nav: true,
                        autoplayTimeout: 10000,
                        margin: 25,
                        navText: ["<i class='fa-solid fa-arrow-left'></i>", "<i class='fa-solid fa-arrow-right'></i>"],
                        responsive: {
                            0: {
                                items: 1
                            },
                            768: {
                                items: 2
                            },
                            992: {
                                items: 2
                            },
                            1920: {
                                items: 3
                            }
                        }
                    });

                    $(".team-member.style1 .social-icons").hide();
                });
            </script>

        <?php }elseif( $settings['select_style']=='two' ){ ?>

                <div class="single-team style2">
                    <div class="profile-picture">
                        <img src="<?php echo $settings['member_image']['url']; ?>" alt="team-member">
                        <button class="social-toggle"><i class="fa-solid fa-share-nodes"></i></button>
                        <ul class="social-icons">
                            <?php foreach (  $settings['list'] as $item ) { ?>
                            <li>
                                <a href="<?php echo esc_url($item['social_link']['url']); ?>">
                                    <?php \Elementor\Icons_Manager::render_icon( $item['social_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="bio">
                        <h3 class="name"><?php echo $settings['member_name']; ?></h3>
                        <p class="designation"><?php echo $settings['member_designation']; ?></p>
                    </div>
                </div>

        <?php }elseif( $settings['select_style']=='three' ){ ?>

                <div class="single-team style3">
                    <div class="profile-picture">
                        <img src="<?php echo $settings['member_image']['url']; ?>" alt="">
                    </div>
                    <div class="bio">
                        <h3 class="name"><?php echo $settings['member_name']; ?></h3>
                        <p class="designation"><?php echo $settings['member_designation']; ?></p>
                    </div>
                </div>

        <?php }elseif( $settings['select_style']=='four' ){ ?>

                <div class="single-team style4">
                    <div class="profile-picture">
                        <img src="<?php echo $settings['member_image']['url']; ?>" alt="">
                        <div class="team-social-icons">
                            <?php foreach (  $settings['list'] as $item ) { ?>

                                <a href="<?php echo esc_url($item['social_link']['url']); ?>">
                                    <?php \Elementor\Icons_Manager::render_icon( $item['social_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="team-content">
                        <h3><?php echo $settings['member_name']; ?></h3>
                        <p><?php echo $settings['member_designation']; ?></p>
                    </div>
                </div>

        <?php } ?>

	<?php }

}