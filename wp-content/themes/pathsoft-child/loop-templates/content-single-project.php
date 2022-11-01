<?php
/**
 * Single project partial template
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$gallery = get_field('gallery');
$title_info = get_field('title_info');
$content = get_field('content');

?>

<div class="col-12">
    <div class="wrapp-page-title page-title-center">
        <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
        <?php
            $author_id=$post->post_author;
            
            $first_name = get_the_author_meta( 'first_name' , $author_id );
            $last_name = get_the_author_meta( 'last_name' , $author_id );
            $user_nicename = get_the_author_meta( 'user_nicename' , $author_id );
            $avatar_url = get_avatar_url($author_id);
            $author_url = home_url('/').'author/'.esc_attr( $user_nicename );
        ?>
        <div class="project-author">
            <div class="author">
                <a href="<?php echo $author_url; ?>" class="author-img">
                    <img data-src="<?php echo esc_url( $avatar_url ); ?>" class="lazy"
                        src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                        alt="<?php echo esc_html( $user_nicename ); ?>">
                </a>
                <div class="author-info">
                    <h4 class="author-name item-title">
                        <a href="<?php echo $author_url; ?>">
                            <?php if($first_name && $last_name) { 
                                echo esc_html( $first_name ).' '.esc_html( $last_name ); ?>
                            <?php } else {
                                echo esc_html( $user_nicename );
                            } ?>
                        </a>
                    </h4>
                    <div class="author-date"><?php the_time( get_option('date_format') ); ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if( $gallery ) { ?>
<div class="col-12 item">
    <div class="project-carusel">
        <div class="project-carusel-main">
            <?php foreach( $gallery as $image ) { ?>
            <div class="project-carusel-item img-style">
                <img data-flickity-lazyload="<?php echo esc_url($image['url']); ?>"
                    src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                    alt="<?php echo esc_attr($image['alt']); ?>">
            </div>
            <?php } ?>
        </div>
        <div class="project-carusel-thumb">
            <?php foreach( $gallery as $image ) { ?>
            <div class="project-carusel-thumb-item img-style">
                <img data-flickity-lazyload="<?php echo esc_url($image['sizes']['medium']); ?>" class="lazy"
                    src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                    alt="<?php echo esc_attr($image['alt']); ?>">
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php } ?>
<div class="col-12 item">
    <div class="project-info">
        <h4><?php echo esc_html( $title_info ); ?></h4>
        <?php if( have_rows('list_info') ) { while( have_rows('list_info') ) { the_row();
            $title = get_sub_field('title');
            $desc = get_sub_field('desc');
        ?>
        <div class="project-info-row">
            <div class="project-info-label"><?php echo esc_html( $title ); ?></div>
            <div class="project-info-desc"><?php echo esc_html( $desc ); ?></div>
        </div>
        <?php } } ?>
    </div>
</div>
<div class="col-12 item">
    <article <?php post_class('content project-content'); ?> id="post-<?php the_ID(); ?>">
        <?php echo $content; ?>
    </article>
    <?php understrap_entry_footer(); ?>
</div>
