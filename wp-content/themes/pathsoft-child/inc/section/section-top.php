<?php
/**
 * Section top layout
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$header = get_sub_field('header');
$header2 = get_sub_field('header2');
$background = get_sub_field('background');
$color = get_sub_field('color');
$block_option = get_sub_field('block_option');
$bg_color = $background['color'];
$bg_image = $background['image'];

$container_class = 'container';

$proj = get_sub_field('projects');
if($proj && $proj['style'] == 'style2') {
    $container_class = 'container-fluid';
}

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
style="<?php echo esc_attr( 'background-color: ' . $color['background'] ); ?>"
<?php } if($bg_image && $background['display']) { ?> 
data-src="<?php echo esc_url( $bg_image ); ?>"
<?php } ?>>
	<div class="<?php echo esc_attr( $container_class ); ?>">
		<div class="row items">
            <?php if($header['display']) { ?>
			<div class="col-12">
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
                    $hTitle = 'h3';
                    if($block_option == 'page') {
                        $hTitle = 'h1';
                    }
                    ?>
                    <?php echo '<'.esc_html($hTitle).' class="section-title">'.esc_html($header['title']).'</'.esc_html($hTitle).'>'; ?>
                    <?php if($header2['desc']) { 
                        echo '<p class="section-desc">'.esc_html($header2['desc']).'</p>';
                    } ?>
				</div> 
            </div>
            <?php } ?>