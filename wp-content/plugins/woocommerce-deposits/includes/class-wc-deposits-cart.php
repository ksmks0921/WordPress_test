<?php
/*Copyright: � 2017 Webtomizer.
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

if( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
}

/**
 * Class WC_Deposits_Cart
 */
class WC_Deposits_Cart{
	

	public $wc_deposits;
	
	/**
     *
	 * WC_Deposits_Cart constructor.
	 * @param $wc_deposits
	 */
	public function __construct( &$wc_deposits ){
		// Hook cart functionality
		
		$this->wc_deposits = $wc_deposits;
		
		if( ! wcdp_checkout_mode() ){
			
			//			add_action( 'woocommerce_cart_item_subtotal' , array( $this , 'cart_item_subtotal' ) , 10 , 3 );
			add_filter( 'woocommerce_get_cart_item_from_session' , array( $this , 'get_cart_item_from_session' ) , 10 , 2 );
			add_action( 'woocommerce_cart_updated' , array( $this , 'cart_updated' ) );
			add_action( 'woocommerce_after_cart_item_quantity_update' , array( $this , 'after_cart_item_quantity_update' ) , 10 , 2 );
			add_action( 'woocommerce_cart_totals_after_order_total' , array( $this , 'cart_totals_after_order_total' ) );
			add_filter( 'woocommerce_get_item_data' , array( $this , 'get_item_data' ) , 10 , 2 );
			
		}
		
		//have to set very low priority to make sure all other plugins make calculations first
		add_filter( 'woocommerce_calculated_total' , array( $this , 'calculated_total' ) , 1001 , 2 );
	}
	
	
	/**
     * @brief Display deposit info in cart item meta area
	 * @param $item_data
	 * @param $cart_item
	 * @return array
	 */
	public function get_item_data( $item_data , $cart_item ){
		
		
		if( isset( $cart_item[ 'deposit' ] ) && $cart_item[ 'deposit' ][ 'enable' ] === 'yes' ){
			
			$product = $cart_item[ 'data' ];
			
			if( $product->get_type() === 'variation' ){
				
				$parent = wc_get_product( $product->get_parent_id() );
				
				$amount_type = $parent->get_meta( '_wc_deposits_amount_type' , true );
				$deposit_amount = $parent->get_meta( '_wc_deposits_deposit_amount' , true );
				
			} else{
				$amount_type = $product->get_meta( '_wc_deposits_amount_type' , true );
				$deposit_amount = $product->get_meta( '_wc_deposits_deposit_amount' , true );
			}
			
			
			$tax_display = get_option( 'wc_deposits_tax_display' ) === 'yes';
			$tax_handling = get_option( 'wc_deposits_taxes_handling' );
			$tax = 0;
			$tax_total = 0;
			
			if( $tax_display ){
				
				if( $amount_type === 'fixed' ){
					$tax_total = wc_get_price_including_tax( $product , array( 'qty' => $cart_item[ 'quantity' ] ) ) - wc_get_price_excluding_tax( $product , array( 'qty' => $cart_item[ 'quantity' ] ) );
					if( $tax_handling === 'deposit' ){
						$tax = $tax_total;
					} elseif( $tax_handling === 'split' ){
						
						$deposit_percentage = $deposit_amount * 100 / ( $product->get_price() );
						$tax = $tax_total * $deposit_percentage / 100;
					}
					
				} else{
					
					if( $tax_handling === 'deposit' ){
						$tax = wc_get_price_including_tax( $product , array( 'qty' => $cart_item[ 'quantity' ] ) ) - wc_get_price_excluding_tax( $product , array( 'qty' => $cart_item[ 'quantity' ] ) );
					} elseif( $tax_handling === 'split' ){
						$tax_total = $tax = wc_get_price_including_tax( $product , array( 'qty' => $cart_item[ 'quantity' ] ) ) - wc_get_price_excluding_tax( $product , array( 'qty' => $cart_item[ 'quantity' ] ) );
						$tax = $tax_total * $deposit_amount / 100;
					}
				}
			}
			
			$deposit = $cart_item[ 'deposit' ][ 'deposit' ];
			
			
			$woocommerce_prices_include_tax = get_option( 'woocommerce_prices_include_tax' );
			
			if( $woocommerce_prices_include_tax === 'yes' ){
				$display_deposit = $deposit;
				$display_remaining = $cart_item[ 'deposit' ][ 'remaining' ];
			} else{
				$display_deposit = $deposit + $tax;
				$display_remaining = $cart_item[ 'deposit' ][ 'remaining' ] + ( $tax_total - $tax );
			}
			
			
			$item_data[] = array(
				'name' => __( 'Deposit Amount' , 'woocommerce-deposits' ) ,
				'display' => wc_price( $display_deposit ) ,
				'value' => 'wc_deposit_amount' ,
			);
			$item_data[] = array(
				'name' => __( 'Remaining Amount' , 'woocommerce-deposits' ) ,
				'display' => wc_price( $display_remaining ) ,
				'value' => 'wc_deposit_amount' ,
			);
			
			
		}
		
		return $item_data;
		
		
	}
	
	
	/**
	 * @brief Hook the subtotal display and show the deposit and remaining amount
	 *
	 * @param string $subtotal ...
	 * @param array $cart_item ...
	 * @param mixed $cart_item_key ...
	 * @return string
	 */
	public function cart_item_subtotal( $subtotal , $cart_item , $cart_item_key ){
		
		$product = $cart_item[ 'data' ];
		
		if( $product->get_type() === 'variation' ){
			
			$parent = wc_get_product( $product->get_parent_id() );
			
			$deposit_enabled = $parent->get_meta( '_wc_deposits_enable_deposit' , true );
			$amount_type = $parent->get_meta( '_wc_deposits_amount_type' , true );
			$deposit_amount = $parent->get_meta( '_wc_deposits_deposit_amount' , true );
			
		} else{
			$deposit_enabled = $product->get_meta( '_wc_deposits_enable_deposit' , true );
			$amount_type = $product->get_meta( '_wc_deposits_amount_type' , true );
			$deposit_amount = $product->get_meta( '_wc_deposits_deposit_amount' , true );
		}
		
		
		if( $deposit_enabled === 'yes' && ! empty( $cart_item[ 'deposit' ] ) && $cart_item[ 'deposit' ][ 'enable' ] === 'yes' ){
			
			$tax_display = get_option( 'wc_deposits_tax_display' ) === 'yes';
			$tax_handling = get_option( 'wc_deposits_taxes_handling' );
			$tax = 0;
			
			if( $tax_display ){
				
				if( $amount_type === 'fixed' ){
					
					if( $tax_handling === 'deposit' ){
						$tax = wc_get_price_including_tax( $product , array( 'qty' => $cart_item[ 'quantity' ] ) ) - wc_get_price_excluding_tax( $product , array( 'qty' => $cart_item[ 'quantity' ] ) );
						
					} elseif( $tax_handling === 'split' ){
						$tax_total = $tax = wc_get_price_including_tax( $product , array( 'qty' => $cart_item[ 'quantity' ] ) ) - wc_get_price_excluding_tax( $product , array( 'qty' => $cart_item[ 'quantity' ] ) );
						
						$deposit_percentage = $deposit_amount * 100 / ( $product->get_price() );
						$tax = $tax_total * $deposit_percentage / 100;
					}
					
				} else{
					
					if( $tax_handling === 'deposit' ){
						$tax = wc_get_price_including_tax( $product , array( 'qty' => $cart_item[ 'quantity' ] ) ) - wc_get_price_excluding_tax( $product , array( 'qty' => $cart_item[ 'quantity' ] ) );
					} elseif( $tax_handling === 'split' ){
						$tax_total = $tax = wc_get_price_including_tax( $product , array( 'qty' => $cart_item[ 'quantity' ] ) ) - wc_get_price_excluding_tax( $product , array( 'qty' => $cart_item[ 'quantity' ] ) );
						$tax = $tax_total * $deposit_amount / 100;
					}
				}
			}
			
			$deposit = $cart_item[ 'deposit' ][ 'deposit' ];
			
			
			$woocommerce_prices_include_tax = get_option( 'woocommerce_prices_include_tax' );
			
			if( $woocommerce_prices_include_tax === 'yes' ){
				$display_deposit = $deposit;
				
			} else{
				$display_deposit = $deposit + $tax;
				
			}
			$remaining = $cart_item[ 'deposit' ][ 'remaining' ];
			return wc_price( $display_deposit ) . ' ' . __( 'Deposit' , 'woocommerce-deposits' ) . '<br/>(' .
				wc_price( $remaining ) . ' ' . __( 'Remaining' , 'woocommerce-deposits' ) . ')';
		} else{
			return $subtotal;
		}
	}
	
