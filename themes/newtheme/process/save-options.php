<?php

function sj_save_options(){
    if( !current_user_can( 'edit_theme_options' ) ){
        wp_die( __('You are not allowed to be on this page.') );
    }

    check_admin_referer( 'sj_options_verify' );

    $opts                = get_option( 'sj_opts' );
    $opts['twitter']     = sanitize_text_field( $_POST['sj_inputTwitter'] );
    $opts['facebook']    = sanitize_text_field( $_POST['sj_inputFacebook'] );
    $opts['youtube']     = sanitize_text_field( $_POST['sj_inputYouTube'] );
    $opts['logo_type']   = absint( $_POST['sj_inputLogoType'] );
    $opts['footer']      = $_POST['sj_inputFooter'];
    $opts['logo_img']    = esc_url_raw($_POST['sj_inputLogoImg']);

    update_option('sj_opts', $opts );
    wp_redirect( admin_url('admin.php?page=sj_theme_opts&status=1') );

}