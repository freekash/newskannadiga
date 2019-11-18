<?php

/**-------------------------------------------------------------------------------------------------------------------------
 * @param $block
 * @param $feat_style
 *
 * @return string
 * render featured area
 */
if ( ! function_exists( 'newsmax_ruby_blog_feat_layout' ) ) {
	function newsmax_ruby_blog_feat_layout( $block, $feat_style ) {
		switch ( $feat_style ) {
			case '1' :
				return newsmax_ruby_fw_block_1::render( $block );
			case '2' :
				return newsmax_ruby_fw_block_2::render( $block );
			case '3' :
				return newsmax_ruby_fw_block_3::render( $block );
			case '4' :
				return newsmax_ruby_fw_block_4::render( $block );
			case '5' :
				return newsmax_ruby_fw_block_5::render( $block );
			case '6' :
				return newsmax_ruby_fw_block_6::render( $block );
			case '7' :
				return newsmax_ruby_fw_block_7::render( $block );
			case '8' :
				return newsmax_ruby_fw_block_8::render( $block );
			case '9' :
				return newsmax_ruby_fw_block_9::render( $block );
			case '10' :
				return newsmax_ruby_fw_block_10::render( $block );
			case '11' :
				return newsmax_ruby_fw_block_11::render( $block );
			case '12' :
				return newsmax_ruby_fw_block_12::render( $block );
			default :
				return false;
		}
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render featured for blog index
 */
if ( ! function_exists( 'newsmax_ruby_blog_index_feat' ) ) {
	function newsmax_ruby_blog_index_feat() {

		$feat_style = newsmax_ruby_get_option( 'blog_index_feat_style' );

		if ( empty( $feat_style ) || 'none' == $feat_style ) {
			return false;
		}

		$block                  = array();
		$block['block_options'] = array();
		$block['block_id']      = 'ruby-feat-index';

		$block['block_options']['category_ids']    = newsmax_ruby_get_option( 'blog_index_feat_cat' );
		$block['block_options']['offset']          = newsmax_ruby_get_option( 'blog_index_feat_offset' );
		$block['block_options']['grid_style']      = newsmax_ruby_get_option( 'blog_index_feat_grid_style' );
		$block['block_options']['cat_info']        = newsmax_ruby_get_option( 'blog_index_feat_cat_info' );
		$block['block_options']['meta_info']       = newsmax_ruby_get_option( 'blog_index_feat_meta_info' );
		$block['block_options']['share']           = newsmax_ruby_get_option( 'blog_index_feat_share' );
		$block['block_options']['slides_per_page'] = newsmax_ruby_get_option( 'blog_index_feat_slides_per_page' );
		$block['block_options']['orderby']         = newsmax_ruby_get_option( 'blog_index_feat_orderby' );


		$feat_tag = newsmax_ruby_get_option( 'blog_index_feat_tag' );
		if ( ! empty( $feat_tag ) && is_array( $feat_tag ) ) {
			$block['block_options']['tag_in'] = $feat_tag;
		}

		switch ( $feat_style ) {
			case 1 :
				$block['block_name'] = 'newsmax_ruby_fw_block_1';
				break;
			case '2' :
				$block['block_name'] = 'newsmax_ruby_fw_block_2';
				break;
			case '3' :
				$block['block_name'] = 'newsmax_ruby_fw_block_3';
				break;
			case '4' :
				$block['block_name'] = 'newsmax_ruby_fw_block_4';
				break;
			case '5' :
				$block['block_name']                      = 'newsmax_ruby_fw_block_5';
				$block['block_options']['posts_per_page'] = newsmax_ruby_get_option( 'blog_index_feat_slides_per_page' );
				break;
			case '6' :
				$block['block_name']                      = 'newsmax_ruby_fw_block_6';
				$block['block_options']['posts_per_page'] = newsmax_ruby_get_option( 'blog_index_feat_slides_per_page' );
				break;
			case '7' :
				$block['block_name'] = 'newsmax_ruby_fw_block_7';
				break;
			case '8' :
				$block['block_name'] = 'newsmax_ruby_fw_block_8';
				break;
			case '9' :
				$block['block_name'] = 'newsmax_ruby_fw_block_9';
				break;
			case '10' :
				$block['block_name'] = 'newsmax_ruby_fw_block_10';
				break;
			case '11' :
				$block['block_name']                      = 'newsmax_ruby_fw_block_11';
				$block['block_options']['posts_per_page'] = newsmax_ruby_get_option( 'blog_index_feat_slides_per_page' );
				break;
			case '12' :
				$block['block_name']                      = 'newsmax_ruby_fw_block_12';
				$block['block_options']['posts_per_page'] = newsmax_ruby_get_option( 'blog_index_feat_slides_per_page' );
				break;
		}

		return newsmax_ruby_blog_feat_layout( $block, $feat_style );
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render featured for category page
 */
if ( ! function_exists( 'newsmax_ruby_category_feat' ) ) {
	function newsmax_ruby_category_feat() {

		$category_id      = newsmax_ruby_get_cat_id();
		$category_cf_feat = get_option( 'newsmax_ruby_category_option_feat' ) ? get_option( 'newsmax_ruby_category_option_feat' ) : array();
		if ( array_key_exists( $category_id, $category_cf_feat ) ) {
			$category_cf_feat = $category_cf_feat[ $category_id ];
		}

		if ( ! empty( $category_cf_feat['category_feat_style'] ) && 'default' != $category_cf_feat['category_feat_style'] ) {
			$feat_style = $category_cf_feat['category_feat_style'];
		} else {
			$feat_style = newsmax_ruby_get_option( 'category_feat_style' );
		}

		//check
		if ( empty( $feat_style ) || 'none' == $feat_style ) {
			return false;
		}

		$block                  = array();
		$block['block_options'] = array();
		$block['block_id']      = 'ruby-feat-index';

		$block['block_options']['category_id'] = $category_id;

		if ( ! empty( $category_cf_feat['category_feat_offset'] ) && '-1' != $category_cf_feat['category_feat_offset'] ) {
			$block['block_options']['offset'] = $category_cf_feat['category_feat_offset'];
		} else {
			$block['block_options']['offset'] = newsmax_ruby_get_option( 'category_feat_offset' );
		}

		if ( ! empty( $category_cf_feat['category_feat_grid_style'] ) && 'default' != $category_cf_feat['category_feat_grid_style'] ) {
			$block['block_options']['grid_style'] = $category_cf_feat['category_feat_grid_style'];
		} else {
			$block['block_options']['grid_style'] = newsmax_ruby_get_option( 'category_feat_grid_style' );
		}

		if ( ! empty( $category_cf_feat['category_feat_slides_per_page'] ) ) {
			$block['block_options']['slides_per_page'] = $category_cf_feat['category_feat_slides_per_page'];
		} else {
			$block['block_options']['slides_per_page'] = newsmax_ruby_get_option( 'category_feat_slides_per_page' );;
		}

		if ( ! empty( $category_cf_feat['category_feat_orderby'] ) && 'default' != $category_cf_feat['category_feat_orderby'] ) {
			$block['block_options']['orderby'] = $category_cf_feat['category_feat_orderby'];
		} else {
			$block['block_options']['orderby'] = newsmax_ruby_get_option( 'category_feat_orderby' );
		}

		$block['block_options']['cat_info']  = newsmax_ruby_get_option( 'category_feat_cat_info' );
		$block['block_options']['meta_info'] = newsmax_ruby_get_option( 'category_feat_meta_info' );
		$block['block_options']['share']     = newsmax_ruby_get_option( 'category_feat_share' );


		$feat_tag = newsmax_ruby_get_option( 'category_feat_tag' );
		if ( ! empty( $feat_tag ) && is_array( $feat_tag ) ) {
			$block['block_options']['tag_in'] = $feat_tag;
		}

		switch ( $feat_style ) {
			case 1 :
				$block['block_name'] = 'newsmax_ruby_fw_block_1';
				break;
			case '2' :
				$block['block_name'] = 'newsmax_ruby_fw_block_2';
				break;
			case '3' :
				$block['block_name'] = 'newsmax_ruby_fw_block_3';
				break;
			case '4' :
				$block['block_name'] = 'newsmax_ruby_fw_block_4';
				break;
			case '5' :
				$block['block_name']                      = 'newsmax_ruby_fw_block_5';
				$block['block_options']['posts_per_page'] = $block['block_options']['slides_per_page'];
				break;
			case '6' :
				$block['block_name']                      = 'newsmax_ruby_fw_block_6';
				$block['block_options']['posts_per_page'] = $block['block_options']['slides_per_page'];
				break;
			case '7' :
				$block['block_name'] = 'newsmax_ruby_fw_block_7';
				break;
			case '8' :
				$block['block_name'] = 'newsmax_ruby_fw_block_8';
				break;
			case '9' :
				$block['block_name'] = 'newsmax_ruby_fw_block_9';
				break;
			case '10' :
				$block['block_name'] = 'newsmax_ruby_fw_block_10';
				break;
			case '11' :
				$block['block_name']                      = 'newsmax_ruby_fw_block_11';
				$block['block_options']['posts_per_page'] = $block['block_options']['slides_per_page'];
				break;
			case '12' :
				$block['block_name']                      = 'newsmax_ruby_fw_block_12';
				$block['block_options']['posts_per_page'] = $block['block_options']['slides_per_page'];
				break;
		}

		return newsmax_ruby_blog_feat_layout( $block, $feat_style );
	}
}