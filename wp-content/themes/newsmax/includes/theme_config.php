<?php
/**
 * theme configs
 */
if ( ! class_exists( 'newsmax_ruby_theme_config' ) ) {
	class newsmax_ruby_theme_config {


		##################################################
		###                                            ###
		###              COMPOSER CONFIG               ###
		###                                            ###
		##################################################

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return mixed
		 * get all sidebar after load
		 */
		static function get_all_sidebar() {

			if ( ! is_admin() ) {
				return false;
			}

			return $GLOBALS['wp_registered_sidebars'];
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array|bool
		 * header style config
		 */
		static function header_style() {

			if ( ! is_admin() ) {
				return false;
			}

			return array(
				'1' => esc_html__( 'Style 1 (Default)', 'newsmax' ),
				'2' => esc_html__( 'Style 2 (Navigation with Logo)', 'newsmax' ),
				'3' => esc_html__( 'Style 3 (Navigation with Logo)', 'newsmax' ),
				'4' => esc_html__( 'Style 4 (Full-width Navigation)', 'newsmax' ),
				'5' => esc_html__( 'Style 5 (Dark Navigation)', 'newsmax' ),
				'6' => esc_html__( 'Style 6 (Center Logo + Navigation)', 'newsmax' ),
				'7' => esc_html__( 'Style 7 (Center Logo)', 'newsmax' )
			);
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array|bool
		 * header style config
		 */
		static function footer_style() {

			if ( ! is_admin() ) {
				return false;
			}

			return array(
				'1' => esc_html__( 'Style 1 (3 columns)', 'newsmax' ),
				'2' => esc_html__( 'Style 2 (4 columns)', 'newsmax' ),
				'3' => esc_html__( 'Style 3 (None column & center logo)', 'newsmax' ),
			);
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * select category
		 */
		static function category_dropdown_select() {

			if ( ! is_admin() ) {
				return false;
			}

			$ruby_categories = get_categories( array(
				'hide_empty' => 0,
			) );

			$ruby_category_array_walker = new newsmax_ruby_category_array_walker;
			$ruby_category_array_walker->walk( $ruby_categories, 4 );
			$ruby_categories_buffer = $ruby_category_array_walker->cat_array;

			//render
			$str = '';
			$str .= '<select class="ruby-field ruby-field-select">';
			$str .= '<option value="0" selected="selected">' . esc_html__( '-- All categories --', 'newsmax' ) . '</option>';
			foreach ( $ruby_categories_buffer as $ruby_category_name => $category_id ) {
				$str .= '<option value="' . esc_attr( $category_id ) . '">';
				$str .= esc_html( $ruby_category_name );
				$str .= '</option>';
			}

			$str .= '</select><!--#category select-->';

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * select category
		 */
		static function categories_dropdown_select() {

			if ( ! is_admin() ) {
				return false;
			}

			if ( ! is_admin() ) {
				return false;
			}

			$ruby_categories = get_categories( array(
				'hide_empty' => 0,
			) );

			$ruby_category_array_walker = new newsmax_ruby_category_array_walker;
			$ruby_category_array_walker->walk( $ruby_categories, 4 );
			$ruby_categories_buffer = $ruby_category_array_walker->cat_array;

			//render
			$str = '';
			$str .= '<select class="ruby-field ruby-field-select" multiple="multiple">';
			$str .= '<option value="0" selected="selected">' . esc_html__( '-- Disable --', 'newsmax' ) . '</option>';
			foreach ( $ruby_categories_buffer as $ruby_category_name => $category_id ) {
				$str .= '<option value="' . esc_attr( $category_id ) . '">';
				$str .= esc_html( $ruby_category_name );
				$str .= '</option>';
			}

			$str .= '</select><!--#categories select-->';

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * format dropdown select
		 */
		static function post_format_dropdown_select() {

			if ( ! is_admin() ) {
				return false;
			}

			//render
			$str = '';
			$str .= '<select class="ruby-field ruby-field-select">';
			$str .= '<option value="0" selected="selected">' . esc_html__( '-- All --', 'newsmax' ) . '</option>';
			$str .= '<option value="default">' . esc_html__( 'Default', 'newsmax' ) . '</option>';
			$str .= '<option value="gallery">' . esc_html__( 'Gallery', 'newsmax' ) . '</option>';
			$str .= '<option value="video">' . esc_html__( 'Video', 'newsmax' ) . '</option>';
			$str .= '<option value="audio">' . esc_html__( 'Audio', 'newsmax' ) . '</option>';
			$str .= '</select>';

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * Order config
		 */
		static function orderby_dropdown_select() {

			if ( ! is_admin() ) {
				return false;
			}

			$orderby_data = array(
				'date_post'               => esc_html__( 'Latest Post', 'newsmax' ),
				'comment_count'           => esc_html__( 'Popular Comment', 'newsmax' ),
				'popular'                 => esc_html__( 'Popular View', 'newsmax' ),
				'popular_week'            => esc_html__( 'Popular Week View', 'newsmax' ),
				'top_review'              => esc_html__( 'Top Review', 'newsmax' ),
				'last_review'             => esc_html__( 'Latest Review', 'newsmax' ),
				'post_type'               => esc_html__( 'Post Type', 'newsmax' ),
				'rand'                    => esc_html__( 'Random', 'newsmax' ),
				'author'                  => esc_html__( 'Author', 'newsmax' ),
				'alphabetical_order_decs' => esc_html__( 'Title DECS', 'newsmax' ),
				'alphabetical_order_asc'  => esc_html__( 'Title ACS', 'newsmax' )
			);

			$str = '';
			$str .= '<select class="ruby-field ruby-field-select">';
			foreach ( $orderby_data as $val => $title ) {
				$str .= '<option value="' . esc_attr( $val ) . '">' . esc_html( $title ) . '</option>';
			}
			$str .= '</select>';

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * select author
		 */
		static function author_dropdown_select() {

			if ( ! is_admin() ) {
				return false;
			}

			return wp_dropdown_users(
				array(
					'show_option_all' => esc_html__( 'All Authors', 'newsmax' ),
					'orderby'         => 'ID',
					'class'           => 'ruby-field',
					'echo'            => 0,
					'hierarchical'    => true
				)
			);
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param bool $display_default
		 *
		 * @return array
		 * sidebar name options config
		 */
		static function sidebar_name( $display_default = false ) {

			$sidebar_options = array();
			$custom_sidebars = get_option( 'newsmax_ruby_custom_multi_sidebars', '' );

			//add default sidebar
			if ( true === $display_default ) {
				$sidebar_options['newsmax_ruby_default_from_theme_options'] = esc_html__( 'Default From Theme Options', 'newsmax' );
			};

			$sidebar_options['newsmax_ruby_sidebar_default'] = esc_html__( 'Default Sidebar', 'newsmax' );
			if ( ! empty( $custom_sidebars ) && is_array( $custom_sidebars ) ) {
				foreach ( $custom_sidebars as $sidebar ) {
					$sidebar_options[ $sidebar['id'] ] = $sidebar['name'];
				};
			};

			return $sidebar_options;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param bool $default
		 *
		 * @return array
		 * sidebar position config
		 */
		static function sidebar_position( $default = true ) {

			if ( ! is_admin() ) {
				return false;
			}

			$template_directory_uri = get_template_directory_uri();

			$sidebar = array(
				'none'  => array(
					'alt'   => 'none sidebar',
					'img'   => $template_directory_uri . '/theme_options/assets/sidebar-none.png',
					'title' => esc_html__( 'None', 'newsmax' )
				),
				'left'  => array(
					'alt'   => 'left sidebar',
					'img'   => $template_directory_uri . '/theme_options/assets/sidebar-left.png',
					'title' => esc_html__( 'Left', 'newsmax' )
				),
				'right' => array(
					'alt'   => 'right sidebar',
					'img'   => $template_directory_uri . '/theme_options/assets/sidebar-right.png',
					'title' => esc_html__( 'Right', 'newsmax' )
				)
			);

			//load default setting
			if ( true === $default ) {
				$sidebar['default'] = array(
					'alt'   => 'Default',
					'img'   => $template_directory_uri . '/theme_options/assets/sidebar-default.png',
					'title' => esc_html__( 'Default', 'newsmax' )
				);
			};

			return $sidebar;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param bool $enable
		 *
		 * @return string
		 * enable or disable dropdown select
		 */
		static function enable_dropdown_select( $disable = false ) {

			if ( ! is_admin() ) {
				return false;
			}

			//render
			$str = '';
			$str .= '<select class="ruby-field ruby-field-select">';
			if ( true == $disable ) {
				$str .= '<option value="0">' . esc_html__( '-- Disable --', 'newsmax' ) . '</option>';
				$str .= '<option value="1"  selected="selected">' . esc_html__( 'Enable', 'newsmax' ) . '</option>';
			} else {
				$str .= '<option value="0" selected="selected">' . esc_html__( '-- Disable --', 'newsmax' ) . '</option>';
				$str .= '<option value="1">' . esc_html__( 'Enable', 'newsmax' ) . '</option>';
			}

			$str .= '</select>';

			return $str;
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * summary select config
		 */
		static function summary_dropdown_select() {

			$str = '';
			$str .= '<select class="ruby-field ruby-field-select">';
			$str .= '<option value="excerpt">' . esc_html__( 'Use Post Excerpt', 'newsmax' ) . '</option>';
			$str .= '<option value="moretag">' . esc_html__( 'Use More Tag', 'newsmax' ) . '</option>';
			$str .= '</select>';

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * position dropdown select
		 */
		static function position_dropdown_select() {
			$str = '';
			$str .= '<select class="ruby-field ruby-field-select">';
			$str .= '<option value="0">' . esc_html__( '-- Float Left --', 'newsmax' ) . '</option>';
			$str .= '<option value="1">' . esc_html__( 'Float Right', 'newsmax' ) . '</option>';
			$str .= '</select>';

			return $str;
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * viewmore dropdown select
		 */
		static function viewmore_dropdown_select() {

			if ( ! is_admin() ) {
				return false;
			}

			//render
			$str = '';
			$str .= '<select class="ruby-field ruby-field-select">';
			$str .= '<option value="0"  selected="selected">' . esc_html__( '-- Disable --', 'newsmax' ) . '</option>';
			$str .= '<option value="1">' . esc_html__( 'Enable', 'newsmax' ) . '</option>';
			$str .= '</select>';

			return $str;
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * wrapper mode config
		 */
		static function wrapmode_dropdown_select() {

			if ( ! is_admin() ) {
				return false;
			}

			//render
			$str = '';
			$str .= '<select class="ruby-field ruby-field-select">';
			$str .= '<option value="1" selected="selected">' . esc_html__( '-- Has Wrapper --', 'newsmax' ) . '</option>';
			$str .= '<option value="0">' . esc_html__( 'Full Width', 'newsmax' ) . '</option>';
			$str .= '</select>';

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * ajax filter type
		 */
		static function ajax_filter_dropdown_select() {

			if ( ! is_admin() ) {
				return false;
			}

			$ajax_filter_dropdown_select_data = array(
				'0'        => esc_html__( '-- Disable --', 'newsmax' ),
				'category' => esc_html__( 'by Categories', 'newsmax' ),
				'tag'      => esc_html__( 'by Tags Names', 'newsmax' ),
				'author'   => esc_html__( 'by Authors', 'newsmax' ),
				'popular'  => esc_html__( 'by Popular', 'newsmax' ),

			);

			$str = '';
			$str .= '<select class="ruby-field ruby-field-select">';
			foreach ( $ajax_filter_dropdown_select_data as $val => $title ) {
				$str .= '<option value="' . esc_attr( $val ) . '">' . esc_html( $title ) . '</option>';
			}
			$str .= '</select>';

			return $str;
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * pagination select config
		 */
		static function pagination_dropdown_select() {

			if ( ! is_admin() ) {
				return false;
			}

			//render
			$str = '';
			$str .= '<select class="ruby-field ruby-field-select">';
			$str .= '<option value="0" selected="selected">' . esc_html__( ' -- Disable -- ', 'newsmax' ) . '</option>';
			$str .= '<option value="next_prev">' . esc_html__( 'Next Prev', 'newsmax' ) . '</option>';
			$str .= '<option value="loadmore">' . esc_html__( 'Load More', 'newsmax' ) . '</option>';
			$str .= '<option value="infinite_scroll">' . esc_html__( 'infinite Scroll', 'newsmax' ) . '</option>';
			$str .= '</select>';

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * block style select
		 */
		static function block_style_dropdown_select() {
			if ( ! is_admin() ) {
				return false;
			}

			$str = '';
			$str .= '<select class="ruby-field ruby-field-select">';
			$str .= '<option value="light" selected="selected">' . esc_html__( '-- Light --', 'newsmax' ) . '</option>';
			$str .= '<option value="dark">' . esc_html__( 'Dark', 'newsmax' ) . '</option>';
			$str .= '</select>';

			return $str;
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array
		 * post order config
		 */
		static function post_orders() {

			if ( ! is_admin() ) {
				return false;
			}

			return array(
				'date_post'               => esc_html__( 'Latest Post', 'newsmax' ),
				'comment_count'           => esc_html__( 'Popular Comment', 'newsmax' ),
				'popular'                 => esc_html__( 'Popular View', 'newsmax' ),
				'popular_week'            => esc_html__( 'Popular Week View', 'newsmax' ),
				'top_review'              => esc_html__( 'Top Review', 'newsmax' ),
				'last_review'             => esc_html__( 'Latest Review', 'newsmax' ),
				'post_type'               => esc_html__( 'Post Type', 'newsmax' ),
				'rand'                    => esc_html__( 'Random', 'newsmax' ),
				'author'                  => esc_html__( 'Author', 'newsmax' ),
				'alphabetical_order_decs' => esc_html__( 'Title DECS', 'newsmax' ),
				'alphabetical_order_asc'  => esc_html__( 'Title ACS', 'newsmax' )
			);
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * grid style select
		 */
		static function grid_style_dropdown_select() {

			if ( ! is_admin() ) {
				return false;
			}

			//render
			$str = '';
			$str .= '<select class="ruby-field ruby-field-select">';
			$str .= '<option value="1" selected="selected">' . esc_html__( ' -- Style 1 -- ', 'newsmax' ) . '</option>';
			$str .= '<option value="2">' . esc_html__( 'Style 2 (Top Title)', 'newsmax' ) . '</option>';
			$str .= '<option value="3">' . esc_html__( 'Style 3 (Middle Title)', 'newsmax' ) . '</option>';
			$str .= '<option value="4">' . esc_html__( 'Style 4 (Rainbow)', 'newsmax' ) . '</option>';
			$str .= '<option value="5">' . esc_html__( 'Style 5 (Rainbow + Middle Title)', 'newsmax' ) . '</option>';
			$str .= '</select>';

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * text style select
		 */
		static function text_style_dropdown_select() {

			if ( ! is_admin() ) {
				return false;
			}

			//render
			$str = '';
			$str .= '<select class="ruby-field ruby-field-select">';
			$str .= '<option value="dark" selected="selected">' . esc_html__( ' -- Dark -- ', 'newsmax' ) . '</option>';
			$str .= '<option value="light">' . esc_html__( 'Light', 'newsmax' ) . '</option>';
			$str .= '</select>';

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * viewmore dropdown select
		 */
		static function textarea_custom_html( $data ) {

			//render
			$str = '';
			if ( ! function_exists( 'wp_editor' ) ) {
				$str .= '<textarea class="ruby-field" rows="9" name="' . $data['block_name'] . '">' . $data['block_content'] . '</textarea>'; //text area
			} else {
				ob_start();
				wp_editor( htmlspecialchars_decode( $data['block_content'] ), 'tinymce_' . $data['block_id'], array(
					'editor_class'  => 'ruby-textarea ruby-html ruby-tinymce',
					'textarea_name' => $data['block_name'],
					'media_buttons' => true,
					'wpautop'       => false
				) );
				$str .= ob_get_clean();
			}

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * number of columns
		 */
		static function number_of_columns_select() {

			if ( ! is_admin() ) {
				return false;
			}

			//render
			$str = '';
			$str .= '<select class="ruby-field ruby-field-select">';
			$str .= '<option value="1">' . esc_html__( '1 column', 'newsmax' ) . '</option>';
			$str .= '<option value="2">' . esc_html__( '2 columns', 'newsmax' ) . '</option>';
			$str .= '<option value="3" selected="selected">' . esc_html__( ' -- 3 columns -- ', 'newsmax' ) . '</option>';
			$str .= '<option value="4">' . esc_html__( '4 columns', 'newsmax' ) . '</option>';
			$str .= '</select>';

			return $str;
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * number of columns
		 */
		static function col_img_style_select() {

			if ( ! is_admin() ) {
				return false;
			}

			//render
			$str = '';
			$str .= '<select class="ruby-field ruby-field-select">';
			$str .= '<option value="1" selected="selected">' . esc_html__( '-- Style 1 ---', 'newsmax' ) . '</option>';
			$str .= '<option value="2">' . esc_html__( 'Style 2 (Overlay)', 'newsmax' ) . '</option>';
			$str .= '<option value="3">' . esc_html__( 'Style 3 (Overlay)', 'newsmax' ) . '</option>';
			$str .= '</select>';

			return $str;
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array
		 * metabox review position
		 */
		static function metabox_review_box_position() {

			if ( ! is_admin() ) {
				return false;
			}

			$template_directory_uri = get_template_directory_uri();

			return array(
				'default' => $template_directory_uri . '/theme_options/assets/default.png',
				'bottom'  => $template_directory_uri . '/theme_options/assets/review-bottom.png',
				'top'     => $template_directory_uri . '/theme_options/assets/review-top.png',
			);
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param bool $default
		 *
		 * @return array|bool
		 * metabox sidebar position config
		 */
		static function metabox_sidebar_position( $default = true ) {

			if ( ! is_admin() ) {
				return false;
			}

			//template URL
			$template_directory_uri = get_template_directory_uri();

			if ( true === $default ) {
				return array(
					'default' => $template_directory_uri . '/theme_options/assets/sidebar-default.png',
					'none'    => $template_directory_uri . '/theme_options/assets/sidebar-none.png',
					'left'    => $template_directory_uri . '/theme_options/assets/sidebar-left.png',
					'right'   => $template_directory_uri . '/theme_options/assets/sidebar-right.png',
				);
			} else {
				return array(
					'none'  => $template_directory_uri . '/theme_options/assets/sidebar-none.png',
					'left'  => $template_directory_uri . '/theme_options/assets/sidebar-left.png',
					'right' => $template_directory_uri . '/theme_options/assets/sidebar-right.png',
				);
			}
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array|bool
		 * metabox blog layout config
		 */
		static function metabox_blog_layout() {

			if ( ! is_admin() ) {
				return false;
			}

			//template URL
			$template_directory_uri = get_template_directory_uri();

			return array(
				'classic_1' => $template_directory_uri . '/theme_options/assets/blog-classic-1.png',
				'classic_2' => $template_directory_uri . '/theme_options/assets/blog-classic-2.png',
				'grid_1'    => $template_directory_uri . '/theme_options/assets/blog-grid-1.png',
				'grid_2'    => $template_directory_uri . '/theme_options/assets/blog-grid-2.png',
				'grid_3'    => $template_directory_uri . '/theme_options/assets/blog-grid-3.png',
				'grid_4'    => $template_directory_uri . '/theme_options/assets/blog-grid-4.png',
				'grid_5'    => $template_directory_uri . '/theme_options/assets/blog-grid-5.png',
				'list_1'    => $template_directory_uri . '/theme_options/assets/blog-list-1.png',
				'list_2'    => $template_directory_uri . '/theme_options/assets/blog-list-2.png',
				'list_3'    => $template_directory_uri . '/theme_options/assets/blog-list-3.png',
			);
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array|bool
		 * metabox single post featured layout config
		 */
		static function metabox_single_post_layout_featured() {

			if ( ! is_admin() ) {
				return false;
			}

			//template URL
			$template_directory_uri = get_template_directory_uri();

			return array(
				'default' => $template_directory_uri . '/theme_options/assets/default.png',
				'1'       => $template_directory_uri . '/theme_options/assets/single-featured-1.png',
				'2'       => $template_directory_uri . '/theme_options/assets/single-featured-2.png',
				'3'       => $template_directory_uri . '/theme_options/assets/single-featured-3.png',
				'4'       => $template_directory_uri . '/theme_options/assets/single-featured-4.png',
				'5'       => $template_directory_uri . '/theme_options/assets/single-featured-5.png',
				'6'       => $template_directory_uri . '/theme_options/assets/single-featured-6.png',
				'7'       => $template_directory_uri . '/theme_options/assets/single-featured-7.png',
				'8'       => $template_directory_uri . '/theme_options/assets/single-featured-8.png',
			);
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array|bool
		 * metabox single post video layout config
		 */
		static function metabox_single_post_layout_video() {

			if ( ! is_admin() ) {
				return false;
			}

			//template URL
			$template_directory_uri = get_template_directory_uri();

			return array(
				'default' => $template_directory_uri . '/theme_options/assets/default.png',
				'1'       => $template_directory_uri . '/theme_options/assets/single-video-1.png',
				'2'       => $template_directory_uri . '/theme_options/assets/single-video-2.png',
				'3'       => $template_directory_uri . '/theme_options/assets/single-video-3.png',
			);
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array|bool
		 * metabox single post video layout config
		 */
		static function metabox_single_post_layout_audio() {

			if ( ! is_admin() ) {
				return false;
			}

			//template URL
			$template_directory_uri = get_template_directory_uri();

			return array(
				'default' => $template_directory_uri . '/theme_options/assets/default.png',
				'1'       => $template_directory_uri . '/theme_options/assets/single-audio-1.png',
				'2'       => $template_directory_uri . '/theme_options/assets/single-audio-2.png',
			);
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array|bool
		 * single post galley slider layout config
		 */
		static function metabox_single_post_layout_gallery() {

			if ( ! is_admin() ) {
				return false;
			}

			//template URL
			$template_directory_uri = get_template_directory_uri();

			return array(
				'default' => $template_directory_uri . '/theme_options/assets/default.png',
				'1'       => $template_directory_uri . '/theme_options/assets/single-gallery-slider-1.png',
				'2'       => $template_directory_uri . '/theme_options/assets/single-gallery-slider-2.png',
				'3'       => $template_directory_uri . '/theme_options/assets/single-gallery-grid-1.png',
				'4'       => $template_directory_uri . '/theme_options/assets/single-gallery-grid-2.png',
			);
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array
		 * topbar style config values
		 */
		static function topbar_style() {

			if ( ! is_admin() ) {
				return false;
			}

			return array(
				'1' => esc_html__( 'Style 1 (Left Menu, Right social)', 'newsmax' ),
				'2' => esc_html__( 'Style 2 (Left Social, Right Menu)', 'newsmax' ),
				'3' => esc_html__( 'Style 3 (Left All)', 'newsmax' ),
			);
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array
		 * single featured layout theme options config
		 */
		static function single_post_layout_featured() {

			if ( ! is_admin() ) {
				return false;
			}

			return array(
				'1' => array(
					'alt'   => 'style 1',
					'img'   => get_template_directory_uri() . '/theme_options/assets/single-featured-1.png',
					'title' => esc_html__( 'Style 1', 'newsmax' )
				),
				'2' => array(
					'alt'   => 'style 1',
					'img'   => get_template_directory_uri() . '/theme_options/assets/single-featured-2.png',
					'title' => esc_html__( 'Style 2', 'newsmax' )
				),
				'3' => array(
					'alt'   => 'style 3',
					'img'   => get_template_directory_uri() . '/theme_options/assets/single-featured-3.png',
					'title' => esc_html__( 'Style 3', 'newsmax' )
				),
				'4' => array(
					'alt'   => 'style 4',
					'img'   => get_template_directory_uri() . '/theme_options/assets/single-featured-4.png',
					'title' => esc_html__( 'Style 4', 'newsmax' )
				),
				'5' => array(
					'alt'   => 'style 5',
					'img'   => get_template_directory_uri() . '/theme_options/assets/single-featured-5.png',
					'title' => esc_html__( 'Style 5', 'newsmax' )
				),
				'6' => array(
					'alt'   => 'style 6',
					'img'   => get_template_directory_uri() . '/theme_options/assets/single-featured-6.png',
					'title' => esc_html__( 'Style 6', 'newsmax' )
				),
				'7' => array(
					'alt'   => 'style 7',
					'img'   => get_template_directory_uri() . '/theme_options/assets/single-featured-7.png',
					'title' => esc_html__( 'Style 7', 'newsmax' )
				),
				'8' => array(
					'alt'   => 'style 8',
					'img'   => get_template_directory_uri() . '/theme_options/assets/single-featured-8.png',
					'title' => esc_html__( 'Style 8', 'newsmax' )
				)
			);
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array
		 * single post video/audio layout theme options config
		 */
		static function single_post_layout_video() {

			if ( ! is_admin() ) {
				return false;
			}

			return array(
				'1' => array(
					'alt'   => 'style 1',
					'img'   => get_template_directory_uri() . '/theme_options/assets/single-video-1.png',
					'title' => esc_attr__( 'Style 1', 'newsmax' )
				),
				'2' => array(
					'alt'   => 'style 1',
					'img'   => get_template_directory_uri() . '/theme_options/assets/single-video-2.png',
					'title' => esc_attr__( 'Style 2', 'newsmax' )
				),
				'3' => array(
					'alt'   => 'style 3',
					'img'   => get_template_directory_uri() . '/theme_options/assets/single-video-3.png',
					'title' => esc_attr__( 'Style 3', 'newsmax' )
				)
			);
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array
		 * single post video/audio layout theme options config
		 */
		static function single_post_layout_audio() {

			if ( ! is_admin() ) {
				return false;
			}

			return array(
				'1' => array(
					'alt'   => 'style 1',
					'img'   => get_template_directory_uri() . '/theme_options/assets/single-audio-1.png',
					'title' => esc_attr__( 'Style 1', 'newsmax' )
				),
				'2' => array(
					'alt'   => 'style 1',
					'img'   => get_template_directory_uri() . '/theme_options/assets/single-audio-2.png',
					'title' => esc_attr__( 'Style 2', 'newsmax' )
				)
			);
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array
		 * single post gallery slider layout theme options config
		 */
		static function single_post_layout_gallery() {

			if ( ! is_admin() ) {
				return false;
			}

			return array(
				'1' => array(
					'alt'   => 'style 1',
					'img'   => get_template_directory_uri() . '/theme_options/assets/single-gallery-slider-1.png',
					'title' => esc_attr__( 'Style Slider 1', 'newsmax' )
				),
				'2' => array(
					'alt'   => 'style 1',
					'img'   => get_template_directory_uri() . '/theme_options/assets/single-gallery-slider-2.png',
					'title' => esc_attr__( 'Style Slider 2', 'newsmax' )
				),
				'3' => array(
					'alt'   => 'style 3',
					'img'   => get_template_directory_uri() . '/theme_options/assets/single-gallery-grid-1.png',
					'title' => esc_attr__( 'Style Grid 1', 'newsmax' )
				),
				'4' => array(
					'alt'   => 'style 4',
					'img'   => get_template_directory_uri() . '/theme_options/assets/single-gallery-grid-2.png',
					'title' => esc_attr__( 'Style Grid 2', 'newsmax' )
				)
			);
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array
		 * single post gallery slider layout theme options config
		 */
		static function single_post_layout_gallery_grid() {

			if ( ! is_admin() ) {
				return false;
			}

			return array();
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array|bool
		 * box position theme options config
		 */
		static function review_box_position() {

			if ( ! is_admin() ) {
				return false;
			}

			return array(
				'bottom' => array(
					'alt'   => 'bottom position',
					'img'   => get_template_directory_uri() . '/theme_options/assets/review-bottom.png',
					'title' => esc_attr__( 'At The Bottom', 'newsmax' )
				),
				'top'    => array(
					'alt'   => 'top position',
					'img'   => get_template_directory_uri() . '/theme_options/assets/review-top.png',
					'title' => esc_attr__( 'At The Top', 'newsmax' )
				)
			);
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array|bool
		 * related layout theme options config
		 */
		static function related_layout() {

			if ( ! is_admin() ) {
				return false;
			}

			return array(
				'2' => array(
					'alt'   => 'small grid layout',
					'img'   => get_template_directory_uri() . '/theme_options/assets/blog-grid-2.png',
					'title' => esc_attr__( 'Grid (3 Columns)', 'newsmax' )
				),
				'1' => array(
					'alt'   => 'grid layout',
					'img'   => get_template_directory_uri() . '/theme_options/assets/blog-grid-1.png',
					'title' => esc_attr__( 'Grid (2 columns)', 'newsmax' )
				),
				'3' => array(
					'alt'   => 'list layout',
					'img'   => get_template_directory_uri() . '/theme_options/assets/blog-list-1.png',
					'title' => esc_attr__( 'List', 'newsmax' )
				)
			);
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array|bool
		 * related layout theme options config
		 */
		static function recommended_layout() {

			if ( ! is_admin() ) {
				return false;
			}

			return array(
				'1' => array(
					'alt'   => 'grid layout',
					'img'   => get_template_directory_uri() . '/composer/images/fw-block-grid-1.png',
					'title' => esc_attr__( 'Grid 1', 'newsmax' )
				),
				'2' => array(
					'alt'   => 'small grid layout',
					'img'   => get_template_directory_uri() . '/composer/images/fw-block-grid-3.png',
					'title' => esc_attr__( 'Grid 2', 'newsmax' )
				)
			);
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array|bool
		 * text style config
		 */
		static function text_style() {

			if ( ! is_admin() ) {
				return false;
			}

			return array(
				'is-dark-text'  => array(
					'alt'   => 'text dark',
					'img'   => get_template_directory_uri() . '/theme_options/assets/text-dark.png',
					'title' => esc_attr__( 'Dark', 'newsmax' )
				),
				'is-light-text' => array(
					'alt'   => 'text light',
					'img'   => get_template_directory_uri() . '/theme_options/assets/text-light.png',
					'title' => esc_attr__( 'Light', 'newsmax' )
				),
			);
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array|bool
		 * text style config
		 */
		static function blog_layout() {

			if ( ! is_admin() ) {
				return false;
			}

			return array(
				'classic_1' => array(
					'alt'   => 'layout classic',
					'img'   => get_template_directory_uri() . '/theme_options/assets/blog-classic-1.png',
					'title' => esc_attr__( 'Classic 1', 'newsmax' )
				),
				'classic_2' => array(
					'alt'   => 'layout classic',
					'img'   => get_template_directory_uri() . '/theme_options/assets/blog-classic-2.png',
					'title' => esc_attr__( 'Classic 2', 'newsmax' )
				),
				'grid_1'    => array(
					'alt'   => 'layout grid',
					'img'   => get_template_directory_uri() . '/theme_options/assets/blog-grid-1.png',
					'title' => esc_attr__( 'Grid 1', 'newsmax' )
				),
				'grid_2'    => array(
					'alt'   => 'layout grid',
					'img'   => get_template_directory_uri() . '/theme_options/assets/blog-grid-2.png',
					'title' => esc_attr__( 'Grid 2', 'newsmax' )
				),
				'grid_3'    => array(
					'alt'   => 'layout grid',
					'img'   => get_template_directory_uri() . '/theme_options/assets/blog-grid-3.png',
					'title' => esc_attr__( 'Grid 3', 'newsmax' )
				),
				'grid_4'    => array(
					'alt'   => 'layout grid',
					'img'   => get_template_directory_uri() . '/theme_options/assets/blog-grid-4.png',
					'title' => esc_attr__( 'Grid 4', 'newsmax' )
				),
				'grid_5'    => array(
					'alt'   => 'layout grid',
					'img'   => get_template_directory_uri() . '/theme_options/assets/blog-grid-5.png',
					'title' => esc_attr__( 'Grid 5', 'newsmax' )
				),
				'list_1'    => array(
					'alt'   => 'layout list',
					'img'   => get_template_directory_uri() . '/theme_options/assets/blog-list-1.png',
					'title' => esc_attr__( 'List 1', 'newsmax' )
				),
				'list_2'    => array(
					'alt'   => 'layout list',
					'img'   => get_template_directory_uri() . '/theme_options/assets/blog-list-2.png',
					'title' => esc_attr__( 'List 2', 'newsmax' )
				),
				'list_3'    => array(
					'alt'   => 'layout list',
					'img'   => get_template_directory_uri() . '/theme_options/assets/blog-list-3.png',
					'title' => esc_attr__( 'List 3', 'newsmax' )
				)
			);
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param bool $ajax
		 *
		 * @return array|bool
		 * blog ajax pagination
		 */
		static function blog_pagination( $ajax = true ) {

			if ( ! is_admin() ) {
				return false;
			}

			if ( true === $ajax ) {
				$option = array(
					'number'          => esc_html__( 'Numeric', 'newsmax' ),
					'next_prev'       => esc_html__( 'Next Prev', 'newsmax' ),
					'loadmore'        => esc_html__( 'Load More', 'newsmax' ),
					'infinite_scroll' => esc_html__( 'Infinite Scroll', 'newsmax' ),
				);
			} else {
				$option = array(
					'number'    => esc_html__( 'Numeric', 'newsmax' ),
					'next_prev' => esc_html__( 'Next Prev', 'newsmax' ),
				);
			}

			return $option;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array|bool
		 * text style config
		 */
		static function feat_style() {

			if ( ! is_admin() ) {
				return false;
			}

			return array(
				'1'    => array(
					'alt'   => 'feat 1',
					'img'   => get_template_directory_uri() . '/composer/images/fw-block-1.png',
					'title' => esc_attr__( 'Style 1', 'newsmax' )
				),
				'2'    => array(
					'alt'   => 'feat 2',
					'img'   => get_template_directory_uri() . '/composer/images/fw-block-2.png',
					'title' => esc_attr__( 'Style 2', 'newsmax' )
				),
				'3'    => array(
					'alt'   => 'feat 3',
					'img'   => get_template_directory_uri() . '/composer/images/fw-block-3.png',
					'title' => esc_attr__( 'Style 3', 'newsmax' )
				),
				'4'    => array(
					'alt'   => 'feat 4',
					'img'   => get_template_directory_uri() . '/composer/images/fw-block-4.png',
					'title' => esc_attr__( 'Style 4', 'newsmax' )
				),
				'5'    => array(
					'alt'   => 'feat 5',
					'img'   => get_template_directory_uri() . '/composer/images/fw-block-5.png',
					'title' => esc_attr__( 'Style 5', 'newsmax' )
				),
				'6'    => array(
					'alt'   => 'feat 6',
					'img'   => get_template_directory_uri() . '/composer/images/fw-block-6.png',
					'title' => esc_attr__( 'Style 6', 'newsmax' )
				),
				'7'    => array(
					'alt'   => 'feat 7',
					'img'   => get_template_directory_uri() . '/composer/images/fw-block-7.png',
					'title' => esc_attr__( 'Style 7', 'newsmax' )
				),
				'8'    => array(
					'alt'   => 'feat 8',
					'img'   => get_template_directory_uri() . '/composer/images/fw-block-8.png',
					'title' => esc_attr__( 'Style 8', 'newsmax' )
				),
				'9'    => array(
					'alt'   => 'feat 9',
					'img'   => get_template_directory_uri() . '/composer/images/fw-block-9.png',
					'title' => esc_attr__( 'Style 9', 'newsmax' )
				),
				'10'   => array(
					'alt'   => 'feat 10',
					'img'   => get_template_directory_uri() . '/composer/images/fw-block-10.png',
					'title' => esc_attr__( 'Style 10', 'newsmax' )
				),
				'11'   => array(
					'alt'   => 'feat 11',
					'img'   => get_template_directory_uri() . '/composer/images/fw-block-11.png',
					'title' => esc_attr__( 'Style 11', 'newsmax' )
				),
				'12'   => array(
					'alt'   => 'feat 12',
					'img'   => get_template_directory_uri() . '/composer/images/fw-block-12.png',
					'title' => esc_attr__( 'Style 12', 'newsmax' )
				),
				'none' => array(
					'alt'   => 'None',
					'img'   => get_template_directory_uri() . '/theme_options/assets/none.png',
					'title' => esc_attr__( 'None', 'newsmax' )
				),
			);
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array|bool
		 * feat grid style
		 */
		static function feat_grid_style() {

			if ( ! is_admin() ) {
				return false;
			}

			return array(
				'1' => esc_html__( '-- Style 1 --', 'newsmax' ),
				'2' => esc_html__( 'Style 2 (Top Title)', 'newsmax' ),
				'3' => esc_html__( 'Style 3 (Middle Title)', 'newsmax' ),
				'4' => esc_html__( 'Style 4 (Rainbow)', 'newsmax' ),
				'5' => esc_html__( 'Style 5 (Rainbow + Middle Title)', 'newsmax' ),
			);
		}

	}
}


if ( ! class_exists( 'newsmax_ruby_category_array_walker' ) ) {
	class newsmax_ruby_category_array_walker extends Walker {

		var $tree_type = 'category';
		var $cat_array = array();
		var $db_fields = array(
			'id'     => 'term_id',
			'parent' => 'parent'
		);

		public function start_lvl( &$output, $depth = 0, $args = array() ) {
		}

		public function end_lvl( &$output, $depth = 0, $args = array() ) {
		}

		public function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {
			$this->cat_array[ str_repeat( ' - ', $depth ) . $object->name . ' - [ ID: ' . $object->term_id . ' / Posts: ' . $object->category_count . ' ]' ] = $object->term_id;
		}

		public function end_el( &$output, $object, $depth = 0, $args = array() ) {
		}

	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * ajax custom html (WYSWYG)
 */
if ( ! function_exists( 'newsmax_ruby_ajax_composer_html' ) ) {
	add_action( 'wp_ajax_newsmax_ruby_ajax_composer_html', 'newsmax_ruby_ajax_composer_html' );

	function newsmax_ruby_ajax_composer_html() {

		$data                  = array();
		$data['block_id']      = '';
		$data['block_name']    = '';
		$data['block_content'] = '';

		//get and validate request data
		if ( ! empty( $_POST['data']['block_id'] ) ) {
			$data['block_id'] = esc_attr( $_POST['data']['block_id'] );
		}

		if ( ! empty( $_POST['data']['block_name'] ) ) {
			$data['block_name'] = esc_attr( $_POST['data']['block_name'] );
		}

		if ( ! empty( $_POST['data']['block_content'] ) ) {
			$data['block_content'] = stripcslashes( $_POST['data']['block_content'] );
		}

		$data_response = newsmax_ruby_theme_config::textarea_custom_html( $data );
		die( json_encode( $data_response ) );
	}
}