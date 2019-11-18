<?php
/**
 * get custom query
 */
if ( ! class_exists( 'newsmax_ruby_query' ) ) {
	class newsmax_ruby_query {

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param array $options
		 * @param string $paged
		 *
		 * @return WP_Query
		 * get custom query
		 */
		static function get_data( $options = array(), $paged = '' ) {
			extract( shortcode_atts(
					array(
						'category_ids'   => '',
						'category_id'    => '',
						'author_id'      => '',
						'post_format'    => '',
						'tags'           => '',
						'tag_in'         => '',
						'posts_per_page' => '',
						'no_found_rows'  => '',
						'offset'         => '',
						'orderby'        => '',
						'post_types'     => '',
						'meta_key'       => '',
						'post_not_in'    => '',
					), $options
				)
			);

			//default query config
			$param                        = array();
			$param['ignore_sticky_posts'] = 1;
			$param['post_status']         = 'publish';
			$param['post_type']           = 'post';
			$param['no_found_rows']       = false;

			//no found rows query
			if ( ! empty( $no_found_rows ) ) {
				$param['no_found_rows'] = true;
			}

			if ( ! empty( $post_not_in ) ) {
				$param['post__not_in'] = explode( ',', $post_not_in );
			}

			//post per page
			if ( empty( $posts_per_page ) ) {
				$param['posts_per_page'] = 5;
			} else {
				$param['posts_per_page'] = $posts_per_page;
			};


			//categories query
			if ( ! empty( $category_ids ) ) {

				//check categories
				if ( is_array( $category_ids ) ) {
					$category_ids = implode( ',', $category_ids );
				}

				if ( ! empty( $category_ids ) ) {
					$param['cat'] = esc_attr( $category_ids );
				} else {
					if ( ! empty( $category_id ) ) {
						$param['cat'] = $category_id;
					}
				}
			} else {
				if ( ! empty( $category_id ) ) {
					$param['cat'] = $category_id;
				}
			}

			//post format
			if ( ! empty( $post_format ) ) {
				if ( 'default' != $post_format ) {
					$param['tax_query'] = array(
						array(
							'taxonomy' => 'post_format',
							'field'    => 'slug',
							'terms'    => array( 'post-format-' . esc_attr( $post_format ) ),
						),
					);
				} else {
					$param['tax_query'] = array(
						array(
							'taxonomy' => 'post_format',
							'field'    => 'slug',
							'terms'    => array( 'post-format-gallery', 'post-format-video', 'post-format-audio' ),
							'operator' => 'NOT IN',
						),
					);
				}
			}

			//tags query
			if ( ! empty( $tags ) ) {
				$tags         = preg_replace( '/\s+/', '', $tags );
				$param['tag'] = esc_attr( $tags );
			}

			//tag in query
			if ( ! empty( $tag_in ) && is_array( $tag_in ) ) {
				$param['tag__in'] = $tag_in;
			}

			//author query
			if ( ! empty( $author_id ) ) {
				$param['author'] = $author_id;
			}

			//page query
			if ( ! empty( $paged ) ) {
				$param['paged'] = $paged;
			} else {
				$param['paged'] = 1;
			}

			//offset query
			if ( ! empty( $offset ) ) {
				if ( $paged > 1 ) {
					$param['offset'] = intval( $offset ) + intval( ( $paged - 1 ) * intval( $param['posts_per_page'] ) );
				} else {
					$param['offset'] = intval( $offset );
				}
			}

			//set default order by
			if ( empty( $orderby ) ) {
				$orderby = 'date_post';
			}

			//meta keys
			if ( ! empty( $meta_key ) ) {
				$param['meta_key'] = $meta_key;
			}

			//sort order
			switch ( $orderby ) {

				//date post
				case 'date_post' :
					$param['orderby'] = 'date';
					$param['order']   = 'DESC';
					break;

				//popular comment
				case 'comment_count' :
					$param['orderby'] = 'comment_count';
					break;

				//post type
				case 'post_type' :
					$param['orderby'] = 'type';
					break;

				//popular views
				case 'popular':
					$param['meta_key'] = 'newsmax_ruby_view_total_forgery';
					$param['orderby']  = 'meta_value_num';
					$param['order']    = 'DESC';
					break;

				case 'popular_week':
					$param['meta_key'] = 'newsmax_ruby_week_view_total_num';
					$param['orderby']  = 'meta_value_num';
					$param['order']    = 'DESC';
					break;

				case 'top_review' :
					$param['meta_key'] = 'newsmax_ruby_as';
					$param['orderby']  = 'meta_value_num';
					$param['order']    = 'DESC';
					break;

				case 'last_review' :
					$param['meta_key'] = 'newsmax_ruby_as';
					$param['orderby']  = 'date';
					$param['order']    = 'DESC';
					break;

				//random
				case 'rand':
					$param['orderby'] = 'rand';
					break;

				//alphabet decs
				case 'alphabetical_order_decs':
					$param['orderby'] = 'title';
					$param['order']   = 'DECS';
					break;

				//alphabet asc
				case 'alphabetical_order_asc':
					$param['orderby'] = 'title';
					$param['order']   = 'ASC';
					break;

				default :
					$param['orderby'] = 'date';
					break;
			}

			//get query
			$data_query = new WP_Query( $param );

			return $data_query;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param array $options
		 * @param int $paged
		 *
		 * @return bool|WP_Query
		 * query related post
		 */
		static function get_related( $options = array(), $paged = 1 ) {

			extract( shortcode_atts(
					array(
						'where'          => '',
						'category_ids'   => '',
						'tags'           => '',
						'posts_per_page' => '',
						'post_format'    => '',
						'post_not_in'    => '',
					), $options
				)
			);

			//check
			if ( empty( $where ) ) {
				return false;
			}

			//setup param
			$param                        = array();
			$param['ignore_sticky_posts'] = 1;
			$param['post_status']         = 'publish';
			$param['post_type']           = 'post';
			$param['orderby']             = 'date';

			if ( ! empty( $paged ) ) {
				$param['paged'] = $paged;
			}
			if ( ! empty( $posts_per_page ) ) {
				$param['posts_per_page'] = $posts_per_page;
			}
			if ( ! empty( $post_not_in ) ) {
				$param['post__not_in'] = explode( ',', $post_not_in );
			}

			switch ( $where ) {
				case 'all':
					if ( empty( $category_ids ) && empty( $tags ) ) {
						return false;
					}
					if ( ! empty( $category_ids ) && ! empty( $tags ) ) {

						$category_ids = explode( ',', $category_ids );
						$tags         = explode( ',', $tags );

						if ( empty( $post_format ) ) {
							$param['tax_query'] = array(
								'relation' => 'OR',
								array(
									'taxonomy' => 'category',
									'field'    => 'term_id',
									'terms'    => $category_ids,
								),
								array(
									'taxonomy' => 'post_tag',
									'field'    => 'slug',
									'terms'    => $tags,
								),
							);
						} else {
							$param['tax_query'] = array(
								'relation' => 'AND',
								array(
									'taxonomy' => 'post_format',
									'field'    => 'slug',
									'terms'    => array( 'post-format-' . esc_attr( $post_format ) ),
								),
								array(
									'relation' => 'OR',
									array(
										'taxonomy' => 'category',
										'field'    => 'term_id',
										'terms'    => $category_ids,
									),
									array(
										'taxonomy' => 'post_tag',
										'field'    => 'slug',
										'terms'    => $tags,
									),
								)
							);
						}

					} elseif ( empty( $category_ids ) && ! empty( $tags ) ) {
						$param['tag'] = $tags;

						if ( ! empty( $post_format ) ) {
							$param['tax_query'] = array(
								array(
									'taxonomy' => 'post_format',
									'field'    => 'slug',
									'terms'    => array( 'post-format-' . esc_attr( $post_format ) ),
								),
							);
						}
					} else {
						$param['cat'] = $category_ids;

						if ( ! empty( $post_format ) ) {
							$param['tax_query'] = array(
								array(
									'taxonomy' => 'post_format',
									'field'    => 'slug',
									'terms'    => array( 'post-format-' . esc_attr( $post_format ) ),
								),
							);
						}
					}

					break;
				case 'cat' :
					if ( empty( $category_ids ) ) {
						return false;
					}

					$param['cat'] = $category_ids;

					if ( ! empty( $post_format ) ) {
						$param['tax_query'] = array(
							array(
								'taxonomy' => 'post_format',
								'field'    => 'slug',
								'terms'    => array( 'post-format-' . esc_attr( $post_format ) ),
							),
						);
					}

					break;

				case 'tag' :
					if ( empty( $tags ) ) {
						return false;
					}
					$param['tag'] = $tags;

					if ( ! empty( $post_format ) ) {
						$param['tax_query'] = array(
							array(
								'taxonomy' => 'post_format',
								'field'    => 'slug',
								'terms'    => array( 'post-format-' . esc_attr( $post_format ) ),
							),
						);
					}

					break;
			}

			//get query
			$data_query = new WP_Query( $param );

			return $data_query;
		}
	}
}