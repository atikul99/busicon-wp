<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if(!defined('ABSPATH')) exit;

class Team extends \Elementor\Widget_Base{

	public function get_name(){
		return "team";
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

	protected function _register_controls() {

		$this->start_controls_section(
			'team_section',
			[
				'label' => esc_html__( 'Team', 'busicon-elementor-extension' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

            $this->add_control(
                'member_image',
                [
                    'label' => __( 'Member Image', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );
            $this->add_control(
                'member_name', [
                    'label' => __( 'Name', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'David Smith' , 'busicon-elementor-extension' ),
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'member_designation', [
                    'label' => __( 'Designation', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Developer' , 'busicon-elementor-extension' ),
                    'label_block' => true,
                ]
            );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'icon',
                [
                    'label' => esc_html__( 'Icon', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'fas fa-star',
                        'library' => 'solid',
                    ],
                ]
            );
            $repeater->add_control(
                'social_name', [
                    'label' => __( 'Social Media Name', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Facebook' , 'busicon-elementor-extension' ),
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'social_link',
                [
                    'label' => __( 'Link', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => __( 'https://your-link.com', 'busicon-elementor-extension' ),
                    'show_external' => true,
                    'default' => [
                        'url' => '',
                        'is_external' => true,
                        'nofollow' => true,
                    ],
                ]
            );
            $this->add_control(
                'list',
                [
                    'label' => __( 'Social Links', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'social_name' => __( 'Facebook', 'busicon-elementor-extension' ),
                        ],
                        [
                            'social_name' => __( 'Twitter', 'busicon-elementor-extension' ),
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
                'label' => __( 'General', 'busicon-elementor-extension' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'select_style',
                [
                    'label' => __( 'Select Style', 'busicon-elementor-extension' ),
                    'type' => Controls_Manager::SELECT,
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
            'name_style',
            [
                'label' => __( 'Name', 'busicon-elementor-extension' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'name_color',
                [
                    'label' => __( 'Color', 'busicon-elementor-extension' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-team .bio h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'name_typography',
                    'label' => __( 'Typography', 'busicon-elementor-extension' ),
                    'selector' => '{{WRAPPER}} .single-team .bio h3',
                ]
            );
            $this->add_responsive_control(
                'name_margin',
                [
                    'label' => __( 'Margin', 'busicon-elementor-extension' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', 'em', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .single-team .bio h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
            'designation_style',
            [
                'label' => __( 'Designation', 'busicon-elementor-extension' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'designation_color',
                [
                    'label' => __( 'Color', 'busicon-elementor-extension' ),
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
                    'label' => __( 'Typography', 'busicon-elementor-extension' ),
                    'selector' => '{{WRAPPER}} .single-team .bio .designation',
                ]
            );
            $this->add_responsive_control(
                'designation_margin',
                [
                    'label' => __( 'Margin', 'busicon-elementor-extension' ),
                    'type' => Controls_Manager::DIMENSIONS,
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
                'label' => __( 'Social Icon', 'busicon-elementor-extension' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
            $this->add_control(
                'social_color',
                [
                    'label' => __( 'Color', 'busicon-elementor-extension' ),
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
                    'label' => __( 'Background', 'busicon-elementor-extension' ),
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
                    <div class="profile-picture">
                        <img src="<?php echo $settings['member_image']['url']; ?>" alt="">
                    </div>
                    <div class="bio">
                        <h3 class="name"><?php echo $settings['member_name']; ?></h3>
                        <p class="designation"><?php echo $settings['member_designation']; ?></p>
                    </div>
                </div>

            <?php }elseif( $settings['select_style']=='two' ){ ?>

                <div class="single-team style2">
                    <div class="profile-picture">
                        <img src="<?php echo $settings['member_image']['url']; ?>" alt="">
                    </div>
                    <div class="team-content">
                        <div class="team-button2"><span>+</span></div>
                        <div class="social-icons2">
                            <?php foreach (  $settings['list'] as $item ) { ?>

                            <a href="<?php echo esc_url($item['social_link']['url']); ?>"><?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?></a>
                            <?php } ?>
                        </div>
                        <div class="name-designation">
                            <h3><?php echo $settings['member_name']; ?></h3>
                            <h6><?php echo $settings['member_designation']; ?></h6>
                        </div>
                    </div>
                </div>

            <?php }elseif( $settings['select_style']=='three' ){ ?>

                <div class="single-team style3">
                    <div class="profile-picture">
                        <img src="<?php echo $settings['member_image']['url']; ?>" alt="">
                        <div class="social-icons">
                            <?php foreach (  $settings['list'] as $item ) { ?>

                            <a href="<?php echo esc_url($item['social_link']['url']); ?>"><?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?></a>
                            <?php } ?>
                        </div>
                        <div class="team-button"></div>
                    </div>
                    <div class="name-designation">
                        <h3><?php echo $settings['member_name']; ?></h3>
                        <h6><?php echo $settings['member_designation']; ?></h6>
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