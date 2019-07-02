<?php

function sj_setup_theme(){
    register_nav_menu('primery', __('Primery Menu', 'newtheme') );
    register_nav_menu('footer-menu', __('Footer Menu', 'newtheme') );
}