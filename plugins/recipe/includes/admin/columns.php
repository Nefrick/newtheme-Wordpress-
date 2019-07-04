<?php

function add_new_recipe_columns( $columns ){
    $new_columns                 =   array();
    $new_columns['cb']           =   '<input type="checkbox" />';
    $new_columns['title']        =    __('Title', 'recipe');
    $new_columns['author']       =    __('Author', 'recipe');
    $new_columns['categories']   =    __('Categories', 'recipe');
    $new_columns['count']        =    __('Rating Count', 'recipe');
    $new_columns['rating']       =    __('Average Rating', 'recipe');
    $new_columns['date']         =    __('Date', 'recipe');

    return $new_columns;
}

function manage_recipe_columns( $column_name, $id ){
    switch ($column_name) {
        case 'count':
            $recipe_data = get_post_meta($id, 'recipe_data', true);
            echo $recipe_data['rating_count'];
            break;
        case 'rating':
            $recipe_data = get_post_meta($id, 'recipe_data', true);
            echo $recipe_data['rating'];
            break;
        default:
            break;
    }
}