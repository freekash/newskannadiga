<?php
//theme version
define( 'NEWSMAX_THEME_VERSION', '1.8' );

//theme setup
if ( ! function_exists( 'newsmax_ruby_theme_setup' ) ) {
	function newsmax_ruby_theme_setup() {

		if ( ! isset( $GLOBALS['content_width'] ) ) {
			$GLOBALS['content_width'] = 1170;
		}

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
		add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio' ) );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		register_nav_menu( 'newsmax_ruby_menu_main', esc_html__( 'Main Navigation', 'newsmax' ) );
		register_nav_menu( 'newsmax_ruby_menu_small', esc_html__( 'Small Navigation', 'newsmax' ) );
		register_nav_menu( 'newsmax_ruby_menu_topbar', esc_html__( 'Top Navigation', 'newsmax' ) );
		register_nav_menu( 'newsmax_ruby_menu_offcanvas', esc_html__( 'Off-Canvas Navigation', 'newsmax' ) );
		register_nav_menu( 'newsmax_ruby_menu_footer', esc_html__( 'Footer Navigation', 'newsmax' ) );

		add_editor_style( array( 'assets/css/editor-style.css', newsmax_ruby_font_urls() ) );

		load_theme_textdomain( 'newsmax', get_template_directory() . '/languages' );

		require_once ABSPATH . 'wp-admin/includes/plugin.php';
		require_once get_template_directory() . '/includes/theme_includes.php';
		require_once get_template_directory() . '/metaboxes/metabox_config.php';
		require_once get_template_directory() . '/metaboxes/taxonomy_config.php';
		require_once get_template_directory() . '/composer/composer.php';
		require_once get_template_directory() . '/templates/template_includes.php';
	}

	add_action( 'after_setup_theme', 'newsmax_ruby_theme_setup' );
}

//registering theme thumbnails
if ( ! function_exists( 'newsmax_ruby_add_image_size' ) ) {
	function newsmax_ruby_add_image_size() {

		add_theme_support( 'post-thumbnails' );

		add_image_size( 'newsmax_ruby_crop_1400x700', 1400, 700, array( 'center', 'top' ) ); //single feat 4, 5, 6
		add_image_size( 'newsmax_ruby_crop_1100x580', 1100, 580, array( 'center', 'top' ) ); //post feat 1, 9, video
		add_image_size( 'newsmax_ruby_crop_750x460', 750, 460, array( 'center', 'top' ) ); //post feat 3, post classic 2
		add_image_size( 'newsmax_ruby_crop_750x350', 750, 350, array( 'center', 'top' ) );//classic 1, post feat 1
		add_image_size( 'newsmax_ruby_crop_548x450', 548, 450, array( 'center', 'top' ) ); //post feat 6, post gallery 1
		add_image_size( 'newsmax_ruby_crop_540x300', 540, 300, array( 'center', 'top' ) ); //post feat 2, post grid 1
		add_image_size( 'newsmax_ruby_crop_380x380', 380, 380, array( 'center', 'top' ) ); //gallery 2, featured 6
		add_image_size( 'newsmax_ruby_crop_364x225', 364, 225, array( 'center', 'top' ) ); //post feat 4, 5, post grid 2
		add_image_size( 'newsmax_ruby_crop_364x150', 364, 150, array( 'center', 'top' ) ); //feat mobile layout
		add_image_size( 'newsmax_ruby_crop_272x170', 272, 170, array( 'center', 'top' ) );//post feat 7,
		add_image_size( 'newsmax_ruby_crop_364x460', 364, 460, array( 'center', 'top' ) );//post feat 8. post list 3
		add_image_size( 'newsmax_ruby_crop_100x65', 100, 65, array( 'center', 'top' ) ); //post list 5
	}

	add_action( 'after_setup_theme', 'newsmax_ruby_add_image_size' );
}

//default fonts
if ( ! function_exists( 'newsmax_ruby_font_urls' ) ) {
	function newsmax_ruby_font_urls() {

		$fonts_url    = '';
		$font_lato    = _x( 'on', 'Lato font: on or off', 'newsmax' );
		$font_poppins = _x( 'on', 'Poppins font: on or off', 'newsmax' );

		if ( 'off' !== $font_lato || 'off' !== $font_poppins ) {
			$font_families = array();

			if ( 'off' !== $font_lato ) {
				$font_families[] = 'Lato:400,700,400italic,700italic';
			}

			if ( 'off' !== $font_poppins ) {
				$font_families[] = 'Poppins:400,500,700';
			}

			$params = array(
				'family' => urlencode( implode( '|', $font_families ) ),
				'subset' => urlencode( 'latin,latin-ext' ),
			);

			$fonts_url = add_query_arg( $params, 'https://fonts.googleapis.com/css' );

		}

		return $fonts_url;
	}
}

//add default fonts
if ( ! class_exists( 'ReduxFramework' ) && ! function_exists( 'newsmax_ruby_add_default_font' ) ) {
	function newsmax_ruby_add_default_font() {
		wp_enqueue_style( 'google-font-lato-poppins', esc_url_raw( newsmax_ruby_font_urls() ), array(), null );
	}

	add_action( 'wp_enqueue_scripts', 'newsmax_ruby_add_default_font' );
}

