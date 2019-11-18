<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * render footer
 */
if ( ! function_exists( 'newsmax_ruby_render_footer' ) ) {
	function newsmax_ruby_render_footer() {
		$footer_style = newsmax_ruby_get_option( 'footer_style' );

		if ( empty( $footer_style ) ) {
			$footer_style = 1;
		}

		//render footer style
		switch ( $footer_style ) {
			case 2 :
				get_template_part( 'templates/footer/style', '2' );
				break;
			case 3 :
				get_template_part( 'templates/footer/style', '3' );
				break;
			default :
				get_template_part( 'templates/footer/style', '1' );
				break;
		}

		return false;
	}
}