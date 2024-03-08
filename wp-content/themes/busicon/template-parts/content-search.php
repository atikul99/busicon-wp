<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Busicon
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php busicon_post_thumbnail(); ?>
	
	<div class="content">
		<header class="entry-header">
			<?php the_category(); ?>
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) :
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
			<a class="continue-btn" href="<?php the_permalink(); ?>"><?php printf(esc_html__('Read More', 'busicon')); ?><i class="bi bi-arrow-right-short"></i></a>
		</div>
	</div>

</article>