<?php
//get post data
$newsmax_ruby_data_query          = newsmax_ruby_breaking_news::get_data();
$newsmax_ruby_headline            = newsmax_ruby_get_option( 'breaking_news_title' );
$newsmax_ruby_breaking_news_right = newsmax_ruby_get_option( 'breaking_news_right' );
?><div class="breaking-news-wrap">
	<div class="ruby-container">
		<div class="breaking-news-inner container-inner clearfix">
			<div class="breaking-news-left">
				<div class="breaking-news-title">
					<span class="headline"><?php echo esc_attr( $newsmax_ruby_headline ) ?></span>
					<i class="mobile-headline fa fa-bolt"></i>
				</div>
				<div class="breaking-news-content">
					<?php if ( $newsmax_ruby_data_query->have_posts() ) : ?>
						<div class="breaking-news-loader"></div>
						<div id="ruby-breaking-news" class="breaking-news-content-inner slider-init">

							<?php while ( $newsmax_ruby_data_query->have_posts() ) : ?>
								<?php $newsmax_ruby_data_query->the_post(); ?>
								<article class="post-wrap post-breaking-news">
									<?php echo newsmax_ruby_post_title( 'is-size-4' ); ?>
								</article>
							<?php endwhile; ?>

						</div>
					<?php else : ?>
						<div class="ruby-error">
							<?php esc_attr_e( 'No enough post for breaking news, try to select another query', 'newsmax' ); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>

			<?php if ( ! empty( $newsmax_ruby_breaking_news_right ) ) : ?>
				<?php if('tag' == $newsmax_ruby_breaking_news_right)  :?>
					<?php get_template_part( 'templates/header/module', 'breaking_news_tag' ); ?>
				<?php else: ?>
					<?php get_template_part( 'templates/header/module', 'breaking_news_cat' ); ?>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php wp_reset_postdata(); ?>