<?php
if ( ! function_exists( 'newsmax_ruby_theme_options_breaking_news' ) ) {
	function newsmax_ruby_theme_options_breaking_news() {
		//design layout
		return array(
			'id'     => 'newsmax_ruby_config_section_breaking_news',
			'title'  => esc_html__( 'Breaking News', 'newsmax' ),
			'desc'   => esc_html__( 'options below will apply to the breaking news bar.', 'newsmax' ),
			'icon'   => 'el el-fire',
			'fields' => array(
				//breaking news
				array(
					'id'     => 'section_start_breaking_news',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Breaking News Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'breaking_news_page',
					'type'     => 'switch',
					'title'    => esc_html__( 'Show on Ruby Composer Pages', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable the breaking news bar on pages have built with Ruby Composer.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'breaking_news_blog',
					'type'     => 'switch',
					'title'    => esc_html__( 'Show on The Blog', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable the breaking news bar on the latest blog page (index.php)', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'breaking_news_title',
					'type'     => 'text',
					'title'    => esc_html__( 'Breaking News Title', 'newsmax' ),
					'subtitle' => esc_html__( 'input your breaking news title.', 'newsmax' ),
					'default'  => esc_html( 'breaking news' )
				),
				array(
					'id'     => 'section_end_breaking_news',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//breaking filter
				array(
					'id'     => 'section_start_breaking_filter',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Breaking News Filter Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'breaking_news_cat',
					'type'     => 'select',
					'data'     => 'categories',
					'multi'    => true,
					'title'    => esc_html__( 'Categories Filter', 'newsmax' ),
					'subtitle' => esc_html__( 'filter multi categories for the breaking news bar, leave blank if you want to select all categories.', 'newsmax' ),
				),
				array(
					'id'       => 'breaking_news_tag',
					'type'     => 'select',
					'data'     => 'tags',
					'multi'    => true,
					'title'    => esc_html__( 'Tags Filter', 'newsmax' ),
					'subtitle' => esc_html__( 'Select tags for breaking news bar, you can select multi tags. Leave blank if you don\'t select any tags.', 'newsmax' ),
				),
				array(
					'id'       => 'breaking_news_sort',
					'type'     => 'select',
					'title'    => esc_html__( 'Sorted By', 'newsmax' ),
					'subtitle' => esc_html__( 'Select a sort type for the breaking news bar.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::post_orders(),
					'default'  => 'date_post'
				),
				array(
					'id'       => 'breaking_news_num',
					'title'    => esc_html__( 'Number of Posts', 'newsmax' ),
					'subtitle' => esc_html__( 'Select number of posts for the breaking news bar.', 'newsmax' ),
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'default'  => 5
				),
				array(
					'id'       => 'breaking_news_offset',
					'title'    => esc_html__( 'Offset of Posts', 'newsmax' ),
					'subtitle' => esc_html__( 'select number of posts to displace or pass over. The beginning number is 0.', 'newsmax' ),
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'default'  => 0
				),
				array(
					'id'     => 'section_end_breaking_filter',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_breaking_right',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Right Element Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'breaking_news_right',
					'type'     => 'select',
					'title'    => esc_html__( 'Right Element', 'newsmax' ),
					'subtitle' => esc_html__( 'select elements to display at the right of the breaking news bar.', 'newsmax' ),
					'options'  => array(
						''    => esc_html__( 'None', 'newsmax' ),
						'tag' => esc_html__( 'Tags', 'newsmax' ),
						'cat' => esc_html__( 'Categories', 'newsmax' ),
					),
					'default'  => ''
				),
				array(
					'id'       => 'breaking_news_cat_custom',
					'type'     => 'select',
					'title'    => esc_html__( 'Categories - Custom', 'newsmax' ),
					'subtitle' => esc_html__( 'select categories you want to display.', 'newsmax' ),
					'multi'    => true,
					'data'     => 'categories',
					'default'  => ''
				),
				array(
					'id'       => 'breaking_news_right_type',
					'type'     => 'switch',
					'title'    => esc_html__( 'Tags - Type', 'newsmax' ),
					'subtitle' => esc_html__( 'select a type to display at the right of the breaking news bar.', 'newsmax' ),
					'on'       => 'popular tags',
					'off'      => 'custom tags',
					'default'  => 1
				),
				array(
					'id'       => 'breaking_news_tag_num',
					'type'     => 'text',
					'title'    => esc_html__( 'Tags - Number of Tags', 'newsmax' ),
					'subtitle' => esc_html__( 'input number of tags for displaying at the right of the breaking news bar.', 'newsmax' ),
					'required' => array( 'breaking_news_right_type', '=', 1 ),
					'class'    => 'small-text',
					'validate' => 'numeric',
					'switch'   => true,
					'default'  => 3
				),
				array(
					'id'       => 'breaking_news_tag_custom',
					'type'     => 'select',
					'title'    => esc_html__( 'Tags - Custom', 'newsmax' ),
					'subtitle' => esc_html__( 'select tags name you want to display.', 'newsmax' ),
					'required' => array( 'breaking_news_right_type', '=', 0 ),
					'multi'    => true,
					'data'     => 'tags',
					'default'  => ''
				),
				array(
					'id'     => 'section_end_breaking_right',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),

			)
		);
	}
}