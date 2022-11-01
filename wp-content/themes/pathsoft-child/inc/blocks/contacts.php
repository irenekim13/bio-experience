<?php get_template_part( 'inc/section/section', 'top' ); ?>
            
<?php $contacts = get_sub_field('contacts'); 

if($contacts['style'] == 'style1') {
?>

<div class="col-xl-4 col-md-5 item">
    <div class="contact-info section-bg">
        <h3><?php echo esc_html($contacts['title']); ?></h3>
        <?php if($contacts['list']) { ?>
        <ul class="contact-list">
            <?php foreach ($contacts['list'] as $item) { ?>
            <li>
                <i class="material-icons md-22"><?php echo esc_html($item['icon']); ?></i>
                <div class="footer-contact-info">
                    <?php if($item['style'] == 'text') {
                        
                        foreach ($item['item']['text'] as $el) {

                            echo '<p>' . esc_html($el['item']) . '</p>'; 

                        }

                    } else if($item['style'] == 'email') {

                        foreach ($item['item']['email'] as $el) {

                            echo '<a href="' . esc_attr('mailto:' . $el['item']) . '">' . esc_html($el['item']) . '</a>'; 

                        }

                    } else if($item['style'] == 'phone') {

                        foreach ($item['item']['phone'] as $el) {

                            echo '<a class="formingHrefTel" href="#!">' . esc_html($el['item']) . '</a>'; 

                        }

                    } ?>
                </div>
            </li>
            <?php } ?>
        </ul>
        <?php } ?>
    </div>
</div>
<?php if($contacts['form']) { ?>
<div class="col-xl-8 col-md-7 item">
    <div class="contact-form-padding">
        <?php echo do_shortcode( $contacts['form'] ); ?>
    </div>
</div>

<?php } } else if($contacts['style'] == 'style2') { ?>

<?php if($contacts['list']) { 
        foreach ($contacts['list'] as $item) {
?>
<div class="col-md-4 col-12 item">
    <div class="contacts-info-item item-style">
        <div class="contacts-info-item-ico">
            <i class="material-icons md-60"><?php echo esc_html($item['icon']); ?></i>
        </div>
        <div class="contacts-info-item-content">
            <?php 
                if($item['style'] == 'text') {
                        
                    foreach ($item['item']['text'] as $el) {

                        echo '<p>' . esc_html($el['item']) . '</p>'; 

                    }

                } else if($item['style'] == 'email') {

                    foreach ($item['item']['email'] as $el) {

                        echo '<div><a href="' . esc_attr('mailto:' . $el['item']) . '">' . esc_html($el['item']) . '</a></div>'; 

                    }

                } else if($item['style'] == 'phone') {

                    foreach ($item['item']['phone'] as $el) {

                        echo '<div><a class="formingHrefTel" href="#!">' . esc_html($el['item']) . '</a></div>'; 

                    }

                } ?>
        </div>
    </div>
</div>
<?php } } ?>
<div class="col-12">
    <h3><?php echo esc_html($contacts['title']); ?></h3>
</div>
<?php if($contacts['form']) { ?>
<div class="col-lg-6 item">
    <?php echo do_shortcode( $contacts['form'] ); ?>
</div>
<?php } ?>
<div class="col-lg-6 item">
    <?php if($contacts['map_toggle'] == 'gmapi') {
    $str_style = str_replace(array(" ", "\r", "\n"), "", get_theme_mod( 'gm_style' ));
    $location = $contacts['map'];
    if( $location ) { ?>
    <div class="map map-auto acf-map"
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
    <div class="map map-auto">
        <?php echo $contacts['iframe_map']; ?>
    </div>
    <?php } ?>
</div>

<?php } ?>

<?php get_template_part( 'inc/section/section', 'bottom' ); ?>