<?php

function recipe_init(){
    $domain = 'recipe';
    $labels = array(
        'name'               => __( 'Recipes', $domain ),
        'singular_name'      => __( 'Recipe', $domain),
        'menu_name'          => __( 'Recipes', $domain),
        'name_admin_bar'     => __( 'Recipe', $domain),
        'add_new'            => __( 'Add New', $domain),
        'add_new_item'       => __( 'Add New Recipe', $domain),
        'new_item'           => __( 'New Recipe', $domain),
        'edit_item'          => __( 'Edit Recipe', $domain),
        'view_item'          => __( 'View Recipe', $domain),
        'all_items'          => __( 'All Recipes', $domain),
        'search_items'       => __( 'Search Recipes', $domain),
        'parent_item_colon'  => __( 'Parent Recipes:', $domain),
        'not_found'          => __( 'No recipes found.', $domain),
        'not_found_in_trash' => __( 'No recipes found in Trash.', $domain)
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'A custom post type for recipes.', $domain),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'recipe' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
        'taxonomies'         => array( 'category', 'post_tag')
    );

    register_post_type( 'recipe', $args );
    flush_rewrite_rules();
}