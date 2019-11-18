<?php
$newsmax_ruby_topbar_search = newsmax_ruby_get_option( 'topbar_search' );
if ( empty( $newsmax_ruby_topbar_search ) ) {
	return false;
}?>

<div class="topbar-search">
	<a href="#" id="ruby-topbar-search-icon" data-mfp-src="#ruby-header-search-popup" data-effect="mpf-ruby-effect header-search-popup-outer" title="<?php esc_attr_e('search', 'newsmax'); ?>" class="topbar-search-icon">
		<i class="icon-simple icon-magnifier"></i>
	</a><!--#topbar search button-->
</div>
