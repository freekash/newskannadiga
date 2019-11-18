<?php

/**-------------------------------------------------------------------------------------------------------------------------
 * @return bool
 * check post review
 */
if ( ! function_exists( 'newsmax_ruby_single_post_check_review' ) ) {
	function newsmax_ruby_single_post_check_review() {

		//check
		$post_id       = get_the_ID();
		$total_score   = get_post_meta( $post_id, 'newsmax_ruby_as', true );
		$enable_review = get_post_meta( $post_id, 'newsmax_ruby_meta_review_enable', true );
		if ( ! empty( $total_score ) && ! empty( $enable_review ) ) {
			return $total_score;
		} else {
			return false;
		}
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return mixed|string
 * check review position
 */
if ( ! function_exists( 'newsmax_ruby_single_post_check_review_position' ) ) {
	function newsmax_ruby_single_post_check_review_position() {
		$position = get_post_meta( get_the_ID(), 'newsmax_ruby_meta_review_position', true );
		if ( empty( $position ) || 'default' == $position ) {
			$position = newsmax_ruby_get_option( 'single_review_box_position' );
		}

		return $position;
	}
}


