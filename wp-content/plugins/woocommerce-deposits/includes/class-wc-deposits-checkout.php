<?php
/*Copyright: © 2017 Webtomizer.
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

if( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
}

/**
 * Class WC_Deposits_Checkout
 */
class WC_Deposits_Checkout{
	
	public $wc_deposits;
	public $deposit_enabled;
	public $deposit_amount;
	public $second_payment;
	
	/**
	 * WC_Deposits_Checkout constructor.
	 * @param $wc_deposits
	 */
	public function __construct( &$wc_deposits ){
		$this->wc_deposits = $wc_deposits;
		
		if(wcdp_checkout_mode() ){
			
			add_action( 'wc_deposits_enqueue_deposit_button_scripts' , array( $this , 'enqueue_scripts' ),20 );
			add_action( 'woocommerce_checkout_update_order_review' , array( $this , 'update_order_review' ) , 10 , 1 );
			add_action( 'woocommerce_review_order_after_order_total' , array( $this , 'checkout_deposit_button' ) , 50 );
		} else{
			add_action( 'woocommerce_checkout_create_order_line_item' , array( $this , 'checkout_create_order_line_item' ) , 10 , 4 );
		}
		
		add_action( 'woocommerce_checkout_order_processed' , array( $this , 'checkout_order_processed' ) , 10 , 2 );
		add_action( 'woocommerce_review_order_after_order_total' , array( $this , 'review_order_after_order_total' ) );
		// Hook the payments gateways filter to remove the ones we don't want
		add_filter( 'woocommerce_available_payment_gateways' , array( $this , 'available_payment_gateways' ) );
		
	}
	
