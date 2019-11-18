<?php

/**
 * Class newsmax_ruby_fw_block_subscribe
 * render has fullwidth block subscribe
 */
if ( ! class_exists( 'newsmax_ruby_fw_block_subscribe' ) ) {
	class newsmax_ruby_fw_block_subscribe extends newsmax_ruby_block {

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $block
		 *
		 * @return string
		 * render block layout
		 */
		static function render( $block ) {

			//add block data
			$block['block_type']    = 'full_width';
			$block['block_classes'] = 'fw-block block-subscribe block-feat fw-block-subscribe';

			//render
			$str = '';
			$str .= parent::block_open( $block );
			$str .= self::content( $block );
			$str .= parent::block_close();

			return $str;
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $block
		 *
		 * @return string
		 * render block block content
		 */
		static function content( $block ) {

			//render
			$str = '';

			$str .= parent::block_content_open();

			if ( ! empty( $block['block_options']['image_url'] ) ) {
				$str .= '<div class="block-subscribe-content is-subscribe-bg" style="background-image: url(' . esc_url( $block['block_options']['image_url'] ) . ')">';
			} else {
				$str .= '<div class="block-subscribe-content">';
			}

			$str .= '<div class="block-subscribe-content-inner">';
			if ( ! empty( $block['block_options']['title'] ) ) {
				$str .= '<div class="block-subscribe-title post-title is-size-2">';
				$str .= '<h3>' . esc_html( $block['block_options']['title'] ) . '</h3>';
				$str .= '</div>';
			}

			if ( ! empty( $block['block_options']['description'] ) ) {
				$str .= '<div class="block-subscribe-desc">';
				$str .= htmlspecialchars_decode( stripcslashes( $block['block_options']['description'] ) );
				$str .= '</div>';
			}

			//render shortcode
			if ( ! empty( $block['block_options']['shortcode'] ) ) {
				$str .= '<div class="block-subscribe-content-shortcode">';
				$str .= do_shortcode( stripcslashes( $block['block_options']['shortcode'] ) );
				$str .= '</div>';
			}

			$str .= '</div>';
			$str .= '</div>';

			$str .= parent::block_content_close();

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array
		 * init block options
		 */
		static function block_config() {
			return array(

				'shortcodes' => array(
					'title'       => esc_html__( 'Subscribe Newsletter', 'newsmax' ),
					'shortcode'   => true,
					'description' => true,
				),
				'design'     => array(
					'wrap_mode'  => true,
					'image_url'  => true,
					'text_style' => true
				)
			);
		}
	}
}
