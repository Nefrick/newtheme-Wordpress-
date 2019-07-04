jQuery(function($){
    $("#recipe_rating").bind('rated', function(){
       $(this).rateit( 'readonly', true );

       var formObj          =   {
           action:      'r_rate_recipe',
           rid:         $(this).data('rid'),
           rating:      $(this).rateit('value')
       }

       $.post( recipe_obj.ajax_url, formObj, function(data){
            console.log(data);
       });
    });
});