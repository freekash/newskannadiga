<?php
##################################################
###                                            ###
###       THEME CONFIGS & INITIALIZE           ###
###                                            ###
##################################################

$newsmax_ruby_template_directory = get_template_directory();

require_once $newsmax_ruby_template_directory . '/includes/theme_config.php';
require_once $newsmax_ruby_template_directory . '/backend/admin_plugins.php';
require_once $newsmax_ruby_template_directory . '/backend/admin_enqueue.php';
require_once $newsmax_ruby_template_directory . '/theme_options/redux_config.php';
require_once $newsmax_ruby_template_directory . '/backend/tinymce/tinymce_action.php';
require_once $newsmax_ruby_template_directory . '/includes/menu/menu_mega_frontend.php';
require_once $newsmax_ruby_template_directory . '/includes/menu/menu_mega_backend.php';
require_once $newsmax_ruby_template_directory . '/includes/core.php';
require_once $newsmax_ruby_template_directory . '/includes/core_query.php';
require_once $newsmax_ruby_template_directory . '/includes/breaking_news.php';
require_once $newsmax_ruby_template_directory . '/includes/core_filter.php';
require_once $newsmax_ruby_template_directory . '/includes/translation.php';
require_once $newsmax_ruby_template_directory . '/includes/core_single_post.php';
require_once $newsmax_ruby_template_directory . '/includes/core_single_page.php';
require_once $newsmax_ruby_template_directory . '/includes/ajax/ajax.php';
if ( class_exists( 'Woocommerce' ) ) {
	require_once $newsmax_ruby_template_directory . '/includes/core_wc.php';
}
require_once $newsmax_ruby_template_directory . '/includes/schema.php';
require_once $newsmax_ruby_template_directory . '/includes/action.php';
require_once $newsmax_ruby_template_directory . '/includes/post_format.php';
require_once $newsmax_ruby_template_directory . '/includes/post_video.php';
require_once $newsmax_ruby_template_directory . '/includes/post_audio.php';
require_once $newsmax_ruby_template_directory . '/includes/post_review.php';
require_once $newsmax_ruby_template_directory . '/includes/post_related.php';
require_once $newsmax_ruby_template_directory . '/includes/core_social.php';
require_once $newsmax_ruby_template_directory . '/includes/core_css.php';
require_once $newsmax_ruby_template_directory . '/includes/sidebar/sidebar_multi.php';
require_once $newsmax_ruby_template_directory . '/includes/sidebar/sidebar_section.php';