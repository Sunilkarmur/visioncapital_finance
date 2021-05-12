@extends('layouts.after_login')

@section('content')
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
  <div class="">
    <div class="container">
      <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-lg-12  layout-spacing">
          <div class="statbox widget box box-shadow">
            <div class="widget-header">
              <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                  <h4>Basic information sheet</h4>
                  <input type="hidden" name="finance-form-id" id="finance-form-id" value="{{ $finance->id }}">
                </div>
              </div>
            </div>
            <div class="widget-content widget-content-area">
              <div id="pill-vertical-edit">
                <h3>REFERENCE</h3>
                <section>
                  <form class="referrance-finance-detail">
                    <div class="form-group row  mb-4">
                      <label for="ref_name" class="col-sm-4 col-form-label col-form-label-sm">Name
                        of Person</label>
                      <div class="col-sm-8">
                        <input type="text" name="ref_name" class="form-control form-control-sm" id="ref_name"
                          placeholder="Name of Person" value="{{ $finance->ref_name }}">
                      </div>
                    </div>
                    <div class="form-group row  mb-4">
                      <label for="ref_firm" class="col-sm-4 col-form-label col-form-label-sm">Name
                        of Firm</label>
                      <div class="col-sm-8">
                        <input type="text" name="ref_firm" class="form-control form-control-sm" id="ref_firm"
                          placeholder="Name of Firm" value="{{ $finance->ref_firm }}">
                      </div>
                    </div>
                    <div class="form-group row  mb-4">
                      <label for="ref_contact" class="col-sm-4 col-form-label col-form-label-sm">Mobile
                        No</label>
                      <div class="col-sm-8">
                        <input type="text" name="ref_contact" class="form-control form-control-sm" id="ref_contact"
                          placeholder="Mobile No" value="{{ $finance->ref_contact }}">
                      </div>
                    </div>
                    <div class="form-group row  mb-4">
                      <label for="ref_affiliate_vc" class="col-sm-4 col-form-label col-form-label-sm">Affliated to
                        Vision Capital</label>
                      <div class="col-sm-8">
                        <select class="form-control form-control-sm ref_affiliate_vc" name="ref_affiliate_vc">
                          <option value="Yes" {{ $finance->ref_affiliate_vc==="Yes"?"selected='selected'":"" }}>
                            Yes
                          </option>
                          <option value="No" {{ $finance->ref_affiliate_vc==="No"?"selected='selected'":"" }}>
                            No
                          </option>
                        </select>
                      </div>
                    </div>
                    <div
                      class="form-group row  mb-4 select_affiliate_type {{ $finance->ref_affiliate_vc === 'No' ? 'd-none' : '' }} ">
                      <label for="ref_affiliate_type" class="col-sm-4 col-form-label col-form-label-sm">Select
                        Affliated
                        Type</label>
                      <div class="col-sm-8">
                        <select class="form-control form-control-sm ref_affiliate_type" name="ref_affiliate_type[]"
                          id="ref_affiliate_type" >
                          <option value="Loan">Loan</option>
                          <option value="Subsidy">Subsidy</option>
                          <option value="Finance">Finance</option>
                          <option value="VC">VC</option>
                          <option value="Other">Other (Specify)</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row  mb-4 d-none specify">
                      <label for="ref_affiliate_type_other" class="col-sm-4 col-form-label col-form-label-sm">Specify
                        here</label>
                      <div class="col-sm-8">
                        <input type="text" name="ref_affiliate_type_other" class="form-control form-control-sm"
                          id="ref_affiliate_type_other" placeholder="Other"
                          value="{{ $finance->ref_affiliate_type_other }}">
                      </div>
                    </div>
                  </form>
                </section>
                <h3>BORROWER DETAILS</h3>
                <section>
                  <form id="borrower-detail-form">
                    <div class="form-group row  mb-4">
                      <label for="bor_name" class="col-sm-4 col-form-label col-form-label-sm">Name</label>
                      <div class="col-sm-8">
                        <input type="text" name="bor_name" class="form-control form-control-sm" id="bor_name"
                          placeholder="Name" value="{{ $finance->bor_name }}">
                      </div>
                    </div>
                    <div class="form-group row  mb-4">
                      <label for="bor_amount" class="col-sm-4 col-form-label col-form-label-sm">Amount
                        Required</label>
                      <div class="col-sm-8">
                        <input type="text" name="bor_amount" class="form-control form-control-sm" id="bor_amount"
                          placeholder="Amount Required" value="{{ $finance->bor_amount }}">
                      </div>
                    </div>
                    <div class="form-group row  mb-4">
                      <label for="bor_time_limit" class="col-sm-4 col-form-label col-form-label-sm">Time
                        Limit</label>
                      <div class="col-sm-8">
                        <input type="text" name="bor_time_limit" class="form-control form-control-sm"
                          id="bor_time_limit" placeholder="Time Limit" value="{{ $finance->bor_time_limit }}">
                      </div>
                    </div>
                    <div class="form-group row  mb-4">
                      <label for="bor_purpose" class="col-sm-4 col-form-label col-form-label-sm">Purpose</label>
                      <div class="col-sm-8">
                        <input type="text" name="bor_purpose" class="form-control form-control-sm" id="bor_purpose"
                          placeholder="Purpose" value="{{ $finance->bor_purpose }}">
                      </div>
                    </div>
                    <div class="form-group row  mb-4">
                      <label for="bor_affiliate_vc" class="col-sm-4 col-form-label col-form-label-sm">Affliated to
                        Vision Capital</label>
                      <div class="col-sm-8">
                        <select class="form-control form-control-sm bor_affiliate_vc" name="bor_affiliate_vc">
                          <option value="Yes" {{ $finance->bor_affiliate_vc==='Yes'?'selected="selected"':'' }}>
                            Yes
                          </option>
                          <option value="No" {{ $finance->bor_affiliate_vc==='No'?'selected="selected"':'' }}>
                            No
                          </option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row  mb-4 d-none bor_select_affiliate_type">
                      <label for="bor_affiliate_type" class="col-sm-4 col-form-label col-form-label-sm">Select
                        Affliated
                        Type</label>
                      <div class="col-sm-8">
                        <select class="form-control form-control-sm bor_affiliate_type" name="bor_affiliate_type">
                          <option value="Loan" {{ $finance->bor_affiliate_type==='Loan'?'selected="selected"':'' }}>
                            Loan
                          </option>
                          <option value="Subsidy"
                            {{ $finance->bor_affiliate_type==='Subsidy'?'selected="selected"':'' }}>
                            Subsidy
                          </option>
                          <option value="Finance"
                            {{ $finance->bor_affiliate_type==='Finance'?'selected="selected"':'' }}>
                            Finance
                          </option>
                          <option value="VC" {{ $finance->bor_affiliate_type==='VC'?'selected="selected"':'' }}>
                            VC
                          </option>
                          <option value="Other" {{ $finance->bor_affiliate_type==='Other'?'selected="selected"':'' }}>
                            Other (Specify)
                          </option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row  mb-4 d-none bor_specify">
                      <label for="bor_affiliate_type_other" class="col-sm-4 col-form-label col-form-label-sm">Specify
                        here</label>
                      <div class="col-sm-8">
                        <input type="text" name="bor_affiliate_type_other" class="form-control form-control-sm"
                          id="bor_affiliate_type_other" placeholder="Other"
                          value="{{ $finance->bor_affiliate_type_other }}">
                      </div>
                    </div>
                    <div class="form-group row  mb-4">
                      <label for="bor_mob_no" class="col-sm-4 col-form-label col-form-label-sm">Mobile No</label>
                      <div class="col-sm-8">
                        <input type="text" name="bor_mob_no" class="form-control form-control-sm" id="bor_mob_no"
                          placeholder="Mobile No.">
                      </div>
                    </div>
                    <div class="form-group row  mb-4">
                      <label for="bor_pan_no" class="col-sm-4 col-form-label col-form-label-sm">PAN No.</label>
                      <div class="col-sm-8">
                        <input type="text" name="bor_pan_no" class="form-control form-control-sm" id="bor_pan_no"
                          placeholder="PAN No." value="{{ $finance->bor_pan_no }}">
                      </div>
                    </div>
                    <div class="form-group row  mb-4">
                      <label for="bor_aadhar_no" class="col-sm-4 col-form-label col-form-label-sm">Adhar
                        No.</label>
                      <div class="col-sm-8">
                        <input type="text" name="bor_aadhar_no" data-type="adhaar-number"
                          class="form-control form-control-sm" id="bor_aadhar_no" placeholder="Adhar No."
                          value="{{ $finance->bor_aadhar_no }}">
                      </div>
                    </div>
                    <div class="form-group row  mb-4">
                      <label for="bor_pin_code" class="col-sm-4 col-form-label col-form-label-sm">PIN
                        Code</label>
                      <div class="col-sm-8">
                        <input type="text" name="bor_pin_code" class="form-control form-control-sm" id="bor_pin_code"
                          placeholder="PIN Code" value="{{ $finance->bor_pin_code }}">
                      </div>
                    </div>
                    <div class="form-group row  mb-4">
                      <label for="bor_dob" class="col-sm-4 col-form-label col-form-label-sm">Date
                        of Birth</label>
                      <div class="col-sm-8">
                        <input type="date" name="bor_dob" class="form-control form-control-sm" id="bor_dob"
                          placeholder="Date of Birth" value="{{ $finance->bor_dob }}">
                      </div>
                    </div>
                  </form>
                </section>
                <h3>BUSINESS DETAILS</h3>
                <section>
                  <div id="business_details">
                    {{--                                            <div class="row">--}}
                    {{--                                                <div class="col-12">--}}
                    {{--                                                    <a href="javascript:void(0);" class="btn btn-outline-primary mb-2 float-right add_business_details" type="button">Add</a>--}}
                    {{--                                                </div>--}}
                    {{--                                            </div>--}}
                    {{--                                            <div class="business_details_row">--}}

                    {{--                                            </div>--}}
                    <div class="business_details_clone_row">
                      @foreach($finance->business as $kwy=>$value)
                      <form class="business_detail_form">
                        <div class="form-group row  mb-4">
                          <div class="col-12">
                            <a href="javascript:void(0);"
                              class="btn btn-outline-danger mb-2 float-right remove_business_details_btn d-block"
                              type="button">Remove</a>
                          </div>
                        </div>
                        <div class="form-group row  mb-4">
                          <label for="business_name" class="col-sm-4 col-form-label col-form-label-sm">Name
                            of
                            Firm</label>
                          <div class="col-sm-8">
                            <input type="text" name="business_name" class="form-control form-control-sm"
                              id="business_name" placeholder="Name of Firm" required
                              value="{{ $value->business_name }}">
                          </div>
                        </div>
                        <div class="form-group row  mb-4">
                          <label for="business_started_date" class="col-sm-4 col-form-label col-form-label-sm">Started
                            on</label>
                          <div class="col-sm-8">
                            <input type="date" name="business_started_date" class="form-control form-control-sm"
                              id="business_started_date" placeholder="Started on" required
                              value="{{ $value->business_started_date }}">
                          </div>
                        </div>
                        <div class="form-group row  mb-4">
                          <label for="business_type" class="col-sm-4 col-form-label col-form-label-sm">Type</label>
                          <div class="col-sm-8">
                            <select class="form-control form-control-sm business_type" name="business_type">
                              <option value="Proprietorship">Proprietorship
                              </option>
                              <option value="Partnership">Partnership</option>
                              <option value="LLP">LLP</option>
                              <option value="Pvt. Ltd.">Pvt. Ltd.</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group promoter_name_row d-none row  mb-4">
                          <label for="business_nature" class="col-sm-4 col-form-label col-form-label-sm">Main
                            Promoter
                            Name</label>
                          <div class="col-sm-8">
                            <input type="text" name="promoter_name" class="form-control form-control-sm"
                              id="promoter_name" placeholder="Main Promoter Name" value="{{ $value->promoter_name }}">
                          </div>
                        </div>
                        <div class="form-group row  mb-4">
                          <label for="business_nature" class="col-sm-4 col-form-label col-form-label-sm">Nature
                            /
                            Activity</label>
                          <div class="col-sm-8">
                            <input type="text" name="business_nature" class="form-control form-control-sm"
                              id="business_nature" placeholder="Nature / Activity"
                              value="{{ $value->business_nature }}">
                          </div>
                        </div>
                        <div class="form-group row  mb-4">
                          <label for="business_monthly_income" class="col-sm-4 col-form-label col-form-label-sm">Monthly
                            Income</label>
                          <div class="col-sm-8">
                            <input type="text" name="business_monthly_income" class="form-control form-control-sm"
                              id="business_monthly_income" placeholder="Monthly Income"
                              value="{{ $value->business_monthly_income }}">
                          </div>
                        </div>
                        <div class="form-group row  mb-4">
                          <label for="total_no_machines" class="col-sm-4 col-form-label col-form-label-sm">Total
                            no. of
                            Machines</label>
                          <div class="col-sm-8">
                            <input type="text" name="total_no_machines" class="form-control form-control-sm"
                              id="total_no_machines" placeholder="Total No. of Machines"
                              value="{{ $value->total_no_machines }}">
                          </div>
                        </div>
                        <div class="form-group row  mb-4">
                          <label for="total_no_employees" class="col-sm-4 col-form-label col-form-label-sm">Total
                            no. of
                            Employees</label>
                          <div class="col-sm-8">
                            <input type="text" name="total_no_employees" class="form-control form-control-sm"
                              id="total_no_employees" placeholder="Total No. of Employees"
                              value="{{ $value->total_no_employees }}">
                          </div>
                        </div>
                        <div class="form-group row  mb-4">
                          <label for="monthly_turnover" class="col-sm-4 col-form-label col-form-label-sm">Turnover
                            (Monthly)</label>
                          <div class="col-sm-8">
                            <input type="text" name="monthly_turnover" class="form-control form-control-sm"
                              id="monthly_turnover" placeholder="Turnover (Monthly)"
                              value="{{ $value->monthly_turnover }}">
                          </div>
                        </div>
                        <div class="form-group row  mb-4">
                          <label for="business_location" class="col-sm-4 col-form-label col-form-label-sm">Location
                            /
                            Address</label>
                          <div class="col-sm-8">
                            <input type="text" name="business_location" class="form-control form-control-sm"
                              id="business_location" placeholder="Location / Address"
                              value="{{ $value->business_location }}">
                          </div>
                        </div>
                        <div class="form-group row  mb-4">
                          <label for="business_location_type"
                            class="col-sm-4 col-form-label col-form-label-sm">Ownership
                            Type</label>
                          <div class="col-sm-8">
                            <select class="form-control form-control-sm business_location_type"
                              name="business_location_type">
                              <option value="Own">Own</option>
                              <option value="Rented">Rented</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row  mb-4">
                          <label for="business_duration_place"
                            class="col-sm-4 col-form-label col-form-label-sm">Duration
                            at that place:</label>
                          <div class="col-sm-8">
                            <input type="text" name="business_duration_place" class="form-control form-control-sm"
                              id="business_duration_place" placeholder="Duration at that place:"
                              value="{{ $value->business_duration_place }}">
                          </div>
                        </div>
                      </form>
                      @endforeach
                    </div>
                  </div>
                </section>
                <h3>RESIDENCE DETAILS</h3>
                <section>
                  <form id="residence-detail">
                    <div class="form-group row  mb-4">
                      <label for="home_address" class="col-sm-4 col-form-label col-form-label-sm">Location /
                        Address</label>
                      <div class="col-sm-8">
                        <input type="text" name="home_address" class="form-control form-control-sm" id="home_address"
                          placeholder="Location / Address" value="{{ $finance->home_address }}">
                      </div>
                    </div>
                    <div class="form-group row  mb-4">
                      <label for="home_type" class="col-sm-4 col-form-label col-form-label-sm">Location
                        Type</label>
                      <div class="col-sm-8">
                        <select class="form-control form-control-sm home_type" name="home_type">
                          <option value="Own" selected="{{ $finance->home_type==="Own"?'selected':'' }}">
                            Own
                          </option>
                          <option value="Rented" selected="{{ $finance->home_type==="Rented"?'selected':'' }}">
                            Rented
                          </option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row  mb-4">
                      <label for="home_duration_place" class="col-sm-4 col-form-label col-form-label-sm">Duration at
                        that place:</label>
                      <div class="col-sm-8">
                        <input type="text" name="home_duration_place" class="form-control form-control-sm"
                          id="home_duration_place" placeholder="Duration at that place:"
                          value="{{ $finance->home_duration_place }}">
                      </div>
                    </div>
                  </form>
                </section>
                <h3>BANKING & FINANCE</h3>
                <section>
                  {{--                                            <div class="row">--}}
                  {{--                                                <div class="col-12">--}}
                  {{--                                                    <a href="javascript:void(0);" class="btn btn-outline-primary mb-2 float-right add_banking_finance" type="button">Add</a>--}}
                  {{--                                                </div>--}}
                  {{--                                            </div>--}}
                  {{--                                            <div class="banking_finance_row">--}}
                  {{--                                                --}}
                  {{--                                            </div>--}}
                  <div class="banking_finance_clone_row">
                    @foreach($finance->financeBanking as $key=>$value)
                    <form class="banking_finance_form">
                      <div class="form-group row  mb-4">
                        <div class="col-12">
                          <a href="javascript:void(0);"
                            class="btn btn-outline-danger mb-2 float-right remove_banking_finance_btn d-block"
                            type="button">Remove</a>
                        </div>
                      </div>
                      <div class="form-group row  mb-4">
                        <label for="previous_lona_type" class="col-sm-4 col-form-label col-form-label-sm">Type</label>
                        <div class="col-sm-8">
                          <select name="previous_lona_type" class="form-control form-control-sm previous_lona_type">
                            <option value="1" selected={{ $value->previous_lona_type==='1'?"selected":'selected' }}>
                              Home
                              Loan
                            </option>
                            <option value="2" selected={{ $value->previous_lona_type==='2'?"selected":'selected' }}>
                              Personal Loan
                            </option>
                            <option value="3" selected={{ $value->previous_lona_type==='3'?"selected":'selected' }}>
                              Business Loan
                            </option>
                            <option value="4" selected={{ $value->previous_lona_type==='4'?"selected":'selected' }}>
                              Machinary Loan
                            </option>
                            <option value="5" selected={{ $value->previous_lona_type==='5'?"selected":'selected' }}>
                              Vehicle Loan
                            </option>
                            <option value="6" selected={{ $value->previous_lona_type==='6'?"selected":'selected' }}>
                              Gold
                              Loan
                            </option>
                            <option value="7" selected={{ $value->previous_lona_type==='7'?"selected":'selected' }}>
                              CC
                              Loan
                            </option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row  mb-4">
                        <label for="bank_name" class="col-sm-4 col-form-label col-form-label-sm">Bank</label>
                        <div class="col-sm-8">
                          <input type="text" name="bank_name" class="form-control form-control-sm" id="bank_name"
                            placeholder="Bank" required value="{{ $value->bank_name }}">
                        </div>
                      </div>
                      <div class="form-group row  mb-4">
                        <label for="bank_branch" class="col-sm-4 col-form-label col-form-label-sm">Branch</label>
                        <div class="col-sm-8">
                          <input type="text" name="bank_branch" class="form-control form-control-sm" id="bank_branch"
                            placeholder="Branch" value="{{ $value->bank_branch }}">
                        </div>
                      </div>
                      <div class="form-group row  mb-4">
                        <label for="loan_amount" class="col-sm-4 col-form-label col-form-label-sm">Loan
                          Amount</label>
                        <div class="col-sm-8">
                          <input type="text" name="loan_amount" class="form-control form-control-sm" id="loan_amount"
                            placeholder="Loan Amount" value="{{ $value->loan_amount }}">
                        </div>
                      </div>
                      <div class="form-group row  mb-4">
                        <label for="emi_amount" class="col-sm-4 col-form-label col-form-label-sm">EMI
                          Amount</label>
                        <div class="col-sm-8">
                          <input type="text" name="emi_amount" class="form-control form-control-sm" id="emi_amount"
                            placeholder="EMI Amount" value="{{ $value->emi_amount }}">
                        </div>
                      </div>
                      <div class="form-group row  mb-4">
                        <label for="bank_balance" class="col-sm-4 col-form-label col-form-label-sm">Outstanding
                          Amount</label>
                        <div class="col-sm-8">
                          <input type="text" name="bank_balance" class="form-control form-control-sm" id="bank_balance"
                            placeholder="Balance Amount" value="{{ $value->bank_balance }}">
                        </div>
                      </div>
                      <div class="form-group row  mb-4">
                        <label for="duration" class="col-sm-4 col-form-label col-form-label-sm">Duration</label>
                        <div class="col-sm-8">
                          <input type="text" name="duration" class="form-control form-control-sm" id="duration"
                            placeholder="Duration" value="{{ $value->duration }}">
                        </div>
                      </div>
                    </form>
                    @endforeach
                  </div>
                  <hr style="border-top:1px solid #3b3f5c;" />
                  <div class="row">
                    <div class="col-12">
                      {{--                                                    <a href="javascript:void(0);" class="btn btn-outline-primary mb-2 float-right add_current_ac_btn" type="button">Add Current Account</a>--}}
                      {{--                                                    <a href="javascript:void(0);" class="btn btn-outline-primary mb-2 float-right add_saving_ac_btn mr-2" type="button">Add Saving Account</a>--}}
                    </div>
                  </div>
                  <div class="saving_ac_row">
                    @foreach($finance->savingBanking as $value)
                    <form class="saving_ac_bank_form">
                      <div class="form-group row  mb-4">
                        <div class="col-12">
                          <a href="javascript:void(0);"
                            class="btn btn-outline-danger mb-2 float-right remove_saving_ac_btn d-block"
                            type="button">Remove</a>
                        </div>
                      </div>
                      <div class="form-group row  mb-4">
                        <label for="saving_ac_bank " class="col-sm-4 col-form-label col-form-label-sm">Savings
                          Account
                          Bank</label>
                        <div class="col-sm-8">
                          <input type="text" name="saving_ac_bank" class="form-control form-control-sm"
                            id="saving_ac_bank" placeholder="Savings Account Bank" value="{{ $value->bank_name }}">
                        </div>
                      </div>
                      <div class="form-group row  mb-4">
                        <label for="saving_ac_branch" class="col-sm-4 col-form-label col-form-label-sm">Savings
                          Account
                          Branch</label>
                        <div class="col-sm-8">
                          <input type="text" name="saving_ac_branch" class="form-control form-control-sm"
                            id="saving_ac_branch" placeholder="Savings Account Branch"
                            value="{{ $value->branch_name }}">
                        </div>
                      </div>
                    </form>
                    @endforeach

                  </div>
                  <div class="saving_ac_clone_row"></div>
                  <div class="current_account_row">
                    @foreach($finance->currentBanking as $value)
                    <form class="current_ac_bank_form">
                      <div class="form-group row  mb-4">
                        <div class="col-12">
                          <a href="javascript:void(0);"
                            class="btn btn-outline-danger mb-2 float-right remove_current_ac_btn d-block"
                            type="button">Remove</a>
                        </div>
                      </div>
                      <div class="form-group row  mb-4">
                        <label for="current_ac_bank" class="col-sm-4 col-form-label col-form-label-sm">Current
                          Account
                          Bank</label>
                        <div class="col-sm-8">
                          <input type="text" name="current_ac_bank" class="form-control form-control-sm"
                            id="current_ac_bank" placeholder="Current Account Bank" value="{{ $value->bank_name }}">
                        </div>
                      </div>
                      <div class="form-group row  mb-4">
                        <label for="current_ac_branch" class="col-sm-4 col-form-label col-form-label-sm">Current
                          Account
                          Branch</label>
                        <div class="col-sm-8">
                          <input type="text" name="current_ac_branch" class="form-control form-control-sm"
                            id="current_ac_branch" placeholder="Current Account Branch"
                            value="{{ $value->branch_name }}">
                        </div>
                      </div>
                    </form>
                    @endforeach
                  </div>
                  <div class="current_account_clone_row"></div>
                </section>
                <h3>GUARANTOR DETAILS</h3>
                <section>
                  <div class="form-group row  mb-4">
                    <div class="col-12">
                      {{--                                                <a href="javascript:void(0);" class="btn btn-outline-primary mb-2 float-right add_gaurantor" type="button">Add</a>--}}
                      <!-- <a href="javascript:void(0);" class="btn btn-outline-danger mb-2 float-right remove_gaurantor d-none" type="button">Remove</a> -->

                    </div>
                  </div>
                  <div class="guarantor_section">
                    @php $guarantor_detail = json_decode($finance->guarantor_detail); @endphp
                    @if(!empty($guarantor_detail))
                    @foreach($guarantor_detail as $value)
                    <form class="guarantor_section_form">
                      <div class="form-group row  mb-4">
                        <div class="col-12">
                          <a href="javascript:void(0);"
                            class="btn btn-outline-danger mb-2 float-right remove_gaurantor d-block"
                            type="button">Remove</a>
                        </div>
                      </div>
                      <div class="form-group row  mb-4">
                        <label for="guarantor_name" class="col-sm-4 col-form-label col-form-label-sm">Name
                          of
                          Person</label>
                        <div class="col-sm-8">
                          <input type="text" name="guarantor_name" class="form-control form-control-sm"
                            id="guarantor_name" placeholder="Name of Person" value="{{ $value->guarantor_firm }}">
                        </div>
                      </div>
                      <div class="form-group row  mb-4">
                        <label for="guarantor_firm" class="col-sm-4 col-form-label col-form-label-sm">Name
                          of
                          Firm</label>
                        <div class="col-sm-8">
                          <input type="text" name="guarantor_firm" class="form-control form-control-sm"
                            id="guarantor_firm" placeholder="Name of Firm" value="{{ $value->guarantor_firm }}">
                        </div>
                      </div>
                      <div class="form-group row  mb-4">
                        <label for="guarantor_firm_nature" class="col-sm-4 col-form-label col-form-label-sm">Nature
                          /Activity of Firm</label>
                        <div class="col-sm-8">
                          <input type="text" name="guarantor_firm_nature" class="form-control form-control-sm"
                            id="guarantor_firm_nature" placeholder="Nature /Activity of Firm"
                            value="{{ $value->guarantor_firm_nature }}">
                        </div>
                      </div>
                      <div class="form-group row  mb-4">
                        <label for="guarantor_address" class="col-sm-4 col-form-label col-form-label-sm">Location
                          /
                          Address</label>
                        <div class="col-sm-8">
                          <input type="text" name="guarantor_address" class="form-control form-control-sm"
                            id="guarantor_address" placeholder="Location / Address"
                            value="{{ $value->guarantor_address }}">
                        </div>
                      </div>
                      <div class="form-group row  mb-4">
                        <label for="guarantor_affiliate_vc" class="col-sm-4 col-form-label col-form-label-sm">Affliated
                          to Vision Capital</label>
                        <div class="col-sm-8">
                          <select class="form-control form-control-sm guarantor_affiliate_vc"
                            name="guarantor_affiliate_vc" >

                            <option value="1" selected="{{ $value->guarantor_affiliate_vc==='1'?'selected':'' }}">
                              Yes
                            </option>
                            <option value="0" selected="{{ $value->guarantor_affiliate_vc==='0'?'selected':'' }}">
                              No
                            </option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row  mb-4 d-none affiliate_type">
                        <label for="guarantor_affiliate_type" class="col-sm-4 col-form-label col-form-label-sm">Select
                          Affliated Type</label>
                        <div class="col-sm-8">
                          <select class="form-control form-control-sm guarantor_affiliate_type"
                            name="guarantor_affiliate_type[]" id="guarantor_affiliate_type" multiple="multiple">
                            <option value="Loan">Loan</option>
                            <option value="Subsidy">Subsidy</option>
                            <option value="Finance">Finance</option>
                            <option value="VC">VC</option>
                            <option value="Other">Other (Specify)</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row  mb-4 d-none guarantor_specify">
                        <label for="guarantor_affiliate_type_other"
                          class="col-sm-4 col-form-label col-form-label-sm">Specify
                          here</label>
                        <div class="col-sm-8">
                          <input type="text" name="guarantor_affiliate_type_other" class="form-control form-control-sm"
                            id="guarantor_affiliate_type_other" placeholder="Other"
                            value="{{ $value->guarantor_affiliate_type_other }}">
                        </div>
                      </div>
                      <hr style="border-top:1px solid #3b3f5c;" />
                    </form>
                    @endforeach
                    @endif
                  </div>
                  <div class="guarantor_section_clone"></div>
                </section>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!--  END CONTENT AREA  -->
