<?php
/**
 * Template part for Header style two
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Busicon
 */

global $busicon_opt;

?>

	<?php
	
		// Topbar

		$topbar = 0;
		if(!empty($busicon_opt['header_top_switch']) && class_exists( 'Redux_Framework_Plugin' )){
			$topbar = $busicon_opt['header_top_switch'];

			if( get_post_meta( get_the_ID(),'show_topbar', true ) == 1 ){
				$topbar = 1;
			}elseif( get_post_meta( get_the_ID(),'show_topbar', true ) == 0 ){
				$topbar = 0;
			}
		}
		
		// Transparent Menu

		$transparent_menu = 0;
		if(!empty($busicon_opt['transparent_switch']) && class_exists( 'Redux_Framework_Plugin' )){
			$transparent_menu = $busicon_opt['transparent_switch'];

			if( get_post_meta( get_the_ID(),'active_transparent_menu', true ) == 1 ){
				$transparent_menu = 1;
			}elseif( get_post_meta( get_the_ID(),'active_transparent_menu', true ) == 0 ){
				$transparent_menu = 0;
			}
		}
	?>
	
	<header class="site-header2 <?php if ( $transparent_menu == 1 ){ echo "transparent-menu"; } ?>">
		<?php if ( $topbar == 1 ) : ?>
		<div class="top-bar">
			<div class="container">
				<div class="topbar-wrapper">
					<div class="social-icons">
						
						<?php if(!empty($busicon_opt['topbar2_facebook'])){ ?>
							<a href="<?php echo esc_url($busicon_opt['topbar2_facebook']); ?>"><i class="fa-brands fa-facebook-f"></i></a>
						<?php } ?>

						<?php if(!empty($busicon_opt['topbar2_instagram'])){ ?>
							<a href="<?php echo esc_url($busicon_opt['topbar2_instagram']); ?>"><i class="fa-brands fa-instagram"></i></a>
						<?php } ?>

						<?php if(!empty($busicon_opt['topbar2_twitter'])){ ?>
							<a href="<?php echo esc_url($busicon_opt['topbar2_twitter']); ?>"><i class="fa-brands fa-twitter"></i></a>
						<?php } ?>

						<?php if(!empty($busicon_opt['topbar2_linkedin'])){ ?>
							<a href="<?php echo esc_url($busicon_opt['topbar2_linkedin']); ?>"><i class="fa-brands fa-linkedin"></i></a>
						<?php } ?>

						<?php if(!empty($busicon_opt['topbar2_email'])){ ?>
							<a class="top-email" href="<?php echo esc_url('mailto:' . $busicon_opt['topbar2_email']); ?>">
								<i class="fa-solid fa-envelope"></i><?php echo esc_html($busicon_opt['topbar2_email']); ?>
							</a>
						<?php } ?>
					</div>
					
					<div class="contact">
						<?php if(!empty($busicon_opt['topbar2_address'])){ ?>
						<div class="address">
							<i class="fa-solid fa-location-dot"></i><?php echo esc_html($busicon_opt['topbar2_address']); ?>
						</div>
						<?php } ?>

						<?php
							$menu_button = 1;
							if(class_exists( 'Redux_Framework_Plugin' )){
								$menu_button = $busicon_opt['topbar2_btn_switch'];
							}
						?>

						<?php if( $menu_button == 1 ){ ?>
							<div class="menu-btn">
								<a href="<?php if( !empty($busicon_opt['topbar2_button_link']) ){ echo esc_url($busicon_opt['topbar2_button_link']); }else{ echo esc_html('#'); } ?>">
									<?php if(!empty($busicon_opt['topbar2_button_text'])){
										echo esc_html($busicon_opt['topbar2_button_text']);
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
		</div>
		<?php endif; ?>

		<div class="menu-bar">
			<div class="menu-container">
				<div class="site-logo">
					<?php
					if(has_custom_logo()){
						the_custom_logo();
					}else{ ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php if( !empty($busicon_opt['menu2_logo']['url']) ){ ?>
								<img src="<?php echo esc_url($busicon_opt['menu2_logo']['url']); ?>" alt="logo">
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
					$menu_phone = 1;
					if(class_exists( 'Redux_Framework_Plugin' )){
						$menu_phone = $busicon_opt['menu2_phone_switch'];
					}
				?>

				<?php if( $menu_phone == 1 ){ ?>
					<div class="menu-phone">
						<div class="phone-icon">
							<i class="fa-solid fa-phone"></i>
						</div>
						<div class="phone-content">
							<?php if(!empty($busicon_opt['menu2_phone_text'])){ ?>
								<p class="phone-text"><?php echo esc_html($busicon_opt['menu2_phone_text']); ?></p>
							<?php } ?>

							<?php if(!empty($busicon_opt['menu2_phone'])){ ?>
								<a class="phone-number" href="<?php echo esc_url('tel:' . $busicon_opt['menu2_phone']); ?>"><?php echo esc_html($busicon_opt['menu2_phone']); ?></a>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</header>