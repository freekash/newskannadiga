<?php
/*
Template Name: Ruby Page Composer
*/

//get header
get_header();

if( 1 == newsmax_ruby_get_option('breaking_news_page')){
	get_template_part( 'templates/header/section', 'breaking_news' );
}

echo newsmax_ruby_composer_render::render_page();
echo newsmax_ruby_composer_blog_layout();

//get footer
get_footer();