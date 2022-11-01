<?php
/**
 * Single post partial template
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<header class="blog-post-header">
	<?php the_title( '<h1 class="blog-post-title">', '</h1>' ); ?>
	<div class="blog-post-meta">
		<?php understrap_posted_on(); ?>
	</div>
	<?php if(has_post_thumbnail()) { ?>
	<div class="blog-post-img img-style">
		<img data-src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>"
			class="lazy"
			src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
			alt="">
	</div>
	<?php } ?>
</header>
<article <?php post_class('blog-post-article content'); ?> id="post-<?php the_ID(); ?>">
	<?php the_content(); ?>
</article>
<footer class="blog-post-footer">
	<div class="row align-items-center justify-content-between items">
		<div class="col-md col-12 item">
			<?php echo get_the_category_list( esc_html__( ', ', 'understrap' ) );?>
		</div>
	</div>
</footer>
