<?php
if ( ! function_exists( 'newsmax_ruby_composer_blog_layout' ) ) {
	function newsmax_ruby_composer_blog_layout() {

		$post_id = get_the_ID();

		$composer_blog = get_post_meta( $post_id, 'newsmax_ruby_composer_blog', true );

		if ( empty( $composer_blog ) ) {
			return false;
		}

		//get page
		$get_paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
		$get_page  = get_query_var( 'page' ) ? get_query_var( 'page' ) : 1;
		if ( $get_paged > $get_page ) {
			$paged = $get_paged;
		} else {
			$paged = $get_page;
		}

		$options = array();

		$options['title']       = esc_html( get_post_meta( $post_id, 'newsmax_ruby_composer_blog_title', true ) );
		$options['blog_layout'] = get_post_meta( $post_id, 'newsmax_ruby_composer_blog_layout', true );
		if ( empty( $options['blog_layout'] ) ) {
			$options['blog_layout'] = 'classic_1';
		}

		$options['blog_1st_classic']        = get_post_meta( $post_id, 'newsmax_ruby_composer_blog_1st_classic', true );
		$options['blog_1st_classic_layout'] = get_post_meta( $post_id, 'newsmax_ruby_composer_blog_1st_style', true );

		$options['category_ids']   = esc_attr( get_post_meta( $post_id, 'newsmax_ruby_composer_blog_category', true ) );
		$options['posts_per_page'] = esc_attr( get_post_meta( $post_id, 'newsmax_ruby_composer_blog_number', true ) );
		if ( empty( $options['posts_per_page'] ) ) {
			$options['posts_per_page'] = get_option( 'posts_per_page' );
		}

		$options['offset']          = get_post_meta( $post_id, 'newsmax_ruby_composer_blog_offset', true );
		$options['blog_pagination'] = get_post_meta( $post_id, 'newsmax_ruby_composer_blog_pagination', true );
		if ( empty( $options['blog_pagination'] ) ) {
			$options['blog_pagination'] = 'number';
		}

		$options['blog_sidebar_name'] = get_post_meta( $post_id, 'newsmax_ruby_composer_blog_sidebar_name', true );
		if ( empty( $options['blog_sidebar_name'] ) ) {
			$options['blog_sidebar_name'] = 'newsmax_ruby_sidebar_default';
		}

		$options['blog_sidebar_position'] = get_post_meta( $post_id, 'newsmax_ruby_composer_blog_sidebar_position', true );
		if ( empty( $options['blog_sidebar_position'] ) ) {
			$options['blog_sidebar_position'] = 'right';
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

		//blog style
		if ( ( 'classic_2' == $options['blog_layout'] || 'list_1' == $options['blog_layout'] || 'list_2' == $options['blog_layout'] || 'list_3' == $options['blog_layout'] || ! empty( $options['blog_1st_classic'] ) ) ) {
			$options['block_style'] = newsmax_ruby_get_option( 'blog_style_classic_2' );
		}

		//setup thumbnail
		if ( ! empty( $options['blog_sidebar_position'] ) && 'none' == $options['blog_sidebar_position'] ) {
			if ( 'classic_1' == $options['blog_layout'] || 'classic_2' == $options['blog_layout'] || 1 == $options['blog_1st_classic'] ) {
				$options['classic_wide'] = 1;
			}
		}

		//get data query
		$data_query = newsmax_ruby_query::get_data( $options, $paged );

		//check empty
		if ( ! $data_query->have_posts() ) {
			return false;
		}

		//class name
		$class_name   = array();
		$class_name[] = 'blog-wrap';
		$class_name[] = 'is-' . esc_attr( $options['blog_layout'] );
		if ( ! empty( $options['blog_1st_classic'] ) ) {
			$class_name[] = 'has-1st-classic';
		} else {
			$class_name[] = 'no-1st-classic';
		}

		$class_name = implode( ' ', $class_name );

		//render
		$str = '';
		$str .= newsmax_ruby_page_open( $class_name, $options['blog_sidebar_position'] );
		$str .= newsmax_ruby_page_content_open( 'blog-inner', $options['blog_sidebar_position'] );

		//blog title
		if ( ! empty( $options['title'] ) ) {
			$str .= '<div class="block-header-wrap">';
			$str .= '<div class="block-header-inner">';
			$str .= '<div class="block-title">';
			$str .= '<h3>' . esc_html( $options['title'] ) . '</h3>';
			$str .= '</div>';
			$str .= '</div>';
			$str .= '</div>';
		}

		$str .= '<div class="blog-listing-wrap">';

		switch ( $options['blog_layout'] ) {
			case 'classic_1' :
				$str .= newsmax_ruby_blog_layout_classic_1( $data_query, $options );
				break;

			case 'classic_2' :
				$str .= newsmax_ruby_blog_layout_classic_2( $data_query, $options );
				break;

			case 'grid_1' :
				$str .= newsmax_ruby_blog_layout_grid_1( $data_query, $options );
				break;

			case 'grid_2' :
				$str .= newsmax_ruby_blog_layout_grid_2( $data_query, $options );
				break;

			case 'grid_3' :
				$str .= newsmax_ruby_blog_layout_grid_3( $data_query, $options );
				break;

			case 'grid_4' :
				$str .= newsmax_ruby_blog_layout_grid_4( $data_query, $options );
				break;

			case 'grid_5' :
				$str .= newsmax_ruby_blog_layout_grid_5( $data_query, $options );
				break;

			case 'list_1' :
				$str .= newsmax_ruby_blog_layout_list_1( $data_query, $options );
				break;

			case 'list_2' :
				$str .= newsmax_ruby_blog_layout_list_2( $data_query, $options );
				break;

			case 'list_3' :
				$str .= newsmax_ruby_blog_layout_list_3( $data_query, $options );
				break;
		}

		$str .= '</div>';

		//pagination
		if ( $data_query->max_num_pages > 1 ) {
			if ( 'next_prev' == $options['blog_pagination'] ) {
				$str .= newsmax_ruby_blog_pagination_next_prev( $data_query );
			} else {
				$str .= newsmax_ruby_blog_pagination_number( $data_query, $options['offset'] );
			}
		}

		$str .= newsmax_ruby_page_content_close();
		if ( ! empty( $options['blog_sidebar_position'] ) && 'none' != $options['blog_sidebar_position'] ) {
			$str .= newsmax_ruby_page_sidebar( $options['blog_sidebar_name'] );
		};

		$str .= newsmax_ruby_page_close();

		return $str;

	}
}