//frontend script
if ( ! function_exists( 'newsmax_ruby_register_script_frontend' ) ) {
	function newsmax_ruby_register_script_frontend() {

		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/external/bootstrap.css', array(), 'v3.3.1', 'all' );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/external/font-awesome.css', array(), 'v4.7.0', 'all' );
		if ( is_rtl() ) {
			wp_enqueue_style( 'bootstrap-rtl', get_template_directory_uri() . '/assets/external/bootstrap-rtl.css', array( 'bootstrap' ), 'v1.0', 'all' );
			wp_enqueue_style( 'font-awesome-rtl', get_template_directory_uri() . '/assets/external/font-awesome-rtl.css', array(), 'v1.0', 'all' );
		}
		wp_enqueue_style( 'simple-line-icons', get_template_directory_uri() . '/assets/external/simple-line-icons.css', array(), 'v2.4.0', 'all' );
		wp_enqueue_style( 'newsmax-miscellaneous', get_template_directory_uri() . '/assets/css/miscellaneous.css', array(), NEWSMAX_THEME_VERSION, 'all' );

		wp_enqueue_style( 'newsmax-ruby-main', get_template_directory_uri() . '/assets/css/main.css', array(
			'bootstrap',
			'font-awesome',
			'simple-line-icons',
			'newsmax-miscellaneous'
		), NEWSMAX_THEME_VERSION, 'all' );

		wp_enqueue_style( 'newsmax-ruby-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(
			'bootstrap',
			'font-awesome',
			'simple-line-icons',
			'newsmax-miscellaneous',
			'newsmax-ruby-main'
		), NEWSMAX_THEME_VERSION, 'all' );

		wp_enqueue_style( 'newsmax-ruby-style', get_stylesheet_uri(), array(
			'bootstrap',
			'font-awesome',
			'simple-line-icons',
			'newsmax-miscellaneous',
			'newsmax-ruby-main',
			'newsmax-ruby-responsive'
		), NEWSMAX_THEME_VERSION );

		if ( class_exists( 'Woocommerce' ) ) {
			wp_register_style( 'newsmax-ruby-wc-style', get_template_directory_uri() . '/woocommerce/css/wc-style.css', array(), NEWSMAX_THEME_VERSION, 'all' );
			wp_enqueue_style( 'newsmax-ruby-wc-style' );
		}

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		wp_enqueue_script( 'html5', get_template_directory_uri() . '/assets/external/html5shiv.min.js', array(), '3.7.3' );
		wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

		wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/external/modernizr.min.js', array( 'jquery' ), 'v2.8.3', true );
		wp_enqueue_script( 'jquery-uitotop', get_template_directory_uri() . '/assets/external/jquery.ui.totop.min.js', array( 'jquery' ), 'v1.2', true );
		wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/assets/external/imagesloaded.min.js', array( 'jquery' ), 'v3.1.8', true );
		wp_enqueue_script( 'jquery-waypoints', get_template_directory_uri() . '/assets/external/jquery.waypoints.min.js', array( 'jquery' ), 'v3.1.1', true );
		wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/external/slick.min.js', array( 'jquery' ), 'v1.6.0', true );
		wp_enqueue_script( 'jquery-tipsy', get_template_directory_uri() . '/assets/external/jquery.tipsy.min.js', array( 'jquery' ), 'v1.0', true );
		wp_enqueue_script( 'jquery-magnific-popup', get_template_directory_uri() . '/assets/external/jquery.magnific-popup.min.js', array( 'jquery' ), 'v1.1.0', true );
		wp_enqueue_script( 'jquery-justifiedgallery', get_template_directory_uri() . '/assets/external/jquery.justifiedGallery.min.js', array( 'jquery' ), 'v3.6.0', true );
		wp_enqueue_script( 'jquery-backstretch', get_template_directory_uri() . '/assets/external/jquery.backstretch.min.js', array( 'jquery' ), 'v2.0.4', true );
		wp_enqueue_script( 'smoothscroll', get_template_directory_uri() . '/assets/external/smoothscroll.min.js', array( 'jquery' ), 'v1.2.1', true );
		wp_enqueue_script( 'jquery-fitvids', get_template_directory_uri() . '/assets/external/jquery.fitvids.min.js', array( 'jquery' ), 'v1.1', true );
		wp_enqueue_script( 'jquery-sticky', get_template_directory_uri() . '/assets/external/jquery.sticky.min.js', array( 'jquery' ), 'v1.0.3', true );
		wp_enqueue_script( 'jquery-ruby-sticky', get_template_directory_uri() . '/assets/external/jquery.ruby-sticky.min.js', array( 'jquery' ), '1.0', true );

		wp_enqueue_script( 'newsmax-ruby-global', get_template_directory_uri() . '/assets/js/global.js', array(
			'jquery',
			'modernizr',
			'jquery-uitotop',
			'imagesloaded',
			'jquery-waypoints',
			'slick',
			'jquery-tipsy',
			'jquery-magnific-popup',
			'jquery-justifiedgallery',
			'jquery-backstretch',
			'smoothscroll',
			'jquery-fitvids',
			'jquery-sticky',
			'jquery-ruby-sticky'
		), NEWSMAX_THEME_VERSION, true );

	}

	if ( ! is_admin() ) {
		add_action( 'wp_enqueue_scripts', 'newsmax_ruby_register_script_frontend' );
	}
}
