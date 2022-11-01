<?php get_template_part( 'inc/section/section', 'top' );
            
$gallery = get_sub_field('gallery'); 

$gallery_class = "row gallery-container";
$gallery_id = "gallery-container";
$gallery_col_class = "col-sm-6 col-12 gallery-col";
$gallery_item_class = "gallery-item";

if($gallery['style'] == 'style1') {

    $gallery_class .= ' items';
    $gallery_col_class .= ' col-lg-4 item';
    $gallery_item_class .= ' img-style';
    
} else if($gallery['style'] == 'style2') {

    $gallery_class .= ' no-gutters';
    $gallery_col_class .= ' col-lg-4';

} else if($gallery['style'] == 'style3') {

    $gallery_class .= ' gallery-grid items';
    $gallery_id = 'gallery-masonry-container';
    $gallery_col_class .= ' gallery-grid-item item';
    $gallery_item_class .= ' img-style';
    
}

if($gallery['list']) {
?>
<div class="col-12 item">
    <div class="<?php echo esc_attr($gallery_class); ?>" id="<?php echo esc_attr($gallery_id); ?>">
        <?php if($gallery['style'] == 'style3') { ?>
        <div class="col-lg-4 col-sm-6 col-12 gallery-col-sizer"></div>
        <?php } foreach( $gallery['list'] as $image ) { $gallery_col_h2_class = ''; $gallery_col_w2_class = '';
            if($image['caption'] == 'height2' && $gallery['style'] == 'style3') {
                $gallery_col_h2_class = ' gallery-grid-item-height2';
            }
            if($image['caption'] == 'width2' && $gallery['style'] == 'style3') {
                $gallery_col_w2_class .= ' col-lg-8';
            } else {
                $gallery_col_w2_class .= ' col-lg-4';
            }
        ?>
		<div class="<?php echo esc_attr($gallery_col_class . $gallery_col_w2_class . $gallery_col_h2_class); ?>" data-src="<?php echo esc_url($image['url']); ?>">
			<a href="<?php echo esc_url($image['url']); ?>" class="<?php echo esc_attr($gallery_item_class); ?>">
                <img data-src="<?php echo esc_url($image['sizes']['large']); ?>" class="lazy" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="<?php echo esc_attr($image['alt']); ?>">
                <?php if($image['alt']) { ?>
                <div class="gallery-item-caption"><span><?php echo esc_html($image['alt']); ?></span></div>
                <?php } ?>
			</a>
        </div>
        <?php $gallery_col_h2_class = ''; $gallery_col_w2_class = ''; } ?>
	</div>
</div>
<?php } ?>

<?php get_template_part( 'inc/section/section', 'bottom' ); ?>