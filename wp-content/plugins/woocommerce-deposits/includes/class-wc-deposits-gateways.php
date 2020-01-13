<?php
/*Copyright: © 2017 Webtomizer.
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

if( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
}

/**
 * @brief Handle specific gateways
 *
 */
class WC_Deposits_Gateways{
	public function __construct( &$wc_deposits ){
		//    add_filter('woocommerce_paypal_args', array($this, 'paypal_args'));
		add_action( 'woocommerce_order_status_changed', array( $this, 'billplz_update_id' ), 10, 3 );
	}
	
	public function paypal_args( $args ){
		$custom = maybe_unserialize( $args[ 'custom' ] );
		if( is_array( $custom ) ){
			list( $order_id , $order_key ) = $custom;
			$order = wc_get_order( $order_id );
			if( $order ){
				if( $order->get_status() === 'partially-paid' ){
					$args[ 'invoice' ] = $args[ 'invoice' ] . '-WCDP';
					unset( $args[ 'tax_cart' ] );
					unset( $args[ 'discount_amount_cart' ] );
				}
			}
		}
		return $args;
	}

	/**
	 * @brief Fix compatibility issues with the Billplz gateway.
	 */
	public function billplz_update_id( $order_id, $old_status, $new_status ) {
		$order             = wc_get_order( $order_id );
		$order_has_deposit = $order->get_meta( '_wc_deposits_order_has_deposit' , true );
		$deposit_paid      = $order->get_meta( '_wc_deposits_deposit_paid' , true );
		$order_id_data     = get_option( 'billplz_fwoo_order_id_data_' . $order_id, false );
		
		if ( 'yes' === $order_has_deposit && 'yes' === $deposit_paid && false !== $order_id_data ) {

			// Store the original ID created after the first payment.
			if( false === get_option( 'billplz_fwoo_order_id_data_deposit_' . $order_id, false ) ) {
				$md5 = get_option( 'billplz_fwoo_order_id_data_' . $order_id, false );
				add_option( 'billplz_fwoo_order_id_data_deposit_' . $order_id, $md5 );
			}

			$md5_deposit = get_option( 'billplz_fwoo_order_id_data_deposit_' . $order_id, false );
			$md5_new     = substr( md5( $md5_deposit . 'deposit_paid' ), 0, 6 );

			update_option( 'billplz_fwoo_order_id_data_' . $order_id, $md5_new );

			// Remove the transaction ID from the database so the gateway can accept
			// a second payment for the same order.
			// See save_payment() in WC_Billplz_Gateway.
			delete_post_meta( $order_id, '_transaction_id' );
		}
	}
}
