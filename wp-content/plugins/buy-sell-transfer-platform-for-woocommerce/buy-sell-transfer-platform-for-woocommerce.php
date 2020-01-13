<?php
/*
Plugin Name: Buy Sell Transfer Platform For Woocommerce
Plugin URI: http://localhost/wordpress
Description: Customers can buy, sell and transfer their pre-orders each other in Woocommerce.
Version: 1.0.0
Author: Leon C
Author URI: http://localhost
License: GPLv2 or later
*/

defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

use Inc\Activate;
use Inc\Deactivate;

if( !class_exists( 'LeonPlugin' ) ) {

	class LeonPlugin 
	{

		public $plugin;

		function __construct() {
			$this->plugin = plugin_basename( __FILE__ );
		}

		function register() {
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );

			add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );

			add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
		}

		public function settings_link( $links ) {
			$settings_link = '<a href="admin.php?page=leon_plugin">Settings</a>';
			array_push( $links, $settings_link );
			return $links;
		}

		public function add_admin_pages() {
			add_menu_page( 'Leon Plugin', 'Leon', 'manage_options', 'leon_plugin', array( $this,'admin_index' ), 'dashicons-store', 110 );
		}

		public function admin_index() {
			require_once plugin_dir_path( __FILE__ ) . 'templates/admin.php';
		}

		function activate() {
			// require_once plugin_dir_path( __FILE__ ) . 'inc/leon-plugin-activate.php';
			Activate::activate();

		}

		function custom_post_type() {
			register_post_type( 'book', ['public' => true, 'label' => 'Books'] );
		}

		function enqueue() {
			// enqueue all our scripts
			wp_enqueue_style( 'mypluginstyle', plugins_url( '/assets/mystyle.css', __FILE__ ) );
		}
	}


	$leonPlugin = new LeonPlugin();
	$leonPlugin->register();

	// activation
	register_activation_hook( __FILE__, array( $leonPlugin, 'activate' ) );

	// deactivation
	register_deactivation_hook( __FILE__, array( 'Deactivate', 'deactivate' ) );	
}





