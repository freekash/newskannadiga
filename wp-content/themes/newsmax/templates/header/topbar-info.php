<?php
$newsmax_ruby_topbar_email       = newsmax_ruby_get_option( 'topbar_email' );
$newsmax_ruby_topbar_phone       = newsmax_ruby_get_option( 'topbar_phone' );
$newsmax_ruby_topbar_link_action = newsmax_ruby_get_option( 'topbar_link_action' );

if ( empty( $newsmax_ruby_topbar_email ) && empty( $newsmax_ruby_topbar_phone ) ) {
	return false;
} ?>
<div class="topbar-info">
	<?php if ( ! empty( $newsmax_ruby_topbar_phone ) ) : ?>
		<?php if ( ! empty( $newsmax_ruby_topbar_link_action ) ) : ?>
			<a href="tel:<?php echo esc_html( $newsmax_ruby_topbar_phone ); ?>">
				<span class="info-phone"><i class="fa fa-mobile" aria-hidden="true"></i><span><?php echo esc_html( $newsmax_ruby_topbar_phone ); ?></span></span>
			</a>
		<?php else : ?>
			<span class="info-phone"><i class="fa fa-mobile" aria-hidden="true"></i><span><?php echo esc_html( $newsmax_ruby_topbar_phone ); ?></span></span>
		<?php endif; ?>
	<?php endif; ?>
	<?php if ( ! empty( $newsmax_ruby_topbar_email ) ) : ?>
		<?php if ( ! empty( $newsmax_ruby_topbar_link_action ) ) : ?>
			<a href="mailto:<?php echo esc_html( $newsmax_ruby_topbar_email ); ?>">
				<span class="info-email"><i class="fa fa-envelope" aria-hidden="true"></i><span><?php echo esc_html( $newsmax_ruby_topbar_email ); ?></span></span>
			</a>
		<?php else : ?>
			<span class="info-email"><i class="fa fa-envelope" aria-hidden="true"></i><span><?php echo esc_html( $newsmax_ruby_topbar_email ); ?></span></span>
		<?php endif; ?>
	<?php endif; ?>
</div>