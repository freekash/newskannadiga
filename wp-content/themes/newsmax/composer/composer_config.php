<?php
//composer config
if ( ! class_exists( 'newsmax_ruby_composer_config' ) ) {
	class newsmax_ruby_composer_config {

		protected static $instance = null;

		public function __construct() {
			add_action( 'edit_form_after_title', array( $this, 'page_composer_edit' ) );
			add_action( 'edit_form_after_title', array( $this, 'page_composer_template' ) );
		}

		static function get_instance() {
			if ( null == self::$instance ) {
				self::$instance = new self;
			}

			return self::$instance;
		}


		public function page_composer_edit() {

			if ( ! is_admin() ) {
				return false;
			}

			$page_id = get_the_ID();

			$str = '';
			if ( isset( $page_id ) && 'page-composer.php' == get_post_meta( $page_id, '_wp_page_template', true ) ) {
				$str .= '<style>#postdivrich{ display:none; }</style>';
			} else {
				$str .= '<style>#newsmax_ruby_composer_editor{ display:none; }</style>';
			}

			$str .= '<div id="newsmax_ruby_composer_editor" class="ruby-composer-editor">';
			$str .= '<div class="ruby-composer-title"><h3>' . esc_html__( 'ruby composer', 'newsmax' ) . '</h3></div>';
			$str .= '<div id="ruby-composer-loading"></div>';
			$str .= '<div class="ruby-toolbox"><a href="#" id="page_composer_section_select" class="add-section-select">' . esc_html__( 'select your section', 'newsmax' ) . '</a>';
			$str .= '<div id="newsmax_ruby_section_select" class="section-select-wrap"></div>';
			$str .= '</div>';
			$str .= '<div class="ruby-sections-wrap">';
			$str .= '<div class="ruby-section-empty">' . html_entity_decode( esc_html__( 'Click on <strong>"SECTION"</strong> images to create a new section.', 'newsmax' ) ) . '</div>';
			$str .= '</div><!--#sections wrap-->';
			$str .= '</div><!--#composer wrap-->';

			echo( $str );
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * create page composer field data
		 */
		public function page_composer_template() {
			$template = array();

			$str = '';
			$str .= '<div class="ruby-block-item">';
			$str .= '<input type="hidden" class="ruby-block-order">';
			$str .= '<input type="hidden" class="ruby-block-name">';
			$str .= '<div class="ruby-block-bar">';
			$str .= '<i class="ruby-block-move">#</i>';
			$str .= '<div class="ruby-block-label"></div>';
			$str .= '<div class="ruby-block-toolbox">';
			$str .= '<a class="ruby-block-open-option" href="#">+</a>';
			$str .= '<a class="ruby-block-delete" href="#">x</a>';
			$str .= '</div>';
			$str .= '</div>';
			$str .= '<div class="ruby-block-options-wrap hidden">';
			$str .= '<div class="ruby-block-description"></div>';
			$str .= '<div class="ruby-filter-link"></div>';
			$str .= '<div class="ruby-block-content"></div>';
			$str .= '</div>';
			$str .= '</div>';
			$template['block'] = $str;

			//block option
			$str = '';
			$str .= '<div class="ruby-block-option">';
			$str .= '<div class="ruby-block-option-label-wrap">';
			$str .= '<label class="ruby-block-option-label"></label>';
			$str .= '<div class="ruby-block-option-description"></div>';
			$str .= '</div>';
			$str .= '<div class="ruby-block-option-inner"></div>';
			$str .= '</div>';
			$template['block_option'] = $str;


			$template['input']['text']           = '<input class="ruby-field ruby-text" type="text">';
			$template['input']['num']            = '<input class="ruby-field" type="number" name="quantity" min="0">';
			$template['input']['posts_per_page'] = '<input class="ruby-field" type="number" name="quantity" min="1">';
			$template['input']['textarea']       = '<textarea class="ruby-field" rows="9"></textarea>';
			$template['input']['category']       = newsmax_ruby_theme_config::category_dropdown_select();
			$template['input']['categories']     = newsmax_ruby_theme_config::categories_dropdown_select();
			$template['input']['post_format']    = newsmax_ruby_theme_config::post_format_dropdown_select();
			$template['input']['enable']         = newsmax_ruby_theme_config::enable_dropdown_select();
			$template['input']['authors']        = newsmax_ruby_theme_config::author_dropdown_select();
			$template['input']['orderby']        = newsmax_ruby_theme_config::orderby_dropdown_select();
			$template['input']['viewmore']       = newsmax_ruby_theme_config::viewmore_dropdown_select();
			$template['input']['custom_html']    = '<div class="ruby-field-loading">' . esc_html__( 'loading...', 'newsmax' ) . '</div>';
			$template['input']['summary_type']   = newsmax_ruby_theme_config::summary_dropdown_select();
			$template['input']['position']       = newsmax_ruby_theme_config::position_dropdown_select();
			$template['input']['wrap_mode']      = newsmax_ruby_theme_config::wrapmode_dropdown_select();


			$template['title']['title']           = esc_html__( 'Title', 'newsmax' );
			$template['title']['title_url']       = esc_html__( 'Title Url', 'newsmax' );
			$template['title']['category_id']     = esc_html__( 'Category Filter', 'newsmax' );
			$template['title']['category_ids']    = esc_html__( 'Multiple Categories Filter', 'newsmax' );
			$template['title']['tags']            = esc_html__( 'Tags slug filter', 'newsmax' );
			$template['title']['post_format']     = esc_html__( 'Post Format Filter', 'newsmax' );
			$template['title']['authors']         = esc_html__( 'Authors Filter', 'newsmax' );
			$template['title']['posts_per_page']  = esc_html__( 'Number Of Posts', 'newsmax' );
			$template['title']['slides_per_page'] = esc_html__( 'Number Of Slider', 'newsmax' );
			$template['title']['offset']          = esc_html__( 'Post Offset', 'newsmax' );
			$template['title']['orderby']         = esc_html__( 'Sort Order', 'newsmax' );
			$template['title']['excerpt']         = esc_html__( 'Post Excerpt', 'newsmax' );
			$template['title']['readmore']        = esc_html__( 'Read More Button', 'newsmax' );
			$template['title']['big_first']       = esc_html__( '1st Classic Post', 'newsmax' );
			$template['title']['summary_type']    = esc_html__( 'Classic Summary Type', 'newsmax' );
			$template['title']['position']        = esc_html__( 'Big Column Position', 'newsmax' );
			$template['title']['excerpt_classic'] = esc_html__( 'Classic Post Excerpt', 'newsmax' );
			$template['title']['auto_play']       = esc_html__( 'Autoplay Video', 'newsmax' );

			//default descriptions
			$template['desc']['title']           = esc_html__( 'optional - input a title for this block.', 'newsmax' );
			$template['desc']['title_url']       = esc_html__( 'optional - input a title URL for this block.', 'newsmax' );
			$template['desc']['sub_title']       = esc_html__( 'optional - show sub title of block.', 'newsmax' );
			$template['desc']['category_id']     = esc_html__( 'filter posts by category ID.', 'newsmax' );
			$template['desc']['category_ids']    = esc_html__( 'filter posts by category IDs. This option will override on "category filter" option.', 'newsmax' );
			$template['desc']['tags']            = esc_html__( 'filter posts by tags, Each tags separated by commas (for example: tag1,tag2,tag3).', 'newsmax' );
			$template['desc']['authors']         = esc_html__( 'filter posts by authors.', 'newsmax' );
			$template['desc']['posts_per_page']  = esc_html__( 'select number of posts you want to show at once.', 'newsmax' );
			$template['desc']['slides_per_page'] = esc_html__( 'select number of slides you want to show at once.', 'newsmax' );
			$template['desc']['offset']          = esc_html__( 'select number of posts to displace or pass over. Leave blank or set 0 if you want to show at the beginning.', 'newsmax' );
			$template['desc']['orderby']         = esc_html__( 'select a sort order type for this block.', 'newsmax' );
			$template['desc']['excerpt']         = esc_html__( 'select a value for the post excerpt length (for grid and list layout), leave blank or set 0 if you want to disable it.', 'newsmax' );
			$template['desc']['excerpt_classic'] = esc_html__( 'select a value for the post excerpt length (Classic layout), this option only applies when you enable Use Post Excerpt option, leave blank or set 0 if you want to disable it.', 'newsmax' );
			$template['desc']['readmore']        = esc_html__( 'show or hide the "Read More" button for this block.', 'newsmax' );
			$template['desc']['big_first']       = esc_html__( 'show the classic layout at top of the blog post listing.', 'newsmax' );
			$template['desc']['summary_type']    = esc_html__( 'select a summary type for classic layouts.', 'newsmax' );
			$template['desc']['position']        = esc_html__( 'select position for the big column.', 'newsmax' );
			$template['desc']['post_format']     = esc_html__( 'filter posts by post format types.', 'newsmax' );
			$template['desc']['auto_play']       = esc_html__( 'autoplay the first video when scrolling to this block.', 'newsmax' );

			$template['title']['header_color'] = esc_html__( 'Header Color', 'newsmax' );
			$template['desc']['header_color']  = esc_html__( 'select a color (hex color) for this block title, for example: #ffffff.', 'newsmax' );

			$template['title']['text_style'] = esc_html__( 'Text Color', 'newsmax' );
			$template['desc']['text_style']  = esc_html__( 'Select text style for this block, this option will apply to header border, ajax filter text and post contents (does not apply to overlay contents).', 'newsmax' );
			$template['input']['text_style'] = newsmax_ruby_theme_config::text_style_dropdown_select();

			$template['title']['share'] = esc_html__( 'Share Icons', 'newsmax' );
			$template['desc']['share']  = esc_html__( 'enable or disable share on social icons for this block.', 'newsmax' );
			$template['input']['share'] = newsmax_ruby_theme_config::enable_dropdown_select( true );

			$template['title']['meta_info'] = esc_html__( 'Meta Tags Info', 'newsmax' );
			$template['desc']['meta_info']  = esc_html__( 'enable or disable entry meta tags info for this block.', 'newsmax' );
			$template['input']['meta_info'] = newsmax_ruby_theme_config::enable_dropdown_select( true );

			$template['title']['cat_info'] = esc_html__( 'Category Info', 'newsmax' );
			$template['desc']['cat_info']  = esc_html__( 'enable or disable the category info for this block', 'newsmax' );
			$template['input']['cat_info'] = newsmax_ruby_theme_config::enable_dropdown_select( true );

			//block col image
			$template['title']['col_title']     = esc_html__( 'Column Heading', 'newsmax' );
			$template['desc']['col_title']      = esc_html__( 'input a heading for this column.', 'newsmax' );
			$template['title']['destination']   = esc_html__( 'Destination URL', 'newsmax' );
			$template['desc']['destination']    = esc_html__( 'input a destination URL.', 'newsmax' );
			$template['title']['num_of_col']    = esc_html__( 'Number of Columns', 'newsmax' );
			$template['desc']['num_of_col']     = esc_html__( 'select a number of columns per row.', 'newsmax' );
			$template['input']['num_of_col']    = newsmax_ruby_theme_config::number_of_columns_select();
			$template['title']['col_img_style'] = esc_html__( 'Block Style', 'newsmax' );
			$template['desc']['col_img_style']  = esc_html__( 'select a style for this block.', 'newsmax' );
			$template['input']['col_img_style'] = newsmax_ruby_theme_config::col_img_style_select();

			//raw HTMl
			$template['title']['raw_html'] = esc_html__( 'Raw HTML', 'newsmax' );
			$template['desc']['raw_html']  = esc_html__( 'input raw HTML content for this section.', 'newsmax' );
			$template['input']['raw_html'] = '<textarea class="ruby-field raw-html" rows="14"></textarea>';

			//block code box
			$template['title']['wrap_mode']   = esc_html__( 'Block Wrapper Mode', 'newsmax' );
			$template['title']['custom_html'] = esc_html__( 'Custom HTML', 'newsmax' );
			$template['title']['shortcode']   = esc_html__( 'ShortCodes', 'newsmax' );
			$template['desc']['wrap_mode']    = esc_html__( 'display contents of this block in full-width or wrapper mode.', 'newsmax' );
			$template['desc']['custom_html']  = esc_html__( 'input your text, HTML codes or video embed codes...', 'newsmax' );
			$template['desc']['shortcode']    = esc_html__( 'input a subscribe form shortcode.', 'newsmax' );

			//block advertising
			$template['title']['ad_title']  = esc_html__( 'Ad title', 'newsmax' );
			$template['title']['ad_url']    = esc_html__( 'Ad URL', 'newsmax' );
			$template['title']['ad_image']  = esc_html__( 'Ad Image URL', 'newsmax' );
			$template['title']['ad_script'] = esc_html__( 'Adsense Script', 'newsmax' );
			$template['desc']['ad_title']   = esc_html__( 'input your advertising title.', 'newsmax' );
			$template['desc']['ad_url']     = esc_html__( 'input your destination URL.', 'newsmax' );
			$template['desc']['ad_image']   = esc_html__( ' input your attachment image URL. This option will override on the scripts. Leave blank if you want to use scripts.', 'newsmax' );
			$template['desc']['ad_script']  = esc_html__( 'input your script codes or raw HTML.', 'newsmax' );

			//block style
			$template['title']['block_style'] = esc_html__( 'Blog Style', 'newsmax' );
			$template['desc']['block_style']  = esc_html__( 'select a color style for this block', 'newsmax' );
			$template['input']['block_style'] = newsmax_ruby_theme_config::block_style_dropdown_select();

			//thumbnail
			$template['title']['thumb_position'] = esc_html__( 'Thumbnail Position', 'newsmax' );
			$template['desc']['thumb_position']  = esc_html__( 'select position for post thumbnails.', 'newsmax' );

			//block subscribe
			$template['title']['image_url']   = esc_html__( 'Image URL', 'newsmax' );
			$template['title']['description'] = esc_html__( 'Short Description', 'newsmax' );
			$template['desc']['image_url']    = esc_html__( 'input a background image URL', 'newsmax' );
			$template['desc']['description']  = esc_html__( 'input a short description.', 'newsmax' );

			//ajax dropdown filer
			$template['title']['ajax_dropdown'] = esc_html__( 'Ajax Dropdown Filter Type', 'newsmax' );
			$template['desc']['ajax_dropdown']  = esc_html__( 'select a type for ajax dropdown filters for displaying at the right of this block header.', 'newsmax' );
			$template['input']['ajax_dropdown'] = newsmax_ruby_theme_config::ajax_filter_dropdown_select();

			//ajax dropdown filer id
			$template['title']['ajax_dropdown_id'] = esc_html__( 'Ajax Dropdown Filter IDs', 'newsmax' );
			$template['desc']['ajax_dropdown_id']  = esc_html__( 'input IDs of the filter type (category IDs, author IDs, OR tag names) you want to show, separated by commas, Leave blank if you want to show all.', 'newsmax' );

			//ajax dropdown text
			$template['title']['ajax_dropdown_text'] = esc_html__( 'First Item Title', 'newsmax' );
			$template['desc']['ajax_dropdown_text']  = esc_html__( 'input a title for the first item (All) of this dropdown filter list.', 'newsmax' );

			//ajax pagination
			$template['title']['pagination'] = esc_html__( 'Ajax Pagination', 'newsmax' );
			$template['desc']['pagination']  = esc_html__( 'select a pagination type for this block.', 'newsmax' );
			$template['input']['pagination'] = newsmax_ruby_theme_config::pagination_dropdown_select();

			//grid style
			$template['title']['grid_style'] = esc_html__( 'Grid Style', 'newsmax' );
			$template['desc']['grid_style']  = esc_html__( 'select a grid style for this block.', 'newsmax' );
			$template['input']['grid_style'] = newsmax_ruby_theme_config::grid_style_dropdown_select();

			//background image
			$template['title']['background'] = esc_html__( 'Background Color', 'newsmax' );
			$template['desc']['background']  = esc_html__( 'select a wrapper background color (hex) for this block, for example: #282828.', 'newsmax' );

			$template['title']['background_image'] = esc_html__( 'Background Image', 'newsmax' );
			$template['desc']['background_image']  = esc_html__( 'input an attachment image URL as a background for this block. This option will override on background color settings.', 'newsmax' );

			//unload
			$template['unload'] = esc_html__( 'The changes you made will be lost if you navigate away from this page.', 'newsmax' );

			//sidebar
			$str = '';
			$str .= '<div class="ruby-template-field-sidebar-label"><label>' . esc_html__( 'Select Sidebar Options', 'newsmax' ) . '</label>';
			$str .= '<div class="ruby-sidebar-select-wrap">';
			$str .= '<div class="ruby-sidebar-select-el">';
			$str .= '<div class="sidebar-label">' . esc_html__( 'Sidebar Name', 'newsmax' ) . '</div>';
			$str .= '<select class ="ruby-sidebar-select">';

			//sidebar select
			$data_sidebar = newsmax_ruby_theme_config::get_all_sidebar();
			if ( is_array( $data_sidebar ) ) {
				foreach ( $data_sidebar as $sidebar ) {
					if ( ! empty( $sidebar['id'] ) && ! empty( $sidebar['name'] ) ) {
						switch ( $sidebar['id'] ) {
							case 'newsmax_ruby_sidebar_navigation' :
							case 'newsmax_ruby_blog_column_1' :
							case 'newsmax_ruby_blog_column_2' :
							case 'newsmax_ruby_blog_column_3' :
							case 'newsmax_ruby_sidebar_footer_fullwidth':
							case 'newsmax_ruby_sidebar_footer_1' :
							case 'newsmax_ruby_sidebar_footer_2' :
							case 'newsmax_ruby_sidebar_footer_3' :
							case 'newsmax_ruby_sidebar_footer_4' :
								break;
							default:
								$str .= '<option value="' . esc_attr( $sidebar['id'] ) . '">' . ucwords( $sidebar['name'] ) . '</option>';
								break;
						}
					}
				};
			}
			$str .= '</select>';
			$str .= '</div>';
			$str .= '<div class="ruby-sidebar-select-el">';
			$str .= '<div class="sidebar-label">' . esc_html__( 'Sidebar Position', 'newsmax' ) . '</div>';
			$str .= '<select class="ruby-sidebar-position">';
			$str .= '<option selected value ="right">' . esc_html__( 'Right', 'newsmax' ) . '</option>';
			$str .= '<option  value ="left">' . esc_html__( 'Left', 'newsmax' ) . '</option>';
			$str .= '</select>';
			$str .= '</div>';

			$str .= '<div class="ruby-sidebar-select-el">';
			$str .= '<div class="sidebar-label">' . esc_html__( 'Sidebar Sticky', 'newsmax' ) . '</div>';
			$str .= '<select class="ruby-sidebar-sticky">';
			$str .= '<option selected value ="default">' . esc_html__( 'Default From Theme Options', 'newsmax' ) . '</option>';
			$str .= '<option  value ="stick">' . esc_html__( 'Stick', 'newsmax' ) . '</option>';
			$str .= '<option value ="none">' . esc_html__( 'None', 'newsmax' ) . '</option>';
			$str .= '</select>';
			$str .= '</div>';

			$str .= '</div></div>';
			$template['input']['sidebar'] = $str;

			//full width section
			$str = '';
			$str .= '<div class="ruby-section fullwidth-section">';
			$str .= '<div class="ruby-section-bar">';
			$str .= '<i class="ruby-section-move">#</i>';
			$str .= '<div class="ruby-section-label"></div>';
			$str .= '<div class="ruby-section-toolbox">';
			$str .= '<a class="ruby-section-open-option" href="#">+</a>';
			$str .= '<a class="ruby-section-delete" href="#">x</a>';
			$str .= '</div>';
			$str .= '</div>';
			$str .= '<div class="ruby-block-wrap clearfix">';
			$str .= '<div class="section-menu-wrap">';
			$str .= '<div class="ruby-toolbox"><a href="#" class="add-block-select">' . esc_html__( 'Add Block', 'newsmax' ) . '</a>';
			$str .= '<div class="block-select-wrap"></div>';
			$str .= '</div>';
			$str .= '</div>';
			$str .= '<div class="ruby-block fullwidth-block">';
			$str .= '<input type="hidden" class="ruby-section-order" name="newsmax_ruby_section_order[]">';
			$str .= '<input type="hidden" class="ruby-section-type">';
			$str .= '<div class="ruby-section-empty">' . esc_html__( 'Click on " <strong>BLOCK</strong> " images to add a new block.', 'newsmax' ) . '</div>';
			$str .= '<div class="ruby-section-loading">' . esc_html__( 'Loading ...', 'newsmax' ) . '</div>';
			$str .= '</div>';
			$str .= '</div>';
			$str .= '</div>';
			$template['section_full_width'] = $str;

			//has sidebar section
			$str = '';
			$str .= '<div class="ruby-section has-sidebar-section">';
			$str .= '<div class="ruby-section-bar">';
			$str .= '<i class="ruby-section-move">#</i>';
			$str .= '<div class="ruby-section-label"></div>';
			$str .= '<div class="ruby-section-toolbox">';
			$str .= '<a class="ruby-section-open-option" href="#">+</a>';
			$str .= '<a class="ruby-section-delete" href="#">x</a>';
			$str .= '</div>';
			$str .= '</div>';
			$str .= '<div class="ruby-block-wrap clearfix">';
			$str .= '<div class="section-menu-wrap">';
			$str .= '<div class="ruby-section-sidebar">';
			$str .= '</div>';
			$str .= '<div class="ruby-toolbox"><a href="#" class="add-block-select">' . esc_html__( 'Add Block', 'newsmax' ) . '</a>';
			$str .= '<div class="block-select-wrap"></div>';
			$str .= '</div>';
			$str .= '</div>';
			$str .= '<div class="ruby-block content-block">';
			$str .= '<input type="hidden" class="ruby-section-order" name="newsmax_ruby_section_order[]">';
			$str .= '<input type="hidden" class="ruby-section-type">';
			$str .= '<div class="ruby-section-empty">' . html_entity_decode( esc_html__( 'Click on " <strong>BLOCK</strong> " images to add a new block.', 'newsmax' ) ) . '</div>';
			$str .= '<div class="ruby-section-loading">' . esc_html__( 'Loading ...', 'newsmax' ) . '</div>';
			$str .= '</div>';

			$str .= '</div>';
			$str .= '</div>';

			$template['section_has_sidebar'] = $str;

			wp_localize_script( 'newsmax_ruby_composer_script', 'newsmax_ruby_composer_template', $template );
		}
	}

	newsmax_ruby_composer_config::get_instance();
}



