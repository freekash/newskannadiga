<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param $size
 * @param bool $size_mobile
 * @param string $class_name
 *
 * @return string
 * render thumbnail
 */
if ( ! function_exists( 'newsmax_ruby_post_thumb' ) ) {
	function newsmax_ruby_post_thumb( $options ) {

		//get config
		$post_id = get_the_ID();
		if ( ! empty( $option['size'] ) ) {
			$option['size'] = 'full';
		}

		$class_name   = array();
		$class_name[] = 'post-thumb is-image';
		if ( ! empty( $options['class_name'] ) ) {
			$class_name[] = $options['class_name'];
		}

		if ( ! empty( $option['size_mobile'] ) ) {
			$class_name[] = 'has-mobile-size';
		}

		if ( ! empty( $options['smooth_style'] ) ) {
			$class_name[] = 'ruby-animated-image ' . esc_attr( $options['smooth_style'] );
		}

		$class_name = implode( ' ', $class_name );

		//get full image
		$featured_id  = get_post_thumbnail_id( get_the_ID() );
		$featured_alt = get_post_meta( $featured_id, '_wp_attachment_image_alt', true );

		//get mobile image
		$attachment_full = wp_get_attachment_image_src( $featured_id, $options['size'] );

		//render
		$str = '';
		$str .= '<div class="' . esc_attr( $class_name ) . '">';
		$str .= '<a href="' . get_permalink() . '" title="' . esc_attr( get_the_title() ) . '" rel="bookmark">';
		$str .= '<span class="thumbnail-resize">';
		if ( empty( $options['size_mobile'] ) ) {
			if ( ! empty( $options['size_mobile_h'] ) ) {
				$attachment_mobile_h = wp_get_attachment_image_url( $featured_id, $options['size_mobile_h'] );
				if ( ! empty( $attachment_full[0] ) && ! empty( $attachment_full[1] ) && ! empty( $attachment_full[2] ) ) {
					$str .= '<img width="' . $attachment_full[1] . '" height="' . $attachment_full[2] . '" src="' . $attachment_full[0] . '" ';
					$str .= 'srcset="' . $attachment_full[0] . ' 768w, ' . $attachment_mobile_h . ' 767w" ';
					$str .= 'sizes="(max-width: 767px) 33vw, 768px" alt="' . esc_attr( $featured_alt ) . '"/>';
				}
			} else {
				$str .= get_the_post_thumbnail( $post_id, $options['size'] );
			}
		} else {
			$attachment_mobile = wp_get_attachment_image_url( $featured_id, $options['size_mobile'] );
			if ( empty( $options['size_mobile_h'] ) ) {
				if ( ! empty( $attachment_full[0] ) && ! empty( $attachment_full[1] ) && ! empty( $attachment_full[2] ) ) {
					$str .= '<img width="' . $attachment_full[1] . '" height="' . $attachment_full[2] . '" src="' . $attachment_full[0] . '" ';
					$str .= 'srcset="' . $attachment_full[0] . ' 480w, ' . $attachment_mobile . ' 479w" ';
					$str .= 'sizes="(max-width: 479px) 33vw, 480px" alt="' . esc_attr( $featured_alt ) . '"/>';
				}
			} else {
				$attachment_mobile_h = wp_get_attachment_image_url( $featured_id, $options['size_mobile_h'] );
				if ( ! empty( $attachment_full[0] ) && ! empty( $attachment_full[1] ) && ! empty( $attachment_full[2] ) ) {
					$str .= '<img width="' . $attachment_full[1] . '" height="' . $attachment_full[2] . '" src="' . $attachment_full[0] . '" ';
					$str .= 'srcset="' . $attachment_full[0] . ' 768w, ' . $attachment_mobile_h . ' 767w, ' . $attachment_mobile . ' 150w" ';
					$str .= 'sizes="(max-width: 479px) 10vw, (max-width: 767px) 33vw, 768px" alt="' . esc_attr( $featured_alt ) . '"/>';
				}
			}
		}

		$str .= '</span>';
		$str .= '</a>';

		//add edit link
		if ( current_user_can( 'edit_posts' ) ) {
			$str .= '<a class="post-editor" target="_blank" href="' . get_edit_post_link() . '">' . esc_html__( 'edit', 'newsmax' ) . '</a>';
		}

		$str .= '</div>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return bool|string
 * render featured caption
 */
if ( ! function_exists( 'newsmax_ruby_feat_credit' ) ) {
	function newsmax_ruby_feat_credit() {

		//check credit text
		$credit_text = get_post_meta( get_the_ID(), 'newsmax_ruby_meta_featured_credit', true );
		if ( ! empty( $credit_text ) ) {
			return '<span class="thumb-caption">' . html_entity_decode(esc_html( $credit_text )) . '</span>';
		} else {
			//check caption
			$thumbnail_id = get_post_thumbnail_id( get_the_ID() );
			$attachment   = get_posts( array( 'p' => $thumbnail_id, 'post_type' => 'attachment' ) );
			if ( ! empty( $attachment[0]->post_excerpt ) ) {
				return '<span class="thumb-caption">' . html_entity_decode(esc_html( $attachment[0]->post_excerpt )) . '</span>';
			} else {
				return false;
			}
		}
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render post thumbnail overlay
 */
if ( ! function_exists( 'newsmax_ruby_post_mask_overlay' ) ) {
	function newsmax_ruby_post_mask_overlay() {
		return '<div class="post-mask-overlay"></div>';
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render post thumbnail overlay
 */
if ( ! function_exists( 'newsmax_ruby_post_mask_overlay_full' ) ) {
	function newsmax_ruby_post_mask_overlay_full() {
		return '<div class="post-mask-overlay-full"></div>';
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $classes
 *
 * @return string
 * newsmax_ruby_post_popup_thumbnail_gallery_slider
 */
if ( ! function_exists( 'newsmax_ruby_post_popup_thumbnail_gallery_slider' ) ) {
	function newsmax_ruby_post_popup_thumbnail_gallery_slider( $classes = '' ) {

		$size     = 'newsmax_ruby_crop_1100x580';
		$size_nav = 'newsmax_ruby_crop_272x170';
		$gallery  = get_post_meta( get_the_ID(), 'newsmax_ruby_meta_post_gallery_data', false );

		$class_name   = array();
		$class_name[] = 'post-thumb popup-post-gallery-slider-outer is-gallery is-slider';
		if ( ! empty( $classes ) ) {
			$class_name[] = $classes;
		}
		$class_name = implode( ' ', $class_name );

		//render
		$str = '';
		$str .= '<div class="' . esc_attr( $class_name ) . '">';
		$str .= '<div class="popup-post-gallery-slider">';
		foreach ( $gallery as $gallery_id ) {
			if ( ! empty( $gallery_id ) ) {
				$image_attachment = wp_get_attachment_image_src( $gallery_id, $size );
				$caption          = get_post_field( 'post_excerpt', $gallery_id );
				$str .= '<div class="popup-post-gallery-slider-el">';
				$str .= '<div class="popup-post-gallery-slider-image" style="background-image:url(' . esc_url( $image_attachment[0] ) . ')"></div>';
				if ( ! empty( $caption ) ) {
					$str .= '<span class="thumb-caption">' . html_entity_decode(esc_html( $caption )) . '</span>';
				}
				$str .= '</div>';
			}
		}
		$str .= '</div><!--#slider-->';

		//slider nav
		$str .= '<div class="popup-gallery-slider-nav slider-nav">';
		foreach ( $gallery as $gallery_id ) {
			if ( ! empty( $gallery_id ) ) {
				$image_attachment_nav = wp_get_attachment_image_src( $gallery_id, $size_nav );
				$str .= '<div class="popup-gallery-slider-nav-el">';
				$str .= '<div class="popup-post-gallery-slider-image popup-post-gallery-slider-image-nav" style="background-image:url(' . esc_url( $image_attachment_nav[0] ) . ')"></div>';
				$str .= '</div>';
			}
		}
		$str .= '</div><!--#slider nav-->';
		$str .= '</div><!--#post thumbnail-->';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render thumbnail for post popup gallery
 */
if ( ! function_exists( 'newsmax_ruby_post_popup_thumbnail_image' ) ) {
	function newsmax_ruby_post_popup_thumbnail_image() {

		$size             = 'newsmax_ruby_crop_1100x580';
		$image_id         = get_post_thumbnail_id();
		$caption          = get_post_field( 'post_excerpt', $image_id );
		$image_attachment = wp_get_attachment_image_src( $image_id, $size );

		$str = '';
		$str .= '<div class="post-thumb">';
		$str .= '<a href="' . get_permalink() . '" title="' . esc_attr( get_the_title() ) . '" rel="bookmark">';
		$str .= '<span class="popup-image-bg" style="background-image:url(' . esc_url( $image_attachment[0] ) . ')"></span>';
		$str .= '</a>';
		$str .= '</div>';
		if ( ! empty( $caption ) ) {
			$str .= '<span class="thumb-caption">' . html_entity_decode(esc_html( $caption )) . '</span>';
		}

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param array $param
 *
 * @return string
 * render gallery for post gallery
 */
if ( ! function_exists( 'newsmax_ruby_post_thumb_gallery_slider' ) ) {
	function newsmax_ruby_post_thumb_gallery_slider( $param = array() ) {

		//get and check data
		$data_gallery = get_post_meta( get_the_ID(), 'newsmax_ruby_meta_post_gallery_data', false );

		if ( empty( $data_gallery ) || ! is_array( $data_gallery ) ) {
			return false;
		}

		$enable_popup = true;
		if ( isset( $param['popup'] ) ) {
			$enable_popup = $param['popup'];
		}

		if ( ! empty( $param['unique_id'] ) ) {
			$unique_id = $param['unique_id'];
		} else {
			$unique_id = get_the_ID();
		}

		$size = 'newsmax_ruby_crop_750x460';
		if ( ! empty( $param['size'] ) ) {
			$size = $param['size'];
		}

		$class_name   = array();
		$class_name[] = 'post-thumb-outer post-thumb-gallery-outer is-gallery is-slider';

		if ( ! empty( $param['class_name'] ) ) {
			$class_name[] = $param['class_name'];
		}

		$class_name = implode( ' ', $class_name );

		//render
		$str     = '';
		$counter = 1;

		$str .= '<div class="' . esc_attr( $class_name ) . '">';
		$str .= '<div class="slider-loader"></div>';
		$str .= '<div class="post-thumb post-thumb-gallery-slider slider-init">';
		foreach ( $data_gallery as $image_id ) {

			$image_caption = get_post_field( 'post_excerpt', $image_id );

			if ( ! empty( $enable_popup ) ) {
				$str .= '<div class="post-thumb-gallery-slider-el ruby-thumb-galley-popup" data-post_index="' . esc_attr( $counter - 1 ) . '" data-effect="mpf-ruby-effect ruby-thumbnail-popup-outer" data-mfp-src="#ruby-thumbnail-popup-gallery-' . esc_attr( $unique_id ) . '">';
			} else {
				$str .= '<div class="post-thumb-gallery-slider-el">';
				$str .= '<a class="post-link-absolute" href="' . get_permalink() . '" title="' . esc_attr( get_the_title() ) . '" rel="bookmark"></a>';
			}
			$str .= wp_get_attachment_image( $image_id, $size );
			if ( ! empty( $image_caption ) ) {
				$str .= '<span class="thumb-caption">' . html_entity_decode(esc_attr( $image_caption )) . '</span>';
			}
			$str .= '</div>';
			$counter ++;
		}

		$str .= '</div>';
		$str .= '</div>';

		//render popup
		if ( true === $enable_popup ) {
			$str .= newsmax_ruby_post_thumb_gallery_popup( $unique_id );
		}

		return $str;

	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param array $param
 *
 * @return string
 * render post thumbnail as gallery grid for post gallery
 */
if ( ! function_exists( 'newsmax_ruby_post_thumb_gallery_grid' ) ) {
	function newsmax_ruby_post_thumb_gallery_grid( $param = array() ) {

		//get and check data
		$data_gallery = get_post_meta( get_the_ID(), 'newsmax_ruby_meta_post_gallery_data', false );
		if ( empty( $data_gallery ) || ! is_array( $data_gallery ) ) {
			return false;
		}

		//enable popup
		$enable_popup = true;
		if ( isset( $param['popup'] ) ) {
			$enable_popup = $param['popup'];
		}

		if ( ! empty( $param['unique_id'] ) ) {
			$unique_id = $param['unique_id'];
		} else {
			$unique_id = 'ruby-gallery-grid-' . get_the_ID();
		}

		//check size
		$size = 'newsmax_ruby_crop_380x380';
		if ( ! empty( $param['size'] ) ) {
			$size = $param['size'];
		}

		$class_name   = array();
		$class_name[] = 'post-thumb-gallery-outer is-gallery is-grid';

		if ( ! empty( $param['class_name'] ) ) {
			$class_name[] = $param['class_name'];
		} else {
			$class_name[] = 'post-thumb-outer';
		}
		$class_name = implode( ' ', $class_name );

		//render
		$str     = '';
		$counter = 1;

		$str .= '<div class="' . esc_attr( $class_name ) . '">';
		$str .= '<div class="slider-loader"></div>';
		$str .= '<div class="post-thumb post-thumb-gallery-grid slider-init">';

		foreach ( $data_gallery as $image_id ) {
			if ( ! empty( $enable_popup ) ) {
				$str .= '<div class="post-thumb-gallery-grid-el ruby-thumb-galley-popup" data-post_index="' . esc_attr( $counter - 1 ) . '" data-effect="mpf-ruby-effect ruby-gallery-popup-outer" data-mfp-src="#ruby-thumbnail-popup-gallery-' . $unique_id . '">';
			} else {
				$str .= '<div class="post-thumb-gallery-grid-el">';
				$str .= '<a class="post-link-absolute" href="' . get_permalink() . '" title="' . esc_attr( get_the_title() ) . '" rel="bookmark"></a>';
			}
			$str .= wp_get_attachment_image( $image_id, $size );
			$str .= '</div>';
			$counter ++;
		}

		$str .= '</div>';
		$str .= '</div>';

		if ( true === $enable_popup ) {
			$str .= newsmax_ruby_post_thumb_gallery_popup( $unique_id );
		}

		return $str;

	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return bool
 * slider popup when click on gallery post
 */
if ( ! function_exists( 'newsmax_ruby_post_thumb_gallery_popup' ) ) {
	function newsmax_ruby_post_thumb_gallery_popup( $unique_id ) {

		$post_id      = get_the_ID();
		$data_gallery = get_post_meta( $post_id, 'newsmax_ruby_meta_post_gallery_data', false );
		if ( empty( $data_gallery ) || ! is_array( $data_gallery ) ) {
			return false;
		}

		$str = '';
		$str .= '<div id="ruby-thumbnail-popup-gallery-' . esc_attr( $unique_id ) . '" class="popup-thumbnail-slider-outer mfp-hide mfp-animation">';
		$str .= '<div class="popup-thumbnail-slider-holder">';
		$str .= '<div class="popup-thumbnail-slider-inner">';
		$str .= '<div class="slider-loader"></div>';
		$str .= '<div class="popup-thumbnail-slider slider-init">';
		foreach ( $data_gallery as $image_id ) {

			$image_caption = get_post_field( 'post_excerpt', $image_id );

			$str .= '<div class=popup-thumbnail-slider-el">';
			$str .= '<div class="popup-thumbnail-slider-image-holder">';
			$str .= '<div class="popup-thumbnail-slider-image">';
			$str .= wp_get_attachment_image( $image_id, 'full' );
			if ( ! empty( $image_caption ) ) {
				$str .= '<span class="thumb-caption">' . html_entity_decode(esc_attr( $image_caption )) . '</span>';
			}
			$str .= '</div>';
			$str .= '</div>';
			$str .= '</div>';
		}

		$str .= '</div>';
		$str .= '</div>';
		$str .= '</div>';
		$str .= '</div>';

		return $str;
	}
}