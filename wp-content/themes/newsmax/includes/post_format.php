<?php
/**
 * check post format
 */
if ( ! function_exists( 'newsmax_ruby_check_post_format' ) ) {
	function newsmax_ruby_check_post_format() {

		$post_format = get_post_format();
		$post_id     = get_the_ID();

		if ( 'video' == $post_format ) {
			$url             = get_post_meta( $post_id, 'newsmax_ruby_meta_post_video_url', true );
			$iframe          = get_post_meta( $post_id, 'newsmax_ruby_meta_post_video_iframe', true );
			$self_host_video = get_post_meta( $post_id, 'newsmax_ruby_meta_post_video_self_hosted', true );

			if ( ! empty( $url ) || ! empty( $iframe ) || ! empty( $self_host_video ) ) {
				return 'video';
			} else {
				return 'thumbnail';
			}
		} elseif ( 'audio' == $post_format ) {
			$url             = get_post_meta( $post_id, 'newsmax_ruby_meta_post_audio_url', true );
			$iframe          = get_post_meta( $post_id, 'newsmax_ruby_meta_post_audio_iframe', true );
			$self_host_audio = get_post_meta( $post_id, 'newsmax_ruby_meta_post_audio_self_hosted', true );

			if ( ! empty( $url ) || ! empty( $iframe ) || ! empty( $self_host_audio ) ) {
				return 'audio';
			} else {
				return 'thumbnail';
			}
		} elseif ( 'gallery' == $post_format ) {
			$gallery = get_post_meta( $post_id, 'newsmax_ruby_meta_post_gallery_data', false );
			if ( ! empty( $gallery ) ) {
				return 'gallery';
			} else {
				return 'thumbnail';
			}
		} else {
			return 'thumbnail';
		}
	}
}
