<?php get_template_part( 'inc/section/section', 'top' );
            
$serv = get_sub_field('services');

$servises = array(
    'post_type' => 'service',
    'order' => $serv['settings']['sort'],
    'posts_per_page' => $serv['settings']['number_services']
);
$query = new WP_Query( $servises );
if ( $query->have_posts() )  { 
while ( $query->have_posts() )  { $query->the_post();

    get_template_part( 'loop/loop', 'service' );
              
} } else {

    get_template_part( 'loop-templates/content', 'none' );

} wp_reset_postdata();

get_template_part( 'inc/section/section', 'bottom' ); ?>