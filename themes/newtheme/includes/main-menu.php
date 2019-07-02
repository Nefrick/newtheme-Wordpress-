<?php
// Remove id <li> Main menu
add_filter( 'nav_menu_item_id', 'filter_pmenu_item_css_id', 10, 4 );
function filter_pmenu_item_css_id( $menu_id, $item, $args, $depth ) {
    return $args->theme_location === 'primery' ? '' : $menu_id;
}

// Change attr class tag <li> Main menu
add_filter( 'nav_menu_css_class', 'filter_nav_pmenu_css_classes', 10, 4 );
function filter_nav_pmenu_css_classes( $classes, $item, $args, $depth ) {
    if ( $args->theme_location === 'primery' ) {
        $classes = [
            'nav-item',
        ];
    }

    return $classes;
}

// Add class to link Main menu
add_filter( 'nav_menu_link_attributes', 'filter_nav_pmenu_link_attributes', 10, 4 );
function filter_nav_pmenu_link_attributes( $attr, $item, $args, $depth ) {
    if ( $args->theme_location === 'primery' ) {
        $attr['class'] = 'nav-link';

        if ( $item->current ) {
            $attr['class'] .= ' active';
        }
    }

    return $attr;
}

// Change main attr Main menu
add_filter( 'wp_nav_menu_args', 'filter_wp_pmenu_args' );
function filter_wp_pmenu_args( $args ) {
    if ( $args['theme_location'] === 'primery' ) {
        $args['container'] = false;
        $args['menu_class'] = 'navbar-nav ml-auto';
        $args['items_wrap'] = '<ul class="%2$s">%3$s</ul>';
    }

    return $args;
}