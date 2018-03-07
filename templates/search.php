<?php
if ( !defined('ABSPATH') ) {
    //If wordpress isn't loaded load it up.
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once $path . '/wordpress/wp-load.php';
}
global $wpdb;
include(plugin_dir_path(__FILE__).'header.php');
$type=$_GET['type'];
$search=$_GET['search'];
if($type=="country")
    $where = "country like '%$search%'";
else
    $where = "product_id in (select id from {$wpdb->prefix}trans_products_main where product_name like '%$search%')";
$sql = "select a.id as id, product_name,description_short,country,seller_email, pub_date from  (select * from {$wpdb->prefix}trans_listing_main where $where) as a, {$wpdb->prefix}trans_products_main b, {$wpdb->prefix}trans_sellers_main c where a.product_id = b.id and a.seller_id=c.id and c.active=1";

$cnt = $wpdb->query($sql);
$res = $wpdb->get_results($sql);
?>
<div class="w3-container" style="margin-top:3%">
    <ul class="w3-ul w3-card-4">
    <?php
    if($cnt==0){
        echo "No record found for $search in type $type";
    }else{
        foreach($res as $r){
        echo '
        <li class="w3-bar">
            <a href="'.plugin_dir_url(dirname(__FILE__)).'templates/details.php?id='.$r->id.'">
                <img src="'.plugin_dir_url(dirname(__FILE__)).'templates/logos/images_1.png" class="w3-bar-item w3-circle w3-hide-small" style="width:10%">
                <div class="w3-bar-item">
                    <span class="w3-large">Product Name:'.$r->product_name.'</span><br>
                    <span>'.$r->description_short.'</span><br>
                    <span>Country:'.$r->country.'</span><br>
                    <span>Publication date:'.$r->pub_date.'</span><br>
                    <span>Seller email:'.$r->seller_email.'</span><br>
                    
                </div>
            </a>
        </li>
        ';
        }
    }?>
  

    </ul>
</div>
