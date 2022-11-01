<?php
/**
 * The template for displaying search forms
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<div class="form-field">
		<label class="form-field-label" for="s"><?php esc_html_e( 'Search', 'understrap' ); ?></label>
		<input class="form-field-input" id="s" name="s" type="text" autocomplete="off" value="<?php the_search_query(); ?>">
		<button name="submit" type="submit" id="searchsubmit" class="search-btn"><i class="material-icons md-22">search</i></button>
	</div>
</form>