<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * newsmax_ruby_post_list_6 (small list small title without thumbnail & show date meta)
 */
if ( ! function_exists( 'newsmax_ruby_post_list_6' ) ) {
	function newsmax_ruby_post_list_6( $options = array() ) {

		$str = '';
		$str .= '<article class="post-wrap post-list post-list-6">';
		$str .= '<div class="post-body">';
		$str .= newsmax_ruby_post_title( 'is-size-4' );
		$str .= newsmax_ruby_post_meta_info( array( 'date' => true ), '', false );
		$str .= '</div><!--#post body-->';
		$str .= '</article>';

		return $str;
	}
}