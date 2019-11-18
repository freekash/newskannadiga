<?php
//blog template section
if ( ! function_exists( 'newsmax_ruby_theme_options_blog_template' ) ) {
	function newsmax_ruby_theme_options_blog_template() {
		return array(
			'id'    => 'newsmax_ruby_config_section_blog_template',
			'title' => esc_html__( 'Blog/Pages Templates', 'newsmax' ),
			'icon'  => 'el el-edit',
		);
	}
}

//blog styling
if ( ! function_exists( 'newsmax_ruby_theme_options_blog_styling' ) ) {
	function newsmax_ruby_theme_options_blog_styling() {
		//design layout
		return array(
			'id'         => 'newsmax_ruby_config_section_blog_styling',
			'title'      => esc_html__( 'Blog Styling', 'newsmax' ),
			'desc'       => esc_html__( 'These Options below will apply to all blog pages, templates and composer latest blog section (it does not apply to blocks are built with Ruby Composer) : default blog (index.php), categories (category.php), archives (archive.php), tags (tag.php) and the search page (search.php).', 'newsmax' ),
			'icon'       => 'el el-adjust-alt',
			'subsection' => true,
			'fields'     => array(

				array(
					'id'     => 'section_start_blog_styling_meta_info',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Meta Info Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'blog_cat_info',
					'title'    => esc_html__( 'category info', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable the category info for blog listing layouts.', 'newsmax' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'blog_meta_info',
					'title'    => esc_html__( 'Meta Tags Info', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable entry meta info for blog listing layouts.', 'newsmax' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'blog_share',
					'title'    => esc_html__( 'Share Icons', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable share icons for blog listing layouts.', 'newsmax' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'     => 'section_end_blog_styling_meta_info',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//blog excerpt
				array(
					'id'     => 'section_start_blog_styling_excerpt',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Excerpt Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'blog_excerpt_length_grid',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'Grid - Excerpt Length', 'newsmax' ),
					'subtitle' => esc_html__( 'select length of excerpts for the grid layout, leave blank or set is 0 if you want to disable it.', 'newsmax' ),
					'default'  => 20
				),
				array(
					'id'       => 'blog_excerpt_length_list_1',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'List 1 - Excerpt Length', 'newsmax' ),
					'subtitle' => esc_html__( 'select length of excerpts for the list 1 layout, leave blank or set is 0 if you want to disable it.', 'newsmax' ),
					'default'  => 20
				),
				array(
					'id'       => 'blog_excerpt_length_list_2',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'List 2 - Excerpt Length', 'newsmax' ),
					'subtitle' => esc_html__( 'select length of excerpts for the list 2 layout, leave blank or set is 0 if you want to disable it.', 'newsmax' ),
					'default'  => 30
				),
				array(
					'id'       => 'blog_excerpt_summary_classic_1',
					'title'    => esc_html__( 'Classic 1 - Summary Type', 'newsmax' ),
					'subtitle' => esc_html__( 'Select a summary type for the classic 1 layout.', 'newsmax' ),
					'type'     => 'select',
					'options'  => array(
						'excerpt' => esc_html__( 'Use Post Excerpt', 'newsmax' ),
						'moretag' => esc_html__( 'Use More Tag', 'newsmax' ),
					),
					'default'  => 'excerpt'
				),
				array(
					'id'       => 'blog_excerpt_length_classic_1',
					'type'     => 'text',
					'required' => array( 'blog_excerpt_summary_classic_1', '=', 'excerpt' ),
					'title'    => esc_html__( 'Classic 1 - Excerpt Length', 'newsmax' ),
					'subtitle' => esc_html__( 'select length of excerpts for the classic 1 layout, leave blank or set is 0 if you want to disable it.', 'newsmax' ),
					'class'    => 'small-text',
					'validate' => 'numeric',
					'default'  => 40
				),
				array(
					'id'       => 'blog_excerpt_length_classic_2',
					'type'     => 'text',
					'title'    => esc_html__( 'Classic 2 - Excerpt Length', 'newsmax' ),
					'subtitle' => esc_html__( 'select length of excerpts for the classic 1 layout, leave blank or set is 0 if you want to disable it.', 'newsmax' ),
					'class'    => 'small-text',
					'validate' => 'numeric',
					'default'  => 40
				),
				array(
					'id'     => 'section_end_blog_styling_excerpt',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//blog style
				array(
					'id'     => 'section_start_blog_styling_style',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Featured Position Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'blog_style_list_thumb_position',
					'title'    => esc_html__( 'List - Thumbnail Position', 'newsmax' ),
					'subtitle' => esc_html__( 'select thumbnail position for list layouts', 'newsmax' ),
					'type'     => 'select',
					'options'  => array(
						0 => esc_html__( 'Float Left', 'newsmax' ),
						1 => esc_html__( 'Float Right', 'newsmax' ),
					),
					'default'  => 0
				),
				array(
					'id'       => 'blog_style_classic_2',
					'title'    => esc_html__( 'Classic 2 & List - Color Style', 'newsmax' ),
					'subtitle' => esc_html__( 'Select color style for the classic 2 layout and list layouts', 'newsmax' ),
					'type'     => 'select',
					'options'  => array(
						'light' => esc_html__( 'Light', 'newsmax' ),
						'dark'  => esc_html__( 'Dark', 'newsmax' ),
					),
					'default'  => 'light'
				),
				array(
					'id'     => 'section_end_blog_styling_style',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}