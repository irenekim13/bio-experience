<?php
/**
 * The template for displaying all single projects
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<!-- Begin main content -->
<div class="main-content">

	<div class="<?php echo esc_attr( $container ); ?>" tabindex="-1">

		<div class="row items">

            <?php while ( have_posts() ) : the_post();

                get_template_part( 'loop-templates/content', 'single-project' );

            endwhile; // end of the loop. ?>

		</div>

	</div>

</div><!-- End main content -->

<?php get_footer();
