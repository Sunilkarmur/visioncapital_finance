$(document).ready(function () {

  // Listing the documents folder wise
  var url = $('#approved_app_list').val();
  $('.approved_application').DataTable({
    processing: true,
    serverSide: true,
    dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
    buttons: {
      buttons: [
        { extend: 'excel', className: 'btn' },
        { extend: 'print', className: 'btn' }
      ]
    },
    ajax: {
      url: url,
    },
    columns: [
      { data: 'DT_RowIndex', name: 'DT_RowIndex' },
      { data: 'ref_name', name: 'ref_name' },
      { data: 'ref_firm', name: 'ref_firm' },
      { data: 'ref_contact', name: 'ref_contact' },
      { data: 'bor_amount', name: 'bor_amount' },
      { data: 'bor_time_limit', name: 'bor_time_limit' },
      { data: 'status', name: 'status' },
      { data: 'loan_account_id', name: 'loan_account_id' },
      { data: 'action', name: 'action' },
    ],
    "oLanguage": {
      "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
      "sInfo": "Showing page _PAGE_ of _PAGES_",
      "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
      "sSearchPlaceholder": "Search...",
      "sLengthMenu": "Results :  _MENU_",
    },
    "stripeClasses": [],
    "lengthMenu": [7, 10, 20, 50],
    "pageLength": 7
  });

  $('.notarized').change(function () {
    if (this.checked) {
      $('.notarised_row').removeClass('d-none');
    }
    else {
      $('.notarised_row').addClass('d-none');
    }
  });
  $('.signature').change(function () {
    if (this.checked) {
      $('.sign_row').removeClass('d-none');
    }
    else {
      $('.sign_row').addClass('d-none');
    }
  });
  $('.processing_fees_select').change(function () {
    if ($(this).val() == 1) {
      $('.processing_fees_row').removeClass('d-none');
    }
    else {
      $('.processing_fees_row').addClass('d-none');
    }
  });
  $('.disbursement').change(function () {
    if (this.checked) {
      $('.disbursement_row').removeClass('d-none');
    }
    else {
      $('.disbursement_row').addClass('d-none');
    }
  });
  $('.disbursement_select').change(function () {
    if ($(this).val()) {
      $('.disbursement_textbox').removeClass('d-none');
    }
    else {
      $('.disbursement_textbox').addClass('d-none');
    }
  });

});


$("#distribute-amount-submit").on("submit", function (e) {
    var dataString = $(this).serializeArray();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: $(this).attr('action'),
        method: $(this).attr('method'),
        data: dataString,
        dataType: 'json',
        success: function (response) {
            swal({
                    title: "Success!",
                    text: response.message,
                    type: "success"
                },
                function() {

                }
            );
            setTimeout(function () {
                window.location.reload();
            },1000)
        },
        error: function (error) {
            const sources = error.responseJSON;
            swal("Error!", sources.message, "error");
            // return Promise.reject(sources);
        }
    })

    e.preventDefault();
});

function onDistributeAmount(id) {
    $('#finance_id').val(id)
}

