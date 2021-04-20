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
                                            <div id="pill-vertical-official">
                                                <h3>CBL Score</h3>
                                                <section>
                                                    <div class="form-group row  mb-4 remarks">
                                                        <label for="guarantor_affiliate_type_other" class="col-sm-4 col-form-label col-form-label-sm">Remarks</label>
                                                        <div class="col-sm-8">
                                                            <textarea name="remarks" class="form-control form-control-sm" id="remarks" placeholder="Remarks"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row  mb-4 cibil_score">
                                                        <label for="guarantor_affiliate_type_other" class="col-sm-4 col-form-label col-form-label-sm">CIBIL Score Required?</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control form-control-sm cibil_socre_required_type" name="cibil_socre_required_type">
                                                                <option value="1">Yes</option>
                                                                <option value="0" selected="true">No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-group row cibil_score_checked d-none  mb-4">
                                                        <label for="cibil_socre_checked" class="col-sm-4 col-form-label col-form-label-sm">CIBIL Score Checked?</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control form-control-sm cibil_socre_checked" name="cibil_socre_checked">
                                                                <option value="1">Yes</option>
                                                                <option value="0" selected="true">No</option>
                                                            </select>
                                                        </div>
                                                    </div> -->
                                                    <div class="form-group row cibil_score_row  mb-4 d-none">
                                                        <label for="cibil_score_row" class="col-sm-4 col-form-label col-form-label-sm">CIBIL Score</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="cibil_socre" class="form-control form-control-sm" id="cibil_socre" placeholder="CIBIL Score">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mgmt_review_row d-none  mb-4">
                                                        <label for="mgmt_review_row" class="col-sm-4 col-form-label col-form-label-sm">CIBIL Score Management Review?</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control form-control-sm managment_review_select" name="managment_review_select">
                                                                <option value="1">Approved</option>
                                                                <option value="0" selected="true">Rejected</option>
                                                                <option value="2" selected="true">On Hold</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row cibil_score_management_review_text_row d-none  mb-4 d-none">
                                                        <label for="management_review_text_row" class="col-sm-4 col-form-label col-form-label-sm">CIBIL Score Management Review Note</label>
                                                        <div class="col-sm-8">
                                                            <textarea name="management_review_text" class="form-control form-control-sm" id="management_review_text" placeholder="Management Review"></textarea>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-group row cibil_score_row  mb-4">
                                                        <label for="signature" class="col-sm-4 col-form-label col-form-label-sm">Signature</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="signature" class="form-control form-control-sm" id="signature" placeholder="Signature">
                                                        </div>
                                                    </div> -->
                                                </section>
                                                <h3>Visit Review</h3>
                                                <section>
                                                </section>
                                                <h3>Document Verify</h3>
                                                <section>
                                                </section>
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
            $("#pill-vertical-official").steps({
                enableAllSteps: 0,
                headerTag: "h3",
                bodyTag: "section",
                transitionEffect: "slideLeft",
                cssClass: 'pills wizard',
                titleTemplate: '#title#',
                stepsOrientation: "vertical",
                startIndex: 0,
                onStepChanging: function (event, currentIndex, newIndex) {
                    if (currentIndex > newIndex) {

                        return true;
                    }

                    var status = true;
                    return status;
                },
                onFinished: function (event, currentIndex) {
                    return guarantorDetailsForm(currentIndex);
                }
            });
        })
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->
@endpush
