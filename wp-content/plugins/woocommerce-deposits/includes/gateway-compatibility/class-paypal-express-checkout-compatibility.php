<?php
if( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
}


class WCDP_Gateway_PPEC_Compatibility {
	
	
	public function __construct(){
		
		/** GATEWAY COMPATIBILITY */
		add_filter( 'woocommerce_paypal_express_checkout_request_body' , array( $this , 'paypal_express_checkout_request_body' ) );
		
	}
	
	
	public function paypal_express_checkout_request_body( $params ){
		
		if( $params[ 'METHOD' ] === 'SetExpressCheckout' ){
			
			if( isset( WC()->cart->deposit_info ) && WC()->cart->deposit_info[ 'deposit_enabled' ] === true ){
				
				
				
				//delete old params
				foreach( $params as $key => $param ){
					
					if( strpos( $key , 'L_PAYMENTREQUEST_0_' ) !== false ){
						
						unset( $params[ $key ] );
					}
				}
				
				//add new ones
				$new_params = $this->get_cart_params();
				$params = array_merge( $params , $new_params );
				
			}
			
		}
		
		return $params;
		
		
	}
	
	public function get_cart_params(){
		
		
		$deposit_info = WC()->cart->deposit_info;
		
		
		$params = array(
			'PAYMENTREQUEST_0_AMT' => $deposit_info[ 'deposit_amount' ] ,
			'PAYMENTREQUEST_0_ITEMAMT' => $deposit_info[ 'deposit_breakdown' ][ 'cart_items' ] ,
			'PAYMENTREQUEST_0_TAXAMT' => $deposit_info[ 'deposit_breakdown' ][ 'taxes' ] + $deposit_info[ 'deposit_breakdown' ][ 'shipping_taxes' ] ,
			'PAYMENTREQUEST_0_SHIPPINGAMT' => $deposit_info[ 'deposit_breakdown' ][ 'shipping' ] ,
		);
		
		$items = $this->prepare_line_items();
		
		if( $items ){
			$count = 0;
			foreach( $items as $line_item_key => $values ){
				$line_item_params = array(
					'L_PAYMENTREQUEST_0_NAME' . $count => $values[ 'name' ] ,
					'L_PAYMENTREQUEST_0_DESC' . $count => ! empty( $values[ 'description' ] ) ? strip_tags( $values[ 'description' ] ) : '' ,
					'L_PAYMENTREQUEST_0_QTY' . $count => $values[ 'quantity' ] ,
					'L_PAYMENTREQUEST_0_AMT' . $count => $values[ 'amount' ] ,
				);
				
				$params = array_merge( $params , $line_item_params );
				$count++;
			}
		}
		
		return $params;
	}
	
	
	protected function prepare_line_items(){
		
		$settings = wc_gateway_ppec()->settings;
		$decimals = $settings->get_number_of_decimal_digits();
		
		$items = array();
		foreach( WC()->cart->cart_contents as $cart_item_key => $values ){
			
			
			if( isset( $values[ 'deposit' ] ) && $values[ 'deposit' ][ 'enable' ] === 'yes' ){
				
				$amount = round( $values[ 'deposit' ][ 'deposit' ] / $values[ 'quantity' ] , $decimals );
				
			} else{
				
				$amount = round( $values[ 'line_total' ] / $values[ 'quantity' ] , $decimals );
			}
			
			$product = $values[ 'data' ];
			$name = $product->get_name();
			$description = $product->get_description();
			
			
			$item = array(
				'name' => $name ,
				'description' => $description ,
				'quantity' => $values[ 'quantity' ] ,
				'amount' => $amount ,
			);
			
			$items[] = $item;
			
			
		}
		return $items;
		
	}
	
}

return new WCDP_Gateway_PPEC_Compatibility();