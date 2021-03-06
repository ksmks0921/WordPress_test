<?php
/*
 * This file belongs to the YIT Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

$columns = apply_filters( 'ywpo_my_pre_orders_columns', array(
    __( 'Product', 'yith-woocommerce-pre-order' ),
    __( 'Order', 'yith-woocommerce-pre-order' ),
    __( 'Price', 'yith-woocommerce-pre-order' )
) );

?>
    <table class="shop_table shop_table_responsive my_account_orders">
        <tr>
            <?php foreach ( $columns as $column ) : ?>
                <th><?php echo $column; ?></th>
            <?php endforeach; ?>
        </tr>
        <?php
        if ( $all_customer_order_ids ) {
            foreach ( $all_customer_order_ids as $order_id ) {
                $order = wc_get_order( $order_id );
                $items = $order->get_items();
                foreach ( $items as $item_id => $item ) {
	                if ( $order instanceof WC_Data ) {
		                $product = $item->get_product();
	                } else {
		                $product = $order->get_product_from_item( $item );
                    }
	                $item_is_pre_order = ! empty( $item['ywpo_item_preorder'] ) ? $item['ywpo_item_preorder'] : '';
	                $timestamp = ! empty( $item['ywpo_item_for_sale_date'] ) ? $item['ywpo_item_for_sale_date'] : '';
                    if ( apply_filters( 'ywpo_my_pre_orders_show_row', 'yes' == $item_is_pre_order, $item ) ) {
                        $is_visible        = $product && $product->is_visible();
                        $product_permalink = $is_visible ? $product->get_permalink() : '';
                        ?>
                        <tr>
                            <td>
                                <a href="<?php echo $product_permalink; ?>"><?php echo $product->get_title(); ?></a>
                                <?php
                                if ( $order instanceof WC_Data ) {
	                                wc_display_item_meta( $item );
	                                wc_display_item_downloads( $item);
                                } else {
	                                $order->display_item_meta( $item );
	                                $order->display_item_downloads( $item );
                                }
                                ?>
                            </td>
                            <td>
                                <a href="<?php echo esc_url( $order->get_view_order_url() ); ?>"><?php
                                    echo _x( '#', 'hash before order number', 'yith-woocommerce-pre-order' )
                                         . $order->get_order_number(); ?></a>
                            </td>
                            <td>
                                <?php echo $order->get_formatted_line_subtotal( $item ); ?>
                            </td>
	                        <?php
	                        do_action( 'ywpo_my_pre_orders_extra_columns', $item );
	                        ?>
                        </tr>
                        <?php
                    }
                }
            }
        } else {
            ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <?php
        }
        ?>

    </table>
<?php
