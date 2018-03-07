<?php
/*
Plugin Name: Trader's Zone
Version: 1.0
Description: Buy and sell products across globe
Author: Himanshu Pandey
*/

//Exit if accessed directly
if(!defined('ABSPATH'))
    exit;

require_once(plugin_dir_path(__FILE__).'includes/wdp_trans_install.php');
require_once(plugin_dir_path(__FILE__).'includes/wdp_set_param.php');
require_once(plugin_dir_path(__FILE__).'includes/wdp_add_sellers.php');
require_once(plugin_dir_path(__FILE__).'includes/wdp_products.php');
require_once(plugin_dir_path(__FILE__).'includes/wdp_ajax_update.php');
register_activation_hook( __FILE__, 'wdp_db_create' );
register_activation_hook( __FILE__, 'insert_into_custom_table' );

function wdp_admin_menu(){
}
function wdp_admin_menu_option(){
    add_menu_page('Trans Admin Settings', 'Trans Admin', 'manage_options', 'wdp_admin_menu', 'wdp_admin_menu', 'dashicons-businessman', 200);
    add_submenu_page('wdp_admin_menu','Parameters', 'Parameters','manage_options', 'wdp_set_param', 'wdp_set_param');
    add_submenu_page('wdp_admin_menu','Sellers', 'Sellers','manage_options', 'wdp_add_sellers', 'wdp_add_sellers');
    add_submenu_page('wdp_admin_menu','Products', 'Products','manage_options', 'wdp_products', 'wdp_products');
    remove_submenu_page('wdp_admin_menu','wdp_admin_menu');
}
add_action( 'admin_menu', 'wdp_admin_menu_option' );



function wdp_custom_template( $template )
{
        $template = plugin_dir_path( __FILE__ ).$dir."templates/index.php";
        return $template;
}
add_filter( 'template_include', 'wdp_custom_template' );
?>