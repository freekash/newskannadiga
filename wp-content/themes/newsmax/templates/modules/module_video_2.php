<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render post list 3, small list with thumbnail
 */
if ( ! function_exists( 'newsmax_ruby_post_video_2' ) ) {
	function newsmax_ruby_post_video_2( $options = array() ) {

		$str = '';
		$str .= '<article class="post-wrap post-video post-video-2 clearfix">';
		if ( has_post_thumbnail() ) {
			$str .= '<div class="post-thumb-outer">';
			$str .= newsmax_ruby_post_thumb( array( 'size' => 'newsmax_ruby_crop_100x65' ) );
			$str .= newsmax_ruby_post_format( 'is-size-5 is-absolute' );
			$str .= '</div>';
		}
		$str .= '<div class="post-body">';
		$str .= newsmax_ruby_post_title( 'is-size-4' );
		$str .= newsmax_ruby_post_meta_info_media_duration( 'is-relative' );
		$str .= '</div>';

		$str .= '</article>';

		return $str;
	}
}