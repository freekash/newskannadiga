<?php
/**
 * Class newsmax_ruby_fw_block_video_2 (video playlist)
 */
if ( ! class_exists( 'newsmax_ruby_fw_block_video_2' ) ) {
	class newsmax_ruby_fw_block_video_2 extends newsmax_ruby_block {

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $block
		 *
		 * @return string
		 * render block layout
		 */
		static function render( $block ) {

			//add block data
			$block['block_type']    = 'full_width';
			$block['block_classes'] = 'fw-block block-feat fw-block-video-2';

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

			//create class
			if ( ! empty( $options['auto_play'] ) ) {
				$class_name = 'video-playlist-outer video-playlist-autoplay';
			} else {
				$class_name = 'video-playlist-outer';
			}

			$str = '';
			$str .= '<div class="' . esc_attr( $class_name ) . '">';
			$str .= '<div class="video-playlist-wrap row clearfix">';
			$str .= '<div class="video-playlist-iframe col-sm-8 col-xs-12">';

			while ( $data_query->have_posts() ) {
				$data_query->the_post();
				$str .= '<div class="post-outer video-playlist-iframe-el">';
				$str .= newsmax_ruby_post_video_iframe( $options );
				$str .= '</div>';
				break;
			}
			$str .= '</div>';

			$str .= '<div class="col-sm-4 col-xs-12 video-playlist-iframe-nav-outer">';
			$str .= '<div class="video-playlist-iframe-nav">';
			
			$data_query->rewind_posts();
			while ( $data_query->have_posts() ) {
				$data_query->the_post();
				$str .= '<div class="post-outer video-playlist-iframe-nav-el is-light-text" data-post_video_nav_id="' . get_the_ID() . '">';
				$str .= newsmax_ruby_post_video_2( $options );
				$str .= '</div>';
			}
			$str .= '</div>';
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
				'filter'  => array(
					'category_id'    => true,
					'category_ids'   => true,
					'tags'           => true,
					'post_format'    => 'video',
					'authors'        => true,
					'orderby'        => true,
					'posts_per_page' => 5,
					'offset'         => true
				),
				'title' => array(
					'title'        => esc_html__( 'video playlist', 'newsmax' ),
					'title_url'    => true,
					'header_color' => true
				),
				'design'  => array(
					'auto_play'  => true,
					'background' => true
				)
			);
		}
	}
}
