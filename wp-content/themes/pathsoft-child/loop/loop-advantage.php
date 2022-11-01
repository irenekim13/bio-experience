<?php

$advantages = get_sub_field('advantages');

if($advantages['style'] != 'style3') {

$adv_class = 'advantages-item';
$adv_title_class = 'advantages-item-count';
if($advantages['style'] == 'style2') {
    $adv_class .= ' advantages-item-bg';
    $adv_title_class = 'advantages-item-count-large';
}
$count = 1;
if($i < 10) {
    $count = '0'.$i;
}
?>
<div class="col-lg-4 col-md-6 col-12 item">
    <!-- Begin choose us item -->
    <div class="<?php echo esc_attr( $adv_class ); ?>">
        <div class="<?php echo esc_attr( $adv_title_class ); ?>"><?php echo esc_html( $count ); ?></div>
        <div class="advantages-item-info">
            <h4 class="advantages-item-title"><?php echo esc_html( $adv['title'] ); ?></h4>
            <div class="advantages-item-desc">
                <p><?php echo esc_html( $adv['description'] ); ?></p>
            </div>
        </div>
    </div><!-- End choose us item -->
</div>
<?php } else if($advantages['style'] == 'style3') { 
$count = 1;
if($i < 10) {
    $count = '0'.$i.'.';
} else {
    $count = $i.'.';
}    
?>
<div class="col-lg-6 col-md-4 col-sm-6 col-12 item">
    <!-- Begin choose us item -->
    <div class="advantages-item advantages-item-min">
        <div class="advantages-item-info">
            <div class="advantages-item-min-header">
                <div class="advantages-item-count-min"><?php echo esc_html( $count ); ?></div>
                <h4 class="advantages-item-title"><?php echo esc_html( $adv['title'] ); ?></h4>
            </div>
            <div class="advantages-item-desc">
                <p><?php echo esc_html( $adv['description'] ); ?></p>
            </div>
        </div>
    </div><!-- End choose us item -->
</div>
<?php } ?>