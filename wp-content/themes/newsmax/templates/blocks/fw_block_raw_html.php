<?php
/**
 * Class newsmax_ruby_fw_block_raw_html
 * render has fullwidth block custom html
 */
if ( ! class_exists( 'newsmax_ruby_fw_block_raw_html' ) ) {
	class newsmax_ruby_fw_block_raw_html extends newsmax_ruby_block {

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $block
		 *
		 * @return string
		 * render block layout
		 */
		static function render( $block ) {

			//add block data
			$block['block_type']    = 'full_width';
			$block['block_classes'] = 'fw-block block-raw-html fw-block-raw-html';

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

			$class_name_el   = array();
			$class_name_el[] = 'col-el';
			if ( empty( $block['block_options']['num_of_col'] ) || 3 == $block['block_options']['num_of_col'] ) {
				$class_name_el[] = 'col-sm-4 col-xs-12';
			} elseif ( 4 == $block['block_options']['num_of_col'] ) {
				$class_name_el[] = 'col-sm-3 col-xs-12';
			} elseif ( '2' == $block['block_options']['num_of_col'] ) {
				$class_name_el[] = 'col-sm-6 col-xs-12';
			} else {
				$class_name_el[] = 'col-xs-12';
			}

			$class_name_el = implode( ' ', $class_name_el );

			$str .= '<div class="col-wrap clearfix">';

			if ( ! empty( $block['block_options']['raw_html_1'] ) ) {
				$str .= '<div class="' . esc_attr( $class_name_el ) . '">';
				$content = stripcslashes( $block['block_options']['raw_html_1'] );
				$str .= html_entity_decode( $content );
				$str .= '</div>';
			}

			if ( ! empty( $block['block_options']['raw_html_2'] ) ) {
				$str .= '<div class="' . esc_attr( $class_name_el ) . '">';
				$content = stripcslashes( $block['block_options']['raw_html_2'] );
				$str .= html_entity_decode( $content );
				$str .= '</div>';
			}

			if ( ! empty( $block['block_options']['raw_html_3'] ) ) {
				$str .= '<div class="' . esc_attr( $class_name_el ) . '">';
				$content = stripcslashes( $block['block_options']['raw_html_3'] );
				$str .= html_entity_decode( $content );
				$str .= '</div>';
			}

			if ( ! empty( $block['block_options']['raw_html_4'] ) ) {
				$str .= '<div class="' . esc_attr( $class_name_el ) . '">';
				$content = stripcslashes( $block['block_options']['raw_html_4'] );
				$str .= html_entity_decode( $content );
				$str .= '</div>';
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
				'header'   => array(
					'title'        => '',
					'title_url'    => true,
					'header_color' => true
				),
				'column_1' => array(
					'raw_html_1' => true,
				),
				'column_2' => array(
					'raw_html_2' => true,
				),
				'column_3' => array(
					'raw_html_3' => true,
				),
				'column_4' => array(
					'raw_html_4' => true,
				),
				'design'   => array(
					'num_of_col' => true,
				)
			);
		}
	}
}
