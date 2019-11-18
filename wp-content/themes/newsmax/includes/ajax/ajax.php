<?php
$newsmax_ruby_template_directory = get_template_directory();

require_once $newsmax_ruby_template_directory . '/includes/ajax/ajax_search.php';
require_once $newsmax_ruby_template_directory . '/includes/ajax/ajax_mic.php';
require_once $newsmax_ruby_template_directory . '/includes/ajax/ajax_blog.php';
require_once $newsmax_ruby_template_directory . '/includes/ajax/ajax_filter.php';
require_once $newsmax_ruby_template_directory . '/includes/ajax/ajax_pagination.php';
require_once $newsmax_ruby_template_directory . '/includes/ajax/ajax_playlist.php';
require_once $newsmax_ruby_template_directory . '/includes/ajax/ajax_single.php';
require_once $newsmax_ruby_template_directory . '/includes/ajax/ajax_related.php';

/**-------------------------------------------------------------------------------------------------------------------------
 * registering ajax
 */
if ( ! function_exists( 'newsmax_ruby_ajax_url' ) ) {
	function newsmax_ruby_ajax_url() {
		echo '<script type="application/javascript">var newsmax_ruby_ajax_url = "' . admin_url( 'admin-ajax.php' ) . '"</script>';
	}

	add_action( 'wp_enqueue_scripts', 'newsmax_ruby_ajax_url' );
}

