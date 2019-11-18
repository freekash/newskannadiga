<?php
/**
 * Plugin Name: Newsmax Importer
 * Plugin URI: http://themeruby.com/
 * Description: one click to import demos for Newsmax.
 * Version: 1.0
 * Author: Theme-Ruby
 * Author URI: http://themeruby.com/
 * @package   newsmax-import
 * @copyright (c) 2017, Theme-Ruby
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'newsmax_ruby_load_extension_loader' ) ) {
	function newsmax_ruby_load_extension_loader( $ReduxFramework ) {

		$path    = dirname( __FILE__ ) . '/extensions/';
		$folders = scandir( $path, 1 );
		foreach ( $folders as $folder ) {
			if ( $folder === '.' or $folder === '..' or ! is_dir( $path . $folder ) ) {
				continue;
			}
			$extension_class = 'ReduxFramework_Extension_' . $folder;
			if ( ! class_exists( $extension_class ) ) {
				// In case you wanted override your override, hah.
				$class_file = $path . $folder . '/extension_' . $folder . '.php';
				$class_file = apply_filters( 'redux/extension/' . $ReduxFramework->args['opt_name'] . '/' . $folder, $class_file );
				if ( $class_file ) {
					require_once( $class_file );
				}
			}
			if ( ! isset( $ReduxFramework->extensions[ $folder ] ) ) {
				$ReduxFramework->extensions[ $folder ] = new $extension_class( $ReduxFramework );
			}
		}

	}

	add_action( 'redux/extensions/newsmax_ruby_theme_options/before', 'newsmax_ruby_load_extension_loader', 0 );
}


if ( ! function_exists( 'newsmax_ruby_imported_demo' ) ) {
	function newsmax_ruby_imported_demo( $demo_active_import ) {

		reset( $demo_active_import );
		$current_key = key( $demo_active_import );

		//setup menu
		$menu_array = array(
			'default',
			'fashion',
			'video',
			'foodies',
			'craft',
			'travel',
			'technology',
			'automotive',
			'sport',
			'entertainment'
		);

		if ( isset( $demo_active_import[ $current_key ]['directory'] ) && ! empty( $demo_active_import[ $current_key ]['directory'] ) && in_array( $demo_active_import[ $current_key ]['directory'], $menu_array ) ) {

			$main_menu   = get_term_by( 'name', 'main', 'nav_menu' );
			$small_menu  = get_term_by( 'name', 'small', 'nav_menu' );
			$top_menu    = get_term_by( 'name', 'top', 'nav_menu' );
			$footer_menu = get_term_by( 'name', 'footer', 'nav_menu' );

			if ( isset( $main_menu->term_id ) ) {
				set_theme_mod( 'nav_menu_locations', array(
						'newsmax_ruby_menu_main'      => $main_menu->term_id,
						'newsmax_ruby_menu_small'     => $small_menu->term_id,
						'newsmax_ruby_menu_topbar'    => $top_menu->term_id,
						'newsmax_ruby_menu_offcanvas' => $main_menu->term_id,
						'newsmax_ruby_menu_footer'    => $footer_menu->term_id,
					)
				);
			}
		}

		//setup homepage
		$home_pages = array(
			'default'       => 'Home Default',
			'fashion'       => 'Home Fashion',
			'video'         => 'Home Video',
			'foodies'       => 'Home Foodies',
			'craft'         => 'Home Craft',
			'travel'        => 'Home Travel',
			'technology'    => 'Home Tech',
			'automotive'    => 'Home Automotive',
			'sport'         => 'Home Sport',
			'entertainment' => 'Home Entertainment'
		);

		if ( isset( $demo_active_import[ $current_key ]['directory'] ) && ! empty( $demo_active_import[ $current_key ]['directory'] ) && array_key_exists( $demo_active_import[ $current_key ]['directory'], $home_pages ) ) {

			if ( ! empty( $home_pages[ $demo_active_import[ $current_key ]['directory'] ] ) ) {
				$page = get_page_by_title( $home_pages[ $demo_active_import[ $current_key ]['directory'] ] );
				if ( ! empty( $page->ID ) ) {
					//setup page
					update_option( 'page_on_front', $page->ID );
					update_option( 'show_on_front', 'page' );

					//setup blog
					$blog = get_page_by_title( 'Blog' );
					if ( ! empty( $blog->ID ) ) {
						update_option( 'page_for_posts', $blog->ID );
					}

				}
			} else {
				update_option( 'page_on_front', 0 );
				update_option( 'show_on_front', 'posts' );
			}
		}

	}

	//setup menu
	add_action( 'wbc_importer_after_content_import', 'newsmax_ruby_imported_demo', 10, 2 );
}


if ( ! function_exists( 'newsmax_ruby_init_before_import' ) ) {
	function newsmax_ruby_init_before_import() {

		//delete instagram cache
		delete_transient( 'newsmax_ruby_instagram_cache' );

		//custom sidebars
		$sidebars_widgets['newsmax_ruby_sidebar_multi_sb1']     = array();
		$sidebars_widgets['newsmax_ruby_sidebar_multi_sb2']     = array();
		$sidebars_widgets['newsmax_ruby_sidebar_multi_sb3']     = array();
		$sidebars_widgets['newsmax_ruby_sidebar_multi_single']  = array();
		$sidebars_widgets['newsmax_ruby_sidebar_multi_contact'] = array();

		//default sidebars
		$sidebars_widgets['newsmax_ruby_sidebar_default']          = array();
		$sidebars_widgets['newsmax_ruby_sidebar_offcanvas']        = array();
		$sidebars_widgets['newsmax_ruby_sidebar_navigation']       = array();
		$sidebars_widgets['newsmax_ruby_blog_column_1']            = array();
		$sidebars_widgets['newsmax_ruby_blog_column_2']            = array();
		$sidebars_widgets['newsmax_ruby_blog_column_3']            = array();
		$sidebars_widgets['newsmax_ruby_sidebar_footer_fullwidth'] = array();
		$sidebars_widgets['newsmax_ruby_sidebar_footer_1']         = array();
		$sidebars_widgets['newsmax_ruby_sidebar_footer_2']         = array();
		$sidebars_widgets['newsmax_ruby_sidebar_footer_3']         = array();
		$sidebars_widgets['newsmax_ruby_sidebar_footer_4']         = array();

		update_option( 'sidebars_widgets', $sidebars_widgets );

		register_sidebar(
			array(
				'name'          => 'sb1',
				'id'            => 'newsmax_ruby_sidebar_multi_sb1',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<div class="widget-title block-title"><h3>',
				'after_title'   => '</h3></div>'
			)
		);
		register_sidebar(
			array(
				'name'          => 'sb2',
				'id'            => 'newsmax_ruby_sidebar_multi_sb2',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<div class="widget-title block-title"><h3>',
				'after_title'   => '</h3></div>'
			)
		);
		register_sidebar(
			array(
				'name'          => 'sb3',
				'id'            => 'newsmax_ruby_sidebar_multi_sb3',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<div class="widget-title block-title"><h3>',
				'after_title'   => '</h3></div>'
			)
		);
		register_sidebar(
			array(
				'name'          => 'single',
				'id'            => 'newsmax_ruby_sidebar_multi_single',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<div class="widget-title block-title"><h3>',
				'after_title'   => '</h3></div>'
			)
		);
		register_sidebar(
			array(
				'name'          => 'contact',
				'id'            => 'newsmax_ruby_sidebar_multi_contact',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<div class="widget-title block-title"><h3>',
				'after_title'   => '</h3></div>'
			)
		);
	}

	//remove widget
	add_action( 'wbc_importer_before_widget_import', 'newsmax_ruby_init_before_import', 10, 2 );
}