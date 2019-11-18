<?php
//get header
get_header();

$newsmax_ruby_page_title       = newsmax_ruby_single_page_check_title();
$newsmax_ruby_sidebar_name     = newsmax_ruby_single_page_check_sidebar_name();
$newsmax_ruby_sidebar_position = newsmax_ruby_single_page_check_sidebar_position();

echo newsmax_ruby_page_open( 'single-wrap page-wrap', $newsmax_ruby_sidebar_position );
echo newsmax_ruby_dimox_breadcrumb();
echo newsmax_ruby_page_content_open( 'single-inner', $newsmax_ruby_sidebar_position );

if ( have_posts() ) {
	while ( have_posts() ) {

		the_post();

		if ( ! empty( $newsmax_ruby_page_title ) ) {
			echo '<div class="single-page-header single-post-header">';
			echo '<h1 class="single-title post-title entry-title is-size-1">' . get_the_title() . '</h1>';
			if ( has_post_thumbnail() ) {
				echo newsmax_ruby_single_post_thumb_classic( array( 'thumb_size' => 'full' ) );
			}
			echo '</div>';
		}

		echo '<div class="entry single-entry page-entry">';
		the_content();
		echo newsmax_ruby_pagination_single();
		echo '</div>';

		if ( comments_open() || get_comments_number() ) {
			echo '<div class="single-post-box single-post-box-comment single-page-box-comment">';
			echo '<div class="box-comment-content">';
			comments_template();
			echo '</div>';
			echo '</div>';
		}
	}
}


echo newsmax_ruby_page_content_close();

if ( 'none' != $newsmax_ruby_sidebar_position ) {
	echo newsmax_ruby_page_sidebar( $newsmax_ruby_sidebar_name, true );
}

echo newsmax_ruby_page_close();

//get footer
get_footer();