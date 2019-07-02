<?php

function sj_admin_menus(){
    add_menu_page(
        'New Theme Options',
        'Theme Option',
        'edit_theme_options',
        'sj_theme_opts',
        'sj_theme_opts_page'
    );
}