<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param $options
 *
 * @return string
 * newsmax_ruby_post_video_iframe
 */
if ( ! function_exists( 'newsmax_ruby_post_video_iframe' ) ) {
	function newsmax_ruby_post_video_iframe( $options = array() ) {

		//setup post data if post ajax
		if ( ! empty( $options['post_id'] ) ) {
			global $post;
			$post = get_post( $options['post_id'] );
			setup_postdata( $post );
		}

		$str = '';
		$str .= '<div class="post-wrap post-video post-video-iframe">';
		//render thumbnail
		$post_type = newsmax_ruby_check_post_format();
		if ( 'video' == $post_type ) {
			$str .= '<div class="post-thumb-outer post-thumb-video-outer">';
			$str .= '<div class="post-thumb iframe-video">';
			$str .= newsmax_ruby_iframe_video();
			$str .= '</div>';
			$str .= '</div>';
		} else {
			$size             = 'newsmax_ruby_crop_1100x580';
			$image_id         = get_post_thumbnail_id();
			$image_attachment = wp_get_attachment_image_src( $image_id, $size );

			$str .= '<div class="post-thumb-outer">';
			$str .= '<div class="post-thumb">';
			$str .= '<a href="' . get_permalink() . '" title="' . esc_attr( get_the_title() ) . '" rel="bookmark">';
			$str .= '<span class="video-iframe-image" style="background-image:url(' . esc_url( $image_attachment[0] ) . ')"></span>';
			$str .= '</a>';
			$str .= '</div>';
			$str .= newsmax_ruby_post_format( 'is-size-2 is-absolute' );
			$str .= '</div><!--#thumb outer-->';
		}

		$str .= '</div>';

		return $str;
	}
}
