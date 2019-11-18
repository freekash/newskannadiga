<?php

/**-------------------------------------------------------------------------------------------------------------------------
 * @param $options
 *
 * @return string
 * newsmax_ruby_post_grid_4 ( only thumbnail )
 */
if ( ! function_exists( 'newsmax_ruby_post_grid_4' ) ) {
	function newsmax_ruby_post_grid_4( $options = array() ) {
		$str = '';
		$str .= '<div class="post-wrap post-grid post-grid-4">';
		//render thumbnail
		if ( has_post_thumbnail() ) {


			if ( empty( $options['smooth_style_disable'] ) ) {
				$param['smooth_style'] = newsmax_ruby_post_check_smooth_display_style();
			}


			if ( empty( $smooth_style ) ) {
				$str .= '<div class="post-thumb-outer">';
			} else {
				$str .= '<div class="post-thumb-outer ruby-animated-image ' . esc_attr( $smooth_style ) . '">';
			}

			$str .= newsmax_ruby_post_thumb( array( 'size' => 'newsmax_ruby_crop_272x170' ) );
			$str .= '</div>';
		}
		$str .= '</div>';

		return $str;
	}
}
