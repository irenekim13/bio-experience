<?php 

$style = get_sub_field('style');
$settings = get_sub_field('settings');
$fade = 'false';
$arrows = 'false';
$dots = 'false';

if($settings['effect'] == "fade") {
    $fade = 'true';
}
if($settings['dots']) {
    $dots = 'true';
}

$intro_slider_class = 'intro-slider flickity-dots-absolute';

if($settings['dots_color'] == "light") {
    $intro_slider_class .= ' flickity-dots-white';
}

$obj = '{ "bgLazyLoad": 1, 
        "bgLazyLoad": true, 
        "fade": ' . esc_html( $fade ) . ', 
        "prevNextButtons": false, 
        "autoPlay": ' . esc_html( $settings['autoplay'] ) . ',
        "pageDots": ' . esc_html( $dots ) . ',
        "pauseAutoPlayOnHover": false }';

$content_class = 'intro-content';

if($style === 'style2' || $style === 'style3') {
    $content_class = 'intro-box';
}

$intro_class = 'intro';
if($style !== 'style3') {
    $intro_class .= ' section-bg';
}

if( have_rows('slider') ) { ?>
<div class="<?php echo esc_attr( $intro_class ); ?>">
    <div class="<?php echo esc_attr( $intro_slider_class ); ?>"
        data-flickity='<?php echo esc_attr( $obj ); ?>'>
        <?php $i=1; while( have_rows('slider') ) { the_row();
                        
            $info = get_sub_field('info');
            $title = $info['title'];
            $description = $info['description'];
            $button = get_sub_field('button');
            $background = get_sub_field('background');

        ?>
        <div class="intro-slider-item intro-item-mob-dark" <?php if($style !== 'style3') { ?>data-flickity-bg-lazyload="<?php echo esc_url( $background ); ?>"<?php } ?>>
            <?php if($style === 'style3') { ?>
            <div class="intro-item-img-right" data-flickity-bg-lazyload="<?php echo esc_url( $background ); ?>"></div>
            <?php } ?>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="<?php echo esc_attr( $content_class ); ?>">
                            <?php 
                                if($i == 1) {
                                    echo '<h1 class="intro-title">'.esc_html($title).'</h1>';
                                } else {
                                    echo '<h2 class="intro-title">'.esc_html($title).'</h2>';
                                } if($description) {
                                    echo '<div class="intro-desc"><p>'.esc_html($description).'</p></div>';
                                }
                                if($button['display'] && $button['button_repeat']) {
                            ?>
                            <div class="intro-btns">
                            <?php foreach($button['button_repeat'] as $btn) { 
                                $btn_class = "btn btn-widht-ico ripple";
                                if($btn['size'] == 'small') {
                                    $btn_class .= ' btn-small';
                                } else if($btn['size'] == 'large') {
                                    $btn_class .= ' btn-large';
                                }
                                if($btn['style'] == 'border') {
                                    $btn_class .= ' btn-border';
                                }
                                $link = $btn['link'];
                            ?>
                            <a href="<?php echo esc_url( $link['url'] ); ?>" class="<?php echo esc_attr( $btn_class ); ?>" target="<?php echo esc_attr( $link['target'] ? $link['target'] : '_self' ); ?>">
                                <span><?php echo esc_html( $link['title'] ); ?></span>
                                <svg class="btn-widht-ico-right" viewBox="0 0 13 9"><use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/sprite.svg#arrow-right' ); ?>"></use></svg>
                            </a>
                            <?php } ?>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $i++; } ?>
    </div>
</div>
<?php } ?>