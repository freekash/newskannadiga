<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * ajax video playlist
 */
if ( ! function_exists( 'newsmax_ruby_ajax_playlist_video' ) ) {
	add_action( 'wp_ajax_nopriv_newsmax_ruby_ajax_playlist_video', 'newsmax_ruby_ajax_playlist_video' );
	add_action( 'wp_ajax_newsmax_ruby_ajax_playlist_video', 'newsmax_ruby_ajax_playlist_video' );

	function newsmax_ruby_ajax_playlist_video() {

		//get and validate request data
		$options = array();
		$str     = '';

		if ( ! empty( $_POST['post_id'] ) ) {
			$post_id = newsmax_ruby_data_validate( $_POST['post_id'] );
		}

		if ( ! empty( $post_id ) ) {
			$options['post_id'] = $post_id;
			$str .= newsmax_ruby_post_video_iframe($options);
		}

		wp_reset_postdata();

		die( json_encode( $str ) );
	}
}
