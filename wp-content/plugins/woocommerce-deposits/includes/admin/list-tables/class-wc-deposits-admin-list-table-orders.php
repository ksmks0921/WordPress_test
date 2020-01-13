<?php
/*Copyright: © 2017 Webtomizer.
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

if( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * @brief Adds `Mark partially paid` to orders bulk actions.
 */

class WC_Deposits_Admin_List_Table_Orders {

	/**
	 * Constructor.
	 */
	public function __construct( &$wc_deposits ) {
		add_filter( 'bulk_actions-edit-shop_order', array( $this, 'order_bulk_actions' ), 10, 1 );
		add_filter( 'handle_bulk_actions-edit-shop_order', array( $this, 'handle_bulk_actions' ), 10, 3 );
		add_action( 'admin_notices', array( $this, 'bulk_admin_notices' ) );
	}

	/**
	 * Define bulk actions.
	 *
	 * @param array $actions Existing actions.
	 * @return array
	 */
	public function order_bulk_actions( $actions ) {
		$actions['mark_partially_paid'] = __( 'Mark partially paid', 'woocommerce-deposits' );
		return $actions;
	}

	/**
	 * Handle bulk actions.
	 *
	 * @param  string $redirect_to URL to redirect to.
	 * @param  string $action      Action name.
	 * @param  array  $ids         List of ids.
	 * @return string
	 */
	function handle_bulk_actions( $redirect_to, $action, $ids ) {
 		if( $action == 'mark_partially_paid' ) {
			$changed = 0;
			
			foreach ( $ids as $id ) {
				$order = new WC_Order( $id );
				$order->update_status( 'partially-paid', __( 'Order status changed by bulk edit:', 'woocommerce-deposits' ) );
				$changed++;
			}

			$redirect_to = add_query_arg(
				array(
					'post_type'             => 'shop_order',
					'marked_partially_paid' => true,
					'changed'               => $changed,
				), $redirect_to
			);
		}

		return $redirect_to;
	}

	/**
	 * Show confirmation message that order status changed for number of orders.
	 */	 
	function bulk_admin_notices() {
		global $post_type, $pagenow;

		// Exit if not on shop order list page.
		if ( 'edit.php' !== $pagenow || 'shop_order' !== $post_type ) {
			return;
		}
		
		if ( isset( $_REQUEST['marked_partially_paid'] ) ) {
			$number = isset( $_REQUEST['changed'] ) ? absint( $_REQUEST['changed'] ) : 0;
			if ( 'edit.php' == $pagenow && 'shop_order' == $post_type ) {
				$message = sprintf( _n( 'Order status changed.', '%s order statuses changed.', $number ), number_format_i18n( $number ) );
				echo '<div class="updated"><p>' . $message . '</p></div>';
			}
		}
	}

}