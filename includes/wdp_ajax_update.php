<?php
add_action( 'wp_ajax_my_action', 'my_action' );

function my_action() {
	global $wpdb; // this is how you get access to the database
	$id = $_POST['id'];
    $udate = $_POST['udate'];
    $dbfields=array("validity"=>"$udate");
    $where=array("id"=>$id);
    $result = $wpdb->update("{$wpdb->prefix}trans_products_main", $dbfields, $where);
    if($result===false){
       echo "There was an error while updating the record. Please check date format."; 
       
    }else if($result===0){
       echo "Record was not updated"; 
    }else{
       echo "Record was updated successfully"; 
    }
	wp_die(); // this is required to terminate immediately and return a proper response
}
?>