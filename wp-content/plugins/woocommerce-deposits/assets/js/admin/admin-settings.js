jQuery(document).ready(function($){


    $('.deposits-color-field').wpColorPicker();


    $('#wc_deposits_verify_purchase_code').on('click',function(e){

        e.preventDefault();

        var purchase_code = $('#wc_deposits_purchase_code').val();

        if(purchase_code.length < 1) {
            alert('Purchase code cannot be empty');
            return false;
        }

        $(this).attr('disabled','disabled');
        $('#wcdp_verify_purchase_container').prepend('<img src="images/loading.gif" />');

        //make ajax call

        var data = {
            action : 'wc_deposits_verify_purchase_code',
            purchase_code : $('#wc_deposits_purchase_code').val() ,
            nonce : $('#wcdp_verify_purchase_code_nonce').val()
        };

        $.post(wc_deposits.ajax_url,data).done(function(res){

            if(res.success) {

                $('#wc_deposits_verify_purchase_code').removeAttr('disabled');
                $('#wcdp_verify_purchase_container').empty().append('&nbsp;<span style="color:green;">'+ res.data +' &#10008; </span>');
                // $('#wcdp_verify_purchase_container').find('img').remove();
            } else{
                $('#wc_deposits_verify_purchase_code').removeAttr('disabled');
                $('#wcdp_verify_purchase_container').empty().append('&nbsp;<span style="color:red;" >'+ res.data +' &#10008; </span>');
                // $('#wcdp_verify_purchase_container').find('img').remove();
            }


        }).fail(function(){

            $(this).removeAttr('disabled');
            alert('Error occured')

        });



    })


    // tabs

    $('.wcdp.nav-tab').on('click', function(tabName) {

        var target = $(this).data('target');

        $('.wcdp-tab-content').hide();
        $("#"+target).show();
        // document.getElementById(tabName).style.display = "block";

        jQuery('.wcdp.nav-tab').removeClass('nav-tab-active');
        jQuery(this).addClass('nav-tab-active');
        return false;

    });
});