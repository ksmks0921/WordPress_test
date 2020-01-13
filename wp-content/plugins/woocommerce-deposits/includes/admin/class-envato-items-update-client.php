<?php
if( ! defined( 'ABSPATH' ) ){
	exit;
}


class Envato_items_Update_Client{
	
	private $item_id;
	private $purchase_code;
	private $plugin_file;
	private $update_endpoint;
	private $verify_purchase_endpoint;
	
	function __construct( $item_id , $plugin_file , $update_endpoint , $verify_purchase_endppint , $purchase_code ){
		
		
		$this->item_id = $item_id;
		$this->plugin_file = $plugin_file;
		$this->update_endpoint = $update_endpoint;
		$this->verify_purchase_endpoint = $verify_purchase_endppint;
		$this->purchase_code = $purchase_code;
		
		
	}
	
	function enable(){
		add_filter( 'pre_set_site_transient_update_plugins' , array( $this , 'check_for_update' ) );
	}
	
	
	function verify_purchase_code( $purchase_code ){
		
	
		$args = array( 'body' => array( 'purchase_code' => $purchase_code , 'item_id' => $this->item_id ) );
		
		$request = wp_remote_post( $this->verify_purchase_endpoint , $args );
		
		if( is_array( $request ) && $request[ 'response' ][ 'code' ] == 200 ){
			$response = json_decode( wp_remote_retrieve_body( $request ) , true );
	
			if( is_array($response) && isset( $response[ 'status' ]) && $response[ 'status' ] === 'success'  ){
				
				return 'valid';
				
			} else {
				return 'invalid';
			}
			
		}else {
			//an error occured
			return false;
		}
	}
	
	protected function get_remote_response(){
		
		$response = false;
		$args = array( 'body' => array( 'item_id' => $this->item_id , 'purchase_code' => $this->purchase_code , 'domain' => home_url() ) );
		$request = wp_remote_post( $this->update_endpoint , $args );
		if( is_array( $request ) && $request[ 'response' ][ 'code' ] == 200 ){
			$response = json_decode( wp_remote_retrieve_body( $request ) , true );
		}
		
		return $response;
	}
	
	function check_for_update( $transient ){
		//		if ( empty( $transient->checked ) ) {
		//			return $transient;
		//		}
		
		//make api call
		$api_data = $this->get_remote_response();
		
		//if new update is available add transient
		if( is_array( $api_data ) && isset( $api_data[ 'status' ] ) && $api_data[ 'status' ] === 'success' ){
			
			$plugin_data = get_plugin_data( WP_PLUGIN_DIR . '/' . $this->plugin_file );
			$wp_response = new stdClass();
			
			//insert data from plugin information
			$wp_response->plugin_name = 'Woocommerce Deposits';
			$wp_response->slug = 'woocommerce-deposits';
			$wp_response->version = $plugin_data[ 'Version' ];
			$wp_response->homepage = $plugin_data[ 'PluginURI' ];
			$wp_response->description = $plugin_data[ 'Description' ];
			
			//insert data from api response
			
			//TODO : add plugin icon and tested up to on server side
//			$wp_response->icons = $api_data[ 'icons' ];
//			$wp_response->tested = $api_data[ 'tested' ];
			$wp_response->package = $api_data[ 'package' ];
			$wp_response->new_version = $api_data[ 'new_version' ];
			
			$transient->response[ $this->plugin_file ] = $wp_response;
		}
		
		return $transient;
	}
	
}

