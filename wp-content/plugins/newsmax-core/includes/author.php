<?php
//author information
if ( ! function_exists( 'newsmax_ruby_additional_author_info' ) ) {
	function newsmax_ruby_additional_author_info() {
		return array(
			'job'        => esc_html__( 'Job Name', 'newsmax-core' ),
			'facebook'   => esc_html__( 'Facebook', 'newsmax-core' ),
			'twitter'    => esc_html__( 'Twitter', 'newsmax-core' ),
			'googleplus' => esc_html__( 'Google Plus', 'newsmax-core' ),
			'instagram'  => esc_html__( 'Instagram', 'newsmax-core' ),
			'pinterest'  => esc_html__( 'Pinterest', 'newsmax-core' ),
			'linkedin'   => esc_html__( 'LinkedIn', 'newsmax-core' ),
			'tumblr'     => esc_html__( 'Tumblr', 'newsmax-core' ),
			'flickr'     => esc_html__( 'Flickr', 'newsmax-core' ),
			'skype'      => esc_html__( 'Skype', 'newsmax-core' ),
			'snapchat'   => esc_html__( 'Snapchat', 'newsmax-core' ),
			'myspace'    => esc_html__( 'Myspace', 'newsmax-core' ),
			'youtube'    => esc_html__( 'Youtube', 'newsmax-core' ),
			'bloglovin'  => esc_html__( 'Bloglovin', 'newsmax-core' ),
			'digg'       => esc_html__( 'Digg', 'newsmax-core' ),
			'dribbble'   => esc_html__( 'Dribbble', 'newsmax-core' ),
			'soundcloud' => esc_html__( 'Soundcloud', 'newsmax-core' ),
			'vimeo'      => esc_html__( 'Vimeo', 'newsmax-core' ),
			'reddit'     => esc_html__( 'Reddit', 'newsmax-core' ),
			'vkontakte'  => esc_html__( 'Vkontakte', 'newsmax-core' ),
			'whatsapp'   => esc_html__( 'Whatsapp', 'newsmax-core' ),
			'rss'        => esc_html__( 'Rss', 'newsmax-core' ),
		);
	}

	add_filter( 'user_contactmethods', 'newsmax_ruby_additional_author_info' );
}
