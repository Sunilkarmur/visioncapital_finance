@extends('layouts.after_login')

@section('content')

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
  <div class="layout-px-spacing">
    <div class="page-header">
      <div class="page-title">
        <h3>View Approved Application</h3>
      </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $message }}</strong>
    </div>
    @endif
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $message }}</strong>
    </div>
    @endif

    <!-- Borrower Details -->
    <div class="row" id="cancel-row">
      <div class="col-xl-12 col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>CUSTOMER DETAILS</h4>
              </div>
            </div>
          </div>
          <div class="widget-content widget-content-area">
            <div class="row">
              <div class="col-6">
                <div class="form-group row  mb-4">
                  <label for="bor_name" class="col-sm-4 col-form-label col-form-label-sm">Name</label>
                  <div class="col-sm-8">
                    <label class="mt-1">{{ $application->ref_name }}</label>
                  </div>
                </div>
                <div class="form-group row  mb-4">
                  <label for="bor_amount" class="col-sm-4 col-form-label col-form-label-sm">Amount Required</label>
                  <div class="col-sm-8">
                    <label class="mt-1">{{ $application->bor_amount }}</label>
                  </div>
                </div>
                <div class="form-group row  mb-4">
                  <label for="bor_time_limit" class="col-sm-4 col-form-label col-form-label-sm">Time Limit</label>
                  <div class="col-sm-8">
                    <label class="mt-1">{{ $application->bor_time_limit }}</label>
                  </div>
                </div>
                <div class="form-group row  mb-4">
                  <label for="bor_purpose" class="col-sm-4 col-form-label col-form-label-sm">Purpose</label>
                  <div class="col-sm-8">
                    <label class="mt-1">{{ $application->bor_purpose }}</label>
                  </div>
                </div>
                <div class="form-group row  mb-4">
                  <label for="bor_affiliate_vc" class="col-sm-4 col-form-label col-form-label-sm">Affliated to Vision
                    Capital</label>
                  <div class="col-sm-8">
                    <label class="mt-1">{{ $application->bor_affiliate_vc }}</label>
                    </select>
                  </div>
                </div>
                <div class="form-group row  mb-4 bor_select_affiliate_type">
                  <label for="bor_affiliate_type" class="col-sm-4 col-form-label col-form-label-sm">Affliated
                    Type</label>
                  <div class="col-sm-8">
                    <label class="mt-1">{{ $application->bor_affiliate_type }}</label>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group row  mb-4 bor_specify">
                  <label for="bor_affiliate_type_other" class="col-sm-4 col-form-label col-form-label-sm">Specify
                    here</label>
                  <div class="col-sm-8">
                    <label class="mt-1">{{ $application->bor_affiliate_type_other }}</label>
                  </div>
                </div>
                <div class="form-group row  mb-4">
                  <label for="bor_pan_no" class="col-sm-4 col-form-label col-form-label-sm">PAN No.</label>
                  <div class="col-sm-8">
                    <label class="mt-1">{{ $application->bor_pan_no }}</label>
                  </div>
                </div>
                <div class="form-group row  mb-4">
                  <label for="bor_aadhar_no" class="col-sm-4 col-form-label col-form-label-sm">Adhar No.</label>
                  <div class="col-sm-8">
                    <label class="mt-1">{{ $application->bor_aadhar_no }}</label>
                  </div>
                </div>
                <div class="form-group row  mb-4">
                  <label for="bor_pin_code" class="col-sm-4 col-form-label col-form-label-sm">PIN Code</label>
                  <div class="col-sm-8">
                    <label class="mt-1">{{ $application->bor_pin_code }}</label>
                  </div>
                </div>
                <div class="form-group row  mb-4">
                  <label for="bor_dob" class="col-sm-4 col-form-label col-form-label-sm">Date of Birth</label>
                  <div class="col-sm-8">
                    {{ $application->bor_dob }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Borrower Details end -->
    <!-- FOR OFFICE USE ONLY -->
    <div class="row layout-top-spacing">
      <div class="col-xl-12 col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>Progress</h4>
              </div>
            </div>
          </div>
          <div class="widget-content widget-content-area">
            <form method="post" action="{{ route('finance.store_application_process', encrypt($application->id)) }}" id="progress-form">
              @csrf
              <div class="row">
                <div class="col-6">
                  <div class="form-group row  mb-4 remarks">
                    <label for="guarantor_affiliate_type_other"
                      class="col-sm-4 col-form-label col-form-label-sm">Processing Fees</label>
                    <div class="col-sm-8">
                      <select class="form-control form-control-sm processing_fees_select" name="processing_fees_select">
                        <option value="1">Yes</option>
                        <option value="0" selected="true">No</option>
                      </select>
                      <!-- <input type="text" name="ref_contact" class="form-control form-control-sm" id="ref_contact" placeholder="Mobile No"> -->
                    </div>
                  </div>
                  <div class="form-group row  mb-4 remarks">
                    <label for="guarantor_affiliate_type_other"
                      class="col-sm-4 col-form-label col-form-label-sm"></label>
                    <div class="col-sm-8">
                      <div class="n-chk mt-3 mb-3">
                        <label class="new-control new-checkbox new-checkbox-rounded checkbox-success">
                          <input type="checkbox" name="agreement" class="new-control-input" value="Agreement">
                          <span class="new-control-indicator"></span>Agreement
                        </label>
                      </div>
                      <div class="n-chk mt-3 mb-3">
                        <label class="new-control new-checkbox new-checkbox-rounded checkbox-success">
                          <input type="checkbox" name="franking" class="new-control-input" value="Franking">
                          <span class="new-control-indicator"></span>Franking
                        </label>
                      </div>
                      <div class="n-chk mt-3 mb-3">
                        <label class="new-control new-checkbox new-checkbox-rounded checkbox-success">
                          <input type="checkbox" name="sign" class="new-control-input signature" value="Sign">
                          <span class="new-control-indicator"></span>Sign
                        </label>
                      </div>
                      <div class="n-chk mt-3 mb-3">
                        <label class="new-control new-checkbox new-checkbox-rounded checkbox-success">
                          <input type="checkbox" name="notarized_agreement" class="new-control-input notarized"
                            value="Notarized Agreement">
                          <span class="new-control-indicator"></span>Notarized Agreement
                        </label>
                      </div>
                      <div class="n-chk mt-3 mb-3">
                        <label class="new-control new-checkbox new-checkbox-rounded checkbox-success">
                          <input type="checkbox" name="disbusrsement" class="new-control-input disbursement"
                            value="Disbusrsement">
                          <span class="new-control-indicator"></span>Disbusrsement
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group row mb-4" style="max-height: 20px;height: 100%;">
                    <div class="processing_fees_row d-none" style="width: 100%;display: inline-flex;">
                      <label for="Processing Fees" class="col-sm-4 col-form-label col-form-label-sm">Processing
                        Fees</label>
                      <div class="col-sm-8">
                        <input type="text" name="processing_fees" class="form-control"
                          value="{{ ($application->bor_amount * config('constants.processing_percentage'))/100 }}"
                          readonly>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row  mb-4 mt-4 pt-4">
                    <div class="d-none sign_row" style="width: 100%;display: inline-flex;">
                      <label for="Processing Fees" class="col-sm-4 col-form-label col-form-label-sm">Signature</label>
                      <div class="row col-8">
                        <div class="n-chk mt-2">
                          <label class="new-control new-checkbox new-checkbox-rounded checkbox-success">
                            <input type="radio" class="new-control-input" name="signature_type" value="borrower_sign">
                            <span class="new-control-indicator"></span>Borrower Sign
                          </label>
                        </div>&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="n-chk mt-2">
                          <label class="new-control new-checkbox new-checkbox-rounded checkbox-success">
                            <input type="radio" class="new-control-input" name="signature_type" value="gaurantor_sign">
                            <span class="new-control-indicator"></span>Gaurantor Sign
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="d-none notarised_row" style="width: 100%;display: inline-flex;">
                      <label for="Processing Fees" class="col-sm-4 col-form-label col-form-label-sm">Notarized
                        Status</label>
                      <div class="col-sm-8">
                        <select class="form-control form-control-sm notarised_select" name="notarised_select">
                          <option value="1">Completed</option>
                          <option value="0" selected="">Not Completed</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row  mb-4 mt-2 pt-2">
                    <div class="d-none disbursement_row" style="width: 100%;display: inline-flex;">
                      <label for="Processing Fees" class="col-sm-4 col-form-label col-form-label-sm">Disbursement
                        Status</label>
                      <div class="col-sm-8">
                        <select class="form-control form-control-sm disbursement_select" name="disbursement_select">
                          <option value="1">Partial Disbursement</option>
                          <option value="0" selected="">Full Disbursement</option>
                        </select>
                      </div>
                    </div>
                    <div class="d-none disbursement_textbox mt-3" style="width: 100%;display: inline-flex;">
                      <label for="disbursement_tex" class="col-sm-4 col-form-label col-form-label-sm">Disbursement
                        Amount</label>
                      <div class="col-sm-8">
                        <input type="text" value="{{ $application->bor_amount }}" id="loan_amount" class="d-none">
                        <input type="text" name="disbursement_amt" id="disbursement_amt" class="form-control"
                          value="{{ $application->bor_amount }}" readonly>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 text-right mb-4 mt-2 pt-2 text-right">
                  <!-- <div class="col-12"> -->
                  <input type="submit" class="btn btn-primary" value="Process">
                  <!-- </div> -->
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- FOR OFFICE USE ONLY end -->
  </div>
</div>
<!--  END CONTENT AREA  -->
@endsection

@push('script')
<script src="{{ asset('js/view_approved_app.js') }}"></script>
@endpush
