<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * render header
 */
if ( ! function_exists( 'newsmax_ruby_render_header' ) ) {
	function newsmax_ruby_render_header() {
		$header_style = newsmax_ruby_get_option( 'header_style' );
		if ( empty( $header_style ) ) {
			$header_style = 1;
		}

		//render header style
		switch ( $header_style ) {
			case 2 :
				get_template_part( 'templates/header/style', '2' );
				break;
			case 3 :
				get_template_part( 'templates/header/style', '3' );
				break;
			case 4 :
				get_template_part( 'templates/header/style', '4' );
				break;
			case 5 :
				get_template_part( 'templates/header/style', '5' );
				break;
			case 6 :
				get_template_part( 'templates/header/style', '6' );
				break;
			case 7 :
				get_template_part( 'templates/header/style', '7' );
				break;
			default :
				get_template_part( 'templates/header/style', '1' );
				break;
		}
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * render top bar
 */
if ( ! function_exists( 'newsmax_ruby_render_topbar' ) ) {
	function newsmax_ruby_render_topbar() {

		//check
		$topbar = newsmax_ruby_get_option( 'topbar' );

		if ( empty( $topbar ) ) {
			return false;
		}

		$topbar_style = newsmax_ruby_get_option( 'topbar_style' );
		switch ( $topbar_style ) {
			case 2 :
				get_template_part( 'templates/header/topbar', 'style_2' );
				break;
			case 3 :
				get_template_part( 'templates/header/topbar', 'style_3' );
				break;
			default :
				get_template_part( 'templates/header/topbar', 'style_1' );
				break;
		}

		return false;
	}
}