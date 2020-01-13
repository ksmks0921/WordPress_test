<?php
/*
 * Plugin Name: Total Spent by Customer for WooCommerce
 * Plugin URI: https://fernandoacosta.net/
 * Author:               Fernando Acosta
 * Author URI:           https://fernandoacosta.net
 * Description: Add a sortable column to the users list to show how much the user spent on your WooCommerce Store.
 * Version: 1.1
 * WC requires at least: 2.5.0
 * WC tested up to:      3.3.1
 *

  Author: Fernando Acosta
  Author URI: https://fernandoacosta.net/
  Text Domain: total-spent-by-customer-for-woocommerce

  This plugin is a fork of Recently Registered, a plugin for WordPress.
  Thanks, Mika Epstein!
  This plugin is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 2 of the License, or
  (at your option) any later version.
  This plugin is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.
  You should have received a copy of the GNU General Public License
  along with WordPress.  If not, see <http://www.gnu.org/licenses/>.
*/

class Total_Spent_By_Customer_WooCommerce {
  /**
   * Let's get this party started
   *
   * @since 3.4
   * @access public
   */
    public function __construct() {
        add_action( 'init', array( &$this, 'init' ) );
    }
  /**
   * All init functions
   *
   * @since 3.4
   * @access public
   */
    public function init() {
    add_filter( 'manage_users_columns', array( $this,'users_columns') );
    add_action( 'manage_users_custom_column',  array( $this ,'users_custom_column'), 10, 3);
    add_filter( 'manage_users_sortable_columns', array( $this ,'users_sortable_columns') );
    add_filter( 'users_list_table_query_args', array( $this ,'users_orderby_column'), 10, 1 );
    add_action( 'plugins_loaded', array( $this ,'load_this_textdomain') );
  }


  /**
   * Registers column for display
   *
   * @since 2.0
   * @access public
   */
  public static function users_columns( $columns ) {
    $columns['money_spent'] = _x( 'Money Spent', 'user', 'total-spent-by-customer-for-woocommerce' );
    return $columns;
  }


  /**
   * Handles the registered date column output.
   *
   * This uses the same code as column_registered, which is why
   * the date isn't filterable.
   *
   * @since 2.0
   * @access public
   *
   * @global string $mode
   */
  public static function users_custom_column( $value, $column_name, $user_id ) {
    if ( 'money_spent' != $column_name ) {
      return $value;
    } else {
      $money_spent = wc_get_customer_total_spent( $user_id );
      return wc_price( wc_get_customer_total_spent( $user_id ) );
    }
  }


  /**
   * Makes the column sortable
   *
   * @since 1.0
   * @access public
   */
  public static function users_sortable_columns($columns) {
    $custom = array(
      'money_spent'    => 'money_spent',
    );

    return wp_parse_args( $custom, $columns );
  }


  /**
   * Calculate the order if we sort by date.
   *
   * @since 1.0
   * @access public
   */
  public static function users_orderby_column( $args ) {
    if ( isset( $args['orderby'] ) && 'money_spent' == $args['orderby'] ) {
      $args = array_merge( $args, array(
        'meta_key' => '_money_spent',
        'orderby'    => 'meta_value_num',
      ));
    }

    return $args;
  }


  /**
   * Internationalization - We're just going to use the language packs for this.
   *
   * @since 3.4
   * @access public
   */
  public function load_this_textdomain() {
    load_plugin_textdomain( 'total-spent-by-customer-for-woocommerce' );
  }
}

new Total_Spent_By_Customer_WooCommerce();
