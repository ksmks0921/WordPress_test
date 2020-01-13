jQuery(document).ready(function($) {
    $( document.body ).on( 'updated_checkout',function(){

        var options = wc_deposits_checkout_options;
        var form = $('#wc-deposits-options-form');
        var deposit = form.find('#pay-deposit');
        var deposit_label = form.find('#pay-deposit-label');
        var full = form.find('#pay-full-amount');
        var full_label = form.find('#pay-full-amount-label');
        var msg = form.find('#wc-deposits-notice');
        var amount = form.find('#deposit-amount');
        var update_message = function() {

            if (deposit.is(':checked')) {

                msg.html(options.message.deposit);
            } else if (full.is(':checked')) {
                msg.html(options.message.full);
            }
        };


                    $('[name="deposit-radio"]').on('change',function(){
            $( document.body ).trigger( 'update_checkout');
        });
        $('.checkout').on('change', 'input, select', update_message);
        update_message();


    });




});