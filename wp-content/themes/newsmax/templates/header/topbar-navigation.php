<?php
$newsmax_ruby_topbar_navigation = newsmax_ruby_get_option( 'topbar_navigation' );

if ( ! empty( $newsmax_ruby_topbar_navigation ) && has_nav_menu( 'newsmax_ruby_menu_topbar' ) ) : ?>
	<nav id="ruby-topbar-navigation" class="topbar-menu-wrap">
		<?php wp_nav_menu(
			array(
				'theme_location' => 'newsmax_ruby_menu_topbar',
				'menu_id'        => 'topbar-menu',
				'menu_class'     => 'topbar-menu-inner',
				'depth'          => 4,
				'echo'           => true,
				'fallback_cb'    => 'newsmax_ruby_navigation_fallback'
			)
		); ?>
	</nav>
<?php endif; ?>