<?php
function wdp_set_param(){
    if (isset($_GET['product_name'])) {
        global $wpdb;
        $prod_name = $_GET['product_name'];
        $insert = "Insert into {$wpdb->prefix}trans_products_main(product_name,validity) value('$prod_name',now())";
        if($wpdb->query($insert)){
            $msg = "Product $prod_name successfully added";
        }else{
            $msg = "There was an error while adding the product $prod_name.";
        }
    }
?>
<div id="primary" class="content-area">
    <div id="main" class="site-main">
        <div style="width: 70%; margin: 0 auto;">
            <h1>Add product</h1>
            <form action="admin.php">
                <input type="hidden" name="page" value="wdp_set_param">
                <input type="text" id="user-name" name="product_name" placeholder="Product Name" style="margin-bottom: 10px;">
                <input type="submit" class="button action" id="user-submit-button" value="Add Product">
            </form>
            <h4><?php if (isset($_GET['product_name'])) echo $msg;?></h4>
        </div>
    </div>
</div>
<?php
}
?>