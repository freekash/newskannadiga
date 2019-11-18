<?php
/**
 * @return array
 * composer listing config
 */
if ( ! function_exists( 'newsmax_ruby_metabox_composer' ) ) {
	function newsmax_ruby_metabox_composer() {
		return array(
			'id'         => 'newsmax_ruby_metabox_composer_options',
			'title'      => esc_html__( 'COMPOSER LATEST BLOG SECTION', 'newsmax' ),
			'post_types' => array( 'page' ),
			'priority'   => 'default',
			'context'    => 'normal',
			'fields'     => array(
				array(
					'id'      => 'newsmax_ruby_composer_blog',
					'name'    => esc_html__( 'Enable Section', 'newsmax' ),
					'desc'    => esc_html__( 'Enable or disable the latest blog listing section, this section displays a blog listings at the bottom of this page with numeric or next/prev pagination.', 'newsmax' ),
					'type'    => 'select',
					'options' => array(
						'0' => esc_html__( '--Disable--', 'newsmax' ),
						'1' => esc_html__( 'Enable', 'newsmax' )
					),
					'std'     => '0'
				),
				array(
					'id'   => 'newsmax_ruby_composer_blog_title',
					'name' => esc_html__( 'Section Title', 'newsmax' ),
					'desc' => esc_html__( 'input a title for this section.', 'newsmax' ),
					'type' => 'text',
					'std'  => esc_html__( 'the latest news', 'newsmax' )
				),
				array(
					'id'      => 'newsmax_ruby_composer_blog_layout',
					'name'    => esc_html__( 'Blog Layout', 'newsmax' ),
					'desc'    => esc_html__( 'select a layout for this section. The blog styling options in Newsmax > Blog/Page Templates > Blog Styling will apply to this section.', 'newsmax' ),
					'type'    => 'image_select',
					'options' => newsmax_ruby_theme_config::metabox_blog_layout(),
					'std'     => 'layout_list'
				),
				array(
					'id'      => 'newsmax_ruby_composer_blog_1st_classic',
					'name'    => esc_html__( '1st Classic Layout', 'newsmax' ),
					'desc'    => esc_html__( 'enable or disable classic layout at the first post of the blog listing, This option will not apply to classic layouts.', 'newsmax' ),
					'type'    => 'select',
					'options' => array(
						'0' => esc_html__( '--Disable--', 'newsmax' ),
						'1' => esc_html__( 'Enable', 'newsmax' )
					),
					'std'     => '0'
				),
				array(
					'id'      => 'newsmax_ruby_composer_blog_1st_style',
					'name'    => esc_html__( '1st Classic Style', 'newsmax' ),
					'desc'    => esc_html__( 'select a style for the 1st classic layout.', 'newsmax' ),
					'type'    => 'select',
					'options' => array(
						'classic_1' => esc_html__( 'Classic 1', 'newsmax' ),
						'classic_2' => esc_html__( 'Classic 2', 'newsmax' ),
					),
					'std'     => 'classic_1',
				),
				array(
					'id'   => 'newsmax_ruby_composer_blog_category',
					'name' => esc_html__( 'Categories Filter', 'newsmax' ),
					'desc' => esc_html__( 'input category IDs you want to filter, separated by commas (example: 1,2,3). Leave blank if you want to display all categories.', 'newsmax' ),
					'type' => 'text',
					'std'  => ''
				),
				array(
					'id'   => 'newsmax_ruby_composer_blog_number',
					'name' => esc_html__( 'number of posts', 'newsmax' ),
					'desc' => esc_html__( 'select number of posts for this section.', 'newsmax' ),
					'type' => 'text',
					'std'  => '6'
				),
				array(
					'id'   => 'newsmax_ruby_composer_blog_offset',
					'name' => esc_html__( 'Post Offset', 'newsmax' ),
					'desc' => esc_html__( 'select number of posts to displace or pass over. The beginning number is 0.', 'newsmax' ),
					'type' => 'text',
					'std'  => '',
				),
				array(
					'id'      => 'newsmax_ruby_composer_blog_pagination',
					'type'    => 'select',
					'name'    => esc_html__( 'Pagination Style', 'newsmax' ),
					'desc'    => esc_html__( 'select a pagination style for this section.', 'newsmax' ),
					'options' => newsmax_ruby_theme_config::blog_pagination( false ),
					'std'     => 'number'
				),
				array(
					'id'      => 'newsmax_ruby_composer_blog_sidebar_name',
					'type'    => 'select',
					'name'    => esc_html__( 'Sidebar Name', 'newsmax' ),
					'desc'    => esc_html__( 'Select a sidebar for this section.', 'newsmax' ),
					'options' => newsmax_ruby_theme_config::sidebar_name( false ),
					'std'     => 'newsmax_ruby_sidebar_default'
				),
				array(
					'id'       => 'newsmax_ruby_composer_blog_sidebar_position',
					'class'    => 'ruby-sidebar-select',
					'name'     => esc_html__( 'Sidebar Position', 'newsmax' ),
					'desc'     => esc_html__( 'select sidebar position for this section.', 'newsmax' ),
					'type'     => 'image_select',
					'multiple' => false,
					'options'  => newsmax_ruby_theme_config::metabox_sidebar_position( false ),
					'std'      => 'right'
				),
			)
		);
	}
}