<?php

//check
$newsmax_ruby_topbar_social = newsmax_ruby_get_option( 'topbar_social' );
if ( empty( $newsmax_ruby_topbar_social ) ) {
	return false;
}
$newsmax_ruby_social_profile = newsmax_ruby_social_profile_web();
?>

<?php if ( ! empty( $newsmax_ruby_social_profile ) ) : ?>
	<div class="topbar-social tooltips">
		<?php echo newsmax_ruby_render_social_icon( $newsmax_ruby_social_profile, true ); ?>
	</div>
<?php endif; ?>