<?php
// Remove id <li> Footer menu
add_filter( 'nav_menu_item_id', 'filter_menu_item_css_id', 10, 4 );
function filter_menu_item_css_id( $menu_id, $item, $args, $depth ) {
    return $args->theme_location === 'footer-menu' ? '' : $menu_id;
}
// Change attr class tag <li> Footer menu
add_filter( 'nav_menu_css_class', 'filter_nav_menu_css_classes', 10, 4 );
function filter_nav_menu_css_classes( $classes, $item, $args, $depth ) {
    if ( $args->theme_location === 'footer-menu' ) {
        $classes = [
            'menu-node',
            'menu-node--main_lvl_' . ( $depth + 1 )
        ];

        if ( $item->current ) {
            $classes[] = 'menu-node--active';
        }
    }

    return $classes;
}

// Change class sub <ul> Footer menu
add_filter( 'nav_menu_submenu_css_class', 'filter_nav_menu_submenu_css_class', 10, 3 );
function filter_nav_menu_submenu_css_class( $classes, $args, $depth ) {
    if ( $args->theme_location === 'footer-menu' ) {
        $classes = [
            'menu',
            'menu--dropdown',
            'menu--vertical'
        ];
    }

    return $classes;
}

// Add class to link Footer menu
add_filter( 'nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 4 );
function filter_nav_menu_link_attributes( $attr, $item, $args, $depth ) {
    if ( $args->theme_location === 'footer-menu' ) {
        $attr['class'] = 'menu-link';

        if ( $item->current ) {
            $attr['class'] .= ' menu-link--active';
        }
    }

    return $attr;
}

// Change main attr Footer menu
add_filter( 'wp_nav_menu_args', 'filter_wp_menu_args' );
function filter_wp_menu_args( $args ) {
    if ( $args['theme_location'] === 'footer-menu' ) {
        $args['container'] = false;
        $args['menu_class'] = 'menu menu--main menu-horizontal';
        $args['items_wrap'] = '<ul class="%2$s">%3$s</ul>';
    }

    return $args;
}