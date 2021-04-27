@extends('layouts.after_login')

@section('content')

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
  <div class="layout-px-spacing">

    <div class="page-header">
      <div class="page-title">
        <h3>Approved Applicants List</h3>
      </div>
    </div>

    <div class="row" id="cancel-row">

      <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
          <div class="table-responsive mb-4 mt-4">
            <input type="hidden" id="approved_app_list" value=""> 
            <table id="column-filter" class="table table-hover non-hover approved_application" style="width:100%">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Firm Name</th>
                  <!-- <th>Mobile</th>
                  <th>Amount</th>
                  <th>Time Limit</th>
                  <th>Status</th>
                  <th>Action</th> -->
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
<script src="{{ asset('js/approved_application.js') }}"></script>
<!-- END PAGE LEVEL CUSTOM SCRIPTS -->
@endpush