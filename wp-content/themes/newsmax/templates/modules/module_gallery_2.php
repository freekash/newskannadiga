<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param $options
 *
 * @return string
 * newsmax_ruby_post_gallery_2 ( gallery small thumbnail )
 */
if ( ! function_exists( 'newsmax_ruby_post_gallery_2' ) ) {
	function newsmax_ruby_post_gallery_2( $options = array() ) {

		$review = newsmax_ruby_post_review_icon( 'is-size-4 is-absolute' );

		$str = '';
		$str .= '<div class="post-wrap post-gallery post-gallery-2" data-post_gallery_index="' . $options['post_index'] . '" data-effect="mpf-ruby-effect ruby-gallery-popup-outer" data-mfp-src="#block-gallery-' . $options['block_id'] . '">';
		$str .= '<div class="post-header">';
		//render thumbnail
		if ( has_post_thumbnail() ) {
			$str .= '<div class="post-thumb-outer">';
			$param         = array();
			$param['size'] = 'newsmax_ruby_crop_380x380';
			$str .= newsmax_ruby_post_thumb( $param );
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