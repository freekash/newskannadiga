<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render video iframe
 */
if ( ! function_exists( 'newsmax_ruby_iframe_video' ) ) {
	function newsmax_ruby_iframe_video() {

		if ( 'video' != get_post_format() ) {
			return false;
		}

		$post_id              = get_the_ID();
		$self_hosted_video_id = get_post_meta( $post_id, 'newsmax_ruby_meta_post_video_self_hosted', true );
		if ( ! empty( $self_hosted_video_id ) ) {
			return newsmax_ruby_iframe_video_self_hosted( $self_hosted_video_id );
		} else {
			$video_url = get_post_meta( $post_id, 'newsmax_ruby_meta_post_video_url', true );
			$iframe    = wp_oembed_get( $video_url, array( 'height' => 505, 'width' => 900 ) );
			if ( ! empty( $iframe ) ) {
				return $iframe;
			} else {
				$iframe = get_post_meta( $post_id, 'newsmax_ruby_meta_post_video_iframe', true );
				if ( ! empty( $iframe ) ) {
					return $iframe;
				} else {
					return false;
				}
			}
		}
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $video_id
 *
 * @return string
 * render self hosted video iframe
 */
if ( ! function_exists( 'newsmax_ruby_iframe_video_self_hosted' ) ) {
	function newsmax_ruby_iframe_video_self_hosted( $video_id ) {
		$wp_version = floatval( get_bloginfo( 'version' ) );

		if ( $wp_version < "3.6" ) {
			return '<p class="ruby-error">' . esc_html__( 'This WordPress version does not support self-hosted video, please update WordPress to the latest version to display this video.', 'newsmax' ) . '</p>';
		}
		$self_hosted_url = wp_get_attachment_url( $video_id );

		$params = array(
			'src'    => $self_hosted_url,
			'width'  => 740,
			'height' => 415
		);

		return wp_video_shortcode( $params );
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $video_url
 *
 * @return bool|string
 * detect video URL
 */
if ( ! function_exists( 'newsmax_ruby_video_detect_url' ) ) {
	function newsmax_ruby_video_detect_url( $video_url ) {

		$video_url = strtolower( $video_url );

		if ( strpos( $video_url, 'youtube.com' ) !== false or strpos( $video_url, 'youtu.be' ) !== false ) {
			return 'youtube';
		}
		if ( strpos( $video_url, 'dailymotion.com' ) !== false ) {
			return 'dailymotion';
		}
		if ( strpos( $video_url, 'vimeo.com' ) !== false ) {
			return 'vimeo';
		}

		return false;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $video_url
 *
 * @return mixed
 * get youtube video ID
 */
if ( ! function_exists( 'newsmax_ruby_video_id_youtube' ) ) {
	function newsmax_ruby_video_id_youtube( $video_url ) {
		$s = array();
		parse_str( parse_url( $video_url, PHP_URL_QUERY ), $s );

		if ( empty( $s["v"] ) ) {
			$youtube_sl_explode = explode( '?', $video_url );

			$youtube_sl = explode( '/', $youtube_sl_explode[0] );
			if ( ! empty( $youtube_sl[3] ) ) {
				return $youtube_sl [3];
			}

			return $youtube_sl [0];
		} else {
			return $s["v"];
		}
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $video_url
 *
 * @return mixed
 * get video id of vimeo
 */
if ( ! function_exists( 'newsmax_ruby_video_id_vimeo' ) ) {
	function newsmax_ruby_video_id_vimeo( $video_url ) {
		sscanf( parse_url( $video_url, PHP_URL_PATH ), '/%d', $video_id );

		return $video_id;
	}
}

if ( ! function_exists( 'newsmax_ruby_video_id_dailymotion' ) ) {
	function newsmax_ruby_video_id_dailymotion( $video_url ) {
		$video_id = strtok( basename( $video_url ), '_' );
		if ( strpos( $video_id, '#video=' ) !== false ) {
			$video_parts = explode( '#video=', $video_id );
			if ( ! empty( $video_parts[1] ) ) {
				return $video_parts[1];
			}
		};

		return $video_id;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param $video_url
 *
 * @return bool|void
 * get video thumbnail
 */
if ( ! function_exists( 'newsmax_ruby_video_get_thumb' ) ) {

	function newsmax_ruby_video_get_thumb( $video_url ) {

		//check empty
		if ( empty( $video_url ) ) {
			return false;
		}

		$video_sever = newsmax_ruby_video_detect_url( $video_url );

		switch ( $video_sever ) {
			case 'youtube' :
				return newsmax_ruby_video_get_thumb_youtube( $video_url );
			case 'vimeo' :
				return newsmax_ruby_video_get_thumb_vimeo( $video_url );
			case 'dailymotion' :
				return newsmax_ruby_video_get_thumb_dailymotion( $video_url );
			default :
				return false;
		}
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param $video_url
 * get video thumbnail youtube
 */
if ( ! function_exists( 'newsmax_ruby_video_get_thumb_youtube' ) ) {
	function newsmax_ruby_video_get_thumb_youtube( $video_url ) {

		//set http
		$protocol = 'http';
		if ( is_ssl() ) {
			$protocol = 'https';
		}

		$video_id = newsmax_ruby_video_id_youtube( $video_url );

		$image_url_1920 = $protocol . '://img.youtube.com/vi/' . $video_id . '/maxresdefault.jpg';
		$image_url_640  = $protocol . '://img.youtube.com/vi/' . $video_id . '/sddefault.jpg';
		$image_url_480  = $protocol . '://img.youtube.com/vi/' . $video_id . '/hqdefault.jpg';

		if ( ! newsmax_ruby_get_thumb_404( $image_url_1920 ) ) {
			return $image_url_1920;
		} elseif ( ! newsmax_ruby_get_thumb_404( $image_url_640 ) ) {
			return $image_url_640;
		} elseif ( ! newsmax_ruby_get_thumb_404( $image_url_480 ) ) {
			return $image_url_480;
		} else {
			return false;
		}
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $video_url
 * get vimeo thumbnail
 */
if ( ! function_exists( 'newsmax_ruby_video_get_thumb_vimeo' ) ) {
	function newsmax_ruby_video_get_thumb_vimeo( $video_url ) {

		$video_id = newsmax_ruby_video_id_vimeo( $video_url );
		$api_url  = 'http://vimeo.com/api/oembed.json?url=https://vimeo.com/' . $video_id;

		$data_response = wp_remote_get( $api_url, array(
			'timeout'    => 60,
			'sslverify'  => false,
			'user-agent' => 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0'
		) );

		if ( ! is_wp_error( $data_response ) ) {
			$data_response = wp_remote_retrieve_body( $data_response );
			$data_response = json_decode( $data_response );
			$image_url     = $data_response->thumbnail_url;

			return $image_url;
		} else {
			return false;
		}
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param $video_url
 *
 * @return bool
 * get dailymotion image
 */
if ( ! function_exists( 'newsmax_ruby_video_get_thumb_dailymotion' ) ) {
	function newsmax_ruby_video_get_thumb_dailymotion( $video_url ) {
		$video_id = newsmax_ruby_video_id_dailymotion( $video_url );

		$param         = 'https://api.dailymotion.com/video/' . $video_id . '?fields=thumbnail_url';
		$data_response = wp_remote_get( $param );
		if ( ! is_wp_error( $data_response ) ) {
			$data_response = json_decode( $data_response['body'] );
			$image_url     = $data_response->thumbnail_url;

			return $image_url;
		} else {
			return false;
		}
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $image_url
 *
 * @return bool
 * check 404
 */
if ( ! function_exists( 'newsmax_ruby_get_thumb_404' ) ) {
	function  newsmax_ruby_get_thumb_404( $image_url ) {
		$headers = @get_headers( $image_url );
		if ( ! empty( $headers[0] ) and strpos( $headers[0], '404' ) !== false ) {
			return true;
		}

		return false;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $post_id
 * add to featured image
 */
if ( ! function_exists( 'newsmax_ruby_save_thumbnail_video' ) ) {

	function newsmax_ruby_save_thumbnail_video( $post_id ) {


		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return false;
		}

		if ( get_post_status( $post_id ) != 'publish' ) {
			return false;
		}

		$post_type = get_post_type( $post_id );
		$video_url = get_post_meta( $post_id, 'newsmax_ruby_meta_post_video_url', true );
		if ( 'post' != $post_type || empty( $video_url ) ) {
			return false;
		}

		$image_url = newsmax_ruby_video_get_thumb( $video_url );

		if ( ! empty( $image_url ) && ! has_post_thumbnail( $post_id ) ) {
			add_action( 'add_attachment', 'newsmax_ruby_set_featured_thumbnail_video' );
			media_sideload_image( $image_url, $post_id, $post_id );
			remove_action( 'add_attachment', 'newsmax_ruby_set_featured_thumbnail_video' );
		};

		return false;
	}

	add_action( 'save_post', 'newsmax_ruby_save_thumbnail_video', 10, 1 );
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $att_id
 * set featured thumbnail
 */
if ( ! function_exists( 'newsmax_ruby_set_featured_thumbnail_video' ) ) {
	function newsmax_ruby_set_featured_thumbnail_video( $att_id ) {
		update_post_meta( get_the_ID(), '_thumbnail_id', $att_id );
	}
}

