<?php

/**-------------------------------------------------------------------------------------------------------------------------
 * @return array
 * social profiles - web
 */
if ( ! function_exists( 'newsmax_ruby_social_profile_web' ) ) {
	function newsmax_ruby_social_profile_web() {
		$data_social               = array();
		$data_social['facebook']   = newsmax_ruby_get_option( 'social_facebook' );
		$data_social['twitter']    = newsmax_ruby_get_option( 'social_twitter' );
		$data_social['googleplus'] = newsmax_ruby_get_option( 'social_googleplus' );
		$data_social['instagram']  = newsmax_ruby_get_option( 'social_instagram' );
		$data_social['pinterest']  = newsmax_ruby_get_option( 'social_pinterest' );
		$data_social['linkedin']   = newsmax_ruby_get_option( 'social_linkedin' );
		$data_social['tumblr']     = newsmax_ruby_get_option( 'social_tumblr' );
		$data_social['flickr']     = newsmax_ruby_get_option( 'social_flickr' );
		$data_social['skype']      = newsmax_ruby_get_option( 'social_skype' );
		$data_social['snapchat']   = newsmax_ruby_get_option( 'social_snapchat' );
		$data_social['myspace']    = newsmax_ruby_get_option( 'social_myspace' );
		$data_social['youtube']    = newsmax_ruby_get_option( 'social_youtube' );
		$data_social['bloglovin']  = newsmax_ruby_get_option( 'social_bloglovin' );
		$data_social['digg']       = newsmax_ruby_get_option( 'social_digg' );
		$data_social['dribbble']   = newsmax_ruby_get_option( 'social_dribbble' );
		$data_social['soundcloud'] = newsmax_ruby_get_option( 'social_soundcloud' );
		$data_social['vimeo']      = newsmax_ruby_get_option( 'social_vimeo' );
		$data_social['reddit']     = newsmax_ruby_get_option( 'social_reddit' );
		$data_social['vkontakte']  = newsmax_ruby_get_option( 'social_vk' );
		$data_social['whatsapp']   = newsmax_ruby_get_option( 'social_whatsapp' );
		$data_social['rss']        = newsmax_ruby_get_option( 'social_rss' );

		return $data_social;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $author_id
 *
 * @return array
 * users - social profiles
 */
if ( ! function_exists( 'newsmax_ruby_social_profile_user' ) ) {
	function newsmax_ruby_social_profile_user( $author_id = '' ) {

		if ( empty( $author_id ) ) {
			return false;
		}

		$data_social               = array();
		$data_social['website']    = get_the_author_meta( 'user_url', $author_id );
		$data_social['facebook']   = get_the_author_meta( 'facebook', $author_id );
		$data_social['twitter']    = get_the_author_meta( 'twitter', $author_id );
		$data_social['googleplus'] = get_the_author_meta( 'googleplus', $author_id );
		$data_social['instagram']  = get_the_author_meta( 'instagram', $author_id );
		$data_social['pinterest']  = get_the_author_meta( 'pinterest', $author_id );
		$data_social['linkedin']   = get_the_author_meta( 'linkedin', $author_id );
		$data_social['tumblr']     = get_the_author_meta( 'tumblr', $author_id );
		$data_social['flickr']     = get_the_author_meta( 'flickr', $author_id );
		$data_social['skype']      = get_the_author_meta( 'skype', $author_id );
		$data_social['snapchat']   = get_the_author_meta( 'snapchat', $author_id );
		$data_social['myspace']    = get_the_author_meta( 'myspace', $author_id );
		$data_social['youtube']    = get_the_author_meta( 'youtube', $author_id );
		$data_social['bloglovin']  = get_the_author_meta( 'bloglovin', $author_id );
		$data_social['digg']       = get_the_author_meta( 'digg', $author_id );
		$data_social['dribbble']   = get_the_author_meta( 'dribbble', $author_id );
		$data_social['soundcloud'] = get_the_author_meta( 'soundcloud', $author_id );
		$data_social['vimeo']      = get_the_author_meta( 'vimeo', $author_id );
		$data_social['reddit']     = get_the_author_meta( 'reddit', $author_id );
		$data_social['vkontakte']  = get_the_author_meta( 'vkontakte', $author_id );
		$data_social['whatsapp']   = get_the_author_meta( 'whatsapp', $author_id );
		$data_social['rss']        = get_the_author_meta( 'rss', $author_id );

		return $data_social;
	}
}
/**-------------------------------------------------------------------------------------------------------------------------
 * @param      $social_profiles
 * @param      $class_name
 * @param bool $new_tab
 * @param bool $enable_icon
 *
 * @return string
 * render social icons
 */
if ( ! function_exists( 'newsmax_ruby_render_social_icon' ) ) {
	function newsmax_ruby_render_social_icon( $social_profiles, $new_tab = true, $custom = true ) {
		//check empty
		if ( empty( $social_profiles ) ) {
			return false;
		}

		if ( $new_tab == true ) {
			$newtab = 'target="_blank"';
		} else {
			$newtab = '';
		}

		extract( shortcode_atts(
				array(
					'website'    => '',
					'facebook'   => '',
					'twitter'    => '',
					'googleplus' => '',
					'pinterest'  => '',
					'linkedin'   => '',
					'tumblr'     => '',
					'flickr'     => '',
					'instagram'  => '',
					'skype'      => '',
					'snapchat'   => '',
					'myspace'    => '',
					'youtube'    => '',
					'bloglovin'  => '',
					'digg'       => '',
					'dribbble'   => '',
					'soundcloud' => '',
					'vimeo'      => '',
					'reddit'     => '',
					'vkontakte'  => '',
					'whatsapp'   => '',
					'rss'        => '',
				), $social_profiles
			)
		);


		$str = '';

		if ( ! empty( $website ) ) {
			$str .= '<a class="icon-website" title="website" href="' . esc_url( $website ) . '" ' . $newtab . '><i class="fa fa-link" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $facebook ) ) {
			$str .= '<a class="icon-facebook" title="facebook" href="' . esc_url( $facebook ) . '" ' . $newtab . '><i class="fa fa-facebook" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $twitter ) ) {
			$str .= '<a class="icon-twitter" title="twitter" href="' . esc_url( $twitter ) . '" ' . $newtab . '><i class="fa fa-twitter" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $googleplus ) ) {
			$str .= '<a class="icon-google" title="google plus" href="' . esc_url( $googleplus ) . '" ' . $newtab . '><i class="fa fa-google-plus" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $pinterest ) ) {
			$str .= '<a class="icon-pinterest" title="pinterest" href="' . esc_url( $pinterest ) . '" ' . $newtab . '><i class="fa fa-pinterest" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $instagram ) ) {
			$str .= '<a class="icon-instagram" title="instagram" href="' . esc_url( $instagram ) . '" ' . $newtab . '><i class="fa fa-instagram" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $linkedin ) ) {
			$str .= '<a class="icon-linkedin" title="linkedin" href="' . esc_url( $linkedin ) . '" ' . $newtab . '><i class="fa fa-linkedin" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $tumblr ) ) {
			$str .= '<a class="icon-tumblr" title="tumblr" href="' . esc_url( $tumblr ) . '" ' . $newtab . '><i class="fa fa-tumblr" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $flickr ) ) {
			$str .= '<a class="icon-flickr" title="flickr" href="' . esc_url( $flickr ) . '" ' . $newtab . '><i class="fa fa-flickr" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $skype ) ) {
			$str .= '<a class="icon-skype" title="skype" href="' . esc_url( $skype ) . '" ' . $newtab . '><i class="fa fa-skype" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $snapchat ) ) {
			$str .= '<a class="icon-snapchat" title="snapchat" href="' . esc_url( $snapchat ) . '" ' . $newtab . '><i class="fa fa-snapchat-ghost" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $myspace ) ) {
			$str .= '<a class="icon-myspace" title="myspace" href="' . esc_url( $myspace ) . '" ' . $newtab . '><i class="fa fa-users" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $youtube ) ) {
			$str .= '<a class="icon-youtube" title="youtube" href="' . esc_url( $youtube ) . '" ' . $newtab . '><i class="fa fa-youtube" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $bloglovin ) ) {
			$str .= '<a class="icon-bloglovin" title="bloglovin" href="' . esc_url( $bloglovin ) . '" ' . $newtab . '><i class="fa fa-heart" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $digg ) ) {
			$str .= '<a class="icon-digg" title="digg" href="' . esc_url( $digg ) . '" ' . $newtab . '><i class="fa fa-digg" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $dribbble ) ) {
			$str .= '<a class="icon-dribbble" title="dribbble" href="' . esc_url( $dribbble ) . '" ' . $newtab . '><i class="fa fa-dribbble" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $soundcloud ) ) {
			$str .= '<a class="icon-soundcloud" title="soundcloud" href="' . esc_url( $soundcloud ) . '" ' . $newtab . '><i class="fa fa-soundcloud" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $vimeo ) ) {
			$str .= '<a class="icon-vimeo" title="vimeo" href="' . esc_url( $vimeo ) . '" ' . $newtab . '><i class="fa fa-vimeo-square" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $reddit ) ) {
			$str .= '<a class="icon-reddit" title="reddit" href="' . esc_url( $reddit ) . '" ' . $newtab . '><i class="fa fa-reddit" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $vkontakte ) ) {
			$str .= '<a class="icon-vk" title="vkontakte" href="' . esc_url( $vkontakte ) . '" ' . $newtab . '><i class="fa fa-vk" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $whatsapp ) ) {
			$str .= '<a class="icon-whatsapp" title="whatsapp" href="' . esc_url( $whatsapp ) . '" ' . $newtab . '><i class="fa fa-whatsapp" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $rss ) ) {
			$str .= '<a class="icon-rss" title="rss" href="' . esc_url( $rss ) . '" ' . $newtab . '><i class="fa fa-rss" aria-hidden="true"></i></a>';
		}

		if ( true == $custom ) {
			//render custom social 1
			$social_1_url  = newsmax_ruby_get_option( 'social_custom_1_url' );
			$social_1_name = newsmax_ruby_get_option( 'social_custom_1_name' );
			$social_1_icon = newsmax_ruby_get_option( 'social_custom_1_icon' );

			if ( ! empty( $social_1_url ) && ! empty( $social_1_name ) ) {
				$str .= '<a class="icon-custom icon-' . esc_attr( $social_1_name ) . '" title="' . esc_attr( $social_1_name ) . '" href="' . esc_url( $social_1_url ) . '" ' . $newtab . '><i class="fa ' . esc_attr( $social_1_icon ) . '" aria-hidden="true"></i></a>';
			}

			//render custom social 2
			$social_2_url  = newsmax_ruby_get_option( 'social_custom_2_url' );
			$social_2_name = newsmax_ruby_get_option( 'social_custom_2_name' );
			$social_2_icon = newsmax_ruby_get_option( 'social_custom_2_icon' );

			if ( ! empty( $social_2_url ) && ! empty( $social_2_name ) ) {
				$str .= '<a class="icon-custom icon-' . esc_attr( $social_2_name ) . '" title="' . esc_attr( $social_2_name ) . '" href="' . esc_url( $social_2_url ) . '" ' . $newtab . '><i class="fa ' . esc_attr( $social_2_icon ) . '" aria-hidden="true"></i></a>';
			}

			//render custom social 3
			$social_3_url  = newsmax_ruby_get_option( 'social_custom_3_url' );
			$social_3_name = newsmax_ruby_get_option( 'social_custom_3_name' );
			$social_3_icon = newsmax_ruby_get_option( 'social_custom_3_icon' );

			if ( ! empty( $social_3_url ) && ! empty( $social_3_name ) ) {
				$str .= '<a class="icon-custom icon-' . esc_attr( $social_3_name ) . '" title="' . esc_attr( $social_3_name ) . '" href="' . esc_url( $social_3_url ) . '" ' . $newtab . '><i class="fa ' . esc_attr( $social_3_icon ) . '" aria-hidden="true"></i></a>';
			}
		}

		return $str;
	}
}