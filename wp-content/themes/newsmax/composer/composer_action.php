<?php

//save and get data composer
if ( ! class_exists( 'newsmax_ruby_composer_action' ) ) {
	class newsmax_ruby_composer_action {

		protected static $instance = null;

		public function __construct() {
			add_action( 'save_post', array( $this, 'init_composer_data' ) );
			add_action( 'admin_head', array( $this, 'backend_composer_data' ) );
		}

		static function get_instance() {
			if ( null == self::$instance ) {
				self::$instance = new self;
			}

			return self::$instance;
		}

		function init_composer_data() {

			if ( ! empty( $_POST['post_ID'] ) ) {
				$post_id = $_POST['post_ID'];
			} else {
				return false;
			}

			if ( empty( $_POST['post_type'] ) || 'page' != $_POST['post_type'] || ( ! empty( $_POST['action'] ) && 'inline-save' == $_POST['action'] ) ) {
				return false;
			}

			$composer_data = array();

			if ( ! isset( $_POST['newsmax_ruby_section_order'] ) ) {
				if ( 'page-composer.php' == get_post_meta( $post_id, '_wp_page_template', true ) ) {
					delete_post_meta( $post_id, 'newsmax_ruby_page_composer_data' );
				}

				return false;
			};

			if ( ! array( $_POST['newsmax_ruby_section_order'] ) ) {
				return false;
			}

			foreach ( $_POST['newsmax_ruby_section_order'] as $section_id ) {

				//sanitize id
				$section_id = sanitize_text_field( $section_id );

				//get section type
				if ( ! isset( $_POST[ 'newsmax_ruby_section_' . $section_id ] ) ) {
					return false;
				}

				$section_type = sanitize_text_field( $_POST[ 'newsmax_ruby_section_' . $section_id ] );

				if ( $section_type == 'section_has_sidebar' ) {

					$section_sidebar          = '';
					$section_sidebar_position = '';
					$section_sidebar_sticky   = '';

					if ( ! empty ( $_POST[ 'newsmax_ruby_sidebar_' . $section_id ] ) ) {
						$section_sidebar = sanitize_text_field( $_POST[ 'newsmax_ruby_sidebar_' . $section_id ] );
					}
					if ( ! empty( $_POST[ 'newsmax_ruby_meta_sidebar_position_' . $section_id ] ) ) {
						$section_sidebar_position = sanitize_text_field( $_POST[ 'newsmax_ruby_meta_sidebar_position_' . $section_id ] );
					}

					if ( ! empty( $_POST[ 'newsmax_ruby_meta_sidebar_sticky_' . $section_id ] ) ) {
						$section_sidebar_sticky = sanitize_text_field( $_POST[ 'newsmax_ruby_meta_sidebar_sticky_' . $section_id ] );
					}

					$composer_data[ $section_id ]['section_sidebar']          = $section_sidebar;
					$composer_data[ $section_id ]['section_sidebar_position'] = $section_sidebar_position;
					$composer_data[ $section_id ]['section_sidebar_sticky']   = $section_sidebar_sticky;
				}

				$composer_data[ $section_id ]['section_type'] = $section_type;
				$composer_data[ $section_id ]['section_id']   = $section_id;

				if ( ! isset( $_POST['newsmax_ruby_block_order'][ $section_id ] ) ) {
					continue;
				}

				$blocks_of_section = array_map( 'sanitize_text_field', $_POST['newsmax_ruby_block_order'][ $section_id ] );

				$blocks = array();
				if ( is_array( $blocks_of_section ) ) {
					foreach ( $blocks_of_section as $block ) {
						$block_name                     = 'newsmax_ruby_block_' . $block;
						$name                           = sanitize_text_field( $_POST[ $block_name ] );
						$blocks[ $block ]['block_name'] = $name;
						$blocks[ $block ]['block_id']   = $block;

						if ( isset( $_POST['newsmax_ruby_block_option'][ $block_name ] ) ) {
							$block_options = $_POST['newsmax_ruby_block_option'][ $block_name ];
							foreach ( $block_options as $option_name => $option ) {
								$option_name                                       = sanitize_text_field( $option_name );
								$option                                            = $this->sanitize_input( $option_name, $option );
								$blocks[ $block ]['block_options'][ $option_name ] = $option;
							}
						}
					}
				}

				$composer_data[ $section_id ]['blocks'] = $blocks;
			}

			//save composer data
			$this->save_composer_data( $post_id, $composer_data );

			return false;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $page_id
		 * @param $composer_data
		 * save page composer to database
		 */
		public function save_composer_data( $page_id, $composer_data ) {
			delete_post_meta( $page_id, 'newsmax_ruby_page_composer_data' );
			delete_post_meta( $page_id, 'newsmax_ruby_composer_dynamic_style_cache' );
			update_post_meta( $page_id, 'newsmax_ruby_page_composer_data', $composer_data );
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $page_id
		 *
		 * @return mixed
		 * get page composer as array value
		 */
		static function get_composer_data( $page_id ) {
			return get_post_meta( $page_id, 'newsmax_ruby_page_composer_data', true );
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * get data for backend
		 */
		public function backend_composer_data() {

			global $post;
			if ( isset( $post->ID ) && 'page-composer.php' == get_post_meta( $post->ID, '_wp_page_template', true ) ) {
				$page_composer_data = self::get_composer_data( $post->ID );

				if ( is_array( $page_composer_data ) ) {
					foreach ( $page_composer_data as $section_id => $section ) {
						if ( ! empty( $section['blocks'] ) ) {
							foreach ( $section['blocks'] as $block_id => $block ) {

								if ( ! empty( $block['block_options']['custom_html'] ) ) {
									$custom_html                                                                              = stripcslashes( $block['block_options']['custom_html'] );
									$page_composer_data[ $section_id ]['blocks'][ $block_id ]['block_options']['custom_html'] = $custom_html;
								}
								if ( ! empty( $block['block_options']['shortcode'] ) ) {
									$shortcode                                                                              = stripcslashes( $block['block_options']['shortcode'] );
									$page_composer_data[ $section_id ]['blocks'][ $block_id ]['block_options']['shortcode'] = $shortcode;
								}
								if ( ! empty( $block['block_options']['ad_script'] ) ) {
									$ad_script                                                                              = stripcslashes( $block['block_options']['ad_script'] );
									$page_composer_data[ $section_id ]['blocks'][ $block_id ]['block_options']['ad_script'] = $ad_script;
								}
								//raw HTML
								if ( ! empty( $block['block_options']['raw_html_1'] ) ) {
									$raw_html_1                                                                              = stripcslashes( $block['block_options']['raw_html_1'] );
									$page_composer_data[ $section_id ]['blocks'][ $block_id ]['block_options']['raw_html_1'] = $raw_html_1;
								}
								if ( ! empty( $block['block_options']['raw_html_2'] ) ) {
									$raw_html_2                                                                              = stripcslashes( $block['block_options']['raw_html_2'] );
									$page_composer_data[ $section_id ]['blocks'][ $block_id ]['block_options']['raw_html_2'] = $raw_html_2;
								}
								if ( ! empty( $block['block_options']['raw_html_3'] ) ) {
									$raw_html_3                                                                              = stripcslashes( $block['block_options']['raw_html_3'] );
									$page_composer_data[ $section_id ]['blocks'][ $block_id ]['block_options']['raw_html_3'] = $raw_html_3;
								}
								if ( ! empty( $block['block_options']['raw_html_4'] ) ) {
									$raw_html_4                                                                              = stripcslashes( $block['block_options']['raw_html_4'] );
									$page_composer_data[ $section_id ]['blocks'][ $block_id ]['block_options']['raw_html_4'] = $raw_html_4;
								}
							}
						}
					}
				}

				wp_localize_script( 'newsmax_ruby_composer_script', 'newsmax_ruby_page_composer_data', $page_composer_data );
			}
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param string $option_name
		 * @param string $option
		 *
		 * @return string
		 * sanitize tn page composer
		 */
		function  sanitize_input( $option_name = '', $option = '' ) {
			switch ( $option_name ) {
				case 'custom_html' :
				case 'raw_html_1' :
				case 'raw_html_2' :
				case 'raw_html_3' :
				case 'raw_html_4' :
					$option = esc_html( $option );

					return addslashes( $option );
				case 'shortcode' :
				case 'ad_script' :
					return addslashes( $option );
				case 'title_url'  :
				case 'image_url'  :
				case 'destination_1':
				case 'destination_2':
				case 'destination_3':
				case 'destination_4':
					return esc_url( $option );
				case 'category_ids' : {
					$options = array();
					if ( is_array( $option ) ) {
						foreach ( $option as $option_el ) {
							$options[] = sanitize_text_field( $option_el );
						}
					}

					return $options;
				}
				default :
					return sanitize_text_field( $option );
			}
		}
	}

	//INIT COMPOSER ACTION
	newsmax_ruby_composer_action::get_instance();
}
