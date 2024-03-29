<?php

function r_save_post_admin($post_id, $post, $update ){
    if(!$update){
        return;
    }

    // Get data
    $recipe_data_get = get_post_meta( $post_id, 'recipe_data', true );

    $recipe_data                    =   array();
    $recipe_data['ingredients']     =   sanitize_text_field( $_POST['r_inputIngredients'] );
    $recipe_data['time']            =   sanitize_text_field( $_POST['r_inputTime'] );
    $recipe_data['utensils']        =   sanitize_text_field( $_POST['r_inputUtensils'] );
    $recipe_data['level']           =   sanitize_text_field( $_POST['r_inputLevel'] );
    $recipe_data['meal_type']       =   sanitize_text_field( $_POST['r_inputMealType'] );
    $recipe_data['rating']          =  $recipe_data_get['rating'] > 0 ? $recipe_data_get['rating'] : 0;
    $recipe_data['rating_count']    =  $recipe_data_get['rating_count'] > 0 ? $recipe_data_get['rating_count'] : 0;



    update_post_meta( $post_id, 'recipe_data', $recipe_data );
}