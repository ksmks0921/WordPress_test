<?php
do_action( 'wc_deposits_enqueue_deposit_button_scripts' );
?>
<tr class="deposit-option">
    <td colspan="2">
        <label class='deposit-option'>
			<?php echo $deposit_option_text; ?>
            <span id='deposit-amount'><?php echo wc_price( $deposit_amount ); ?></span>
        </label>
    </td>

</tr>
<tr class="deposit-buttons">
    <td colspan="2">
        <div id='<?php echo $basic_buttons ? 'basic-wc-deposits-options-form' : 'wc-deposits-options-form'; ?>'>

            <div class="<?php echo $basic_buttons ? 'basic-switch-woocommerce-deposits' : 'deposit-options switch-toggle switch-candy switch-woocommerce-deposits'; ?>">
                    <input id='pay-deposit' name='deposit-radio'
                           type='radio' <?php echo checked( $default_checked , 'deposit' ); ?> class='input-radio'
                           value='deposit'>
                    <label id="pay-deposit-label"
                           for='pay-deposit'><?php _e( $deposit_text , 'woocommerce-deposits' ); ?></label>
					<?php if( isset( $force_deposit ) && $force_deposit === 'yes' ){ ?>
                        <input id='pay-full-amount' name='deposit-radio' type='radio'
                               class='input-radio'
                               disabled>
                        <label id="pay-full-amount-label" for='pay-full-amount'
                               onclick=''><?php _e( $full_text , 'woocommerce-deposits' ); ?></label>
					<?php } else{ ?>
                        <input id='pay-full-amount' name='deposit-radio'
                               type='radio' <?php echo checked( $default_checked , 'full' );; ?> class='input-radio'
                               value='full'>
                        <label id="pay-full-amount-label" for='pay-full-amount'
                               onclick=''><?php _e( $full_text , 'woocommerce-deposits' ); ?></label>
					<?php } ?>
                    <a class='wc-deposits-switcher'></a>
            </div>
            <span class='deposit-message' id='wc-deposits-notice'></span>

        </div>
    </td>
</tr>
