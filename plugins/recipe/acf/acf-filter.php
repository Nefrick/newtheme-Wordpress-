<?php

add_filter('acf/location/rule_types', 'acf_location_rule_types');

function acf_location_rule_types($choices){

    $key    =   __( 'Forms', 'acf' );

    if( !isset( $choices[ $key ] ) ){
         $choices[ $key ] = [];
    }
    $choices[ $key ]['category_id'] = __( 'Category' );
    return $choices;
}

add_filter('acf/location/rule_values/category_id', 'rule_values_category_id' );

function rule_values_category_id($choices){
    $terms  =   get_terms( 'category', [ 'hide_empty' => false ] );

    if( $terms && is_array($terms) ){
        foreach ( $terms as $term ){
            $choices[ $term->term_id ] = $term->name;
        }
    }

    return $choices;
}

add_filter( 'acf/location/rule_match/category_id', 'rule_match_category_id', 10, 3 );

function rule_match_category_id( $match, $rule, $options ){
    $screen     =   get_current_screen();

    if( $screen->base !== 'term' || $screen->id !== 'edit-category' ){
        return $match;
    }

    $term_id         = $_GET['tag_ID'];
    $select_term     = $rule['value'];

    if( $rule['operator'] === '==' ){
        $match = ( $term_id == $select_term );
    } elseif ( $rule['operator'] === '!=' ){
        $match = ( $term_id != $select_term );
    }
    return $match;
}