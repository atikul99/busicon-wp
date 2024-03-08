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

	<?php $show_breadcumb  = get_post_meta( get_the_ID(),'show_breadcrumbs', true ); ?>
	
	<?php if( $show_breadcumb == 0 ){ ?>
	<div class="breadcrumb-area">
		<div class="container">
			<div class="text-wrapper">
				<div class="title">
					<h1><?php wp_title(''); ?></h1>
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