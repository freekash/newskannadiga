<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return mixed
 * get post share real
 */
if ( ! function_exists( 'newsmax_ruby_social_share_real' ) ) {
	function newsmax_ruby_social_share_real() {

		//get URL
		$url = get_permalink();
		if ( empty( $url ) ) {
			return false;
		}

		$url_snip             = newsmax_ruby_name_to_id( substr( $url, 0, 40 ) );
		$url_shares_transient = 'newsmax_ruby_share_' . $url_snip;
		$cache                = get_transient( $url_shares_transient );

		if ( is_array( $cache ) && array_key_exists( 'all', $cache ) ) {
			return $cache;
		} else {

			$param = array(
				'timeout'   => 60,
				'sslverify' => false,
			);

			//facebook
			$json_string = wp_remote_get( 'http://graph.facebook.com/?ids=' . $url, $param );
			if ( ! is_wp_error( $json_string ) && isset( $json_string['body'] ) ) {
				$json              = json_decode( $json_string['body'], true );
				$count['facebook'] = isset( $json[ $url ]['share']['share_count'] ) ? intval( ( $json[ $url ]['share']['share_count'] ) ) : 0;
			} else {
				$count['facebook'] = 0;
			}

			//linkedin
			$json_string = wp_remote_get( "http://www.linkedin.com/countserv/count/share?url=$url&format=json", $param );
			if ( ! is_wp_error( $json_string ) && isset( $json_string['body'] ) ) {
				$json              = json_decode( $json_string['body'], true );
				$count['linkedin'] = isset( $json['count'] ) ? intval( $json['count'] ) : 0;
			} else {
				$count['linkedin'] = 0;
			}


			//Pinterest
			$json_string = wp_remote_get( 'http://api.pinterest.com/v1/urls/count.json?url=' . $url, $param );
			if ( ! is_wp_error( $json_string ) && isset( $json_string['body'] ) ) {
				$json_string        = preg_replace( '/^receiveCount\((.*)\)$/', "\\1", $json_string['body'] );
				$json               = json_decode( $json_string, true );
				$count['pinterest'] = isset( $json['count'] ) ? intval( $json['count'] ) : 0;
			} else {
				$count['pinterest'] = 0;
			}

			//google plus
			$count['plus_one'] = 0;
			$google_args       = array(
				'headers' => array( 'Content-type' => 'application/json-rpc' ),
				'body'    => '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $url . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]',
			);
			$google_url        = 'https://clients6.google.com/rpc?key=AIzaSyCKSbrvQasunBoV16zDH9R33D88CeLr9gQ';
			$json_string       = wp_remote_post( $google_url, $google_args, $param );
			if ( ! is_wp_error( $json_string ) && isset( $json_string['body'] ) ) {
				$data = json_decode( $json_string['body'] );
				if ( ! is_null( $data ) ) {
					if ( is_array( $data ) && count( $data ) == 1 ) {
						$data = array_shift( $data );
					}
					if ( isset( $data->result->metadata->globalCounts->count ) ) {
						$count['plus_one'] = $data->result->metadata->globalCounts->count;
						$count['plus_one'] = intval( $count['plus_one'] );
					}
				}
			}

			//count all
			$count['all'] = $count['facebook'] + $count['pinterest'] + $count['plus_one'] + $count['linkedin'];

			//set cache 2h
			set_transient( $url_shares_transient, $count, 6400 );

			return $count;
		}
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return int|string
 * get post share total
 */
if ( ! function_exists( 'newsmax_ruby_social_share_total' ) ) {
	function newsmax_ruby_social_share_total() {

		$forgery     = get_post_meta( get_the_ID(), 'newsmax_ruby_meta_forgery_share', true );
		$total       = intval( $forgery );
		$share_total = newsmax_ruby_social_share_real();
		if ( is_array( $share_total ) && ! empty( $share_total['all'] ) ) {
			$total += intval( $share_total['all'] );
		}
		$total = newsmax_ruby_show_over_100k( $total );

		return $total;
	}
}