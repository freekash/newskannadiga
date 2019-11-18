<?php
$newsmax_ruby_logo_mobile = newsmax_ruby_get_option( 'header_logo_mobile' );
$newsmax_ruby_logo_alt    = newsmax_ruby_get_option( 'header_logo_alt' );
$newsmax_ruby_logo_title  = newsmax_ruby_get_option( 'header_logo_title' );

if ( empty( $newsmax_ruby_logo_title ) ) {
	$newsmax_ruby_logo_title = get_bloginfo( 'name' );
}
if ( empty( $newsmax_ruby_logo_alt ) ) {
	$newsmax_ruby_logo_alt = get_bloginfo( 'name' );
}?>

<?php if ( ! empty( $newsmax_ruby_logo_mobile['url'] ) ) : ?>
	<div class="logo-mobile-wrap is-logo-image">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-mobile" title="<?php echo esc_attr( $newsmax_ruby_logo_title ) ?>">
			<img height="<?php echo esc_attr($newsmax_ruby_logo_mobile['height']); ?>" width="<?php echo esc_attr($newsmax_ruby_logo_mobile['width']); ?>" src="<?php echo esc_url( $newsmax_ruby_logo_mobile['url'] ) ?>" alt="<?php echo esc_attr($newsmax_ruby_logo_alt); ?>">
		</a>
	</div>
<?php else : ?>
	<div class="logo-mobile-wrap is-logo-text">
	<a class="logo-text" href="<?php echo  esc_url( home_url( '/' ) ) ; ?>"><strong><?php echo esc_html($newsmax_ruby_logo_title); ?></strong></a>
	</div>
<?php endif; ?>


