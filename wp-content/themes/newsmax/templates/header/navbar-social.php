<?php
//render social icons
$ruby_navbar_social_enable = newsmax_ruby_get_option( 'navbar_social' );
if ( empty( $ruby_navbar_social_enable ) ) {
	return false;
}
$newsmax_ruby_social_profile = newsmax_ruby_social_profile_web();

//render
if ( ! empty( $newsmax_ruby_social_profile ) ) : ?>
	<div class="navbar-social tooltips">
		<?php echo newsmax_ruby_render_social_icon( $newsmax_ruby_social_profile, true ); ?>
	</div>
<?php endif; ?>
