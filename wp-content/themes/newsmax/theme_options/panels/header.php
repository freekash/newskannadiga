<?php
if ( ! function_exists( 'newsmax_ruby_theme_options_header' ) ) {
	function newsmax_ruby_theme_options_header() {
		return array(
			'id'    => 'newsmax_ruby_config_section_header',
			'title' => esc_html__( 'Header Options', 'newsmax' ),
			'desc'  => esc_html__( 'select option for the header.', 'newsmax' ),
			'icon'  => 'el el-th',
		);
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return array
 * header style config
 */
if ( ! function_exists( 'newsmax_ruby_theme_options_header_style' ) ) {
	function newsmax_ruby_theme_options_header_style() {
		return array(
			'id'         => 'newsmax_ruby_config_section_header_style',
			'title'      => esc_html__( 'Header Style Options', 'newsmax' ),
			'desc'       => esc_html__( 'select options for the header.', 'newsmax' ),
			'icon'       => 'el el-th',
			'subsection' => true,
			'fields'     => array(
				//header style
				array(
					'id'     => 'section_start_header_style',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Header Style Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'header_style',
					'type'     => 'select',
					'title'    => esc_html__( 'Header style', 'newsmax' ),
					'subtitle' => esc_html__( 'select a style for the header.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::header_style(),
					'default'  => '1'
				),
				array(
					'id'          => 'banner_background',
					'type'        => 'background',
					'transparent' => false,
					'title'       => esc_html__( 'Banner Background', 'newsmax' ),
					'subtitle'    => esc_html__( 'select a background for the banner (logo and leaderboard area), this option will apply to header style 1,3,6 and 7.', 'newsmax' ),
					'default'     => array(
						'background-color'      => '#ffffff',
						'background-size'       => 'cover',
						'background-attachment' => 'fixed',
						'background-position'   => 'center center',
						'background-repeat'     => 'no-repeat'
					),
					'output'      => '.banner-wrap'
				),
				array(
					'id'       => 'logo_padding',
					'type'     => 'text',
					'required' => array(
						array( 'header_style', '>=', '6' ),
					),
					'title'    => esc_html__( 'Logo Padding', 'newsmax' ),
					'subtitle' => esc_html__( 'input top and bottom padding value for your logo (in px). Default value is 30px.', 'newsmax' ),
					'default'  => ''
				),
				array(
					'id'     => 'section_end_header_style',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return array
 * header topbar configs
 */
if ( ! function_exists( 'newsmax_ruby_theme_options_header_topbar' ) ) {
	function newsmax_ruby_theme_options_header_topbar() {
		return array(
			'id'         => 'newsmax_ruby_config_section_header_topbar',
			'title'      => esc_html__( 'Top Bar Options', 'newsmax' ),
			'desc'       => esc_html__( 'select options for the top bar.', 'newsmax' ),
			'icon'       => 'el el-th',
			'subsection' => true,
			'fields'     => array(
				//topbar configs
				array(
					'id'     => 'section_start_header_topbar',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Top Bar Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'topbar',
					'title'    => esc_html__( 'Top Bar', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable the top bar.', 'newsmax' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'topbar_style',
					'type'     => 'select',
					'title'    => esc_html__( 'Top Bar Style', 'newsmax' ),
					'subtitle' => esc_html__( 'Select a style for the top bar.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::topbar_style(),
					'default'  => '1'
				),
				array(
					'id'       => 'topbar_navigation',
					'title'    => esc_html__( 'Top Bar Navigation', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable navigation at the top bar.', 'newsmax' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'topbar_width',
					'type'     => 'select',
					'title'    => esc_html__( 'Top Bar Width', 'newsmax' ),
					'subtitle' => esc_html__( 'select a width style for the top bar.', 'newsmax' ),
					'options'  => array(
						'0' => esc_html__( 'Has Wrapper', 'newsmax' ),
						'1' => esc_html__( 'Full Width', 'newsmax' ),
					),
					'default'  => 0
				),
				array(
					'id'       => 'topbar_height',
					'type'     => 'text',
					'class'    => 'small-text',
					'title'    => esc_html__( 'Top bar Height', 'newsmax' ),
					'subtitle' => esc_html__( 'select a height value (in px) for the top bar, leave blank if you want to set default (34px).', 'newsmax' ),
					'default'  => ''
				),
				array(
					'id'     => 'section_end_header_topbar',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//topbar elements
				array(
					'id'     => 'section_start_header_topbar_elements',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Top Bar Elements Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'topbar_date',
					'title'    => esc_html__( 'Date Text', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable the date text at the top bar.', 'newsmax' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'topbar_date_format',
					'title'    => esc_html__( 'Date Format', 'newsmax' ),
					'subtitle' => html_entity_decode( esc_html__( 'Input the <a href="https://codex.wordpress.org/Formatting_Date_and_Time">date format</a>', 'newsmax' ) ),
					'type'     => 'text',
					'required' => array( 'topbar_date', '=', 1 ),
					'default'  => ''
				),
				array(
					'id'       => 'topbar_date_js',
					'title'    => esc_html__( 'Javascript Date', 'newsmax' ),
					'subtitle' => esc_html__( 'date ajax. enable this option if you have a plan to use 3rd cache plugins.', 'newsmax' ),
					'type'     => 'switch',
					'required' => array( 'topbar_date', '=', 1 ),
					'default'  => 0
				),
				array(
					'id'       => 'topbar_phone',
					'title'    => esc_html__( 'Phone Number Info', 'newsmax' ),
					'subtitle' => esc_html__( 'input your company phone, Leave blank if you want to remove it.', 'newsmax' ),
					'type'     => 'text',
					'default'  => ''
				),
				array(
					'id'       => 'topbar_email',
					'title'    => esc_html__( 'Email Info', 'newsmax' ),
					'subtitle' => esc_html__( 'input your email info, Leave blank if you want to remove it.', 'newsmax' ),
					'type'     => 'text',
					'default'  => ''
				),
				array(
					'id'       => 'topbar_link_action',
					'title'    => esc_html__( 'Action Links', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable link to send email and call action.', 'newsmax' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'       => 'topbar_shortcode',
					'title'    => esc_html__( 'Shortcodes', 'newsmax' ),
					'subtitle' => esc_html__( 'Input your shortcodes if you want to display 3rd plugin shortcodes on the top bar ie: WPML plugin.', 'newsmax' ),
					'type'     => 'text',
					'default'  => ''
				),
				array(
					'id'       => 'topbar_cart_icon',
					'title'    => esc_html__( 'Cart Icon', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable the small cart icon of Woocommerce at the top bar.', 'newsmax' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'topbar_social',
					'title'    => esc_html__( 'Social Icons', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable social icons at the top bar.', 'newsmax' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'topbar_search',
					'type'     => 'switch',
					'title'    => esc_html__( 'search icon', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable the search icon at the top bar.', 'newsmax' ),
					'default'  => 0
				),
				array(
					'id'     => 'section_end_header_topbar_elements',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			)
		);
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return array
 * header navigation
 */
if ( ! function_exists( 'newsmax_ruby_theme_options_header_navbar' ) ) {
	function newsmax_ruby_theme_options_header_navbar() {
		return array(
			'id'         => 'newsmax_ruby_config_section_header_navbar',
			'title'      => esc_html__( 'Navigation Options', 'newsmax' ),
			'desc'       => esc_html__( 'select options for the main navigation of your website.', 'newsmax' ),
			'icon'       => 'el el-th',
			'subsection' => true,
			'fields'     => array(
				//sticky config
				array(
					'id'     => 'section_start_main_navigation_sticky',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Sticky Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'navbar_sticky',
					'type'     => 'switch',
					'title'    => esc_html__( 'Sticky Navigation', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable the sticky feature for the main navigation.', 'newsmax' ),
					'default'  => 1
				),
				array(
					'id'       => 'navbar_sticky_smart',
					'type'     => 'switch',
					'title'    => esc_html__( 'Smart Sticky', 'newsmax' ),
					'subtitle' => esc_html__( 'only stick the main navigation when scrolling up.', 'newsmax' ),
					'default'  => 0
				),
				array(
					'id'     => 'section_end_main_navigation_sticky',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//element configs
				array(
					'id'     => 'section_start_main_navigation_element',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Navigation Elements Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'navbar_social',
					'type'     => 'switch',
					'title'    => esc_html__( 'Social Icons', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable social icons at the right of the main navigation bar.', 'newsmax' ),
					'default'  => 0
				),
				array(
					'id'       => 'navbar_search',
					'type'     => 'switch',
					'title'    => esc_html__( 'Search Icon', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable the search icon at the right of the main navigation bar.', 'newsmax' ),
					'default'  => 1
				),
				array(
					'id'       => 'navbar_mobile_search',
					'type'     => 'switch',
					'title'    => esc_html__( 'Search Icon on Mobile', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable search icon at the right of the main navigation bar on mobile devices.', 'newsmax' ),
					'default'  => 1
				),
				array(
					'id'     => 'section_end_main_navigation_element',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//small navigation
				array(
					'id'     => 'section_start_navbar_small',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Small Navigation Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'navbar_small',
					'type'     => 'switch',
					'title'    => esc_html__( 'Small Navigation', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable the small navigation at the left of the main navigation bar.', 'newsmax' ),
					'default'  => 1
				),
				array(
					'id'     => 'section_end_navbar_small',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			)
		);
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return array
 * off-canvas configs
 */
if ( ! function_exists( 'newsmax_ruby_theme_options_header_offcanvas' ) ) {
	function newsmax_ruby_theme_options_header_offcanvas() {
		return array(
			'id'         => 'newsmax_ruby_config_section_header_offcanvas',
			'title'      => esc_html__( 'Off-Canvas Options', 'newsmax' ),
			'desc'       => esc_html__( 'select options for the off-canvas section (place to display navigation on mobile devices)', 'newsmax' ),
			'icon'       => 'el el-th',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'     => 'section_start_header_offcanvas',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Off-Canvas Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'off_canvas_style',
					'type'     => 'select',
					'title'    => esc_html__( 'Off-canvas Style', 'newsmax' ),
					'subtitle' => esc_html__( 'select a style for the off-canvas section.', 'newsmax' ),
					'options'  => array(
						'light' => esc_html__( 'Light Style', 'newsmax' ),
						'dark'  => esc_html__( 'Dark Style', 'newsmax' )
					),
					'default'  => 'light'
				),
				array(
					'id'       => 'off_canvas_logo',
					'type'     => 'switch',
					'title'    => esc_html__( 'Off-canvas Logo', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable Off-canvas logo, to upload a logo for Off-canvas section, Navigate to Logo Options.', 'newsmax' ),
					'default'  => 0
				),
				array(
					'id'       => 'off_canvas_search',
					'type'     => 'switch',
					'title'    => esc_html__( 'Off-canvas - Search Form', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable the search form in the off-canvas section.', 'newsmax' ),
					'default'  => 0
				),
				array(
					'id'       => 'off_canvas_social',
					'type'     => 'switch',
					'title'    => esc_html__( 'Off-canvas - Social Icons', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable social icons in the off-canvas section.', 'newsmax' ),
					'default'  => 0
				),
				array(
					'id'       => 'off_canvas_widget_section',
					'type'     => 'switch',
					'title'    => esc_html__( 'Off-canvas - Widgets Section', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable widgets section in Off-canvas section.', 'newsmax' ),
					'default'  => 1
				),
				array(
					'id'     => 'section_end_header_offcanvas',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			)
		);
	}
}