<?php
/**
 * widget banner
 */
if(!function_exists('newsmax_ruby_register_sb_widget_banner')){
	add_action( 'widgets_init', 'newsmax_ruby_register_sb_widget_banner' );

	function newsmax_ruby_register_sb_widget_banner() {
		register_widget( 'newsmax_ruby_sb_widget_banner' );
	}
}

if(!class_exists('newsmax_ruby_sb_widget_banner')){
	class newsmax_ruby_sb_widget_banner extends WP_Widget {

		function __construct() {
			$widget_ops = array(
				'classname'   => 'sb-widget-banner',
				'description' => esc_attr__( '[Sidebar Widget] Display banners with background images', 'newsmax-core' )
			);
			parent::__construct( 'newsmax_ruby_sb_widget_banner', esc_attr__( '[SIDEBAR] - Banner Listing', 'newsmax-core' ), $widget_ops );
		}

		//render widget
		function widget( $args, $instance ) {
			extract( $args, EXTR_SKIP );

			$title = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance );
			$style = ( ! empty( $instance['style'] ) ) ? $instance['style'] : '';

			$banner_1_url   = ( ! empty( $instance['banner_1_url'] ) ) ? $instance['banner_1_url'] : '';
			$banner_1_bg    = ( ! empty( $instance['banner_1_bg'] ) ) ? $instance['banner_1_bg'] : '';
			$banner_1_title = ( ! empty( $instance['banner_1_title'] ) ) ? $instance['banner_1_title'] : '';
			$banner_2_url   = ( ! empty( $instance['banner_2_url'] ) ) ? $instance['banner_2_url'] : '';
			$banner_2_bg    = ( ! empty( $instance['banner_2_bg'] ) ) ? $instance['banner_2_bg'] : '';
			$banner_2_title = ( ! empty( $instance['banner_2_title'] ) ) ? $instance['banner_2_title'] : '';
			$banner_3_url   = ( ! empty( $instance['banner_3_url'] ) ) ? $instance['banner_3_url'] : '';
			$banner_3_bg    = ( ! empty( $instance['banner_3_bg'] ) ) ? $instance['banner_3_bg'] : '';
			$banner_3_title = ( ! empty( $instance['banner_3_title'] ) ) ? $instance['banner_3_title'] : '';
			$banner_4_url   = ( ! empty( $instance['banner_4_url'] ) ) ? $instance['banner_4_url'] : '';
			$banner_4_bg    = ( ! empty( $instance['banner_4_bg'] ) ) ? $instance['banner_4_bg'] : '';
			$banner_4_title = ( ! empty( $instance['banner_4_title'] ) ) ? $instance['banner_4_title'] : '';
			$banner_5_url   = ( ! empty( $instance['banner_5_url'] ) ) ? $instance['banner_5_url'] : '';
			$banner_5_bg    = ( ! empty( $instance['banner_5_bg'] ) ) ? $instance['banner_5_bg'] : '';
			$banner_5_title = ( ! empty( $instance['banner_5_title'] ) ) ? $instance['banner_5_title'] : '';
			$banner_6_url   = ( ! empty( $instance['banner_6_url'] ) ) ? $instance['banner_6_url'] : '';
			$banner_6_bg    = ( ! empty( $instance['banner_6_bg'] ) ) ? $instance['banner_6_bg'] : '';
			$banner_6_title = ( ! empty( $instance['banner_6_title'] ) ) ? $instance['banner_6_title'] : '';
			$new_tab        = ( ! empty( $instance['new_tab'] ) ) ? $instance['new_tab'] : '';

			$target = '';
			if ( ! empty( $new_tab ) ) {
				$target = 'target="_blank"';
			}

			echo $before_widget;

			if ( ! empty( $title ) ) {
				echo $before_title . esc_attr( $title ) . $after_title;
			}?>

			<?php if(1 == $style) : ?>
			<div class="sb-banner-wrap banner-style-1">
			<?php else : ?>
			<div class="sb-banner-wrap banner-style-2">
			<?php endif; ?>
				<div class="sb-banner-inner">

					<?php if(!empty($banner_1_bg)) : ?>
						<div class="banner-element-outer">
							<div class="banner-element" style="background-image: url(<?php echo esc_url( $banner_1_bg ); ?>)">
								<?php if(!empty($banner_1_url)) :?>
									<a href="<?php echo esc_url($banner_1_url); ?>" <?php echo esc_html($target); ?> title="<?php echo esc_attr($banner_1_title) ?>"></a>
								<?php endif; ?>
								<?php if(!empty($banner_1_title)) :?>
									<div class="banner-title post-title is-size-4"><h4><?php echo esc_html($banner_1_title); ?></h4></div>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
					

					<?php if(!empty($banner_2_bg)) : ?>
						<div class="banner-element-outer">
							<div class="banner-element" style="background-image: url(<?php echo esc_url( $banner_2_bg ); ?>)">
								<?php if(!empty($banner_2_url)) :?>
									<a href="<?php echo esc_url($banner_2_url); ?>" <?php echo esc_html($target); ?> title="<?php echo esc_attr($banner_2_title) ?>"></a>
								<?php endif; ?>
								<?php if(!empty($banner_2_title)) :?>
									<div class="banner-title post-title is-size-4"><h4><?php echo esc_html($banner_2_title); ?></h4></div>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>


					<?php if(!empty($banner_3_bg)) : ?>
						<div class="banner-element-outer">
							<div class="banner-element" style="background-image: url(<?php echo esc_url( $banner_3_bg ); ?>)">
								<?php if(!empty($banner_3_url)) :?>
									<a href="<?php echo esc_url($banner_3_url); ?>" <?php echo esc_html($target); ?> title="<?php echo esc_attr($banner_3_title) ?>"></a>
								<?php endif; ?>
								<?php if(!empty($banner_3_title)) :?>
									<div class="banner-title post-title is-size-4"><h4><?php echo esc_html($banner_3_title); ?></h4></div>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>


					<?php if(!empty($banner_4_bg)) : ?>
						<div class="banner-element-outer">
							<div class="banner-element" style="background-image: url(<?php echo esc_url( $banner_4_bg ); ?>)">
								<?php if(!empty($banner_4_url)) :?>
									<a href="<?php echo esc_url($banner_4_url); ?>" <?php echo esc_html($target); ?> title="<?php echo esc_attr($banner_4_title) ?>"></a>
								<?php endif; ?>
								<?php if(!empty($banner_4_title)) :?>
									<div class="banner-title post-title is-size-4"><h4><?php echo esc_html($banner_4_title); ?></h4></div>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>


					<?php if(!empty($banner_5_bg)) : ?>
						<div class="banner-element-outer">
							<div class="banner-element" style="background-image: url(<?php echo esc_url( $banner_5_bg ); ?>)">
								<?php if(!empty($banner_5_url)) :?>
									<a href="<?php echo esc_url($banner_5_url); ?>" <?php echo esc_html($target); ?> title="<?php echo esc_attr($banner_5_title) ?>"></a>
								<?php endif; ?>
								<?php if(!empty($banner_5_title)) :?>
									<div class="banner-title post-title is-size-4"><h4><?php echo esc_html($banner_5_title); ?></h4></div>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>


					<?php if(!empty($banner_6_bg)) : ?>
						<div class="banner-element-outer">
							<div class="banner-element" style="background-image: url(<?php echo esc_url( $banner_6_bg ); ?>)">
								<?php if(!empty($banner_6_url)) :?>
									<a href="<?php echo esc_url($banner_6_url); ?>" <?php echo esc_html($target); ?> title="<?php echo esc_attr($banner_6_title) ?>"></a>
								<?php endif; ?>
								<?php if(!empty($banner_6_title)) :?>
									<div class="banner-title post-title is-size-4"><h4><?php echo esc_html($banner_6_title); ?></h4></div>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
					
				</div>
			</div><!--#banner wrap -->

			<?php echo $after_widget;
		}

		//update forms
		function update( $new_instance, $old_instance ) {

			$instance          = $old_instance;
			$instance['title'] = strip_tags( $new_instance['title'] );
			$instance['style'] = strip_tags( $new_instance['style'] );

			$instance['banner_1_url']   = strip_tags( $new_instance['banner_1_url'] );
			$instance['banner_1_bg']    = strip_tags( $new_instance['banner_1_bg'] );
			$instance['banner_1_title'] = strip_tags( $new_instance['banner_1_title'] );
			$instance['banner_2_url']   = strip_tags( $new_instance['banner_2_url'] );
			$instance['banner_2_bg']    = strip_tags( $new_instance['banner_2_bg'] );
			$instance['banner_2_title'] = strip_tags( $new_instance['banner_2_title'] );
			$instance['banner_3_url']   = strip_tags( $new_instance['banner_3_url'] );
			$instance['banner_3_bg']    = strip_tags( $new_instance['banner_3_bg'] );
			$instance['banner_3_title'] = strip_tags( $new_instance['banner_3_title'] );
			$instance['banner_4_url']   = strip_tags( $new_instance['banner_4_url'] );
			$instance['banner_4_bg']    = strip_tags( $new_instance['banner_4_bg'] );
			$instance['banner_4_title'] = strip_tags( $new_instance['banner_4_title'] );
			$instance['banner_5_url']   = strip_tags( $new_instance['banner_5_url'] );
			$instance['banner_5_bg']    = strip_tags( $new_instance['banner_5_bg'] );
			$instance['banner_5_title'] = strip_tags( $new_instance['banner_5_title'] );
			$instance['banner_6_url']   = strip_tags( $new_instance['banner_6_url'] );
			$instance['banner_6_bg']    = strip_tags( $new_instance['banner_6_bg'] );
			$instance['banner_6_title'] = strip_tags( $new_instance['banner_6_title'] );
			$instance['new_tab']        = strip_tags( $new_instance['new_tab'] );


			return $instance;
		}


		function form( $instance ) {
			$defaults = array(
				'title'          => esc_html__( 'Banner Listing', 'newsmax-core' ),
				'style'          => 1,
				'banner_1_url'   => '',
				'banner_1_bg'    => '',
				'banner_1_title' => '',
				'banner_2_url'   => '',
				'banner_2_bg'    => '',
				'banner_2_title' => '',
				'banner_3_url'   => '',
				'banner_3_bg'    => '',
				'banner_3_title' => '',
				'banner_4_url'   => '',
				'banner_4_bg'    => '',
				'banner_4_title' => '',
				'banner_5_url'   => '',
				'banner_5_bg'    => '',
				'banner_5_title' => '',
				'banner_6_url'   => '',
				'banner_6_bg'    => '',
				'banner_6_title' => '',
				'new_tab'        => ''
			);
			$instance = wp_parse_args( (array) $instance, $defaults );
			?>
			<p><?php echo esc_html__( 'The Banner URL allows attachment image URL (the URL with .jgp, .png or .gif at the end)', 'newsmax-core' ) ; ?>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><strong><?php esc_attr_e('Title:', 'newsmax-core') ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'style' )); ?>"><strong><?php esc_attr_e('Style:', 'newsmax-core'); ?></strong></label>
				<select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'style' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'style' )); ?>" >
					<option value="1" <?php if( !empty($instance['style']) && $instance['style'] == '1' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Style 1', 'newsmax-core'); ?></option>
					<option value="2" <?php if( !empty($instance['style']) && $instance['style'] == '2' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('style 2', 'newsmax-core'); ?></option>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('new_tab')); ?>"><?php esc_attr_e('Open in new tab','newsmax-core'); ?></label>
				<input class="widefat" type="checkbox" id="<?php echo esc_attr($this->get_field_id('new_tab')); ?>" name="<?php echo esc_attr($this->get_field_name('new_tab')); ?>" value="true" <?php if (!empty($instance['new_tab'])) echo 'checked="checked"'; ?>  />
			</p>

			<p><strong><?php esc_attr_e('BANNER 1:', 'newsmax-core'); ?></strong></p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('banner_1_bg')); ?>"><?php esc_attr_e('Banner 1 Image:', 'newsmax-core') ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('banner_1_bg')); ?>" name="<?php echo esc_attr($this->get_field_name('banner_1_bg')); ?>" type="text" value="<?php echo esc_attr($instance['banner_1_bg']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('banner_1_url')); ?>"><?php esc_attr_e('Banner 1 URL:', 'newsmax-core') ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('banner_1_url')); ?>" name="<?php echo esc_attr($this->get_field_name('banner_1_url')); ?>" type="text" value="<?php echo esc_url($instance['banner_1_url']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('banner_1_title')); ?>"><?php esc_attr_e('Banner 1 Title:', 'newsmax-core') ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('banner_1_title')); ?>" name="<?php echo esc_attr($this->get_field_name('banner_1_title')); ?>" type="text" value="<?php echo esc_attr($instance['banner_1_title']); ?>"/>
			</p>

			<p><strong><?php esc_attr_e('BANNER 2:', 'newsmax-core'); ?></strong></p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('banner_2_bg')); ?>"><?php esc_attr_e('Banner 2 Image:', 'newsmax-core') ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('banner_2_bg')); ?>" name="<?php echo esc_attr($this->get_field_name('banner_2_bg')); ?>" type="text" value="<?php echo esc_attr($instance['banner_2_bg']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('banner_2_url')); ?>"><?php esc_attr_e('Banner 2 URL:', 'newsmax-core') ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('banner_2_url')); ?>" name="<?php echo esc_attr($this->get_field_name('banner_2_url')); ?>" type="text" value="<?php echo esc_url($instance['banner_2_url']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('banner_2_title')); ?>"><?php esc_attr_e('Banner 2 Title:', 'newsmax-core') ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('banner_2_title')); ?>" name="<?php echo esc_attr($this->get_field_name('banner_2_title')); ?>" type="text" value="<?php echo esc_attr($instance['banner_2_title']); ?>"/>
			</p>

			<p><strong><?php esc_attr_e('BANNER 3:', 'newsmax-core'); ?></strong></p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('banner_3_bg')); ?>"><?php esc_attr_e('Banner 3 Image:', 'newsmax-core') ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('banner_3_bg')); ?>" name="<?php echo esc_attr($this->get_field_name('banner_3_bg')); ?>" type="text" value="<?php echo esc_attr($instance['banner_3_bg']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('banner_3_url')); ?>"><?php esc_attr_e('Banner 3 URL:', 'newsmax-core') ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('banner_3_url')); ?>" name="<?php echo esc_attr($this->get_field_name('banner_3_url')); ?>" type="text" value="<?php echo esc_url($instance['banner_3_url']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('banner_3_title')); ?>"><?php esc_attr_e('Banner 3 Title:', 'newsmax-core') ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('banner_3_title')); ?>" name="<?php echo esc_attr($this->get_field_name('banner_3_title')); ?>" type="text" value="<?php echo esc_attr($instance['banner_3_title']); ?>"/>
			</p>

			<p><strong><?php esc_attr_e('BANNER 4:', 'newsmax-core'); ?></strong></p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('banner_4_bg')); ?>"><?php esc_attr_e('Banner 4 Image:', 'newsmax-core') ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('banner_4_bg')); ?>" name="<?php echo esc_attr($this->get_field_name('banner_4_bg')); ?>" type="text" value="<?php echo esc_attr($instance['banner_4_bg']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('banner_4_url')); ?>"><?php esc_attr_e('Banner 4 URL:', 'newsmax-core') ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('banner_4_url')); ?>" name="<?php echo esc_attr($this->get_field_name('banner_4_url')); ?>" type="text" value="<?php echo esc_url($instance['banner_4_url']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('banner_4_title')); ?>"><?php esc_attr_e('Banner 4 Title:', 'newsmax-core') ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('banner_4_title')); ?>" name="<?php echo esc_attr($this->get_field_name('banner_4_title')); ?>" type="text" value="<?php echo esc_attr($instance['banner_4_title']); ?>"/>
			</p>

			<p><strong><?php esc_attr_e('BANNER 5:', 'newsmax-core'); ?></strong></p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('banner_5_bg')); ?>"><?php esc_attr_e('Banner 5 Image:', 'newsmax-core') ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('banner_5_bg')); ?>" name="<?php echo esc_attr($this->get_field_name('banner_5_bg')); ?>" type="text" value="<?php echo esc_attr($instance['banner_5_bg']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('banner_5_url')); ?>"><?php esc_attr_e('Banner 5 URL:', 'newsmax-core') ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('banner_5_url')); ?>" name="<?php echo esc_attr($this->get_field_name('banner_5_url')); ?>" type="text" value="<?php echo esc_url($instance['banner_5_url']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('banner_5_title')); ?>"><?php esc_attr_e('Banner 5 Title:', 'newsmax-core') ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('banner_5_title')); ?>" name="<?php echo esc_attr($this->get_field_name('banner_5_title')); ?>" type="text" value="<?php echo esc_attr($instance['banner_5_title']); ?>"/>
			</p>

			<p><strong><?php esc_attr_e('BANNER 6:', 'newsmax-core'); ?></strong></p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('banner_6_bg')); ?>"><?php esc_attr_e('Banner 6 Image:', 'newsmax-core') ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('banner_6_bg')); ?>" name="<?php echo esc_attr($this->get_field_name('banner_6_bg')); ?>" type="text" value="<?php echo esc_attr($instance['banner_6_bg']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('banner_6_url')); ?>"><?php esc_attr_e('Banner 6 URL:', 'newsmax-core') ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('banner_6_url')); ?>" name="<?php echo esc_attr($this->get_field_name('banner_6_url')); ?>" type="text" value="<?php echo esc_url($instance['banner_6_url']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('banner_6_title')); ?>"><?php esc_attr_e('Banner 6 Title:', 'newsmax-core') ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('banner_6_title')); ?>" name="<?php echo esc_attr($this->get_field_name('banner_6_title')); ?>" type="text" value="<?php echo esc_attr($instance['banner_6_title']); ?>"/>
			</p>
		<?php
		}
	}
}
