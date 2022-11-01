<?php
/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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

	<div class="<?php echo esc_attr( $container ); ?>" tabindex="-1">

		<div class="row content-items">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

				<?php if ( have_posts() ) : ?>

					<div class="wrapp-page-title">
						<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class=".page-desc">', '</div>' );
						?>
					</div>

					<div class="row items">
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php

							/*
							* Include the Post-Format-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Format name) and that will be used instead.
							*/
							get_template_part( 'loop-templates/content', get_post_format() );
							?>

						<?php endwhile; ?>
						<?php understrap_pagination(); ?>
					</div>

				<?php else : ?>

					<?php $projects = array(
							'post_type' => 'project',
							'order' => 'DESC',
							'cat' => get_queried_object()->term_id,
							'posts_per_page' => -1
					);
					$query = new WP_Query( $projects ); 

					if ( $query->have_posts() )  {
					?>
					<div class="row items" id="projects-container">
						<?php while ( $query->have_posts() )  { $query->the_post();
							
							set_query_var( 'archive_page', true );
							get_template_part( 'loop/loop', 'project' );

						} wp_reset_postdata(); ?>
					</div>
					<?php } else { ?>

					<div class="row">
						<?php get_template_part( 'loop-templates/content', 'none' ); ?>
					</div>

					<?php } ?>

				<?php endif; ?>

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div> <!-- .row -->

	</div><!-- #content -->

	</div><!-- End main content -->

<?php get_footer();
