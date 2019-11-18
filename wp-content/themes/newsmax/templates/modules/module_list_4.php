<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render post list 4, small list with thumbnail
 */
if ( ! function_exists( 'newsmax_ruby_post_list_4' ) ) {
	function newsmax_ruby_post_list_4( $options = array() ) {

		$review = newsmax_ruby_post_review_icon( 'is-size-5 is-absolute' );

		$class_name   = array();
		$class_name[] = 'post-wrap post-list post-list-4 clearfix';
		if ( ! has_post_thumbnail() ) {
			$class_name[] = 'is-no-featured';
		}
		$class_name = implode( ' ', $class_name );

		$str = '';
		$str .= '<article class="' . esc_attr( $class_name ) . '">';
		if ( has_post_thumbnail() ) {

			$smooth_style = newsmax_ruby_post_check_smooth_display_style();
			if ( empty( $smooth_style ) ) {
				$str .= '<div class="post-thumb-outer">';
			} else {
				$str .= '<div class="post-thumb-outer ruby-animated-image ' . esc_attr( $smooth_style ) . '">';
			}
			$str .= newsmax_ruby_post_thumb( array( 'size' => 'newsmax_ruby_crop_100x65' ) );
			if ( ! empty( $review ) ) {
				$str .= $review;
			} else {
				$str .= newsmax_ruby_post_format( 'is-size-5 is-absolute' );
			}
			$str .= '</div>';
		}

		$str .= '<div class="post-body">';
		$str .= newsmax_ruby_post_title( 'is-size-4' );
		$str .= newsmax_ruby_post_meta_info( array( 'date' => true ), '', false );
		$str .= '</div>';

		$str .= '</article>';

		return $str;
	}
}

