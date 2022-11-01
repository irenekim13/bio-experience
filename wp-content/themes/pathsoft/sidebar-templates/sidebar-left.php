<?php
/**
 * The sidebar containing the main widget area
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'left-sidebar' ) ) {
	return;
}

// when both sidebars turned on reduce col size to 3 from 4.
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>

<?php if ( 'both' === $sidebar_pos ) : ?>
	<div class="col-lg-3 content-item" role="complementary">
		<div class="sidebar items">
<?php else : ?>
	<div class="col-lg-3 content-item" role="complementary">
		<div class="sidebar items">
<?php endif; ?>
<?php dynamic_sidebar( 'left-sidebar' ); ?>

</div></div>
