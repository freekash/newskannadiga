<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param $options
 *
 * @return string
 * render post video 1
 */
if ( ! function_exists( 'newsmax_ruby_post_video_1' ) ) {
	function newsmax_ruby_post_video_1( $options = array() ) {

		$str = '';
		$str .= '<article class="post-wrap post-video post-video-1">';
		$str .= '<div class="post-header">';
		//render thumbnail
		if ( has_post_thumbnail() ) {
			$str .= '<div class="post-thumb-outer">';
			$str .= newsmax_ruby_post_thumb( array( 'size' => 'newsmax_ruby_crop_272x170' ) );
			$str .= newsmax_ruby_post_format( 'is-size-4 is-absolute' );
			$str .= newsmax_ruby_post_meta_info_media_duration();
			$str .= '</div>';
		}
		$str .= '</div><!--#post header-->';

		$str .= '<div class="post-body">';
		$str .= newsmax_ruby_post_title( 'is-size-4' );
		$str .= '</div><!--#post body-->';
		$str .= '</article>';

		return $str;
	}
}


