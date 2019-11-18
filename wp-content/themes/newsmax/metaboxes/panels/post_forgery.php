<?php
/**
 * @return array
 * single post forgery config
 */
if ( ! function_exists( 'newsmax_ruby_metabox_single_post_forgery' ) ) {
	function newsmax_ruby_metabox_single_post_forgery() {
		return array(
			'id'         => 'newsmax_ruby_metabox_single_post_forgery',
			'title'      => esc_html__( 'FORGERY SHARES, VIEWS OPTIONS', 'newsmax' ),
			'post_types' => array( 'post' ),
			'priority'   => 'low',
			'context'    => 'side',
			'fields'     => array(
				array(
					'id'   => 'newsmax_ruby_meta_forgery_share',
					'name' => esc_html__( 'Post - Shares Forgery', 'newsmax' ),
					'desc' => esc_html__( 'input a special total value for this post, leave blank if you want to display real data.', 'newsmax' ),
					'type' => 'text',
					'std'  => ''
				),
				array(
					'id'   => 'newsmax_ruby_meta_forgery_view',
					'name' => esc_html__( 'Post - Views Forgery', 'newsmax' ),
					'desc' => esc_html__( 'input a special total value for this post, leave blank if you want to display real data.', 'newsmax' ),
					'type' => 'text',
					'std'  => ''
				),
			),
		);
	}
}