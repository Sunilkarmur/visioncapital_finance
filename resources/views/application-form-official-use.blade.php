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
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                @php $officeUse = $finance->officeUse; @endphp
                                <div id="pill-vertical-edit">
                                    <h3>Cibil Score</h3>
                                    <section>
                                        <form id="cbl-score-form">
                                            <div class="form-group row  mb-4 remarks">
                                                <label for="guarantor_affiliate_type_other" class="col-sm-4 col-form-label col-form-label-sm">Remarks</label>
                                                <div class="col-sm-8">
                                                    <textarea name="remarks" class="form-control form-control-sm" id="remarks" placeholder="Remarks">{{ $officeUse?$officeUse->remark:'' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row  mb-4 cibil_score">
                                                <label for="guarantor_affiliate_type_other" class="col-sm-4 col-form-label col-form-label-sm">CIBIL Score Required?</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm cibil_socre_required_type" name="cibil_socre_required_type">
                                                        <option value="1" {{ ($officeUse && $officeUse->cibil_score_required_type==='1')?'selected':'' }}>Yes</option>
                                                        <option value="0" {{ ($officeUse && $officeUse->cibil_score_required_type==='0')?'selected':'' }}>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row cibil_score_row  mb-4 d-none">
                                                <label for="cibil_score_row" class="col-sm-4 col-form-label col-form-label-sm">CIBIL Score</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="cibil_socre" class="form-control form-control-sm" id="cibil_socre" placeholder="CIBIL Score" value="{{ $officeUse?$officeUse->cibil_score:'' }}">
                                                </div>
                                            </div>
                                            <div class="form-group row mgmt_review_row d-none  mb-4">
                                                <label for="mgmt_review_row" class="col-sm-4 col-form-label col-form-label-sm">CIBIL Score Management Review?</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm managment_review_select" name="managment_review_select">
                                                        <option value="1" {{ ($officeUse && $officeUse->managment_review_select==='1')?'selected':'' }}>Approved</option>
                                                        <option value="0" {{ ($officeUse && $officeUse->managment_review_select==='0')?'selected':'' }}>Rejected</option>
                                                        <option value="2" {{ ($officeUse && $officeUse->managment_review_select==='2')?'selected':'' }}>On Hold</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row cibil_score_management_review_text_row d-none  mb-4 d-none">
                                                <label for="management_review_text_row" class="col-sm-4 col-form-label col-form-label-sm">CIBIL Score Management Review Note</label>
                                                <div class="col-sm-8">
                                                    <textarea name="management_review_text" class="form-control form-control-sm" id="management_review_text" placeholder="Management Review">{{ $officeUse?$officeUse->management_review_text:'' }}</textarea>
                                                </div>
                                            </div>

                                        </form>
                                    </section>
                                    <h3>Visitor</h3>
                                    <section>
                                        <form id="visitor-form">
                                            <span id="visitor-detail-none"></span>
                                            <div class="form-group row visit_row d-none mb-4">
                                                <label for="visit_row" class="col-sm-4 col-form-label col-form-label-sm">Visit required?</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm visit_select" name="visit_select">
                                                        <option value="1" {{ ($officeUse && $officeUse->visit_select==='1')?'selected':'' }}>Yes</option>
                                                        <option value="0" {{ ($officeUse && $officeUse->visit_select==='0')?'selected':'' }}>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row visit_review_row d-none  mb-4">
                                                <label for="visit_review_row" class="col-sm-4 col-form-label col-form-label-sm">Visit Management Review?</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm visit_review_select" name="visit_review_select">
                                                        <option value="1" {{ ($officeUse && $officeUse->visit_review_select==='1')?'selected':'' }}>Approved</option>
                                                        <option value="0"  {{ ($officeUse && $officeUse->visit_review_select==='0')?'selected':'' }}>Rejected</option>
                                                        <option value="2"  {{ ($officeUse && $officeUse->visit_review_select==='2')?'selected':'' }}>On Hold</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row visit_review_text_row d-none  mb-4">
                                                <label for="visit_review_text_row" class="col-sm-4 col-form-label col-form-label-sm">Visit Management Review Note</label>
                                                <div class="col-sm-8">
                                                    <textarea name="visit_review_text" class="form-control form-control-sm" id="visit_review_text" placeholder="Management Review"> {{ $officeUse?$officeUse->visit_review_text:'' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row attend_by_row d-none  mb-4">
                                                <label for="attend_by" class="col-sm-4 col-form-label col-form-label-sm">Visited by</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="attend_by" class="form-control form-control-sm" id="attend_by" placeholder="Visited by" value="{{ $officeUse?$officeUse->attend_by:'' }}"/>
                                                </div>
                                            </div>
                                        </form>
                                    </section>
                                    <h3>Verify Document</h3>
                                    <section>
                                        <form id="verify-document-form">
                                            <div class="form-group row document_row d-none  mb-4">
                                                <label for="document_row" class="col-sm-4 col-form-label col-form-label-sm">Documentation Check?</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm document_select" name="document_select">
                                                        <option value="1" {{ ($officeUse && $officeUse->document_select==='1')?'selected':'' }}>Yes</option>
                                                        <option value="0" {{ ($officeUse && $officeUse->document_select==='0')?'selected':'' }}>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row document_review_row d-none  mb-4">
                                                <label for="document_review_row" class="col-sm-4 col-form-label col-form-label-sm">Document Management Review?</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm document_review_select" name="document_review_select">
                                                        <option value="1" {{ ($officeUse && $officeUse->document_review_select==='1')?'selected':'' }}>Approved</option>
                                                        <option value="0" {{ ($officeUse && $officeUse->document_review_select==='0')?'selected':'' }}>Rejected</option>
                                                        <option value="2" {{ ($officeUse && $officeUse->document_review_select==='2')?'selected':'' }}>On Hold</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row document_review_text_row d-none  mb-4 d-none">
                                                <label for="document_review_text_row" class="col-sm-4 col-form-label col-form-label-sm">Document Management Review Note</label>
                                                <div class="col-sm-8">
                                                    <textarea name="document_review_text" class="form-control form-control-sm" id="document_review_text" placeholder="Management Review">{{ $officeUse?$officeUse->document_review_text:'' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row client_document_row  mb-4 d-none">
                                                <label for="client_document_row" class="col-sm-4 col-form-label col-form-label-sm">Select Documentation</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm client_document_select" name="client_document_select">
                                                        <option value="1" {{ ($officeUse && $officeUse->client_document_select==='1')?'selected':'' }}>Client's Document</option>
                                                        <option value="0" {{ ($officeUse && $officeUse->client_document_select==='0')?'selected':'' }}>Gaurantor's Document</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row client_document_text_row d-none  mb-4">
                                                <label for="visit_text_row" class="col-sm-4 col-form-label col-form-label-sm">Client's Document</label>
                                                <div class="col-sm-8">
                                                    <h6 class="mt-1">Residence Proof</h6>
                                                    <div class="n-chk">
                                                        <label class="new-control new-checkbox checkbox-primary">
                                                            <input type="checkbox" name="resi_proof[]" class="new-control-input" value="rent_agreement" {{ in_array('rent_agreement',$finance->resi_proof) ?'checked':'' }}>
                                                            <span class="new-control-indicator"></span>Index Copy / Rent Agreement
                                                        </label>
                                                    </div>
                                                    <div class="n-chk">
                                                        <label class="new-control new-checkbox checkbox-primary">
                                                            <input type="checkbox" class="new-control-input" name="resi_proof[]" value="aadahar_card" {{ in_array('aadahar_card',$finance->resi_proof)?'checked':'' }}>
                                                            <span class="new-control-indicator"></span>Aadhar Card
                                                        </label>
                                                    </div>
                                                    <div class="n-chk">
                                                        <label class="new-control new-checkbox checkbox-primary">
                                                            <input type="checkbox" class="new-control-input" name="resi_proof[]" value="light_bill" {{ in_array('light_bill',$finance->resi_proof)?'checked':'' }}>
                                                            <span class="new-control-indicator"></span>Light bill
                                                        </label>
                                                    </div>
                                                    <h6 class="mt-1">Business Proof</h6>
                                                    <div class="n-chk">
                                                        <label class="new-control new-checkbox checkbox-primary">
                                                            <input type="checkbox" class="new-control-input" name="busi_proof[]" value="gst_cert" {{ in_array('gst_cert',$finance->busi_proof)?'checked':'' }}>
                                                            <span class="new-control-indicator"></span>GST Certificate
                                                        </label>
                                                    </div>
                                                    <div class="n-chk">
                                                        <label class="new-control new-checkbox checkbox-primary">
                                                            <input type="checkbox" class="new-control-input" name="busi_proof[]" value="rent_bill" {{ in_array('rent_bill',$finance->busi_proof)?'checked':'' }}>
                                                            <span class="new-control-indicator"></span>Index Copy / Rent Agreement
                                                        </label>
                                                    </div>
                                                    <div class="n-chk">
                                                        <label class="new-control new-checkbox checkbox-primary">
                                                            <input type="checkbox" class="new-control-input" name="busi_proof[]" value="light_bill" {{ in_array('light_bill',$finance->busi_proof)?'checked':'' }}>
                                                            <span class="new-control-indicator"></span>Light bill
                                                        </label>
                                                    </div>
                                                    <div class="n-chk">
                                                        <label class="new-control new-checkbox checkbox-primary">
                                                            <input type="checkbox" class="new-control-input" name="busi_proof[]" value="tax_bill" {{ in_array('tax_bill',$finance->busi_proof)?'checked':'' }}>
                                                            <span class="new-control-indicator"></span>TAX bill
                                                        </label>
                                                    </div>
                                                    <h6 class="mt-1">ID Proof</h6>
                                                    <div class="n-chk">
                                                        <label class="new-control new-checkbox checkbox-primary">
                                                            <input type="checkbox" class="new-control-input" name="id_proof[]" value="pan_card" {{ in_array('pan_card',$finance->id_proof)?'checked':'' }}>
                                                            <span class="new-control-indicator"></span>PAN Card
                                                        </label>
                                                    </div>
                                                    <div class="n-chk">
                                                        <label class="new-control new-checkbox checkbox-primary">
                                                            <input type="checkbox" class="new-control-input" name="id_proof[]" value="photo" {{ in_array('photo',$finance->id_proof)?'checked':'' }}>
                                                            <span class="new-control-indicator"></span>PHOTO
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row gaurantor_document_text_row d-none  mb-4">
                                                <label for="visit_text_row" class="col-sm-4 col-form-label col-form-label-sm">Gaurantor's Document</label>
                                                <div class="col-sm-8">
                                                    <h6 class="mt-1">Residence Proof</h6>
                                                    <div class="n-chk">
                                                        <label class="new-control new-checkbox checkbox-primary">
                                                            <input type="checkbox" class="new-control-input" name="resi_proof[]" value="rent_agreement" {{ in_array('rent_agreement',$finance->resi_proof)?'checked':'' }}>
                                                            <span class="new-control-indicator"></span>Index Copy / Rent Agreement
                                                        </label>
                                                    </div>
                                                    <div class="n-chk">
                                                        <label class="new-control new-checkbox checkbox-primary">
                                                            <input type="checkbox" class="new-control-input" name="resi_proof[]" value="aadahar_card" {{ in_array('aadahar_card',$finance->resi_proof)?'checked':'' }}>
                                                            <span class="new-control-indicator"></span>Aadhar Card
                                                        </label>
                                                    </div>
                                                    <div class="n-chk">
                                                        <label class="new-control new-checkbox checkbox-primary">
                                                            <input type="checkbox" class="new-control-input" name="resi_proof[]" value="light_bill" {{ in_array('light_bill',$finance->resi_proof)?'checked':'' }}>
                                                            <span class="new-control-indicator"></span>Light bill
                                                        </label>
                                                    </div>
                                                    <h6 class="mt-1">Business Proof</h6>
                                                    <div class="n-chk">
                                                        <label class="new-control new-checkbox checkbox-primary">
                                                            <input type="checkbox" class="new-control-input" name="busi_proof[]" value="gst_cert" {{ in_array('gst_cert',$finance->busi_proof)?'checked':'' }}>
                                                            <span class="new-control-indicator"></span>GST Certificate
                                                        </label>
                                                    </div>
                                                    <div class="n-chk">
                                                        <label class="new-control new-checkbox checkbox-primary">
                                                            <input type="checkbox" class="new-control-input" name="busi_proof[]" value="rent_bill" {{ in_array('rent_bill',$finance->busi_proof)?'checked':'' }}>
                                                            <span class="new-control-indicator"></span>Index Copy / Rent Agreement
                                                        </label>
                                                    </div>
                                                    <div class="n-chk">
                                                        <label class="new-control new-checkbox checkbox-primary">
                                                            <input type="checkbox" class="new-control-input" name="busi_proof[]" value="light_bill" {{ in_array('light_bill',$finance->busi_proof)?'checked':'' }}>
                                                            <span class="new-control-indicator"></span>Light bill
                                                        </label>
                                                    </div>
                                                    <div class="n-chk">
                                                        <label class="new-control new-checkbox checkbox-primary">
                                                            <input type="checkbox" class="new-control-input" name="busi_proof[]" value="tax_bill" {{ in_array('tax_bill',$finance->busi_proof)?'checked':'' }}>
                                                            <span class="new-control-indicator"></span>TAX bill
                                                        </label>
                                                    </div>
                                                    <h6 class="mt-1">ID Proof</h6>
                                                    <div class="n-chk">
                                                        <label class="new-control new-checkbox checkbox-primary">
                                                            <input type="checkbox" class="new-control-input" name="id_proof[]" value="pan_card" {{ in_array('pan_card',$finance->id_proof)?'checked':'' }}>
                                                            <span class="new-control-indicator"></span>PAN Card
                                                        </label>
                                                    </div>
                                                    <div class="n-chk">
                                                        <label class="new-control new-checkbox checkbox-primary">
                                                            <input type="checkbox" class="new-control-input" name="id_proof[]" value="photo" {{ in_array('photo',$finance->id_proof)?'checked':'' }}>
                                                            <span class="new-control-indicator"></span>PHOTO
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </section>
                                    <h3>Finish</h3>
                                    <section>
                                        <form id="finish-form">
                                            <div class="form-group row document_row d-none  mb-4">
                                                <label for="finish_row" class="col-sm-4 col-form-label col-form-label-sm">Loan Status</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm" name="status">
                                                        <option value="Pending" {{ ($officeUse && $officeUse->status==='Pending')?'selected':'' }}>On Hold</option>
                                                        <option value="Approved" {{ ($officeUse && $officeUse->status==='Approved')?'selected':'' }}>Approve</option>
                                                        <option value="Rejected" {{ ($officeUse && $officeUse->status==='Rejected')?'selected':'' }}>Reject</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
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
    <link href="{{ asset('assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/jquery-step/jquery.steps.css') }}">
    <style>
        #formValidate .wizard > .content {
            min-height: 25em;
        }

        #example-vertical.wizard > .content {
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
    <script type="text/javascript">
        $(document).ready(function(){
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
        });
    </script>
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('plugins/jquery-step/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('plugins/input-mask/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/input-mask/input-mask.js') }}"></script>
    <script>
        var stepEnable='{{ $finance->officeUse }}';
        $("#pill-vertical-edit").steps({
            enableAllSteps: stepEnable?1:0,
            headerTag: "h3",
            bodyTag: "section",
            labels: {
                current: "current step:",
                pagination: "Pagination",
                finish: "Save & Update",
                next: "Save",
                previous: "Previous",
                loading: "Loading ..."
            },
            transitionEffect: "slideLeft",
            cssClass: 'pills wizard',
            titleTemplate: '#title#',
            stepsOrientation: "vertical",
            onInit:function () {
                // cbl score step
                var cibil_socre_required_type=$('.cibil_socre_required_type').val();
                if(cibil_socre_required_type==1){
                    $('.cibil_score_row').removeClass('d-none');
                    $('.mgmt_review_row').removeClass('d-none');
                }
                else{
                    $('.cibil_score_row').addClass('d-none');
                    $('.mgmt_review_row').addClass('d-none');
                }

                // management review
                var managment_review_select=$('.managment_review_select').val();
                if(managment_review_select==1){
                    $('.cibil_score_management_review_text_row').removeClass('d-none');
                    $('.attend_by_row').removeClass('d-none');
                    $('.visit_row').removeClass('d-none');
                }
                else{
                    $('.cibil_score_management_review_text_row').addClass('d-none');
                    $('.attend_by_row').addClass('d-none');
                    $('.visit_row').addClass('d-none');
                }

                // visit select
                var visit_select=$('.visit_select').val();
                if(visit_select==1){
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

                // visit Review Select
                var visit_review_select=$('.visit_review_select').val();
                if(visit_review_select==1){
                    $('.visit_review_text_row').removeClass('d-none');
                    $('.attend_by_row').removeClass('d-none');
                    $('.document_row').removeClass('d-none');
                }
                else{
                    $('.visit_review_text_row').addClass('d-none');
                    $('.attend_by_row').addClass('d-none');
                    $('.document_row').addClass('d-none');
                }

                // verify step
                var document_select = $('.document_select').val();
                if(document_select==1){
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

                var client_document_select=$('.client_document_select').val();
                if(client_document_select==1){
                    $('.client_document_text_row').removeClass('d-none');
                    $('.gaurantor_document_text_row').addClass('d-none');
                }
                else if(client_document_select==0){
                    $('.gaurantor_document_text_row').removeClass('d-none');
                    $('.client_document_text_row').addClass('d-none');
                }
            },
            onStepChanging: function (event, currentIndex, newIndex) {
                if (currentIndex > newIndex) {

                    return true;
                }

                if (currentIndex===0){
                    var form = $('#cbl-score-form');
                    var cibil_socre_required_type=$('.cibil_socre_required_type').val();
                    if (cibil_socre_required_type==1){
                        form.validate({
                            rules:{
                                remarks:'required',
                                cibil_socre: {
                                    required:true,
                                    digits:true
                                },
                                management_review_text:'required',
                            },
                        })
                        if (!form.valid()){
                            return form.valid();
                        }
                    }else {
                        form.validate({
                            rules:{
                                remarks:'required',
                            },
                        })
                        if (!form.valid()){
                            return form.valid();
                        }
                    }

                    var formData = form.serializeArray();
                    formData.push({ name: 'type', value: '1' })
                    formData.push({ name: 'id', value: '{{ $finance->id }}' })
                }else if (currentIndex===1){
                    var form = $('#visitor-form');
                    var formData = form.serializeArray();
                    formData.push({ name: 'type', value: '2' })
                    formData.push({ name: 'id', value: '{{ $finance->id }}' })
                }else if (currentIndex===2){
                    var form = $('#verify-document-form');
                    var formData = form.serializeArray();
                    formData.push({ name: 'type', value: '3' })
                    formData.push({ name: 'id', value: '{{ $finance->id }}' })
                }
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: base_url + 'finance-form/{{ $finance->id }}/6',
                    method: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function (response) {
                        if (currentIndex===0){
                            var cibil_socre_required_type=$('.cibil_socre_required_type').val();
                            console.log(cibil_socre_required_type)
                            if (cibil_socre_required_type==0){
                                $("#pill-vertical-edit").steps("setStep", 3);
                            }
                        }
                        // swal({
                        //         title: "Success!",
                        //         text: response.message,
                        //         type: "success"
                        //     },
                        //     function() {
                        //
                        //     }
                        // );
                        // alert(response.message)

                        return true;
                    },
                    error: function (error) {
                        const sources = error.responseJSON;
                        swal("Error!", sources.message, "error");
                        return false;
                    }
                })
                return true;
            },
            onFinished: function (event, currentIndex) {
                var form = $('#finish-form');
                var formData = form.serializeArray();
                formData.push({ name: 'type', value: '4' })
                formData.push({ name: 'id', value: '{{ $finance->id }}' })
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: base_url + 'finance-form/{{ $finance->id }}/6',
                    method: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function (response) {
                        window.location.href='{{ route("finance.index") }}';
                        return true;
                    },
                    error: function (error) {
                        const sources = error.responseJSON;
                        swal("Error!", sources.message, "error");
                        return false;
                    }
                })
                return true;
            }
        });
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->
@endpush
