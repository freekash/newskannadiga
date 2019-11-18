<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * Class newsmax_ruby_mega_block_cat (without child)
 */
if ( ! class_exists( 'newsmax_ruby_mega_block_cat' ) ) {
	class newsmax_ruby_mega_block_cat extends newsmax_ruby_block {

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $block
		 *
		 * @return string
		 * render block layout
		 */
		static function render( $block ) {

			//add block data
			$block['block_type']                 = 'full_width';
			$block['block_options']['wrap_mode'] = 0;
			$block['block_classes']              = 'block-mega-menu';

			//text style
			$text_style = newsmax_ruby_get_option( 'navbar_mega_text_style' );
			if ( ! empty( $text_style ) ) {
				$block['block_classes'] = 'block-mega-menu ' . esc_attr( $text_style );
			}

			$str = '';

			//query data
			$data_query = parent::get_data( $block );

			//render
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

			$str                  = '';
			$options['cat_info']  = 1;
			$options['meta_info'] = 1;

			while ( $data_query->have_posts() ) {

				$data_query->the_post();

				$str .= '<div class="post-outer ruby-col-5">';
				$str .= newsmax_ruby_post_grid_3( $options );
				$str .= '</div><!--#post outer -->';

			}

			return $str;
		}
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * Class newsmax_ruby_mega_block_cat (with child)
 */
if ( ! class_exists( 'newsmax_ruby_mega_block_cat_sub' ) ) {
	class newsmax_ruby_mega_block_cat_sub extends newsmax_ruby_block {

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $block
		 *
		 * @return string
		 * render block layout
		 */
		static function render( $block ) {

			//add block data
			$block['block_type']                 = 'full_width';
			$block['block_options']['wrap_mode'] = 0;
			$block['block_classes']              = 'block-mega-menu block-mega-menu-sub';

			//text style
			$text_style = newsmax_ruby_get_option( 'navbar_mega_text_style' );
			if ( ! empty( $text_style ) ) {
				$block['block_classes'] = 'block-mega-menu block-mega-menu-sub ' . esc_attr( $text_style );
			}

			$str = '';

			//query data
			$data_query = parent::get_data( $block );

			//render
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

			$str                  = '';
			$options['cat_info']  = 1;
			$options['meta_info'] = 1;

			while ( $data_query->have_posts() ) {
				$data_query->the_post();

				$str .= '<div class="post-outer col-xs-3">';
				$str .= newsmax_ruby_post_grid_3( $options );
				$str .= '</div><!--#post outer -->';
			}

			return $str;
		}
	}
}


if ( ! function_exists( 'newsmax_ruby_mega_cat_setup' ) ) {
	function newsmax_ruby_mega_block_cat_setup( $param = array() ) {

		$block               = array();
		$block['block_id']   = '';
		$block['block_name'] = 'newsmax_ruby_mega_block_cat';

		$block['block_options'] = array();
		if ( ! empty( $param['category_id'] ) ) {
			$block['block_options']['category_id'] = $param['category_id'];
			$block['block_options']['orderby']     = 'date_post';
		}

		$block['block_options']['posts_per_page'] = '5';

		if ( ! empty( $param['item_has_children'] ) ) {
			$block['block_name']                      = 'newsmax_ruby_mega_block_cat_sub';
			$block['block_options']['posts_per_page'] = '4';
		}
		if ( ! empty( $param['item_id'] ) ) {
			$block['block_id'] = 'ruby_mega_' . $param['item_id'];
		}
		if ( ! empty( $param['pagination'] ) ) {
			$block['block_options']['pagination'] = esc_attr( $param['pagination'] );
		}

		return $block;
	}
}
