<?php
/**
 * @return array
 * post gallery config
 */
if ( ! function_exists( 'newsmax_ruby_metabox_single_post_gallery' ) ) {
	function newsmax_ruby_metabox_single_post_gallery() {
		return array(
			'id'         => 'newsmax_ruby_metabox_gallery_options',
			'title'      => esc_html__( 'GALLERY OPTIONS', 'newsmax' ),
			'post_types' => array( 'post' ),
			'priority'   => 'high',
			'context'    => 'top',
			'fields'     => array(
				array(
					'id'   => 'newsmax_ruby_meta_post_gallery_data',
					'name' => esc_html__( 'Upload Gallery', 'newsmax' ),
					'desc' => esc_html__( 'upload your images for this gallery.', 'newsmax' ),
					'type' => 'image_advanced',
					'std'  => '',
				),
				array(
					'id'      => 'newsmax_ruby_meta_layout_gallery',
					'type'    => 'image_select',
					'name'    => esc_attr__( 'Single Gallery Layout', 'newsmax' ),
					'desc'    => esc_attr__( 'select a layout for this gallery post, this option will override default settings in theme options.', 'newsmax' ),
					'options' => newsmax_ruby_theme_config::metabox_single_post_layout_gallery(),
					'std'     => 'default'
				),
			)
		);
	}
}