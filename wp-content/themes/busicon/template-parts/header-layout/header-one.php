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

	<?php
	
		// Topbar

		$topbar = 0;
		$transparent_menu = 1;
		if(class_exists( 'Redux_Framework_Plugin' )){
			$topbar = $busicon_opt['topbar1_switch'];
			$transparent_menu = $busicon_opt['header1_transparent_menu'];
		}
	?>

	<header class="site-header1 <?php if ( $transparent_menu == 1 ){ echo esc_html("transparent-menu"); } ?>">
		<?php if ( $topbar == 1 ) : ?>
		<div class="top-bar">
			<div class="container">
				<div class="topbar-wrapper">
					<div class="location">
						<p>
							<i class="fa-solid fa-location-dot"></i>
							<?php if(!empty($busicon_opt['topbar1_address'])){
								echo esc_html($busicon_opt['topbar1_address']);
							}else{
								esc_html_e('6391 Elgin St. Celina, Delaware 10299', 'busicon');
							} ?>
						</p>
					</div>
					<div class="contact">
						<ul>
							<li>
								<?php
									if(class_exists( 'Redux_Framework_Plugin' )){
										$phone_number = $busicon_opt['topbar1_phone'];
										$phone_number_without_space = str_replace(' ', '', $phone_number);
										$phone_number_without_character = preg_replace('/[^\w\s]/', '', $phone_number_without_space);
									}
								?>
								<a href="tel:<?php if(!empty($busicon_opt['topbar1_phone'])){echo esc_html($phone_number_without_character);}else{echo esc_html('2095550104');} ?>">
									<i class="fa-solid fa-phone"></i>
									<?php if(!empty($busicon_opt['topbar1_phone'])){
										echo esc_html($busicon_opt['topbar1_phone']);
									}else{
										esc_html_e('(209) 555-0104', 'busicon');
									} ?>
								</a>
							</li>
							<li>
								<a href="mailto:<?php if(!empty($busicon_opt['topbar1_email'])){echo esc_html($busicon_opt['topbar1_email']);}else{esc_html_e('debbie.baker@example.com', 'busicon');} ?>">
									<i class="fa-solid fa-envelope"></i>
									<?php if(!empty($busicon_opt['topbar1_email'])){
										echo esc_html($busicon_opt['topbar1_email']);
									}else{
										esc_html_e('debbie.baker@example.com', 'busicon');
									} ?>
								</a>
							</li>
						</ul>
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
							<?php if ( !empty($busicon_opt['menubar1_logo']['url']) ){ ?>
								<img src="<?php echo esc_url($busicon_opt['menubar1_logo']['url']); ?>" alt="logo">
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