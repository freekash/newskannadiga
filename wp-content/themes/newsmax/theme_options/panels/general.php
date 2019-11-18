<?php
/**
 * this is general config
 */
if ( ! function_exists( 'newsmax_ruby_theme_options_general' ) ) {
	function newsmax_ruby_theme_options_general() {
		return array(
			'id'     => 'newsmax_ruby_config_section_general',
			'title'  => esc_html__( 'General Options', 'newsmax' ),
			'desc'   => esc_html__( 'Select general options for your website.', 'newsmax' ),
			'icon'   => 'el el-icon-globe',
			'fields' => array(
				//Site width section config
				array(
					'id'     => 'section_start_site_width',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Site Layout Options', 'newsmax' ),
					'indent' => true,
				),
				array(
					'id'       => 'site_layout',
					'type'     => 'select',
					'title'    => esc_html__( 'Main Site Layout', 'newsmax' ),
					'subtitle' => esc_html__( 'Select a layout for your site.', 'newsmax' ),
					'options'  => array(
						'full_width' => esc_html__( 'Full Width', 'newsmax' ),
						'boxed'      => esc_html__( 'Boxed', 'newsmax' )
					),
					'default'  => 'full_width'
				),
				array(
					'id'          => 'site_background',
					'type'        => 'background',
					'transparent' => false,
					'title'       => esc_html__( 'Site Background', 'newsmax' ),
					'subtitle'    => esc_html__( 'Site background with image, color, etc', 'newsmax' ),
					'required'    => array( 'site_layout', '=', 'boxed' ),
					'default'     => array(
						'background-color'      => '#fafafa',
						'background-size'       => 'cover',
						'background-attachment' => 'fixed',
						'background-position'   => 'left top',
						'background-repeat'     => 'no-repeat'
					),
					'output'      => array( 'body' ),
				),
				array(
					'id'       => 'site_padding',
					'type'     => 'text',
					'class'    => 'small-text',
					'required' => array( 'site_layout', '=', 'boxed' ),
					'title'    => esc_html__( 'Site Top/Bottom Padding', 'newsmax' ),
					'subtitle' => esc_html__( 'input a padding top/bottom value for the site body. Leave blank if you want to set as the default.', 'newsmax' ),
					'default'  => ''
				),
				array(
					'id'     => 'section_end_site_width',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//site animation config
				array(
					'id'     => 'section_start_smooth_style',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Animation Options', 'newsmax' ),
					'indent' => true,
				),
				array(
					'id'       => 'site_smooth_scroll',
					'type'     => 'switch',
					'title'    => esc_html__( 'Smooth Scroll', 'newsmax' ),
					'subtitle' => esc_html__( 'Smooth scrolling with the mouse wheel in all browsers.', 'newsmax' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'site_smooth_display',
					'type'     => 'switch',
					'title'    => esc_html__( 'Smooth Display', 'newsmax' ),
					'subtitle' => esc_html__( 'Adding animation to display featured images when scrolling down.', 'newsmax' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'site_smooth_display_style',
					'type'     => 'select',
					'title'    => esc_html__( 'Animation Style', 'newsmax' ),
					'required' => array( 'site_smooth_display', '=', '1' ),
					'subtitle' => esc_html__( 'select animation style for the smooth display feature.', 'newsmax' ),
					'options'  => array(
						'ruby-fade'   => esc_html__( 'Fade In', 'newsmax' ),
						'ruby-zoom'   => esc_html__( 'Zoom In', 'newsmax' ),
						'ruby-bottom' => esc_html__( 'Fade Form Bottom', 'newsmax' )
					),
					'default'  => 'ruby-fade'
				),
				array(
					'id'     => 'section_end_smooth_style',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				),
				//slider config
				array(
					'id'     => 'section_start_site_slider',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Slider Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'slider_autoplay',
					'type'     => 'switch',
					'title'    => esc_html__( 'Slider Autoplay', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable autoplay for all slider in your website.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'slider_play_speed',
					'type'     => 'text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'Slider Play Speed', 'newsmax' ),
					'subtitle' => esc_html__( 'select slider play speed in milliseconds (default is 5500).', 'newsmax' ),
					'default'  => ''
				),
				array(
					'id'     => 'section_end_site_slider',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//Miscellaneous section config
				array(
					'id'     => 'section_start_bookmarklet',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Bookmarklet Icon Options', 'newsmax' ),
					'indent' => true,
				),
				array(
					'id'       => 'icon_touch_apple',
					'type'     => 'media',
					'title'    => esc_html__( 'iOS Bookmarklet Icon', 'newsmax' ),
					'subtitle' => esc_html__( 'Upload icon for the Apple touch (72 x 72px), allowed extensions are .jpg, .png, .gif', 'newsmax' ),
					'desc'     => esc_html__( '72 x 72px', 'newsmax' )
				),
				array(
					'id'       => 'icon_touch_metro',
					'type'     => 'media',
					'title'    => esc_html__( 'Metro UI Bookmarklet Icon', 'newsmax' ),
					'subtitle' => esc_html__( 'Upload icon for the Metro interface (144 x 144px), allowed extensions are .jpg, .png, .gif', 'newsmax' ),
					'desc'     => esc_html__( '144 x 144px', 'newsmax' )
				),
				array(
					'id'     => 'section_end_bookmarklet',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				),
				//breadcrumb config
				array(
					'id'     => 'section_start_breadcrumb',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Breadcrumb Options', 'newsmax' ),
					'indent' => true,
				),
				array(
					'id'       => 'site_breadcrumb',
					'type'     => 'switch',
					'title'    => esc_html__( 'Breadcrumbs bar', 'newsmax' ),
					'subtitle' => esc_html__( 'Breadcrumbs are a hierarchy of links displayed below the main navigation.', 'newsmax' ),
					'default'  => 1,
				),
				array(
					'id'       => 'site_breadcrumb_current',
					'type'     => 'switch',
					'required' => array( 'site_breadcrumb', '=', '1' ),
					'title'    => esc_html__( 'Show Current Page/Post Title', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable current page/post title on breadcrumbs bar.', 'newsmax' ),
					'default'  => 1,
				),
				array(
					'id'       => 'site_breadcrumb_size',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'required' => array( 'site_breadcrumb', '=', '1' ),
					'title'    => esc_html__( 'Breadcrumb Font Size', 'newsmax' ),
					'subtitle' => esc_html__( 'input a font size for the breadcrumb (in px ie: 13). Leave blank if you want to set as the default (12px).', 'newsmax' ),
					'desc'     => esc_html__( 'font-family value of the breadcrumb depends on main navigation font setting.', 'newsmax' ),
					'default'  => ''
				),
				array(
					'id'     => 'section_end_breadcrumb',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				),
				//site tooltips config
				array(
					'id'     => 'section_start_tooltips',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Tooltips Options', 'newsmax' ),
					'indent' => true,
				),
				array(
					'id'       => 'site_tooltips',
					'type'     => 'switch',
					'title'    => esc_html__( 'Social Tooltips', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable tooltips on social icons when hovering on icons.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'site_tooltips_touch',
					'type'     => 'switch',
					'title'    => esc_html__( 'Tooltips on Touch Devices', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable tooltip on touch devices', 'newsmax' ),
					'desc'     => esc_html__( 'Tooltips are always disabled on IOS devices due to performance.', 'newsmax' ),
					'default'  => 0,
				),
				array(
					'id'     => 'section_end_tooltips',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				),
				//site back to top config
				array(
					'id'     => 'section_start_back_top',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Back to Top Options', 'newsmax' ),
					'indent' => true,
				),
				array(
					'id'       => 'site_back_to_top',
					'type'     => 'switch',
					'title'    => esc_html__( 'Back to Top Button', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable back to top button.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'site_back_to_top_touch',
					'type'     => 'switch',
					'required' => array( 'site_back_to_top', '=', '1' ),
					'title'    => esc_html__( 'Enable On Mobile', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable back to top button on touch/mobile devices.', 'newsmax' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'     => 'section_end_back_top',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				),
				//opengraph config
				array(
					'id'     => 'section_start_open_graph',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'SEO Options', 'newsmax' ),
					'indent' => true,
				),
				array(
					'id'       => 'open_graph',
					'type'     => 'switch',
					'title'    => esc_html__( 'Open Graph', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable Open Graph, Disable this option if you want to use a 3rd party plugin.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'facebook_app_id',
					'type'     => 'text',
					'required' => array( 'open_graph', '=', '1' ),
					'title'    => esc_html__( 'Facebook APP ID', 'newsmax' ),
					'subtitle' => esc_html__( 'input your facebook app ID.', 'newsmax' ),
					'default'  => ''
				),
				array(
					'id'       => 'microdata_markup',
					'type'     => 'switch',
					'title'    => esc_html__( 'Microdata Markup', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable microdata markup(schema) for single posts. Disable this option if you want to use 3rd party plugin.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'     => 'section_end_meta_open_graph',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				),
			)
		);
	}
}
