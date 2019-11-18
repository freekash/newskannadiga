<?php
$newsmax_ruby_navbar_search = newsmax_ruby_get_option( 'navbar_search' );
$newsmax_ruby_navbar_mobile_search = newsmax_ruby_get_option( 'navbar_mobile_search' );
$newsmax_ruby_topbar_search = newsmax_ruby_get_option('topbar_search');

if ( empty( $newsmax_ruby_topbar_search ) && empty( $newsmax_ruby_navbar_search ) ) {
	return false;
}
?>
<div id="ruby-header-search-popup" class="header-search-popup mfp-hide mfp-animation">
	<div class="header-search-popup-inner is-light-text">
		<form class="search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<fieldset>
				<input id="ruby-search-input" type="text" class="field" name="s" value="<?php if (is_search()) { echo get_search_query(); } ?>" placeholder="<?php echo newsmax_ruby_translate( 'type_to_search' ); ?>" autocomplete="off">
				<button type="submit" value="" class="btn"><i class="icon-simple icon-magnifier" aria-hidden="true"></i></button>
			</fieldset>
			<div class="header-search-result"></div>
		</form>
	</div>
</div>