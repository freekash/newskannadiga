<?php
/**
 * @return array
 * post audio config
 */
if ( ! function_exists( 'newsmax_ruby_metabox_single_post_audio' ) ) {
	function newsmax_ruby_metabox_single_post_audio() {
		return array(
			'id'         => 'newsmax_ruby_metabox_audio_options',
			'title'      => esc_html__( 'AUDIO OPTIONS', 'newsmax' ),
			'post_types' => array( 'post' ),
			'priority'   => 'high',
			'context'    => 'top',
			'fields'     => array(
				array(
					'id'   => 'newsmax_ruby_meta_post_audio_url',
					'name' => esc_html__( 'Audio URL', 'newsmax' ),
					'desc' => esc_html__( 'input your audio URL, support: SoundCloud, MixCloud', 'newsmax' ),
					'type' => 'text',
				),
				array(
					'id'   => 'newsmax_ruby_meta_post_audio_iframe',
					'name' => esc_html__( 'Iframe Embed Code', 'newsmax' ),
					'desc' => esc_html__( 'input iframe embed code if WordPress cannot support your audio URL.', 'newsmax' ),
					'type'  => 'textarea',
				),
				array(
					'id'   => 'newsmax_ruby_meta_post_audio_self_hosted',
					'name' => esc_html__( 'Self-Hosted Audio', 'newsmax' ),
					'desc' => esc_html__( 'upload your audio file, support: mp3, ogg, wma, m4a, wav files.', 'newsmax' ),
					'type' => 'file_advanced',
				),
				array(
					'id'   => 'newsmax_ruby_meta_post_audio_duration',
					'type' => 'text',
					'name' => esc_html__( 'Audio Duration', 'newsmax' ),
					'desc' => esc_html__( 'input a duration time for your audio, for example: 1:32.', 'newsmax' ),
				),
				array(
					'id'      => 'newsmax_ruby_meta_layout_audio',
					'type'    => 'image_select',
					'name'    => esc_html__( 'Audio Layout', 'newsmax' ),
					'desc'    => esc_html__( 'select a layout for this audio post, this option will override default settings in theme options.', 'newsmax' ),
					'options' => newsmax_ruby_theme_config::metabox_single_post_layout_audio(),
					'std'     => 'default'
				),
			)
		);
	}
}