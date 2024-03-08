<?php

/**
 * The file that register and defines recent post widget class
 *
 * @package           BusiconToolkit
 * @author            Urno IT
 * @copyright         2024 Urno IT
 * @license           GPL-2.0-or-later
 *
 */

function load_widget() {
	register_widget( 'recent_post_widget' );
}
add_action( 'widgets_init', 'load_widget' );
	
class recent_post_widget extends WP_Widget {
	 
	public function __construct() {
		$widget_ops = array(
			'classname' => 'widget_recent_post',
			'description' => esc_html__( 'The most recent posts on your site.', 'busicon-toolkit' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'recent_post_widget', esc_html__( 'Busicon Recent Posts','busicon-toolkit' ), $widget_ops );
		$this->alt_option_name = 'widget_recent_post';
	}	

	public function widget( $args, $instance ) {

		if ( ! isset( $args['widget_id'] ) ) $args['widget_id'] = null;
		extract( $args, EXTR_SKIP );

		echo $before_widget;
		
		$title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base);
		
	?>
	<div class="single-widget-item">
		<?php if( $title ) echo $before_title . $title . $after_title;?>
		<?php 			
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => $instance['count'] ? intval($instance['count']) : 0,
			'no_found_rows' => true,
			'post_status' => 'publish',
			'ignore_sticky_posts' => true
		);
		$post_query = new WP_Query( apply_filters( 'widget_posts_args', $args ) );
		
		if ($post_query->have_posts()){
		while ( $post_query->have_posts() ){
					$post_query->the_post();
		?>		
			<div class="recent-post-item">
				<?php if( has_post_thumbnail() ){ ?>
					<div class="recent-post-image">
						<a href="<?php echo esc_url( get_permalink() ); ?>">
							<?php echo get_the_post_thumbnail( get_the_ID(), 'busicon-recent-image' );?>
						</a>
					</div>
				<?php } ?>
				<div class="recent-post-text">
					<span class="date"><?php the_time(get_option('date_format')) ?></span>
					<h4 class="title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h4>
				</div>
			</div>
		<?php }?>
		<?php 
		wp_reset_postdata();
		
		}?>
	</div>
	<?php 
 	echo $after_widget;
	
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
		$count = isset( $instance['count'] ) ? absint( $instance['count'] ) : 2;

		?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'busicon-toolkit' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>			
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>"><?php esc_html_e( 'Number of posts:', 'busicon-toolkit' ); ?></label>
				<input id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>" type="text" value="<?php echo esc_attr( $count ); ?>" size="4"/>
			</p>
			
		<?php
	}
}
