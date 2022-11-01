<?php
/**
 * Comment layout
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Comments form.
add_filter( 'comment_form_default_fields', 'understrap_bootstrap_comment_form_fields' );

/**
 * Creates the comments form.
 *
 * @param string $fields Form fields.
 *
 * @return array
 */

if ( ! function_exists( 'understrap_bootstrap_comment_form_fields' ) ) {

	function understrap_bootstrap_comment_form_fields( $fields ) {
		$commenter = wp_get_current_commenter();
		$req       = get_option( 'require_name_email' );
		$aria_req  = ( $req ? " aria-required='true'" : '' );
		$html5     = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
		$consent  = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';
		$fields    = array(
			'author'  => '<div class="form-field comment-form-author"><label class="form-field-label" for="author">' . __( 'Name',
					'understrap' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			            '<input class="form-field-input" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . '></div>',
			'email'   => '<div class="form-field comment-form-email"><label class="form-field-label" for="email">' . __( 'Email',
					'understrap' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
			            '<input class="form-field-input" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . '></div>',
			'cookies' => '<div class="form-field checkbox form-check comment-form-cookies-consent"><input class="checkbox-input form-check-input" id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' /> ' .
			         '<label class="checkbox-label form-check-label" for="wp-comment-cookies-consent"><span class="checkbox-ico"><svg viewBox="0 0 512 512"><use xlink:href="' . esc_url( get_template_directory_uri() . '/assets/img/sprite.svg#check' ) . '"></use></svg></span>' . __( 'Save my name, email, and website in this browser for the next time I comment', 'understrap' ) . '</label></div>',
		);

		return $fields;
	}
} // endif function_exists( 'understrap_bootstrap_comment_form_fields' )

add_filter( 'comment_form_defaults', 'understrap_bootstrap_comment_form' );

/**
 * Builds the form.
 *
 * @param string $args Arguments for form's fields.
 *
 * @return mixed
 */

if ( ! function_exists( 'understrap_bootstrap_comment_form' ) ) {

	function understrap_bootstrap_comment_form( $args ) {
		$args['comment_field'] = '<div class="form-field comment-form-commentform-field">
	    <label class="form-field-label" for="comment">' . _x( 'Comment', 'noun', 'understrap' ) . ( ' <span class="required">*</span>' ) . '</label>
	    <textarea class="form-field-input" id="comment" name="comment" aria-required="true" cols="45" rows="6"></textarea>
	    </div>';
		$args['class_submit']  = 'btn btn-secondary'; // since WP 4.1.
		return $args;
	}
} // endif function_exists( 'understrap_bootstrap_comment_form' )
