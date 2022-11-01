<?php
/**
 * Search results partial template
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class('search-page-item-info'); ?> id="post-<?php the_ID(); ?>">

	<?php
		the_title(
			sprintf( '<h2 class="news-wide-item-title item-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h2>'
		);
	?>
	<div class="blog-post-meta"><?php understrap_posted_on(); ?></div>
	<div class="news-wide-item-desc">
		<p><?php the_excerpt_max_charlength(200); ?></p>
	</div>

</article>
