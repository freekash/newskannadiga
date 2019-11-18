<?php
/**
 * @return array
 * single post review config
 */
if ( ! function_exists( 'newsmax_ruby_metabox_single_post_review' ) ) {
	function newsmax_ruby_metabox_single_post_review() {
		return array(
			'id'         => 'newsmax_ruby_metabox_review_options',
			'title'      => esc_html__( 'POST REVIEWS', 'newsmax' ),
			'post_types' => array( 'post' ),
			'priority'   => 'high',
			'context'    => 'normal',
			'fields'     => array(
				array(
					'name'  => esc_html__( 'Review Product', 'newsmax' ),
					'id'    => 'newsmax_ruby_meta_review_enable',
					'class' => 'ruby-review-checkbox',
					'type'  => 'checkbox',
					'desc'  => esc_html__( 'enable or disable the review feature for this post.', 'newsmax' ),
					'std'   => 0,
				),
				array(
					'name'     => esc_html__( 'Review Box Position', 'newsmax' ),
					'id'       => 'newsmax_ruby_meta_review_position',
					'type'     => 'image_select',
					'multiple' => false,
					'desc'     => esc_html__( 'Review Box Position', 'newsmax' ),
					'options'  => newsmax_ruby_theme_config::metabox_review_box_position(),
					'std'      => 'default'
				),
				array(
					'name' => esc_html__( 'Criteria 1 Description', 'newsmax' ),
					'id'   => 'newsmax_ruby_cd1',
					'type' => 'text',
				),
				array(
					'name'       => esc_html__( 'Criteria 1 Score', 'newsmax' ),
					'id'         => 'newsmax_ruby_cs1',
					'type'       => 'slider',
					'js_options' => array(
						'min'  => 0,
						'max'  => 10,
						'step' => .1,
					),
				),
				// Criteria 2 Text & Score
				array(
					'name' => esc_html__( 'Criteria 2 Description', 'newsmax' ),
					'id'   => 'newsmax_ruby_cd2',
					'type' => 'text',
				),
				array(
					'name'       => esc_html__( 'Criteria 2 Score', 'newsmax' ),
					'id'         => 'newsmax_ruby_cs2',
					'type'       => 'slider',
					'js_options' => array(
						'min'  => 0,
						'max'  => 10,
						'step' => .1,
					),
				),
				// Criteria 3 Text & Score
				array(
					'name' => esc_html__( 'Criteria 3 Description', 'newsmax' ),
					'id'   => 'newsmax_ruby_cd3',
					'type' => 'text',
				),
				array(
					'name'       => esc_html__( 'Criteria 3 Score', 'newsmax' ),
					'id'         => 'newsmax_ruby_cs3',
					'type'       => 'slider',
					'js_options' => array(
						'min'  => 0,
						'max'  => 10,
						'step' => .1,
					),
				),
				// Criteria 4 Text & Score
				array(
					'name' => esc_html__( 'Criteria 4 Description', 'newsmax' ),
					'id'   => 'newsmax_ruby_cd4',
					'type' => 'text',
				),
				array(
					'name'       => esc_html__( 'Criteria 4 Score', 'newsmax' ),
					'id'         => 'newsmax_ruby_cs4',
					'type'       => 'slider',
					'js_options' => array(
						'min'  => 0,
						'max'  => 10,
						'step' => .1,
					),
				),
				// Criteria 5 Text & Score
				array(
					'name' => esc_html__( 'Criteria 5 Description', 'newsmax' ),
					'id'   => 'newsmax_ruby_cd5',
					'type' => 'text',
				),
				array(
					'name'       => esc_html__( 'Criteria 5 Score', 'newsmax' ),
					'id'         => 'newsmax_ruby_cs5',
					'type'       => 'slider',
					'js_options' => array(
						'min'  => 0,
						'max'  => 10,
						'step' => .1,
					),
				),
				// Criteria 6 Text & Score
				array(
					'name' => esc_html__( 'Criteria 6 Description', 'newsmax' ),
					'id'   => 'newsmax_ruby_cd6',
					'type' => 'text',
				),
				array(
					'name'       => esc_html__( 'Criteria 6 Score', 'newsmax' ),
					'id'         => 'newsmax_ruby_cs6',
					'type'       => 'slider',
					'js_options' => array(
						'min'  => 0,
						'max'  => 10,
						'step' => .1,
					),
				),
				// Criteria 7 Text & Score
				array(
					'name' => esc_html__( 'Criteria 7 Description', 'newsmax' ),
					'id'   => 'newsmax_ruby_cd7',
					'type' => 'text',
				),
				array(
					'name'       => esc_html__( 'Criteria 7 Score', 'newsmax' ),
					'id'         => 'newsmax_ruby_cs7',
					'type'       => 'slider',
					'js_options' => array(
						'min'  => 0,
						'max'  => 10,
						'step' => .1,
					),
				),
				// Final average
				array(
					'name'  => esc_html__( 'Average Score', 'newsmax' ),
					'id'    => 'newsmax_ruby_as',
					'class' => 'ruby-average-score input-medium',
					'type'  => 'text',
				),
				array(
					'id'    => 'newsmax_ruby_review_pros',
					'name'  => esc_html__( 'Pros Summary Section', 'newsmax' ),
					'class' => 'field-review-summary input-medium',
					'desc'  => esc_html__( 'input pros summary for this review, separated by "/" example: positive 1/positive 2/positive 3', 'newsmax' ),
					'type'  => 'textarea',
				),
				array(
					'id'    => 'newsmax_ruby_review_cons',
					'name'  => esc_html__( 'Cons Summary Section', 'newsmax' ),
					'desc'  => esc_html__( 'input cons summary for this review, separated by "/" example: negative 1/negative 2/negative 3', 'newsmax' ),
					'class' => 'field-review-summary input-medium',
					'type'  => 'textarea',
				),
				array(
					'id'    => 'newsmax_ruby_review_summary',
					'name'  => esc_html__( 'Product Summary Section', 'newsmax' ),
					'class' => 'field-review-summary input-medium',
					'type'  => 'textarea',
				),
			)
		);
	}
}