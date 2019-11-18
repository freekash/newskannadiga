<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param $name
 *
 * @return mixed
 * name to ID
 */
if ( ! function_exists( 'newsmax_ruby_name_to_id' ) ) {
	function newsmax_ruby_name_to_id( $name ) {
		$name = strtolower( strip_tags( $name ) );
		$id   = str_replace( array(
				' ',
				',',
				'.',
				'"',
				"'",
				'/',
				"\\",
				'+',
				'=',
				')',
				'(',
				'*',
				'&',
				'^',
				'%',
				'$',
				'#',
				'@',
				'!',
				'~',
				'`',
				'<',
				'>',
				'?',
				'[',
				']',
				'{',
				'}',
				'|',
				':',
			), '', $name );

		return $id;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $number
 *
 * @return int|string
 * show over 100k
 */
if ( ! function_exists( 'newsmax_ruby_show_over_100k' ) ) {
	function newsmax_ruby_show_over_100k( $number ) {
		$number = intval( $number );

		if ( $number > 1000000 ) {
			$number = round( $number / 1000000, 2 ) . newsmax_ruby_translation::get_text( 'm', true );
		} elseif ( $number > 10000 ) {
			$number = round( $number / 1000, 1 ) . newsmax_ruby_translation::get_text( 'k', true );
		} elseif ( $number > 1000 ) {
			$number = round( $number / 1000, 2 ) . newsmax_ruby_translation::get_text( 'k', true );
		}

		return $number;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * opengraph meta
 */
if ( ! function_exists( 'newsmax_ruby_opengraph_meta' ) ) {

	function newsmax_ruby_opengraph_meta() {
		global $post;

		$open_graph      = newsmax_ruby_get_option( 'open_graph' );
		$facebook_app_id = newsmax_ruby_get_option( 'facebook_app_id' );

		if ( ! is_singular() || empty( $open_graph ) ) {
			return false;
		}

		if ( class_exists( 'WPSEO_Frontend' ) ) {
			$yoast_social = get_option( 'wpseo_social' );
			if ( ! empty( $yoast_social['opengraph'] ) ) {
				return false;
			}
		}

		if ( ! empty( $post->post_excerpt ) ) {
			$post_excerpt = $post->post_excerpt;
		} else {
			$post_content = preg_replace( '`\[[^\]]*\]`', '', $post->post_content );
			$post_content = stripslashes( wp_filter_nohtml_kses( $post_content ) );
			$post_excerpt = wp_trim_words( esc_html( $post_content ), 30, '' );
		}

		echo '<meta property="og:title" content="' . get_the_title() . '"/>';
		echo '<meta property="og:type" content="article"/>';
		echo '<meta property="og:url" content="' . get_permalink() . '"/>';
		echo '<meta property="og:site_name" content="' . get_bloginfo( 'name' ) . '"/>';
		echo '<meta property="og:description" content="' . esc_html( $post_excerpt ) . '"/>';
		if ( has_post_thumbnail( $post->ID ) ) {
			$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
			echo '<meta property="og:image" content="' . esc_url( $thumbnail_src[0] ) . '"/>';
		} else {
			$logo = newsmax_ruby_get_option( 'header_logo' );
			if ( ! empty( $logo['url'] ) ) {
				echo '<meta property="og:image" content="' . esc_url( $logo['url'] ) . '"/>';
			}
		}

		if ( ! empty( $facebook_app_id ) ) {
			echo '<meta property="fb:app_id" content="' . esc_html( $facebook_app_id ) . '" />';
		}

		return false;
	}

	add_action( 'wp_head', 'newsmax_ruby_opengraph_meta', 10 );
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single post schema makeup
 */
if ( ! function_exists( 'newsmax_ruby_post_schema_markup' ) ) {
	function newsmax_ruby_post_schema_markup() {

		$microdata_markup = newsmax_ruby_get_option( 'microdata_markup' );
		if ( empty( $microdata_markup ) ) {
			return false;
		}

		$post_id = get_the_ID();

		$http = 'http';
		if ( is_ssl() ) {
			$http = 'https';
		}

		$publisher = get_the_author_meta( 'display_name' );
		if ( empty( $publisher ) ) {
			$publisher = get_bloginfo( 'name' );
		}

		//publisher logo
		$logo = newsmax_ruby_get_option( 'header_logo' );
		if ( ! empty( $logo['url'] ) ) {
			$publisher_logo = esc_url( $logo['url'] );
		}

		$post_title  = get_the_title();
		$post_date   = get_the_time( 'U' );
		$post_update = get_the_modified_time( 'U' );

		$full_image_attachment = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' );

		$str = '';
		$str .= '<meta itemscope itemprop="mainEntityOfPage" itemType="' . $http . '://schema.org/WebPage" itemid="' . get_permalink() . '"/>';

		$str .= '<meta itemprop="headline " content="' . esc_attr( $post_title ) . '">';
		$str .= '<span style="display: none;" itemprop="author" itemscope itemtype="' . $http . '://schema.org/Person">';
		$str .= '<meta itemprop="name" content="' . esc_attr( get_the_author_meta( 'display_name' ) ) . '">';
		$str .= '</span>';
		$str .= '<span style="display: none;" itemprop="image" itemscope itemtype="' . $http . '://schema.org/ImageObject">';
		$str .= '<meta itemprop="url" content="' . $full_image_attachment[0] . '">';
		$str .= '<meta itemprop="width" content="' . $full_image_attachment[1] . '">';
		$str .= '<meta itemprop="height" content="' . $full_image_attachment[2] . '">';
		$str .= '</span>';
		$str .= '<span style="display: none;" itemprop="publisher" itemscope itemtype="' . $http . '://schema.org/Organization">';
		$str .= '<span style="display: none;" itemprop="logo" itemscope itemtype="' . $http . '://schema.org/ImageObject">';
		if ( ! empty( $publisher_logo ) ) {
			$str .= '<meta itemprop="url" content="' . $publisher_logo . '">';
		}
		$str .= '</span>';
		$str .= '<meta itemprop="name" content="' . $publisher . '">';
		$str .= '</span>';

		$str .= '<meta itemprop="datePublished" content="' . date( DATE_W3C, $post_date ) . '"/>';
		$str .= '<meta itemprop="dateModified" content="' . date( DATE_W3C, $post_update ) . '"/>';

		$enable_review = get_post_meta( $post_id, 'newsmax_ruby_meta_review_enable', true );
		$total_score   = get_post_meta( $post_id, 'newsmax_ruby_as', true );

		if ( ! empty( $enable_review ) && ! empty( $total_score ) ) {

			$review_summary = get_post_meta( $post_id, 'newsmax_ruby_review_summary', true );

			$str .= '<span itemprop="itemReviewed" itemscope itemtype="' . $http . '://schema.org/Thing">';
			$str .= '<meta itemprop="name " content = "' . esc_attr( $post_title ) . '">';
			$str .= '</span>';
			$str .= '<meta itemprop="reviewBody" content = "' . esc_attr( $review_summary ) . '">';
			$str .= '<span style="display: none;" itemprop="reviewRating" itemscope itemtype="' . $http . '://schema.org/Rating">';
			$str .= '<meta itemprop="worstRating" content = "1">';
			$str .= '<meta itemprop="bestRating" content = "10">';
			$str .= '<meta itemprop="ratingValue" content = "' . esc_html( $total_score ) . '">';
			$str .= '</span>';

		}

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $image
 * @param $attachment_id
 * @param $size
 * @param $icon
 *
 * @return array|false
 * support gif
 */
if ( ! function_exists( 'newsmax_ruby_support_gif' ) ) {
	function newsmax_ruby_support_gif( $image, $attachment_id, $size, $icon ) {

		$gif_support = newsmax_ruby_get_option( 'gif_support' );
		if ( ! empty( $gif_support ) ) {
			$format = wp_check_filetype( $image[0] );

			if ( ! empty( $format ) && 'gif' == $format['ext'] && 'full' != $size ) {
				return wp_get_attachment_image_src( $attachment_id, $size = 'full', $icon );
			}
		}

		return $image;
	}

	add_filter( 'wp_get_attachment_image_src', 'newsmax_ruby_support_gif', 10, 4 );
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return bool
 * remove page search
 */
if ( ! function_exists( 'newsmax_ruby_filter_search' ) ) {
	function newsmax_ruby_filter_search() {

		if ( is_admin() ) {
			return false;
		}

		global $wp_post_types;
		$wp_post_types['page']->exclude_from_search = true;

		return false;
	}

	add_action( 'init', 'newsmax_ruby_filter_search' );
};

/**-------------------------------------------------------------------------------------------------------------------------
 * add favicon & BookmarkLet to header
 */
if ( ! function_exists( 'newsmax_ruby_bookmarklet_icon' ) ) {
	function newsmax_ruby_bookmarklet_icon() {
		//get theme options
		$apple_icon = newsmax_ruby_get_option( 'icon_touch_apple' );
		$metro_icon = newsmax_ruby_get_option( 'icon_touch_metro' );

		//iso bookmark
		if ( ! empty( $apple_icon['url'] ) ) {
			echo '<link rel="apple-touch-icon" href="' . esc_url( $apple_icon['url'] ) . '" />';
		}
		//metro bookmark
		if ( ! empty( $metro_icon['url'] ) ) {
			echo '<meta name="msapplication-TileColor" content="#ffffff">';
			echo '<meta name="msapplication-TileImage" content="' . esc_url( $metro_icon['url'] ) . '" />';
		}
	}

	add_action( 'wp_head', 'newsmax_ruby_bookmarklet_icon', 3 );
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param $redirect_url
 *
 * @return bool
 * permalinks
 */
if ( ! function_exists( 'newsmax_ruby_pagination_redirect' ) ) {
	function newsmax_ruby_pagination_redirect( $redirect_url ) {
		global $wp_query;

		if ( is_page() && ! is_feed() && isset( $wp_query->queried_object ) && get_query_var( 'page' ) && 'page-composer.php' == get_page_template_slug( $wp_query->queried_object->ID ) ) {
			return false;
		}

		return $redirect_url;
	}

	add_filter( 'redirect_canonical', 'newsmax_ruby_pagination_redirect', 10 );
}