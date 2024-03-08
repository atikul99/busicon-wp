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
				$blog_details_cat = 1;
				$blog_details_meta = 1;
				if(class_exists( 'Redux_Framework_Plugin' )){
					$blog_details_cat = $busicon_opt['blog_details_category_switch'];
					$blog_details_meta = $busicon_opt['blog_details_meta_switch'];
				}
			?>

			<?php if( $blog_details_cat == 1 ){
				the_category();
			} ?>

			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() && $blog_details_meta == 1 ) :
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
				the_content();
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__('Pages:', 'busicon'),
						'after'  => '</div>',
					)
				);
			?>
		</div>
		<div class="clearfix"></div>
	</div>

</article>

<div class="post-footer">
	<div class="row">
		<div class="col-lg-6">
			<?php $tags = get_the_tags(); ?>
			<?php if(!empty($tags)){ ?>
			<div class="tags">
				<span class="tag-title"><?php echo esc_html__('Tags :', 'busicon'); ?></span>
				<ul>
					<?php foreach ( $tags as $tag ) { ?>
						<li><a href="<?php echo get_tag_link( $tag->term_id ); ?>"><?php echo esc_html($tag->name); ?></a></li>
					<?php } ?>
				</ul>
			</div>
			<?php } ?>
		</div>
		<div class="col-lg-6"></div>
	</div>
</div>
