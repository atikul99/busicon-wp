<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Busicon
 */

global $busicon_opt;

get_header();
?>

	<?php
		$show_breadcrumb = 1;

		if( class_exists( 'Redux_Framework_Plugin' ) && $busicon_opt['breadcrumb_switch'] == 1 ){
			
			if( get_post_meta( get_the_ID(),'show_breadcrumbs', true ) == 0 ){
				$show_breadcrumb = 0;
			}else{
				$show_breadcrumb = 1;
			}
		}elseif( class_exists( 'Redux_Framework_Plugin' ) && $busicon_opt['breadcrumb_switch'] == 0 ){
			$show_breadcrumb = 0;
		}
	?>

	<?php if( $show_breadcrumb == 1 ){ ?>
	<div class="breadcrumb-area">
		<div class="container">
			<div class="text-wrapper">
				<div class="title">
					<h1>
						<?php if(!empty($busicon_opt['blog_details_breadcrumb_title'])){
							echo esc_html($busicon_opt['blog_details_breadcrumb_title']);
						}else{
							esc_html_e('Blog Details', 'busicon');
						} ?>
					</h1>
				</div>
				<div class="breadcrumb-items">
					<?php busicon_breadcrumbs(); ?>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>

	<main id="primary" class="site-main">
		<div class="blog-details">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'single' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile;
					?>
					</div>
					<div class="col-lg-4">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</div>
	</main>

<?php

get_footer();
