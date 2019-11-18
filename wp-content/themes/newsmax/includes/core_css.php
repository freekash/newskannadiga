<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * dynamic CSS
 */
if ( ! function_exists( 'newsmax_ruby_dynamic_style' ) ) {
	function newsmax_ruby_dynamic_style() {

		//render
		$str   = '';
		$cache = get_option( 'newsmax_ruby_dynamic_style_cache', '' );

		if ( empty( $cache ) ) {

			/************************** GLOBAL COLOR ********************************/
			$global_color = newsmax_ruby_get_option( 'global_color' );
			if ( ! empty( $global_color ) && '#ff4545' != strtolower( $global_color ) ) {

				//color text

				$str .= 'input[type="button"]:hover, button:hover, .ruby-error p, .category-header-outer .archive-header,';
				$str .= '.main-menu-inner > li > a:hover, .main-menu-inner > li > a:focus, .mega-col-menu.sub-menu .mega-col-menu-inner a:hover,';
				$str .= '.mega-col-menu.sub-menu .mega-col-menu-inner .current-menu-item > a, .no-menu a, .small-menu-wrap .sub-menu li > a:hover, .main-menu-inner > li.current_page_item > a,';
				$str .= '.off-canvas-nav-wrap a:hover, .off-canvas-nav-wrap .sub-menu a:hover, .breaking-news-title .mobile-headline, .breadcrumb-inner a:hover, .breadcrumb-inner a:focus, .post-meta-info a:hover,';
				$str .= '.box-author-total-post, .title-nothing > *, .single .single-title.post-title, .share-total-number, .view-total-number, .sb-widget-instagram .instagram-bottom-text:hover,';
				$str .= '.box-author-title a, .box-author-desc a, .box-author-viewmore > a, .entry a:not(button),';
				$str .= '.entry blockquote:before, .comments-area .comment-reply-title, .comments-area .logged-in-as a:hover,';
				$str .= '.comment-title h3, .comment-author.vcard .fn a:hover, .comments-area .comment-awaiting-moderation,';
				$str .= '.widget li a:hover, .instagram-bottom-text a:hover, .twitter-content.post-excerpt a, .entry cite';
				$str .= '{ color: ' . esc_attr( $global_color ) . ';}';

				//color background
				$str .= 'input[type="submit"], button, .ruby-slider-popup-nav, li.is-current-sub,';
				$str .= '.main-menu-inner .sub-menu .current-menu-item > a, .sub-menu > li > a:hover,';
				$str .= '.small-menu-outer:hover .icon-toggle, .small-menu-outer:hover .icon-toggle:before,';
				$str .= '.small-menu-outer:hover .icon-toggle:after, .cat-info-el:before, .ajax-nextprev.ajax-pagination a:hover,';
				$str .= '.is-light-text .ajax-nextprev.ajax-pagination a:hover, .ruby-block-wrap .ajax-loadmore-link:hover, .popup-thumbnail-slider-outer .ruby-slider-nav:hover,';
				$str .= '.ruby-slider-nav:hover, a.page-numbers:hover, a.page-numbers:focus, .page-numbers.current, .is-logo-text h1:after,';
				$str .= '.is-logo-text .logo-title:after, .pagination-next-prev a:hover, .pagination-next-prev a:focus, .blog-loadmore-link:hover,';
				$str .= '.ajax-related-video a:hover, .single-post-box-related-video.is-light-text .block-title h3:before, .single-post-box-related .ajax-loadmore-link:hover,';
				$str .= 'input[type="button"].ninja-forms-field, .entry input[type="submit"], .single-page-links .pagination-num > span,';
				$str .= '.box-comment-btn-wrap:hover, .reply a.comment-reply-link:hover, .reply a.comment-reply-link:focus,';
				$str .= '.comments-area a.comment-edit-link:hover, .comments-area #cancel-comment-reply-link:hover, .widget-btn:hover, .header-style-5 .widget-btn';
				$str .= '.fw-widget-instagram .instagram-bottom-text:hover, .is-cat-style-2 .cat-info-el, .is-cat-style-3 .cat-info-el, .post-btn a:hover, .post-btn a:focus';
				$str .= '{ background-color: ' . esc_attr( $global_color ) . ';}';

				//color border
				$str .= '.single-post-6 .single-post-overlay-header';
				$str .= '{ border-color: ' . esc_attr( $global_color ) . ';}';

				//color background
				$str .= '.video-playlist-iframe-nav::-webkit-scrollbar-corner {background-color: ' . esc_attr( $global_color ) . ';}';
				$str .= '.video-playlist-iframe-nav::-webkit-scrollbar-thumb {background-color: ' . esc_attr( $global_color ) . ';}';
				$str .= '.widget_tag_cloud a:hover { background-color: ' . esc_attr( $global_color ) . '!important;}';
			}


			/************************** TOPBAR ********************************/
			$topbar_color_bg    = newsmax_ruby_get_option( 'topbar_color_bg' );
			$topbar_color       = newsmax_ruby_get_option( 'topbar_color' );
			$topbar_color_hover = newsmax_ruby_get_option( 'topbar_color_hover' );
			$topbar_height      = newsmax_ruby_get_option( 'topbar_height' );
			$topbar_border      = newsmax_ruby_get_option( 'topbar_border' );

			if ( ! empty( $topbar_color_bg ) && '#282828' != strtolower( $topbar_color_bg ) ) {
				$str .= '.topbar-wrap, .topbar-menu-inner .sub-menu';
				$str .= '{ background-color: ' . esc_attr( $topbar_color_bg ) . ';}';
			}

			if ( ! empty( $topbar_color ) && '#ffffff' != strtolower( $topbar_color ) ) {
				$str .= '.topbar-wrap';
				$str .= '{ color: ' . esc_attr( $topbar_color ) . ';}';
			}

			if ( ! empty( $topbar_color_hover ) ) {
				$str .= '.topbar-wrap a:hover';
				$str .= '{ opacity: 1; color: ' . esc_attr( $topbar_color_hover ) . ';}';
			}

			if ( ! empty( $topbar_height ) ) {
				$topbar_height = intval( $topbar_height );
				$str .= '.topbar-wrap';
				$str .= '{ line-height: ' . esc_attr( $topbar_height ) . 'px;}';
			}

			if ( ! empty( $topbar_border ) ) {
				$str .= '.topbar-wrap { border-top: 2px solid ' . esc_attr( $topbar_border ) . ';}';
			}

			//logo padding
			$logo_padding = newsmax_ruby_get_option( 'logo_padding' );
			if ( ! empty( $logo_padding ) ) {
				$str .= '.header-style-6 .banner-inner, .header-style-7 .banner-inner {';
				$str .= 'padding-top: ' . intval( $logo_padding ) . 'px;';
				$str .= 'padding-bottom: ' . intval( $logo_padding ) . 'px;';
				$str .= '}';
			}

			//site padding
			$site_padding = newsmax_ruby_get_option( 'site_padding' );
			if ( ! empty( $site_padding ) ) {
				$str .= '@media only screen and (min-width: 1200px) {';
				$str .= 'body {padding:' . intval( $site_padding ) . 'px 0;}';
				$str .= '}';
			}

			/************************** MAIN NAVIGATION ********************************/

			$navbar_color_bg    = newsmax_ruby_get_option( 'navbar_color_bg' );
			$navbar_color       = newsmax_ruby_get_option( 'navbar_color' );
			$navbar_color_hover = newsmax_ruby_get_option( 'navbar_color_hover' );

			//sub menu
			$navbar_color_bg_sub    = newsmax_ruby_get_option( 'navbar_color_bg_sub' );
			$navbar_color_sub       = newsmax_ruby_get_option( 'navbar_color_sub' );
			$navbar_color_hover_sub = newsmax_ruby_get_option( 'navbar_color_hover_sub' );

			//off-canvas color
			$offcanvas_color_bg    = newsmax_ruby_get_option( 'offcanvas_color_bg' );
			$offcanvas_color_hover = newsmax_ruby_get_option( 'offcanvas_color_hover' );

			if ( ! empty( $navbar_color_bg ) && '#ffffff' != strtolower( $navbar_color_bg ) ) {
				$str .= '.header-wrap .navbar-outer, .header-wrap .navbar-wrap, .small-menu-wrap';
				$str .= '{ background-color: ' . esc_attr( $navbar_color_bg ) . ';}';
			}

			if ( ! empty( $navbar_color ) && '#282828' != strtolower( $navbar_color ) ) {
				$str .= '.header-wrap .navbar-wrap, .small-menu-wrap';
				$str .= '{ color: ' . esc_attr( $navbar_color ) . ';}';

				$str .= '.small-menu-outer .icon-toggle, .small-menu-outer .icon-toggle:before, .small-menu-outer .icon-toggle:after,';
				$str .= '.icon-toggle:before, .icon-toggle:after, .icon-toggle';
				$str .= '{ background-color: ' . esc_attr( $navbar_color ) . ';}';

				//set border color
				$str .= '.header-style-4 .navbar-left > *, .header-style-4 .off-canvas-btn-wrap,';
				$str .= '.header-style-4 .navbar-elements > *';
				$str .= '{ border-color: rgba(255,255,255,.1);}';
			}

			if ( ! empty( $navbar_color_hover ) && '#ff4545' != strtolower( $navbar_color_hover ) ) {

				//color
				$str .= '.main-menu-inner > li > a:hover, .main-menu-inner > li > a:focus, .main-menu-inner > li.current_page_item > a,';
				$str .= '.mega-col-menu.sub-menu .mega-col-menu-inner a:hover,';
				$str .= '.small-menu-wrap .sub-menu li > a:hover';
				$str .= '{ color: ' . esc_attr( $navbar_color_hover ) . ';}';

				//background
				$str .= '.sub-menu > li > a:hover, li.is-current-sub, .small-menu-outer:hover .icon-toggle,';
				$str .= '.small-menu-outer:hover .icon-toggle:before, .small-menu-outer:hover .icon-toggle:after';
				$str .= '{ background-color: ' . esc_attr( $navbar_color_hover ) . ';}';
			}

			if ( ! empty( $navbar_color_bg_sub ) && '#ffffff' != strtolower( $navbar_color_bg_sub ) ) {
				$str .= '.main-menu-inner .sub-menu, .small-menu-wrap,';
				$str .= '.header-style-5 .main-menu-inner .sub-menu, .header-style-5 .small-menu-wrap';
				$str .= '{background-color: ' . esc_attr( $navbar_color_bg_sub ) . ';}';

				//set border color for sub
				$str .= '.mega-col-menu.mega-menu-wrap .sub-menu .sub-menu a,';
				$str .= '.mega-menu-wrap .block-footer, .small-menu-inner .sub-menu a';
				$str .= '{border-color: rgba(255,255,255,.1);}';
			}

			if ( ! empty( $navbar_color_sub ) ) {
				$str .= '.main-menu-inner .sub-menu, .small-menu-wrap';
				$str .= '{color :' . esc_attr( $navbar_color_sub ) . ';}';
			}

			if ( ! empty( $navbar_color_hover_sub ) ) {

				$str .= '.sub-menu > li > a:hover, li.is-current-sub';
				$str .= '{ background-color: rgba(255,255,255,.1); color :' . esc_attr( $navbar_color_hover_sub ) . ';}';

				$str .= '.small-menu-wrap .sub-menu li > a:hover,';
				$str .= '.mega-col-menu.sub-menu .mega-col-menu-inner a:hover,';
				$str .= '.small-menu-wrap .sub-menu li > a:hover';
				$str .= '{color :' . esc_attr( $navbar_color_hover_sub ) . ';}';
			}

			//off-canvas color
			if ( ! empty( $offcanvas_color_bg ) ) {
				$str .= '.off-canvas-wrap';
				$str .= '{background-color : ' . esc_attr( $offcanvas_color_bg ) . ';}';
			}

			if ( ! empty( $offcanvas_color_hover ) ) {
				$str .= '.off-canvas-nav-wrap a:hover, .off-canvas-nav-wrap .sub-menu a:hover';
				$str .= '{color :' . esc_attr( $offcanvas_color_hover ) . ';}';
			}

			$font_navbar     = newsmax_ruby_get_option( 'font_navbar' );
			$font_navbar_sub = newsmax_ruby_get_option( 'font_navbar_sub' );

			if ( ! empty( $font_navbar['font-family'] ) ) {
				$str .= '.small-menu-inner > li > a, .breadcrumb-wrap, .widget-btn { font-family: ' . $font_navbar['font-family'] . ';}';
			}

			if ( ! empty( $font_navbar['font-weight'] ) ) {
				$str .= '.small-menu-inner > li > a, .widget-btn { font-weight: ' . $font_navbar['font-weight'] . ';}';
			}

			if ( ! empty( $font_navbar['font-size'] ) ) {
				$str .= '.small-menu-inner {font-size:' . $font_navbar['font-size'] . '}';
			}

			if ( ! empty( $font_navbar_sub['font-family'] ) ) {
				$str .= '.small-menu-inner .sub-menu { font-family: ' . $font_navbar_sub['font-family'] . ';}';
			}

			if ( ! empty( $font_navbar_sub['font-size'] ) ) {
				$str .= '.small-menu-inner .sub-menu a { font-size: ' . $font_navbar_sub['font-size'] . ';}';
			}

			$newsmax_ruby_logo = newsmax_ruby_get_option( 'header_logo' );
			if ( ! empty( $newsmax_ruby_logo['height'] ) ) {
				$str .= '.logo-inner img {max-height: ' . esc_attr( $newsmax_ruby_logo['height'] ) . 'px;}';
			}

			/************************** Breadcrumbs ********************************/
			$site_breadcrumb_size = newsmax_ruby_get_option( 'site_breadcrumb_size' );
			if ( ! empty( $site_breadcrumb_size ) ) {
				$str .= '.breadcrumb-wrap { font-size: ' . intval( esc_attr( $site_breadcrumb_size ) ) . 'px;}';
			}

			/************************** FOOTER ********************************/
			$footer_copyright_color     = newsmax_ruby_get_option( 'footer_copyright_color' );
			$footer_copyright_bg        = newsmax_ruby_get_option( 'footer_copyright_bg' );
			$footer_copyright_font_size = newsmax_ruby_get_option( 'footer_copyright_font_size' );

			if ( ! empty( $footer_copyright_color ) ) {
				$str .= '.footer-copyright-wrap .copyright-text, .footer-copyright-wrap .footer-menu-inner { color:' . esc_html( $footer_copyright_color ) . ';}';
			}

			if ( ! empty( $footer_copyright_bg ) ) {
				$str .= '.footer-copyright-wrap { background-color: ' . esc_html( $footer_copyright_bg ) . ';}';
				if ( '#ffffff' == strtolower( $footer_copyright_bg ) || '#fff' == strtolower( $footer_copyright_bg ) ) {
					$str .= '.footer-copyright-wrap .social-icon-light a { background-color: #f2f2f2}';
				}
			}

			if ( ! empty( $footer_copyright_font_size ) && ( '13' != $footer_copyright_font_size ) ) {
				$str .= '.footer-copyright-wrap .copyright-text, .footer-copyright-wrap .footer-menu-inner';
				$str .= '{font-size:' . intval( $footer_copyright_font_size ) . 'px;}';
			}


			/************************** REVIEW COLOR ********************************/
			$review_color = newsmax_ruby_get_option( 'review_color' );
			if ( ! empty( $review_color ) && '#ffdf86' != strtolower( $review_color ) ) {
				$str .= '.post-review-icon, .post-review-score, .score-bar, .review-box-wrap .post-review-info { background-color: ' . esc_attr( $review_color ) . ';}';
				$str .= '.review-el .review-info-score { color: ' . esc_attr( $review_color ) . ';}';
			}

			/************************** DARK BLOG COLOR ********************************/
			$dark_classic_color = newsmax_ruby_get_option( 'dark_classic_color' );
			if ( ! empty( $dark_classic_color ) && '#282828' != strtolower( $dark_classic_color ) ) {
				$str .= '.post-list.is-dark-post, .post-classic-2.is-dark-post .post-body { background-color: ' . esc_attr( $dark_classic_color ) . ';}';
			}

			/************************** SOCIAL COLOR ********************************/
			$social_color = newsmax_ruby_get_option( 'social_color' );
			if ( ! empty( $social_color ) ) {
				$str .= '.is-social-color .post-meta-info-share i, .is-social-color .single-post-meta-info-share i,';
				$str .= '.is-social-color .single-post-share-big-inner a, .social-icon-wrap.social-icon-color-custom a,';
				$str .= '.social-counter-icon-color-custom .counter-element';
				$str .= '{ background-color: ' . esc_attr( $social_color ) . ';}';
			}

			$ajax_filter_size = newsmax_ruby_get_option( 'ajax_filter_size' );
			if ( ! empty( $ajax_filter_size ) ) {
				$str .= '.block-ajax-filter-wrap { font-size: ' . intval( $ajax_filter_size ) . 'px;}';
			}

			/************************** H TAG ********************************/
			$font_tag_h1 = newsmax_ruby_get_option( 'font_tag_h1' );
			$font_tag_h2 = newsmax_ruby_get_option( 'font_tag_h2' );
			$font_tag_h3 = newsmax_ruby_get_option( 'font_tag_h3' );
			$font_tag_h4 = newsmax_ruby_get_option( 'font_tag_h4' );
			$font_tag_h5 = newsmax_ruby_get_option( 'font_tag_h5' );
			$font_tag_h6 = newsmax_ruby_get_option( 'font_tag_h6' );

			if ( ! empty( $font_tag_h1['font-family'] ) ) {
				$str .= 'h1 {font-family:' . $font_tag_h1['font-family'] . ';}';
			}

			if ( ! empty( $font_tag_h1['font-weight'] ) ) {
				$str .= 'h1 {font-weight:' . $font_tag_h1['font-weight'] . ';}';
			}

			if ( ! empty( $font_tag_h2['font-family'] ) ) {
				$str .= 'h2 {font-family:' . $font_tag_h2['font-family'] . ';}';
			}
			if ( ! empty( $font_tag_h2['font-weight'] ) ) {
				$str .= 'h2 {font-weight:' . $font_tag_h2['font-weight'] . ';}';
			}

			if ( ! empty( $font_tag_h3['font-family'] ) ) {
				$str .= 'h3 {font-family:' . $font_tag_h3['font-family'] . ';}';
			}
			if ( ! empty( $font_tag_h3['font-weight'] ) ) {
				$str .= 'h3 {font-weight:' . $font_tag_h3['font-weight'] . ';}';
			}

			if ( ! empty( $font_tag_h4['font-family'] ) ) {
				$str .= 'h4 {font-family:' . $font_tag_h4['font-family'] . ';}';
			}
			if ( ! empty( $font_tag_h4['font-weight'] ) ) {
				$str .= 'h4 {font-weight:' . $font_tag_h4['font-weight'] . ';}';
			}

			if ( ! empty( $font_tag_h5['font-family'] ) ) {
				$str .= 'h5 {font-family:' . $font_tag_h5['font-family'] . ';}';
			}
			if ( ! empty( $font_tag_h5['font-weight'] ) ) {
				$str .= 'h5 {font-weight:' . $font_tag_h5['font-weight'] . ';}';
			}

			if ( ! empty( $font_tag_h6['font-family'] ) ) {
				$str .= 'h6 {font-family:' . $font_tag_h6['font-family'] . ';}';
			}
			if ( ! empty( $font_tag_h6['font-weight'] ) ) {
				$str .= 'h6 {font-weight:' . $font_tag_h6['font-weight'] . ';}';
			}


			/************************** NOTEBOOK POST TITLE FONT ********************************/
			$str .= '@media only screen and (min-width: 992px) and (max-width: 1199px) {';

			//is-size-0
			$font_post_title_0_notebook = newsmax_ruby_get_option( 'font_post_title_0_notebook' );
			$str .= 'body .post-title.is-size-0 {';
			if ( ! empty( $font_post_title_0_notebook['font-size'] ) ) {
				$str .= 'font-size: ' . esc_attr( $font_post_title_0_notebook['font-size'] ) . ';';
			}
			if ( ! empty( $font_post_title_0_notebook['line-height'] ) ) {
				$str .= 'line-height: ' . esc_attr( $font_post_title_0_notebook['line-height'] ) . ';';
			}
			if ( ! empty( $font_post_title_0_notebook['letter-spacing'] ) ) {
				$str .= 'letter-spacing: ' . esc_attr( $font_post_title_0_notebook['letter-spacing'] ) . ';';
			}
			$str .= '}';

			//is-size-1
			$font_post_title_1_notebook = newsmax_ruby_get_option( 'font_post_title_1_notebook' );
			$str .= 'body .post-title.is-size-1 {';
			if ( ! empty( $font_post_title_1_notebook['font-size'] ) ) {
				$str .= 'font-size: ' . esc_attr( $font_post_title_1_notebook['font-size'] ) . ';';
			}
			if ( ! empty( $font_post_title_1_notebook['line-height'] ) ) {
				$str .= 'line-height: ' . esc_attr( $font_post_title_1_notebook['line-height'] ) . ';';
			}
			if ( ! empty( $font_post_title_1_notebook['letter-spacing'] ) ) {
				$str .= 'letter-spacing: ' . esc_attr( $font_post_title_1_notebook['letter-spacing'] ) . ';';
			}
			$str .= '}';

			//is-size-2
			$font_post_title_2_notebook = newsmax_ruby_get_option( 'font_post_title_2_notebook' );
			$str .= 'body .post-title.is-size-2 {';
			if ( ! empty( $font_post_title_2_notebook['font-size'] ) ) {
				$str .= 'font-size: ' . esc_attr( $font_post_title_2_notebook['font-size'] ) . ';';
			}
			if ( ! empty( $font_post_title_2_notebook['line-height'] ) ) {
				$str .= 'line-height: ' . esc_attr( $font_post_title_2_notebook['line-height'] ) . ';';
			}
			if ( ! empty( $font_post_title_2_notebook['letter-spacing'] ) ) {
				$str .= 'letter-spacing: ' . esc_attr( $font_post_title_2_notebook['letter-spacing'] ) . ';';
			}
			$str .= '}';

			//is-size-3
			$font_post_title_3_notebook = newsmax_ruby_get_option( 'font_post_title_3_notebook' );
			$str .= 'body .post-title.is-size-3 {';
			if ( ! empty( $font_post_title_3_notebook['font-size'] ) ) {
				$str .= 'font-size: ' . esc_attr( $font_post_title_3_notebook['font-size'] ) . ';';
			}
			if ( ! empty( $font_post_title_3_notebook['line-height'] ) ) {
				$str .= 'line-height: ' . esc_attr( $font_post_title_3_notebook['line-height'] ) . ';';
			}
			if ( ! empty( $font_post_title_3_notebook['letter-spacing'] ) ) {
				$str .= 'letter-spacing: ' . esc_attr( $font_post_title_3_notebook['letter-spacing'] ) . ';';
			}
			$str .= '}';

			//is-size-4
			$font_post_title_4_notebook = newsmax_ruby_get_option( 'font_post_title_4_notebook' );
			$str .= 'body .post-title.is-size-4 {';
			if ( ! empty( $font_post_title_4_notebook['font-size'] ) ) {
				$str .= 'font-size: ' . esc_attr( $font_post_title_4_notebook['font-size'] ) . ';';
			}
			if ( ! empty( $font_post_title_4_notebook['line-height'] ) ) {
				$str .= 'line-height: ' . esc_attr( $font_post_title_4_notebook['line-height'] ) . ';';
			}
			if ( ! empty( $font_post_title_4_notebook['letter-spacing'] ) ) {
				$str .= 'letter-spacing: ' . esc_attr( $font_post_title_4_notebook['letter-spacing'] ) . ';';
			}
			$str .= '}';

			$str .= '}';


			/************************** TABLET POST TITLE FONT ********************************/
			$str .= '@media only screen and (max-width: 991px) {';

			//is-size-0
			$font_post_title_0_tablet = newsmax_ruby_get_option( 'font_post_title_0_tablet' );
			$str .= 'body .post-title.is-size-0 {';
			if ( ! empty( $font_post_title_0_tablet['font-size'] ) ) {
				$str .= 'font-size: ' . esc_attr( $font_post_title_0_tablet['font-size'] ) . ';';
			}
			if ( ! empty( $font_post_title_0_tablet['line-height'] ) ) {
				$str .= 'line-height: ' . esc_attr( $font_post_title_0_tablet['line-height'] ) . ';';
			}
			if ( ! empty( $font_post_title_0_tablet['letter-spacing'] ) ) {
				$str .= 'letter-spacing: ' . esc_attr( $font_post_title_0_tablet['letter-spacing'] ) . ';';
			}
			$str .= '}';

			//is-size-1
			$font_post_title_1_tablet = newsmax_ruby_get_option( 'font_post_title_1_tablet' );
			$str .= 'body .post-title.is-size-1 {';
			if ( ! empty( $font_post_title_1_tablet['font-size'] ) ) {
				$str .= 'font-size: ' . esc_attr( $font_post_title_1_tablet['font-size'] ) . ';';
			}
			if ( ! empty( $font_post_title_1_tablet['line-height'] ) ) {
				$str .= 'line-height: ' . esc_attr( $font_post_title_1_tablet['line-height'] ) . ';';
			}
			if ( ! empty( $font_post_title_1_tablet['letter-spacing'] ) ) {
				$str .= 'letter-spacing: ' . esc_attr( $font_post_title_1_tablet['letter-spacing'] ) . ';';
			}
			$str .= '}';

			//is-size-2
			$font_post_title_2_tablet = newsmax_ruby_get_option( 'font_post_title_2_tablet' );
			$str .= 'body .post-title.is-size-2 {';
			if ( ! empty( $font_post_title_2_tablet['font-size'] ) ) {
				$str .= 'font-size: ' . esc_attr( $font_post_title_2_tablet['font-size'] ) . ';';
			}
			if ( ! empty( $font_post_title_2_tablet['line-height'] ) ) {
				$str .= 'line-height: ' . esc_attr( $font_post_title_2_tablet['line-height'] ) . ';';
			}
			if ( ! empty( $font_post_title_2_tablet['letter-spacing'] ) ) {
				$str .= 'letter-spacing: ' . esc_attr( $font_post_title_2_tablet['letter-spacing'] ) . ';';
			}
			$str .= '}';

			//is-size-3
			$font_post_title_3_tablet = newsmax_ruby_get_option( 'font_post_title_3_tablet' );
			$str .= 'body .post-title.is-size-3 {';
			if ( ! empty( $font_post_title_3_tablet['font-size'] ) ) {
				$str .= 'font-size: ' . esc_attr( $font_post_title_3_tablet['font-size'] ) . ';';
			}
			if ( ! empty( $font_post_title_3_tablet['line-height'] ) ) {
				$str .= 'line-height: ' . esc_attr( $font_post_title_3_tablet['line-height'] ) . ';';
			}
			if ( ! empty( $font_post_title_3_tablet['letter-spacing'] ) ) {
				$str .= 'letter-spacing: ' . esc_attr( $font_post_title_3_tablet['letter-spacing'] ) . ';';
			}
			$str .= '}';

			//is-size-4
			$font_post_title_4_tablet = newsmax_ruby_get_option( 'font_post_title_4_tablet' );
			$str .= 'body .post-title.is-size-4 {';
			if ( ! empty( $font_post_title_4_tablet['font-size'] ) ) {
				$str .= 'font-size: ' . esc_attr( $font_post_title_4_tablet['font-size'] ) . ';';
			}
			if ( ! empty( $font_post_title_4_tablet['line-height'] ) ) {
				$str .= 'line-height: ' . esc_attr( $font_post_title_4_tablet['line-height'] ) . ';';
			}
			if ( ! empty( $font_post_title_4_tablet['letter-spacing'] ) ) {
				$str .= 'letter-spacing: ' . esc_attr( $font_post_title_4_tablet['letter-spacing'] ) . ';';
			}
			$str .= '}';

			$str .= '}';


			/************************** MOBILE POST TITLE FONT ********************************/
			$str .= '@media only screen and (max-width: 767px) {';

			//is-size-0
			$font_post_title_0_mobile = newsmax_ruby_get_option( 'font_post_title_0_mobile' );
			$str .= 'body .post-title.is-size-0 {';
			if ( ! empty( $font_post_title_0_mobile['font-size'] ) ) {
				$str .= 'font-size: ' . esc_attr( $font_post_title_0_mobile['font-size'] ) . ';';
			}
			if ( ! empty( $font_post_title_0_mobile['line-height'] ) ) {
				$str .= 'line-height: ' . esc_attr( $font_post_title_0_mobile['line-height'] ) . ';';
			}
			if ( ! empty( $font_post_title_0_mobile['letter-spacing'] ) ) {
				$str .= 'letter-spacing: ' . esc_attr( $font_post_title_0_mobile['letter-spacing'] ) . ';';
			}
			$str .= '}';

			//is-size-1
			$font_post_title_1_mobile = newsmax_ruby_get_option( 'font_post_title_1_mobile' );
			$str .= 'body .post-title.is-size-1 {';
			if ( ! empty( $font_post_title_1_mobile['font-size'] ) ) {
				$str .= 'font-size: ' . esc_attr( $font_post_title_1_mobile['font-size'] ) . ';';
			}
			if ( ! empty( $font_post_title_1_mobile['line-height'] ) ) {
				$str .= 'line-height: ' . esc_attr( $font_post_title_1_mobile['line-height'] ) . ';';
			}
			if ( ! empty( $font_post_title_1_mobile['letter-spacing'] ) ) {
				$str .= 'letter-spacing: ' . esc_attr( $font_post_title_1_mobile['letter-spacing'] ) . ';';
			}
			$str .= '}';

			//is-size-2
			$font_post_title_2_mobile = newsmax_ruby_get_option( 'font_post_title_2_mobile' );
			$str .= 'body .post-title.is-size-2 {';
			if ( ! empty( $font_post_title_2_mobile['font-size'] ) ) {
				$str .= 'font-size: ' . esc_attr( $font_post_title_2_mobile['font-size'] ) . ';';
			}
			if ( ! empty( $font_post_title_2_mobile['line-height'] ) ) {
				$str .= 'line-height: ' . esc_attr( $font_post_title_2_mobile['line-height'] ) . ';';
			}
			if ( ! empty( $font_post_title_2_mobile['letter-spacing'] ) ) {
				$str .= 'letter-spacing: ' . esc_attr( $font_post_title_2_mobile['letter-spacing'] ) . ';';
			}
			$str .= '}';

			//is-size-3
			$font_post_title_3_mobile = newsmax_ruby_get_option( 'font_post_title_3_mobile' );
			$str .= 'body .post-title.is-size-3 {';
			if ( ! empty( $font_post_title_3_mobile['font-size'] ) ) {
				$str .= 'font-size: ' . esc_attr( $font_post_title_3_mobile['font-size'] ) . ';';
			}
			if ( ! empty( $font_post_title_3_mobile['line-height'] ) ) {
				$str .= 'line-height: ' . esc_attr( $font_post_title_3_mobile['line-height'] ) . ';';
			}
			if ( ! empty( $font_post_title_3_mobile['letter-spacing'] ) ) {
				$str .= 'letter-spacing: ' . esc_attr( $font_post_title_3_mobile['letter-spacing'] ) . ';';
			}
			$str .= '}';

			//is-size-4
			$font_post_title_4_mobile = newsmax_ruby_get_option( 'font_post_title_4_mobile' );
			$str .= 'body .post-title.is-size-4, .post-list-2 .post-title a, .post-list-3 .post-title a {';
			if ( ! empty( $font_post_title_4_mobile['font-size'] ) ) {
				$str .= 'font-size: ' . esc_attr( $font_post_title_4_mobile['font-size'] ) . ';';
			}
			if ( ! empty( $font_post_title_4_mobile['line-height'] ) ) {
				$str .= 'line-height: ' . esc_attr( $font_post_title_4_mobile['line-height'] ) . ';';
			}
			if ( ! empty( $font_post_title_4_mobile['letter-spacing'] ) ) {
				$str .= 'letter-spacing: ' . esc_attr( $font_post_title_4_mobile['letter-spacing'] ) . ';';
			}
			$str .= '}';

			$str .= '}';

			/************************** BODY MOBILE FONT ********************************/
			$str .= '@media only screen and (max-width: 767px) {';

			$font_body_mobile = newsmax_ruby_get_option( 'font_body_mobile' );
			$str .= 'body, p {';
			if ( ! empty( $font_body_mobile['font-size'] ) ) {
				$str .= 'font-size: ' . esc_attr( $font_body_mobile['font-size'] ) . ' !important;';
			}
			if ( ! empty( $font_body_mobile['line-height'] ) ) {
				$str .= 'line-height: ' . esc_attr( $font_body_mobile['line-height'] ) . ' !important;';
			}
			if ( ! empty( $font_body_mobile['letter-spacing'] ) ) {
				$str .= 'letter-spacing: ' . esc_attr( $font_body_mobile['letter-spacing'] ) . ' !important;';
			}
			$str .= '}';

			$font_excerpt_mobile = newsmax_ruby_get_option( 'font_excerpt_mobile' );
			$str .= '.post-excerpt p {';
			if ( ! empty( $font_excerpt_mobile['font-size'] ) ) {
				$str .= 'font-size: ' . esc_attr( $font_excerpt_mobile['font-size'] ) . ' !important;';
			}
			if ( ! empty( $font_excerpt_mobile['line-height'] ) ) {
				$str .= 'line-height: ' . esc_attr( $font_excerpt_mobile['line-height'] ) . ' !important;';
			}
			if ( ! empty( $font_excerpt_mobile['letter-spacing'] ) ) {
				$str .= 'letter-spacing: ' . esc_attr( $font_excerpt_mobile['letter-spacing'] ) . ' !important;';
			}
			$str .= '}';

			/************************** H TAG ********************************/

			$font_tag_h1_mobile = newsmax_ruby_get_option( 'font_tag_h1_mobile' );
			$font_tag_h2_mobile = newsmax_ruby_get_option( 'font_tag_h2_mobile' );
			$font_tag_h3_mobile = newsmax_ruby_get_option( 'font_tag_h3_mobile' );
			$font_tag_h4_mobile = newsmax_ruby_get_option( 'font_tag_h4_mobile' );
			$font_tag_h5_mobile = newsmax_ruby_get_option( 'font_tag_h5_mobile' );
			$font_tag_h6_mobile = newsmax_ruby_get_option( 'font_tag_h6_mobile' );

			//tag h1
			$str .= '.entry h1 {';
			if ( ! empty( $font_tag_h1_mobile['font-size'] ) ) {
				$str .= 'font-size: ' . esc_attr( $font_tag_h1_mobile['font-size'] ) . ' !important;';
			}
			if ( ! empty( $font_tag_h1_mobile['line-height'] ) ) {
				$str .= 'line-height: ' . esc_attr( $font_tag_h1_mobile['line-height'] ) . ' !important;';
			}
			if ( ! empty( $font_tag_h1_mobile['letter-spacing'] ) ) {
				$str .= 'letter-spacing: ' . esc_attr( $font_tag_h1_mobile['letter-spacing'] ) . ' !important;';
			}
			$str .= '}';

			//tag h2
			$str .= '.entry h2 {';
			if ( ! empty( $font_tag_h2_mobile['font-size'] ) ) {
				$str .= 'font-size: ' . esc_attr( $font_tag_h2_mobile['font-size'] ) . ' !important;';
			}
			if ( ! empty( $font_tag_h2_mobile['line-height'] ) ) {
				$str .= 'line-height: ' . esc_attr( $font_tag_h2_mobile['line-height'] ) . ' !important;';
			}
			if ( ! empty( $font_tag_h2_mobile['letter-spacing'] ) ) {
				$str .= 'letter-spacing: ' . esc_attr( $font_tag_h2_mobile['letter-spacing'] ) . ' !important;';
			}
			$str .= '}';

			//tag h3
			$str .= '.entry h3 {';
			if ( ! empty( $font_tag_h3_mobile['font-size'] ) ) {
				$str .= 'font-size: ' . esc_attr( $font_tag_h3_mobile['font-size'] ) . ' !important;';
			}
			if ( ! empty( $font_tag_h3_mobile['line-height'] ) ) {
				$str .= 'line-height: ' . esc_attr( $font_tag_h3_mobile['line-height'] ) . ' !important;';
			}
			if ( ! empty( $font_tag_h3_mobile['letter-spacing'] ) ) {
				$str .= 'letter-spacing: ' . esc_attr( $font_tag_h3_mobile['letter-spacing'] ) . ' !important;';
			}
			$str .= '}';

			//tag h4
			$str .= '.entry h4 {';
			if ( ! empty( $font_tag_h4_mobile['font-size'] ) ) {
				$str .= 'font-size: ' . esc_attr( $font_tag_h4_mobile['font-size'] ) . ' !important;';
			}
			if ( ! empty( $font_tag_h4_mobile['line-height'] ) ) {
				$str .= 'line-height: ' . esc_attr( $font_tag_h4_mobile['line-height'] ) . ' !important;';
			}
			if ( ! empty( $font_tag_h4_mobile['letter-spacing'] ) ) {
				$str .= 'letter-spacing: ' . esc_attr( $font_tag_h4_mobile['letter-spacing'] ) . ' !important;';
			}
			$str .= '}';

			//tag h5
			$str .= '.entry h5 {';
			if ( ! empty( $font_tag_h5_mobile['font-size'] ) ) {
				$str .= 'font-size: ' . esc_attr( $font_tag_h5_mobile['font-size'] ) . ' !important;';
			}
			if ( ! empty( $font_tag_h5_mobile['line-height'] ) ) {
				$str .= 'line-height: ' . esc_attr( $font_tag_h5_mobile['line-height'] ) . ' !important;';
			}
			if ( ! empty( $font_tag_h5_mobile['letter-spacing'] ) ) {
				$str .= 'letter-spacing: ' . esc_attr( $font_tag_h5_mobile['letter-spacing'] ) . ' !important;';
			}
			$str .= '}';

			//tag h5
			$str .= '.entry h6 {';
			if ( ! empty( $font_tag_h6_mobile['font-size'] ) ) {
				$str .= 'font-size: ' . esc_attr( $font_tag_h6_mobile['font-size'] ) . ' !important;';
			}
			if ( ! empty( $font_tag_h6_mobile['line-height'] ) ) {
				$str .= 'line-height: ' . esc_attr( $font_tag_h6_mobile['line-height'] ) . ' !important;';
			}
			if ( ! empty( $font_tag_h6_mobile['letter-spacing'] ) ) {
				$str .= 'letter-spacing: ' . esc_attr( $font_tag_h6_mobile['letter-spacing'] ) . ' !important;';
			}
			$str .= '}';


			//end mobile
			$str .= '}';

			/************************** PADDING ********************************/
			$htag_padding_top    = newsmax_ruby_get_option( 'htag_padding_top' );
			$htag_padding_bottom = newsmax_ruby_get_option( 'htag_padding_bottom' );

			if ( ! empty( $htag_padding_top ) ) {
				$str .= '.entry h1, .entry h2, .entry h3, .entry h4, .entry h5, .entry h6';
				$str .= '{ padding-top:' . intval( $htag_padding_top ) . 'px;}';
			}

			if ( ! empty( $htag_padding_bottom ) ) {
				$str .= '.entry h1, .entry h2, .entry h3, .entry h4, .entry h5, .entry h6';
				$str .= '{ padding-bottom:' . intval( $htag_padding_bottom ) . 'px;}';
			}


			/************************** SINGLE TITLE COLOR ********************************/
			$single_title_color = newsmax_ruby_get_option( 'single_title_color' );
			if ( ! empty( $single_title_color ) ) {
				$str .= '.single .post-title.single-title {color :' . esc_attr( $single_title_color ) . '!important;}';
			}

			$hyperlink_color = newsmax_ruby_get_option( 'hyperlink_color' );
			if ( ! empty( $hyperlink_color ) ) {
				$str .= '.entry a:not(button), .widget_rss a:hover {color :' . esc_attr( $hyperlink_color ) . ';}';
			}


			/************************** CATEGORY COLOR ********************************/
			$taxonomy_cat_color = get_option( 'newsmax_ruby_category_option_color' ) ? get_option( 'newsmax_ruby_category_option_color' ) : array();
			foreach ( $taxonomy_cat_color as $cat_id => $val ) {
				if ( ! empty( $cat_id ) ) {
					if ( ! empty( $val['category_color'] ) && '#ff4545' != strtolower( $val['category_color'] ) ) {

						$str .= '.archive.category-' . esc_attr( $cat_id ) . ' .category-header-outer .archive-header,';
						$str .= '.is-cat-style-5 .post-cat-info.is-relative .cat-info-el.cat-info-id-' . esc_attr( $cat_id );
						$str .= '{ color: ' . esc_attr( $val['category_color'] ) . ';}';

						$str .= '.cat-info-el.cat-info-id-' . esc_attr( $cat_id ) . ':before,';
						$str .= '.is-cat-style-2 .cat-info-el.cat-info-id-' . esc_attr( $cat_id ) . ',';
						$str .= '.is-cat-style-3 .cat-info-el.cat-info-id-' . esc_attr( $cat_id );
						$str .= '{ background-color: ' . esc_attr( $val['category_color'] ) . ';}';

						$str .= '.is-cat-style-6 .cat-info-el.cat-info-id-' . esc_attr( $cat_id );
						$str .= '{ border-color: ' . esc_attr( $val['category_color'] ) . ';}';
					}
				}
			}

			$font_post_meta_info = newsmax_ruby_get_option( 'font_post_meta_info' );
			if ( ! empty( $font_post_meta_info['font-family'] ) ) {
				$str .= '.post-meta-info-duration { font-family:' . $font_post_meta_info['font-family'] . ';}';
			}

			$font_post_title_4_default = newsmax_ruby_get_option( 'font_post_title_4' );
			if ( ! empty( $font_post_title_4_default['font-family'] ) ) {
				$str .= '.widget_recent_entries li a, .recentcomments a { font-family:' . $font_post_title_4_default['font-family'] . ';}';
			}

			/*************************** WooCommerce *******************************/
			if ( class_exists( 'Woocommerce' ) ) {
				$wc_color_global = newsmax_ruby_get_option( 'wc_color_global' );
				$wc_color_price  = newsmax_ruby_get_option( 'wc_color_price' );

				if ( ! empty( $wc_color_global ) && '#ff4545' != strtolower( $wc_color_global ) ) {

					$str .= 'body.woocommerce #respond input#submit, body.woocommerce a.button,';
					$str .= 'div.woocommerce #respond input#submit, div.woocommerce a.button,';
					$str .= 'body.woocommerce button.button, body.woocommerce input.button,';
					$str .= 'div.woocommerce button.button, div.woocommerce input.button,';
					$str .= 'body.woocommerce div.product form.cart .button, body ul.product_list_widget li.mini_cart_item .remove:hover,';
					$str .= 'body.woocommerce .product .cart .single_add_to_cart_button, div.woocommerce ul.product_list_widget li.mini_cart_item .remove:hover,';
					$str .= 'body #ruby-mini-cart .wc-forward:first-child';
					$str .= '{ background-color: ' . esc_attr( $wc_color_global ) . ';}';

					//color
					$str .= 'body.woocommerce ul.products li.product .price del,';
					$str .= 'div.woocommerce ul.products li.product .price del,';
					$str .= 'body.woocommerce div.product p.price del, body ul.product_list_widget li del,';
					$str .= 'div.woocommerce div.product p.price del, div ul.product_list_widget li del';
					$str .= '{ color: ' . esc_attr( $wc_color_global ) . ';}';
				}

				if ( ! empty( $wc_color_price ) && ( '#68ce92' != strtolower( $wc_color_price ) ) ) {
					$str .= 'body.woocommerce span.onsale, div.woocommerce span.onsale';
					$str .= '{ background-color: ' . esc_attr( $wc_color_price ) . ';}';

					$str .= 'body.woocommerce ul.products li.product .price,';
					$str .= 'div.woocommerce ul.products li.product .price,';
					$str .= 'div.woocommerce div.product p.price, div.woocommerce ul.product_list_widget li ins,';
					$str .= 'body.woocommerce div.product p.price, body ul.product_list_widget li ins';
					$str .= '{ color: ' . esc_attr( $wc_color_price ) . ';}';
				}
			}

			/*************************** USER CUSTOM CSS *******************************/
			$custom_css = newsmax_ruby_get_option( 'custom_css' );

			if ( ! empty( $custom_css ) ) {
				$str .= $custom_css;
			}

			/************************** SAVE TO DATABASE ********************************/
			$cache = addslashes( $str );

			delete_option( 'newsmax_ruby_dynamic_style_cache' );
			add_option( 'newsmax_ruby_dynamic_style_cache', $cache );

		} else {
			$str = stripcslashes( $cache );
		}

		wp_add_inline_style( 'newsmax-ruby-style', $str );
	}

	//add custom css
	add_action( 'wp_enqueue_scripts', 'newsmax_ruby_dynamic_style' );
}

/**-------------------------------------------------------------------------------------------------------------------------
 * delete dynamic CSS
 */
if ( ! function_exists( 'newsmax_ruby_delete_dynamic_cache' ) ) {

	function newsmax_ruby_delete_dynamic_cache() {
		delete_option( 'newsmax_ruby_dynamic_style_cache' );

		return false;
	}

	add_action( 'redux/options/newsmax_ruby_theme_options/saved', 'newsmax_ruby_delete_dynamic_cache' );
	add_action( 'redux/options/newsmax_ruby_theme_options/reset', 'newsmax_ruby_delete_dynamic_cache' );
	add_action( 'redux/options/newsmax_ruby_theme_options/section/reset', 'newsmax_ruby_delete_dynamic_cache' );
	add_action( 'edit_category_form', 'newsmax_ruby_delete_dynamic_cache' );
	add_action( 'after_switch_theme', 'newsmax_ruby_delete_dynamic_cache' );
}

