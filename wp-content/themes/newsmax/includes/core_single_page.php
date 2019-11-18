<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return mixed|string
 * check page title
 */
if ( ! function_exists( 'newsmax_ruby_single_page_check_title' ) ) {
	function newsmax_ruby_single_page_check_title() {

		$page_title = get_post_meta( get_the_ID(), 'newsmax_ruby_meta_page_title', true );

		if ( ! empty( $page_title ) && 'none' == $page_title ) {
			return false;
		}

		$page_title = newsmax_ruby_get_option( 'single_page_title' );
		if ( ! empty( $page_title ) ) {
			return true;
		} else {
			return false;
		}
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return mixed|string
 * check sidebar position
 */
if ( ! function_exists( 'newsmax_ruby_single_page_check_sidebar_position' ) ) {
	function newsmax_ruby_single_page_check_sidebar_position() {

		//sidebar position
		$sidebar_position = get_post_meta( get_the_ID(), 'newsmax_ruby_meta_sidebar_position', true );

		//override sidebar position
		if ( 'default' == $sidebar_position || empty( $sidebar_position ) ) {
			$sidebar_position = newsmax_ruby_get_option( 'single_page_sidebar_position' );
			if ( 'default' == $sidebar_position ) {
				$sidebar_position = newsmax_ruby_get_option( 'site_sidebar_position' );
			}
		}

		return $sidebar_position;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return mixed|string
 * check sidebar name
 */
if ( ! function_exists( 'newsmax_ruby_single_page_check_sidebar_name' ) ) {
	function newsmax_ruby_single_page_check_sidebar_name() {

		$all_sidebar = newsmax_ruby_theme_config::sidebar_name( true );

		//single sidebar name
		$sidebar_name = get_post_meta( get_the_ID(), 'newsmax_ruby_meta_sidebar_name', true );
		if ( ! array_key_exists( $sidebar_name, $all_sidebar ) ) {
			$sidebar_name = 'newsmax_ruby_default_from_theme_options';
		}
		if ( 'newsmax_ruby_default_from_theme_options' == $sidebar_name || empty( $sidebar_name ) ) {
			$sidebar_name = newsmax_ruby_get_option( 'single_page_sidebar_name' );
		}

		if ( empty( $sidebar_name ) ) {
			$sidebar_name = 'newsmax_ruby_sidebar_default';
		}

		return $sidebar_name;
	}
}