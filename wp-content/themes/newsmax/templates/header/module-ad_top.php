<?php
$newsmax_ruby_ad_top_script = '';
$newsmax_ruby_ad_top_image  = '';
$newsmax_ruby_ad_top_url    = '';

$newsmax_ruby_ad_top_type = newsmax_ruby_get_option( 'header_ad_top_type' );
if ( 'script' == $newsmax_ruby_ad_top_type ) {
	$newsmax_ruby_ad_top_script = newsmax_ruby_get_option( 'header_ad_top_script' );
} else {
	$newsmax_ruby_ad_top_image = newsmax_ruby_get_option( 'header_ad_top_image' );
	$newsmax_ruby_ad_top_url   = newsmax_ruby_get_option( 'header_ad_top_url' );
}?>
<?php if ( ! empty( $newsmax_ruby_ad_top_image['url'] ) && 'custom' == $newsmax_ruby_ad_top_type ) : ?>
	<div class="header-ad-top-wrap is-custom-ad">
		<div class="header-ad-top-inner">
			<?php if ( ! empty( $newsmax_ruby_ad_top_url ) ) : ?>
				<a class="header-ad-top-image" href="<?php echo esc_url( $newsmax_ruby_ad_top_url ) ?>" target="_blank">
					<img src="<?php echo esc_url( $newsmax_ruby_ad_top_image['url'] ) ?>" alt="<?php bloginfo( 'name' ); ?>">
				</a>
			<?php else : ?>
				<div class="header-ad-top-image">
					<img src="<?php echo esc_url( $newsmax_ruby_ad_top_image['url'] ) ?>" alt="<?php bloginfo( 'name' ); ?>">
				</div>
			<?php endif; ?>
			</div>
		</div>
	<?php elseif( ! empty( $newsmax_ruby_ad_top_script ) && 'script' == $newsmax_ruby_ad_top_type ) : ?>
	<div class="header-ad-top-wrap is-script-ad">
		<div class="header-ad-top-inner">
			<?php if ( function_exists( 'newsmax_ruby_ad_render_script' ) ) : ?>
				<?php echo html_entity_decode( stripcslashes( newsmax_ruby_ad_render_script( $newsmax_ruby_ad_top_script, 'header_ad' ) ) ); ?>
			<?php else: ?>
				<?php echo '<div>' . htmlspecialchars_decode( stripcslashes( $newsmax_ruby_ad_top_script ) ) . '</div>'; ?>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>



