<?php
//get header
get_header();

echo newsmax_ruby_page_open( 'single-wrap page-wrap', 'none' );
echo newsmax_ruby_dimox_breadcrumb();
echo newsmax_ruby_page_content_open( 'single-inner', 'none' );

if ( have_posts() ) {
	while ( have_posts() ) {

		the_post();

		echo newsmax_ruby_single_post_open();

		echo '<div class="single-page-header single-post-header">';
		echo '<div class="single-title post-title entry-title is-size-1">';
		echo '<h1>' . get_the_title() . '</h1>';
		echo '</div>';
		echo '<div class="entry-attachment">';
		echo wp_get_attachment_image( get_the_ID(), 'full' );
		if ( has_excerpt() ) {
			echo '<div class="wp-caption-text">';
			the_excerpt();
			echo '</div>';
		};
		echo '</div>';
		echo '</div>';

		echo '<div class="entry single-entry">';
		the_content();
		echo newsmax_ruby_pagination_single();
		echo '</div>';

		echo '<div class="single-post-box single-post-box-comment">';
		echo '<div class="box-comment-content">';
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
		echo '</div>';
		echo '</div>';
	}
	echo newsmax_ruby_single_post_close();
} else {
	echo newsmax_ruby_nothing_found();
}

echo newsmax_ruby_page_content_close();
echo newsmax_ruby_page_close();

//get footer
get_footer();