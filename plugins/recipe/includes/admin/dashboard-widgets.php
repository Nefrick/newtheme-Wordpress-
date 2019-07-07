<?php

function sj_add_dashboard_widgets(){
    wp_add_dashboard_widget(
        'sj_latest_pecipe_rating_widget',
        'Latest Recipe Ratings',
        'sj_latest_recipe_rating_display'
    );
}

function sj_latest_recipe_rating_display(){
    global $wpdb;

    $latest_ratings         =   $wpdb->get_results(
        "SELECT * FROM `" . $wpdb->prefix . "recipe_ratings` ORDER BY `id` DESC LIMIT 5"
    );

    echo '<ul>';
    foreach ( $latest_ratings as $rating ){
        $title          =       get_the_title( $rating->recipe_id );
        $permalink      =       get_the_permalink( $rating->recipe_id );

        echo '<li>';
        echo  '<a href="'. $permalink. '">'. $title. '</a>
          received a rating of '. $rating->rating;
        echo '</li>';
    }
    echo '</ul>';
}
