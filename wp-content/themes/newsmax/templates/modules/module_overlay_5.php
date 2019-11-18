<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * newsmax_ruby_post_overlay_5 (overlay medium)
 */
if ( ! function_exists( 'newsmax_ruby_post_overlay_5' ) ) {
	function newsmax_ruby_post_overlay_5( $options = array() ) {

		$review = newsmax_ruby_post_review_icon( 'is-size-2 is-absolute' );

		$str = '';
		$str .= '<article class="post-wrap post-feat post-overlay post-overlay-5">';

		$str .= '<div class="post-thumb-outer">';
		if ( has_post_thumbnail() ) {

			$param               = array();
			$param['size']       = 'newsmax_ruby_crop_548x450';
			$param['class_name'] = 'is-bg-thumb';

			if ( empty( $options['smooth_style_disable'] ) ) {
				$param['smooth_style'] = newsmax_ruby_post_check_smooth_display_style();
			}

			$str .= newsmax_ruby_post_mask_overlay();
			$str .= newsmax_ruby_post_thumb( $param );
			if ( ! empty( $review ) ) {
				$str .= $review;
			}
		} else {
			$str .= newsmax_ruby_post_no_thumbnail();
		}
		$str .= '</div>';

		$str .= '<div class="is-header-overlay is-absolute is-light-text">';
		$str .= '<div class="post-header-outer">';
		if ( ! empty( $options['share'] ) ) {
			$str .= newsmax_ruby_post_meta_info_share();
		}

		if ( empty( $review ) ) {
			$str .= newsmax_ruby_post_format( 'is-size-2 is-absolute', true );
		}

		$str .= '<div class="post-header">';
		if ( ! empty( $options['cat_info'] ) ) {
			$str .= newsmax_ruby_post_cat_info();
		}
		$str .= newsmax_ruby_post_title( 'is-size-2' );
		if ( ! empty( $options['meta_info'] ) ) {
			$str .= newsmax_ruby_post_meta_info();
		}
		$str .= '</div><!--#post header-->';
		$str .= '</div>';
		$str .= '</div>';
		$str .= '</article>';

		return $str;
	}
}