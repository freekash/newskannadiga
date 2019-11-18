<?php
//get header
get_header();

//settings
if ( false === is_product() ) {
	$newsmax_ruby_sidebar_name     = newsmax_ruby_get_option( 'woocommerce_shop_sidebar_name' );
	$newsmax_ruby_sidebar_position = newsmax_ruby_get_option( 'woocommerce_shop_sidebar_position' );
} else {
	$newsmax_ruby_sidebar_name     = newsmax_ruby_get_option( 'woocommerce_product_sidebar_name' );
	$newsmax_ruby_sidebar_position = newsmax_ruby_get_option( 'woocommerce_product_sidebar_position' );
}

//render
echo newsmax_ruby_page_open( 'single-wrap page-wrap', $newsmax_ruby_sidebar_position );

//render breadcrumb
echo newsmax_ruby_wc_breadcrumb();

echo newsmax_ruby_page_content_open( 'single-inner', $newsmax_ruby_sidebar_position );
woocommerce_content();
echo newsmax_ruby_page_content_close();
if ( 'none' != $newsmax_ruby_sidebar_position ) {
	echo newsmax_ruby_page_sidebar( $newsmax_ruby_sidebar_name, true );
}

echo newsmax_ruby_page_close();

//get footer
get_footer();