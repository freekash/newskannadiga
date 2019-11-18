<?php
//including ruby page composer
$newsmax_ruby_template_directory = get_template_directory();

require_once $newsmax_ruby_template_directory . '/composer/composer_enqueue.php';
require_once $newsmax_ruby_template_directory . '/composer/composer_setup.php';
require_once $newsmax_ruby_template_directory . '/composer/composer_config.php';
require_once $newsmax_ruby_template_directory . '/composer/composer_action.php';
require_once $newsmax_ruby_template_directory . '/composer/composer_render.php';
require_once $newsmax_ruby_template_directory . '/composer/composer_block.php';