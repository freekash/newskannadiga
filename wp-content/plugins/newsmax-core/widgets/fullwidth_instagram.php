<?php
if ( ! function_exists( 'newsmax_ruby_register_fw_widget_instagram' ) ) {
	add_action( 'widgets_init', 'newsmax_ruby_register_fw_widget_instagram' );

	function newsmax_ruby_register_fw_widget_instagram() {
		register_widget( 'newsmax_ruby_fw_widget_instagram' );
	}
}

if ( ! class_exists( 'newsmax_ruby_fw_widget_instagram' ) ) {
	class newsmax_ruby_fw_widget_instagram extends WP_Widget {

		function __construct() {
			$widget_ops = array(
				'classname'   => 'fw-widget-instagram',
				'description' => esc_attr__( '[Fullwidth Widget] Display Instagram images grid layout in fullwidth sections', 'newsmax-core' )
			);
			parent::__construct( 'newsmax_ruby_fw_widget_instagram', esc_attr__( '[FULLWIDTH] - Instagram Grid', 'newsmax-core' ), $widget_ops );
		}

		function widget( $args, $instance ) {
			extract( $args, EXTR_SKIP );

			$instagram_token = ( ! empty( $instance['instagram_token'] ) ) ? $instance['instagram_token'] : '';
			$num_images      = ( ! empty( $instance['num_image'] ) ) ? $instance['num_image'] : '';
			$num_column      = ( ! empty( $instance['num_column'] ) ) ? $instance['num_column'] : 'col-xs-3';
			$bottom_text     = ( ! empty( $instance['bottom_text'] ) ) ? $instance['bottom_text'] : '';
			$bottom_url      = ( ! empty( $instance['bottom_url'] ) ) ? $instance['bottom_url'] : '';
			$click_popup     = ( ! empty( $instance['click_popup'] ) ) ? $instance['click_popup'] : '';
			$tag             = ( ! empty( $instance['tag'] ) ) ? strip_tags( $instance['tag'] ) : '';
			$max_width       = ( ! empty( $instance['max_width'] ) ) ? $instance['max_width'] : '';
			$widget_id       = ( ! empty( $args['widget_id'] ) ) ? $args['widget_id'] : 0;

			echo $before_widget;


			$class_name   = array();
			$class_name[] = 'instagram-content-wrap row clearfix';
			if ( ! empty( $click_popup ) ) {
				$class_name[] = 'is-instagram-popup';
			}
			if ( 'wrapper' == $max_width ) {
				$class_name[] = 'ruby-container';
			}

			$class_name = implode(' ',$class_name);

			//image data
			$data_instagram = get_transient( 'newsmax_ruby_instagram_cache' );
			if ( empty( $data_instagram[ $widget_id ] ) ) {
				$data_images = newsmax_ruby_data_instagram( $instagram_token, 'newsmax_ruby_instagram_cache', $widget_id, $num_images, $tag );
			} else {
				$data_images = $data_instagram[ $widget_id ];
			};

			if ( ! empty( $data_images->data ) ) : ?>

				<div class="<?php echo esc_attr($class_name); ?>">
				<?php foreach ($data_images->data as $post_data) : ?>
					<div class="instagram-el <?php echo esc_attr($num_column) ?>">
						<?php if(!empty($click_popup))  : ?>
							<a href="<?php echo esc_url($post_data->images->standard_resolution->url) ?>" data-effect="mpf-ruby-effect widget-instagram-popup-outer" class="instagram-popup-el" data-source="<?php if(!empty($post_data->user->username)){ echo esc_attr($post_data->user->username); } ?>"><img src="<?php echo esc_url($post_data->images->low_resolution->url) ?>" alt=""></a>
						<?php else : ?>
							<a href="<?php echo esc_html( $post_data->link ); ?>" target="_blank"><img src="<?php echo esc_url($post_data->images->low_resolution->url) ?>" alt=""></a>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
				</div>
				<?php if(empty($bottom_url)) : ?>
					<?php if(!empty($bottom_text)) : ?>
						<div class="instagram-bottom-text"><?php echo esc_html( $bottom_text ); ?></div>
					<?php endif; ?>
				<?php else : ?>
					<?php if(!empty($bottom_text)) : ?>
						<div class="instagram-bottom-text"><a target="_blank" href="<?php echo esc_url($bottom_url); ?>" title="<?php echo esc_attr($bottom_text); ?>"><?php echo esc_html( $bottom_text ); ?></a></div>
					<?php endif; ?>
				<?php endif; ?>

			<?php else :
				if ( is_string( $data_images ) ) {
					echo( strval( $data_images ) );
				};
			endif;

			echo $after_widget;
		}

		function update( $new_instance, $old_instance ) {

			$instance                    = $old_instance;
			$instance['instagram_token'] = strip_tags( $new_instance['instagram_token'] );
			$instance['num_image']       = absint( strip_tags( $new_instance['num_image'] ) );
			$instance['bottom_text']     = esc_html( $new_instance['bottom_text'] );
			$instance['bottom_url']      = esc_html( $new_instance['bottom_url'] );
			$instance['num_column']      = strip_tags( $new_instance['num_column'] );
			$instance['click_popup']     = strip_tags( $new_instance['click_popup'] );
			$instance['max_width']       = strip_tags( $new_instance['max_width'] );
			$instance['tag']             = strip_tags( $new_instance['tag'] );

			delete_transient( 'newsmax_ruby_instagram_cache' );

			return $instance;
		}


		function form($instance)
		{
			$defaults = array(
				'instagram_token' => '',
				'num_image'       => 16,
				'num_column'      => 'ruby-col-8',
				'bottom_text'     => 'Follow @ Instagram',
				'max_width'       => 'full',
				'bottom_url'      => '',
				'click_popup'     => '',
				'tag'             => ''

			);

			$instance = wp_parse_args( (array) $instance, $defaults );

			?>
			<p><?php echo html_entity_decode( esc_html__( 'How to Create an app and generate your Instagram access token on: <a target="_blank" href="https://instagram.themeruby.com/">Instagram access token tutorial</a> website</p>', 'newsmax-core' ) ); ?>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id('instagram_token')); ?>"><strong><?php esc_attr_e('Instagram Access Token:', 'newsmax-core') ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('instagram_token')); ?>" name="<?php echo esc_attr($this->get_field_name('instagram_token')); ?>" type="text" value="<?php echo esc_attr($instance['instagram_token']); ?>"/>
			</p>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id('num_image')); ?>"><strong><?php esc_attr_e('Limit Image Number:', 'newsmax-core') ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('num_image')); ?>" name="<?php echo esc_attr($this->get_field_name('num_image')); ?>" type="text" value="<?php echo esc_attr($instance['num_image']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('tag')); ?>"><strong><?php esc_attr_e('Display Image With Tag:', 'newsmax-core') ?></strong><span><?php echo esc_html__( ' (Leave blank if you want display your images)', 'newsmax-core' ); ?></span></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('tag')); ?>" name="<?php echo esc_attr($this->get_field_name('tag')); ?>" type="text" value="<?php echo esc_attr($instance['tag']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'num_column' )); ?>"><strong><?php esc_attr_e('Number of Columns:', 'newsmax-core'); ?></strong></label>
				<select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'num_column' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'num_column' )); ?>" >
					<option value="ruby-col-5" <?php if( !empty($instance['num_column']) && $instance['num_column'] == 'ruby-col-5' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_html_e('5 columns', 'newsmax-core'); ?></option>
					<option value="col-xs-2" <?php if( !empty($instance['num_column']) && $instance['num_column'] == 'col-xs-2' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_html_e('6 columns', 'newsmax-core'); ?></option>
					<option value="ruby-col-7" <?php if( !empty($instance['num_column']) && $instance['num_column'] == 'ruby-col-7' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_html_e('7 columns', 'newsmax-core'); ?></option>
					<option value="ruby-col-8" <?php if( !empty($instance['num_column']) && $instance['num_column'] == 'ruby-col-8' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_html_e('8 columns', 'newsmax-core'); ?></option>
					<option value="ruby-col-9" <?php if( !empty($instance['num_column']) && $instance['num_column'] == 'ruby-col-9' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_html_e('9 columns', 'newsmax-core'); ?></option>
					<option value="ruby-col-10" <?php if( !empty($instance['num_column']) && $instance['num_column'] == 'ruby-col-10' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_html_e('10 columns', 'newsmax-core'); ?></option>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'max_width' )); ?>"><strong><?php esc_html_e('Width of Grid:', 'newsmax-core'); ?></strong></label>
				<select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'max_width' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'max_width' )); ?>" >
					<option value="full" <?php if( !empty($instance['max_width']) && $instance['max_width'] == 'full' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_html_e('Full Width', 'newsmax-core'); ?></option>
					<option value="wrapper" <?php if( !empty($instance['max_width']) && $instance['max_width'] == 'wrapper' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_html_e('Has Wrapper', 'newsmax-core'); ?></option>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('bottom_text')); ?>"><strong><?php esc_attr_e('Intro Text:', 'newsmax-core') ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('bottom_text')); ?>" name="<?php echo esc_attr($this->get_field_name('bottom_text')); ?>" type="text" value="<?php echo esc_html($instance['bottom_text']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('bottom_url')); ?>"><strong><?php esc_attr_e('Profile URL:', 'newsmax-core') ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('bottom_url')); ?>" name="<?php echo esc_attr($this->get_field_name('bottom_url')); ?>" type="text" value="<?php echo esc_url($instance['bottom_url']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'click_popup' )); ?>"><?php esc_attr_e('Popup When Click:','newsmax-core') ?></label>
				<input class="widefat" type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'click_popup' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'click_popup' )); ?>" value="checked" <?php if( !empty( $instance['click_popup'] ) ) echo 'checked="checked"'; ?>  />
			</p>

		<?php
		}
	}
}
