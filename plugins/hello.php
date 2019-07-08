<?php
/**
 * @package Hello_Dolly
 * @version 1.7.2
 */
/*
Plugin Name: Hello Dolly
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Matt Mullenweg
Version: 1.7.2
Author URI: http://ma.tt/
*/

add_filter( 'posts_where', 'modify_posts_where' );

function modify_posts_where( $where ){
    $range = array( 'start' => 80, 'end' => 90 );
    return $where . ' AND id >= ' . $range['start'] . ' AND id <= ' . $range['end'];

}

//$query = new WP_Query( [
//        'post_type'         => 'post',
//        'post_status'       => 'publish',
//        'posts_per_page'    => -1,
//        'fields'            => 'ids'
//    ] );

$query = get_posts( [
    'post_type'         => 'post',
    'post_status'       => 'publish',
    'posts_per_page'    => -1,
    'fields'            => 'ids',
    'suppress_filters'  => false
] );

remove_filter( 'posts_where', 'modify_posts_where' );

//print_r( $query->request );
//var_dump( $query->posts );
//die();