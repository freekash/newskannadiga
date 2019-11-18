<?php
/**
 * @return array
 * single page config
 */
if ( ! function_exists( 'newsmax_ruby_metabox_single_page_option' ) ) {
	function newsmax_ruby_metabox_single_page_option() {
		return array(
			'id'         => 'newsmax_ruby_metabox_single_page_options',
			'title'      => esc_html__( 'PAGE OPTIONS', 'newsmax' ),
			'post_types' => array( 'page' ),
			'priority'   => 'high',
			'context'    => 'normal',
			'fields'     => array(
				array(
					'id'      => 'newsmax_ruby_meta_page_title',
					'type'    => 'select',
					'name'    => esc_html__( 'Page Title', 'newsmax' ),
					'desc'    => esc_html__( 'enable or disable this page title.', 'newsmax' ),
					'options' => array(
						'default' => esc_html__( 'Default From Theme Options', 'newsmax' ),
						'show'       => esc_html__( 'Show', 'newsmax' ),
						'none'       => esc_html__( 'None', 'newsmax' )
					),
					'std'     => 'default'
				)
			),
		);
	}
}


