<?php
//get header
get_header();

//get settings
$newsmax_ruby_options                            = array();
$newsmax_ruby_options['blog_layout']             = newsmax_ruby_get_option( 'search_layout' );
$newsmax_ruby_options['blog_1st_classic']        = newsmax_ruby_get_option( 'search_1st_classic' );
$newsmax_ruby_options['blog_1st_classic_layout'] = newsmax_ruby_get_option( 'search_1st_classic_layout' );
$newsmax_ruby_options['blog_sidebar_name']       = newsmax_ruby_get_option( 'search_sidebar_name' );
$newsmax_ruby_options['blog_sidebar_position']   = newsmax_ruby_get_option( 'search_sidebar_position' );
$newsmax_ruby_options['blog_posts_per_page']     = newsmax_ruby_get_option( 'search_posts_per_page' );
$newsmax_ruby_options['blog_pagination']         = newsmax_ruby_get_option( 'search_pagination' );

if ( 'default' == $newsmax_ruby_options['blog_sidebar_position'] ) {
	$newsmax_ruby_options['blog_sidebar_position'] = newsmax_ruby_get_option( 'site_sidebar_position' );
}

$newsmax_ruby_search_header_form = newsmax_ruby_get_option( 'search_header_form' );

//class name
$newsmax_ruby_class_name   = array();
$newsmax_ruby_class_name[] = 'blog-wrap';
$newsmax_ruby_class_name[] = 'is-' . esc_attr( $newsmax_ruby_options['blog_layout'] );
if ( ! empty( $newsmax_ruby_options['blog_1st_classic'] ) ) {
	$newsmax_ruby_class_name[] = 'has-1st-classic';
} else {
	$newsmax_ruby_class_name[] = 'no-1st-classic';
}

$newsmax_ruby_class_name = implode( ' ', $newsmax_ruby_class_name ); ?>
<?php echo newsmax_ruby_page_open( $newsmax_ruby_class_name, $newsmax_ruby_options['blog_sidebar_position'] ); ?>
<?php echo newsmax_ruby_dimox_breadcrumb(); ?>
<?php echo newsmax_ruby_page_content_open( 'blog-inner', $newsmax_ruby_options['blog_sidebar_position'] ); ?>

<div class="archive-header">
	<?php echo newsmax_ruby_title_page_search(); ?>
	<?php if ( ! empty( $newsmax_ruby_search_header_form ) ) : ?>
		<div class="page-search-form">
			<?php get_search_form( true ); ?>
			<p class="page-search-form-description">
				<?php echo newsmax_ruby_translate('not_looking_for') ?>
			</p>
		</div>
	<?php endif; ?>
</div>
<?php if ( have_posts() ) : ?>
	<?php echo newsmax_ruby_blog_layout( $newsmax_ruby_options ); ?>
<?php else: ?>
	<div class="nothing-found-wrap">
		<?php echo '<h1 class="title-nothing post-title is-strong"><span>' . newsmax_ruby_translate('no_search_result') . '</span></h1>' ?>
	</div>
<?php endif; ?>
<?php echo newsmax_ruby_page_content_close(); ?>

<?php if ( ! empty( $newsmax_ruby_options['blog_sidebar_position'] ) && 'none' != $newsmax_ruby_options['blog_sidebar_position'] ) : ?>
	<?php echo newsmax_ruby_page_sidebar( $newsmax_ruby_options['blog_sidebar_name'] ); ?>
<?php endif; ?>
<?php echo newsmax_ruby_page_close(); ?>
<?php get_footer(); ?>