<?php

/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render breadcrumbs bar
 */
if ( ! function_exists( 'newsmax_ruby_dimox_breadcrumb' ) ) {
	function newsmax_ruby_dimox_breadcrumb( $is_single = '' ) {

		$str = '';
		$str .= '<div class="breadcrumb-outer">';
		$check = newsmax_ruby_get_option( 'site_breadcrumb' );

		if ( ! empty( $check ) ) {

			global $post;

			if ( empty( $is_single ) ) {
				$is_single = is_single();
			}

			$text['home']   = newsmax_ruby_translate( 'home' );
			$text['search'] = newsmax_ruby_translate( 'search_result_for' );
			$text['author'] = newsmax_ruby_translate( 'posts_by' );
			$text['404']    = newsmax_ruby_translate( 'error_404' );
			$show_current   = newsmax_ruby_get_option( 'site_breadcrumb_current' );
			$show_on_home   = 0;
			$show_home_link = 1;
			$delimiter      = '<i class="fa fa-angle-right breadcrumb-next"></i>';
			$before         = '<span typeof="v:Breadcrumb" class="breadcrumb-current">';
			$after          = '</span>';



			$home_link   = esc_url( home_url( '/' ) );
			$link_before = '<span typeof="v:Breadcrumb">';
			$link_after  = '</span>';
			$link_attr   = ' rel="bookmark"';
			$link        = $link_before . '<a' . $link_attr . ' href="%1$s" title="%2$s"><span>%2$s</span></a>' . $link_after;
			if ( ! empty( $post ) ) {
				$parent_id = $parent_id_2 = $post->post_parent;
			} else {
				$parent_id = $parent_id_2 = '';
			}

			$frontpage_id = get_option( 'page_on_front' );

			if ( is_home() || is_front_page() ) {
				if ( $show_on_home == 1 ) {
					$str .= '<div class="breadcrumb-wrap"><div class="breadcrumb-inner ruby-container"><span"><a href="' . $home_link . '" title="' . $text['home'] . '"><span>' . $text['home'] . '</span></a></span></div>';
				}
			} else {
				$str .= '<div class="breadcrumb-wrap"><div class="breadcrumb-inner ruby-container">';
				if ( $show_home_link == 1 ) {
					$str .= '<span><a href="' . $home_link . '" rel="bookmark" title="' . $text['home'] . '"><span>' . $text['home'] . '</span></a></span>';
					if ( $frontpage_id == 0 || $parent_id != $frontpage_id ) {
						$str .= $delimiter;
					}
				}

				if ( is_category() ) {
					$this_cat = get_category( get_query_var( 'cat' ), false );
					if ( $this_cat->parent != 0 ) {
						$cats = get_category_parents( $this_cat->parent, true, $delimiter );
						if ( $show_current == 0 ) {
							$cats = preg_replace( "#^(.+)$delimiter$#", "$1", $cats );
						}
						$cats = str_replace( '">', '"><span>', $cats );
						$cats = str_replace( '<a', $link_before . '<a' . $link_attr, $cats );
						$cats = str_replace( 'breadcrumb-next"><span>', 'breadcrumb-next">', $cats );
						$cats = str_replace( '</a>', '</span></a>' . $link_after, $cats );
						$str .= $cats;
					}
					if ( $show_current == 1 ) {
						$str .= $before . single_cat_title( '', false ) . $after;
					}

				} elseif ( is_search() ) {
					$str .= $before . sprintf( $text['search'], get_search_query() ) . $after;

				} elseif ( is_day() ) {
					$str .= sprintf( $link, get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) ) . $delimiter;
					$str .= sprintf( $link, get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ), get_the_time( 'F' ) ) . $delimiter;
					$str .= $before . get_the_time( 'd' ) . $after;

				} elseif ( is_month() ) {
					$str .= sprintf( $link, get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) ) . $delimiter;
					$str .= $before . get_the_time( 'F' ) . $after;

				} elseif ( is_year() ) {
					$str .= $before . get_the_time( 'Y' ) . $after;

				} elseif ( $is_single && ! is_attachment() ) {
					if ( get_post_type() != 'post' ) {
						$post_type = get_post_type_object( get_post_type() );
						$slug      = $post_type->rewrite;
						$str .= sprintf( $link, $home_link . $slug['slug'] . '/', $post_type->labels->singular_name );
						if ( $show_current == 1 ) {
							$str .= $delimiter;
							$str .= $before . get_the_title() . $after;
						}
					} else {
						$cat  = get_the_category();
						$cat  = $cat[0];
						$cats = get_category_parents( $cat, true, $delimiter );
						if ( $show_current == 0 ) {
							$cats = preg_replace( "#^(.+)$delimiter$#", "$1", $cats );
						}
						$cats = str_replace( '">', '"><span>', $cats );
						$cats = str_replace( '<a', $link_before . '<a' . $link_attr, $cats );
						$cats = str_replace( 'breadcrumb-next"><span>', 'breadcrumb-next">', $cats );
						$cats = str_replace( '</a>', '</span></a>' . $link_after, $cats );
						$str .= $cats;
						if ( $show_current == 1 ) {
							$str .= $before . get_the_title() . $after;
						}
					}

				} elseif ( ! $is_single && ! is_page() && get_post_type() != 'post' && ! is_404() ) {
					$post_type = get_post_type_object( get_post_type() );
					$str .= $before . esc_html( $post_type->labels->singular_name ) . $after;

				} elseif ( is_attachment() ) {

					$parent = '';

					if ( ! empty( $parent_id ) ) {
						$parent = get_post( $parent_id );
						$cat    = get_the_category( $parent->ID );
					}

					if ( ! empty( $cat[0] ) ) {
						$cat = $cat[0];
					}

					if ( ! empty( $cat ) ) {
						$cats = get_category_parents( $cat, true, $delimiter );
						$cats = str_replace( '">', '"><span>', $cats );
						$cats = str_replace( '<a', $link_before . '<a' . $link_attr, $cats );
						$cats = str_replace( 'breadcrumb-next"><span>', 'breadcrumb-next">', $cats );
						$cats = str_replace( '</a>', '</span></a>' . $link_after, $cats );
						$str .= $cats;
					}

					if ( ! empty( $parent->ID ) ) {
						$str .= sprintf( $link, get_permalink( $parent ), get_the_title( $parent->ID ) ) . $delimiter;
					}  //fixed
					if ( $show_current == 1 ) {
						$str .= $before . get_the_title() . $after;
					}

				} elseif ( is_page() && ! $parent_id ) {
					if ( $show_current == 1 ) {
						$str .= $before . get_the_title() . $after;
					}

				} elseif ( is_page() && $parent_id ) {
					if ( $parent_id != $frontpage_id ) {
						$breadcrumbs = array();
						while ( $parent_id ) {
							$page = get_post( $parent_id );
							if ( $parent_id != $frontpage_id ) {
								$breadcrumbs[] = sprintf( $link, get_permalink( $page->ID ), get_the_title( $page->ID ) );
							}
							$parent_id = $page->post_parent;
						}
						$breadcrumbs = array_reverse( $breadcrumbs );
						for ( $i = 0; $i < count( $breadcrumbs ); $i ++ ) {
							$str .= $breadcrumbs[ $i ];
							if ( $i != count( $breadcrumbs ) - 1 ) {
								$str .= $delimiter;
							}
						}
					}
					if ( $show_current == 1 ) {
						if ( $show_home_link == 1 || ( $parent_id_2 != 0 && $parent_id_2 != $frontpage_id ) ) {
							$str .= $delimiter;
						}
						$str .= $before . get_the_title() . $after;
					}

				} elseif ( is_tag() ) {
					$str .= $before . esc_html__( 'Tags', 'newsmax' ) . $delimiter . single_tag_title( '', false ) . $after;

				} elseif ( is_author() ) {
					global $author;
					$user_data = get_userdata( $author );
					$str .= $before . esc_html__( 'Author', 'newsmax' ) . $delimiter . sprintf( $text['author'], esc_attr( $user_data->display_name ) ) . $after;

				} elseif ( is_404() ) {
					$str .= $before . $text['404'] . $after;

				} elseif ( has_post_format() && ! is_singular() ) {
					$str .= get_post_format_string( get_post_format() );
				}

				if ( get_query_var( 'paged' ) ) {
					if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
						$str .= ' (';
					}
					$str .= esc_html__( 'Page', 'newsmax' ) . ' ' . get_query_var( 'paged' );
					if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
						$str .= ')';
					}
				}

				$str .= '</div>';
				$str .= '</div>';
			}
		}

		$str .= '</div>';

		return $str;
	}
}