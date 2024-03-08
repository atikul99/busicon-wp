<?php
/**
 * Template part for Topbar
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Busicon
 */

global $busicon_opt;

?>

	<?php
		$topbar = 0;
		if(class_exists( 'Redux_Framework_Plugin' )){
			$topbar = $busicon_opt['header_top_switch'];
		}
	?>

	<?php if ( $topbar == 1 ) : ?>
	<div class="top-bar">
		<div class="container">
			<div class="topbar-wrapper">
				<div class="location">
					<p>
						<i class="fa-solid fa-location-dot"></i>
						<?php if(!empty($busicon_opt['top_location'])){
							echo esc_html($busicon_opt['top_location']);
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
									$phone_number = $busicon_opt['top_phone'];
									$phone_number_without_space = str_replace(' ', '', $phone_number);
									$phone_number_without_character = preg_replace('/[^\w\s]/', '', $phone_number_without_space);
								}
							?>
							<a href="tel:<?php if(!empty($busicon_opt['top_phone'])){echo esc_html($phone_number_without_character);}else{echo esc_html('2095550104');} ?>">
								<i class="fa-solid fa-phone"></i>
								<?php if(!empty($busicon_opt['top_phone'])){
									echo esc_html($busicon_opt['top_phone']);
								}else{
									esc_html_e('(209) 555-0104', 'busicon');
								} ?>
							</a>
						</li>
						<li>
							<a href="mailto:<?php if(!empty($busicon_opt['top_email'])){echo esc_html($busicon_opt['top_email']);}else{esc_html_e('debbie.baker@example.com', 'busicon');} ?>">
								<i class="fa-solid fa-envelope"></i>
								<?php if(!empty($busicon_opt['top_email'])){
									echo esc_html($busicon_opt['top_email']);
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