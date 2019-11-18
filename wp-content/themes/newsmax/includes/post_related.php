<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param int $paged
 *
 * @return bool|WP_Query
 * get related data
 */
if ( ! function_exists( 'newsmax_ruby_related_get' ) ) {
	function newsmax_ruby_related_get( $post_id = '', $paged = 1 ) {
		$where          = newsmax_ruby_get_option( 'single_post_box_related_where' );
		$number_of_post = newsmax_ruby_get_option( 'single_post_box_related_num' );

		if ( empty( $post_id ) ) {
			$post_id = get_the_ID();
		}

		$data_cat = get_the_category( $post_id );
		$data_tag = get_the_tags( $post_id );

		//set query
		$param                   = array();
		$param['category_ids']   = '';
		$param['tags']           = '';
		$param['where']          = $where;
		$param['posts_per_page'] = intval( $number_of_post );

		if ( empty( $post_id ) ) {
			$param['post_not_in'] = get_the_ID();
		} else {
			$param['post_not_in'] = $post_id;
		}

		//get cat
		if ( ! empty( $data_cat ) ) {
			$cat_id = array();
			foreach ( $data_cat as $category ) {
				$cat_id[] = $category->term_id;
			}
			$param['category_ids'] = implode( ',', $cat_id );
		}

		//get cat
		if ( ! empty( $data_tag ) ) {
			$tag_name = array();
			foreach ( $data_tag as $tag ) {
				$tag_name[] = $tag->slug;
			}
			$param['tags'] = implode( ',', $tag_name );
		}

		//get query
		$data_query = newsmax_ruby_query::get_related( $param, $paged );

		return $data_query;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param array $options
 * @param int $paged
 *
 * @return bool|WP_Query
 * get video related data
 */
if ( ! function_exists( 'newsmax_ruby_related_video_get' ) ) {
	function newsmax_ruby_related_video_get( $options = array(), $paged = 1 ) {

		$where = newsmax_ruby_get_option( 'single_post_box_related_video_where' );

		if ( empty( $options['related_post_id'] ) ) {
			$post_id = get_the_ID();
		} else {
			$post_id = $options['related_post_id'];
		}

		$data_cat = get_the_category( $post_id );
		$data_tag = get_the_tags( $post_id );

		//set query
		$param                 = array();
		$param['category_ids'] = '';
		$param['tags']         = '';
		$param['where']        = $where;
		$param['post_not_in']  = $post_id;
		$param['post_format']  = 'video';

		if ( ! empty( $options['posts_per_page'] ) ) {
			$param['posts_per_page'] = $options['posts_per_page'];
		} else {
			$param['posts_per_page'] = 3;
		}

		//get cat
		if ( ! empty( $data_cat ) ) {
			$cat_id = array();
			foreach ( $data_cat as $category ) {
				$cat_id[] = $category->term_id;
			}
			$param['category_ids'] = implode( ',', $cat_id );
		}

		//get cat
		if ( ! empty( $data_tag ) ) {
			$tag_name = array();
			foreach ( $data_tag as $tag ) {
				$tag_name[] = $tag->slug;
			}
			$param['tags'] = implode( ',', $tag_name );
		}

		//get query
		$data_query = newsmax_ruby_query::get_related( $param, $paged );

		return $data_query;
	}
}


/**
 * @param string $post_id
 * get recommended posts
 */
if ( ! function_exists( 'newsmax_ruby_recommended_get' ) ) {
	function newsmax_ruby_recommended_get( $post_id = '' ) {

		if ( empty( $post_id ) ) {
			$post_id = get_the_ID();
		}

		$param                  = array();
		$param['category_ids']  = '';
		$param['tags']          = '';
		$param['post_not_in']   = $post_id;
		$param['no_found_rows'] = true;

		$cat            = newsmax_ruby_get_option( 'single_post_box_recommended_cat' );
		$tag            = newsmax_ruby_get_option( 'single_post_box_recommended_tag' );
		$orderby        = newsmax_ruby_get_option( 'single_post_box_recommended_orderby' );
		$number_of_post = newsmax_ruby_get_option( 'single_post_box_recommended_number' );
		$offset         = newsmax_ruby_get_option( 'single_post_box_recommended_offset' );

		if ( ! empty( $cat ) && 'cat' == $cat ) {
			$data_cat = get_the_category( $post_id );
			if ( ! empty( $data_cat ) ) {
				$cat_id = array();
				foreach ( $data_cat as $category ) {
					$cat_id[] = $category->term_id;
				}
				$param['category_ids'] = implode( ',', $cat_id );
			}
		}

		if ( 'tag' == $tag ) {
			$data_tag = get_the_tags( $post_id );
			if ( ! empty( $data_tag ) ) {
				$tag_name = array();
				foreach ( $data_tag as $tag ) {
					$tag_name[] = $tag->slug;
				}
				$param['tags'] = implode( ',', $tag_name );
			}
		}

		if ( ! empty( $orderby ) ) {
			$param['orderby'] = $orderby;
		}

		if ( ! empty( $number_of_post ) ) {
			$param['posts_per_page'] = intval( $number_of_post );
		} else {
			$param['posts_per_page'] = 9;
		}

		if ( ! empty( $offset ) ) {
			$param['offset'] = intval( $offset );
		}

		$data_query = newsmax_ruby_query::get_data( $param );

		return $data_query;
	}
}
