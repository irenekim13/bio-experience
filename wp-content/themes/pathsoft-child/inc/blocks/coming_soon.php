<?php get_template_part( 'inc/section/section', 'top' );
            
$coming_soon = get_sub_field('coming_soon'); ?>

<div class="col-12 item">
    <div class="wrapp-countdown">
        <div id="countdown" class="countdown" data-dedline="<?php echo esc_attr($coming_soon['dedline']['date']); ?>">
            <div class="countdown-number item-style">
                <span class="days countdown-time">00</span>
                <span class="countdown-text"><?php echo esc_html($coming_soon['text']['days']); ?></span>
            </div>
            <div class="countdown-number item-style">
                <span class="hours countdown-time">00</span>
                <span class="countdown-text"><?php echo esc_html($coming_soon['text']['hours']); ?></span>
            </div>
            <div class="countdown-number item-style">
                <span class="minutes countdown-time">00</span>
                <span class="countdown-text"><?php echo esc_html($coming_soon['text']['minutes']); ?></span>
            </div>
            <div class="countdown-number item-style">
                <span class="seconds countdown-time">00</span>
                <span class="countdown-text"><?php echo esc_html($coming_soon['text']['seconds']); ?></span>
            </div>
        </div>
        <div id="deadline-message" class="deadline-message">
            <?php echo esc_html($coming_soon['dedline']['message']); ?>
        </div>
    </div>
    <?php if($coming_soon['form']) { ?>
    <div class="form-center">
        <div class="comming-soon-form">
            <?php echo do_shortcode( esc_attr($coming_soon['form']) ); ?>
        </div>
    </div>
    <?php } ?>
</div>

<?php get_template_part( 'inc/section/section', 'bottom' ); ?>