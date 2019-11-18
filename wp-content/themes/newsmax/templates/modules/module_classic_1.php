<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param $options
 *
 * @return string
 * newsmax_ruby_post_classic_1
 */
if ( ! function_exists( 'newsmax_ruby_post_classic_1' ) ) {
	function newsmax_ruby_post_classic_1( $options = array() ) {

		$review = newsmax_ruby_post_review_icon( 'is-size-2 is-absolute' );

		$class_name   = array();
		$class_name[] = 'post-wrap post-classic post-classic-1';
		if ( is_sticky() ) {
			$class_name[] = 'is-sticky-post';
		}
		$class_name = implode( ' ', $class_name );

		$str = '';
		$str .= '<article class="' . esc_attr( $class_name ) . '">';
		$str .= '<div class="post-header">';

		if ( has_post_thumbnail() ) {
			$smooth_style   = newsmax_ruby_post_check_smooth_display_style();
			$thumbnail_size = newsmax_ruby_get_option( 'thumbnail_size_classic' );

			if ( empty( $smooth_style ) ) {
				$str .= '<div class="post-thumb-outer">';
			} else {
				$str .= '<div class="post-thumb-outer ruby-animated-image ' . esc_attr( $smooth_style ) . '">';
			}

			if ( ! empty( $thumbnail_size ) && 2 == $thumbnail_size ) {
				if ( ! empty( $options['classic_wide'] ) ) {
					$str .= newsmax_ruby_post_thumb( array( 'size' => 'newsmax_ruby_crop_1100x580' ) );
				} else {
					$str .= newsmax_ruby_post_thumb( array( 'size' => 'newsmax_ruby_crop_750x350' ) );
				}
			} else {
				$str .= newsmax_ruby_post_thumb( array( 'size' => 'full' ) );
			}

			if ( ! empty( $options['share'] ) ) {
				$str .= newsmax_ruby_post_meta_info_share();
			}
			$str .= newsmax_ruby_post_format( 'is-size-2 is-absolute' );
			if ( ! empty( $review ) ) {
				$str .= $review;
			} else {
				$str .= newsmax_ruby_post_meta_info_media_duration();
			}
			$str .= '</div>';
		}

		$str .= '</div>';
		$str .= '<div class="post-body">';
		if ( ! empty( $options['cat_info'] ) ) {
			$str .= newsmax_ruby_post_cat_info( 'is-relative is-dark-text' );
		}
		$str .= newsmax_ruby_post_title( 'is-size-1' );
		if ( ! empty( $options['meta_info'] ) ) {
			$str .= newsmax_ruby_post_meta_info();
		}

		if ( ! empty( $options['summary_type'] ) && 'excerpt' == $options['summary_type'] ) {
			if ( ! empty( $options['excerpt_classic'] ) ) {
				$str .= newsmax_ruby_post_excerpt( $options['excerpt_classic'] );
			}
		} else {
			$str .= newsmax_ruby_post_excerpt_classic();
		}
		$str .= newsmax_ruby_post_readmore();
		$str .= '</div>';

		$str .= '</article>';

		return $str;
	}
}
