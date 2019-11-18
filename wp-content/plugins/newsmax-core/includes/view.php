<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param $post_id
 *
 * @return bool
 * add post view
 */
if ( ! function_exists( 'newsmax_ruby_post_view_add' ) ) {
	function newsmax_ruby_post_view_add( $post_id = null ) {

		if ( empty( $post_id ) ) {
			$post_id = get_the_ID();
		}

		if ( empty( $post_id ) ) {
			return false;
		}

		$total   = get_post_meta( $post_id, 'newsmax_ruby_view_total', true );
		$forgery = get_post_meta( $post_id, 'newsmax_ruby_meta_forgery_view', true );

		if ( ! empty( $total ) ) {
			$total ++;
			update_post_meta( $post_id, 'newsmax_ruby_view_total', $total );
		} else {
			update_post_meta( $post_id, 'newsmax_ruby_view_total', 1 );
		}

		$total_forgery = intval( $total ) + intval( $forgery );
		update_post_meta( $post_id, 'newsmax_ruby_view_total_forgery', $total_forgery );

		$date_id              = date( 'Ymd' );
		$week_view_total_data = get_post_meta( $post_id, 'newsmax_ruby_week_view_total', true );

		if ( empty( $week_view_total_data ) ) {
			add_post_meta( $post_id, 'newsmax_ruby_week_view_total', array() );
			add_post_meta( $post_id, 'newsmax_ruby_week_view_total_num', '' );

			$week_view_total_data = array();
		}

		if ( is_array( $week_view_total_data ) ) {
			if ( array_key_exists( $date_id, $week_view_total_data ) ) {
				$week_view_total_data[ $date_id ] ++;
			} else {
				$week_view_total_data[ $date_id ] = 1;
			}

			$check = get_transient( 'newsmax_ruby_week_view_check_' . $post_id );
			if ( ! $check ) {
				foreach ( $week_view_total_data as $k => $v ) {
					if ( strtotime( $k . ' +7 days' ) < strtotime( key( array_slice( $week_view_total_data, - 1, 1, true ) ) ) ) {
						unset ( $week_view_total_data[ $k ] );
					} else {
						break;
					}
				};
				set_transient( 'newsmax_ruby_week_view_check_' . $post_id, 1, 6 * 3600 );
			}

			update_post_meta( $post_id, 'newsmax_ruby_week_view_total', $week_view_total_data );
			update_post_meta( $post_id, 'newsmax_ruby_week_view_total_num', array_sum( $week_view_total_data ) );
		}

		return false;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $post_id
 *
 * @return bool
 * init save post
 */
if ( ! function_exists( 'newsmax_ruby_post_view_init' ) ) {
	function newsmax_ruby_post_view_init( $post_id ) {

		$total_forgery = get_post_meta( $post_id, 'newsmax_ruby_view_total_forgery', true );
		$forgery       = get_post_meta( $post_id, 'newsmax_ruby_meta_forgery_view', true );

		if ( ! empty( $forgery ) && empty( $total_forgery ) ) {
			update_post_meta( $post_id, 'newsmax_ruby_view_total_forgery', $forgery );
		}

		return false;
	}

	add_action( 'save_post', 'newsmax_ruby_post_view_init' );
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $post_id
 *
 * @return bool|mixed
 * get real post view
 */
if ( ! function_exists( 'newsmax_ruby_post_view_real' ) ) {
	function newsmax_ruby_post_view_real( $post_id = null ) {

		if ( empty( $post_id ) ) {
			$post_id = get_the_ID();
		}

		$total = get_post_meta( $post_id, 'newsmax_ruby_view_total', true );

		return $total;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param null $post_id
 *
 * @return int|mixed|string
 * get post view
 */
if ( ! function_exists( 'newsmax_ruby_post_view_total' ) ) {
	function newsmax_ruby_post_view_total( $post_id = null ) {

		if ( empty( $post_id ) ) {
			$post_id = get_the_ID();
		}

		$total = get_post_meta( $post_id, 'newsmax_ruby_view_total_forgery', true );
		$total = newsmax_ruby_show_over_100k( $total );

		return $total;
	}
}