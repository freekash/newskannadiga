<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * ajax search
 */
if ( ! function_exists( 'newsmax_ruby_ajax_search' ) ) {
	add_action( 'wp_ajax_nopriv_newsmax_ruby_ajax_search', 'newsmax_ruby_ajax_search' );
	add_action( 'wp_ajax_newsmax_ruby_ajax_search', 'newsmax_ruby_ajax_search' );

	function newsmax_ruby_ajax_search() {

		$param_search = '';
		$str          = '';

		if ( ! empty( $_POST['s'] ) ) {
			$param_search = newsmax_ruby_data_validate( $_POST['s'] );
		}

		$param = array(
			's'           => $param_search,
			'post_type'   => array( 'post' ),
			'post_status' => 'publish',
		);

		$options              = array();
		$options['cat_info']  = newsmax_ruby_get_option( 'blog_cat_info' );
		$options['meta_info'] = newsmax_ruby_get_option( 'blog_meta_info' );
		$options['share']     = newsmax_ruby_get_option( 'blog_share' );

		$data_query = new WP_Query( $param );

		if ( $data_query->have_posts() ) {

			$counter = 1;

			while ( $data_query->have_posts() ) {
				$data_query->the_post();
				$str .= '<div class="post-outer col-sm-4 col-xs-12">';
				$str .= newsmax_ruby_post_grid_3( $options );
				$str .= '</div>';

				if ( $counter > 5 ) {
					$str .= '<div class="clearfix"></div>';
					$str .= '<div class="header-search-more post-btn"><button type="submit">' . newsmax_ruby_translate( 'view_all_results' ) . '<i class="icon-simple icon-arrow-right"></i></button></div>';
					break;
				}
				$counter ++;
			}
		} else {
			$str = '<div class="header-search-not-found">' . newsmax_ruby_translate( 'no_search_result' ) . '</div>';
		}
		wp_reset_postdata();

		die( json_encode( $str ) );
	}
}
