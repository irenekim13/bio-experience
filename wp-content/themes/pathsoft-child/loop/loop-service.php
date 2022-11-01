<?php

$services = get_sub_field('services');

$icon = get_field('icon');
$short_description = get_field('short_description');
$image = get_field('image');
$description = get_field('description');

if($services['style'] != 'style4') {

$serv_class = 'services-item item-style';
if($services['style'] == 'style2') {
    $serv_class .= ' services-item-modern';
} else if($services['style'] == 'style3') {
    $serv_class .= ' services-item-row';
}
?>
<div class="col-lg-4 col-md-6 col-12 item">
    <!-- Begin services item -->
    <a href="<?php echo esc_url( get_permalink() ); ?>" class="<?php echo esc_attr( $serv_class ); ?>">
        <div class="services-item-ico">
            <i class="material-icons material-icons-outlined md-48"><?php echo esc_html($icon); ?></i>
        </div>
        <div class="services-item-ico-bg">
            <i class="material-icons material-icons-outlined"><?php echo esc_html($icon); ?></i>
        </div>
        <?php if($services['style'] == 'style3') { ?>
        <div class="services-item-info">
        <?php } ?>
        <?php the_title( '<h2 class="services-item-title">', '</h2>' ); ?>
        <div class="services-item-desc"><?php echo esc_html($short_description); ?></div>
        <?php if($services['style'] == 'style3') { ?>
        </div>
        <?php } ?>
    </a><!-- End services item -->
</div>
<?php } else { ?>
<div class="col-lg-4 col-md-6 col-12 item">
    <!-- Begin services item -->
    <div class="services-image-item">
        <div class="services-image-item-card services-image-item-card-front img-style">
            <img data-src="<?php echo esc_url($image['sizes']['large']); ?>"
                class="lazy"
                src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                alt="<?php echo esc_url($image['alt']); ?>">
        </div>
        <div class="services-image-item-card services-image-item-card-back">
            <div class="services-image-item-card-center">
                <h5 class="services-image-item-title"><?php the_title(); ?></h5>
                <p class="services-image-item-desc"><?php echo esc_html($short_description); ?></p>
                <div class="wrapp-btn-circl-arrow justify-content-center">
                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn-circl-arrow btn-circl-arrow-white">
                        <svg viewBox="0 0 13 9" width="13px" height="9px"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/img/sprite.svg#arrow-right"></use></svg>
                    </a>
                </div>
            </div>
        </div>
    </div><!-- End services item -->
</div>
<?php } ?> 