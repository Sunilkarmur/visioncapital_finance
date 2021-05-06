@extends('layouts.after_login')

@section('content')
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="page-header">
                <div class="page-title">
                    <h3>Track Application</h3>
                </div>
                <nav class="breadcrumb-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span>Track Application</span></li>
                    </ol>
                </nav>
            </div>
            <!-- Borrower Details -->
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Track Application</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="row">
                                <div class="col-12">
                                    <form action="{{ route('track-approved-application',['application_number'=>2]) }}" method="post" id="track-approved-form">
                                        @csrf
                                        <div class="form-row mb-2">
                                            <div class="form-group col-md-6">
                                                <label for="application_number">Application number</label>
                                                <input type="text" class="form-control" id="application_number" placeholder="Enter Application number" name="application_number">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-outline-primary">Search</button>
                                        <button type="submit" class="btn btn-outline-dark">Cancel</button>
                                    </form>
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
    <script src="{{ asset('js/track-approved.js') }}"></script>
@endpush
