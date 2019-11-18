<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $flickr_id
 * @param int $num_images
 * @param string $tags
 *
 * @return array|mixed
 * get flickr data
 */
if ( ! function_exists( 'newsmax_ruby_data_flickr' ) ) {
	function newsmax_ruby_data_flickr( $flickr_id, $cache_name = '', $num_images = 9, $tags = '' ) {
		if ( empty( $flickr_id ) ) {
			return array();
		};

		$params = array( 'timeout' => 60, 'sslverify' => false );

		$response = wp_remote_get( 'http://api.flickr.com/services/feeds/photos_public.gne?format=json&id=' . urlencode( $flickr_id ) . '&nojsoncallback=1&tags=' . urlencode( $tags ), $params );
		if ( is_wp_error( $response ) || '200' != $response['response']['code'] ) {
			return array();
		}
		$response = wp_remote_retrieve_body( $response );
		$response = str_replace( "\\'", "'", $response );
		$content  = json_decode( $response, true );
		if ( is_array( $content ) ) {
			$content = array_slice( $content['items'], 0, $num_images );
			foreach ( $content as $i => $v ) {
				$content[ $i ]['media'] = preg_replace( '/_m\.(jp?g|png|gif)$/', '_s.\\1', $v['media']['m'] );
			}

			set_transient( $cache_name, $content, 12000 );

			return $content;
		} else {
			return array();
		}

	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param $instagram_token
 * @param string $cache_name
 * @param string $widget_id
 * @param int $num_images
 * @param string $tags
 *
 * @return array|mixed|object|string
 * get instagram data
 */
if ( ! function_exists( 'newsmax_ruby_data_instagram' ) ) {
	function newsmax_ruby_data_instagram( $instagram_token, $cache_name = '', $widget_id = '', $num_images = 9, $tags = '' ) {

		if ( ! empty( $instagram_token ) ) {
			$user = explode( ".", $instagram_token );

			if ( empty( $user[0] ) ) {
				return ' <div class="ruby-error"><p>' . esc_html__( 'API error...', 'newsmax-core' ) . '</p></div>';
			} else {
				$params = array(
					'sslverify' => false,
					'timeout'   => 60
				);

				if ( ! empty( $tags ) ) {
					$response = wp_remote_get( 'https://api.instagram.com/v1/tags/' . $tags . '/media/recent/?access_token=' . $instagram_token . '&count=' . $num_images, $params );
				} else {
					$response = wp_remote_get( 'https://api.instagram.com/v1/users/' . $user[0] . '/media/recent/?access_token=' . $instagram_token . '&count=' . $num_images, $params );
				}

				if ( is_wp_error( $response ) || empty( $response['response']['code'] ) || 200 != $response['response']['code'] ) {
					return ' <div class="ruby-error"><p>' . esc_html__( 'Configuration error or no pictures...', 'newsmax-core' ) . '</p></div>';

				} else {

					$data_images = json_decode( wp_remote_retrieve_body( $response ) );
					$cache_data = get_transient( 'newsmax_ruby_instagram_cache' );
					if ( ! is_array( $cache_data ) ) {
						$cache_data = array();
					}
					$cache_data[ $widget_id ] = $data_images;

					set_transient( $cache_name, $cache_data, 12000 );

					return $data_images;
				}
			}
		} else {
			return ' <div class="ruby-error"><p>' . esc_html__( 'Empty instagram token...', 'newsmax-core' ) . '</p></div>';
		}
	}
}
