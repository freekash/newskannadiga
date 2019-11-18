<?php
/**
 * widget subscribe
 */
if ( ! function_exists( 'newsmax_ruby_register_sb_widget_subscribe' ) ) {
	function newsmax_ruby_register_sb_widget_subscribe() {
		register_widget( 'newsmax_ruby_sb_widget_subscribe' );
	}

	add_action( 'widgets_init', 'newsmax_ruby_register_sb_widget_subscribe' );
}

if ( ! class_exists( 'newsmax_ruby_sb_widget_subscribe' ) ) {
	class newsmax_ruby_sb_widget_subscribe extends WP_Widget {

		function __construct() {
			$widget_ops = array(
				'classname'   => 'sb-subscribe-widget',
				'description' => esc_html__( '[Sidebar Widget] Display subscribe form, this widget supports MailChimp for WP plugin', 'newsmax-core' )
			);
			parent::__construct( 'newsmax_ruby_sb_widget_subscribe', esc_html__( '[SIDEBAR] - Subscribe Box', 'newsmax-core' ), $widget_ops );
		}

		function widget( $args, $instance ) {
			extract( $args, EXTR_SKIP );

			$title               = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance );
			$subscribe_shortcode = ( ! empty( $instance['subscribe_shortcode'] ) ) ? $instance['subscribe_shortcode'] : '';
			$description         = ( ! empty( $instance['description'] ) ) ? $instance['description'] : '';

			echo $before_widget;
			?>

			<div class="subscribe-wrap">
				<div class="subscribe-title-wrap"><h3><?php echo esc_html( $title ) ?></h3></div>
				<?php if(!empty($subscribe_shortcode)): ?>
					<div class="subscribe-content-wrap">
						<div class="subscribe-form-wrap">
							<?php echo do_shortcode( $subscribe_shortcode ); ?>
						</div>
					</div>
				<?php endif;?>
				<?php if(!empty($description)) : ?>
					<div class="subscribe-desc">
						<p><?php echo esc_html( $description ); ?></p>
					</div>
				<?php endif; ?>
			</div>

			<?php  echo $after_widget;
		}

		function update( $new_instance, $old_instance ) {
			$instance                        = $old_instance;
			$instance['title']               = strip_tags( $new_instance['title'] );
			$instance['subscribe_shortcode'] = strip_tags( $new_instance['subscribe_shortcode'] );
			$instance['description']         = strip_tags( $new_instance['description'] );

			return $instance;
		}

		function form( $instance ) {
			$defaults = array(
				'title'               => esc_html__( 'Subscribe Newsletter', 'newsmax-core' ),
				'subscribe_shortcode' => '',
				'description'         => ''
			);
			$instance = wp_parse_args( (array) $instance, $defaults );
			?>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><strong><?php esc_html_e('Title:', 'newsmax-core'); ?></strong></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('subscribe_shortcode')); ?>"><?php esc_html_e('Subscribe shortcode:', 'newsmax-core'); ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('subscribe_shortcode')); ?>" name="<?php echo esc_attr($this->get_field_name('subscribe_shortcode')); ?>" type="text" value="<?php if( !empty($instance['subscribe_shortcode']) ) echo  esc_attr($instance['subscribe_shortcode']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('description')); ?>"><?php esc_html_e('Short description:', 'newsmax-core'); ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('description')); ?>" name="<?php echo esc_attr($this->get_field_name('description')); ?>" type="text" value="<?php if( !empty($instance['description']) ) echo  esc_html($instance['description']); ?>"/>
			</p>
		<?php
		}
	}
}
