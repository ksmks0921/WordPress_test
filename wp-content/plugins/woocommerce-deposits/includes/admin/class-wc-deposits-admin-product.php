<?php
/*Copyright: © 2017 Webtomizer.
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

if( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
}

/**
 * @brief Adds the necessary panel to the product editor in the admin area
 *
 */
class WC_Deposits_Admin_Product{
	
	
	public $wc_deposits;
	
	/**
	 * WC_Deposits_Admin_Product constructor.
	 * @param $wc_deposits
	 */
	public function __construct( &$wc_deposits ){
		$this->wc_deposits = $wc_deposits;
		// Hook the product admin page
		add_action( 'woocommerce_product_write_panel_tabs' , array( $this , 'tab_options_tab' ) );
		add_action( 'woocommerce_product_data_panels' , array( $this , 'tab_options' ) );
		
		if(!wcdp_checkout_mode()){
			add_action( 'woocommerce_process_product_meta' , array( $this , 'process_product_meta' ) );
			add_action( 'woocommerce_product_bulk_edit_end' , array( $this , 'product_bulk_edit_end' ) );
			add_action( 'woocommerce_product_bulk_edit_save' , array( $this , 'product_bulk_edit_save' ) );
        }
		
	}
	
	
	/**
	 * @brief Adds an extra tab to the product editor
	 *
	 * @return void
	 */
	public function tab_options_tab(){
		?>
        <li class="deposits_tab"><a href="#deposits_tab_data"><?php _e( 'Deposit' , 'woocommerce-deposits' ); ?></a>
        </li><?php
	}
	
	/**
	 * @brief Adds tab contents in product editor
	 *
	 * @return void
	 */
	public function tab_options(){
		global $post;
		if( wcdp_checkout_mode() ){
			?>
            <div id="deposits_tab_data" class="panel woocommerce_options_panel">

                 <h3> <?php _e( 'Checkout Mode enabled , Deposit is calculated based on cart total.' , 'woocommerce-deposits' ); ?></h3>
                 <p><?php _e( 'If you would like to collect deposit on product basis , please disable Checkout mode. ' , 'woocomerce-deposits' ) ?>
                    <a
                            href="<?php echo get_admin_url( null , '/admin.php?page=wc-settings&tab=wc-deposits' ); ?>"> <?php _e( 'Go to plugin settings' , 'woocommerce-deposits' ) ?> </a>
                </p>
            </div>
			<?php
			return;
		}
		
		$product = wc_get_product( $post->ID );
		?>
        <div id="deposits_tab_data" class="panel woocommerce_options_panel">


            <div class="options_group">
                <p class="form-field">
					<?php woocommerce_wp_checkbox( array(
						'id' => '_wc_deposits_enable_deposit' ,
						'label' => __( 'Enable deposit' , 'woocommerce-deposits' ) ,
						'description' => __( 'Enable this to require a deposit for this item.' , 'woocommerce-deposits' ) ,
						'desc_tip' => true ) );
					?>
					<?php woocommerce_wp_checkbox( array(
						'id' => '_wc_deposits_force_deposit' ,
						'label' => __( 'Force deposit' , 'woocommerce-deposits' ) ,
						'description' => __( 'If you enable this, the customer will not be allowed to make a full payment.' ,
							'woocommerce-deposits' ) ,
						'desc_tip' => true ) );
					?>
                </p>
            </div>

            <div class="options_group">
                <p class="form-field">
					<?php woocommerce_wp_radio( array(
						'id' => '_wc_deposits_amount_type' ,
						'label' => __( 'Specify the type of deposit:' , 'woocommerce-deposits' ) ,
						'options' => array(
							'fixed' => __( 'Fixed value' , 'woocommerce-deposits' ) ,
							'percent' => __( 'Percentage of price' , 'woocommerce-deposits' )
						)
					) );
					?>
					<?php woocommerce_wp_text_input( array(
						'id' => '_wc_deposits_deposit_amount' ,
						'label' => __( 'Deposit amount' , 'woocommerce-deposits' ) ,
						'description' => __( 'This is the minimum deposited amount.<br/>Note: Tax will be added to the deposit amount you specify here.' ,
							'woocommerce-deposits' ) ,
						'type' => 'number' ,
						'desc_tip' => true ,
						'custom_attributes' => array(
							'min' => '0.0' ,
							'step' => '0.01'
						)
					) );
					?>
                </p>
            </div>
			
			<?php if( $product->is_type( 'booking' ) && $product->has_persons() ) : // check if the product has a 'booking' type, and if so, check if it has persons. ?>
                <div class="options_group">
                    <p class="form-field">
						<?php woocommerce_wp_checkbox( array(
							'id' => '_wc_deposits_enable_per_person' ,
							'label' => __( 'Multiply by persons' , 'woocommerce-deposits' ) ,
							'description' => __( 'Enable this to multiply the deposit by person count. (Only works when Fixed Value is active)' ,
								'woocommerce-deposits' ) ,
							'desc_tip' => true ) );
						?>
                    </p>
                </div>
			<?php endif; ?>
        </div>
		<?php
	}
	
	
	/**
	 * @brief Updates the product's metadata
	 *
	 * @return void
	 */
	public function process_product_meta( $post_id ){
	 
		$product = wc_get_product( $post_id );
		$product_type = $product->get_type();
		$enable_deposit = isset( $_POST[ '_wc_deposits_enable_deposit' ] ) ? 'yes' : 'no';
		$force_deposit = isset( $_POST[ '_wc_deposits_force_deposit' ] ) ? 'yes' : 'no';
		$enable_persons = isset( $_POST[ '_wc_deposits_enable_per_person' ] ) ? 'yes' : 'no';
		$amount_type = ( isset( $_POST[ '_wc_deposits_amount_type' ] ) &&
			( $_POST[ '_wc_deposits_amount_type' ] === 'fixed' ||
				$_POST[ '_wc_deposits_amount_type' ] === 'percent' ) ) ?
			$_POST[ '_wc_deposits_amount_type' ] : 'fixed';
		$amount = isset( $_POST[ '_wc_deposits_deposit_amount' ] ) &&
		is_numeric( $_POST[ '_wc_deposits_deposit_amount' ] ) ? floatval( $_POST[ '_wc_deposits_deposit_amount' ] ) : 0.0;
		
		if( $amount <= 0 || ( $amount_type === 'percent' && $amount >= 100 ) ){
			$enable_deposit = 'no';
			$amount = '';
		}
		
		if( ( $product_type === 'simple' || $product_type === 'variable' ) && ( $amount_type === 'fixed' && $amount >= $product->get_price() ) ){
			
			$enable_deposit = 'no';
			$amount = '';
			
		}
		
		$product->update_meta_data( '_wc_deposits_enable_deposit' , $enable_deposit );
		$product->update_meta_data( '_wc_deposits_force_deposit' , $force_deposit );
		$product->update_meta_data( '_wc_deposits_amount_type' , $amount_type );
		$product->update_meta_data( '_wc_deposits_deposit_amount' , $amount );
		
		if( $product->is_type( 'booking' ) && $product->has_persons() ){
			$product->update_meta_data( '_wc_deposits_enable_per_person' , $enable_persons );
		}
		$product->save();
		
		
	}
	
