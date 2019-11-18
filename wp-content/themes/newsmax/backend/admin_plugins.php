<?php
//include the TGM_Plugin_Activation class
require_once get_template_directory() . '/backend/admin_activation.php';

if ( ! function_exists( 'newsmax_ruby_theme_register_required_plugins' ) ) {
	function newsmax_ruby_theme_register_required_plugins() {
		$plugins = array(
			array(
				'name'               => 'NewsMax Core',
				'slug'               => 'newsmax-core',
				'source'             => get_template_directory() . '/plugins/newsmax-core.zip',
				'required'           => true,
				'version'            => '1.6',
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => '',
				'is_callable'        => '',
			),
			array(
				'name'               => 'Newsmax Importer',
				'slug'               => 'newsmax-import',
				'source'             => get_template_directory() . '/plugins/newsmax-import.zip',
				'required'           => true,
				'version'            => '1.0',
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => '',
				'is_callable'        => '',
			),
			array(
				'name'               => 'Envato Market',
				'slug'               => 'envato-market',
				'source'             => get_template_directory() . '/plugins/envato-market.zip',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => '',
			),
			array(
				'name'     => 'MailChimp for WordPress',
				'slug'     => 'mailchimp-for-wp',
				'required' => false,
			),
			array(
				'name'     => 'oAuth Twitter Feed for Developers',
				'slug'     => 'oauth-twitter-feed-for-developers',
				'required' => true,
			),
		);


		$newsmax_ruby_config = array(
			'id'           => 'newsmax',
			'default_path' => '',
			'menu'         => 'newsmax-plugins',
			'parent_slug'  => 'themes.php',
			'capability'   => 'edit_theme_options',
			'has_notices'  => true,
			'dismissable'  => true,
			'dismiss_msg'  => '',
			'is_automatic' => false,
			'message'      => '',
			'strings'      => array(
				'page_title'                      => esc_html__( 'Install Required Plugins', 'newsmax' ),
				'menu_title'                      => esc_html__( 'Install Plugins', 'newsmax' ),
				'installing'                      => esc_html__( 'Installing Plugin: %s', 'newsmax' ),
				'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'newsmax' ),
				'notice_can_install_required'     => _n_noop( 'NewsMax the following plugin: %1$s.', 'NewsMax requires the following plugins: %1$s.', 'newsmax' ),
				'notice_can_install_recommended'  => _n_noop( 'NewsMax recommends the following plugin: %1$s.', 'NewsMax recommends the following plugins: %1$s.', 'newsmax' ),
				'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'newsmax' ),
				'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'newsmax' ),
				'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'newsmax' ),
				'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'newsmax' ),
				'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with NewsMax: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with NewsMax: %1$s.', 'newsmax' ),
				'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'newsmax' ),
				'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'newsmax' ),
				'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'newsmax' ),
				'return'                          => esc_html__( 'Return to Required Plugins Installer', 'newsmax' ),
				'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'newsmax' ),
				'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'newsmax' ),
				'nag_type'                        => 'updated'
			)
		);

		tgmpa( $plugins, $newsmax_ruby_config );
	}

	add_action( 'tgmpa_register', 'newsmax_ruby_theme_register_required_plugins' );
}

