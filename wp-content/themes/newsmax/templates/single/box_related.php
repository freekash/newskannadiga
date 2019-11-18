<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single post box related
 */
if ( ! function_exists( 'newsmax_ruby_single_post_box_related' ) ) {
	function newsmax_ruby_single_post_box_related() {

		$check = newsmax_ruby_get_option( 'single_post_box_related' );
		if ( empty( $check ) ) {
			return false;
		}

		//remove if video posts
		$post_format = newsmax_ruby_check_post_format();
		if ( 'video' == $post_format ) {
			$check = newsmax_ruby_get_option( 'single_post_related_video_disable_related' );
			if ( ! empty( $check ) ) {
				return false;
			}
		}

		$data_query = newsmax_ruby_related_get( get_the_ID() );

		if ( empty( $data_query ) || ( false == $data_query->have_posts() ) ) {
			return false;
		}

		$check_ajax = newsmax_ruby_single_post_check_ajax();

		$layout = newsmax_ruby_get_option( 'single_post_box_related_layout' );
		$title  = newsmax_ruby_get_option( 'single_post_box_related_title' );

		if ( empty( $layout ) ) {
			$layout = 1;
		}

		$options                         = array();
		$options['related_page_current'] = 1;
		$options['related_page_max']     = $data_query->max_num_pages;
		$options['related_layout']       = $layout;
		$options['related_post_id']      = get_the_ID();
		$options['cat_info']             = newsmax_ruby_get_option( 'blog_cat_info' );
		$options['meta_info']            = newsmax_ruby_get_option( 'blog_meta_info' );
		$options['share']                = newsmax_ruby_get_option( 'blog_share' );
		$options['sidebar_position']     = newsmax_ruby_single_post_check_sidebar_position();
		$options['pagination_type']      = newsmax_ruby_get_option( 'single_post_related_pagination' );

		//render
		$str        = '';
		$class_name = 'single-post-box-related clearfix box-related-' . $layout;

		if ( 'scroll_related' == $check_ajax && $options['related_page_max'] > 1 ) {
			$ajax_data = newsmax_ruby_related_ajax_param( $options );
			$str .= '<div class="' . esc_attr( $class_name ) . '"' . ' ' . $ajax_data . '>';
		} else {
			$str .= '<div class="' . esc_attr( $class_name ) . '">';
		}

		$str .= '<div class="box-related-header block-header-wrap">';
		$str .= '<div class="block-header-inner">';
		$str .= '<div class="block-title">';
		$str .= '<h3>' . esc_html( $title ) . '</h3>';
		$str .= '</div>';
		$str .= '</div>';
		$str .= '</div>';
		$str .= '<div class="box-related-content row">';
		switch ( $layout ) {
			case '1' :
				$str .= newsmax_ruby_related_layout_grid_1( $data_query, $options );
				break;
			case '2' :
				$str .= newsmax_ruby_related_layout_grid_2( $data_query, $options );
				break;
			case '3' :
				$str .= newsmax_ruby_related_layout_list_1( $data_query, $options );
				break;
		}
		$str .= '</div>';
		if ( 'scroll_related' == $check_ajax && $options['related_page_max'] > 1 ) {
			$str .= '<div class="box-related-footer">';
			if ( empty( $options['pagination_type'] ) || 1 == $options['pagination_type'] ) {
				$str .= '<div class="related-infinite-scroll clearfix">';
				$str .= '<div class="ajax-animation"><span class="ajax-animation-icon"></span></div>';
				$str .= '</div>';
			} else {
				$str .= '<div class="related-loadmore clearfix">';
				$str .= '<a href="#" class="ajax-loadmore-link related-loadmore-link ajax-link"><span>' . newsmax_ruby_translate( 'loadmore' ) . '</span></a>';
				$str .= '<div class="ajax-animation"><span class="ajax-animation-icon"></span></div>';
				$str .= '</div>';
			}

			$str .= '</div>';
		}
		$str .= '</div>';

		wp_reset_postdata();

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param $options
 *
 * @return string
 * ajax param
 */
if ( ! function_exists( 'newsmax_ruby_related_ajax_param' ) ) {
	function newsmax_ruby_related_ajax_param( $options ) {

		$str                   = '';
		$param                 = array();
		$param['data-excerpt'] = 0;

		if ( ! empty( $options['related_post_id'] ) ) {
			$param['data-related_post_id'] = $options['related_post_id'];
		}

		if ( ! empty( $options['related_page_current'] ) ) {
			$param['data-related_page_current'] = $options['related_page_current'];
		}

		if ( ! empty( $options['related_page_max'] ) ) {
			$param['data-related_page_max'] = $options['related_page_max'];
		}

		if ( ! empty( $options['related_layout'] ) ) {
			$param['data-related_layout'] = $options['related_layout'];
		}

		if ( ! empty( $options['cat_info'] ) ) {
			$param['data-cat_info'] = $options['cat_info'];
		}

		if ( ! empty( $options['meta_info'] ) ) {
			$param['data-meta_info'] = $options['meta_info'];
		}

		if ( ! empty( $options['share'] ) ) {
			$param['data-share'] = $options['share'];
		}

		if ( ! empty( $options['sidebar_position'] ) ) {
			$param['data-sidebar_position'] = $options['sidebar_position'];
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
 * @param array $options
 *
 * @return string
 * render related grid 1
 */
if ( ! function_exists( 'newsmax_ruby_related_layout_grid_1' ) ) {
	function newsmax_ruby_related_layout_grid_1( $data_query, $options = array() ) {

		$str                = '';
		$options['excerpt'] = 0;

		//class name
		$class_name = 'post-outer col-sm-6 col-xs-12';
		if ( ! empty( $options['sidebar_position'] ) && 'none' == $options['sidebar_position'] ) {
			$class_name = 'post-outer col-sm-4 col-xs-12';
		}

		while ( $data_query->have_posts() ) {
			$data_query->the_post();

			$str .= '<div class="' . esc_attr( $class_name ) . '">';
			$str .= newsmax_ruby_post_grid_2( $options );
			$str .= '</div>';
		}

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $data_query
 * @param array $options
 *
 * @return string
 * render related grid 2
 */
if ( ! function_exists( 'newsmax_ruby_related_layout_grid_2' ) ) {
	function newsmax_ruby_related_layout_grid_2( $data_query, $options = array() ) {

		//class name
		$class_name = 'post-outer col-sm-4 col-xs-12';
		if ( ! empty( $options['sidebar_position'] ) && 'none' == $options['sidebar_position'] ) {
			$class_name = 'post-outer ruby-col-5';
		}

		//render
		$str = '';
		while ( $data_query->have_posts() ) {
			$data_query->the_post();

			$str .= '<div class="' . esc_attr( $class_name ) . '">';
			$str .= newsmax_ruby_post_grid_3( $options );
			$str .= '</div>';
		}

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param $data_query
 * @param array $options
 *
 * @return string
 * render related grid 1
 */
if ( ! function_exists( 'newsmax_ruby_related_layout_list_1' ) ) {
	function newsmax_ruby_related_layout_list_1( $data_query, $options = array() ) {

		$options['excerpt'] = newsmax_ruby_get_option( 'blog_excerpt_length_list_1' );

		//render
		$str = '';
		while ( $data_query->have_posts() ) {
			$data_query->the_post();

			$str .= '<div class="post-outer">';
			$str .= newsmax_ruby_post_list_2( $options );
			$str .= '</div>';
		}

		return $str;
	}
}
