<?php

$proj = get_sub_field('projects');

$categories = wp_get_post_categories($post->ID, array('fields' => 'all'));

$short_description = get_field('short_description');

$class = 'col-lg-4 col-md-6 col-sm-6 col-12 item project-col';

if ( is_archive() ) {
	$class = 'col-md-6 col-sm-6 col-12 item project-col';
}

if($proj['style'] == 'style1') {

    foreach( $categories as $cat ) {
        if($cat->slug != 'projects') {
            $class .= ' project-'.$cat->slug;
        }
    }

} else if($proj['style'] == 'style2') {

    $class = 'project-col project-col-carusel';

}


?>
<div class="<?php echo esc_attr($class); ?>">
    <!-- Begin project item -->
    <div class="project-item">
        <div class="project-item-card project-item-card-front">
            <?php if(has_post_thumbnail()) { 
                if($proj['style'] == 'style2') {    
            ?>
            <img data-flickity-lazyload="<?php echo get_the_post_thumbnail_url( $post->ID, 'large' ); ?>"
                    src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                    alt="">
            <?php } else { ?>
                <img data-src="<?php echo get_the_post_thumbnail_url( $post->ID, 'large' ); ?>"
                    class="lazy"
                    src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                    alt="">
            <?php } } ?>
        </div>
        <div class="project-item-card project-item-card-back">
            <div class="project-item-card-center">
                <?php the_title( '<h2 class="project-item-title">', '</h2>' ); ?>
                <div class="project-item-desc">
                    <p><?php echo esc_html($short_description); ?></p>
                </div>
                <div class="wrapp-btn-circl-arrow justify-content-center">
                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn-circl-arrow btn-circl-arrow-white">
                        <svg viewBox="0 0 13 9" width="13px" height="9px"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/img/sprite.svg#arrow-right"></use></svg>
                    </a>
                </div>
            </div>
        </div>
    </div><!-- End project item -->
</div>
<?php  ?>