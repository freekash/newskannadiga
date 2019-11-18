<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * newsmax_ruby_post_overlay_4 (small overlay)
 */
if ( ! function_exists( 'newsmax_ruby_post_overlay_4' ) ) {
	function newsmax_ruby_post_overlay_4( $options = array() ) {

		$review = newsmax_ruby_post_review_icon();

		$str = '';
		$str .= '<article class="post-wrap post-feat post-overlay post-overlay-4">';

		$str .= '<div class="post-thumb-outer">';
		if ( has_post_thumbnail() ) {
			$param               = array();
			$param['size']       = 'newsmax_ruby_crop_380x380';
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
		if ( empty( $review ) ) {
			$str .= newsmax_ruby_post_format( 'is-size-4 is-absolute' );
		}
		$str .= '<div class="post-header">';
		$str .= newsmax_ruby_post_title( 'is-size-4' );
		if ( ! empty( $options['meta_info'] ) ) {
			$str .= newsmax_ruby_post_meta_info( array( 'date' => true ) );
		}
		$str .= '</div><!--#post header-->';
		$str .= '</div>';
		$str .= '</div>';
		$str .= '</article>';

		return $str;
	}
}