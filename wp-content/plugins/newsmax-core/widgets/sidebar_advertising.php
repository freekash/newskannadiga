<?php
/**
 * widget advertising
 */
if ( ! function_exists( 'newsmax_ruby_register_sb_widget_advertising' ) ) {
	function newsmax_ruby_register_sb_widget_advertising() {
		register_widget( 'newsmax_ruby_sb_widget_advertising' );
	}

	add_action( 'widgets_init', 'newsmax_ruby_register_sb_widget_advertising' );
}

if ( ! class_exists( 'newsmax_ruby_sb_widget_advertising' ) ) {
	class newsmax_ruby_sb_widget_advertising extends WP_Widget {

		function __construct() {
			$widget_ops = array(
				'classname'   => 'sb-widget-ad',
				'description' => esc_html__( '[Sidebar Widget] Display your custom ads, your banner JS or Google Adsense code, Support Google Ads Responsive', 'newsmax-core' )
			);
			parent::__construct( 'newsmax_ruby_sidebar_widget_advertising', esc_html__( '[SIDEBAR] - Advertising Box', 'newsmax-core' ), $widget_ops );
		}

		function widget( $args, $instance ) {
			extract( $args, EXTR_SKIP );

			$title     = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance );
			$ad_title  = ( ! empty( $instance['ad_title'] ) ) ? $instance['ad_title'] : '';
			$url       = ( ! empty( $instance['url'] ) ) ? $instance['url'] : '';
			$img       = ( ! empty( $instance['image_url'] ) ) ? $instance['image_url'] : '';
			$ad_script = ( ! empty( $instance['ad_script'] ) ) ? $instance['ad_script'] : '';
			$ad_size   = ( ! empty( $instance['ad_size'] ) ) ? $instance['ad_size'] : 1;

			echo $before_widget;
			if ( ! empty( $title ) ) {
				echo $before_title . esc_attr( $title ) . $after_title;
			}?>

			<div class="widget-ad-content-wrap clearfix">
				<?php if ( ! empty( $img ) ) : ?>
					<?php if ( ! empty( $ad_title ) ) : ?>
						<div class="ad-description"><span><?php echo esc_html( $ad_title ); ?></span></div>
					<?php endif; ?>
					<div class="widget-ad-image">
						<?php if (!empty($url)) : ?>
							<a class="widget-ad-link" target="_blank" href="<?php echo esc_url($url); ?>"><img class="ads-image" src="<?php echo esc_url($img); ?>" alt="<?php bloginfo('name') ?>"></a>
						<?php else : ?>
							<img class="widget-ad-image-url" src="<?php echo esc_url($img); ?>" alt="<?php bloginfo('name') ?>">
						<?php endif; ?>
					</div>
				<?php else : ?>
					<?php if ( function_exists( 'wp_doing_ajax' ) && wp_doing_ajax() ) {
						return false;
					}; ?>
					<?php if ( ! empty( $ad_title ) ) : ?>
						<div class="ad-description"><span><?php echo esc_html( $ad_title ); ?></span></div>
					<?php endif; ?>
					<div class="widget-ad-script">
						<?php if ( ! empty( $ad_script ) ) {
							if ( ! empty( $ad_size ) && 2 == $ad_size ) {
								echo html_entity_decode( stripcslashes( $ad_script ) );
							} else {
								echo html_entity_decode( stripcslashes( newsmax_ruby_ad_render_script( $ad_script, 'sidebar_ad' ) ) );
							}
						} ?>
					</div>
				<?php endif; ?>
			</div>

			<?php  echo $after_widget;
		}

		function update($new_instance, $old_instance)
		{
			$instance              = $old_instance;
			$instance['title']     = strip_tags( $new_instance['title'] );
			$instance['ad_title']  = strip_tags( $new_instance['ad_title'] );
			$instance['url']       = strip_tags( $new_instance['url'] );
			$instance['image_url'] = strip_tags( $new_instance['image_url'] );
			$instance['ad_script'] = esc_js( $new_instance['ad_script'] );
			$instance['ad_size']   = strip_tags( $new_instance['ad_size'] );

			return $instance;
		}


		function form( $instance ) {
			$defaults = array(
				'title'     => '',
				'ad_title'  => esc_html__( '- Advertisement -', 'newsmax-core' ),
				'url'       => '',
				'image_url' => '',
				'ad_script' => '',
				'ad_size'   => 1
			);
			$instance = wp_parse_args( (array) $instance, $defaults );
			?>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><strong><?php esc_html_e('Title:', 'newsmax-core'); ?></strong></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('ad_title')); ?>"><strong><?php esc_html_e('description:', 'newsmax-core'); ?></strong></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('ad_title')); ?>" name="<?php echo esc_attr($this->get_field_name('ad_title')); ?>" value="<?php echo esc_attr($instance['ad_title']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('url')); ?>"><?php esc_html_e('Ad Link:', 'newsmax-core'); ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('url')); ?>" name="<?php echo esc_attr($this->get_field_name('url')); ?>" type="text" value="<?php if( !empty($instance['url']) ) echo  esc_url($instance['url']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('image_url')); ?>"><?php esc_html_e('Ad Image Url:', 'newsmax-core'); ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('image_url')); ?>" name="<?php echo esc_attr($this->get_field_name('image_url')); ?>" type="text" value="<?php if( !empty($instance['image_url']) ) echo esc_url($instance['image_url']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'ad_script' )); ?>"><?php esc_html_e('JS or Google AdSense Code:','newsmax-core'); ?></label>
				<textarea rows="10" cols="50" id="<?php echo esc_attr($this->get_field_id( 'ad_script' )); ?>" name="<?php echo esc_attr($this->get_field_name('ad_script')); ?>" class="widefat"><?php echo html_entity_decode(stripcslashes($instance['ad_script'])); ?></textarea>
			</p>
			<p><?php esc_html_e('Please remove custom ad if you use javascript ad code.','newsmax-core'); ?></p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'ad_size' )); ?>"><?php esc_attr_e('Ad Size (Adsense Script):', 'newsmax-core'); ?></label>
				<select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'ad_size' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'ad_size' )); ?>" >
					<option value="1" <?php if( !empty($instance['ad_size']) && $instance['ad_size'] == '1' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_html_e('Overridden Size (300*250)', 'newsmax-core'); ?></option>
					<option value="2" <?php if( !empty($instance['ad_size']) && $instance['ad_size'] == '2' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_html_e('From the Script', 'newsmax-core'); ?></option>
				</select>
			</p>
		<?php
		}
	}
}