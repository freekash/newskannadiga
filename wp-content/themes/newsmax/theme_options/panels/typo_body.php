<?php
if ( ! function_exists( 'newsmax_ruby_theme_options_typography_body' ) ) {
	function newsmax_ruby_theme_options_typography_body() {
		return array(
			'id'         => 'newsmax_ruby_config_section_typo_body',
			'title'      => esc_html__( 'Body Typography', 'newsmax' ),
			'icon'       => 'el el-font',
			'subsection' => true,
			'desc'       => esc_html__( 'select font values for site body. These options will apply to your pages, posts content.', 'newsmax' ),
			'fields'     => array(
				//Body font config
				array(
					'id'     => 'section_start_font_body',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Body Typography Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'             => 'font_body',
					'type'           => 'typography',
					'title'          => esc_html__( 'Body Font', 'newsmax' ),
					'subtitle'       => esc_html__( 'these options will apply to almost content (body and excerpt, p tags) on your website.', 'newsmax' ),
					'desc'           => esc_html__( 'Default [ font-size: 15px | line-height: 25px | font-weight: 400 | color: #282828 ]', 'newsmax' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => true,
					'all_styles'     => true,
					'units'          => 'px',
					'default'        => array(
						'font-family' => 'Lato',
						'google'      => true,
						'font-size'   => '',
						'line-height' => '',
						'font-weight' => '400',
						'color'       => '',
					),
					'output'         => array( 'body', 'p' )
				),
				array(
					'id'             => 'font_body_mobile',
					'type'           => 'typography',
					'title'          => esc_html__( 'Body Font - Mobile Responsive (480px)', 'newsmax' ),
					'subtitle'       => esc_html__( 'select font values for body on mobile devices (screen max-width < 768px). Make sure that you have setup line-height value if you have setup font-size ( usually, line-height = 1.5*font-size).', 'newsmax' ),
					'google'         => false,
					'font-family'    => false,
					'font-backup'    => false,
					'text-align'     => false,
					'color'          => false,
					'text-transform' => false,
					'letter-spacing' => true,
					'line-height'    => true,
					'font-style'     => false,
					'font-weight'    => false,
					'preview'        => false,
					'units'          => 'px',
					'default'        => array(
						'font-size'      => '',
						'line-height'    => '',
						'letter-spacing' => '',
					),
				),
				array(
					'id'     => 'section_end_font_body',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//excerpt font
				array(
					'id'     => 'section_start_font_excerpt',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Post Excerpt Typography Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'             => 'font_excerpt',
					'type'           => 'typography',
					'title'          => esc_html__( 'Post Excerpt Font', 'newsmax' ),
					'subtitle'       => esc_html__( 'select font values for post excerpts. Leave blank if you want to set as the defaults.', 'newsmax' ),
					'desc'           => esc_html__( 'Default [ font-size: 14px | line-height: 20px | font-weight: 400 | color: #777 ]', 'newsmax' ),
					'google'         => false,
					'font-family'    => false,
					'font-backup'    => false,
					'text-align'     => false,
					'color'          => true,
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
						'letter-spacing' => '',
					),
					'output'         => array( '.post-excerpt p' )
				),
				array(
					'id'             => 'font_excerpt_mobile',
					'type'           => 'typography',
					'title'          => esc_html__( 'Post Excerpt Font - Mobile Responsive (480px)', 'newsmax' ),
					'subtitle'       => esc_html__( 'select font values for post excerpts on mobile devices (screen max-width < 768px). Make sure that you have setup line-height value if you have setup font-size ( usually, line-height = 1.5*font-size).', 'newsmax' ),
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
						'letter-spacing' => '',
					),
				),
				array(
					'id'     => 'section_end_font_excerpt',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}
