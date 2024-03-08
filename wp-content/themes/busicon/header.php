<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Busicon
 */

global $busicon_opt;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

	<style>
		:root{
			<?php if(!empty($busicon_opt['main-color'])){ ?>
				--main-color: <?php echo esc_html($busicon_opt['main-color']); ?>
			<?php } ?>
		}
	</style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<!-- Topbar -->

	<?php get_template_part('template-parts/header-layout/topbar'); ?>

	<!-- Header -->

	<?php
		$busicon_header = get_post_meta( get_the_ID(), 'select_header', true );
	?>

	<?php
		if ( !empty($busicon_header) ) {
			$header_style = $busicon_header;
		}elseif( !empty($busicon_opt['redux_header_style']) && class_exists('Redux_Framework_Plugin') ){
			$header_style = $busicon_opt['redux_header_style'];
		}else{
			$header_style = 'header-default';
		}
	?>

	<?php get_template_part('template-parts/header-layout/' . $header_style . ''); ?>

	<!-- Mobile Menu -->

	<?php get_template_part('template-parts/header-layout/mobile-menu'); ?>

	<div class="search-window">
		<button class="search-close"><i class="fas fa-times"></i></button>
		<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<div class="form-group">
				<input type="search" name="s" value="<?php the_search_query(); ?>" placeholder="Search Here" required="">
				<button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
			</div>
		</form>
	</div>

	<?php
		$preloader = 1;
		if(class_exists( 'Redux_Framework_Plugin' )){
			$preloader = $busicon_opt['preloader_switch'];
		}
	?>

	<?php if( $preloader == 1 ){ ?>
		<div id="preloader">
			<div class="preloader">
				<span></span>
				<span></span>
			</div>
		</div>
	<?php } ?>
	