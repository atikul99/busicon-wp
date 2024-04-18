<?php

if(!defined('ABSPATH')) exit;

class imageGallery extends \Elementor\Widget_Base{

	public function get_name(){
		return "image-gallery";
	}
	
	public function get_title(){
		return "Image Gallery";
	}
	
	public function get_icon(){
		return "eicon-gallery-grid";
	}

	public function get_categories(){
		return ['busicon-category'];
	}

	protected function register_controls(){

		$this->start_controls_section(
			'gallery_section',
			[
				'label' => __( 'Gallery', 'busicon-elementor-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'image_title',
				[
					'label' => esc_html__( 'Title', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'List Title' , 'busicon-elementor-addons' ),
					'label_block' => true,
				]
			);

			$repeater->add_control(
				'image',
				[
					'label' => esc_html__( 'Choose Image', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
				]
			);
			$repeater->add_control(
				'image_link',
				[
					'label' => esc_html__( 'Link', 'busicon-elementor-addons' ),
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
				'image_list',
				[
					'label' => esc_html__( 'Image List', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => $repeater->get_controls(),
					'default' => [
						[
							'image_title' => esc_html__( 'Title #1', 'busicon-elementor-addons' ),
						],
						[
							'image_title' => esc_html__( 'Title #2', 'busicon-elementor-addons' ),
						],
					],
					'title_field' => '{{{ image_title }}}',
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

			$this->add_responsive_control(
				'text_align',
				[
					'label' => __( 'Alignment', 'busicon-elementor-addons' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'start' => [
							'title' => __( 'Left', 'busicon-elementor-addons' ),
							'icon' => 'eicon-text-align-left',
						],
						'center' => [
							'title' => __( 'Center', 'busicon-elementor-addons' ),
							'icon' => 'eicon-text-align-center',
						],
						'end' => [
							'title' => __( 'Right', 'busicon-elementor-addons' ),
							'icon' => 'eicon-text-align-right',
						],
					],
					'selectors' => [
						'{{WRAPPER}} .image-gallery' => 'justify-content: {{VALUE}};',
					],
				]
			);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		
		
	?>

		<div class="image-gallery style1">
			<?php foreach (  $settings['image_list'] as $item ) { ?>
				<div class="single-item">
					<a href="<?php echo esc_url($item['image_link']['url']); ?>">
						<img src="<?php echo $item['image']['url']; ?>" alt="img">
					</a>
				</div>
			<?php } ?>
		</div>

	<?php
	}
}