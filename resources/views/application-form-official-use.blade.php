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
                                        <h4>Official Use</h4>
                                        <input type="hidden" name="finance-form-id" id="finance-form-id"
                                               value="{{ $finance->id }}">
                                        <div class="widget-content widget-content-area">
                                            <form id="pill-vertical-official">
                                                <div>
                                                    <h3>CBL Score</h3>
                                                    <section>
                                                    </section>
                                                    <h3>Visit Review</h3>
                                                    <section>
                                                    </section>
                                                    <h3>Document Verify</h3>
                                                    <section>
                                                    </section>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/jquery-step/jquery.steps.css') }}">
    <style>
        #formValidate .wizard > .content {
            min-height: 25em;
        }

        #example-vertical.wizard > .content {
            min-height: 24.5em;
        }

        .error {
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
            var f1 = flatpickr(document.getElementById('bor_dob'));
            var f2 = flatpickr(document.getElementById('business_started_date'));

            $('.managment_review_select').change(function(){
                if($(this).val()==1){
                    $('.management_review_text_row').removeClass('d-none');
                }
                else{
                    $('.visit_review_select').addClass('d-none');
                    $('.management_review_text_row').addClass('d-none');
                }
            });
            $('.visit_select').change(function(){
                if($(this).val()==1){
                    $('.visit_text_row').removeClass('d-none');
                    $('.visit_review_row').removeClass('d-none');
                    $('.visit_review_select').removeClass('d-none');
                    // $('.document_row').removeClass('d-none');
                }
                else{
                    $('.visit_review_row').addClass('d-none');
                    $('.visit_review_select').removeClass('d-none');
                    // $('.document_row').addClass('d-none');
                }
            });
            $('.visit_review_select').change(function(){
                if($(this).val()==1){
                    $('.visit_review_text_row').removeClass('d-none');
                    $('.attend_by_row').removeClass('d-none');
                    $('.document_row').removeClass('d-none');
                }
                else{
                    $('.visit_review_text_row').addClass('d-none');
                    $('.attend_by_row').addClass('d-none');
                    $('.document_row').addClass('d-none');
                }
            });

            $('.document_select').change(function(){
                if($(this).val()==1){
                    // $('.client_document_row').removeClass('d-none');
                    $('.document_review_row').removeClass('d-none');
                    $('.client_document_row').removeClass('d-none');
                    $('.document_review_text_row').removeClass('d-none');
                    $('.client_document_text_row').removeClass('d-none');
                }
                else{
                    // $('.gaurantor_document_text_row').addClass('d-none');
                    $('.document_review_row').addClass('d-none');
                    // $('.client_document_row').addClass('d-none');
                    $('.document_review_text_row').addClass('d-none');
                    $('.gaurantor_document_text_row').addClass('d-none');
                    $('.client_document_text_row').addClass('d-none');
                    $('.client_document_row').addClass('d-none');
                }
            });
            // $('.document_review_select').change(function(){
            //     if($(this).val()==1){
            //         $('.client_document_row').removeClass('d-none');
            //         $('.document_review_text_row').removeClass('d-none');
            //         $('.client_document_text_row').removeClass('d-none');
            //     }
            //     else{
            //         $('.document_review_text_row').addClass('d-none');
            //         $('.gaurantor_document_text_row').addClass('d-none');
            //         $('.client_document_text_row').addClass('d-none');
            //         $('.client_document_row').addClass('d-none');
            //     }
            // });


            $('.client_document_select').change(function(){
                if($(this).val()==1){
                    $('.client_document_text_row').removeClass('d-none');
                    $('.gaurantor_document_text_row').addClass('d-none');
                }
                else if($(this).val()==0){
                    $('.gaurantor_document_text_row').removeClass('d-none');
                    $('.client_document_text_row').addClass('d-none');
                }
            });

            // $('.cibil_socre_checked').change(function(){
            //     if($(this).val()==1){
            //         $('.cibil_score_row').removeClass('d-none');
            //         $('.mgmt_review_row').removeClass('d-none');
            //     }
            //     else{
            //         $('.cibil_score_row').addClass('d-none');
            //         $('.mgmt_review_row').addClass('d-none');
            //     }
            // });

            $('.cibil_socre_required_type').change(function(){
                if($(this).val()==1){
                    $('.cibil_score_row').removeClass('d-none');
                    $('.mgmt_review_row').removeClass('d-none');
                }
                else{
                    $('.cibil_score_row').addClass('d-none');
                    $('.mgmt_review_row').addClass('d-none');
                }
            });
            $('.managment_review_select').change(function(){
                if($(this).val()==1){
                    $('.cibil_score_management_review_text_row').removeClass('d-none');
                    $('.attend_by_row').removeClass('d-none');
                    $('.visit_row').removeClass('d-none');
                }
                else{
                    $('.cibil_score_management_review_text_row').addClass('d-none');
                    $('.attend_by_row').addClass('d-none');
                    $('.visit_row').addClass('d-none');
                }
            });
        });
    </script>
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('plugins/jquery-step/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-step/custom-jquery.steps.js') }}"></script>
    <script src="{{ asset('plugins/input-mask/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/input-mask/input-mask.js') }}"></script>
    <script>
        $(document).ready(function (e) {
            var form = $("#pill-vertical-official");
            form.validate({
                errorPlacement: function errorPlacement(error, element) { element.before(error); },
                rules: {
                    confirm: {
                        equalTo: "#password"
                    }
                }
            });
            form.children("div").steps({
                headerTag: "h3",
                bodyTag: "section",
                transitionEffect: "slideLeft",
                cssClass: 'pills wizard',
                titleTemplate: '#title#',
                stepsOrientation: "vertical",
                startIndex: 0,
                transition: {
                    animation: 'slide-h'
                },
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    form.validate().settings.ignore = ":disabled,:hidden";
                    return form.valid();
                },
                onFinishing: function (event, currentIndex)
                {
                    form.validate().settings.ignore = ":disabled";
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    alert("Submitted!");
                }
            });
            // $("#pill-vertical-official").steps({
            //     enableAllSteps: 0,
            //     headerTag: "h3",
            //     bodyTag: "section",
            //     transitionEffect: "slideLeft",
            //     cssClass: 'pills wizard',
            //     titleTemplate: '#title#',
            //     stepsOrientation: "vertical",
            //     startIndex: 0,
            //     onStepChanging: function (event, currentIndex, newIndex) {
            //         if (currentIndex > newIndex) {
            //
            //             return true;
            //         }
            //
            //         var status = true;
            //         return status;
            //     },
            //     onFinished: function (event, currentIndex) {
            //         return guarantorDetailsForm(currentIndex);
            //     }
            // });
        })
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->
@endpush
