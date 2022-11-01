<?php get_template_part( 'inc/section/section', 'top' );

$id_page = get_the_ID();

$blog = get_sub_field('blog'); 

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$posts = array(
    'post_type' => 'post',
    'order' => $blog['settings']['sort'],
    'posts_per_page' => $blog['settings']['number_posts'],
    'paged' => $paged,
);
$query = new WP_Query( $posts );
global $wp_query;
// Put default query object in a temp variable
$tmp_query = $wp_query;
// Now wipe it out completely
$wp_query = null;
// Re-populate the global with our custom query
$wp_query = $query;

if ( $query->have_posts() )  {  
while ( $query->have_posts() )  { $query->the_post(); 

    if($blog['style'] == 'style3') { ?>
    <div class="col-12 item"><div class="blog-list items">
    <?php } ?>
    
    <?php set_query_var( 'id_page', $id_page );
    get_template_part( 'loop-templates/content', get_post_format() ); ?>
    
    <?php if($blog['style'] == 'style3') { ?>
    </div></div>
    <?php } ?>

<?php } } else { ?>

    <?php get_template_part( 'loop-templates/content', 'none' ); ?>

<?php } ?>

<?php 
$block_option = get_sub_field('block_option');
if($block_option == 'page') {
    understrap_pagination(); 
}
wp_reset_postdata();

get_template_part( 'inc/section/section', 'bottom' ); ?>