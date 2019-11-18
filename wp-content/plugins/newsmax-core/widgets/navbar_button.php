<?php

if ( ! function_exists( 'newsmax_ruby_register_navbar_widget_button' ) ) {
	add_action( 'widgets_init', 'newsmax_ruby_register_navbar_widget_button' );

	function newsmax_ruby_register_navbar_widget_button() {
		register_widget( 'newsmax_ruby_navbar_widget_button' );
	}
}

if ( ! class_exists( 'newsmax_ruby_navbar_widget_button' ) ) {
	class newsmax_ruby_navbar_widget_button extends WP_Widget {

		//register widget
		function __construct() {
			$widget_ops = array(
				'classname'   => 'widget-button',
				'description' => esc_attr__( '[Navigation Widget] Display a button at the navigation bar', 'newsmax-core' )
			);
			parent::__construct( 'newsmax_ruby_navbar_widget_button', esc_attr__( '[NAVIGATION] - Button', 'newsmax-core' ), $widget_ops );

			//add custom style
			add_action('wp_enqueue_scripts', array($this, 'navbar_widget_button_style'));
		}

		//render widget
		function widget($args, $instance)
		{
			extract($args, EXTR_SKIP);

			$button_title = apply_filters( 'widget_title', ! empty( $instance['button_title'] ) ? $instance['button_title'] : '', $instance );
			$button_url   = ( ! empty( $instance['button_url'] ) ) ? $instance['button_url'] : '';
			$new_tab      = ( ! empty( $instance['new_tab'] ) ) ? $instance['new_tab'] : '';

			$target = '';
			if ( ! empty( $new_tab ) ) {
				$target = 'target="_blank"';
			}

			if ( empty( $button_title ) || empty( $button_url ) ) {
				return false;
			}

			echo $before_widget;
			echo '<a class="navbar-btn widget-btn" href="' . esc_html( $button_url ) . '" ' . $target . '>' . $button_title . '</a>';
			echo $after_widget;
		}

		//custom style
		function  navbar_widget_button_style() {

			$widget_id = '';
			$str       = '';

			if ( ! empty( $this->id_base ) ) {
				$widget_id = $this->id_base;
			}

			$widget_options = get_option( $this->option_name );

			if ( is_array( $widget_options ) ) {
				foreach ( $widget_options as $key => $widget_option ) {
					if ( empty( $widget_id ) ) {
						$class_name = '.widget .widget-btn';
					} else {
						$class_name = '#' . $widget_id . '-' . $key . ' .widget-btn';
					}

					$str .= $class_name . ' {';
					if ( ! empty( $widget_option['button_bg'] ) ) {
						$str .= 'background-color: ' . esc_attr( $widget_option['button_bg'] ) . ';';
					}
					if ( ! empty( $widget_option['button_color'] ) ) {
						$str .= 'color: ' . esc_attr( $widget_option['button_color'] ) . ';';
					}
					$str .= '}';

					$str .= $class_name . ':hover {';
					if ( ! empty( $widget_option['button_bg_hover'] ) ) {
						$str .= 'background-color: ' . esc_attr( $widget_option['button_bg_hover'] ) . ';';
					}
					if ( ! empty( $widget_option['button_color_hover'] ) ) {
						$str .= 'color: ' . esc_attr( $widget_option['button_color_hover'] ) . ';';
					}
					$str .= '}';
				}
			}

			//add custom style
			wp_add_inline_style( 'newsmax-ruby-style', $str );

			return false;
		}

		//update forms
		function update( $new_instance, $old_instance ) {

			$instance                       = $old_instance;
			$instance['button_title']       = strip_tags( $new_instance['button_title'] );
			$instance['button_url']         = strip_tags( $new_instance['button_url'] );
			$instance['new_tab']            = strip_tags( $new_instance['new_tab'] );
			$instance['button_bg']          = strip_tags( $new_instance['button_bg'] );
			$instance['button_color']       = strip_tags( $new_instance['button_color'] );
			$instance['button_bg_hover']    = strip_tags( $new_instance['button_bg_hover'] );
			$instance['button_color_hover'] = strip_tags( $new_instance['button_color_hover'] );

			return $instance;
		}

		//form settings
		function form( $instance ) {
			$defaults = array(
				'button_title'       => '',
				'button_url'         => '',
				'new_tab'            => '',
				'button_bg'          => '',
				'button_color'       => '',
				'button_bg_hover'    => '',
				'button_color_hover' => '',
			);
			$instance = wp_parse_args( (array) $instance, $defaults );    ?>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('button_title')); ?>"><strong><?php esc_attr_e('Button Label:', 'newsmax-core') ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('button_title')); ?>" name="<?php echo esc_attr($this->get_field_name('button_title')); ?>" type="text" value="<?php echo esc_attr($instance['button_title']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('button_url')); ?>"><?php esc_attr_e('Button URL:', 'newsmax-core') ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('button_url')); ?>" name="<?php echo esc_attr($this->get_field_name('button_url')); ?>" type="text" value="<?php echo esc_url($instance['button_url']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('new_tab')); ?>"><?php esc_attr_e('Open in new tab','newsmax-core'); ?></label>
				<input class="widefat" type="checkbox" id="<?php echo esc_attr($this->get_field_id('new_tab')); ?>" name="<?php echo esc_attr($this->get_field_name('new_tab')); ?>" value="true" <?php if (!empty($instance['new_tab'])) echo 'checked="checked"'; ?>  />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('button_bg')); ?>"><?php esc_attr_e('BG color (hex color):', 'newsmax-core') ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('button_bg')); ?>" name="<?php echo esc_attr($this->get_field_name('button_bg')); ?>" type="text" value="<?php echo esc_url($instance['button_bg']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('button_color')); ?>"><?php esc_attr_e('Text Color (hex color):', 'newsmax-core') ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('button_color')); ?>" name="<?php echo esc_attr($this->get_field_name('button_color')); ?>" type="text" value="<?php echo esc_url($instance['button_color']); ?>"/>
			</p>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id('button_bg_hover')); ?>"><?php esc_attr_e('Hover BG color (hex color):', 'newsmax-core') ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('button_bg_hover')); ?>" name="<?php echo esc_attr($this->get_field_name('button_bg_hover')); ?>" type="text" value="<?php echo esc_url($instance['button_bg_hover']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('button_color_hover')); ?>"><?php esc_attr_e('Hover Text Color (hex color):', 'newsmax-core') ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('button_color_hover')); ?>" name="<?php echo esc_attr($this->get_field_name('button_color_hover')); ?>" type="text" value="<?php echo esc_url($instance['button_color_hover']); ?>"/>
			</p>
		<?php
		}
	}
}
