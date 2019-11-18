<?php
/**
 * Plugin Name:    Newsmax Core
 * Plugin URI:     https://themeforest.net/user/theme-ruby/
 * Description:    features for NewsMax, this is required plugin (important) for this theme.
 * Version:        1.6
 * Text Domain:    newsmax-core
 * Domain Path:    /languages/
 * Author:         Theme-Ruby
 * Author URI:     https://themeforest.net/user/theme-ruby/
 * @package        newsmax-core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'NEWSMAX_RUBY_PLUGIN_VERSION', '1.5' );
define( 'NEWSMAX_RUBY_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

//load translate
if ( ! function_exists( 'newsmax_ruby_language_load' ) ) {
	add_action( 'init', 'newsmax_ruby_language_load' );
	function newsmax_ruby_language_load() {
		$plugin_dir = basename( dirname( __FILE__ ) ) . '/languages/';
		load_plugin_textdomain( 'newsmax-core', false, $plugin_dir );
	}
}

if ( ! class_exists( 'RW_Taxonomy_Meta' ) ) {
	include_once( 'lib/taxonomy-meta.php' );
}

if ( ! class_exists( 'RW_Meta_Box' ) ) {
	include_once( 'lib/meta-box/meta-box.php' );
}

global $newsmax_ruby_theme_options;
if ( ! class_exists( 'ReduxFramework' ) ) {
	include_once( 'lib/redux-framework/framework.php' );
}

//enqueue script
if ( ! function_exists( 'newsmax_ruby_core_enqueue_scripts' ) ) {
	function newsmax_ruby_core_enqueue_scripts() {
		wp_enqueue_style( 'newsmax_ruby_core_style', NEWSMAX_RUBY_PLUGIN_URL . 'assets/style.css', array(), NEWSMAX_RUBY_PLUGIN_VERSION, 'all' );
		wp_enqueue_script( 'newsmax_ruby_core_script', NEWSMAX_RUBY_PLUGIN_URL . 'assets/script.js', array( 'jquery' ), NEWSMAX_RUBY_PLUGIN_VERSION, true );
	}

	add_action( 'wp_enqueue_scripts', 'newsmax_ruby_core_enqueue_scripts', 1 );
}

include_once( 'includes/redux_config.php' );
include_once( 'includes/translation.php' );
include_once( 'includes/core.php' );
include_once( 'includes/shortcodes.php' );
include_once( 'includes/author.php' );
include_once( 'includes/socials/counter_fan.php' );
include_once( 'includes/socials/share_total.php' );
include_once( 'includes/socials/share.php' );
include_once( 'includes/socials/like.php' );
include_once( 'includes/socials/media.php' );
include_once( 'includes/view.php' );
include_once( 'includes/advertising.php' );
include_once( 'widgets/fullwidth_instagram.php' );
include_once( 'widgets/navbar_button.php' );
include_once( 'widgets/sidebar_advertising.php' );
include_once( 'widgets/sidebar_banner.php' );
include_once( 'widgets/sidebar_banner_single.php' );
include_once( 'widgets/sidebar_facebook.php' );
include_once( 'widgets/sidebar_flickr.php' );
include_once( 'widgets/sidebar_instagram.php' );
include_once( 'widgets/sidebar_post.php' );
include_once( 'widgets/sidebar_social_counter.php' );
include_once( 'widgets/sidebar_social_icon.php' );
include_once( 'widgets/sidebar_subscribe.php' );
include_once( 'widgets/sidebar_tweet.php' );
include_once( 'widgets/sidebar_youtube.php' );