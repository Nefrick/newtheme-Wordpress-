/* php
add_action('woocommerce_view_order', 'pdfDownload');

add_action('woocommerce_before_account_downloads', 'pdfDownload');

function pdfDownload() {
wp_register_script('js_stamper', get_template_directory_uri() . '/assets/js/js-stamper.js' );

wp_localize_script('js_stamper', 'stamper_obj', array(
'ajax_url'          =>  admin_url('admin-ajax.php'),
'security'          =>  wp_create_nonce( "special-security-stamper" ),
'customer_id'       =>  get_current_user_id()
));

wp_enqueue_script('js_stamper');

}
*/

jQuery('a.woocommerce-MyAccount-downloads-file').each(function(){
    var thisBook = this;
    var textButton = jQuery(thisBook).text();
    var product_id = jQuery(thisBook).attr("href").match(/download_file=([0-99]+)/)[1];
    var url_string = jQuery(thisBook).attr("href");
    var url = new URL(url_string);
    var orderKey = url.searchParams.get("order");
    var url_string1 = jQuery(thisBook).attr("href");
    var url1 = new URL(url_string1);
    var downloadId = url1.searchParams.get("key");

    var obj = {};
    obj.textButton = textButton;
    obj.prodId = product_id;
    obj.url_str = url_string;
    obj.url = url;
    obj.orderKey = orderKey;
    obj.url_str1 = url_string1;
    obj.url1 = url1;
    obj.dowloadId = downloadId;
    console.log(obj);
});

jQuery(function($){

    $(document).on('click', 'a.woocommerce-MyAccount-downloads-file', function(event){
        event.preventDefault();

        var thisBook, bookObj, url_string, url, orderKey, product_id;

        thisBook = this;
        product_id = $(thisBook).attr("href").match(/download_file=([0-99]+)/)[1];
        url_string = $(thisBook).attr("href");
        url = new URL(url_string);
        orderKey = url.searchParams.get("order");

        bookObj = {};
        bookObj.action = 'get_pdf_action';
        bookObj.security = stamper_obj.security;
        bookObj.product_id = product_id;
        bookObj.orderKey = orderKey;
        bookObj.customer_id = stamper_obj.customer_id;

    });

    $.post( stamper_obj.ajax_url, bookObj, function(response){

        console.log(response);

        $(thisBook).text('Generating File... Please Wait...');

        if( response.status === 2 ){
//TODO
        } else {
//TODO
        }
    });
});


/* php
add_action( 'wp_ajax_get_pdf_action', 'get_pdf_action' );

function get_pdf_action() {
$response       =     array( 'status' => 1 );

check_ajax_referer( 'special-security-stamper', 'security' );
//TODO
wp_send_json( $response );
}

*/