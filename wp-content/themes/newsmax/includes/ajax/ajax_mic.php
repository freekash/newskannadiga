<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * ajax topbar date
 */
if ( ! function_exists( 'newsmax_ruby_date_data' ) ) {
	add_action( 'wp_ajax_nopriv_newsmax_ruby_date_data', 'newsmax_ruby_date_data' );
	add_action( 'wp_ajax_newsmax_ruby_date_data', 'newsmax_ruby_date_data' );

	function newsmax_ruby_date_data() {

		if ( ! empty( $_POST['timestamp'] ) ) {
			$timestamp = newsmax_ruby_data_validate( $_POST['timestamp'] );
		}
		if ( empty( $timestamp ) ) {
			die( json_encode( '' ) );
		}

		$topbar_date_format = newsmax_ruby_get_option( 'topbar_date_format' );
		if ( empty( $topbar_date_format ) ) {
			$topbar_date_format = 'l, F j, Y';
		}
		$data_response = date_i18n( esc_attr( $topbar_date_format ), $timestamp );

		die( json_encode( $data_response ) );
	}
}


if ( ! function_exists( 'newsmax_ruby_ajax_view_get' ) ) {
	add_action( 'wp_ajax_nopriv_newsmax_ruby_ajax_view_get', 'newsmax_ruby_ajax_view_get' );
	add_action( 'wp_ajax_newsmax_ruby_ajax_view_get', 'newsmax_ruby_ajax_view_get' );

	function newsmax_ruby_ajax_view_get() {

		if ( ! empty( $_POST['post_id'] ) ) {
			$post_id = esc_attr( $_POST['post_id'] );
		}

		if ( empty( $post_id ) && ! function_exists( 'newsmax_ruby_post_view_total' ) ) {
			die( json_encode( '' ) );
		}

		$total_view = newsmax_ruby_post_view_total( $post_id );

		die( json_encode( $total_view ) );
	}
}


if ( ! function_exists( 'newsmax_ruby_ajax_view_add' ) ) {
	add_action( 'wp_ajax_nopriv_newsmax_ruby_ajax_view_add', 'newsmax_ruby_ajax_view_add' );
	add_action( 'wp_ajax_newsmax_ruby_ajax_view_add', 'newsmax_ruby_ajax_view_add' );

	function newsmax_ruby_ajax_view_add() {

		if ( ! empty( $_POST['post_id'] ) && function_exists( 'newsmax_ruby_post_view_add' ) ) {
			$post_id = esc_attr( $_POST['post_id'] );
		}

		if ( empty( $post_id ) ) {
			die( json_encode( '' ) );
		}

		newsmax_ruby_post_view_add( $post_id );

		die( json_encode( '1' ) );
	}
}