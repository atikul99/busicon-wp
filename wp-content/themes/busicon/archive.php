<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Busicon
 */

global $busicon_opt;

get_header();
?>

	<?php
		$show_breadcrumb = 1;

		if( class_exists( 'Redux_Framework_Plugin' ) && $busicon_opt['breadcrumb_switch'] == 1 ){
			$show_breadcrumb = 1;
			if( !empty(get_post_meta( get_the_ID(),'show_breadcrumbs', true )) && get_post_meta( get_the_ID(),'show_breadcrumbs', true ) == 1 ){
				$show_breadcrumb = 1;
			}elseif( !empty(get_post_meta( get_the_ID(),'show_breadcrumbs', true )) && get_post_meta( get_the_ID(),'show_breadcrumbs', true ) == 0 ){
				$show_breadcrumb = 0;
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
					<h1><?php the_archive_title(); ?></h1>
				</div>
				<div class="breadcrumb-items">
					<?php busicon_breadcrumbs(); ?>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>

	<main id="primary" class="site-main">
		<div class="archive-page">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<?php if ( have_posts() ) : ?>

							<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/*
								 * Include the Post-Type-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', get_post_type() );

							endwhile;

							the_posts_pagination(
								array(
									'prev_text'          => '<i class="fa-solid fa-chevron-left"></i>',
									'next_text'          => '<i class="fa-solid fa-chevron-right"></i>',
									'screen_reader_text' => '',
									'type'               => 'list'
								)
							);

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
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
