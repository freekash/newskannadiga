<?php
//Category page
if ( ! function_exists( 'newsmax_ruby_theme_options_category' ) ) {
	function newsmax_ruby_theme_options_category() {
		return array(
			'id'         => 'newsmax_ruby_config_section_category',
			'title'      => esc_html__( 'Category Page Options', 'newsmax' ),
			'desc'       => esc_html__( 'Global category options (category.php), options below will apply to all category pages on your website.', 'newsmax' ),
			'icon'       => 'el el-folder-open',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'     => 'section_start_category_feat',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Category - Featured Area Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'category_feat_style',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Featured Style', 'newsmax' ),
					'subtitle' => esc_html__( 'select a featured style for displaying at the top of category pages.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::feat_style(),
					'default'  => 'none'
				),
				array(
					'id'       => 'category_feat_tag',
					'type'     => 'select',
					'data'     => 'tags',
					'multi'    => true,
					'title'    => esc_html__( 'Tags Filter', 'newsmax' ),
					'subtitle' => esc_html__( 'select tags name for featured areas. Leave blank if you want to select all tags.', 'newsmax' ),
				),
				array(
					'id'       => 'category_feat_orderby',
					'type'     => 'select',
					'title'    => esc_html__( 'Sorted By', 'newsmax' ),
					'subtitle' => esc_html__( 'select a sort type for featured areas.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::post_orders(),
					'default'  => 'date_post'
				),
				array(
					'id'       => 'category_feat_offset',
					'title'    => esc_html__( 'Offset of Posts', 'newsmax' ),
					'subtitle' => esc_html__( 'select number of posts to displace or pass over. The beginning number is 0.', 'newsmax' ),
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'default'  => 0
				),
				array(
					'id'       => 'category_feat_slides_per_page',
					'title'    => esc_html__( 'Number of Slides/Posts', 'newsmax' ),
					'subtitle' => esc_html__( 'select number of slides or posts (depending on the style you selected) for featured areas.', 'newsmax' ),
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'default'  => 1
				),
				array(
					'id'       => 'category_feat_grid_style',
					'type'     => 'select',
					'title'    => esc_html__( 'Featured Grid Style', 'newsmax' ),
					'subtitle' => esc_html__( 'select a style for featured grids', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::feat_grid_style(),
					'default'  => '1'
				),
				array(
					'id'       => 'category_feat_cat_info',
					'title'    => esc_html__( 'Category Info', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable category info on featured grids.', 'newsmax' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'category_feat_meta_info',
					'title'    => esc_html__( 'Meta Tags Info', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable entry meta info for featured grids.', 'newsmax' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'category_feat_share',
					'title'    => esc_html__( 'Share Icons', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable share icons for featured grids.', 'newsmax' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'     => 'section_end_category_feat',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_category_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Category - Layout Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'category_layout',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Category Layout', 'newsmax' ),
					'subtitle' => esc_html__( 'select a layout for category pages.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::blog_layout(),
					'default'  => 'classic_1'
				),
				array(
					'id'       => 'category_1st_classic',
					'title'    => esc_html__( '1st Classic Layout', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable classic layout at the first post of the blog listing, This option will not apply to classic layouts.', 'newsmax' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'       => 'category_1st_classic_layout',
					'title'    => esc_html__( '1st Classic Style', 'newsmax' ),
					'subtitle' => esc_html__( 'select a style for the 1st classic layout.', 'newsmax' ),
					'type'     => 'select',
					'required' => array( 'category_1st_classic', '=', '1' ),
					'options'  => array(
						'classic_1' => esc_html__( 'Classic 1', 'newsmax' ),
						'classic_2' => esc_html__( 'Classic 2', 'newsmax' ),
					),
					'default'  => 'classic_1'
				),
				array(
					'id'       => 'category_posts_per_page',
					'title'    => esc_html__( 'Number of Posts', 'newsmax' ),
					'subtitle' => esc_html__( 'select number of posts for category pages, this option will override default settings in "Settings > Reading > Blog pages show at most. Leave blank or set 0 if you want to set as the default.', 'newsmax' ),
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'default'  => 0
				),
				array(
					'id'     => 'section_end_category_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_category_pagination',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Category - Pagination Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'category_pagination',
					'title'    => esc_html__( 'Category pagination', 'newsmax' ),
					'subtitle' => esc_html__( 'select a pagination style for category pages (category.php)', 'newsmax' ),
					'type'     => 'select',
					'options'  => newsmax_ruby_theme_config::blog_pagination(),
					'default'  => 'number'
				),
				array(
					'id'     => 'section_end_category_pagination',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_category_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Category - Sidebar Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'category_sidebar_name',
					'type'     => 'select',
					'title'    => esc_html__( 'Category Sidebar Name', 'newsmax' ),
					'subtitle' => esc_html__( 'Select a sidebar for category pages', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::sidebar_name(),
					'default'  => 'newsmax_ruby_sidebar_default'
				),
				array(
					'id'       => 'category_sidebar_position',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Category Sidebar Position', 'newsmax' ),
					'subtitle' => esc_html__( 'Select sidebar position for category pages', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::sidebar_position(),
					'default'  => 'default'
				),
				array(
					'id'     => 'section_end_category_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}

//tag page
if ( ! function_exists( 'newsmax_ruby_theme_options_tag' ) ) {
	function newsmax_ruby_theme_options_tag() {
		return array(
			'id'         => 'newsmax_ruby_config_section_tag',
			'title'      => esc_html__( 'Tag Page Options', 'newsmax' ),
			'desc'       => esc_html__( 'tag page options (tag.php), options below will apply to tag pages', 'newsmax' ),
			'icon'       => 'el el-tags',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'     => 'section_start_tag_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Tag Layout Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'tag_layout',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Tag Layout', 'newsmax' ),
					'subtitle' => esc_html__( 'select a layout for tag pages', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::blog_layout(),
					'default'  => 'classic_1'
				),
				array(
					'id'       => 'tag_1st_classic',
					'title'    => esc_html__( '1st Classic Layout', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable classic layout at the first post of the blog listing, This option will not apply to classic layouts.', 'newsmax' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'       => 'tag_1st_classic_layout',
					'title'    => esc_html__( '1st Classic Style', 'newsmax' ),
					'subtitle' => esc_html__( 'select a style for the 1st classic layout.', 'newsmax' ),
					'type'     => 'select',
					'required' => array( 'tag_1st_classic', '=', '1' ),
					'options'  => array(
						'classic_1' => esc_html__( 'Classic 1', 'newsmax' ),
						'classic_2' => esc_html__( 'Classic 2', 'newsmax' ),
					),
					'default'  => 'classic_1'
				),
				array(
					'id'       => 'tag_posts_per_page',
					'title'    => esc_html__( 'Number of Posts', 'newsmax' ),
					'subtitle' => esc_html__( 'select number of posts for tag pages, this option will override default settings in "Settings > Reading > archive pages show at most. Leave blank or set 0 if you want to set as the default.', 'newsmax' ),
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'default'  => 0
				),
				array(
					'id'     => 'section_end_tag_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_tag_pagination',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Pagination Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'tag_pagination',
					'title'    => esc_html__( 'Tag Pagination', 'newsmax' ),
					'subtitle' => esc_html__( 'select a pagination style for tag pages (tag.php)', 'newsmax' ),
					'type'     => 'select',
					'options'  => newsmax_ruby_theme_config::blog_pagination(),
					'default'  => 'number'
				),
				array(
					'id'     => 'section_end_tag_pagination',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_tag_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Tag Sidebar Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'tag_sidebar_name',
					'type'     => 'select',
					'title'    => esc_html__( 'Tag Sidebar Name', 'newsmax' ),
					'subtitle' => esc_html__( 'Select a sidebar for tag pages.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::sidebar_name(),
					'default'  => 'newsmax_ruby_sidebar_default'
				),
				array(
					'id'       => 'tag_sidebar_position',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Tag Sidebar Position', 'newsmax' ),
					'subtitle' => esc_html__( 'Select sidebar position for tag pages.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::sidebar_position(),
					'default'  => 'default'
				),
				array(
					'id'     => 'section_end_tag_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}

//author page
if ( ! function_exists( 'newsmax_ruby_theme_options_author' ) ) {
	function newsmax_ruby_theme_options_author() {
		return array(
			'id'         => 'newsmax_ruby_config_section_author',
			'title'      => esc_html__( 'Author Page Options', 'newsmax' ),
			'desc'       => esc_html__( 'author page options (author.php), options below will apply authors pages.', 'newsmax' ),
			'icon'       => 'el el-user',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'     => 'section_start_author_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Author Layout Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'author_layout',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Author Layout', 'newsmax' ),
					'subtitle' => esc_html__( 'select a layout for author pages.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::blog_layout(),
					'default'  => 'classic_1'
				),
				array(
					'id'       => 'author_1st_classic',
					'title'    => esc_html__( '1st Classic Layout', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable classic layout at the first post of the blog listing, This option will not apply to classic layouts.', 'newsmax' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'       => 'author_1st_classic_layout',
					'title'    => esc_html__( '1st Classic Style', 'newsmax' ),
					'subtitle' => esc_html__( 'select a style for the 1st classic layout.', 'newsmax' ),
					'type'     => 'select',
					'required' => array( 'author_1st_classic', '=', '1' ),
					'options'  => array(
						'classic_1' => esc_html__( 'Classic 1', 'newsmax' ),
						'classic_2' => esc_html__( 'Classic 2', 'newsmax' ),
					),
					'default'  => 'classic_1'
				),
				array(
					'id'       => 'author_posts_per_page',
					'title'    => esc_html__( 'Number of Posts', 'newsmax' ),
					'subtitle' => esc_html__( 'select number of posts for author pages, this option will override default settings in "Settings > Reading > archive pages show at most. Leave blank or set 0 if you want to set as the default.', 'newsmax' ),
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'default'  => 0
				),
				array(
					'id'       => 'author_header_box',
					'title'    => esc_html__( 'Show Author Card', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable the author card box at the top of author pages.', 'newsmax' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'     => 'section_end_author_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_author_pagination',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Pagination options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'author_pagination',
					'title'    => esc_html__( 'Author Pagination', 'newsmax' ),
					'subtitle' => esc_html__( 'select a pagination style for author pages (author.php)', 'newsmax' ),
					'type'     => 'select',
					'options'  => newsmax_ruby_theme_config::blog_pagination(),
					'default'  => 'number'
				),
				array(
					'id'     => 'section_end_author_pagination',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_author_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Author Sidebar Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'author_sidebar_name',
					'type'     => 'select',
					'title'    => esc_html__( 'Author Sidebar Name', 'newsmax' ),
					'subtitle' => esc_html__( 'select a sidebar for author pages.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::sidebar_name(),
					'default'  => 'newsmax_ruby_sidebar_default'
				),
				array(
					'id'       => 'author_sidebar_position',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Author Sidebar Position', 'newsmax' ),
					'subtitle' => esc_html__( 'Select sidebar position for author pages.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::sidebar_position(),
					'default'  => 'default'
				),
				array(
					'id'     => 'section_end_author_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}


//search page
if ( ! function_exists( 'newsmax_ruby_theme_options_search' ) ) {
	function newsmax_ruby_theme_options_search() {
		return array(
			'id'         => 'newsmax_ruby_config_section_search',
			'title'      => esc_html__( 'Search Page Options', 'newsmax' ),
			'desc'       => esc_html__( 'search page options (search.php), options below will apply the search page.', 'newsmax' ),
			'icon'       => 'el el-search',
			'subsection' => true,
			'fields'     => array(
				//search layout
				array(
					'id'     => 'section_start_search_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Search Layout Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'search_layout',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Search Layout', 'newsmax' ),
					'subtitle' => esc_html__( 'select layout for the search page.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::blog_layout(),
					'default'  => 'classic_1'
				),
				array(
					'id'       => 'search_1st_classic',
					'title'    => esc_html__( '1st Classic Layout', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable classic layout at the first post of the blog listing, This option will not apply to classic layouts.', 'newsmax' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'       => 'search_1st_classic_layout',
					'title'    => esc_html__( '1st Classic Style', 'newsmax' ),
					'subtitle' => esc_html__( 'select a style for the 1st classic layout.', 'newsmax' ),
					'type'     => 'select',
					'required' => array( 'search_1st_classic', '=', '1' ),
					'options'  => array(
						'classic_1' => esc_html__( 'Classic 1', 'newsmax' ),
						'classic_2' => esc_html__( 'Classic 2', 'newsmax' ),
					),
					'default'  => 'classic_1'
				),
				array(
					'id'       => 'search_posts_per_page',
					'title'    => esc_html__( 'Number of Posts', 'newsmax' ),
					'subtitle' => esc_html__( 'select number of posts for the search page, this option will override default settings in "Settings > Reading > archive pages show at most. Leave blank or set 0 if you want to set as the default.', 'newsmax' ),
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'default'  => 0
				),
				array(
					'id'       => 'search_header_form',
					'title'    => esc_html__( 'Header Search Form', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable the search form at the top of the search page.', 'newsmax' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'     => 'section_end_search_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_search_pagination',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Pagination Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'search_pagination',
					'title'    => esc_html__( 'Search Pagination', 'newsmax' ),
					'subtitle' => esc_html__( 'select a pagination style for the search page (search.php)', 'newsmax' ),
					'type'     => 'select',
					'options'  => newsmax_ruby_theme_config::blog_pagination( false ),
					'default'  => 'number'
				),
				array(
					'id'     => 'section_end_search_pagination',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//search sidebar
				array(
					'id'     => 'section_start_search_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Search Sidebar Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'search_sidebar_name',
					'type'     => 'select',
					'title'    => esc_html__( 'Search Sidebar Name', 'newsmax' ),
					'subtitle' => esc_html__( 'Select a sidebar for the search page.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::sidebar_name(),
					'default'  => 'newsmax_ruby_sidebar_default'
				),
				array(
					'id'       => 'search_sidebar_position',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Search Sidebar Position', 'newsmax' ),
					'subtitle' => esc_html__( 'Select sidebar position for the search page.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::sidebar_position(),
					'default'  => 'default'
				),
				array(
					'id'     => 'section_end_search_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}


//archive
if ( ! function_exists( 'newsmax_ruby_theme_options_archive' ) ) {
	function newsmax_ruby_theme_options_archive() {
		return array(
			'id'         => 'newsmax_ruby_config_section_archive',
			'title'      => esc_html__( 'Archive Page Options', 'newsmax' ),
			'desc'       => esc_html__( 'archive page options (archive.php), options below will apply archive pages, WordPress will automatically generate daily, monthly and yearly archives.', 'newsmax' ),
			'icon'       => 'el el-folder-close',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'     => 'section_start_archive_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Archive Layout Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'archive_layout',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Archive Layout', 'newsmax' ),
					'subtitle' => esc_html__( 'select layout for archive pages.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::blog_layout(),
					'default'  => 'classic_1'
				),
				array(
					'id'       => 'archive_1st_classic',
					'title'    => esc_html__( '1st Classic Layout', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable classic layout at the first post of the blog listing, This option will not apply to classic layouts.', 'newsmax' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'       => 'archive_1st_classic_layout',
					'title'    => esc_html__( '1st Classic Style', 'newsmax' ),
					'subtitle' => esc_html__( 'select a style for the 1st classic layout.', 'newsmax' ),
					'type'     => 'select',
					'required' => array( 'archive_1st_classic', '=', '1' ),
					'options'  => array(
						'classic_1' => esc_html__( 'Classic 1', 'newsmax' ),
						'classic_2' => esc_html__( 'Classic 2', 'newsmax' ),
					),
					'default'  => 'classic_1'
				),
				array(
					'id'       => 'archive_posts_per_page',
					'title'    => esc_html__( 'Number of Posts', 'newsmax' ),
					'subtitle' => esc_html__( 'select number of posts for archive pages, this option will override default settings in "Settings > Reading > archive pages show at most. Leave blank or set 0 if you want to set as default.', 'newsmax' ),
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'default'  => 0
				),
				array(
					'id'     => 'section_end_archive_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_archive_pagination',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Pagination options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'archive_pagination',
					'title'    => esc_html__( 'archive pagination', 'newsmax' ),
					'subtitle' => esc_html__( 'select a pagination style for archive pages (archive.php)', 'newsmax' ),
					'type'     => 'select',
					'options'  => newsmax_ruby_theme_config::blog_pagination( false ),
					'default'  => 'number'
				),
				array(
					'id'     => 'section_end_archive_pagination',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_archive_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Archive Sidebar Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'archive_sidebar_name',
					'type'     => 'select',
					'title'    => esc_html__( 'Archive Sidebar Name', 'newsmax' ),
					'subtitle' => esc_html__( 'Select sidebar for archive pages', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::sidebar_name(),
					'default'  => 'newsmax_ruby_sidebar_default'
				),
				array(
					'id'       => 'archive_sidebar_position',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Archive Sidebar Position', 'newsmax' ),
					'subtitle' => esc_html__( 'Select sidebar position for archive pages', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::sidebar_position(),
					'default'  => 'default'
				),
				array(
					'id'     => 'section_end_archive_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}