	/**
	 * @param $cart_item
	 * @param $values
	 * @return mixed
	 */
	public function get_cart_item_from_session( $cart_item , $values ){
		
		if( ! empty( $values[ 'deposit' ] ) ){
			$cart_item[ 'deposit' ] = $values[ 'deposit' ];
		}
		return $cart_item;
	}
	
	
	/**
     * @brief Calculate Deposit and update cart item meta with new values
	 * @param $product
	 * @param $quantity
	 * @param $cart_item_data
	 */
	private function update_deposit_meta( $product , $quantity , &$cart_item_data ){
		
		if( $product ){
			
			$product_type = $product->get_type();
			if( $product_type === 'variation' ){
				
				$parent = wc_get_product( $product->get_parent_id() );
				
				$deposit_enabled = $parent->get_meta( '_wc_deposits_enable_deposit' , true );
			} else{
				$deposit_enabled = $product->get_meta( '_wc_deposits_enable_deposit' , true );
				
			}
			
			if( $deposit_enabled === 'yes' && isset( $cart_item_data[ 'deposit' ] ) &&
				$cart_item_data[ 'deposit' ][ 'enable' ] === 'yes'
			){
				
				if( $product_type === 'variation' ){
					
					$parent = wc_get_product( $product->get_parent_id() );
					$deposit = $parent->get_meta( '_wc_deposits_deposit_amount' , true );
					$amount_type = $parent->get_meta( '_wc_deposits_amount_type' , true );
					
				} else{
					
					$deposit = $product->get_meta( '_wc_deposits_deposit_amount' , true );
					$amount_type = $product->get_meta( '_wc_deposits_amount_type' , true );
					
				}
				
				$amount = 0;
				$woocommerce_prices_include_tax = get_option( 'woocommerce_prices_include_tax' );
				
				switch( $product_type ){
					
					case 'booking':
						$amount = $cart_item_data[ 'booking' ][ '_cost' ];
						if( $product->has_persons() && $product->wc_deposits_enable_per_person == 'yes' ){
							$persons = array_sum( $cart_item_data[ 'booking' ][ '_persons' ] );
							if( $amount_type === 'fixed' ){
								$deposit = $deposit * $persons;
							} else{ // percent
								$deposit = $deposit / 100.0 * $amount;
							}
						} else{
							if( $amount_type === 'percent' ){
								$deposit = $deposit / 100.0 * $amount;
							}
						}
						break;
					case 'subscription' :
						if( class_exists( 'WC_Subscriptions_Product' ) ){
							
							$amount = WC_Subscriptions_Product::get_sign_up_fee( $product );
							if( $amount_type === 'fixed' ){
								$deposit = $deposit * $quantity;
							} else{
								$deposit = $amount * ( $deposit / 100.0 );
							}
							
						}
						break;
					case 'yith_bundle' :
						$amount = $product->price_per_item_tot;
						if( $amount_type === 'fixed' ){
							$deposit = $deposit * $quantity;
						} else{
							$deposit = $amount * ( $deposit / 100.0 );
						}
						break;
					case 'variable' :
						
						$amount = $cart_item_data[ 'line_subtotal' ];
						if( $amount_type === 'fixed' ){
							$deposit = $deposit * $quantity;
						} else{
							$deposit = $amount * ( $deposit / 100.0 );
						}
						break;
					
					default:
						
						
						if( $woocommerce_prices_include_tax === 'yes' ){
							
							$amount = wc_get_price_including_tax( $product , array( 'qty' => $quantity ) );
							
						} else{
							$amount = wc_get_price_excluding_tax( $product , array( 'qty' => $quantity ) );
							
						}
						if( $amount_type === 'fixed' ){
							$deposit = $deposit * $quantity;
							
						} else{
							$deposit = $amount * ( $deposit / 100.0 );
						}
						
						break;
				}
				
				if( $deposit < $amount && $deposit > 0 ){
					
					
					$cart_item_data[ 'deposit' ][ 'deposit' ] = $deposit;
					$cart_item_data[ 'deposit' ][ 'remaining' ] = $amount - $deposit;
					$cart_item_data[ 'deposit' ][ 'total' ] = $amount;
				} else{
					$cart_item_data[ 'deposit' ][ 'enable' ] = 'no';
				}
				
				$cart_item_data[ 'deposit' ] = apply_filters( 'wc_deposits_cart_item_deposit_data' , $cart_item_data[ 'deposit' ] , $cart_item_data );
			}
		}
		
	}
	
