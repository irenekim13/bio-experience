<?php get_template_part( 'inc/section/section', 'top' );

$team = get_sub_field('team');
$team_item_class = 'team-item';
$team_item_img_class = 'team-item-img';
$team_item_social_class = 'team-item-social-links';

if($team['style'] == 'style1') {
    
    $team_item_class .= ' item-style';

} else if($team['style'] == 'style2') {
    
    $team_item_class .= ' team-item2';
    $team_item_img_class .= ' img-style';
    $team_item_social_class .= ' team-item-social-links-relative';

}

foreach ($team['list'] as $person) {
?>
<div class="col-lg-3 col-sm-6 col-12 item">
    <!-- Begin team item -->
    <div class="<?php echo esc_attr( $team_item_class ); ?>">
        <div class="<?php echo esc_attr( $team_item_img_class ); ?>">
            <img data-src="<?php echo esc_url( $person['info']['photo'] ); ?>"
                class="lazy"
                src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                alt="">
        </div>
        <div class="team-item-info">
            <h4 class="team-item-title item-title"><?php echo esc_html( $person['info']['full_name'] ); ?></h4>
            <div class="team-item-position"><?php echo esc_html( $person['info']['position'] ); ?></div>
            <?php if($person['social']) { ?>
            <ul class="<?php echo esc_attr( $team_item_social_class ); ?>">
                <?php foreach ($person['social'] as $social) {
                    $id = $social['select']['value'];
                ?>
                <li>
                    <a href="<?php echo esc_url( $social['link'] ); ?>" title="<?php echo esc_attr( $social['select']['label'] ); ?>">
                        <svg viewBox="<?php echo esc_attr( pathsoft_svg_viewBox($id) ); ?>"><use xlink:href="<?php echo esc_attr( get_template_directory_uri() . '/assets/img/sprite.svg#' . $id . '' ); ?>"></use></svg>
                    </a>
                </li>
                <?php } ?>
            </ul>
            <?php } ?>
        </div>
    </div><!-- End team item -->
</div>

<?php } get_template_part( 'inc/section/section', 'bottom' ); ?>