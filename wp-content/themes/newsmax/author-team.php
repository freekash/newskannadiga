<?php
/*
Template Name: Team Page
*/

//get header
get_header();

$newsmax_ruby_page_title = newsmax_ruby_single_page_check_title();

echo newsmax_ruby_page_open( 'single-wrap team-template-wrap', 'none' );
echo newsmax_ruby_page_content_open( 'single-inner', 'none' );

if ( ! empty( $newsmax_ruby_page_title ) ) {
	echo '<div class="single-page-header team-template-title">';
	echo '<h1 class="entry-title single-title post-title is-size-0">';
	the_title();
	echo '</h1>';
	echo '</div>';
}

$author_select = newsmax_ruby_get_option( 'author_team_author_select' );

if ( empty( $author_select ) || ! is_array( $author_select ) ) :

	$author_team_administrator = newsmax_ruby_get_option( 'author_team_administrator' );
	$author_team_editor        = newsmax_ruby_get_option( 'author_team_editor' );
	$author_team_author        = newsmax_ruby_get_option( 'author_team_author' );
	$author_team_contributor   = newsmax_ruby_get_option( 'author_team_contributor' );

	$newsmax_ruby_role_in = array();

	if ( ! empty( $author_team_administrator ) ) {
		array_push( $newsmax_ruby_role_in, 'administrator' );
	}
	if ( ! empty( $author_team_editor ) ) {
		array_push( $newsmax_ruby_role_in, 'editor' );
	}
	if ( ! empty( $author_team_author ) ) {
		array_push( $newsmax_ruby_role_in, 'author' );
	}
	if ( ! empty( $author_team_contributor ) ) {
		array_push( $newsmax_ruby_role_in, 'contributor' );
	}

	$newsmax_ruby_param = array(
		'blog_id'     => $GLOBALS['blog_id'],
		'orderby'     => 'login',
		'count_total' => false,
		'role__in'    => $newsmax_ruby_role_in
	);

	$newsmax_ruby_blog_users = get_users( $newsmax_ruby_param );

	$newsmax_ruby_excepted_author_id = newsmax_ruby_get_option( 'excepted_author_team_id' );
	if ( ! empty( $newsmax_ruby_excepted_author_id ) ) {
		$newsmax_ruby_excepted_author_id = explode( ',', $newsmax_ruby_excepted_author_id );
	} ?>

	<div class="team-wrap">
		<div class="team-inner row clearfix">
			<?php
			if ( ! empty( $newsmax_ruby_blog_users ) ) {
				foreach ( $newsmax_ruby_blog_users as $newsmax_ruby_user ) :

					$newsmax_ruby_user_id = $newsmax_ruby_user->data->ID;
					if ( ! empty( $newsmax_ruby_excepted_author_id ) && is_array( $newsmax_ruby_excepted_author_id ) && in_array( $newsmax_ruby_user_id, $newsmax_ruby_excepted_author_id ) ) {
						continue;
					}

					$newsmax_ruby_blog_user_name     = $newsmax_ruby_user->data->display_name;
					$newsmax_ruby_blog_user_job      = '';
					$newsmax_ruby_blog_user_decs     = '';
					$newsmax_ruby_user_social_data   = newsmax_ruby_social_profile_user( $newsmax_ruby_user_id );
					$newsmax_ruby_user_social_render = newsmax_ruby_render_social_icon( $newsmax_ruby_user_social_data, true, false );
					$newsmax_ruby_blog_user_job      = get_the_author_meta( 'job', $newsmax_ruby_user_id );
					?>

					<div class="col-sm-3 col-xs-12 team-user-outer">
						<div class="team-user">
							<div class="team-user-avatar">
								<?php echo get_avatar( get_the_author_meta( 'user_email', $newsmax_ruby_user_id ), 200, '', $newsmax_ruby_blog_user_name ); ?>
							</div>
							<div class="team-user-title">
								<a href="<?php echo get_author_posts_url( $newsmax_ruby_user_id ); ?>">
									<h3><?php echo esc_html( $newsmax_ruby_blog_user_name ) ?></h3></a>
							</div>
							<span class="team-user-job"><?php echo esc_html( $newsmax_ruby_blog_user_job ); ?></span>

							<?php if ( ! empty( $newsmax_ruby_user_social_render ) ) : ?>
								<div class="team-user-social tooltips"><?php echo( $newsmax_ruby_user_social_render ); ?></div>
							<?php endif; ?>
						</div>
					</div>
				<?php
				endforeach;
			} ?>
		</div>
	</div>
<?php else : ?>

	<div class="team-wrap">
		<div class="team-inner row clearfix">
			<?php foreach ( $author_select as $newsmax_ruby_user_id ) :

				$newsmax_ruby_blog_user_name     = get_the_author_meta( 'display_name', $newsmax_ruby_user_id );
				$newsmax_ruby_blog_user_job      = '';
				$newsmax_ruby_blog_user_decs     = '';
				$newsmax_ruby_user_social_data   = newsmax_ruby_social_profile_user( $newsmax_ruby_user_id );
				$newsmax_ruby_user_social_render = newsmax_ruby_render_social_icon( $newsmax_ruby_user_social_data );
				$newsmax_ruby_blog_user_job      = get_the_author_meta( 'job', $newsmax_ruby_user_id );
				?>

				<div class="col-sm-3 col-xs-12 team-user-outer">
					<div class="team-user">
						<div class="team-user-avatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email', $newsmax_ruby_user_id ), 200, '', $newsmax_ruby_blog_user_name ); ?>
						</div>
						<div class="team-user-title">
							<a href="<?php echo get_author_posts_url( $newsmax_ruby_user_id ); ?>">
								<h3><?php echo esc_html( $newsmax_ruby_blog_user_name ) ?></h3></a>
						</div>
						<span class="team-user-job"><?php echo esc_html( $newsmax_ruby_blog_user_job ); ?></span>

						<?php if ( ! empty( $newsmax_ruby_user_social_render ) ) : ?>
							<div class="team-user-social tooltips"><?php echo( $newsmax_ruby_user_social_render ); ?></div>
						<?php endif; ?>
					</div>
				</div>

			<?php endforeach; ?>
		</div>
	</div>

<?php endif; ?>
<?php if ( have_posts() ) {
	while ( have_posts() ) {

		the_post();

		echo '<div class="entry single-entry page-entry">';
		the_content();
		echo newsmax_ruby_pagination_single();
		echo '</div>';

	}
}

echo newsmax_ruby_page_content_close();
echo newsmax_ruby_page_close();

//get footer
get_footer();