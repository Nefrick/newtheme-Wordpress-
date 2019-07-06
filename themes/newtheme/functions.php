<?php

// Set up
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );

// Includes
include( get_template_directory() . '/includes/front/enqueue.php');
include( get_template_directory() . '/includes/setup.php');
include( get_template_directory() . '/includes/footer-menu.php');
include( get_template_directory() . '/includes/main-menu.php');
include( get_template_directory() . '/includes/widgets.php');
include( get_template_directory() . '/includes/activate.php');
include( get_template_directory() . '/includes/admin/menus.php');
include( get_template_directory() . '/includes/admin/options-page.php');
include( get_template_directory() . '/includes/admin/init.php');
include( get_template_directory() . '/process/save-options.php');
include( get_template_directory() . '/includes/shortcodes/facebook.php');


// Action & Filter Hooks
add_action( 'wp_enqueue_scripts', 'sj_enqueue' );
add_action( 'after_setup_theme', 'sj_setup_theme' );
add_action( 'widgets_init', 'sj_widgets' );
add_action( 'after_switch_theme', 'sj_activate' );
add_action( 'admin_menu', 'sj_admin_menus' );
add_action( 'admin_init', 'sj_admin_init' );

// Shortcodes
add_shortcode( 'ufb', 'sj_facebook_shortcode' );
add_shortcode( 'ui', 'sj_icon_shortcode' );