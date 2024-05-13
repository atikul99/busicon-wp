<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
		}elseif( class_exists( 'Redux_Framework_Plugin' ) && $busicon_opt['breadcrumb_switch'] == 0 ){
			$show_breadcrumb = 0;
		}
	?>

	<?php if( $show_breadcrumb == 1 ){ ?>
	<div class="breadcrumb-area">
		<div class="container">
			<div class="text-wrapper">
				<div class="title">
					<h1><?php printf( esc_html__( 'Search Results for: %s', 'busicon' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</div>
				<div class="breadcrumb-items">
					<?php busicon_breadcrumbs(); ?>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	
	<main id="primary" class="site-main">
		<div class="search-results">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<?php if ( have_posts() ) : ?>

							<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/**
								 * Run the loop for the search to output the results.
								 * If you want to overload this in a child theme then include a file
								 * called content-search.php and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'search' );

							endwhile;

							the_posts_pagination(
								array(
									'prev_text'          => '<i class="bi bi-chevron-double-left"></i>',
									'next_text'          => '<i class="bi bi-chevron-double-right"></i>',
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
