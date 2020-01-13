<?php 
/*
Plugin Name: Customer sell preorders
Description: Plugin that allow customers to exchange there products and sell.
Author: Amir 
Version: 1.0
*/
?>
<?php
require_once plugin_dir_path(__FILE__) . 'admin/preorder-functions.php';
wp_enqueue_style( 'style', plugins_url( 'admin/css/style.css', __FILE__ ) );
?>