<?php
/**
 * The template for displaying the author pages
 *
 * Learn more: https://codex.wordpress.org/Author_Templates
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

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<?php
				if ( isset( $_GET['author_name'] ) ) {
					$curauth = get_user_by( 'slug', $author_name );
				} else {
					$curauth = get_userdata( intval( $author ) );
				}
			?>
			<div class="wrapp-page-title">
				<h1><?php echo esc_html__( 'About:', 'understrap' ) . ' ' . esc_html( $curauth->nickname ); ?></h1>
			</div>

			<div class="wrapp-author">
				<?php if ( ! empty( $curauth->ID ) ) : ?>
					<div class="author">
						<?php echo get_avatar( $curauth->ID ); ?>
					</div>
				<?php endif; ?>
				<h5 class="author-title"><?php echo esc_html( 'Posts by', 'understrap' ) . ' ' . esc_html( $curauth->nickname ); ?>:</h5>
			</div>

			<?php if ( have_posts() ) : ?>

			<div class="search-page-list">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'search' ); ?>

				<?php endwhile; ?>
			</div>

			<?php else : ?>

				<?php get_template_part( 'loop-templates/content', 'none' ); ?>

			<?php endif; ?>

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div>

	</div>

</div>

<?php get_footer();
