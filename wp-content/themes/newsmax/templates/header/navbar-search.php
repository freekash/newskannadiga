<?php
$newsmax_ruby_navbar_search        = newsmax_ruby_get_option( 'navbar_search' );
$newsmax_ruby_navbar_mobile_search = newsmax_ruby_get_option( 'navbar_mobile_search' );
if ( empty( $newsmax_ruby_navbar_search ) && empty( $newsmax_ruby_navbar_mobile_search ) ) {
	return false;
}
$newsmax_ruby_class_name   = array();
$newsmax_ruby_class_name[] = 'navbar-search';
if ( empty( $newsmax_ruby_navbar_search ) ) {
	$newsmax_ruby_class_name[] = 'desktop-hide';
}
if ( empty( $newsmax_ruby_navbar_mobile_search ) ) {
	$newsmax_ruby_class_name[] = 'mobile-hide';
}
$newsmax_ruby_class_name = implode(' ',$newsmax_ruby_class_name);

?>
<div class="<?php echo esc_attr($newsmax_ruby_class_name); ?>">
	<a href="#" id="ruby-navbar-search-icon" data-mfp-src="#ruby-header-search-popup" data-effect="mpf-ruby-effect header-search-popup-outer" title="<?php esc_attr_e('search', 'newsmax'); ?>" class="navbar-search-icon">
		<i class="icon-simple icon-magnifier"></i>
	</a><!--#navbar search button-->
</div>
