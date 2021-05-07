@extends('layouts.after_login')

@section('content')

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
  <div class="layout-px-spacing">

    <div class="page-header">
      <div class="page-title">
        <h3>Approved Application List</h3>
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
                  <th>#</th>
                  <th>Name</th>
                  <th>Firm Name</th>
                  <th>Mobile</th>
                  <th>Amount</th>
                  <th>Time Limit</th>
                  <th>Status</th>
                  <th>Loan Account Number</th>
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
    <!-- Modal -->
    <div class="modal fade login-modal" id="addDisbursement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Loan amount</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="mt-0" action="{{ route('distribute.amount.submit') }}" method="post" id="distribute-amount-submit">
                        @csrf
                        <div class="form-group">
                            <label for="disbursement_amount">Disbursement Amount</label>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                            <input type="hidden" name="finance_id" value="" id="finance_id">
                            <input type="text" class="form-control mb-2" id="disbursement_amount" placeholder="Disbursement Amount" name="disbursement_amt">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade login-modal" id="addInstallment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Installment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="mt-0" id="add-installment-form" action="{{ route('emi.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> -->
                            <label for="select-loan-account">Choose Loan Account</label>
                            <select class="custom-select mb-2" id="select-loan-account" name="account_id">
                                <option>Select Loan Account</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="instalment_date">Instalment Date</label>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                            <input type="date" class="form-control mb-2" placeholder="Instalment Date" name="instalment_date" id="instalment_date">
                        </div>
                        <div class="form-group">
                            <label for="paid_date">Paid Date</label>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                            <input type="date" class="form-control mb-2" placeholder="Paid Date" name="paid_date" id="paid_date">
                        </div>
                        <div class="form-group">
                            <label for="instalment_amount">Instalment Amount</label>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                            <input type="text" class="form-control mb-2" id="instalment_amount" placeholder="Instalment Amount" name="instalment_amount" readonly id="instalment_amount">
                        </div>
                        <div class="form-group">
                            <label for="paid_amount">Paid Amount</label>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                            <input type="text" class="form-control mb-2" id="paid_amount" placeholder="Paid Amount" name="paid_amount">
                        </div>
                        <div class="form-group">
                            <label for="penalty">Penalty</label>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-slash"><circle cx="12" cy="12" r="10"></circle><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line></svg>
                            <input type="text" class="form-control mb-2" id="penalty" placeholder="Penalty" name="penalty" id="penalty">
                        </div>
                        <div class="form-group">
                            <label for="remarks">Remarks</label>
                            <textarea class="form-control mb-2" id="remarks" name="remarks" placeholder="Remarks"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                        </div>
                    </form>
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
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}">

<!-- END PAGE LEVEL CUSTOM STYLES -->
@endpush

@push('script')
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
<!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
<script src="{{ asset('plugins/table/datatable/datatables.js') }}"></script>
<!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
<script src="{{ asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/table/datatable/button-ext/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/table/datatable/button-ext/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/table/datatable/button-ext/buttons.print.min.js') }}"></script>
<script src="{{ asset('js/approved_application.js') }}"></script>
<script>
    function onAddInstallment(id) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '{{ route("loan.account.list") }}',
            method: 'POST',
            data: {
                finance_id:id
            },
            dataType: 'json',
            success: function (response) {
                var html='<option value="">Select Loan Account</option>';
               $.each(response.data,function (index, value) {
                   html+='<option value="'+value+'">'+value+'</option>';
               })
               $('#select-loan-account').html(html)
            },
            error: function (error) {
                const sources = error.responseJSON;
                swal("Error!", sources.message, "error");
            }
        })
    }
    $('#select-loan-account').change(function (event) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '{{ route("loan.account.detail") }}',
            method: 'POST',
            data: {
                account_id:event.target.value
            },
            dataType: 'json',
            success: function (response) {
                const sources = response.data;
                $('#instalment_amount').val(sources.emi_amount)
            },
            error: function (error) {
                const sources = error.responseJSON;
                swal("Error!", sources.message, "error");
            }
        })
    })

    $("#add-installment-form").on("submit", function (e) {
        e.preventDefault();
        var form = $("#add-installment-form").validate({
            rules:{
                account_id:'required',
                instalment_date:'required'
            },
            messages:{
                account_id:'Please Select Account Id',
                instalment_date:'Please Select Instalment Date'
            }
        });
        if (!form.valid()){
            return form.valid();
        }
        var dataString = $(this).serializeArray();
        console.log(dataString)
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: dataString,
            dataType: 'json',
            success: function (response) {
                const sources = response;
                swal("Success!", sources.message, "success");
                setTimeout(function () {
                    window.location.reload()
                },1000)
            },
            error: function (error) {
                const sources = error.responseJSON;
              //  swal("Error!", sources.message, "error");
            }
        })

    });
    //  flatpickr(document.getElementById('instalment_date'));
    // flatpickr(document.getElementById('paid_date'));

</script>
<!-- END PAGE LEVEL CUSTOM SCRIPTS -->
@endpush
