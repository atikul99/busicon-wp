<?php



use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if(!defined('ABSPATH')) exit;


class busiconGallery extends Widget_Base{

	public function get_name(){
		return "busicongallery";
	}
	
	public function get_title(){
		return "Gallery";
	}
	
	public function get_icon(){
		return "eicon-gallery-grid";
	}

	public function get_categories(){
		return ['busicon-category'];
	}

	protected function _register_controls(){

		$this->start_controls_section(
			'gallery_section',
			[
				'label' => __( 'Gallery', 'busicon-elementor-extension' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

			$this->add_control(
				'gallery',
				[
					'label' => esc_html__( 'Add Images', 'plugin-name' ),
					'type' => \Elementor\Controls_Manager::GALLERY,
					'default' => [],
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

	<div class="image-gallery">

		<?php foreach (  $settings['gallery'] as $item ) { ?>
			<div class="single-item">
				<img src="<?php echo $item['url']; ?>" alt="img">
			</div>
		<?php } ?>

	</div>

	<?php
	}
}