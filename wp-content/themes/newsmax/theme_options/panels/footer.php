<?php

if ( ! function_exists( 'newsmax_ruby_theme_options_footer' ) ) {
	function newsmax_ruby_theme_options_footer() {
		return array(
			'id'     => 'newsmax_ruby_config_section_footer',
			'title'  => esc_html__( 'Footer Options', 'newsmax' ),
			'desc'   => esc_html__( 'Select options for the footer.', 'newsmax' ),
			'icon'   => 'el el-th',
			'fields' => array(

				array(
					'id'     => 'section_start_footer_style',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Footer Style Options', 'newsmax' ),
					'indent' => true,
				),
				array(
					'id'       => 'footer_style',
					'type'     => 'select',
					'title'    => esc_html__( 'Footer Style', 'newsmax' ),
					'subtitle' => esc_html__( 'select a style for the footer.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::footer_style(),
					'default'  => '1'
				),
				array(
					'id'          => 'footer_background',
					'type'        => 'background',
					'transparent' => false,
					'title'       => esc_html__( 'Footer Background', 'newsmax' ),
					'subtitle'    => esc_html__( 'select a background for the footer: image, color, etc', 'newsmax' ),
					'default'     => array(
						'background-color'      => '#282828',
						'background-size'       => 'cover',
						'background-attachment' => 'fixed',
						'background-position'   => 'center center',
						'background-repeat'     => 'no-repeat'
					),
					'output'      => array( '.footer-inner' )
				),
				array(
					'id'       => 'footer_text_style',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Footer Text Style', 'newsmax' ),
					'subtitle' => esc_html__( 'Select a color style for footer text.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::text_style(),
					'default'  => 'is-light-text'
				),
				array(
					'id'       => 'footer_wrapper',
					'type'     => 'select',
					'title'    => esc_html__( 'Footer Wrapper Mode', 'newsmax' ),
					'subtitle' => esc_html__( 'select wrapper for the footer.', 'newsmax' ),
					'options'  => array(
						0 => esc_html__( 'Has Wrapper', 'newsmax' ),
						1 => esc_html__( 'Full Width', 'newsmax' ),
					),
					'default'  => 0
				),
				array(
					'id'     => 'section_end_meta_footer_style',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				),
				//footer social bar config
				array(
					'id'     => 'section_start_footer_social',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Footer Social Bar Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'footer_logo',
					'type'     => 'media',
					'title'    => esc_html__( 'Footer Logo', 'newsmax' ),
					'subtitle' => esc_html__( 'Upload your footer logo.', 'newsmax' )
				),
				array(
					'id'       => 'footer_about_us',
					'type'     => 'textarea',
					'validate' => 'html',
					'title'    => esc_html__( 'Footer - About Us', 'newsmax' ),
					'subtitle' => esc_html__( 'input a short paragraph about your website allowed HTML code.', 'newsmax' ),
					'default'  => ''
				),
				array(
					'id'       => 'footer_social',
					'type'     => 'switch',
					'title'    => esc_html__( 'Footer - Social Bar', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable the footer social bar.', 'newsmax' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'footer_social_color',
					'title'    => esc_html__( 'Footer - Social Bar Color', 'newsmax' ),
					'subtitle' => esc_html__( 'select a color style for social icons at the footer.', 'newsmax' ),
					'type'     => 'select',
					'options'  => array(
						'color' => esc_html__( 'Color', 'newsmax' ),
						'dark'  => esc_html__( 'Dark', 'newsmax' ),
						'light' => esc_html__( 'Light', 'newsmax' ),
					),
					'default'  => 'color'
				),
				array(
					'id'     => 'section_end_footer_bar',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//footer copyright config
				array(
					'id'     => 'section_start_footer_copyright',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Copyright Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'footer_copyright',
					'type'     => 'text',
					'title'    => esc_html__( 'Copyright Text', 'newsmax' ),
					'subtitle' => esc_html__( 'input your copyright text or HTML.', 'newsmax' ),
					'default'  => '',
				),
				array(
					'id'          => 'footer_copyright_bg',
					'title'       => esc_html__( 'Copyright Background', 'newsmax' ),
					'subtitle'    => esc_html__( 'Select a background color for the copyright area.', 'newsmax' ),
					'type'        => 'color',
					'validate'    => 'color',
					'transparent' => false,
					'default'     => ''
				),
				array(
					'id'          => 'footer_copyright_color',
					'title'       => esc_html__( 'Copyright Text Color', 'newsmax' ),
					'subtitle'    => esc_html__( 'select a color for the footer copyright text.', 'newsmax' ),
					'type'        => 'color',
					'validate'    => 'color',
					'transparent' => false,
					'default'     => ''
				),
				array(
					'id'       => 'copyright_social',
					'type'     => 'switch',
					'title'    => esc_html__( 'Copyright - Social Bar', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable the the copyright bar.', 'newsmax' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'copyright_social_color',
					'title'    => esc_html__( 'Copyright - Social Bar Color', 'newsmax' ),
					'subtitle' => esc_html__( 'select a color style for social icons at the copyright bar.', 'newsmax' ),
					'type'     => 'select',
					'options'  => array(
						'color' => esc_html__( 'Color', 'newsmax' ),
						'dark'  => esc_html__( 'Dark', 'newsmax' ),
						'light' => esc_html__( 'Light', 'newsmax' ),
					),
					'default'  => 'dark'
				),
				array(
					'id'       => 'footer_copyright_font_size',
					'type'     => 'text',
					'class'    => 'small-text',
					'title'    => esc_html__( 'Copyright Text Size', 'newsmax' ),
					'subtitle' => esc_html__( 'select a font size value for copyright text. Leave blank if you want to set as default (13px).', 'newsmax' ),
					'default'  => '',
				),
				array(
					'id'     => 'section_end_footer_copyright',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}
