<?php
if ( ! function_exists( 'newsmax_ruby_theme_options_woocommerce' ) ) {
	function newsmax_ruby_theme_options_woocommerce() {

		return array(
			'id'     => 'newsmax_ruby_config_section_woocommerce',
			'title'  => esc_html__( 'Woocommerce', 'newsmax' ),
			'desc'   => esc_html__( 'Select options for the shop page.', 'newsmax' ),
			'icon'   => 'el el-shopping-cart',
			'fields' => array(
				array(
					'id'     => 'section_start_woocommerce_color_global',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Woocommerce Color Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'          => 'wc_color_global',
					'title'       => esc_html__( 'Global Color', 'newsmax' ),
					'subtitle'    => esc_html__( 'Select global color, Please leave blank if you want to set as default (#ff4545)', 'newsmax' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'          => 'wc_color_price',
					'title'       => esc_html__( 'Price Color', 'newsmax' ),
					'subtitle'    => esc_html__( 'Select price color, Please leave blank if you want to set as default (#68ce92)', 'newsmax' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
				),
				array(
					'id'     => 'section_end_woocommerce_color_global',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//shop page config
				array(
					'id'     => 'section_start_woocommerce_page_shop',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Woocommerce Shop Options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'woocommerce_shop_title',
					'type'     => 'switch',
					'title'    => esc_html__( 'Shop Page Title', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable the title of shop page', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'woocommerce_shop_posts_per_page',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'Number of products', 'newsmax' ),
					'subtitle' => esc_html__( 'select number of products per page, leave blank if you want to set as default.', 'newsmax' ),
					'switch'   => true,
					'default'  => ''
				),
				array(
					'id'       => 'woocommerce_shop_sidebar_name',
					'type'     => 'select',
					'title'    => esc_html__( 'Shop Sidebar Name', 'newsmax' ),
					'subtitle' => esc_html__( 'select sidebar for Woocommerce pages, this option will apply to all woo pages, except the product page.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::sidebar_name(),
					'default'  => 'newsmax_ruby_sidebar_default',
				),
				array(
					'id'       => 'woocommerce_shop_sidebar_position',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Shop Sidebar Position', 'newsmax' ),
					'subtitle' => esc_html__( 'Select sidebar position for this page. This option will override default sidebar position setting.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::sidebar_position( false ),
					'default'  => 'none'
				),
				array(
					'id'     => 'section_end_woocommerce_page_shop',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//product page config
				array(
					'id'     => 'section_start_woocommerce_page_product',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Woocommerce product options', 'newsmax' ),
					'indent' => true
				),
				array(
					'id'       => 'woocommerce_product_sidebar_name',
					'type'     => 'select',
					'title'    => esc_html__( 'Product Sidebar', 'newsmax' ),
					'subtitle' => esc_html__( 'select sidebar name for the single product page.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::sidebar_name(),
					'default'  => 'newsmax_ruby_sidebar_default',
				),
				array(
					'id'       => 'woocommerce_product_sidebar_position',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Product Sidebar Position', 'newsmax' ),
					'subtitle' => esc_html__( 'select sidebar position for the single product page.', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::sidebar_position( false ),
					'default'  => 'none'
				),
				array(
					'id'       => 'woocommerce_product_box_review',
					'type'     => 'switch',
					'title'    => esc_html__( 'Show Review Box', 'newsmax' ),
					'subtitle' => esc_html__( 'enable or disable the review box in the single product page.', 'newsmax' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'     => 'section_end_woocommerce_page_product',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),

			)
		);
	}
}