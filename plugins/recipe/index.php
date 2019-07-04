<?php
/**
 * Plugin Name: Recipe
 * Description: A simple Wordpress plugin that allows to create recipes and rate those recipes
 * Version: 1.1
 * Author: Michael
 * Author URI: http://
 * Text Domain: recipe
 */

if (!function_exists('add_action')) {
    echo 'Not allowed!';
    exit();
}

// Setup
define('RECIPE_PLUGIN_URL', __FILE__);

// Includes
include('includes/activate.php');
include('includes/init.php');
include('includes/admin/init.php');
include('process/save-post.php');
include('process/filter-content.php');
include('includes/front/enqueue.php');
include('process/rate-recipe.php');
include(dirname(RECIPE_PLUGIN_URL).'/includes/widgets.php');
include(dirname(RECIPE_PLUGIN_URL).'/includes/widgets/daily-recipe.php');

// Hooks
register_activation_hook(__FILE__, 'r_activate_plugin');
add_action('init', 'recipe_init');
add_action('admin_init', 'recipe_admin_init');
add_action('save_post_recipe', 'r_save_post_admin', 10, 3);
add_filter('the_content', 'f_filter_recipe_content');
add_action('wp_enqueue_scripts', 'r_enqueue_scripts', 9999);
add_action('wp_ajax_r_rate_recipe', 'r_rate_recipe');
add_action('wp_ajax_nopriv_r_rate_recipe', 'r_rate_recipe');
add_action('widgets_init', 'r_widgets_init');

// Shortcodes