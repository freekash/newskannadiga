<?php
if ( ! function_exists( 'newsmax_ruby_theme_options_typography_navigation' ) ) {
	function newsmax_ruby_theme_options_typography_navigation() {
		return array(
			'id'         => 'newsmax_ruby_config_section_typo_navigation',
			'title'      => esc_html__( 'Navigation Typography', 'newsmax' ),
			'desc'       => esc_html__( 'select font values for navigation of your website.', 'newsmax' ),
			'icon'       => 'el el-font',
			'subsection' => true,
			'fields'     => array(
				//navigation font
				array(
					'id'     => 'section_start_font_navbar',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Navigation Typography Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'             => 'font_navbar',
					'type'           => 'typography',
					'title'          => esc_html__( 'Main Navigation Font', 'newsmax' ),
					'subtitle'       => esc_html__( 'select font values for the main navigation.', 'newsmax' ),
					'desc'           => esc_html__( 'Default [ font-size: 14px | font-weight: 500 ]', 'newsmax' ),
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
						'font-size'      => '',
						'font-weight'    => '500',
						'text-transform' => 'uppercase'
					),
					'output'         => array(
						'.main-menu-inner > li > a',
					)
				),
				array(
					'id'             => 'font_navbar_sub',
					'type'           => 'typography',
					'title'          => esc_html__( 'Main Navigation Submenu Font', 'newsmax' ),
					'subtitle'       => esc_html__( 'select font values for submenu of the main navigation.', 'newsmax' ),
					'desc'           => esc_html__( 'Default [ font-size: 13px | font-weight: 400 ]', 'newsmax' ),
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
						'font-size'      => '',
						'font-weight'    => '400',
						'text-transform' => 'capitalize'
					),
					'output'         => array(
						'.navbar-wrap .is-sub-default',
					)
				),
				array(
					'id'     => 'section_end_font_navbar',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//topbar font
				array(
					'id'     => 'section_start_font_topbar',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Top Bar Typography Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'             => 'font_topbar',
					'type'           => 'typography',
					'title'          => esc_html__( 'Top Bar Font', 'newsmax' ),
					'subtitle'       => esc_html__( 'select font values for the top bar.', 'newsmax' ),
					'desc'           => esc_html__( 'Default [ font-size: 12px | font-weight: 300 ]', 'newsmax' ),
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
						'font-size'      => '',
						'google'         => true,
						'font-weight'    => '300',
						'text-transform' => 'capitalize'
					),
					'output'         => array(
						'.topbar-wrap',
					)
				),
				array(
					'id'     => 'section_end_font_topbar',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//off-canvas font
				array(
					'id'     => 'section_start_font_off_canvas',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Off-Canvas Typography Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'             => 'font_menu_off_canvas',
					'type'           => 'typography',
					'title'          => esc_html__( 'Off-Canvas Navigation Font', 'newsmax' ),
					'subtitle'       => esc_html__( 'select font values for the off-canvas navigation, This is navigation display on mobile devices.', 'newsmax' ),
					'desc'           => esc_html__( 'Default [ font-size: 12px | font-weight: 500 ]', 'newsmax' ),
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
						'font-size'      => '',
						'google'         => true,
						'font-weight'    => '500',
						'text-transform' => 'uppercase'
					),
					'output'         => array(
						'.off-canvas-nav-wrap',
					)
				),
				array(
					'id'             => 'font_submenu_off_canvas',
					'type'           => 'typography',
					'title'          => esc_html__( 'Off-Canvas Navigation Submenu Font', 'newsmax' ),
					'subtitle'       => esc_html__( 'Select font values for the off-canvas submenu.', 'newsmax' ),
					'desc'           => esc_html__( 'Default [ font-size: 11px | font-weight: 500 ]', 'newsmax' ),
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
						'font-size'      => '',
						'google'         => true,
						'font-weight'    => '500',
						'text-transform' => 'uppercase'
					),
					'output'         => array(
						'.off-canvas-nav-wrap .sub-menu a',
					)
				),
				array(
					'id'     => 'section_end_font_off_canvas',
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
 * logo font
 */
if ( ! function_exists( 'newsmax_ruby_theme_options_typography_logo' ) ) {
	function newsmax_ruby_theme_options_typography_logo() {
		return array(
			'id'         => 'newsmax_ruby_config_section_typo_logo',
			'title'      => esc_html__( 'Logo Typography', 'newsmax' ),
			'desc'       => esc_html__( 'select font values for text logo of your website. These options will only apply to text logo', 'newsmax' ),
			'icon'       => 'el el-font',
			'subsection' => true,
			'fields'     => array(

				//logo font
				array(
					'id'     => 'section_start_font_logo',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Text Logo Typography Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'             => 'font_logo_text',
					'type'           => 'typography',
					'title'          => esc_html__( 'Logo Text Font', 'newsmax' ),
					'subtitle'       => esc_html__( 'select font values for the logo text if you use a logo text.', 'newsmax' ),
					'desc'           => esc_html__( 'Default [ font-size: 40px | color: #282828 | letter-spacing: -1px ]', 'newsmax' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'units'          => 'px',
					'default'        => array(
						'font-family'    => 'Poppins',
						'font-size'      => '',
						'google'         => true,
						'font-weight'    => '700',
						'letter-spacing' => '',
					),
					'output'         => array(
						'.logo-wrap.is-logo-text .logo-title',
						'.off-canvas-logo-wrap.is-logo-text .logo-text'
					)
				),
				array(
					'id'             => 'font_logo_tagline',
					'type'           => 'typography',
					'title'          => esc_html__( 'Logo Tagline Font', 'newsmax' ),
					'subtitle'       => esc_html__( 'select font values for logo tagline.', 'newsmax' ),
					'desc'           => esc_html__( 'Default [ font-size: 15px | line-height: 24px | font-weight: 400 | color: #aaa ]', 'newsmax' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'units'          => 'px',
					'default'        => array(
						'font-family'    => 'Poppins',
						'font-size'      => '',
						'line-height'    => '',
						'letter-spacing' => '',
						'font-weight'    => '400'
					),
					'output'         => array( '.site-tagline' )
				),
				array(
					'id'             => 'font_logo_text_mobile',
					'type'           => 'typography',
					'title'          => esc_html__( 'Mobile - Text Logo Font', 'newsmax' ),
					'subtitle'       => esc_html__( 'select font values for the mobile text logo if you use a mobile text logo.', 'newsmax' ),
					'desc'           => esc_html__( 'Default [ font-size: 28px | letter-spacing: -1px ]', 'newsmax' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'units'          => 'px',
					'default'        => array(
						'font-family'    => 'Poppins',
						'font-size'      => '',
						'google'         => true,
						'font-weight'    => '',
						'letter-spacing' => '',
						'text-transform' => 'uppercase'
					),
					'output'         => array(
						'.logo-mobile-wrap .logo-text',
					)
				),
				array(
					'id'     => 'section_end_font_logo',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}
