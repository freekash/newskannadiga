<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param bool $param
 *
 * @return string
 * render single post featured layout 4
 */
if ( ! function_exists( 'newsmax_ruby_render_single_post_featured_layout_4' ) ) {
	function newsmax_ruby_render_single_post_featured_layout_4( $param ) {

		$sidebar_name     = newsmax_ruby_single_post_check_sidebar_name();
		$sidebar_position = newsmax_ruby_single_post_check_sidebar_position();
		$review           = newsmax_ruby_single_post_check_review();
		$header_position  = newsmax_ruby_single_post_check_header_position();
		$parallax         = newsmax_ruby_get_option( 'single_post_header_parallax' );
		$author_box       = newsmax_ruby_get_option( 'single_post_box_author' );
		$ajax_view        = newsmax_ruby_get_option( 'ajax_view' );

		//add view
		if ( empty( $ajax_view ) && function_exists( 'newsmax_ruby_post_view_add' ) ) {
			newsmax_ruby_post_view_add();
		}

		$class_name   = array();
		$class_name[] = 'single-post-wrap single-post-4 is-single-background is-single-' . esc_attr( $header_position );
		if ( ! empty( $parallax ) ) {
			$class_name[] = 'is-single-parallax';
		}
		$class_name = implode( ' ', $class_name );

		$str        = '';
		$str_header = '';

		$str .= newsmax_ruby_single_post_open( $class_name, $review, $ajax_view );

		$str .= '<div class="single-post-top">';
		$str .= '<div class="single-post-feat-bg-outer">';
		$str .= '<div class="single-post-feat-bg"></div>';
		$str .= newsmax_ruby_single_post_thumb_bg( $param );
		$str .= newsmax_ruby_post_mask_overlay_full();

		if ( 'left' == $header_position && ! empty( $param['video_popup'] ) ) {
			$str .= newsmax_ruby_single_post_popup_video();
		}

		$str .= '<div class="breadcrumb-overlay">';
		$str .= newsmax_ruby_dimox_breadcrumb( true );
		$str .= '</div>';

		$str .= '<div class="single-post-overlay-outer ruby-container">';
		$str .= '<div class="single-post-overlay-holder">';
		$str .= '<div class="single-post-overlay is-light-text">';
		$str .= newsmax_ruby_single_post_cat_info();
		$str .= newsmax_ruby_single_post_title( 'is-size-0' );
		$str .= newsmax_ruby_single_post_meta_info( $header_position );

		if ( 'center' == $header_position && ! empty( $param['video_popup'] ) ) {
			$str .= newsmax_ruby_single_post_popup_video( 'is-size-2 is-light-text is-relative' );
		}

		$str .= '</div>';
		$str .= '</div>';
		$str .= '</div>';
		$str .= '</div>';
		$str .= newsmax_ruby_feat_credit();
		$str .= '</div>';

		$str .= newsmax_ruby_page_open( 'single-wrap', $sidebar_position );
		$str .= newsmax_ruby_page_content_open( 'single-inner', $sidebar_position );

		$str_header .= newsmax_ruby_single_post_subtitle();
		$str_header .= newsmax_ruby_single_post_action();;
		if ( ! empty( $str_header ) ) {
			$str .= '<div class="single-post-header">';
			$str .= $str_header;
			$str .= '</div>';
		}

		$str .= newsmax_ruby_single_post_ad_top();

		$str .= '<div class="single-post-body">';
		$str .= newsmax_ruby_single_post_entry();
		$str .= newsmax_ruby_single_post_like();
		$str .= newsmax_ruby_single_post_share_bottom();
		if ( function_exists( 'newsmax_ruby_post_schema_markup' ) ) {
			$str .= newsmax_ruby_post_schema_markup();
		}
		$str .= '</div>';

		$str .= '<div class="single-post-box-outer">';
		$str .= newsmax_ruby_single_post_navigation();
		if ( ! empty( $author_box ) ) {
			$str .= newsmax_ruby_single_box_author();
		}
		$str .= newsmax_ruby_single_post_box_comment();
		$str .= newsmax_ruby_single_post_box_related();
		$str .= '</div>';

		$str .= newsmax_ruby_page_content_close();

		if ( 'none' != $sidebar_position ) {
			$str .= newsmax_ruby_page_sidebar( $sidebar_name, true );
		}

		$str .= newsmax_ruby_page_close();
		$str .= newsmax_ruby_single_post_box_recommended();
		$str .= newsmax_ruby_single_post_close();

		return $str;
	}
}
