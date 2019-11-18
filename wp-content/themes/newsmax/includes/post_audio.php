<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render audio iframe
 */
if ( ! function_exists( 'newsmax_ruby_iframe_audio' ) ) {
	function newsmax_ruby_iframe_audio() {

		if ( 'audio' != get_post_format() ) {
			return false;
		}

		$post_id              = get_the_ID();
		$self_hosted_audio_id = get_post_meta( $post_id, 'newsmax_ruby_meta_post_audio_self_hosted', true );
		if ( ! empty( $self_hosted_audio_id ) ) {
			return newsmax_ruby_iframe_audio_self_hosted( $self_hosted_audio_id );
		} else {
			$audio_url = get_post_meta( $post_id, 'newsmax_ruby_meta_post_audio_url', true );
			$iframe = wp_oembed_get( $audio_url, array( 'height' => 400, 'width' => 900 ) );
			if ( ! empty( $iframe ) ) {
				return $iframe;
			} else {
				$iframe = get_post_meta( $post_id, 'newsmax_ruby_meta_post_audio_iframe', true );
				if ( ! empty( $iframe ) ) {
					return $iframe;
				} else {
					return false;
				}
			}
		}
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $audio_id
 *
 * @return string
 * render self hosted audio iframe
 */
if ( ! function_exists( 'newsmax_ruby_iframe_audio_self_hosted' ) ) {
	function newsmax_ruby_iframe_audio_self_hosted( $audio_id ) {

		$wp_version = floatval( get_bloginfo( 'version' ) );

		if ( $wp_version < "3.6" ) {
			return '<p class="ruby-error">' . esc_html__( 'This WordPress version does not support self-hosted audio, please update WordPress to the latest version to display this audio.', 'newsmax' ) . '</p>';
		}
		$self_hosted_url = wp_get_attachment_url( $audio_id );
		$params          = array(
			'src' => $self_hosted_url,
		);

		return wp_audio_shortcode( $params );
	}

}
