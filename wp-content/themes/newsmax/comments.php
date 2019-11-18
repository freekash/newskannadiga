<?php
if ( post_password_required() ) {
	return false;
}; ?>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<div class="comment-title">
			<h3><i class="fa fa-comments"></i><?php comments_number( newsmax_ruby_translate('no_comment') ); ?></h3>
		</div>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>
			<nav id="comment-nav-above" class="comment-navigation" role="navigation">
				<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'newsmax' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'newsmax' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'newsmax' ) ); ?></div>
			</nav>
		<?php endif; ?>

		<ul class="comment-list entry">
			<?php
			wp_list_comments(
				array(
					'style'       => 'ul',
					'short_ping'  => true,
					'avatar_size' => 80
				)
			);?>
		</ul>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comment-nav-below" class="comment-navigation" role="navigation">
				<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'newsmax' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'newsmax' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'newsmax' ) ); ?></div>
			</nav>
		<?php endif; ?>
	<?php endif; ?>

	<?php
	if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :	?>
		<p class="no-comments"><?php echo newsmax_ruby_translate( 'comment_closed' ); ?></p>
	<?php endif;

	if ( ! function_exists( 'newsmax_ruby_comment_form' ) ) {
		function newsmax_ruby_comment_form( $fields ) {

			$req      = get_option( 'require_name_email' );
			$aria_req = ( $req ? " aria-required='true'" : '' );

			$enable_website_form = newsmax_ruby_get_option( 'single_post_box_comment_web' );
			$fields['author']    = '<p class="comment-form comment-form-author"><label for="author" >' . newsmax_ruby_translate( 'name' ) . '</label><input id="author" name="author" type="text" placeholder="' . newsmax_ruby_translate( 'name' ) . '..." size="30" ' . $aria_req . ' /></p>';
			$fields['email']     = '<p class="comment-form comment-form-email"><label for="email" >' . newsmax_ruby_translate( 'email' ) . '</label><input id="email" name="email" type="text" placeholder="' . newsmax_ruby_translate( 'email' ) . '..." ' . $aria_req . ' /></p>';
			if ( ! empty( $fields['url'] ) ) {
				unset( $fields['url'] );
			}
			if ( ! empty( $enable_website_form ) ) {
				$fields['url'] = '<p class="comment-form comment-form-url"><label for="url">' . newsmax_ruby_translate( 'website' ) . '</label>' . '<input id="url" name="url" type="text" placeholder="' . newsmax_ruby_translate( 'website' ) . '..." ' . $aria_req . ' /></p>';

			}

			return $fields;
		}

		add_filter( 'comment_form_default_fields', 'newsmax_ruby_comment_form' );
	}

	if ( is_user_logged_in() ) {
		$current_user = wp_get_current_user();
		$newsmax_ruby_args         = array(
			'comment_notes_before' => '',
			'comment_notes_after'  => '',
			'comment_field'        => '<p class="comment-form comment-form-comment"><label for="comment" >' .newsmax_ruby_translate('write_comment')  . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="' . newsmax_ruby_translate('write_comment') . '..."></textarea></p>',
			'id_submit'            => 'comment-submit',
			'class_submit'         => 'clearfix',
		);
	} else {
		$newsmax_ruby_args = array(
			'comment_notes_before' => '',
			'comment_notes_after'  => '',
			'comment_field'        => '<p class="comment-form comment-form-comment"><label for="comment" >' . newsmax_ruby_translate('write_comment')  . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="' . newsmax_ruby_translate('write_comment') . '..."></textarea></p>',
			'id_submit'            => 'comment-submit',
			'class_submit'         => 'clearfix',
		);
	};

	comment_form($newsmax_ruby_args);?>

</div>