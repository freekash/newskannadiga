<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return array
 * color config
 */
if ( ! function_exists( 'newsmax_ruby_theme_options_color' ) ) {
	function newsmax_ruby_theme_options_color() {
		return array(
			'id'     => 'newsmax_ruby_config_section_color',
			'title'  => esc_html__( 'Color Options', 'newsmax' ),
			'desc'   => esc_html__( 'select color options for your website.', 'newsmax' ),
			'icon'   => 'el el-tint',
			'fields' => array(
				//global colors
				array(
					'id'     => 'section_start_global_color',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Global Color Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'          => 'global_color',
					'title'       => esc_html__( 'Global Color', 'newsmax' ),
					'subtitle'    => esc_html__( 'select a global color, It will be used for all links, menu, category overlays, main page and many contrasting elements. leave blank if you want set as default (#ff4545).', 'newsmax' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'     => 'section_end_global_color',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//topbar colors
				array(
					'id'     => 'section_start_header_topbar_color',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Top Bar Color Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'          => 'topbar_color_bg',
					'title'       => esc_html__( 'Top Bar - Background Color', 'newsmax' ),
					'subtitle'    => esc_html__( 'Select a background color for the top bar. Leave blank if you want to set as default (#282828).', 'newsmax' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'          => 'topbar_color',
					'title'       => esc_html__( 'Top Bar - Text Color', 'newsmax' ),
					'subtitle'    => esc_html__( 'select a color for top bar text. Please leave blank if you want to set as default (#ffffff).', 'newsmax' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'          => 'topbar_color_hover',
					'title'       => esc_html__( 'Top Bar - Text Hover Color', 'newsmax' ),
					'subtitle'    => esc_html__( 'select a color when hovering on top bar text. Please leave blank if you want to set as default (#ffffff).', 'newsmax' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'          => 'topbar_border',
					'title'       => esc_html__( 'Top Bar - Border Color', 'newsmax' ),
					'subtitle'    => esc_html__( 'select top border color for the topbar (2px). Leave blank if you want to move it.', 'newsmax' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'     => 'section_end_header_topbar_color',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//main navigation colors
				array(
					'id'     => 'section_start_header_navbar_color',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Main Navigation Color Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'          => 'navbar_color_bg',
					'title'       => esc_html__( 'Navigation - Background Color', 'newsmax' ),
					'subtitle'    => esc_html__( 'select a background color for the main navigation. Leave blank if you want to set as default (#ffffff).', 'newsmax' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'          => 'navbar_color',
					'title'       => esc_html__( 'Navigation - Text Color', 'newsmax' ),
					'subtitle'    => esc_html__( 'select a color for main navigation text. Leave blank if you want to set as default (#282828).', 'newsmax' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'          => 'navbar_color_hover',
					'title'       => esc_html__( 'Navigation - Hover Color', 'newsmax' ),
					'subtitle'    => esc_html__( 'select a color when hovering on main navigation text. Leave blank if you want to set as default (#ff4545).', 'newsmax' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				//sub navigation
				array(
					'id'          => 'navbar_color_bg_sub',
					'title'       => esc_html__( 'Navigation - Submenu Background Color', 'newsmax' ),
					'subtitle'    => esc_html__( 'select a background color for sub menu items of the main navigation. Leave blank if you want to set as default (#ffffff).', 'newsmax' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'          => 'navbar_color_sub',
					'title'       => esc_html__( 'Navigation - Submenu Text Color', 'newsmax' ),
					'subtitle'    => esc_html__( 'select a color for submenu text. Leave blank if you want to set as default (#282828).', 'newsmax' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'          => 'navbar_color_hover_sub',
					'title'       => esc_html__( 'Navigation - Submenu Text Hover Color', 'newsmax' ),
					'subtitle'    => esc_html__( 'select a color when hovering on submmenu text. Please leave blank if you want to set as default (#ff4545).', 'newsmax' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'       => 'navbar_mega_text_style',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Category Mega Menu Text', 'newsmax' ),
					'subtitle' => esc_html__( 'select a style for category mega menu post to suit with your background settings.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::text_style(),
					'default'  => 'is-dark-text'
				),
				array(
					'id'     => 'section_end_header_navbar_color',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//off-canvas section
				array(
					'id'     => 'section_start_header_offcanvas_color',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Off-canvas Color Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'          => 'offcanvas_color_bg',
					'title'       => esc_html__( 'Off-Canvas - Background Color', 'newsmax' ),
					'subtitle'    => esc_html__( 'select a background color for the Off-canvas section. This options will override style option in Off-canvas settings.', 'newsmax' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'          => 'offcanvas_color_hover',
					'title'       => esc_html__( 'Off-Canvas - Hover Text Color', 'newsmax' ),
					'subtitle'    => esc_html__( 'select a color for the Off-canvas text. Leave blank if you want to set default.', 'newsmax' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'     => 'section_end_header_offcavans_color',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//review icon color
				array(
					'id'     => 'section_start_review_color',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Review Color Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'          => 'review_color',
					'title'       => esc_html__( 'Review Color', 'newsmax' ),
					'subtitle'    => esc_html__( 'Select a color for review elements, Please leave blank if you want set as default (#f3d276).', 'newsmax' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'     => 'section_end_review_color',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//share icon color
				array(
					'id'     => 'section_start_social_color',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Share Color Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'          => 'social_color',
					'title'       => esc_html__( 'Social Icon Color', 'newsmax' ),
					'subtitle'    => esc_html__( 'select a color for social and shares icons, This option will apply to all icons, leave blank if you want to set as default.', 'newsmax' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'     => 'section_end_social_color',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//dark classic and list layout
				array(
					'id'     => 'section_start_layout_dark_color',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Dark Classic & List Color Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'          => 'dark_classic_color',
					'title'       => esc_html__( 'Dark Classic & List Color', 'newsmax' ),
					'subtitle'    => esc_html__( 'select a dark color for the dark list and classic blog, leave blank if you want to set as default (#282828).', 'newsmax' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'     => 'section_end_layout_dark_color',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//single title color
				array(
					'id'     => 'section_start_single_post_color',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Single Color Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'          => 'single_title_color',
					'title'       => esc_html__( 'Single Title Color', 'newsmax' ),
					'subtitle'    => esc_html__( 'select a color for single post titles, this option will override on default theme color, Leave blank if you want to set default.', 'newsmax' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
					'default'     => '#ff4545'
				),
				array(
					'id'          => 'hyperlink_color',
					'title'       => esc_html__( 'Hyperlink Color', 'newsmax' ),
					'subtitle'    => esc_html__( 'select a color for hyperlink, this option will override on default theme color, Leave blank if you want to set default.', 'newsmax' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'     => 'section_end_single_post_color',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}
