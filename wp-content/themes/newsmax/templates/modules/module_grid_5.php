<?php

/**-------------------------------------------------------------------------------------------------------------------------
 * @param $options
 *
 * @return string
 * newsmax_ruby_post_grid_5 (widget posts)
 */
if ( ! function_exists( 'newsmax_ruby_post_grid_5' ) ) {
	function newsmax_ruby_post_grid_5( $options = array() ) {
		$str = '';
		$str .= '<div class="post-wrap post-grid post-grid-5">';
		//render thumbnail
		if ( has_post_thumbnail() ) {

			$smooth_style = newsmax_ruby_post_check_smooth_display_style();
			if ( empty( $smooth_style ) ) {
				$str .= '<div class="post-thumb-outer">';
			} else {
				$str .= '<div class="post-thumb-outer ruby-animated-image ' . esc_attr( $smooth_style ) . '">';
			}
			$str .= newsmax_ruby_post_thumb( array( 'size' => 'newsmax_ruby_crop_272x170' ) );
			$str .= '</div>';
		}
		$str .= '<div class="post-body">';
		$str .= newsmax_ruby_post_title( 'is-size-4' );
		$str .= '</div>';
		$str .= '</div>';

		return $str;
	}
}