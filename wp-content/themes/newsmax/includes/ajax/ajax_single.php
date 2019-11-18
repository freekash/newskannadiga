<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * ajax single infinite load
 */
if ( ! function_exists( 'newsmax_ruby_single_infinite_data' ) ) {
	add_action( 'wp_ajax_nopriv_newsmax_ruby_single_infinite_data', 'newsmax_ruby_single_infinite_data' );
	add_action( 'wp_ajax_newsmax_ruby_single_infinite_data', 'newsmax_ruby_single_infinite_data' );

	function newsmax_ruby_single_infinite_data() {


		global $post;
		global $newsmax_ruby_single_ajax_call;

		$data = array();
		$newsmax_ruby_single_ajax_call = true;

		if ( ! empty( $_POST['post_id'] ) ) {
			$post_id = esc_attr( $_POST['post_id'] );
		}

		if ( ! empty( $post_id ) ) {
			$post = get_post( $post_id );

			if ( ! empty( $post ) ) {

				setup_postdata( $post );

				$pre_post = get_previous_post();
				if ( ! empty( $pre_post ) ) {
					$data['next_post_id'] = $pre_post->ID;
				}

				$data['content'] = newsmax_ruby_render_single_post_layout(true);
				wp_reset_postdata();
			}
		}

		die( json_encode( $data ) );
	}
}