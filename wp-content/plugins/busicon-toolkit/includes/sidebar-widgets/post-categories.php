<?php

/**
 * The file that register and defines post categories widget class
 *
 * @package           BusiconToolkit
 * @author            Urno IT
 * @copyright         2024 Urno IT
 * @license           GPL-2.0-or-later
 *
 */

function register_post_categories_widget() {
	register_widget( 'Post_Categories_Widget' );
}
add_action( 'widgets_init', 'register_post_categories_widget' );
	
class Post_Categories_Widget extends WP_Widget {
	 
	public function __construct() {
		
		parent::__construct(
			'post_categories_widget',
			esc_html__( 'Busicon Posts Categories','busicon-toolkit' ),
			array(
				'classname' => 'widget_post_categories',
				'description' => esc_html__( 'Display post categories with post counts', 'busicon-toolkit' ),
				'customize_selective_refresh' => true,
			)
		);
	}

	public function widget( $args, $instance ) {

		if ( ! isset( $args['widget_id'] ) ) $args['widget_id'] = null;
		extract( $args, EXTR_SKIP );

		echo $args['before_widget'];
		
		$title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base);
		
		?>
		<div class="single-widget-item">
			<?php if( $title ) echo $before_title . $title . $after_title;?>
			<?php

			$num_categories = ! empty( $instance['count'] ) ? $instance['count'] : 5;
			$categories = get_categories( array(
				'orderby' => 'count',
				'order'   => 'DESC',
				'number'  => $num_categories,
			) );

			echo '<ul>';
			foreach( $categories as $category ) {
				echo '<li><a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a><span> (' . esc_html( $category->count ) . ')</span></li>';
			}
			echo '</ul>';

			?>
		</div>
		<?php 
		echo $args['after_widget'];
	
	}

	/**
	 * Deals with the settings when they are saved by the admin.
	 */

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['count'] = (int) $new_instance['count'];
		
		return $instance;
	}

	/**
	 * Displays the form of this widget on the Widgets page of the WP Admin area.
	 */

	public function form( $instance ) {
		
		$title = isset( $instance['title']) ? esc_attr( $instance['title'] ) : '';
		$count = isset( $instance['count'] ) ? absint( $instance['count'] ) : 5;

		?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'busicon-toolkit' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>			
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>"><?php esc_html_e( 'Number of categories:', 'busicon-toolkit' ); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>" type="text" value="<?php echo esc_attr( $count ); ?>" size="4"/>
			</p>
			
		<?php
	}
}
