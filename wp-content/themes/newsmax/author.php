<?php
//get header
get_header();

//get settings
$newsmax_ruby_options                            = array();
$newsmax_ruby_options['blog_layout']             = newsmax_ruby_get_option( 'author_layout' );
$newsmax_ruby_options['blog_1st_classic']        = newsmax_ruby_get_option( 'author_1st_classic' );
$newsmax_ruby_options['blog_1st_classic_layout'] = newsmax_ruby_get_option( 'author_1st_classic_layout' );
$newsmax_ruby_options['blog_sidebar_name']       = newsmax_ruby_get_option( 'author_sidebar_name' );
$newsmax_ruby_options['blog_sidebar_position']   = newsmax_ruby_get_option( 'author_sidebar_position' );
$newsmax_ruby_options['blog_posts_per_page']     = newsmax_ruby_get_option( 'author_posts_per_page' );
$newsmax_ruby_options['blog_pagination']         = newsmax_ruby_get_option( 'author_pagination' );

$newsmax_ruby_author_header_box = newsmax_ruby_get_option( 'author_header_box' );

if ( 'default' == $newsmax_ruby_options['blog_sidebar_position'] ) {
	$newsmax_ruby_options['blog_sidebar_position'] = newsmax_ruby_get_option( 'site_sidebar_position' );
}

$newsmax_ruby_class_name   = array();
$newsmax_ruby_class_name[] = 'blog-wrap';
$newsmax_ruby_class_name[] = 'is-' . esc_attr( $newsmax_ruby_options['blog_layout'] );
if ( ! empty( $newsmax_ruby_options['blog_1st_classic'] ) ) {
	$newsmax_ruby_class_name[] = 'has-1st-classic';
} else {
	$newsmax_ruby_class_name[] = 'no-1st-classic';
}
$newsmax_ruby_class_name = implode( ' ', $newsmax_ruby_class_name );

echo newsmax_ruby_page_open( $newsmax_ruby_class_name, $newsmax_ruby_options['blog_sidebar_position'] );
echo newsmax_ruby_dimox_breadcrumb();
echo newsmax_ruby_page_content_open( 'blog-inner', $newsmax_ruby_options['blog_sidebar_position'] );
echo '<div class="archive-header">';
echo newsmax_ruby_title_page_author();
if ( ! empty( $newsmax_ruby_author_header_box ) ) {
	echo newsmax_ruby_single_box_author();
}
echo '</div>';
if ( have_posts() ) {
	echo newsmax_ruby_blog_layout( $newsmax_ruby_options );
} else {
	echo newsmax_ruby_nothing_found();
}
echo newsmax_ruby_page_content_close();
if ( ! empty( $newsmax_ruby_options['blog_sidebar_position'] ) && 'none' != $newsmax_ruby_options['blog_sidebar_position'] ) {
	echo newsmax_ruby_page_sidebar( $newsmax_ruby_options['blog_sidebar_name'] );
}
echo newsmax_ruby_page_close();

//get footer
get_footer();