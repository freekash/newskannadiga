<?php
/**
 * @return array
 * blog index layout
 */
if ( ! function_exists( 'newsmax_ruby_theme_options_team_page' ) ) {
	function newsmax_ruby_theme_options_team_page() {
		return array(
			'id'         => 'newsmax_ruby_config_section_team_page',
			'title'      => esc_html__( 'Team Page Options', 'newsmax' ),
			'desc'       => esc_html__( 'select options for team page template (author-team.php), options below will apply to pages has been set "Team Page" template.', 'newsmax' ),
			'icon'       => 'el el-group',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'     => 'section_start_page_author_team',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Team Page Template Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'author_team_author_select',
					'title'    => esc_html__( 'Display Authors', 'newsmax' ),
					'subtitle' => esc_html__( 'Select and sort order authors you want to display. Please blank you would like to display all, this option will override below options.', 'newsmax' ),
					'type'     => 'select',
					'multi'    => true,
					'data'     => 'users',
					'sortable' => true,
					'default'  => ''
				),
				array(
					'id'       => 'excepted_author_team_id',
					'type'     => 'text',
					'title'    => esc_html__( 'Excepted Author IDs', 'newsmax' ),
					'subtitle' => esc_html__( 'input author IDs that you do not want to display on the author page. Separated by commas, for example: 1,2,3', 'newsmax' ),
				),
				array(
					'id'       => 'author_team_administrator',
					'title'    => esc_html__( 'Administrator Users', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable administrator role users.', 'newsmax' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'author_team_editor',
					'title'    => esc_html__( 'Editor Users', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable editor role users.', 'newsmax' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'author_team_author',
					'title'    => esc_html__( 'Author Users', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable author role users.', 'newsmax' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'author_team_contributor',
					'title'    => esc_html__( 'Contributor Users', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable contributor role users.', 'newsmax' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'     => 'section_end_page_author_team',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}

