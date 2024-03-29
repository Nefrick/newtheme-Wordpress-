<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'taskbook_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/CMB2/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

/**
 * Manually render Status field.
 */

function taskbook_status_cb( $field_arg, $field ) {

		$classes 	= $field->row_classes();
		$id				= $field->args( 'id' );
		$label		= $field->args( 'name' );
		$status		= get_post_meta( get_the_ID(), 'task_status', true );

		?>
			<div class="cmb-row custom-field-row <?php echo esc_attr( $classes ); ?>">
				<div class="cmb-th">
					<label><?php echo esc_attr( $label ); ?></label>
				</div>
				<div class="cmb-td">
					<p>
						<?php
							if ( $status != true ) {
								echo 'In progress';
							} else {
								echo 'Completed';
							}
						 ?>
					</p>
				</div>
			</div>
		<?php
}

/**
 * Only show this box in the CMB2 REST API if the user is logged in.
 *
 * @param  bool                 $is_allowed     Whether this box and its fields are allowed to be viewed.
 * @param  CMB2_REST_Controller $cmb_controller The controller object.
 *                                              CMB2 object available via `$cmb_controller->rest_box->cmb`.
 *
 * @return bool                 Whether this box and its fields are allowed to be viewed.
 */
function taskbook_limit_rest_view_to_logged_in_users( $is_allowed, $cmb_controller ) {
	if ( ! is_user_logged_in() ) {
		$is_allowed = false;
	}

	return $is_allowed;
}

add_action( 'cmb2_init', 'taskbook_register_rest_api_box' );
/**
 * Hook in and add a box to be available in the CMB2 REST API. Can only happen on the 'cmb2_init' hook.
 * More info: https://github.com/CMB2/CMB2/wiki/REST-API
 */
function taskbook_register_rest_api_box() {

	$prefix = 'taskbook_';

	$cmb_rest = new_cmb2_box( array(
		'id'            => $prefix .'metabox',
		'title'         => esc_html__( 'Task Book Data', 'taskbook' ),
		'object_types'  => array( 'task' ), // Post type
		'show_in_rest' => WP_REST_Server::ALLMETHODS, // WP_REST_Server::READABLE|WP_REST_Server::EDITABLE, // Determines which HTTP methods the box is visible in.
		// Optional callback to limit box visibility.
		// See: https://github.com/CMB2/CMB2/wiki/REST-API#permissions
		 'get_box_permissions_check_cb' => 'taskbook_limit_rest_view_to_logged_in_users',
	) );

	$cmb_rest->add_field( array(
		'name'       => esc_html__( 'Prediction: What do you think will happen?', 'taskbook' ),
		'id'         => $prefix .'prediction',
		'type'       => 'wysiwyg',
		'options'    => array(
				'textarea_rows' => 5,
		),
	) );

	$cmb_rest->add_field( array(
		'name'       => esc_html__( 'Pre-task level', 'taskbook' ),
		'id'         => $prefix .'pre_level',
		'type'       => 'radio',
		'options'    => array(
				'5' => esc_html__('Very relaxed', 'taskbook'),
				'4' => esc_html__('Somewhat relaxed', 'taskbook'),
				'3' => esc_html__('Neutral', 'taskbook'),
				'2' => esc_html__('Somewhat stressed', 'taskbook'),
				'1' => esc_html__('Very stressed', 'taskbook'),
		),
		'before' => '<p>' . esc_html__( 'What is your stress level when thinking about the upcoming task? ') .'</p>',
	) );

	$cmb_rest->add_field( array(
		'name'       => esc_html__( 'Outcome: What actually happened?', 'taskbook' ),
		'id'         => $prefix .'outcome',
		'type'       => 'wysiwyg',
		'options'    => array(
				'textarea_rows' => 5,
		),
	) );

	$cmb_rest->add_field( array(
		'name'       => esc_html__( 'Post-task level', 'taskbook' ),
		'id'         => $prefix .'post_level',
		'type'       => 'radio',
		'options'    => array(
				'5' => esc_html__('Very relaxed', 'taskbook'),
				'4' => esc_html__('Somewhat relaxed', 'taskbook'),
				'3' => esc_html__('Neutral', 'taskbook'),
				'2' => esc_html__('Somewhat stressed', 'taskbook'),
				'1' => esc_html__('Very stressed', 'taskbook'),
		),
		'before' => '<p>' . esc_html__( 'What was the actual experience of working with this task? ') .'</p>',
	) );

	$cmb_rest->add_field( array(
		'name'       			=> esc_html__( 'Task status', 'taskbook' ),
		'id'         			=> $prefix .'task_staatus',
		'render_row_cb' 	=> 'taskbook_status_cb',
		) );
}
