<?php get_template_part( 'inc/section/section', 'top' );
            
$form = get_sub_field('form'); 

if($form) { ?>

<div class="col-12 item">
    <?php echo do_shortcode( $form ); ?>
</div>

<?php } get_template_part( 'inc/section/section', 'bottom' ); ?>