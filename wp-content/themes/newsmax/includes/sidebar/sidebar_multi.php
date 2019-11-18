<?php
/**
 * multi sidebars
 */
if ( ! class_exists( 'newsmax_ruby_multi_sidebar' ) ) {
	class newsmax_ruby_multi_sidebar {

		/**-------------------------------------------------------------------------------------------------------------------------
		 * save custom sidebar
		 */
		static function save_custom_sidebar() {

			//theme options
			global $newsmax_ruby_theme_options;

			$data_sidebar = array();
			if ( ! empty( $newsmax_ruby_theme_options['newsmax_ruby_multi_sidebar'] ) && is_array( $newsmax_ruby_theme_options['newsmax_ruby_multi_sidebar'] ) ) {
				foreach ( $newsmax_ruby_theme_options['newsmax_ruby_multi_sidebar'] as $sidebar ) {
					array_push( $data_sidebar, array(
							'id'   => 'newsmax_ruby_sidebar_multi_' . self::name_to_id( $sidebar ),
							'name' => esc_attr( strip_tags( $sidebar ) ),
						)
					);
				}
			}

			//save to database
			delete_option( 'newsmax_ruby_custom_multi_sidebars' );
			add_option( 'newsmax_ruby_custom_multi_sidebars', $data_sidebar );
		}

		static function name_to_id($name)
		{
			$name = strtolower(strip_tags($name));
			$id = str_replace(array(' ', ',', '.', '"', "'", '/', "\\", '+', '=', ')', '(', '*', '&', '^', '%', '$', '#', '@', '!', '~', '`', '<', '>', '?', '[', ']', '{', '}', '|', ':',), '', $name);
			return $id;
		}
	}

	add_action( 'redux/options/newsmax_ruby_theme_options/saved', array( 'newsmax_ruby_multi_sidebar', 'save_custom_sidebar' ) );
	add_action( 'redux/options/newsmax_ruby_theme_options/reset', array( 'newsmax_ruby_multi_sidebar', 'save_custom_sidebar' ) );
	add_action( 'redux/options/newsmax_ruby_theme_options/section/reset', array( 'newsmax_ruby_multi_sidebar', 'save_custom_sidebar' ) );
}