	/**
	 * @brief triggers update deposit for all cart items when cart is updated
	 */
	public function cart_updated(){
		
		foreach( WC()->cart->cart_contents as &$cart_item ){
			
			$this->update_deposit_meta( $cart_item[ 'data' ] , $cart_item[ 'quantity' ] , $cart_item );
		}
		
	}
	
	/**
     * @brief triggers update deposit for all cart items when cart is updated
	 * @param $cart_item_key
	 * @param $quantity
	 */
	public function after_cart_item_quantity_update( $cart_item_key , $quantity ){
		$product = WC()->cart->cart_contents[ $cart_item_key ][ 'data' ];
		$this->update_deposit_meta( $product , $quantity , WC()->cart->cart_contents[ $cart_item_key ] );
	}
	
	
	/**
	 * @brief Calculate total Deposit in cart totals area
	 *
	 * @param mixed $cart_total ...
	 * @param mixed $cart ...
	 *
	 * @return float
	 */
	public function calculated_total( $cart_total , $cart ){
		
		$cart_original = $cart_total;
		$deposit_amount = 0;
		$deposit_total = 0;
		$full_amount_products = 0;
		$full_amount_taxes = 0;
		$deposit_enabled = false;
		$woocommerce_prices_include_tax = get_option( 'woocommerce_prices_include_tax' );
		
		if( wcdp_checkout_mode() ){
			
			$deposit_amount = get_option( 'wc_deposits_checkout_mode_deposit_amount' );
			$amount_type = get_option( 'wc_deposits_checkout_mode_deposit_amount_type' );
			
			foreach( WC()->cart->get_cart() as $cart_item ){
				
				if( $woocommerce_prices_include_tax === 'yes' ){
					
					$deposit_total += wc_get_price_including_tax( $cart_item[ 'data' ] , array( 'qty' => $cart_item[ 'quantity' ] ) );
					
				} else{
					$deposit_total += wc_get_price_excluding_tax( $cart_item[ 'data' ] , array( 'qty' => $cart_item[ 'quantity' ] ) );
				}
				
			}
			
			if( $amount_type === 'percentage' ){
				
				if( WC()->cart->discount_cart > 0 ){
					$deposit_amount = ( ( WC()->cart->subtotal_ex_tax - WC()->cart->discount_cart ) * $deposit_amount ) / 100;
				} else{
					$deposit_amount = ( WC()->cart->subtotal_ex_tax * $deposit_amount ) / 100;
				}
				
			}
		} else{
			
			foreach( $cart->cart_contents as $cart_item_key => &$cart_item ){
				
				if( isset( $cart_item[ 'deposit' ] ) && $cart_item[ 'deposit' ][ 'enable' ] === 'yes' ){
					$product = wc_get_product( $cart_item[ 'product_id' ] );
					$this->update_deposit_meta( $cart_item[ 'data' ] , $cart_item[ 'quantity' ] , $cart_item );
					$deposit_amount += $cart_item[ 'deposit' ][ 'deposit' ];
					$deposit_total += $cart_item[ 'deposit' ][ 'total' ];
					
					if( $product->get_type() === 'subscription' && class_exists( 'WC_Subscriptions_Product' ) ){
						$deposit_amount += WC_Subscriptions_Product::get_price( $product );
					}
					
				} else{
					
					//YITH bundle compatiblity
					if( isset( $cart_item[ 'bundled_by' ] ) ){
						
						$bundled_by = $cart->cart_contents[ $cart_item[ 'bundled_by' ] ];
						if( isset( $bundled_by[ 'deposit' ] ) && $bundled_by[ 'deposit' ][ 'enable' ] === 'yes' ){
							
							if( ! ( isset( $bundled_by[ 'data' ]->per_items_pricing ) && $bundled_by[ 'data' ]->per_items_pricing ) ){
								$full_amount_products += $cart_item[ 'line_total' ];
							}
						} else{
							
							$full_amount_products += $cart_item[ 'line_total' ];
						}
						
					} else{
						
						if( $woocommerce_prices_include_tax !== 'yes' ){
							$full_amount_products += $cart_item[ 'line_total' ];
						} else{
							$full_amount_products += $cart_item[ 'line_total' ];
							$full_amount_taxes += $cart_item[ 'line_tax' ];
							
						}
					}
				}
				
				
			}
		}
		
		$do_calculations = false;
		
		if( $deposit_amount > 0 && $deposit_amount < ( $deposit_total + $cart->fee_total + $cart->tax_total + $cart->shipping_total ) ){
			
			if( ! wcdp_checkout_mode() ){
				$deposit_amount += $full_amount_products;
				$deposit_enabled = true;
				$do_calculations = true;
			} else{
				
				if( is_ajax() && isset( $_POST[ 'deposit-radio' ] ) && $_POST[ 'deposit-radio' ] === 'deposit' ){
					$deposit_enabled = true;
					
					$do_calculations = true;
				} elseif( is_ajax() && isset( $_POST[ 'deposit-radio' ] ) && $_POST[ 'deposit-radio' ] === 'full' ){
					
					$deposit_enabled = false;
				} else{
					
					$default_checked = get_option( 'wc_deposits_default_option' , 'deposit' );
					$do_calculations = true;
					$deposit_enabled = true;
				}
			}
		}
		
		$deposit_breakdown = null;
		
		/*
		 * Additional fees handling. 
		 */
		if( $do_calculations ){
			$fees_handling = get_option( 'wc_deposits_fees_handling' );
			$taxes_handling = get_option( 'wc_deposits_taxes_handling' );
			$shipping_handling = get_option( 'wc_deposits_shipping_handling' );
			$shipping_taxes_handling = get_option( 'wc_deposits_shipping_taxes_handling' );
			
			// Default option: collect fees with the second payment.
			$deposit_fees = 0.0;
			$deposit_taxes = 0.0;
			$deposit_shipping = 0.0;
			$deposit_shipping_taxes = 0.0;
			
			$deposit_percentage = $deposit_amount * 100 / $cart->subtotal_ex_tax;
			
			if( wcdp_checkout_mode() && WC()->cart->discount_cart > 0 ){
				$deposit_percentage = $deposit_amount * 100 / ( $cart->subtotal_ex_tax - $cart->discount_cart );
			}
			
			/*
			 * Fees handling.
			 */
			switch( $fees_handling ){
				case 'deposit' :
					$deposit_fees = $cart->fee_total;
					break;
				
				case 'split' :
					$deposit_fees = $cart->fee_total * $deposit_percentage / 100;
					break;
			}
			
			/*
			 * Taxes handling.
			 */
			if( $woocommerce_prices_include_tax !== 'yes' ){
				switch( $taxes_handling ){
					case 'deposit' :
						$deposit_taxes = $cart->tax_total;
						break;
					
					case 'split' :
						$deposit_taxes = $cart->tax_total * $deposit_percentage / 100;
						break;
				}
			}
			
			/*
			 * Shipping handling.
			 */
			switch( $shipping_handling ){
				case 'deposit' :
					$deposit_shipping = $cart->shipping_total;
					break;
				
				case 'split' :
					$deposit_shipping = $cart->shipping_total * $deposit_percentage / 100;
					break;
			}
			
			/*
			 * Shipping taxes handling.
			 */
			switch( $shipping_taxes_handling ){
				case 'deposit' :
					$deposit_shipping_taxes = $cart->shipping_tax_total;
					break;
				
				case 'split' :
					$deposit_shipping_taxes = $cart->shipping_tax_total * $deposit_percentage / 100;
					break;
			}
			
			// Add fees, taxes, shipping and shipping taxes to the deposit amount.
			$cart_items_deposit_amount = $deposit_amount;
			$deposit_amount += $deposit_fees + $deposit_taxes + $deposit_shipping + $deposit_shipping_taxes;
			
			// Deposit breakdown tooltip.
			$deposit_breakdown = array(
				'cart_items' => $cart_items_deposit_amount ,
				'fees' => $deposit_fees ,
				'taxes' => $deposit_taxes ,
				'shipping' => $deposit_shipping ,
				'shipping_taxes' => $deposit_shipping_taxes ,
			);
		}
		
		$deposit_amount = apply_filters( 'woocommerce_deposits_cart_deposit_amount' , $deposit_amount , $cart_total );
		$second_payment = $cart_total - $deposit_amount;
		
		WC()->cart->deposit_info = array();
		WC()->cart->deposit_info[ 'deposit_enabled' ] = $deposit_enabled;
		WC()->cart->deposit_info[ 'deposit_breakdown' ] = $deposit_breakdown;
		WC()->cart->deposit_info[ 'deposit_amount' ] = $deposit_amount;
		WC()->cart->deposit_info[ 'second_payment' ] = $second_payment;
		
		// backward compatibility to be removed in future
		WC()->cart->cart_session_data[ 'deposit_enabled' ] = $deposit_enabled;
		WC()->cart->cart_session_data[ 'deposit_breakdown' ] = $deposit_breakdown;
		WC()->cart->cart_session_data[ 'deposit_amount' ] = $deposit_amount;
		WC()->cart->cart_session_data[ 'second_payment' ] = $second_payment;
		
		
		return $cart_original;
		
	}
	
