<?php
/*
Plugin Name: Task book
Plugin URI:  https://developer.wordpress.org/plugins/the-basics/
Description: Basic WordPress Plugin Header Comment
Version:     0.0.1
Author:      WordPress.org
Author URI:  https://developer.wordpress.org/
Text Domain: taskbook
Domain Path: /languages
License:     GPL3

Task book is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Task book is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Task book. If not, see https://www.gnu.org/licenses/quick-guide-gplv3.en.html.
*/

/**
* Register Task post type.
*/
require_once plugin_dir_path(__FILE__).'includes/posttypes.php';
register_activation_hook(__FILE__, 'taskbook_rewrite_flush');

/**
* Remove Task Logger role.
*/

require_once plugin_dir_path(__FILE__).'includes/roles.php';
register_activation_hook(__FILE__, 'taskbook_register_role');
register_deactivation_hook(__FILE__, 'taskbook_remove_role');

/**
* Add capabilities.
*/
register_activation_hook(__FILE__, 'taskbook_add_capabilities');
register_deactivation_hook(__FILE__, 'taskbook_remove_capabilities');

/**
* Status.
*/

require_once plugin_dir_path(__FILE__).'includes/status.php';

/**
* Add in CMB2 for fun new fields.
*/

require_once plugin_dir_path(__FILE__).'includes/CMB2-functions.php';

/**
 * Grant task access for index pages for certain users.
 */
add_action( 'pre_get_posts', 'taskbook_grant_access' );

function taskbook_grant_access( $query ) {
	// Make sure the query contains a post_type query_var,
	// otherwise it's definitely not a request for Task(s):
	if ( isset($query->query_vars['post_type']) ) {
		// Check if the request is for the Task post type…
		if ( $query->query_vars['post_type'] == 'task' ) {
			// … and that this is a REST request:
			if ( defined( 'REST_REQUEST' ) && REST_REQUEST ) {
				if ( current_user_can( 'editor' ) || current_user_can( 'administrator') ) {
					// If so, Editors and Administrators see all private tasks…
					$query->set( 'post_status', 'private' );
				} elseif ( current_user_can( 'task_logger' ) ) {
					// … and Task Loggers see only their own tasks:
					$query->set( 'post_status', 'private' );
					$query->set( 'author', get_current_user_id() );
				}
			}
		}
	}
}
