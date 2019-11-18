<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param $options
 *
 * @return string
 * newsmax_ruby_post_gallery_1 ( gallery big thumbnail )
 */
if ( ! function_exists( 'newsmax_ruby_post_gallery_1' ) ) {
	function newsmax_ruby_post_gallery_1( $options = array() ) {

		$review = newsmax_ruby_post_review_icon();

		$str = '';
		$str .= '<div class="post-wrap post-gallery post-gallery-1" data-post_gallery_index="' . $options['post_index'] . '" data-effect="mpf-ruby-effect ruby-gallery-popup-outer" data-mfp-src="#block-gallery-' . $options['block_id'] . '">';
		$str .= '<div class="post-header">';
		//render thumbnail
		if ( has_post_thumbnail() ) {
			$str .= '<div class="post-thumb-outer">';

			//thumb responsive
			$param                  = array();
			$param['size']          = 'newsmax_ruby_crop_548x450';
			$param['size_mobile_h'] = 'newsmax_ruby_crop_540x300';
			$param['size_mobile']   = 'newsmax_ruby_crop_364x225';
			$param['class_name']    = 'is-bg-thumb';

			$str .= newsmax_ruby_post_thumb( $param );
			$str .= newsmax_ruby_post_format( 'is-size-2 is-absolute' );
			if ( ! empty( $review ) ) {
				$str .= $review;
			}
			$str .= '</div>';
		}
		$str .= '</div><!--#post header-->';
		$str .= '</div>';

		return $str;
	}
}