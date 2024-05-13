<?php
/**
 * Template part for Mobile menu
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Busicon
 */

global $busicon_opt;

?>

	<div class="mobile-menu">
		<div class="menu-bar">
			<div class="site-logo">
				<?php
				if(has_custom_logo()){
					the_custom_logo();
				}else{ ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php if ( !empty($busicon_opt['mobile_logo']['url']) ){ ?>
							<img src="<?php echo esc_url($busicon_opt['mobile_logo']['url']); ?>" alt="logo">
						<?php }else{ ?>
							<h2><?php bloginfo( 'name' ); ?></h2>
						<?php } ?>
					</a>
				<?php } ?>
			</div>
			<?php if (has_nav_menu('menu-1')): ?>
				<div class="menu-toggle">
					<i class="bi bi-grid-3x3-gap"></i>
				</div>
			<?php endif; ?>
		</div>

		<div class="menu-content">
			<?php if (has_nav_menu('menu-1')): ?>

				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'menu_class'        => 'menu-ul',
						)
					);
				?>

			<?php endif; ?>

			<?php
				$mobile_menu_contact = 1;
				if(class_exists( 'Redux_Framework_Plugin' )){
					$mobile_menu_contact = $busicon_opt['mobile_menu_contact_switch'];
				}
			?>

			<?php if( $mobile_menu_contact == 1 ){ ?>
				<div class="info">
					<?php if(!empty($busicon_opt['mobile_menu_contact_title'])){
						echo '<h3 class="title">'.esc_html($busicon_opt['mobile_menu_contact_title']).'</h3>';
					}else{
						echo '<h3 class="title">'.esc_html("Contact Info").'</h3>';
					} ?>
					<div class="info-box">
						<i class="fa-solid fa-location-dot"></i>
						<?php if(!empty($busicon_opt['mobile_menu_address'])){
							echo esc_html($busicon_opt['mobile_menu_address']);
						}else{
							esc_html_e('6391 Elgin St. Celina, Delaware 10299', 'busicon');
						} ?>
					</div>
					<div class="info-box">
						<?php
							if(class_exists( 'Redux_Framework_Plugin' )){
								$phone_number = $busicon_opt['mobile_menu_phone'];
								$phone_number_without_space = str_replace(' ', '', $phone_number);
								$phone_number_without_character = preg_replace('/[^\w\s]/', '', $phone_number_without_space);
							}
						?>
						<i class="fa-solid fa-phone"></i>
						<a href="tel:<?php if(!empty($busicon_opt['mobile_menu_phone'])){echo esc_html($phone_number_without_character);}else{echo esc_html('2095550104');} ?>">
							<?php if(!empty($busicon_opt['mobile_menu_phone'])){
								echo esc_html($busicon_opt['mobile_menu_phone']);
							}else{
								esc_html_e('(209) 555-0104', 'busicon');
							} ?>
						</a>
					</div>
					<div class="info-box">
						<i class="fa-solid fa-envelope"></i>
						<a href="mailto:<?php if(!empty($busicon_opt['mobile_menu_email'])){echo esc_html($busicon_opt['mobile_menu_email']);}else{esc_html_e('debbie.baker@example.com', 'busicon');} ?>">
							<?php if(!empty($busicon_opt['mobile_menu_email'])){
								echo esc_html($busicon_opt['mobile_menu_email']);
							}else{
								esc_html_e('debbie.baker@example.com', 'busicon');
							} ?>
						</a>
					</div>
				</div>
			<?php } ?>

			<?php
				$menu_search = 1;
				$menu_button = 1;
				if(class_exists( 'Redux_Framework_Plugin' )){
					$menu_search = $busicon_opt['mobile_menu_search_switch'];
					$menu_button = $busicon_opt['mobile_menu_btn_switch'];
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
						<a href="<?php if( !empty($busicon_opt['mobile_menu_button_link']) ){ echo esc_url($busicon_opt['mobile_menu_button_link']); }else{ echo esc_html('#'); } ?>">
							<?php if(!empty($busicon_opt['mobile_menu_button_text'])){
								echo esc_html($busicon_opt['mobile_menu_button_text']);
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