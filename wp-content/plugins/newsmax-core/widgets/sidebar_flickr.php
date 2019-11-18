<?php
//widget flickr
if ( ! function_exists( 'newsmax_ruby_register_sb_widget_flickr' ) ) {
	function newsmax_ruby_register_sb_widget_flickr() {
		register_widget( 'newsmax_ruby_sb_widget_flickr' );
	}

	add_action( 'widgets_init', 'newsmax_ruby_register_sb_widget_flickr' );
}

if(!class_exists('newsmax_ruby_sb_widget_flickr')){
	class newsmax_ruby_sb_widget_flickr extends WP_Widget {

		function __construct() {
			$widget_ops = array(
				'classname'   => 'sb-widget-flickr',
				'description' => esc_html__( '[Sidebar Widget] Display flickr images grid layout in sidebar section', 'newsmax-core' )
			);
			parent::__construct( 'newsmax_ruby_sb_widget_flickr', esc_html__( '[SIDEBAR] - Flickr Grid', 'newsmax-core' ), $widget_ops );
		}

		//render widget
		function widget( $args, $instance ) {

			extract($args, EXTR_SKIP);

			echo $before_widget;
			$title      = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance );
			$flickr_id  = ( ! empty( $instance['flickr_id'] ) ) ? $instance['flickr_id'] : '';
			$num_images = ( ! empty( $instance['img_num'] ) ) ? $instance['img_num'] : '';
			$num_column = ( ! empty( $instance['columns'] ) ) ? $instance['columns'] : 'col-xs-3';
			$tags       = ( ! empty( $instance['tags'] ) ) ? $instance['tags'] : '';

			if ( ! empty( $title ) ) {
				echo $before_title . esc_attr( $title ) . $after_title;
			}

			$cache = get_transient( 'newsmax_ruby_sb_widget_flickr_cache' );

			if ( empty( $cache ) ) {
				$flickr_data = newsmax_ruby_data_flickr( $flickr_id, 'newsmax_ruby_sb_widget_flickr_cache', $num_images, $tags );
			} else {
				$flickr_data = $cache;
			}?>

			<div class="flickr-content-wrap row">
				<?php if(!empty($flickr_data)) : ?>
					<?php foreach ($flickr_data as $item): ?>
						<div class="flickr-el <?php echo esc_attr($num_column) ?>">
							<a href="<?php echo esc_url($item['link']); ?>">
								<img src="<?php echo esc_url($item['media']); ?>" alt="<?php echo esc_attr($item['title']); ?>"/>
							</a>
						</div>
					<?php endforeach; ?>
				<?php else : ?>
					<div class="ruby-error"><?php esc_html_e('Configuration error or no pictures...', 'newsmax-core') ?></div>
				<?php endif; ?>

			</div>
			<?php
			echo $after_widget;
		}


		function update( $new_instance, $old_instance ) {
			$instance              = $old_instance;
			$instance['title']     = strip_tags( $new_instance['title'] );
			$instance['flickr_id'] = strip_tags( $new_instance['flickr_id'] );
			$instance['img_num']   = absint( strip_tags( $new_instance['img_num'] ) );
			$instance['tags']      = strip_tags( $new_instance['tags'] );
			$instance['columns']   = strip_tags( $new_instance['columns'] );

			delete_transient( 'newsmax_ruby_sb_widget_flickr_cache' );

			return $instance;
		}

		function form( $instance ) {
			$instance = wp_parse_args(
				(array) $instance,
				array(
					'title'     => esc_html__( 'Flickr Gallery', 'newsmax-core' ),
					'flickr_id' => '',
					'img_num'   => 6,
					'tags'      => '',
					'columns'   => 'col-xs-4'
				) ); ?>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><strong><?php esc_attr_e('Title:', 'newsmax-core') ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('flickr_id')); ?>"><strong><?php esc_attr_e('Flickr User ID:', 'newsmax-core') ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('flickr_id')); ?>" name="<?php echo esc_attr($this->get_field_name('flickr_id')); ?>" type="text" value="<?php echo esc_attr($instance['flickr_id']); ?>"/>
			</p>
			<p><a href="http://www.idgettr.com" target="_blank"><?php esc_attr_e('Get Flickr Id','newsmax-core') ?></a></p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('img_num')); ?>"><strong><?php esc_attr_e('Limit Image Number:', 'newsmax-core') ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('img_num')); ?>" name="<?php echo esc_attr($this->get_field_name('img_num')); ?>" type="text" value="<?php echo esc_attr($instance['img_num']); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('tags')); ?>"><?php esc_attr_e('Tags (optional, Separate tags with comma. e.g. tag1,tag2):', 'newsmax-core'); ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id('tags')); ?>" name="<?php echo esc_attr($this->get_field_name('tags')); ?>" type="text" value="<?php echo esc_attr($instance['tags']); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'columns' )); ?>"><strong><?php esc_attr_e('Number of Columns:', 'newsmax-core'); ?></strong></label>
				<select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'columns' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'columns' )); ?>" >
					<option value="col-xs-6" <?php if( !empty($instance['columns']) && $instance['columns'] == 'col-xs-6' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('2 columns', 'newsmax-core'); ?></option>
					<option value="col-xs-4" <?php if( !empty($instance['columns']) && $instance['columns'] == 'col-xs-4' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('3 columns', 'newsmax-core'); ?></option>
					<option value="col-xs-3" <?php if( !empty($instance['columns']) && $instance['columns'] == 'col-xs-3' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('4 columns', 'newsmax-core'); ?></option>
				</select>
			</p>

		<?php
		}
	}
}
