<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return $woocommerce
 */
if ( ! function_exists( 'newsmax_ruby_wc_global_wc' ) ) {
	function newsmax_ruby_wc_global_wc() {
		global $woocommerce;

		return $woocommerce;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return WC_Product
 */
if ( ! function_exists( 'newsmax_ruby_wc_global_product' ) ) {
	function newsmax_ruby_wc_global_product() {
		global $product;

		return $product;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return mixed
 * max number of page
 */
if ( ! function_exists( 'newsmax_ruby_wc_max_products' ) ) {
	function newsmax_ruby_wc_max_products() {

		global $wp_query;

		return $wp_query->max_num_pages;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return mixed|string|void
 * product per page
 */
if ( ! function_exists( 'newsmax_ruby_wc_products_per_page' ) ) {
	function newsmax_ruby_wc_products_per_page( $total ) {
		$posts_per_page = newsmax_ruby_get_option( 'woocommerce_shop_posts_per_page' );
		if ( ! empty( $posts_per_page ) ) {
			$total = $posts_per_page;
		}

		return $total;
	}

	add_filter( 'loop_shop_per_page', 'newsmax_ruby_wc_products_per_page', 10 );
}


/**-------------------------------------------------------------------------------------------------------------------------
 * change number product per row
 */
if ( ! function_exists( 'newsmax_ruby_wc_loop_columns' ) ) {
	function newsmax_ruby_wc_loop_columns() {
		$sidebar_position = newsmax_ruby_get_option( 'woocommerce_shop_sidebar_position' );

		if ( 'none' == $sidebar_position ) {
			return 4;
		} else {
			return 3;
		}
	}

	add_filter( 'loop_shop_columns', 'newsmax_ruby_wc_loop_columns' );
}


/**-------------------------------------------------------------------------------------------------------------------------
 * newsmax_ruby_wc_loop_columns
 */
if ( ! function_exists( 'newsmax_ruby_wc_loop_columns' ) ) {
	function newsmax_ruby_wc_loop_columns( $columns ) {
		global $woocommerce_loop;

		$woocommerce_loop['name']    = 'related';
		$woocommerce_loop['columns'] = apply_filters( 'woocommerce_related_products_columns', $columns );
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * newsmax_ruby_wc_upsells_loop
 */
if ( ! function_exists( 'newsmax_ruby_wc_upsells_loop' ) ) {
	function newsmax_ruby_wc_upsells_loop( $columns ) {
		global $woocommerce_loop;

		$woocommerce_loop['name']    = 'up-sells';
		$woocommerce_loop['columns'] = apply_filters( 'woocommerce_up_sells_columns', $columns );
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * newsmax_ruby_wc_crosssells_loop
 */
if ( ! function_exists( 'newsmax_ruby_wc_crosssells_loop' ) ) {
	function newsmax_ruby_wc_crosssells_loop( $columns ) {
		global $woocommerce_loop;

		$woocommerce_loop['name']    = 'cross-sells';
		$woocommerce_loop['columns'] = apply_filters( 'woocommerce_cross_sells_columns', $columns );
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 *  Woocommerce up sells total
 */

if ( ! function_exists( 'newsmax_ruby_wc_upsells_total' ) ) {
	function newsmax_ruby_wc_upsells_total() {
		$sidebar_position = newsmax_ruby_get_option( 'woocommerce_product_sidebar_position' );
		if ( 'none' == $sidebar_position ) {
			return 4;
		} else {
			return 3;
		}
	}

	add_filter( 'woocommerce_up_sells_columns', 'newsmax_ruby_wc_upsells_total' );
}


/**-------------------------------------------------------------------------------------------------------------------------
 * cross sell posts per page
 */
if ( ! function_exists( 'newsmax_ruby_wc_upsells_total' ) ) {
	function newsmax_ruby_wc_upsells_total() {
		$sidebar_position = newsmax_ruby_get_option( 'woocommerce_product_sidebar_position' );
		if ( 'none' == $sidebar_position ) {
			return 2;
		} else {
			return 1;
		}
	}

	add_filter( 'woocommerce_cross_sells_total', 'newsmax_ruby_wc_upsells_total' );
	add_filter( 'woocommerce_cross_sells_column', 'newsmax_ruby_wc_upsells_total' );
}


/**-------------------------------------------------------------------------------------------------------------------------
 * woocommerce related product
 */
if ( ! function_exists( 'newsmax_ruby_wc_output_related_products' ) ) {

	function newsmax_ruby_wc_output_related_products() {

		$sidebar_position = newsmax_ruby_get_option( 'woocommerce_product_sidebar_position' );
		if ( 'none' == $sidebar_position ) {
			$post_per_page = 4;
		} else {
			$post_per_page = 3;
		}

		woocommerce_related_products( array(
			'posts_per_page' => $post_per_page,
			'columns'        => $post_per_page
		) );
	}

	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
	remove_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products', 10 );
	add_action( 'woocommerce_after_single_product_summary', 'newsmax_ruby_wc_output_related_products', 20 );
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return bool
 * shop title
 */
if ( ! function_exists( 'newsmax_ruby_wc_shop_title' ) ) {
	function newsmax_ruby_wc_shop_title() {
		$shop_title = newsmax_ruby_get_option( 'woocommerce_shop_title' );
		if ( is_shop() && ! empty( $shop_title ) ) {
			return false;
		} else {
			return true;
		}
	}

	add_filter( 'woocommerce_show_page_title', 'newsmax_ruby_wc_shop_title' );
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $tabs
 * remove comment tab
 */
if ( ! function_exists( 'newsmax_ruby_wc_product_comment' ) ) {
	function newsmax_ruby_wc_product_comment( $tabs ) {
		$product_review = newsmax_ruby_get_option( 'woocommerce_product_box_review' );
		if ( empty( $product_review ) ) {
			unset( $tabs['reviews'] );
		}

		return $tabs;
	}

	add_filter( 'woocommerce_product_tabs', 'newsmax_ruby_wc_product_comment', 99 );
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * woo breadcrumb
 */
if ( ! function_exists( 'newsmax_ruby_wc_breadcrumb' ) ) {
	function newsmax_ruby_wc_breadcrumb() {
		$breadcrumb = newsmax_ruby_get_option( 'site_breadcrumb' );
		$str        = '';
		$str .= '<div class="breadcrumb-outer">';

		if ( ! empty( $breadcrumb ) ) {
			$param = array(
				'delimiter'   => '<i class="fa fa-angle-right breadcrumb-next"></i>',
				'wrap_before' => '<div class="breadcrumb-wrap" ' . ( is_single() ? 'itemprop="breadcrumb"' : '' ) . '><div class="ruby-container breadcrumb-inner">',
				'wrap_after'  => '</div></div>',
				'home'        => newsmax_ruby_translate( 'home' )
			);

			ob_start();
			woocommerce_breadcrumb( $param );
			$str .= ob_get_clean();
		}

		$str .= '</div>';

		return $str;
	}
}