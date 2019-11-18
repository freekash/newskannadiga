<?php
/**
 * Class newsmax_ruby_hs_block_15 (block slider with nav)
 */
if ( ! class_exists( 'newsmax_ruby_hs_block_15' ) ) {
	class newsmax_ruby_hs_block_15 extends newsmax_ruby_block {

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $block
		 *
		 * @return string
		 * render block layout
		 */
		static function render( $block ) {

			//add block data
			$block['block_type']    = 'has_sidebar';
			$block['block_classes'] = 'hs-block hs-block-feat hs-block-15';

			//disable found rows
			$block['block_options']['no_found_rows'] = true;

			//query data
			$data_query = parent::get_data( $block );

			//render
			$str = '';
			$str .= parent::block_open( $block, $data_query );
			$str .= parent::block_header( $block );
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
			$str .= parent::block_content_open();
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

			$options['smooth_style_disable'] = true;

			$str = '';
			$str .= '<div class="slider-loader"></div>';
			$str .= '<div class="hs-block-15-slider slider-init">';
			while ( $data_query->have_posts() ) {
				$data_query->the_post();
				$str .= '<div class="post-outer">';
				$str .= newsmax_ruby_post_overlay_3( $options );
				$str .= '</div><!--#post outer-->';
			}
			$str .= '</div><!--#hs slider 1-->';

			//reset loop
			$data_query->rewind_posts();

			$str .= '<div class="hs-block-15-slider-nav slider-init">';
			while ( $data_query->have_posts() ) {
				$data_query->the_post();
				$str .= '<div class="post-outer">';
				$str .= newsmax_ruby_post_grid_4( $options );
				$str .= '</div><!--#post outer-->';
			}
			$str .= '</div><!--#hs slider 1 nav-->';

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array
		 * init block options
		 */
		static function block_config() {
			return array(
				'filter' => array(
					'category_id'    => true,
					'category_ids'   => true,
					'tags'           => true,
					'post_format'    => true,
					'authors'        => true,
					'orderby'        => true,
					'posts_per_page' => 7,
					'offset'         => true
				),
				'design' => array(
					'cat_info'  => true,
					'meta_info' => true,
					'share'     => true
				)
			);
		}
	}
}
