<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return bool|string
 * check single ajax type
 */
if ( ! function_exists( 'newsmax_ruby_single_post_check_ajax' ) ) {
	function newsmax_ruby_single_post_check_ajax() {

		global $newsmax_ruby_single_ajax_call;
		if ( ! empty( $newsmax_ruby_single_ajax_call ) && true == $newsmax_ruby_single_ajax_call ) {
			return 'scroll';
		}

		$post_id   = get_the_ID();
		$ajax_type = get_post_meta( $post_id, 'newsmax_ruby_meta_single_post_ajax_type', true );

		if ( ! empty( $ajax_type ) && 'default' != $ajax_type ) {
			return $ajax_type;
		} else {
			return newsmax_ruby_get_option( 'single_post_ajax_type' );
		}
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return mixed|string
 * check single post layout
 */
if ( ! function_exists( 'newsmax_ruby_single_post_check_layout' ) ) {
	function newsmax_ruby_single_post_check_layout() {

		$data_layout                = array();
		$data_layout['format']      = '';
		$data_layout['layout']      = '';
		$data_layout['video_popup'] = '';
		$post_id                    = get_the_ID();
		$check_post_format          = newsmax_ruby_check_post_format();

		switch ( $check_post_format ) {
			case 'thumbnail' :
				$data_layout['format'] = 'thumbnail';
				$data_layout['layout'] = newsmax_ruby_single_post_check_layout_featured();
				break;
			case 'video' :
				$type = get_post_meta( $post_id, 'newsmax_ruby_meta_style_video', true );
				if ( empty( $type ) || 'default' == $type ) {
					$type = newsmax_ruby_get_option( 'single_post_style_video' );
				}
				if ( 2 == $type ) {
					$data_layout['format']      = 'thumbnail';
					$data_layout['layout']      = newsmax_ruby_single_post_check_layout_featured();
					$data_layout['video_popup'] = true;
				} else {
					$data_layout['format'] = 'video';
					$data_layout['layout'] = get_post_meta( $post_id, 'newsmax_ruby_meta_layout_video', true );
					if ( empty( $data_layout['layout'] ) || 'default' == $data_layout['layout'] ) {
						$data_layout['layout'] = newsmax_ruby_get_option( 'single_post_layout_video' );
					}
				}
				break;
			case 'audio' :
				$data_layout['format'] = 'audio';
				$data_layout['layout'] = get_post_meta( $post_id, 'newsmax_ruby_meta_layout_audio', true );
				if ( empty( $data_layout['layout'] ) || 'default' == $data_layout['layout'] ) {
					$data_layout['layout'] = newsmax_ruby_get_option( 'single_post_layout_audio' );
				}
				break;
			case 'gallery' :
				$data_layout['format'] = 'gallery';
				$data_layout['layout'] = get_post_meta( $post_id, 'newsmax_ruby_meta_layout_gallery', true );
				if ( empty( $data_layout['layout'] ) || 'default' == $data_layout['layout'] ) {
					$data_layout['layout'] = newsmax_ruby_get_option( 'single_post_layout_gallery' );
				}
				break;
		}

		return $data_layout;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return mixed|string
 * check single layout layout featured
 */
if ( ! function_exists( 'newsmax_ruby_single_post_check_layout_featured' ) ) {
	function newsmax_ruby_single_post_check_layout_featured() {
		$layout = get_post_meta( get_the_ID(), 'newsmax_ruby_meta_layout_featured', true );
		if ( empty( $layout ) || 'default' == $layout ) {
			$layout = newsmax_ruby_get_option( 'single_post_layout_featured' );
		}

		return $layout;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param bool $disable_makeup
 * check sidebar name
 */
if ( ! function_exists( 'newsmax_ruby_single_post_check_sidebar_name' ) ) {
	function newsmax_ruby_single_post_check_sidebar_name() {

		$all_sidebar = newsmax_ruby_theme_config::sidebar_name( true );

		//single sidebar name
		$sidebar_name = get_post_meta( get_the_ID(), 'newsmax_ruby_meta_sidebar_name', true );
		if ( ! array_key_exists( $sidebar_name, $all_sidebar ) ) {
			$sidebar_name = 'newsmax_ruby_default_from_theme_options';
		}
		if ( 'newsmax_ruby_default_from_theme_options' == $sidebar_name || empty( $sidebar_name ) ) {
			$sidebar_name = newsmax_ruby_get_option( 'single_post_sidebar_name' );
		}

		if ( empty( $sidebar_name ) ) {
			$sidebar_name = 'newsmax_ruby_sidebar_default';
		}

		return $sidebar_name;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return mixed|string
 * check sidebar position
 */
if ( ! function_exists( 'newsmax_ruby_single_post_check_sidebar_position' ) ) {
	function newsmax_ruby_single_post_check_sidebar_position() {

		//sidebar position
		$sidebar_position = get_post_meta( get_the_ID(), 'newsmax_ruby_meta_sidebar_position', true );

		//override sidebar position
		if ( 'default' == $sidebar_position || empty( $sidebar_position ) ) {
			$sidebar_position = newsmax_ruby_get_option( 'single_post_sidebar_position' );
			if ( 'default' == $sidebar_position ) {
				$sidebar_position = newsmax_ruby_get_option( 'site_sidebar_position' );
			}
		}

		return $sidebar_position;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return mixed|string
 * check header align
 */
if ( ! function_exists( 'newsmax_ruby_single_post_check_header_position' ) ) {
	function newsmax_ruby_single_post_check_header_position() {

		$position = get_post_meta( get_the_ID(), 'newsmax_ruby_meta_single_header_position', true );
		if ( 'default' == $position || empty( $position ) ) {
			$position = newsmax_ruby_get_option( 'single_post_header_position' );
		};

		return $position;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return bool|int|string
 * check video autoplay
 */
if ( ! function_exists( 'newsmax_ruby_single_post_check_autoplay' ) ) {
	function newsmax_ruby_single_post_check_autoplay() {
		$autoplay = get_post_meta( get_the_ID(), 'newsmax_ruby_meta_post_video_autoplay', true );
		if ( empty( $autoplay ) || 'default' == $autoplay ) {
			return newsmax_ruby_get_option( 'single_post_video_autoplay' );
		} else {
			if ( 1 == $autoplay ) {
				return 1;
			} else {
				return false;
			}
		}
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return bool|int|string
 * check video related
 */
if ( ! function_exists( 'newsmax_ruby_single_post_check_related_video' ) ) {
	function newsmax_ruby_single_post_check_related_video() {
		$video_related = get_post_meta( get_the_ID(), 'newsmax_ruby_meta_post_video_related', true );
		if ( empty( $video_related ) || 'default' == $video_related ) {
			return newsmax_ruby_get_option( 'single_post_box_related_video' );
		} else {
			if ( 1 == $video_related ) {
				return 1;
			} else {
				return false;
			}
		}
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return bool|int|string
 * check feature size
 */
if ( ! function_exists( 'newsmax_ruby_single_post_check_feat_size' ) ) {
	function newsmax_ruby_single_post_check_feat_size() {
		$feat_size = get_post_meta( get_the_ID(), 'newsmax_ruby_meta_single_featured_size', true );

		if ( empty( $feat_size ) || 'default' == $feat_size ) {
			$feat_size = newsmax_ruby_get_option( 'single_post_featured_size' );
		}

		return $feat_size;
	}
}

