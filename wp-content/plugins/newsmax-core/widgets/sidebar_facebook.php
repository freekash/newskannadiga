<?php
/**
 * widget facebook
 */
if ( ! function_exists( 'newsmax_ruby_register_sb_widget_facebook' ) ) {
	function newsmax_ruby_register_sb_widget_facebook() {
		register_widget( 'newsmax_ruby_sb_widget_facebook' );
	}

	add_action( 'widgets_init', 'newsmax_ruby_register_sb_widget_facebook' );
}

if ( ! class_exists( 'newsmax_ruby_sb_widget_facebook' ) ) {
	class newsmax_ruby_sb_widget_facebook extends WP_Widget {

		function __construct() {
			$widget_ops = array(
				'classname'   => 'sb-widget-facebook',
				'description' => esc_html__( '[Sidebar Widget] Display Facebook Like box in sidebar sections.', 'newsmax-core' )
			);

			parent::__construct( 'newsmax_ruby_sb_widget_facebook', esc_html__( '[SIDEBAR] - Facebook Like Box', 'newsmax-core' ), $widget_ops );
		}


		function widget($args, $instance)
		{
			extract($args, EXTR_SKIP);

			$title       = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance );
			$fanpage_url = $instance['fanpage_url'] ? esc_url( $instance['fanpage_url'] ) : '';

			echo $before_widget;
			if ( ! empty( $title ) ) {
				echo $before_title . esc_attr( $title ) . $after_title;
			}?>

		    <?php if ($fanpage_url) : ?>
			<div class="fb-container">
				<div id="fb-root"></div>
				<script>(function(d, s, id) {
						var js, fjs = d.getElementsByTagName(s)[0];
						if (d.getElementById(id)) return;
						js = d.createElement(s); js.id = id;
						js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=1385724821660962";
						fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));</script>
				<div class="fb-page" data-href="<?php echo esc_url($fanpage_url);?>" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div>
			</div>
			<?php endif; ?>

			<?php echo $after_widget;
		}


		function update($new_instance, $old_instance)
		{
			$instance                = $old_instance;
			$instance['title']       = strip_tags( $new_instance['title'] );
			$instance['fanpage_url'] = strip_tags( $new_instance['fanpage_url'] );

			return $instance;
		}


		function form($instance)
		{
			$defaults = array( 'title' => esc_html__( 'Find Us on Facebook', 'newsmax-core' ), 'fanpage_url' => '' );
			$instance = wp_parse_args( (array) $instance, $defaults ); ?>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><strong><?php esc_html_e('Title:', 'newsmax-core'); ?></strong></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('fanpage_url')); ?>"><strong><?php esc_html_e('Fanpage URL:', 'newsmax-core') ?></strong></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('fanpage_url')); ?>" name="<?php echo esc_attr($this->get_field_name('fanpage_url')); ?>" value="<?php echo esc_html($instance['fanpage_url']); ?>"/>
			</p>

		<?php
		}
	}
}