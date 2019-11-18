<?php
/**
 * @return array
 * single sidebar config
 */
if ( ! function_exists( 'newsmax_ruby_metabox_sidebar' ) ) {
	function newsmax_ruby_metabox_sidebar() {
		return array(
			'id'         => 'newsmax_ruby_metabox_sidebar_options',
			'title'      => esc_attr__( 'SIDEBAR OPTIONS', 'newsmax' ),
			'post_types' => array( 'post', 'page' ),
			'priority'   => 'default',
			'context'    => 'side',
			'fields'     => array(
				array(
					'id'      => 'newsmax_ruby_meta_sidebar_name',
					'type'    => 'select',
					'name'    => esc_attr__( 'Sidebar Name', 'newsmax' ),
					'desc'    => esc_attr__( 'select a sidebar for this post, This option will override default settings in theme options.', 'newsmax' ),
					'options' => newsmax_ruby_theme_config::sidebar_name( true ),
					'std'     => 'newsmax_ruby_default_from_theme_options'
				),
				array(
					'id'       => 'newsmax_ruby_meta_sidebar_position',
					'name'     => esc_attr__( 'sidebar Position', 'newsmax' ),
					'desc'     => esc_attr__( 'select sidebar position for this post, This option will override default settings in theme options.', 'newsmax' ),
					'class'    => 'ruby-sidebar-select',
					'type'     => 'image_select',
					'multiple' => false,
					'options'  => newsmax_ruby_theme_config::metabox_sidebar_position(),
					'std'      => 'default'
				),
			)
		);
	}
}