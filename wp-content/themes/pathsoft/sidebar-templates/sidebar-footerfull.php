<?php
/**
 * Sidebar setup for footer full
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );

?>

<?php if ( is_active_sidebar( 'footerfull' ) ) : ?>

	<div class="footer-main">

		<div class="<?php echo esc_attr( $container ); ?>" tabindex="-1">

			<div class="row items">

				<?php dynamic_sidebar( 'footerfull' ); ?>

			</div>

		</div>

	</div>

<?php endif;
