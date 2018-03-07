<?php
if ( !defined('ABSPATH') ) {
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once $path . '/wordpress/wp-load.php';
}
include(plugin_dir_path(__FILE__).'header.php');
if(isset($_POST['submit'])){    
    $sql = "insert into wp_trans_sellers_main (seller_name,seller_email) values('".$_POST['name']."','".$_POST['email']."')";
    $wpdb->query($sql);
    echo "You have successfully Registered. Please wait for the admin to approve your account.";
}
?>
<link rel="stylesheet" href="<?php echo plugin_dir_url(dirname(__FILE__)).'templates/css/register.css'?>">
<div style="width: 40%;margin: 0 auto;">
    <form class="modal-content" action="" method="post">
        <div class="container">
          <h1>Register</h1>
          <p>Please fill in this form to create an account.</p>
          <hr>
          <label for="Name"><b>Seller Name:</b></label>
          <input type="text" class="inp" style="width: 100%;padding: 15px;margin: 5px 0 22px 0;display: inline-block;border: none;background: #f1f1f1;" placeholder="Enter Your First & Last Name" name="name" required>
            <label for="email"><b>Email</b></label>
          <input type="text" style="width: 100%;padding: 15px;margin: 5px 0 22px 0;display: inline-block;border: none;background: #f1f1f1;" placeholder="Enter Email" name="email" required>
          <div class="clearfix">
            <button style="background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;cursor: pointer;width: 100%;opacity: 0.9;" type="submit" name="submit" class="signupbtn btn">Sign Up</button>
          </div>
        </div>
    </form>
</div>
