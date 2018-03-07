<?php
if ( !defined('ABSPATH') ) {
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once $path . '/wordpress/wp-load.php';
}
global $wpdb;
$query =
"select a.id as id, product_name,description_long,country,seller_email, pub_date,validity from (select * from {$wpdb->prefix}trans_listing_main where id=".$_GET['id'].") as a, {$wpdb->prefix}trans_products_main b, {$wpdb->prefix}trans_sellers_main c where a.product_id = b.id and a.seller_id=c.id and c.active=1";
$cnt = $wpdb->query($query);
$rs = $wpdb->get_results($query);
$r = $rs[0];
include(plugin_dir_path(__FILE__).'header.php');
?>

<div class="w3-container" style="margin-top:3%">
    <?php
    if($cnt==0){
        echo "No record found";
    }else{
        echo '
        <div class="w3-bar w3-card-4">
            <div class="w3-bar-item">
                <div style="float:left;width:50%">
                <div style="margin-top:5%" class="w3-large mt">Product Name:'.$r->product_name.'</div>
                <div style="margin-top:5%">'.$r->description_long.'</div>
                <div style="margin-top:5%">Country:'.$r->country.'</div>
                <div style="margin-top:5%">Publication date:'.$r->pub_date.'</div>
                <div style="margin-top:5%">Expiry date:'.$r->validity.'</div>
                <div style="margin-top:5%">Seller email:'.$r->seller_email.'</div>
                
                </div>
                <div style="float:right">
                <img src="'.plugin_dir_url(dirname(__FILE__)).'templates/logos/images_1.png" class="w3-bar-item w3-circle w3-hide-small">
                </div>
                
            </div>
        </div>
        ';
    }?>
</div>