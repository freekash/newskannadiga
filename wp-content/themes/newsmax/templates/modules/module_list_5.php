<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * newsmax_ruby_post_list_5 (small list medium title without thumbnail)
 */
if ( ! function_exists( 'newsmax_ruby_post_list_5' ) ) {
	function newsmax_ruby_post_list_5( $options = array() ) {

		$str = '';
		$str .= '<article class="post-wrap post-list post-list-5">';
		$str .= '<div class="post-body">';
		$str .= newsmax_ruby_post_title();
		if ( ! empty( $options['meta_info'] ) ) {
			$str .= newsmax_ruby_post_meta_info();
		}
		$str .= '</div><!--#post body-->';
		$str .= '</article>';

		return $str;
	}
}