<?php

//Site social
if ( ! function_exists( 'newsmax_ruby_theme_options_social_profile' ) ) {
	function newsmax_ruby_theme_options_social_profile() {
		return array(
			'id'     => 'social_theme_options_section_social_profile',
			'title'  => esc_html__( 'Social Profiles', 'newsmax' ),
			'icon'   => 'el el-twitter',
			'desc'   => esc_html__( 'options below for setting up the sites socials. To add users/authors socials, go to the Users -> your site profile.', 'newsmax' ),
			'fields' => array(
				// =======================================================================//
				// ! social profiles
				// =======================================================================//
				array(
					'id'     => 'section_start_social_profile',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Social Profiles Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'social_facebook',
					'type'     => 'text',
					'title'    => esc_html__( 'Facebook URL', 'newsmax' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'newsmax' ),
					'default'  => '#'
				),
				array(
					'id'       => 'social_twitter',
					'type'     => 'text',
					'title'    => esc_html__( 'Twitter URL', 'newsmax' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'newsmax' ),
					'default'  => '#'
				),
				array(
					'id'       => 'social_googleplus',
					'type'     => 'text',
					'title'    => esc_html__( 'Google Plus URL', 'newsmax' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'newsmax' ),
					'default'  => '#'
				),
				array(
					'id'       => 'social_instagram',
					'type'     => 'text',
					'title'    => esc_html__( 'Instagram URL', 'newsmax' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'newsmax' ),
					'default'  => '#'
				),
				array(
					'id'       => 'social_pinterest',
					'type'     => 'text',
					'title'    => esc_html__( 'Pinterest URL', 'newsmax' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'newsmax' ),
					'default'  => '#'
				),
				array(
					'id'       => 'social_linkedin',
					'type'     => 'text',
					'title'    => esc_html__( 'LinkedIn URL', 'newsmax' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'newsmax' )
				),
				array(
					'id'       => 'social_tumblr',
					'type'     => 'text',
					'title'    => esc_html__( 'Tumblr URL ', 'newsmax' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'newsmax' )
				),
				array(
					'id'       => 'social_flickr',
					'type'     => 'text',
					'title'    => esc_html__( 'Flickr URL', 'newsmax' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'newsmax' )
				),
				array(
					'id'       => 'social_skype',
					'type'     => 'text',
					'title'    => esc_html__( 'Skype URL', 'newsmax' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'newsmax' )
				),
				array(
					'id'       => 'social_snapchat',
					'type'     => 'text',
					'title'    => esc_html__( 'Snapchat URL', 'newsmax' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'newsmax' )
				),
				array(
					'id'       => 'social_myspace',
					'type'     => 'text',
					'title'    => esc_html__( 'Myspace URL', 'newsmax' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'newsmax' )
				),
				array(
					'id'       => 'social_youtube',
					'type'     => 'text',
					'title'    => esc_html__( 'Youtube URL ', 'newsmax' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'newsmax' )
				),
				array(
					'id'       => 'social_bloglovin',
					'type'     => 'text',
					'title'    => esc_html__( 'Bloglovin URL', 'newsmax' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'newsmax' )
				),
				array(
					'id'       => 'social_digg',
					'type'     => 'text',
					'title'    => esc_html__( 'Digg URL', 'newsmax' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'newsmax' )
				),
				array(
					'id'       => 'social_dribbble',
					'type'     => 'text',
					'title'    => esc_html__( 'Dribbble URL', 'newsmax' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'newsmax' )
				),
				array(
					'id'       => 'social_soundcloud',
					'type'     => 'text',
					'title'    => esc_html__( 'Soundcloud URL', 'newsmax' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'newsmax' )
				),
				array(
					'id'       => 'social_vimeo',
					'type'     => 'text',
					'title'    => esc_html__( 'Vimeo URL ', 'newsmax' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'newsmax' )
				),
				array(
					'id'       => 'social_reddit',
					'type'     => 'text',
					'title'    => esc_html__( 'Reddit URL ', 'newsmax' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'newsmax' )
				),
				array(
					'id'       => 'social_vk',
					'type'     => 'text',
					'title'    => esc_html__( 'VKontakte URL ', 'newsmax' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'newsmax' )
				),
				array(
					'id'       => 'social_whatsapp',
					'type'     => 'text',
					'title'    => esc_html__( 'Whatsapp URL ', 'newsmax' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'newsmax' )
				),
				array(
					'id'       => 'social_rss',
					'type'     => 'text',
					'title'    => esc_html__( 'Rss URL ', 'newsmax' ),
					'subtitle' => esc_html__( 'input your site profile URL, Leave blank if you want to disable it.', 'newsmax' )
				),
				array(
					'id'     => 'section_end_social_profile',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				// =======================================================================//
				// ! social profiles
				// =======================================================================//
				array(
					'id'     => 'section_start_social_profile_custom',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Custom Social Profiles Options', 'newsmax' ),
					'indent' => true
				),
				//social 1
				array(
					'id'       => 'social_custom_1_url',
					'type'     => 'text',
					'validate' => 'url',
					'title'    => esc_html__( 'Custom social 1 - URL', 'newsmax' ),
					'subtitle' => esc_html__( 'input your site profile URL.', 'newsmax' )
				),
				array(
					'id'       => 'social_custom_1_name',
					'type'     => 'text',
					'title'    => esc_html__( 'Custom Social 1 - Name', 'newsmax' ),
					'subtitle' => esc_html__( 'input the name of the social, for example: facebook, twitter.', 'newsmax' )
				),
				array(
					'id'       => 'social_custom_1_icon',
					'type'     => 'text',
					'title'    => esc_html__( 'Custom Social 1 - Icon', 'newsmax' ),
					'subtitle' => esc_html__( 'input the name of font icon, for example: fa-facebook. Newsmax supports font awesome icons, you can find all icons here: http://fontawesome.io/icons/', 'newsmax' ),
					'default'  => '',
				),
				array(
					'id'          => 'social_custom_1_color',
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
					'title'       => esc_html__( 'Custom Social 1 - Color', 'newsmax' ),
					'subtitle'    => esc_html__( 'select a color for this social icon.', 'newsmax' )
				),
				//social 2
				array(
					'id'       => 'social_custom_2_url',
					'type'     => 'text',
					'validate' => 'url',
					'title'    => esc_html__( 'Custom social 2 - URL', 'newsmax' ),
					'subtitle' => esc_html__( 'input your site profile URL.', 'newsmax' )
				),
				array(
					'id'       => 'social_custom_2_name',
					'type'     => 'text',
					'title'    => esc_html__( 'Custom Social 2 - Name', 'newsmax' ),
					'subtitle' => esc_html__( 'input the name of the social, for example: facebook, twitter.', 'newsmax' )
				),
				array(
					'id'       => 'social_custom_2_icon',
					'type'     => 'text',
					'title'    => esc_html__( 'Custom Social 2 - Icon', 'newsmax' ),
					'subtitle' => esc_html__( 'input the name of font icon, for example: fa-facebook. Newsmax supports font awesome icons, you can find all icons here: http://fontawesome.io/icons/', 'newsmax' ),
					'default'  => '',
				),
				array(
					'id'          => 'social_custom_2_color',
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
					'title'       => esc_html__( 'Custom Social 2 - Color', 'newsmax' ),
					'subtitle'    => esc_html__( 'select a color for this social icon.', 'newsmax' )
				),
				//social 3
				array(
					'id'       => 'social_custom_3_url',
					'type'     => 'text',
					'validate' => 'url',
					'title'    => esc_html__( 'Custom social 3 - URL', 'newsmax' ),
					'subtitle' => esc_html__( 'input your site profile URL.', 'newsmax' )
				),
				array(
					'id'       => 'social_custom_3_name',
					'type'     => 'text',
					'title'    => esc_html__( 'Custom Social 3 - Name', 'newsmax' ),
					'subtitle' => esc_html__( 'input the name of the social, for example: facebook, twitter.', 'newsmax' )
				),
				array(
					'id'       => 'social_custom_3_icon',
					'type'     => 'text',
					'title'    => esc_html__( 'Custom Social 3 - Icon', 'newsmax' ),
					'subtitle' => esc_html__( 'input the name of font icon, for example: fa-facebook. Newsmax supports font awesome icons, you can find all icons here: http://fontawesome.io/icons/', 'newsmax' ),
					'default'  => '',
				),
				array(
					'id'          => 'social_custom_3_color',
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
					'title'       => esc_html__( 'Custom Social 3 - Color', 'newsmax' ),
					'subtitle'    => esc_html__( 'select a color for this social icon.', 'newsmax' )
				),
				array(
					'id'     => 'section_end_social_profile_custom',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),

			)
		);
	}
}