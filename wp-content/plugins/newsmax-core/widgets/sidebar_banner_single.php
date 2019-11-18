<?php
if ( ! function_exists( 'newsmax_ruby_register_sb_widget_banner_single' ) ) {
	function newsmax_ruby_register_sb_widget_banner_single() {
		register_widget( 'newsmax_ruby_sb_widget_banner_single' );
	}

	add_action( 'widgets_init', 'newsmax_ruby_register_sb_widget_banner_single' );
}

if ( ! class_exists( 'newsmax_ruby_sb_widget_banner_single' ) ) {
	class newsmax_ruby_sb_widget_banner_single extends WP_Widget {

		function __construct(){
			$widget_ops = array(
				'classname'   => 'sb-widget-banner-single',
				'description' => esc_attr__( '[Sidebar Widget] Display Single Banner with the background image', 'newsmax-core' )
			);
			parent::__construct( 'newsmax_ruby_sb_widget_banner_single', esc_attr__( '[SIDEBAR] - Banner Single', 'newsmax-core' ), $widget_ops );
		}


		function widget($args, $instance)
		{
			extract( $args );
			$title                = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
			$image_url            = ( ! empty( $instance['image_url'] ) ) ? $instance['image_url'] : '';
			$banner_url           = ( ! empty( $instance['banner_url'] ) ) ? $instance['banner_url'] : '';
			$banner_title         = ( ! empty( $instance['banner_title'] ) ) ? $instance['banner_title'] : '';
			$banner_height        = ( ! empty( $instance['banner_height'] ) ) ? $instance['banner_height'] : '';
			$banner_height_mobile = ( ! empty( $instance['banner_height_mobile'] ) ) ? $instance['banner_height_mobile'] : '';
			$new_tab              = ( ! empty( $instance['new_tab'] ) ) ? $instance['new_tab'] : '';

			if ( empty( $banner_height_mobile ) ) {
				$banner_height_mobile = $banner_height;
			}

			$banner_class = 'banner-single-wrap';

			if ( ! empty( $banner_title ) ) {
				$banner_class = 'banner-single-wrap has-title';
			}

			echo $before_widget;
			if ( ! empty( $title ) ) {
				echo $before_title . esc_attr( $title ) . $after_title;
			} ?>

			<div class="<?php echo esc_attr($banner_class); ?>">
				<a class="banner-link" href="<?php echo esc_url($banner_url); ?>" <?php if (!empty($new_tab)) { echo 'target="_blank"';} ?>></a>
				<div class="banner-image-wrap hidden-xs" style="background-image: url('<?php echo esc_url( $image_url ); ?>'); height: <?php echo esc_attr( $banner_height ) . 'px' ?>;"></div>
				<div class="banner-image-wrap visible-xs" style="background-image: url('<?php echo esc_url( $image_url ); ?>'); height: <?php echo esc_attr( $banner_height_mobile ) . 'px' ?>;"></div>
				<?php if(!empty($banner_title)) : ?>
					<div class="banner-content-wrap">
						<div class="banner-content-inner post-title is-size-4">
							<h4><?php echo esc_attr($banner_title); ?></h4>
						</div>
					</div>
				<?php endif; ?>
			</div>

			<?php  echo $after_widget;
		}

		function update($new_instance, $old_instance)
		{
			$instance                         = $old_instance;
			$instance['title']                = strip_tags( $new_instance['title'] );
			$instance['image_url']            = strip_tags( $new_instance['image_url'] );
			$instance['banner_title']         = strip_tags( $new_instance['banner_title'] );
			$instance['banner_url']           = strip_tags( $new_instance['banner_url'] );
			$instance['banner_height']        = strip_tags( $new_instance['banner_height'] );
			$instance['banner_height_mobile'] = strip_tags( $new_instance['banner_height_mobile'] );
			$instance['new_tab']              = strip_tags( $new_instance['new_tab'] );

			return $instance;
		}


		function form($instance)
		{
			$defaults = array(
				'title'                => '',
				'image_url'            => '',
				'banner_title'         => '',
				'banner_url'           => '',
				'banner_height'        => 180,
				'banner_height_mobile' => 120,
				'new_tab'              => true
			);
			$instance = wp_parse_args( (array) $instance, $defaults ); ?>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><strong><?php esc_html_e('Title:', 'newsmax-core'); ?></strong></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('image_url')); ?>"><strong><?php esc_html_e('Banner Image Attachment Link:', 'newsmax-core'); ?></strong></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('image_url')); ?>" name="<?php echo esc_attr($this->get_field_name('image_url')); ?>" value="<?php echo esc_url($instance['image_url']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('banner_title')); ?>"><strong><?php esc_html_e('Banner Title:', 'newsmax-core'); ?></strong></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('banner_title')); ?>" name="<?php echo esc_attr($this->get_field_name('banner_title')); ?>" value="<?php echo esc_attr($instance['banner_title']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('banner_url')); ?>"><strong><?php esc_html_e('Destination link:', 'newsmax-core'); ?></strong></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('banner_url')); ?>" name="<?php echo esc_attr($this->get_field_name('banner_url')); ?>" value="<?php echo esc_url($instance['banner_url']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('banner_height')); ?>"><strong><?php esc_html_e('Banner Height:', 'newsmax-core'); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('banner_height')); ?>" name="<?php echo esc_attr($this->get_field_name('banner_height')); ?>" type="text" value="<?php if( !empty($instance['banner_height']) ) echo  esc_attr($instance['banner_height']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('banner_height_mobile')); ?>"><strong><?php esc_html_e('Banner Height On Mobile:', 'newsmax-core'); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('banner_height_mobile')); ?>" name="<?php echo esc_attr($this->get_field_name('banner_height_mobile')); ?>" type="text" value="<?php if( !empty($instance['banner_height_mobile']) ) echo  esc_attr($instance['banner_height_mobile']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('new_tab')); ?>"><?php esc_attr_e('Open in new tab','newsmax-core'); ?></label>
				<input class="widefat" type="checkbox" id="<?php echo esc_attr($this->get_field_id('new_tab')); ?>" name="<?php echo esc_attr($this->get_field_name('new_tab')); ?>" value="true" <?php if (!empty($instance['new_tab'])) echo 'checked="checked"'; ?>  />
			</p>

		<?php
		}
	}
} ?>