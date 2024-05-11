<?php
/**
 * Template part for Header default
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Busicon
 */

global $busicon_opt;

?>

	<?php

		$transparent_menu = 0;
		if(class_exists( 'Redux_Framework_Plugin' )){
			$transparent_menu = $busicon_opt['transparent_switch'];

			if( !empty(get_post_meta( get_the_ID(),'active_transparent_menu', true )) && get_post_meta( get_the_ID(),'active_transparent_menu', true ) == 1 ){
				$transparent_menu = 1;
			}elseif( !empty(get_post_meta( get_the_ID(),'active_transparent_menu', true )) && get_post_meta( get_the_ID(),'active_transparent_menu', true ) == 0 ){
				$transparent_menu = 0;
			}
		}
	?>

	<header class="site-header <?php if ( $transparent_menu == 1 ){ echo "transparent-menu"; } ?>">
		<div class="menu-bar">
			<div class="menu-container">
				<div class="site-logo">
					<?php
					if(has_custom_logo()){
						the_custom_logo();
					}else{ ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php if ( !empty($busicon_opt['transparent_logo']['url']) ){ ?>
								<img src="<?php echo esc_url($busicon_opt['transparent_logo']['url']); ?>" alt="logo">
							<?php }elseif( !empty($busicon_opt['default_logo']['url']) ){ ?>
								<img src="<?php echo esc_url($busicon_opt['default_logo']['url']); ?>" alt="logo">
							<?php }else{ ?>
								<h2><?php bloginfo( 'name' ); ?></h2>
							<?php } ?>
						</a>
					<?php } ?>
				</div>
				<?php if (has_nav_menu('menu-1')): ?>
					<nav class="main-navigation">
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
									'menu_class'        => 'menu-ul',
								)
							);
						?>
					</nav>
				<?php endif; ?>

				<?php
					$menu_search = 1;
					if(class_exists( 'Redux_Framework_Plugin' )){
						$menu_search = $busicon_opt['header_search_switch'];
					}
				?>
				<div class="component">
					<?php if( $menu_search == 1 ){ ?>
					<div class="search-icon">
						<i class="fa-solid fa-magnifying-glass"></i>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</header>