<?php
/**
 * The template for displaying search results pages
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

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">
				
				<div class="col-12">

					<?php if ( have_posts() ) : ?>

					<div class="wrapp-page-title page-title-center">
						<h1 class="page-title">
							<?php
								printf(
									/* translators: %s: query term */
									esc_html__( 'Search Results for: %s', 'understrap' ),
									'<span>' . get_search_query() . '</span>'
								);
							?>
						</h1>
					</div>

					<?php /* Start the Loop */ ?>
					<div class="search-page-container">
						<div class="search-page-list">
						<?php while ( have_posts() ) : the_post(); ?>

							<?php
							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'loop-templates/content', 'search' );
							?>

						<?php endwhile; ?>
						</div>
					</div>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>
			</div>

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

		</div>

	</div>

</div><!-- End main content -->

<?php get_footer();
