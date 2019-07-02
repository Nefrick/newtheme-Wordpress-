<?php

function sj_widgets() {
    register_sidebar([
        'name'          =>  __( 'My First Theme Sidebar', 'newtheme' ),
        'id'            =>  'sj_sidebar',
        'description'   =>  __( 'Sidebar for the New Theme', 'newtheme' ),
        'class'         =>  '',
        'before_widget' => '<div id="%1$s" class="card my-4 widget %2$s">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<h5 class="card-header">',
        'after_title'   => '</h5><div class="card-body">'
    ]);
}