	/**
	 * @brief Output bulk-editing UI for products
	 *
	 * @since 1.5
	 */
	public function product_bulk_edit_end(){
		?>
        <label>
            <h4><?php _e( 'Deposit Options' , 'woocommerce-deposits' ); ?></h4>
        </label>
        <label>
            <span class="title"><?php esc_html_e( 'Enable Deposit?' , 'woocommerce-deposits' ); ?></span>
            <span class="input-text-wrap">
            <select class="enable_deposit" name="_enable_deposit">
            <?php
            $options = array(
	            '' => __( '— No Change —' , 'woocommerce-deposits' ) ,
	            'yes' => __( 'Yes' , 'woocommerce-deposits' ) ,
	            'no' => __( 'No' , 'woocommerce-deposits' )
            );
            foreach( $options as $key => $value ){
	            echo '<option value="' . esc_attr( $key ) . '">' . esc_html( $value ) . '</option>';
            }
            ?>
          </select>
        </span>
        </label>

        <label>
            <span class="title"><?php esc_html_e( 'Force Deposit?' , 'woocommerce-deposits' ); ?></span>
            <span class="input-text-wrap">
            <select class="force_deposit" name="_force_deposit">
            <?php
            $options = array(
	            '' => __( '— No Change —' , 'woocommerce-deposits' ) ,
	            'yes' => __( 'Yes' , 'woocommerce-deposits' ) ,
	            'no' => __( 'No' , 'woocommerce-deposits' )
            );
            foreach( $options as $key => $value ){
	            echo '<option value="' . esc_attr( $key ) . '">' . esc_html( $value ) . '</option>';
            }
            ?>
          </select>
        </span>
        </label>

        <label>
            <span class="title"><?php esc_html_e( 'Multiply By Persons?' , 'woocommerce-deposits' ); ?></span>
            <span class="input-text-wrap">
            <select class="deposit_multiply" name="_deposit_multiply">
            <?php
            $options = array(
	            '' => __( '— No Change —' , 'woocommerce-deposits' ) ,
	            'yes' => __( 'Yes' , 'woocommerce-deposits' ) ,
	            'no' => __( 'No' , 'woocommerce-deposits' )
            );
            foreach( $options as $key => $value ){
	            echo '<option value="' . esc_attr( $key ) . '">' . esc_html( $value ) . '</option>';
            }
            ?>
          </select>
        </span>
        </label>

        <label>
            <span class="title"><?php esc_html_e( 'Deposit Type?' , 'woocommerce-deposits' ); ?></span>
            <span class="input-text-wrap">
            <select class="deposit_type" name="_deposit_type">
            <?php
            $options = array(
	            '' => __( '— No Change —' , 'woocommerce-deposits' ) ,
	            'fixed' => __( 'Fixed' , 'woocommerce-deposit' ) ,
	            'percent' => __( 'Percentage' , 'woocommerce-deposit' )
            );
            foreach( $options as $key => $value ){
	            echo '<option value="' . esc_attr( $key ) . '">' . esc_html( $value ) . '</option>';
            }
            ?>
          </select>
        </span>
        </label>

        <div class="inline-edit-group">
            <label class="alignleft">
                <span class="title"><?php _e( 'Deposit Amount' , 'woocommerce-deposits' ); ?></span>
                <span class="input-text-wrap">
            <select class="change_deposit_amount change_to" name="change_deposit_amount">
            <?php
            $options = array(
	            '' => __( '— No Change —' , 'woocommerce-deposits' ) ,
	            '1' => __( 'Change to:' , 'woocommerce-deposits' ) ,
	            '2' => __( 'Increase by (fixed amount or %):' , 'woocommerce-deposits' ) ,
	            '3' => __( 'Decrease by (fixed amount or %):' , 'woocommerce-deposits' )
            );
            foreach( $options as $key => $value ){
	            echo '<option value="' . esc_attr( $key ) . '">' . $value . '</option>';
            }
            ?>
            </select>
          </span>
            </label>
            <label class="change-input">
                <input type="text" name="_deposit_amount" class="text deposit_amount"
                       placeholder="<?php echo sprintf( __( 'Enter Deposit Amount (%s)' , 'woocommerce-deposits' ) , get_woocommerce_currency_symbol() ); ?>"
                       value=""/>
            </label>
        </div>
		<?php
	}
	
