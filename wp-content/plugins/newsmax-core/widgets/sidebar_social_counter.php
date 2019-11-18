<?php
/**
 * widget social counter
 */
if ( ! function_exists( 'newsmax_ruby_register_sb_widget_social_counter' ) ) {
	add_action( 'widgets_init', 'newsmax_ruby_register_sb_widget_social_counter' );

	function newsmax_ruby_register_sb_widget_social_counter() {
		register_widget( 'newsmax_ruby_sb_widget_social_counter' );
	}
}

if ( ! class_exists( 'newsmax_ruby_sb_widget_social_counter' ) ) {
	class newsmax_ruby_sb_widget_social_counter extends WP_Widget {

		function __construct() {
			$widget_ops = array(
				'classname'   => 'sb-widget-social-counter',
				'description' => esc_html__( '[Sidebar Widget] Display number of social followers in sidebar section', 'newsmax-core')
			);

			parent::__construct( 'newsmax_ruby_sb_widget_social_counter', esc_html__( '[SIDEBAR] - Social Counter', 'newsmax-core' ), $widget_ops );
		}

		function widget( $args, $instance ) {

			extract($args, EXTR_SKIP);

			$title                          = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance );
			$style                          = ( ! empty( $instance['style'] ) ) ? esc_attr( $instance['style'] ) : '';
			$facebook_page                  = ( ! empty( $instance['facebook_page'] ) ) ? $instance['facebook_page'] : '';
			$facebook_token                 = ( ! empty( $instance['facebook_token'] ) ) ? $instance['facebook_token'] : '';
			$twitter_user                   = ( ! empty( $instance['twitter_user'] ) ) ? $instance['twitter_user'] : '';
			$twitter_api['consumer_key']    = ( ! empty( $instance['consumer_key'] ) ) ? $instance['consumer_key'] : '';
			$twitter_api['consumer_secret'] = ( ! empty( $instance['consumer_secret'] ) ) ? $instance['consumer_secret'] : '';
			$google_user                    = ( ! empty( $instance['google_user'] ) ) ? $instance['google_user'] : '';
			$google_api                     = ( ! empty( $instance['google_api'] ) ) ? $instance['google_api'] : '';
			$youtube_user                   = ( ! empty( $instance['youtube_user'] ) ) ? $instance['youtube_user'] : '';
			$youtube_channel                = ( ! empty( $instance['youtube_channel'] ) ) ? $instance['youtube_channel'] : '';
			$dribbble_user                  = ( ! empty( $instance['dribbble_user'] ) ) ? $instance['dribbble_user'] : '';
			$dribbble_token                 = ( ! empty( $instance['dribbble_token'] ) ) ? $instance['dribbble_token'] : '';
			$soundcloud_user                = ( ! empty( $instance['soundcloud_user'] ) ) ? $instance['soundcloud_user'] : '';
			$soundcloud_api                 = ( ! empty( $instance['soundcloud_api'] ) ) ? $instance['soundcloud_api'] : '';
			$instagram_api                  = ( ! empty( $instance['instagram_api'] ) ) ? $instance['instagram_api'] : '';
			$pinterest_user                 = ( ! empty( $instance['pinterest_user'] ) ) ? $instance['pinterest_user'] : '';
			$vimeo_user                     = ( ! empty( $instance['vimeo_user'] ) ) ? $instance['vimeo_user'] : '';
			$vk_user                        = ( ! empty( $instance['vk_user'] ) ) ? $instance['vk_user'] : '';

			echo $before_widget;

			if ( ! empty( $title ) ) {
				echo $before_title . esc_attr($title) . $after_title;
			}

			$class_name   = array();
			$class_name[] = 'sb-social-counter social-counter-wrap';
			switch ( $style ) {
				case 1:
					$class_name[] = 'is-style-1 social-counter-icon-color';
					break;
				case 2:
					$class_name[] = 'is-style-2 social-counter-icon-color';
					break;
				case 3:
					$class_name[] = 'is-style-1 social-counter-icon-color-custom';
					break;
				case 4:
					$class_name[] = 'is-style-2 social-counter-icon-color-custom';
					break;
			}

			$class_name = implode( ' ', $class_name ); ?>

			<div class="<?php echo esc_attr($class_name); ?>">

				<?php if ( ! empty( $facebook_page ) ) :
					$option['facebook_page'] = $facebook_page;
					$option['facebook_token'] = $facebook_token;
					$facebook_count          = newsmax_ruby_social_fan::get_sidebar_social_counter( 'facebook_page', $option );
					?>
					<div class="counter-element bg-facebook">
						<a target="_blank" href="https://facebook.com/<?php echo esc_html($facebook_page); ?>" class="facebook" title="facebook"></a>
						<span class="counter-element-left">
							<i class="fa fa-facebook" aria-hidden="true"></i>
							<span class="num-count"><?php echo esc_attr(newsmax_ruby_show_over_100k($facebook_count)); ?></span>
						</span>
						<span class="counter-element-right"><?php echo newsmax_ruby_translation::get_text( 'fans', true ); ?></span>
					</div>
				<?php  endif;

				//twitter counter
				if ( ! empty( $twitter_user ) ) :
					$option['twitter_user'] = $twitter_user;
					$option['twitter_api']  = $twitter_api;
					$twitter_count          = newsmax_ruby_social_fan::get_sidebar_social_counter( 'twitter', $option );
					?>
					<div class="counter-element bg-twitter">
						<a target="_blank" href="https://twitter.com/<?php echo esc_html($twitter_user); ?>" class="twitter" title="twitter"></a>
						<span class="counter-element-left">
							<i class="fa fa-twitter" aria-hidden="true"></i>
							<span class="num-count"><?php echo esc_attr(newsmax_ruby_show_over_100k($twitter_count)); ?></span>
						</span>
						<span class="counter-element-right"><?php echo newsmax_ruby_translation::get_text('followers', true);  ?></span>
					</div>
				<?php endif;


				//google counter
				if ( ! empty( $google_user ) && ! empty( $google_api ) ):
					$option['google_user'] = $google_user;
					$option['google_api']  = $google_api;
					$google_data           = newsmax_ruby_social_fan::get_sidebar_social_counter( 'google', $option );
					?>

					<div class="counter-element bg-google">
						<a target="_blank" href="https://plus.google.com/<?php echo esc_attr( $google_user ); ?>" title="google plus"></a>
					      <span class="counter-element-inner">
					            <i class="fa fa-google-plus" aria-hidden="true"></i>
					            <span class="num-count"><?php echo esc_attr( newsmax_ruby_show_over_100k( $google_data ) ); ?></span>
					      </span>
						<span class="counter-element-right"><?php echo newsmax_ruby_translation::get_text('followers', true); ?></span>
					</div>
				<?php endif;

				//pinterest users
				if ( ! empty( $pinterest_user ) ) :
					$option['pinterest_user'] = $pinterest_user;
					$pinterest_count          = newsmax_ruby_social_fan::get_sidebar_social_counter( 'pinterest', $option );
					?>
					<div class="counter-element bg-pinterest">
						<a target="_blank" href="https://pinterest.com/<?php echo esc_html( $pinterest_user ); ?>" class="pinterest" title="pinterest"></a>
						<span class="counter-element-left">
						<i class="fa fa-pinterest" aria-hidden="true"></i>
						<span
							class="num-count"><?php echo esc_attr( newsmax_ruby_show_over_100k( $pinterest_count ) ); ?></span>
						</span>
						<span class="counter-element-right"><?php echo newsmax_ruby_translation::get_text('followers', true); ?></span>
					</div>
				<?php endif;

				//Instagram counter
				if (!empty($instagram_api)):
					$option['instagram_api'] = $instagram_api;
					$data_instagram = newsmax_ruby_social_fan::get_sidebar_social_counter('instagram', $option);
					if ( empty( $data_instagram ) ) {
						$data_instagram = array(
							'count'     => 0,
							'user_name' => '',
							'url'       => '',
						);
					};
					?>
					<div class="counter-element bg-instagram">
						<a target="_blank" href="<?php echo esc_url( $data_instagram['url'] ) ?>" title="instagram"></a>
						<span class="counter-element-left">
							<i class="fa fa-instagram" aria-hidden="true"></i>
							<span class="num-count"><?php echo esc_attr( newsmax_ruby_show_over_100k( $data_instagram['count'] ) ); ?></span>
						</span>
						<span class="counter-element-right"><?php echo newsmax_ruby_translation::get_text('followers', true); ?></span>
					</div>

				<?php endif;

				//youtube counter
				if ( ! empty( $youtube_user ) || !empty($youtube_channel) ) :
					$option['youtube_user']    = $youtube_user;
					$option['youtube_channel'] = $youtube_channel;
					$youtube_count             = newsmax_ruby_social_fan::get_sidebar_social_counter( 'youtube', $option );
					?>
					<div class="counter-element bg-youtube">
						<?php if($option['youtube_user']) : ?>
						<a target="_blank" href="https://www.youtube.com/user/<?php echo esc_html( $youtube_user ); ?>" title="Youtube"></a>
						<?php else : ?>
						<a target="_blank" href="https://www.youtube.com/channel/<?php echo esc_html( $youtube_channel ); ?>" title="Youtube"></a>
						<?php endif; ?>
						<span class="counter-element-left">
							<i class="fa fa-youtube" aria-hidden="true"></i>
							<span class="num-count"><?php echo esc_attr(newsmax_ruby_show_over_100k($youtube_count)); ?></span>
						</span>
						<span class="counter-element-right"><?php echo newsmax_ruby_translation::get_text('subscribers', true); ?></span>
					</div>
				<?php endif;

				//soundcloud counter
				if ( ! empty( $soundcloud_user ) && ! empty( $soundcloud_api ) ):
					$option['soundcloud_user'] = $soundcloud_user;
					$option['soundcloud_api']  = $soundcloud_api;
					$soundcloud_data           = newsmax_ruby_social_fan::get_sidebar_social_counter( 'soundcloud', $option );
					if ( empty( $soundcloud_data ) ) {
						$soundcloud_data = array(
							'url'   => '',
							'count' => ''
						);
					}
					?>
					<div class="counter-element bg-soundcloud">
						<a target="_blank" href="<?php echo esc_url($soundcloud_data['url']); ?>" title="soundclound"></a>
						<span class="counter-element-left">
							<i class="fa fa-soundcloud" aria-hidden="true"></i>
							<span class="num-count"><?php echo esc_attr(newsmax_ruby_show_over_100k($soundcloud_data['count'])); ?></span>
						</span>
						<span class="counter-element-right"><?php echo newsmax_ruby_translation::get_text('followers', true); ?></span>
					</div>
				<?php endif;

				//vimeo counter
				if ( ! empty( $vimeo_user ) ) :
					$option['vimeo_user'] = $vimeo_user;
					$vimeo_count          = newsmax_ruby_social_fan::get_sidebar_social_counter( 'vimeo', $option );
					?>
					<div class="counter-element bg-vimeo">
						<a target="_blank" href="https://vimeo.com/<?php echo esc_html($vimeo_user); ?>" title="vimeo"></a>
						<span class="counter-element-left">
							<i class="fa fa-vimeo" aria-hidden="true"></i>
							<span class="num-count"><?php echo esc_attr(newsmax_ruby_show_over_100k($vimeo_count)); ?></span>
						</span>
						<span class="counter-element-right"><?php echo newsmax_ruby_translation::get_text('subscribers', true); ?></span>
					</div>
				<?php endif;

				//dribbble counter
				if ( ! empty( $dribbble_user ) || !empty($dribbble_token) ) :
					$option['dribbble_user']  = $dribbble_user;
					$option['dribbble_token'] = $dribbble_token;
					$dribbble_count           = newsmax_ruby_social_fan::get_sidebar_social_counter( 'dribbble', $option );
					?>
					<div class="counter-element bg-dribbble">
						<a target="_blank" href="https://dribbble.com/<?php echo esc_html($dribbble_user); ?>" title="dribbble"></a>
						<span class="counter-element-left">
							<i class="fa fa-dribbble" aria-hidden="true"></i>
							<span class="num-count"><?php echo esc_attr(newsmax_ruby_show_over_100k($dribbble_count)); ?></span>
						</span>
						<span class="counter-element-right"><?php echo newsmax_ruby_translation::get_text('followers', true); ?></span>
					</div>
				<?php endif;

				//vk counter
				if ( ! empty( $vk_user ) ) :
					$option['vk_user'] = $vk_user;
					$vk_count          = newsmax_ruby_social_fan::get_sidebar_social_counter( 'vk', $option );
					?>
					<div class="counter-element bg-vk">
						<a target="_blank" href="https://vk.com/<?php echo esc_html($vk_user); ?>" title="VKontakte"></a>
						<span class="counter-element-left">
							<i class="fa fa-vk" aria-hidden="true"></i>
							<span class="num-count"><?php echo esc_attr(newsmax_ruby_show_over_100k($vk_count)); ?></span>
						</span>
						<span class="counter-element-right"><?php echo newsmax_ruby_translation::get_text('members', true); ?></span>
					</div>
				<?php endif; ?>

			</div>

			<?php
			echo $after_widget;
		}


		//update widget
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			
			//remove cache
			delete_transient( 'newsmax_ruby_sb_social_fan_facebook_page' );
			delete_transient( 'newsmax_ruby_sb_social_fan_google' );
			delete_transient( 'newsmax_ruby_sb_social_fan_twitter' );
			delete_transient( 'newsmax_ruby_sb_social_fan_pinterest' );
			delete_transient( 'newsmax_ruby_sb_social_fan_instagram' );
			delete_transient( 'newsmax_ruby_sb_social_fan_youtube' );
			delete_transient( 'newsmax_ruby_sb_social_fan_soundcloud' );
			delete_transient( 'newsmax_ruby_sb_social_fan_vimeo' );
			delete_transient( 'newsmax_ruby_sb_social_fan_dribbble' );
			delete_transient( 'newsmax_ruby_sb_social_fan_vk' );

			$instance['title']           = strip_tags( $new_instance['title'] );
			$instance['style']           = strip_tags( $new_instance['style'] );
			$instance['facebook_page']   = strip_tags( $new_instance['facebook_page'] );
			$instance['facebook_token']  = strip_tags( $new_instance['facebook_token'] );
			$instance['twitter_user']    = strip_tags( $new_instance['twitter_user'] );
			$instance['consumer_key']    = strip_tags( $new_instance['consumer_key'] );
			$instance['consumer_secret'] = strip_tags( $new_instance['consumer_secret'] );
			$instance['google_user']     = strip_tags( $new_instance['google_user'] );
			$instance['google_api']      = strip_tags( $new_instance['google_api'] );
			$instance['youtube_user']    = strip_tags( $new_instance['youtube_user'] );
			$instance['youtube_channel'] = strip_tags( $new_instance['youtube_channel'] );
			$instance['dribbble_user']   = strip_tags( $new_instance['dribbble_user'] );
			$instance['dribbble_token']  = strip_tags( $new_instance['dribbble_token'] );
			$instance['soundcloud_user'] = strip_tags( $new_instance['soundcloud_user'] );
			$instance['soundcloud_api']  = strip_tags( $new_instance['soundcloud_api'] );
			$instance['instagram_api']   = strip_tags( $new_instance['instagram_api'] );
			$instance['pinterest_user']  = strip_tags( $new_instance['pinterest_user'] );
			$instance['vimeo_user']      = strip_tags( $new_instance['vimeo_user'] );
			$instance['vk_user']         = strip_tags( $new_instance['vk_user'] );

			return $instance;
		}

		//form setting
		function form( $instance ) {

			$defaults = array(
				'title'           => esc_html__( 'Stay Connected', 'newsmax-core' ),
				'style'           => 1,
				'facebook_page'   => '',
				'facebook_token'  => '',
				'google_user'     => '',
				'google_api'      => '',
				'youtube_user'    => '',
				'youtube_channel' => '',
				'dribbble_user'   => '',
				'dribbble_token'  => '',
				'twitter_user'    => '',
				'consumer_key'    => '',
				'consumer_secret' => '',
				'soundcloud_user' => '',
				'soundcloud_api'  => '',
				'pinterest_user'  => '',
				'instagram_api'   => '',
				'vimeo_user'      => '',
				'vk_user'         => ''

			);
			$instance = wp_parse_args( (array) $instance, $defaults ); ?>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><strong><?php esc_attr_e('Title:','newsmax-core') ?></strong></label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php if(!empty($instance['title'])) echo esc_attr($instance['title']); ?>" />
			</p>
			<!--style -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'style' )); ?>"><strong><?php esc_attr_e('Style:', 'newsmax-core'); ?></strong></label>
				<select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'style' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'style' )); ?>" >
					<option value="1" <?php if( !empty($instance['style']) && $instance['style'] == '1' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Style 1', 'newsmax-core'); ?></option>
					<option value="3" <?php if( !empty($instance['style']) && $instance['style'] == '3' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Style 1 (Custom Color From Theme Options)', 'newsmax-core'); ?></option>
					<option value="2" <?php if( !empty($instance['style']) && $instance['style'] == '2' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Style 2', 'newsmax-core'); ?></option>
					<option value="4" <?php if( !empty($instance['style']) && $instance['style'] == '4' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Style 2 (Custom Color From Theme Options)', 'newsmax-core'); ?></option>
				</select>
			</p>

			<!--facebook -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'facebook_page' )); ?>"><strong><?php esc_attr_e('Facebook Page Name:', 'newsmax-core');?></strong></label>
				<input type="text" class="widefat"   id="<?php echo esc_attr($this->get_field_id( 'facebook_page' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'facebook_page' )); ?>" value="<?php echo esc_attr($instance['facebook_page']); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'facebook_token' )); ?>"><?php esc_attr_e('Facebook App Token (Optional):', 'newsmax-core');?></label>
				<input type="text" class="widefat"   id="<?php echo esc_attr($this->get_field_id( 'facebook_token' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'facebook_token' )); ?>" value="<?php echo esc_attr($instance['facebook_token']); ?>" />
			</p>
			
			<!--twitter -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'twitter_user' )); ?>"><strong><?php esc_attr_e('Twitter Name:', 'newsmax-core');?></strong></label>
				<input type="text"  class="widefat"  id="<?php echo esc_attr($this->get_field_id( 'twitter_user' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'twitter_user' )); ?>" value="<?php echo esc_attr($instance['twitter_user']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'consumer_key' )); ?>"><?php  esc_html_e('Twitter Consumer Key (Optional):', 'newsmax-core') ?></label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'consumer_key' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'consumer_key' )); ?>" value="<?php echo esc_attr($instance['consumer_key']); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'consumer_secret' )); ?>"><?php  esc_html_e('Twitter Consumer Secret (Optional):', 'newsmax-core') ?></label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'consumer_secret' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'consumer_secret' )); ?>" value="<?php echo esc_attr($instance['consumer_secret']); ?>" />
			</p>
			<p><a href="https://dev.twitter.com/apps" target="_blank"><?php  esc_html_e('Generate your Twitter App', 'newsmax-core'); ?></a></p>

			<!--google plus -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'google_user' )); ?>"><strong><?php esc_attr_e('Goolge+ ID:','newsmax-core');?></strong> </label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'google_user' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'google_user' )); ?>" value="<?php echo esc_attr($instance['google_user']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'google_api' )); ?>"><?php esc_attr_e('Google API Key:','newsmax-core') ?> </label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'google_api' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'google_api' )); ?>" value="<?php echo esc_attr($instance['google_api']); ?>"/>
			</p>
			<p><a target="_blank" href="https://console.developers.google.com/projectselector/apis/library/"><?php esc_attr_e('Click here to get Google API Key.','newsmax-core') ?></a></p>
			<!--pinterest -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'pinterest_user' )); ?>"><strong><?php esc_attr_e('Pinterest User Name:','newsmax-core');?></strong> </label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'pinterest_user' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'pinterest_user' )); ?>" value="<?php echo esc_attr($instance['pinterest_user']); ?>"/>
			</p>
			<!--instagram -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'instagram_api' )); ?>"><strong><?php esc_attr_e('Instagram Access Token Key:','newsmax-core') ?></strong> </label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'instagram_api' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'instagram_api' )); ?>" value="<?php echo esc_textarea($instance['instagram_api']); ?>"/>
			</p>
			<p><?php echo html_entity_decode( esc_html__( 'How to Create an app and generate your Instagram access token on: <a target="_blank" href="https://instagram.themeruby.com/">Instagram access token tutorial</a> website</p>', 'newsmax-core' ) ); ?>
				<!--youtube -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'youtube_user' )); ?>"><strong><?php esc_attr_e('Youtube User Name:', 'newsmax-core');?></strong></label>
				<input type="text"  class="widefat" id="<?php echo esc_attr($this->get_field_id( 'youtube_user' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'youtube_user' )); ?>" value="<?php echo esc_attr($instance['youtube_user']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'youtube_channel' )); ?>"><strong><?php esc_attr_e('Youtube Channel ID:', 'newsmax-core');?></strong></label>
				<input type="text"  class="widefat" id="<?php echo esc_attr($this->get_field_id( 'youtube_channel' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'youtube_channel' )); ?>" value="<?php echo esc_attr($instance['youtube_channel']); ?>"/>
			</p>
			<p><?php esc_attr_e('Use channel ID if you can not enough subscriber to create username for channel. Make sure leave blank user name when input channel ID.','newsmax-core') ?></p>
			<!--sound cloud-->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'soundcloud_user' )); ?>"><strong><?php esc_attr_e('SoundCloud User Name:','newsmax-core');?></strong> </label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'soundcloud_user' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'soundcloud_user' )); ?>" value="<?php echo esc_attr($instance['soundcloud_user']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'soundcloud_api' )); ?>"><?php esc_attr_e('Soundcloud API Key(Client ID) :','newsmax-core') ?> </label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'soundcloud_api' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'soundcloud_api' )); ?>" value="<?php echo esc_attr($instance['soundcloud_api']); ?>"/>
			</p>
			<p><a target="_blank" href="https://soundcloud.com/you/apps/"><?php esc_attr_e('Generate your soundcloud app','newsmax-core') ?></a></p>
			<!--vimeo -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'vimeo_user' )); ?>"><strong><?php esc_attr_e('Vimeo User Name:','newsmax-core');?></strong> </label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'vimeo_user' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'vimeo_user' )); ?>" value="<?php echo esc_attr($instance['vimeo_user']); ?>"/>
			</p>
			<!--dribbble -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'dribbble_user' )); ?>"><strong><?php esc_attr_e('Dribbble User Name:', 'newsmax-core');?></strong></label>
				<input type="text"  class="widefat" id="<?php echo esc_attr($this->get_field_id( 'dribbble_user' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'dribbble_user' )); ?>" value="<?php echo esc_attr($instance['dribbble_user']); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'dribbble_token' )); ?>"><strong><?php esc_attr_e('Dribbble Token (Client Access Token):', 'newsmax-core');?></strong></label>
				<input type="text"  class="widefat" id="<?php echo esc_attr($this->get_field_id( 'dribbble_token' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'dribbble_token' )); ?>" value="<?php echo esc_attr($instance['dribbble_token']); ?>" />
			</p>
			<p><a target="_blank" href="https://dribbble.com/account/applications/new"><?php esc_attr_e('Generate your dribbble app','newsmax-core') ?></a></p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'vk_user' )); ?>"><strong><?php esc_attr_e('VK User Name/ID:', 'newsmax-core');?></strong></label>
				<input type="text"  class="widefat" id="<?php echo esc_attr($this->get_field_id( 'vk_user' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'vk_user' )); ?>" value="<?php echo esc_attr($instance['vk_user']); ?>" />
			</p>
		<?php
		}
	}
}
