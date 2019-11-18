<?php
/**
 * @return array
 * blog index layout
 */
if ( ! function_exists( 'newsmax_ruby_theme_options_blog_index' ) ) {
	function newsmax_ruby_theme_options_blog_index() {
		return array(
			'id'         => 'newsmax_ruby_config_section_blog_index',
			'title'      => esc_html__( 'Blog (Index) Options', 'newsmax' ),
			'desc'       => esc_html__( 'Latest blog page options (index.php), options below will apply to blog page that is set to "Your latest posts" in the "WordPress Settings -> Reading" section.', 'newsmax' ),
			'icon'       => 'el el-laptop',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'     => 'section_start_blog_index_feat',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Featured Area Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'blog_index_feat_style',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Featured Area - Style', 'newsmax' ),
					'subtitle' => esc_html__( 'select a featured style for displaying at the top of the blog page.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::feat_style(),
					'default'  => 'none'
				),
				array(
					'id'       => 'blog_index_feat_cat',
					'type'     => 'select',
					'data'     => 'categories',
					'multi'    => true,
					'title'    => esc_html__( 'Featured Area - Categories Filter', 'newsmax' ),
					'subtitle' => esc_html__( 'filter multi categories for blog featured area, leave blank if you want to select all categories.', 'newsmax' ),
				),
				array(
					'id'       => 'blog_index_feat_tag',
					'type'     => 'select',
					'data'     => 'tags',
					'multi'    => true,
					'title'    => esc_html__( 'Featured Area -Tags Filter', 'newsmax' ),
					'subtitle' => esc_html__( 'input tags name for the blog featured area. Leave blank if you want to select all tags.', 'newsmax' ),
				),
				array(
					'id'       => 'blog_index_feat_orderby',
					'type'     => 'select',
					'title'    => esc_html__( 'Featured Area - Sorted By', 'newsmax' ),
					'subtitle' => esc_html__( 'select a sort type for the blog featured area.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::post_orders(),
					'default'  => 'date_post'
				),
				array(
					'id'       => 'blog_index_feat_offset',
					'title'    => esc_html__( 'Featured Area - Offset of Posts', 'newsmax' ),
					'subtitle' => esc_html__( 'select number of posts to displace or pass over. The beginning number is 0.', 'newsmax' ),
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'default'  => 0
				),
				array(
					'id'       => 'blog_index_feat_slides_per_page',
					'title'    => esc_html__( 'Featured Area - Number of slides/posts', 'newsmax' ),
					'subtitle' => esc_html__( 'select number of slides or posts (depending on the style you selected) for the blog featured area.', 'newsmax' ),
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'default'  => 1
				),
				array(
					'id'       => 'blog_index_feat_grid_style',
					'type'     => 'select',
					'title'    => esc_html__( 'Featured Area - Grid Style', 'newsmax' ),
					'subtitle' => esc_html__( 'select a style for the blog featured grid.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::feat_grid_style(),
					'default'  => '1'
				),
				array(
					'id'       => 'blog_index_feat_cat_info',
					'title'    => esc_html__( 'Featured Area - Category Info', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable category info for the blog featured grid.', 'newsmax' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'blog_index_feat_meta_info',
					'title'    => esc_html__( 'Featured Area - Meta Tags Info', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable entry meta info for the blog featured grid.', 'newsmax' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'blog_index_feat_share',
					'title'    => esc_html__( 'Featured Area - Share Icons', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable share icons for the blog featured grid.', 'newsmax' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'     => 'section_end_blog_index_feat',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_blog_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Blog Layout Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'blog_index_layout',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Blog Layout', 'newsmax' ),
					'subtitle' => esc_html__( 'select a layout for the latest blog page (index.php).', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::blog_layout(),
					'default'  => 'classic_1'
				),
				array(
					'id'       => 'blog_index_1st_classic',
					'title'    => esc_html__( '1st Classic Layout', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable classic layout at the first post of the blog listing, This option will not apply to classic layouts.', 'newsmax' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'       => 'blog_index_1st_classic_layout',
					'title'    => esc_html__( '1st Classic Style', 'newsmax' ),
					'subtitle' => esc_html__( 'select a style for the 1st classic layout.', 'newsmax' ),
					'type'     => 'select',
					'required' => array( 'blog_index_1st_classic', '=', '1' ),
					'options'  => array(
						'classic_1' => esc_html__( 'Classic 1', 'newsmax' ),
						'classic_2' => esc_html__( 'Classic 2', 'newsmax' ),
					),
					'default'  => 'classic_1'
				),
				array(
					'id'       => 'blog_index_posts_per_page',
					'title'    => esc_html__( 'Number of Posts', 'newsmax' ),
					'subtitle' => esc_html__( 'select number of posts for the latest blog page, this option will override default settings in "Settings > Reading > Blog pages show at most. Leave blank or set 0 if you want to set as the default.', 'newsmax' ),
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'default'  => 0
				),
				array(
					'id'     => 'section_end_blog_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_blog_index_pagination',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Pagination options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'blog_index_pagination',
					'title'    => esc_html__( 'blog pagination', 'newsmax' ),
					'subtitle' => esc_html__( 'select pagination style for the latest blog page (index.php)', 'newsmax' ),
					'type'     => 'select',
					'options'  => newsmax_ruby_theme_config::blog_pagination(),
					'default'  => 'number'
				),
				array(
					'id'     => 'section_end_blog_index_pagination',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_blog_index_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Blog Sidebar Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'blog_index_sidebar_name',
					'type'     => 'select',
					'title'    => esc_html__( 'Blog Sidebar Name', 'newsmax' ),
					'subtitle' => esc_html__( 'Select a sidebar for the latest blog page.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::sidebar_name(),
					'default'  => 'newsmax_ruby_sidebar_default'
				),
				array(
					'id'       => 'blog_index_sidebar_position',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Blog Sidebar Position', 'newsmax' ),
					'subtitle' => esc_html__( 'Select sidebar position for the latest blog page.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::sidebar_position(),
					'default'  => 'default'
				),
				array(
					'id'     => 'section_end_blog_index_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}