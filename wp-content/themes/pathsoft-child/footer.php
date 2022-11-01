<?php
/**
 * The template for displaying the footer
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit; ?>

	</div><!-- End inner -->

	<!-- Begin footer -->
	<footer class="footer">
		<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>
		<div class="footer-bottom">
			<div class="container">
				<div class="row justify-content-between items">
					<?php $footer_menu = get_theme_mod( 'footer_menu' );
					if( $footer_menu ) { ?>
					<div class="col-md-auto col-12 item">
						<nav class="footer-links">
							<ul>
								<?php foreach( $footer_menu as $mnu ) { ?>
								<li><a href="<?php echo esc_url( $mnu['link'] ); ?>" title="<?php echo esc_attr( $mnu['title'] ); ?>"><?php echo esc_html( $mnu['title'] ); ?></a></li>
								<?php } ?>
							</ul>
						</nav>
					</div>
					<?php } if( get_theme_mod( 'copyright' ) ) { ?>
					<div class="col-md-auto col-12 item">
						<div class="copyright"><?php echo esc_html( get_theme_mod( 'copyright' ) ); ?></div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</footer><!-- End footer -->

</main><!-- End main -->

<script> var templateUrl = "<?php echo get_template_directory_uri(); ?>"; </script>

<?php if ( true == get_theme_mod( 'popup_switch', true ) ) { ?>
<div id="сallback_popup" class="popup_style popup_style_sally open_popup" style="display:none;">
	<div class="popup">
		<div class="popup_content">
			<h4 class="popup_title"><?php echo esc_html( get_theme_mod( 'popup_title', 'We will call you' ) ); ?></h4>
			<?php echo do_shortcode( get_theme_mod( 'popup_form' ) ); ?>
		</div>
		<div class="сallback_popup_close popup_close"><i class="material-icons md-24">close</i></div>
	</div>
</div>
<?php } ?>

<?php wp_footer(); ?>

</body>

</html>

