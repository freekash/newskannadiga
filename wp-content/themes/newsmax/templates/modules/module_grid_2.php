<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param $options
 *
 * @return string
 * render post grid 2 (default grid)
 */
if ( ! function_exists( 'newsmax_ruby_post_grid_2' ) ) {
	function newsmax_ruby_post_grid_2( $options = array() ) {

		$review = newsmax_ruby_post_review_icon();

		$str = '';
		$str .= '<article class="post-wrap post-grid post-grid-2">';
		$str .= '<div class="post-header">';

		if ( has_post_thumbnail() ) {

			$smooth_style = newsmax_ruby_post_check_smooth_display_style();
			if ( empty( $smooth_style ) ) {
				$str .= '<div class="post-thumb-outer">';
			} else {
				$str .= '<div class="post-thumb-outer ruby-animated-image ' . esc_attr( $smooth_style ) . '">';
			}

			$str .= newsmax_ruby_post_thumb( array( 'size' => 'newsmax_ruby_crop_364x225' ) );
			if ( ! empty( $options['cat_info'] ) ) {
				$str .= newsmax_ruby_post_mask_overlay();
				$str .= newsmax_ruby_post_cat_info( 'is-absolute is-light-text' );
			}
			if ( ! empty( $options['share'] ) ) {
				$str .= newsmax_ruby_post_meta_info_share();
			}
			if ( ! empty( $review ) ) {
				$str .= $review;
			} else {
				$str .= newsmax_ruby_post_meta_info_media_duration();
			}
			$str .= newsmax_ruby_post_format();
			$str .= '</div><!--#thumb outer-->';
		}
		$str .= '</div>';

		$str .= '<div class="post-body">';
		$str .= newsmax_ruby_post_title();
		if ( ! empty( $options['meta_info'] ) ) {
			$str .= newsmax_ruby_post_meta_info();
		}
		if ( ! empty( $options['excerpt'] ) ) {
			$str .= newsmax_ruby_post_excerpt( $options['excerpt'] );
		}
		$str .= newsmax_ruby_post_readmore();
		$str .= '</div><!--#post body-->';
		$str .= '</article>';

		return $str;
	}
}
