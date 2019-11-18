<?php

/**
 * Class newsmax_ruby_fw_block_col
 * render has fullwidth block custom html
 */
if ( ! class_exists( 'newsmax_ruby_fw_block_col' ) ) {
	class newsmax_ruby_fw_block_col extends newsmax_ruby_block {

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $block
		 *
		 * @return string
		 * render block layout
		 */
		static function render( $block ) {

			//add block data
			$block['block_type']    = 'full_width';
			$block['block_classes'] = 'fw-block block-col fw-block-col';

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

			$class_name_el = array();
			$class_name    = array();

			$class_name[] = 'col-wrap clearfix';
			if ( ! empty( $block['block_options']['text_style'] ) ) {
				$class_name[] = 'is-text-' . esc_attr( $block['block_options']['text_style'] );
			}
			if ( empty( $block['block_options']['col_img_style'] ) ) {
				$block['block_options']['col_img_style'] = 1;
			}
			$class_name[] = 'is-style-' . esc_attr( $block['block_options']['col_img_style'] );

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

			$class_name    = implode( ' ', $class_name );
			$class_name_el = implode( ' ', $class_name_el );

			$str .= '<div class="' . $class_name . '">';

			if ( ! empty( $block['block_options']['image_url_1'] ) ) {

				if ( empty( $block['block_options']['col_title_1'] ) ) {
					$block['block_options']['col_title_1'] = '';
				}
				if ( empty( $block['block_options']['destination_1'] ) ) {
					$block['block_options']['destination_1'] = '';
				}
				if ( empty( $block['block_options']['description_1'] ) ) {
					$block['block_options']['description_1'] = '';
				}

				$str .= '<div class="' . esc_attr( $class_name_el ) . '">';
				$str .= self::column_image( $block['block_options']['image_url_1'], $block['block_options']['destination_1'], $block['block_options']['col_title_1'] );
				$str .= '<div class="col-holder">';
				$str .= self::column_title( $block['block_options']['col_title_1'], $block['block_options']['destination_1'], $block['block_options']['num_of_col'] );
				$str .= self::column_content( $block['block_options']['description_1'] );
				$str .= '</div>';
				$str .= '</div>';
			}

			if ( ! empty( $block['block_options']['image_url_2'] ) ) {
				if ( empty( $block['block_options']['col_title_2'] ) ) {
					$block['block_options']['col_title_2'] = '';
				}
				if ( empty( $block['block_options']['destination_2'] ) ) {
					$block['block_options']['destination_2'] = '';
				}
				if ( empty( $block['block_options']['description_2'] ) ) {
					$block['block_options']['description_2'] = '';
				}

				$str .= '<div class="' . esc_attr( $class_name_el ) . '">';
				$str .= self::column_image( $block['block_options']['image_url_2'], $block['block_options']['destination_2'], $block['block_options']['col_title_2'] );
				$str .= '<div class="col-holder">';
				$str .= self::column_title( $block['block_options']['col_title_2'], $block['block_options']['destination_2'], $block['block_options']['num_of_col'] );
				$str .= self::column_content( $block['block_options']['description_2'] );
				$str .= '</div>';
				$str .= '</div>';
			}

			if ( ! empty( $block['block_options']['image_url_3'] ) ) {

				if ( empty( $block['block_options']['col_title_3'] ) ) {
					$block['block_options']['col_title_3'] = '';
				}
				if ( empty( $block['block_options']['destination_3'] ) ) {
					$block['block_options']['destination_3'] = '';
				}
				if ( empty( $block['block_options']['description_3'] ) ) {
					$block['block_options']['description_3'] = '';
				}

				$str .= '<div class="' . esc_attr( $class_name_el ) . '">';
				$str .= self::column_image( $block['block_options']['image_url_3'], $block['block_options']['destination_3'], $block['block_options']['col_title_3'] );
				$str .= '<div class="col-holder">';
				$str .= self::column_title( $block['block_options']['col_title_3'], $block['block_options']['destination_3'], $block['block_options']['num_of_col'] );
				$str .= self::column_content( $block['block_options']['description_3'] );
				$str .= '</div>';
				$str .= '</div>';
			}

			if ( ! empty( $block['block_options']['image_url_4'] ) ) {

				if ( empty( $block['block_options']['col_title_4'] ) ) {
					$block['block_options']['col_title_4'] = '';
				}
				if ( empty( $block['block_options']['destination_4'] ) ) {
					$block['block_options']['destination_4'] = '';
				}
				if ( empty( $block['block_options']['description_4'] ) ) {
					$block['block_options']['description_4'] = '';
				}

				$str .= '<div class="' . esc_attr( $class_name_el ) . '">';
				$str .= self::column_image( $block['block_options']['image_url_4'], $block['block_options']['destination_4'], $block['block_options']['col_title_4'] );
				$str .= '<div class="col-holder">';
				$str .= self::column_title( $block['block_options']['col_title_4'], $block['block_options']['destination_4'], $block['block_options']['num_of_col'] );
				$str .= self::column_content( $block['block_options']['description_4'] );
				$str .= '</div>';
				$str .= '</div>';
			}

			$str .= '</div>';

			$str .= parent::block_content_close();

			return $str;
		}

		static function column_title( $title, $destination = '', $col = 3 ) {

			if ( empty( $title ) ) {
				return false;
			}
			$str        = '';
			$class_name = array();

			$class_name[] = 'col-title post-title';
			if ( 3 == $col ) {
				$class_name[] = 'is-size-3';
			} elseif ( 4 == $col ) {
				$class_name[] = 'is-size-4';
			} else {
				$class_name[] = 'is-size-2';
			}

			$class_name = implode( ' ', $class_name );

			$str .= '<h3 class="' . esc_attr( $class_name ) . '">';
			if ( empty( $destination ) ) {
				$str .= '<span>' . esc_html( $title ) . '</span>';
			} else {
				$str .= '<a class="col-link" target="_blank" href="' . esc_url( $destination ) . '">' . esc_html( $title ) . '</a>';
			}
			$str .= '</h3>';

			return $str;
		}

		static function column_image( $image, $destination = '', $alt = '' ) {
			if ( empty( $image ) ) {
				return false;
			}

			if ( empty( $destination ) ) {
				return '<div class="col-image"><img src="' . esc_url( $image ) . '" alt="' . esc_attr( $alt ) . '"></div>';
			} else {
				return '<div class="col-image"><a target="_blank" href="' . esc_url( $destination ) . '"><img src="' . esc_url( $image ) . '" alt="' . esc_attr( $alt ) . '"></a></div>';
			}
		}


		static function column_content( $content ) {

			if ( empty( $content ) ) {
				return false;
			}

			$content = apply_filters( 'the_content', $content );

			return '<div class="col-desc post-excerpt">' . html_entity_decode( $content ) . '</div>';
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
					'image_url_1'   => true,
					'col_title_1'   => true,
					'destination_1' => true,
					'description_1' => true,
				),
				'column_2' => array(
					'image_url_2'   => true,
					'col_title_2'   => true,
					'destination_2' => true,
					'description_2' => true,
				),
				'column_3' => array(
					'image_url_3'   => true,
					'col_title_3'   => true,
					'destination_3' => true,
					'description_3' => true,
				),
				'column_4' => array(
					'image_url_4'   => true,
					'col_title_4'   => true,
					'destination_4' => true,
					'description_4' => true,
				),
				'design'   => array(
					'num_of_col'    => true,
					'col_img_style' => true,
				)
			);
		}
	}
}
