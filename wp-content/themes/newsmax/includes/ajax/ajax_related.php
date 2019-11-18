<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * ajax single related
 */
if ( ! function_exists( 'newsmax_ruby_related_data' ) ) {
	add_action( 'wp_ajax_nopriv_newsmax_ruby_related_data', 'newsmax_ruby_related_data' );
	add_action( 'wp_ajax_newsmax_ruby_related_data', 'newsmax_ruby_related_data' );

	function newsmax_ruby_related_data() {

		$param         = array();
		$data_response = array();

		//get and validate request data
		if ( ! empty( $_POST['data'] ) ) {
			$param = newsmax_ruby_data_validate( $_POST['data'] );
		}

		if ( empty( $param['related_page_next'] ) || empty( $param['related_layout'] ) || empty( $param['related_post_id'] ) ) {
			die( json_encode( 0 ) );
		}

		$layout               = $param['related_layout'];
		$post_id              = $param['related_post_id'];
		$paged                = $param['related_page_next'];

		$data_query = newsmax_ruby_related_get( $post_id, $paged );

		switch ( $layout ) {
			case '1' :
				$data_response['content'] = newsmax_ruby_related_layout_grid_1( $data_query, $param );
				break;
			case '2' :
				$data_response['content'] = newsmax_ruby_related_layout_grid_2( $data_query, $param );
				break;
			case '3' :
				$data_response['content'] = newsmax_ruby_related_layout_list_1( $data_query, $param );
				break;
		}

		$data_response['related_page_current'] = $paged;

		wp_reset_postdata();

		die( json_encode( $data_response ) );
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * ajax single related (video)
 */
if ( ! function_exists( 'newsmax_ruby_related_video_data' ) ) {
	add_action( 'wp_ajax_nopriv_newsmax_ruby_related_video_data', 'newsmax_ruby_related_video_data' );
	add_action( 'wp_ajax_newsmax_ruby_related_video_data', 'newsmax_ruby_related_video_data' );

	function newsmax_ruby_related_video_data() {

		$param         = array();
		$data_response = array();

		//get and validate request data
		if ( ! empty( $_POST['data'] ) ) {
			$param = newsmax_ruby_data_validate( $_POST['data'] );
		}

		if ( empty( $param['related_page_next'] ) || empty( $param['related_post_id'] ) ) {
			die( json_encode( 0 ) );
		}

		$data_query               = newsmax_ruby_related_video_get( $param, $param['related_page_next'] );
		$data_response['content'] = newsmax_ruby_related_video_listing( $data_query, $param );

		if ( ! empty( $data_query->paged ) ) {
			$data_response['related_page_current'] = $data_query->paged;
		} else {
			$data_response['related_page_current'] = $param['related_page_next'];
		}

		wp_reset_postdata();

		die( json_encode( $data_response ) );
	}
}

