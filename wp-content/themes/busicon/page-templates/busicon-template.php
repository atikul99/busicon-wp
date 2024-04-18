<?php
/**
 * Template Name: Busicon Template
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
			if( get_post_meta( get_the_ID(),'show_breadcrumbs', true ) == 1 ){
				$show_breadcrumb = 1;
			}elseif( get_post_meta( get_the_ID(),'show_breadcrumbs', true ) == 0 ){
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
			
	<div class="busicon-template">
		<?php the_content(); ?>
	</div>
			
<?php 
get_footer();