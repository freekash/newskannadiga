<?php
/**
 * @return array
 * single post video config
 */
if ( ! function_exists( 'newsmax_ruby_metabox_single_post_video' ) ) {
	function newsmax_ruby_metabox_single_post_video() {
		return array(
			'id'         => 'newsmax_ruby_metabox_video_options',
			'title'      => esc_html__( 'VIDEO OPTIONS', 'newsmax' ),
			'post_types' => array( 'post' ),
			'priority'   => 'high',
			'context'    => 'top',
			'fields'     => array(
				array(
					'id'   => 'newsmax_ruby_meta_post_video_url',
					'name' => esc_html__( 'Video URL', 'newsmax' ),
					'desc' => esc_html__( 'input your video link, support: Youtube, Vimeo, DailyMotion', 'newsmax' ),
					'type' => 'text',
				),
				array(
					'id'   => 'newsmax_ruby_meta_post_video_iframe',
					'name' => esc_html__( 'Iframe Embed Code', 'newsmax' ),
					'desc' => esc_html__( 'input iframe embed code if WordPress cannot support your video URL.', 'newsmax' ),
					'type'  => 'textarea',
				),
				array(
					'id'   => 'newsmax_ruby_meta_post_video_self_hosted',
					'name' => esc_html__( 'Self-Hosted Video', 'newsmax' ),
					'desc' => esc_html__( 'upload your video file, support: mp4, m4v, webm, ogv, wmv, flv files.', 'newsmax' ),
					'type' => 'file_advanced',
				),
				array(
					'id'   => 'newsmax_ruby_meta_post_video_duration',
					'type' => 'text',
					'name' => esc_html__( 'Video Duration', 'newsmax' ),
					'desc' => esc_html__( 'input a duration time for your video, for example: 1:32.', 'newsmax' ),
				),
				array(
					'id'      => 'newsmax_ruby_meta_style_video',
					'type'    => 'select',
					'name'    => esc_html__( 'Video Featured Style', 'newsmax' ),
					'desc'    => esc_html__( 'Select a featured style for this video post.', 'newsmax' ),
					'options' => array(
						'default' => esc_html__( 'Default Form Theme Options', 'newsmax' ),
						'1'       => esc_html__( 'Iframe (Replace Featured Image)', 'newsmax' ),
						'2'       => esc_html__( 'Popup With Play Button', 'newsmax' ),
					),
					'std'     => 'default'
				),
				array(
					'id'      => 'newsmax_ruby_meta_layout_video',
					'type'    => 'image_select',
					'name'    => esc_html__( 'Video Layout', 'newsmax' ),
					'desc'    => esc_html__( 'select a layout for this video post, this option will override default settings in theme options.', 'newsmax' ),
					'options' => newsmax_ruby_theme_config::metabox_single_post_layout_video(),
					'std'     => 'default'
				),
				array(
					'id'      => 'newsmax_ruby_meta_post_video_related',
					'type'    => 'select',
					'name'    => esc_html__( 'Video Related', 'newsmax' ),
					'desc'    => esc_html__( 'enable or disable video related box for this post.', 'newsmax' ),
					'options' => array(
						'default' => esc_html__( 'Default from Theme Options', 'newsmax' ),
						'1'       => esc_html__( 'Enable', 'newsmax' ),
						'2'       => esc_html__( 'Disable', 'newsmax' ),
					),
					'std'     => 'default'
				),
				array(
					'id'      => 'newsmax_ruby_meta_post_video_autoplay',
					'type'    => 'select',
					'name'    => esc_html__( 'Autoplay Video', 'newsmax' ),
					'desc'    => esc_html__( 'enable or disable autoplay video for this post.', 'newsmax' ),
					'options' => array(
						'default' => esc_html__( 'Default from Theme Options', 'newsmax' ),
						'1'       => esc_html__( 'Enable', 'newsmax' ),
						'2'       => esc_html__( 'Disable', 'newsmax' ),
					),
					'std'     => 'default'
				),
			)
		);
	}
}