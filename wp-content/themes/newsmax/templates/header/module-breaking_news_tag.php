<?php
$newsmax_ruby_data_right_popular       = '';
$newsmax_ruby_data_right_custom        = '';
$newsmax_ruby_breaking_news_right_type = newsmax_ruby_get_option( 'breaking_news_right_type' );
if ( 1 == $newsmax_ruby_breaking_news_right_type ) {
	$newsmax_ruby_data_right_popular = newsmax_ruby_breaking_news::get_popular_tag();
} else {
	$newsmax_ruby_data_right_custom = newsmax_ruby_get_option( 'breaking_news_tag_custom' );
}
?>
<div class="breaking-news-right type-tags">
	<?php if ( ! empty( $newsmax_ruby_data_right_popular ) && is_array( $newsmax_ruby_data_right_popular ) ) : ?>
		<?php foreach ($newsmax_ruby_data_right_popular as $newsmax_ruby_data_right_el) : ?>
			<?php if ( ! empty ( $newsmax_ruby_data_right_el->name ) && ! empty( $newsmax_ruby_data_right_el->term_id ) ) : ?>
				<a class="breaking-news-tag-el" href="<?php echo esc_url( get_tag_link( $newsmax_ruby_data_right_el->term_id ) ); ?>" title="<?php echo esc_attr( $newsmax_ruby_data_right_el->name ); ?>" target="_blank">
					<?php echo '<span># </span>' . esc_html( $newsmax_ruby_data_right_el->name ); ?>
				</a>
			<?php endif; ?>
		<?php endforeach; ?>
	<?php endif; ?>

	<?php if ( ! empty( $newsmax_ruby_data_right_custom ) && is_array( $newsmax_ruby_data_right_custom ) ) : ?>
		<?php foreach ( $newsmax_ruby_data_right_custom as $newsmax_ruby_data_right_el ) : ?>
			<?php $newsmax_ruby_tag_term = get_term( $newsmax_ruby_data_right_el, 'post_tag' ); ?>
			<?php if ( ! empty ( $newsmax_ruby_tag_term->name ) && ! empty( $newsmax_ruby_tag_term->term_id ) ) : ?>
				<a class="breaking-news-tag-el" href="<?php echo esc_url( get_tag_link( $newsmax_ruby_tag_term->term_id ) ); ?>" title="<?php echo esc_attr( $newsmax_ruby_tag_term->name ); ?>" target="_blank">
					<?php echo '<span># </span>' . esc_html( $newsmax_ruby_tag_term->name ); ?>
				</a>
			<?php endif; ?>
		<?php endforeach; ?>
	<?php endif; ?>
</div><!--#breaking news right -->