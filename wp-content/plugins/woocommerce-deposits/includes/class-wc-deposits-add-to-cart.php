<?php
/*Copyright: © 2017 Webtomizer.
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

if( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
}

/**
 * Class WC_Deposits_Add_To_Cart
 */
class WC_Deposits_Add_To_Cart{
	

	private $booking_cost = null;
	private $appointment_cost = null;
	
	
	/**
	 * WC_Deposits_Add_To_Cart constructor.
	 * @param $wc_deposits
	 */
	public function __construct( &$wc_deposits ){
		// Add the required styles
		add_action( 'wc_deposits_enqueue_product_scripts' , array( $this , 'enqueue_scripts' ) );
		add_action( 'wc_deposits_enqueue_product_scripts' , array( $this , 'enqueue_inline_styles' ) );
		add_filter( 'woocommerce_bookings_booking_cost_string' , array( $this , 'calculate_bookings_cost' ) );
		add_filter( 'booking_form_calculated_booking_cost' , array( $this , 'get_booking_cost' ) );
		
		//appointments plugin
		add_filter( 'woocommerce_appointments_appointment_cost_html' , array( $this , 'calculate_appointment_cost_html' ) );
		add_filter( 'appointment_form_calculated_appointment_cost' , array( $this , 'get_appointment_cost' ) , 100 );
		// Hook the add to cart form
		add_action( 'woocommerce_before_add_to_cart_button' , array( $this , 'before_add_to_cart_button' ),100 );
		add_filter( 'woocommerce_add_cart_item_data' , array( $this , 'add_cart_item_data' ) , 10 , 3 );
		

		
	}
	
	/**
	 * @brief Load the deposit-switch logic
	 *
	 * @return void
	 */
	public function enqueue_scripts(){
		
		global $post;
		
		$product = wc_get_product( $post->ID );
		$deposit_enabled = false;
		
		if($product){
			$deposit_enabled = wc_deposits_is_product_deposit_enabled( $post->ID );
			$amount_type = $product->get_meta( '_wc_deposits_amount_type' , true );
			$deposit_amount = $product->get_meta( '_wc_deposits_deposit_amount' , true );
		}
		
		if( $product && $deposit_enabled ){
			wp_enqueue_script( 'wc-deposits-add-to-cart' , WC_DEPOSITS_PLUGIN_URL . '/assets/js/add-to-cart.js' );
			
			$message_deposit = get_option( 'wc_deposits_message_deposit' );
			$message_full_amount = get_option( 'wc_deposits_message_full_amount' );
			
			$message_deposit = stripslashes( $message_deposit );
			$message_full_amount = stripslashes( $message_full_amount );
			
			$script_args = array(
				'message' => array(
					'deposit' => __( $message_deposit , 'woocommerce-deposits' ) ,
					'full' => __( $message_full_amount , 'woocommerce-deposits' )
				)
			);
			
			if( $product->get_type() === 'variable' && $amount_type !== 'fixed' ){
				
				
				$tax_display = get_option( 'wc_deposits_tax_display') === 'yes';
				$tax_handling = get_option('wc_deposits_taxes_handling');
				$tax = 0;
				
				
				foreach( $product->get_children() as $variation_id ){
					$variation = wc_get_product( $variation_id );
					if( ! is_object( $variation )){
						continue;
						
					}
					
					
					if($tax_display && $tax_handling ==='deposit'){
						$tax = wc_get_price_including_tax( $variation ) - wc_get_price_excluding_tax( $variation ) ;
					}
					elseif($tax_display && $tax_handling ==='split'){
						$tax_total = $tax = wc_get_price_including_tax( $variation ) - wc_get_price_excluding_tax( $variation );
						$tax = $tax_total * $deposit_amount / 100;
					}
					
				
					$amount = wc_price( wc_get_price_excluding_tax( $variation ) *
						( $deposit_amount / 100.0 ) + $tax );
					$script_args[ 'variations' ][ $variation_id ] = array( $amount );
				}
			}
			
			wp_localize_script( 'wc-deposits-add-to-cart' , 'wc_deposits_add_to_cart_options' , $script_args );
		}
		
	}
	
	
	/**
	 * @brief Enqueues front-end styles
	 *
	 * @return void
	 */
	public function enqueue_inline_styles(){
		global $post;
		$deposit_enabled = wc_deposits_is_product_deposit_enabled( $post->ID );
		if( $deposit_enabled ){
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
			
			echo '<style>' . $style . '</style>';
		}
		
	}
	
