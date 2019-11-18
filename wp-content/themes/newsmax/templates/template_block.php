<?php
/**
 * Class newsmax_ruby_block
 * ruby composer blocks
 */
if ( ! class_exists( 'newsmax_ruby_block' ) ) {
	class newsmax_ruby_block {

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $block
		 *
		 * @return bool|string|WP_Query
		 * query block data
		 */
		static function get_data( $block ) {

			//check and return
			if ( empty( $block['block_options'] ) ) {
				return false;
			}

			//set no found rows
			if ( ! isset( $block['block_options']['no_found_rows'] ) && empty( $block['block_options']['pagination'] ) ) {
				$block['block_options']['no_found_rows'] = true;
			} else {
				$block['block_options']['no_found_rows'] = false;
			}

			//query
			return newsmax_ruby_query::get_data( $block['block_options'] );
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $block
		 * @param $data_query
		 *
		 * @return string
		 * render open block
		 */
		static function block_open( $block, $data_query = null ) {

			//check ID
			if ( empty( $block['block_id'] ) ) {
				return false;
			}

			//create class
			$main_classes    = array();
			$inner_classes   = array();
			$main_classes[]  = 'ruby-block-wrap';
			$inner_classes[] = 'ruby-block-inner';
			$ajax_param      = '';

			//create wrapper classes
			if ( ! empty( $block['block_classes'] ) ) {
				$main_classes[] = $block['block_classes'];
			}

			if ( ! empty( $block['block_options']['pagination'] ) ) {
				$main_classes[] = 'is-ajax-pagination';
			}

			if ( ! empty( $block['block_options']['block_style'] ) ) {
				$main_classes[] = 'is-dark-block';
			}

			if ( ! empty( $block['block_options']['position'] ) ) {
				$main_classes[] = 'big-col-right';
			}

			if ( ! empty( $block['block_options']['text_style'] ) && 'light' == $block['block_options']['text_style'] ) {
				$main_classes[] = 'is-light-text';
			}

			if ( ! empty( $block['block_options']['background'] ) && '#ffffff' != strtolower( esc_attr( $block['block_options']['background'] ) ) ) {
				$main_classes[] = 'is-background';
			}

			if ( ! empty( $block['block_options']['background_image'] ) ) {
				$main_classes[] = 'is-background is-background-image';
			}

			if ( 'full_width' == $block['block_type'] ) {
				if ( isset( $block['block_options']['wrap_mode'] ) && empty( $block['block_options']['wrap_mode'] ) ) {
					$main_classes[] = 'is-fullwidth';
				} else {
					$main_classes[]  = 'is-wrapper';
					$inner_classes[] = 'ruby-container';
				}
			}

			$main_classes  = implode( ' ', $main_classes );
			$inner_classes = implode( ' ', $inner_classes );

			if ( ! empty( $data_query ) && is_object( $data_query ) ) {
				$ajax_param = self::block_ajax_param( $block, $data_query );
			}


			$str = '';

			$str .= '<div id="' . esc_attr( $block['block_id'] ) . '" class="' . esc_attr( $main_classes ) . '" ' . esc_attr( $ajax_param ) . '>';
			$str .= '<div class="' . esc_attr( $inner_classes ) . '">';

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $block
		 *
		 * @return string
		 * render block header
		 */
		static function block_header( $block ) {

			//check title
			if ( empty( $block['block_options']['title'] ) ) {
				return false;
			}

			$str = '';
			$str .= '<div class="block-header-wrap">';
			$str .= '<div class="block-header-inner">';
			$str .= self::block_title( $block );
			$str .= self::block_ajax_filter( $block );
			$str .= '</div>';
			$str .= '</div><!--#block header-->';

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $block
		 *
		 * @return string
		 * render block footer
		 */
		static function block_footer( $block ) {

			//check and return
			if ( empty( $block['block_options']['pagination'] ) && empty( $block['block_options']['viewmore'] ) ) {
				return false;
			}

			$str = '';
			$str .= '<div class="block-footer clearfix">';

			//render ajax pagination
			if ( ! empty( $block['block_options']['pagination'] ) && 'next_prev' == $block['block_options']['pagination'] ) {
				$str .= self::block_ajax_next_prev();
			} elseif ( ! empty( $block['block_options']['pagination'] ) && 'loadmore' == $block['block_options']['pagination'] ) {
				$str .= self::block_ajax_loadmore();
			} elseif ( ! empty( $block['block_options']['pagination'] ) && 'infinite_scroll' == $block['block_options']['pagination'] ) {
				$str .= self::block_ajax_infinite_scroll();
			}

			$str .= '</div>';

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $block
		 *
		 * @return string
		 * render header block title
		 */
		static function block_title( $block ) {

			//check title
			if ( empty( $block['block_options']['title'] ) ) {
				return false;
			}

			$str = '';
			//block header title
			if ( empty( $block['block_options']['title_url'] ) ) {
				$str .= '<div class="block-title">';

				//render block title
				$str .= '<h3>' . esc_html( $block['block_options']['title'] ) . '</h3>';

				//render block sub title
				if ( ! empty( $block['block_options']['sub_title'] ) ) {
					$str .= '<span class="block-title-sub">' . esc_html( $block['block_options']['sub_title'] ) . '</span>';
				}

				$str .= '</div>';
			} else {
				$str .= '<div class="block-title">';

				//render block title
				$str .= '<h3><a href="' . esc_url( $block['block_options']['title_url'] ) . '" title="' . esc_attr( $block['block_options']['title'] ) . '">';
				$str .= esc_html( $block['block_options']['title'] );
				$str .= '</a></h3>';

				//render block sub title
				if ( ! empty( $block['block_options']['sub_title'] ) ) {
					$str .= '<span class="block-title-sub">' . esc_html( $block['block_options']['sub_title'] ) . '</span>';
				}

				$str .= '</div>';
			}

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $block
		 * @param $data_query
		 *
		 * @return string
		 * render block ajax param
		 */
		static function block_ajax_param( $block, $data_query ) {

			//check
			if ( empty( $block['block_options'] ) || empty( $block['block_name'] ) || empty( $block['block_id'] ) || ( empty( $block['block_options']['pagination'] ) && empty( $block['block_options']['ajax_dropdown'] ) ) ) {
				return false;
			}

			$str                      = '';
			$param                    = array();
			$block_options            = $block['block_options'];
			$param['data-block_id']   = $block['block_id'];
			$param['data-block_name'] = $block['block_name'];

			//post per page
			if ( ! empty( $block_options['posts_per_page'] ) ) {
				$param['data-posts_per_page'] = $block_options['posts_per_page'];
			}

			//ajax filter type
			if ( ! empty( $block_options['ajax_dropdown'] ) ) {
				$param['data-ajax_dropdown'] = $block_options['ajax_dropdown'];
			}

			//max page
			if ( ! empty( $data_query->max_num_pages ) ) {
				$param['data-block_page_max'] = $data_query->max_num_pages;
			} else {
				$param['data-block_page_max'] = 1;
			}

			//current page
			$param['data-block_page_current'] = 1;

			//excerpt
			if ( ! empty( $block_options['excerpt'] ) ) {
				$param['data-excerpt'] = $block_options['excerpt'];
			}

			//classic summary type
			if ( ! empty( $block_options['summary_type'] ) ) {
				$param['data-summary_type'] = $block_options['summary_type'];
			}

			//classic excerpt
			if ( ! empty( $block_options['excerpt_classic'] ) ) {
				$param['data-excerpt_classic'] = $block_options['excerpt_classic'];
			}

			//category
			if ( ! empty( $block_options['category_id'] ) ) {
				$param['data-category_id'] = $block_options['category_id'];
			}

			//categories
			if ( ! empty( $block_options['category_ids'] ) && is_array( $block_options['category_ids'] ) ) {
				$param['data-category_ids'] = implode( ',', $block_options['category_ids'] );
			}

			//orderby
			if ( ! empty( $block_options['orderby'] ) ) {
				$param['data-orderby'] = $block_options['orderby'];
			}

			//author
			if ( ! empty( $block_options['authors'] ) ) {
				$param['data-authors'] = $block_options['authors'];
			}

			if ( ! empty( $block_options['post_format'] ) ) {
				$param['data-post_format'] = $block_options['post_format'];
			}

			//tag
			if ( ! empty( $block_options['tags'] ) ) {
				$param['data-tags'] = $block_options['tags'];
			}

			if ( ! empty( $block_options['offset'] ) ) {
				$param['data-offset'] = $block_options['offset'];
			}

			if ( ! empty( $block_options['block_style'] ) ) {
				$param['data-block_style'] = $block_options['block_style'];
			}

			if ( ! empty( $block_options['thumb_position'] ) ) {
				$param['data-thumb_position'] = $block_options['thumb_position'];
			}

			if ( ! empty( $block_options['share'] ) ) {
				$param['data-share'] = $block_options['share'];
			}

			if ( ! empty( $block_options['cat_info'] ) ) {
				$param['data-cat_info'] = $block_options['cat_info'];
			}

			if ( ! empty( $block_options['meta_info'] ) ) {
				$param['data-meta_info'] = $block_options['meta_info'];
			}

			//foreach
			foreach ( $param as $k => $v ) {
				if ( ! empty( $k ) ) {
					$str .= esc_attr( $k ) . '= ' . esc_attr( $v ) . ' ';
				}
			}

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $block
		 *
		 * @return string
		 * render block ajax filter
		 */
		static function block_ajax_filter( $block ) {

			if ( empty( $block['block_options']['ajax_dropdown'] ) ) {
				return false;
			}

			if ( empty( $block['block_id'] ) ) {
				$block['block_id'] = '';
			}

			if ( ! isset( $block['block_options']['ajax_dropdown_id'] ) ) {
				$block['block_options']['ajax_dropdown_id'] = '';
			}

			if ( ! isset( $block['block_options']['ajax_dropdown_text'] ) ) {
				$block['block_options']['ajax_dropdown_text'] = '';
			};

			$filter_type = $block['block_options']['ajax_dropdown'];
			$filter_ids  = $block['block_options']['ajax_dropdown_id'];
			$filter_text = $block['block_options']['ajax_dropdown_text'];

			$ajax_filter_data    = newsmax_ruby_ajax_filter_dropdown_config( $filter_type, $filter_ids, $filter_text );
			$ajax_filter_id      = 'ajax_filter_' . $block['block_id'];
			$ajax_filter_id_list = 'ajax_filter_list_' . $block['block_id'];

			//render
			$str = '';
			$str .= '<div id="' . esc_attr( $ajax_filter_id ) . '" class="block-ajax-filter-wrap">';
			$str .= '<div class="block-ajax-filter-inner">';

			//ajax filter list
			$str .= '<ul id="' . esc_attr( $ajax_filter_id_list ) . '" class="ajax-filter-list">';
			foreach ( $ajax_filter_data as $item ) {
				$str .= '<li class="ajax-filter-el">';
				$str .= '<a href="#" class="ajax-link ajax-filter-link" data-ajax_filter_val="' . esc_attr( $item['id'] ) . '">';
				$str .= esc_html( $item['name'] );
				$str .= '</a>';
				$str .= '</li>';
			}
			$str .= '</ul>';
			$str .= '<div class="ajax-filter-dropdown">';

			//ajax filter more
			$str .= '<div class="ajax-filter-more" aria-haspopup="true">';
			$str .= '<span>' . newsmax_ruby_translate('more') . '</span>';
			$str .= '<i class="fa fa-angle-down"></i>';
			$str .= '</div>';

			//ajax filter dropdown
			$str .= '<ul class="ajax-filter-dropdown-list">';

			$str .= '</ul>';

			$str .= '</div>';

			$str .= '</div>';
			$str .= '</div>';

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * render ajax next prev pagination
		 */
		static function block_ajax_next_prev() {
			$str = '';
			$str .= '<div class="ajax-pagination ajax-nextprev clearfix">';
			$str .= '<a href="#" class="ajax-pagination-link ajax-link ajax-prev is-disable" data-ajax_pagination_link ="prev"><i class="icon-simple icon-arrow-left"></i></a>';
			$str .= '<a href="#" class="ajax-pagination-link ajax-link ajax-next" data-ajax_pagination_link ="next"><i class="icon-simple icon-arrow-right"></i></a>';
			$str .= '</div><!--next prev-->';

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * render ajax load more
		 */
		static function block_ajax_loadmore() {
			$str = '';
			$str .= '<div class="ajax-pagination ajax-loadmore clearfix">';
			$str .= '<a href="#" class="ajax-loadmore-link ajax-link"><span>' . newsmax_ruby_translate( 'loadmore' ) . '</span></a>';
			$str .= '<div class="ajax-animation"><span class="ajax-animation-icon"></span></div>';
			$str .= '</div>';

			return $str;
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * render ajax load more
		 */
		static function block_ajax_infinite_scroll() {
			$str = '';
			$str .= '<div class="ajax-pagination ajax-infinite-scroll clearfix">';
			$str .= '<div class="ajax-animation"><span class="ajax-animation-icon"></span></div>';
			$str .= '</div>';

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param string $classes
		 *
		 * @return string
		 * open block content wrap
		 */
		static function block_content_open( $classes = '' ) {

			$class_name   = array();
			$class_name[] = 'block-content-inner clearfix';
			if ( ! empty( $classes ) ) {
				$class_name[] = $classes;
			}

			$class_name = implode( ' ', $class_name );

			$str = '';
			$str .= '<div class="block-content-wrap">';
			$str .= '<div class="' . esc_attr( $class_name ) . '">';

			return $str;
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * close block content
		 */
		static function block_content_close() {
			return '</div></div><!-- #block content-->';
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * close block
		 */
		static function block_close() {
			return '</div></div><!-- #block wrap-->';
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * no content post found
		 */
		static function no_content() {
			return '<div class="ruby-error"><p>' . esc_html__( 'Sorry, Posts you requested could not be found...', 'newsmax' ) . '</p></div>';
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param int $count
		 *
		 * @return string
		 *  not enough post for block
		 */
		static function not_enough_post( $count = 6 ) {
			return '<div class="ruby-error"><p>' . sprintf( esc_html__( 'Sorry, This block requests minimum %s posts to display, Please try to select other queries or add more posts...', 'newsmax' ), $count ) . '</p></div>';
		}
	}
}