	/**
	 * @brief Save bulk-edits to products
	 *
	 * @since 1.5
	 */
	function product_bulk_edit_save( $product ){
		if( ! empty( $_REQUEST[ '_enable_deposit' ] ) ){
			$product->update_meta_data( '_wc_deposits_enable_deposit' , wc_clean( $_REQUEST[ '_enable_deposit' ] ) );
		}
		if( ! empty( $_REQUEST[ '_force_deposit' ] ) ){
			$product->update_meta_data( '_wc_deposits_force_deposit' , wc_clean( $_REQUEST[ '_force_deposit' ] ) );
			
		}
		if( ! empty( $_REQUEST[ '_deposit_multiply' ] ) && $product->is_type( 'booking' ) && $product->has_persons() ){
			$product->update_meta_data( '_wc_deposits_enable_per_person' , wc_clean( $_REQUEST[ '_deposit_multiply' ] ) );
			
		}
		if( ! empty( $_REQUEST[ '_deposit_type' ] ) ){
			$product->update_meta_data( '_wc_deposits_amount_type' , wc_clean( $_REQUEST[ '_deposit_type' ] ) );
			
		}
		if( ! empty( $_REQUEST[ 'change_deposit_amount' ] ) ){
			$change_deposit_amount = absint( $_REQUEST[ 'change_deposit_amount' ] );
			$deposit_amount = esc_attr( stripslashes( $_REQUEST[ '_deposit_amount' ] ) );
			$old_deposit_amount = $product->wc_deposits_deposit_amount;
			switch( $change_deposit_amount ){
				case 1 :
					$new_deposit_amount = $deposit_amount;
					break;
				case 2 :
					if( strstr( $deposit_amount , '%' ) ){
						$percent = str_replace( '%' , '' , $deposit_amount ) / 100;
						$new_deposit_amount = $old_deposit_amount + ( $old_deposit_amount * $percent );
					} else{
						$new_deposit_amount = $old_deposit_amount + $deposit_amount;
					}
					break;
				case 3 :
					if( strstr( $deposit_amount , '%' ) ){
						$percent = str_replace( '%' , '' , $deposit_amount ) / 100;
						$new_deposit_amount = max( 0 , $old_deposit_amount - ( $old_deposit_amount * $percent ) );
					} else{
						$new_deposit_amount = max( 0 , $old_deposit_amount - $deposit_amount );
					}
					break;
				case 4 :
					if( strstr( $deposit_amount , '%' ) ){
						$percent = str_replace( '%' , '' , $deposit_amount ) / 100;
						$new_deposit_amount = max( 0 , $product->regular_price - ( $product->regular_price * $percent ) );
					} else{
						$new_deposit_amount = max( 0 , $product->regular_price - $deposit_amount );
					}
					break;
				
				default :
					break;
			}
			
			if( isset( $new_deposit_amount ) && $new_deposit_amount != $old_deposit_amount ){
				$new_deposit_amount = round( $new_deposit_amount , absint( get_option( 'woocommerce_price_num_decimals' ) ) );
				$product->update_meta_data( '_wc_deposits_deposit_amount' , $new_deposit_amount );
				
				
				$product->wc_deposits_deposit_amount = $new_deposit_amount;
			}
		}
		
		$product->save();
		
	}
}
