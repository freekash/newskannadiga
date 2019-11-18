<?php
///amp_init
if ( ! function_exists( 'newsmax_ruby_theme_options_amp' ) ) {
	function newsmax_ruby_theme_options_amp() {
		return array(
			'id'     => 'newsmax_ruby_config_section_amp',
			'title'  => esc_html__( 'AMP Options', 'newsmax' ),
			'desc'   => html_entity_decode( esc_html__( 'Accelerated Mobile Pages support, This section requests to install the <a href="https://wordpress.org/plugins/amp/">Automattic AMP</a> plugin first.', 'newsmax' ) ),
			'icon'   => 'el el-road',
			'class'  => 'section-amp',
			'fields' => newsmax_ruby_theme_options_amp_config()
		);
	}
};

//amp config
if ( ! function_exists( 'newsmax_ruby_theme_options_amp_config' ) ) {
	function newsmax_ruby_theme_options_amp_config() {
		$amp_fields = array();

		if ( function_exists( 'amp_init' ) ) {
			$amp_fields = array(
				array(
					'id'     => 'section_start_amp_logo',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'AMP - Logo Option', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'amp_logo',
					'type'     => 'media',
					'title'    => esc_html__( 'Logo Upload', 'newsmax' ),
					'subtitle' => esc_html__( 'upload your AMP logo, allowed extensions are .jpg, .png and .gif.', 'newsmax' )
				),
				array(
					'id'     => 'section_end_logo',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_amp_footer',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'AMP Footer Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'amp_back_top',
					'type'     => 'switch',
					'title'    => esc_html__( 'Back to Top', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable back to top button', 'newsmax' )
				),
				array(
					'id'       => 'amp_footer_logo',
					'type'     => 'media',
					'title'    => esc_html__( 'Footer Logo', 'newsmax' ),
					'subtitle' => esc_html__( 'upload your AMP footer logo, allowed extensions are .jpg, .png and .gif.', 'newsmax' )
				),
				array(
					'id'       => 'amp_footer_menu',
					'type'     => 'select',
					'data'     => 'menu',
					'title'    => esc_html__( 'Footer Menu', 'newsmax' ),
					'subtitle' => esc_html__( 'select footer menu for AMP pages.', 'newsmax' )
				),
				array(
					'id'       => 'amp_copyright_text',
					'type'     => 'textarea',
					'title'    => esc_html__( 'Copyright Text', 'newsmax' ),
					'subtitle' => esc_html__( 'input your copyright text for AMP pages.', 'newsmax' )
				),
				array(
					'id'     => 'section_end_amp_footer',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_amp_color',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'AMP Color Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'          => 'amp_bg_body',
					'title'       => esc_html__( 'Body Background', 'newsmax' ),
					'subtitle'    => esc_html__( 'select background color for the body of AMP pages.', 'newsmax' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'          => 'amp_body_color',
					'title'       => esc_html__( 'Body Text Color', 'newsmax' ),
					'subtitle'    => esc_html__( 'select color for the body text of AMP pages.', 'newsmax' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'          => 'amp_header_bg',
					'title'       => esc_html__( 'Header Background', 'newsmax' ),
					'subtitle'    => esc_html__( 'select background color for the header of AMP pages.', 'newsmax' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'          => 'amp_title_color',
					'title'       => esc_html__( 'Title Color', 'newsmax' ),
					'subtitle'    => esc_html__( 'select color for the headline of AMP pages.', 'newsmax' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'          => 'amp_meta_color',
					'title'       => esc_html__( 'Meta Info Color', 'newsmax' ),
					'subtitle'    => esc_html__( 'select color for the meta tags of AMP pages.', 'newsmax' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'          => 'amp_link_color',
					'title'       => esc_html__( 'Hyperlink Color', 'newsmax' ),
					'subtitle'    => esc_html__( 'select color for hyperlinks of AMP pages.', 'newsmax' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'          => 'amp_footer_bg',
					'title'       => esc_html__( 'Footer Background', 'newsmax' ),
					'subtitle'    => esc_html__( 'select footer background color for AMP pages.', 'newsmax' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'          => 'amp_footer_color',
					'title'       => esc_html__( 'Footer Color', 'newsmax' ),
					'subtitle'    => esc_html__( 'select footer color for AMP pages.', 'newsmax' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'     => 'section_end_amp_color',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),

			);
		};

		return $amp_fields;
	}
}

