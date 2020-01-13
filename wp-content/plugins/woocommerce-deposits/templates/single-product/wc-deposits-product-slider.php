<?php
do_action( 'wc_deposits_enqueue_product_scripts' );

?>
<div id='<?php echo $basic_buttons ? 'basic-wc-deposits-options-form' : 'wc-deposits-options-form'; ?>'>
	<hr class='separator'/>
	<label class='deposit-option'>
		<?php _e( $deposit_option_text, 'woocommerce-deposits' ); ?>
		<span id='deposit-amount'><?php echo $deposit_amount; ?></span>
		<span id='deposit-suffix'><?php echo $suffix; ?></span>
	</label>
	<div class="<?php echo $basic_buttons  ? 'basic-switch-woocommerce-deposits' : 'deposit-options switch-toggle switch-candy switch-woocommerce-deposits'; ?>">
		<input id='pay-deposit' name='<?php echo $product->get_id(); ?>-deposit-radio'
		       type='radio' <?php checked($default_checked ,'deposit'); ?> class='input-radio' value='deposit'>
		<label id="pay-deposit-label" for='pay-deposit'
		       onclick=''><?php _e( $deposit_text , 'woocommerce-deposits' ); ?></label>
		<?php if( isset( $force_deposit ) && $force_deposit === 'yes' ){ ?>
			<input id='pay-full-amount' name='<?php echo $product->get_id(); ?>-deposit-radio'  type='radio'
			       class='input-radio'
			       disabled>
			<label id="pay-full-amount-label" for='pay-full-amount'
			       onclick=''><?php _e( $full_text , 'woocommerce-deposits' ); ?></label>
		<?php } else{ ?>
			<input id='pay-full-amount' name='<?php echo $product->get_id(); ?>-deposit-radio'
			       type='radio' <?php checked($default_checked ,'full'); ?> class='input-radio' value='full'>
			<label id="pay-full-amount-label" for='pay-full-amount'
			       onclick=''><?php _e( $full_text , 'woocommerce-deposits' ); ?></label>
		<?php } ?>
		<a class='wc-deposits-switcher'></a>
	</div>
	<span class='deposit-message' id='wc-deposits-notice'></span>
</div>