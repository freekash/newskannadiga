<?php
//custom script tab config
if ( ! function_exists( 'newsmax_ruby_theme_options_custom_css' ) ) {
	function newsmax_ruby_theme_options_custom_css() {
		return array(
			'id'     => 'newsmax_ruby_theme_ops_section_custom_code',
			'title'  => esc_html__( 'CSS Code', 'newsmax' ),
			'icon'   => 'el el-css',
			'desc'   => esc_html__( 'Custom CSS will be added at end of all other customizations and this can be used to overwrite rules.', 'newsmax' ),
			'fields' => array(
				array(
					'id'       => 'custom_css',
					'type'     => 'ace_editor',
					'title'    => esc_html__( 'CSS Code', 'newsmax' ),
					'subtitle' => esc_html__( 'enter your CSS code here.', 'newsmax' ),
					'mode'     => 'css',
					'theme'    => 'monokai',
					'options'  => array(
						'minLines' => 20
					),
					'default'  => ''
				),
			),
		);
	}
}

