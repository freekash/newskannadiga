<?php
/**
 * registering sidebar sections
 */
if ( ! function_exists( 'newsmax_ruby_sidebars_register' ) ) {
	function newsmax_ruby_sidebars_register() {

		register_sidebar( array(
				'id'            => 'newsmax_ruby_sidebar_default',
				'name'          => esc_html__( 'Default Sidebar', 'newsmax' ),
				'description'   => esc_html__( 'The default sidebar of the this theme.', 'newsmax' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<div class="widget-title block-title"><h3>',
				'after_title'   => '</h3></div>'
			)
		);

		$data_sidebar = get_option( 'newsmax_ruby_custom_multi_sidebars', '' );
		if ( ! empty( $data_sidebar ) && is_array( $data_sidebar ) ) {
			foreach ( $data_sidebar as $sidebar ) {
				register_sidebar(
					array(
						'id'            => $sidebar['id'],
						'name'          => $sidebar['name'],
						'description'   => esc_html__( 'A sidebar section of your website.', 'newsmax' ),
						'before_widget' => '<section id="%1$s" class="widget %2$s">',
						'after_widget'  => '</section>',
						'before_title'  => '<div class="widget-title block-title"><h3>',
						'after_title'   => '</h3></div>'
					)
				);
			};
		};

		register_sidebar( array(
				'id'            => 'newsmax_ruby_sidebar_offcanvas',
				'name'          => esc_html__( 'Off-Canvas Section', 'newsmax' ),
				'description'   => esc_html__( 'The hidden section at the left of your website. This section contains mobile navigation and widgets for displaying mobile devices.', 'newsmax' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<div class="widget-title block-title"><h3>',
				'after_title'   => '</h3></div>'
			)
		);

		register_sidebar( array(
				'id'            => 'newsmax_ruby_sidebar_navigation',
				'name'          => esc_html__( 'Navigation - Right Section', 'newsmax' ),
				'description'   => esc_html__( 'The section at the right of the main navigation, this section only allows the text widget content and navbar button widget.', 'newsmax' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '',
				'after_title'   => ''
			)
		);

		//blog home section
		register_sidebar( array(
				'id'            => 'newsmax_ruby_blog_column_1',
				'name'          => esc_html__( 'First Top Column of Blog Page', 'newsmax' ),
				'description'   => esc_html__( 'one of the columns at the top of the latest blog page (index.php). This section only allows full-width widgets', 'newsmax' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<div class="widget-title block-title"><h3>',
				'after_title'   => '</h3></div>'
			)
		);

		register_sidebar( array(
				'id'            => 'newsmax_ruby_blog_column_2',
				'name'          => esc_html__( 'Second Top Column of Blog Page', 'newsmax' ),
				'description'   => esc_html__( 'one of the columns at the top of the latest blog page (index.php).', 'newsmax' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<div class="widget-title block-title"><h3>',
				'after_title'   => '</h3></div>'
			)
		);

		register_sidebar( array(
				'id'            => 'newsmax_ruby_blog_column_3',
				'name'          => esc_html__( 'Third Top Column of Blog Page', 'newsmax' ),
				'description'   => esc_html__( 'one of the columns at the top of the latest blog page (index.php).', 'newsmax' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<div class="widget-title block-title"><h3>',
				'after_title'   => '</h3></div>'
			)
		);

		//footer sections
		register_sidebar( array(
				'id'            => 'newsmax_ruby_sidebar_footer_fullwidth',
				'name'          => esc_html__( 'Top Footer (Full-Width)', 'newsmax' ),
				'description'   => esc_html__( 'Full-width section at the top of the footer area.', 'newsmax' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<div class="widget-title block-title"><h3>',
				'after_title'   => '</h3></div>'
			)
		);

		register_sidebar( array(
				'id'            => 'newsmax_ruby_sidebar_footer_1',
				'name'          => esc_html__( 'Footer 1', 'newsmax' ),
				'description'   => esc_html__( 'one of the columns of the footer area.', 'newsmax' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<div class="widget-title block-title"><h3>',
				'after_title'   => '</h3></div>'
			)
		);

		register_sidebar( array(
				'id'            => 'newsmax_ruby_sidebar_footer_2',
				'name'          => esc_html__( 'Footer 2', 'newsmax' ),
				'description'   => esc_html__( 'one of the columns of the footer area.', 'newsmax' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<div class="widget-title block-title"><h3>',
				'after_title'   => '</h3></div>'
			)
		);

		register_sidebar( array(
				'id'            => 'newsmax_ruby_sidebar_footer_3',
				'name'          => esc_html__( 'Footer 3', 'newsmax' ),
				'description'   => esc_html__( 'one of the columns of the footer area.', 'newsmax' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<div class="widget-title block-title"><h3>',
				'after_title'   => '</h3></div>'
			)
		);

		register_sidebar( array(
				'id'            => 'newsmax_ruby_sidebar_footer_4',
				'name'          => esc_html__( 'Footer 4', 'newsmax' ),
				'description'   => esc_html__( 'one of the columns of the footer area, this section is only available when you enable 4 columns in Newsmax > Footer Options > Footer style.', 'newsmax' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<div class="widget-title block-title"><h3>',
				'after_title'   => '</h3></div>'
			)
		);
	}

	add_action( 'widgets_init', 'newsmax_ruby_sidebars_register' );
}