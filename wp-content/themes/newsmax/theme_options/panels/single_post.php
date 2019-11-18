<?php
//single post opitons
if ( ! function_exists( 'newsmax_ruby_theme_options_single_post' ) ) {
	function newsmax_ruby_theme_options_single_post() {
		return array(
			'title' => esc_html__( 'Single Post Options', 'newsmax' ),
			'id'    => 'newsmax_ruby_config_section_single_post',
			'desc'  => esc_html__( 'select options for single post pages, options below will apply to all single post pages.', 'newsmax' ),
			'icon'  => 'el el-file',
		);
	}
}

//single styling
if ( ! function_exists( 'newsmax_ruby_theme_options_single_post_styling' ) ) {
	function newsmax_ruby_theme_options_single_post_styling() {

		return array(
			'title'      => esc_html__( 'Single Post Styling', 'newsmax' ),
			'id'         => 'newsmax_ruby_config_section_single_post_styling',
			'desc'       => esc_html__( 'options below will apply to all single post pages.', 'newsmax' ),
			'icon'       => 'el el-adjust-alt',
			'subsection' => true,
			'fields'     => array(

				array(
					'id'     => 'section_start_single_cat_info',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Single - Category Info Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_cat_info',
					'type'     => 'switch',
					'title'    => esc_html__( 'Category Info', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable the category info for single post pages.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'     => 'section_end_single_post_cat_info',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_single_meta_info',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Single - Meta Info Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_meta_info_manager',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Entry Meta Bar Manager', 'newsmax' ),
					'subtitle' => esc_html__( 'organize how you want the entry meta info to appear in single post pages.', 'newsmax' ),
					'options'  => array(
						'enabled'  => array(
							'author'  => esc_html__( 'Author', 'newsmax' ),
							'comment' => esc_html__( 'Comment', 'newsmax' )
						),
						'disabled' => array(
							'date' => esc_html__( 'Date', 'newsmax' ),
							'cat'  => esc_html__( 'Category', 'newsmax' ),
							'tag'  => esc_html__( 'Tag', 'newsmax' ),
							'view' => esc_html__( 'View', 'newsmax' )
						)
					),
				),
				array(
					'id'       => 'single_post_counter_type',
					'title'    => esc_html__( 'Share/View Type', 'newsmax' ),
					'subtitle' => esc_html__( 'select a total counter type to display at the bottom of featured images in single post pages.', 'newsmax' ),
					'type'     => 'select',
					'options'  => array(
						'view'  => esc_html__( 'Total View', 'newsmax' ),
						'share' => esc_html__( 'Total Share', 'newsmax' ),
						'all'   => esc_html__( 'Total Share/View', 'newsmax' ),
						'none'  => esc_html__( 'None', 'newsmax' )
					),
					'default'  => 'none'
				),
				array(
					'id'       => 'single_post_counter_caption',
					'type'     => 'switch',
					'title'    => esc_html__( 'Share/View Caption Text', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable the caption text at the end of total view/share elements.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_post_full_date',
					'type'     => 'switch',
					'title'    => esc_html__( 'Full Date Info', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable full format date meta info.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_post_full_date_format',
					'type'     => 'text',
					'required' => array( 'single_post_full_date', '=', 1 ),
					'title'    => esc_html__( 'Full Date Info - Date Format', 'newsmax' ),
					'subtitle' => esc_html__( 'input your date format for the small date element in single post, The default value is M. d, Y', 'newsmax' ),
					'switch'   => true,
					'default'  => 'M. d, Y'
				),
				array(
					'id'       => 'single_post_full_time_format',
					'type'     => 'text',
					'required' => array( 'single_post_full_date', '=', 1 ),
					'title'    => esc_html__( 'Full Date Info - Time Format', 'newsmax' ),
					'subtitle' => esc_html__( 'input your time format for the small date element in single post, The default value is g:i a', 'newsmax' ),
					'switch'   => true,
					'default'  => 'g:i a'
				),

				array(
					'id'       => 'single_post_big_avatar',
					'type'     => 'switch',
					'title'    => esc_html__( 'Avatar Icon', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable avatar icon in the single meta info bar.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),

				array(
					'id'     => 'section_end_single_post_meta_info',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_single_post_image_popup',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Single - Image Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_image_popup',
					'type'     => 'switch',
					'title'    => esc_html__( 'Images Popup', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable popup images as a gallery in single post content.', 'newsmax' ),
					'desc'     => esc_html__( 'This feature can work if images were been set link to "media file".', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'     => 'section_end_single_post_image_popup',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_single_post_box_review',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Single - Review Box Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'single_review_box_position',
					'title'    => esc_html__( 'Review Box Position', 'newsmax' ),
					'subtitle' => esc_html__( 'Select position for review boxes in single post pages.', 'newsmax' ),
					'type'     => 'image_select',
					'options'  => newsmax_ruby_theme_config::review_box_position(),
					'default'  => 'bottom'
				),
				array(
					'id'       => 'single_review_box_title_summary',
					'type'     => 'text',
					'title'    => esc_html__( 'Summary Title', 'newsmax' ),
					'subtitle' => esc_html__( 'input a title for summary sections.', 'newsmax' ),
					'default'  => esc_html__( 'Summary', 'newsmax' )
				),
				array(
					'id'       => 'single_review_box_title_pros',
					'type'     => 'text',
					'title'    => esc_html__( 'Pros Title', 'newsmax' ),
					'subtitle' => esc_html__( 'input a title for pros sections.', 'newsmax' ),
					'default'  => esc_html__( 'The Pros', 'newsmax' )
				),
				array(
					'id'       => 'single_review_box_title_cons',
					'type'     => 'text',
					'title'    => esc_html__( 'Cons Title', 'newsmax' ),
					'subtitle' => esc_html__( 'input a title for cons sections.', 'newsmax' ),
					'default'  => esc_html__( 'The Cons', 'newsmax' )
				),
				array(
					'id'     => 'section_end_single_post_box_review',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_single_post_box',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Single - Box Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_box_navigation',
					'type'     => 'switch',
					'title'    => esc_html__( 'Next/Prev Navigation', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable the next/previous link navigation in single post pages.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_post_box_author',
					'type'     => 'switch',
					'title'    => esc_html__( 'Author Card Box', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable the author card in single post page.', 'newsmax' ),
					'desc'     => esc_html__( 'The author card box requests author information (Users > Your profiles) for displaying.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_post_tag',
					'type'     => 'switch',
					'title'    => esc_html__( 'Tags Bar', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable tag bars at the bottom of post contents.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_post_like',
					'type'     => 'switch',
					'title'    => esc_html__( 'LIKE/TWEET/G+ Buttons', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable post like/tweet/g+ buttons at the bottom of post contents.', 'newsmax' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'     => 'section_end_single_post_box',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_single_post_box_comment',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Single - Comment Box Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_box_comment_button',
					'type'     => 'switch',
					'title'    => esc_html__( 'Button to Show Comment Box', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable show/hide comment box buttons in single post pages.', 'newsmax' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'single_post_box_comment_web',
					'type'     => 'switch',
					'title'    => esc_html__( 'Disable Website Form', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable website input form in comment areas.', 'newsmax' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'     => 'section_end_single_post_box_comment',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_single_post_content_padding',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Single - Content Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_content_padding',
					'type'     => 'switch',
					'title'    => esc_html__( 'Single Content Padding', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable left/right padding for single post contents.', 'newsmax' ),
					'default'  => 0
				),
				array(
					'id'     => 'section_end_single_post_content_padding',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			),
		);
	}
}

//single layout
if ( ! function_exists( 'newsmax_ruby_theme_options_single_post_layout' ) ) {
	function newsmax_ruby_theme_options_single_post_layout() {

		return array(
			'title'      => esc_html__( 'Single Layout Options', 'newsmax' ),
			'id'         => 'newsmax_ruby_config_section_single_post_layout',
			'desc'       => esc_html__( 'Select default layout for the single post page, this option will apply to all single posts page. You can set an individual layout for each post in the post editor page.', 'newsmax' ),
			'icon'       => 'el el-laptop',
			'subsection' => true,
			'fields'     => array(

				array(
					'id'     => 'section_start_section_layout_featured',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Featured Image Post Layouts (Default Post Format)', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_layout_featured',
					'type'     => 'image_select',
					'title'    => esc_html__( 'single - featured image layout', 'newsmax' ),
					'subtitle' => esc_html__( 'select layout for the single post page (default post format), this option will apply to the default post format type.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::single_post_layout_featured(),
					'default'  => '1',
				),
				array(
					'id'       => 'single_post_featured_size',
					'type'     => 'select',
					'title'    => esc_html__( 'Featured Image Size', 'newsmax' ),
					'subtitle' => esc_html__( 'select size for the featured image, this option will apply to all single post layouts.', 'newsmax' ),
					'options'  => array(
						'full' => esc_html__( 'Full Size', 'newsmax' ),
						'crop' => esc_html__( 'Crop Size', 'newsmax' )
					),
					'default'  => 'crop',
				),
				array(
					'id'       => 'single_post_header_parallax',
					'type'     => 'switch',
					'title'    => esc_html__( 'parallax animation', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable parallax animation for the featured image. this option will only apply to a few featured layouts.', 'newsmax' ),
					'default'  => 0,
				),
				array(
					'id'     => 'section_end_section_layout_featured',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_section_layout_video',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Video Post Format Layouts (Video Post Format)', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_style_video',
					'type'     => 'select',
					'title'    => esc_html__( 'single - video iframe style', 'newsmax' ),
					'subtitle' => esc_html__( 'select iframe style for all video post format', 'newsmax' ),
					'options'  => array(
						'1' => esc_html__( 'Replace featured image', 'newsmax' ),
						'2' => esc_html__( 'Popup with play button', 'newsmax' ),
					),
					'default'  => '1',
				),
				array(
					'id'       => 'single_post_layout_video',
					'type'     => 'image_select',
					'required' => array( 'single_post_style_video', '=', '1' ),
					'title'    => esc_html__( 'single - video layout', 'newsmax' ),
					'subtitle' => esc_html__( 'Select layout for the single post page (video post format), this option will apply to the video format type.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::single_post_layout_video(),
					'default'  => '1',
				),
				array(
					'id'       => 'single_post_video_autoplay',
					'type'     => 'switch',
					'required' => array( 'single_post_style_video', '=', '1' ),
					'title'    => esc_html__( 'Auto Play Video', 'newsmax' ),
					'subtitle' => esc_html__( 'auto play the featured video when opened single video post format ', 'newsmax' ),
					'default'  => '0',
				),
				array(
					'id'     => 'section_end_section_layout_video',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_section_layout_audio',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Audio Post Format Layouts (Audio Post Format)', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_layout_audio',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Single - Audio Layout', 'newsmax' ),
					'subtitle' => esc_html__( 'select layout for the single post page. this option will apply to the audio post format type.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::single_post_layout_audio(),
					'default'  => '1',
				),
				array(
					'id'     => 'section_end_section_layout_audio',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_section_layout_gallery',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Single - Gallery Layout', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_layout_gallery',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Gallery Post Layout', 'newsmax' ),
					'subtitle' => esc_html__( 'select layout for the single post page. this option will apply to the gallery post format type.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::single_post_layout_gallery(),
					'default'  => '1',

				),
				array(
					'id'     => 'section_end_section_layout_gallery',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_section_single_post_header_align',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Header Align Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_header_position',
					'type'     => 'select',
					'title'    => esc_html__( 'Single - Header Align', 'newsmax' ),
					'subtitle' => esc_html__( 'select a style for single headers: left or center.', 'newsmax' ),
					'options'  => array(
						'left'   => esc_html__( 'Left Mode', 'newsmax' ),
						'center' => esc_html__( 'Center Mode', 'newsmax' ),
					),
					'default'  => 'left',
				),
				array(
					'id'     => 'section_end_section_single_post_header_align',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_single_post_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Single - Sidebar Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_sidebar_name',
					'type'     => 'select',
					'title'    => esc_html__( 'Single Sidebar Name', 'newsmax' ),
					'subtitle' => esc_html__( 'select a sidebar for single post pages, this option will apply to all single posts pages. You can set an individual sidebar for each post in the post editor page.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::sidebar_name(),
					'default'  => 'newsmax_ruby_sidebar_default'
				),
				array(
					'id'       => 'single_post_sidebar_position',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Single Sidebar Position', 'newsmax' ),
					'subtitle' => esc_html__( 'select sidebar position for single post pages, this option will override default sidebar position option and will apply to all single post pages, You can set an individual sidebar position for each post in the post editor page.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::sidebar_position(),
					'default'  => 'default'
				),
				array(
					'id'     => 'section_end_single_post_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			),
		);
	}
}


//single shares
if ( ! function_exists( 'newsmax_ruby_theme_options_single_post_share' ) ) {
	function newsmax_ruby_theme_options_single_post_share() {

		return array(
			'title'      => esc_html__( 'Share on Socials', 'newsmax' ),
			'id'         => 'newsmax_ruby_config_section_single_post_share',
			'desc'       => esc_html__( 'select share on socials options for single post pages.', 'newsmax' ),
			'icon'       => 'el el-share',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'     => 'section_start_single_post_social_top',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Top - Share Bar Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_share_top',
					'type'     => 'switch',
					'title'    => esc_html__( 'Top -Share On Social', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable share on socials bars at top of single post contents.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_share_facebook',
					'type'     => 'switch',
					'required' => array( 'single_post_share_top', '=', '1' ),
					'title'    => esc_html__( 'Share On Facebook', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable share on Facebook.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_share_twitter',
					'type'     => 'switch',
					'required' => array( 'single_post_share_top', '=', '1' ),
					'title'    => esc_html__( 'Share On Twitter', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable share on Twitter.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_share_googleplus',
					'type'     => 'switch',
					'required' => array( 'single_post_share_top', '=', '1' ),
					'title'    => esc_html__( 'Share On Google Plus', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable share on Google plus.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_share_pinterest',
					'type'     => 'switch',
					'required' => array( 'single_post_share_top', '=', '1' ),
					'title'    => esc_html__( 'Share On Pinterest', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable share on Pinterest.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_share_linkedin',
					'type'     => 'switch',
					'required' => array( 'single_post_share_top', '=', '1' ),
					'title'    => esc_html__( 'Share On LinkedIn', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable share on LinkedIn.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_share_tumblr',
					'type'     => 'switch',
					'required' => array( 'single_post_share_top', '=', '1' ),
					'title'    => esc_html__( 'Share On Tumblr', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable share on Tumblr.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_share_reddit',
					'type'     => 'switch',
					'required' => array( 'single_post_share_top', '=', '1' ),
					'title'    => esc_html__( 'Share On Reddit', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable share on Reddit.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_share_vk',
					'type'     => 'switch',
					'required' => array( 'single_post_share_top', '=', '1' ),
					'title'    => esc_html__( 'Share On Vkontakte', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable share on Vkontakte.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_share_email',
					'type'     => 'switch',
					'required' => array( 'single_post_share_top', '=', '1' ),
					'title'    => esc_html__( 'Share On Email', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable share on Email.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'     => 'section_end_single_post_social_top',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_single_post_social_bottom',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Bottom - Share Bar(Big) Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_share_bottom',
					'type'     => 'switch',
					'title'    => esc_html__( 'Bottom - Share On Social Bar', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable share on socials bars at bottom of single post contents.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_share_big_facebook',
					'type'     => 'switch',
					'required' => array( 'single_post_share_bottom', '=', '1' ),
					'title'    => esc_html__( 'Share On Facebook', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable share on Facebook.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_share_big_twitter',
					'type'     => 'switch',
					'required' => array( 'single_post_share_bottom', '=', '1' ),
					'title'    => esc_html__( 'Share On Twitter', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable share on Twitter.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_share_big_googleplus',
					'type'     => 'switch',
					'required' => array( 'single_post_share_bottom', '=', '1' ),
					'title'    => esc_html__( 'Share On Google Plus', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable share on Google Plus.', 'newsmax' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'single_share_big_pinterest',
					'type'     => 'switch',
					'required' => array( 'single_post_share_bottom', '=', '1' ),
					'title'    => esc_html__( 'Share On Pinterest', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable share on Pinterest.', 'newsmax' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'single_share_big_linkedin',
					'type'     => 'switch',
					'required' => array( 'single_post_share_bottom', '=', '1' ),
					'title'    => esc_html__( 'Share On LinkedIn', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable share on LinkedIn.', 'newsmax' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'single_share_big_tumblr',
					'type'     => 'switch',
					'required' => array( 'single_post_share_bottom', '=', '1' ),
					'title'    => esc_html__( 'Share On Tumblr', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable share on Tumblr.', 'newsmax' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'single_share_big_reddit',
					'type'     => 'switch',
					'required' => array( 'single_post_share_bottom', '=', '1' ),
					'title'    => esc_html__( 'Share On Reddit', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable share on Reddit.', 'newsmax' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'single_share_big_vk',
					'type'     => 'switch',
					'required' => array( 'single_post_share_bottom', '=', '1' ),
					'title'    => esc_html__( 'Share On Vkontakte', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable share on Vkontakte.', 'newsmax' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'single_share_big_email',
					'type'     => 'switch',
					'required' => array( 'single_post_share_bottom', '=', '1' ),
					'title'    => esc_html__( 'Share On Email', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable share on Email.', 'newsmax' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'     => 'section_end_single_post_social_bottom',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			),
		);
	}
}

//single ajax
if ( ! function_exists( 'newsmax_ruby_theme_options_single_post_ajax' ) ) {
	function newsmax_ruby_theme_options_single_post_ajax() {
		return array(
			'title'      => esc_html__( 'Single Ajax Options', 'newsmax' ),
			'id'         => 'newsmax_ruby_config_section_single_post_ajax',
			'desc'       => esc_html__( 'options below will apply to all single post pages, You can set an individual ajax option for each post in the post editor page.', 'newsmax' ),
			'icon'       => 'el el-refresh',
			'subsection' => true,
			'fields'     => array(
				//single ajax
				array(
					'id'     => 'section_start_single_post_ajax',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Single - Ajax Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_ajax_type',
					'title'    => esc_html__( 'Single Ajax Type', 'newsmax' ),
					'subtitle' => esc_html__( 'select an ajax type for the single post pages. Single post layout 7 (full-screen) will be changed to 4 if you enable "Infinite Load Older Posts".', 'newsmax' ),
					'type'     => 'select',
					'options'  => array(
						'scroll_related' => esc_html__( 'Ajax Load Related Posts', 'newsmax' ),
						'scroll'         => esc_html__( 'Infinite Load Older Posts', 'newsmax' ),
						'none'           => esc_html__( 'None', 'newsmax' )
					),
					'default'  => 'none',
				),
				array(
					'id'       => 'single_post_scroll_hide_sidebar',
					'title'    => esc_html__( 'Hide Sidebar On Mobile', 'newsmax' ),
					'subtitle' => esc_html__( 'Hide sidebars in single pages when enabling infinite load old posts on mobile devices.', 'newsmax' ),
					'type'     => 'switch',
					'default'  => '1',
				),
				array(
					'id'       => 'single_post_related_pagination',
					'title'    => esc_html__( 'Related Ajax Pagination', 'newsmax' ),
					'subtitle' => esc_html__( 'select a pagination type for the related block.', 'newsmax' ),
					'type'     => 'select',
					'options'  => array(
						'1' => esc_html__( 'Default - Infinite Load', 'newsmax' ),
						'2' => esc_html__( 'Load More Button', 'newsmax' )
					),
					'default'  => '1',
				),
				array(
					'id'     => 'section_end_single_post_ajax',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_single_post_ajax_view',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Single - Ajax Views Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'ajax_view',
					'type'     => 'switch',
					'title'    => esc_html__( 'Ajax Views', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable ajax view counter, it is useful when you using a cache plugin for your website.', 'newsmax' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'     => 'section_end_single_post_ajax_view',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			),
		);
	}
}



