<?php

if ( ! function_exists( 'newsmax_ruby_register_sb_widget_post' ) ) {
	function newsmax_ruby_register_sb_widget_post() {
		register_widget( 'newsmax_ruby_sb_widget_post' );
	}

	add_action( 'widgets_init', 'newsmax_ruby_register_sb_widget_post' );
}

if ( ! class_exists( 'newsmax_ruby_sb_widget_post' ) ) {
	class newsmax_ruby_sb_widget_post extends WP_Widget {

		function __construct() {
			$widget_ops = array(
				'classname'   => 'sb-widget-post',
				'description' => esc_html__( '[Sidebar Widget] Display blog listings with custom query in sidebar section', 'newsmax-core' )
			);

			parent::__construct( 'newsmax_ruby_sb_widget_post', esc_html__( '[SIDEBAR] - Blog Posts', 'newsmax-core' ), $widget_ops );
			add_action( 'wp_enqueue_scripts', array( $this, 'sb_widget_post_style' ) );
		}


		function widget( $args, $instance ) {

			if ( ! class_exists( 'newsmax_ruby_block_widget_post' ) ) {
				return false;
			}

			extract( $args, EXTR_SKIP );
			$options = array();

			$title                     = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance );
			$title_url                 = ! empty( $instance['title_url'] ) ? $instance['title_url'] : '';
			$options['block_style']    = ! empty( $instance['style'] ) ? $instance['style'] : 1;
			$options['posts_per_page'] = ! empty( $instance['posts_per_page'] ) ? esc_attr( $instance['posts_per_page'] ) : 0;
			$options['orderby']        = ! empty( $instance['orderby'] ) ? $instance['orderby'] : 'date_post';
			$options['category_id']    = ! empty( $instance['category'] ) ? esc_attr( $instance['category'] ) : 0;
			$options['category_ids']   = ! empty( $instance['categories'] ) ? esc_attr( $instance['categories'] ) : '';
			$options['tags']           = ! empty( $instance['tags'] ) ? $instance['tags'] : '';
			$options['post_format']    = ! empty( $instance['post_format'] ) ? esc_attr( $instance['post_format'] ) : '';
			$options['offset']         = ! empty( $instance['offset'] ) ? $instance['offset'] : 0;
			$options['pagination']     = ! empty( $instance['pagination'] ) ? $instance['pagination'] : '';
			$options['widget_id']      = $args['widget_id'];
			
			$widget_header_style       = newsmax_ruby_get_option( 'site_block_header_style' );

			$block = newsmax_ruby_block_widget_post_setup( $options );

			echo $before_widget;

			if ( ! empty( $title ) ) {
				echo '<div class="block-title widget-title">';
				echo '<h3>';
				if ( 1 == $widget_header_style ) {
					echo '<span class="widget-post-bullet"></span>';
				}
				//render title
				if ( empty( $title_url ) ) {
					echo esc_attr( $title );
				} else {
					echo '<a href="' . esc_url( $title_url ) . '" title="' . esc_attr( $title ) . '">' . esc_attr( $title ) . '</a>';
				}
				echo '</h3></div>';
			}

			echo '<div class="widget-post-block-outer is-style-' . esc_attr( $options['block_style'] ) . '">';
			echo newsmax_ruby_block_widget_post::render( $block );
			echo '</div>';

			echo $after_widget;

		}


		function sb_widget_post_style() {

			if ( empty( $this->id_base ) ) {
				return false;
			}

			$str       = '';
			$widget_id = $this->id_base;

			$widget_options      = get_option( $this->option_name );
			$widget_header_style = newsmax_ruby_get_option( 'site_block_header_style' );

			if ( is_array( $widget_options ) ) {
				foreach ( $widget_options as $key => $widget_option ) {

					if ( empty( $widget_option['title_color'] ) ) {
						continue;
					}

					$class_name = '#' . $widget_id . '-' . $key;
					switch ( $widget_header_style ) {
						case 3 :
						case 4 :
							$str .= $class_name . ' .widget-title h3 { background-color: ' . esc_attr( $widget_option['title_color'] ) . ';}';
							break;
						case 5 :
						case 2 :
							$str .= $class_name . ' .widget-title h3 { color: ' . esc_attr( $widget_option['title_color'] ) . ';}';
							break;
						default :
							$str .= $class_name . ' .widget-title h3 { color: ' . esc_attr( $widget_option['title_color'] ) . ';}';
							$str .= $class_name . ' .widget-title .widget-post-bullet { background-color: ' . esc_attr( $widget_option['title_color'] ) . '!important;}';
							break;
					}
				}
			}

			wp_add_inline_style( 'newsmax-ruby-style', $str );
			return false;
		}


		function update( $new_instance, $old_instance ) {
			$instance                   = $old_instance;
			$instance['title']          = strip_tags( $new_instance['title'] );
			$instance['title_url']      = esc_html( $new_instance['title_url'] );
			$instance['title_color']    = esc_html( $new_instance['title_color'] );
			$instance['style']          = strip_tags( $new_instance['style'] );
			$instance['category']       = strip_tags( $new_instance['category'] );
			$instance['categories']     = strip_tags( $new_instance['categories'] );
			$instance['tags']           = strip_tags( $new_instance['tags'] );
			$instance['post_format']    = strip_tags( $new_instance['post_format'] );
			$instance['posts_per_page'] = absint( strip_tags( $new_instance['posts_per_page'] ) );
			$instance['offset']         = absint( strip_tags( $new_instance['offset'] ) );
			$instance['orderby']        = strip_tags( $new_instance['orderby'] );
			$instance['pagination']     = strip_tags( $new_instance['pagination'] );

			return $instance;
		}


		function form($instance)
		{
			$defaults = array(
				'title'          => esc_html__( 'Latest Posts', 'newsmax-core' ),
				'title_url'      => '',
				'title_color'    => '',
				'style'          => '',
				'category'       => '',
				'categories'     => '',
				'tags'           => '',
				'post_format'    => 0,
				'posts_per_page' => 4,
				'offset'         => 0,
				'orderby'        => 'date_post',
				'pagination'     => 'next_prev'
			);
			$instance = wp_parse_args( (array) $instance, $defaults ); ?>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_attr_e('Title:','newsmax-core') ?></label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php if(!empty($instance['title'])) echo esc_attr($instance['title']); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'title_url' )); ?>"><?php esc_attr_e('Title URL (optional):','newsmax-core') ?></label>
				<input type="text" class="widefat" id="<?php echo esc_html($this->get_field_id( 'title_url' )); ?>" name="<?php echo esc_html($this->get_field_name( 'title_url' )); ?>" value="<?php if(!empty($instance['title_url'])) echo esc_html($instance['title_url']); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'title_color' )); ?>"><?php esc_attr_e('Title Color (Hex value ie: #ff4545):','newsmax-core') ?></label>
				<input type="text" class="widefat" id="<?php echo esc_html($this->get_field_id( 'title_color' )); ?>" name="<?php echo esc_html($this->get_field_name( 'title_color' )); ?>" value="<?php if(!empty($instance['title_color'])) echo esc_html($instance['title_color']); ?>" />
			</p>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'style' )); ?>"><strong><?php esc_attr_e('Blog Style:', 'newsmax-core'); ?></strong></label>
				<select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'style' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'style' )); ?>" >
					<option value="1" <?php if( !empty($instance['style']) && $instance['style'] == '1' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Style 1', 'newsmax-core'); ?></option>
					<option value="2" <?php if( !empty($instance['style']) && $instance['style'] == '2' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Style 2', 'newsmax-core'); ?></option>
					<option value="3" <?php if( !empty($instance['style']) && $instance['style'] == '3' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Style 3', 'newsmax-core'); ?></option>
					<option value="4" <?php if( !empty($instance['style']) && $instance['style'] == '4' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Style 4', 'newsmax-core'); ?></option>
					<option value="5" <?php if( !empty($instance['style']) && $instance['style'] == '5' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Style 5', 'newsmax-core'); ?></option>
					<option value="6" <?php if( !empty($instance['style']) && $instance['style'] == '6' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Style 6', 'newsmax-core'); ?></option>
					<option value="7" <?php if( !empty($instance['style']) && $instance['style'] == '7' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Style 7', 'newsmax-core'); ?></option>
					<option value="8" <?php if( !empty($instance['style']) && $instance['style'] == '8' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Style 8', 'newsmax-core'); ?></option>
					<option value="9" <?php if( !empty($instance['style']) && $instance['style'] == '9' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Style 9', 'newsmax-core'); ?></option>
					<option value="10" <?php if( !empty($instance['style']) && $instance['style'] == '10' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Style 10', 'newsmax-core'); ?></option>
					<option value="11" <?php if( !empty($instance['style']) && $instance['style'] == '11' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Style 11', 'newsmax-core'); ?></option>
					<option value="12" <?php if( !empty($instance['style']) && $instance['style'] == '12' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Style 12', 'newsmax-core'); ?></option>
					<option value="13" <?php if( !empty($instance['style']) && $instance['style'] == '13' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Style 13', 'newsmax-core'); ?></option>
					<option value="14" <?php if( !empty($instance['style']) && $instance['style'] == '14' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Style 14', 'newsmax-core'); ?></option>
					<option value="15" <?php if( !empty($instance['style']) && $instance['style'] == '15' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Style 15', 'newsmax-core'); ?></option>
					<option value="16" <?php if( !empty($instance['style']) && $instance['style'] == '16' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Style 16', 'newsmax-core'); ?></option>
					<option value="17" <?php if( !empty($instance['style']) && $instance['style'] == '17' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Style 17', 'newsmax-core'); ?></option>
					<option value="18" <?php if( !empty($instance['style']) && $instance['style'] == '18' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Style 18', 'newsmax-core'); ?></option>
				</select>
			</p>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id('category')); ?>"><strong><?php esc_attr_e('Category Filter:', 'newsmax-core'); ?></strong></label>
				<select class="widefat" id="<?php echo esc_attr($this->get_field_id('category')); ?>" name="<?php echo esc_attr($this->get_field_name('category')); ?>">
					<option value='all' <?php if ($instance['category'] == 'all') echo 'selected="selected"'; ?>><?php esc_attr_e('All Categories', 'newsmax-core'); ?></option>
					<?php $categories = get_categories('type=post'); foreach ($categories as $category) { ?><option  value='<?php echo esc_attr($category->term_id); ?>' <?php if ($instance['category'] == $category->term_id) echo 'selected="selected"'; ?>><?php echo esc_attr($category->cat_name); ?></option><?php } ?>
				</select>
			</p>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'categories' )); ?>"><?php esc_attr_e('Multiple Category Filter (optional, Input category ids, separated by comma. example: 1,2):','newsmax-core') ?></label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'categories' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'categories' )); ?>" value="<?php if( !empty($instance['categories']) ) echo esc_attr($instance['categories']); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'tags' )); ?>"><?php esc_attr_e('Tags (optional, Separate tags with comma. e.g. tag1,tag2):','newsmax-core') ?></label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'tags' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'tags' )); ?>" value="<?php if( !empty($instance['tags']) ) echo esc_attr($instance['tags']); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'post_format' )); ?>"><?php esc_attr_e('Post Format Filter:', 'newsmax-core'); ?></label>
				<select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'post_format' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'post_format' )); ?>" >
					<option value="0" <?php if( !empty($instance['post_format']) && $instance['post_format'] == '0' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('-- All --', 'newsmax-core'); ?></option>
					<option value="default" <?php if( !empty($instance['post_format']) && $instance['post_format'] == 'default' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Default', 'newsmax-core'); ?></option>
					<option value="gallery" <?php if( !empty($instance['post_format']) && $instance['post_format'] == 'gallery' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Gallery', 'newsmax-core'); ?></option>
					<option value="video" <?php if( !empty($instance['post_format']) && $instance['post_format'] == 'video' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Video', 'newsmax-core'); ?></option>
					<option value="audio" <?php if( !empty($instance['post_format']) && $instance['post_format'] == 'audio' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Audio', 'newsmax-core'); ?></option>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'posts_per_page' )); ?>"><?php esc_attr_e('Limit Post Number (optional, default is 4):','newsmax-core') ?></label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'posts_per_page' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'posts_per_page' )); ?>" value="<?php if( !empty($instance['posts_per_page']) ) echo esc_attr($instance['posts_per_page']); ?>" />
			</p>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'offset' )); ?>"><?php esc_attr_e('Post Offset (optional):','newsmax-core') ?></label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'offset' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'offset' )); ?>" value="<?php if( !empty($instance['offset']) ) echo esc_attr($instance['offset']); ?>" />
			</p>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'orderby' )); ?>"><?php esc_attr_e('Order By:', 'newsmax-core'); ?></label>
				<select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'orderby' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'orderby' )); ?>" >
					<option value="date_post" <?php if( !empty($instance['orderby']) && $instance['orderby'] == 'date' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Latest Post', 'newsmax-core'); ?></option>
					<option value="comment_count" <?php if( !empty($instance['orderby']) && $instance['orderby'] == 'comment_count' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Popular Comment', 'newsmax-core'); ?></option>
					<option value="popular" <?php if( !empty($instance['orderby']) && $instance['orderby'] == 'popular' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Popular View', 'newsmax-core'); ?></option>
					<option value="popular_week" <?php if( !empty($instance['orderby']) && $instance['orderby'] == 'popular_week' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Popular Week View', 'newsmax-core'); ?></option>
					<option value="top_review" <?php if( !empty($instance['orderby']) && $instance['orderby'] == 'top_review' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Top Review', 'newsmax-core'); ?></option>
					<option value="last_review" <?php if( !empty($instance['orderby']) && $instance['orderby'] == 'last_review' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Latest Review', 'newsmax-core'); ?></option>
					<option value="post_type" <?php if( !empty($instance['orderby']) && $instance['orderby'] == 'post_type' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Post Type', 'newsmax-core'); ?></option>
					<option value="rand" <?php if( !empty($instance['orderby']) && $instance['orderby'] == 'rand' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Random Post', 'newsmax-core'); ?></option>
					<option value="author" <?php if( !empty($instance['author']) && $instance['orderby'] == 'author' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Author', 'newsmax-core'); ?></option>
					<option value="alphabetical_order_asc" <?php if( !empty($instance['orderby']) && $instance['orderby'] == 'alphabetical_order_asc' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('alphabetical A->Z Posts', 'newsmax-core'); ?></option>
					<option value="alphabetical_order_decs" <?php if( !empty($instance['orderby']) && $instance['orderby'] == 'alphabetical_order_decs' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('alphabetical Z->A Posts', 'newsmax-core'); ?></option>
				</select>
			</p>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'pagination' )); ?>"><?php esc_attr_e('Ajax Pagination:', 'newsmax-core'); ?></label>
				<select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'pagination' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'pagination' )); ?>" >
					<option value="0" <?php if( !empty($instance['pagination']) && $instance['pagination'] == 'date' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('--Disable--', 'newsmax-core'); ?></option>
					<option value="next_prev" <?php if( !empty($instance['pagination']) && $instance['pagination'] == 'next_prev' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Next Prev', 'newsmax-core'); ?></option>
					<option value="loadmore" <?php if( !empty($instance['pagination']) && $instance['pagination'] == 'loadmore' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Load More', 'newsmax-core'); ?></option>
				</select>
			</p>
		<?php
		}
	}
}
