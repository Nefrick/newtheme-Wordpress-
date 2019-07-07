(function($){
    wp.customize('sj_code_ads', function(value){
        value.bind(function(newval){
            $('.ads-box-new').html(newval);
        })
    })
})(jQuery);