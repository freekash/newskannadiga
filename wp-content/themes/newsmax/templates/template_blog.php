<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render blog listing layout
 */
if ( ! function_exists( 'newsmax_ruby_blog_layout' ) ) {
	function newsmax_ruby_blog_layout( $options ) {

		global $wp_query;

		if ( empty( $options['blog_layout'] ) ) {
			$options['blog_layout'] = 'classic_1';
		}

		if ( empty( $options['blog_sidebar_position'] ) ) {
			$options['blog_sidebar_position'] = 'right';
		}

		if ( empty( $options['blog_sidebar_name'] ) ) {
			$options['blog_sidebar_name'] = 'newsmax_ruby_sidebar_default';
		}

		if ( empty( $options['blog_pagination'] ) ) {
			$options['blog_pagination'] = 'number';
		}

		//entry meta info
		$options['cat_info']  = newsmax_ruby_get_option( 'blog_cat_info' );
		$options['meta_info'] = newsmax_ruby_get_option( 'blog_meta_info' );
		$options['share']     = newsmax_ruby_get_option( 'blog_share' );

		switch ( $options['blog_layout'] ) {
			case 'classic_1' :
				$options['summary_type']    = newsmax_ruby_get_option( 'blog_excerpt_summary_classic_1' );
				$options['excerpt_classic'] = newsmax_ruby_get_option( 'blog_excerpt_length_classic_1' );
				break;
			case 'classic_2' :
				$options['excerpt_classic'] = newsmax_ruby_get_option( 'blog_excerpt_length_classic_2' );
				break;
			case 'grid_1' :
				$options['excerpt'] = newsmax_ruby_get_option( 'blog_excerpt_length_grid' );
				break;
			case 'list_1' :
				$options['excerpt'] = newsmax_ruby_get_option( 'blog_excerpt_length_list_1' );
				break;
			case 'list_2' :
				$options['excerpt'] = newsmax_ruby_get_option( 'blog_excerpt_length_list_2' );
				break;
		}

		if ( ! empty( $options['blog_1st_classic'] ) && ( 'classic_1' != $options['blog_layout'] || 'classic_2' != $options['blog_layout'] ) ) {
			if ( empty( $options['blog_1st_classic_layout'] ) || 'classic_1' == $options['blog_1st_classic_layout'] ) {
				$options['summary_type']    = newsmax_ruby_get_option( 'blog_excerpt_summary_classic_1' );
				$options['excerpt_classic'] = newsmax_ruby_get_option( 'blog_excerpt_length_classic_1' );
			} else {
				$options['excerpt_classic'] = newsmax_ruby_get_option( 'blog_excerpt_length_classic_2' );
			}
		}

		if ( 'list_1' == $options['blog_layout'] || 'list_2' == $options['blog_layout'] || 'list_3' == $options['blog_layout'] ) {
			$options['thumb_position'] = newsmax_ruby_get_option( 'blog_style_list_thumb_position' );
		}

		if ( ( 'classic_2' == $options['blog_layout'] || 'list_1' == $options['blog_layout'] || 'list_2' == $options['blog_layout'] || 'list_3' == $options['blog_layout'] || ! empty( $options['blog_1st_classic'] ) ) ) {
			$options['block_style'] = newsmax_ruby_get_option( 'blog_style_classic_2' );
		}

		if ( ! empty( $options['blog_sidebar_position'] ) && 'none' == $options['blog_sidebar_position'] ) {
			if ( 'classic_1' == $options['blog_layout'] || 'classic_2' == $options['blog_layout'] || 1 == $options['blog_1st_classic'] ) {
				$options['classic_wide'] = 1;
			}
		}

		$str = '';

		$ajax_param = newsmax_ruby_blog_ajax_param( $options );

		if ( ! empty( $ajax_param ) ) {
			$str .= '<div id="ruby-blog-listing" class="blog-listing-wrap blog-listing-ajax"' . ' ' . $ajax_param . '>';
		} else {
			$str .= '<div class="blog-listing-wrap">';
		}

		switch ( $options['blog_layout'] ) {
			case 'classic_1' :
				$str .= newsmax_ruby_blog_layout_classic_1( $wp_query, $options );
				break;

			case 'classic_2' :
				$str .= newsmax_ruby_blog_layout_classic_2( $wp_query, $options );
				break;

			case 'grid_1' :
				$str .= newsmax_ruby_blog_layout_grid_1( $wp_query, $options );
				break;

			case 'grid_2' :
				$str .= newsmax_ruby_blog_layout_grid_2( $wp_query, $options );
				break;

			case 'grid_3' :
				$str .= newsmax_ruby_blog_layout_grid_3( $wp_query, $options );
				break;

			case 'grid_4' :
				$str .= newsmax_ruby_blog_layout_grid_4( $wp_query, $options );
				break;

			case 'grid_5' :
				$str .= newsmax_ruby_blog_layout_grid_5( $wp_query, $options );
				break;

			case 'list_1' :
				$str .= newsmax_ruby_blog_layout_list_1( $wp_query, $options );
				break;

			case 'list_2' :
				$str .= newsmax_ruby_blog_layout_list_2( $wp_query, $options );
				break;

			case 'list_3' :
				$str .= newsmax_ruby_blog_layout_list_3( $wp_query, $options );
				break;
		}

		$str .= '</div>';

		if ( $wp_query->max_num_pages > 1 ) {
			$str .= newsmax_ruby_blog_pagination( $options['blog_pagination'] );
		}

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $options
 *
 * @return string
 * blog ajax param
 */
if ( ! function_exists( 'newsmax_ruby_blog_ajax_param' ) ) {
	function newsmax_ruby_blog_ajax_param( $options ) {

		if ( empty( $options['blog_pagination'] ) || 'number' == $options['blog_pagination'] || 'next_prev' == $options['blog_pagination'] ) {
			return false;
		}

		global $wp_query;

		$str   = '';
		$param = array();

		$param['data-blog_page_current'] = 1;
		if ( get_query_var( 'paged' ) ) {
			$param['data-blog_page_current'] = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$param['data-blog_page_current'] = get_query_var( 'page' );
		}

		if ( ! empty( $wp_query->max_num_pages ) ) {
			$param['data-blog_page_max'] = $wp_query->max_num_pages;
		}

		if ( ! empty( $options['blog_layout'] ) ) {
			$param['data-blog_layout'] = $options['blog_layout'];
		}

		if ( ! empty( $options['blog_1st_classic'] ) ) {
			$param['data-blog_1st_classic'] = 1;
		}

		if ( ! empty( $options['blog_posts_per_page'] ) ) {
			$param['data-posts_per_page'] = $options['blog_posts_per_page'];
		} else {
			$param['data-posts_per_page'] = get_option( 'posts_per_page' );
		}

		if ( ! empty( $options['cat_info'] ) ) {
			$param['data-cat_info'] = 1;
		}

		if ( ! empty( $options['meta_info'] ) ) {
			$param['data-meta_info'] = 1;
		}

		if ( ! empty( $options['share'] ) ) {
			$param['data-share'] = 1;
		}

		if ( ! empty( $options['excerpt'] ) ) {
			$param['data-excerpt'] = $options['excerpt'];
		}

		if ( ! empty( $options['summary_type'] ) ) {
			$param['data-summary_type'] = $options['summary_type'];
		}

		if ( ! empty( $options['excerpt_classic'] ) ) {
			$param['data-excerpt_classic'] = $options['excerpt_classic'];
		}

		if ( ! empty( $options['classic_wide'] ) ) {
			$param['data-classic_wide'] = $options['classic_wide'];
		}

		if ( ! empty( $options['thumb_position'] ) ) {
			$param['data-thumb_position'] = $options['thumb_position'];
		}

		if ( ! empty( $options['blog_sidebar_position'] ) ) {
			$param['data-blog_sidebar_position'] = $options['blog_sidebar_position'];
		}

		if ( ! empty( $options['blog_1st_classic_layout'] ) ) {
			$param['data-blog_1st_classic_layout'] = $options['blog_1st_classic_layout'];
		}

		if ( ! empty( $options['block_style'] ) ) {
			$param['data-block_style'] = $options['block_style'];
		}

		//archive pages
		if ( is_author() ) {
			$param['data-author_id'] = get_the_author_meta( 'ID' );
		} elseif ( is_tag() ) {
			$param['data-tags'] = single_tag_title( '', false );
		} elseif ( is_category() ) {
			global $wp_query;
			$param['data-category_id'] = $wp_query->get_queried_object_id();
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
 * @param $options
 *
 * @return string
 * render blog classic 1
 */
if ( ! function_exists( 'newsmax_ruby_blog_layout_classic_1' ) ) {
	function newsmax_ruby_blog_layout_classic_1( $data_query, $options ) {

		$str = '';
		$str .= '<div class="blog-listing-el">';
		while ( $data_query->have_posts() ) {
			$data_query->the_post();

			$str .= '<div class="post-outer">';
			$str .= newsmax_ruby_post_classic_1( $options );
			$str .= '</div>';
		}
		$str .= '</div>';

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param $data_query
 * @param $options
 *
 * @return string
 * render blog classic 2
 */
if ( ! function_exists( 'newsmax_ruby_blog_layout_classic_2' ) ) {
	function newsmax_ruby_blog_layout_classic_2( $data_query, $options ) {

		$str = '';
		$str .= '<div class="blog-listing-el">';
		while ( $data_query->have_posts() ) {
			$data_query->the_post();

			$str .= '<div class="post-outer">';
			$str .= newsmax_ruby_post_classic_2( $options );
			$str .= '</div>';
		}
		$str .= '</div>';

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param $data_query
 * @param $options
 *
 * @return string
 * render blog grid 1
 */
if ( ! function_exists( 'newsmax_ruby_blog_layout_grid_1' ) ) {
	function newsmax_ruby_blog_layout_grid_1( $data_query, $options ) {

		$str  = '';
		$flag = false;
		if ( ! empty( $options['blog_1st_classic'] ) ) {
			$flag = true;
		}

		if ( empty( $options['blog_sidebar_position'] ) || 'none' == $options['blog_sidebar_position'] ) {
			$class_name = 'post-outer col-sm-4 col-xs-12';
		} else {
			$class_name = 'post-outer col-sm-6 col-xs-12';
		}

		$str .= '<div class="blog-listing-el">';
		while ( $data_query->have_posts() ) {
			$data_query->the_post();

			if ( true === $flag ) {

				if ( empty( $options['blog_1st_classic_layout'] ) || 'classic_1' == $options['blog_1st_classic_layout'] ) {
					$str .= '<div class="post-outer post-classic-1-outer col-xs-12">';
					$str .= newsmax_ruby_post_classic_1( $options );
					$str .= '</div>';
				} else {
					$str .= '<div class="post-outer post-classic-2-outer col-xs-12">';
					$str .= newsmax_ruby_post_classic_2( $options );
					$str .= '</div>';
				}

				$flag = false;
			} else {
				$str .= '<div class="' . esc_attr( $class_name ) . '">';
				$str .= newsmax_ruby_post_grid_2( $options );
				$str .= '</div>';
			}
		}
		$str .= '</div>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $data_query
 * @param $options
 *
 * @return string
 * render blog grid 2
 */
if ( ! function_exists( 'newsmax_ruby_blog_layout_grid_2' ) ) {
	function newsmax_ruby_blog_layout_grid_2( $data_query, $options ) {

		$str  = '';
		$flag = false;
		if ( ! empty( $options['blog_1st_classic'] ) ) {
			$flag = true;
		}

		if ( empty( $options['blog_sidebar_position'] ) || 'none' == $options['blog_sidebar_position'] ) {
			$class_name = 'post-outer ruby-col-5';
		} else {
			$class_name = 'post-outer col-sm-4 col-xs-12';
		}

		$str .= '<div class="blog-listing-el">';
		while ( $data_query->have_posts() ) {
			$data_query->the_post();

			if ( true === $flag ) {

				if ( empty( $options['blog_1st_classic_layout'] ) || 'classic_1' == $options['blog_1st_classic_layout'] ) {
					$str .= '<div class="post-outer post-classic-1-outer col-xs-12">';
					$str .= newsmax_ruby_post_classic_1( $options );
					$str .= '</div>';
				} else {
					$str .= '<div class="post-outer post-classic-2-outer col-xs-12">';
					$str .= newsmax_ruby_post_classic_2( $options );
					$str .= '</div>';
				}

				$flag = false;

			} else {
				$str .= '<div class="' . esc_attr( $class_name ) . '">';
				$str .= newsmax_ruby_post_grid_3( $options );
				$str .= '</div>';
			}
		}
		$str .= '</div>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $data_query
 * @param $options
 *
 * @return string
 * render layout grid 3
 */
if ( ! function_exists( 'newsmax_ruby_blog_layout_grid_3' ) ) {
	function newsmax_ruby_blog_layout_grid_3( $data_query, $options ) {

		$str  = '';
		$flag = false;
		if ( ! empty( $options['blog_1st_classic'] ) ) {
			$flag = true;
		}

		if ( empty( $options['blog_sidebar_position'] ) || 'none' == $options['blog_sidebar_position'] ) {
			$class_name = 'post-outer col-sm-4 col-xs-12';
		} else {
			$class_name = 'post-outer col-sm-6 col-xs-12';
		}

		$str .= '<div class="blog-listing-el">';
		while ( $data_query->have_posts() ) {
			$data_query->the_post();

			if ( true === $flag ) {

				if ( empty( $options['blog_1st_classic_layout'] ) || 'classic_1' == $options['blog_1st_classic_layout'] ) {
					$str .= '<div class="post-outer post-classic-1-outer col-xs-12">';
					$str .= newsmax_ruby_post_classic_1( $options );
					$str .= '</div>';
				} else {
					$str .= '<div class="post-outer post-classic-2-outer col-xs-12">';
					$str .= newsmax_ruby_post_classic_2( $options );
					$str .= '</div>';
				}

				$flag = false;
			} else {
				$str .= '<div class="' . esc_attr( $class_name ) . '">';
				$str .= newsmax_ruby_post_list_4( $options );
				$str .= '</div>';
			}
		}
		$str .= '</div>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $data_query
 * @param $options
 *
 * @return string
 * render layout grid 4
 */
if ( ! function_exists( 'newsmax_ruby_blog_layout_grid_4' ) ) {
	function newsmax_ruby_blog_layout_grid_4( $data_query, $options ) {

		$str  = '';
		$flag = false;
		if ( ! empty( $options['blog_1st_classic'] ) ) {
			$flag = true;
		}

		if ( empty( $options['blog_sidebar_position'] ) || 'none' == $options['blog_sidebar_position'] ) {
			$class_name = 'post-outer col-sm-4 col-xs-12';
		} else {
			$class_name = 'post-outer col-sm-6 col-xs-12';
		}

		$str .= '<div class="blog-listing-el">';
		while ( $data_query->have_posts() ) {
			$data_query->the_post();

			if ( true === $flag ) {

				if ( empty( $options['blog_1st_classic_layout'] ) || 'classic_1' == $options['blog_1st_classic_layout'] ) {
					$str .= '<div class="post-outer post-classic-1-outer col-xs-12">';
					$str .= newsmax_ruby_post_classic_1( $options );
					$str .= '</div>';
				} else {
					$str .= '<div class="post-outer post-classic-2-outer col-xs-12">';
					$str .= newsmax_ruby_post_classic_2( $options );
					$str .= '</div>';
				}

				$flag = false;
			} else {
				$str .= '<div class="' . esc_attr( $class_name ) . '">';
				$str .= newsmax_ruby_post_list_5( $options );
				$str .= '</div>';
			}
		}
		$str .= '</div>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $data_query
 * @param $options
 *
 * @return string
 * render blog grid 5
 */
if ( ! function_exists( 'newsmax_ruby_blog_layout_grid_5' ) ) {
	function newsmax_ruby_blog_layout_grid_5( $data_query, $options ) {

		$str  = '';
		$flag = false;
		if ( ! empty( $options['blog_1st_classic'] ) ) {
			$flag = true;
		}

		if ( empty( $options['blog_sidebar_position'] ) || 'none' == $options['blog_sidebar_position'] ) {
			$class_name = 'post-outer col-sm-3 col-xs-12';
		} else {
			$class_name = 'post-outer col-sm-4 col-xs-12';
		}

		$str .= '<div class="blog-listing-el">';
		while ( $data_query->have_posts() ) {
			$data_query->the_post();

			if ( true === $flag ) {

				if ( empty( $options['blog_1st_classic_layout'] ) || 'classic_1' == $options['blog_1st_classic_layout'] ) {
					$str .= '<div class="post-outer post-classic-1-outer col-xs-12">';
					$str .= newsmax_ruby_post_classic_1( $options );
					$str .= '</div>';
				} else {
					$str .= '<div class="post-outer post-classic-2-outer col-xs-12">';
					$str .= newsmax_ruby_post_classic_2( $options );
					$str .= '</div>';
				}

				$flag = false;

			} else {
				$str .= '<div class="' . esc_attr( $class_name ) . '">';
				$str .= newsmax_ruby_post_list_6( $options );
				$str .= '</div>';
			}
		}
		$str .= '</div>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $data_query
 * @param $options
 *
 * @return string
 * render blog list 1
 */
if ( ! function_exists( 'newsmax_ruby_blog_layout_list_1' ) ) {
	function newsmax_ruby_blog_layout_list_1( $data_query, $options ) {

		$str  = '';
		$flag = false;
		if ( ! empty( $options['blog_1st_classic'] ) ) {
			$flag = true;
		}

		$str .= '<div class="blog-listing-el">';
		while ( $data_query->have_posts() ) {
			$data_query->the_post();

			if ( true === $flag ) {
				if ( empty( $options['blog_1st_classic_layout'] ) || 'classic_1' == $options['blog_1st_classic_layout'] ) {
					$str .= '<div class="post-outer post-classic-1-outer col-xs-12">';
					$str .= newsmax_ruby_post_classic_1( $options );
					$str .= '</div>';
				} else {
					$str .= '<div class="post-outer post-classic-2-outer col-xs-12">';
					$str .= newsmax_ruby_post_classic_2( $options );
					$str .= '</div>';
				}

				$flag = false;

			} else {
				$str .= '<div class="post-outer col-xs-12">';
				$str .= newsmax_ruby_post_list_2( $options );
				$str .= '</div>';
			}
		}
		$str .= '</div>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $data_query
 * @param $options
 *
 * @return string
 * render blog list 2
 */
if ( ! function_exists( 'newsmax_ruby_blog_layout_list_2' ) ) {
	function newsmax_ruby_blog_layout_list_2( $data_query, $options ) {

		$str  = '';
		$flag = false;
		if ( ! empty( $options['blog_1st_classic'] ) ) {
			$flag = true;
		}

		$str .= '<div class="blog-listing-el">';
		while ( $data_query->have_posts() ) {
			$data_query->the_post();

			if ( true === $flag ) {

				if ( empty( $options['blog_1st_classic_layout'] ) || 'classic_1' == $options['blog_1st_classic_layout'] ) {
					$str .= '<div class="post-outer post-classic-1-outer col-xs-12">';
					$str .= newsmax_ruby_post_classic_1( $options );
					$str .= '</div>';
				} else {
					$str .= '<div class="post-outer post-classic-2-outer col-xs-12">';
					$str .= newsmax_ruby_post_classic_2( $options );
					$str .= '</div>';
				}

				$flag = false;

			} else {
				$str .= '<div class="post-outer col-xs-12">';
				$str .= newsmax_ruby_post_list_3( $options );
				$str .= '</div>';
			}
		}
		$str .= '</div>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $data_query
 * @param $options
 *
 * @return string
 * render blog list 3
 */
if ( ! function_exists( 'newsmax_ruby_blog_layout_list_3' ) ) {
	function newsmax_ruby_blog_layout_list_3( $data_query, $options ) {

		$str  = '';
		$flag = false;
		if ( ! empty( $options['blog_1st_classic'] ) ) {
			$flag = true;
		}

		$str .= '<div class="blog-listing-el">';
		while ( $data_query->have_posts() ) {
			$data_query->the_post();

			if ( true === $flag ) {

				if ( empty( $options['blog_1st_classic_layout'] ) || 'classic_1' == $options['blog_1st_classic_layout'] ) {
					$str .= '<div class="post-outer post-classic-1-outer col-xs-12">';
					$str .= newsmax_ruby_post_classic_1( $options );
					$str .= '</div>';
				} else {
					$str .= '<div class="post-outer post-classic-2-outer col-xs-12">';
					$str .= newsmax_ruby_post_classic_2( $options );
					$str .= '</div>';
				}

				$flag = false;

			} else {
				$str .= '<div class="post-outer col-xs-12">';
				$str .= newsmax_ruby_post_list_7( $options );
				$str .= '</div>';
			}
		}
		$str .= '</div>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * render archive title
 */
if ( ! function_exists( 'newsmax_ruby_title_page_archive' ) ) {
	function newsmax_ruby_title_page_archive() {

		$str = '';
		$str .= '<h1 class="archive-title post-title"><span>';

		if ( is_category() ) :
			$str .= single_cat_title( '', false );
		elseif ( is_tag() ) :
			$str .= sprintf( newsmax_ruby_translate( 'archives_tag' ), single_tag_title( '', false ) );
		elseif ( is_author() ) :
			$str .= get_the_author();
		elseif ( is_day() ) :
			$str .= sprintf( newsmax_ruby_translate( 'archives_day' ), get_the_date() );
		elseif ( is_month() ) :
			$str .= sprintf( newsmax_ruby_translate( 'archives_month' ), get_the_date( 'F Y' ) );
		elseif ( is_year() ) :
			$str .= sprintf( newsmax_ruby_translate( 'archives_year' ), get_the_date( 'Y' ) );
		else :
			$str .= newsmax_ruby_translate( 'archives' );
		endif;

		$str .= '</span></h1>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * render category page title
 */
if ( ! function_exists( 'newsmax_ruby_title_page_category' ) ) {
	function newsmax_ruby_title_page_category() {

		$cat_id   = newsmax_ruby_get_cat_id();
		$cat_name = get_cat_name( $cat_id );
		$cat_desc = category_description();

		$str = '';
		$str .= '<h1 class="archive-title cat-title post-title is-size-2"><span>' . esc_html( $cat_name ) . '</span></h1>';
		if ( ! empty( $cat_desc ) ) {
			$str .= '<div class="archive-description">' . html_entity_decode( esc_html( $cat_desc ) ) . '</div>';
		}

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render search page title
 */
if ( ! function_exists( 'newsmax_ruby_title_page_search' ) ) {
	function newsmax_ruby_title_page_search() {

		$str = '';
		$str .= '<h1 class="archive-title post-title"><span>';
		$str .= sprintf( newsmax_ruby_translate( 'search_result_for' ), get_search_query() );
		$str .= '</span></h1>';

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render search page author
 */
if ( ! function_exists( 'newsmax_ruby_title_page_author' ) ) {
	function newsmax_ruby_title_page_author() {

		$str = '';
		$str .= '<h1 class="archive-title post-title"><span>';
		$str .= get_the_author();
		$str .= '</span></h1>';

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return bool
 * blog columns
 */
if ( ! function_exists( 'newsmax_ruby_blog_index_column' ) ) {
	function newsmax_ruby_blog_index_column() {

		$str            = '';
		$column_counter = 0;
		$check_column   = false;

		if ( is_active_sidebar( 'newsmax_ruby_blog_column_1' ) ) {
			$column_counter ++;
			$check_column = true;
		}

		if ( is_active_sidebar( 'newsmax_ruby_blog_column_2' ) ) {
			$column_counter ++;
			$check_column = true;
		}

		if ( is_active_sidebar( 'newsmax_ruby_blog_column_3' ) ) {
			$column_counter ++;
			$check_column = true;
		}

		$class_name   = array();
		$class_name[] = 'promo-el';
		if ( 1 == $column_counter ) {
			$class_name[] = 'col-xs-12';
		} elseif ( 2 == $column_counter ) {
			$class_name[] = 'col-sm-6 col-xs-12';
		} elseif ( 3 == $column_counter ) {
			$class_name[] = 'col-sm-4 col-xs-12';
		}

		$class_name = implode( ' ', $class_name );

		if ( true == $check_column ) {
			$str .= '<div class="promo-wrap">';
			$str .= '<div class="ruby-container">';
			$str .= '<div class="promo-inner row">';

			if ( is_active_sidebar( 'newsmax_ruby_blog_column_1' ) ) {
				$str .= '<div class="' . esc_attr( $class_name ) . '">';
				ob_start();
				dynamic_sidebar( 'newsmax_ruby_blog_column_1' );
				$str .= ob_get_clean();
				$str .= '</div>';
			}

			if ( is_active_sidebar( 'newsmax_ruby_blog_column_2' ) ) {
				$str .= '<div class="' . esc_attr( $class_name ) . '">';
				ob_start();
				dynamic_sidebar( 'newsmax_ruby_blog_column_2' );
				$str .= ob_get_clean();
				$str .= '</div>';
			}

			if ( is_active_sidebar( 'newsmax_ruby_blog_column_3' ) ) {
				$str .= '<div class="' . esc_attr( $class_name ) . '">';
				ob_start();
				dynamic_sidebar( 'newsmax_ruby_blog_column_3' );
				$str .= ob_get_clean();
				$str .= '</div>';
			}

			$str .= '</div>';
			$str .= '</div>';
			$str .= '</div>';
		}

		return $str;
	}
}
