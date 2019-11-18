<?php
//registering admin css and script
if ( ! function_exists( 'newsmax_ruby_register_script_backend' ) ) {
	function newsmax_ruby_register_script_backend( $hook ) {
		wp_register_style( 'newsmax_ruby_style_admin', get_template_directory_uri() . '/backend/assets/admin-style.css', array(), NEWSMAX_THEME_VERSION, 'all' );
		wp_enqueue_style( 'newsmax_ruby_style_admin' );

		if ( $hook == 'post.php' || $hook == 'post-new.php' ) {
			wp_register_script( 'newsmax_ruby_script_admin', get_template_directory_uri() . '/backend/assets/admin-script.js', array( 'jquery' ), NEWSMAX_THEME_VERSION, true );
			wp_enqueue_script( 'newsmax_ruby_script_admin' );
		}
	}

	if ( is_admin() ) {
		add_action( 'admin_enqueue_scripts', 'newsmax_ruby_register_script_backend' );
	}
};
