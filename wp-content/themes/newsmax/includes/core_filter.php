<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $type
 * @param string $custom_data
 * @param string $text
 *
 * @return array
 * get data config to display dropdown
 */
if ( ! function_exists( 'newsmax_ruby_ajax_filter_dropdown_config' ) ) {
	function newsmax_ruby_ajax_filter_dropdown_config( $type = 'category', $custom_data = '', $text = '' ) {
		$data_filter = array();

		if ( empty( $text ) ) {
			$text = newsmax_ruby_translate( 'all' );
		}

		$data_filter[0] = array(
			'id'   => 0,
			'name' => esc_html( $text )
		);

		switch ( $type ) {

			//category
			case 'category' :

				$data_cat = get_categories( array(
					'include' => esc_attr( $custom_data ),
					'exclude' => '1',
					'number'  => 50,
				) );

				//check category input
				if ( ! empty( $custom_data ) ) {

					$custom_cat_ids = explode( ',', $custom_data );
					foreach ( $custom_cat_ids as $custom_cat_id_el ) {
						$custom_cat_id_el = trim( $custom_cat_id_el );
						foreach ( $data_cat as $data_cat_el ) {
							if ( $custom_cat_id_el == $data_cat_el->cat_ID ) {
								$data_filter[] = array(
									'id'   => $data_cat_el->cat_ID,
									'name' => $data_cat_el->name
								);
							}
						}
					}
				} else {
					foreach ( $data_cat as $data_cat_el ) {
						$data_filter[] = array(
							'id'   => $data_cat_el->cat_ID,
							'name' => $data_cat_el->name
						);
					}
				}
				break;

			//tag
			case 'tag' :

				$data_tag = get_tags( array(
					'include' => esc_attr( $custom_data ),
					'number'  => 30
				) );

				//check tag input
				if ( ! empty( $custom_data ) ) {
					$custom_tag_ids = explode( ',', $custom_data );
					foreach ( $custom_tag_ids as $custom_tag_id_el ) {
						$custom_tag_id_el = trim( $custom_tag_id_el );

						foreach ( $data_tag as $data_tag_el ) {
							if ( $custom_tag_id_el == $data_tag_el->name ) {
								$data_filter[] = array(
									'id'   => $data_tag_el->slug,
									'name' => $data_tag_el->name
								);
							}
						}
					}
				} else {
					foreach ( $data_tag as $data_tag_el ) {
						$data_filter[] = array(
							'id'   => $data_tag_el->slug,
							'name' => $data_tag_el->name
						);
					}
				}
				break;

			case 'author' :
				$data_author = get_users( array(
					'who'     => 'authors',
					'include' => esc_attr( $custom_data ),
				) );
				foreach ( $data_author as $data_author_el ) {
					$data_filter[] = array(
						'id'   => $data_author_el->ID,
						'name' => $data_author_el->display_name
					);
				};

				break;

			case 'popular':

				$data_filter[] = array(
					'id'   => 'featured',
					'name' => newsmax_ruby_translate( 'featured' )
				);

				$data_filter[] = array(
					'id'   => 'popular_week',
					'name' => newsmax_ruby_translate( 'popular_week' )
				);

				$data_filter[] = array(
					'id'   => 'popular',
					'name' => newsmax_ruby_translate( 'popular' )
				);

				break;
		};

		return $data_filter;
	}
}