<?php

function js_admin_enqueue(){

    if(!isset($_GET['page']) || $_GET['page'] != 'sj_theme_opts'){
        return;
    }
    wp_register_style( 'sj_bootstrap', get_template_directory_uri() . '/assets/styles/bootstrap.css');
    wp_enqueue_style('sj_bootstrap');

    wp_register_script('sj_options', get_template_directory_uri() . '/assets/scripts/options.js', array(), false, true );
    wp_enqueue_media();
    wp_enqueue_script('sj_options');

}