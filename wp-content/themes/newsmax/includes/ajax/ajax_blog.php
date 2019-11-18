<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * ajax blog
 */
if ( ! function_exists( 'newsmax_ruby_ajax_blog_data' ) ) {
	add_action( 'wp_ajax_nopriv_newsmax_ruby_ajax_blog_data', 'newsmax_ruby_ajax_blog_data' );
	add_action( 'wp_ajax_newsmax_ruby_ajax_blog_data', 'newsmax_ruby_ajax_blog_data' );

	function newsmax_ruby_ajax_blog_data() {

		$param                    = array();
		$data_response            = array();
		$data_response['content'] = '';

		//get and validate request data
		if ( ! empty( $_POST['data'] ) ) {
			$param = newsmax_ruby_data_validate( $_POST['data'] );
		}

		if ( empty( $param['blog_page_next'] ) ) {
			$param['blog_page_next'] = 2;
		}

		$data_query = newsmax_ruby_query::get_data( $param, $param['blog_page_next'] );


		$data_response['content'] = newsmax_ruby_ajax_blog_content( $data_query, $param );

		if ( ! empty( $data_query->paged ) ) {
			$data_response['blog_page_current'] = $data_query->paged;
		} else {
			$data_response['blog_page_current'] = $param['blog_page_next'];
		}

		wp_reset_postdata();

		die( json_encode( $data_response ) );
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $data_query
 * @param $param
 *
 * @return string
 * render ajax blog content
 */
if ( ! function_exists( 'newsmax_ruby_ajax_blog_content' ) ) {
	function newsmax_ruby_ajax_blog_content( $data_query, $param ) {
		switch ( $param['blog_layout'] ) {
			case 'classic_1' :
				return newsmax_ruby_blog_layout_classic_1( $data_query, $param );
			case 'classic_2' :
				return newsmax_ruby_blog_layout_classic_2( $data_query, $param );
			case 'grid_1' :
				return newsmax_ruby_blog_layout_grid_1( $data_query, $param );
			case 'grid_2' :
				return newsmax_ruby_blog_layout_grid_2( $data_query, $param );
			case 'grid_3' :
				return newsmax_ruby_blog_layout_grid_3( $data_query, $param );
			case 'grid_4' :
				return newsmax_ruby_blog_layout_grid_4( $data_query, $param );
			case 'grid_5' :
				return newsmax_ruby_blog_layout_grid_5( $data_query, $param );
			case 'list_1' :
				return newsmax_ruby_blog_layout_list_1( $data_query, $param );
			case 'list_2' :
				return newsmax_ruby_blog_layout_list_2( $data_query, $param );
			case 'list_3' :
				return newsmax_ruby_blog_layout_list_3( $data_query, $param );
			default :
				return false;
		}
	}
}