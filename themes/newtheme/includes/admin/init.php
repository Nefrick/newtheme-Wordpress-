<?php

function sj_admin_init() {

    include ( 'enqueue.php' );

    add_action( 'admin_enqueue_scripts', 'js_admin_enqueue' );
    add_action( 'admin_post_sj_save_options', 'sj_save_options' );

}