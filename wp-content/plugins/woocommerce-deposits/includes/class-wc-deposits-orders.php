<?php
/*Copyright: © 2017 Webtomizer.
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

if( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
}



class WC_Deposits_Orders{
	
	
	/**
	 * WC_Deposits_Orders constructor.
	 * @param $wc_deposits
	 */
	public function __construct( &$wc_deposits ){
		
		$this->wc_deposits = $wc_deposits;
		
		
		// Payment complete events
		add_action( 'woocommerce_order_status_completed' , array( $this , 'order_status_completed' ) );
		add_action( 'woocommerce_pre_payment_complete' , array( $this , 'pre_payment_complete' ) );
		add_filter( 'woocommerce_payment_complete_reduce_order_stock' , array( $this , 'payment_complete_reduce_order_stock' ) , 10 , 2 );
		
		// Order statuses
		add_filter( 'wc_order_statuses' , array( $this , 'order_statuses' ) );
		add_filter( 'wc_order_is_editable' , array( $this , 'order_is_editable' ) , 10 , 2 );
		add_filter( 'woocommerce_payment_complete_order_status' , array( $this , 'payment_complete_order_status' ) , 10 , 2 );
		add_filter( 'woocommerce_valid_order_statuses_for_payment_complete' , array( $this , 'valid_order_statuses_for_payment_complete' ) , 10 , 2 );
		add_filter( 'woocommerce_order_has_status' , array( $this , 'order_has_status' ) , 10 , 3 );
		add_action( 'woocommerce_order_status_changed' , array( $this , 'order_status_changed' ) , 10 , 3 );
		add_filter( 'woocommerce_order_needs_payment' , array( $this , 'needs_payment' ) , 10 , 3 );
		add_filter( 'woocommerce_product_is_in_stock' , array( $this , 'product_in_stock' ) , 10 );
		
		/** **/
		add_filter( 'woocommerce_order_get_total_tax' , array( $this , 'order_get_total_tax' ) , 10 , 2 );
		add_filter( 'woocommerce_order_get_shipping_total' , array( $this , 'order_get_shipping_total' ) , 10 , 2 );
		add_filter( 'woocommerce_order_get_shipping_tax' , array( $this , 'order_get_shipping_tax' ) , 10 , 2 );
		/**  **/
		
		
		//remove woocommerce order cancellation process and replace it to prevent partially-paid orders from being cancelled if payment fails
		remove_action( 'wp_loaded' , array( 'WC_Form_Handler' , 'cancel_order' ) , 20 );
		add_action( 'wp_loaded' , array( $this , 'cancelled_order' ) , 10 );
		
		
		// Order handling
		if( ! wcdp_checkout_mode()  ){
			add_action( 'woocommerce_new_order_item' , array( $this , 'add_order_item_meta' ) , 10 , 3 );
			add_filter( 'woocommerce_order_formatted_line_subtotal' , array( $this , 'order_formatted_line_subtotal' ) , 10 , 3 );
			add_filter( 'woocommerce_order_amount_item_subtotal' , array( $this , 'order_amount_item_subtotal' ) , 10 , 3 );
			add_filter( 'woocommerce_order_get_items' , array( $this , 'order_get_items' ) , 10 , 2 );
			
		}
		
		add_filter( 'woocommerce_get_order_item_totals' , array( $this , 'get_order_item_totals' ) , 10 , 2 );
		add_filter( 'woocommerce_order_get_total' , array( $this , 'get_order_total' ) , 10 , 2 );
		add_filter( 'woocommerce_get_formatted_order_total' , array( $this , 'get_formatted_order_total' ) , 10 , 2 );
		
		add_filter( 'woocommerce_order_number' , array( $this , 'order_number' ) , 10 , 2 );
		
		add_filter( 'woocommerce_hidden_order_itemmeta' , array( $this , 'hidden_order_item_meta' ) );
		
		$second_payment_reminder = get_option( 'wc_deposits_enable_second_payment_reminder' );
		
		if( $second_payment_reminder === 'yes' ){
			
			add_action( 'woocommerce_deposits_second_payment_reminder' , array( $this , 'second_payment_reminder' ) );
			
		}
		add_action( 'woocommerce_deposits_second_payment_reminder' , array( $this , 'second_payment_datepicker_reminder' ) );
		
		
		
	}
	
	
	/**
	 * @brief Adjust order total tax to pass correct numbers to gateways
	 * @param $value
	 * @param $order
	 * @return mixed
	 */
	function order_get_total_tax( $value , $order ){
		
		$order_has_deposit = $order->get_meta( '_wc_deposits_order_has_deposit' , true );
		
		if( $order_has_deposit === 'yes' &&  is_checkout()){
			
			$deposit_paid = $order->get_meta( '_wc_deposits_deposit_paid' , true );
			$breakdown = $order->get_meta( '_wc_deposits_deposit_breakdown' , true );
			
			if($breakdown && is_array($breakdown) && isset($breakdown['taxes'])){
				
				if( $deposit_paid  !== 'yes'){
					$value = $breakdown['taxes'] + $breakdown['shipping_taxes'];
					
				} else{
					$value -= ( $breakdown['taxes'] + $breakdown['shipping_taxes'] );
				}
				
				
			}
			
		}
		return $value;
	}
	
	
	
	/**
	 * @brief Adjust order total shipping to pass correct numbers to gateways
	 * @param $value
	 * @param $order
	 * @return mixed
	 */
	function order_get_shipping_total( $value , $order ){
		
		$order_has_deposit = $order->get_meta( '_wc_deposits_order_has_deposit' , true );
		
		if( $order_has_deposit === 'yes' &&  is_checkout()){
			
			$deposit_paid = $order->get_meta( '_wc_deposits_deposit_paid' , true );
			$breakdown = $order->get_meta( '_wc_deposits_deposit_breakdown' , true );
			
			if($breakdown && is_array($breakdown) && isset($breakdown['shipping'])){
				
				if( $deposit_paid  !== 'yes'){
					$value = $breakdown['shipping'];
					
				} else{
					$value -= $breakdown['shipping'];
					
				}
				
				
			}
			
		}
		
		return $value;
	}
	
	
	/**
	 * @brief Adjust order shipping tax to pass correct numbers to gateways
	 * @param $value
	 * @param $order
	 * @return mixed
	 */
	function order_get_shipping_tax( $value , $order ){
		
		$order_has_deposit = $order->get_meta( '_wc_deposits_order_has_deposit' , true );
		
		if( $order_has_deposit === 'yes' &&  is_checkout()){
			
			$deposit_paid = $order->get_meta( '_wc_deposits_deposit_paid' , true );
			$breakdown = $order->get_meta( '_wc_deposits_deposit_breakdown' , true );
			
			if($breakdown && is_array($breakdown) && isset($breakdown['shipping_taxes'])){
				
				if( $deposit_paid  !== 'yes'){
					$value = $breakdown['shipping_taxes'];
					
				} else{
					$value -= $breakdown['shipping_taxes'];
				}
				
				
			}
			
		}
		
		return $value;
	}
	
	
	
	
	/**
	 *
	 * @brief Fixes a bug where second payment can't be made if any order item is out of stock
	 **/
	function product_in_stock( $instock ){
		
		if( is_checkout() && is_wc_endpoint_url( 'order-pay' ) ){
			
			$order_number = get_query_var( 'order-pay' );
			if( $order_number ){
				$order = wc_get_order( $order_number );
				
				
				if( $order->get_status() === 'partially-paid' ){
					
					$instock = true;
				}
			}
			
		}
		return $instock;
		
	}
	
	/**
	 * @brief returns the original order total when customer is not making payment
	 * @param $total
	 * @param $order
	 * @return mixed
	 */
	public function get_order_total( $total , $order ){
		$order_has_deposit = $order->get_meta( '_wc_deposits_order_has_deposit' , true );
		if( $order_has_deposit === 'yes' && ! is_checkout() && ! has_action( 'woocommerce_thankyou' ) ){
			
			$total = $order->get_meta( '_wc_deposits_original_total' , true );
		}
		return $total;
	}
	
	
	/**
	 * @brief filters whether order can be paid for, based on second payment settings
	 * @param $needs_payment
	 * @param $order
	 * @param $valid_statuses
	 * @return bool
	 */
	public function needs_payment( $needs_payment , $order , $valid_statuses ){
		
		$status = $order->get_status();
		if( $status === 'partially-paid' ){
			if( get_option( 'wc_deposits_remaining_payable' , 'yes' ) === 'yes' ){
				
				
				$needs_payment = true;
			} else{
				$needs_payment = false;
			}
		}
		return $needs_payment;
	}
	
	
	/**
	 * @brief hides deposit order item meta from frontend display
	 * @param $hidden_meta
	 * @return array
	 */
	public function hidden_order_item_meta( $hidden_meta ){
		
		$hidden_meta[] = 'wc_deposit_meta';
		
		return $hidden_meta;
		
	}
	
	/**
	 * @brief update order meta based on order status change
	 * @param $order_id
	 * @param $old_status
	 * @param $new_status
	 */
	public function order_status_changed( $order_id , $old_status , $new_status ){
		
		
		$order = wc_get_order( $order_id );
		
		$order_has_deposit = $order->get_meta( '_wc_deposits_order_has_deposit' , true );
		if( $order_has_deposit === 'yes' ){
			
			$deposit_paid = $order->get_meta( '_wc_deposits_deposit_paid' , true );
			$second_payment = floatval( $order->get_meta( '_wc_deposits_second_payment' , true ) );
			
			if( $new_status === 'partially-paid' ){
				$order->update_meta_data( '_wc_deposits_second_payment_paid' , 'no' );
				$order->update_meta_data( '_wc_deposits_deposit_payment_time' , time() );
				$order->update_meta_data( '_wc_deposits_second_payment_reminder_email_sent' , 'no' );
			}
			//for cases of bank-transfer and some other gateways
			if( ( $new_status === 'partially-paid' ) && $deposit_paid !== 'yes' ){
				
				$order->update_meta_data( '_wc_deposits_deposit_paid' , 'yes' );
				
				$order->set_total( $second_payment );
				
			}
			
			//order marked processing /completed manually
			if( $old_status === 'partially-paid' && ( $new_status === 'processing' || $new_status === 'completed' ) && $deposit_paid === 'yes' ){
				
				$original_total = $order->get_meta( '_wc_deposits_original_total' , true );
				$order->update_meta_data( '_wc_deposits_second_payment_paid' , 'yes' );
				$order->set_total( $original_total );
				
			}
			
			$order->Save_meta_data();
			$order->Save();
			
		}
		
	}
	
	
	/**
	 * @brief handle second payment reminder email triggered by datepicker setting
	 */
	function second_payment_datepicker_reminder(){
		
		$reminder_date = get_option( 'wc_deposits_reminder_datepicker' );
		
		
		if( date( 'd-m-Y' ) == date( 'd-m-Y' , strtotime( $reminder_date ) ) ){
			
			$args = array(
				'post_type' => 'shop_order' ,
				'post_status' => 'wc-partially-paid' ,
				'posts_per_page' => -1
			);
			
			//query for all partially-paid orders
			$partially_paid_orders = new WP_Query( $args );
			
			while( $partially_paid_orders->have_posts() ) :
				$partially_paid_orders->the_post();
				$order_id = $partially_paid_orders->post->ID;
				
				do_action( 'woocommerce_deposits_second_payment_reminder_email' , $order_id );
			
			
			endwhile;
			
			
		}
		
		
	}
	
	/**
	 * @brief handles second payment reminder email trigger
	 */
	public function second_payment_reminder(){
		
		
		$args = array(
			'post_type' => 'shop_order' ,
			'post_status' => 'wc-partially-paid' ,
			'posts_per_page' => -1
		);
		
		//query for all partially-paid orders
		$partially_paid_orders = new WP_Query( $args );
		
		while( $partially_paid_orders->have_posts() ) :
			$partially_paid_orders->the_post();
			$order_id = $partially_paid_orders->post->ID;
			$order = wc_get_order( $order_id );
			
			$deposit_payment_date = $order->get_meta( '_wc_deposits_deposit_payment_time' , true );
			$reminder_already_sent = $order->get_meta( '_wc_deposits_second_payment_reminder_email_sent' , true );
			
			
			if( $deposit_payment_date > 0 && $reminder_already_sent !== 'yes' ){
				$now = time();
				$duration_since_deposit_paid = $now - intval( $deposit_payment_date );
				
				
				$days = $duration_since_deposit_paid / ( 60 * 60 * 24 );
				$reminder_duration = get_option( 'wc_deposits_second_payment_reminder_duration' );
				
				if( intval( $days ) >= intval( $reminder_duration ) ){
					do_action( 'woocommerce_deposits_second_payment_reminder_email' , $order_id );
					$order->update_meta_data( '_wc_deposits_second_payment_reminder_email_sent' , 'yes' );
					$order->save_meta_data();
					
					$order->save();
				}
			}
		endwhile;
	}
	
	
	/**
	 * @brief handles cancelled order
	 */
	public function cancelled_order(){
		
		if(
			isset( $_GET[ 'cancel_order' ] ) &&
			isset( $_GET[ 'order' ] ) &&
			isset( $_GET[ 'order_id' ] ) &&
			( isset( $_GET[ '_wpnonce' ] ) && wp_verify_nonce( $_GET[ '_wpnonce' ] , 'woocommerce-cancel_order' ) )
		){
			nocache_headers();
			
			$order_key = $_GET[ 'order' ];
			$order_id = absint( $_GET[ 'order_id' ] );
			$order = wc_get_order( $order_id );
			$user_can_cancel = current_user_can( 'cancel_order' , $order_id );
			$order_can_cancel = $order->has_status( apply_filters( 'woocommerce_valid_order_statuses_for_cancel' , array( 'pending' , 'failed' ) ) );
			$redirect = empty( $_GET[ 'redirect' ] ) ? $order->get_checkout_payment_url() : $_GET[ 'redirect' ];
			
			if( $user_can_cancel && $order_can_cancel && $order->get_id() === $order_id && $order->get_order_key() === $order_key ){
				
				if( $order->has_status( 'partially-paid' ) ){
					wp_safe_redirect( $redirect );
					exit;
				}
				
			}
			
			
		}
		
		
	}
	
	/**
	 * @brief update order meta when order is marked completed
	 * @param $order_id
	 */
	public function order_status_completed( $order_id ){
		
		
		$order = wc_get_order( $order_id );
		//    $second_payment = get_post_meta($order_id,'_wc_deposits_second_payment',true);
		$second_payment = $order->get_meta( '_wc_deposits_second_payment' , true );
		
		if( isset( $second_payment ) && $second_payment > 0 ){
			
			
			$order->update_meta_data( '_wc_deposits_second_payment_paid' , 'yes' );
			//            update_post_meta($order_id,'_wc_deposits_second_payment_paid','yes');
			
			$order->set_total( $order->get_meta( '_wc_deposits_original_total' , true ) );
			
			$order->save_meta_data();
			$order->save();
			
		}
	}
	
	/**
	 * @brief update values when payment is successful
	 * @param $order_id
	 */
	public function pre_payment_complete( $order_id ){
		
		$order = wc_get_order( $order_id );
		
		if( $order ){
			
			$status = $order->get_status();
			$order_has_deposit = $order->get_meta( '_wc_deposits_order_has_deposit' , true );
			$is_deposit_paid = $order->get_meta( '_wc_deposits_deposit_paid' , true );
			
			if( ( $order_has_deposit === 'yes' && $is_deposit_paid !== 'yes' ) ){
				
				$second_payment = $order->get_meta( '_wc_deposits_second_payment' , true );
				$order->set_total( $second_payment );
				
				$order->update_meta_data( '_wc_deposits_deposit_paid' , 'yes' );
				
			}
			
			if( $status === 'partially-paid' && $order->get_meta( '_wc_deposits_second_payment_paid' , true ) !== 'yes' ){
				
				
				$order->update_meta_data( '_wc_deposits_deposit_paid' , 'yes' );
				$order->update_meta_data( '_wc_deposits_second_payment_paid' , 'yes' );
				$original_total = $order->get_meta( '_wc_deposits_original_total' , true );
				
				$order->set_total( $original_total );
				
			}
			$order->save_meta_data();
			$order->save();
			
		}
	}
	
	/**
	 * @brief handle stock reduction on payment completion
	 * @param $reduce
	 * @param $order_id
	 * @return bool
	 */
	public function payment_complete_reduce_order_stock( $reduce , $order_id ){
		$order = wc_get_order( $order_id );
		$order_has_deposit = $order->get_meta( '_wc_deposits_order_has_deposit' , true ) === 'yes';
		
		if( $order_has_deposit ){
			
			
			$status = $order->get_status();
			$reduce_on = get_option( 'wc_deposits_reduce_stock' , 'full' );
			
			if( $status === 'partially-paid' && $reduce_on === 'full' ){
				$reduce = false;
			} elseif( $status === 'processing' && $reduce_on === 'deposit' ){
				$reduce = false;
			}
			
		}
		
		
		return $reduce;
	}
	
	/**
	 * @brief returns the proper status for order completion
	 * @param $new_status
	 * @param $order_id
	 * @return string
	 */
	public function payment_complete_order_status( $new_status , $order_id ){
		
		$order = wc_get_order( $order_id );
		$status = $order->get_status();
		
		$order_has_deposit = $order->get_meta( '_wc_deposits_order_has_deposit' , true ) === 'yes';
		
		if( $order_has_deposit && $status !== 'partially-paid' ){
			
			$second_payment = $order->get_meta( '_wc_deposits_second_payment' , true );
			$second_payment_paid = $order->get_meta( '_wc_deposits_second_payment_paid' , true );
			
			if( $second_payment > 0 && $second_payment_paid !== 'yes' ){
				$new_status = 'partially-paid';
			}
		}
		
		return $new_status;
	}
	
	/**
	 * @param $editable
	 * @param $order
	 * @return bool
	 */
	public function order_is_editable( $editable , $order ){
		
		if( $order->has_status( 'partially-paid' ) ){
			$allow_edit = get_option('wc_deposits_partially_paid_orders_editable', 'no') === 'yes';
			
			if($allow_edit){
				$editable = true;
				
			} else {
				
				$editable = false;
				
			}
		}
		return $editable;
	}
	
	
	/**
	 * @param $statuses
	 * @param $order
	 * @return array
	 */
	public function valid_order_statuses_for_payment_complete( $statuses , $order ){
		if( get_option( 'wc_deposits_remaining_payable' , 'yes' ) === 'yes' ){
			$statuses[] = 'partially-paid';
		}
		return $statuses;
	}
	
	/**
	 * @brief Add the new 'Deposit paid' status to orders
	 *
	 * @return array
	 */
	public function order_statuses( $order_statuses ){
		$new_statuses = array();
		// Place the new status after 'Pending payment'
		foreach( $order_statuses as $key => $value ){
			$new_statuses[ $key ] = $value;
			if( $key === 'wc-pending' ){
				$new_statuses[ 'wc-partially-paid' ] = __( 'Partially Paid' , 'woocommerce-deposits' );
			}
		}
		return $new_statuses;
	}
	
	/**
	 * @brief adds the status partially-paid to woocommerce
	 * @param $has_status
	 * @param $order
	 * @param $status
	 * @return bool
	 */
	public function order_has_status( $has_status , $order , $status ){
		if( $order->get_status() === 'partially-paid' ){
			if( is_array( $status ) ){
				if( in_array( 'pending' , $status ) ){
					$has_status = true;
				}
			} else{
				if( $status === 'pending' ){
					$has_status = true;
				}
			}
		}
		return $has_status;
	}
	
	/**
	 * @brief adds deposit values to order item meta from cart item meta
	 * @param $item_id
	 * @param $item
	 * @param $order_id
	 */
	public function add_order_item_meta( $item_id , $item , $order_id ){
		
		if( is_array( $item ) && isset( $item[ 'deposit' ] ) ){
			wc_add_order_item_meta( $item_id , '_wc_deposit_meta' , $item[ 'deposit' ] );
		}
	}
	
	/**
	 * @brief handles the display of order item totals in pay for order , my account  and email templates
	 * @param $total_rows
	 * @param $order
	 * @return mixed
	 */
	public function get_order_item_totals( $total_rows , $order ){
		
		
		$order_has_deposit = $order->get_meta( '_wc_deposits_order_has_deposit' , true ) === 'yes';
		
		
		if( $order_has_deposit )  :
			
			$to_pay_text = __( get_option( 'wc_deposits_to_pay_text' ) , 'woocommerce-deposits' );
			$deposit_amount_text = __( get_option( 'wc_deposits_deposit_amount_text' ) , 'woocommerce-deposits' );
			$second_payment_amount_text = __( get_option( 'wc_deposits_second_payment_amount_text' ) , 'woocommerce-deposits' );
			$deposit_previously_paid_text = __( get_option( 'wc_deposits_deposit_previously_paid_text' ) , 'woocommerce-deposits' );
			$payment_status_text = __( get_option( 'wc_deposits_payment_status_text' ) , 'woocommerce-deposits' );
			$pending_payment_text = __( get_option( 'wc_deposits_deposit_pending_payment_text' ) , 'woocommerce-deposits' );
			$deposit_paid_text = __( get_option( 'wc_deposits_deposit_paid_text' ) , 'woocommerce-deposits' );
			$fully_paid_text = __( get_option( 'wc_deposits_order_fully_paid_text' ) , 'woocommerce-deposits' );
			
			if( $to_pay_text === false ){
				$to_pay_text = __( 'To Pay' , 'woocommerce-deposits' );
			}
			
			if( $deposit_amount_text === false ){
				$deposit_amount_text = __( 'Deposit Amount' , 'woocommerce-deposits' );
			}
			if( $second_payment_amount_text === false ){
				$second_payment_amount_text = __( 'Second Payment Amount' , 'woocommerce-deposits' );
			}
			if( $deposit_previously_paid_text === false ){
				$deposit_previously_paid_text = __( 'Deposit Previously Paid' , 'woocommerce-deposits' );
			}
			if( $payment_status_text === false ){
				$payment_status_text = __( 'Payment Status' , 'woocommerce-deposits' );
			}
			
			
			if( $pending_payment_text === false ){
				$pending_payment_text = __( 'Deposit Pending Payment' , 'woocommerce-deposits' );
			}
			if( $deposit_paid_text === false ){
				$deposit_paid_text = __( 'Deposit Paid' , 'woocommerce-deposits' );
				
			}
			if( $fully_paid_text === false ){
				$fully_paid_text = __( 'Order Fully Paid' , 'woocommerce-deposits' );
			}
			
			
			$to_pay_text = stripslashes( $to_pay_text );
			$deposit_amount_text = stripslashes( $deposit_amount_text );
			$second_payment_amount_text = stripslashes( $second_payment_amount_text );
			$deposit_previously_paid_text = stripslashes( $deposit_previously_paid_text );
			$payment_status_text = stripslashes( $payment_status_text );
			$pending_payment_text = stripslashes( $pending_payment_text );
			$deposit_paid_text = stripslashes( $deposit_paid_text );
			$fully_paid_text = stripslashes( $fully_paid_text );
			
			
			$status = $order->get_status();
			$order_total = $order->get_meta( '_wc_deposits_original_total' , true );
			$deposit_amount = floatval( $order->get_meta( '_wc_deposits_deposit_amount' , true ) );
			$deposit_paid = $order->get_meta( '_wc_deposits_deposit_paid' , true );
			$second_payment = floatval( $order->get_meta( '_wc_deposits_second_payment' , true ) );
			$second_payment_paid = $order->get_meta( '_wc_deposits_second_payment_paid' , true );
			
			$received_slug = get_option( 'woocommerce_checkout_order_received_endpoint' , 'order-received' );
			$pay_slug = get_option( 'woocommerce_checkout_order_pay_endpoint' , 'order-pay' );
			
			$is_checkout = ( get_query_var( $received_slug ) === '' && is_checkout() );
			$is_paying_remaining = ! ! get_query_var( $pay_slug ) && $status === 'partially-paid';
			$is_email = did_action( 'woocommerce_email_order_details' ) > 0;
			
			$total_rows[ 'order_total' ][ 'value' ] = wc_price( $order_total , array( 'currency' => $order->get_currency() ) );
			
			
			if( ! $is_checkout || $is_email ){
				
				$total_rows[ 'deposit_amount' ] = array(
					'label' => $deposit_amount_text ,
					'value' => wc_price( $deposit_amount , array( 'currency' => $order->get_currency() ) )
				);
				
				$total_rows[ 'second_payment' ] = array(
					'label' => $second_payment_amount_text ,
					'value' => wc_price( $second_payment , array( 'currency' => $order->get_currency() ) )
				);
				
				
			}
			
			
			if( $is_checkout && ! $is_paying_remaining && ! $is_email ){
				
				if( $deposit_paid !== 'yes' ){
					$to_pay = $deposit_amount;
				} elseif( $deposit_paid === 'yes' && $second_payment_paid !== 'yes' ){
					$to_pay = $second_payment;
				}
				
				$total_rows[ 'paid_today' ] = array(
					'label' => $to_pay_text ,
					'value' => wc_price( $to_pay , array( 'currency' => $order->get_currency() ) )
				);
				
				
			}
			
			if( $is_checkout && $is_paying_remaining ){
				
				$total_rows[ 'deposit_amount' ] = array(
					'label' => $deposit_previously_paid_text ,
					'value' => wc_price( $deposit_amount , array( 'currency' => $order->get_currency() ) )
				);
				
				$total_rows[ 'paid_today' ] = array(
					'label' => $to_pay_text ,
					'value' => wc_price( $second_payment , array( 'currency' => $order->get_currency() ) )
				);
			}
			
			
			if( is_account_page() ){
				$payment_status = '';
				if( $deposit_paid !== 'yes' )
					$payment_status = $pending_payment_text;
				if( $deposit_paid === 'yes' )
					$payment_status = $deposit_paid_text;
				if( $deposit_paid === 'yes' && $second_payment_paid === 'yes' )
					$payment_status = $fully_paid_text;
				$total_rows[ 'payment_status' ] = array(
					'label' => $payment_status_text ,
					'value' => __( $payment_status , 'woocommerce-deposits' )
				);
			}
		
		
		endif;
		return $total_rows;
	}
	
	
	/**
	 * @brief handles formatted subtotal display for orders with deposit
	 * @param $subtotal
	 * @param $item
	 * @param $order
	 * @return string
	 */
	public function order_formatted_line_subtotal( $subtotal , $item , $order ){
		if( $order->get_meta( '_wc_deposits_order_has_deposit' , true ) === 'yes' ){
			
			
			if( isset( $item[ 'wc_deposit_meta' ] ) ){
				$deposit_meta = maybe_unserialize( $item[ 'wc_deposit_meta' ] );
			} else{
				return $subtotal;
			}
			
			if( is_array( $deposit_meta ) && isset( $deposit_meta[ 'enable' ] ) && $deposit_meta[ 'enable' ] === 'yes' ){
				$tax = get_option( 'wc_deposits_tax_display' , 'no' ) === 'yes' ? floatval( $item[ 'line_tax' ] ) : 0;
				$deposit = $deposit_meta[ 'deposit' ] + $tax;
				
				return $subtotal . '<br/>(' .
					wc_price( $deposit , array( 'currency' => $order->get_currency() ) ) . ' ' . __( 'Deposit' , 'woocommerce-deposits' ) . ')';
			} else{
				return $subtotal;
			}
		} else{
			return $subtotal;
		}
	}
	
	/**
	 * @brief handles formatted total display for orders with deposit
	 * @param $total
	 * @param $order
	 * @return string
	 */
	public function get_formatted_order_total( $total , $order ){
		if( $order->get_meta( '_wc_deposits_order_has_deposit' , true ) === 'yes' ) :
			
			$total = wc_price( floatval( $order->get_meta( '_wc_deposits_original_total' , true ) ) , array( 'currency' => $order->get_currency() ) );
			
			if( $order->get_status() == 'partially-paid' ){
				$total = sprintf( __( '%s' , 'woocommerce-deposits' ) , $total );
			}
		
		
		endif;
		return $total;
	}
	
	
	/**
	 * @param $price
	 * @param $order
	 * @param $item
	 * @return float|int
	 */
	public function order_amount_item_subtotal( $price , $order , $item ){
		
		$status = $order->get_status();
		
		if( isset( $item[ 'wc_deposit_meta' ] ) ){
			$deposit_meta = maybe_unserialize( $item[ 'wc_deposit_meta' ] );
		} else{
			return $price;
		}
		
		if( isset( $deposit_meta ) && isset( $deposit_meta[ 'enable' ] ) && $deposit_meta[ 'enable' ] === 'yes' ){
			if( $status === 'partially-paid' ){
				$price = floatval( $deposit_meta[ 'remaining' ] ) / $item[ 'qty' ];
			} else{
				$price = floatval( $deposit_meta[ 'deposit' ] ) / $item[ 'qty' ];
			}
			$price = round( $price , absint( get_option( 'woocommerce_price_num_decimals' ) ) );
		} elseif( $status === 'partially-paid' ){
			$price = 0; // ensure that fully paid items are not paid for yet again.
		}
		
		return $price;
	}
	
	
	/**
	 * @param $items
	 * @param $order
	 * @return array
	 */
	public function order_get_items( $items , $order ){
		
		$filter_enabled = get_option( 'wc_deposits_enable_product_calculation_filter' );
		if( $filter_enabled === 'yes' ) :
			$status = $order->get_status();
			$is_order_editor = false;
			if( function_exists( 'get_current_screen' ) ){
				$screen = get_current_screen();
				if( $screen )
					$is_order_editor = $screen->id === 'shop_order';
				if( $screen && ! $is_order_editor )
					$is_order_editor = $screen->id === 'post' && $screen->parent_base === 'edit';
			}
			
			if( $status === 'partially-paid' && ! $is_order_editor ){
				// remove everything that's not a line item with a remaining deposit, including fees
				$temp = array();
				foreach( $items as $item ){
					if( isset( $item ) && isset( $item[ 'type' ] ) && $item[ 'type' ] === 'line_item' && isset( $item[ 'wc_deposit_meta' ] ) ){
						$deposit_meta = maybe_unserialize( $item[ 'wc_deposit_meta' ] );
						if( isset( $deposit_meta ) && isset( $deposit_meta[ 'enable' ] ) && $deposit_meta[ 'enable' ] === 'yes' ){
							$item[ 'line_tax' ] = 0;
							$item[ 'line_total' ] = round( $deposit_meta[ 'remaining' ] , absint( get_option( 'woocommerce_price_num_decimals' ) ) );
							$temp[] = $item;
						}
					}
				}
				$items = $temp;
			}
		endif;
		return $items;
	}
	
	/**
	 * @brief Adjust order number based on order state
	 *
	 * @return string
	 * @since 1.5.1
	 */
	public function order_number( $number , $order_or_id ){
		$order = is_object( $order_or_id ) ? $order_or_id : wc_get_order( $order_or_id );
		$suffix = apply_filters( 'wc_deposits_partial_paid_order_number_suffix' , '-WCDP',$order );
		if( $order !== false ){
			$status = $order->get_status();
			$number = $status === 'partially-paid' ? $number . $suffix : $number;
		}
		
		return $number;
	}
	
	
}

