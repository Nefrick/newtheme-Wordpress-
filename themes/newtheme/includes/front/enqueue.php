<?php

function sj_enqueue() {
    wp_register_style( 'sj_bootstrap', get_template_directory_uri() . '/assets/styles/bootstrap.css');
    wp_register_style( 'sj_main', get_template_directory_uri() . '/assets/styles/main.css');
    wp_register_style( 'sj_roboto', 'http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900');
    wp_register_style( 'sj_roboto_mono', 'http://fonts.googleapis.com/css?family=Roboto+Mono:400,300,700');
    wp_register_style( 'sj_swipebox', get_template_directory_uri() . '/assets/vendor/swipebox/swipebox.min.css');
    wp_register_style( 'sj_font_awesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

    wp_enqueue_style('sj_bootstrap');
    wp_enqueue_style('sj_main');
    wp_enqueue_style('sj_roboto');
    wp_enqueue_style('sj_roboto_mono');
    wp_enqueue_style('sj_swipebox');
    wp_enqueue_style('sj_font_awesome');

    wp_register_script('sj_fastclick', get_template_directory_uri() . '/assets/vendor/fastclick/fastclick.js' );
    wp_register_script('sj_modernizr', get_template_directory_uri() . '/assets/vendor/modernizr/modernizr.js' );
    wp_register_script('sj_bootstrap', get_template_directory_uri() . '/assets/scripts/bootstrap.min.js', array(), false, true );
    wp_register_script('sj_rippler', get_template_directory_uri() . '/assets/vendor/rippler/rippler.min.js', array(), false, true );
    wp_register_script('sj_slimscroll', get_template_directory_uri() . '/assets/vendor/slimscroll/slimscroll.min.js', array(), false, true );
    wp_register_script('sj_swipebox', get_template_directory_uri() . '/assets/vendor/swipebox/swipebox.min.js', array(), false, true );
    wp_register_script('sj_app', get_template_directory_uri() . '/assets/scripts/app.js', array(), false, true );

    wp_enqueue_script('jquery');
    wp_enqueue_script('sj_fastclick');
    wp_enqueue_script('sj_modernizr');
    wp_enqueue_script('sj_bootstrap');
    wp_enqueue_script('sj_rippler');
    wp_enqueue_script('sj_slimscroll');
    wp_enqueue_script('sj_swipebox');
    wp_enqueue_script('sj_app');
}