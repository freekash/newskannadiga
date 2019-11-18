<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param $body_classes
 *
 * @return array
 * add class to body
 */
if ( ! function_exists( 'newsmax_ruby_body_add_classes' ) ) {
	function newsmax_ruby_body_add_classes( $body_classes ) {

		$site_layout                = newsmax_ruby_get_option( 'site_layout' );
		$site_block_header_style    = newsmax_ruby_get_option( 'site_block_header_style' );
		$topbar_date_js             = newsmax_ruby_get_option( 'topbar_date_js' );
		$topbar_width               = newsmax_ruby_get_option( 'topbar_width' );
		$navbar_sticky              = newsmax_ruby_get_option( 'navbar_sticky' );
		$navbar_sticky_smart        = newsmax_ruby_get_option( 'navbar_sticky_smart' );
		$smooth_scroll              = newsmax_ruby_get_option( 'site_smooth_scroll' );
		$site_tooltips              = newsmax_ruby_get_option( 'site_tooltips' );
		$site_tooltips_touch        = newsmax_ruby_get_option( 'site_tooltips_touch' );
		$site_back_to_top           = newsmax_ruby_get_option( 'site_back_to_top' );
		$site_back_to_top_touch     = newsmax_ruby_get_option( 'site_back_to_top_touch' );
		$sidebar_style              = newsmax_ruby_get_option( 'sidebar_style' );
		$breadcrumb_bar             = newsmax_ruby_get_option( 'site_breadcrumb' );
		$site_smooth_displays_style = newsmax_ruby_post_check_smooth_display_style();

		$category_info_style = newsmax_ruby_get_option( 'post_cat_info_style' );
		if ( empty( $category_info_style ) ) {
			$category_info_style = 1;
		}

		$post_excerpt_mobile = newsmax_ruby_get_option( 'post_excerpt_mobile' );
		$button_style = newsmax_ruby_get_option( 'button_style' );
		$social_color = newsmax_ruby_get_option( 'social_color' );
		if ( ! empty( $social_color ) ) {
			$body_classes[] = 'is-social-color';
		}

		$body_classes[] = 'ruby-body';
		$body_classes[] = 'is-holder';

		if ( ! empty( $navbar_sticky ) ) {
			$body_classes[] = 'is-navbar-sticky';
		}

		if ( 'boxed' == $site_layout ) {
			$body_classes[] = 'is-site-boxed';
		} else {
			$body_classes[] = 'is-site-fullwidth';
		}

		if ( ! empty( $navbar_sticky_smart ) ) {
			$body_classes[] = 'is-smart-sticky';
		}

		if ( ! empty( $smooth_scroll ) ) {
			$body_classes[] = 'is-smooth-scroll';
		}

		if ( ! empty( $site_smooth_displays_style ) ) {
			$body_classes[] = 'is-site-smooth-display';
		}

		if ( ! empty( $topbar_date_js ) ) {
			$body_classes[] = 'is-date-js';
		}

		if ( ! empty( $topbar_width ) ) {
			$body_classes[] = 'is-fw-topbar';
		}

		if ( ! empty( $sidebar_style ) ) {
			$body_classes[] = 'is-sidebar-style-' . esc_attr( $sidebar_style );
		}

		if ( ! empty( $breadcrumb_bar ) ) {
			$body_classes[] = 'is-breadcrumb';
		}

		if ( ! empty( $site_tooltips ) ) {
			$body_classes[] = 'is-tooltips';
			if ( ! empty( $site_tooltips_touch ) ) {
				$body_classes[] = 'is-tooltips-touch';
			}
		}

		if ( ! empty( $site_back_to_top ) ) {
			$body_classes[] = 'is-back-top';
			if ( ! empty( $site_back_to_top_touch ) ) {
				$body_classes[] = 'is-back-top-touch';
			}
		}

		if ( ! empty( $site_block_header_style ) ) {
			$body_classes[] = 'is-block-header-style-' . esc_attr( $site_block_header_style );
		}

		if ( ! empty( $post_excerpt_mobile ) ) {
			$body_classes[] = 'is-hide-excerpt';
		}

		$body_classes[] = 'is-cat-style-' . esc_attr( $category_info_style );

		if ( ! empty( $button_style ) ) {
			$body_classes[] = 'is-btn-style-' . $button_style;
		}

		$thumbnail_overlay = newsmax_ruby_get_option( 'thumbnail_overlay' );
		if ( ! empty( $thumbnail_overlay ) && 2 == $thumbnail_overlay ) {
			$body_classes[] = 'is-light-overlay';
		} elseif ( ! empty( $thumbnail_overlay ) && 3 == $thumbnail_overlay ) {
			$body_classes[] = 'is-dark-overlay';
		}

		if ( is_single() ) {
			$data_layout = newsmax_ruby_single_post_check_layout();

			if ( '7' == $data_layout['layout'] ) {
				$body_classes[] = 'is-single-fullscreen';
			}

			$single_content_padding = newsmax_ruby_get_option( 'single_post_content_padding' );
			if ( ! empty( $single_content_padding ) ) {
				$body_classes[] = 'is-entry-padding';
			}

			$single_content_image_popup = newsmax_ruby_get_option( 'single_post_image_popup' );
			if ( ! empty( $single_content_image_popup ) ) {
				$body_classes[] = 'is-entry-image-popup';
			}

			$check_ajax   = newsmax_ruby_single_post_check_ajax();
			$hide_sidebar = newsmax_ruby_get_option( 'single_post_scroll_hide_sidebar' );
			if ( 'scroll' == $check_ajax && ! empty( $hide_sidebar ) ) {
				$body_classes[] = 'is-hide-sidebar';
			}

			$ajax_view = newsmax_ruby_get_option( 'ajax_view' );
			if ( ! empty( $ajax_view ) ) {
				$body_classes[] = 'is-ajax-view';
			}
		}

		return $body_classes;
	}

	add_filter( 'body_class', 'newsmax_ruby_body_add_classes' );
}


