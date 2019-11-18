<?php

/**
 * Class newsmax_ruby_fw_block_shortcode
 * render has fullwidth block shortcode
 */
if ( ! class_exists( 'newsmax_ruby_fw_block_shortcode' ) ) {
	class newsmax_ruby_fw_block_shortcode extends newsmax_ruby_block {

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $block
		 *
		 * @return string
		 * render block layout
		 */
		static function render( $block ) {

			//add block data
			$block['block_type']    = 'full_width';
			$block['block_classes'] = 'fw-block fw-block-shortcode block-shortcode';

			//render
			$str = '';
			$str .= parent::block_open( $block );
			$str .= parent::block_header( $block );
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
			if ( ! empty( $block['block_options']['shortcode'] ) ) {
				$str .= do_shortcode( stripcslashes( $block['block_options']['shortcode'] ) );
			}
			$str .= parent::block_content_close();

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array
		 * init block options
		 */
		static function block_config() {
			return array(
				'header'     => array(
					'title'        => esc_html__( 'shortcodes', 'newsmax' ),
					'title_url'    => true,
					'header_color' => true,
				),
				'shortcodes' => array(
					'shortcode' => true,
				),
				'design'     => array(
					'wrap_mode'  => true,
					'background' => true,
					'text_style' => true
				)
			);
		}
	}
}
