<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param bool $single_option
 *
 * @return string
 * render share icons
 */
if ( ! function_exists( 'newsmax_ruby_social_share_post' ) ) {
	function newsmax_ruby_social_share_post( $single_option = false ) {

		//check ssl
		$protocol = 'http';
		if ( is_ssl() ) {
			$protocol = 'https';
		}

		//get data
		$twitter_user = get_the_author_meta( 'twitter' );
		if ( ! empty( $twitter_user ) ) {
			$pos          = strpos( $twitter_user, 'twitter.com/' );
			$twitter_user = substr( $twitter_user, intval( $pos ) + 12 );
			$twitter_user = str_replace( '/', '', $twitter_user );
		} else {
			$twitter_user = get_bloginfo( 'name' );
		}

		//post title
		$post_title = get_the_title();

		if ( false == $single_option ) {
			$share_facebook   = newsmax_ruby_get_option( 'share_facebook' );
			$share_twitter    = newsmax_ruby_get_option( 'share_twitter' );
			$share_googleplus = newsmax_ruby_get_option( 'share_googleplus' );
			$share_linkedin   = newsmax_ruby_get_option( 'share_linkedin' );
			$share_pinterest  = newsmax_ruby_get_option( 'share_pinterest' );
			$share_tumblr     = newsmax_ruby_get_option( 'share_tumblr' );
			$share_reddit     = newsmax_ruby_get_option( 'share_reddit' );
			$share_vk         = newsmax_ruby_get_option( 'share_vk' );
			$share_email      = newsmax_ruby_get_option( 'share_email' );
		} else {
			$share_facebook   = newsmax_ruby_get_option( 'single_share_facebook' );
			$share_twitter    = newsmax_ruby_get_option( 'single_share_twitter' );
			$share_googleplus = newsmax_ruby_get_option( 'single_share_googleplus' );
			$share_linkedin   = newsmax_ruby_get_option( 'single_share_linkedin' );
			$share_pinterest  = newsmax_ruby_get_option( 'single_share_pinterest' );
			$share_tumblr     = newsmax_ruby_get_option( 'single_share_tumblr' );
			$share_reddit     = newsmax_ruby_get_option( 'single_share_reddit' );
			$share_vk         = newsmax_ruby_get_option( 'single_share_vk' );
			$share_email      = newsmax_ruby_get_option( 'single_share_email' );
		}

		//render
		$str = '';

		if ( ! empty( $share_facebook ) ) {
			$str .= '<a class="share-bar-el icon-facebook" href="' . $protocol . '://www.facebook.com/sharer.php?u=' . urlencode( get_permalink() ) . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;"><i class="fa fa-facebook color-facebook"></i></a>';
		}

		if ( ! empty( $share_twitter ) ) {
			$str .= '<a class="share-bar-el icon-twitter" href="https://twitter.com/intent/tweet?text=' . htmlspecialchars( urlencode( html_entity_decode( $post_title, ENT_COMPAT, 'UTF-8' ) ), ENT_COMPAT, 'UTF-8' ) . '&amp;url=' . urlencode( get_permalink() ) . '&amp;via=' . urlencode( $twitter_user ) . '"><i class="fa fa-twitter color-twitter"></i>';
			$str .= newsmax_ruby_twitter_ember_script();
			$str .= '</a>';
		}

		if ( ! empty( $share_googleplus ) ) {
			$str .= ' <a class="share-bar-el icon-google" href="' . $protocol . '://plus.google.com/share?url=' . urlencode( get_permalink() ) . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;"><i class="fa fa-google color-google"></i></a>';
		}

		if ( ! empty( $share_pinterest ) ) {
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'newsmax_ruby_840x500' );
			if ( is_plugin_active( 'wordpress-seo/wp-seo.php' ) and get_post_meta( get_the_ID(), '_yoast_wpseo_metadesc', true ) != '' ) {
				$pinterest_description = get_post_meta( get_the_ID(), '_yoast_wpseo_metadesc', true );
			} else {
				$pinterest_description = htmlspecialchars( urlencode( html_entity_decode( $post_title, ENT_COMPAT, 'UTF-8' ) ), ENT_COMPAT, 'UTF-8' );
			}
			$str .= '<a class="share-bar-el icon-pinterest" href="' . $protocol . '://pinterest.com/pin/create/button/?url=' . urlencode( get_permalink() ) . '&amp;media=' . ( ! empty( $image[0] ) ? $image[0] : '' ) . '&description=' . $pinterest_description . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;"><i class="fa fa-pinterest"></i></a>';
		}

		if ( ! empty ( $share_linkedin ) ) {
			$str .= '<a class="share-bar-el icon-linkedin" href="' . $protocol . '://linkedin.com/shareArticle?mini=true&amp;url=' . urlencode( get_permalink() ) . '&amp;title=' . htmlspecialchars( urlencode( html_entity_decode( $post_title, ENT_COMPAT, 'UTF-8' ) ), ENT_COMPAT, 'UTF-8' ) . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;"><i class="fa fa-linkedin"></i></a>';
		}

		if ( ! empty( $share_tumblr ) ) {
			$str .= ' <a class="share-bar-el icon-tumblr" href="' . $protocol . '://www.tumblr.com/share/link?url=' . urlencode( get_permalink() ) . '&amp;name=' . htmlspecialchars( urlencode( html_entity_decode( $post_title, ENT_COMPAT, 'UTF-8' ) ), ENT_COMPAT, 'UTF-8' ) . '&amp;description=' . htmlspecialchars( urlencode( html_entity_decode( $post_title, ENT_COMPAT, 'UTF-8' ) ), ENT_COMPAT, 'UTF-8' ) . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;"><i class="fa fa-tumblr"></i></a>';
		}

		if ( ! empty( $share_reddit ) ) {
			$str .= '<a class="share-bar-el icon-reddit" href="' . $protocol . '://www.reddit.com/submit?url=' . urlencode( get_permalink() ) . '&title=' . htmlspecialchars( urlencode( html_entity_decode( $post_title, ENT_COMPAT, 'UTF-8' ) ), ENT_COMPAT, 'UTF-8' ) . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;"><i class="fa fa-reddit"></i></a>';
		}

		if ( ! empty( $share_vk ) ) {
			$str .= '<a class="share-bar-el icon-vk" href="' . $protocol . '://vkontakte.ru/share.php?url=' . urldecode( get_permalink() ) . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;"><i class="fa fa-vk"></i></a>';
		}

		if ( ! empty( $share_email ) ) {
			$str .= '<a class="share-bar-el icon-email" href="mailto:?subject=' . htmlspecialchars( urlencode( html_entity_decode( $post_title, ENT_COMPAT, 'UTF-8' ) ), ENT_COMPAT, 'UTF-8' ) . '&BODY=' . urlencode( esc_html__( 'I found this article interesting and thought of sharing it with you. Check it out:', 'newsmax-core' ) ) . urlencode( get_permalink() ) . '"><i class="fa fa-envelope"></i></a>';
		}

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param bool $single_option
 *
 * @return string
 * render share big icons
 */
if ( ! function_exists( 'newsmax_ruby_social_share_post_big' ) ) {
	function newsmax_ruby_social_share_post_big() {

		//check ssl
		$protocol = 'http';
		if ( is_ssl() ) {
			$protocol = 'https';
		}

		$twitter_user = get_the_author_meta( 'twitter' );
		if ( ! empty( $twitter_user ) ) {
			$pos          = strpos( $twitter_user, 'twitter.com/' );
			$twitter_user = substr( $twitter_user, intval( $pos ) + 12 );
			$twitter_user = str_replace( '/', '', $twitter_user );
		} else {
			$twitter_user = get_bloginfo( 'name' );
		}

		$post_title = get_the_title();

		$share_facebook   = newsmax_ruby_get_option( 'single_share_big_facebook' );
		$share_twitter    = newsmax_ruby_get_option( 'single_share_big_twitter' );
		$share_googleplus = newsmax_ruby_get_option( 'single_share_big_googleplus' );
		$share_linkedin   = newsmax_ruby_get_option( 'single_share_big_linkedin' );
		$share_pinterest  = newsmax_ruby_get_option( 'single_share_big_pinterest' );
		$share_tumblr     = newsmax_ruby_get_option( 'single_share_big_tumblr' );
		$share_reddit     = newsmax_ruby_get_option( 'single_share_big_reddit' );
		$share_vk         = newsmax_ruby_get_option( 'single_share_big_vk' );
		$share_email      = newsmax_ruby_get_option( 'single_share_big_email' );


		$str = '';
		if ( ! empty( $share_facebook ) ) {
			$str .= '<a class="share-bar-el-big icon-facebook" href="' . $protocol . '://www.facebook.com/sharer.php?u=' . urlencode( get_permalink() ) . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;"><i class="fa fa-facebook color-facebook"></i><span>' . newsmax_ruby_translation::get_text( 'share_on_fb', true ) . '</span></a>';
		}
		if ( ! empty( $share_twitter ) ) {
			$str .= '<a class="share-bar-el-big icon-twitter" href="https://twitter.com/intent/tweet?text=' . htmlspecialchars( urlencode( html_entity_decode( $post_title, ENT_COMPAT, 'UTF-8' ) ), ENT_COMPAT, 'UTF-8' ) . '&amp;url=' . urlencode( get_permalink() ) . '&amp;via=' . urlencode( $twitter_user ) . '"><i class="fa fa-twitter color-twitter"></i>';
			$str .= '<span>' . newsmax_ruby_translation::get_text( 'share_on_twitter', true ) . '</span>';
			$str .= newsmax_ruby_twitter_ember_script();
			$str .= '</a>';
		}
		if ( ! empty( $share_googleplus ) ) {
			$str .= ' <a class="share-bar-el-big icon-google" href="' . $protocol . '://plus.google.com/share?url=' . urlencode( get_permalink() ) . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;"><i class="fa fa-google color-google"></i><span>' . newsmax_ruby_translation::get_text( 'share_on_google', true ) . '</span></a>';
		}
		if ( ! empty( $share_pinterest ) ) {
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'newsmax_ruby_crop_1100x580' );
			if ( is_plugin_active( 'wordpress-seo/wp-seo.php' ) and get_post_meta( get_the_ID(), '_yoast_wpseo_metadesc', true ) != '' ) {
				$pinterest_description = get_post_meta( get_the_ID(), '_yoast_wpseo_metadesc', true );
			} else {
				$pinterest_description = htmlspecialchars( urlencode( html_entity_decode( $post_title, ENT_COMPAT, 'UTF-8' ) ), ENT_COMPAT, 'UTF-8' );
			}
			$str .= '<a class="share-bar-el-big icon-pinterest" href="' . $protocol . '://pinterest.com/pin/create/button/?url=' . urlencode( get_permalink() ) . '&amp;media=' . ( ! empty( $image[0] ) ? $image[0] : '' ) . '&description=' . $pinterest_description . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;"><i class="fa fa-pinterest"></i><span>' . newsmax_ruby_translation::get_text( 'share_on_pinterest', true ) . '</span></a>';
		}
		if ( ! empty ( $share_linkedin ) ) {
			$str .= '<a class="share-bar-el-big icon-linkedin" href="' . $protocol . '://linkedin.com/shareArticle?mini=true&amp;url=' . urlencode( get_permalink() ) . '&amp;title=' . htmlspecialchars( urlencode( html_entity_decode( $post_title, ENT_COMPAT, 'UTF-8' ) ), ENT_COMPAT, 'UTF-8' ) . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;"><i class="fa fa-linkedin"></i><span>' . newsmax_ruby_translation::get_text( 'share_on_linkedin', true ) . '</span></a>';
		}
		if ( ! empty( $share_tumblr ) ) {
			$str .= ' <a class="share-bar-el-big icon-tumblr" href="' . $protocol . '://www.tumblr.com/share/link?url=' . urlencode( get_permalink() ) . '&amp;name=' . htmlspecialchars( urlencode( html_entity_decode( $post_title, ENT_COMPAT, 'UTF-8' ) ), ENT_COMPAT, 'UTF-8' ) . '&amp;description=' . htmlspecialchars( urlencode( html_entity_decode( $post_title, ENT_COMPAT, 'UTF-8' ) ), ENT_COMPAT, 'UTF-8' ) . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;"><i class="fa fa-tumblr"></i><span>' . newsmax_ruby_translation::get_text( 'share_on_tumblr', true ) . '</span></a>';
		}
		if ( ! empty( $share_reddit ) ) {
			$str .= '<a class="share-bar-el-big icon-reddit" href="' . $protocol . '://www.reddit.com/submit?url=' . urlencode( get_permalink() ) . '&title=' . htmlspecialchars( urlencode( html_entity_decode( $post_title, ENT_COMPAT, 'UTF-8' ) ), ENT_COMPAT, 'UTF-8' ) . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;"><i class="fa fa-reddit"></i><span>' . newsmax_ruby_translation::get_text( 'share_on_reddit', true ) . '</span></a>';
		}
		if ( ! empty( $share_vk ) ) {
			$str .= '<a class="share-bar-el-big icon-vk" href="' . $protocol . '://vkontakte.ru/share.php?url=' . urldecode( get_permalink() ) . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;"><i class="fa fa-vk"></i><span>' . newsmax_ruby_translation::get_text( 'share_on_vk', true ) . '</span></a>';
		}
		if ( ! empty( $share_email ) ) {
			$str .= '<a class="share-bar-el-big icon-email" href="mailto:?subject=' . htmlspecialchars( urlencode( html_entity_decode( $post_title, ENT_COMPAT, 'UTF-8' ) ), ENT_COMPAT, 'UTF-8' ) . '&BODY=' . esc_attr__( 'I found this article interesting and thought of sharing it with you. Check it out:', 'newsmax-core' ) . urlencode( get_permalink() ) . '"><i class="fa fa-envelope"></i><span>' . newsmax_ruby_translation::get_text( 'share_on_email', true ) . '</span></a>';
		}

		return $str;
	}
}

if ( ! function_exists( 'newsmax_ruby_twitter_ember_script' ) ) {
	function newsmax_ruby_twitter_ember_script() {

		if ( isset( $GLOBALS['newsmax_ruby_twitter_ember'] ) && true === $GLOBALS['newsmax_ruby_twitter_ember'] ) {
			return '';
		}

		$GLOBALS['newsmax_ruby_twitter_ember'] = true;
		return '<span style="display: none"><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></span>';
	}
}