	/**
     *
	 * @param $posted_data_string
	 */
	public function update_order_review( $posted_data_string ){
		
		parse_str( $posted_data_string , $posted_data );
		
		if( isset( $posted_data[ 'deposit-radio' ] ) && $posted_data[ 'deposit-radio' ] === 'deposit' ){
			WC()->cart->deposit_info[ 'deposit_enabled' ] = true;
			WC()->session->set( 'deposit_enabled', true );
		} elseif( isset( $posted_data[ 'deposit-radio' ] ) && $posted_data[ 'deposit-radio' ] === 'full' ){
			WC()->cart->deposit_info[ 'deposit_enabled' ] = false;
			WC()->session->set( 'deposit_enabled', false );
		} else{
			$default = get_option( 'wc_deposits_default_option' );
			WC()->cart->deposit_info[ 'deposit_enabled' ] = $default === 'deposit' ? true : false;
			WC()->session->set( 'deposit_enabled', $default === 'deposit' ? true : false );
		}
		
	}
	
	
	/**
	 * @brief enqeueue scripts
	 */
	public function enqueue_scripts(){
		
		wp_enqueue_script( 'wc-deposits-checkout' , WC_DEPOSITS_PLUGIN_URL . '/assets/js/wc-deposits-checkout.js' , array( 'jquery' ) , '' , true );
		$message_deposit = __(get_option( 'wc_deposits_message_deposit' ),'woocommerce-deposits');
		$message_full_amount = __(get_option( 'wc_deposits_message_full_amount' ),'woocommerce-deposits');
		
		$message_deposit = stripslashes( $message_deposit );
		$message_full_amount = stripslashes( $message_full_amount );
		
		$script_args = array(
			'message' => array(
				'deposit' => __( $message_deposit , 'woocommerce-deposits' ) ,
				'full' => __( $message_full_amount , 'woocommerce-deposits' )
			)
		);
		wp_localize_script( 'wc-deposits-checkout' , 'wc_deposits_checkout_options' , $script_args );
		
		// prepare inline styles
		$colors = get_option( 'wc_deposits_deposit_buttons_colors' );
		$fallback_colors = wc_deposits_woocommerce_frontend_colours();
		$gstart = $colors[ 'primary' ] ? $colors[ 'primary' ] : $fallback_colors[ 'primary' ];
		$secondary = $colors[ 'secondary' ] ? $colors[ 'secondary' ] : $fallback_colors[ 'secondary' ];
		$highlight = $colors[ 'highlight' ] ? $colors[ 'highlight' ] : $fallback_colors[ 'highlight' ];
		$gend = wc_deposits_adjust_colour( $gstart , 15 );
		
		
		$style = "@media only screen {
            #wc-deposits-options-form input.input-radio:enabled ~ label { color: {$secondary}; }
            #wc-deposits-options-form div a.wc-deposits-switcher {
              background-color: {$gstart};
              background: -moz-gradient(center top, {$gstart} 0%, {$gend} 100%);
              background: -moz-linear-gradient(center top, {$gstart} 0%, {$gend} 100%);
              background: -webkit-gradient(linear, left top, left bottom, from({$gstart}), to({$gend}));
              background: -webkit-linear-gradient({$gstart}, {$gend});
              background: -o-linear-gradient({$gstart}, {$gend});
              background: linear-gradient({$gstart}, {$gend});
            }
            #wc-deposits-options-form .amount { color: {$highlight}; }
            #wc-deposits-options-form .deposit-option { display: inline; }
          }";
		
		wp_enqueue_style( 'wc-deposits-frontend-styles-checkout-mode' ,WC_DEPOSITS_PLUGIN_URL  .'/assets/css/checkout-mode.css');
		wp_add_inline_style( 'wc-deposits-frontend-styles-checkout-mode', $style );
		
		
	}
	
	/**
	 * @brief shows Deposit slider in checkout mode
	 */
	public function checkout_deposit_button(){
		
		if(isset(WC()->cart->cart_session_data['deposit_enabled']) && WC()->cart->cart_session_data['deposit_enabled'] !== true ){
			return;
		}
		
		$deposit_amount = get_option( 'wc_deposits_checkout_mode_deposit_amount' );
		$amount_type = get_option( 'wc_deposits_checkout_mode_deposit_amount_type' );
		
		if( $amount_type === 'fixed' && $deposit_amount >= WC()->cart->total ) {
			return;
		}
		$default_checked = get_option( 'wc_deposits_default_option' , 'deposit' );
		$basic_buttons = get_option( 'wc_deposits_use_basic_radio_buttons' , true ) === 'yes';
		$deposit_text = __(get_option( 'wc_deposits_button_deposit'),'woocommerce-deposits');
		$full_text = __(get_option( 'wc_deposits_button_full_amount' ),'woocommerce-deposits');
		$deposit_option_text = __(get_option('wc_deposits_deposit_option_text'),'woocommerce-deposits');
		
		if( $deposit_text === false ){
			
			$deposit_text = __( 'Pay Deposit' , 'woocommerce-deposits' );
			
		}
		if( $full_text === false ){
			$full_text = __( 'Full Amount' , 'woocommerce-deposits' );
			
		}
		
		if( $deposit_option_text === false ) {
			$deposit_option_text = __( 'Deposit Option' , 'woocommerce-deposits' );
		}
		
		$deposit_text = stripslashes( $deposit_text );
		$full_text = stripslashes( $full_text );
		$deposit_option_text = stripslashes( $deposit_option_text );
		
		
		if( is_ajax() && isset( $_POST[ 'post_data' ] ) ){
			parse_str( $_POST[ 'post_data' ] , $post_data );
			if(isset($post_data['deposit-radio'])){
				$default_checked =  $post_data[ 'deposit-radio' ];
            }
		}
		if(isset(WC()->cart->deposit_info['deposit_amount']) && WC()->cart->deposit_info['deposit_amount'] <= 0) return;
		
		$amount = WC()->cart->deposit_info['deposit_amount'];
		
		
		$args = array(
			
			'deposit_amount' => $amount,
			'basic_buttons' => $basic_buttons,
			'deposit_text' =>$deposit_text,
			'full_text' => $full_text,
			'deposit_option_text' => $deposit_option_text,
			'default_checked' => $default_checked
		
		
		);
		
		wc_get_template('wc-deposits-checkout-mode-slider.php',$args,'woocommerce-deposits/',WC_DEPOSITS_TEMPLATE_PATH);
  
	}
	
	/**
     * @brief adds deposit meta to order line item when created
	 * @param $item
	 * @param $cart_item_key
	 * @param $values
	 * @param $order
	 */
	public function checkout_create_order_line_item( $item , $cart_item_key , $values , $order ){
		
		
		$deposit_meta = isset( $values[ 'deposit' ] ) ? $values[ 'deposit' ] : false;
		
		if( $deposit_meta ){
			$item->add_meta_data( 'wc_deposit_meta' , $deposit_meta , true );
		}
		
		
	}
	
	/**
     * @brief Display deposit value in checkout order totals review area
	 * @param $order
	 */
	public function review_order_after_order_total( $order ){

		if( wcdp_checkout_mode()  ){
			
			$deposit_amount = get_option( 'wc_deposits_checkout_mode_deposit_amount' );
			$amount_type = get_option( 'wc_deposits_checkout_mode_deposit_amount_type' );
			
			if( $amount_type === 'fixed' && $deposit_amount >= WC()->cart->total ) {
				WC()->cart->deposit_info[ 'deposit_enabled' ] = false;
            }
			if( is_ajax() && isset( $_POST[ 'post_data' ] ) ){
				
				parse_str( $_POST[ 'post_data' ] , $post_data );
				
				if( isset( $post_data[ 'deposit-radio' ] ) && $post_data[ 'deposit-radio' ] === 'deposit' ){
					//calculate deposit
					if( WC()->cart->deposit_info[ 'deposit_enabled' ] === true && WC()->cart->deposit_info[ 'deposit_amount' ] > 0 ){
						
						$to_pay_text = __(get_option('wc_deposits_to_pay_text'),'woocommerce-deposits');
						$second_payment_text = __(get_option('wc_deposits_second_payment_text'),'woocommerce-deposits');
						
						
						if( $to_pay_text === false ) {
							$to_pay_text = __( 'To Pay' , 'woocommerce-deposits' );
						}
						
						
						if( $second_payment_text === false ) {
							$second_payment_text = __( 'Second Payment' , 'woocommerce-deposits' );
						}
						$to_pay_text = stripslashes( $to_pay_text );
						$second_payment_text = stripslashes( $second_payment_text );
						$deposit_breakdown_tooltip = wc_deposits_deposit_breakdown_tooltip();
						
						?>


                        <tr class="order-paid">
                            <th><?php echo $to_pay_text; ?>  <?php echo $deposit_breakdown_tooltip ?> </th>
                            <td data-title="<?php echo $to_pay_text; ?>">
                                <strong><?php echo wc_price( WC()->cart->deposit_info[ 'deposit_amount' ] ); ?></strong>
                            </td>
                        </tr>
                        <tr class="order-remaining">
                            <th><?php echo $second_payment_text; ?></th>
                            <td data-title="<?php echo $second_payment_text; ?>">
                                <strong><?php echo wc_price( WC()->cart->deposit_info[ 'second_payment' ] ); ?></strong>
                            </td>
                        </tr>
						<?php
						
					}
				}
			}
			
		} elseif( ! wcdp_checkout_mode()  && (isset(WC()->cart->deposit_info[ 'deposit_enabled' ]) && WC()->cart->deposit_info[ 'deposit_enabled' ] === true ) ){
			
			$to_pay_text = __(get_option('wc_deposits_to_pay_text'),'woocommerce-deposits');
			$second_payment_text = __(get_option('wc_deposits_second_payment_text'),'woocommerce-deposits');
			
			
			if( $to_pay_text === false ) {
				$to_pay_text = __( 'To Pay' , 'woocommerce-deposits' );
			}
			
			
			if( $second_payment_text === false ) {
				$second_payment_text = __( 'Second Payment' , 'woocommerce-deposits' );
			}
			$to_pay_text = stripslashes( $to_pay_text );
			$second_payment_text = stripslashes( $second_payment_text );
			
			$deposit_breakdown_tooltip = wc_deposits_deposit_breakdown_tooltip();
			?>

            <tr class="order-paid">
                <th><?php echo $to_pay_text; ?> <?php echo $deposit_breakdown_tooltip ?>  </th>
                <td data-title="<?php echo $to_pay_text; ?>">
                    <strong><?php echo wc_price( WC()->cart->deposit_info[ 'deposit_amount' ] ); ?></strong>
                </td>
            </tr>
            <tr class="order-remaining">
                <th><?php echo $second_payment_text; ?></th>
                <td data-title="<?php echo $second_payment_text; ?>">
                    <strong><?php echo wc_price( WC()->cart->deposit_info[ 'second_payment' ] ); ?></strong>
                </td>
            </tr>
			<?php
		}
		
		
	}
	
	/**
	 * @brief Updates the order metadata with deposit information
	 *
	 * @return void
	 */
	public function checkout_order_processed( $order_id ){
  
	
		if( isset(WC()->cart->deposit_info[ 'deposit_enabled' ]) && WC()->cart->deposit_info[ 'deposit_enabled' ] === true ){
			
			
			$deposit = WC()->cart->deposit_info[ 'deposit_amount' ];
			$second_payment = WC()->cart->deposit_info[ 'second_payment' ];
			$original_total = WC()->cart->total;
			$deposit_breakdown = WC()->cart->deposit_info[ 'deposit_breakdown' ];
			
			$order = wc_get_order( $order_id );
			
			$order->set_total( $deposit );
			$order->add_meta_data( '_wc_deposits_order_has_deposit' , 'yes' , true );
			$order->add_meta_data( '_wc_deposits_deposit_paid' , 'no' , true );
			$order->add_meta_data( '_wc_deposits_second_payment_paid' , 'no' , true );
			$order->add_meta_data( '_wc_deposits_deposit_amount' , $deposit , true );
			$order->add_meta_data( '_wc_deposits_second_payment' , $second_payment , true );
			$order->add_meta_data( '_wc_deposits_original_total' , $original_total , true );
			$order->add_meta_data( '_wc_deposits_deposit_breakdown' , $deposit_breakdown , true );
			$order->add_meta_data( '_wc_deposits_deposit_payment_time' , ' ' , true );
			$order->add_meta_data( '_wc_deposits_second_payment_reminder_email_sent' , 'no' , true );
			$order->save_meta_data();
			$order->save();
			
			
		}
	}
	
	/**
	 * @brief Removes the unwanted gateways from the settings page when there's a deposit
	 *
	 * @return mixed
	 */
	public function available_payment_gateways( $gateways ){
		$has_deposit = false;
		
		$pay_slug = get_option( 'woocommerce_checkout_pay_endpoint' , 'order-pay' );
		$order_id = absint( get_query_var( $pay_slug ) );
		
		if( $order_id > 0 ){
			$order = wc_get_order( $order_id );
			if( $order ){
				$has_deposit = $order->has_status( 'partially-paid' );
			}
			
			if( ! $has_deposit ){
				$items = $order->get_items();
				foreach( $items as $item_key => $item ){
					if( isset( $item[ 'wc_deposit_meta' ] ) ){
						$meta = maybe_unserialize( $item[ 'wc_deposit_meta' ] );
						if( $meta && isset( $meta[ 'enable' ] ) && $meta[ 'enable' ] === 'yes' ){
							$has_deposit = true;
							break;
						}
					}
				}
			}
		} else{
			if( is_object( WC()->session ) && null !== WC()->session->get( 'deposit_enabled' ) && WC()->session->get( 'deposit_enabled' ) === true){
				$has_deposit = true;
			}
		}
		
		if( $has_deposit ){
			$disallowed_gateways = get_option( 'wc_deposits_disabled_gateways' );
			if( is_array( $disallowed_gateways ) ){
				foreach( $disallowed_gateways as $key => $value ){
					if( $value === 'yes' ){
						unset( $gateways[ $key ] );
					}
				}
			}
		}
		return $gateways;
	}
}
