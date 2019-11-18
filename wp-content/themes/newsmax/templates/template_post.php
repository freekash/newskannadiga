<?php

/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $classes
 *
 * @return string
 * render post title
 */
if ( ! function_exists( 'newsmax_ruby_post_title' ) ) {
	function newsmax_ruby_post_title( $classes = 'is-size-3' ) {

		$class_name = 'post-title entry-title ' . esc_attr( $classes );

		//render
		$str = '';
		$str .= '<h2 class="' . esc_attr( $class_name ) . '">';
		$str .= '<a class="post-title-link" href="' . esc_url( get_permalink() ) . '" rel="bookmark" title="' . esc_attr( get_the_title() ) . '">';
		$str .= get_the_title();
		$str .= '</a></h2>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $classes
 *
 * @return string
 * render post category info
 */
if ( ! function_exists( 'newsmax_ruby_post_cat_info' ) ) {
	function newsmax_ruby_post_cat_info( $classes = '', $primary = true ) {

		$categories       = get_the_category();
		$primary_category = get_post_meta( get_the_ID(), 'newsmax_ruby_meta_post_primary_cat', true );

		$class_name   = array();
		$class_name[] = 'post-cat-info';
		if ( ! empty( $classes ) ) {
			$class_name[] = $classes;
		}
		$class_name = implode( ' ', $class_name );

		//render
		$str = '';
		$str .= '<div class="' . esc_attr( $class_name ) . '">';

		if ( empty( $primary_category ) || false === $primary ) {
			if ( ! empty( $categories ) && is_array( $categories ) ) {
				foreach ( $categories as $category ) {
					$str .= '<a class="cat-info-el cat-info-id-' . esc_attr( $category->term_id ) . '" href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( $category->name ) . '">';
					$str .= esc_html( $category->name );
					$str .= '</a>';
				}
			}
		} else {

			//get name
			$primary_category_name = get_cat_name( $primary_category );

			$str .= '<a class="cat-info-el cat-info-id-' . esc_attr( $primary_category ) . '" href="' . get_category_link( $primary_category_name ) . '" title="' . esc_attr( $primary_category_name ) . '">';
			$str .= esc_html( $primary_category_name );
			$str .= '</a>';
		}


		$str .= '</div>';

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $excerpt_length
 * @param bool $display_shotrcode
 *
 * @return string
 *  render excerpt
 */
if ( ! function_exists( 'newsmax_ruby_post_excerpt' ) ) {
	function newsmax_ruby_post_excerpt( $excerpt_length = 20, $display_shotrcode = false ) {

		//check
		if ( empty( $excerpt_length ) ) {
			return false;
		}

		//render
		global $post;

		if ( ! empty( $post->post_excerpt ) ) {
			return '<div class="post-excerpt"><p>' . esc_html( $post->post_excerpt ) . '</p></div><!--#excerpt-->';

		} else {
			$post_content = $post->post_content;
			if ( ! $display_shotrcode ) {
				$post_content = preg_replace( '`\[[^\]]*\]`', '', $post->post_content );
			}
			$post_content = stripslashes( wp_filter_nohtml_kses( $post_content ) );
			$post_content = wp_trim_words( $post_content, $excerpt_length, '' );
			if ( ! empty( $post_content ) ) {
				$post_content = $post_content . esc_html__( '...', 'newsmax' );
			}

			return '<div class="post-excerpt"><p>' . html_entity_decode( $post_content ) . '</p></div><!--#excerpt-->';
		}
	}
}

if ( ! function_exists( 'newsmax_ruby_post_excerpt_classic' ) ) {
	function newsmax_ruby_post_excerpt_classic() {

		//render
		global $post;

		$str = '';
		$str .= '<div class="post-excerpt post-excerpt-moretag entry">';
		ob_start();
		the_content( ' ' );
		$str .= ob_get_clean();
		$str .= '</div><!--#excerpt-->';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param array $override
 * @param string $classes
 * @param bool $enable_right
 *
 * @return string
 * render post meta info bar
 */
if ( ! function_exists( 'newsmax_ruby_post_meta_info' ) ) {
	function newsmax_ruby_post_meta_info( $override = array(), $classes = '', $enable_right = true ) {

		//get options
		$meta_info_manager = newsmax_ruby_get_option( 'post_meta_info_manager' );
		$meta_info_icon    = newsmax_ruby_get_option( 'post_meta_info_icon' );
		$meta_info_avatar  = newsmax_ruby_get_option( 'post_meta_info_icon_avatar' );

		if ( ! empty( $override ) && is_array( $override ) ) {
			$meta_info_manager['enabled'] = $override;
		}

		if ( empty( $meta_info_manager['enabled'] ) || ! is_array( $meta_info_manager['enabled'] ) ) {
			return false;
		}

		$class_name   = array();
		$class_name[] = 'post-meta-info';
		if ( ! empty( $classes ) ) {
			$class_name[] = $classes;
		}
		if ( ! empty( $meta_info_icon ) ) {
			$class_name[] = 'is-show-icon';
		} else {
			$class_name[] = 'is-hide-icon';
		}

		if ( ! empty( $meta_info_avatar ) && empty( $override ) ) {
			$class_name[] = 'is-show-avatar';
		}

		$class_name = implode( ' ', $class_name );

		//render
		$str = '';
		$str .= '<div class="' . esc_attr( $class_name ) . '">';
		$str .= '<div class="post-meta-info-left">';

		if ( ! empty( $meta_info_avatar ) && empty( $override ) ) {
			$str .= newsmax_ruby_meta_info_avatar();
		}
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
				case 'share' :
					$str .= newsmax_ruby_meta_info_share( $meta_info_icon );
					break;
			};
		}
		$str .= '</div>';

		if ( true === $enable_right ) {
			$str .= newsmax_ruby_post_meta_info_right();
		}
		$str .= '</div>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $meta_info_icon
 *
 * @return string
 * render meta date
 */
if ( ! function_exists( 'newsmax_ruby_meta_info_date' ) ) {
	function newsmax_ruby_meta_info_date( $meta_info_icon = false ) {

		$date_unix  = get_the_time( 'U', get_the_ID() );
		$human_time = newsmax_ruby_get_option( 'human_time' );

		if ( ! empty( $human_time ) ) {
			$class_name = 'meta-info-el meta-info-date is-human-time';
			$text_time  = sprintf( newsmax_ruby_translate( 'p_ago' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) );
		} else {
			$class_name = 'meta-info-el meta-info-date';
			$text_time  = get_the_date( '' );
		}

		//render
		$str = '';
		$str .= '<span class="' . esc_attr( $class_name ) . '">';
		if ( ! empty( $meta_info_icon ) ) {
			$str .= '<i class="icon-simple icon-clock"></i>';
		}
		$str .= '<time class="date published" datetime="' . date( DATE_W3C, $date_unix ) . '">' . esc_html( $text_time ) . '</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$str .= '<time class="updated" datetime="' . get_the_modified_date( DATE_W3C ) . '">' . get_the_modified_date() . '</time>';
		}
		$str .= '</span><!--#meta info date-->';

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param $meta_info_icon
 *
 * @return string
 * render meta info author
 */
if ( ! function_exists( 'newsmax_ruby_meta_info_author' ) ) {
	function newsmax_ruby_meta_info_author( $meta_info_icon = false ) {
		//render
		$str = '';
		$str .= '<span class="meta-info-el meta-info-author">';
		if ( ! empty( $meta_info_icon ) ) {
			$str .= '<i class="icon-simple icon-note"></i>';
		}
		$str .= '<span class="vcard author">';
		$str .= '<a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '">';
		$str .= get_the_author_meta( 'display_name' );
		$str .= '</a>';
		$str .= '</span>';
		$str .= '</span>';

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param $meta_info_icon
 *
 * @return string
 * render meta info author
 */
if ( ! function_exists( 'newsmax_ruby_meta_info_avatar' ) ) {
	function newsmax_ruby_meta_info_avatar() {
		//render
		$str = '';

		$str .= '<span class="meta-info-el post-meta-info-avatar">';
		$str .= '<a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '">';
		$str .= get_avatar( get_the_author_meta( 'user_email' ), 20, '', get_the_author_meta( 'display_name' ) );
		$str .= '</a>';
		$str .= '</span>';

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param $meta_info_icon
 *
 * @return string
 * render category meta info
 */
if ( ! function_exists( 'newsmax_ruby_meta_info_cat' ) ) {
	function newsmax_ruby_meta_info_cat( $meta_info_icon = false, $primary = true ) {

		//check
		$categories       = get_the_category();
		$primary_category = get_post_meta( get_the_ID(), 'newsmax_ruby_meta_post_primary_cat', true );

		if ( empty( $categories ) || ! array( $categories ) ) {
			return false;
		}

		//render
		$str = '';
		$str .= '<span class="meta-info-el meta-info-cat">';
		if ( ! empty( $meta_info_icon ) ) {
			$str .= '<i class="icon-simple icon-folder"></i>';
		}
		if ( empty( $primary_category ) || false === $primary ) {
			foreach ( $categories as $category ) {
				$str .= '<a class="info-cat-el" href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( $category->name ) . '">';
				$str .= esc_html( $category->name );
				$str .= '</a>';
			}
		} else {

			//get name
			$primary_category_name = get_cat_name( $primary_category );
			$str .= '<a class="info-cat-el" href="' . get_category_link( $primary_category ) . '" title="' . esc_attr( $primary_category_name ) . '">';
			$str .= esc_html( $primary_category_name );
			$str .= '</a>';
		}
		$str .= '</span>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $meta_info_icon
 *
 * @return string
 * render tag tag
 */
if ( ! function_exists( 'newsmax_ruby_meta_info_tag' ) ) {
	function newsmax_ruby_meta_info_tag( $meta_info_icon = false ) {

		//check
		$tags = get_the_tags();
		if ( empty( $tags ) || ! is_array( $tags ) ) {
			return false;
		}

		//render
		$str = '';
		$str .= '<span class="meta-info-el meta-info-tag">';
		if ( ! empty( $meta_info_icon ) ) {
			$str .= '<i class="icon-simple icon-tag"></i>';
		}
		foreach ( $tags as $tag ) {
			$tag_link = get_tag_link( $tag->term_id );
			$str .= '<a class="info-tag-el" href="' . $tag_link . '" title="' . esc_attr( strip_tags( $tag->name ) ) . '">';
			$str .= esc_html( $tag->name );
			$str .= '</a>';
		}
		$str .= '</span>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $meta_info_icon
 *
 * @return string
 * render view meta info
 */
if ( ! function_exists( 'newsmax_ruby_meta_info_view' ) ) {
	function newsmax_ruby_meta_info_view( $meta_info_icon = false ) {

		if ( ! function_exists( 'newsmax_ruby_post_view_total' ) ) {
			return false;
		}

		$total_view = newsmax_ruby_post_view_total();
		if ( empty ( $total_view ) ) {
			return false;
		}

		//render
		$str = '';
		$str .= '<span class="meta-info-el meta-info-view">';
		if ( ! empty( $meta_info_icon ) ) {
			$str .= '<i class="icon-simple icon-fire"></i>';
		}
		if ( 1 == $total_view ) {
			$str .= '<a href="' . get_permalink() . '" title="' . esc_attr( get_the_title() ) . '">';
			$str .= newsmax_ruby_translate( '1_view' );
			$str .= '</a>';
		} else {
			$str .= '<a href="' . get_permalink() . '" title="' . esc_attr( get_the_title() ) . '">';
			$str .= sprintf( newsmax_ruby_translate( 'p_views' ), $total_view );
			$str .= '</a>';
		};
		$str .= '</span>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $meta_info_icon
 *
 * @return string
 * render meta info comment
 */
if ( ! function_exists( 'newsmax_ruby_meta_info_comment' ) ) {
	function newsmax_ruby_meta_info_comment( $meta_info_icon = false ) {

		///check comment
		if ( ! comments_open() ) {
			return false;
		}

		$total_comment = get_comments_number();

		//render
		$str = '';
		$str .= '<span  class="meta-info-el meta-info-comment">';
		if ( ! empty( $meta_info_icon ) ) {
			$str .= '<i class="icon-simple icon-bubble"></i>';
		}

		$str .= '<a href="' . get_comments_link() . '" title="' . esc_attr( get_the_title() ) . '">';

		if ( 0 == $total_comment ) {
			$str .= newsmax_ruby_translate( 'no_comment' );
		} elseif ( 1 == $total_comment ) {
			$str .= newsmax_ruby_translate( '1_comment' );
		} else {
			$str .= sprintf( newsmax_ruby_translate( 'p_comments' ), $total_comment );
		}

		$str .= '</a>';
		$str .= '</span>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $meta_info_icon
 *
 * @return string
 * render meta info share
 */
if ( ! function_exists( 'newsmax_ruby_meta_info_share' ) ) {
	function newsmax_ruby_meta_info_share( $meta_info_icon = false ) {

		//total shares
		if ( ! function_exists( 'newsmax_ruby_social_share_total' ) ) {
			return false;
		}

		$total_share = newsmax_ruby_social_share_total();
		if ( empty( $total_share ) ) {
			return false;
		}

		//render
		$str = '';
		$str .= '<span  class="meta-info-el meta-info-share">';
		if ( ! empty( $meta_info_icon ) ) {
			$str .= '<i class="icon-simple icon-share"></i>';
		}
		$str .= '<a href="' . get_permalink() . '" title="' . esc_attr( get_the_title() ) . '">';
		if ( 1 == $total_share ) {
			$str .= newsmax_ruby_translate( '1_share' );
		} else {
			$str .= sprintf( newsmax_ruby_translate( 'p_shares' ), $total_share );
		}
		$str .= '</a>';
		$str .= '</span>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $classes
 *
 * @return string
 * render post format icon
 */
if ( ! function_exists( 'newsmax_ruby_post_format' ) ) {
	function newsmax_ruby_post_format( $classes = 'is-absolute', $media_duration = false ) {

		$format_video   = newsmax_ruby_get_option( 'post_format_video' );
		$format_gallery = newsmax_ruby_get_option( 'post_format_gallery' );
		$format_audio   = newsmax_ruby_get_option( 'post_format_audio' );

		$class_name   = array();
		$class_name[] = 'post-format-wrap';
		if ( ! empty( $classes ) ) {
			$class_name[] = $classes;
		}

		$class_name = implode( ' ', $class_name );

		$str = '';
		switch ( get_post_format() ) {
			case 'video' :
				if ( ! empty( $format_video ) ) {
					$str .= '<span class="' . esc_attr( $class_name ) . '">';
					$str .= '<span class="post-format-icon is-video-format"><i class="fa fa-play" aria-hidden="true"></i></span>';
					if ( true === $media_duration ) {
						$str .= newsmax_ruby_post_meta_info_media_duration();
					}
					$str .= '</span>';
				}
				break;
			case  'gallery' :
				if ( ! empty( $format_gallery ) ) {
					$str .= '<span class="' . esc_attr( $class_name ) . '">';
					$str .= '<span class="post-format-icon is-gallery-format"><i class="fa fa-camera" aria-hidden="true"></i></span>';
					$str .= '</span>';
				}
				break;
			case 'audio' :
				if ( ! empty( $format_audio ) ) {
					$str .= '<span class="' . esc_attr( $class_name ) . '">';
					$str .= '<span class="post-format-icon is-audio-format"><i class="fa fa-music" aria-hidden="true"></i></span>';
					if ( true === $media_duration ) {
						$str .= newsmax_ruby_post_meta_info_media_duration();
					}
					$str .= '</span>';
				}
				break;
			default :
				break;
		}

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $classes
 *
 * @return string
 * render share bar
 */
if ( ! function_exists( 'newsmax_ruby_post_meta_info_share' ) ) {
	function newsmax_ruby_post_meta_info_share( $classes = 'is-absolute' ) {

		if ( ! function_exists( 'newsmax_ruby_social_share_post' ) ) {
			return false;
		}

		$class_name   = array();
		$class_name[] = 'post-meta-info-share';
		if ( ! empty( $classes ) ) {
			$class_name[] = $classes;
		}

		$class_name = implode( ' ', $class_name );

		$str = '';
		$str .= '<div class="' . esc_attr( $class_name ) . '">';
		$str .= newsmax_ruby_social_share_post();
		$str .= '</div>';

		return $str;

	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $classes
 *
 * @return string
 * render video duration
 */
if ( ! function_exists( 'newsmax_ruby_post_meta_info_media_duration' ) ) {
	function newsmax_ruby_post_meta_info_media_duration( $classes = 'is-absolute' ) {

		$post_format    = get_post_format();
		$media_duration = '';
		$video_duration = get_post_meta( get_the_ID(), 'newsmax_ruby_meta_post_video_duration', true );
		$audio_duration = get_post_meta( get_the_ID(), 'newsmax_ruby_meta_post_audio_duration', true );

		if ( 'video' != $post_format && 'audio' != $post_format ) {
			return false;
		} else {
			if ( 'video' == $post_format && ! empty( $video_duration ) ) {
				$media_duration = $video_duration;
			};
			if ( 'audio' == $post_format && ! empty( $audio_duration ) ) {
				$media_duration = $audio_duration;
			};
		}

		//check video
		if ( empty( $media_duration ) ) {
			return false;
		}

		$class_name   = array();
		$class_name[] = 'post-meta-info-duration';
		if ( ! empty( $classes ) ) {
			$class_name[] = $classes;
		}
		$class_name = implode( ' ', $class_name );

		$str = '';
		$str .= '<span class="' . esc_attr( $class_name ) . '">';
		$str .= esc_html( $media_duration );
		$str .= '</span>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render post meta info right
 */
if ( ! function_exists( 'newsmax_ruby_post_meta_info_right' ) ) {
	function newsmax_ruby_post_meta_info_right() {
		$post_meta_info_right = newsmax_ruby_get_option( 'post_meta_info_right' );

		if ( empty( $post_meta_info_right ) ) {
			return false;
		}
		$str = '';
		$str .= '<div class="post-meta-info-right">';
		switch ( $post_meta_info_right ) {
			case 'view' :
				$str .= newsmax_ruby_meta_info_right_view();
				break;
			case 'comment' :
				$str .= newsmax_ruby_meta_info_right_comment();
				break;
			case 'share' :
				$str .= newsmax_ruby_meta_info_right_share();
				break;
		};

		$str .= '</div>';

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render meta info right view
 */
if ( ! function_exists( 'newsmax_ruby_meta_info_right_view' ) ) {
	function newsmax_ruby_meta_info_right_view() {

		if ( ! function_exists( 'newsmax_ruby_post_view_total' ) ) {
			return false;
		}

		$total_view = newsmax_ruby_post_view_total();
		if ( empty ( $total_view ) ) {
			return false;
		}

		//render
		$str = '';
		$str .= '<span class="meta-info-right-view meta-info-el">';
		$str .= '<a href="' . get_permalink() . '" title="' . esc_attr( get_the_title() ) . '">';
		$str .= '<i class="icon-simple icon-fire"></i>';
		$str .= esc_html( $total_view );
		$str .= '</a>';
		$str .= '</span>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render meta info right comment
 */
if ( ! function_exists( 'newsmax_ruby_meta_info_right_comment' ) ) {
	function newsmax_ruby_meta_info_right_comment() {

		if ( ! comments_open() ) {
			return false;
		}

		$total_comment = get_comments_number();

		//render
		$str = '';
		$str .= '<span class="meta-info-right-comment meta-info-el">';
		$str .= '<a href="' . get_comments_link() . '" title="' . esc_attr( get_the_title() ) . '">';
		$str .= '<i class="icon-simple icon-bubble"></i>';
		$str .= esc_html( $total_comment );
		$str .= '</a>';
		$str .= '</span>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render meta info right share
 */
if ( ! function_exists( 'newsmax_ruby_meta_info_right_share' ) ) {
	function newsmax_ruby_meta_info_right_share() {

		//total shares
		if ( ! function_exists( 'newsmax_ruby_social_share_total' ) ) {
			return false;
		}

		$total_share = newsmax_ruby_social_share_total();
		if ( empty( $total_share ) ) {
			return false;
		}

		$str = '';
		$str .= '<span class="meta-info-right-share meta-info-el">';
		$str .= '<a href="' . get_permalink() . '" title="' . esc_attr( get_the_title() ) . '">';
		$str .= '<i class="icon-simple icon-share"></i>';
		$str .= esc_html( $total_share );
		$str .= '</a>';
		$str .= '</span>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $classes
 *
 * @return bool|string
 * render post view icon
 */
if ( ! function_exists( 'newsmax_ruby_post_review_icon' ) ) {
	function newsmax_ruby_post_review_icon( $classes = 'is-absolute' ) {

		$review_icon = newsmax_ruby_get_option( 'post_review' );
		if ( empty( $review_icon ) ) {
			return false;
		}

		$score = newsmax_ruby_single_post_check_review();
		if ( empty( $score ) ) {
			return false;
		}

		$class_name   = array();
		$class_name[] = 'post-review-wrap';
		if ( ! empty( $classes ) ) {
			$class_name[] = $classes;
		}
		$class_name = implode( ' ', $class_name );

		$str = '';
		$str .= '<span class="' . esc_attr( $class_name ) . '">';
		$str .= '<span class="post-review-icon">';
		$str .= esc_html( $score );
		$str .= '</span>';
		$str .= '</span>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return bool|string
 * check smooth display
 */
if ( ! function_exists( 'newsmax_ruby_post_check_smooth_display_style' ) ) {
	function newsmax_ruby_post_check_smooth_display_style() {
		$site_smooth_display        = newsmax_ruby_get_option( 'site_smooth_display' );
		$site_smooth_displays_style = newsmax_ruby_get_option( 'site_smooth_display_style' );
		if ( ! empty( $site_smooth_display ) && ! empty( $site_smooth_displays_style ) ) {
			return $site_smooth_displays_style;
		} else {
			return false;
		}
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * check post thumbnail
 */
if ( ! function_exists( 'newsmax_ruby_post_no_thumbnail' ) ) {
	function newsmax_ruby_post_no_thumbnail() {

		$str = '';
		$str .= '<span class="no-thumb"></span>';
		//add edit link
		if ( current_user_can( 'edit_posts' ) ) {
			$str .= '<a class="post-editor" target="_blank" href="' . get_edit_post_link() . '">' . esc_html__( 'edit', 'newsmax' ) . '</a>';
		}

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $classes
 * render readmore btn
 */
if ( ! function_exists( 'newsmax_ruby_post_readmore' ) ) {
	function newsmax_ruby_post_readmore( $classes = '' ) {

		$readmore       = newsmax_ruby_get_option( 'post_readmore' );
		$read_more_text = newsmax_ruby_get_option( 'post_readmore_text' );
		if ( empty( $readmore ) || empty( $read_more_text ) ) {
			return false;
		}

		$class_name   = array();
		$class_name[] = 'post-btn';
		if ( ! empty( $classes ) ) {
			$class_name[] = esc_attr( $classes );
		}

		$class_name = implode( ' ', $class_name );

		//render
		$str = '';
		$str .= '<div class="' . esc_attr( $class_name ) . '">';
		$str .= '<a class="btn" href="' . get_permalink() . '" rel="bookmark" title="' . esc_attr( get_the_title() ) . '">';
		$str .= esc_html( $read_more_text );
		$str .= '</a>';
		$str .= '</div>';

		return $str;
	}
}