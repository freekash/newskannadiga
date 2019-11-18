<?php
//typography options
if ( ! function_exists( 'newsmax_ruby_theme_options_typography' ) ) {
	function newsmax_ruby_theme_options_typography() {
		return array(
			'id'    => 'newsmax_ruby_config_section_typo',
			'title' => esc_html__( 'Typography Options', 'newsmax' ),
			'icon'  => 'el el-font',
		);
	}
}