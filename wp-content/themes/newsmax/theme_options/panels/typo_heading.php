<?php
if ( ! function_exists( 'newsmax_ruby_theme_options_typography_heading' ) ) {
	function newsmax_ruby_theme_options_typography_heading() {
		return array(
			'id'         => 'newsmax_ruby_config_section_typo_heading',
			'title'      => esc_html__( 'Block/Widget Header', 'newsmax' ),
			'icon'       => 'el el-font',
			'subsection' => true,
			'desc'       => esc_html__( 'select typography options for block headers and widgets', 'newsmax' ),
			'fields'     => array(
				array(
					'id'     => 'section_start_font_heading_block',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Block Header Typography Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'             => 'font_header_block',
					'type'           => 'typography',
					'title'          => esc_html__( 'Block Header Font', 'newsmax' ),
					'subtitle'       => esc_html__( 'select font values for block headers. These options will apply to all blocks build with "Ruby Composer".', 'newsmax' ),
					'desc'           => esc_html__( 'Default [ font-size: 18px]', 'newsmax' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => false,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'units'          => 'px',
					'default'        => array(
						'font-family'    => 'Poppins',
						'font-size'      => '18px',
						'google'         => true,
						'font-weight'    => '400',
						'text-transform' => 'none'
					),
					'output'         => array(
						'.block-header-wrap',
						'.is-block-header-style-5 .block-header-wrap'
					)
				),
				array(
					'id'       => 'ajax_filter_size',
					'type'     => 'text',
					'class'    => 'small-text',
					'title'    => esc_html__( 'Ajax Filter Font Size', 'newsmax' ),
					'subtitle' => esc_html__( 'select a font size value (in px) for ajax filter links, leave blank if you want to set default (12px).', 'newsmax' ),
					'default'  => ''
				),
				array(
					'id'     => 'section_end_font_heading_block',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//widget heading font
				array(
					'id'     => 'section_start_font_heading_widget',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Widget Header Typography Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'             => 'font_header_widget',
					'type'           => 'typography',
					'title'          => esc_html__( 'Widget Header Font', 'newsmax' ),
					'subtitle'       => esc_html__( 'select font values for widget headers. These options will apply to all widgets.', 'newsmax' ),
					'desc'           => esc_html__( 'Default [ font-size: 16px]', 'newsmax' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => false,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'units'          => 'px',
					'default'        => array(
						'font-family'    => 'Poppins',
						'font-size'      => '16px',
						'google'         => true,
						'font-weight'    => '400',
						'text-transform' => 'none'
					),
					'output'         => array(
						'.widget-title',
						' .is-block-header-style-5 .widget-title.block-title'
					)
				),
				array(
					'id'     => 'section_end_font_heading_widget',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}

/**
 * @return array
 * h tags font
 */
if ( ! function_exists( 'newsmax_ruby_theme_options_typography_h_tag' ) ) {
	function newsmax_ruby_theme_options_typography_h_tag() {
		return array(
			'id'         => 'newsmax_ruby_config_section_typo_h_tag',
			'title'      => esc_html__( 'H1 to H6 Typography', 'newsmax' ),
			'icon'       => 'el el-font',
			'subsection' => true,
			'desc'       => esc_html__( 'Select font values for H1 to H6 tags.', 'newsmax' ),
			'fields'     => array(
				//H1 font
				array(
					'id'     => 'section_start_font_h1_tag',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'H1 Typography Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'             => 'font_tag_h1',
					'type'           => 'typography',
					'title'          => esc_html__( 'H1 Font', 'newsmax' ),
					'subtitle'       => esc_html__( 'select font value for H1 tag.', 'newsmax' ),
					'desc'           => esc_html__( 'Default [ font-size: 36px | line-height: 38px | letter-spacing: -0.9px | color: #ff4545 ]', 'newsmax' ),
					'google'         => true,
					'font-family'    => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'font-style'     => true,
					'font-weight'    => true,
					'line-height'    => true,
					'font-size'      => true,
					'units'          => 'px',
					'default'        => array(
						'google'      => true,
						'font-family' => 'Poppins',
						'font-size'   => '',
						'line-height' => '',
						'font-weight' => 700
					),
					'output'         => array( '.entry h1' )
				),
				array(
					'id'             => 'font_tag_h1_mobile',
					'type'           => 'typography',
					'title'          => esc_html__( 'H1 Font - Mobile Responsive (480px)', 'newsmax' ),
					'subtitle'       => esc_html__( 'select font values for H1 tag on mobile devices (screen max-width < 768px).', 'newsmax' ),
					'google'         => false,
					'font-family'    => false,
					'font-backup'    => false,
					'text-align'     => false,
					'color'          => false,
					'text-transform' => false,
					'letter-spacing' => true,
					'line-height'    => true,
					'preview'        => false,
					'font-style'     => false,
					'font-weight'    => false,
					'units'          => 'px',
					'default'        => array(
						'font-size'      => '',
						'line-height'    => '',
						'letter-spacing' => ''
					)
				),
				array(
					'id'     => 'section_end_font_h1_tag',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//H2 font
				array(
					'id'     => 'section_start_font_h2_tag',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'H2 Typography Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'             => 'font_tag_h2',
					'type'           => 'typography',
					'title'          => esc_html__( 'H2 Font', 'newsmax' ),
					'subtitle'       => esc_html__( 'select font value for H2 tag.', 'newsmax' ),
					'desc'           => esc_html__( 'Default [ font-size: 28px | line-height: 30px | letter-spacing: -0.6px ]', 'newsmax' ),
					'google'         => true,
					'font-family'    => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'font-style'     => true,
					'font-weight'    => true,
					'line-height'    => true,
					'font-size'      => true,
					'units'          => 'px',
					'default'        => array(
						'google'      => true,
						'font-family' => 'Poppins',
						'font-size'   => '',
						'line-height' => '',
						'font-weight' => 700
					),
					'output'         => array( '.entry h2' )
				),
				array(
					'id'             => 'font_tag_h2_mobile',
					'type'           => 'typography',
					'title'          => esc_html__( 'H2 Font - Mobile Responsive (480px)', 'newsmax' ),
					'subtitle'       => esc_html__( 'select font values for H2 tag on mobile devices (screen max-width < 768px).', 'newsmax' ),
					'google'         => false,
					'font-family'    => false,
					'font-backup'    => false,
					'text-align'     => false,
					'color'          => false,
					'text-transform' => false,
					'letter-spacing' => true,
					'line-height'    => true,
					'preview'        => false,
					'font-style'     => false,
					'font-weight'    => false,
					'units'          => 'px',
					'default'        => array(
						'font-size'      => '',
						'line-height'    => '',
						'letter-spacing' => ''
					)
				),
				array(
					'id'     => 'section_end_font_h2_tag',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//H3 font
				array(
					'id'     => 'section_start_font_h3_tag',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'H3 Typography Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'             => 'font_tag_h3',
					'type'           => 'typography',
					'title'          => esc_html__( 'H3 Font', 'newsmax' ),
					'subtitle'       => esc_html__( 'select font value for H3 tag.', 'newsmax' ),
					'desc'           => esc_html__( 'Default [ font-size: 18px | line-height: 22px | letter-spacing: -0.4px ]', 'newsmax' ),
					'google'         => true,
					'font-family'    => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'font-style'     => true,
					'font-weight'    => true,
					'line-height'    => true,
					'font-size'      => true,
					'units'          => 'px',
					'default'        => array(
						'google'      => true,
						'font-family' => 'Poppins',
						'font-size'   => '',
						'line-height' => '',
						'font-weight' => 700
					),
					'output'         => array( '.entry h3' )
				),
				array(
					'id'             => 'font_tag_h3_mobile',
					'type'           => 'typography',
					'title'          => esc_html__( 'H3 Font - Mobile Responsive (480px)', 'newsmax' ),
					'subtitle'       => esc_html__( 'select font values for H3 on mobile devices (screen max-width < 768px).', 'newsmax' ),
					'google'         => false,
					'font-family'    => false,
					'font-backup'    => false,
					'text-align'     => false,
					'color'          => false,
					'text-transform' => false,
					'letter-spacing' => true,
					'line-height'    => true,
					'preview'        => false,
					'font-style'     => false,
					'font-weight'    => false,
					'units'          => 'px',
					'default'        => array(
						'font-size'      => '',
						'line-height'    => '',
						'letter-spacing' => ''
					)
				),
				array(
					'id'     => 'section_end_font_h3_tag',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//H4 font
				array(
					'id'     => 'section_start_font_h4_tag',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'H4 Typography Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'             => 'font_tag_h4',
					'type'           => 'typography',
					'title'          => esc_html__( 'H4 Font', 'newsmax' ),
					'subtitle'       => esc_html__( 'select font value for H4 tag.', 'newsmax' ),
					'desc'           => esc_html__( 'Default [ font-size: 16px | line-height: 20px | font-weight: 700 ]', 'newsmax' ),
					'google'         => true,
					'font-family'    => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'font-style'     => true,
					'font-weight'    => true,
					'line-height'    => true,
					'font-size'      => true,
					'units'          => 'px',
					'default'        => array(
						'google'      => true,
						'font-family' => 'Poppins',
						'font-size'   => '',
						'line-height' => '',
						'font-weight' => 700
					),
					'output'         => array( '.entry h4' )
				),
				array(
					'id'             => 'font_tag_h4_mobile',
					'type'           => 'typography',
					'title'          => esc_html__( 'H4 Font - Mobile Responsive (480px)', 'newsmax' ),
					'subtitle'       => esc_html__( 'select font values for H4 on mobile devices (screen max-width < 768px).', 'newsmax' ),
					'google'         => false,
					'font-family'    => false,
					'font-backup'    => false,
					'text-align'     => false,
					'color'          => false,
					'text-transform' => false,
					'letter-spacing' => true,
					'line-height'    => true,
					'preview'        => false,
					'font-style'     => false,
					'font-weight'    => false,
					'units'          => 'px',
					'default'        => array(
						'font-size'      => '',
						'line-height'    => '',
						'letter-spacing' => ''
					)
				),
				array(
					'id'     => 'section_end_font_h4_tag',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//H5 font
				array(
					'id'     => 'section_start_font_h5_tag',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'H5 Typography Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'             => 'font_tag_h5',
					'type'           => 'typography',
					'title'          => esc_html__( 'H5 Font', 'newsmax' ),
					'subtitle'       => esc_html__( 'select font value for H5 tag.', 'newsmax' ),
					'desc'           => esc_html__( 'Default [ font-size: 16px | line-height: 20px | font-weight: 700 ]', 'newsmax' ),
					'google'         => true,
					'font-family'    => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'font-style'     => true,
					'font-weight'    => true,
					'line-height'    => true,
					'font-size'      => true,
					'units'          => 'px',
					'default'        => array(
						'google'      => true,
						'font-family' => 'Poppins',
						'font-size'   => '',
						'line-height' => '',
						'font-weight' => 700
					),
					'output'         => array( '.entry h5' )
				),
				array(
					'id'             => 'font_tag_h5_mobile',
					'type'           => 'typography',
					'title'          => esc_html__( 'H5 Font - Mobile Responsive (480px)', 'newsmax' ),
					'subtitle'       => esc_html__( 'select font values for H5 on mobile devices (screen max-width < 768px).', 'newsmax' ),
					'google'         => false,
					'font-family'    => false,
					'font-backup'    => false,
					'text-align'     => false,
					'color'          => false,
					'text-transform' => false,
					'letter-spacing' => true,
					'line-height'    => true,
					'preview'        => false,
					'font-style'     => false,
					'font-weight'    => false,
					'units'          => 'px',
					'default'        => array(
						'font-size'      => '',
						'line-height'    => '',
						'letter-spacing' => ''
					)
				),
				array(
					'id'     => 'section_end_font_h5_tag',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//H6 font
				array(
					'id'     => 'section_start_font_h6_tag',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'H6 Typography Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'             => 'font_tag_h6',
					'type'           => 'typography',
					'title'          => esc_html__( 'H6 Font', 'newsmax' ),
					'subtitle'       => esc_html__( 'select font value for H6 tag.', 'newsmax' ),
					'desc'           => esc_html__( 'Default [ font-size: 14px | line-height: 19px | font-weight: 700 ]', 'newsmax' ),
					'google'         => true,
					'font-family'    => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'font-style'     => true,
					'font-weight'    => true,
					'line-height'    => true,
					'font-size'      => true,
					'units'          => 'px',
					'default'        => array(
						'google'      => true,
						'font-family' => 'Poppins',
						'font-size'   => '',
						'line-height' => '',
						'font-weight' => 700,
					),
					'output'         => array( '.entry h6' )
				),
				array(
					'id'             => 'font_tag_h6_mobile',
					'type'           => 'typography',
					'title'          => esc_html__( 'H6 Font - Mobile Responsive (480px)', 'newsmax' ),
					'subtitle'       => esc_html__( 'select font values for H6 on mobile devices (screen max-width < 768px).', 'newsmax' ),
					'google'         => false,
					'font-family'    => false,
					'font-backup'    => false,
					'text-align'     => false,
					'color'          => false,
					'text-transform' => false,
					'letter-spacing' => true,
					'line-height'    => true,
					'preview'        => false,
					'font-style'     => false,
					'font-weight'    => false,
					'units'          => 'px',
					'default'        => array(
						'font-size'      => '',
						'line-height'    => '',
						'letter-spacing' => ''
					)
				),
				array(
					'id'     => 'section_end_font_h6_tag',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//padding
				array(
					'id'     => 'section_start_htag_padding',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'H tags Padding Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'htag_padding_top',
					'type'     => 'text',
					'title'    => esc_html__( 'H tags - Top Padding', 'newsmax' ),
					'subtitle' => esc_html__( 'input the top padding value (in px) for H tags. Default is 0.', 'newsmax' ),
					'class'    => 'small-text',
					'default'  => ''
				),
				array(
					'id'       => 'htag_padding_bottom',
					'type'     => 'text',
					'title'    => esc_html__( 'H tags - Bottom Padding', 'newsmax' ),
					'subtitle' => esc_html__( 'input the bottom padding value (in px) for H tags. Default is 0.', 'newsmax' ),
					'class'    => 'small-text',
					'default'  => ''
				),
				array(
					'id'     => 'section_end_htag_padding',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			)
		);
	}
}