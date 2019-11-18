<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * newsmax_ruby_single_post_box_recommended
 */
if ( ! function_exists( 'newsmax_ruby_single_post_box_recommended' ) ) {
	function newsmax_ruby_single_post_box_recommended() {

		$check = newsmax_ruby_get_option( 'single_post_box_recommended' );
		if ( empty( $check ) ) {
			return false;
		}

		$data_query = newsmax_ruby_recommended_get( get_the_ID() );
		if ( ! $data_query->have_posts() ) {
			return false;
		}

		$title  = newsmax_ruby_get_option( 'single_post_box_recommended_title' );
		$layout = newsmax_ruby_get_option( 'single_post_box_recommended_layout' );

		if ( empty( $layout ) ) {
			$layout = 1;
		}

		$options                    = array();
		$options['related_layout']  = $layout;
		$options['related_post_id'] = get_the_ID();
		$options['cat_info']        = newsmax_ruby_get_option( 'blog_cat_info' );
		$options['meta_info']       = newsmax_ruby_get_option( 'blog_meta_info' );
		$options['share']           = newsmax_ruby_get_option( 'blog_share' );
		$options['excerpt']         = newsmax_ruby_get_option( 'blog_excerpt' );

		$class_name   = array();
		$class_name[] = 'box-recommended ruby-block-wrap clearfix';
		if ( 1 == $layout ) {
			$class_name[] = 'fw-block-grid-1 box-recommended-1';
		} else {
			$class_name[] = 'fw-block-grid-3 box-recommended-2';
		}
		$class_name = implode( ' ', $class_name );

		//render
		$str = '';
		$str .= '<div class="' . esc_attr( $class_name ) . '">';
		$str .= '<div class="ruby-block-inner ruby-container">';
		$str .= '<div class="box-recommended-header block-header-wrap">';
		$str .= '<div class="block-header-inner">';
		$str .= '<div class="block-title">';
		$str .= '<h3>' . esc_html( $title ) . '</h3>';
		$str .= '</div>';
		$str .= '</div>';
		$str .= '</div>';
		$str .= '<div class="block-content-wrap">';
		$str .= '<div class="block-content-inner">';
		switch ( $layout ) {
			case '1' :
				$str .= newsmax_ruby_recommended_layout_grid_1( $data_query, $options );
				break;
			case '2' :
				$str .= newsmax_ruby_recommended_layout_grid_2( $data_query, $options );
				break;
		}
		$str .= '</div>';
		$str .= '</div>';
		$str .= '</div>';
		$str .= '</div>';

		wp_reset_postdata();

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param $data_query
 * @param array $options
 *
 * @return string
 * newsmax_ruby_recommended_layout_grid_1
 */
if ( ! function_exists( 'newsmax_ruby_recommended_layout_grid_1' ) ) {
	function newsmax_ruby_recommended_layout_grid_1( $data_query, $options = array() ) {

		$str = '';
		while ( $data_query->have_posts() ) {
			$data_query->the_post();

			$str .= '<div class="post-outer col-sm-4 col-xs-12">';
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
 * newsmax_ruby_recommended_layout_grid_2
 */
if ( ! function_exists( 'newsmax_ruby_recommended_layout_grid_2' ) ) {
	function newsmax_ruby_recommended_layout_grid_2( $data_query, $options = array() ) {

		$str = '';
		while ( $data_query->have_posts() ) {
			$data_query->the_post();

			$str .= '<div class="post-outer ruby-col-5">';
			$str .= newsmax_ruby_post_grid_3( $options );
			$str .= '</div>';
		}

		return $str;
	}
}