	/**
	 * get the updated booking cost and saves it to be used for html generation
	 * @param $cost
	 * @return mixed
	 */
	public function get_appointment_cost( $cost ){
		
		$this->appointment_cost = $cost;
		
		return $cost;
		
	}
	
	/**
	 * get the updated booking cost and saves it to be used for html generation
	 * @param $cost
	 * @return mixed
	 */
	public function get_booking_cost( $cost ){
		
		$this->booking_cost = $cost;
		
		return $cost;
		
	}
	
	/**
	 * @brief calculates new booking deposit on booking total change
	 * @param $html
	 * @return string
	 */
	public function calculate_bookings_cost( $html ){
		
		$posted = array();
		
		parse_str( $_POST[ 'form' ] , $posted );
		
		$product_id = $posted[ 'add-to-cart' ];
		$product = wc_get_product( $product_id );
		$amount_type = $product->get_meta( '_wc_deposits_amount_type' , true );
		$deposit_amount = $product->get_meta( '_wc_deposits_deposit_amount' , true );
		$deposits_enable_per_person = $product->get_meta( '_wc_deposits_enable_per_person' , true );
		
		$booking_cost = $this->booking_cost;
		if( $product->get_type() === 'booking' ){
			$amount = $booking_cost;
			if( $product->has_persons() && $deposits_enable_per_person == 'yes' ){
				
				if($product->has_person_types()){
					
						$persons = 0;
						
						$person_types = array_keys($product->get_person_types());
						
						foreach($person_types as $type){
							
							if(isset($posted['wc_bookings_field_persons_'.$type])){
								$persons += intval($posted['wc_bookings_field_persons_'.$type]);
							}
						}
						
						
					
				}
				else {
					$persons = $posted[ 'wc_bookings_field_persons' ];
					
				}
				
				
				if( $amount_type === 'fixed' ){
//					$deposit = $deposit_amount * $persons;
					$deposit = $deposit_amount;
				} else{ // percent
					$deposit = $deposit_amount / 100.0 * $amount;
				}
			} else{
				if( $amount_type === 'fixed' ){
					$deposit = $deposit_amount;
				} else{ // percent
					$deposit = $deposit_amount / 100.0 * $amount;
				}
			}
		}
		
		$deposit_html = wc_price( $deposit );
		$script = '<script type="text/javascript">
                var deposit_html = \'' . $deposit_html . '\'
            jQuery("#deposit-amount .amount").html(deposit_html);
               
                </script>';
		
		return $html . $script;
		
	}
	
	/**
	 * @param $html
	 * @return string
	 */
	public function calculate_appointment_cost_html( $html ){
		
		
		$posted = array();
		
		parse_str( $_POST[ 'form' ] , $posted );
		
		$product_id = $posted[ 'add-to-cart' ];
		$product = wc_get_product( $product_id );
		$amount_type = $product->get_meta( '_wc_deposits_amount_type' , true );
		$deposit_amount = $product->get_meta( '_wc_deposits_deposit_amount' , true );
		$appointment_cost = $this->appointment_cost;
		if( $product->get_type() === 'appointment' ){
			$amount = $appointment_cost;
			if( $amount_type === 'percent' ){
				$deposit = $deposit_amount / 100.0 * $amount;
			} else{
				$deposit = $deposit_amount;
			}
			
		}
		
		$deposit_html = wc_price( floatval( $deposit ) );
		$script = '<script type="text/javascript">
                var deposit_html = \'' . $deposit_html . '\'
                jQuery("#deposit-amount .amount").html(deposit_html);
                </script>';
		
		return $html . $script;
		
	}
	
