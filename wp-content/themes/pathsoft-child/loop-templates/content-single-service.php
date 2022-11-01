<?php
/**
 * Single project partial template
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$image = get_field('image');
$description = get_field('description');

?>

<div class="col-12 item">
    <div class="wrapp-page-title page-title-center">
        <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
    </div>
    <article <?php post_class('content'); ?> id="post-<?php the_ID(); ?>">
        <?php if(has_post_thumbnail()) { ?>
        <div class="img-style">
            <img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>" alt="">
        </div>
        <?php } else if($image) { ?>
        <div class="img-style">
            <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_url($image['alt']); ?>">
        </div>
        <?php } echo $description; ?>
        <?php understrap_entry_footer(); ?>
    </article>
</div>