if ( ! function_exists( 'newsmax_ruby_ajax_admin_url' ) ) {
	function newsmax_ruby_ajax_admin_url() {
		echo '<script type="application/javascript">var newsmax_ruby_ajax_admin_url = "' . admin_url( 'admin-ajax.php' ) . '"</script>';
	}

	add_action( 'admin_enqueue_scripts', 'newsmax_ruby_ajax_admin_url' );
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param $param
 *
 * @return array|string
 * validate data
 */
if ( ! function_exists( 'newsmax_ruby_data_validate' ) ) {
	function newsmax_ruby_data_validate( $param ) {
		if ( is_array( $param ) ) {
			foreach ( $param as $key => $val ) {
				$key           = sanitize_text_field( $key );
				$param[ $key ] = sanitize_text_field( $val );
			}
		} elseif ( is_string( $param ) ) {
			$param = sanitize_text_field( $param );
		} else {
			$param = '';
		}

		return $param;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $data_query
 * @param $param
 *
 * @return bool|string
 * render ajax content
 */
if ( ! function_exists( 'newsmax_ruby_ajax_data_content' ) ) {
	function newsmax_ruby_ajax_data_content( $data_query, $param ) {

		//get content
		if ( ! empty( $param['block_name'] ) ) {
			switch ( $param['block_name'] ) {

				case 'newsmax_ruby_fw_block_grid_1' :
					return newsmax_ruby_fw_block_grid_1::listing( $data_query, $param );
				case 'newsmax_ruby_fw_block_grid_2' :
					return newsmax_ruby_fw_block_grid_2::listing( $data_query, $param );
				case 'newsmax_ruby_fw_block_grid_3' :
					return newsmax_ruby_fw_block_grid_3::listing( $data_query, $param );
				case 'newsmax_ruby_fw_block_grid_4' :
					return newsmax_ruby_fw_block_grid_4::listing( $data_query, $param );
				case 'newsmax_ruby_fw_block_grid_5' :
					return newsmax_ruby_fw_block_grid_5::listing( $data_query, $param );
				case 'newsmax_ruby_fw_block_grid_6' :
					return newsmax_ruby_fw_block_grid_6::listing( $data_query, $param );
				case 'newsmax_ruby_fw_block_grid_7' :
					return newsmax_ruby_fw_block_grid_7::listing( $data_query, $param );
				case 'newsmax_ruby_fw_block_grid_8' :
					return newsmax_ruby_fw_block_grid_8::listing( $data_query, $param );
				case 'newsmax_ruby_fw_block_grid_9' :
					return newsmax_ruby_fw_block_grid_9::listing( $data_query, $param );
				case 'newsmax_ruby_fw_block_onet_1' :
					return newsmax_ruby_fw_block_onet_1::listing( $data_query, $param );
				case 'newsmax_ruby_fw_block_onet_2' :
					return newsmax_ruby_fw_block_onet_2::listing( $data_query, $param );
				case 'newsmax_ruby_fw_block_onet_3' :
					return newsmax_ruby_fw_block_onet_3::listing( $data_query, $param );
				case 'newsmax_ruby_fw_block_onet_4' :
					return newsmax_ruby_fw_block_onet_4::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_1' :
					return newsmax_ruby_hs_block_1::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_2' :
					return newsmax_ruby_hs_block_2::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_3' :
					return newsmax_ruby_hs_block_3::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_4' :
					return newsmax_ruby_hs_block_4::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_5' :
					return newsmax_ruby_hs_block_5::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_6' :
					return newsmax_ruby_hs_block_6::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_7' :
					return newsmax_ruby_hs_block_7::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_8' :
					return newsmax_ruby_hs_block_8::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_9' :
					return newsmax_ruby_hs_block_9::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_10' :
					return newsmax_ruby_hs_block_10::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_11' :
					return newsmax_ruby_hs_block_11::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_12' :
					return newsmax_ruby_hs_block_12::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_13' :
					return newsmax_ruby_hs_block_13::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_14' :
					return newsmax_ruby_hs_block_14::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_oneh_1' :
					return newsmax_ruby_hs_block_oneh_1::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_oneh_2' :
					return newsmax_ruby_hs_block_oneh_2::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_oneh_3' :
					return newsmax_ruby_hs_block_oneh_3::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_oneh_4' :
					return newsmax_ruby_hs_block_oneh_4::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_grid_1' :
					return newsmax_ruby_hs_block_grid_1::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_grid_2' :
					return newsmax_ruby_hs_block_grid_2::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_grid_3' :
					return newsmax_ruby_hs_block_grid_3::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_grid_4' :
					return newsmax_ruby_hs_block_grid_4::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_grid_5' :
					return newsmax_ruby_hs_block_grid_5::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_grid_6' :
					return newsmax_ruby_hs_block_grid_6::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_list_1' :
					return newsmax_ruby_hs_block_list_1::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_list_2' :
					return newsmax_ruby_hs_block_list_2::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_list_3' :
					return newsmax_ruby_hs_block_list_3::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_classic_1' :
					return newsmax_ruby_hs_block_classic_1::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_classic_2' :
					return newsmax_ruby_hs_block_classic_2::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_mix_1' :
					return newsmax_ruby_hs_block_mix_1::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_mix_2' :
					return newsmax_ruby_hs_block_mix_2::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_mix_3' :
					return newsmax_ruby_hs_block_mix_3::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_mix_4' :
					return newsmax_ruby_hs_block_mix_4::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_mix_5' :
					return newsmax_ruby_hs_block_mix_5::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_mix_6' :
					return newsmax_ruby_hs_block_mix_6::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_mix_7' :
					return newsmax_ruby_hs_block_mix_7::listing( $data_query, $param );
				case 'newsmax_ruby_hs_block_mix_8' :
					return newsmax_ruby_hs_block_mix_8::listing( $data_query, $param );
				case 'newsmax_ruby_mega_block_cat' :
					return newsmax_ruby_mega_block_cat::listing( $data_query, $param );
				case 'newsmax_ruby_mega_block_cat_sub' :
					return newsmax_ruby_mega_block_cat_sub::listing( $data_query, $param );
				case 'newsmax_ruby_block_widget_post' :
					return newsmax_ruby_block_widget_post::listing( $data_query, $param );
				default :
					return false;
			}
		} else {
			return false;
		}
	}
}