@extends('layouts.after_login')

@section('content')
    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container sidebar-closed sbar-open" id="container">
        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>
        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">
            <nav id="sidebar">

                <ul class="navbar-nav theme-brand flex-row  text-center">
                    <li class="nav-item theme-logo">
                        <a href="index.html">
                            <img src="assets/img/90x90.jpg" class="navbar-logo" alt="logo">
                        </a>
                    </li>
                    <li class="nav-item theme-text">
                        <a href="index.html" class="nav-link"> Vision Capital Finance</a>
                    </li>
                </ul>

                <ul class="list-unstyled menu-categories" id="accordionExample">
                    <li class="menu active">
                        <a href="index.html" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span>Dashboard</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="finance.html" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                <span>Finance Form</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="applications.html" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                <span>Applications</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="approved-applications.html" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                <span>Approved Applications</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="track-application.html" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                <span>Track Applications</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <!--  END SIDEBAR  -->
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="page-header">
                    <div class="page-title">
                        <h3>Track Approved Application</h3>
                    </div>
                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a></li>
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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
    </div>
    <!-- END MAIN CONTAINER -->
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
    <style>
        /*
            The below code is for DEMO purpose --- Use it if you are using this demo otherwise Remove it
        */
        .page-title {
            float: none;
            margin-top: 0;
            margin-bottom: 0;
            align-self: center;
            padding-right: 15px;
            border-right: 1px solid #bfc9d4;
            margin-right: 15px;
        }
        .page-title h3 {
            margin-bottom: 0;
        }
        .page-header {
            display: flex;
            padding: 0;
            margin-bottom: 16px;
            margin-top: 30px
        }
        .breadcrumb-one {
            display: inline-block;
            align-self: center;
        }
        .breadcrumb-one .breadcrumb {
            padding: 0;
            vertical-align: text-bottom;
            margin-bottom: 0;
            background: transparent;
        }
        .breadcrumb-one .breadcrumb-item {
            align-self: center;
        }
        .breadcrumb-one .breadcrumb-item a {
            color: #888ea8;
            vertical-align: text-bottom;
        }
        .breadcrumb-one .breadcrumb-item a svg {
            width: 20px;
            height: 20px;
            vertical-align: sub;
        }
        .breadcrumb-one .breadcrumb-item.active a {
            color: #1b55e2;
        }
        .breadcrumb-one .breadcrumb-item span {
            vertical-align: text-bottom;
        }
        .breadcrumb-one .breadcrumb-item.active {
            color: #1b55e2;
            font-weight: 600;
        }
        .breadcrumb-one .breadcrumb-item+.breadcrumb-item {
            padding: 0px;
        }
        .breadcrumb-one .breadcrumb-item+.breadcrumb-item::before {
            color: #515365;
            font-size: 0;
            content: url('data:image/svg+xml, <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 24 24" fill="none" stroke="%23555" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>');
            vertical-align: text-top;
            padding: 0 6px;
        }


        @media(max-width: 575px) {
            .page-header {
                display: block;
            }
            .page-title {
                margin-bottom: 20px;
                border: none;
                padding-right: 0;
                margin-right: 0;
            }
        }


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
    <style type="text/css">
        .card {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 0.10rem
        }

        .card-header:first-child {
            border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
        }

        .card-header {
            padding: 0.75rem 1.25rem;
            margin-bottom: 0;
            background-color: #fff;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1)
        }

        .track {
            position: relative;
            background-color: #ddd;
            height: 7px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            margin-bottom: 60px;
            margin-top: 50px
        }

        .track .step {
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            width: 25%;
            margin-top: -18px;
            text-align: center;
            position: relative
        }

        .track .step.active:before {
            background: #8dbf42
        }

        .track .step::before {
            height: 7px;
            position: absolute;
            content: "";
            width: 100%;
            left: 0;
            top: 18px
        }

        .track .step.active .icon {
            background: #8dbf42;
            color: #fff
        }

        .track .icon {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            position: relative;
            border-radius: 100%;
            background: #ddd
        }

        .track .step.active .text {
            font-weight: 400;
            color: #000
        }

        .track .text {
            display: block;
            margin-top: 7px
        }

        .itemside {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            width: 100%
        }

        .itemside .aside {
            position: relative;
            -ms-flex-negative: 0;
            flex-shrink: 0
        }

        .img-sm {
            width: 80px;
            height: 80px;
            padding: 7px
        }

        ul.row,
        ul.row-sm {
            list-style: none;
            padding: 0
        }

        .itemside .info {
            padding-left: 15px;
            padding-right: 7px
        }

        .itemside .title {
            display: block;
            margin-bottom: 5px;
            color: #212529
        }

    </style>
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
            $("#circle-basic").steps("setStep", 2);
        });
    </script>
@endpush
