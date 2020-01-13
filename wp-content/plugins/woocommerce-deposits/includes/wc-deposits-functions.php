<?php
/*Copyright: © 2017 Webtomizer.
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

if( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
}

/**
 * @return mixed|void
 */
function wc_deposits_deposit_breakdown_tooltip(){
	
	$display_tooltip = get_option( 'wc_deposits_breakdown_cart_tooltip' ) === 'yes';
	
	
	$tooltip_html = '';
	
	if( $display_tooltip && isset( WC()->cart->deposit_info[ 'deposit_breakdown' ] ) && is_array( WC()->cart->deposit_info[ 'deposit_breakdown' ] ) ){
		
		$labels = apply_filters( 'wc_deposits_deposit_breakdown_tooltip_labels' , $labels = array(
			'cart_items' => __( 'Cart items' , 'woocommerce-deposits' ) ,
			'fees' => __( 'Fees' , 'woocommerce-deposits' ) ,
			'taxes' => __( 'Tax' , 'woocommerce-deposits' ) ,
			'shipping' => __( 'Shipping' , 'woocommerce-deposits' ) ,
			'shipping_taxes' => __( 'Shipping Tax' , 'woocommerce-deposits' ) ,
		
		) );
		
		$deposit_breakdown = WC()->cart->deposit_info[ 'deposit_breakdown' ];
		$tip_information = '<ul>';
		foreach( $deposit_breakdown as $component_key => $component ){
			
			if( $component === 0 ){
				continue;
			}
			switch( $component_key ){
				case 'cart_items' :
					$tip_information .= '<li>' . $labels[ 'cart_items' ] . ' : ' . wc_price( $component ) . '</li>';
					
					break;
				case 'fees' :
					$tip_information .= '<li>' . $labels[ 'fees' ] . ' : ' . wc_price( $component ) . '</li>';
					break;
				case 'taxes' :
					$tip_information .= '<li>' . $labels[ 'taxes' ] . ' : ' . wc_price( $component ) . '</li>';
					
					break;
				case 'shipping' :
					$tip_information .= '<li>' . $labels[ 'shipping' ] . ' : ' . wc_price( $component ) . '</li>';
					
					break;
				case 'shipping_taxes' :
					$tip_information .= '<li>' . $labels[ 'shipping_taxes' ] . ' : ' . wc_price( $component ) . '</li>';
					
					break;
				default :
					break;
			}
		}
		
		$tip_information .= '</ul>';
		
		$tooltip_html = '<span id="deposit-help-tip" data-tip="' . esc_attr( $tip_information ) . '">&#63;</span>';
	}
	
	return apply_filters( 'woocommerce_deposits_tooltip_html' , $tooltip_html );
}

/**
 * Check if WooCommerce is active
 */
function wc_deposits_woocommerce_is_active(){
	if( ! function_exists( 'is_plugin_active_for_network' ) )
		require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
	// Check if WooCommerce is active
	if( ! in_array( 'woocommerce/woocommerce.php' , apply_filters( 'active_plugins' , get_option( 'active_plugins' ) ) ) ){
		return is_plugin_active_for_network( 'woocommerce/woocommerce.php' );
	}
	return true;
}

/** http://jaspreetchahal.org/how-to-lighten-or-darken-hex-or-rgb-color-in-php-and-javascript/
 * @param $color_code
 * @param int $percentage_adjuster
 * @return array|string
 * @author Jaspreet Chahal
 */
function wc_deposits_adjust_colour( $color_code , $percentage_adjuster = 0 ){
	$percentage_adjuster = round( $percentage_adjuster / 100 , 2 );
	if( is_array( $color_code ) ){
		$r = $color_code[ "r" ] - ( round( $color_code[ "r" ] ) * $percentage_adjuster );
		$g = $color_code[ "g" ] - ( round( $color_code[ "g" ] ) * $percentage_adjuster );
		$b = $color_code[ "b" ] - ( round( $color_code[ "b" ] ) * $percentage_adjuster );
		
		return array( "r" => round( max( 0 , min( 255 , $r ) ) ) ,
			"g" => round( max( 0 , min( 255 , $g ) ) ) ,
			"b" => round( max( 0 , min( 255 , $b ) ) ) );
	} elseif( preg_match( "/#/" , $color_code ) ){
		$hex = str_replace( "#" , "" , $color_code );
		$r = ( strlen( $hex ) == 3 ) ? hexdec( substr( $hex , 0 , 1 ) . substr( $hex , 0 , 1 ) ) : hexdec( substr( $hex , 0 , 2 ) );
		$g = ( strlen( $hex ) == 3 ) ? hexdec( substr( $hex , 1 , 1 ) . substr( $hex , 1 , 1 ) ) : hexdec( substr( $hex , 2 , 2 ) );
		$b = ( strlen( $hex ) == 3 ) ? hexdec( substr( $hex , 2 , 1 ) . substr( $hex , 2 , 1 ) ) : hexdec( substr( $hex , 4 , 2 ) );
		$r = round( $r - ( $r * $percentage_adjuster ) );
		$g = round( $g - ( $g * $percentage_adjuster ) );
		$b = round( $b - ( $b * $percentage_adjuster ) );
		
		return "#" . str_pad( dechex( max( 0 , min( 255 , $r ) ) ) , 2 , "0" , STR_PAD_LEFT )
			. str_pad( dechex( max( 0 , min( 255 , $g ) ) ) , 2 , "0" , STR_PAD_LEFT )
			. str_pad( dechex( max( 0 , min( 255 , $b ) ) ) , 2 , "0" , STR_PAD_LEFT );
		
	}
}

