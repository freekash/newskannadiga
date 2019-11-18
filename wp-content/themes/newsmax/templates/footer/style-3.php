<?php
$newsmax_ruby_footer_text_style = newsmax_ruby_get_option('footer_text_style');
$newsmax_ruby_footer_class_name = 'footer-wrap footer-style-3 ' . esc_attr($newsmax_ruby_footer_text_style);
?>

<div id="ruby-footer" class="<?php echo esc_attr($newsmax_ruby_footer_class_name); ?>">
	<?php get_template_part( 'templates/footer/module', 'top_footer' ); ?>
	<div class="footer-inner">
		<?php get_template_part( 'templates/footer/module', 'social' ); ?>
	</div><!--footer inner-->
	<?php get_template_part( 'templates/footer/module', 'copyright' ); ?>
</div>