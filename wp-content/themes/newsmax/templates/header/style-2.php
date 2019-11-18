<div class="header-wrap header-style-2">
	<div class="header-inner">
		<?php get_template_part( 'templates/header/module', 'ad_top' ); ?>
		<?php newsmax_ruby_render_topbar(); ?>

		<div class="navbar-outer clearfix">
			<div class="navbar-wrap">
				<div class="ruby-container">
					<div class="navbar-inner container-inner clearfix">
						<div class="navbar-mobile">
							<?php get_template_part( 'templates/header/module', 'off_canvas_toggle' ); ?>
							<?php get_template_part( 'templates/header/module', 'logo_mobile' ); ?>
						</div><!--#mobile -->
						<div class="navbar-left">
							<?php get_template_part( 'templates/header/module', 'logo' ); ?>
							<?php get_template_part( 'templates/header/module', 'menu_small' ); ?>
							<?php get_template_part( 'templates/header/module', 'menu_main' ); ?>
						</div>
						<div class="navbar-right">
							<div class="navbar-elements">
								<?php get_template_part( 'templates/header/navbar', 'social' ); ?>
								<?php get_template_part( 'templates/header/navbar', 'search' ); ?>
								<?php get_template_part( 'templates/header/navbar', 'widget' ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php get_template_part( 'templates/header/module', 'search_popup' ); ?>
	<?php get_template_part( 'templates/header/module', 'ad_bottom' ); ?>

</div>