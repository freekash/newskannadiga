<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param $options
 *
 * @return string
 * render post grid 1 (big grid)
 */
if ( ! function_exists( 'newsmax_ruby_post_grid_1' ) ) {
	function newsmax_ruby_post_grid_1( $options = array() ) {

		$review      = newsmax_ruby_post_review_icon( 'is-size-2 is-absolute' );
		$post_format = newsmax_ruby_check_post_format();


		$class_name   = array();
		$class_name[] = 'post-wrap post-grid post-grid-1';
		if ( 'video' == $post_format && ! empty( $enable_popup ) ) {
			$class_name[] = 'post-popup-video';
		}
		$class_name = implode( ' ', $class_name );

		$str = '';
		$str .= '<article class="' . esc_attr( $class_name ) . '">';
		$str .= '<div class="post-header">';

		if ( has_post_thumbnail() ) {

			$smooth_style = newsmax_ruby_post_check_smooth_display_style();
			if ( empty( $smooth_style ) ) {
				$str .= '<div class="post-thumb-outer">';
			} else {
				$str .= '<div class="post-thumb-outer ruby-animated-image ' . esc_attr( $smooth_style ) . '">';
			}

			$param                = array();
			$param['size']        = 'newsmax_ruby_crop_540x300';
			$param['size_mobile'] = 'newsmax_ruby_crop_364x225';
			$str .= newsmax_ruby_post_thumb( $param );

			if ( ! empty( $options['cat_info'] ) ) {
				$str .= newsmax_ruby_post_mask_overlay();
				$str .= newsmax_ruby_post_cat_info( 'is-absolute is-light-text' );
			}
			if ( ! empty( $options['share'] ) ) {
				$str .= newsmax_ruby_post_meta_info_share();
			}
			if ( ! empty( $review ) ) {
				$str .= $review;
			} else {
				$str .= newsmax_ruby_post_meta_info_media_duration();
			}
			$str .= newsmax_ruby_post_format( 'is-size-2 is-absolute' );
			$str .= '</div>';
		}
		$str .= '</div>';

		$str .= '<div class="post-body">';
		$str .= newsmax_ruby_post_title( 'is-size-2' );
		if ( ! empty( $options['meta_info'] ) ) {
			$str .= newsmax_ruby_post_meta_info();
		}
		if ( ! empty( $options['excerpt'] ) ) {
			$str .= newsmax_ruby_post_excerpt( $options['excerpt'] );
		}

		$str .= newsmax_ruby_post_readmore();
		$str .= '</div>';

		$str .= '</article>';

		return $str;
	}
}
