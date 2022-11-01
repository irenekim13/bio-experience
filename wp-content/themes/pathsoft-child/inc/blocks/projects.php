<?php get_template_part( 'inc/section/section', 'top' ); 

$proj = get_sub_field('projects');

$projects = array(
    'post_type' => 'project',
    'order' => $proj['settings']['sort'],
    'posts_per_page' => $proj['settings']['number_projects']
);
$query = new WP_Query( $projects );

?>

<div class="col-12 item">
    <?php if($proj['style'] == 'style1') {
        $catMain = get_category_by_slug('projects');
        $args = array( 'parent' => $catMain->cat_ID );
        $categories = get_categories( $args );
    ?>
    <div class="section-nav">
        <ul class="section-nav-list project-nav-list">
            <li class="active" data-filter="*">All</li>
            <?php foreach($categories as $cat ) { ?>
            <li data-filter="<?php echo esc_attr( '.project-'.$cat->slug ); ?>">
                <?php echo esc_html( $cat->name ); ?>
            </li>
            <?php } ?>
        </ul>
    </div>
    <?php } if($proj['style'] == 'style2') { ?>
    <div class="project-carusel" data-flickity='{ "imagesLoaded": true, "pageDots": false, "lazyLoad": true, "lazyLoad": 10, "groupCells": true, "contain": true, "contain": true, "prevNextButtons": true }'>
    <?php } else { ?>
    <div class="row items" id="projects-container">
    <?php } ?>
        <?php if ( $query->have_posts() )  {  
            while ( $query->have_posts() )  { $query->the_post();

            get_template_part( 'loop/loop', 'project' );

        } } else {

            get_template_part( 'loop-templates/content', 'none' );
        
        } wp_reset_postdata(); ?>
    </div>

</div>

<?php get_template_part( 'inc/section/section', 'bottom' ); ?>