<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param bool $video_popup
 *
 * @return string
 * render single post featured layout 3
 */
if ( ! function_exists( 'newsmax_ruby_render_single_post_featured_layout_3' ) ) {
	function newsmax_ruby_render_single_post_featured_layout_3( $param = array() ) {

		$sidebar_name     = newsmax_ruby_single_post_check_sidebar_name();
		$sidebar_position = newsmax_ruby_single_post_check_sidebar_position();
		$review           = newsmax_ruby_single_post_check_review();
		$header_position  = newsmax_ruby_single_post_check_header_position();
		$class_name       = 'single-post-wrap single-post-3 is-single-' . esc_attr( $header_position );
		$author_box       = newsmax_ruby_get_option( 'single_post_box_author' );
		$ajax_view        = newsmax_ruby_get_option( 'ajax_view' );

		//add view
		if ( empty( $ajax_view ) && function_exists( 'newsmax_ruby_post_view_add' ) ) {
			newsmax_ruby_post_view_add();
		}

		$str        = '';
		$str_header = '';
		//render
		$str .= newsmax_ruby_single_post_open( $class_name, $review, $ajax_view );
		$str .= newsmax_ruby_page_open( 'single-wrap', $sidebar_position );

		//render breadcrumb
		$str .= newsmax_ruby_dimox_breadcrumb( true );

		$str .= '<div class="single-post-top">';
		$str .= '<div class="single-post-thumb-outer post-thumb-outer">';
		$str .= newsmax_ruby_single_post_thumb_overlay( $param );

		//mask
		if ( 'center' == $header_position ) {
			$str .= newsmax_ruby_post_mask_overlay_full();
		} else {

			$str .= newsmax_ruby_post_mask_overlay();

			//render popup video
			if ( ! empty( $param['video_popup'] ) ) {
				$str .= newsmax_ruby_single_post_popup_video();
			}
		}
		$str .= '<div class="single-post-overlay-outer">';
		$str .= '<div class="single-post-overlay-holder">';
		$str .= '<div class="single-post-overlay is-light-text">';
		$str .= newsmax_ruby_single_post_cat_info();
		$str .= newsmax_ruby_single_post_title( 'is-size-0' );
		$str .= newsmax_ruby_single_post_meta_info( $header_position );
		$str .= newsmax_ruby_feat_credit();

		//render popup video
		if ( 'center' == $header_position && ! empty( $param['video_popup'] ) ) {
			$str .= newsmax_ruby_single_post_popup_video( 'is-size-2 is-light-text is-relative' );
		}

		$str .= '</div>';
		$str .= '</div>';
		$str .= '</div>';
		$str .= '</div>';
		$str .= '</div><!--#single-post-top-->';

		$str .= newsmax_ruby_page_content_open( 'single-inner', $sidebar_position );

		//render single header
		$str_header .= newsmax_ruby_single_post_subtitle();
		$str_header .= newsmax_ruby_single_post_action();;
		if ( ! empty( $str_header ) ) {
			$str .= '<div class="single-post-header">';
			$str .= $str_header;
			$str .= '</div>';
		}

		//single top advertising
		$str .= newsmax_ruby_single_post_ad_top();

		//body
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

		//render sidebar
		if ( 'none' != $sidebar_position ) {
			$str .= newsmax_ruby_page_sidebar( $sidebar_name, true );
		}

		$str .= newsmax_ruby_page_close();
		$str .= newsmax_ruby_single_post_box_recommended();
		$str .= newsmax_ruby_single_post_close();

		return $str;
	}
}
