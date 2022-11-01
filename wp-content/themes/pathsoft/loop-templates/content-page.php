<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$id_page = get_the_ID();

if ( ( get_page_template_slug( $id_page ) == 'page-templates/right-sidebarpage.php' && is_active_sidebar( 'right-sidebar' ) ) || get_page_template_slug( $id_page ) == 'page-templates/left-sidebarpage.php' && is_active_sidebar( 'left-sidebar' ) ) { ?>

<div class="page-blocks">
    <?php get_template_part('inc/blocks'); ?>
</div>

<?php } else {

    get_template_part('inc/blocks');

} ?>

