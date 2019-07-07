<?php

function sj_customize_register( $wp_customize )
{

    $wp_customize->add_section('sj_color_theme_section', array(
        'title' => __('Site Color', 'newtheme'),
        'priority' => 30
    ));

    $wp_customize->add_setting('header_bg_color', array(
        'default' => '#4285f4',
        'transport' => 'refresh'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control ($wp_customize, 'header_bg_color', array(
        'label' => __('Header Color', 'newtheme'),
        'section' => 'sj_color_theme_section',
        'settings' => 'header_bg_color',
    )));

    $wp_customize->add_section('sj_ads', array(
        'title' => __('Site Advertising', 'newtheme'),
        'priority' => 30
    ));

    $wp_customize->add_setting('sj_code_ads', array(
        'default' => '',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control( new WP_Customize_Control ($wp_customize, 'sj_code_ads', array(
        'label'             =>  __( 'Advertising', 'newtheme' ),
        'section'           =>  'sj_ads',
        'settings'          =>  'sj_code_ads',
        'type'              =>  'textarea'
    )));

}
