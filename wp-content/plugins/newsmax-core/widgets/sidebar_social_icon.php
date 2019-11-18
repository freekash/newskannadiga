<?php
/**
 * widget social icons
 */
if ( ! function_exists( 'newsmax_ruby_register_sb_widget_social_icon' ) ) {
	function newsmax_ruby_register_sb_widget_social_icon() {
		register_widget( 'newsmax_ruby_sb_widget_social_icon' );
	}

	add_action( 'widgets_init', 'newsmax_ruby_register_sb_widget_social_icon' );
}

if ( ! class_exists( 'newsmax_ruby_sb_widget_social_icon' ) ) {
	class newsmax_ruby_sb_widget_social_icon extends WP_Widget {


		function __construct() {
			$widget_ops = array(
				'classname'   => 'sb-widget-social-icon',
				'description' => esc_attr__( '[Sidebar Widget] Display social icons with content in sidebar sections.', 'newsmax-core' )
			);
			parent::__construct( 'newsmax_ruby_sb_widget_social_icon', esc_attr__( '[SIDEBAR] - Social Icons/About', 'newsmax-core' ), $widget_ops );
		}


		function widget( $args, $instance ) {

			if ( ! function_exists( 'newsmax_ruby_render_social_icon' ) || ! function_exists( 'newsmax_ruby_social_profile_web' ) ) {
				return false;
			}

			extract($args, EXTR_SKIP);

			$title       = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance );
			$content     = apply_filters( 'content', ! empty( $instance['short_content'] ) ? $instance['short_content'] : '', $instance );
			$new_tab     = ( ! empty( $instance['new_tab'] ) ) ? $instance['new_tab'] : true;
			$style       = ( ! empty( $instance['style'] ) ) ? $instance['style'] : 'color';
			$social_data = ( ! empty( $instance['social_data'] ) ) ? $instance['social_data'] : '1';

			if ( ! empty( $new_tab ) ) {
				$new_tab = true;
			} else {
				$new_tab = false;
			}

			if ( 1 == $social_data ) {
				$website_social_data = newsmax_ruby_social_profile_web();
			} else {
				$website_social_data       = array();
				$website_social_data['facebook']   = ( ! empty( $instance['social_facebook'] ) ) ? esc_url( $instance['social_facebook'] ) : '';
				$website_social_data['twitter']    = ( ! empty( $instance['social_twitter'] ) ) ? esc_url( $instance['social_twitter'] ) : '';
				$website_social_data['googleplus'] = ( ! empty( $instance['social_googleplus'] ) ) ? esc_url( $instance['social_googleplus'] ) : '';
				$website_social_data['instagram']  = ( ! empty( $instance['social_instagram'] ) ) ? esc_url( $instance['social_instagram'] ) : '';
				$website_social_data['pinterest']  = ( ! empty( $instance['social_pinterest'] ) ) ? esc_url( $instance['social_pinterest'] ) : '';
				$website_social_data['linkedin']   = ( ! empty( $instance['social_linkedin'] ) ) ? esc_url( $instance['social_linkedin'] ) : '';
				$website_social_data['tumblr']     = ( ! empty( $instance['social_tumblr'] ) ) ? esc_url( $instance['social_tumblr'] ) : '';
				$website_social_data['flickr']     = ( ! empty( $instance['social_flickr'] ) ) ? esc_url( $instance['social_flickr'] ) : '';
				$website_social_data['skype']      = ( ! empty( $instance['social_skype'] ) ) ? esc_url( $instance['social_skype'] ) : '';
				$website_social_data['snapchat']   = ( ! empty( $instance['social_snapchat'] ) ) ? esc_url( $instance['social_snapchat'] ) : '';
				$website_social_data['myspace']    = ( ! empty( $instance['social_myspace'] ) ) ? esc_url( $instance['social_myspace'] ) : '';
				$website_social_data['youtube']    = ( ! empty( $instance['social_youtube'] ) ) ? esc_url( $instance['social_youtube'] ) : '';
				$website_social_data['bloglovin']  = ( ! empty( $instance['social_bloglovin'] ) ) ? esc_url( $instance['social_bloglovin'] ) : '';
				$website_social_data['digg']       = ( ! empty( $instance['social_digg'] ) ) ? esc_url( $instance['social_digg'] ) : '';
				$website_social_data['dribbble']   = ( ! empty( $instance['social_dribbble'] ) ) ? esc_url( $instance['social_dribbble'] ) : '';
				$website_social_data['soundcloud'] = ( ! empty( $instance['social_soundcloud'] ) ) ? esc_url( $instance['social_soundcloud'] ) : '';
				$website_social_data['vimeo']      = ( ! empty( $instance['social_vimeo'] ) ) ? esc_url( $instance['social_vimeo'] ) : '';
				$website_social_data['reddit']     = ( ! empty( $instance['social_reddit'] ) ) ? esc_url( $instance['social_reddit'] ) : '';
				$website_social_data['vkontakte']  = ( ! empty( $instance['social_vk'] ) ) ? esc_url( $instance['social_vk'] ) : '';
				$website_social_data['whatsapp']   = ( ! empty( $instance['social_whatsapp'] ) ) ? esc_url( $instance['social_whatsapp'] ) : '';
				$website_social_data['rss']        = ( ! empty( $instance['social_rss'] ) ) ? esc_url( $instance['social_rss'] ) : '';

			}


			if ( empty( $website_social_data ) ) {
				return false;
			}

			echo $before_widget;
			if ( ! empty( $title ) ) {
				echo $before_title . esc_attr( $title ) . $after_title;
			} ?>

			<?php if(!empty($content)) : ?>
				<div class="about-short-content clearfix entry">
					<?php echo html_entity_decode( esc_html( $content ) ); ?>
				</div>
			<?php endif; ?>

			<?php if ( 'color' == $style ) : ?>
				<div class="social-icon-wrap social-icon-color tooltips">
			<?php else : ?>
				<div class="social-icon-wrap social-icon-color-custom tooltips">
			<?php endif; ?>
			<?php echo newsmax_ruby_render_social_icon($website_social_data, $new_tab); ?>
			</div>

			<?php echo $after_widget;
		}


		function update( $new_instance, $old_instance ) {
			$instance                      = $old_instance;
			$instance['title']             = strip_tags( $new_instance['title'] );
			$instance['short_content']     = esc_html( $new_instance['short_content'] );
			$instance['new_tab']           = strip_tags( $new_instance['new_tab'] );
			$instance['style']             = strip_tags( $new_instance['style'] );
			$instance['social_data']       = strip_tags( $new_instance['social_data'] );
			$instance['social_facebook']   = esc_html( $new_instance['social_facebook'] );
			$instance['social_twitter']    = esc_html( $new_instance['social_twitter'] );
			$instance['social_googleplus'] = esc_html( $new_instance['social_googleplus'] );
			$instance['social_instagram']  = esc_html( $new_instance['social_instagram'] );
			$instance['social_pinterest']  = esc_html( $new_instance['social_pinterest'] );
			$instance['social_linkedin']   = esc_html( $new_instance['social_linkedin'] );
			$instance['social_tumblr']     = esc_html( $new_instance['social_tumblr'] );
			$instance['social_flickr']     = esc_html( $new_instance['social_flickr'] );
			$instance['social_skype']      = esc_html( $new_instance['social_skype'] );
			$instance['social_snapchat']   = esc_html( $new_instance['social_snapchat'] );
			$instance['social_myspace']    = esc_html( $new_instance['social_myspace'] );
			$instance['social_youtube']    = esc_html( $new_instance['social_youtube'] );
			$instance['social_bloglovin']  = esc_html( $new_instance['social_bloglovin'] );
			$instance['social_digg']       = esc_html( $new_instance['social_digg'] );
			$instance['social_dribbble']   = esc_html( $new_instance['social_dribbble'] );
			$instance['social_soundcloud'] = esc_html( $new_instance['social_soundcloud'] );
			$instance['social_vimeo']      = esc_html( $new_instance['social_vimeo'] );
			$instance['social_reddit']     = esc_html( $new_instance['social_reddit'] );
			$instance['social_vk']         = esc_html( $new_instance['social_vk'] );
			$instance['social_whatsapp']   = esc_html( $new_instance['social_whatsapp'] );
			$instance['social_rss']        = esc_html( $new_instance['social_rss'] );

			return $instance;
		}


		function form($instance) {
			$defaults = array(
				'title'             => esc_attr__( 'Find Us on Socials', 'newsmax-core' ),
				'short_content'     => '',
				'new_tab'           => true,
				'style'             => 'color',
				'social_data'       => 1,
				'social_facebook'   => '',
				'social_twitter'    => '',
				'social_googleplus' => '',
				'social_instagram'  => '',
				'social_pinterest'  => '',
				'social_linkedin'   => '',
				'social_tumblr'     => '',
				'social_flickr'     => '',
				'social_skype'      => '',
				'social_snapchat'   => '',
				'social_myspace'    => '',
				'social_youtube'    => '',
				'social_bloglovin'  => '',
				'social_digg'       => '',
				'social_dribbble'   => '',
				'social_soundcloud' => '',
				'social_vimeo'      => '',
				'social_reddit'     => '',
				'social_vk'         => '',
				'social_whatsapp'   => '',
				'social_rss'        => '',
			);
			$instance = wp_parse_args( (array) $instance, $defaults );
			?>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><strong><?php esc_attr_e('Title :','newsmax-core') ?></strong></label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php if (!empty($instance['title'])) echo esc_attr($instance['title']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('short_content')); ?>"><strong><?php esc_attr_e('Your Content (allow HTML):','newsmax-core') ?></strong></label>
				<textarea rows="10" cols="50" id="<?php echo esc_attr($this->get_field_id( 'short_content' )); ?>" name="<?php echo esc_attr($this->get_field_name('short_content')); ?>" class="widefat"><?php echo esc_html($instance['short_content']); ?></textarea>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'style' )); ?>"><strong><?php esc_attr_e('Icons color:', 'newsmax-core'); ?></strong></label>
				<select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'style' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'style' )); ?>" >
					<option value="color" <?php if( !empty($instance['style']) && $instance['style'] == 'color' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Default Color', 'newsmax-core'); ?></option>
					<option value="custom" <?php if( !empty($instance['style']) && $instance['style'] == 'custom' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Custom Color From Theme Options', 'newsmax-core'); ?></option>
				</select>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('new_tab')); ?>"><?php esc_attr_e('Open in new tab','newsmax-core'); ?></label>
				<input class="widefat" type="checkbox" id="<?php echo esc_attr($this->get_field_id('new_tab')); ?>" name="<?php echo esc_attr($this->get_field_name('new_tab')); ?>" value="true" <?php if (!empty($instance['new_tab'])) echo 'checked="checked"'; ?>  />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'social_data' )); ?>"><strong><?php esc_attr_e('Social Profiles From:', 'newsmax-core'); ?></strong></label>
				<select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'social_data' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'social_data' )); ?>" >
					<option value="1" <?php if( !empty($instance['social_data']) && $instance['social_data'] == '1' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Theme Options', 'newsmax-core'); ?></option>
					<option value="2" <?php if( !empty($instance['social_data']) && $instance['social_data'] == '2' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Use Custom', 'newsmax-core'); ?></option>
				</select>
			</p>
			<p><?php echo html_entity_decode(esc_html__( 'To set social link from Theme Options, Please go to: <strong>Newsmax -> Share & Socials -> Site Social Profiles</strong>', 'newsmax-core' )); ?></p>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id('social_facebook')); ?>"><strong><?php esc_attr_e('Facebook URL:','newsmax-core') ?></strong></label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('social_facebook')); ?>" name="<?php echo esc_attr($this->get_field_name('social_facebook')); ?>" value="<?php if (!empty($instance['social_facebook'])) echo esc_attr($instance['social_facebook']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('social_twitter')); ?>"><strong><?php esc_html_e('Twitter URL:', 'newsmax-core') ?></strong></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('social_twitter')); ?>" name="<?php echo esc_attr($this->get_field_name('social_twitter')); ?>" value="<?php echo esc_html($instance['social_twitter']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('social_googleplus')); ?>"><strong><?php esc_html_e('Google Plus URL:', 'newsmax-core') ?></strong></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('social_googleplus')); ?>" name="<?php echo esc_attr($this->get_field_name('social_googleplus')); ?>" value="<?php echo esc_html($instance['social_googleplus']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('social_instagram')); ?>"><strong><?php esc_html_e('Instagram URL:', 'newsmax-core') ?></strong></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('social_instagram')); ?>" name="<?php echo esc_attr($this->get_field_name('social_instagram')); ?>" value="<?php echo esc_html($instance['social_instagram']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('social_pinterest')); ?>"><strong><?php esc_html_e('Pinterest URL:', 'newsmax-core') ?></strong></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('social_pinterest')); ?>" name="<?php echo esc_attr($this->get_field_name('social_pinterest')); ?>" value="<?php echo esc_html($instance['social_pinterest']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('social_linkedin')); ?>"><strong><?php esc_html_e('Linkedin URL:', 'newsmax-core') ?></strong></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('social_linkedin')); ?>" name="<?php echo esc_attr($this->get_field_name('social_linkedin')); ?>" value="<?php echo esc_html($instance['social_linkedin']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('social_tumblr')); ?>"><strong><?php esc_html_e('Tumblr URL:', 'newsmax-core') ?></strong></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('social_tumblr')); ?>" name="<?php echo esc_attr($this->get_field_name('social_tumblr')); ?>" value="<?php echo esc_html($instance['social_tumblr']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('social_flickr')); ?>"><strong><?php esc_html_e('Flickr URL:', 'newsmax-core') ?></strong></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('social_flickr')); ?>" name="<?php echo esc_attr($this->get_field_name('social_flickr')); ?>" value="<?php echo esc_html($instance['social_flickr']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('social_skype')); ?>"><strong><?php esc_html_e('Skype URL:', 'newsmax-core') ?></strong></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('social_skype')); ?>" name="<?php echo esc_attr($this->get_field_name('social_skype')); ?>" value="<?php echo esc_html($instance['social_skype']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('social_snapchat')); ?>"><strong><?php esc_html_e('Snapchat URL:', 'newsmax-core') ?></strong></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('social_snapchat')); ?>" name="<?php echo esc_attr($this->get_field_name('social_snapchat')); ?>" value="<?php echo esc_html($instance['social_snapchat']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('social_myspace')); ?>"><strong><?php esc_html_e('Myspace URL:', 'newsmax-core') ?></strong></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('social_myspace')); ?>" name="<?php echo esc_attr($this->get_field_name('social_myspace')); ?>" value="<?php echo esc_html($instance['social_myspace']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('social_youtube')); ?>"><strong><?php esc_html_e('Youtube URL:', 'newsmax-core') ?></strong></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('social_youtube')); ?>" name="<?php echo esc_attr($this->get_field_name('social_youtube')); ?>" value="<?php echo esc_html($instance['social_youtube']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('social_bloglovin')); ?>"><strong><?php esc_html_e('Bloglovin URL:', 'newsmax-core') ?></strong></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('social_bloglovin')); ?>" name="<?php echo esc_attr($this->get_field_name('social_bloglovin')); ?>" value="<?php echo esc_html($instance['social_bloglovin']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('social_digg')); ?>"><strong><?php esc_html_e('Digg URL:', 'newsmax-core') ?></strong></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('social_digg')); ?>" name="<?php echo esc_attr($this->get_field_name('social_digg')); ?>" value="<?php echo esc_html($instance['social_digg']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('social_dribbble')); ?>"><strong><?php esc_html_e('Dribbble URL:', 'newsmax-core') ?></strong></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('social_dribbble')); ?>" name="<?php echo esc_attr($this->get_field_name('social_dribbble')); ?>" value="<?php echo esc_html($instance['social_dribbble']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('social_soundcloud')); ?>"><strong><?php esc_html_e('Soundcloud URL:', 'newsmax-core') ?></strong></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('social_soundcloud')); ?>" name="<?php echo esc_attr($this->get_field_name('social_soundcloud')); ?>" value="<?php echo esc_html($instance['social_soundcloud']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('social_vimeo')); ?>"><strong><?php esc_html_e('Vimeo URL:', 'newsmax-core') ?></strong></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('social_vimeo')); ?>" name="<?php echo esc_attr($this->get_field_name('social_vimeo')); ?>" value="<?php echo esc_html($instance['social_vimeo']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('social_reddit')); ?>"><strong><?php esc_html_e('Reddit URL:', 'newsmax-core') ?></strong></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('social_reddit')); ?>" name="<?php echo esc_attr($this->get_field_name('social_reddit')); ?>" value="<?php echo esc_html($instance['social_reddit']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('social_vk')); ?>"><strong><?php esc_html_e('VKontakte URL:', 'newsmax-core') ?></strong></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('social_vk')); ?>" name="<?php echo esc_attr($this->get_field_name('social_vk')); ?>" value="<?php echo esc_html($instance['social_vk']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('social_whatsapp')); ?>"><strong><?php esc_html_e('Whatsapp URL:', 'newsmax-core') ?></strong></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('social_whatsapp')); ?>" name="<?php echo esc_attr($this->get_field_name('social_whatsapp')); ?>" value="<?php echo esc_html($instance['social_whatsapp']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('social_rss')); ?>"><strong><?php esc_html_e('RSS URL:', 'newsmax-core') ?></strong></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('social_rss')); ?>" name="<?php echo esc_attr($this->get_field_name('social_rss')); ?>" value="<?php echo esc_html($instance['social_rss']); ?>"/>
			</p>
		<?php
		}
	}
}