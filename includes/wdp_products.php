<?php
function wdp_products(){
    global $wpdb;
    $query = "select id,product_name, validity from {$wpdb->prefix}trans_products_main";
    $res = $wpdb->get_results($query);
    echo '<div class="content-area">
        <div class="site-main">
            <div style="width: 70%;">
                <h1>Products</h1>
                <table>
                <form action="admin.php">';
                    foreach($res as $r){
                        echo "<tr><td>".$r->product_name."</td><td><input type='text' value='".$r->validity."' id='date_".$r->id."'></td><td> <input class='myajax' type='button' value='Update' id='$r->id' ></td><td> <span id='msg_".$r->id."'></span></td></tr>"; 
                    }
    echo '</form></table></div></div></div>';  
}
?>
<?php
add_action('admin_head', 'my_action_javascript');

function my_action_javascript() {
?>
<script type="text/javascript" >
jQuery(document).ready(function($) {
   $('.myajax').click(function(){
       id=this.id;
       udate = document.getElementById("date_"+id).value;
        var data = {
            action: 'my_action',
            id: id,
            udate: udate,
        };

        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
        $.post(ajaxurl, data, function(response) {
            document.getElementById("msg_"+id).innerHTML = response;
        });
    });
});
</script>
<?php
}