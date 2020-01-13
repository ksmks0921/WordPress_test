<?php

if( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
}

if( ! class_exists( 'WC_Deposits_Email_Customer_Partially_Paid' ) ) :
	
	/**
	 * Customer Partially Paid Email
	 *
	 * An email sent to the customer when a new order is partially paid.
	 *
	 */
	class WC_Deposits_Email_Customer_Partially_Paid extends WC_Email{
		
		/**
		 * Constructor
		 */
		function __construct(){
			
			$this->id = 'customer_partially_paid';
			$this->title = __( 'Partial Payment Received' , 'woocommerce-deposits' );
			$this->description = __( 'This is an order notification sent to the customer after partial-payment, containing order details and a link to pay the remaining balance.' , 'woocommerce-deposits' );
			$this->heading = __( 'Thank you for your order' , 'woocommerce-deposits' );
			$this->subject = __( 'Your {site_title} order receipt from {order_date}' , 'woocommerce-deposits' );
			$this->template_html = 'emails/customer-order-partially-paid.php';
			$this->template_plain = 'emails/plain/customer-order-partially-paid.php';
			
			// Triggers for this email
			add_action( 'woocommerce_order_status_pending_to_partially-paid_notification' , array( $this , 'trigger' ) );
			add_action( 'woocommerce_order_status_on-hold_to_partially-paid_notification' , array( $this , 'trigger' ) );
			add_action( 'woocommerce_order_status_failed_to_partially-paid_notification' , array( $this , 'trigger' ) );
			
			// Call parent constructor
			parent::__construct();
			
			$this->template_base = WC_DEPOSITS_TEMPLATE_PATH;
		}
		
		
		
		/**
		 * Trigger the sending of this email.
		 *
		 * @param int $order_id The order ID.
		 * @param WC_Order $order Order object.
		 */
		public function trigger( $order_id, $order = false ) {
			if ( $order_id && ! is_a( $order, 'WC_Order' ) ) {
				$order = wc_get_order( $order_id );
				
			}
			
			if ( is_a( $order, 'WC_Order' ) ) {
				$this->object                  = $order;
				
				$this->find['order-date']      = '{order_date}';
				$this->find['order-number']    = '{order_number}';
				$this->replace['order-date']   = wc_format_datetime( $this->object->get_date_created() );
				$this->replace['order-number'] = $this->object->get_order_number();
			}
			$this->recipient = $this->object->get_billing_email();
			
			if ( ! $this->is_enabled() || ! $this->get_recipient() ) {
				return;
			}
			
			$this->send( $this->get_recipient(), $this->get_subject(), $this->get_content(), $this->get_headers(), $this->get_attachments() );
		}
		
		
		/**
		 * get_content_html function.
		 *
		 * @access public
		 */
		function get_content_html(){
			
			
			return wc_get_template_html( $this->template_html , array(
				'order' => $this->object ,
				'email_heading' => $this->get_heading() ,
				'sent_to_admin' => false ,
				'plain_text' => false ,
				'email' => $this ,
			) , '' , $this->template_base );
			
		}
		
		/**
		 * get_content_plain function.
		 *
		 * @access public
		 */
		function get_content_plain(){
			
			
			return wc_get_template_html( $this->template_html , array(
				'order' => $this->object ,
				'email_heading' => $this->get_heading() ,
				'sent_to_admin' => false ,
				'plain_text' => true ,
				'email' => $this ,
			) , '' , $this->template_base );
		}
	}

endif;

return new WC_Deposits_Email_Customer_Partially_Paid();