	/**
	 *
	 */
	public function before_add_to_cart_button(){
		
		
		global $product;
		
		$product_id = $product->get_id();
		
		
		
		$deposit_enabled = wc_deposits_is_product_deposit_enabled( $product_id );
		if( $product && $deposit_enabled ){
			
			
			$product_type = $product->get_type();
			
			$amount_type = $product->get_meta( '_wc_deposits_amount_type' , true );
			$force_deposit = $product->get_meta( '_wc_deposits_force_deposit' , true );
			$force_deposit = apply_filters('wc_deposits_product_force_deposit',$force_deposit,$product_id);
			$deposit_amount = $product->get_meta( '_wc_deposits_deposit_amount' , true );
			$deposits_enable_per_person = $product->get_meta( '_wc_deposits_enable_per_person' , true );
			
			$tax_display = get_option( 'wc_deposits_tax_display') === 'yes';
			$tax_handling = get_option('wc_deposits_taxes_handling');
			$woocommerce_prices_include_tax = get_option( 'woocommerce_prices_include_tax' );
			$tax = 0;
			
			
			if($tax_display && $tax_handling ==='deposit'){
				$tax = wc_get_price_including_tax( $product ) - wc_get_price_excluding_tax( $product ) ;
			}
			elseif($tax_display && $tax_handling ==='split'){
				
				$tax_total = $tax = wc_get_price_including_tax( $product ) - wc_get_price_excluding_tax( $product );
				$deposit_percentage = $deposit_amount * 100 / ( $product->get_price() );
				
				if($amount_type === 'percent'){
					$deposit_percentage = $deposit_amount;
				}
				$tax = $tax_total * $deposit_percentage / 100;
				
			}
			
			if( $amount_type === 'fixed' ){
				

				if($woocommerce_prices_include_tax === 'yes'){
					$amount = wc_price( $deposit_amount  );
					
				}else{
					$amount = wc_price( $deposit_amount + $tax );
					
				}
				
				if( $product->get_type() === 'booking' && $product->has_persons() && $deposits_enable_per_person === 'yes' ){
					$suffix = __( 'per person' , 'woocommerce-deposits' );
				} elseif( $product_type === 'booking' ){
					$suffix = __( 'per booking' , 'woocommerce-deposits' );
				} elseif( ! $product->is_sold_individually() ){
					$suffix = __( 'per item' , 'woocommerce-deposits' );
				} else{
					$suffix = '';
				}
				
			}
			else{
				
				//percentage deposit calculation
				
				if( $product->get_type() === 'booking' ){
					$amount = '<span class=\'amount\'>' . round( $deposit_amount , 2 ) . '%' . '</span>';
				
				} elseif( $product->get_type() === 'variable' ){
					
					$min_variation = floatval( $product->get_variation_price( 'min' ) );
					$max_variation = floatval( $product->get_variation_price( 'max' ) );
					
					if( $min_variation && $max_variation ){
						
						
						if($tax_display && $tax_handling ==='deposit'){
							$min_variation = floatval( $product->get_variation_price( 'min' , true) );
							$max_variation = floatval( $product->get_variation_price( 'max' , true ) );
						}
						elseif($tax_display && $tax_handling ==='split'){
							
							$variations = $product->get_variation_prices();
							
							$product_ids = array_keys($variations['price']);
							$min_variation_id = current($product_ids);
							$min_variation_product = wc_get_product($min_variation_id);
							$min_variation_total_tax = floatval(wc_get_price_including_tax($min_variation_product)) - floatval( wc_get_price_excluding_tax($min_variation_product));
							
							$max_variation_id = end($product_ids);
							$max_variation_product = wc_get_product($max_variation_id);
							$max_variation_total_tax = floatval(wc_get_price_including_tax($max_variation_product)) - floatval( wc_get_price_excluding_tax($max_variation_product));
							
							
							
							$min_variation_deposit_percentage = $deposit_amount * 100 / ( $product->get_variation_price( 'min' , false) );
							$min_variation_tax = $min_variation_total_tax * $min_variation_deposit_percentage / 100;
							
							$max_variation_deposit_percentage = $deposit_amount * 100 / ( $product->get_variation_price( 'max' , false) );
							$max_variation_tax = $max_variation_total_tax * $max_variation_deposit_percentage / 100;
							
							$min_variation = floatval( $product->get_variation_price( 'min') + $min_variation_tax );
							$max_variation = floatval( $product->get_variation_price( 'max') + $max_variation_tax );
						}
						
						$amount_min = wc_price( $min_variation * $deposit_amount / 100.0 );
						$amount_max = wc_price( $max_variation * $deposit_amount / 100.0 );
						$amount = $amount_min . '&nbsp;&ndash;&nbsp;' . $amount_max;
					} else{
						$amount = wc_price( $product->get_price() * ( $deposit_amount / 100.0 ) + $tax );
					}
				} elseif( $product->get_type() === 'composite'){
					$amount = '<span class=\'amount\'>' . round( $deposit_amount , 2 ) . '%' . '</span>';
					
				} elseif( $product->get_type() === 'subscription' && class_exists( 'WC_Subscriptions_Product' ) ){
					
					
					$total_signup_fee = WC_Subscriptions_Product::get_sign_up_fee( $product );
					if( $amount_type === 'percent' ){
						$amount = wc_price( $total_signup_fee * ( $deposit_amount / 100.0 ) );
					} else{
						$amount = wc_price( $deposit_amount );
					}
				} else{
					
					if($woocommerce_prices_include_tax === 'yes'){
						$amount = wc_price( $product->get_price() * ( $deposit_amount / 100.0 )  );
						
					}else{
						$amount = wc_price( $product->get_price() * ( $deposit_amount / 100.0 ) + $tax );
						
					}
				}
				if( ! $product->is_sold_individually() ){
					$suffix = __( 'per item' , 'woocommerce-deposits' );
				} else{
					$suffix = '';
				}
			}
			
			
			$default_checked = get_option( 'wc_deposits_default_option' , 'deposit' );
			$basic_buttons = get_option( 'wc_deposits_use_basic_radio_buttons' , true ) === 'yes';
			$deposit_text = get_option( 'wc_deposits_button_deposit' );
			$full_text = get_option( 'wc_deposits_button_full_amount' );
			$deposit_option_text = get_option('wc_deposits_deposit_option_text');
			
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
			$args = array(
			        'deposit_info' => array(
			        	//raw amount before calculations
			        	'type' => $amount_type,
				        'amount' => $deposit_amount,
			        ),
			        'product' => $product,
                    'suffix' => $suffix,
                    'force_deposit' => $force_deposit,
                    'deposit_amount' => $amount,
                    'basic_buttons' => $basic_buttons,
                    'deposit_text' =>$deposit_text,
                    'full_text' => $full_text,
                    'deposit_option_text' => $deposit_option_text,
                    'default_checked' => $default_checked
                    
                    
            );
			
			wc_get_template('single-product/wc-deposits-product-slider.php',$args,'',WC_DEPOSITS_TEMPLATE_PATH);

		}
	}
	
