<?php
/*Copyright: © 2017 Webtomizer.
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

if( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
}

if( ! class_exists( 'WC_Admin_Report' ) ) :
	include_once( WC()->plugin_path() . '/includes/admin/reports/class-wc-admin-report.php' );

endif;

/**
 * @brief Adds WooCommerce reports for deposits
 *
 */
class WC_Deposits_Admin_Reports extends WC_Admin_Report{
	
	public $chart_colours = array();
	
	public function admin_reports( $reports ){
		$reports[ 'orders' ][ 'reports' ][ 'deposits' ] = array(
			'title' => __( 'Deposits' , 'woocommerce-deposits' ) ,
			'description' => '' ,
			'hide_title' => true ,
			'callback' => array( $this , 'get_report' )
		);
		return $reports;
	}
	
	public function get_report( $name ){
		$this->chart_colours = array(
			'deposit_remaining' => '#e74c3c' ,
			'deposit_paid' => '#ecf0f1' ,
			'deposit_total' => '#5cc488' ,
			
			'sales_amount' => '#b1d4ea' ,
			'net_sales_amount' => '#3498db' ,
			'average' => '#95a5a6' ,
			'order_count' => '#dbe1e3' ,
			'item_count' => '#ecf0f1' ,
			'shipping_amount' => '#5cc488' ,
			'coupon_amount' => '#f1c40f' ,
			'refund_amount' => '#e74c3c'
		);
		$ranges = array(
			'year' => __( 'Year' , 'woocommerce-deposits' ) ,
			'last_month' => __( 'Last Month' , 'woocommerce-deposits' ) ,
			'month' => __( 'This Month' , 'woocommerce-deposits' ) ,
			'7day' => __( 'Last 7 Days' , 'woocommerce-deposits' )
		);
		$current_range = ! empty( $_GET[ 'range' ] ) ? sanitize_text_field( $_GET[ 'range' ] ) : '7day';
		
		if( ! in_array( $current_range , array( 'custom' , 'year' , 'last_month' , 'month' , '7day' ) ) ){
			$current_range = '7day';
		}
		
		$this->calculate_current_range( $current_range );
		
		include( WC()->plugin_path() . '/includes/admin/views/html-report-by-date.php' );
	}
	
	public function get_export_button(){
		$current_range = ! empty( $_GET[ 'range' ] ) ? sanitize_text_field( $_GET[ 'range' ] ) : '7day';
		?>
        <a
                href="#"
                download="report-<?php echo esc_attr( $current_range ); ?>-<?php echo date_i18n( 'Y-m-d' , current_time( 'timestamp' ) ); ?>.csv"
                class="export_csv"
                data-export="chart"
                data-xaxes="<?php _e( 'Date' , 'woocommerce-deposits' ); ?>"
                data-groupby="<?php echo $this->chart_groupby; ?>"
        >
			<?php _e( 'Export CSV' , 'woocommerce-deposits' ); ?>
        </a>
		<?php
	}
	
	public function get_chart_legend(){
		$legend = array();
		
		$total_deposit_query = array(
			'data' => array(
				'_wc_deposits_deposit_amount' => array(
					'type' => 'meta' ,
					'function' => 'SUM' ,
					'name' => 'deposit_total'
				) ,
			) ,
			'where' => array() ,
			'query_type' => 'get_var' ,
			'filter_range' => true ,
			'order_status' => array( 'partially-paid' ) ,
			'order_types' => wc_get_order_types( 'order-count' ) ,
		);
		
		$total_remaining_query = array(
			'data' => array(
				'_wc_deposits_second_payment' => array(
					'type' => 'meta' ,
					'function' => 'SUM' ,
					'name' => 'deposit_remaining'
				) ,
			) ,
			'where' => array() ,
			'query_type' => 'get_var' ,
			'filter_range' => true ,
			'order_status' => array( 'partially-paid' ) ,
			'order_types' => wc_get_order_types( 'order-count' ) ,
		);
		

		
		$total_paid_query = array(
			'data' => array(
				'_wc_deposits_original_total' => array(
					'type' => 'meta' ,
					'function' => 'SUM' ,
					'name' => 'deposit_paid'
				) ,
			) ,
			'where' => array() ,
			'query_type' => 'get_var' ,
			'filter_range' => true ,
			'order_status' => array( 'partially-paid' ) ,
			'order_types' => wc_get_order_types( 'order-count' ) ,
		);
		
		
		$total_deposits_paid = $this->get_order_report_data( $total_deposit_query );
		$total_remaining = $this->get_order_report_data( $total_remaining_query );
		$total_partial_payment_orders = $this->get_order_report_data( $total_paid_query );
		
		$legend[] = array(
			'title' => sprintf( __( '%s deposits in total' , 'woocommerce-deposits' ) ,
				'<strong>' . wc_price( $total_deposits_paid ) . '</strong>'
			) ,
			'color' => $this->chart_colours[ 'deposit_paid' ] ,
			'highlight_series' => 1
		);
		
		$legend[] = array(
			'title' => sprintf( __( '%s remaining in total' , 'woocommerce-deposits' ) ,
				'<strong>' . wc_price( $total_remaining ) . '</strong>'
			) ,
			'color' => $this->chart_colours[ 'deposit_remaining' ] ,
			'highlight_series' => 2
		);
		
		$legend[] = array(
			'title' => sprintf( __( '%s partially-paid in total' , 'woocommerce-deposits' ) ,
				'<strong>' . wc_price( $total_partial_payment_orders ) . '</strong>'
			) ,
			'color' => $this->chart_colours[ 'deposit_total' ] ,
			'highlight_series' => 3
		);
		
		
		return $legend;
	}
	
