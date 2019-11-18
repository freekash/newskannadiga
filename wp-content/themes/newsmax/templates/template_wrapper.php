<?php

/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $classes
 * @param string $sidebar_position
 * @param bool $disable_wrapper
 * open page wrap
 */
if ( ! function_exists( 'newsmax_ruby_page_open' ) ) {
	function newsmax_ruby_page_open( $classes = '', $sidebar_position = '', $disable_wrapper = false ) {

		$class_name   = array();
		$class_name[] = 'ruby-page-wrap ruby-section row';
		$class_name[] = 'is-sidebar-' . esc_attr( $sidebar_position );
		if ( false === $disable_wrapper ) {
			$class_name[] = 'ruby-container';
		}
		if ( ! empty( $classes ) ) {
			$class_name[] = esc_attr( $classes );
		}
		$class_name = implode( ' ', $class_name );

		return '<div class="' . esc_attr( $class_name ) . '">';

	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * close page wrap
 */
if ( ! function_exists( 'newsmax_ruby_page_close' ) ) {
	function newsmax_ruby_page_close() {
		return '</div>';
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $classes
 * @param string $sidebar_position
 * @param string $max_width
 *
 * @return string
 * open page inner
 */
if ( ! function_exists( 'newsmax_ruby_page_content_open' ) ) {
	function newsmax_ruby_page_content_open( $classes = '', $sidebar_position = '', $max_width = '' ) {

		$style        = '';
		$class_name   = array();
		$class_name[] = 'ruby-content-wrap';
		if ( ! empty( $classes ) ) {
			$class_name[] = esc_attr( $classes );
		}
		if ( 'none' == $sidebar_position ) {
			$class_name[] = 'content-without-sidebar col-xs-12';
		} else {
			$class_name[] = 'col-sm-8 col-xs-12 content-with-sidebar';
		};
		$class_name = implode( ' ', $class_name );

		if ( ! empty( $max_width ) ) {
			$style = 'style = "max-width: ' . intval( esc_attr( $max_width ) ) . 'px"';
		}

		return '<div class="' . esc_attr( $class_name ) . '"' . ' ' . $style . '>';
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * render close single tag
 */
if ( ! function_exists( 'newsmax_ruby_page_content_close' ) ) {
	function newsmax_ruby_page_content_close() {
		return '</div>';
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param      $name
 * @param bool $disable_markup
 * render sidebar
 */
if ( ! function_exists( 'newsmax_ruby_page_sidebar' ) ) {
	function newsmax_ruby_page_sidebar( $name, $disable_markup = false ) {

		if ( ! is_active_sidebar( $name ) ) {
			return false;
		}

		$str    = '';
		$sticky = newsmax_ruby_get_option( 'sidebar_sticky' );

		if ( false === $disable_markup ) {
			$markup = newsmax_ruby_schema::markup( 'sidebar', false );
		} else {
			$markup = '';
		}

		if ( ! empty( $sticky ) ) {
			$str .= '<aside class="sidebar-wrap col-sm-4 col-xs-12 clearfix" ' . $markup . '><div class="ruby-sidebar-sticky">';
			$str .= '<div class="sidebar-inner">';

			ob_start();
			dynamic_sidebar( $name );
			$str .= ob_get_clean();

			$str .= '</div>';
			$str .= '</div></aside>';
		} else {
			$str .= '<aside class="sidebar-wrap col-sm-4 col-xs-12 clearfix" ' . $markup . '>';
			$str .= '<div class="sidebar-inner">';

			ob_start();
			dynamic_sidebar( $name );
			$str .= ob_get_clean();

			$str .= '</div>';
			$str .= '</aside>';
		}

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * page nothing found
 */
if ( ! function_exists( 'newsmax_ruby_nothing_found' ) ) {
	function newsmax_ruby_nothing_found() {

		$str = '';
		$str .= '<div class="nothing-found-wrap">';
		$str .= '<h1 class="title-nothing page-title post-title is-strong"><span>' . newsmax_ruby_translate( 'nothing' ) . '</span></h1>';
		$str .= '<div class="page-content">';
		$str .= '<p class="description-nothing">' . newsmax_ruby_translate( 'nothing_found' ) . '</p>';
		$str .= '<div class="page-search-form">';
		$str .= get_search_form( false );
		$str .= '</div>';
		$str .= '</div>';
		$str .= '</div>';

		return $str;
	}
}