	/**
	 * @param $cart_item_meta
	 * @param $product_id
	 * @param $variation_id
	 * @return mixed
	 */
	public function add_cart_item_data( $cart_item_meta , $product_id , $variation_id ){
		$deposit_enabled = wc_deposits_is_product_deposit_enabled( $product_id );
		$force_deposit = $this->is_product_deposit_forced( $product_id );
		
		if( $deposit_enabled ){
			$default = get_option( 'wc_deposits_default_option' );
			if( ! isset( $_POST[ $product_id . '-deposit-radio' ] ) ){
				$_POST[ $product_id . '-deposit-radio' ] = $default ? $default : 'deposit';
			}
			
			if( isset( $variation_id ) ){
				$_POST[ $variation_id . '-deposit-radio' ] = $_POST[ $product_id . '-deposit-radio' ];
			}
			
			$cart_item_meta[ 'deposit' ] = array(
				
				'enable' => $force_deposit ? 'yes' : ( $_POST[ $product_id . '-deposit-radio' ] === 'full' ? 'no' : 'yes' )
			);
		}
		return $cart_item_meta;
	}
	
	/**
	 * @param $product_id
	 * @return bool
	 */
	function is_product_deposit_forced( $product_id ){

		$product = wc_get_product( $product_id );
		return $product->get_meta( '_wc_deposits_force_deposit' , true ) === 'yes';
	}
}

