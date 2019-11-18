<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return array
 *  single post subtitle config
 */
if ( ! function_exists( 'newsmax_ruby_metabox_single_post_subtitle' ) ) {
	function newsmax_ruby_metabox_single_post_subtitle() {
		return array(
			'id'         => 'newsmax_ruby_metabox_section_single_post_subtitle',
			'title'      => esc_html__( 'SUBTITLE OPTION', 'newsmax' ),
			'post_types' => array( 'post' ),
			'priority'   => 'high',
			'context'    => 'top',
			'fields'     => array(
				array(
					'id'   => 'newsmax_ruby_meta_post_subtitle',
					'name' => esc_html__( 'Title Tagline', 'newsmax' ),
					'desc' => esc_html__( 'input a tagline title for this post, this tagline will display under the single post title.', 'newsmax' ),
					'type' => 'text',
					'std'  => ''
				),
			),
		);
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return array
 * single post config
 */
if ( ! function_exists( 'newsmax_ruby_metabox_single_post_option' ) ) {
	function newsmax_ruby_metabox_single_post_option() {
		return array(
			'id'         => 'newsmax_ruby_metabox_section_single_post_options',
			'title'      => esc_html__( 'POST OPTIONS', 'newsmax' ),
			'post_types' => array( 'post' ),
			'priority'   => 'high',
			'context'    => 'normal',
			'fields'     => array(
				array(
					'name'        => esc_html__( 'Primary Category', 'newsmax' ),
					'id'          => 'newsmax_ruby_meta_post_primary_cat',
					'type'        => 'taxonomy_advanced',
					'taxonomy'    => 'category',
					'placeholder' => esc_html__( 'Select a Primary Category', 'newsmax' ),
					'desc'        => esc_html__( 'It is useful in case this post has a lot of categories and you want to display only one in listings.', 'newsmax' ),
					'field_type'  => 'select',
					'std'         => ''
				),
				array(
					'id'    => 'newsmax_ruby_meta_featured_credit',
					'name'  => esc_html__( 'Featured Credit Text', 'newsmax' ),
					'desc'  => esc_html__( 'input a credit text for the featured image, leave blank if you want to use caption.', 'newsmax' ),
					'type'  => 'text',
					'class' => 'input-medium',
					'std'   => ''
				)
			),
		);
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return array
 * single post layout config
 */
if ( ! function_exists( 'newsmax_ruby_metabox_single_post_layout' ) ) {
	function newsmax_ruby_metabox_single_post_layout() {
		return array(
			'id'         => 'newsmax_ruby_metabox_section_single_layout',
			'title'      => esc_html__( 'LAYOUT OPTIONS', 'newsmax' ),
			'post_types' => array( 'post' ),
			'priority'   => 'high',
			'context'    => 'normal',
			'fields'     => array(
				array(
					'id'      => 'newsmax_ruby_meta_layout_featured',
					'type'    => 'image_select',
					'name'    => esc_html__( 'Featured Image Layout', 'newsmax' ),
					'desc'    => esc_html__( 'select a layout (featured image) for this post, this option will override default settings in theme options.', 'newsmax' ),
					'options' => newsmax_ruby_theme_config::metabox_single_post_layout_featured(),
					'std'     => 'default'
				),
				array(
					'id'      => 'newsmax_ruby_meta_single_featured_size',
					'type'    => 'select',
					'name'    => esc_html__( 'Featured Image Size', 'newsmax' ),
					'desc'    => esc_html__( 'select a size for this featured image, this option will override default settings in theme options.', 'newsmax' ),
					'options' => array(
						'default' => esc_html__( 'Default From Theme Options', 'newsmax' ),
						'full'    => esc_html__( 'Full Size', 'newsmax' ),
						'crop'    => esc_html__( 'Crop Size', 'newsmax' )
					),
					'std'     => 'default'
				),
				array(
					'id'      => 'newsmax_ruby_meta_single_header_position',
					'type'    => 'select',
					'name'    => esc_html__( 'Header Align', 'newsmax' ),
					'desc'    => esc_html__( 'select a style for the header of this post: left or center.', 'newsmax' ),
					'options' => array(
						'default' => esc_html__( 'Default From Theme Options', 'newsmax' ),
						'left'    => esc_html__( 'Left Mode', 'newsmax' ),
						'center'  => esc_html__( 'Center Mode', 'newsmax' ),
					),
					'std'     => 'default'
				)
			),
		);
	}
}

