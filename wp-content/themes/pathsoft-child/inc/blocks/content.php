<?php get_template_part( 'inc/section/section', 'top' ); ?>
            
<?php $file = get_sub_field('content'); ?>
<div class="col-12 item content">
    <?php if(has_post_thumbnail()) { ?>
    <div class="img-style">
        <img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>" alt="">
    </div>
    <?php } ?>
    <?php echo $file; ?>
</div>

<?php get_template_part( 'inc/section/section', 'bottom' ); ?>