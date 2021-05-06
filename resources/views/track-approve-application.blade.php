@extends('layouts.after_login')

@section('content')
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="page-header">
                <div class="page-title">
                    <h3>Track Approved Application</h3>
                </div>
                <nav class="breadcrumb-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span>Track Approved Application</span></li>
                    </ol>
                </nav>
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
            <!-- Borrower Details -->
            <div class="row layout-top-spacing">
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
                                            <label class="mt-1">Customer name</label>
                                        </div>
                                    </div>
                                    <div class="form-group row  mb-4">
                                        <label for="bor_amount" class="col-sm-4 col-form-label col-form-label-sm">Amount Required</label>
                                        <div class="col-sm-8">
                                            <label class="mt-1">Amount required</label>
                                        </div>
                                    </div>
                                    <div class="form-group row  mb-4">
                                        <label for="bor_time_limit" class="col-sm-4 col-form-label col-form-label-sm">Time Limit</label>
                                        <div class="col-sm-8">
                                            <label class="mt-1">Time Limit</label>
                                        </div>
                                    </div>
                                    <div class="form-group row  mb-4">
                                        <label for="bor_purpose" class="col-sm-4 col-form-label col-form-label-sm">Purpose</label>
                                        <div class="col-sm-8">
                                            <label class="mt-1">Purpose</label>
                                        </div>
                                    </div>
                                    <div class="form-group row  mb-4">
                                        <label for="bor_affiliate_vc" class="col-sm-4 col-form-label col-form-label-sm">Affliated to Vision Capital</label>
                                        <div class="col-sm-8">
                                            <label class="mt-1">Yes</label>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row  mb-4 bor_select_affiliate_type">
                                        <label for="bor_affiliate_type" class="col-sm-4 col-form-label col-form-label-sm">Affliated Type</label>
                                        <div class="col-sm-8">
                                            <label class="mt-1">Other</label>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row  mb-4 bor_specify">
                                        <label for="bor_affiliate_type_other" class="col-sm-4 col-form-label col-form-label-sm">Specify here</label>
                                        <div class="col-sm-8">
                                            <label class="mt-1">Other reason</label>
                                        </div>
                                    </div>
                                    <div class="form-group row  mb-4">
                                        <label for="bor_pan_no" class="col-sm-4 col-form-label col-form-label-sm">PAN No.</label>
                                        <div class="col-sm-8">
                                            <label class="mt-1">ABCV1234AC</label>
                                        </div>
                                    </div>
                                    <div class="form-group row  mb-4">
                                        <label for="bor_aadhar_no" class="col-sm-4 col-form-label col-form-label-sm">Adhar No.</label>
                                        <div class="col-sm-8">
                                            <label class="mt-1">12344343552</label>
                                        </div>
                                    </div>
                                    <div class="form-group row  mb-4">
                                        <label for="bor_pin_code" class="col-sm-4 col-form-label col-form-label-sm">PIN Code</label>
                                        <div class="col-sm-8">
                                            <label class="mt-1">380058</label>
                                        </div>
                                    </div>
                                    <div class="form-group row  mb-4">
                                        <label for="bor_dob" class="col-sm-4 col-form-label col-form-label-sm">Date of Birth</label>
                                        <div class="col-sm-8">
                                            28/11/1990
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Borrower Details end -->
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
    </style>
    <link href="{{ asset('plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/jquery-step/jquery.steps.css') }}">
    <!--  END CUSTOM STYLE FILE  -->
    <!-- <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/track-approved.css') }}">
@endpush

@push('script')
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('plugins/jquery-step/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-step/custom-jquery.steps.js') }}"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('.notarized').change(function() {
                if(this.checked) {
                    $('.notarized_row').removeClass('d-none');
                }
                else{
                    $('.notarized_row').addClass('d-none');
                }
            });

            $('.processing_fees_select').change(function(){
                if($(this).val()==1){
                    $('.processing_fees_row').removeClass('d-none');
                }
                else{
                    $('.processing_fees_row').addClass('d-none');
                }
            });
            $('.disbursement').change(function() {
                if(this.checked) {
                    $('.disbursement_row').removeClass('d-none');
                }
                else{
                    $('.disbursement_row').addClass('d-none');
                }
            });
            $("#circle-basic").steps("setStep", 1);
        });
    </script>
@endpush