	public function get_main_chart(){
		global $wp_locale;
		
		// Get orders and dates in range - we want the SUM of order totals, COUNT of order items, COUNT of orders, and the date
		$orders = (array) $this->get_order_report_data( array(
			'data' => array(
				'_wc_deposits_original_total' => array(
					'type' => 'meta' ,
					'function' => 'SUM' ,
					'name' => 'total_sales'
				) ,
				'_wc_deposits_second_payment' => array(
					'type' => 'meta' ,
					'function' => 'SUM' ,
					'name' => 'order_remaining'
				) ,
				'ID' => array(
					'type' => 'post_data' ,
					'function' => 'COUNT' ,
					'name' => 'total_orders' ,
					'distinct' => true ,
				) ,
				'post_date' => array(
					'type' => 'post_data' ,
					'function' => '' ,
					'name' => 'post_date'
				) ,
			) ,
			'group_by' => $this->group_by_query ,
			'order_by' => 'post_date ASC' ,
			'query_type' => 'get_results' ,
			'filter_range' => true ,
			'order_types' => wc_get_order_types( 'sales-reports' ) ,
			'order_status' => array( 'partially-paid' ) ,
		) );
		
		$deposit_paid_query = array(
			'data' => array(
				'_wc_deposits_original_total' => array(
					'type' => 'meta' ,
					'function' => '+' ,
					'name' => 'deposit_paid'
				) ,
				'_wc_deposits_remaining' => array(
					'type' => 'meta' ,
					'function' => '-' ,
					'name' => 'deposit_remaining'
				) ,
				'ID' => array(
					'type' => 'post_data' ,
					'function' => 'COUNT' ,
					'name' => 'total_orders' ,
					'distinct' => true ,
				) ,
				'post_date' => array(
					'type' => 'post_data' ,
					'function' => '' ,
					'name' => 'post_date'
				) ,
			) ,
			'where' => array() ,
			'group_by' => $this->group_by_query ,
			'order_by' => 'post_date ASC' ,
			'query_type' => 'get_results' ,
			'filter_range' => true ,
			'order_types' => wc_get_order_types( 'sales-reports' ) ,
			'order_status' => array( 'partially-paid' )
		);
		
		$deposits_paid = (array) $this->get_order_report_data( $deposit_paid_query );
		
		// Prepare data for report
		$order_counts = $this->prepare_chart_data( $orders , 'post_date' , 'total_orders' , $this->chart_interval , $this->start_date , $this->chart_groupby );
		$order_remaining = $this->prepare_chart_data( $orders , 'post_date' , 'order_remaining' , $this->chart_interval , $this->start_date , $this->chart_groupby );
		$deposits_paid_amounts = $this->prepare_chart_data( $deposits_paid , 'post_date' , false , $this->chart_interval , $this->start_date , $this->chart_groupby );
		
		
		// Encode in json format
		$chart_data = json_encode( array(
			'order_counts' => array_values( $order_counts ) ,
			'order_remaining' => array_values( $order_remaining ) ,
			'deposit_paid_amounts' => array_values( $deposits_paid_amounts ) ,
		) );
		?>
        <div class="chart-container">
            <div class="chart-placeholder main"></div>
        </div>
        <script type="text/javascript">

            var main_chart;

            jQuery(function () {
                var order_data = jQuery.parseJSON('<?php echo $chart_data; ?>');
                var drawGraph = function (highlight) {
                    var series = [
                        {
                            label: "<?php echo esc_js( __( 'Number of deposits' , 'woocommerce-deposits' ) ) ?>",
                            data: order_data.order_counts,
                            color: '<?php echo $this->chart_colours[ 'order_count' ]; ?>',
                            bars: {
                                fillColor: '<?php echo $this->chart_colours[ 'order_count' ]; ?>',
                                fill: true,
                                show: true,
                                lineWidth: 1,
                                barWidth: <?php echo $this->barwidth; ?> * 0.5, align: 'center'
                        },
                        shadowSize
                    :
                    0,
                        hoverable
                    :
                    false
                },
                    {
                        label: "<?php echo esc_js( __( 'Paid deposits' , 'woocommerce-deposits' ) ) ?>",
                            data
                    :
                        order_data.deposit_paid_amounts,
                            yaxis
                    :
                        2,
                            color
                    :
                        '<?php echo $this->chart_colours[ 'deposit_paid' ]; ?>',
                            points
                    :
                        {
                            show: true, radius
                        :
                            5, lineWidth
                        :
                            2, fillColor
                        :
                            '#fff', fill
                        :
                            true
                        }
                    ,
                        lines: {
                            show: true, lineWidth
                        :
                            2, fill
                        :
                            false
                        }
                    ,
                        shadowSize: 0,
                    }
                    ,
                    {
                        label: "<?php echo esc_js( __( 'Order Remaining in Total' , 'woocommerce-deposits' ) ) ?>",
                            data
                    :
                        order_data.order_remaining,
                            yaxis
                    :
                        2,
                            color
                    :
                        '<?php echo $this->chart_colours[ 'deposit_remaining' ]; ?>',
                            points
                    :
                        {
                            show: true, radius
                        :
                            5, lineWidth
                        :
                            2, fillColor
                        :
                            '#fff', fill
                        :
                            true
                        }
                    ,
                        lines: {
                            show: true, lineWidth
                        :
                            2, fill
                        :
                            false
                        }
                    ,
                        shadowSize: 0,
						<?php echo $this->get_currency_tooltip(); ?>
                    }
                    ,
                    ]
                    ;

                    if (highlight !== 'undefined' && series[highlight]) {
                        highlight_series = series[highlight];

                        highlight_series.color = '#9c5d90';

                        if (highlight_series.bars)
                            highlight_series.bars.fillColor = '#9c5d90';

                        if (highlight_series.lines) {
                            highlight_series.lines.lineWidth = 5;
                        }
                    }

                    main_chart = jQuery.plot(
                        jQuery('.chart-placeholder.main'),
                        series,
                        {
                            legend: {
                                show: false
                            },
                            grid: {
                                color: '#aaa',
                                borderColor: 'transparent',
                                borderWidth: 0,
                                hoverable: true
                            },
                            xaxes: [{
                                color: '#aaa',
                                position: "bottom",
                                tickColor: 'transparent',
                                mode: "time",
                                timeformat: "<?php if( $this->chart_groupby == 'day' )
									echo '%d %b'; else echo '%b'; ?>",
                                monthNames: <?php echo json_encode( array_values( $wp_locale->month_abbrev ) ) ?>,
                                tickLength: 1,
                                minTickSize: [1, "<?php echo $this->chart_groupby; ?>"],
                                font: {
                                    color: "#aaa"
                                }
                            }],
                            yaxes: [
                                {
                                    min: 0,
                                    minTickSize: 1,
                                    tickDecimals: 0,
                                    color: '#d4d9dc',
                                    font: {color: "#aaa"}
                                },
                                {
                                    position: "right",
                                    min: 0,
                                    tickDecimals: 2,
                                    alignTicksWithAxis: 1,
                                    color: 'transparent',
                                    font: {color: "#aaa"}
                                }
                            ],
                        }
                    );

                    jQuery('.chart-placeholder').resize();
                }

                drawGraph();

                jQuery('.highlight_series').hover(
                    function () {
                        drawGraph(jQuery(this).data('series'));
                    },
                    function () {
                        drawGraph();
                    }
                );
            });
        </script>
		<?php
	}
}

return new WC_Deposits_Admin_Reports();
