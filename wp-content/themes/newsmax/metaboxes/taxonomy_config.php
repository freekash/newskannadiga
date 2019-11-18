<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return bool
 * taxonomy config
 */
if ( ! function_exists( 'newsmax_ruby_register_taxonomy_category' ) ) {
	function newsmax_ruby_register_taxonomy_category() {

		if ( ! class_exists( 'RW_Taxonomy_Meta' ) ) {
			return false;
		}

		$meta_sections   = array();
		$meta_sections[] = array(
			'title'      => esc_html__( 'CATEGORY FEATURED AREA OPTIONS', 'newsmax' ),
			'taxonomies' => array( 'category' ),
			'id'         => 'newsmax_ruby_category_option_feat',
			'fields'     => array(
				array(
					'name'    => esc_html__( 'Featured Style', 'newsmax' ),
					'id'      => 'category_feat_style',
					'desc'    => esc_html__( 'select a featured layout for this category.', 'newsmax' ),
					'type'    => 'select',
					'options' => array(
						'default' => esc_html__( 'Default Form Theme Options', 'newsmax' ),
						'1'       => esc_html__( 'Style 1', 'newsmax' ),
						'2'       => esc_html__( 'Style 2', 'newsmax' ),
						'3'       => esc_html__( 'Style 3', 'newsmax' ),
						'4'       => esc_html__( 'Style 4', 'newsmax' ),
						'5'       => esc_html__( 'Style 5', 'newsmax' ),
						'6'       => esc_html__( 'Style 6', 'newsmax' ),
						'7'       => esc_html__( 'Style 7', 'newsmax' ),
						'8'       => esc_html__( 'Style 8', 'newsmax' ),
						'9'       => esc_html__( 'Style 9', 'newsmax' ),
						'10'      => esc_html__( 'Style 10', 'newsmax' ),
						'11'      => esc_html__( 'Style 11', 'newsmax' ),
						'12'      => esc_html__( 'Style 12', 'newsmax' ),
						'none'    => esc_html__( 'None', 'newsmax' ),
					),
					'std'     => 'default',
				),
				array(
					'name'    => esc_html__( 'Featured Grid Style', 'newsmax' ),
					'id'      => 'category_feat_grid_style',
					'desc'    => esc_html__( 'Select a featured grid style for this category.', 'newsmax' ),
					'type'    => 'select',
					'options' => array(
						'default' => esc_html__( 'Default Form Theme Options', 'newsmax' ),
						'1'       => esc_html__( '-- Style 1 --', 'newsmax' ),
						'2'       => esc_html__( 'Style 2 (Top Title)', 'newsmax' ),
						'3'       => esc_html__( 'Style 3 (Middle Title)', 'newsmax' ),
						'4'       => esc_html__( 'Style 4 (Rainbow)', 'newsmax' ),
						'5'       => esc_html__( 'Style 5 (Rainbow + Middle Title)', 'newsmax' ),
					),
					'std'     => 'default',
				),
				array(
					'name' => esc_html__( 'Tags Filter', 'newsmax' ),
					'id'   => 'category_feat_tag',
					'desc' => esc_html__( 'input tags name for this featured area, separated by commas (for example: tag1,tag2,tag3). Leave blank if you want to use default settings from Theme Options.', 'newsmax' ),
					'type' => 'text',
					'std'  => '',
				),
				array(
					'name'    => esc_html__( 'Sorted By', 'newsmax' ),
					'id'      => 'category_feat_orderby',
					'desc'    => esc_html__( 'Select a sort type for this featured area.', 'newsmax' ),
					'type'    => 'select',
					'options' => array(
						'default'                 => esc_html__( 'Default Form Theme Options', 'newsmax' ),
						'date_post'               => esc_html__( 'Latest Post', 'newsmax' ),
						'comment_count'           => esc_html__( 'Popular Comment', 'newsmax' ),
						'popular'                 => esc_html__( 'Popular View', 'newsmax' ),
						'popular_week'            => esc_html__( 'Popular Week View', 'newsmax' ),
						'top_review'              => esc_html__( 'Top Review', 'newsmax' ),
						'last_review'             => esc_html__( 'Latest Review', 'newsmax' ),
						'post_type'               => esc_html__( 'Post Type', 'newsmax' ),
						'rand'                    => esc_html__( 'Random', 'newsmax' ),
						'author'                  => esc_html__( 'Author', 'newsmax' ),
						'alphabetical_order_decs' => esc_html__( 'Title DECS', 'newsmax' ),
						'alphabetical_order_asc'  => esc_html__( 'Title ACS', 'newsmax' )
					),
					'std'     => 'default',
				),
				array(
					'name' => esc_html__( 'Offset of Posts', 'newsmax' ),
					'id'   => 'category_feat_offset',
					'desc' => esc_html__( 'select number of posts to displace or pass over. Leave blank or set 0 if you want to use settings of Theme Options. Set -1 if you want to have beginning number is 0.', 'newsmax' ),
					'type' => 'text',
					'std'  => '',
				),
				array(
					'name' => esc_html__( 'Number of Slides/Posts', 'newsmax' ),
					'id'   => 'category_feat_slides_per_page',
					'desc' => esc_html__( 'select number of slides or posts (depending on the style you selected) for this featured area. Leave blank or set 0 if you want to use settings of theme options.', 'newsmax' ),
					'type' => 'text',
					'std'  => '',
				),
			)
		);

		$meta_sections[] = array(
			'title'      => esc_html__( 'CATEGORY LAYOUT OPTIONS', 'newsmax' ),
			'taxonomies' => array( 'category' ),
			'id'         => 'newsmax_ruby_category_option_layout',
			'fields'     => array(
				array(
					'name'    => esc_html__( 'Category Layout', 'newsmax' ),
					'id'      => 'category_layout',
					'desc'    => esc_html__( 'select a layout for this category.', 'newsmax' ),
					'type'    => 'select',
					'options' => array(
						'default'   => esc_html__( 'Default Form Theme Options', 'newsmax' ),
						'classic_1' => esc_html__( 'Classic 1', 'newsmax' ),
						'classic_2' => esc_html__( 'Classic 2', 'newsmax' ),
						'grid_1'    => esc_html__( 'Grid 1', 'newsmax' ),
						'grid_2'    => esc_html__( 'Grid 2', 'newsmax' ),
						'grid_3'    => esc_html__( 'Grid 3', 'newsmax' ),
						'grid_4'    => esc_html__( 'Grid 4', 'newsmax' ),
						'grid_5'    => esc_html__( 'Grid 5', 'newsmax' ),
						'list_1'    => esc_html__( 'List 1', 'newsmax' ),
						'list_2'    => esc_html__( 'List 2', 'newsmax' ),
						'list_3'    => esc_html__( 'List 3', 'newsmax' )
					),
					'std'     => 'default',
				),
				array(
					'name'    => esc_html__( '1st Classic Layout', 'newsmax' ),
					'id'      => 'category_1st_classic',
					'desc'    => esc_html__( 'enable or disable classic layout at the first post of the blog listing, This option will not apply to classic layouts.', 'newsmax' ),
					'type'    => 'select',
					'options' => array(
						'default' => esc_html__( 'Default Form Theme Options', 'newsmax' ),
						'1'       => esc_html__( 'Enable', 'newsmax' ),
						'2'       => esc_html__( 'Disable', 'newsmax' ),
					),
					'std'     => 'default',
				),
				array(
					'name'    => esc_html__( '1st Classic Style', 'newsmax' ),
					'id'      => 'category_1st_classic_layout',
					'desc'    => esc_html__( 'select a style for the 1st classic layout.', 'newsmax' ),
					'type'    => 'select',
					'options' => array(
						'default'   => esc_html__( 'Default Form Theme Options', 'newsmax' ),
						'classic_1' => esc_html__( 'Classic 1', 'newsmax' ),
						'classic_2' => esc_html__( 'Classic 2', 'newsmax' ),
					),
					'std'     => 'default',
				),
				array(
					'name' => esc_html__( 'Number Of Posts', 'newsmax' ),
					'id'   => 'category_posts_per_page',
					'desc' => esc_html__( 'select number of posts for this category. Leave blank or set 0 if you want to use settings of theme options.', 'newsmax' ),
					'type' => 'text',
					'std'  => '',
				)
			)
		);

		$meta_sections[] = array(
			'title'      => esc_html__( 'CATEGORY PAGINATION OPTIONS', 'newsmax' ),
			'taxonomies' => array( 'category' ),
			'id'         => 'newsmax_ruby_category_option_pagination',
			'fields'     => array(
				array(
					'name'    => esc_html__( 'Category Pagination', 'newsmax' ),
					'id'      => 'category_pagination',
					'desc'    => esc_html__( 'Select pagination style for this category.', 'newsmax' ),
					'type'    => 'select',
					'options' => array(
						'default'         => esc_html__( 'Default Form Theme Options', 'newsmax' ),
						'number'          => esc_html__( 'Numeric', 'newsmax' ),
						'next_prev'       => esc_html__( 'Next Prev', 'newsmax' ),
						'loadmore'        => esc_html__( 'Load More', 'newsmax' ),
						'infinite_scroll' => esc_html__( 'Infinite Scroll', 'newsmax' ),
					),
					'std'     => 'default',
				)
			)
		);

		$meta_sections[] = array(
			'title'      => esc_html__( 'CATEGORY SIDEBAR OPTIONS', 'newsmax' ),
			'taxonomies' => array( 'category' ),
			'id'         => 'newsmax_ruby_category_option_sidebar',
			'fields'     => array(
				array(
					'name'    => esc_html__( 'Category Sidebar Name', 'newsmax' ),
					'id'      => 'category_sidebar_name',
					'desc'    => esc_html__( 'Select a sidebar for this category.', 'newsmax' ),
					'type'    => 'select',
					'options' => newsmax_ruby_theme_config::sidebar_name( true ),
					'std'     => 'newsmax_ruby_default_from_theme_options',
				),
				array(
					'name'    => esc_html__( 'Category Sidebar Position', 'newsmax' ),
					'id'      => 'category_sidebar_position',
					'desc'    => esc_html__( 'Select sidebar position for this category.', 'newsmax' ),
					'type'    => 'select',
					'options' => array(
						'default' => esc_html__( 'Default Form Theme Options', 'newsmax' ),
						'right'   => esc_html__( 'Right', 'newsmax' ),
						'left'    => esc_html__( 'Left', 'newsmax' ),
						'none'    => esc_html__( 'None', 'newsmax' ),
					),
					'std'     => 'default',
				),
			),
		);

		$meta_sections[] = array(
			'title'      => esc_html__( 'CATEGORY COLOR OPTIONS', 'newsmax' ),
			'taxonomies' => array( 'category' ),
			'id'         => 'newsmax_ruby_category_option_color',
			'fields'     => array(
				array(
					'name' => esc_html__( 'Category Info Color', 'newsmax' ),
					'desc' => esc_html__( 'select a color value for this category info (in hex value, for example: #ff4545). Leave blank if you want to set as default color.', 'newsmax' ),
					'id'   => 'category_color',
					'type' => 'text',
					'std'  => '',
				),
			),
		);

		foreach ( $meta_sections as $meta_section ) {
			new RW_Taxonomy_Meta( $meta_section );
		}

		return false;
	}

	//add action
	add_action( 'admin_init', 'newsmax_ruby_register_taxonomy_category' );

}
