<?php
//get header
get_header();

//get settings
$newsmax_ruby_options     = array();
$newsmax_ruby_category_id = newsmax_ruby_get_cat_id();

$newsmax_ruby_category_cf_layout = get_option( 'newsmax_ruby_category_option_layout' ) ? get_option( 'newsmax_ruby_category_option_layout' ) : array();
if ( array_key_exists( $newsmax_ruby_category_id, $newsmax_ruby_category_cf_layout ) ) {
	$newsmax_ruby_category_cf_layout = $newsmax_ruby_category_cf_layout[ $newsmax_ruby_category_id ];
}

$newsmax_ruby_category_cf_pagination = get_option( 'newsmax_ruby_category_option_pagination' ) ? get_option( 'newsmax_ruby_category_option_pagination' ) : array();
if ( array_key_exists( $newsmax_ruby_category_id, $newsmax_ruby_category_cf_pagination ) ) {
	$newsmax_ruby_category_cf_pagination = $newsmax_ruby_category_cf_pagination[ $newsmax_ruby_category_id ];
}

$newsmax_ruby_category_cf_sidebar = get_option( 'newsmax_ruby_category_option_sidebar' ) ? get_option( 'newsmax_ruby_category_option_sidebar' ) : array();
if ( array_key_exists( $newsmax_ruby_category_id, $newsmax_ruby_category_cf_sidebar ) ) {
	$newsmax_ruby_category_cf_sidebar = $newsmax_ruby_category_cf_sidebar[ $newsmax_ruby_category_id ];
}

if ( ! empty( $newsmax_ruby_category_cf_layout['category_layout'] ) && 'default' != $newsmax_ruby_category_cf_layout['category_layout'] ) {
	$newsmax_ruby_options['blog_layout'] = $newsmax_ruby_category_cf_layout['category_layout'];
} else {
	$newsmax_ruby_options['blog_layout'] = newsmax_ruby_get_option( 'category_layout' );
}

if ( ! empty( $newsmax_ruby_category_cf_layout['category_1st_classic'] ) && 'default' != $newsmax_ruby_category_cf_layout['category_1st_classic'] ) {
	if ( 1 == $newsmax_ruby_category_cf_layout['category_1st_classic'] ) {
		$newsmax_ruby_options['blog_1st_classic'] = 1;
	} else {
		$newsmax_ruby_options['blog_1st_classic'] = 0;
	}
} else {
	$newsmax_ruby_options['blog_1st_classic'] = newsmax_ruby_get_option( 'category_1st_classic' );
}

if ( ! empty( $newsmax_ruby_category_cf_layout['category_1st_classic_layout'] ) && 'default' != $newsmax_ruby_category_cf_layout['category_1st_classic_layout'] ) {
	$newsmax_ruby_options['blog_1st_classic_layout'] = $newsmax_ruby_category_cf_layout['category_1st_classic_layout'];
} else {
	$newsmax_ruby_options['blog_1st_classic_layout'] = newsmax_ruby_get_option( 'category_1st_classic_layout' );
}

if ( ! empty( $newsmax_ruby_category_cf_layout['category_posts_per_page'] ) ) {
	$newsmax_ruby_options['blog_posts_per_page'] = intval( $newsmax_ruby_category_cf_layout['category_posts_per_page'] );
} else {
	$newsmax_ruby_options['blog_posts_per_page'] = newsmax_ruby_get_option( 'category_posts_per_page' );
}

if ( ! empty( $newsmax_ruby_category_cf_pagination['category_pagination'] ) && 'default' != $newsmax_ruby_category_cf_pagination['category_pagination'] ) {
	$newsmax_ruby_options['blog_pagination'] = $newsmax_ruby_category_cf_pagination['category_pagination'];
} else {
	$newsmax_ruby_options['blog_pagination'] = newsmax_ruby_get_option( 'category_pagination' );
}

if ( ! empty( $newsmax_ruby_category_cf_sidebar['category_sidebar_name'] ) && 'newsmax_ruby_default_from_theme_options' != $newsmax_ruby_category_cf_sidebar['category_sidebar_name'] ) {
	$newsmax_ruby_options['blog_sidebar_name'] = $newsmax_ruby_category_cf_sidebar['category_sidebar_name'];
} else {
	$newsmax_ruby_options['blog_sidebar_name'] = newsmax_ruby_get_option( 'category_sidebar_name' );
}

if ( ! empty( $newsmax_ruby_category_cf_sidebar['category_sidebar_position'] ) && 'default' != $newsmax_ruby_category_cf_sidebar['category_sidebar_position'] ) {
	$newsmax_ruby_options['blog_sidebar_position'] = $newsmax_ruby_category_cf_sidebar['category_sidebar_position'];
} else {
	$newsmax_ruby_options['blog_sidebar_position'] = newsmax_ruby_get_option( 'category_sidebar_position' );
}

if ( 'default' == $newsmax_ruby_options['blog_sidebar_position'] ) {
	$newsmax_ruby_options['blog_sidebar_position'] = newsmax_ruby_get_option( 'site_sidebar_position' );
}

//class name
$newsmax_ruby_class_name   = array();
$newsmax_ruby_class_name[] = 'blog-wrap';
$newsmax_ruby_class_name[] = 'is-' . esc_attr( $newsmax_ruby_options['blog_layout'] );
if ( ! empty( $newsmax_ruby_options['blog_1st_classic'] ) ) {
	$newsmax_ruby_class_name[] = 'has-1st-classic';
} else {
	$newsmax_ruby_class_name[] = 'no-1st-classic';
}
$newsmax_ruby_class_name = implode( ' ', $newsmax_ruby_class_name );


echo newsmax_ruby_dimox_breadcrumb();
echo '<div class="category-header-outer">';
echo '<div class="ruby-container">';
echo '<div class="archive-header">';
echo newsmax_ruby_title_page_category();
echo '</div>';
echo '</div>';
echo '</div>';

echo newsmax_ruby_category_feat();
echo newsmax_ruby_page_open( $newsmax_ruby_class_name, $newsmax_ruby_options['blog_sidebar_position'] );
echo newsmax_ruby_page_content_open( 'blog-inner', $newsmax_ruby_options['blog_sidebar_position'] );
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
