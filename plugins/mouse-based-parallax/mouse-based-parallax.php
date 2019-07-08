<?php
/**
 *  Plugin Name: Mouse-Based-Parallax Sunset
 */

add_action( 'login_header', 'mbps_add_template' );
add_action( 'login_enqueue_scripts', 'mbps_enqueue_assets' );

function mbps_add_template(){
    include __DIR__ . '/template.php';
}

function mbps_enqueue_assets(){
    wp_enqueue_style( 'mbps-styles', plugins_url('/assets/style.css', __FILE__ ) );
    wp_enqueue_script( 'mbps-script', plugins_url('/assets/scripts.js', __FILE__ ) );

}