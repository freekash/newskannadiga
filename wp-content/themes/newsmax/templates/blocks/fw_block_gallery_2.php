<?php
/**
 * Class newsmax_ruby_fw_block_gallery_2 ( block grid gallery slider)
 */
if ( ! class_exists( 'newsmax_ruby_fw_block_gallery_2' ) ) {
	class newsmax_ruby_fw_block_gallery_2 extends newsmax_ruby_block {

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $block
		 *
		 * @return string
		 * render block layout
		 */
		static function render( $block ) {

			//add block data
			$block['block_type']    = 'full_width';
			$block['block_classes'] = 'fw-block block-feat fw-block-gallery-2';

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

			$block['block_options']['block_id'] = $block['block_id'];

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


			//check empty
			if ( empty( $options['block_id'] ) ) {
				return false;
			}

			$str     = '';
			$counter = 1;


			//render layout
			while ( $data_query->have_posts() ) {
				$data_query->the_post();

				//set post index
				$options['post_index'] = $counter - 1;

				$str .= '<div class="post-outer col-sm-2 col-xs-4">';
				$str .= newsmax_ruby_post_gallery_2( $options );
				$str .= '</div>';

				$counter ++;
			}

			//reset loop
			$data_query->rewind_posts();

			$str .= '<div id="block-gallery-' . esc_attr( $options['block_id'] ) . '" class="block-popup-gallery mfp-hide mfp-animation">';
			$str .= '<div class="block-popup-gallery-inner">';
			$str .= '<div class="slider-loader"></div>';
			$str .= '<div class="popup-slider-gallery slider-init">';
			while ( $data_query->have_posts() ) {
				$data_query->the_post();
				$str .= newsmax_ruby_post_popup_gallery( $options );
			}
			$str .= '</div>';
			$str .= '</div>';
			$str .= '</div>';

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
					'post_format'    => 'gallery',
					'authors'        => true,
					'orderby'        => true,
					'posts_per_page' => 12,
					'offset'         => true
				),
				'header' => array(
					'title'        => esc_html__( 'gallery grid', 'newsmax' ),
					'title_url'    => true,
					'header_color' => true
				),
				'design' => array(
					'excerpt'          => 20,
					'background'       => true,
					'background_image' => true,
					'cat_info'         => true,
					'meta_info'        => true,
					'share'            => true
				)
			);
		}
	}
}
