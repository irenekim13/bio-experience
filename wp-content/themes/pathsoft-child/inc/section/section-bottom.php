<?php
/**
 * Section bottom layout
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$button = get_sub_field('button');
$block_option = get_sub_field('block_option');

            
            if($button['display'] && $button['button_repeat']) { ?>
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
                        $link = $btn['link'];
                    ?>
                    <a href="<?php echo esc_url( $link['url'] ); ?>" class="<?php echo esc_attr( $btn_class ); ?>" target="<?php echo esc_attr( $link['target'] ? $link['target'] : '_self' ); ?>">
                        <span><?php echo esc_html( $link['title'] ); ?></span>
                        <svg class="btn-widht-ico-right" viewBox="0 0 13 9"><use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/sprite.svg#arrow-right' ); ?>"></use></svg>
                    </a>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
<?php if($block_option == 'page') { ?></div>
<?php } else { ?></section><?php } ?>

<?php $contacts = get_sub_field('contacts'); 
if($contacts && $contacts['style'] == 'style1') {
if($contacts['map_toggle'] == 'gmapi') {
$str_style = str_replace(array(" ", "\r", "\n"), "", get_theme_mod( 'gm_style' ));
$location = $contacts['map'];
if( $location ) { ?>
<div class="map acf-map"
    data-zoom="<?php echo esc_attr( get_theme_mod( 'gm_zoom' , 15 ) ); ?>"
    data-marker="<?php echo esc_url( get_theme_mod( 'gm_image' ) ); ?>" 
    data-marker-width="<?php echo esc_attr( get_theme_mod( 'gm_image_width', 47 ) ); ?>" 
    data-marker-height="<?php echo esc_attr( get_theme_mod( 'gm_image_height', 71 ) ); ?>"
    data-style="<?php echo esc_attr( $str_style ); ?>">
    <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>">
        <?php echo esc_attr($location['address']); ?>
    </div>     
</div>
<?php $google_api_key = get_theme_mod( 'gm_key' );
if($google_api_key) { ?>
<script src="<?php echo esc_url('https://maps.googleapis.com/maps/api/js?key=' . $google_api_key); ?>"></script>
<?php } } } else if($contacts['map_toggle'] == 'iframe') { ?>
<div class="map">
    <?php echo $contacts['iframe_map']; ?>
</div>
<?php } } ?>