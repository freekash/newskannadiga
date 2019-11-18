<?php
$newsmax_ruby_topbar_date = newsmax_ruby_get_option( 'topbar_date' );
if ( empty( $newsmax_ruby_topbar_date ) ) {
	return false;
}

$newsmax_ruby_topbar_date_format = newsmax_ruby_get_option( 'topbar_date_format' );
$newsmax_ruby_topbar_date_js     = newsmax_ruby_get_option( 'topbar_date_js' );
if ( empty( $newsmax_ruby_topbar_date_format ) ) {
	$newsmax_ruby_topbar_date_format = 'l, F j, Y';
}
$newsmax_ruby_classes = 'topbar-date';
if ( ! empty( $newsmax_ruby_topbar_date_js ) ) {
	$newsmax_ruby_classes = 'topbar-date is-hidden';
}?>

<div class="<?php echo esc_attr( $newsmax_ruby_classes ); ?>">
	<span ><?php echo date_i18n( esc_attr( $newsmax_ruby_topbar_date_format ) ); ?></span>
</div>