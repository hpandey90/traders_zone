<?php
function trans_engine_enqueue(){
    wp_enqueue_style('customstyle',plugin_dir_path(__FILE__).'css/style.css',array(),'1.0','all');
    wp_enqueue_style('customjs',plugin_dir_path(__FILE__).'js/script.js',array(),'1.0',false);
}
add_action('wp_enqueue_scripts','trans_engine_enqueue');
?>