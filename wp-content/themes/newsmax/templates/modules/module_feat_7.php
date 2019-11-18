<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * newsmax_ruby_post_feat_7
 */
if ( ! function_exists( 'newsmax_ruby_post_feat_7' ) ) {
	function newsmax_ruby_post_feat_7( $options = array() ) {

		$review = newsmax_ruby_post_review_icon( 'is-size-4 is-absolute' );

		$str = '';
		$str .= '<article class="post-wrap post-feat post-feat-7">';

		$str .= '<div class="post-thumb-outer">';
		if ( has_post_thumbnail() ) {

			$param                  = array();
			$param['size']          = 'newsmax_ruby_crop_272x170';
			$param['size_mobile_h'] = 'newsmax_ruby_crop_364x225';
			$param['size_mobile']   = 'newsmax_ruby_crop_272x170';

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
			$str .= newsmax_ruby_post_format( 'is-size-4 is-absolute', true );
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

