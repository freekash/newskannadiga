<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $sidebar_position
 *
 * @return string
 * render related video for single post
 */
if ( ! function_exists( 'newsmax_ruby_single_post_video_related' ) ) {
	function newsmax_ruby_single_post_video_related( $sidebar_position = '' ) {

		$related_video = newsmax_ruby_single_post_check_related_video();
		$title         = newsmax_ruby_get_option( 'single_post_box_related_video_title' );

		if ( empty( $related_video ) ) {
			return false;
		}

		$str                        = '';
		$options                    = array();
		$options['related_post_id'] = get_the_ID();

		$options['posts_per_page'] = 3;
		if ( empty( $sidebar_position ) || 'none' == $sidebar_position ) {
			$options['posts_per_page'] = 5;
		}

		$data_query = newsmax_ruby_related_video_get( $options );
		if ( empty( $data_query->max_num_pages ) ) {
			return false;
		}

		$options['related_page_max'] = $data_query->max_num_pages;
		$ajax_param                  = newsmax_ruby_related_video_ajax_param( $options );

		$str .= '<div class="ruby-container">';
		$str .= '<div class="single-post-box-related-video is-light-text"' . ' ' . $ajax_param . '>';

		//render header
		$str .= '<div class="box-related-video-header">';
		$str .= '<div class="block-title">';
		$str .= '<h3>' . esc_html( $title ) . '</h3>';
		$str .= '</div>';

		$str .= '<div class="ajax-related-video ajax-nextprev clearfix">';
		$str .= '<a href="#" class="ajax-pagination-video-link ajax-link ajax-prev is-disable" data-ajax_pagination_link ="prev"><i class="icon-simple icon-arrow-left"></i></a>';

		if ( $options['related_page_max'] > 1 ) {
			$str .= '<a href="#" class="ajax-pagination-video-link ajax-link ajax-next" data-ajax_pagination_link ="next"><i class="icon-simple icon-arrow-right"></i></a>';
		} else {
			$str .= '<a href="#" class="ajax-pagination-video-link ajax-link ajax-next is-disable" data-ajax_pagination_link ="next"><i class="icon-simple icon-arrow-right"></i></a>';
		}

		$str .= '</div><!--next prev-->';
		$str .= '</div>';

		//render content
		$str .= '<div class="box-related-content block-content-wrap row">';
		$str .= '<div class="block-content-inner clearfix">';
		$str .= newsmax_ruby_related_video_listing( $data_query, $options );
		$str .= '</div>';
		$str .= '</div>';
		$str .= '</div>';
		$str .= '</div>';

		//reset post data
		wp_reset_postdata();

		return $str;

	}
}


if ( ! function_exists( 'newsmax_ruby_related_video_ajax_param' ) ) {
	function newsmax_ruby_related_video_ajax_param( $options ) {

		$str   = '';
		$param = array();

		$param['data-related_page_current'] = 1;

		if ( ! empty( $options['related_post_id'] ) ) {
			$param['data-related_post_id'] = $options['related_post_id'];
		}

		if ( ! empty( $options['posts_per_page'] ) ) {
			$param['data-posts_per_page'] = $options['posts_per_page'];
		}

		if ( ! empty( $options['related_page_max'] ) ) {
			$param['data-related_page_max'] = $options['related_page_max'];
		}

		//foreach
		foreach ( $param as $k => $v ) {
			if ( ! empty( $k ) ) {
				$str .= esc_attr( $k ) . '= ' . esc_attr( $v ) . ' ';
			}
		}

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $data_query
 *
 * @return string
 * render related video listing
 */
if ( ! function_exists( 'newsmax_ruby_related_video_listing' ) ) {
	function newsmax_ruby_related_video_listing( $data_query, $options ) {

		$str        = '';
		$class_name = 'post-outer ruby-col-5 col-sx-12';
		if ( ! empty( $options['posts_per_page'] ) && 3 == $options['posts_per_page'] ) {
			$class_name = 'post-outer col-sm-4 col-xs-12';
		}

		while ( $data_query->have_posts() ) {
			$data_query->the_post();
			$str .= '<div class="' . esc_attr( $class_name ) . '">';
			$str .= newsmax_ruby_post_video_1( $options );
			$str .= '</div><!--#post outer-->';
		}

		return $str;
	}
}
