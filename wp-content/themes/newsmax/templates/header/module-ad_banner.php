<?php
$newsmax_ruby_ad_script = '';
$newsmax_ruby_ad_image  = '';
$newsmax_ruby_ad_url    = '';

$newsmax_ruby_ad_type = newsmax_ruby_get_option( 'header_ad_type' );
if ( 'script' == $newsmax_ruby_ad_type ) {
	$newsmax_ruby_ad_script = newsmax_ruby_get_option( 'header_ad_script' );
} else {
	$newsmax_ruby_ad_image = newsmax_ruby_get_option( 'header_ad_image' );
	$newsmax_ruby_ad_url   = newsmax_ruby_get_option( 'header_ad_url' );
}?>
<?php if ( ! empty( $newsmax_ruby_ad_image['url'] ) && 'custom' == $newsmax_ruby_ad_type ) : ?>
	<div class="header-ad-wrap is-custom-ad">
		<div class="header-ad-inner">
			<?php if ( ! empty( $newsmax_ruby_ad_url ) ) : ?>
				<a class="header-ad-image" href="<?php echo esc_url( $newsmax_ruby_ad_url ) ?>" target="_blank">
					<img src="<?php echo esc_url( $newsmax_ruby_ad_image['url'] ) ?>" alt="<?php bloginfo( 'name' ); ?>">
				</a>
			<?php else : ?>
				<div class="header-ad-image">
					<img src="<?php echo esc_url( $newsmax_ruby_ad_image['url'] ) ?>" alt="<?php bloginfo( 'name' ); ?>">
				</div>
			<?php endif; ?>
			</div>
		</div>
	<?php elseif( ! empty( $newsmax_ruby_ad_script ) && 'script' == $newsmax_ruby_ad_type ) : ?>
	<div class="header-ad-wrap is-script-ad">
		<div class="header-ad-inner">
			<?php if ( function_exists( 'newsmax_ruby_ad_render_script' ) ) : ?>
				<?php echo html_entity_decode( stripcslashes( newsmax_ruby_ad_render_script( $newsmax_ruby_ad_script, 'banner_ad' ) ) ); ?>
			<?php else: ?>
				<?php echo '<div>' . htmlspecialchars_decode( stripcslashes( $newsmax_ruby_ad_script ) ) . '</div>'; ?>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>



