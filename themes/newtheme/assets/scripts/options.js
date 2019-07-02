(function($){

    var frame                       =   wp.media({
        title :                 'Select or upload logo',
        button:                 {
           text:                'Use this media'
        },
        multiple:               false
    });


    $('#sj_uploadLogoImgBtn').click(function(e){
        e.preventDefault();

        frame.open();
    });

    frame.on('select', function(){
        var attachment          =   frame.state().get('selection').first().toJSON();
        $('input[name=sj_inputLogoImg]').val(attachment.url);
    });
})(jQuery);