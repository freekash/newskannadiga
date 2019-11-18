<?php
$newsmax_ruby_navbar_small = newsmax_ruby_get_option( 'navbar_small' );
if ( ! empty( $newsmax_ruby_navbar_small ) && has_nav_menu( 'newsmax_ruby_menu_small' ) ) : ?>
	<div class="small-menu-outer">
		<div class="small-menu-btn">
			<div class="small-menu-btn-inner">
				<span class="icon-toggle"></span>
			</div>
		</div>
		<div id="ruby-small-menu" class="small-menu-wrap">
			<?php wp_nav_menu(
				array(
					'theme_location' => 'newsmax_ruby_menu_small',
					'menu_id'        => 'small-menu',
					'menu_class'     => 'small-menu-inner',
					'depth'          => 2,
					'echo'           => true,
					'fallback_cb'    => 'newsmax_ruby_navigation_fallback'
				)
			); ?>
		</div><!--#small nav menu -->
	</div>
<?php endif; ?>