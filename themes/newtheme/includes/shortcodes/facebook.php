<?php

function sj_facebook_shortcode( $atts, $content = 'Like us on Facebook' ){
    $sj_theme_opts      =   get_option('sj_opts');
    $atts               =   shortcode_atts( array(
        'page'          =>  $sj_theme_opts['facebook']
    ), $atts );

    return '<a href="http://facebook.com/'.$atts['page'].'" class="btn bg-facebook btn-primary btn-sm">
            ' . do_shortcode($content) . '
            </a>';
}

function sj_icon_shortcode( $atts ){
    return '<i class="fa fa-' . $atts['icon'] . '"></i>';
}