<nav id="ruby-main-menu" class="main-menu-wrap" <?php echo newsmax_ruby_schema::markup( 'menu' ) ?>>
	<?php wp_nav_menu(
		array(
			'theme_location' => 'newsmax_ruby_menu_main',
			'menu_id'        => 'main-menu',
			'menu_class'     => 'main-menu-inner',
			'walker'         => new newsmax_ruby_walker,
			'depth'          => 4,
			'echo'           => true,
			'fallback_cb'    => 'newsmax_ruby_navigation_fallback'
		)
	); ?>
</nav>