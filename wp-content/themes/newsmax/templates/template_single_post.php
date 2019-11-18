<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single post
 */
if ( ! function_exists( 'newsmax_ruby_render_single_post' ) ) {
	function newsmax_ruby_render_single_post() {

		$str = '';

		while ( have_posts() ) {
			the_post();

			$check_ajax = newsmax_ruby_single_post_check_ajax();
			$post_prev  = get_previous_post();

			if ( 'scroll' == $check_ajax && ! empty( $post_prev ) ) {
				$post_prev_id = $post_prev->ID;
				$str .= '<div id="single-post-infinite" data-next_post_id="' . esc_attr( $post_prev_id ) . '" class="clearfix">';
				$str .= newsmax_ruby_render_single_post_layout( true );
				$str .= '</div>';
				$str .= '<div class="single-post-infinite-icon clearfix">';
				$str .= '<div class="ajax-animation"><span class="ajax-animation-icon"></span></div>';
				$str .= '</div><!--#single infinite-->';
			} else {
				$str .= '<div class="single-post-outer clearfix">';
				$str .= newsmax_ruby_render_single_post_layout();
				$str .= '</div>';
			}
		}

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param bool $ajax_wrapper
 *
 * @return string
 * render single post layout
 */
if ( ! function_exists( 'newsmax_ruby_render_single_post_layout' ) ) {
	function newsmax_ruby_render_single_post_layout( $ajax_wrapper = false ) {

		//check
		$single_layout = newsmax_ruby_single_post_check_layout();
		if ( ! isset( $single_layout['format'] ) || ! isset( $single_layout['layout'] ) || ! isset( $single_layout['video_popup'] ) ) {
			return false;
		}

		$param                = array();
		$param['video_popup'] = $single_layout['video_popup'];
		$param['thumb_size']  = newsmax_ruby_single_post_check_feat_size();

		$str = '';

		if ( true == $ajax_wrapper ) {
			if ( function_exists( 'wp_doing_ajax' ) && wp_doing_ajax() ) {
				if ( ! empty( $single_layout['layout'] ) && 7 == $single_layout['layout'] ) {
					$single_layout['layout'] = 4;
				}
			}

			$str .= '<div class="single-post-outer clearfix" data-post_url="' . esc_url( get_the_permalink() ) . '" data-post_title="' . get_the_title() . '">';
		}

		if ( 'thumbnail' == $single_layout['format'] ) {
			switch ( $single_layout['layout'] ) {
				case '2' :
					$str .= newsmax_ruby_render_single_post_featured_layout_2( $param );
					break;
				case '3' :
					$str .= newsmax_ruby_render_single_post_featured_layout_3( $param );
					break;
				case '4' :
					$str .= newsmax_ruby_render_single_post_featured_layout_4( $param );
					break;
				case '5' :
					$str .= newsmax_ruby_render_single_post_featured_layout_5( $param );
					break;
				case '6' :
					$str .= newsmax_ruby_render_single_post_featured_layout_6( $param );
					break;
				case '7' :
					$str .= newsmax_ruby_render_single_post_featured_layout_7( $param );
					break;
				case '8' :
					$str .= newsmax_ruby_render_single_post_featured_layout_8( $param );
					break;
				default :
					$str .= newsmax_ruby_render_single_post_featured_layout_1( $param );
					break;
			}
		} elseif ( 'video' == $single_layout['format'] ) {
			switch ( $single_layout['layout'] ) {
				case '2' :
					$str .= newsmax_ruby_render_single_post_video_layout_2();
					break;
				case '3' :
					$str .= newsmax_ruby_render_single_post_video_layout_3();
					break;
				default :
					$str .= newsmax_ruby_render_single_post_video_layout_1();
					break;
			}
		} elseif ( 'gallery' == $single_layout['format'] ) {

			switch ( $single_layout['layout'] ) {
				case '1' :
					$str .= newsmax_ruby_render_single_post_gallery_slider_layout_1( $param );
					break;
				case '2' :
					$str .= newsmax_ruby_render_single_post_gallery_slider_layout_2( $param );
					break;
				case '3' :
					$str .= newsmax_ruby_render_single_post_gallery_grid_layout_1( $param );
					break;
				case '4' :
					$str .= newsmax_ruby_render_single_post_gallery_grid_layout_2( $param );
					break;
				default :
					$str .= newsmax_ruby_render_single_post_gallery_grid_layout_1( $param );
					break;
			}
		} elseif ( 'audio' == $single_layout['format'] ) {
			switch ( $single_layout['layout'] ) {
				case '2' :
					$str .= newsmax_ruby_render_single_post_audio_layout_2( $param );
					break;
				default :
					$str .= newsmax_ruby_render_single_post_audio_layout_1( $param );
					break;
			}
		} else {
			$str .= newsmax_ruby_render_single_post_featured_layout_1( $param );
		}

		if ( true == $ajax_wrapper ) {
			$str .= '</div>';
		}

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $class_name
 * @param bool $review
 * @param bool $ajax_view
 *
 * @return string
 * open single post wrapper
 */
if ( ! function_exists( 'newsmax_ruby_single_post_open' ) ) {
	function newsmax_ruby_single_post_open( $class_name = '', $review = false, $ajax_view = false ) {

		$str = '';

		if ( ! empty( $ajax_view ) && function_exists( 'newsmax_ruby_post_view_add' ) ) {
			$class_name = $class_name . ' ' . 'ruby-ajax-view-add';
		}

		$str .= '<article class="' . implode( ' ', get_post_class( esc_attr( $class_name ) ) ) . '"' . ' ';
		if ( false == $review ) {
			$str .= newsmax_ruby_schema::markup( 'article', false );
		} else {
			$str .= newsmax_ruby_schema::markup( 'review', false );
		}
		if ( ! empty( $ajax_view ) && function_exists( 'newsmax_ruby_post_view_add' ) ) {
			$str .= ' ' . 'data-post_id ="' . get_the_ID() . '"';
		}
		$str .= '>';

		return $str;

	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * close single post wrap
 */
if ( ! function_exists( 'newsmax_ruby_single_post_close' ) ) {
	function newsmax_ruby_single_post_close() {
		return '</article>';
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $class_name
 *
 * @return string
 * render single post title
 */
if ( ! function_exists( 'newsmax_ruby_single_post_title' ) ) {
	function newsmax_ruby_single_post_title( $class_name = 'is-size-1' ) {
		$str = '';
		$str .= '<h1 class="single-title post-title entry-title ' . esc_attr( $class_name ) . '">';
		$str .= get_the_title();
		$str .= '</h1>';

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single post title
 */
if ( ! function_exists( 'newsmax_ruby_single_post_subtitle' ) ) {
	function newsmax_ruby_single_post_subtitle() {

		$subtitle = get_post_meta( get_the_ID(), 'newsmax_ruby_meta_post_subtitle', true );
		if ( empty( $subtitle ) ) {
			return false;
		}

		$str = '';
		$str .= '<div class="single-subtitle post-title is-size-3">';
		$str .= '<h3>';
		$str .= esc_html( $subtitle );
		$str .= '</h3>';
		$str .= '</div>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single post content
 */
if ( ! function_exists( 'newsmax_ruby_single_post_content' ) ) {
	function newsmax_ruby_single_post_content() {

		$review_check    = newsmax_ruby_single_post_check_review();
		$review_position = newsmax_ruby_single_post_check_review_position();
		$ajax_type       = newsmax_ruby_single_post_check_ajax();
		if ( 'scroll' == $ajax_type ) {
			global $more;
			$more = 1;
		}

		$str = '';
		if ( false != $review_check && 'top' == $review_position ) {
			$str .= newsmax_ruby_single_post_review( 'is-top' );
		}

		ob_start();
		the_content();
		$str .= ob_get_clean();

		$str .= newsmax_ruby_single_post_ad_bottom();
		$str .= newsmax_ruby_pagination_single();

		if ( false != $review_check && 'bottom' == $review_position ) {
			$str .= newsmax_ruby_single_post_review( 'is-bottom' );
		}

		$str .= '<div class="single-post-tag-outer post-title is-size-4">';
		$str .= newsmax_ruby_single_post_source();
		$str .= newsmax_ruby_single_post_via();
		$str .= newsmax_ruby_single_post_tag();
		$str .= '</div>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * single post entry
 */
if ( ! function_exists( 'newsmax_ruby_single_post_entry' ) ) {
	function newsmax_ruby_single_post_entry() {

		$str = '';
		$str .= '<div class="entry single-entry">';
		$str .= newsmax_ruby_single_post_content();
		$str .= '</div>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single post category info
 */
if ( ! function_exists( 'newsmax_ruby_single_post_cat_info' ) ) {
	function newsmax_ruby_single_post_cat_info() {

		$single_post_cat_info = newsmax_ruby_get_option( 'single_post_cat_info' );
		if ( ! empty( $single_post_cat_info ) ) {
			return newsmax_ruby_post_cat_info( 'single-post-cat-info', false );
		} else {
			return false;
		}

	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $meta_position
 *
 * @return string
 * render single post meta tags info
 */
if ( ! function_exists( 'newsmax_ruby_single_post_meta_info' ) ) {
	function newsmax_ruby_single_post_meta_info( $meta_position = 'left' ) {

		$meta_info_icon    = newsmax_ruby_get_option( 'post_meta_info_icon' );
		$meta_info_manager = newsmax_ruby_get_option( 'single_post_meta_info_manager' );
		$full_date         = newsmax_ruby_get_option( 'single_post_full_date' );
		$big_avatar        = newsmax_ruby_get_option( 'single_post_big_avatar' );

		if ( empty( $meta_info_manager['enabled'] ) || ! is_array( $meta_info_manager['enabled'] ) ) {
			return false;
		}

		$class_name   = array();
		$class_name[] = 'single-post-meta-info clearfix';
		if ( empty( $full_date ) ) {
			$class_name[] = 'is-hide-fulldate';
		}
		if ( 'left' == $meta_position && ! empty( $big_avatar ) ) {
			$class_name[] = 'is-show-avatar';
		}
		$class_name = implode( ' ', $class_name );

		$class_name_meta = 'post-meta-info is-hide-icon';
		if ( ! empty( $meta_info_icon ) ) {
			$class_name_meta = 'post-meta-info is-show-icon';
		}

		$str = '';
		$str .= '<div class="' . esc_attr( $class_name ) . '">';

		if ( 'left' == $meta_position && ! empty( $big_avatar ) ) {
			$str .= newsmax_ruby_single_post_info_author_thumb();
		}

		$str .= '<div class="single-post-meta-info-inner">';
		$str .= '<div class="' . esc_attr( $class_name_meta ) . '">';
		foreach ( $meta_info_manager['enabled'] as $key => $val ) {
			switch ( $key ) {
				case 'date' :
					$str .= newsmax_ruby_meta_info_date( $meta_info_icon );
					break;
				case 'author' :
					$str .= newsmax_ruby_meta_info_author( $meta_info_icon );
					break;
				case 'cat' :
					$str .= newsmax_ruby_meta_info_cat( $meta_info_icon );
					break;
				case 'tag' :
					$str .= newsmax_ruby_meta_info_tag( $meta_info_icon );
					break;
				case 'view' :
					$str .= newsmax_ruby_meta_info_view( $meta_info_icon );
					break;
				case 'comment' :
					$str .= newsmax_ruby_meta_info_comment( $meta_info_icon );
					break;
			};
		}
		$str .= '</div>';
		if ( ! empty( $full_date ) ) {
			$str .= newsmax_ruby_single_post_info_date_full();
		}
		$str .= '</div>';
		$str .= '</div>';

		return $str;

	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single post author info thumbnail
 */
if ( ! function_exists( 'newsmax_ruby_single_post_info_author_thumb' ) ) {
	function newsmax_ruby_single_post_info_author_thumb() {

		$str = '';
		$str .= '<span class="meta-info-author-thumb">';
		$str .= '<a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '">';
		$str .= get_avatar( get_the_author_meta( 'user_email' ), 60, '', get_the_author_meta( 'display_name' ) );
		$str .= '</a>';
		$str .= '</span>';

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single post date full
 */
if ( ! function_exists( 'newsmax_ruby_single_post_info_date_full' ) ) {
	function newsmax_ruby_single_post_info_date_full() {

		$date_format = newsmax_ruby_get_option( 'single_post_full_date_format' );
		$time_format = newsmax_ruby_get_option( 'single_post_full_time_format' );

		if ( empty( $date_format ) ) {
			$date_format = 'M. d, Y';
		}

		$date_unix = get_the_time( 'U', get_the_ID() );
		$text_time = get_the_date( $date_format );
		if ( ! empty( $time_format ) ) {
			$text_time .= ' ' . newsmax_ruby_translate( 'at' ) . ' ' . get_the_date( $time_format );
		}

		$str = '';
		$str .= '<div class="meta-info-date-full">';
		$str .= '<span class="meta-info-date-full-inner">';
		$str .= '<span>' . newsmax_ruby_translate( 'posted_on' ) . '</span>';
		$str .= ' ';
		$str .= '<time class="date published" datetime="' . date( DATE_W3C, $date_unix ) . '">' . esc_html( $text_time ) . '</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$str .= '<time class="updated" datetime="' . get_the_modified_date( DATE_W3C ) . '">' . get_the_modified_date() . '</time>';
		}
		$str .= '</span>';
		$str .= '</div>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * render total share
 */
if ( ! function_exists( 'newsmax_ruby_single_post_share_total' ) ) {
	function newsmax_ruby_single_post_share_total() {

		if ( ! function_exists( 'newsmax_ruby_social_share_total' ) ) {
			return false;
		}

		$total_share     = newsmax_ruby_social_share_total();
		$counter_caption = newsmax_ruby_get_option( 'single_post_counter_caption' );

		$str = '';
		$str .= '<div class="single-post-share-total">';
		$str .= '<span class="share-total-icon"><i class="icon-simple icon-share"></i></span>';
		if ( empty( $counter_caption ) ) {
			$str .= '<span class="share-total-number">' . esc_html( $total_share ) . '</span>';
		} else {
			$str .= '<span class="share-total-number">' . esc_html( $total_share ) . '</span>';
			if ( empty( $total_share ) || 1 == $total_share ) {
				$str .= '<span class="share-total-caption post-title is-size-4"><span>' . newsmax_ruby_translate( 'share' ) . '</span></span>';
			} else {
				$str .= '<span class="share-total-caption post-title is-size-4"><span>' . newsmax_ruby_translate( 'shares' ) . '</span></span>';
			}
		}

		$str .= '</div>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * render total share
 */
if ( ! function_exists( 'newsmax_ruby_single_post_view_total' ) ) {
	function newsmax_ruby_single_post_view_total() {

		if ( ! function_exists( 'newsmax_ruby_post_view_total' ) ) {
			return false;
		}

		$view_total      = newsmax_ruby_post_view_total();
		$ajax_view       = newsmax_ruby_get_option( 'ajax_view' );
		$counter_caption = newsmax_ruby_get_option( 'single_post_counter_caption' );

		if ( empty( $view_total ) ) {
			$view_total = 1;
		}

		//render
		$str = '';
		$str .= '<div class="single-post-view-total">';
		$str .= '<span class="view-total-icon"><i class="icon-simple icon-fire"></i></span>';
		if ( ! empty( $ajax_view ) ) {
			$str .= '<span class="view-total-number ruby-ajax-view is-invisible" data-post_id="' . get_the_ID() . '">' . esc_html( $view_total ) . '</span>';
		} else {
			$str .= '<span class="view-total-number">' . esc_html( $view_total ) . '</span>';
		}
		if ( ! empty( $counter_caption ) ) {
			if ( empty( $view_total ) || 1 == $view_total ) {
				$str .= '<span class="view-total-caption post-title is-size-4"><span>' . newsmax_ruby_translate( 'view' ) . '</span></span>';
			} else {
				$str .= '<span class="view-total-caption post-title is-size-4"><span>' . newsmax_ruby_translate( 'views' ) . '</span></span>';
			}
		}
		$str .= '</div>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * single share button at the top of content
 */
if ( ! function_exists( 'newsmax_ruby_single_post_share_top' ) ) {
	function newsmax_ruby_single_post_share_top() {

		if ( ! function_exists( 'newsmax_ruby_social_share_post' ) ) {
			return false;
		}

		//check option
		$share_top = newsmax_ruby_get_option( 'single_post_share_top' );
		if ( empty( $share_top ) ) {
			return false;
		}

		$str     = '';
		$content = newsmax_ruby_social_share_post( true );
		if ( empty( $content ) ) {
			return false;
		}

		$str .= '<div class="single-post-meta-info-share">';
		$str .= '<span class="share-bar-el share-bar-label"><i class="icon-simple icon-share"></i></span>';
		$str .= $content;
		$str .= '</div>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * single share button at the top of content
 */
if ( ! function_exists( 'newsmax_ruby_single_post_share_bottom' ) ) {
	function newsmax_ruby_single_post_share_bottom() {

		if ( ! function_exists( 'newsmax_ruby_social_share_post_big' ) ) {
			return false;
		}

		$share_bottom = newsmax_ruby_get_option( 'single_post_share_bottom' );
		if ( empty( $share_bottom ) ) {
			return false;
		}

		$str = '';
		$str .= '<div class="single-post-share-big">';
		$str .= '<div class="single-post-share-big-inner">';
		$str .= newsmax_ruby_social_share_post_big();
		$str .= '</div>';
		$str .= '</div>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return bool|string
 * render like/tweet/plus button
 */
if ( ! function_exists( 'newsmax_ruby_single_post_like' ) ) {
	function newsmax_ruby_single_post_like() {

		if ( ! function_exists( 'newsmax_ruby_social_like_post' ) ) {
			return false;
		}

		//check & return
		$check = newsmax_ruby_get_option( 'single_post_like' );
		if ( empty( $check ) ) {
			return false;
		}

		//render
		$str = '';
		$str .= '<div class="single-post-like-outer">';
		$str .= '<div class="single-post-like">';
		$str .= newsmax_ruby_social_like_post();
		$str .= '</div>';
		$str .= '</div>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single author box
 */
if ( ! function_exists( 'newsmax_ruby_single_box_author' ) ) {
	function newsmax_ruby_single_box_author() {

		$author_id     = get_the_author_meta( 'ID' );
		$data_social   = newsmax_ruby_social_profile_user( $author_id );
		$job           = get_the_author_meta( 'job' );
		$name          = get_the_author_meta( 'display_name' );
		$description   = get_the_author_meta( 'description' );
		$render_social = newsmax_ruby_render_social_icon( $data_social, true, false );

		if ( empty( $description ) && empty( $render_social ) && empty ( $job ) ) {
			return false;
		}

		$view_more = '';

		if ( ! is_author() ) {
			$view_more .= '<div class="box-author-viewmore">';
			$view_more .= '<i class="fa fa-long-arrow-right"></i>';
			$view_more .= '<span>' . newsmax_ruby_translate( 'all_posts_by' ) . '</span>';
			$view_more .= '<a href="' . get_author_posts_url( $author_id ) . '">' . esc_html( $name ) . '</a>';
			$view_more .= '</div>';
		}

		//render
		$str = '';
		$str .= '<div class="single-post-box-author clearfix">';
		$str .= '<div class="box-author-thumb">';
		$str .= '<a href="' . get_author_posts_url( $author_id ) . '">';
		$str .= get_avatar( get_the_author_meta( 'user_email' ), 100, '', $name );
		$str .= '</a>';
		$str .= '</div>';

		$str .= '<div class="box-author-content">';
		if ( is_author() ) {
			$total_post = count_user_posts( $author_id, 'post', true );
			$str .= '<div class="box-author-title">';
			$str .= '<span class="box-author-total-post">' . sprintf( newsmax_ruby_translate( 'p_posts' ), $total_post ) . '</span>';
			if ( ! empty( $job ) ) {
				$str .= '<div class="box-author-job"><span>' . esc_html( $job ) . '</span></div>';
			}
			$str .= '</div>';
		} else {
			$str .= '<div class="box-author-title">';
			$str .= '<span class="box-author-title-caption">' . newsmax_ruby_translate( 'the_author' ) . '</span>';
			$str .= '<a href="' . get_author_posts_url( $author_id ) . '">' . esc_html( $name ) . '</a>';
			if ( ! empty( $job ) ) {
				$str .= '<div class="box-author-job"><span>' . esc_html( $job ) . '</span></div>';
			}
			$str .= '</div>';
		}

		$str .= '<div class="box-author-desc">' . html_entity_decode(esc_html( $description )) . '</div>';

		if ( ! empty( $render_social ) || ! empty( $view_more ) ) {
			$str .= '<div class="box-author-footer">';
			if ( ! empty( $render_social ) ) {
				$str .= '<div class="box-author-social tooltips">';
				$str .= $render_social;
				$str .= '</div>';
			}
			$str .= $view_more;
			$str .= '</div>';
		}

		$str .= '</div>';
		$str .= '</div>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return bool|void
 * render single top advertising
 */
if ( ! function_exists( 'newsmax_ruby_single_post_ad_top' ) ) {
	function newsmax_ruby_single_post_ad_top() {

		$type   = newsmax_ruby_get_option( 'single_ad_top_type' );
		$script = newsmax_ruby_get_option( 'single_ad_top_script' );
		$image  = newsmax_ruby_get_option( 'single_ad_top_image' );
		$url    = newsmax_ruby_get_option( 'single_ad_top_url' );
		$size   = newsmax_ruby_get_option( 'single_ad_top_size' );

		if ( 'script' == $type && ! empty( $script ) ) {
			return newsmax_ruby_single_post_ad_script( $script, $size, 'single-post-ad-top' );
		} elseif ( ! empty( $image['url'] ) ) {
			return newsmax_ruby_single_post_ad_custom( $image, $url, 'single-post-ad-top' );
		} else {
			return false;
		}
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return bool|void
 * render single bottom advertising
 */
if ( ! function_exists( 'newsmax_ruby_single_post_ad_bottom' ) ) {
	function newsmax_ruby_single_post_ad_bottom() {

		//check return
		if ( function_exists( 'wp_doing_ajax' ) && wp_doing_ajax() ) {
			return false;
		};

		$type   = newsmax_ruby_get_option( 'single_ad_bottom_type' );
		$script = newsmax_ruby_get_option( 'single_ad_bottom_script' );
		$image  = newsmax_ruby_get_option( 'single_ad_bottom_image' );
		$url    = newsmax_ruby_get_option( 'single_ad_bottom_url' );
		$size   = newsmax_ruby_get_option( 'single_ad_bottom_size' );

		if ( 'script' == $type && ! empty( $script ) ) {
			return newsmax_ruby_single_post_ad_script( $script, $size, 'single-post-ad-bottom' );
		} elseif ( ! empty( $image['url'] ) ) {
			return newsmax_ruby_single_post_ad_custom( $image, $url, 'single-post-ad-bottom' );
		} else {
			return false;
		}
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $script
 * @param string $size
 * @param string $class_name
 *
 * @return string
 * render single ad script
 */
if ( ! function_exists( 'newsmax_ruby_single_post_ad_script' ) ) {
	function newsmax_ruby_single_post_ad_script( $script = '', $size = 1, $class_name = '' ) {

		if ( function_exists( 'wp_doing_ajax' ) && wp_doing_ajax() ) {
			return false;
		};

		$str = '';
		$str .= '<div class="single-post-ad is-ad-script ' . esc_attr( $class_name ) . '">';
		if ( ( ! empty( $size ) && 2 == $size ) ) {
			$str .= '<div>' . htmlspecialchars_decode( stripcslashes( $script ) ) . '</div>';
		} else {
			if ( function_exists( 'newsmax_ruby_ad_render_script' ) ) {
				$str .= '<div>' . newsmax_ruby_ad_render_script( $script, 'content_ad' ) . '</div>';
			}
		}
		$str .= '</div>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param array $image
 * @param string $url
 * @param string $class_name
 *
 * @return string
 * render singe custom advertising
 */
if ( ! function_exists( 'newsmax_ruby_single_post_ad_custom' ) ) {
	function newsmax_ruby_single_post_ad_custom( $image = array(), $url = '#', $class_name = '' ) {

		//check
		if ( empty( $image['url'] ) ) {
			return false;
		}

		//render
		$str = '';
		$str .= '<div class="single-post-ad is-ad-custom ' . esc_attr( $class_name ) . '">';
		if ( ! empty( $url ) ) {
			$str .= '<a href="' . $url . '" target="_blank">';
			$str .= '<img src="' . esc_url( $image['url'] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
			$str .= '</a>';
		} else {
			$str .= '<img src="' . esc_url( $image['url'] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
		}
		$str .= '</div>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * single post navigation
 */
if ( ! function_exists( 'newsmax_ruby_single_post_navigation' ) ) {
	function newsmax_ruby_single_post_navigation() {

		$check = newsmax_ruby_get_option( 'single_post_box_navigation' );
		if ( empty( $check ) ) {
			return false;
		}

		$post_previous = get_adjacent_post( false, '', true );
		$post_next     = get_adjacent_post( false, '', false );

		if ( empty( $post_previous ) && empty( $post_next ) ) {
			return false;
		}

		$str = '';
		$str .= '<nav class="single-post-box single-post-box-nav clearfix row">';

		if ( ! empty( $post_previous ) ) {
			$str .= '<div class="col-sm-6 col-xs-12 nav-el nav-left">';
			$str .= '<div class="nav-arrow">';
			$str .= '<i class="fa fa-angle-left"></i>';
			$str .= '<span class="nav-sub-title">' . newsmax_ruby_translate( 'previous_article' ) . '</span>';
			$str .= '</div>';

			$str .= '<h3 class="post-title is-size-4">';
			$str .= '<a href="' . get_permalink( $post_previous->ID ) . '" rel="bookmark" title="' . esc_attr( get_the_title( $post_previous->ID ) ) . '">';
			$str .= get_the_title( $post_previous->ID );
			$str .= '</a>';
			$str .= '</h3>';
			$str .= '</div>';
		}

		if ( ! empty( $post_next ) ) {
			$str .= '<div class="col-sm-6 col-xs-12 nav-el nav-right">';
			$str .= '<div class="nav-arrow">';
			$str .= '<span class="nav-sub-title">' . newsmax_ruby_translate( 'next_article' ) . '</span>';
			$str .= '<i class="fa fa-angle-right"></i>';
			$str .= '</div>';
			$str .= '<h3 class="post-title is-size-4">';
			$str .= '<a href="' . get_permalink( $post_next->ID ) . '" rel="bookmark" title="' . esc_attr( get_the_title( $post_next->ID ) ) . '">';
			$str .= get_the_title( $post_next->ID );
			$str .= '</a>';
			$str .= '</h3>';
			$str .= '</div>';
		}

		$str .= '</nav>';

		wp_reset_postdata();

		return $str;

	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single post box comment
 */
if ( ! function_exists( 'newsmax_ruby_single_post_box_comment' ) ) {
	function newsmax_ruby_single_post_box_comment() {

		//render
		$str    = '';
		$button = newsmax_ruby_get_option( 'single_post_box_comment_button' );

		if ( function_exists( 'wp_doing_ajax' ) && wp_doing_ajax() ) {
			$button = false;
		}

		if ( ! empty( $button ) ) {
			$str .= '<div class="single-post-box single-post-box-comment is-show-btn">';
			$comment_number = get_comments_number();
			$comment_number = intval( $comment_number );

			$str .= '<div class="box-comment-btn-wrap">';
			$str .= '<a href="#" class="box-comment-btn">';
			if ( $comment_number > 1 ) {
				$str .= sprintf( newsmax_ruby_translate( 'show_p_comments' ), esc_attr( $comment_number ) );
			} elseif ( 1 == $comment_number ) {
				$str .= newsmax_ruby_translate( 'show_1_comment' );
			} else {
				$str .= newsmax_ruby_translate( 'leave_a_reply' );
			}

			$str .= '</a>';
			$str .= '</div>';
			$str .= '<div class="box-comment-content">';

			ob_start();
			comments_template();
			$str .= ob_get_clean();

			$str .= '</div>';
			$str .= '</div>';
		} else {
			$str .= '<div class="single-post-box single-post-box-comment">';
			$str .= '<div class="box-comment-content">';

			ob_start();
			comments_template();
			$str .= ob_get_clean();

			$str .= '</div>';
			$str .= '</div>';
		}

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single post share bar
 */
if ( ! function_exists( 'newsmax_ruby_single_post_action' ) ) {
	function newsmax_ruby_single_post_action() {

		$counter_type = newsmax_ruby_get_option( 'single_post_counter_type' );

		$str         = '';
		$str_content = '';
		$str_counter = '';

		if ( 'share' == $counter_type ) {
			$str_counter .= newsmax_ruby_single_post_share_total();
		} elseif ( 'view' == $counter_type ) {
			$str_counter .= newsmax_ruby_single_post_view_total();
		} elseif ( 'all' == $counter_type ) {
			$str_counter .= newsmax_ruby_single_post_share_total();
			$str_counter .= newsmax_ruby_single_post_view_total();
		}

		if ( ! empty( $str_counter ) ) {
			$str_content .= '<div class="single-post-counter">';
			$str_content .= $str_counter;
			$str_content .= '</div>';
		}

		$str_content .= newsmax_ruby_single_post_share_top();

		if ( ! empty( $str_content ) ) {
			$str .= '<div class="single-post-action clearfix">';
			$str .= $str_content;
			$str .= '</div>';
		}

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single post thumbnail classic
 */
if ( ! function_exists( 'newsmax_ruby_single_post_thumb_classic' ) ) {
	function newsmax_ruby_single_post_thumb_classic( $param = array() ) {


		if ( empty( $param['thumb_size'] ) || 'crop' == $param['thumb_size'] ) {
			$size = 'newsmax_ruby_crop_750x460';
		} else {
			$size = 'full';
		}

		//render
		$str = '';
		if ( has_post_thumbnail() ) {
			$str .= '<div class="single-post-thumb-outer">';
			$str .= '<div class="post-thumb">';
			$str .= get_the_post_thumbnail( get_the_ID(), $size );
			$str .= newsmax_ruby_feat_credit();
			$str .= '</div>';
			if ( ! empty( $param['video_popup'] ) ) {
				$str .= newsmax_ruby_single_post_popup_video();
			}

			$str .= '</div>';
		}

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param array $param
 *
 * @return string
 * single post thumbnail overlay
 */
if ( ! function_exists( 'newsmax_ruby_single_post_thumb_overlay' ) ) {
	function newsmax_ruby_single_post_thumb_overlay( $param = array() ) {

		if ( empty( $param['thumb_size'] ) || 'crop' == $param['thumb_size'] ) {
			$size = 'newsmax_ruby_crop_1100x580';
		} else {
			$size = 'full';
		}

		$str = '';
		if ( has_post_thumbnail() ) {
			$str .= '<div class="post-thumb">';
			$str .= get_the_post_thumbnail( get_the_ID(), $size );
			$str .= '</div>';
		}

		return $str;
	}

}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $size
 * @param bool $video_popup
 *
 * @return string
 * single post thumbnail overlay
 */
if ( ! function_exists( 'newsmax_ruby_single_post_thumb_bg' ) ) {
	function newsmax_ruby_single_post_thumb_bg( $param ) {

		if ( empty( $param['thumb_size'] ) || 'crop' == $param['thumb_size'] ) {
			$size = 'newsmax_ruby_crop_1400x700';
		} else {
			$size = 'full';
		}

		//render
		$str = '';
		if ( has_post_thumbnail() ) {
			$str .= '<div class="single-post-feat-image" style="display: none">';
			$str .= get_the_post_thumbnail( get_the_ID(), $size );
			$str .= '</div>';
		}

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $classes
 *
 * @return string
 * render single post video popup
 */
if ( ! function_exists( 'newsmax_ruby_single_post_popup_video' ) ) {
	function newsmax_ruby_single_post_popup_video( $classes = 'is-size-2 is-light-text is-absolute' ) {

		$class_name   = array();
		$class_name[] = 'post-format-wrap is-single-video-format ';
		if ( ! empty( $classes ) ) {
			$class_name[] = $classes;
		}
		$class_name = implode( ' ', $class_name );

		$str = '';
		$str .= '<div class="' . esc_attr( $class_name ) . '">';
		$str .= '<span class="post-format-icon is-video-format">';
		$str .= '<a href="#" data-effect="mpf-ruby-effect" class="single-post-popup-video-btn"></a>';
		$str .= '<i class="fa fa-play" aria-hidden="true"></i></span>';
		$str .= '</div>';

		$str .= '<div class="single-post-popup-video mfp-hide mfp-animation">';
		$str .= '<div class="popup-thumbnail-video-holder">';
		$str .= '<div class="single-post-popup-video-inner">';
		$str .= '<div class="post-thumb iframe-video">';
		$str .= newsmax_ruby_iframe_video();
		$str .= '</div>';
		$str .= '</div>';
		$str .= '</div>';
		$str .= '</div>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single post video classic
 */
if ( ! function_exists( 'newsmax_ruby_single_post_video_classic' ) ) {
	function newsmax_ruby_single_post_video_classic() {

		$autoplay   = newsmax_ruby_single_post_check_autoplay();
		$class_name = 'single-post-thumb-outer single-post-video-outer';
		if ( ! empty( $autoplay ) ) {
			$class_name = 'single-post-thumb-outer single-post-video-outer is-feat-video-autoplay';
		}
		//render
		$str = '';
		$str .= '<div class="' . esc_attr( $class_name ) . '">';
		$str .= '<div class="post-thumb iframe-video">';
		$str .= newsmax_ruby_iframe_video();
		$str .= '</div>';
		$str .= '</div>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single post video classic
 */
if ( ! function_exists( 'newsmax_ruby_single_post_audio_classic' ) ) {
	function newsmax_ruby_single_post_audio_classic() {

		$str    = '';
		$iframe = newsmax_ruby_iframe_audio();

		if ( ! empty( $iframe ) ) {
			$str .= '<div class="single-post-thumb-outer single-post-audio-outer">';
			$str .= '<div class="post-thumb iframe-audio">';
			$str .= newsmax_ruby_iframe_audio();
			$str .= '</div>';
			$str .= '</div>';
		}

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single gallery grid thumbnail
 */
if ( ! function_exists( 'newsmax_ruby_single_post_thumb_gallery_grid' ) ) {
	function newsmax_ruby_single_post_thumb_gallery_grid() {

		$post_id = get_the_ID();

		$str = '';

		$param               = array();
		$param['unique_id']  = 'ruby-gallery-grid-' . $post_id;
		$param['thumb_size'] = 'newsmax_ruby_crop_380x380';
		$param['class_name'] = 'is-single-gallery-grid single-post-thumb-outer';
		$param['popup']      = true;

		$str .= newsmax_ruby_post_thumb_gallery_grid( $param );

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single gallery grid thumbnail
 */
if ( ! function_exists( 'newsmax_ruby_single_post_thumb_gallery_slider' ) ) {
	function newsmax_ruby_single_post_thumb_gallery_slider( $param = array() ) {

		if ( ( ! empty( $param['sidebar_position'] ) && 'none' == $param['sidebar_position'] ) || ( ! empty( $param['gallery_style'] ) && 2 == $param['gallery_style'] ) ) {
			$param['size'] = 'newsmax_ruby_crop_1100x580';
		} else {
			$param['size'] = 'newsmax_ruby_crop_750x460';
		}

		return newsmax_ruby_post_thumb_gallery_slider( $param );
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single post tag
 */
if ( ! function_exists( 'newsmax_ruby_single_post_tag' ) ) {
	function newsmax_ruby_single_post_tag() {

		$single_post_tag = newsmax_ruby_get_option( 'single_post_tag' );
		if ( empty( $single_post_tag ) ) {
			return false;
		}

		$tags = get_the_tags();

		$str = '';
		if ( ! empty( $tags ) && is_array( $tags ) ) {
			$str .= '<div class="single-post-tag">';
			$str .= '<span class="tag-label">' . newsmax_ruby_translate( 'tags' ) . '</span>';
			foreach ( $tags as $tags_el ) {
				$tag_el_link = get_tag_link( $tags_el->term_id );
				$str .= '<a target="_blank" href="' . esc_url( $tag_el_link ) . '" title="' . esc_attr( $tags_el->name ) . '">' . esc_html( $tags_el->name ) . '</a>';
			}
			$str .= '</div>';
		}

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single post source
 */
if ( ! function_exists( 'newsmax_ruby_single_post_source' ) ) {
	function newsmax_ruby_single_post_source() {

		$post_id     = get_the_ID();
		$source_name = get_post_meta( $post_id, 'newsmax_ruby_meta_post_source_name', true );
		$source_url  = get_post_meta( $post_id, 'newsmax_ruby_meta_post_source_url', true );

		$str = '';
		if ( ! empty( $source_url ) && ! empty( $source_name ) ) {
			$str .= '<div class="single-post-source single-post-tag">';
			$str .= '<span class="tag-label">' . newsmax_ruby_translate( 'source' ) . '</span>';
			$str .= '<a href="' . esc_url( $source_url ) . '" title="' . esc_attr( $source_name ) . '" target="_blank" rel="nofollow">' . esc_html( $source_name ) . '</a>';
			$str .= '</div>';
		}

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single post post via
 */
if ( ! function_exists( 'newsmax_ruby_single_post_via' ) ) {
	function newsmax_ruby_single_post_via() {

		$post_id  = get_the_ID();
		$via_name = get_post_meta( $post_id, 'newsmax_ruby_meta_post_via_name', true );
		$via_url  = get_post_meta( $post_id, 'newsmax_ruby_meta_post_via_url', true );

		$str = '';
		if ( ! empty( $via_url ) && ! empty( $via_name ) ) {
			$str .= '<div class="single-post-via single-post-tag">';
			$str .= '<span class="tag-label">' . newsmax_ruby_translate( 'via' ) . '</span>';
			$str .= '<a href="' . esc_url( $via_url ) . '" title="' . esc_attr( $via_name ) . '" target="_blank" rel="nofollow">' . esc_html( $via_name ) . '</a>';
			$str .= '</div>';
		}

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $classes
 *
 * @return string
 * render single post review
 */
if ( ! function_exists( 'newsmax_ruby_single_post_review' ) ) {
	function newsmax_ruby_single_post_review( $classes = '' ) {

		$post_id        = get_the_ID();
		$review_summary = get_post_meta( $post_id, 'newsmax_ruby_review_summary', true );
		$review_pros    = get_post_meta( $post_id, 'newsmax_ruby_review_pros', true );
		$review_cons    = get_post_meta( $post_id, 'newsmax_ruby_review_cons', true );
		$total_score    = get_post_meta( $post_id, 'newsmax_ruby_as', true );
		$title_summary  = newsmax_ruby_get_option( 'single_review_box_title_summary' );
		$title_good     = newsmax_ruby_get_option( 'single_review_box_title_pros' );
		$title_bad      = newsmax_ruby_get_option( 'single_review_box_title_cons' );

		$review_data = array(
			array(
				'newsmax_ruby_cd' => get_post_meta( $post_id, 'newsmax_ruby_cd1', true ),
				'newsmax_ruby_cs' => get_post_meta( $post_id, 'newsmax_ruby_cs1', true ),
			),
			array(
				'newsmax_ruby_cd' => get_post_meta( $post_id, 'newsmax_ruby_cd2', true ),
				'newsmax_ruby_cs' => get_post_meta( $post_id, 'newsmax_ruby_cs2', true ),
			),
			array(
				'newsmax_ruby_cd' => get_post_meta( $post_id, 'newsmax_ruby_cd3', true ),
				'newsmax_ruby_cs' => get_post_meta( $post_id, 'newsmax_ruby_cs3', true ),
			),
			array(
				'newsmax_ruby_cd' => get_post_meta( $post_id, 'newsmax_ruby_cd4', true ),
				'newsmax_ruby_cs' => get_post_meta( $post_id, 'newsmax_ruby_cs4', true ),
			),
			array(
				'newsmax_ruby_cd' => get_post_meta( $post_id, 'newsmax_ruby_cd5', true ),
				'newsmax_ruby_cs' => get_post_meta( $post_id, 'newsmax_ruby_cs5', true ),
			),
			array(
				'newsmax_ruby_cd' => get_post_meta( $post_id, 'newsmax_ruby_cd6', true ),
				'newsmax_ruby_cs' => get_post_meta( $post_id, 'newsmax_ruby_cs6', true ),
			),
			array(
				'newsmax_ruby_cd' => get_post_meta( $post_id, 'newsmax_ruby_cd7', true ),
				'newsmax_ruby_cs' => get_post_meta( $post_id, 'newsmax_ruby_cs7', true ),
			),
		);

		$class_name = 'review-box-wrap ' . esc_attr( $classes );

		$str = '';
		$str .= '<div class="' . esc_attr( $class_name ) . '">';
		$str .= '<div class="review-box-inner">';
		$str .= '<div class="review-box-title post-title"><h3>' . newsmax_ruby_translate( 'review_overview' ) . '</h3></div>';
		$str .= '<div class="review-content-wrap">';
		foreach ( $review_data as $data ) {
			if ( ! empty( $data['newsmax_ruby_cd'] ) ) {
				$str .= '<div class="review-el">';
				$str .= '<div class="review-el-inner">';
				$str .= '<span class="review-description">' . esc_attr( $data['newsmax_ruby_cd'] ) . '</span>';
				$str .= '<span class="review-info-score">' . esc_attr( $data['newsmax_ruby_cs'] ) . '</span>';
				$str .= '</div>';
				$str .= '<div class="score-bar-wrap">';
				$str .= '<div class="score-bar score-remove" style="width:' . esc_attr( $data['newsmax_ruby_cs'] * 10 ) . '%"></div>';
				$str .= '</div>';
				$str .= '</div><!--#reivew el-->';
			}
		}

		$str .= '<div class="review-summary-wrap">';

		if ( ! empty( $review_pros ) || ! empty( $review_cons ) ) {
			$str .= '<div class="review-pros-cons-wrap">';
			if ( ! empty( $review_pros ) ) {

				$review_pros = explode( '/', $review_pros );

				$str .= '<div class="review-pros-cons">';
				$str .= '<h3 class="review-pros-title">' . esc_html( $title_good ) . '</h3>';
				$str .= '<ul>';
				foreach ( $review_pros as $review_pros_el ) {
					$str .= '<li>' . esc_html( $review_pros_el ) . '</li>';
				}
				$str .= '</ul>';
				$str .= '</div>';
			}

			if ( ! empty( $review_cons ) ) {

				$review_cons = explode( '/', $review_cons );

				$str .= '<div class="review-pros-cons">';
				$str .= '<h3 class="review-cons-title">' . esc_html( $title_bad ) . '</h3>';
				$str .= '<ul>';
				foreach ( $review_cons as $review_cons_el ) {
					$str .= '<li>' . esc_html( $review_cons_el ) . '</li>';
				}
				$str .= '</ul>';
				$str .= '</div>';
			}
			$str .= '</div>';
		}

		if ( ! empty( $review_summary ) ) {
			$str .= '<div class="review-summary-inner">';
			$str .= '<h3>' . esc_html( $title_summary ) . '</h3>';
			$str .= '<p class="review-summary-desc">';
			$str .= '<span class="post-review-info">';
			$str .= '<span class="review-info-score">' . esc_attr( $total_score ) . '</span>';
			$str .= '</span>';
			$str .= esc_html( $review_summary );
			$str .= '</p>';
			$str .= '</div>';
		}

		$str .= '</div>';
		$str .= '</div>';
		$str .= '</div>';
		$str .= '</div>';

		return $str;
	}
}
