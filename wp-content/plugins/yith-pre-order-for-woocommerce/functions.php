<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly


if ( ! function_exists( 'is_plugin_active' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

if ( ! function_exists( 'yith_initialize_plugin_fw' ) ) {
    /**
     * Initialize plugin-fw
     */
    function yith_initialize_plugin_fw( $plugin_dir ) {
        if ( ! function_exists( 'yit_deactive_free_version' ) ) {
            require_once $plugin_dir . 'plugin-fw/yit-deactive-plugin.php';
        }

        if ( ! function_exists( 'yith_plugin_registration_hook' ) ) {
            require_once $plugin_dir . 'plugin-fw/yit-plugin-registration-hook.php';
        }

        /* Plugin Framework Version Check */
        if ( ! function_exists( 'yit_maybe_plugin_fw_loader' ) && file_exists( $plugin_dir . 'plugin-fw/init.php' ) ) {
            require_once( $plugin_dir . 'plugin-fw/init.php' );
        }
    }
}

if ( ! function_exists( 'yith_ywpo_install_woocommerce_admin_notice' ) ) {

    function yith_ywpo_install_woocommerce_admin_notice() {
        ?>
        <div class="error">
            <p><?php _e( 'YITH Pre-Order for WooCommerce is enabled but not effective. It requires WooCommerce in order to work.', 'yit' ); ?></p>
        </div>
        <?php
    }
}



if ( ! function_exists( 'yith_ywpo_install' ) ) {
    /**
     * Install the plugin
     */
    function yith_ywpo_install() {

        if ( ! function_exists( 'WC' ) ) {
            add_action( 'admin_notices', 'yith_ywpo_install_woocommerce_admin_notice' );
        } else {
            do_action( 'yith_ywpo_init' );
        }
    }
}

if ( ! function_exists( 'yith_ywpo_init' ) ) {
    /**
     * Start the plugin
     */
    function yith_ywpo_init() {
        /**
         * Load text domain
         */
        load_plugin_textdomain( 'yith-woocommerce-pre-order', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );


        /** include plugin's files */

        require_once( YITH_WCPO_PATH . 'includes/class.yith-pre-order.php' );
        require_once( YITH_WCPO_PATH . 'includes/class.yith-ywpo-plugin-fw-loader.php' );

        YITH_YWPO_Plugin_FW_Loader::get_instance();
        YITH_Pre_Order();
    }
}

if ( ! function_exists( 'YITH_Pre_Order' ) ) {
    /**
     * Unique access to instance of YITH_Pre_Order class
     *
     * @return YITH_Pre_Order
     * @since 1.0.0
     */
    function YITH_Pre_Order() {
        return YITH_Pre_Order::instance();
    }
}
add_action( 'yith_ywpo_init', 'yith_ywpo_init' );




