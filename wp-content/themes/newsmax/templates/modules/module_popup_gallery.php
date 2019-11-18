<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * newsmax_ruby_post_popup_gallery (post popup gallery)
 */
if ( ! function_exists( 'newsmax_ruby_post_popup_gallery' ) ) {
	function newsmax_ruby_post_popup_gallery( $options = array() ) {

		$str = '';
		$str .= '<article class="post-wrap post-popup-gallery is-light-text">';
		$str .= '<div class="col-left col-sm-8 col-xs-12">';
		//render gallery
		if ( 'gallery' == get_post_format() ) {
			$str .= '<div class="post-thumb-outer post-thumb-gallery-outer">';
			$str .= newsmax_ruby_post_popup_thumbnail_gallery_slider();
			$str .= '</div>';
		} else {
			if ( has_post_thumbnail() ) {
				$str .= '<div class="post-thumb-outer post-thumb-featured-outer">';
				$str .= newsmax_ruby_post_popup_thumbnail_image();
				$str .= newsmax_ruby_post_format();
				$str .= newsmax_ruby_post_meta_info_media_duration();
				$str .= '</div>';
			}
		}
		$str .= '</div><!--#is left col -->';

		$str .= '<div class="col-right col-sm-4 col-xs-12">';
		$str .= '<div class="post-header">';
		if ( ! empty( $options['cat_info'] ) ) {
			$str .= newsmax_ruby_post_cat_info( 'is-relative' );
		}
		$str .= newsmax_ruby_post_title( 'is-size-2' );
		if ( ! empty( $options['meta_info'] ) ) {
			$str .= newsmax_ruby_post_meta_info();
		}
		if ( ! empty( $options['excerpt'] ) ) {
			$str .= newsmax_ruby_post_excerpt( $options['excerpt'] );
		}
		if ( ! empty( $options['share'] ) ) {
			$str .= newsmax_ruby_post_meta_info_share( 'is-relative is-light-hover' );
		}
		$str .= '</div><!--#post header-->';
		$str .= '</div><!--# right coll-->';
		$str .= '</article>';

		return $str;
	}
}

