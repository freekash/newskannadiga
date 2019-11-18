<?php

$newsmax_ruby_footer_copyright       = newsmax_ruby_get_option( 'footer_copyright' );
$newsmax_ruby_copyright_social       = newsmax_ruby_get_option( 'copyright_social' );
$newsmax_ruby_copyright_social_color = newsmax_ruby_get_option( 'copyright_social_color' );

if ( empty( $newsmax_ruby_footer_copyright ) && ! has_nav_menu( 'newsmax_ruby_menu_footer' ) && empty( $newsmax_ruby_footer_copyright ) ) {
	return false;
}

//create class name
if ( has_nav_menu( 'newsmax_ruby_menu_footer' ) || ! empty( $newsmax_ruby_copyright_social ) ) {
	$newsmax_ruby_footer_class_name = 'footer-copyright-wrap copyright-with-nav';
} else {
	$newsmax_ruby_footer_class_name = 'footer-copyright-wrap copyright-without-nav';
} ?>

<div id="ruby-copyright" class="<?php echo esc_attr($newsmax_ruby_footer_class_name); ?>">
	<div class="ruby-container">
		<div class="copyright-inner clearfix">

			<?php if ( ! empty( $newsmax_ruby_footer_copyright ) ) : ?>
			<p class="copyright-text"><?php echo html_entity_decode( esc_html( $newsmax_ruby_footer_copyright ) ) ?></p>
			<?php endif; ?>

			<?php if ( has_nav_menu( 'newsmax_ruby_menu_footer' ) || ! empty( $newsmax_ruby_copyright_social ) ) : ?>
				<div id="ruby-footer-menu" class="footer-menu-wrap">

					<?php if ( ! empty( $newsmax_ruby_copyright_social )) : ?>
					<?php $newsmax_ruby_copyright_social_data = newsmax_ruby_social_profile_web(); ?>
					<?php if ( ! empty( $newsmax_ruby_copyright_social_data )) : ?>
					<?php if ('color' == $newsmax_ruby_copyright_social_color) : ?>
					<div class="social-icon-wrap social-icon-color">
						<?php elseif ('light' == $newsmax_ruby_copyright_social_color) : ?>
						<div class="social-icon-wrap social-icon-light">
						<?php else: ?>
						<div class="social-icon-wrap social-icon-dark">
						<?php endif; ?>
							<?php echo newsmax_ruby_render_social_icon( $newsmax_ruby_copyright_social_data, true ); ?>
						</div>
					<?php endif; ?>
					<?php endif; ?>
					<?php if(has_nav_menu( 'newsmax_ruby_menu_footer' )) : ?>
					<?php wp_nav_menu(
						array(
							'theme_location' => 'newsmax_ruby_menu_footer',
							'menu_id'        => 'footer-menu',
							'menu_class'     => 'footer-menu-inner',
							'depth'          => 1,
							'echo'           => true
						)
					); ?>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>

