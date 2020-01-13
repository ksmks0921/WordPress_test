<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

?>

<?php do_action('woocommerce_email_header', $email_heading, $email); ?>

<p><?php _e("Your order has been received and is now being processed. Your order details are shown below for your reference:", 'woocommerce-deposits'); ?></p>

<?php if ($order->has_status('partially-paid') && get_option('wc_deposits_remaining_payable', 'yes') === 'yes') : ?>

    <p><?php printf(__('To pay the remaining balance, please visit this link: %s', 'woocommerce-deposits'), '<a href="' . esc_url($order->get_checkout_payment_url()) . '">' . __('pay', 'woocommerce-deposits') . '</a>'); ?></p>

<?php endif; ?>

<?php

/**
 * @hooked WC_Emails::order_details() Shows the order details table.
 * @hooked WC_Structured_Data::generate_order_data() Generates structured data.
 * @hooked WC_Structured_Data::output_structured_data() Outputs structured data.
 * @since 2.5.0
 */
do_action( 'woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email );

/**
 * @hooked WC_Emails::order_meta() Shows order meta data.
 */
do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email );

/**
 * @hooked WC_Emails::customer_details() Shows customer details
 * @hooked WC_Emails::email_address() Shows email address
 */
do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email );

/**
 * @hooked WC_Emails::email_footer() Output the email footer
 */
do_action( 'woocommerce_email_footer', $email );


