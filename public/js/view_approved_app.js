$(document).ready(function () {

  $('.notarized').change(function () {
    if (this.checked) {
      $('.notarised_row').removeClass('d-none');
    } else {
      $('.notarised_row').addClass('d-none');
    }
  });
  $('.signature').change(function () {
    if (this.checked) {
      $('.sign_row').removeClass('d-none');
    } else {
      $('.sign_row').addClass('d-none');
    }
  });
  $('.processing_fees_select').change(function () {
    if ($(this).val() == 1) {
      $('.processing_fees_row').removeClass('d-none');

    } else {
      $('.processing_fees_row').addClass('d-none');
    }
  });
  $('.disbursement').change(function () {
    if (this.checked) {
      $('.disbursement_row').removeClass('d-none');
    } else {
      $('.disbursement_row').addClass('d-none');
    }
  });
  $('.disbursement_select').change(function () {
    if ($(this).val()) {
      var type = $(this).val();
      var disbursement_amt = $('#loan_amount').val();
      if(type == 1){
        disbursement_amt = parseInt(disbursement_amt/2);
      }
      $('#disbursement_amt').val(disbursement_amt);
      $('.disbursement_textbox').removeClass('d-none');
    } else {
      $('.disbursement_textbox').addClass('d-none');
    }
  });

});