/**-------------------------------------------------------------------------------------------------------------------------
 * add span tag for default categories widget
 */
if ( ! function_exists( 'newsmax_ruby_category_widget_span' ) ) {
	function newsmax_ruby_category_widget_span( $str ) {
		$pos = strpos( $str, '</a> (' );
		if ( false != $pos ) {
			$str = str_replace( '</a> (', '<span class="number-post-count">', $str );
			$str = str_replace( ')', '</span></a>', $str );
		}

		return $str;
	}

	add_filter( 'wp_list_categories', 'newsmax_ruby_category_widget_span' );
};


/**-------------------------------------------------------------------------------------------------------------------------
 * add span tag for default archive widget
 */
if ( ! function_exists( 'newsmax_ruby_archives_widget_span' ) ) {
	function newsmax_ruby_archives_widget_span( $str ) {
		$pos = strpos( $str, '</a>&nbsp;(' );
		if ( false != $pos ) {
			$str = str_replace( '</a>&nbsp;(', '<span class="number-post-count">', $str );
			$str = str_replace( ')', '</span></a>', $str );
		}

		return $str;
	}

	add_filter( 'get_archives_link', 'newsmax_ruby_archives_widget_span' );
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return bool
 * slider config
 */
if ( ! function_exists( 'newsmax_ruby_site_slider' ) ) {
	function newsmax_ruby_site_slider() {

		$slider_autoplay   = newsmax_ruby_get_option( 'slider_autoplay' );
		$slider_play_speed = newsmax_ruby_get_option( 'slider_play_speed' );

		if ( empty( $slider_autoplay ) ) {
			$slider_autoplay = 0;
		} else {
			$slider_autoplay = 1;
		}

		if ( empty( $slider_play_speed ) ) {
			$slider_play_speed = 5550;
		}

		if ( intval( $slider_play_speed ) < 1500 ) {
			$slider_play_speed = 1500;
		}

		$str = '';
		$str .= 'data-slider_autoplay="' . esc_attr( $slider_autoplay ) . '" ';
		$str .= 'data-slider_play_speed="' . esc_attr( $slider_play_speed ) . '" ';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $query
 * post per pages
 */
if ( ! function_exists( 'newsmax_ruby_blog_posts_per_page' ) ) {
	function newsmax_ruby_blog_posts_per_page( $query ) {

		if ( is_admin() ) {
			return false;
		}

		if ( $query->is_main_query() ) {

			if ( $query->is_home() || $query->is_search() || $query->is_category() || $query->is_tag() || $query->is_author() || $query->is_archive() ) {
				$query->set( 'post_status', 'publish' );
			}

			if ( $query->is_home() ) {
				$blog_index_posts_per_page = newsmax_ruby_get_option( 'blog_index_posts_per_page' );
				if ( ! empty( $blog_index_posts_per_page ) ) {
					$query->set( 'posts_per_page', $blog_index_posts_per_page );
				}
			} elseif ( $query->is_search() ) {
				$search_posts_per_page = newsmax_ruby_get_option( 'search_posts_per_page' );
				if ( ! empty( $search_posts_per_page ) ) {
					$query->set( 'posts_per_page', $search_posts_per_page );
				}

			} elseif ( $query->is_category() ) {

				$category_id        = newsmax_ruby_get_cat_id();
				$category_cf_layout = get_option( 'newsmax_ruby_category_option_layout' ) ? get_option( 'newsmax_ruby_category_option_layout' ) : array();
				if ( ! empty( $category_cf_layout[ $category_id ]['category_posts_per_page'] ) ) {
					$cat_posts_per_page = $category_cf_layout[ $category_id ]['category_posts_per_page'];
				} else {
					$cat_posts_per_page = newsmax_ruby_get_option( 'category_posts_per_page' );
				}
				if ( ! empty( $cat_posts_per_page ) ) {
					$query->set( 'posts_per_page', $cat_posts_per_page );
				}
			} elseif ( $query->is_tag() ) {
				$tag_posts_per_page = newsmax_ruby_get_option( 'tag_posts_per_page' );
				if ( ! empty( $tag_posts_per_page ) ) {
					$query->set( 'posts_per_page', $tag_posts_per_page );
				}
			} elseif ( $query->is_author() ) {
				$author_posts_per_page = newsmax_ruby_get_option( 'author_posts_per_page' );
				if ( ! empty( $author_posts_per_page ) ) {
					$query->set( 'posts_per_page', $author_posts_per_page );
				}

			} elseif ( $query->is_archive() ) {
				$archive_posts_per_page = newsmax_ruby_get_option( 'archive_posts_per_page' );
				if ( ! empty( $archive_posts_per_page ) ) {
					$query->set( 'posts_per_page', $archive_posts_per_page );
				}
			}
		}
	}

	add_action( 'pre_get_posts', 'newsmax_ruby_blog_posts_per_page' );
}

/**-------------------------------------------------------------------------------------------------------------------------
 * redirect to active plugin
 */
if ( ! function_exists( 'newsmax_ruby_after_theme_active' ) ) {
	function newsmax_ruby_after_theme_active() {

		global $pagenow;

		if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {

			$first_active = get_option( 'newsmax_ruby_first_active_theme', '' );
			if ( ! empty( $first_active ) ) {
				update_option( 'newsmax_ruby_first_active_theme', '1' );
			} else {
				add_option( 'newsmax_ruby_first_active_theme', '1' );
			}

			//redirect
			wp_redirect( admin_url( 'admin.php?page=newsmax-plugins' ) );
			exit;
		}
	}

	add_action( 'after_switch_theme', 'newsmax_ruby_after_theme_active' );
}


