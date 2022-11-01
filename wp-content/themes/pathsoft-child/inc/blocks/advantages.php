<?php $advantages = get_sub_field('advantages');

if($advantages['style'] != 'style3') {

get_template_part( 'inc/section/section', 'top' );
            
$i=1;
foreach ($advantages['list'] as $adv) { 
    set_query_var( 'adv', $adv );
    set_query_var( 'i', $i );

get_template_part( 'loop/loop', 'advantage' );
$i++; 
} 

get_template_part( 'inc/section/section', 'bottom' ); 

} else if($advantages['style'] == 'style3') {

$header = get_sub_field('header');
$background = get_sub_field('background');
$color = get_sub_field('color');
$block_option = get_sub_field('block_option');
$bg_color = $background['color'];
$bg_image = $background['image'];

$section_class = 'section';
if(($bg_color['style'] == 'default' || $bg_image) && $background['display']) {
    $section_class .= ' section-bg';
}
if($bg_image) {
    $section_class .= ' lazy';
}
if($bg_color['style'] == 'custom' && $background['display'] && $color['text'] == 'dark') {
    $section_class .= ' section-color-dark';
} else if($bg_color['style'] == 'custom' && $background['display'] && $color['background'] && $color['text'] == 'light') { 
    $section_class .= ' section-color-light';
} ?>

<?php if($block_option == 'page') { ?><div 
<?php } else { ?><section <?php } ?>
class="<?php echo esc_attr( $section_class ); ?>"
<?php if($bg_color['style'] == 'custom' && $background['display'] && $color['background']) { ?>
style="background-color: <?php echo esc_attr( $color['background'] ); ?>"
<?php } if($bg_image) {?> 
data-src="<?php echo esc_url( $bg_image ); ?>"
<?php } ?>>
	<div class="container">
		<div class="row items">
            <?php if($header['display']) { ?>
			<div class="col-12 item">
                <?php $title_class = 'wrapp-section-title'; 
                    if($header['position'] == 'center') {
                        $title_class .= ' section-title-center'; 
                    } else if($header['position'] == 'right') {
                        $title_class .= ' section-title-right'; 
                    }
                ?>
				<div class="<?php echo esc_attr( $title_class ); ?>">
                    <?php 
                    if($header['subtitle']) {
                        echo '<div class="section-subtitle">'.esc_html($header['subtitle']).'</div>'; 
                    }
                    $hTitle = 'h2';
                    if($block_option == 'page') {
                        $hTitle = 'h1';
                    }
                    ?>
                    <?php echo '<'.esc_html($hTitle).' class="section-title">'.esc_html($header['title']).'</'.esc_html($hTitle).'>'; ?>
				</div> 
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="items">
        <div class="section-row item">
            <div class="section-item section-item-md-wide">
                <div class="section-path section-path-left">
                    <div class="row items">
                        <?php 
                            $i=1;
                            foreach ($advantages['list'] as $adv) { 
                                set_query_var( 'adv', $adv );
                                set_query_var( 'i', $i );
                
                            get_template_part( 'loop/loop', 'advantage' );
                            $i++; 
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="section-item d-none d-lg-block">
				<picture class="section-right-picture lazy" data-srcset="<?php echo esc_url($advantages['image']); ?>" data-media="(min-width: 992px)" data-src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="></picture>
			</div>
        </div>
        <?php
        $button = get_sub_field('button');
        if($button['display'] && $button['button_repeat']) { ?>
        <div class="container">
            <div class="row items">
                <div class="col-12 item">
                    <div class="section-btns justify-content-center">
                        <?php foreach($button['button_repeat'] as $btn) { 
                            $btn_class = "btn btn-widht-ico btn-w240 ripple";
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
                            <svg class="btn-widht-ico-right" viewBox="0 0 13 9"><use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/img/sprite.svg#arrow-right"></use></svg>
                        </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>

<?php if($block_option == 'page') { ?></div>
<?php } else { ?></section><?php } ?>

<?php } ?>