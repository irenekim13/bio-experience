<?php get_template_part( 'inc/section/section', 'top' ); 

$faq = get_sub_field('faq'); 

if( have_rows('pricing') ) { 
while( have_rows('pricing') ) { the_row();
    $title = get_sub_field('title');
    $price = get_sub_field('price');
    $badge = get_sub_field('badge');
    $button = get_sub_field('button');    
?>

<div class="col-lg-4 col-md-6 col-12 item">
    <div class="pricing-item item-style">
        <?php if($badge) { ?>
        <div class="pricing-item-badge"><?php echo esc_html($badge); ?></div>
        <?php } ?>
        <header class="pricing-item-header">
            <div class="pricing-item-title"><?php echo esc_html($title); ?></div>
            <div class="pricing-item-price"><?php echo esc_html($price); ?></div>
        </header>
        <?php if( have_rows('list') ) { ?>
        <div class="pricing-item-content">
            <ul class="pricing-item-list">
                <?php while( have_rows('list') ) { the_row(); 
                    $label = get_sub_field('label');
                    $available = get_sub_field('available');
                    $class = '';
                    if($available) {
                        $class = 'active';
                    }
                ?>
                <li class="<?php echo esc_attr($class); ?>">
                    <i class="material-icons md-24">check</i>
                    <?php echo esc_html($label); ?>
                </li>
                <?php $class = ''; } ?>
            </ul>
        </div>
        <?php } ?>
        <?php if($button['display'] && $button['button_repeat']) { ?>
        <footer class="pricing-item-footer">
            <?php foreach($button['button_repeat'] as $btn) { 
                    $btn_class = "btn btn-widht-ico btn-wide ripple";
                    if($btn['size'] == 'small') {
                        $btn_class .= ' btn-small';
                    } else if($btn['size'] == 'large') {
                        $btn_class .= ' btn-large';
                    }
                    if($btn['style'] == 'border') {
                        $btn_class .= ' btn-border';
                }    
            ?>
            <a href="<?php echo esc_url($btn['link']) ?>" class="<?php echo esc_attr( $btn_class ); ?>">
                <span><?php echo esc_html($btn['name']) ?></span>
                <svg class="btn-widht-ico-right" viewBox="0 0 13 9">
                    <use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/sprite.svg#arrow-right' ); ?>"></use>
                </svg>
            </a>
            <?php } ?>
        </footer>
        <?php } ?>
    </div>
</div>

<?php } } get_template_part( 'inc/section/section', 'bottom' ); ?>