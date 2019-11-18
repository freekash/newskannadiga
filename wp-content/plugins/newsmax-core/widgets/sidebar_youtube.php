<?php
/**
 * widget youtube subscribe
 */
if ( ! function_exists( 'newsmax_ruby_register_sb_widget_youtube' ) ) {
	function newsmax_ruby_register_sb_widget_youtube() {
		register_widget( 'newsmax_ruby_sb_widget_youtube' );
	}

	add_action( 'widgets_init', 'newsmax_ruby_register_sb_widget_youtube' );
}

if ( ! class_exists( 'newsmax_ruby_sb_widget_youtube' ) ) {
	class newsmax_ruby_sb_widget_youtube extends WP_Widget {

		function __construct() {
			$widget_ops = array(
				'classname'   => 'youtube-widget',
				'description' => esc_attr__( '[Sidebar Widget] Display a YouTube SUBSCRIBE box in sidebar sections', 'newsmax-core' )
			);
			parent::__construct( 'newsmax_ruby_sb_widget_youtube', esc_attr__( '[SIDEBAR] - Youtube Subscribe', 'newsmax-core' ), $widget_ops );
		}

		function widget( $args, $instance ) {

			extract( $args, EXTR_SKIP );

			$title        = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance );
			$channel_name = ( ! empty( $instance['channel_name'] ) ) ? $instance['channel_name'] : '';
			$channel_id   = ( ! empty( $instance['channel_id'] ) ) ? $instance['channel_id'] : '';

			echo $before_widget;
			if ( ! empty( $title ) ) {
				echo $before_title . esc_attr( $title ) . $after_title;
			} ?>
			<div class="subscribe-youtube-wrap">
				<script src="https://apis.google.com/js/platform.js"></script>
				<?php if(!empty($channel_name)) : ?>
					<div class="g-ytsubscribe" data-channel="<?php echo esc_attr( $channel_name ) ?>" data-layout="default" data-count="default"></div>
				<?php elseif(!empty($channel_id)) : ?>
					<div class="g-ytsubscribe" data-channelid="<?php echo esc_attr($channel_id); ?>" data-layout="default" data-count="default"></div>
				<?php endif; ?>
			</div>
			<?php
			echo $after_widget;
		}

		function update( $new_instance, $old_instance ) {
			$instance                 = $old_instance;
			$instance['title']        = strip_tags( $new_instance['title'] );
			$instance['channel_name'] = strip_tags( $new_instance['channel_name'] );
			$instance['channel_id']   = strip_tags( $new_instance['channel_id'] );

			return $instance;
		}

		function form($instance)
		{
			$defaults = array( 'title' => esc_attr__( 'Subscribe to Our Channel', 'newsmax-core' ), 'channel_name' => '' );
			$instance = wp_parse_args( (array) $instance, $defaults ); ?>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title :','newsmax-core'); ?></label>
				<input  type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php if (!empty($instance['title'])) echo esc_attr($instance['title']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('channel_name')); ?>"><?php esc_attr_e('Channel Name:','newsmax-core') ?></label>
				<input  type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('channel_name')); ?>" name="<?php echo esc_attr( $this->get_field_name( 'channel_name' ) ); ?>" value="<?php if (!empty($instance['channel_name'])) echo esc_attr($instance['channel_name']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('channel_ID')); ?>"><?php esc_attr_e('or Channel ID:','newsmax-core') ?></label>
				<input  type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('channel_id')); ?>" name="<?php echo esc_attr( $this->get_field_name( 'channel_id' ) ); ?>" value="<?php if (!empty($instance['channel_id'])) echo esc_attr($instance['channel_id']); ?>"/>
			</p>
		<?php
		}
	}
}