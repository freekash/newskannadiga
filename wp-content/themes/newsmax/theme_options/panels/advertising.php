<?php
if ( ! function_exists( 'newsmax_ruby_theme_options_advertising' ) ) {
	function newsmax_ruby_theme_options_advertising() {
		return array(
			'id'    => 'newsmax_ruby_config_section_advertising',
			'title' => esc_html__( 'Advertising Options', 'newsmax' ),
			'desc'  => esc_html__( 'input your scripts or custom advertising for your website, this panel will support advertising for the header and single post pages.', 'newsmax' ),
			'icon'  => 'el el-graph',
		);
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return array
 * header advertising configs
 */
if ( ! function_exists( 'newsmax_ruby_theme_options_advertising_header' ) ) {
	function newsmax_ruby_theme_options_advertising_header() {
		return array(
			'id'         => 'newsmax_ruby_config_section_header_ad',
			'title'      => esc_html__( 'Header Advertising', 'newsmax' ),
			'desc'       => esc_html__( 'setup your advertising for the header.', 'newsmax' ),
			'icon'       => 'el el-graph',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'     => 'section_start_header_ad',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Header Advertising Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'header_ad_type',
					'type'     => 'select',
					'title'    => esc_html__( 'Header Advertising Type', 'newsmax' ),
					'subtitle' => esc_html__( 'select a advertising type for the header, it will display in the header of your website.', 'newsmax' ),
					'options'  => array(
						'script' => esc_html__( 'Script', 'newsmax' ),
						'custom' => esc_html__( 'Custom Image', 'newsmax' ),
					),
					'default'  => 'script',
				),
				array(
					'id'       => 'header_ad_script',
					'type'     => 'textarea',
					'validate' => 'js',
					'required' => array( 'header_ad_type', '=', 'script' ),
					'title'    => esc_html__( 'Advertising Script', 'newsmax' ),
					'subtitle' => esc_html__( 'input in your advertising code (with "script" tag), The theme will modify Adsense codes to add the responsive feature for all devices.', 'newsmax' ),
				),
				array(
					'id'       => 'header_ad_image',
					'type'     => 'media',
					'required' => array( 'header_ad_type', '=', 'custom' ),
					'title'    => esc_html__( 'Advertising Image', 'newsmax' ),
					'subtitle' => esc_html__( 'upload your banner image (recommended size is 728*90px)', 'newsmax' ),
				),
				array(
					'id'       => 'header_ad_url',
					'type'     => 'text',
					'required' => array( 'header_ad_type', '=', 'custom' ),
					'title'    => esc_html__( 'Advertising URL', 'newsmax' ),
					'subtitle' => esc_html__( 'input your destination URL.', 'newsmax' ),
					'validate' => 'url',
					'default'  => '',
				),
				array(
					'id'     => 'section_end_header_ad',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_header_ad_top',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Top Site Advertising Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'header_ad_top_type',
					'type'     => 'select',
					'title'    => esc_html__( 'Top Site Advertising Type', 'newsmax' ),
					'subtitle' => esc_html__( 'select a advertising type for displaying at the top of your site.', 'newsmax' ),
					'options'  => array(
						'script' => esc_html__( 'Script', 'newsmax' ),
						'custom' => esc_html__( 'Custom Image', 'newsmax' ),
					),
					'default'  => 'script',
				),
				array(
					'id'       => 'header_ad_top_script',
					'type'     => 'textarea',
					'validate' => 'js',
					'required' => array( 'header_ad_top_type', '=', 'script' ),
					'title'    => esc_html__( 'Advertising Code', 'newsmax' ),
					'subtitle' => esc_html__( 'input in your advertising code (with "script" tag), The theme will modify Adsense codes to add the responsive feature for all devices.', 'newsmax' ),
				),
				array(
					'id'       => 'header_ad_top_image',
					'type'     => 'media',
					'required' => array( 'header_ad_top_type', '=', 'custom' ),
					'title'    => esc_html__( 'Advertising Image', 'newsmax' ),
					'subtitle' => esc_html__( 'upload your banner image (recommended size is 1400*300px).', 'newsmax' ),
				),
				array(
					'id'       => 'header_ad_top_url',
					'type'     => 'text',
					'required' => array( 'header_ad_top_type', '=', 'custom' ),
					'title'    => esc_html__( 'Advertising URL', 'newsmax' ),
					'subtitle' => esc_html__( 'input your destination URL.', 'newsmax' ),
					'validate' => 'url',
					'default'  => '',
				),
				array(
					'id'     => 'section_end_header_ad_top',
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
 * single advertising configs
 */
if ( ! function_exists( 'newsmax_ruby_theme_options_advertising_single' ) ) {
	function newsmax_ruby_theme_options_advertising_single() {
		return array(
			'id'         => 'newsmax_ruby_config_section_single_ad',
			'title'      => esc_html__( 'Single Advertising', 'newsmax' ),
			'desc'       => esc_html__( 'setup your advertising for single post pages. Please Note: Features below cannot work properly if you enable infinite load posts.', 'newsmax' ),
			'icon'       => 'el el-graph',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'     => 'section_start_single_ad_top',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Single - Top Content Ad', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'single_ad_top_type',
					'type'     => 'select',
					'title'    => esc_html__( 'Single - Top Content Ad type', 'newsmax' ),
					'subtitle' => esc_html__( 'select a ad type for displaying at the top of post content.', 'newsmax' ),
					'options'  => array(
						'script' => esc_html__( 'Script', 'newsmax' ),
						'custom' => esc_html__( 'Custom Image', 'newsmax' ),
					),
					'default'  => 'script',
				),
				array(
					'id'       => 'single_ad_top_script',
					'type'     => 'textarea',
					'validate' => 'js',
					'required' => array( 'single_ad_top_type', '=', 'script' ),
					'title'    => esc_html__( 'Ad Code', 'newsmax' ),
					'subtitle' => esc_html__( 'input in your ad code (with "script" tag), The theme will modify Adsense codes to add the responsive feature for all devices.', 'newsmax' ),
				),
				array(
					'id'       => 'single_ad_top_size',
					'type'     => 'select',
					'title'    => esc_html__( 'Single - Adsense Size', 'newsmax' ),
					'subtitle' => esc_html__( 'select a size for this ad code. Overridden size will make your adsense responsive.', 'newsmax' ),
					'required' => array( 'single_ad_top_type', '=', 'script' ),
					'options'  => array(
						'1' => esc_html__( 'Overridden Size (728*90)', 'newsmax' ),
						'2' => esc_html__( 'From the Script', 'newsmax' ),
					),
					'default'  => '1',
				),
				array(
					'id'       => 'single_ad_top_image',
					'type'     => 'media',
					'required' => array( 'single_ad_top_type', '=', 'custom' ),
					'title'    => esc_html__( 'Ad Image', 'newsmax' ),
					'subtitle' => esc_html__( 'upload your banner image (recommended size is 728*90px).', 'newsmax' ),
				),
				array(
					'id'       => 'single_ad_top_url',
					'type'     => 'text',
					'required' => array( 'single_ad_top_type', '=', 'custom' ),
					'title'    => esc_html__( 'Ad URL', 'newsmax' ),
					'subtitle' => esc_html__( 'input your destination URL.', 'newsmax' ),
					'validate' => 'url',
					'default'  => '',
				),
				array(
					'id'     => 'section_end_single_ad_top',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_single_ad_bottom',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Single - Bottom Content Ad', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'single_ad_bottom_type',
					'type'     => 'select',
					'title'    => esc_html__( 'Single - Bottom Content Ad type', 'newsmax' ),
					'subtitle' => esc_html__( 'select a ad type for displaying at the bottom of post content.', 'newsmax' ),
					'options'  => array(
						'script' => esc_html__( 'Script', 'newsmax' ),
						'custom' => esc_html__( 'Custom Image', 'newsmax' ),
					),
					'default'  => 'script',
				),
				array(
					'id'       => 'single_ad_bottom_script',
					'type'     => 'textarea',
					'validate' => 'js',
					'required' => array( 'single_ad_bottom_type', '=', 'script' ),
					'title'    => esc_html__( 'Ad Code', 'newsmax' ),
					'subtitle' => esc_html__( 'input in your ad code (with "script" tag), The theme will modify Adsense codes to add the responsive feature for all devices.', 'newsmax' ),
				),
				array(
					'id'       => 'single_ad_bottom_size',
					'type'     => 'select',
					'title'    => esc_html__( 'Single - Adsense Size', 'newsmax' ),
					'subtitle' => esc_html__( 'select a size for this ad code. Overridden size will make your adsense responsive.', 'newsmax' ),
					'required' => array( 'single_ad_bottom_type', '=', 'script' ),
					'options'  => array(
						'1' => esc_html__( 'Overridden Size (728*90)', 'newsmax' ),
						'2' => esc_html__( 'From the Script', 'newsmax' ),
					),
					'default'  => '1',
				),
				array(
					'id'       => 'single_ad_bottom_image',
					'type'     => 'media',
					'required' => array( 'single_ad_bottom_type', '=', 'custom' ),
					'title'    => esc_html__( 'Ad Image', 'newsmax' ),
					'subtitle' => esc_html__( 'upload your banner image (recommended size is 728*90px).', 'newsmax' ),
				),
				array(
					'id'       => 'single_ad_bottom_url',
					'type'     => 'text',
					'required' => array( 'single_ad_bottom_type', '=', 'custom' ),
					'title'    => esc_html__( 'Ad URL', 'newsmax' ),
					'subtitle' => esc_html__( 'input your destination URL.', 'newsmax' ),
					'validate' => 'url',
					'default'  => '',
				),
				array(
					'id'     => 'section_end_single_ad_bottom',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}