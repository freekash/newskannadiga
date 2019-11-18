<?php
/**
 * @return array
 * single post ajax config
 */
if ( ! function_exists( 'newsmax_ruby_metabox_single_post_ajax' ) ) {
	function newsmax_ruby_metabox_single_post_ajax() {
		return array(
			'id'         => 'newsmax_ruby_metabox_single_post_ajax',
			'title'      => esc_html__( 'AJAX OPTIONS', 'newsmax' ),
			'post_types' => array( 'post' ),
			'priority'   => 'high',
			'context'    => 'side',
			'fields'     => array(
				array(
					'id'      => 'newsmax_ruby_meta_single_post_ajax_type',
					'name'    => esc_html__( 'Single Ajax Type', 'newsmax' ),
					'desc'    => esc_html__( 'select a ajax type for this post.', 'newsmax' ),
					'type'    => 'select',
					'options' => array(
						'default'        => esc_attr__( 'Default From Theme Options', 'newsmax' ),
						'scroll'         => esc_html__( 'Infinite Load Older Posts', 'newsmax' ),
						'scroll_related' => esc_html__( 'Ajax Load Related Posts', 'newsmax' ),
						'none'           => esc_html__( 'None', 'newsmax' )
					),
					'std'     => 'default'
				),
			),
		);
	}
}