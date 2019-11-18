<?php

if ( ! function_exists( 'newsmax_ruby_theme_options_import_export' ) ) {
	function newsmax_ruby_theme_options_import_export() {
		return array(
			'id'     => 'newsmax_ruby_theme_ops_section_import_export',
			'title'  => esc_html__( 'Backup/Restore Options', 'newsmax' ),
			'desc'   => esc_html__( 'backup and restore all options of the theme options panel from/to JSON files, text or URL.', 'newsmax' ),
			'icon'   => 'el el-inbox',
			'fields' => array(
				array(
					'id'         => 'ruby-import-export',
					'type'       => 'import_export',
					'title'      => 'Backup/Restore',
					'subtitle'   => esc_html__( 'backup and restore all options of the theme options panel from/to JSON files, text or URL. Click on the button twice when you import options.', 'newsmax' ),
					'full_width' => false,
				),
			),
		);
	}
}
