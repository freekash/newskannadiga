<?php

/**
 * Class newsmax_ruby_hs_block_html
 * render has sidebar block custom html
 */
if ( ! class_exists( 'newsmax_ruby_hs_block_html' ) ) {
	class newsmax_ruby_hs_block_html extends newsmax_ruby_block {

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $block
		 *
		 * @return string
		 * render block layout
		 */
		static function render( $block ) {

			//add block data
			$block['block_type']    = 'has_sidebar';
			$block['block_classes'] = 'hs-block block-html hs-block-html';

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

			if ( ! empty( $block['block_options']['custom_html'] ) ) {
				$str .= '<div class="entry">';

				//render html
				$content = htmlspecialchars_decode( stripcslashes( $block['block_options']['custom_html'] ) );
				$content = apply_filters( 'the_content', $content );
				$content = str_replace( ']]>', ']]&gt;', $content );

				$str .= $content;
				$str .= '</div>';
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
				'header'  => array(
					'title'        => esc_html__( 'custom html', 'newsmax' ),
					'title_url'    => true,
					'header_color' => true
				),
				'content' => array(
					'custom_html' => true
				),
				'design'  => array(
					'wrap_mode'  => true,
					'background' => true,
					'text_style' => true
				)
			);
		}
	}
}
