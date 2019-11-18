<?php
// widget instagram
if ( ! function_exists( 'newsmax_ruby_register_sb_widget_instagram' ) ) {
	add_action( 'widgets_init', 'newsmax_ruby_register_sb_widget_instagram' );

	function newsmax_ruby_register_sb_widget_instagram() {
		register_widget( 'newsmax_ruby_sb_widget_instagram' );
	}
}

if ( ! class_exists( 'newsmax_ruby_sb_widget_instagram' ) ) {
	class newsmax_ruby_sb_widget_instagram extends WP_Widget {

		function __construct() {
			$widget_ops = array(
				'classname'   => 'sb-widget-instagram',
				'description' => esc_attr__( '[Sidebar Widget] Display Instagram images grid layout in sidebar section', 'newsmax-core' )
			);
			parent::__construct( 'newsmax_ruby_sb_widget_instagram', esc_attr__( '[SIDEBAR] - Instagram Grid', 'newsmax-core' ), $widget_ops );
		}

		function widget( $args, $instance ) {
			extract( $args, EXTR_SKIP );

			$title           = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance );
			$instagram_token = ( ! empty( $instance['instagram_token'] ) ) ? $instance['instagram_token'] : '';
			$num_images      = ( ! empty( $instance['num_image'] ) ) ? $instance['num_image'] : '';
			$num_column      = ( ! empty( $instance['num_column'] ) ) ? $instance['num_column'] : 'col-xs-3';
			$bottom_text     = ( ! empty( $instance['bottom_text'] ) ) ? $instance['bottom_text'] : '';
			$bottom_url      = ( ! empty( $instance['bottom_url'] ) ) ? $instance['bottom_url'] : '';
			$click_popup     = ( ! empty( $instance['click_popup'] ) ) ? $instance['click_popup'] : '';
			$tag             = ( ! empty( $instance['tag'] ) ) ? strip_tags( $instance['tag'] ) : '';
			$widget_id       = ( ! empty( $args['widget_id'] ) ) ? $args['widget_id'] : 0;

			echo $before_widget;

			if ( ! empty( $title ) ) {
				echo $before_title . esc_attr( $title ) . $after_title;
			}

			$data_instagram = get_transient( 'newsmax_ruby_instagram_cache' );
			if ( empty( $data_instagram[ $widget_id ] ) ) {
				$data_images = newsmax_ruby_data_instagram( $instagram_token, 'newsmax_ruby_instagram_cache', $widget_id, $num_images, $tag );
			} else {
				$data_images = $data_instagram[ $widget_id ];
			};

			if ( ! empty( $data_images->data ) ) : ?>
				<?php if ( ! empty( $click_popup ) ) : ?>
					<div class="instagram-content-wrap sb-instagram-content is-instagram-popup row clearfix">
				<?php else : ?>
					<div class="instagram-content-wrap sb-instagram-content row clearfix">
				<?php endif; ?>
					<?php foreach ($data_images->data as $post_data) : ?>
						<div class="instagram-el <?php echo esc_attr($num_column) ?>">
							<?php if(!empty($click_popup))  : ?>
								<a href="<?php echo esc_url($post_data->images->standard_resolution->url) ?>" data-effect="mpf-ruby-effect widget-instagram-popup-outer" class="instagram-popup-el" data-source="<?php if(!empty($post_data->user->username)){ echo esc_attr($post_data->user->username); } ?>"><img src="<?php echo esc_url($post_data->images->thumbnail->url) ?>" alt=""></a>
							<?php else : ?>
								<a href="<?php echo esc_html( $post_data->link ); ?>" target="_blank"><img src="<?php echo esc_url($post_data->images->thumbnail->url) ?>" alt=""></a>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
				<?php if(empty($bottom_url)) : ?>
					<?php if(!empty($bottom_text)) : ?>
						<span class="instagram-bottom-text"><?php echo esc_html( $bottom_text ); ?></span>
					<?php endif; ?>
				<?php else : ?>
					<?php if(!empty($bottom_text)) : ?>
						<a target="_blank" class="instagram-bottom-text" href="<?php echo esc_url($bottom_url); ?>" title="<?php echo esc_attr($bottom_text); ?>"><?php echo esc_html( $bottom_text ); ?></a>
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
			$instance['title']           = strip_tags( $new_instance['title'] );
			$instance['instagram_token'] = strip_tags( $new_instance['instagram_token'] );
			$instance['num_image']       = absint( strip_tags( $new_instance['num_image'] ) );
			$instance['bottom_text']     = esc_html( $new_instance['bottom_text'] );
			$instance['bottom_url']      = esc_html( $new_instance['bottom_url'] );
			$instance['num_column']      = strip_tags( $new_instance['num_column'] );
			$instance['click_popup']     = strip_tags( $new_instance['click_popup'] );
			$instance['tag']             = strip_tags( $new_instance['tag'] );

			//delete cache
			delete_transient( 'newsmax_ruby_instagram_cache' );

			return $instance;
		}


		function form( $instance ) {
			$defaults = array(
				'title'           => esc_html__( 'Instagram Gallery', 'newsmax-core' ),
				'instagram_token' => '',
				'num_image'       => 9,
				'num_column'      => 'col-xs-4',
				'bottom_text'     => 'Follow @ Instagram',
				'bottom_url'      => '',
				'click_popup'     => '',
				'tag'             => ''
			);
			$instance = wp_parse_args( (array) $instance, $defaults ); ?>

			<p><?php echo html_entity_decode( esc_html__( 'How to Create an app and generate your Instagram access token on: <a target="_blank" href="https://instagram.themeruby.com/">Instagram access token tutorial</a> website</p>', 'newsmax-core' ) ); ?>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><strong><?php esc_attr_e('Title:', 'newsmax-core') ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>"/>
			</p>

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
					<option value="col-xs-6" <?php if( !empty($instance['num_column']) && $instance['num_column'] == 'col-xs-6' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('2 columns', 'newsmax-core'); ?></option>
					<option value="col-xs-4" <?php if( !empty($instance['num_column']) && $instance['num_column'] == 'col-xs-4' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('3 columns', 'newsmax-core'); ?></option>
					<option value="col-xs-3" <?php if( !empty($instance['num_column']) && $instance['num_column'] == 'col-xs-3' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('4 columns', 'newsmax-core'); ?></option>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('bottom_text')); ?>"><strong><?php esc_attr_e('Bottom Text:', 'newsmax-core') ?></strong></label>
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