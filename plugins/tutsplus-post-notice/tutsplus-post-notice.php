<?php

/**
 * Plugin Name: Tuts+ Post Notice
 * Version: 1.0.0
 */

// If this file is called directly, abort.

if ( ! defined('WPINC' ) ) {
    die;
}

require_once( plugin_dir_path(__FILE__). 'class-tutsplus-post-notice-display.php' );
require_once( plugin_dir_path(__FILE__). 'class-tutsplus-post-editor.php' );
require_once( plugin_dir_path(__FILE__). 'class-tutsplus-post-notice.php' );

function tutsplus_post_notice_start(){

    if( is_admin() ){

        $post_editor = new TutsPlus_Post_Notice_Editor();
        $post_notice = new TutsPlus_Post_Notice( $post_editor );

    } else {

        $post_notice = new TutsPlus_Post_Notice_Display();
    }

    $post_notice->initialize();
}

tutsplus_post_notice_start();