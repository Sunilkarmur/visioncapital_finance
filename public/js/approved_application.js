$(document).ready(function () {

  // Listing the documents folder wise
  var url = $('#approved_app_list').val();
  $('.approved_application').dataTable({
    processing: true,
    serverSide: true,
    lengthChange: false,
    ajax: {
      url: url,
    },
    columns: [
      { data: 'DT_RowIndex', name: 'DT_RowIndex' },
      { data: 'ref_firm', name: 'ref_firm' },
      // { data: 'template_name', name: 'template_name' },
      // { data: 'payment_status', name: 'payment_status' },
      // { data: 'created_at', name: 'created_at' },
      // { data: 'action', name: 'action' },
    ]
  });

});
