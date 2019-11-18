<?php
//check empty
if ( ! class_exists( 'ReduxFramework' ) ) {
	return false;
}

if ( ! function_exists( 'newsmax_ruby_redux_remove_demo_link' ) && class_exists( 'ReduxFrameworkPlugin' ) ) {
	function newsmax_ruby_redux_remove_demo_link() {
		remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks' ), null, 2 );
		remove_action( 'admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );
	}

	add_action( 'redux/loaded', 'newsmax_ruby_redux_remove_demo_link', 1 );
}

if ( ! function_exists( 'newsmax_ruby_register_style_redux' ) ) {
	function newsmax_ruby_register_style_redux() {
		wp_register_style( 'newsmax_ruby_style_redux', NEWSMAX_RUBY_PLUGIN_URL . 'assets/redux-style.css', array( 'redux-admin-css' ), NEWSMAX_RUBY_PLUGIN_VERSION, 'all' );
		wp_enqueue_style( 'newsmax_ruby_style_redux' );
		wp_dequeue_script( 'redux-rtl-css' );

	}

	if ( is_admin() ) {
		add_action( 'redux/page/newsmax_ruby_theme_options/enqueue', 'newsmax_ruby_register_style_redux' );
	}
};

//get theme option
if ( ! function_exists( 'newsmax_ruby_get_option' ) ) {
	function newsmax_ruby_get_option( $option ) {
		global $newsmax_ruby_theme_options;

		if ( ! empty( $newsmax_ruby_theme_options[ $option ] ) ) {
			return $newsmax_ruby_theme_options[ $option ];
		} else {
			return false;
		}
	}
}