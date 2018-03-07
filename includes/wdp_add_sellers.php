<?php
function wdp_add_sellers(){
    global $wpdb;
    if (isset($_GET['seller'])) {
        foreach($_GET['seller'] as $seller) {
            $str.="$seller,";
        }
        $str = substr_replace($str, "", -1);
        $query = "update {$wpdb->prefix}trans_sellers_main set active=1 where id in($str)";
        $wpdb->query($query);
    }
    
    $query = "select id, seller_name, seller_email from {$wpdb->prefix}trans_sellers_main where active=0";
    $cnt = $wpdb->query($query);
    $res = $wpdb->get_results($query);
    echo '<div class="content-area">
        <div class="site-main">
            <form action="admin.php">
            <input type="hidden" name="page" value="wdp_add_sellers">
            <div>
                <span><h1>Approve new sellers</h1></span>';
                if($cnt==0){
                    echo 'There are no pending requests';
                }else{
                    echo "<ul>"; 
                    foreach($res as $r){
                        echo "<li>    <input type='checkbox' name='seller[]' value='$r->id'>
".$r->seller_name."</li>"; 
                    }
                    echo "</ul>"; 
                }
            echo '</div>
            <input type="submit" class="button action" id="user-submit-button" value="Approve Sellers">
            </form>';
    $query = "select seller_name from {$wpdb->prefix}trans_sellers_main where active=1";
    $cnt = $wpdb->query($query);
    $res = $wpdb->get_results($query);
            echo '<div style="margin-top:5%">
                <span><h1>Approved sellers</h1></span>';
                if($cnt==0){
                    echo 'There are no sellers';
                }else{
                    echo "<ul>"; 
                    foreach($res as $r){
                        echo "<li>".$r->seller_name."</li>"; 
                    }
                    echo "</ul>"; 
                }
            echo '</div></div></div>';
}
?>