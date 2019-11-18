<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * ajax block filter
 */
if ( ! function_exists( 'newsmax_ruby_ajax_filter_data' ) ) {
	add_action( 'wp_ajax_nopriv_newsmax_ruby_ajax_filter_data', 'newsmax_ruby_ajax_filter_data' );
	add_action( 'wp_ajax_newsmax_ruby_ajax_filter_data', 'newsmax_ruby_ajax_filter_data' );

	function newsmax_ruby_ajax_filter_data() {

		$param                    = array();
		$data_response            = array();
		$data_response['content'] = '';


		if ( ! empty( $_POST['data'] ) ) {
			$param = newsmax_ruby_data_validate( $_POST['data'] );
		}

		$data_query = newsmax_ruby_query::get_data( $param );
		if ( ! empty( $data_query->max_num_pages ) ) {
			$data_response['block_page_max'] = $data_query->max_num_pages;
		}

		//get post data
		$data_response['content'] = newsmax_ruby_ajax_data_content( $data_query, $param );

		wp_reset_postdata();

		die( json_encode( $data_response ) );
	}
}
