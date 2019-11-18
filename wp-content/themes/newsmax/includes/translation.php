<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $text
 * @param string $f_type
 *
 * @return bool|string
 * get translate
 */
if ( ! function_exists( 'newsmax_ruby_translate' ) ) {
	function newsmax_ruby_translate( $text = '' ) {

		if ( class_exists( 'newsmax_ruby_translation' ) ) {
			$translate = newsmax_ruby_translation::get_text( $text );
		}

		if ( ! empty( $translate ) ) {
			return $translate;
		}

		return newsmax_ruby_load_translate_po( $text );
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $text
 *
 * @return bool
 * load po translate
 */
if ( ! function_exists( 'newsmax_ruby_load_translate_po' ) ) {
	function newsmax_ruby_load_translate_po( $text ) {
		$translation_data = array(
			'at'                => esc_html__( 'at', 'newsmax' ),
			'posted_on'         => esc_html__( 'posted on', 'newsmax' ),
			'share'             => esc_html__( 'Share', 'newsmax' ),
			'shares'            => esc_html__( 'Shares', 'newsmax' ),
			'view'              => esc_html__( 'View', 'newsmax' ),
			'views'             => esc_html__( 'Views', 'newsmax' ),
			'no_comment'        => esc_html__( 'No comment', 'newsmax' ),
			'1_comment'         => esc_html__( '1 comment', 'newsmax' ),
			'p_comments'        => esc_html__( '%s comments', 'newsmax' ),
			'1_view'            => esc_html__( '1 view', 'newsmax' ),
			'p_views'           => esc_html__( '%s views', 'newsmax' ),
			'1_share'           => esc_html__( '1 share', 'newsmax' ),
			'p_shares'          => esc_html__( '%s shares', 'newsmax' ),
			'p_ago'             => esc_html__( '%s ago', 'newsmax' ),
			'tags'              => esc_html__( 'Tags:', 'newsmax' ),
			'source'            => esc_html__( 'Source:', 'newsmax' ),
			'via'               => esc_html__( 'Via:', 'newsmax' ),
			'review_overview'   => esc_html__( 'Review overview', 'newsmax' ),
			'all_posts_by'      => esc_html__( 'All posts by', 'newsmax' ),
			'p_posts'           => esc_html__( '%s posts', 'newsmax' ),
			'the_author'        => esc_html__( 'the author', 'newsmax' ),
			'previous_article'  => esc_html__( 'previous article', 'newsmax' ),
			'next_article'      => esc_html__( 'next article', 'newsmax' ),
			'leave_a_reply'     => esc_html__( 'Leave a reply ', 'newsmax' ),
			'show_1_comment'    => esc_html__( 'show 1 comment', 'newsmax' ),
			'show_p_comments'   => esc_html__( 'show %s comments', 'newsmax' ),
			'name'              => esc_html__( 'Name', 'newsmax' ),
			'email'             => esc_html__( 'Email', 'newsmax' ),
			'website'           => esc_html__( 'Website', 'newsmax' ),
			'write_comment'     => esc_html__( 'Write your comment here', 'newsmax' ),
			'comment_closed'    => esc_html__( 'Comments are closed.', 'newsmax' ),
			'not_looking_for'   => esc_html__( 'If this does not what you looking for, please try another search.', 'newsmax' ),
			'no_search_result'  => esc_html__( 'No results for your search, please try another search.', 'newsmax' ),
			'search_for'        => esc_html__( 'Search and hit enter&hellip;', 'newsmax' ),
			'type_to_search'    => esc_html__( 'Type to search&hellip;', 'newsmax' ),
			'view_all_results'  => esc_html__( 'view all results', 'newsmax' ),
			'search_result_for' => esc_html__( 'Search Results for: %s', 'newsmax' ),
			'home'              => esc_html__( 'Home', 'newsmax' ),
			'posts_by'          => esc_html__( 'Posts by: %s', 'newsmax' ),
			'error_404'         => esc_html__( 'Error 404', 'newsmax' ),
			'oops'              => esc_html__( 'Oops! That page can&rsquo;t be found.', 'newsmax' ),
			'no_thing_404'      => esc_html__( 'It looks like nothing was found at this location. Maybe try a search?', 'newsmax' ),
			'the_latest'        => esc_html__( 'The latest posts', 'newsmax' ),
			'nothing'           => esc_html__( 'Nothing Found', 'newsmax' ),
			'nothing_found'     => esc_html__( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'newsmax' ),
			'loadmore'          => esc_html__( 'load more', 'newsmax' ),
			'of'                => esc_html__( 'of', 'newsmax' ),
			'older_posts'       => esc_html__( 'Older Posts', 'newsmax' ),
			'newer_posts'       => esc_html__( 'Newer Posts', 'newsmax' ),
			'archives'          => esc_html__( 'Archives', 'newsmax' ),
			'archives_year'     => esc_html__( 'Year Archives: %s', 'newsmax' ),
			'archives_month'    => esc_html__( 'Month Archives: %s', 'newsmax' ),
			'archives_day'      => esc_html__( 'Day Archives: %s', 'newsmax' ),
			'archives_tag'      => esc_html__( 'Tag Archives: %s', 'newsmax' ),
			'all'               => esc_html__( 'all', 'newsmax' ),
			'featured'          => esc_html__( 'featured', 'newsmax' ),
			'popular'           => esc_html__( 'all times', 'newsmax' ),
			'popular_week'      => esc_html__( 'popular week', 'newsmax' ),
			'more'              => esc_html__( 'more', 'newsmax' )
		);

		if ( $translation_data[ $text ] ) {
			return $translation_data[ $text ];
		} else {
			return false;
		}
	}
}