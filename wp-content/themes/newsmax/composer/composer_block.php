<?php
//render composer
if ( ! class_exists( 'ruby_composer_block' ) ) {
	class ruby_composer_block {
		static function render( $section, $block ) {
			//section fullwidth
			if ( 'section_full_width' == $section ) {
				switch ( $block['block_name'] ) {
					case 'newsmax_ruby_fw_block_1' : {
						return newsmax_ruby_fw_block_1::render( $block );
					}
					case 'newsmax_ruby_fw_block_2' : {
						return newsmax_ruby_fw_block_2::render( $block );
					}
					case 'newsmax_ruby_fw_block_3' : {
						return newsmax_ruby_fw_block_3::render( $block );
					}
					case 'newsmax_ruby_fw_block_4' : {
						return newsmax_ruby_fw_block_4::render( $block );
					}
					case 'newsmax_ruby_fw_block_5' : {
						return newsmax_ruby_fw_block_5::render( $block );
					}
					case 'newsmax_ruby_fw_block_6' : {
						return newsmax_ruby_fw_block_6::render( $block );
					}
					case 'newsmax_ruby_fw_block_7' : {
						return newsmax_ruby_fw_block_7::render( $block );
					}
					case 'newsmax_ruby_fw_block_8' : {
						return newsmax_ruby_fw_block_8::render( $block );
					}
					case 'newsmax_ruby_fw_block_9' : {
						return newsmax_ruby_fw_block_9::render( $block );
					}
					case 'newsmax_ruby_fw_block_10' : {
						return newsmax_ruby_fw_block_10::render( $block );
					}
					case 'newsmax_ruby_fw_block_11' : {
						return newsmax_ruby_fw_block_11::render( $block );
					}
					case 'newsmax_ruby_fw_block_12' : {
						return newsmax_ruby_fw_block_12::render( $block );
					}
					case 'newsmax_ruby_fw_block_grid_1' : {
						return newsmax_ruby_fw_block_grid_1::render( $block );
					}
					case 'newsmax_ruby_fw_block_grid_2' : {
						return newsmax_ruby_fw_block_grid_2::render( $block );
					}
					case 'newsmax_ruby_fw_block_grid_3' : {
						return newsmax_ruby_fw_block_grid_3::render( $block );
					}
					case 'newsmax_ruby_fw_block_grid_4' : {
						return newsmax_ruby_fw_block_grid_4::render( $block );
					}
					case 'newsmax_ruby_fw_block_grid_5' : {
						return newsmax_ruby_fw_block_grid_5::render( $block );
					}
					case 'newsmax_ruby_fw_block_grid_6' : {
						return newsmax_ruby_fw_block_grid_6::render( $block );
					}
					case 'newsmax_ruby_fw_block_grid_7' : {
						return newsmax_ruby_fw_block_grid_7::render( $block );
					}
					case 'newsmax_ruby_fw_block_grid_8' : {
						return newsmax_ruby_fw_block_grid_8::render( $block );
					}
					case 'newsmax_ruby_fw_block_grid_9' : {
						return newsmax_ruby_fw_block_grid_9::render( $block );
					}
					case 'newsmax_ruby_fw_block_gallery_1' : {
						return newsmax_ruby_fw_block_gallery_1::render( $block );
					}
					case 'newsmax_ruby_fw_block_gallery_2' : {
						return newsmax_ruby_fw_block_gallery_2::render( $block );
					}
					case 'newsmax_ruby_fw_block_video_1' : {
						return newsmax_ruby_fw_block_video_1::render( $block );
					}
					case 'newsmax_ruby_fw_block_video_2' : {
						return newsmax_ruby_fw_block_video_2::render( $block );
					}
					case 'newsmax_ruby_fw_block_onet_1' : {
						return newsmax_ruby_fw_block_onet_1::render( $block );
					}
					case 'newsmax_ruby_fw_block_onet_2' : {
						return newsmax_ruby_fw_block_onet_2::render( $block );
					}
					case 'newsmax_ruby_fw_block_onet_3' : {
						return newsmax_ruby_fw_block_onet_3::render( $block );
					}
					case 'newsmax_ruby_fw_block_onet_4' : {
						return newsmax_ruby_fw_block_onet_4::render( $block );
					}
					case 'newsmax_ruby_fw_block_html' : {
						return newsmax_ruby_fw_block_html::render( $block );
					}
					case 'newsmax_ruby_fw_block_advertising' : {
						return newsmax_ruby_fw_block_advertising::render( $block );
					}
					case 'newsmax_ruby_fw_block_shortcode' : {
						return newsmax_ruby_fw_block_shortcode::render( $block );
					}
					case 'newsmax_ruby_fw_block_subscribe' : {
						return newsmax_ruby_fw_block_subscribe::render( $block );
					}
					case 'newsmax_ruby_fw_block_col' : {
						return newsmax_ruby_fw_block_col::render( $block );
					}
					case 'newsmax_ruby_fw_block_raw_html' : {
						return newsmax_ruby_fw_block_raw_html::render( $block );
					}
					default :
						return false;
				}
			} else {
				//section sidebar
				switch ( $block['block_name'] ) {
					case 'newsmax_ruby_hs_block_1' : {
						return newsmax_ruby_hs_block_1::render( $block );
					}
					case 'newsmax_ruby_hs_block_2' : {
						return newsmax_ruby_hs_block_2::render( $block );
					}
					case 'newsmax_ruby_hs_block_3' : {
						return newsmax_ruby_hs_block_3::render( $block );
					}
					case 'newsmax_ruby_hs_block_4' : {
						return newsmax_ruby_hs_block_4::render( $block );
					}
					case 'newsmax_ruby_hs_block_5' : {
						return newsmax_ruby_hs_block_5::render( $block );
					}
					case 'newsmax_ruby_hs_block_6' : {
						return newsmax_ruby_hs_block_6::render( $block );
					}
					case 'newsmax_ruby_hs_block_7' : {
						return newsmax_ruby_hs_block_7::render( $block );
					}
					case 'newsmax_ruby_hs_block_8' : {
						return newsmax_ruby_hs_block_8::render( $block );
					}
					case 'newsmax_ruby_hs_block_9' : {
						return newsmax_ruby_hs_block_9::render( $block );
					}
					case 'newsmax_ruby_hs_block_10' : {
						return newsmax_ruby_hs_block_10::render( $block );
					}
					case 'newsmax_ruby_hs_block_11' : {
						return newsmax_ruby_hs_block_11::render( $block );
					}
					case 'newsmax_ruby_hs_block_12' : {
						return newsmax_ruby_hs_block_12::render( $block );
					}
					case 'newsmax_ruby_hs_block_13' : {
						return newsmax_ruby_hs_block_13::render( $block );
					}
					case 'newsmax_ruby_hs_block_14' : {
						return newsmax_ruby_hs_block_14::render( $block );
					}
					case 'newsmax_ruby_hs_block_15' : {
						return newsmax_ruby_hs_block_15::render( $block );
					}
					case 'newsmax_ruby_hs_block_16' : {
						return newsmax_ruby_hs_block_16::render( $block );
					}
					case 'newsmax_ruby_hs_block_oneh_1' : {
						return newsmax_ruby_hs_block_oneh_1::render( $block );
					}
					case 'newsmax_ruby_hs_block_oneh_2' : {
						return newsmax_ruby_hs_block_oneh_2::render( $block );
					}
					case 'newsmax_ruby_hs_block_oneh_3' : {
						return newsmax_ruby_hs_block_oneh_3::render( $block );
					}
					case 'newsmax_ruby_hs_block_oneh_4' : {
						return newsmax_ruby_hs_block_oneh_4::render( $block );
					}
					case 'newsmax_ruby_hs_block_grid_1' : {
						return newsmax_ruby_hs_block_grid_1::render( $block );
					}
					case 'newsmax_ruby_hs_block_grid_2' : {
						return newsmax_ruby_hs_block_grid_2::render( $block );
					}
					case 'newsmax_ruby_hs_block_grid_3' : {
						return newsmax_ruby_hs_block_grid_3::render( $block );
					}
					case 'newsmax_ruby_hs_block_grid_4' : {
						return newsmax_ruby_hs_block_grid_4::render( $block );
					}
					case 'newsmax_ruby_hs_block_grid_5' : {
						return newsmax_ruby_hs_block_grid_5::render( $block );
					}
					case 'newsmax_ruby_hs_block_grid_6' : {
						return newsmax_ruby_hs_block_grid_6::render( $block );
					}
					case 'newsmax_ruby_hs_block_list_1' : {
						return newsmax_ruby_hs_block_list_1::render( $block );
					}
					case 'newsmax_ruby_hs_block_list_2' : {
						return newsmax_ruby_hs_block_list_2::render( $block );
					}
					case 'newsmax_ruby_hs_block_list_3' : {
						return newsmax_ruby_hs_block_list_3::render( $block );
					}
					case 'newsmax_ruby_hs_block_classic_1' : {
						return newsmax_ruby_hs_block_classic_1::render( $block );
					}
					case 'newsmax_ruby_hs_block_classic_2' : {
						return newsmax_ruby_hs_block_classic_2::render( $block );
					}
					case 'newsmax_ruby_hs_block_mix_1' : {
						return newsmax_ruby_hs_block_mix_1::render( $block );
					}
					case 'newsmax_ruby_hs_block_mix_2' : {
						return newsmax_ruby_hs_block_mix_2::render( $block );
					}
					case 'newsmax_ruby_hs_block_mix_3' : {
						return newsmax_ruby_hs_block_mix_3::render( $block );
					}
					case 'newsmax_ruby_hs_block_mix_4' : {
						return newsmax_ruby_hs_block_mix_4::render( $block );
					}
					case 'newsmax_ruby_hs_block_mix_5' : {
						return newsmax_ruby_hs_block_mix_5::render( $block );
					}
					case 'newsmax_ruby_hs_block_mix_6' : {
						return newsmax_ruby_hs_block_mix_6::render( $block );
					}
					case 'newsmax_ruby_hs_block_mix_7' : {
						return newsmax_ruby_hs_block_mix_7::render( $block );
					}
					case 'newsmax_ruby_hs_block_mix_8' : {
						return newsmax_ruby_hs_block_mix_8::render( $block );
					}
					case 'newsmax_ruby_hs_block_gallery_1' : {
						return newsmax_ruby_hs_block_gallery_1::render( $block );
					}
					case 'newsmax_ruby_hs_block_gallery_2' : {
						return newsmax_ruby_hs_block_gallery_2::render( $block );
					}
					case 'newsmax_ruby_hs_block_video_1' : {
						return newsmax_ruby_hs_block_video_1::render( $block );
					}
					case 'newsmax_ruby_hs_block_video_2' : {
						return newsmax_ruby_hs_block_video_2::render( $block );
					}
					case 'newsmax_ruby_hs_block_html' : {
						return newsmax_ruby_hs_block_html::render( $block );
					}
					case 'newsmax_ruby_hs_block_advertising' : {
						return newsmax_ruby_hs_block_advertising::render( $block );
					}
					case 'newsmax_ruby_hs_block_shortcode' : {
						return newsmax_ruby_hs_block_shortcode::render( $block );
					}
					case 'newsmax_ruby_hs_block_subscribe' : {
						return newsmax_ruby_hs_block_subscribe::render( $block );
					}
					case 'newsmax_ruby_hs_block_raw_html' : {
						return newsmax_ruby_hs_block_raw_html::render( $block );
					}
					default :
						return false;
				}
			}
		}
	}
}

