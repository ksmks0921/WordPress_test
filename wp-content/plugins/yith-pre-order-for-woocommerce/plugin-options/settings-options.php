<?php
/*
 * This file belongs to the YIT Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

return array(

    'settings' => apply_filters( 'yith_wcpo_settings_options', array(

            'settings_general_start'    => array(
                'type' => 'sectionstart',
                'id'   => 'yith_wcpo_settings_general_start'
            ),

            'settings_general_title'    => array(
                'title' => _x( 'General settings', 'Panel: page title', 'yith-woocommerce-pre-order' ),
                'type'  => 'title',
                'desc'  => '',
                'id'    => 'yith_wcpo_settings_options_title'
            ),

            'settings_enable_pre_order' => array(
                'title'   => _x( 'Enable Pre-Order on Frontend', 'Admin option: Enable plugin', 'yith-woocommerce-pre-order' ),
                'type'    => 'checkbox',
                'desc'    => _x( 'Uncheck this option to disable all Pre-Order features on Frontend', 'Admin option description: Enable plugin', 'yith-woocommerce-pre-order' ),
                'id'      => 'yith_wcpo_enable_pre_order',
                'default' => 'yes'
            ),

            'option1' => array(),

            'option2' => array(),

            'option3' => array(),

            'settings_remove_completed'  => array(
                "name"          => __( 'Remove selected order statuses from Pre-Ordered view:', 'yith-woocommerce-pre-order' ),
                "desc"          => __( 'Completed', 'yith-woocommerce-pre-order' ),
                "id"            => 'yith_wcpo_wc-completed',
                'default'       => 'yes',
                "type"          => "checkbox",
                'checkboxgroup' => 'start'
            ),

            'settings_remove_cancelled'    => array(
                'desc'          => __( 'Cancelled', 'yith-woocommerce-pre-order' ),
                'id'            => 'yith_wcpo_wc-cancelled',
                'default'       => 'no',
                'type'          => 'checkbox',
                'checkboxgroup' => ''
            ),

            'settings_remove_refunded'    => array(
                'desc'          => __( 'Refunded', 'yith-woocommerce-pre-order' ),
                'id'            => 'yith_wcpo_wc-refunded',
                'default'       => 'no',
                'type'          => 'checkbox',
                'checkboxgroup' => ''
            ),

            'settings_remove_failed' => array(
                'desc'          => __( 'Failed', 'yith-woocommerce-pre-order' ),
                'id'            => 'yith_wcpo_wc-failed',
                'default'       => 'no',
                'type'          => 'checkbox',
                'checkboxgroup' => 'end',
            ),

            'option4' => array(),

            'settings_general_end'      => array(
                'type' => 'sectionend',
                'id'   => 'yith_wcpo_settings_general_end'
            ),

            'settings_label_start'    => array(
                'type' => 'sectionstart',
                'id'   => 'yith_wcpo_settings_label_start'
            ),

            'settings_label_title'    => array(
                'title' => _x( 'Label settings', 'Panel: page title', 'yith-woocommerce-pre-order' ),
                'type'  => 'title',
                'desc'  => '',
                'id'    => 'yith_wcpo_settings_label_title'
            ),

            'settings_default_add_to_cart_label' => array(
                'title'   => _x( 'Default Add to Cart text', 'Admin option: customize Add to Cart label', 'yith-woocommerce-pre-order' ),
                'type'    => 'text',
                'desc'    => _x( 'This text will be replaced on \'Add to Cart\' button. By leaving it blank, it will be \'Pre-Order Now\'.', 'Admin option description: customize Add to Cart label', 'yith-woocommerce-pre-order' ),
                'id'      => 'yith_wcpo_default_add_to_cart_label',
                'default' => _x( 'Pre-Order Now', 'Default label for add to cart button(Pre-Order Now)', 'yith-woocommerce-pre-order' )
            ),

            'option5' => array(),

            'option6' => array(),

            'option7' => array(),

            'option8' => array(),

            'option9' => array(),

            'settings_label_end' => array(
                'type' => 'sectionend',
                'id'   => 'yith_wcpo_settings_label_end'
            ),

        )
    )
);