	/**
	 * @brief Display Deposit and remaining amount in cart totals area
	 */
	public function cart_totals_after_order_total(){
		
		if( isset( WC()->cart->deposit_info[ 'deposit_enabled' ] ) && WC()->cart->deposit_info[ 'deposit_enabled' ] === true ) :
			
			
			$to_pay_text = __( get_option( 'wc_deposits_to_pay_text' ) , 'woocommerce-deposits' );
			$second_payment_text = __( get_option( 'wc_deposits_second_payment_text' ) , 'woocommerce-deposits' );
			
			
			if( $to_pay_text === false ){
				$to_pay_text = __( 'To Pay' , 'woocommerce-deposits' );
			}
			
			
			if( $second_payment_text === false ){
				$second_payment_text = __( 'Second Payment' , 'woocommerce-deposits' );
			}
			$to_pay_text = stripslashes( $to_pay_text );
			$second_payment_text = stripslashes( $second_payment_text );
			
			
			$deposit_breakdown_tooltip = wc_deposits_deposit_breakdown_tooltip();
			
			?>
            <tr class="order-paid">
                <th><?php echo $to_pay_text ?>&nbsp;&nbsp;<?php echo $deposit_breakdown_tooltip; ?>
                </th>
                <td data-title="<?php echo $to_pay_text; ?>">
                    <strong><?php echo wc_price( WC()->cart->deposit_info[ 'deposit_amount' ] ); ?></strong></td>
            </tr>
            <tr class="order-remaining">
                <th><?php echo $second_payment_text; ?></th>
                <td data-title="<?php echo $second_payment_text; ?>">
                    <strong><?php echo wc_price( WC()->cart->deposit_info[ 'second_payment' ] ); ?></strong></td>
            </tr>
			<?php
		endif;
	}
 
	
	
}