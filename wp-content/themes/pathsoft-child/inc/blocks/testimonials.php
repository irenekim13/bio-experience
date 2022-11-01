<?php get_template_part( 'inc/section/section', 'top' );
            
$testimonials = get_sub_field('testimonials'); 

$reviews_col_class = 'col-lg-4 col-md-6 col-12 item';
$reviews_item_class = 'reviews-item item-style';

if($testimonials['style'] == 'style2' || $testimonials['style'] == 'style5' || $testimonials['style'] == 'style6') {
    $reviews_item_class .= ' reviews-item-vertical';
}
if($testimonials['style'] == 'style3') {
    $reviews_col_class = 'col-12 item';
}
if($testimonials['style'] == 'style4' || $testimonials['style'] == 'style5' || $testimonials['style'] == 'style6') {
    $reviews_col_class = 'reviews-col';
} 

if($testimonials['style'] == 'style4' || $testimonials['style'] == 'style5' || $testimonials['style'] == 'style6') { ?>
<div class="col-12 item">
<?php } if($testimonials['style'] == 'style4') { ?>
<div class="reviews-carusel" data-flickity='{ "imagesLoaded": true, "lazyLoad": true, "groupCells": true, "contain": true, "prevNextButtons": false }'>
<?php } if($testimonials['style'] == 'style5') { ?>
<div class="reviews-carusel reviews-carusel-wide" data-flickity='{ "imagesLoaded": true, "lazyLoad": true, "fade": true, "adaptiveHeight": true, "groupCells": true, "contain": true, "prevNextButtons": false }'>
<?php } if($testimonials['style'] == 'style6') { ?>
<div class="reviews-carusel reviews-carusel-wide reviews-carusel-th">
<?php } ?>

<?php foreach ($testimonials['list'] as $term) { ?>
<div class="<?php echo esc_attr( $reviews_col_class ); ?>">
    <div class="<?php echo esc_attr( $reviews_item_class ); ?>">
        <div class="reviews-item-header">
            <?php if($testimonials['style'] != 'style6') { ?>
            <div class="reviews-item-img">
                <?php if($testimonials['style'] == 'style4' || $testimonials['style'] == 'style5') { ?>
                <img data-flickity-lazyload="<?php echo esc_url( $term['info']['photo'] ); ?>"
                    src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                    alt="">
                <?php } else { ?>
                <img data-src="<?php echo esc_url( $term['info']['photo'] ); ?>"
                    class="lazy"
                    src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                    alt="">
                <?php } ?>
            </div>
            <?php } if($testimonials['style'] == 'style6') { ?>
            <div class="reviews-item-text">
                <p><?php echo esc_html( $term['description'] ); ?></p>
            </div>
            <?php } ?>
            <div class="reviews-item-info">
                <h4 class="reviews-item-title item-title"><?php echo esc_html( $term['info']['full_name'] ); ?></h4>
                <div class="reviews-item-position"><?php echo esc_html( $term['info']['position'] ); ?></div>
            </div>
        </div>
        <?php if($testimonials['style'] != 'style6') { ?>
        <div class="reviews-item-text">
            <p><?php echo esc_html( $term['description'] ); ?></p>
        </div>
        <?php } ?>
    </div>
</div>
<?php } ?>

<?php if($testimonials['style'] == 'style4' || $testimonials['style'] == 'style5' || $testimonials['style'] == 'style6') { ?>
</div>
<?php if($testimonials['style'] == 'style6') { ?>
<div class="reviews-thumb">
    <?php $i=1; foreach ($testimonials['list'] as $term) { 
        $class = 'reviews-thumb-item active';
        if($i != 1) {
            $class = 'reviews-thumb-item';
        }
    ?>
    <div class="<?php echo esc_attr( $class ); ?>">
        <div class="reviews-item-img">
            <img data-src="<?php echo esc_url( $term['info']['photo'] ); ?>"
                class="lazy"
                src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                alt="">
        </div>
    </div>
    <?php $i++; } ?>
</div>
<?php } ?>
</div>
<?php } ?>

<?php get_template_part( 'inc/section/section', 'bottom' ); ?>