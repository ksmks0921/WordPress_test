jQuery(document).ready(function($) {
  $('body')
    .on('change', '.woocommerce_order_items input.deposit_paid', function() {
      var row = $(this).closest('tr.item');
      var paid = $(this).val();
      var remaining = $('input.deposit_remaining', row);
      var total = $('input.line_total', row);
      if (paid !== '' && parseFloat(total.val()) - parseFloat(paid) > 0)
        remaining.val(parseFloat(total.val()) - parseFloat(paid));
      else
        remaining.val('');
    })
    .on('change', '.woocommerce_order_items input.line_total', function() {
      var row = $(this).closest('tr.item');
      var remaining = $('input.deposit_remaining', row);
      var paid = $('input.deposit_paid', row);
      var total = $(this).val();
      if (paid.val() !== '' && parseFloat(total) - parseFloat(paid.val()) >= 0)
        remaining.val(parseFloat(total) - parseFloat(paid.val()));
      else
        remaining.val('');
    })
    .on('change', '.woocommerce_order_items input.quantity', function() {
      var row = $(this).closest('tr.item');
      var remaining = $('input.deposit_remaining', row);
      var paid = $('input.deposit_paid', row);
      var total = $('input.line_total');
      setTimeout(function() {
        if (paid.val() !== '' && remaining.val() !== '' && parseFloat(total.val()) - parseFloat(paid.val()) >= 0)
          remaining.val(parseFloat(total.val()) - parseFloat(paid.val()));
        else
          remaining.val('');
      }, 0);
    })
    .on('change', '.wc-order-totals .edit input#_order_remaining', function() {
      // update paid amount when remaining changes
      var remaining = $(this);
      var paid = $('.wc-order-totals .edit input#_order_paid');
      var total = $('.wc-order-totals .edit input#_order_total');
      setTimeout(function() {
        if (remaining.val() !== '' && total.val() !== '')
          paid.val(parseFloat(total.val()) - parseFloat(remaining.val()));
        else
          paid.val('');
      }, 0);
    })
    .on('change', '.wc-order-totals .edit input#_order_paid', function() {
      // update remaining amount when paid amount changes
      var paid = $(this);
      var remaining = $('.wc-order-totals .edit input#_order_remaining');
      var total = $('.wc-order-totals .edit input#_order_total');
      setTimeout(function() {
        if (paid.val() !== '' && total.val() !== '')
          remaining.val(parseFloat(total.val()) - parseFloat(paid.val()));
        else
          remaining.val('');
      }, 100);
    })
    .on('change', '.wc-order-totals .edit input#_order_total', function() {
      // update remaining amount when total amount changes
      var total = $(this);
      var remaining = $('.wc-order-totals .edit input#_order_remaining');
      var paid = $('.wc-order-totals .edit input#_order_paid');
      setTimeout(function() {
        if (paid.val() !== '' && total.val() !== '')
          remaining.val(parseFloat(total.val()) - parseFloat(paid.val()));
        else
          remaining.val('');
      }, 0);
    });

  //   $('#woocommerce-order-items').on('click', 'button.save-action', function (event) {
  //
  //
  // $('#woocommerce-order-items').onFirst('click', 'button.calculate-action', function() {
  //   $('#woocommerce-order-items').onFirst('click', 'button.save-action', function(event) {
  //
  //     var remaining = $('.wc-order-totals .edit input#_order_remaining');
  //     var total = $('.wc-order-totals .edit input#_order_total');
  //     var paid = $('.wc-order-totals .edit input#_order_paid');
  //     var order_remaining = 0;
  //     var order_paid = 0;
  //     var order_total = parseFloat(total.val());
  //     $('.woocommerce_order_items tr.item').each(function() {
  //       var $remaining = $(this).find('input.deposit_remaining');
  //       var $paid = $(this).find('input.deposit_paid');
  //       var $tax = $(this).find('input.line_tax');
  //       if ($.isNumeric($remaining.val()))
  //         order_remaining += parseFloat($remaining.val());
  //       if ($.isNumeric($paid.val()))
  //         order_paid += parseFloat($paid.val());
  //       if ($.isNumeric($tax.val()))
  //         order_remaining += parseFloat($tax.val());
  //     });
  //     remaining.val(order_remaining);
  //     paid.val(order_paid);
  //     $(this).off(event);
  //   });
  // });
  //
  //   });

});
