<?php
/**
 * @return array
 * blog index layout
 */
if ( ! function_exists( 'newsmax_ruby_theme_options_single_page' ) ) {
	function newsmax_ruby_theme_options_single_page() {
		return array(
			'id'     => 'newsmax_ruby_config_section_single_page',
			'title'  => esc_html__( 'Single Page Options', 'newsmax' ),
			'desc'   => esc_html__( 'select options for single pages (page.php), options below will apply to all pages has been set to "Default Template".', 'newsmax' ),
			'icon'   => 'el el-list-alt',
			'fields' => array(
				//single page
				array(
					'id'     => 'section_start_single_page_option',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Single Page Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'single_page_title',
					'type'     => 'switch',
					'title'    => esc_html__( 'Single Page Title', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable the page title, this options will apply to all single pages.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'     => 'section_end_single_page_option',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//single sidebar
				array(
					'id'     => 'section_start_single_page_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Single Sidebar Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'single_page_sidebar_name',
					'type'     => 'select',
					'title'    => esc_html__( 'Single Sidebar name', 'newsmax' ),
					'subtitle' => esc_html__( 'select default sidebar name the single page page, this option will apply to all single pages page. You can set an individual sidebar for each page in the page editor.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::sidebar_name(),
					'default'  => 'newsmax_ruby_sidebar_default'
				),
				//default position
				array(
					'id'       => 'single_page_sidebar_position',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Sidebar Position', 'newsmax' ),
					'subtitle' => esc_html__( 'select sidebar position for single pages, this option will override default sidebar position. You can set an individual sidebar position for each page in the page editor.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::sidebar_position(),
					'default'  => 'default'
				),
				array(
					'id'     => 'section_end_single_page_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			)
		);
	}
}