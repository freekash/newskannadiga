<?php
//get header
get_header();

if ( have_posts() ) {
	echo newsmax_ruby_render_single_post();
}

//get footer
get_footer();