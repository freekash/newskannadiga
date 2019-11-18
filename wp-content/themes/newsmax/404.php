<?php
//get header
get_header();

$newsmax_ruby_404_query                        = newsmax_ruby_query::get_data( array( 'posts_per_page' => 6 ) );
$newsmax_ruby_options                          = array();
$newsmax_ruby_options['blog_sidebar_position'] = 'none';
$newsmax_ruby_options['blog_1st_classic']      = false;
$newsmax_ruby_options['cat_info']              = newsmax_ruby_get_option( 'blog_cat_info' );
$newsmax_ruby_options['meta_info']             = newsmax_ruby_get_option( 'blog_meta_info' );
$newsmax_ruby_options['share']                 = newsmax_ruby_get_option( 'blog_share' );
$newsmax_ruby_options['excerpt']               = newsmax_ruby_get_option( 'blog_excerpt_length_grid' ); ?>

<?php echo newsmax_ruby_page_open( 'ruby-page-404', 'none' ); ?>
<?php echo newsmax_ruby_page_content_open( 'blog-inner ruby-page-404-inner', 'none' ); ?>

<div class="page-404-content-header">
	<div class="title-nothing post-title is-strong"><h1><span><?php echo newsmax_ruby_translate('oops'); ?></span></h1></div>
	<p class="description-nothing"><?php echo newsmax_ruby_translate('no_thing_404'); ?></p>
	<div class="page-404-search">
		<?php get_search_form( true ); ?>
	</div>
</div>
<div class="page-404-blog-header"><h3><?php echo newsmax_ruby_translate('the_latest'); ?></h3></div>
<?php echo newsmax_ruby_blog_layout_grid_1( $newsmax_ruby_404_query, $newsmax_ruby_options ); ?>
<?php wp_reset_postdata(); ?>
<?php echo newsmax_ruby_page_content_close(); ?>
<?php echo newsmax_ruby_page_close(); ?>
<?php get_footer(); ?>