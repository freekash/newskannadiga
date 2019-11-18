<?php
$newsmax_ruby_footer_text_style = newsmax_ruby_get_option('footer_text_style');
$newsmax_ruby_footer_wrapper    = newsmax_ruby_get_option( 'footer_wrapper' );
$newsmax_ruby_footer_class_name = 'footer-wrap footer-style-2 ' . esc_attr($newsmax_ruby_footer_text_style);
?>

<div id="ruby-footer" class="<?php echo esc_attr($newsmax_ruby_footer_class_name); ?>">
	<?php get_template_part( 'templates/footer/module', 'top_footer' ); ?>

	<div class="footer-inner">
		<?php if ( is_active_sidebar( 'newsmax_ruby_sidebar_footer_1' ) || is_active_sidebar( 'newsmax_ruby_sidebar_footer_2' ) || is_active_sidebar( 'newsmax_ruby_sidebar_footer_3' ) || is_active_sidebar( 'newsmax_ruby_sidebar_footer_4' )) : ?>
			<div class="footer-column-wrap">

				<?php if (empty( $newsmax_ruby_footer_wrapper )) : ?>
				<div class="ruby-container">
				<?php else : ?>
				<div class="footer-fullwidth-holder">
				<?php endif; ?>

					<div class="footer-column-inner row clearfix">
						<div class="sidebar-footer col-sm-3 col-xs-12" role="complementary">
							<?php if ( is_active_sidebar( 'newsmax_ruby_sidebar_footer_1' ) ) {
								dynamic_sidebar( 'newsmax_ruby_sidebar_footer_1' );
							} ?>
						</div><!--footer column 1-->
						<div class="sidebar-footer col-sm-3 col-xs-12" role="complementary">
							<?php if ( is_active_sidebar( 'newsmax_ruby_sidebar_footer_2' ) ) {
								dynamic_sidebar( 'newsmax_ruby_sidebar_footer_2' );
							} ?>
						</div><!--#footer column 2-->
						<div class="sidebar-footer col-sm-3 col-xs-12" role="complementary">
							<?php if ( is_active_sidebar( 'newsmax_ruby_sidebar_footer_3' ) ) {
								dynamic_sidebar( 'newsmax_ruby_sidebar_footer_3' );
							} ?>
						</div><!--#footer column 3-->
						<div class="sidebar-footer col-sm-3 col-xs-12" role="complementary">
							<?php if ( is_active_sidebar( 'newsmax_ruby_sidebar_footer_4' ) ) {
								dynamic_sidebar( 'newsmax_ruby_sidebar_footer_4' );
							} ?>
						</div><!--#footer column 3-->
					</div>
				</div>
			</div><!--#footer columns-->
		<?php endif; ?>
		<?php get_template_part( 'templates/footer/module', 'social' ); ?>
	</div><!--footer inner-->
	<?php get_template_part( 'templates/footer/module', 'copyright' ); ?>
</div>