@endsection

@push('style')
<!--  BEGIN CUSTOM STYLE FILE  -->
<link href="{{ asset('assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/jquery-step/jquery.steps.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.min.css') }}">
<style>
#formValidate .wizard>.content {
  min-height: 25em;
}

#example-vertical.wizard>.content {
  min-height: 24.5em;
}

label,
input,
button {
  border: 0;
  margin-bottom: 3px;
  display: block;
  width: 100%;
}
</style>
@endpush

@push('script')
<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
<!-- BEGIN PAGE LEVEL SCRIPTS -->

<script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
<script src="{{ asset('plugins/select2/custom-select2.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // $("#ref_affiliate_type").select2({
        //     tags: true,
        //     templateSelection: formatState
        // });
        //
        // $("#guarantor_affiliate_type").select2({
        //     tags: true,
        //     templateSelection: formatState
        // });

        $('.add_gaurantor').on('click', function() {
            var section = $('.guarantor_section').clone();
            $(this).addClass('d-none');
            $('.remove_gaurantor').removeClass('d-none');
            $('.guarantor_section_clone').html(section);
        });
        $('.remove_gaurantor').on('click', function() {
            $(this).addClass('d-none');
            $('.add_gaurantor').removeClass('d-none');
            $('.guarantor_section_clone').html('');
        });

        $(document).on('change', '.ref_affiliate_vc', function() {
            if ($(this).val() == 'No') {
                $('.select_affiliate_type').addClass('d-none');
                $('.specify').addClass('d-none');
            } else {
                $('.select_affiliate_type').removeClass('d-none');
            }
        });
        $(document).on('change', '.ref_affiliate_type', function() {
            var ref_values = $(this).val();
            var search = $.inArray('Other', ref_values);
            if (search == -1) {
                $('.specify').addClass('d-none');
            } else {
                $('.specify').removeClass('d-none');
            }
        });
        $('.bor_affiliate_vc').change(function() {
            if ($(this).val() == 0) {
                $('.bor_select_affiliate_type').addClass('d-none');
                $('.bor_specify').addClass('d-none');
            } else {
                $('.bor_select_affiliate_type').removeClass('d-none');
            }
        });
        $('.bor_affiliate_type').change(function() {
            if ($(this).val() == 'Other') {
                $('.bor_specify').removeClass('d-none');
            } else {
                $('.bor_specify').addClass('d-none');
            }
        });

        $(document).on('change', '.guarantor_affiliate_vc',function() {
            if ($(this).val() == '0') {
                $('.affiliate_type').addClass('d-none');
                $('.guarantor_specify').addClass('d-none');
            } else {
                $('.affiliate_type').removeClass('d-none');
            }
        });
        $('.guarantor_affiliate_type').change(function() {
            var gua_values = $(this).val();
            var gua_search = $.inArray('Other', gua_values);
            if (gua_search == -1) {
                $('.guarantor_specify').addClass('d-none');
            } else {
                $('.guarantor_specify').removeClass('d-none');
            }
        });
        var f1 = flatpickr(document.getElementById('bor_dob'));
        var f2 = flatpickr(document.getElementById('business_started_date'));

        $('.managment_review_select').change(function() {
            if ($(this).val() == 1) {
                $('.management_review_text_row').removeClass('d-none');
            } else {
                $('.visit_review_select').addClass('d-none');
                $('.management_review_text_row').addClass('d-none');
            }
        });
        $('.visit_select').change(function() {
            if ($(this).val() == 1) {
                $('.visit_text_row').removeClass('d-none');
                $('.visit_review_row').removeClass('d-none');
                $('.visit_review_select').removeClass('d-none');
                // $('.document_row').removeClass('d-none');
            } else {
                $('.visit_review_row').addClass('d-none');
                $('.visit_review_select').removeClass('d-none');
                // $('.document_row').addClass('d-none');
            }
        });
        $('.visit_review_select').change(function() {
            if ($(this).val() == 1) {
                $('.visit_review_text_row').removeClass('d-none');
                $('.attend_by_row').removeClass('d-none');
                $('.document_row').removeClass('d-none');
            } else {
                $('.visit_review_text_row').addClass('d-none');
                $('.attend_by_row').addClass('d-none');
                $('.document_row').addClass('d-none');
            }
        });

        $('.document_select').change(function() {
            if ($(this).val() == 1) {
                // $('.client_document_row').removeClass('d-none');
                $('.document_review_row').removeClass('d-none');
                $('.client_document_row').removeClass('d-none');
                $('.document_review_text_row').removeClass('d-none');
                $('.client_document_text_row').removeClass('d-none');
            } else {
                // $('.gaurantor_document_text_row').addClass('d-none');
                $('.document_review_row').addClass('d-none');
                // $('.client_document_row').addClass('d-none');
                $('.document_review_text_row').addClass('d-none');
                $('.gaurantor_document_text_row').addClass('d-none');
                $('.client_document_text_row').addClass('d-none');
                $('.client_document_row').addClass('d-none');
            }
        });
        $('.client_document_select').change(function() {
            if ($(this).val() == 1) {
                $('.client_document_text_row').removeClass('d-none');
                $('.gaurantor_document_text_row').addClass('d-none');
            } else if ($(this).val() == 0) {
                $('.gaurantor_document_text_row').removeClass('d-none');
                $('.client_document_text_row').addClass('d-none');
            }
        });

        $('.cibil_socre_required_type').change(function() {
            if ($(this).val() == 1) {
                $('.cibil_score_row').removeClass('d-none');
                $('.mgmt_review_row').removeClass('d-none');
            } else {
                $('.cibil_score_row').addClass('d-none');
                $('.mgmt_review_row').addClass('d-none');
            }
        });
        $('.managment_review_select').change(function() {
            if ($(this).val() == 1) {
                $('.cibil_score_management_review_text_row').removeClass('d-none');
                $('.attend_by_row').removeClass('d-none');
                $('.visit_row').removeClass('d-none');
            } else {
                $('.cibil_score_management_review_text_row').addClass('d-none');
                $('.attend_by_row').addClass('d-none');
                $('.visit_row').addClass('d-none');
            }
        });

        $("#pill-vertical-edit").steps({
            enableAllSteps: 1,
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            cssClass: 'pills wizard',
            titleTemplate: '#title#',
            stepsOrientation: "vertical",
            onStepChanging: function(event, currentIndex, newIndex) {
                if (currentIndex > newIndex) {

                    return true;
                }

                var status = false;

                switch (currentIndex) {
                    case 0:
                        return referranceDetailForm(currentIndex);
                    case 1:
                        return borrowerDetailForm(currentIndex)
                    case 2:
                        return businessBakingForm(currentIndex)
                    case 3:
                        return residenceDetailForm(currentIndex);
                    case 4:
                        return financeBakingForm(currentIndex);
                    case 5:
                        return guarantorDetailsForm(currentIndex);
                        break;

                }
                console.log(status)
                return status;
            },
            onFinished: function(event, currentIndex) {
                var status = guarantorDetailsForm(currentIndex);
                if (status) {
                    window.location.href = base_url + 'application';
                }
            }
        });
    });
</script>
<script src="{{ asset('assets/js/scrollspyNav.js') }}"></script>
<script src="{{ asset('plugins/jquery-step/jquery.steps.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-step/custom-jquery.steps.js') }}"></script>
<script src="{{ asset('plugins/input-mask/input-mask.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.bundle.min.js') }}"></script>

<!-- END PAGE LEVEL SCRIPTS -->
@endpush
