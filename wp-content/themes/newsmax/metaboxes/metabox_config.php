<?php

//config files
$newsmax_ruby_template_directory = get_template_directory();

require_once $newsmax_ruby_template_directory . '/metaboxes/panels/post.php';
require_once $newsmax_ruby_template_directory . '/metaboxes/panels/post_ajax.php';
require_once $newsmax_ruby_template_directory . '/metaboxes/panels/post_forgery.php';
require_once $newsmax_ruby_template_directory . '/metaboxes/panels/gallery.php';
require_once $newsmax_ruby_template_directory . '/metaboxes/panels/video.php';
require_once $newsmax_ruby_template_directory . '/metaboxes/panels/audio.php';
require_once $newsmax_ruby_template_directory . '/metaboxes/panels/review.php';
require_once $newsmax_ruby_template_directory . '/metaboxes/panels/source.php';
require_once $newsmax_ruby_template_directory . '/metaboxes/panels/page.php';
require_once $newsmax_ruby_template_directory . '/metaboxes/panels/composer.php';
require_once $newsmax_ruby_template_directory . '/metaboxes/panels/sidebar.php';

/**-------------------------------------------------------------------------------------------------------------------------
 * @return array
 * add config
 */
if ( ! function_exists( 'newsmax_ruby_theme_meta_boxes_config' ) ) {
	function newsmax_ruby_theme_meta_boxes_config( $meta_boxes ) {

		if ( ! class_exists( 'RW_Meta_Box' ) ) {
			return false;
		}

		if ( ! isset( $meta_boxes ) ) {
			$meta_boxes = array();
		}

		$meta_boxes[] = newsmax_ruby_metabox_single_post_subtitle();
		$meta_boxes[] = newsmax_ruby_metabox_single_post_layout();
		$meta_boxes[] = newsmax_ruby_metabox_single_post_option();
		$meta_boxes[] = newsmax_ruby_metabox_single_post_ajax();
		$meta_boxes[] = newsmax_ruby_metabox_single_post_video();
		$meta_boxes[] = newsmax_ruby_metabox_single_post_audio();
		$meta_boxes[] = newsmax_ruby_metabox_single_post_gallery();
		$meta_boxes[] = newsmax_ruby_metabox_single_post_review();
		$meta_boxes[] = newsmax_ruby_metabox_single_post_source();
		if ( is_plugin_active( 'newsmax-core/newsmax-core.php' ) ) {
			$meta_boxes[] = newsmax_ruby_metabox_single_post_forgery();
		}
		$meta_boxes[] = newsmax_ruby_metabox_single_page_option();
		$meta_boxes[] = newsmax_ruby_metabox_sidebar();
		$meta_boxes[] = newsmax_ruby_metabox_composer();

		return $meta_boxes;
	}

	add_filter( 'rwmb_meta_boxes', 'newsmax_ruby_theme_meta_boxes_config' );

};


/**-------------------------------------------------------------------------------------------------------------------------
 * after post title priority
 */
if ( ! function_exists( 'newsmax_ruby_metabox_priority_top' ) ) {
	function newsmax_ruby_metabox_priority_top() {

		if ( ! is_admin() ) {
			return false;
		}

		global $post, $wp_meta_boxes;
		do_meta_boxes( get_current_screen(), 'top', $post );
		unset( $wp_meta_boxes[ get_post_type( $post ) ]['top'] );

		return false;
	}

	add_action( 'edit_form_after_title', 'newsmax_ruby_metabox_priority_top' );
}