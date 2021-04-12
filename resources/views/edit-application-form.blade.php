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
                                <div id="pill-vertical">
                                    <h3>REFERENCE</h3>
                                    <section>
                                        <form class="referrance-finance-detail">
                                            <div class="form-group row  mb-4">
                                                <label for="ref_name" class="col-sm-4 col-form-label col-form-label-sm">Name of Person</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="ref_name" class="form-control form-control-sm" id="ref_name" placeholder="Name of Person" value="{{ $finance->ref_name }}">
                                                </div>
                                            </div>
                                            <div class="form-group row  mb-4">
                                                <label for="ref_firm" class="col-sm-4 col-form-label col-form-label-sm">Name of Firm</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="ref_firm" class="form-control form-control-sm" id="ref_firm" placeholder="Name of Firm" value="{{ $finance->ref_firm }}">
                                                </div>
                                            </div>
                                            <div class="form-group row  mb-4">
                                                <label for="ref_contact" class="col-sm-4 col-form-label col-form-label-sm">Mobile No</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="ref_contact" class="form-control form-control-sm" id="ref_contact" placeholder="Mobile No" value="{{ $finance->ref_contact }}">
                                                </div>
                                            </div>
                                            <div class="form-group row  mb-4">
                                                <label for="ref_affiliate_vc" class="col-sm-4 col-form-label col-form-label-sm">Affliated to Vision Capital</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm ref_affiliate_vc" name="ref_affiliate_vc">
                                                        <option value="Yes" {{ $finance->ref_affiliate_vc==="Yes"?"selected='selected'":"" }}>Yes</option>
                                                        <option value="No" {{ $finance->ref_affiliate_vc==="No"?"selected='selected'":"" }}>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row  mb-4 d-none select_affiliate_type">
                                                <label for="ref_affiliate_type" class="col-sm-4 col-form-label col-form-label-sm">Select Affliated Type</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm ref_affiliate_type" name="ref_affiliate_type">
                                                        <option value="Loan">Loan</option>
                                                        <option value="Subsidy">Subsidy</option>
                                                        <option value="Finance">Finance</option>
                                                        <option value="VC">VC</option>
                                                        <option value="Other">Other (Specify)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row  mb-4 d-none specify">
                                                <label for="ref_affiliate_type_other" class="col-sm-4 col-form-label col-form-label-sm">Specify here</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="ref_affiliate_type_other" class="form-control form-control-sm" id="ref_affiliate_type_other" placeholder="Other" value="{{ $finance->ref_affiliate_type_other }}">
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
                                                    <input type="text" name="bor_name" class="form-control form-control-sm" id="bor_name" placeholder="Name" value="{{ $finance->bor_name }}">
                                                </div>
                                            </div>
                                            <div class="form-group row  mb-4">
                                                <label for="bor_amount" class="col-sm-4 col-form-label col-form-label-sm">Amount Required</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="bor_amount" class="form-control form-control-sm" id="bor_amount" placeholder="Amount Required" value="{{ $finance->bor_amount }}">
                                                </div>
                                            </div>
                                            <div class="form-group row  mb-4">
                                                <label for="bor_time_limit" class="col-sm-4 col-form-label col-form-label-sm">Time Limit</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="bor_time_limit" class="form-control form-control-sm" id="bor_time_limit" placeholder="Time Limit" value="{{ $finance->bor_time_limit }}">
                                                </div>
                                            </div>
                                            <div class="form-group row  mb-4">
                                                <label for="bor_purpose" class="col-sm-4 col-form-label col-form-label-sm">Purpose</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="bor_purpose" class="form-control form-control-sm" id="bor_purpose" placeholder="Purpose" value="{{ $finance->bor_purpose }}">
                                                </div>
                                            </div>
                                            <div class="form-group row  mb-4">
                                                <label for="bor_affiliate_vc" class="col-sm-4 col-form-label col-form-label-sm">Affliated to Vision Capital</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm bor_affiliate_vc" name="bor_affiliate_vc">
                                                        <option value="Yes" {{ $finance->bor_affiliate_vc==='Yes'?'selected="selected"':'' }}>Yes</option>
                                                        <option value="No" {{ $finance->bor_affiliate_vc==='No'?'selected="selected"':'' }}>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row  mb-4 d-none bor_select_affiliate_type">
                                                <label for="bor_affiliate_type" class="col-sm-4 col-form-label col-form-label-sm">Select Affliated Type</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm bor_affiliate_type" name="bor_affiliate_type">
                                                        <option value="Loan" {{ $finance->bor_affiliate_type==='Loan'?'selected="selected"':'' }}>Loan</option>
                                                        <option value="Subsidy" {{ $finance->bor_affiliate_type==='Subsidy'?'selected="selected"':'' }}>Subsidy</option>
                                                        <option value="Finance" {{ $finance->bor_affiliate_type==='Finance'?'selected="selected"':'' }}>Finance</option>
                                                        <option value="VC" {{ $finance->bor_affiliate_type==='VC'?'selected="selected"':'' }}>VC</option>
                                                        <option value="Other" {{ $finance->bor_affiliate_type==='Other'?'selected="selected"':'' }}>Other (Specify)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row  mb-4 d-none bor_specify">
                                                <label for="bor_affiliate_type_other" class="col-sm-4 col-form-label col-form-label-sm">Specify here</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="bor_affiliate_type_other" class="form-control form-control-sm" id="bor_affiliate_type_other" placeholder="Other" value="{{ $finance->bor_affiliate_type_other }}">
                                                </div>
                                            </div>
                                            <div class="form-group row  mb-4">
                                                <label for="bor_pan_no" class="col-sm-4 col-form-label col-form-label-sm">PAN No.</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="bor_pan_no" class="form-control form-control-sm" id="bor_pan_no" placeholder="PAN No." value="{{ $finance->bor_pan_no }}">
                                                </div>
                                            </div>
                                            <div class="form-group row  mb-4">
                                                <label for="bor_aadhar_no" class="col-sm-4 col-form-label col-form-label-sm">Adhar No.</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="bor_aadhar_no" data-type="adhaar-number" class="form-control form-control-sm" id="bor_aadhar_no" placeholder="Adhar No." value="{{ $finance->bor_aadhar_no }}">
                                                </div>
                                            </div>
                                            <div class="form-group row  mb-4">
                                                <label for="bor_pin_code" class="col-sm-4 col-form-label col-form-label-sm">PIN Code</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="bor_pin_code" class="form-control form-control-sm" id="bor_pin_code" placeholder="PIN Code" value="{{ $finance->bor_pin_code }}">
                                                </div>
                                            </div>
                                            <div class="form-group row  mb-4">
                                                <label for="bor_dob" class="col-sm-4 col-form-label col-form-label-sm">Date of Birth</label>
                                                <div class="col-sm-8">
                                                    <input type="date" name="bor_dob" class="form-control form-control-sm" id="bor_dob" placeholder="Date of Birth" value="{{ $finance->bor_dob }}">
                                                </div>
                                            </div>
                                        </form>
                                    </section>
                                    <h3>BUSINESS DETAILS</h3>
                                    <section>
                                        <div id="business_details">
                                            <div class="row">
                                                <div class="col-12">
                                                    <a href="javascript:void(0);" class="btn btn-outline-primary mb-2 float-right add_business_details" type="button">Add</a>
                                                </div>
                                            </div>
                                            <div class="business_details_row">
                                                <form class="business_detail_form">
                                                    <div class="form-group row  mb-4">
                                                        <div class="col-12">
                                                            <a href="javascript:void(0);" class="btn btn-outline-danger mb-2 float-right remove_business_details_btn d-none" type="button">Remove</a>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row  mb-4">
                                                        <label for="business_name" class="col-sm-4 col-form-label col-form-label-sm">Name of Firm</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="business_name" class="form-control form-control-sm" id="business_name" placeholder="Name of Firm" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row  mb-4">
                                                        <label for="business_started_date" class="col-sm-4 col-form-label col-form-label-sm">Started on</label>
                                                        <div class="col-sm-8">
                                                            <input type="date" name="business_started_date" class="form-control form-control-sm" id="business_started_date" placeholder="Started on" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row  mb-4">
                                                        <label for="business_type" class="col-sm-4 col-form-label col-form-label-sm">Type</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control form-control-sm business_type" name="business_type" >
                                                                <option value="Proprietorship">Proprietorship</option>
                                                                <option value="Partnership">Partnership</option>
                                                                <option value="LLP">LLP</option>
                                                                <option value="Pvt. Ltd.">Pvt. Ltd.</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group promoter_name_row d-none row  mb-4">
                                                        <label for="business_nature" class="col-sm-4 col-form-label col-form-label-sm">Main Promoter Name</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="promoter_name" class="form-control form-control-sm" id="promoter_name" placeholder="Main Promoter Name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row  mb-4">
                                                        <label for="business_nature" class="col-sm-4 col-form-label col-form-label-sm">Nature / Activity</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="business_nature" class="form-control form-control-sm" id="business_nature" placeholder="Nature / Activity">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row  mb-4">
                                                        <label for="business_monthly_income" class="col-sm-4 col-form-label col-form-label-sm">Monthly Income</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="business_monthly_income" class="form-control form-control-sm" id="business_monthly_income" placeholder="Monthly Income">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row  mb-4">
                                                        <label for="total_no_machines" class="col-sm-4 col-form-label col-form-label-sm">Total no. of Machines</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="total_no_machines" class="form-control form-control-sm" id="total_no_machines" placeholder="Total No. of Machines">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row  mb-4">
                                                        <label for="total_no_employees" class="col-sm-4 col-form-label col-form-label-sm">Total no. of Employees</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="total_no_employees" class="form-control form-control-sm" id="total_no_employees" placeholder="Total No. of Employees">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row  mb-4">
                                                        <label for="monthly_turnover" class="col-sm-4 col-form-label col-form-label-sm">Turnover (Monthly)</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="monthly_turnover" class="form-control form-control-sm" id="monthly_turnover" placeholder="Turnover (Monthly)">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row  mb-4">
                                                        <label for="business_location" class="col-sm-4 col-form-label col-form-label-sm">Location / Address</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="business_location" class="form-control form-control-sm" id="business_location" placeholder="Location / Address">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row  mb-4">
                                                        <label for="business_location_type" class="col-sm-4 col-form-label col-form-label-sm">Ownership Type</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control form-control-sm business_location_type" name="business_location_type">
                                                                <option value="Own">Own</option>
                                                                <option value="Rented">Rented</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row  mb-4">
                                                        <label for="business_duration_place" class="col-sm-4 col-form-label col-form-label-sm">Duration at that place:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="business_duration_place" class="form-control form-control-sm" id="business_duration_place" placeholder="Duration at that place:">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="business_details_clone_row">
                                                @foreach($finance->business as $kwy=>$value)
                                                    <form class="business_detail_form">
                                                        <div class="form-group row  mb-4">
                                                            <div class="col-12">
                                                                <a href="javascript:void(0);" class="btn btn-outline-danger mb-2 float-right remove_business_details_btn d-block" type="button">Remove</a>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row  mb-4">
                                                            <label for="business_name" class="col-sm-4 col-form-label col-form-label-sm">Name of Firm</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="business_name" class="form-control form-control-sm" id="business_name" placeholder="Name of Firm" required value="{{ $value->business_name }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row  mb-4">
                                                            <label for="business_started_date" class="col-sm-4 col-form-label col-form-label-sm">Started on</label>
                                                            <div class="col-sm-8">
                                                                <input type="date" name="business_started_date" class="form-control form-control-sm" id="business_started_date" placeholder="Started on" required value="{{ $value->business_started_date }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row  mb-4">
                                                            <label for="business_type" class="col-sm-4 col-form-label col-form-label-sm">Type</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control form-control-sm business_type" name="business_type" >
                                                                    <option value="Proprietorship">Proprietorship</option>
                                                                    <option value="Partnership">Partnership</option>
                                                                    <option value="LLP">LLP</option>
                                                                    <option value="Pvt. Ltd.">Pvt. Ltd.</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group promoter_name_row d-none row  mb-4">
                                                            <label for="business_nature" class="col-sm-4 col-form-label col-form-label-sm">Main Promoter Name</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="promoter_name" class="form-control form-control-sm" id="promoter_name" placeholder="Main Promoter Name" value="{{ $value->promoter_name }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row  mb-4">
                                                            <label for="business_nature" class="col-sm-4 col-form-label col-form-label-sm">Nature / Activity</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="business_nature" class="form-control form-control-sm" id="business_nature" placeholder="Nature / Activity" value="{{ $value->business_nature }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row  mb-4">
                                                            <label for="business_monthly_income" class="col-sm-4 col-form-label col-form-label-sm">Monthly Income</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="business_monthly_income" class="form-control form-control-sm" id="business_monthly_income" placeholder="Monthly Income" value="{{ $value->business_monthly_income }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row  mb-4">
                                                            <label for="total_no_machines" class="col-sm-4 col-form-label col-form-label-sm">Total no. of Machines</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="total_no_machines" class="form-control form-control-sm" id="total_no_machines" placeholder="Total No. of Machines" value="{{ $value->total_no_machines }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row  mb-4">
                                                            <label for="total_no_employees" class="col-sm-4 col-form-label col-form-label-sm">Total no. of Employees</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="total_no_employees" class="form-control form-control-sm" id="total_no_employees" placeholder="Total No. of Employees" value="{{ $value->total_no_employees }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row  mb-4">
                                                            <label for="monthly_turnover" class="col-sm-4 col-form-label col-form-label-sm">Turnover (Monthly)</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="monthly_turnover" class="form-control form-control-sm" id="monthly_turnover" placeholder="Turnover (Monthly)" value="{{ $value->monthly_turnover }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row  mb-4">
                                                            <label for="business_location" class="col-sm-4 col-form-label col-form-label-sm">Location / Address</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="business_location" class="form-control form-control-sm" id="business_location" placeholder="Location / Address" value="{{ $value->business_location }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row  mb-4">
                                                            <label for="business_location_type" class="col-sm-4 col-form-label col-form-label-sm">Ownership Type</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control form-control-sm business_location_type" name="business_location_type">
                                                                    <option value="Own">Own</option>
                                                                    <option value="Rented">Rented</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row  mb-4">
                                                            <label for="business_duration_place" class="col-sm-4 col-form-label col-form-label-sm">Duration at that place:</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="business_duration_place" class="form-control form-control-sm" id="business_duration_place" placeholder="Duration at that place:" value="{{ $value->business_duration_place }}">
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
                                                <label for="home_address" class="col-sm-4 col-form-label col-form-label-sm">Location / Address</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="home_address" class="form-control form-control-sm" id="home_address" placeholder="Location / Address" value="{{ $finance->home_address }}">
                                                </div>
                                            </div>
                                            <div class="form-group row  mb-4">
                                                <label for="home_type" class="col-sm-4 col-form-label col-form-label-sm">Location Type</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm home_type" name="home_type">
                                                        <option value="Own" selected="{{ $finance->home_type==="Own"?'selected':'' }}">Own</option>
                                                        <option value="Rented" selected="{{ $finance->home_type==="Rented"?'selected':'' }}">Rented</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row  mb-4">
                                                <label for="home_duration_place" class="col-sm-4 col-form-label col-form-label-sm">Duration at that place:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="home_duration_place" class="form-control form-control-sm" id="home_duration_place" placeholder="Duration at that place:" value="{{ $finance->home_duration_place }}">
                                                </div>
                                            </div>
                                        </form>
                                    </section>
                                    <h3>BANKING & FINANCE</h3>
                                    <section>
                                            <div class="row">
                                                <div class="col-12">
                                                    <a href="javascript:void(0);" class="btn btn-outline-primary mb-2 float-right add_banking_finance" type="button">Add</a>
                                                </div>
                                            </div>
                                            <div class="banking_finance_row">
                                                <form class="banking_finance_form">
                                                    <div class="form-group row  mb-4">
                                                        <div class="col-12">
                                                            <a href="javascript:void(0);" class="btn btn-outline-danger mb-2 float-right remove_banking_finance_btn d-none" type="button">Remove</a>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row  mb-4">
                                                        <label for="previous_lona_type" class="col-sm-4 col-form-label col-form-label-sm">Type</label>
                                                        <div class="col-sm-8">
                                                            <select name="previous_lona_type" class="form-control form-control-sm previous_lona_type">
                                                                <option value="1">Home Loan</option>
                                                                <option value="2">Personal Loan</option>
                                                                <option value="3">Business Loan</option>
                                                                <option value="4">Machinary Loan</option>
                                                                <option value="5">Vehicle Loan</option>
                                                                <option value="6">Gold Loan</option>
                                                                <option value="7">CC Loan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row  mb-4">
                                                        <label for="bank_name" class="col-sm-4 col-form-label col-form-label-sm">Bank</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="bank_name" class="form-control form-control-sm" id="bank_name" placeholder="Bank" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row  mb-4">
                                                        <label for="bank_branch" class="col-sm-4 col-form-label col-form-label-sm">Branch</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="bank_branch" class="form-control form-control-sm" id="bank_branch" placeholder="Branch">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row  mb-4">
                                                        <label for="loan_amount" class="col-sm-4 col-form-label col-form-label-sm">Loan Amount</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="loan_amount" class="form-control form-control-sm" id="loan_amount" placeholder="Loan Amount">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row  mb-4">
                                                        <label for="emi_amount" class="col-sm-4 col-form-label col-form-label-sm">EMI Amount</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="emi_amount" class="form-control form-control-sm" id="emi_amount" placeholder="EMI Amount">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row  mb-4">
                                                        <label for="bank_balance" class="col-sm-4 col-form-label col-form-label-sm">Outstanding Amount</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="bank_balance" class="form-control form-control-sm" id="bank_balance" placeholder="Balance Amount">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row  mb-4">
                                                        <label for="duration" class="col-sm-4 col-form-label col-form-label-sm">Duration</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="duration" class="form-control form-control-sm" id="duration" placeholder="Duration">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="banking_finance_clone_row"></div>
                                            <hr style="border-top:1px solid #3b3f5c;" />
                                            <div class="row">
                                                <div class="col-12">
                                                    <a href="javascript:void(0);" class="btn btn-outline-primary mb-2 float-right add_current_ac_btn" type="button">Add Current Account</a>
                                                    <a href="javascript:void(0);" class="btn btn-outline-primary mb-2 float-right add_saving_ac_btn mr-2" type="button">Add Saving Account</a>
                                                </div>
                                            </div>
                                            <div class="saving_ac_row">
                                                <form class="saving_ac_bank_form">
                                                    <div class="form-group row  mb-4">
                                                        <div class="col-12">
                                                            <a href="javascript:void(0);" class="btn btn-outline-danger mb-2 float-right remove_saving_ac_btn d-none" type="button">Remove</a>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row  mb-4">
                                                        <label for="saving_ac_bank " class="col-sm-4 col-form-label col-form-label-sm">Savings Account Bank</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="saving_ac_bank" class="form-control form-control-sm" id="saving_ac_bank" placeholder="Savings Account Bank">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row  mb-4">
                                                        <label for="saving_ac_branch" class="col-sm-4 col-form-label col-form-label-sm">Savings Account Branch</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="saving_ac_branch" class="form-control form-control-sm" id="saving_ac_branch" placeholder="Savings Account Branch">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="saving_ac_clone_row"></div>
                                            <div class="current_account_row">
                                                <form class="current_ac_bank_form">
                                                    <div class="form-group row  mb-4">
                                                        <div class="col-12">
                                                            <a href="javascript:void(0);" class="btn btn-outline-danger mb-2 float-right remove_current_ac_btn d-none" type="button">Remove</a>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row  mb-4">
                                                        <label for="current_ac_bank" class="col-sm-4 col-form-label col-form-label-sm">Current  Account Bank</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="current_ac_bank" class="form-control form-control-sm" id="current_ac_bank" placeholder="Current Account Bank">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row  mb-4">
                                                        <label for="current_ac_branch" class="col-sm-4 col-form-label col-form-label-sm">Current  Account Branch</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="current_ac_branch" class="form-control form-control-sm" id="current_ac_branch" placeholder="Current Account Branch">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="current_account_clone_row"></div>
                                    </section>
                                    <h3>GUARANTOR DETAILS</h3>
                                    <section>
                                        <div class="form-group row  mb-4">
                                            <div class="col-12">
                                                <a href="javascript:void(0);" class="btn btn-outline-primary mb-2 float-right add_gaurantor" type="button">Add</a>
                                                <!-- <a href="javascript:void(0);" class="btn btn-outline-danger mb-2 float-right remove_gaurantor d-none" type="button">Remove</a> -->

                                            </div>
                                        </div>
                                        <div class="guarantor_section">
                                            <form class="guarantor_section_form">
                                                <div class="form-group row  mb-4">
                                                    <div class="col-12">
                                                        <a href="javascript:void(0);" class="btn btn-outline-danger mb-2 float-right remove_gaurantor d-none" type="button">Remove</a>
                                                    </div>
                                                </div>
                                                <div class="form-group row  mb-4">
                                                    <label for="guarantor_name" class="col-sm-4 col-form-label col-form-label-sm">Name of Person</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="guarantor_name" class="form-control form-control-sm" id="guarantor_name" placeholder="Name of Person">
                                                    </div>
                                                </div>
                                                <div class="form-group row  mb-4">
                                                    <label for="guarantor_firm" class="col-sm-4 col-form-label col-form-label-sm">Name of Firm</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="guarantor_firm" class="form-control form-control-sm" id="guarantor_firm" placeholder="Name of Firm">
                                                    </div>
                                                </div>
                                                <div class="form-group row  mb-4">
                                                    <label for="guarantor_firm_nature" class="col-sm-4 col-form-label col-form-label-sm">Nature /Activity of Firm</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="guarantor_firm_nature" class="form-control form-control-sm" id="guarantor_firm_nature" placeholder="Nature /Activity of Firm">
                                                    </div>
                                                </div>
                                                <div class="form-group row  mb-4">
                                                    <label for="guarantor_address" class="col-sm-4 col-form-label col-form-label-sm">Location / Address</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="guarantor_address" class="form-control form-control-sm" id="guarantor_address" placeholder="Location / Address">
                                                    </div>
                                                </div>
                                                <div class="form-group row  mb-4">
                                                    <label for="guarantor_affiliate_vc" class="col-sm-4 col-form-label col-form-label-sm">Affliated to Vision Capital</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control form-control-sm guarantor_affiliate_vc" name="guarantor_affiliate_vc">
                                                            <option value="1">Yes</option>
                                                            <option value="0" selected="">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row  mb-4 d-none affiliate_type">
                                                    <label for="guarantor_affiliate_type" class="col-sm-4 col-form-label col-form-label-sm">Select Affliated Type</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control form-control-sm guarantor_affiliate_type[]" name="guarantor_affiliate_type">
                                                            <option value="Loan">Loan</option>
                                                            <option value="Subsidy">Subsidy</option>
                                                            <option value="Finance">Finance</option>
                                                            <option value="VC">VC</option>
                                                            <option value="Other">Other (Specify)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row  mb-4 d-none guarantor_specify">
                                                    <label for="guarantor_affiliate_type_other" class="col-sm-4 col-form-label col-form-label-sm">Specify here</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="guarantor_affiliate_type_other" class="form-control form-control-sm" id="guarantor_affiliate_type_other" placeholder="Other">
                                                    </div>
                                                </div>
                                                <hr style="border-top:1px solid #3b3f5c;" />
                                            </form>

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
    <style>
        #formValidate .wizard > .content {min-height: 25em;}
        #example-vertical.wizard > .content {min-height: 24.5em;}
        .error{
            color: red;
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
    <script type="text/javascript">
        $(document).ready(function(){

            $('.add_gaurantor').on('click',function(){
                var section = $('.guarantor_section').clone();
                // $(this).addClass('d-none');
                $('.guarantor_section_clone').html(section);
                $('.guarantor_section_clone .guarantor_section .remove_gaurantor').removeClass('d-none');
                // $('.guarantor_section_clone').before('<div class="form-group row  mb-4"><div class="col-12"><a href="javascript:void(0);" class="btn btn-outline-danger mb-2 float-right remove_gaurantor" type="button">Remove</a></div></div>');
            });
            $(document).on('click','.remove_gaurantor',function(){
                // $(this).addClass('d-none');
                $(this).closest('.guarantor_section').remove();
                $('.add_gaurantor').removeClass('d-none');
                // $('.guarantor_section_clone').html('');
            });

            $(document).on('change','.ref_affiliate_vc',function(){
                if($(this).val()==0){
                    $('.select_affiliate_type').addClass('d-none');
                    $('.specify').addClass('d-none');
                }
                else{
                    $('.select_affiliate_type').removeClass('d-none');
                }
            });
            $(document).on('change','.ref_affiliate_type',function(){
                if($(this).val()=='Other'){
                    $('.specify').removeClass('d-none');
                }
                else{
                    $('.specify').addClass('d-none');
                }
            });
            $('.bor_affiliate_vc').change(function(){
                if($(this).val()==0){
                    $('.bor_select_affiliate_type').addClass('d-none');
                    $('.bor_specify').addClass('d-none');
                }
                else{
                    $('.bor_select_affiliate_type').removeClass('d-none');
                }
            });
            $('.bor_affiliate_type').change(function(){
                if($(this).val()=='Other'){
                    $('.bor_specify').removeClass('d-none');
                }
                else{
                    $('.bor_specify').addClass('d-none');
                }
            });
            $('.guarantor_affiliate_vc').change(function(){
                if($(this).val()==0){
                    $('.affiliate_type').addClass('d-none');
                    $('.guarantor_specify').addClass('d-none');
                }
                else{
                    $('.affiliate_type').removeClass('d-none');
                }
            });
            $('.guarantor_affiliate_type').change(function(){
                if($(this).val()=='Other'){
                    $('.guarantor_specify').removeClass('d-none');
                }
                else{
                    $('.guarantor_specify').addClass('d-none');
                }
            });

            $('.add_banking_finance').on('click',function(){
                var section = $('.banking_finance_row').clone();
                $('.banking_finance_clone_row').html(section);
                section.find('form').each(function() {
                    $(this).add('rules',{
                        bank_name:'required',
                    })
                    $(this).add('messages',{
                        bank_name:'Please Enter Bank Name',
                    })
                })
                $('.banking_finance_clone_row .banking_finance_row .remove_banking_finance_btn').removeClass('d-none');
            });
            $(document).on('click','.remove_banking_finance_btn',function(){
                $(this).closest('.banking_finance_row').remove();
            });


            $('.add_business_details').on('click',function(){
                var form = $('#business_details').find('.business_detail_form');
                form.validate({
                    rules:{
                        business_name:'required',
                        business_started_date: {
                            required:true,
                            date:true
                        },
                        business_type:'required',
                        promoter_name:'required',
                        business_nature:'required',
                        business_monthly_income: {
                            required:true,
                            digits:true
                        },
                        total_no_machines:{
                            required:true,
                            digits:true
                        },
                        total_no_employees:{
                            required:true,
                            digits:true
                        },
                        monthly_turnover:{
                            required:true,
                            digits:true
                        },
                        business_location:'required',
                        business_location_type:'required',
                        business_duration_place:'required',
                    },
                    messages: {
                        business_name: "Please enter your Bussiness Name",
                        business_started_date: {
                            required:"Please Select Start Date",
                            date:"Please select valid Date"
                        },
                        business_type: "Please Select your Bussiness Type",
                        promoter_name: "Please Enter your Promoter Name",
                        business_nature: "Please Enter your Promoter Name",
                        business_monthly_income:{
                            required:'Please Enter your Business Monthly Income',
                            digits:'Please Enter only digit Business Monthly Income'
                        },
                        total_no_machines:{
                            required:'Please Enter your Total Number Of Machine',
                            digits:'Please Enter only digit Total Number Of Machine'
                        },
                        total_no_employees:{
                            required:'Please Enter your  Total Number Of Employees',
                            digits:'Please Enter only digit  Total Number Of Employee'
                        },
                        monthly_turnover:{
                            required:'Please Enter your Monthly turnover',
                            digits:'Please Enter only digit  Monthly turnover'
                        },
                        business_location:'Please Enter your Business Location',
                        business_location_type:'Please Enter your Business Location Type',
                        business_duration_place:'Please Enter your Business Duration place',
                    }
                });
                if (form.valid()){
                    var section = $('.business_details_row').clone();
                    $('.business_details_clone_row').html(section);
                    $('.business_details_clone_row .business_details_row .remove_business_details_btn').removeClass('d-none');
                }
            });
            $(document).on('click','.remove_business_details_btn',function(){
                $(this).closest('.business_details_row').remove();
            });
            // var f1 = flatpickr(document.getElementById('bor_dob'));
            // var f2 = flatpickr(document.getElementById(''));

            var maxBirthdayDate = new Date();
            maxBirthdayDate.setFullYear( maxBirthdayDate.getFullYear() - 18 );
            maxBirthdayDate.setMonth(11,31);

            var minimumDate = maxBirthdayDate.getFullYear()+'-'+maxBirthdayDate.getMonth();
            $('#business_started_date').flatpickr();
            $('#bor_dob').flatpickr({
                maxDate: minimumDate
            });
            $('#ref_contact').inputmask("9999999999");
            // $("#date").inputmask("99/99/9999");
            $("#bor_pan_no").inputmask("A{5}9{4}A{1}");
            $("#bor_aadhar_no").inputmask("9999 9999 9999");
            $("#bor_pin_code").inputmask("999999");
            $("#bor_amount").inputmask({mask:"₹9{10}"});
            $("#bor_time_limit").inputmask('99');

            // $('#bor_amount').change(function(){
            //     var amount = ReplaceNumberWithCommas($(this).val());
            //     $(this).val(amount);
            // })
            function ReplaceNumberWithCommas(amount) {
                var components = amount.toString().split(".");
                components [0] = components [0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                return components.join(".");
            }

            $('.business_type').change(function(){
                if($(this).val()=='Partnership' || $(this).val()=='LLP' || $(this).val()=='Pvt. Ltd.'){
                    // alert($(this).val());
                    $('.promoter_name_row').removeClass('d-none');
                }
                else{
                    $('.promoter_name_row').addClass('d-none');
                }
            });


            $('.add_saving_ac_btn').on('click',function(){
                var section = $('.saving_ac_row').clone();
                $('.saving_ac_clone_row').html(section);
                $('.saving_ac_clone_row .saving_ac_row .remove_saving_ac_btn').removeClass('d-none');
            });
            $(document).on('click','.remove_saving_ac_btn',function(){
                $(this).closest('.saving_ac_row').remove();
            });

            $('.add_current_ac_btn').on('click',function(){
                var section = $('.current_account_row').clone();
                $('.current_account_clone_row').html(section);
                $('.current_account_clone_row .current_account_row .remove_current_ac_btn').removeClass('d-none');
            });
            $(document).on('click','.remove_current_ac_btn',function(){
                $(this).closest('.current_account_row').remove();
            });


        });
    </script>
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('plugins/jquery-step/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-step/custom-jquery.steps.js') }}"></script>
    <script src="{{ asset('plugins/input-mask/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/input-mask/input-mask.js') }}"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
@endpush
