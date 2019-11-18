<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param bool $single_option
 *
 * @return string
 * render like icons
 */
if ( ! function_exists( 'newsmax_ruby_social_like_post' ) ) {
	function newsmax_ruby_social_like_post() {

		$http = 'http';
		if ( is_ssl() ) {
			$http = 'https';
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

		//render
		$str = '';

		$str .= '<span class="like-el like-facebook">';
		$str .= '<iframe src="' . $http . '://www.facebook.com/plugins/like.php?href=' . get_permalink() . '&amp;layout=button_count&amp;show_faces=false&amp;width=105&amp;action=like&amp;colorscheme=light&amp;height=21" style="border:none; overflow:hidden; width:105px; height:21px; background-color:transparent;"></iframe>';
		$str .= '</span>';

		$str .= '<span class="like-el like-twitter">';
		$str .= '<a href="https://twitter.com/share" class="twitter-share-button" data-url="' . get_permalink() . '" data-text="' . htmlspecialchars( urlencode( html_entity_decode( get_the_title(), ENT_COMPAT, 'UTF-8' ) ), ENT_COMPAT, 'UTF-8' ) . '" data-via="' . urlencode( $twitter_user ) . '" data-lang="en">tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
		$str .= '</span>';

		$str .= '<span class="like-el like-google">';
		$str .= '
                <div class="g-plusone" data-size="medium" data-href="' . get_permalink() . '"></div>
                <script type="text/javascript">
                    (function() {
                        var po = document.createElement("script"); po.type = "text/javascript"; po.async = true;
                        po.src = "https://apis.google.com/js/plusone.js";
                        var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(po, s);
                    })();
                </script>
                ';
		$str .= '</span>';

		return $str;
	}
}