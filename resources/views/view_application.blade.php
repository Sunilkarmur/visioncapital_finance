@extends('layouts.after_login')

@section('content')

@php
$busi_details = $application->business;
@endphp
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
  <div class="layout-px-spacing">
    <div class="page-header">
      <div class="page-title mb-0">
        <h3>View Application</h3>
      </div>
    </div>


      <!-- FOR OFFICE USE ONLY -->
      <div class="row layout-top-spacing pt-4">
          <div class="col-lg-12 layout-spacing">
              <div class="statbox widget box box-shadow">
                  <div class="widget-header">
                      <div class="row">
                          <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                              <h4>Status</h4>
                          </div>
                      </div>
                  </div>
                  <div class="widget-content widget-content-area">
                      <div class="track">
                          <div class="step active">
                              <span class="icon"><i class="fa fa-check"></i></span>
                              <span class="text">Processing fees received</span>
                          </div>
                          <div class="step active">
                              <span class="icon"> <i class="fa fa-check"></i></span>
                              <span class="text">Agreement</span>
                          </div>
                          <div class="step">
                              <span class="icon"><i class="fa fa-check"></i></span>
                              <span class="text">Franking</span>
                          </div>
                          <div class="step">
                              <span class="icon"><i class="fa fa-check"></i></span>
                              <span class="text">Sign</span>
                          </div>
                          <div class="step">
                              <span class="icon"><i class="fa fa-check"></i></span>
                              <span class="text">Notarized Agreement</span>
                          </div>
                          <div class="step">
                              <span class="icon"><i class="fa fa-check"></i></span>
                              <span class="text">Disbusrsement</span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- FOR OFFICE USE ONLY end -->

    <!-- REFERENCE -->
    <div class="row layout-top-spacing">
      <div class="col-xl-12 col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>REFERENCE</h4>
              </div>
            </div>
          </div>
          <div class="widget-content widget-content-area">
            <div class="row">
              <div class="col-6">
                <div class="form-group row  mb-4">
                  <label for="ref_name" class="col-sm-4 col-form-label col-form-label-sm">Name of Person</label>
                  <div class="col-sm-8">
                    <label class="mt-1">{{ $application->ref_name }}</label>
                  </div>
                </div>
                <div class="form-group row  mb-4">
                  <label for="ref_firm" class="col-sm-4 col-form-label col-form-label-sm">Name of Firm</label>
                  <div class="col-sm-8">
                    <label class="mt-1">{{ $application->ref_firm }}</label>
                  </div>
                </div>
                <div class="form-group row  mb-4">
                  <label for="ref_contact" class="col-sm-4 col-form-label col-form-label-sm">Mobile No</label>
                  <div class="col-sm-8">
                    <label class="mt-1">{{ $application->ref_contact }}</label>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group row  mb-4">
                  <label for="ref_affiliate_vc" class="col-sm-4 col-form-label col-form-label-sm">Affliated to Vision
                    Capital</label>
                  <div class="col-sm-8">
                    <label class="mt-1">{{ $application->ref_affiliate_vc }}</label>
                  </div>
                </div>
                <div class="form-group row  mb-4 d-none select_affiliate_type">
                  <label for="ref_affiliate_type" class="col-sm-4 col-form-label col-form-label-sm">Affliated
                    Type</label>
                  <div class="col-sm-8">
                    <label class="mt-1">Loan</label>
                  </div>
                </div>
                <div class="form-group row  mb-4">
                  <label for="ref_affiliate_type_other" class="col-sm-4 col-form-label col-form-label-sm">Specify
                    here</label>
                  <div class="col-sm-8">
                    <label class="mt-1">{{ $application->ref_affiliate_type_other }}</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Borrower Details -->
    <div class="row layout-top-spacing">
      <div class="col-xl-12 col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>BORROWER DETAILS</h4>
              </div>
            </div>
          </div>
          <div class="widget-content widget-content-area">
            <div class="row">
              <div class="col-6">
                <div class="form-group row  mb-4">
                  <label for="bor_name" class="col-sm-4 col-form-label col-form-label-sm">Name</label>
                  <div class="col-sm-8">
                    <label class="mt-1">{{ $application->bor_name }}</label>
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

    <!-- BUSINESS Details -->
    @if(!empty($application->business))
    <div class="row layout-top-spacing">
      <div class="col-xl-12 col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>BUSINESS DETAILS</h4>
              </div>
            </div>
          </div>
          <div class="widget-content widget-content-area">
            @foreach($application->business as $business)
            <hr class="mt-0">
            <div class="row">
              <div class="col-6">
                <div class="form-group row  mb-4">
                  <label for="business_name" class="col-sm-4 col-form-label col-form-label-sm">Name of Firm</label>
                  <div class="col-sm-8">
                    <!-- <input type="text" name="business_name" class="form-control form-control-sm" id="business_name" placeholder="Name of Firm"> -->
                    <label class="mt-1">{{ $business->business_name }}</label>
                  </div>
                </div>
                <div class="form-group row  mb-4">
                  <label for="business_started_date" class="col-sm-4 col-form-label col-form-label-sm">Started
                    on</label>
                  <div class="col-sm-8">
                    <label class="mt-1">{{ $business->business_started_date }}</label>
                  </div>
                </div>
                <div class="form-group row  mb-4">
                  <label for="business_type" class="col-sm-4 col-form-label col-form-label-sm">Type</label>
                  <div class="col-sm-8">
                    <!-- <select class="form-control form-control-sm business_type" name="business_type">
                                                    <option value="Proprietorship">Proprietorship</option>
                                                    <option value="Partnership">Partnership</option>
                                                    <option value="LLP">LLP</option>
                                                    <option value="Pvt. Ltd.">Pvt. Ltd.</option>
                                                    </select> -->
                    <label class="mt-1">{{ $business->business_type }}</label>
                  </div>
                </div>
                <div class="form-group row  mb-4">
                  <label for="business_nature" class="col-sm-4 col-form-label col-form-label-sm">Nature /
                    Activity</label>
                  <div class="col-sm-8">
                    <!-- <input type="text" name="business_nature" class="form-control form-control-sm" id="business_nature" placeholder="Nature / Activity"> -->
                    <label class="mt-1">{{ $business->business_nature }}</label>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group row  mb-4">
                  <label for="business_monthly_income" class="col-sm-4 col-form-label col-form-label-sm">Monthly
                    Income</label>
                  <div class="col-sm-8">
                    <label class="mt-1">{{ $business->business_monthly_income }}</label>
                  </div>
                </div>
                <div class="form-group row  mb-4">
                  <label for="business_location" class="col-sm-4 col-form-label col-form-label-sm">Location /
                    Address</label>
                  <div class="col-sm-8">
                    <!-- <input type="text" name="business_location" class="form-control form-control-sm" id="business_location" placeholder="Location / Address"> -->
                    <label class="mt-1">{{ $business->business_location }}</label>
                  </div>
                </div>
                <div class="form-group row  mb-4">
                  <label for="business_location_type" class="col-sm-4 col-form-label col-form-label-sm">Location
                    Type</label>
                  <div class="col-sm-8">
                    <!-- <select class="form-control form-control-sm business_location_type" name="business_location_type">
                                                    <option value="Own">Own</option>
                                                    <option value="Rented">Rented</option> -->
                    <label class="mt-1">{{ $business->business_location_type }}</label>
                    <!-- </select> -->
                  </div>
                </div>
                <div class="form-group row  mb-4">
                  <label for="business_duration_place" class="col-sm-4 col-form-label col-form-label-sm">Duration at
                    that place:</label>
                  <div class="col-sm-8">
                    <!-- <input type="text" name="business_duration_place" class="form-control form-control-sm" id="business_duration_place" placeholder="Duration at that place:"> -->
                    <label class="mt-1">{{ $business->business_duration_place }}</label>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    @endif
    <!-- BUSINESS Details end -->

    <!-- RESIDENCE Details -->
    <div class="row layout-top-spacing">
      <div class="col-xl-12 col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>RESIDENCE DETAILS</h4>
              </div>
            </div>
          </div>
          <div class="widget-content widget-content-area">
            <div class="row">
              <div class="col-6">
                <div class="form-group row  mb-4">
                  <label for="home_address" class="col-sm-4 col-form-label col-form-label-sm">Location / Address</label>
                  <div class="col-sm-8">
                    <!-- <input type="text" name="home_address" class="form-control form-control-sm" id="home_address" placeholder="Location / Address"> -->
                    <label class="mt-1">{{ $application->home_address }}</label>
                  </div>
                </div>
                <div class="form-group row  mb-4">
                  <label for="home_type" class="col-sm-4 col-form-label col-form-label-sm">Location Type</label>
                  <div class="col-sm-8">
                    <!-- <select class="form-control form-control-sm home_type" name="home_type">
                                                    <option value="Own">Own</option>
                                                    <option value="Rented">Rented</option>
                                                </select> -->
                    <label class="mt-1">{{ $application->home_type }}</label>
                  </div>
                </div>
                <div class="form-group row  mb-4">
                  <label for="home_duration_place" class="col-sm-4 col-form-label col-form-label-sm">Duration at that
                    place:</label>
                  <div class="col-sm-8">
                    <!-- <input type="text" name="home_duration_place" class="form-control form-control-sm" id="home_duration_place" placeholder="Duration at that place:"> -->
                    <label class="mt-1">{{ $application->home_duration_place }}</label>
                  </div>
                </div>
              </div>
              <!-- <div class="col-6">

                                    </div>                               -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- RESIDENCE Details end -->

    <!-- BANKING & FINANCE -->
    <div class="row layout-top-spacing">
      <div class="col-xl-12 col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>BANKING & FINANCE</h4>
              </div>
            </div>
          </div>
          <div class="widget-content widget-content-area">
            @if(!empty($application->financeBanking))
            <div class="row">
              @foreach($application->financeBanking as $finance)
              <div class="col-6">
                <div class="form-group row  mb-4">
                  <label for="previous_loan" class="col-sm-4 col-form-label col-form-label-sm">Previous Loan</label>
                  <div class="col-sm-8">
                    <!-- <input type="text" name="previous_loan" class="form-control form-control-sm" id="previous_loan" placeholder="Previous Loan"> -->
                    <label class="mt-1">{{ $finance->previous_lona_type }}</label>
                  </div>
                </div>
                <div class="form-group row  mb-4">
                  <label for="loan_amount" class="col-sm-4 col-form-label col-form-label-sm">Loan Amount</label>
                  <div class="col-sm-8">
                    <!-- <input type="text" name="loan_amount" class="form-control form-control-sm" id="loan_amount" placeholder="Loan Amount">
                                                    -->
                    <label class="mt-1">{{ $finance->loan_amount }}</label>
                  </div>
                </div>
                <div class="form-group row  mb-4">
                  <label for="emi_amount" class="col-sm-4 col-form-label col-form-label-sm">EMI Amount</label>
                  <div class="col-sm-8">
                    <!-- <input type="text" name="emi_amount" class="form-control form-control-sm" id="emi_amount" placeholder="EMI Amount"> -->
                    <label class="mt-1">{{ $finance->emi_amount }}</label>
                  </div>
                </div>
                <div class="form-group row  mb-4">
                  <label for="duration" class="col-sm-4 col-form-label col-form-label-sm">Duration</label>
                  <div class="col-sm-8">
                    <!-- <input type="text" name="duration" class="form-control form-control-sm" id="duration" placeholder="Duration"> -->
                    <label class="mt-1">{{ $finance->duration }}</label>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group row  mb-4">
                  <label for="bank_branch" class="col-sm-4 col-form-label col-form-label-sm">Branch</label>
                  <div class="col-sm-8">
                    <!-- <input type="text" name="bank_branch" class="form-control form-control-sm" id="bank_branch" placeholder="Branch"> -->
                    <label class="mt-1">{{ $finance->bank_branch }}</label>
                  </div>
                </div>
                <div class="form-group row  mb-4">
                  <label for="bank_name" class="col-sm-4 col-form-label col-form-label-sm">Bank</label>
                  <div class="col-sm-8">
                    <!-- <input type="text" name="bank_name" class="form-control form-control-sm" id="bank_name" placeholder="Bank"> -->
                    <label class="mt-1">{{ $finance->bank_name }}</label>
                  </div>
                </div>
                <div class="form-group row  mb-4">
                  <label for="bank_balance" class="col-sm-4 col-form-label col-form-label-sm">Balance Amount</label>
                  <div class="col-sm-8">
                    <!-- <input type="text" name="bank_balance" class="form-control form-control-sm" id="bank_balance" placeholder="Balance Amount"> -->
                    <label class="mt-1">{{ $finance->bank_balance }}</label>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            @endif

            <div class="row">
              @if(!empty($application->savingBanking))
              @foreach($application->savingBanking as $saving)
              <div class="col-6">
                <div class="form-group row  mb-4">
                  <label for="saving_ac_bank " class="col-sm-4 col-form-label col-form-label-sm">Savings Account
                    Bank</label>
                  <div class="col-sm-8">
                    <!-- <input type="text" name="saving_ac_bank" class="form-control form-control-sm" id="saving_ac_bank" placeholder="Savings Account Bank"> -->
                    <label class="mt-1">{{ $saving->bank_name }}</label>
                  </div>
                </div>
                <div class="form-group row  mb-4">
                  <label for="saving_ac_branch" class="col-sm-4 col-form-label col-form-label-sm">Savings Account
                    Branch</label>
                  <div class="col-sm-8">
                    <!-- <input type="text" name="saving_ac_branch" class="form-control form-control-sm" id="saving_ac_branch" placeholder="Savings Account Branch"> -->
                    <label class="mt-1">{{ $saving->branch_name }}</label>
                  </div>
                </div>
              </div>
              @endforeach
              @endif
              @if(!empty($application->currentBanking))
                @foreach($application->currentBanking as $current)
              <div class="col-6">
                <div class="form-group row  mb-4">
                  <label for="current_ac_bank" class="col-sm-4 col-form-label col-form-label-sm">Current Account
                    Bank</label>
                  <div class="col-sm-8">
                    <!-- <input type="text" name="current_ac_bank" class="form-control form-control-sm" id="current_ac_bank" placeholder="Current Account Bank"> -->
                    <label class="mt-1">{{ $current->bank_name }}</label>
                  </div>
                </div>
                <div class="form-group row  mb-4">
                  <label for="current_ac_branch" class="col-sm-4 col-form-label col-form-label-sm">Current Account
                    Branch</label>
                  <div class="col-sm-8">
                    <!-- <input type="text" name="current_ac_branch" class="form-control form-control-sm" id="current_ac_branch" placeholder="Current Account Branch"> -->
                    <label class="mt-1">{{ $current->branch_name }}</label>
                  </div>
                </div>
              </div>
              @endforeach
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- BANKING & FINANCE end -->

    <!-- GUARANTOR DETAILS -->
    @if(!empty($application->guarantor_detail))
    <div class="row layout-top-spacing">
      <div class="col-xl-12 col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>GUARANTOR DETAILS</h4>
              </div>
            </div>
          </div>
          <div class="widget-content widget-content-area">
            <div class="row">
              @foreach(json_decode($application->guarantor_detail) as $guarantor)
              <div class="col-6">
                <div class="form-group row  mb-4">
                  <label for="guarantor_name" class="col-sm-4 col-form-label col-form-label-sm">Name of Person</label>
                  <div class="col-sm-8">
                    <label class="mt-1">{{ $guarantor->guarantor_name }}</label>
                  </div>
                </div>
                <div class="form-group row  mb-4">
                  <label for="guarantor_firm" class="col-sm-4 col-form-label col-form-label-sm">Name of Firm</label>
                  <div class="col-sm-8">
                    <label class="mt-1">{{ $guarantor->guarantor_firm }}</label>
                  </div>
                </div>
                <div class="form-group row  mb-4">
                  <label for="guarantor_firm_nature" class="col-sm-4 col-form-label col-form-label-sm">Firm
                    Nature</label>
                  <div class="col-sm-8">
                    <label class="mt-1">{{ $guarantor->guarantor_firm_nature }}</label>
                  </div>
                </div>
                <div class="form-group row  mb-4">
                  <label for="guarantor_affiliate_vc" class="col-sm-4 col-form-label col-form-label-sm">Affliated to
                    Vision
                    Capital</label>
                  <div class="col-sm-8">
                    <label class="mt-1">{{ $guarantor->guarantor_affiliate_vc == '1' ? 'Yes' : 'No' }}</label>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group row  mb-4">
                  <label for="guarantor_affiliate_type" class="col-sm-4 col-form-label col-form-label-sm">Affiliated
                    Type</label>
                  <div class="col-sm-8">
                    <label class="mt-1">{{ $guarantor->guarantor_affiliate_type }}</label>
                  </div>
                </div>
                <div class="form-group row  mb-4">
                  <label for="guarantor_affiliate_type_other" class="col-sm-4 col-form-label col-form-label-sm">Specify
                    Here</label>
                  <div class="col-sm-8">
                    <label class="mt-1">{{ $guarantor->guarantor_affiliate_type_other }}</label>
                  </div>
                </div>
                <div class="form-group row  mb-4">
                  <label for="guarantor_address" class="col-sm-4 col-form-label col-form-label-sm">Location
                    / Address</label>
                  <div class="col-sm-8">
                    <label class="mt-1">{{ $guarantor->guarantor_address }}</label>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
    <!-- GUARANTOR DETAILS end -->

    <!-- FOR OFFICE USE ONLY -->
    @if(!empty($application->officeUse))
    <div class="row layout-top-spacing">
      <div class="col-xl-12 col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
          <div class="widget-header">
            <div class="row">
              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>FOR OFFICE USE ONLY</h4>
              </div>
            </div>
          </div>
          <div class="widget-content widget-content-area">
            <div class="row">
              <div class="col-6">
                <div class="form-group row  mb-4 remarks">
                  <label for="guarantor_affiliate_type_other"
                    class="col-sm-4 col-form-label col-form-label-sm">Remarks</label>
                  <div class="col-sm-8">
                    <label class="mt-1">{{ $application->officeUse->remark }}</label>
                  </div>
                </div>
                <div class="form-group row  mb-4 remarks">
                  <label for="guarantor_affiliate_type_other" class="col-sm-4 col-form-label col-form-label-sm">CIBIL
                    Score Required?</label>
                  <div class="col-sm-8">
                    <label class="mt-1">{{ $application->officeUse->cibil_score_required_type == '1' ? 'Yes' : 'No' }}</label>
                  </div>
                </div>
                <div class="form-group row cibil_score_row  mb-4 d-none">
                  <label for="cibil_socre" class="col-sm-4 col-form-label col-form-label-sm">CIBIL Score</label>
                  <div class="col-sm-8">
                    <label class="mt-1">{{ $application->officeUse->cibil_score }}</label>
                  </div>
                </div>
                <div class="form-group row cibil_score_row  mb-4">
                  <label for="attend_by" class="col-sm-4 col-form-label col-form-label-sm">Attended By</label>
                  <div class="col-sm-8">
                    <label class="mt-1">{{ $application->officeUse->attend_by }}</label>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group row cibil_score_row d-none  mb-4">
                  <label for="signature" class="col-sm-4 col-form-label col-form-label-sm">Signature</label>
                  <div class="col-sm-8">
                    <label class="mt-1">Signature</label>
                  </div>
                </div>
                <div class="form-group row  mb-4 remarks">
                  <label for="guarantor_affiliate_type_other"
                    class="col-sm-4 col-form-label col-form-label-sm">Status</label>
                  <div class="col-sm-8">
                    <label class="mt-1">{{ $application->officeUse->status }}</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
    <!-- FOR OFFICE USE ONLY end -->
  </div>
</div>
<!--  END CONTENT AREA  -->
@endsection

@push('style')
    <style>

        /*
            Just for demo purpose ---- Remove it.
        */
        /*<starter kit design>*/

        .widget-one {

        }
        .widget-one h6 {
            font-size: 20px;
            font-weight: 600;
            letter-spacing: 0px;
            margin-bottom: 22px;
        }
        .widget-one p {
            font-size: 15px;
            margin-bottom: 0;
        }

        #formValidate .wizard > .content {min-height: 25em;}

        #example-vertical.wizard > .content {min-height: 24.5em;}

        /*</starter kit design>*/
    </style>
@endpush