/**
 * @brief returns the frontend colours from the WooCommerce settings page, or the defaults.
 *
 * @return array
 */

function wc_deposits_woocommerce_frontend_colours(){
	$colors = (array) get_option( 'woocommerce_colors' );
	if( empty( $colors[ 'primary' ] ) )
		$colors[ 'primary' ] = '#ad74a2';
	if( empty( $colors[ 'secondary' ] ) )
		$colors[ 'secondary' ] = '#f7f6f7';
	if( empty( $colors[ 'highlight' ] ) )
		$colors[ 'highlight' ] = '#85ad74';
	if( empty( $colors[ 'content_bg' ] ) )
		$colors[ 'content_bg' ] = '#ffffff';
	return $colors;
}


/**
 * @return bool
 */
function wcdp_checkout_mode(){
	
	return get_option( 'wc_deposits_checkout_mode_enabled' ) === 'yes';
}

/**
 * @param $product
 * @return float
 */
function wc_deposits_calculate_product_deposit( $product ){
	
	$product_type = $product->get_type();
	
	if( $product_type === 'variation' ){
		
		$parent = wc_get_product( $product->get_parent_id() );
		
		$deposit_enabled = $parent->get_meta( '_wc_deposits_enable_deposit' , true );
	} else{
		$deposit_enabled = $product->get_meta( '_wc_deposits_enable_deposit' , true );
		
	}
	
	
	if( $deposit_enabled === 'yes' ){
		
		if( $product_type === 'variation' ){
			
			$parent = wc_get_product( $product->get_parent_id() );
			$deposit = $parent->get_meta( '_wc_deposits_deposit_amount' , true );
			$amount_type = $parent->get_meta( '_wc_deposits_amount_type' , true );
			
		} else{
			
			$deposit = $product->get_meta( '_wc_deposits_deposit_amount' , true );
			$amount_type = $product->get_meta( '_wc_deposits_amount_type' , true );
			
		}
		
	
		
		
		$woocommerce_prices_include_tax = get_option( 'woocommerce_prices_include_tax' );
		
		if( $woocommerce_prices_include_tax === 'yes' ){
			
			$amount = wc_get_price_including_tax( $product );
			
		} else{
			$amount = wc_get_price_excluding_tax( $product );
			
		}
		
		switch( $product_type ){
			
			
			case 'subscription' :
				if( class_exists( 'WC_Subscriptions_Product' ) ){
					
					$amount = WC_Subscriptions_Product::get_sign_up_fee( $product );
					if( $amount_type === 'fixed' ){
					} else{
						$deposit = $amount * ( $deposit / 100.0 );
					}
					
				}
				break;
			case 'yith_bundle' :
				$amount = $product->price_per_item_tot;
				if( $amount_type === 'fixed' ){
				} else{
					$deposit = $amount * ( $deposit / 100.0 );
				}
				break;
			case 'variable' :
				
				if( $amount_type === 'fixed' ){
				} else{
					$deposit = $amount * ( $deposit / 100.0 );
				}
				break;
			
			default:
				
			
				if( $amount_type !== 'fixed' ){
		
					$deposit = $amount * ( $deposit / 100.0 );
				}
				
				break;
		}
		
		return floatval($deposit);
	}
}

/**
 * @brief checks if deposit is enabled for product
 * @param $product_id
 * @return mixed|void
 */
function wc_deposits_is_product_deposit_enabled( $product_id ){
	$enabled = false;
	$product = wc_get_product( $product_id );
	if( $product ){
		$enabled = $product->get_meta( '_wc_deposits_enable_deposit' , true ) === 'yes';
	}
	
	return apply_filters( 'wc_deposits_is_product_deposit_enabled' , $enabled , $product_id );
}




