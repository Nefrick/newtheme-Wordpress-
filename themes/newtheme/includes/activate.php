<?php

function sj_activate(){
    if( version_compare( get_bloginfo( 'version' ), '4.2', '<' ) ){
        wp_die( __('You must have a minimun version of 4.2 to use this theme.') );
    }
}

$theme_opts                 =   get_option('sj_opts');

if( !$theme_opts ){

    $opts                   =  array(
        'facebook'          => '',
        'twitter'           => '',
        'youtube'           => '',
        'logo_type'         => 1,
        'logo_img'          => '',
        'footer'            => ''
    );

    add_option( 'sj_opts', $opts );
}