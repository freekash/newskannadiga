<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param $options
 *
 * @return string
 * render post grid 3 (small grid)
 */
if ( ! function_exists( 'newsmax_ruby_post_grid_3' ) ) {
	function newsmax_ruby_post_grid_3( $options = array() ) {

		$review = newsmax_ruby_post_review_icon( 'is-size-4 is-absolute' );

		$str = '';
		$str .= '<article class="post-wrap post-grid post-grid-3">';
		$str .= '<div class="post-header">';
		//render thumbnail
		if ( has_post_thumbnail() ) {

			$smooth_style = newsmax_ruby_post_check_smooth_display_style();
			if ( empty( $smooth_style ) ) {
				$str .= '<div class="post-thumb-outer">';
			} else {
				$str .= '<div class="post-thumb-outer ruby-animated-image ' . esc_attr( $smooth_style ) . '">';
			}

			$param                = array();
			$param['size']        = 'newsmax_ruby_crop_272x170';
			$param['size_mobile_h'] = 'newsmax_ruby_crop_100x65';

			$str .= newsmax_ruby_post_thumb( $param );
			if ( ! empty( $options['cat_info'] ) ) {
				$str .= newsmax_ruby_post_mask_overlay();
				$str .= newsmax_ruby_post_cat_info( 'is-absolute is-light-text' );
			}
			//render post format icon & review
			if ( ! empty( $review ) ) {
				$str .= $review;
			} else {
				$str .= newsmax_ruby_post_meta_info_media_duration();
			}
			$str .= newsmax_ruby_post_format( 'is-size-4 is-absolute' );
			$str .= '</div>';
		}
		$str .= '</div><!--#post header-->';

		$str .= '<div class="post-body">';
		$str .= newsmax_ruby_post_title( 'is-size-4' );
		if ( ! empty( $options['meta_info'] ) ) {
			$str .= newsmax_ruby_post_meta_info( array( 'date' => true ), '', false );
		}
		$str .= '</div><!--#post body-->';

		$str .= '</article>';

		return $str;
	}
}


