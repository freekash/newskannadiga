<?php
$newsmax_ruby_logo        = newsmax_ruby_get_option( 'header_logo_off_canvas' );
$newsmax_ruby_logo_alt    = newsmax_ruby_get_option( 'header_logo_alt' );
$newsmax_ruby_logo_title  = newsmax_ruby_get_option( 'header_logo_title' );

if ( empty( $newsmax_ruby_logo_title ) ) {
	$newsmax_ruby_logo_title = get_bloginfo( 'name' );
}
if ( empty( $newsmax_ruby_logo_alt ) ) {
	$newsmax_ruby_logo_alt = get_bloginfo( 'name' );
}

if(!empty($newsmax_ruby_logo['url'])) : ?>
	<div class="off-canvas-logo-wrap is-logo-image">
		<div class="logo-inner">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" title="<?php echo esc_attr( $newsmax_ruby_logo_title ) ?>">
				<img height="<?php echo esc_attr($newsmax_ruby_logo['height']); ?>" width="<?php echo esc_attr($newsmax_ruby_logo['width']); ?>" src="<?php echo esc_url( $newsmax_ruby_logo['url'] ) ?>" alt="<?php echo esc_attr($newsmax_ruby_logo_alt); ?>">
			</a>
		</div>
	</div>
<?php else : ?>
	<div class="off-canvas-logo-wrap is-logo-text">
		<div class="logo-inner">
			<a class="logo-text" href="<?php echo  esc_url( home_url( '/' ) ) ; ?>"><strong><?php echo esc_html($newsmax_ruby_logo_title); ?></strong></a>
		</div>
	</div>
<?php endif; ?>
