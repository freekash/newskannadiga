<?php
/**
 * Class newsmax_ruby_translation
 * custom translation
 */
if ( ! class_exists( 'newsmax_ruby_translation' ) ) {
	class newsmax_ruby_translation {

		public static $translation_map = array();
		public static $translation_po = array();

		protected static $instance = null;

		static function get_instance() {
			if ( null == self::$instance ) {
				self::$instance = new self;
			}

			return self::$instance;
		}

		//__construct
		public function __construct() {
			self::$translation_map = self::translation_map_data();
			self::$translation_po  = self::load_po_data();
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param string $text
		 * @param string $f_type
		 * @param string $domain
		 *
		 * @return bool|string
		 * get translate
		 */
		public static function get_text( $text = '', $is_plugin = false ) {

			if ( empty( $text ) ) {
				return false;
			}

			if ( array_key_exists( $text, self::$translation_map ) ) {
				$name = self::$translation_map[ $text ];

				$translate = newsmax_ruby_get_option( $name );

				if ( ! empty( $translate ) ) {
					return $translate;
				}
			}

			if ( true === $is_plugin && ! empty( self::$translation_po[ $text ] ) ) {
				return self::$translation_po[ $text ];
			} else {
				return false;
			}

		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array
		 * map data
		 */
		public static function translation_map_data() {
			return array(
				'm'                  => 'translate_m',
				'k'                  => 'translate_k',
				'share_on_fb'        => 'translate_share_on_fb',
				'share_on_twitter'   => 'translate_share_on_twitter',
				'share_on_google'    => 'translate_share_on_google',
				'share_on_pinterest' => 'translate_share_on_pinterest',
				'share_on_linkedin'  => 'translate_share_on_linkedin',
				'share_on_tumblr'    => 'translate_share_on_tumblr',
				'share_on_reddit'    => 'translate_share_on_reddit',
				'share_on_vk'        => 'translate_share_on_vk',
				'share_on_email'     => 'translate_share_on_email',
				'fans'               => 'translate_fans',
				'followers'          => 'translate_followers',
				'subscribers'        => 'translate_subscribers',
				'members'            => 'translate_members',
				'share'              => 'translate_share',
				'shares'             => 'translate_shares',
				'view'               => 'translate_view',
				'views'              => 'translate_views',
				'at'                 => 'translate_at',
				'posted_on'          => 'translate_posted_on',
				'1_view'             => 'translate_1_view',
				'p_views'            => 'translate_p_views',
				'no_comment'         => 'translate_no_comment',
				'1_comment'          => 'translate_1_comment',
				'p_comments'         => 'translate_p_comments',
				'1_share'            => 'translate_1_share',
				'p_shares'           => 'translate_p_shares',
				'p_ago'              => 'translate_p_ago',
				'tags'               => 'translate_tags',
				'source'             => 'translate_source',
				'via'                => 'translate_via',
				'review_overview'    => 'translate_review_overview',
				'all_posts_by'       => 'translate_all_posts_by',
				'p_posts'            => 'translate_p_posts',
				'the_author'         => 'translate_the_author',
				'previous_article'   => 'translate_previous_article',
				'next_article'       => 'translate_next_article',
				'leave_a_reply'      => 'translate_leave_a_reply',
				'show_1_comment'     => 'translate_show_1_comment',
				'show_p_comments'    => 'translate_show_p_comments',
				'name'               => 'translate_name',
				'email'              => 'translate_email',
				'website'            => 'translate_website',
				'write_comment'      => 'translate_write_comment',
				'comment_closed'     => 'translate_comment_closed',
				'not_looking_for'    => 'translate_not_looking_for',
				'no_search_result'   => 'translate_no_search_result',
				'search_for'         => 'translate_search_for',
				'type_to_search'     => 'translate_type_to_search',
				'view_all_results'   => 'translate_view_all_results',
				'search_result_for'  => 'translate_search_result_for',
				'home'               => 'translate_home',
				'posts_by'           => 'translate_posts_by',
				'error_404'          => 'translate_error_404',
				'oops'               => 'translate_oops',
				'no_thing_404'       => 'translate_no_thing_404',
				'the_latest'         => 'translate_the_latest',
				'nothing'            => 'translate_nothing',
				'nothing_found'      => 'translate_nothing_found',
				'loadmore'           => 'translate_loadmore',
				'of'                 => 'translate_of',
				'older_posts'        => 'translate_older_posts',
				'newer_posts'        => 'translate_newer_posts',
				'archives'           => 'translate_archives',
				'archives_year'      => 'translate_archives_year',
				'archives_month'     => 'translate_archives_month',
				'archives_day'       => 'translate_archives_day',
				'archives_tag'       => 'translate_archives_tag',
				'all'                => 'translate_all',
				'featured'           => 'translate_featured',
				'popular'            => 'translate_popular',
				'popular_week'       => 'translate_popular_week',
				'more'               => 'translate_more'
			);
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $text
		 *
		 * @return string
		 * load from po file
		 */
		public static function load_po_data() {
			return array(
				'm'                  => esc_html__( 'M', 'newsmax-core' ),
				'k'                  => esc_html__( 'K', 'newsmax-core' ),
				'share_on_fb'        => esc_html__( 'Share on Facebook', 'newsmax-core' ),
				'share_on_twitter'   => esc_html__( 'Share on Twitter', 'newsmax-core' ),
				'share_on_google'    => esc_html__( 'Share on Google+', 'newsmax-core' ),
				'share_on_pinterest' => esc_html__( 'Share on Pinterest', 'newsmax-core' ),
				'share_on_linkedin'  => esc_html__( 'Share on LinkedIn', 'newsmax-core' ),
				'share_on_tumblr'    => esc_html__( 'Share on Tumblr', 'newsmax-core' ),
				'share_on_reddit'    => esc_html__( 'Share on Reddit', 'newsmax-core' ),
				'share_on_vk'        => esc_html__( 'Share on VKontakte', 'newsmax-core' ),
				'share_on_email'     => esc_html__( 'Share on Email', 'newsmax-core' ),
				'fans'               => esc_html__( 'Fans', 'newsmax-core' ),
				'followers'          => esc_html__( 'Followers', 'newsmax-core' ),
				'subscribers'        => esc_html__( 'Subscribers', 'newsmax-core' ),
				'members'            => esc_html__( 'Members', 'newsmax-core' ),
			);
		}
	}

	//init class
	newsmax_ruby_translation::get_instance();
}
