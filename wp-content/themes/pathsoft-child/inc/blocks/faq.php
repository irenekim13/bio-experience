<?php get_template_part( 'inc/section/section', 'top' );

$faq = get_sub_field('faq'); 

if($faq['list']) {
?>
<div class="col-12 item">
    <div class="accordion">
        <div class="row gutters-default">
            <div class="col-lg-6 col-12">
                <ul class="accordion-list">
                    <?php $i=1; foreach ($faq['list'] as $f) { 
                        if($i % 2) {
                    ?>
                    <li class="accordion-item section-bg">
                        <div class="accordion-trigger"><?php echo esc_html( $f['question'] ); ?></div>
                        <div class="accordion-content content"><?php echo $f['content']; ?></div>
                    </li>
                    <?php } $i++; } ?>
                </ul>
            </div>
            <div class="col-lg-6 col-12">
                <ul class="accordion-list">
                    <?php $i=0; foreach ($faq['list'] as $f) { 
                        if($i % 2) {
                    ?>
                    <li class="accordion-item section-bg">
                        <div class="accordion-trigger"><?php echo esc_html( $f['question'] ); ?></div>
                        <div class="accordion-content content"><?php echo $f['content']; ?></div>
                    </li>
                    <?php } $i++; } ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php } get_template_part( 'inc/section/section', 'bottom' ); ?>