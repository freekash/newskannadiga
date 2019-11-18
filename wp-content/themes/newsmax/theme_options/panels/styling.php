<?php
if ( ! function_exists( 'newsmax_ruby_theme_options_styling' ) ) {
	function newsmax_ruby_theme_options_styling() {

		return array(
			'id'     => 'newsmax_ruby_config_section_styling',
			'title'  => esc_html__( 'Elements Styling', 'newsmax' ),
			'desc'   => esc_html__( 'select styles for blog post elements, options below will apply to all blocks, pages, and modules on your website.', 'newsmax' ),
			'icon'   => 'el el-adjust-alt',
			'fields' => array(

				array(
					'id'     => 'section_start_block_button_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Block/Button Style Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'site_block_header_style',
					'type'     => 'select',
					'title'    => esc_html__( 'BLock/Widget Header Style', 'newsmax' ),
					'subtitle' => esc_html__( 'select a style for block/widget header, this option will apply to all header of blocks and widgets.', 'newsmax' ),
					'options'  => array(
						'1' => esc_html__( 'Style 1', 'newsmax' ),
						'2' => esc_html__( 'Style 2', 'newsmax' ),
						'3' => esc_html__( 'Style 3', 'newsmax' ),
						'4' => esc_html__( 'Style 4', 'newsmax' ),
						'5' => esc_html__( 'Style 5', 'newsmax' )
					),
					'default'  => '1'
				),
				array(
					'id'       => 'post_cat_info_style',
					'type'     => 'select',
					'title'    => esc_html__( 'Category Info Style', 'newsmax' ),
					'subtitle' => esc_html__( 'select a style for the category info, this option will apply to whole your website.', 'newsmax' ),
					'options'  => array(
						'1' => esc_html__( '-- Style 1--', 'newsmax' ),
						'2' => esc_html__( 'Style 2', 'newsmax' ),
						'3' => esc_html__( 'Style 3', 'newsmax' ),
						'4' => esc_html__( 'Style 4', 'newsmax' ),
						'5' => esc_html__( 'Style 5', 'newsmax' ),
						'6' => esc_html__( 'Style 6', 'newsmax' ),
					),
					'default'  => '1'
				),
				array(
					'id'       => 'button_style',
					'type'     => 'select',
					'title'    => esc_html__( 'Social/Review/Button Style', 'newsmax' ),
					'subtitle' => esc_html__( 'select a style for your website buttons.', 'newsmax' ),
					'options'  => array(
						'1' => esc_html__( 'Curve - Default', 'newsmax' ),
						'2' => esc_html__( 'Circle', 'newsmax' ),
						'3' => esc_html__( 'Square', 'newsmax' )
					),
					'default'  => 1
				),

				array(
					'id'     => 'section_end_block_button_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//entry meta info
				array(
					'id'     => 'section_start_block_entry_meta_info',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Entry Meta Info Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'post_meta_info_manager',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Left - Entry Meta Info', 'newsmax' ),
					'subtitle' => esc_html__( 'organize how you want the entry meta info to appear on blog posts.', 'newsmax' ),
					'options'  => array(
						'enabled'  => array(
							'author' => esc_html__( 'Author', 'newsmax' ),
							'date'   => esc_html__( 'Date', 'newsmax' ),
						),
						'disabled' => array(
							'cat'     => esc_html__( 'Category', 'newsmax' ),
							'tag'     => esc_html__( 'Tag', 'newsmax' ),
							'view'    => esc_html__( 'View', 'newsmax' ),
							'comment' => esc_html__( 'Comment', 'newsmax' ),
							'share'   => esc_html__( 'Share', 'newsmax' )
						)
					),
				),
				array(
					'id'       => 'post_meta_info_right',
					'type'     => 'select',
					'title'    => esc_html__( 'Right - Entry Meta Info', 'newsmax' ),
					'subtitle' => esc_html__( 'Select a element for displaying at the right of meta info bars.', 'newsmax' ),
					'options'  => array(
						0         => esc_html__( 'None', 'newsmax' ),
						'view'    => esc_html__( 'Total Views', 'newsmax' ),
						'comment' => esc_html__( 'Total Comments', 'newsmax' ),
						'share'   => esc_html__( 'Total Shares', 'newsmax' )
					),
					'default'  => 'view'
				),
				array(
					'id'       => 'post_meta_info_icon',
					'title'    => esc_html__( 'Meta Info Icon', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable meta info icons.', 'newsmax' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'post_meta_info_icon_avatar',
					'title'    => esc_html__( 'Author Avatar Image', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable author avatar images in meta info bars.', 'newsmax' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'       => 'human_time',
					'title'    => esc_html__( 'Human Time (Ago)', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable the human time ("ago" time), This plugin is not compatible with cache plugins.', 'newsmax' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'     => 'section_end_block_entry_meta_info',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//post thumbnail
				array(
					'id'     => 'section_start_post_thumbnail',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Featured Thumbnail Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'thumbnail_overlay',
					'type'     => 'select',
					'title'    => esc_html__( 'Overlay Strength', 'newsmax' ),
					'subtitle' => esc_html__( 'select a overlay strength for thumbnails on your website.', 'newsmax' ),
					'options'  => array(
						'1' => esc_html__( 'Medium - Default', 'newsmax' ),
						'2' => esc_html__( 'Light', 'newsmax' ),
						'3' => esc_html__( 'Dark', 'newsmax' )
					),
					'default'  => 1
				),
				array(
					'id'       => 'thumbnail_size_classic',
					'type'     => 'select',
					'title'    => esc_html__( 'Classic Thumbnail Size', 'newsmax' ),
					'subtitle' => esc_html__( 'select a thumbnail size for classic layouts, this options will apply to all classic and classic-1 layouts.', 'newsmax' ),
					'options'  => array(
						'1' => esc_html__( 'Full Size', 'newsmax' ),
						'2' => esc_html__( 'Crop Size', 'newsmax' ),
					),
					'default'  => 2
				),
				array(
					'id'       => 'gif_support',
					'type'     => 'switch',
					'title'    => esc_html__( 'GIF Support', 'newsmax' ),
					'subtitle' => esc_html__( 'Enable or disable GIF image support.', 'newsmax' ),
					'default'  => 1
				),
				array(
					'id'     => 'section_end_post_thumbnail',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//post format icon
				array(
					'id'     => 'section_start_post_format',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Format Icon Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'post_format_video',
					'type'     => 'switch',
					'title'    => esc_html__( 'Video Format Icon', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable video format icons on blog posts.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'post_format_audio',
					'type'     => 'switch',
					'title'    => esc_html__( 'Audio Format Icon', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable audio format icons on blog posts.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'post_format_gallery',
					'type'     => 'switch',
					'title'    => esc_html__( 'Gallery Format Icon', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable gallery format icons on blog posts.', 'newsmax' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'     => 'section_end_post_format',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),

				array(
					'id'     => 'section_start_post_excerpt',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Post - Excerpt Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'post_excerpt_mobile',
					'type'     => 'switch',
					'title'    => esc_html__( 'Hide Excerpt On Mobile', 'newsmax' ),
					'subtitle' => esc_html__( 'show or hide the excerpt of blog posts on mobile devices (screen width < 768px).', 'newsmax' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'     => 'section_end_post_post_excerpt',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//button
				array(
					'id'     => 'section_start_post_button',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Button Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'post_readmore',
					'type'     => 'switch',
					'title'    => esc_html__( 'Read More Button', 'newsmax' ),
					'subtitle' => esc_html__( 'Enable or disable read more button. This option will be apply to grid, list and classic layouts.', 'newsmax' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'post_readmore_text',
					'type'     => 'text',
					'title'    => esc_html__( 'Read More Text', 'newsmax' ),
					'subtitle' => esc_html__( 'input your read more text.', 'newsmax' ),
					'switch'   => true,
					'default'  => esc_html__( 'read more', 'newsmax' )
				),
				array(
					'id'       => 'post_review',
					'type'     => 'switch',
					'title'    => esc_html__( 'Review Score Icon', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable total score icons on featured images, post format and video duration icons can be removed if this visible.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'     => 'section_end_post_button',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),

				array(
					'id'     => 'section_start_block_post_share_icon',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Share on Socials Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'share_facebook',
					'type'     => 'switch',
					'title'    => esc_html__( 'Share On Facebook', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable share on Facebook.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'share_twitter',
					'type'     => 'switch',
					'title'    => esc_html__( 'Share On Twitter', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable share on Twitter.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'share_googleplus',
					'type'     => 'switch',
					'title'    => esc_html__( 'Share On Google Plus', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable share on Google Plus.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'share_pinterest',
					'type'     => 'switch',
					'title'    => esc_html__( 'Share On Pinterest', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable share on Pinterest.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'share_linkedin',
					'type'     => 'switch',
					'title'    => esc_html__( 'Share On LinkedIn', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable share on LinkedIn.', 'newsmax' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'share_tumblr',
					'type'     => 'switch',
					'title'    => esc_html__( 'Share On Tumblr', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable share on Tumblr.', 'newsmax' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'share_reddit',
					'type'     => 'switch',
					'title'    => esc_html__( 'Share On Reddit', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable share on Reddit.', 'newsmax' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'share_vk',
					'type'     => 'switch',
					'title'    => esc_html__( 'Share On Vkontakte', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable share on Vkontakte.', 'newsmax' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'share_email',
					'type'     => 'switch',
					'title'    => esc_html__( 'Share On Email', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable share on Email.', 'newsmax' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'     => 'section_end_post_share_icon',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}