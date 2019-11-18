<?php

//setup section & module page composer
if ( ! class_exists( 'newsmax_ruby_composer_setup' ) ) {
	class newsmax_ruby_composer_setup {

		protected static $instance = null;

		public function  __construct() {
			add_action( 'admin_enqueue_scripts', array( $this, 'setup_sections' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'setup_blocks' ) );
		}

		static function get_instance() {
			if ( null == self::$instance ) {
				self::$instance = new self;
			}

			return self::$instance;
		}

		public function setup_sections() {

			$newsmax_ruby_setup_sections = array(
				'section_full_width'  => array(
					'title' => esc_html__( 'Full Width Section', 'newsmax' ),
					'img'   => get_template_directory_uri() . '/composer/images/section-full-width.png',
					'decs'  => esc_html__( 'Display content without sidebar', 'newsmax' ),
				),
				'section_has_sidebar' => array(
					'title' => esc_html__( 'Has Sidebar Section', 'newsmax' ),
					'img'   => get_template_directory_uri() . '/composer/images/section-has-sidebar.png',
					'decs'  => esc_html__( 'Display content width sidebar', 'newsmax' ),
				),

			);
			wp_localize_script( 'newsmax_ruby_composer_script', 'newsmax_ruby_setup_sections', $newsmax_ruby_setup_sections );
		}

		//setup blocks
		public function setup_blocks() {
			$newsmax_ruby_template_directory_uri = get_template_directory_uri();
			$newsmax_ruby_setup_blocks           = array(

				//fullwidth
				'newsmax_ruby_fw_block_1'           => array(
					'title'         => esc_html__( 'Featured 1', 'newsmax' ),
					'description'   => esc_html__( 'show grid slider (full screen)', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/fw-block-1.png',
					'section'       => 'section_full_width',
					'block_options' => newsmax_ruby_fw_block_1::block_config()
				),
				'newsmax_ruby_fw_block_2'           => array(
					'title'         => esc_html__( 'Featured 2', 'newsmax' ),
					'description'   => esc_html__( 'show grid slider (fullwidth)', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/fw-block-2.png',
					'section'       => 'section_full_width',
					'block_options' => newsmax_ruby_fw_block_2::block_config()
				),
				'newsmax_ruby_fw_block_3'           => array(
					'title'         => esc_html__( 'Featured 3', 'newsmax' ),
					'description'   => esc_html__( 'show grid slider (fullwidth)', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/fw-block-3.png',
					'section'       => 'section_full_width',
					'block_options' => newsmax_ruby_fw_block_3::block_config()
				),
				'newsmax_ruby_fw_block_4'           => array(
					'title'         => esc_html__( 'Featured 4', 'newsmax' ),
					'description'   => esc_html__( 'show big grid carousel (2 columns)', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/fw-block-4.png',
					'section'       => 'section_full_width',
					'block_options' => newsmax_ruby_fw_block_4::block_config()
				),
				'newsmax_ruby_fw_block_5'           => array(
					'title'         => esc_html__( 'Featured 5', 'newsmax' ),
					'description'   => esc_html__( 'show grid carousel (3 columns)', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/fw-block-5.png',
					'section'       => 'section_full_width',
					'block_options' => newsmax_ruby_fw_block_5::block_config()
				),
				'newsmax_ruby_fw_block_6'           => array(
					'title'         => esc_html__( 'Featured 6', 'newsmax' ),
					'description'   => esc_html__( 'show big carousel (full screen)', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/fw-block-6.png',
					'section'       => 'section_full_width',
					'block_options' => newsmax_ruby_fw_block_6::block_config()
				),
				'newsmax_ruby_fw_block_7'           => array(
					'title'         => esc_html__( 'Featured 7', 'newsmax' ),
					'description'   => esc_html__( 'show featured grid slider layout', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/fw-block-7.png',
					'section'       => 'section_full_width',
					'block_options' => newsmax_ruby_fw_block_7::block_config()
				),
				'newsmax_ruby_fw_block_8'           => array(
					'title'         => esc_html__( 'Featured 8', 'newsmax' ),
					'description'   => esc_html__( 'show featured grid slider layout', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/fw-block-8.png',
					'section'       => 'section_full_width',
					'block_options' => newsmax_ruby_fw_block_8::block_config()
				),
				'newsmax_ruby_fw_block_9'           => array(
					'title'         => esc_html__( 'Featured 9', 'newsmax' ),
					'description'   => esc_html__( 'show featured grid slider layout', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/fw-block-9.png',
					'section'       => 'section_full_width',
					'block_options' => newsmax_ruby_fw_block_9::block_config()
				),
				'newsmax_ruby_fw_block_10'          => array(
					'title'         => esc_html__( 'Featured 10', 'newsmax' ),
					'description'   => esc_html__( 'show featured carousel slider', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/fw-block-10.png',
					'section'       => 'section_full_width',
					'block_options' => newsmax_ruby_fw_block_10::block_config()
				),
				'newsmax_ruby_fw_block_11'          => array(
					'title'         => esc_html__( 'Featured 11', 'newsmax' ),
					'description'   => esc_html__( 'show featured slider (fullwidth)', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/fw-block-11.png',
					'section'       => 'section_full_width',
					'block_options' => newsmax_ruby_fw_block_11::block_config()
				),
				'newsmax_ruby_fw_block_12'          => array(
					'title'         => esc_html__( 'Featured 12', 'newsmax' ),
					'description'   => esc_html__( 'show featured slider with nav slider (fullwidth)', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/fw-block-12.png',
					'section'       => 'section_full_width',
					'block_options' => newsmax_ruby_fw_block_12::block_config()
				),
				'newsmax_ruby_fw_block_grid_1'      => array(
					'title'         => esc_html__( 'Grid 1', 'newsmax' ),
					'description'   => esc_html__( 'show default grid layout (3 columns)', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/fw-block-grid-1.png',
					'section'       => 'section_full_width',
					'block_options' => newsmax_ruby_fw_block_grid_1::block_config()
				),
				'newsmax_ruby_fw_block_grid_2'      => array(
					'title'         => esc_html__( 'Grid 2', 'newsmax' ),
					'description'   => esc_html__( 'show big grid layout (2 columns)', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/fw-block-grid-2.png',
					'section'       => 'section_full_width',
					'block_options' => newsmax_ruby_fw_block_grid_2::block_config()
				),
				'newsmax_ruby_fw_block_grid_3'      => array(
					'title'         => esc_html__( 'Grid 3', 'newsmax' ),
					'description'   => esc_html__( 'show small grid layout (5 columns)', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/fw-block-grid-3.png',
					'section'       => 'section_full_width',
					'block_options' => newsmax_ruby_fw_block_grid_3::block_config()
				),
				'newsmax_ruby_fw_block_grid_4'      => array(
					'title'         => esc_html__( 'Grid 4', 'newsmax' ),
					'description'   => esc_html__( 'show small grid layout (3 columns)', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/fw-block-grid-4.png',
					'section'       => 'section_full_width',
					'block_options' => newsmax_ruby_fw_block_grid_4::block_config()
				),
				'newsmax_ruby_fw_block_grid_5'      => array(
					'title'         => esc_html__( 'Grid 5', 'newsmax' ),
					'description'   => esc_html__( 'show small grid without thumbnail (3 columns)', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/fw-block-grid-5.png',
					'section'       => 'section_full_width',
					'block_options' => newsmax_ruby_fw_block_grid_5::block_config()
				),
				'newsmax_ruby_fw_block_grid_6'      => array(
					'title'         => esc_html__( 'Grid 6', 'newsmax' ),
					'description'   => esc_html__( 'show small grid without thumbnail (4 columns)', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/fw-block-grid-6.png',
					'section'       => 'section_full_width',
					'block_options' => newsmax_ruby_fw_block_grid_6::block_config()
				),
				'newsmax_ruby_fw_block_grid_7'      => array(
					'title'         => esc_html__( 'Grid 7', 'newsmax' ),
					'description'   => esc_html__( 'show overlay grid (2 columns)', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/fw-block-grid-7.png',
					'section'       => 'section_full_width',
					'block_options' => newsmax_ruby_fw_block_grid_7::block_config()
				),
				'newsmax_ruby_fw_block_grid_8'      => array(
					'title'         => esc_html__( 'Grid 8', 'newsmax' ),
					'description'   => esc_html__( 'show overlay grid (3 columns)', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/fw-block-grid-8.png',
					'section'       => 'section_full_width',
					'block_options' => newsmax_ruby_fw_block_grid_8::block_config()
				),
				'newsmax_ruby_fw_block_grid_9'      => array(
					'title'         => esc_html__( 'Grid 9', 'newsmax' ),
					'description'   => esc_html__( 'show overlay grid (3 columns)', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/fw-block-grid-9.png',
					'section'       => 'section_full_width',
					'block_options' => newsmax_ruby_fw_block_grid_9::block_config()
				),
				'newsmax_ruby_fw_block_gallery_1'   => array(
					'title'         => esc_html__( 'Gallery Grid 1', 'newsmax' ),
					'description'   => esc_html__( 'show gallery grid with popup slider in fullwidth section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/block-gallery-1.png',
					'section'       => 'section_full_width',
					'block_options' => newsmax_ruby_fw_block_gallery_1::block_config()
				),
				'newsmax_ruby_fw_block_gallery_2'   => array(
					'title'         => esc_html__( 'Gallery Grid 2', 'newsmax' ),
					'description'   => esc_html__( 'show gallery grid with popup slider in fullwidth section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/block-gallery-2.png',
					'section'       => 'section_full_width',
					'block_options' => newsmax_ruby_fw_block_gallery_2::block_config()
				),
				//fullwidth video block
				'newsmax_ruby_fw_block_video_1'     => array(
					'title'         => esc_html__( 'Playlist 1', 'newsmax' ),
					'description'   => esc_html__( 'show video playlist in fullwidth section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/fw-block-video-1.png',
					'section'       => 'section_full_width',
					'block_options' => newsmax_ruby_fw_block_video_1::block_config()
				),
				'newsmax_ruby_fw_block_video_2'     => array(
					'title'         => esc_html__( 'Playlist 2', 'newsmax' ),
					'description'   => esc_html__( 'show video playlist in fullwidth section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/fw-block-video-2.png',
					'section'       => 'section_full_width',
					'block_options' => newsmax_ruby_fw_block_video_2::block_config()
				),
				'newsmax_ruby_fw_block_onet_1'      => array(
					'title'         => esc_html__( 'One-third 1 (33%)', 'newsmax' ),
					'description'   => esc_html__( 'show one-third list layout in full-width section (33% width)', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/fw-block-onet-1.png',
					'section'       => 'section_full_width',
					'block_options' => newsmax_ruby_fw_block_onet_1::block_config()
				),
				'newsmax_ruby_fw_block_onet_2'      => array(
					'title'         => esc_html__( 'One-third 2 (33%)', 'newsmax' ),
					'description'   => esc_html__( 'show one-third list layout in full-width section (33% width)', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/fw-block-onet-2.png',
					'section'       => 'section_full_width',
					'block_options' => newsmax_ruby_fw_block_onet_2::block_config()
				),
				'newsmax_ruby_fw_block_onet_3'      => array(
					'title'         => esc_html__( 'One-third 3 (33%)', 'newsmax' ),
					'description'   => esc_html__( 'show one-third list layout in full-width section (33% width)', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/fw-block-onet-3.png',
					'section'       => 'section_full_width',
					'block_options' => newsmax_ruby_fw_block_onet_3::block_config()
				),
				'newsmax_ruby_fw_block_onet_4'      => array(
					'title'         => esc_html__( 'One-third 4 (33%)', 'newsmax' ),
					'description'   => esc_html__( 'show one-third list layout in full-width section (33% width)', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/fw-block-onet-4.png',
					'section'       => 'section_full_width',
					'block_options' => newsmax_ruby_fw_block_onet_4::block_config()
				),
				'newsmax_ruby_fw_block_html'        => array(
					'title'         => esc_html__( 'Custom HTML', 'newsmax' ),
					'description'   => esc_html__( 'show HTMl content, this block allows you can input text, HTML, shortcodes, iframe...', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/block-html.png',
					'section'       => 'section_full_width',
					'block_options' => newsmax_ruby_fw_block_html::block_config()
				),
				'newsmax_ruby_fw_block_advertising' => array(
					'title'         => esc_html__( 'Advertising', 'newsmax' ),
					'description'   => esc_html__( 'show Advertisement box in fullwidth section', 'newsmax' ),
					'section'       => 'section_full_width',
					'img'           => get_template_directory_uri() . '/composer/images/block-ad.png',
					'block_options' => newsmax_ruby_fw_block_advertising::block_config()
				),
				'newsmax_ruby_fw_block_shortcode'   => array(
					'title'         => esc_html__( 'Shortcodes', 'newsmax' ),
					'description'   => esc_html__( 'show shortcodes in fullwidth section', 'newsmax' ),
					'section'       => 'section_full_width',
					'img'           => get_template_directory_uri() . '/composer/images/block-shortcode.png',
					'block_options' => newsmax_ruby_fw_block_shortcode::block_config()
				),
				'newsmax_ruby_fw_block_subscribe'   => array(
					'title'         => esc_html__( 'Subscribe', 'newsmax' ),
					'description'   => esc_html__( 'show subscribe form in fullwidth section', 'newsmax' ),
					'section'       => 'section_full_width',
					'img'           => get_template_directory_uri() . '/composer/images/block-subscribe.png',
					'block_options' => newsmax_ruby_fw_block_subscribe::block_config()
				),
				'newsmax_ruby_fw_block_col'         => array(
					'title'         => esc_html__( 'Column - Images', 'newsmax' ),
					'description'   => esc_html__( 'show column images and destination links in full-width section.', 'newsmax' ),
					'section'       => 'section_full_width',
					'img'           => get_template_directory_uri() . '/composer/images/block-col-img.png',
					'block_options' => newsmax_ruby_fw_block_col::block_config()
				),
				'newsmax_ruby_fw_block_raw_html'    => array(
					'title'         => esc_html__( 'Column - Raw HTML', 'newsmax' ),
					'description'   => esc_html__( 'show column raw HTML in full-width section.', 'newsmax' ),
					'section'       => 'section_full_width',
					'img'           => get_template_directory_uri() . '/composer/images/block-raw-html.png',
					'block_options' => newsmax_ruby_fw_block_raw_html::block_config()
				),
				//has sidebar
				'newsmax_ruby_hs_block_1'           => array(
					'title'         => esc_html__( 'Block 1', 'newsmax' ),
					'description'   => esc_html__( 'show grid layout in has sidebar section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-1.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_1::block_config()
				),
				'newsmax_ruby_hs_block_2'           => array(
					'title'         => esc_html__( 'Block 2', 'newsmax' ),
					'description'   => esc_html__( 'show grid layout in has sidebar section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-2.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_2::block_config()
				),
				'newsmax_ruby_hs_block_3'           => array(
					'title'         => esc_html__( 'Block 3', 'newsmax' ),
					'description'   => esc_html__( 'show grid layout in has sidebar section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-3.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_3::block_config()
				),
				'newsmax_ruby_hs_block_4'           => array(
					'title'         => esc_html__( 'Block 4', 'newsmax' ),
					'description'   => esc_html__( 'show grid layout in has sidebar section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-4.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_4::block_config()
				),
				'newsmax_ruby_hs_block_5'           => array(
					'title'         => esc_html__( 'Block 5', 'newsmax' ),
					'description'   => esc_html__( 'show grid layout in has sidebar section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-5.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_5::block_config()
				),
				'newsmax_ruby_hs_block_6'           => array(
					'title'         => esc_html__( 'Block 6', 'newsmax' ),
					'description'   => esc_html__( 'show grid layout in has sidebar section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-6.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_6::block_config()
				),
				'newsmax_ruby_hs_block_7'           => array(
					'title'         => esc_html__( 'Block 7', 'newsmax' ),
					'description'   => esc_html__( 'show grid layout in has sidebar section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-7.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_7::block_config()
				),
				'newsmax_ruby_hs_block_8'           => array(
					'title'         => esc_html__( 'Block 8', 'newsmax' ),
					'description'   => esc_html__( 'show grid layout in has sidebar section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-8.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_8::block_config()
				),
				'newsmax_ruby_hs_block_9'           => array(
					'title'         => esc_html__( 'Block 9', 'newsmax' ),
					'description'   => esc_html__( 'show grid layout in has sidebar section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-9.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_9::block_config()
				),
				'newsmax_ruby_hs_block_10'          => array(
					'title'         => esc_html__( 'Block 10', 'newsmax' ),
					'description'   => esc_html__( 'show grid layout in has sidebar section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-10.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_10::block_config()
				),
				'newsmax_ruby_hs_block_11'          => array(
					'title'         => esc_html__( 'Block 11', 'newsmax' ),
					'description'   => esc_html__( 'show grid layout in has sidebar section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-11.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_11::block_config()
				),
				'newsmax_ruby_hs_block_12'          => array(
					'title'         => esc_html__( 'Block 12', 'newsmax' ),
					'description'   => esc_html__( 'show grid layout in has sidebar section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-12.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_12::block_config()
				),
				'newsmax_ruby_hs_block_13'          => array(
					'title'         => esc_html__( 'Block 13', 'newsmax' ),
					'description'   => esc_html__( 'show grid layout in has sidebar section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-13.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_13::block_config()
				),
				'newsmax_ruby_hs_block_14'          => array(
					'title'         => esc_html__( 'Block 14', 'newsmax' ),
					'description'   => esc_html__( 'show grid layout in has sidebar section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-14.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_14::block_config()
				),
				'newsmax_ruby_hs_block_15'          => array(
					'title'         => esc_html__( 'Featured 1', 'newsmax' ),
					'description'   => esc_html__( 'show featured slider in has sidebar section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-15.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_15::block_config()
				),
				'newsmax_ruby_hs_block_16'          => array(
					'title'         => esc_html__( 'Featured 2', 'newsmax' ),
					'description'   => esc_html__( 'show featured slider in has sidebar section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-16.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_16::block_config()
				),
				'newsmax_ruby_hs_block_oneh_1'      => array(
					'title'         => esc_html__( 'One-half 1 (50%)', 'newsmax' ),
					'description'   => esc_html__( 'show one-half list layout in has sidebar section (50% width)', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-oneh-1.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_oneh_1::block_config()
				),
				'newsmax_ruby_hs_block_oneh_2'      => array(
					'title'         => esc_html__( 'One-half 2 (50%)', 'newsmax' ),
					'description'   => esc_html__( 'show one-half list layout in has sidebar section (50% width)', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-oneh-2.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_oneh_2::block_config()
				),
				'newsmax_ruby_hs_block_oneh_3'      => array(
					'title'         => esc_html__( 'One-half 3 (50%)', 'newsmax' ),
					'description'   => esc_html__( 'show one-half list layout in has sidebar section (50% width)', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-oneh-3.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_oneh_3::block_config()
				),
				'newsmax_ruby_hs_block_oneh_4'      => array(
					'title'         => esc_html__( 'One-half 4 (50%)', 'newsmax' ),
					'description'   => esc_html__( 'show one-half list layout in has sidebar section (50% width)', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-oneh-4.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_oneh_4::block_config()
				),
				'newsmax_ruby_hs_block_grid_1'      => array(
					'title'         => esc_html__( 'Grid 1', 'newsmax' ),
					'description'   => esc_html__( 'show the grid layout (2 columns) of list of posts in the has-sidebar section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-grid-1.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_grid_1::block_config()
				),
				'newsmax_ruby_hs_block_grid_2'      => array(
					'title'         => esc_html__( 'Grid 2', 'newsmax' ),
					'description'   => esc_html__( 'show the grid layout (2 columns) of list of posts in the has-sidebar section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-grid-2.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_grid_2::block_config()
				),
				'newsmax_ruby_hs_block_grid_3'      => array(
					'title'         => esc_html__( 'Grid 3', 'newsmax' ),
					'description'   => esc_html__( 'show the grid layout (2 columns) of list of posts in the has-sidebar section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-grid-3.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_grid_3::block_config()
				),
				'newsmax_ruby_hs_block_grid_4'      => array(
					'title'         => esc_html__( 'Grid 4', 'newsmax' ),
					'description'   => esc_html__( 'show the grid layout (2 columns) of list of posts in the has-sidebar section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-grid-4.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_grid_4::block_config()
				),
				'newsmax_ruby_hs_block_grid_5'      => array(
					'title'         => esc_html__( 'Grid 5', 'newsmax' ),
					'description'   => esc_html__( 'show the grid layout (3 columns) of list of posts in the has-sidebar section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-grid-5.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_grid_5::block_config()
				),
				'newsmax_ruby_hs_block_grid_6'      => array(
					'title'         => esc_html__( 'Grid 6', 'newsmax' ),
					'description'   => esc_html__( 'show overlay grid layout (3 columns) of list of posts in the has-sidebar section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-grid-6.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_grid_6::block_config()
				),
				'newsmax_ruby_hs_block_list_1'      => array(
					'title'         => esc_html__( 'List 1', 'newsmax' ),
					'description'   => esc_html__( 'show the list layout of list of posts in the has-sidebar section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-list-1.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_list_1::block_config()
				),
				'newsmax_ruby_hs_block_list_2'      => array(
					'title'         => esc_html__( 'List 2', 'newsmax' ),
					'description'   => esc_html__( 'show the list layout of list of posts in the has-sidebar section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-list-2.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_list_2::block_config()
				),
				'newsmax_ruby_hs_block_list_3'      => array(
					'title'         => esc_html__( 'List 3', 'newsmax' ),
					'description'   => esc_html__( 'show the list layout of list of posts in the has-sidebar section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-list-3.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_list_3::block_config()
				),
				'newsmax_ruby_hs_block_classic_1'   => array(
					'title'         => esc_html__( 'Classic 1', 'newsmax' ),
					'description'   => esc_html__( 'show the classic layout of list of posts in the has-sidebar section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-classic-1.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_classic_1::block_config()
				),
				'newsmax_ruby_hs_block_classic_2'   => array(
					'title'         => esc_html__( 'Classic 2', 'newsmax' ),
					'description'   => esc_html__( 'show the classic layout of list of posts in the has-sidebar section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-classic-2.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_classic_2::block_config()
				),
				'newsmax_ruby_hs_block_mix_1'       => array(
					'title'         => esc_html__( 'Mix 1', 'newsmax' ),
					'description'   => esc_html__( 'show mix layout, 1st classic layout and then list Layout', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-mix-1.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_mix_1::block_config()
				),
				'newsmax_ruby_hs_block_mix_2'       => array(
					'title'         => esc_html__( 'Mix 2', 'newsmax' ),
					'description'   => esc_html__( 'show mix layout, 1st classic layout and then list Layout', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-mix-2.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_mix_2::block_config()
				),
				'newsmax_ruby_hs_block_mix_3'       => array(
					'title'         => esc_html__( 'Mix 3', 'newsmax' ),
					'description'   => esc_html__( 'show mix layout, 1st classic layout and then grid Layout (2 columns)', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-mix-3.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_mix_3::block_config()
				),
				'newsmax_ruby_hs_block_mix_4'       => array(
					'title'         => esc_html__( 'Mix 4', 'newsmax' ),
					'description'   => esc_html__( 'show mix layout, 1st classic layout and then grid Layout (3 columns)', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-mix-4.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_mix_4::block_config()
				),
				'newsmax_ruby_hs_block_mix_5'       => array(
					'title'         => esc_html__( 'Mix 5', 'newsmax' ),
					'description'   => esc_html__( 'show mix layout, 1st classic layout (style 2) and then list Layout', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-mix-5.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_mix_5::block_config()
				),
				'newsmax_ruby_hs_block_mix_6'       => array(
					'title'         => esc_html__( 'Mix 6', 'newsmax' ),
					'description'   => esc_html__( 'show mix layout, 1st classic layout (style 2) and then list Layout', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-mix-6.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_mix_6::block_config()
				),
				'newsmax_ruby_hs_block_mix_7'       => array(
					'title'         => esc_html__( 'Mix 7', 'newsmax' ),
					'description'   => esc_html__( 'show mix layout, 1st classic layout and then grid Layout (2 columns)', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-mix-7.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_mix_7::block_config()
				),
				'newsmax_ruby_hs_block_mix_8'       => array(
					'title'         => esc_html__( 'Mix 8', 'newsmax' ),
					'description'   => esc_html__( 'show mix layout, 1st classic layout and then grid Layout (3 columns)', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-mix-8.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_mix_8::block_config()
				),
				'newsmax_ruby_hs_block_gallery_1'   => array(
					'title'         => esc_html__( 'Galley 1', 'newsmax' ),
					'description'   => esc_html__( 'show gallery grid in has sidebar section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/block-gallery-1.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_gallery_1::block_config()
				),
				'newsmax_ruby_hs_block_gallery_2'   => array(
					'title'         => esc_html__( 'Gallery 2', 'newsmax' ),
					'description'   => esc_html__( 'show gallery grid in has sidebar section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/block-gallery-2.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_gallery_2::block_config()
				),
				'newsmax_ruby_hs_block_video_1'     => array(
					'title'         => esc_html__( 'Playlist 1', 'newsmax' ),
					'description'   => esc_html__( 'show video playlist in has sidebar section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-video-1.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_video_1::block_config()
				),
				'newsmax_ruby_hs_block_video_2'     => array(
					'title'         => esc_html__( 'Playlist 2', 'newsmax' ),
					'description'   => esc_html__( 'show video playlist in has sidebar section', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/hs-block-video-2.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_video_2::block_config()
				),
				'newsmax_ruby_hs_block_html'        => array(
					'title'         => esc_html__( 'Custom HTML', 'newsmax' ),
					'description'   => esc_html__( 'show HTMl content, this block allows you can input text, HTML, shortcodes, iframe...', 'newsmax' ),
					'img'           => $newsmax_ruby_template_directory_uri . '/composer/images/block-html.png',
					'section'       => 'section_has_sidebar',
					'block_options' => newsmax_ruby_hs_block_html::block_config()
				),
				'newsmax_ruby_hs_block_advertising' => array(
					'title'         => esc_html__( 'Advertising', 'newsmax' ),
					'description'   => esc_html__( 'show Advertisement box in has sidebar section', 'newsmax' ),
					'section'       => 'section_has_sidebar',
					'img'           => get_template_directory_uri() . '/composer/images/block-ad.png',
					'block_options' => newsmax_ruby_hs_block_advertising::block_config()
				),
				'newsmax_ruby_hs_block_shortcode'   => array(
					'title'         => esc_html__( 'Shortcodes', 'newsmax' ),
					'description'   => esc_html__( 'show shortcodes in has sidebar section', 'newsmax' ),
					'section'       => 'section_has_sidebar',
					'img'           => get_template_directory_uri() . '/composer/images/block-shortcode.png',
					'block_options' => newsmax_ruby_hs_block_shortcode::block_config()
				),
				'newsmax_ruby_hs_block_subscribe'   => array(
					'title'         => esc_html__( 'Subscribe', 'newsmax' ),
					'description'   => esc_html__( 'show subscribe form in has sidebar section', 'newsmax' ),
					'section'       => 'section_has_sidebar',
					'img'           => get_template_directory_uri() . '/composer/images/block-subscribe.png',
					'block_options' => newsmax_ruby_hs_block_subscribe::block_config()
				),
				'newsmax_ruby_hs_block_raw_html'    => array(
					'title'         => esc_html__( 'Column - Raw HTML', 'newsmax' ),
					'description'   => esc_html__( 'show column raw HTML in has sidebar section.', 'newsmax' ),
					'section'       => 'section_has_sidebar',
					'img'           => get_template_directory_uri() . '/composer/images/block-raw-html.png',
					'block_options' => newsmax_ruby_hs_block_raw_html::block_config()
				),
			);

			wp_localize_script( 'newsmax_ruby_composer_script', 'newsmax_ruby_setup_blocks', $newsmax_ruby_setup_blocks );
		}
	}

	//init page composer class
	newsmax_ruby_composer_setup::get_instance();
}



