<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return array
 * header logo config
 */
if ( ! function_exists( 'newsmax_ruby_theme_options_logo' ) ) {
	function newsmax_ruby_theme_options_logo() {
		return array(
			'id'     => 'newsmax_ruby_config_section_header_logo',
			'title'  => esc_html__( 'Logo Options', 'newsmax' ),
			'desc'   => esc_html__( 'upload logos for your website.', 'newsmax' ),
			'icon'   => 'el el-star',
			'fields' => array(
				//logo
				array(
					'id'     => 'section_start_header_logo',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Header Logo Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'header_logo',
					'type'     => 'media',
					'title'    => esc_html__( 'Logo Upload', 'newsmax' ),
					'subtitle' => esc_html__( 'upload your logo (300x90)px, allowed extensions are .jpg, .png and .gif.', 'newsmax' )
				),
				array(
					'id'       => 'header_logo_retina',
					'type'     => 'media',
					'title'    => esc_html__( 'Logo Retina Upload', 'newsmax' ),
					'subtitle' => esc_html__( 'upload your retina logo (520x180)px, allowed extensions are .jpg, .png and .gif.', 'newsmax' )
				),
				array(
					'id'       => 'header_logo_mobile',
					'type'     => 'media',
					'title'    => esc_html__( 'Mobile Logo Upload', 'newsmax' ),
					'subtitle' => esc_html__( 'upload logo for displaying on mobile devices(300x90)px, allowed extensions are .jpg, .png and .gif.', 'newsmax' )
				),
				array(
					'id'       => 'header_logo_off_canvas',
					'type'     => 'media',
					'title'    => esc_html__( 'Off-canvas Logo Upload', 'newsmax' ),
					'subtitle' => esc_html__( 'upload logo for the off-canvas section (300x90)px, allowed extensions are .jpg, .png and .gif', 'newsmax' )
				),
				array(
					'id'     => 'section_end_header_logo',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_header_logo_alt',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Attribute options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'header_logo_title',
					'type'     => 'text',
					'title'    => esc_html__( 'logo title', 'newsmax' ),
					'subtitle' => esc_html__( 'input a title attribute for the logo, Most browsers will show a tooltip with this text when users hover on your logo.', 'newsmax' ),
					'default'  => '',
				),
				array(
					'id'       => 'header_logo_alt',
					'type'     => 'text',
					'title'    => esc_html__( 'logo alt attribute ', 'newsmax' ),
					'subtitle' => esc_html__( 'input an alt attribute for the logo, This text cannot display. It is useful for SEO and generally is the name of the site.', 'newsmax' ),
					'default'  => '',
				),
				array(
					'id'     => 'section_end_header_logo_alt',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			)
		);
	}
}
