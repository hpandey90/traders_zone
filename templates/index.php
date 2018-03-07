<?php

if ( !defined('ABSPATH') ) {
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once $path . '/wordpress/wp-load.php';
}
include(plugin_dir_path(__FILE__).'header.php');
include(plugin_dir_path(__FILE__).'body.php');
include(plugin_dir_path(__FILE__).'footer.php');
?>
