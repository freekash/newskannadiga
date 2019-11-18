<?php

/**-------------------------------------------------------------------------------------------------------------------------
 * @param $pagination_style
 *
 * @return string|void
 * render blog pagination
 */
if ( ! function_exists( 'newsmax_ruby_blog_pagination' ) ) {
	function newsmax_ruby_blog_pagination( $style ) {
		switch ( $style ) {
			case 'next_prev' :
				return newsmax_ruby_blog_pagination_next_prev();
			case 'loadmore' :
				return newsmax_ruby_blog_pagination_loadmore();
			case 'infinite_scroll' :
				return newsmax_ruby_blog_pagination_infinite_scroll();
			default :
				return newsmax_ruby_blog_pagination_number();
		}
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param null $data_query
 * @param int $offset
 *
 * @return string
 * render pagination number
 */
if ( ! function_exists( 'newsmax_ruby_blog_pagination_number' ) ) {
	function newsmax_ruby_blog_pagination_number( $data_query = null, $offset = 0 ) {
		global $wp_rewrite;

		if ( ! empty( $data_query ) ) {
			$data = $data_query;
		} else {
			global $wp_query;
			$data = $wp_query;
		}

		if ( is_single() || ( $data->max_num_pages < 2 ) ) {
			return false;
		}

		$str = '';
		$str .= '<div class="blog-pagination pagination-number">';

		$current = 1;
		$total = $data->max_num_pages;
		if ( $data->query_vars['paged'] > 1 ) {
			$current = $data->query_vars['paged'];
		}

		if ( ! empty( $offset ) ) {
			$post_per_page = $data->query_vars['posts_per_page'];
			$total         = $data->max_num_pages - floor( $offset / $post_per_page );
			$found_posts   = $data->found_posts;
			if ( $found_posts < ( $total * $post_per_page ) ) {
				$total = $total - 1;
			}
		}

		$pagination = array(
			'total'     => $total,
			'current'   => $current,
			'end_size'  => 1,
			'mid_size'  => 1,
			'prev_text' => '<i class="icon-simple icon-arrow-left"></i>',
			'next_text' => '<i class="icon-simple icon-arrow-right"></i>',
			'type'      => 'plain'
		);
		if ( ! empty( $data->query_vars['s'] ) ) {
			$pagination['add_args'] = array( 's' => urlencode( get_query_var( 's' ) ) );
		}
		$str .= '<div class="pagination-number">';
		$str .= paginate_links( $pagination );
		$str .= '</div>';

		$str .= '<div class="pagination-desc">';
		$str .= '<span>' . esc_html__( 'Page', 'newsmax' ) . ' ' . $pagination['current'] . ' ' . newsmax_ruby_translate( 'of' ) . ' ' . $pagination['total'] . '</span>';
		$str .= '</div>';
		$str .= '</div>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $data_query
 *
 * @return string
 * next prev pagination
 */
if ( ! function_exists( 'newsmax_ruby_blog_pagination_next_prev' ) ) {
	function newsmax_ruby_blog_pagination_next_prev( $data_query = null ) {

		if ( ! empty( $data_query ) ) {
			$data = $data_query;
		} else {
			global $wp_query;
			$data = $wp_query;
		}

		if ( is_single() || ( $data->max_num_pages < 2 ) ) {
			return false;
		}

		$str = '';
		$str .= '<div class="blog-pagination pagination-next-prev">';
		$str .= '<div class="newer">' . get_previous_posts_link( '<i class="icon-simple icon-arrow-left"></i>' . newsmax_ruby_translate('newer_posts') , $data->max_num_pages ) . '</div>';
		$str .= '<div class="older">' . get_next_posts_link( newsmax_ruby_translate('older_posts') . '<i class="icon-simple icon-arrow-right"></i>', $data->max_num_pages ) . '</div>';
		$str .= '</div>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * pagination loadmore
 */
if ( ! function_exists( 'newsmax_ruby_blog_pagination_loadmore' ) ) {
	function newsmax_ruby_blog_pagination_loadmore( $data_query = null ) {

		//check query
		if ( ! empty( $data_query ) ) {
			$data = $data_query;
		} else {
			global $wp_query;
			$data = $wp_query;
		}

		if ( is_single() || ( $data->max_num_pages < 2 ) ) {
			return false;
		}

		$str = '';

		$str .= '<div class="ruby-overflow"></div>';
		$str .= '<div class="blog-pagination ajax-pagination ajax-loadmore clearfix">';
		$str .= '<a href="#" class="blog-loadmore-link ajax-link"><span>' . newsmax_ruby_translate('loadmore') . '</span></a>';
		$str .= '<div class="ajax-animation"><span class="ajax-animation-icon"></span></div>';
		$str .= '</div>';

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * pagination infinite scroll
 */
if ( ! function_exists( 'newsmax_ruby_blog_pagination_infinite_scroll' ) ) {
	function newsmax_ruby_blog_pagination_infinite_scroll( $data_query = null ) {

		//check query
		if ( ! empty( $data_query ) ) {
			$data = $data_query;
		} else {
			global $wp_query;
			$data = $wp_query;
		}

		if ( is_single() || ( $data->max_num_pages < 2 ) ) {
			return false;
		}

		$str = '';
		$str .= '<div class="ruby-overflow"></div>';
		$str .= '<div class="blog-pagination pagination-infinite-scroll clearfix">';
		$str .= '<div class="ajax-animation"><span class="ajax-animation-icon"></span></div>';
		$str .= '</div>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * single pagination
 */
if ( ! function_exists( 'newsmax_ruby_pagination_single' ) ) {
	function newsmax_ruby_pagination_single() {

		global $post;

		return wp_link_pages(
			array(
				'before'      => '<div class="single-page-links"><div class="pagination-num">',
				'after'       => '</div></div>',
				'link_before' => '<span class="page-numbers">',
				'link_after'  => '</span>',
				'echo'        => false
			)
		);
	}
}