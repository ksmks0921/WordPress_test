<?php

if( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
}

if( ! class_exists( 'WC_Deposits_Email_Customer_Remaining_Reminder' ) ) :
	
	/**
	 * Customer Partially Paid Email
	 *
	 * An email sent to the customer when a new order is partially paid.
	 *
	 */
	class WC_Deposits_Email_Customer_Remaining_Reminder extends WC_Email{
		
		/**
		 * Constructor
		 */
		function __construct(){
			
			$this->id = 'customer_second_payment_reminder';
			$this->title = __( 'Second Payment Reminder' , 'woocommerce-deposits' );
			$this->description = __( 'This is a reminder of  partially-paid order  sent to the customer after specific period of time assigned in settings, containing order details and a link to pay the remaining balance.' , 'woocommerce-deposits' );
			
			$this->heading = __( 'Second Payment Reminder' , 'woocommerce-deposits' );
			$this->subject = __( 'Your {site_title} order second payment reminder {order_date}' , 'woocommerce-deposits' );
			
			$this->template_html = 'emails/customer-order-remaining-reminder.php';
			$this->template_plain = 'emails/plain/customer-order-remaining-reminder.php';
			
			// Triggers for this email
			add_action( 'woocommerce_deposits_second_payment_reminder_email_notification' , array( $this , 'trigger' ) );
	
			// Call parent constructor
			parent::__construct();
			
			$this->template_base = WC_DEPOSITS_TEMPLATE_PATH;
		}
		
		/**
		 * trigger function.
		 *
		 * @access public
		 * @return void
		 */
		function trigger( $order_id ){
			
			
			if( $order_id ){
				$this->object = wc_get_order( $order_id );
				$this->recipient = $this->object->get_billing_email();
				
				$this->find[ 'order-date' ] = '{order_date}';
				$this->find[ 'order-number' ] = '{order_number}';
				
				$this->replace[ 'order-date' ] = date_i18n( wc_date_format() , strtotime( $this->object->get_date_created() ) );
				$this->replace[ 'order-number' ] = $this->object->get_order_number();
			}
			
			if( ! $this->is_enabled() || ! $this->get_recipient() ){
				return;
			}
			
			$this->send( $this->get_recipient() , $this->get_subject() , $this->get_content() , $this->get_headers() , $this->get_attachments() );
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

return new WC_Deposits_Email_Customer_Remaining_Reminder();
