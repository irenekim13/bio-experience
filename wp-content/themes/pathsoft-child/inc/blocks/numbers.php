<?php get_template_part( 'inc/section/section', 'top' );
            
$numbers = get_sub_field('numbers'); 

if($numbers['style'] == 'style1') {
?>
<div class="col-12 item">
    <div class="row spincrement-container">
        <div class="col-xl-5 offset-xl-2 col-lg-6 offset-lg-1 col-12">
            <?php $i=1; foreach ($numbers['list'] as $numb) { 
                if($i == 1) {    
            ?>
            <div class="main-counter">
                <div class="main-counter-item">
                    <div class="main-counter-item-center">
                        <div>
                            <div class="main-counter-numb spincrement" data-from="0" data-to="<?php echo esc_attr( $numb['number'] ); ?>">0</div>
                            <div class="main-counter-title"><?php echo esc_html( $numb['title'] ); ?></div>
                        </div>
                    </div>
                    <div class="main-counter-item-circ"></div>
                </div>
            </div>
            <?php } $i++; } ?>
        </div>
        <div class="col-xl-4 offset-xl-1 col-lg-3 offset-lg-1 col-12 counter-items items">
            <?php $i=1; foreach ($numbers['list'] as $numb) { 
                if($i > 1) {    
            ?>
            <div class="counter-item item">
                <div class="counter-item-numb">
                    <span class="spincrement" data-from="0" data-to="<?php echo esc_attr( $numb['number'] ); ?>">0</span>
                </div>
                <h4 class="counter-item-title"><?php echo esc_html( $numb['title'] ); ?></h4>
            </div>
            <?php } $i++; } ?>
        </div>
    </div>
</div>
<?php } else { ?>

<div class="col-12 item">

    <div class="row items spincrement-container">
        <?php foreach ($numbers['list'] as $numb) { ?>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12 item">
            <?php if($numbers['style'] == 'style2') { ?>
            <div class="counter-col item-style">
                <div class="counter-col-ico">
                    <i class="material-icons material-icons-outlined md-36"><?php echo esc_html( $numb['icon'] ); ?></i>
                </div>
                <div class="counter-col-numb spincrement" data-from="0" data-to="<?php echo esc_attr( $numb['number'] ); ?>">0</div>
                <h4 class="counter-col-title"><?php echo esc_html( $numb['title'] ); ?></h4>
            </div>
            <?php } else if($numbers['style'] == 'style3') { ?>
            <div class="counter-min">
                <div class="counter-min-block">
                    <div class="counter-min-ico">
                        <i class="material-icons material-icons-outlined md-36"><?php echo esc_html( $numb['icon'] ); ?></i>
                    </div>
                    <div class="counter-min-numb spincrement" data-from="0" data-to="<?php echo esc_attr( $numb['number'] ); ?>">0</div>
                </div>
                <div class="counter-min-info">
                    <h4 class="counter-min-title"><?php echo esc_html( $numb['title'] ); ?></h4>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>

</div>

<?php } ?>

<?php get_template_part( 'inc/section/section', 'bottom' ); ?>