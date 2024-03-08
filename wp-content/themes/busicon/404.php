<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Busicon
 */

global $busicon_opt;

get_header();
?>
	<div class="four-zero-four">
		<div class="container">
			<section class="error-404 not-found">
				<div class="image">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/404-img.png' ); ?>" alt="" >
				</div>

				<div class="page-content">
					<h2 class="page-title">
						<?php if(!empty($busicon_opt['404_title'])){
							echo esc_html($busicon_opt['404_title']);
						}else{
							esc_html_e('Oops! Page not found.', 'busicon');
						} ?>
					</h2>
					<p>
						<?php if(!empty($busicon_opt['404_description'])){
							echo esc_html($busicon_opt['404_description']);
						}else{
							esc_html_e('The page you are looking for is not available or doesn’t belong to this website!', 'busicon');
						} ?>
					</p>
					<a class="return-btn" href="<?php echo esc_url(get_home_url()); ?>">
						<?php if(!empty($busicon_opt['404_btn_text'])){
							echo esc_html($busicon_opt['404_btn_text']);
						}else{
							esc_html_e('Back to Home', 'busicon');
						} ?>
					</a>
				</div>
			</section>
		</div>
	</div>

<?php
get_footer();
