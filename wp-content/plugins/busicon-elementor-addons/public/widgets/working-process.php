<?php



use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if(!defined('ABSPATH')) exit;


class WorkingProcess extends Widget_Base{

	public function get_name(){
		return "workingprocess";
	}
	
	public function get_title(){
		return "Working Process";
	}
	
	public function get_icon(){
		return "eicon-flip";
	}

	public function get_categories(){
		return ['busicon-category'];
	}

	protected function _register_controls(){

        $this->start_controls_section(
            'icon_section', [
                'label' => __( 'Icon', 'busicon-elementor-extension' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
	        $this->add_control(
	        	'number',
					[
						'label' => __( 'Number', 'busicon-elementor-extension' ),
						'type' => Controls_Manager::TEXT,
                        'default' => __( '01', 'busicon-elementor-extension' ),
                        'placeholder' => __( 'Enter Number', 'busicon-elementor-extension' ),
					]
	        );
	        $this->add_control(
	        	'icon',
					[
						'label' => __( 'Icon', 'busicon-elementor-extension' ),
						'type' => Controls_Manager::ICONS,
						'default' => [
							'value' => 'fas fa-play',
						],
					]
	        );
			$this->add_control(
				'icon_after',
				[
					'label' => __( 'Icon After', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => [
						'normal'  => __( 'Normal', 'busicon-elementor-extension' ),
						'rotate'  => __( 'Rotate', 'busicon-elementor-extension' ),
						'none' => __( 'None', 'busicon-elementor-extension' ),
					],
					'default' => 'normal',
				]
			);
        $this->end_controls_section();

        $this->start_controls_section(
            'title_description', [
                'label' => __( 'Title & Description', 'busicon-elementor-extension' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

			$this->add_control(
				'title',
				[
					'label' => __( 'Title', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => __( 'Idea Making', 'busicon-elementor-extension' ),
					'placeholder' => __( 'Type your title', 'busicon-elementor-extension' ),
					'label_block' => true,
				]
			);
			$this->add_control(
				'description',
				[
					'label' => __( 'Description', 'busicon-elementor-extension' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'rows' => 10,
					'default' => __( 'Choose one channel and be great at it. Work toward the goal of being the leading provider', 'busicon-elementor-extension' ),
					'placeholder' => __( 'Type your description', 'busicon-elementor-extension' ),
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

			$this->add_responsive_control(
				'icon_align',
				[
					'label' => __( 'Alignment', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => __( 'Left', 'busicon-elementor-extension' ),
							'icon' => 'eicon-text-align-left',
						],
						'center' => [
							'title' => __( 'Center', 'busicon-elementor-extension' ),
							'icon' => 'eicon-text-align-center',
						],
						'right' => [
							'title' => __( 'Right', 'busicon-elementor-extension' ),
							'icon' => 'eicon-text-align-right',
						],
						'justify' => [
							'title' => __( 'Justified', 'busicon-elementor-extension' ),
							'icon' => 'eicon-text-align-justify',
						],
					],
					'selectors' => [
						'{{WRAPPER}} .video-icon' => 'text-align: {{VALUE}};',
					],
				]
			);
		$this->end_controls_section();

		$this->start_controls_section(
			'icon_style',
			[
				'label' => __( 'Icon', 'busicon-elementor-extension' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_control(
				'icon_color',
				[
					'label' => __( 'Color', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .video-icon a' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'wave_color',
				[
					'label' => __( 'Wave Color', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .video-icon a span' => 'border-color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'size',
				[
					'label' => __( 'Size', 'busicon-elementor-extension' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .video-icon a' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border',
					'label' => __( 'Border', 'busicon-elementor-extension' ),
					'selector' => '{{WRAPPER}} .video-icon a',
				]
			);
		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		?>

		<div class="work-process">
			<div class="process-box <?php echo $settings['icon_after']; ?>">
				<div class="icon">
					<?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
					<span><?php echo $settings['number']; ?></span>
				</div>
				<div class="content">
					<h3><?php echo $settings['title']; ?></h3>
					<p><?php echo $settings['description']; ?></p>
				</div>
			</div>
		</div>
		
		<?php
	}
}