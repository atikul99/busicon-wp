<?php

if(!defined('ABSPATH')) exit;

class Team extends \Elementor\Widget_Base{

	public function get_name(){
		return "busicon-team";
	}
	
	public function get_title(){
		return "Team";
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
				'label' => esc_html__( 'Team', 'busicon-elementor-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

            $this->add_control(
                'member_image',
                [
                    'label' => __( 'Member Image', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );
            $this->add_control(
                'member_name', [
                    'label' => __( 'Name', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'David Smith' , 'busicon-elementor-addons' ),
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'member_designation', [
                    'label' => __( 'Designation', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Developer' , 'busicon-elementor-addons' ),
                    'label_block' => true,
                ]
            );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'icon',
                [
                    'label' => esc_html__( 'Icon', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'fab fa-facebook-f',
                        'library' => 'brand',
                    ],
                ]
            );
            $repeater->add_control(
                'social_name', [
                    'label' => __( 'Social Media Name', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Facebook' , 'busicon-elementor-addons' ),
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'social_link',
                [
                    'label' => __( 'Link', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => __( 'https://your-link.com', 'busicon-elementor-addons' ),
                    'show_external' => true,
                    'default' => [
                        'url' => '#',
                        'is_external' => true,
                        'nofollow' => true,
                    ],
                ]
            );
            $this->add_control(
                'list',
                [
                    'label' => __( 'Social Links', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'social_name' => __( 'Facebook', 'busicon-elementor-addons' ),
                        ],
                        [
                            'social_name' => __( 'Twitter', 'busicon-elementor-addons' ),
                        ],
                    ],
                    'title_field' => '{{{ social_name }}}',
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
                        '{{WRAPPER}} .single-team .bio .name' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'name_typography',
                    'label' => __( 'Typography', 'busicon-elementor-addons' ),
                    'selector' => '{{WRAPPER}} .single-team .bio .name',
                ]
            );
            $this->add_responsive_control(
                'name_margin',
                [
                    'label' => __( 'Margin', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .single-team .bio .name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .single-team .bio .designation' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'designation_typography',
                    'label' => __( 'Typography', 'busicon-elementor-addons' ),
                    'selector' => '{{WRAPPER}} .single-team .bio .designation',
                ]
            );
            $this->add_responsive_control(
                'designation_margin',
                [
                    'label' => __( 'Margin', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .single-team .bio .designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
            'social_style',
            [
                'label' => __( 'Social Icon', 'busicon-elementor-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'social_color',
                [
                    'label' => __( 'Color', 'busicon-elementor-addons' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-team .profile-picture .social-icons a' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .single-team .team-content .social-icons2 a' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'social_background',
                    'label' => __( 'Background', 'busicon-elementor-addons' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .single-team .profile-picture .social-icons a, .single-team.style2 .team-content .social-icons2 a',
                ]
            );

        $this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		
		?>

            <?php if($settings['select_style']=='one'){ ?>

                <div class="single-team style1">
                    <div class="bio">
                        <h3 class="name"><?php echo $settings['member_name']; ?></h3>
                        <p class="designation"><?php echo $settings['member_designation']; ?></p>
                    </div>
                    <div class="profile-picture">
                        <img src="<?php echo $settings['member_image']['url']; ?>" alt="team-member">
                        <ul class="social-icons">
                            <?php foreach (  $settings['list'] as $item ) { ?>
                            <li>
                                <a href="<?php echo esc_url($item['social_link']['url']); ?>">
                                    <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

            <?php }elseif( $settings['select_style']=='two' ){ ?>

                <div class="single-team style2">
                    <div class="profile-picture">
                        <img src="<?php echo $settings['member_image']['url']; ?>" alt="team-member">
                        <button class="social-toggle"><i class="fa-solid fa-share-nodes"></i></button>
                        <ul class="social-icons">
                            <?php foreach (  $settings['list'] as $item ) { ?>
                            <li>
                                <a href="<?php echo esc_url($item['social_link']['url']); ?>">
                                    <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
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
                                    <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
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