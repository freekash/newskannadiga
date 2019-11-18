<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return array
 * single advertising configs
 */
if ( ! function_exists( 'newsmax_ruby_theme_options_translation' ) ) {
	function newsmax_ruby_theme_options_translation() {
		return array(
			'id'     => 'newsmax_ruby_config_section_translation',
			'title'  => esc_html__( 'Fast Translation', 'newsmax' ),
			'desc'   => esc_html__( 'The theme supports fast translation in Front-end, input the text you would like to translate. Below options will override PO file. Leave blank options if you use the PO file.', 'newsmax' ),
			'icon'   => 'el el-graph',
			'class'  => 'section-translation',
			'fields' => array(
				//social
				array(
					'id'     => 'section_start_translation_share',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Fast Translation Social', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'      => 'translate_share_on_fb',
					'type'    => 'text',
					'title'   => 'Share on Facebook',
					'default' => ''
				),
				array(
					'id'      => 'translate_share_on_twitter',
					'type'    => 'text',
					'title'   => 'Share on Twitter',
					'default' => ''
				),
				array(
					'id'      => 'translate_share_on_google',
					'type'    => 'text',
					'title'   => 'Share on Google+',
					'default' => ''
				),
				array(
					'id'      => 'translate_share_on_pinterest',
					'type'    => 'text',
					'title'   => 'Share on Pinterest',
					'default' => ''
				),
				array(
					'id'      => 'translate_share_on_linkedin',
					'type'    => 'text',
					'title'   => 'Share on LinkedIn',
					'default' => ''
				),
				array(
					'id'      => 'translate_share_on_tumblr',
					'type'    => 'text',
					'title'   => 'Share on Tumblr',
					'default' => ''
				),
				array(
					'id'      => 'translate_share_on_reddit',
					'type'    => 'text',
					'title'   => 'Share on Reddit',
					'default' => ''
				),
				array(
					'id'      => 'translate_share_on_vk',
					'type'    => 'text',
					'title'   => 'Share on VKontakte',
					'default' => ''
				),
				array(
					'id'      => 'translate_share_on_email',
					'type'    => 'text',
					'title'   => 'Share on Email',
					'default' => ''
				),
				array(
					'id'      => 'translate_fans',
					'type'    => 'text',
					'title'   => 'Fans',
					'default' => ''
				),
				array(
					'id'      => 'translate_followers',
					'type'    => 'text',
					'title'   => 'Followers',
					'default' => ''
				),
				array(
					'id'      => 'translate_subscribers',
					'type'    => 'text',
					'title'   => 'Subscribers',
					'default' => ''
				),
				array(
					'id'      => 'translate_members',
					'type'    => 'text',
					'title'   => 'Members',
					'default' => ''
				),
				array(
					'id'     => 'section_end_translation_share',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//counter
				array(
					'id'     => 'section_start_translation_counter',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Fast Translation Counter', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'      => 'translate_m',
					'type'    => 'text',
					'title'   => 'M (million)',
					'default' => ''
				),
				array(
					'id'      => 'translate_k',
					'type'    => 'text',
					'title'   => 'K (1000)',
					'default' => ''
				),
				array(
					'id'     => 'section_end_translation_counter',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//meta info
				array(
					'id'     => 'section_start_translation_meta',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Fast Translation Meta Info', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'      => 'translate_1_view',
					'type'    => 'text',
					'title'   => '1 view',
					'default' => ''
				),
				array(
					'id'      => 'translate_p_views',
					'type'    => 'text',
					'title'   => '%s views',
					'default' => ''
				),
				array(
					'id'      => 'translate_no_comment',
					'type'    => 'text',
					'title'   => 'No comment',
					'default' => ''
				),
				array(
					'id'      => 'translate_1_comment',
					'type'    => 'text',
					'title'   => '1 comment',
					'default' => ''
				),
				array(
					'id'      => 'translate_p_comments',
					'type'    => 'text',
					'title'   => '%s comments',
					'default' => ''
				),
				array(
					'id'      => 'translate_1_share',
					'type'    => 'text',
					'title'   => '1 share',
					'default' => ''
				),
				array(
					'id'      => 'translate_p_shares',
					'type'    => 'text',
					'title'   => '%s shares',
					'default' => ''
				),
				array(
					'id'      => 'translate_p_ago',
					'type'    => 'text',
					'title'   => '%s ago',
					'default' => ''
				),
				//small single meta
				array(
					'id'      => 'translate_posted_on',
					'type'    => 'text',
					'title'   => 'posted on',
					'default' => ''
				),
				array(
					'id'      => 'translate_at',
					'type'    => 'text',
					'title'   => 'at',
					'default' => ''
				),
				//share & view count
				array(
					'id'      => 'translate_share',
					'type'    => 'text',
					'title'   => 'Share',
					'default' => ''
				),
				array(
					'id'      => 'translate_shares',
					'type'    => 'text',
					'title'   => 'Shares',
					'default' => ''
				),
				array(
					'id'      => 'translate_view',
					'type'    => 'text',
					'title'   => 'View',
					'default' => ''
				),
				array(
					'id'      => 'translate_views',
					'type'    => 'text',
					'title'   => 'Views',
					'default' => ''
				),
				array(
					'id'     => 'section_end_translation_meta',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_translation_single',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Fast Translation Single', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'      => 'translate_tags',
					'type'    => 'text',
					'title'   => 'Tags:',
					'default' => ''
				),
				array(
					'id'      => 'translate_source',
					'type'    => 'text',
					'title'   => 'Source:',
					'default' => ''
				),
				array(
					'id'      => 'translate_via',
					'type'    => 'text',
					'title'   => 'Via:',
					'default' => ''
				),
				array(
					'id'      => 'translate_review_overview',
					'type'    => 'text',
					'title'   => 'Review overview',
					'default' => ''
				),
				array(
					'id'      => 'translate_all_posts_by',
					'type'    => 'text',
					'title'   => 'All posts by',
					'default' => ''
				),
				array(
					'id'      => 'translate_p_posts',
					'type'    => 'text',
					'title'   => '%s posts',
					'default' => ''
				),
				array(
					'id'      => 'translate_the_author',
					'type'    => 'text',
					'title'   => 'the author',
					'default' => ''
				),
				array(
					'id'      => 'translate_previous_article',
					'type'    => 'text',
					'title'   => 'previous article',
					'default' => ''
				),
				array(
					'id'      => 'translate_next_article',
					'type'    => 'text',
					'title'   => 'next article',
					'default' => ''
				),
				array(
					'id'      => 'translate_leave_a_reply',
					'type'    => 'text',
					'title'   => 'leave a reply',
					'default' => ''
				),
				array(
					'id'      => 'translate_show_1_comment',
					'type'    => 'text',
					'title'   => 'show 1 comment',
					'default' => ''
				),
				array(
					'id'      => 'translate_show_p_comments',
					'type'    => 'text',
					'title'   => 'show %s comments',
					'default' => ''
				),
				array(
					'id'      => 'translate_name',
					'type'    => 'text',
					'title'   => 'Name',
					'default' => ''
				),
				array(
					'id'      => 'translate_email',
					'type'    => 'text',
					'title'   => 'Email',
					'default' => ''
				),
				array(
					'id'      => 'translate_website',
					'type'    => 'text',
					'title'   => 'Website',
					'default' => ''
				),
				array(
					'id'      => 'translate_write_comment',
					'type'    => 'text',
					'title'   => 'Write your comment here',
					'default' => ''
				),
				array(
					'id'      => 'translate_comment_closed',
					'type'    => 'text',
					'title'   => 'Comments are closed.',
					'default' => ''
				),
				array(
					'id'     => 'section_end_translation_single',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_translation_search',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Fast Translation Search', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'      => 'translate_not_looking_for',
					'type'    => 'text',
					'title'   => 'If this does not what you looking for, please try another search.',
					'default' => ''
				),
				array(
					'id'      => 'translate_no_search_result',
					'type'    => 'text',
					'title'   => 'No results for your search, please try another search.',
					'default' => ''
				),
				array(
					'id'      => 'translate_search_for',
					'type'    => 'text',
					'title'   => 'Search and hit enter&hellip;',
					'default' => ''
				),
				array(
					'id'      => 'translate_type_to_search',
					'type'    => 'text',
					'title'   => 'Type to search&hellip;',
					'default' => ''
				),
				array(
					'id'      => 'translate_view_all_results',
					'type'    => 'text',
					'title'   => 'view all results',
					'default' => ''
				),
				array(
					'id'      => 'translate_search_result_for',
					'type'    => 'text',
					'title'   => 'Search Results for: %s',
					'default' => ''
				),
				array(
					'id'     => 'section_end_translation_search',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_translation_mics',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Fast Translation Misc', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'      => 'translate_home',
					'type'    => 'text',
					'title'   => 'Home',
					'default' => ''
				),
				array(
					'id'      => 'translate_posts_by',
					'type'    => 'text',
					'title'   => 'Posts by: %s',
					'default' => ''
				),
				array(
					'id'      => 'translate_error_404',
					'type'    => 'text',
					'title'   => 'Error 404',
					'default' => ''
				),
				array(
					'id'      => 'translate_oops',
					'type'    => 'text',
					'title'   => 'Oops! That page can&rsquo;t be found.',
					'default' => ''
				),
				array(
					'id'      => 'translate_no_thing_404',
					'type'    => 'text',
					'title'   => 'It looks like nothing was found at this location. Maybe try a search?',
					'default' => ''
				),
				array(
					'id'      => 'translate_the_latest',
					'type'    => 'text',
					'title'   => 'The latest posts',
					'default' => ''
				),
				array(
					'id'      => 'translate_nothing',
					'type'    => 'text',
					'title'   => 'Nothing Found',
					'default' => ''
				),
				array(
					'id'      => 'translate_nothing_found',
					'type'    => 'text',
					'title'   => 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.',
					'default' => ''
				),
				array(
					'id'      => 'translate_loadmore',
					'type'    => 'text',
					'title'   => 'load more',
					'default' => ''
				),
				array(
					'id'      => 'translate_of',
					'type'    => 'text',
					'title'   => 'of',
					'default' => ''
				),
				array(
					'id'      => 'translate_older_posts',
					'type'    => 'text',
					'title'   => 'Older Posts',
					'default' => ''
				),
				array(
					'id'      => 'translate_newer_posts',
					'type'    => 'text',
					'title'   => 'Newer Posts',
					'default' => ''
				),
				array(
					'id'      => 'translate_archives',
					'type'    => 'text',
					'title'   => 'Archives',
					'default' => ''
				),
				array(
					'id'      => 'translate_archives_year',
					'type'    => 'text',
					'title'   => 'Year Archives: %s',
					'default' => ''
				),
				array(
					'id'      => 'translate_archives_month',
					'type'    => 'text',
					'title'   => 'Month Archives: %s',
					'default' => ''
				),
				array(
					'id'      => 'translate_archives_day',
					'type'    => 'text',
					'title'   => 'Day Archives: %s',
					'default' => ''
				),
				array(
					'id'      => 'translate_archives_tag',
					'type'    => 'text',
					'title'   => 'Tag Archives: %s',
					'default' => ''
				),
				array(
					'id'      => 'translate_all',
					'type'    => 'text',
					'title'   => 'all',
					'default' => ''
				),
				array(
					'id'      => 'translate_featured',
					'type'    => 'text',
					'title'   => 'featured',
					'default' => ''
				),
				array(
					'id'      => 'translate_popular_week',
					'type'    => 'text',
					'title'   => 'popular week',
					'default' => ''
				),
				array(
					'id'      => 'translate_popular',
					'type'    => 'text',
					'title'   => 'all times',
					'default' => ''
				),
				array(
					'id'      => 'translate_more',
					'type'    => 'text',
					'title'   => 'more',
					'default' => ''
				),
				array(
					'id'     => 'section_end_translation_misc',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}