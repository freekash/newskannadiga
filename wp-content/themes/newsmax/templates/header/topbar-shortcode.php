<?php
//check
$newsmax_ruby_topbar_shortcode = newsmax_ruby_get_option( 'topbar_shortcode' );
if ( empty( $newsmax_ruby_topbar_shortcode ) ) {
	return false;
}
?>

<?php if ( ! empty( $newsmax_ruby_topbar_shortcode ) ) : ?>
	<div class="topbar-shortcode">
		<?php echo do_shortcode( $newsmax_ruby_topbar_shortcode ); ?>
	</div>
<?php endif; ?>