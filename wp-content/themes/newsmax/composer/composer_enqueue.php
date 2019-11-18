<?php
//registering page composer css and script
if ( ! function_exists( 'newsmax_ruby_register_script_composer' ) ) {
	function newsmax_ruby_register_script_composer( $hook ) {
		if ( $hook == 'post.php' || $hook == 'post-new.php' ) {
			wp_enqueue_style( 'newsmax_ruby_composer_style', get_template_directory_uri() . '/composer/assets/composer-style.css', array(), NEWSMAX_THEME_VERSION, 'all' );
			wp_enqueue_script( 'newsmax_ruby_composer_script', get_template_directory_uri() . '/composer/assets/composer-script.js', array( 'jquery' ), NEWSMAX_THEME_VERSION, true );
		}
	}

	//add action
	add_action( 'admin_enqueue_scripts', 'newsmax_ruby_register_script_composer' );
}

//registering page composer script for seo Yoast analytics
if(!function_exists('newsmax_ruby_register_script_composer_seo')){
	function newsmax_ruby_register_script_composer_seo($hook) {
		if ( $hook == 'post.php' || $hook == 'post-new.php' ) {
			$prefix = 'wp-seo';
			if ( class_exists( 'WPSEO_Admin_Asset_Manager' ) ) {
				$prefix = 'yoast-seo';
			}

			if ( wp_script_is( $prefix . '-post-scraper', 'enqueued' ) ) {
				wp_enqueue_script('newsmax_ruby_composer_analytics_post', get_template_directory_uri() . '/composer/assets/composer-seo-script.js',array('jquery',$prefix . '-post-scraper'), NEWSMAX_THEME_VERSION, true);
			}

			if ( wp_script_is( $prefix . '-term-scraper', 'enqueued' ) ) {
				wp_enqueue_script('newsmax_ruby_composer_analytics_term',get_template_directory_uri() . '/composer/assets/composer-seo-script.js',array('jquery',$prefix . '-term-scraper'), NEWSMAX_THEME_VERSION, true);
			}
		}
	}

	//add to admin script
	add_filter( 'admin_enqueue_scripts','newsmax_ruby_register_script_composer_seo', 999 );
}

