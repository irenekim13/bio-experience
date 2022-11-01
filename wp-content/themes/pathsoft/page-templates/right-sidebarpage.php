<?php
/**
 * Template Name: Right Sidebar Layout
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<!-- Begin main content -->
<div class="main-content">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>col-lg-9<?php else : ?>col-12<?php endif; ?>">

				<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'page' ); ?>

						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						?>

				<?php endwhile; // end of the loop. ?>

			</div>

			<?php get_template_part( 'sidebar-templates/sidebar', 'right' ); ?>

		</div>

	</div>

</div><!-- End main content -->

<?php get_footer();
