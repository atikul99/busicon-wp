<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Busicon
 */

global $busicon_opt;

?>

	<footer id="colophon" class="site-footer">
		<div class="copyright">
			<div class="container">
				<div class="site-info">
					<p class="copyright-text">
						<?php
							if(!empty($busicon_opt['copyright-text'])){
								echo esc_html($busicon_opt['copyright-text']);
							}else{
								printf(esc_html__('Copyright © %1$s %2$s', 'busicon'), '2024', 'Busicon'); ?>
								<span class="sep"> | </span>
								<?php printf(esc_html__('All Rights Reserved.', 'busicon'));
							}
						?>
					</p>
				</div>
			</div>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
