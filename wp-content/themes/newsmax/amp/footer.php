<?php
$newsmax_ruby_copyright_text = newsmax_ruby_get_option( 'amp_copyright_text' );
$newsmax_ruby_back_top       = newsmax_ruby_get_option( 'amp_back_top' );
$newsmax_ruby_footer_menu    = newsmax_ruby_get_option( 'amp_footer_menu' );

?><footer class="amp-wp-footer">
	<div>
		<h2 class="footer-logo"><?php echo esc_html( $this->get( 'blog_name' ) ); ?></h2>
		<?php if ( ! empty( $newsmax_ruby_footer_menu ) ) {
			wp_nav_menu( array(
				'container'       => 'div',
				'container_class' => 'footer-link',
				'menu'            => $newsmax_ruby_footer_menu,
				'echo'            => true,
				'depth'           => 1,
			) );
		}

		if ( ! empty( $newsmax_ruby_copyright_text ) ): ?>
			<p class="footer-copyright"><?php echo html_entity_decode( esc_html( $newsmax_ruby_copyright_text ) ); ?></p>
		<?php endif; ?>
		<?php if ( ! empty( $newsmax_ruby_back_top ) ) : ?>
			<a href="#top" class="back-to-top">&uarr;</a>
		<?php endif; ?>
	</div>
</footer>
