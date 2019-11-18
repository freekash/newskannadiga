<?php
$newsmax_ruby_footer_logo         = newsmax_ruby_get_option( 'footer_logo' );
$newsmax_ruby_footer_social       = newsmax_ruby_get_option( 'footer_social' );
$newsmax_ruby_footer_social_color = newsmax_ruby_get_option( 'footer_social_color' );
$newsmax_ruby_footer_about_us     = newsmax_ruby_get_option( 'footer_about_us' );

if ( empty( $newsmax_ruby_footer_logo['url'] ) && empty( $newsmax_ruby_footer_social ) && empty( $newsmax_ruby_footer_about_us ) ) {
	return false;
}

$newsmax_ruby_social_class_name = 'footer-social-wrap bar-without-logo';
if ( ! empty( $newsmax_ruby_footer_logo['url'] ) ) {
	$newsmax_ruby_social_class_name = 'footer-social-wrap bar-with-logo';
} ?>

<div class="<?php echo esc_attr($newsmax_ruby_social_class_name); ?>">
	<div class="ruby-container">
		<div class="footer-social-inner clearfix">
			<?php if(!empty($newsmax_ruby_footer_logo['url'])) : ?>
				<div class="footer-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo-link" title="<?php bloginfo( 'name' ); ?>">
						<img src="<?php echo esc_url( $newsmax_ruby_footer_logo['url'] ) ?>" height="<?php echo esc_attr($newsmax_ruby_footer_logo['height']); ?>" width="<?php echo esc_attr($newsmax_ruby_footer_logo['width']); ?>"  alt="<?php bloginfo( 'name' ); ?>">
					</a>
				</div>
			<?php endif; ?>
			<?php if ( ! empty( $newsmax_ruby_footer_about_us ) ): ?>
				<div class="footer-about-us entry">
					<?php echo html_entity_decode( $newsmax_ruby_footer_about_us ); ?>
				</div>
			<?php endif; ?>

			<?php if ( ! empty( $newsmax_ruby_footer_social ) ) : ?>

			<?php $newsmax_ruby_footer_social_data = newsmax_ruby_social_profile_web(); ?>

			<?php if(!empty($newsmax_ruby_footer_social_data )) : ?>
			<?php if ('color' == $newsmax_ruby_footer_social_color) : ?>
				<div class="social-icon-wrap social-icon-color tooltips">
				<?php elseif ('light' == $newsmax_ruby_footer_social_color) : ?>
				<div class="social-icon-wrap social-icon-light tooltips">
			<?php else: ?>
				<div class="social-icon-wrap social-icon-dark tooltips">
			<?php endif; ?>
					<?php echo newsmax_ruby_render_social_icon( $newsmax_ruby_footer_social_data, true ); ?>
				</div>
			<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
</div><!--#footer social wrap -->