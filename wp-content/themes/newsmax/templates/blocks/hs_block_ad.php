<?php

/**
 * Class newsmax_ruby_hs_block_advertising
 * render has fullwidth block code
 */
if ( ! class_exists( 'newsmax_ruby_hs_block_advertising' ) ) {
	class newsmax_ruby_hs_block_advertising extends newsmax_ruby_block {

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $block
		 *
		 * @return string
		 * render block layout
		 */
		static function render( $block ) {

			//add block data
			$block['block_type']    = 'has_sidebar';
			$block['block_classes'] = 'hs-block block-ad hs-block-ad';

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

			if ( ! empty( $block['block_options']['ad_title'] ) ) {
				$str .= '<div class="ad-description"><span>' . esc_html( $block['block_options']['ad_title'] ) . '</span></div>';
			}
			$str .= '<div class="ad-wrap">';
			if ( ! empty( $block['block_options']['ad_image'] ) ) {

				if ( ! empty( $block['block_options']['ad_url'] ) ) {
					$str .= '<a href="' . esc_url( $block['block_options']['ad_url'] ) . '" target="_blank">';
					$str .= '<img src="' . esc_url( $block['block_options']['ad_image'] ) . '" alt="' . get_bloginfo() . '">';
					$str .= '</a>';
				} else {
					$str .= '<img src="' . esc_url( $block['block_options']['ad_image'] ) . '" alt="' . get_bloginfo() . '">';
				}
			} else {
				if ( ! empty( $block['block_options']['ad_script'] ) ) {
					if ( function_exists( 'newsmax_ruby_ad_render_script' ) ) {
						$str .= newsmax_ruby_ad_render_script( $block['block_options']['ad_script'], 'content_ad' );
					} else {
						$str .= '<div>' . htmlspecialchars_decode( stripcslashes( $block['block_options']['ad_script'] ) ) . '</div>';
					}
				}
			}
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
				'advertising' => array(
					'ad_image'  => true,
					'ad_url'    => true,
					'ad_script' => true
				),
				'title'       => array(
					'ad_title'     => esc_html__( '- Advertisement -', 'newsmax' ),
					'header_color' => true,
				)
			);
		}
	}
}
