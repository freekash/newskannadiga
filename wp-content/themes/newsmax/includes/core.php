<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param $option_name
 *
 * @return string
 * get theme options
 */
if ( ! function_exists( 'newsmax_ruby_get_option' ) ) {
	function newsmax_ruby_get_option( $option_name ) {
		if ( empty( $GLOBALS['newsmax_ruby_theme_options'] ) ) {
			$GLOBALS['newsmax_ruby_theme_options'] = newsmax_ruby_redux_default_config();
		}
		$newsmax_ruby_theme_options = $GLOBALS['newsmax_ruby_theme_options'];
		if ( empty( $newsmax_ruby_theme_options[ $option_name ] ) ) {
			return false;
		} else {
			return $newsmax_ruby_theme_options[ $option_name ];
		}
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return mixed
 * get category page id
 */
if ( ! function_exists( 'newsmax_ruby_get_cat_id' ) ) {
	function newsmax_ruby_get_cat_id() {
		global $wp_query;

		return $wp_query->get_queried_object_id();
	}
}