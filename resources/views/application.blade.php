@extends('layouts.after_login')

@section('content')

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
  <div class="layout-px-spacing">

    <div class="page-header">
      <div class="page-title">
        <h3>Applicants List</h3>
      </div>
    </div>

    <div class="row" id="cancel-row">

      <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
          <div class="table-responsive mb-4 mt-4">
            <table id="column-filter" class="table table-hover non-hover" style="width:100%">
              <thead>
                <tr>
                  <th>Borrower Name</th>
                  <th>Firm Name</th>
                  <th>Mobile</th>
                  <th>Amount</th>
                  <th>Reference Name</th>
                  <th>Ref. Firm Name</th>
                  <th>Affiliation of Reference</th>
                  <!-- <th>Status</th> -->
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>

  </div>
</div>
<!--  END CONTENT AREA  -->
@endsection


@push('style')
<!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/custom_dt_html5.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/custom_dt_miscellaneous.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/tables/table-basic.css') }}">
<!-- END PAGE LEVEL CUSTOM STYLES -->
@endpush

@push('script')
<!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
<script src="{{ asset('plugins/table/datatable/datatables.js') }}"></script>
<!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
<script src="{{ asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/table/datatable/button-ext/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/table/datatable/button-ext/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/table/datatable/button-ext/buttons.print.min.js') }}"></script>
<script>
var table = $('#column-filter').DataTable({
  processing: true,
  serverSide: true,
  dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
  buttons: {
    buttons: [{
        extend: 'excel',
        className: 'btn'
      },
      {
        extend: 'print',
        className: 'btn'
      }
    ]
  },
  ajax: '{{ route("finance.list") }}',
  columns: [{
      data: 'bor_name',
      name: 'bor_name'
    },
    {
      data: 'business_one.business_name',
      name: 'business_one.business_name',
      bSortable: false,
      filterable: false
    },
    {
      data: 'bor_mob_no',
      name: 'bor_mob_no'
    },
    {
      data: 'bor_amount',
      name: 'bor_amount'
    },
    {
      data: 'ref_name',
      name: 'ref_name'
    },
    {
      data: 'ref_firm',
      name: 'ref_firm'
    },
    {
      data: 'ref_affiliate_type',
      name: 'ref_affiliate_type'
    },
    {
      data: 'id',
      name: 'id',
      render: function(data, type, row, meta) {
        return (' <ul class="table-controls">' +
          '<li>' +
          '<a href="' + base_url + 'application_view/' + data +
          '"  data-toggle="tooltip" data-placement="top" title="View"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a>' +
          '</li>' +
          '<li><a href="' + base_url + 'finance-form/' + data +
          '/edit"  data-toggle="tooltip" data-placement="top" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>' +
          '<li><a href="' + base_url + 'finance-form/' + data +
          '/office-use"  data-toggle="tooltip" data-placement="top" title="Official Use"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg></a></li>' +
          '<li>' +
          '<a href="javascript:void(0);" onclick="deleteApplicationForm(' + data +
          ')" data-toggle="tooltip" data-placement="top" title="Delete" class="warning confirm">' +
          '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>' +
          '</a>' +
          '</li>' +
          '</ul>')
      }
    },
  ],
  "oLanguage": {
    "oPaginate": {
      "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
      "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
    },
    "sInfo": "Showing page _PAGE_ of _PAGES_",
    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
    "sSearchPlaceholder": "Search...",
    "sLengthMenu": "Results :  _MENU_",
  },
  "stripeClasses": [],
  "lengthMenu": [7, 10, 20, 50],
  "pageLength": 7
});

function deleteApplicationForm(id) {
  swal({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Delete',
    padding: '2em'
  }).then(function(result) {
    if (result.value) {
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: base_url + 'finance-form/' + id,
        method: "DELETE",
        dataType: 'json',
        success: function(response) {
          swal(
            'Deleted!',
            response.message,
            'success'
          )
          table.ajax().reload();
          // alert(response.message)
        },
        error: function(error) {
          const sources = error.responseJSON;
          swal("Error!", sources.message, "error");
          table.ajax().reload();
          // return Promise.reject(sources);
        }
      })

    }
  })
}
</script>
<!-- END PAGE LEVEL CUSTOM SCRIPTS -->
@endpush
