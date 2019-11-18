<?php
/**
 * @return array
 * single post source config
 */
if ( ! function_exists( 'newsmax_ruby_metabox_single_post_source' ) ) {
	function newsmax_ruby_metabox_single_post_source() {
		return array(
			'id'         => 'newsmax_ruby_metabox_post_source_options',
			'title'      => esc_attr__( 'POST SOURCE OPTIONS', 'newsmax' ),
			'post_types' => array( 'post' ),
			'priority'   => 'low',
			'context'    => 'side',
			'fields'     => array(
				array(
					'id'    => 'newsmax_ruby_meta_post_source_name',
					'name'  => esc_attr__( 'Source Name', 'newsmax' ),
					'desc'  => esc_attr__( 'input a source name for this post, it will display at the bottom of post content.', 'newsmax' ),
					'type'  => 'text',
					'class' => 'input-medium',
					'std'   => ''
				),
				array(
					'id'    => 'newsmax_ruby_meta_post_source_url',
					'name'  => esc_attr__( 'Source URL', 'newsmax' ),
					'desc'  => esc_attr__( 'input a source URL for this post.', 'newsmax' ),
					'type'  => 'text',
					'class' => 'input-medium',
					'std'   => ''
				),
				array(
					'id'    => 'newsmax_ruby_meta_post_via_name',
					'name'  => esc_attr__( 'Via Name', 'newsmax' ),
					'desc'  => esc_attr__( 'input a via name for this post, it will display at the bottom of post content.', 'newsmax' ),
					'type'  => 'text',
					'class' => 'input-medium',
					'std'   => ''
				),
				array(
					'id'    => 'newsmax_ruby_meta_post_via_url',
					'name'  => esc_attr__( 'via URL', 'newsmax' ),
					'desc'  => esc_attr__( 'input a via URL for this post.', 'newsmax' ),
					'type'  => 'text',
					'class' => 'input-medium',
					'std'   => ''
				)
			)
		);
	}
}