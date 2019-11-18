<?php
/**
 * Class newsmax_ruby_block_widget_post
 */
if ( ! class_exists( 'newsmax_ruby_block_widget_post' ) ) {
	class newsmax_ruby_block_widget_post extends newsmax_ruby_block {

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $block
		 *
		 * @return string
		 * render block layout
		 */
		static function render( $block ) {

			//add block data
			$block['block_type']                     = 'full_width';
			$block['block_options']['wrap_mode']     = 0;
			$block['block_classes']                  = 'block-widget-post';
			$block['block_options']['no_found_rows'] = true;

			//query data
			$data_query = parent::get_data( $block );

			//render
			$str = '';
			$str .= parent::block_open( $block, $data_query );
			$str .= self::content( $block, $data_query );
			$str .= parent::block_footer( $block );

			$str .= parent::block_close();

			return $str;
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $block
		 *
		 * @return string
		 * render block block content
		 */
		static function content( $block, $data_query ) {

			//check
			if ( empty( $block['block_options'] ) ) {
				return false;
			}

			//render
			$str = '';
			$str .= parent::block_content_open( 'row' );

			//check empty
			if ( $data_query->have_posts() ) {
				$str .= self::listing( $data_query, $block['block_options'] );
			} else {
				$str .= parent::no_content();
			}

			$str .= parent::block_content_close();

			//reset post data
			wp_reset_postdata();

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $data_query
		 * @param array $options
		 *
		 * @return string
		 * render listing
		 */
		static function listing( $data_query, $options = array() ) {

			//check block style
			if ( empty( $options['block_style'] ) ) {
				$options['block_style'] = 1;
			}

			//entry meta info
			$options['cat_info']  = newsmax_ruby_get_option( 'blog_cat_info' );
			$options['meta_info'] = newsmax_ruby_get_option( 'blog_meta_info' );
			$options['share']     = newsmax_ruby_get_option( 'blog_share' );


			//render
			$str = '';

			switch ( $options['block_style'] ) {
				case 1 :
					while ( $data_query->have_posts() ) {

						$data_query->the_post();

						$str .= '<div class="post-outer">';
						$str .= newsmax_ruby_post_list_4( $options );
						$str .= '</div><!--#post outer-->';
					}
					break;
				case 2 :
					while ( $data_query->have_posts() ) {

						$data_query->the_post();

						$str .= '<div class="post-outer">';
						$str .= newsmax_ruby_post_list_5( $options );
						$str .= '</div><!--#post outer-->';
					}
					break;
				case 3 :
					while ( $data_query->have_posts() ) {

						$data_query->the_post();

						$str .= '<div class="post-outer">';
						$str .= newsmax_ruby_post_list_6( $options );
						$str .= '</div><!--#post outer-->';
					}
					break;
				case 4 :
					while ( $data_query->have_posts() ) {

						$data_query->the_post();

						$str .= '<div class="post-outer col-xs-6">';
						$str .= newsmax_ruby_post_grid_5( $options );
						$str .= '</div><!--#post outer-->';
					}
					break;
				case 5 :
					while ( $data_query->have_posts() ) {

						$data_query->the_post();

						$str .= '<div class="post-outer">';
						$str .= newsmax_ruby_post_overlay_6( $options );
						$str .= '</div><!--#post outer-->';
					}
					break;
				case 6 :
					while ( $data_query->have_posts() ) {

						$data_query->the_post();

						$str .= '<div class="post-outer">';
						$str .= newsmax_ruby_post_grid_2( $options );
						$str .= '</div><!--#post outer-->';
					}
					break;
				case 7 :
					while ( $data_query->have_posts() ) {

						$data_query->the_post();

						$str .= '<div class="post-outer">';
						$str .= newsmax_ruby_post_overlay_1( $options );
						$str .= '</div><!--#post outer-->';
					}
					break;
				case 8 :

					$flag = true;
					while ( $data_query->have_posts() ) {

						$data_query->the_post();

						if ( true === $flag ) {
							$str .= '<div class="post-outer">';
							$str .= newsmax_ruby_post_list_4( $options );
							$str .= '</div><!--#post outer-->';
							$flag = false;
						} else {
							$str .= '<div class="post-outer">';
							$str .= newsmax_ruby_post_list_6( $options );
							$str .= '</div><!--#post outer-->';
						}

					}
					break;
				case 9 :

					$flag = true;
					while ( $data_query->have_posts() ) {

						$data_query->the_post();

						if ( true === $flag ) {
							$str .= '<div class="post-outer">';
							$str .= newsmax_ruby_post_overlay_6( $options );
							$str .= '</div><!--#post outer-->';
							$flag = false;
						} else {
							$str .= '<div class="post-outer">';
							$str .= newsmax_ruby_post_list_4( $options );
							$str .= '</div><!--#post outer-->';
						}

					}
					break;
				case 10 :

					$flag = true;
					while ( $data_query->have_posts() ) {

						$data_query->the_post();

						if ( true === $flag ) {
							$str .= '<div class="post-outer">';
							$str .= newsmax_ruby_post_overlay_6( $options );
							$str .= '</div><!--#post outer-->';
							$flag = false;
						} else {
							$str .= '<div class="post-outer">';
							$str .= newsmax_ruby_post_list_5( $options );
							$str .= '</div><!--#post outer-->';
						}
					}
					break;

				case 11 :

					$flag = true;
					while ( $data_query->have_posts() ) {

						$data_query->the_post();

						if ( true === $flag ) {
							$str .= '<div class="post-outer">';
							$str .= newsmax_ruby_post_overlay_6( $options );
							$str .= '</div><!--#post outer-->';
							$flag = false;
						} else {
							$str .= '<div class="post-outer">';
							$str .= newsmax_ruby_post_list_6( $options );
							$str .= '</div><!--#post outer-->';
						}
					}
					break;

				case 12 :

					$flag = true;
					while ( $data_query->have_posts() ) {

						$data_query->the_post();

						if ( true === $flag ) {
							$str .= '<div class="post-outer">';
							$str .= newsmax_ruby_post_grid_2( $options );
							$str .= '</div><!--#post outer-->';
							$flag = false;
						} else {
							$str .= '<div class="post-outer">';
							$str .= newsmax_ruby_post_list_4( $options );
							$str .= '</div><!--#post outer-->';
						}
					}
					break;

				case 13 :

					$flag = true;
					while ( $data_query->have_posts() ) {

						$data_query->the_post();

						if ( true === $flag ) {
							$str .= '<div class="post-outer">';
							$str .= newsmax_ruby_post_grid_2( $options );
							$str .= '</div><!--#post outer-->';
							$flag = false;
						} else {
							$str .= '<div class="post-outer">';
							$str .= newsmax_ruby_post_list_5( $options );
							$str .= '</div><!--#post outer-->';
						}
					}
					break;

				case 14 :

					$flag = true;
					while ( $data_query->have_posts() ) {

						$data_query->the_post();

						if ( true === $flag ) {
							$str .= '<div class="post-outer">';
							$str .= newsmax_ruby_post_grid_2( $options );
							$str .= '</div><!--#post outer-->';
							$flag = false;
						} else {
							$str .= '<div class="post-outer">';
							$str .= newsmax_ruby_post_list_6( $options );
							$str .= '</div><!--#post outer-->';
						}
					}
					break;

				case 15 :

					$flag = true;
					while ( $data_query->have_posts() ) {

						$data_query->the_post();

						if ( true === $flag ) {
							$str .= '<div class="post-outer">';
							$str .= newsmax_ruby_post_overlay_1( $options );
							$str .= '</div><!--#post outer-->';
							$flag = false;
						} else {
							$str .= '<div class="post-outer">';
							$str .= newsmax_ruby_post_overlay_6( $options );
							$str .= '</div><!--#post outer-->';
						}
					}
					break;

				case 16 :

					$flag = true;
					while ( $data_query->have_posts() ) {

						$data_query->the_post();

						if ( true === $flag ) {
							$str .= '<div class="post-outer">';
							$str .= newsmax_ruby_post_overlay_1( $options );
							$str .= '</div><!--#post outer-->';
							$flag = false;
						} else {
							$str .= '<div class="post-outer">';
							$str .= newsmax_ruby_post_list_4( $options );
							$str .= '</div><!--#post outer-->';
						}
					}
					break;

				case 17 :

					$flag = true;
					while ( $data_query->have_posts() ) {

						$data_query->the_post();

						if ( true === $flag ) {
							$str .= '<div class="post-outer">';
							$str .= newsmax_ruby_post_overlay_1( $options );
							$str .= '</div><!--#post outer-->';
							$flag = false;
						} else {
							$str .= '<div class="post-outer">';
							$str .= newsmax_ruby_post_list_5( $options );
							$str .= '</div><!--#post outer-->';
						}
					}
					break;

				case 18 :

					$flag = true;
					while ( $data_query->have_posts() ) {

						$data_query->the_post();

						if ( true === $flag ) {
							$str .= '<div class="post-outer">';
							$str .= newsmax_ruby_post_overlay_1( $options );
							$str .= '</div><!--#post outer-->';
							$flag = false;
						} else {
							$str .= '<div class="post-outer">';
							$str .= newsmax_ruby_post_list_6( $options );
							$str .= '</div><!--#post outer-->';
						}
					}
					break;
			}

			return $str;
		}

	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param array $param
 *
 * @return array
 * setup block data
 */
if ( ! function_exists( 'newsmax_ruby_block_widget_post_setup' ) ) {
	function newsmax_ruby_block_widget_post_setup( $param = array() ) {

		$block               = array();
		$block['block_id']   = '';
		$block['block_name'] = 'newsmax_ruby_block_widget_post';

		$block['block_options'] = array();

		if ( ! empty( $param['category_id'] ) ) {
			$block['block_options']['category_id'] = $param['category_id'];
		}

		if ( ! empty( $param['category_ids'] ) ) {
			$block['block_options']['category_ids'] = $param['category_ids'];
		}

		if ( ! empty( $param['posts_per_page'] ) ) {
			$block['block_options']['posts_per_page'] = $param['posts_per_page'];
		}

		if ( ! empty( $param['tags'] ) ) {
			$block['block_options']['tags'] = $param['tags'];
		}

		if ( ! empty( $param['offset'] ) ) {
			$block['block_options']['offset'] = $param['offset'];
		}

		if ( ! empty( $param['orderby'] ) ) {
			$block['block_options']['orderby'] = $param['orderby'];
		}

		if ( ! empty( $param['block_style'] ) ) {
			$block['block_options']['block_style'] = $param['block_style'];
		}

		if ( ! empty( $param['pagination'] ) ) {
			$block['block_options']['pagination'] = esc_attr( $param['pagination'] );
		}

		if ( ! empty( $param['post_format'] ) ) {
			$block['block_options']['post_format'] = esc_attr( $param['post_format'] );
		}

		if ( ! empty( $param['widget_id'] ) ) {
			$block['block_id'] = 'block_' . esc_attr( $param['widget_id'] );
		}

		return $block;
	}
}
