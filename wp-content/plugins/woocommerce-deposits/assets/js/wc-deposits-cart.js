jQuery(document).ready(function($){

    var activate_tooltip = function() {
        $('#deposit-help-tip').tipTip({
            'attribute': 'data-tip',
            'fadeIn': 50,
            'fadeOut': 50,
            'delay': 200,
        });
    };

    $(document.body).on('updated_cart_totals updated_checkout',activate_tooltip);

    activate_tooltip();
});