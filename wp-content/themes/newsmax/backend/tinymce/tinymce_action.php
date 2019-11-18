<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * add shortcode to tinymce
 */

if ( ! class_exists( 'newsmax_ruby_shortcode' ) ) {
	return;
}

if ( ! function_exists( 'newsmax_ruby_add_tinymce' ) ) {

	function newsmax_ruby_add_tinymce() {

		if ( ! class_exists( 'newsmax_ruby_shortcode' ) ) {
			return false;
		}

		global $typenow;

		if ( 'post' != $typenow && 'page' != $typenow ) {
			return false;
		}

		add_filter( 'mce_buttons', 'newsmax_ruby_tinymce_add_button' );
		add_filter( 'mce_external_plugins', 'newsmax_ruby_tinymce_plugin' );

		return false;

	}

	add_action( 'admin_head', 'newsmax_ruby_add_tinymce' );
}


if ( ! function_exists( 'newsmax_ruby_tinymce_plugin' ) ) {
	function newsmax_ruby_tinymce_plugin( $plugin_array ) {

		$plugin_array['newsmax_ruby_shortcode'] = get_template_directory_uri() . '/backend/tinymce/tinymce_script.js';

		return $plugin_array;
	}
}


if ( ! function_exists( 'newsmax_ruby_tinymce_add_button' ) ) {
	function newsmax_ruby_tinymce_add_button( $buttons ) {
		array_push( $buttons, 'newsmax_ruby_button_key' );

		return $buttons;
	}
}