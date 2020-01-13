<?php
/*Copyright: © 2017 Webtomizer.
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

if( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
}

/**
 * @brief Handles email notifications
 *
 * @since 1.3
 *
 */
class WC_Deposits_Emails{
	
	public $actions = array();
	
	/**
	 * WC_Deposits_Emails constructor.
	 * @param $wc_deposits
	 */
	public function __construct( &$wc_deposits ){
		
		$email_actions = array(
			array(
				'from' => array( 'pending' , 'on-hold' , 'failed' , 'draft' ) ,
				'to' => array( 'partially-paid' )
			) ,
			array(
				'from' => array( 'partially-paid' ) ,
				'to' => array( 'processing' , 'completed' , 'on-hold' )
			)
		);
		
		foreach( $email_actions as $action ){
			foreach( $action[ 'from' ] as $from ){
				foreach( $action[ 'to' ] as $to ){
					$this->actions[] = 'woocommerce_order_status_' . $from . '_to_' . $to;
				}
			}
		}
		$this->actions[] = 'woocommerce_deposits_second_payment_reminder_email';
		$this->actions = array_unique( $this->actions );
		
		add_filter( 'woocommerce_email_actions' , array( $this , 'email_actions' ) );
		add_action( 'woocommerce_email' , array( $this , 'register_hooks' ) );
		add_filter( 'woocommerce_email_classes' , array( $this , 'email_classes' ) );
		add_filter( 'woocommerce_purchase_note_order_statuses' , array( $this , 'purchase_note_order_statuses' ),10,1 );
		add_filter( 'woocommerce_order_is_paid' , array( $this , 'order_is_paid' ),10,2 );
	}
	
	/**
	 * @brief Merge this class actions with Woocommerce Email actions
	 * @param $actions
	 * @return array
	 */
	public function email_actions( $actions ){
		
		
		return array_unique( array_merge( $actions , $this->actions ) );
	}
	
	/**
	 * @brief Hook our custom order status to all relevant existing email classes
	 *
	 * @since 1.3
	 *
	 * @return void
	 */
	public function register_hooks( $wc_emails ){
		$class_actions = array(
			'WC_Email_New_Order' => array(
				array(
					'from' => array( 'pending' , 'failed' , 'draft' ) ,
					'to' => array( 'partially-paid' )
				) ,
			) ,
			'WC_Email_Customer_Processing_Order' => array(
				/**
				 * @since 1.5
				 * Uncomment the following for old behaviour, this is now the responsibility of WC_Deposits_Email_Customer_Partially_Paid.
				 *
				 * array(
				 * 'from' => array('pending'),
				 * 'to' => array('partially-paid')
				 * ),
				 */
				array(
					'from' => array( 'partially-paid' ) ,
					'to' => array( 'processing' , 'on-hold' )
				) ,
			) ,
		);
		
		foreach( $wc_emails->emails as $class => $instance ){
			if( isset( $class_actions[ $class ] ) ){
				foreach( $class_actions[ $class ] as $actions ){
					foreach( $actions[ 'from' ] as $from ){
						foreach( $actions[ 'to' ] as $to ){
							add_action( 'woocommerce_order_status_' . $from . '_to_' . $to . '_notification' , array( $instance , 'trigger' ) );
						}
					}
				}
			}
		}
		
	}
	
	
	/**
	 * @brief add partially-paid to purchase note order status
	 * @param $statuses
	 * @return array
	 */
	function purchase_note_order_statuses( $statuses){
		
		$statuses[] = 'partially-paid';
		
		return $statuses;
	}
	
	/**
	 * @brief add partially-paid to paid statuses when sending partial payment email
	 * @param $statuses
	 * @param $order
	 * @return array
	 */
	function order_is_paid( $statuses, $order){
		
		if(did_action('woocommerce_email_before_order_table') && $order->get_status() === 'partially-paid') {
			$statuses[] = 'partially-paid';
			
		}
		
		return $statuses;
	}
	
	/**
	 * @brief add woocommerce deposits email classes to woocommerce
	 * @param $emails
	 * @return mixed
	 */
	public function email_classes( $emails ){
		$emails[ 'WC_Deposits_Email_Partial_Payment' ] = include( 'emails/class-wc-deposits-email-partial-payment.php' );
		$emails[ 'WC_Deposits_Email_Full_Payment' ] = include( 'emails/class-wc-deposits-email-full-payment.php' );
		$emails[ 'WC_Deposits_Email_Customer_Partially_Paid' ] = include( 'emails/class-wc-deposits-email-customer-partially-paid.php' );
		$emails[ 'WC_Deposits_Email_Customer_Remaining_Reminder' ] = include( 'emails/class-wc-deposits-email-customer-remaining-reminder.php' );
		return $emails;
	}
}
