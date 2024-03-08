<?php
/**
 * Template part for Header style one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Busicon
 */

global $busicon_opt;

?>

	<header class="site-header1 <?php if ( class_exists( 'Redux_Framework_Plugin' ) && $busicon_opt['transparent_switch'] == 1 ){ echo "transparent-menu"; } ?>">
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
					$menu_button = 1;
					if(class_exists( 'Redux_Framework_Plugin' )){
						$menu_search = $busicon_opt['header_search_switch'];
						$menu_button = $busicon_opt['header_btn_switch'];
					}
				?>
				<div class="component">
					<?php if( $menu_search == 1 ){ ?>
						<div class="search-icon">
							<i class="fa-solid fa-magnifying-glass"></i>
						</div>
					<?php } ?>
					<?php if( $menu_button == 1 ){ ?>
						<div class="menu-btn">
							<a href="<?php if( !empty($busicon_opt['button_link']) ){ echo esc_url($busicon_opt['button_link']); }else{ echo esc_html('#'); } ?>">
								<?php if(!empty($busicon_opt['button_text'])){
									echo esc_html($busicon_opt['button_text']);
								}else{
									esc_html_e('Get A Quote', 'busicon');
								} ?>
								<i class="fa-solid fa-arrow-right"></i>
							</a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</header>