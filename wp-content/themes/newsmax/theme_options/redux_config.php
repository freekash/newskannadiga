<?php
//template directory
$newsmax_ruby_template_directory = get_template_directory();
require_once $newsmax_ruby_template_directory . '/theme_options/redux_default.php';

if ( ! class_exists( 'ReduxFramework' ) ) {
	return false;
}

require_once $newsmax_ruby_template_directory . '/theme_options/panels/general.php';
require_once $newsmax_ruby_template_directory . '/theme_options/panels/styling.php';
require_once $newsmax_ruby_template_directory . '/theme_options/panels/breaking_news.php';
require_once $newsmax_ruby_template_directory . '/theme_options/panels/logo.php';
require_once $newsmax_ruby_template_directory . '/theme_options/panels/header.php';
require_once $newsmax_ruby_template_directory . '/theme_options/panels/sidebar.php';
require_once $newsmax_ruby_template_directory . '/theme_options/panels/footer.php';
require_once $newsmax_ruby_template_directory . '/theme_options/panels/advertising.php';
require_once $newsmax_ruby_template_directory . '/theme_options/panels/blog_styling.php';
require_once $newsmax_ruby_template_directory . '/theme_options/panels/blog_index.php';
require_once $newsmax_ruby_template_directory . '/theme_options/panels/blog_archive.php';
require_once $newsmax_ruby_template_directory . '/theme_options/panels/social.php';
require_once $newsmax_ruby_template_directory . '/theme_options/panels/typo.php';
require_once $newsmax_ruby_template_directory . '/theme_options/panels/typo_header.php';
require_once $newsmax_ruby_template_directory . '/theme_options/panels/typo_body.php';
require_once $newsmax_ruby_template_directory . '/theme_options/panels/typo_post.php';
require_once $newsmax_ruby_template_directory . '/theme_options/panels/typo_heading.php';
require_once $newsmax_ruby_template_directory . '/theme_options/panels/typo_meta.php';
require_once $newsmax_ruby_template_directory . '/theme_options/panels/single_post.php';
require_once $newsmax_ruby_template_directory . '/theme_options/panels/single_post_related.php';
require_once $newsmax_ruby_template_directory . '/theme_options/panels/single_page.php';
require_once $newsmax_ruby_template_directory . '/theme_options/panels/team.php';
require_once $newsmax_ruby_template_directory . '/theme_options/panels/color.php';
require_once $newsmax_ruby_template_directory . '/theme_options/panels/woocommerce.php';
require_once $newsmax_ruby_template_directory . '/theme_options/panels/css.php';
require_once $newsmax_ruby_template_directory . '/theme_options/panels/import.php';
require_once $newsmax_ruby_template_directory . '/theme_options/panels/translation.php';
require_once $newsmax_ruby_template_directory . '/theme_options/panels/amp.php';

$newsmax_ruby_theme    = wp_get_theme();
$newsmax_ruby_opt_name = 'newsmax_ruby_theme_options';

$newsmax_ruby_args = array(
	'opt_name'             => $newsmax_ruby_opt_name,
	'display_name'         => $newsmax_ruby_theme->get( 'Name' ),
	'display_version'      => $newsmax_ruby_theme->get( 'Version' ),
	'menu_type'            => 'menu',
	'allow_sub_menu'       => true,
	'menu_title'           => esc_html__( 'Newsmax', 'newsmax' ),
	'page_title'           => esc_html__( 'Newsmax', 'newsmax' ),
	'google_api_key'       => '',
	'google_update_weekly' => false,
	'async_typography'     => false,
	'admin_bar'            => true,
	'admin_bar_icon'       => 'dashicons-admin-generic',
	'admin_bar_priority'   => 50,
	'global_variable'      => $newsmax_ruby_opt_name,
	'dev_mode'             => false,
	'update_notice'        => false,
	'customizer'           => true,
	'page_priority'        => 54,
	'page_parent'          => 'themes.php',
	'page_permissions'     => 'manage_options',
	'menu_icon'            => '',
	'last_tab'             => '',
	'page_icon'            => 'icon-themes',
	'page_slug'            => '',
	'save_defaults'        => true,
	'default_show'         => false,
	'default_mark'         => '',
	'show_import_export'   => true,
	'transient_time'       => 6400,
	'use_cdn'              => true,
	'output'               => true,
	'output_tag'           => true,
	'disable_tracking'     => true,
	'database'             => '',
	'system_info'          => false,
);


//Set arguments for framework
Redux::setArgs( $newsmax_ruby_opt_name, $newsmax_ruby_args );

// -> START THEME SETTINGS
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_general() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_styling() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_logo() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_header() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_header_style() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_header_topbar() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_header_navbar() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_header_offcanvas() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_sidebar() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_footer() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_breaking_news() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_blog_template() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_blog_styling() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_blog_index() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_category() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_tag() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_author() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_search() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_archive() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_team_page() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_single_post() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_single_post_styling() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_single_post_layout() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_single_post_share() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_single_post_related() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_single_post_recommended() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_single_post_ajax() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_single_page() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_social_profile() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_advertising() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_advertising_header() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_advertising_single() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_typography() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_typography_body() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_typography_post() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_typography_meta() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_typography_heading() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_typography_navigation() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_typography_logo() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_typography_h_tag() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_color() );
if ( class_exists( 'Woocommerce' ) ) {
	Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_woocommerce() );
}
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_translation() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_amp() );
Redux::setSection( $newsmax_ruby_opt_name, newsmax_ruby_theme_options_import_export() );