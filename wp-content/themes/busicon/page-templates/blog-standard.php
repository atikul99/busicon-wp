<?php
/**
 * Template Name: Blog Standard
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package busicon
 */

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
					<h1><?php echo get_the_title(); ?></h1>
				</div>
				<div class="breadcrumb-items">
					<?php busicon_breadcrumbs(); ?>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>

	<main id="primary" class="site-main">
		<div class="standard-post">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<?php
						$page = ( get_query_var( 'page' ) ? get_query_var( 'page' ) : 1 );
						$paged = ( get_query_var( 'paged' ) ? get_query_var( 'paged' ) : $page );
						$wp_query = new WP_Query( array(
							'post_type' => 'post',
							'paged'     => $paged,
							'page'      => $paged,
						) );

						while ( have_posts() ) : the_post();

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