<?php
$newsmax_ruby_logo        = newsmax_ruby_get_option( 'header_logo' );
$newsmax_ruby_logo_retina = newsmax_ruby_get_option( 'header_logo_retina' );
$newsmax_ruby_logo_alt    = newsmax_ruby_get_option( 'header_logo_alt' );
$newsmax_ruby_logo_title  = newsmax_ruby_get_option( 'header_logo_title' );

if ( empty( $newsmax_ruby_logo_title ) ) {
	$newsmax_ruby_logo_title = get_bloginfo( 'name' );
}
if ( empty( $newsmax_ruby_logo_alt ) ) {
	$newsmax_ruby_logo_alt = get_bloginfo( 'name' );
}

if(!empty($newsmax_ruby_logo['url'])) :

?><div class="logo-wrap is-logo-image" <?php echo newsmax_ruby_schema::markup('logo'); ?>>
	<div class="logo-inner">
			<?php if ( empty( $newsmax_ruby_logo_retina['url'] ) ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" title="<?php echo esc_attr( $newsmax_ruby_logo_title ) ?>">
				<img height="<?php echo esc_attr($newsmax_ruby_logo['height']); ?>" width="<?php echo esc_attr($newsmax_ruby_logo['width']); ?>" src="<?php echo esc_url( $newsmax_ruby_logo['url'] ) ?>" alt="<?php echo esc_attr($newsmax_ruby_logo_alt); ?>">
			</a>
			<?php else : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" title="<?php echo esc_attr($newsmax_ruby_logo_title); ?>">
				<img height="<?php echo esc_attr($newsmax_ruby_logo['height']); ?>" width="<?php echo esc_attr($newsmax_ruby_logo['width']); ?>" src="<?php echo esc_url( $newsmax_ruby_logo['url'] ) ?>" srcset="<?php echo esc_url( $newsmax_ruby_logo['url'] ) ?> 1x, <?php echo esc_url($newsmax_ruby_logo_retina['url']); ?> 2x" alt="<?php echo esc_attr($newsmax_ruby_logo_alt); ?>">
			</a>
			<?php endif; ?>
	</div>

	<?php if(is_front_page()) : ?>
	<h1 class="logo-title"><?php echo esc_html( $newsmax_ruby_logo_title ); ?></h1>
	<meta itemprop="name" content="<?php echo esc_attr( $newsmax_ruby_logo_title ); ?>">
	<?php endif; ?>

</div>
<?php else : ?>
	<div class="logo-wrap is-logo-text">
		<div class="logo-inner">
			<a class="logo-text" href="<?php echo  esc_url( home_url( '/' ) ) ; ?>">
				<?php if(is_front_page()) : ?>
					<h1 class="logo-title"><?php echo esc_html( $newsmax_ruby_logo_title ); ?></h1>
				<?php else: ?>
					<strong class="logo-title"><?php echo esc_html( $newsmax_ruby_logo_title ); ?></strong>
				<?php endif; ?>
			</a>
			<?php if ( get_bloginfo( 'description' ) ) : ?>
				<h3 class="site-tagline"><?php bloginfo( 'description' ); ?></h3>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>
