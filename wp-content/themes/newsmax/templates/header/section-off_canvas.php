<?php
$newsmax_ruby_off_canvas_style          = newsmax_ruby_get_option( 'off_canvas_style' );
$newsmax_ruby_off_canvas_logo           = newsmax_ruby_get_option( 'off_canvas_logo' );
$newsmax_ruby_off_canvas_social         = newsmax_ruby_get_option( 'off_canvas_social' );
$newsmax_ruby_off_canvas_search         = newsmax_ruby_get_option( 'off_canvas_search' );
$newsmax_ruby_off_canvas_widget_section = newsmax_ruby_get_option( 'off_canvas_widget_section' );

$newsmax_ruby_classes = 'off-canvas-wrap is-light-style is-dark-text';
if ( 'dark' == $newsmax_ruby_off_canvas_style ) {
	$newsmax_ruby_classes = 'off-canvas-wrap is-dark-style is-light-text';
}?>

<div class="<?php echo esc_attr( $newsmax_ruby_classes ); ?>">
	<a href="#" id="ruby-off-canvas-close-btn"><i class="ruby-close-btn"></i></a>
	<div class="off-canvas-inner">

		<?php if ( ! empty( $newsmax_ruby_off_canvas_logo ) ) : ?>
			<?php get_template_part( 'templates/header/module', 'off_canvas_logo' ); ?>
		<?php endif; ?>

		<?php if ( ! empty( $newsmax_ruby_off_canvas_search ) ) : ?>
			<div class="off-canvas-search">
				<?php get_search_form(); ?>
			</div><!--#search form -->
		<?php endif; ?>

		<?php if ( ! empty( $newsmax_ruby_off_canvas_social ) ) : ?>
			<?php $newsmax_ruby_social_profile = newsmax_ruby_social_profile_web(); ?>
			<?php if ( ! empty( $newsmax_ruby_social_profile ) ) : ?>
				<div class="off-canvas-social tooltips">
					<?php echo newsmax_ruby_render_social_icon( $newsmax_ruby_social_profile, true ); ?>
				</div>
			<?php endif; ?>
		<?php endif; ?>

		<?php if ( has_nav_menu( 'newsmax_ruby_menu_offcanvas' ) ) : ?>
			<div id="ruby-off-canvas-nav" class="off-canvas-nav-wrap">
				<?php wp_nav_menu(
					array(
						'theme_location' => 'newsmax_ruby_menu_offcanvas',
						'menu_id'        => 'offcanvas-menu',
						'menu_class'     => 'off-canvas-nav-inner',
						'depth'          => 4,
						'echo'           => true,
						'fallback_cb'    => 'newsmax_ruby_navigation_fallback'
					)
				); ?>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( $newsmax_ruby_off_canvas_widget_section ) && is_active_sidebar( 'newsmax_ruby_sidebar_offcanvas' ) ) : ?>
			<div class="off-canvas-widget-section-wrap">
				<?php dynamic_sidebar( 'newsmax_ruby_sidebar_offcanvas' ); ?>
			</div>
		<?php endif; ?>
	</div>
</div><!--#off-canvas -->