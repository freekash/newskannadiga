<?php
//Sidebar & Widget
if ( ! function_exists( 'newsmax_ruby_theme_options_sidebar' ) ) {
	function newsmax_ruby_theme_options_sidebar() {
		return array(
			'id'     => 'newsmax_ruby_theme_ops_section_section_sidebar',
			'title'  => esc_html__( 'Sidebar Options', 'newsmax' ),
			'desc'   => esc_html__( 'select options for sidebars, options below will apply to whole the website.', 'newsmax' ),
			'icon'   => 'el el-th',
			'fields' => array(
				array(
					'id'     => 'section_start_sidebar_general',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Sidebar General Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'site_sidebar_position',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Sidebar Position', 'newsmax' ),
					'subtitle' => esc_html__( 'select sidebar position for your website, This option will be overridden by other "sidebar position" configs.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::sidebar_position( false ),
					'default'  => 'right'
				),
				array(
					'id'       => 'newsmax_ruby_multi_sidebar',
					'type'     => 'multi_text',
					'class'    => 'medium-text',
					'title'    => esc_html__( 'Custom Multi Sidebars', 'newsmax' ),
					'subtitle' => esc_html__( 'create or delete an existing sidebar, don\'t forget input name for your sidebar.', 'newsmax' ),
					'desc'     => esc_html__( 'click on "Create Sidebar" button and then input a name into the field to create a new sidebar.', 'newsmax' ),
					'add_text' => esc_html__( 'Create Sidebar', 'newsmax' ),
					'default'  => array()
				),
				array(
					'id'       => 'sidebar_sticky',
					'type'     => 'switch',
					'title'    => esc_html__( 'Sticky Sidebar', 'newsmax' ),
					'subtitle' => esc_html__( 'making sidebar permanently visible when scrolling up and down. Useful when a sidebar is too tall or too short compared to the rest of the content. This features will not apply to mobile devices.', 'newsmax' ),
					'default'  => 0
				),
				array(
					'id'       => 'sidebar_style',
					'type'     => 'select',
					'title'    => esc_html__( 'Sidebar Style', 'newsmax' ),
					'subtitle' => esc_html__( 'select a style for sidebars.', 'newsmax' ),
					'options'  => array(
						'1' => esc_html__( 'Default - Semi White Background', 'newsmax' ),
						'2' => esc_html__( 'No Background', 'newsmax' )
					),
					'default'  => 1
				),
				array(
					'id'     => 'section_end_sidebar_general',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}