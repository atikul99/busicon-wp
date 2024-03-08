<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Busicon
 */

global $busicon_opt;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php busicon_post_thumbnail(); ?>
	
	<div class="content">
		<header class="entry-header">

			<?php
				$blog_page_cat = 1;
				$blog_page_meta = 1;
				if(class_exists( 'Redux_Framework_Plugin' )){
					$blog_page_cat = $busicon_opt['blog_page_category_switch'];
					$blog_page_meta = $busicon_opt['blog_page_meta_switch'];
				}
			?>

			<?php if( $blog_page_cat == 1 ){
				the_category();
			} ?>

			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() && $blog_page_meta == 1 ) :
				?>
				<div class="entry-meta">
					<?php
					busicon_posted_on();
					busicon_posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
				echo "<p class='excerpt'>".wp_trim_words(get_the_content(), 36, ' ')."</p>";
			?>
			<a class="continue-btn" href="<?php the_permalink(); ?>">
				<?php if(!empty($busicon_opt['blog_page_btn_text'])){
					echo esc_html($busicon_opt['blog_page_btn_text']);
				}else{
					esc_html_e('Continue Reading', 'busicon');
				} ?>
				<i class="bi bi-arrow-right-short"></i>
			</a>
		</div>
	</div>

</article>
