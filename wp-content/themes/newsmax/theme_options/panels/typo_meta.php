<?php
if ( ! function_exists( 'newsmax_ruby_theme_options_typography_meta' ) ) {
	function newsmax_ruby_theme_options_typography_meta() {
		return array(
			'id'         => 'newsmax_ruby_config_section_typo_meta',
			'title'      => esc_html__( 'Meta Info Typography', 'newsmax' ),
			'icon'       => 'el el-font',
			'subsection' => true,
			'desc'       => esc_html__( 'select font values for entry meta info in your website.', 'newsmax' ),
			'fields'     => array(
				array(
					'id'     => 'section_start_section_font_post_cat',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Category Info Typography Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'             => 'font_post_cat_info',
					'type'           => 'typography',
					'title'          => esc_html__( 'Category Info Font', 'newsmax' ),
					'subtitle'       => esc_html__( 'select font values for the category info.', 'newsmax' ),
					'desc'           => esc_html__( 'Default [ font-size: 10px | font-weight: 700 ]', 'newsmax' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => false,
					'text-transform' => true,
					'letter-spacing' => true,
					'font-weight'    => true,
					'line-height'    => false,
					'units'          => 'px',
					'default'        => array(
						'font-size'      => '',
						'google'         => true,
						'font-weight'    => '700',
						'font-family'    => 'Lato',
						'text-transform' => 'uppercase',
					),
					'output'         => array(
						'.post-cat-info',
					)
				),
				array(
					'id'     => 'section_end_section_font_post_cat',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//meta fonts
				array(
					'id'     => 'section_start_section_font_post_meta',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Entry Meta Info Typography Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'             => 'font_post_meta_info',
					'type'           => 'typography',
					'title'          => esc_html__( 'Entry Meta Info Font', 'newsmax' ),
					'subtitle'       => esc_html__( 'select font values for entry meta info: date, author, view, comment...', 'newsmax' ),
					'desc'           => esc_html__( 'Default [ font-size: 12px | font-weight: 400 | color: #aaa ]', 'newsmax' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'font-weight'    => true,
					'line-height'    => false,
					'units'          => 'px',
					'default'        => array(
						'font-family'    => 'Lato',
						'font-size'      => '',
						'font-weight'    => '400',
						'color'          => '#aaaaaa',
						'text-transform' => '',
					),
					'output'         => array( '.post-meta-info' )
				),
				array(
					'id'     => 'section_end_section_font_post_meta',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//readmore
				array(
					'id'     => 'section_start_section_font_btn',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Read More Typography Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'             => 'font_post_btn',
					'type'           => 'typography',
					'title'          => esc_html__( 'Read More Font', 'newsmax' ),
					'subtitle'       => esc_html__( 'select font values for read more button', 'newsmax' ),
					'desc'           => esc_html__( 'Default [ font-size: 11px | font-weight: 400 ]', 'newsmax' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => false,
					'text-transform' => true,
					'letter-spacing' => true,
					'font-weight'    => true,
					'line-height'    => false,
					'units'          => 'px',
					'default'        => array(
						'font-family'    => 'Lato',
						'font-size'      => '11px',
						'font-weight'    => '400',
						'text-transform' => '',
					),
					'output'         => array( '.post-btn a' )
				),
				array(
					'id'     => 'section_end_section_font_btn',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)

			)
		);
	}
}

