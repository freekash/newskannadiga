<?php
$newsmax_ruby_data_right_custom = newsmax_ruby_get_option( 'breaking_news_cat_custom' );
?>
<div class="breaking-news-right type-category">
	<?php if ( ! empty( $newsmax_ruby_data_right_custom ) && is_array( $newsmax_ruby_data_right_custom ) ) : ?>
		<?php foreach ( $newsmax_ruby_data_right_custom as $newsmax_ruby_data_right_el ) : ?>
			<?php $newsmax_ruby_cat_term = get_the_category( $newsmax_ruby_data_right_el ); ?>
			<a class="breaking-news-tag-el" href="<?php echo esc_url( get_category_link( $newsmax_ruby_data_right_el ) ); ?>" title="<?php echo esc_attr( get_cat_name($newsmax_ruby_data_right_el) ); ?>" target="_blank">
				<?php echo esc_html( get_cat_name($newsmax_ruby_data_right_el) ); ?>
			</a>
		<?php endforeach; ?>
	<?php endif; ?>
</div><!--#breaking news right -->