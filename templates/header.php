<!doctype html>
<html lang=''>
<head>
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="<?php echo plugin_dir_url(dirname(__FILE__)).'templates/js/script.js'?>" type="text/javascript"></script>
    <link rel="stylesheet" href="<?php echo plugin_dir_url(dirname(__FILE__)).'templates/css/style.css'?>">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <title>Trader's Zone</title>
</head>
<body>
<div class="topnav">
  <a class="active" href="<?php echo plugin_dir_url(dirname(__FILE__)).'templates/index.php'?>">Home</a>
  <a href="<?php echo plugin_dir_url(dirname(__FILE__)).'templates/register.php'?>">Register</a>
  <div class="search-container">
    <form action="<?php echo plugin_dir_url(dirname(__FILE__)).'templates/search.php'?>">
        <select name="type" style="    padding: 6px;
    margin-top: 8px;
    font-size: 17px;
    border: none;">
            <option value="country">Country</option>
            <option value="product">Product</option>
        </select>
        <input type="text" placeholder="Search.." name="search" value="<?php echo $_GET['search']?>" required>
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>