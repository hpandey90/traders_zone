<?php

$query = "select a.id as id, product_name,description_short,country,seller_email, pub_date from {$wpdb->prefix}trans_listing_main a, {$wpdb->prefix}trans_products_main b, {$wpdb->prefix}trans_sellers_main c where a.product_id = b.id and a.seller_id=c.id and c.active=1";
$cnt = $wpdb->query($query);
$res = $wpdb->get_results($query);
?>
<div class="w3-container" style="margin-top:3%">
    <ul class="w3-ul w3-card-4">
    <?php
    if($cnt==0){
        echo "No record found";
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
