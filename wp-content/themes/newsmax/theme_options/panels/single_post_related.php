<?php
//related
if ( ! function_exists( 'newsmax_ruby_theme_options_single_post_related' ) ) {
	function newsmax_ruby_theme_options_single_post_related() {
		return array(
			'title'      => esc_html__( 'Single Related Options', 'newsmax' ),
			'id'         => 'newsmax_ruby_config_section_single_post_related',
			'desc'       => esc_html__( 'select options for related boxes. Newsmax supports ajax feature for related boxes, You can enable this feature in "Single Ajax Options" or in post editor page.', 'newsmax' ),
			'icon'       => 'el el-paper-clip ',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'     => 'section_start_single_post_box_related',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Single - Related Box Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_box_related',
					'type'     => 'switch',
					'title'    => esc_html__( 'Related Box', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable the related box in single post pages.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_post_box_related_title',
					'type'     => 'text',
					'required' => array( 'single_post_box_related', '=', '1' ),
					'title'    => esc_html__( 'Related Title', 'newsmax' ),
					'subtitle' => esc_html__( 'input a title for the related box.', 'newsmax' ),
					'default'  => 'You Might Also Like'
				),
				array(
					'id'       => 'single_post_box_related_layout',
					'type'     => 'image_select',
					'required' => array( 'single_post_box_related', '=', '1' ),
					'title'    => esc_html__( 'Related Box Layout', 'newsmax' ),
					'subtitle' => esc_html__( 'select a layout for the related box.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::related_layout(),
					'default'  => '2'
				),
				array(
					'id'       => 'single_post_box_related_where',
					'type'     => 'select',
					'required' => array( 'single_post_box_related', '=', '1' ),
					'title'    => esc_html__( 'Related Filter', 'newsmax' ),
					'subtitle' => esc_html__( 'What posts should be displayed in the related box.', 'newsmax' ),
					'options'  => array(
						'all' => esc_html__( 'Same Tags & Categories', 'newsmax' ),
						'tag' => esc_html__( 'Same Tags', 'newsmax' ),
						'cat' => esc_html__( 'Same Categories', 'newsmax' ),
					),
					'default'  => 'all'
				),
				array(
					'id'       => 'single_post_box_related_num',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'required' => array( 'single_post_box_related', '=', '1' ),
					'title'    => esc_html__( 'Number of Posts', 'newsmax' ),
					'subtitle' => esc_html__( 'select number of posts to show at once.', 'newsmax' ),
					'default'  => 6
				),
				array(
					'id'     => 'section_end_single_post_box_related',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_single_post_box_related_video',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Video Format - Related Box Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_box_related_video',
					'type'     => 'switch',
					'title'    => esc_html__( 'Video Format - Related Box', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable the video related box (video format) for single post pages.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_post_box_related_video_title',
					'type'     => 'text',
					'required' => array( 'single_post_box_related_video', '=', '1' ),
					'title'    => esc_html__( 'Video Format - Related Title', 'newsmax' ),
					'subtitle' => esc_html__( 'input a title for the video related box.', 'newsmax' ),
					'default'  => 'You Might Also Like'
				),
				array(
					'id'       => 'single_post_box_related_video_where',
					'type'     => 'select',
					'required' => array( 'single_post_box_related_video', '=', '1' ),
					'title'    => esc_html__( 'Video Format - Related Filter', 'newsmax' ),
					'subtitle' => esc_html__( 'What video posts should be displayed in video related box.', 'newsmax' ),
					'options'  => array(
						'all' => esc_html__( 'Same Tags & Categories', 'newsmax' ),
						'tag' => esc_html__( 'Same Tags', 'newsmax' ),
						'cat' => esc_html__( 'Same Categories', 'newsmax' ),
					),
					'default'  => 'all'
				),
				array(
					'id'       => 'single_post_related_video_disable_related',
					'type'     => 'switch',
					'required' => array( 'single_post_box_related_video', '=', '1' ),
					'title'    => esc_html__( 'Video Format - Disable Standard Related Box', 'newsmax' ),
					'subtitle' => esc_html__( 'disable or enable the standard related box in video post pages.', 'newsmax' ),
					'default'  => 0
				),
				array(
					'id'     => 'section_end_single_post_box_related_video',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			),
		);
	}
}


//recommended section
if ( ! function_exists( 'newsmax_ruby_theme_options_single_post_recommended' ) ) {
	function newsmax_ruby_theme_options_single_post_recommended() {
		return array(
			'title'      => esc_html__( 'Recommended Section', 'newsmax' ),
			'id'         => 'newsmax_ruby_config_section_single_post_recommended',
			'desc'       => esc_html__( 'select options for the recommended section, this section will diplay at the footer of single post pages.', 'newsmax' ),
			'icon'       => 'el el-paper-clip ',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'     => 'section_start_single_post_box_recommended',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Single - Recommended Section Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_box_recommended',
					'type'     => 'switch',
					'title'    => esc_html__( 'Recommended Section', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable the recommended section at the footer or single post pages.', 'newsmax' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'single_post_box_recommended_title',
					'type'     => 'text',
					'required' => array( 'single_post_box_related', '=', '1' ),
					'title'    => esc_html__( 'Recommended Section - Title', 'newsmax' ),
					'subtitle' => esc_html__( 'input a title for the recommended section.', 'newsmax' ),
					'default'  => 'Recommended For You'
				),
				array(
					'id'       => 'single_post_box_recommended_layout',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Section Layout', 'newsmax' ),
					'subtitle' => esc_html__( 'select a layout for the recommended section.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::recommended_layout(),
					'default'  => '1'
				),
				array(
					'id'       => 'single_post_box_recommended_cat',
					'type'     => 'select',
					'title'    => esc_html__( 'Categories Filter', 'newsmax' ),
					'subtitle' => esc_html__( 'Filter categories you want to show in this section.', 'newsmax' ),
					'options'  => array(
						'cat' => esc_html__( 'Same Post Categories', 'newsmax' ),
						'all' => esc_html__( 'All Categories', 'newsmax' ),
					),
					'default'  => 'all'
				),
				array(
					'id'       => 'single_post_box_recommended_tag',
					'type'     => 'select',
					'title'    => esc_html__( 'Tags Filter', 'newsmax' ),
					'subtitle' => esc_html__( 'Filter tags you want to show in this section.', 'newsmax' ),
					'options'  => array(
						'tag' => esc_html__( 'Same Post Tags', 'newsmax' ),
						'all' => esc_html__( 'All Tags', 'newsmax' ),
					),
					'default'  => 'all'
				),
				array(
					'id'       => 'single_post_box_recommended_orderby',
					'type'     => 'select',
					'title'    => esc_html__( 'Sorted By', 'newsmax' ),
					'subtitle' => esc_html__( 'select a sort type for this section.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::post_orders(),
					'default'  => 'date_post'
				),
				array(
					'id'       => 'single_post_box_recommended_number',
					'title'    => esc_html__( 'Number of posts', 'newsmax' ),
					'subtitle' => esc_html__( 'select number of posts for this section.', 'newsmax' ),
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'default'  => 9
				),
				array(
					'id'       => 'single_post_box_recommended_offset',
					'title'    => esc_html__( 'Offset of Posts', 'newsmax' ),
					'subtitle' => esc_html__( 'select number of posts to displace or pass over. The beginning number is 0.', 'newsmax' ),
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'default'  => 0
				),
				array(
					'id'     => 'section_end_single_post_box_recommended',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			),
		);
	}
}
