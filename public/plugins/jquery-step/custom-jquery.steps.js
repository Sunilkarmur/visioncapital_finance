$("#example-basic").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    autoFocus: true,
    cssClass: 'pill wizard'
});
$("#circle-basic").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    autoFocus: true,
    cssClass: 'circle wizard'
});
$("#example-vertical").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    cssClass: 'circle wizard',
    titleTemplate: '<span class="number">#index#</span>',
    stepsOrientation: "vertical"
});
var form = $("#referrance-finance-detail");
$("#pill-vertical").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    cssClass: 'pills wizard',
    titleTemplate: '#title#',
    stepsOrientation: "vertical",
    onStepChanging: function (event, currentIndex, newIndex)
    {
        if (currentIndex > newIndex){

            return true;
        }
        switch (currentIndex) {
            case 0:
                form = $("#referrance-finance-detail");
                form.validate({
                    // Specify validation rules
                    rules: {
                        ref_name: "required",
                        ref_firm: "required",
                        ref_contact: "required",
                        ref_affiliate_vc: "required",
                        ref_affiliate_type: "required",
                        ref_affiliate_type_other: "required",
                    },
                    // Specify validation error messages
                    messages: {
                        ref_name: "Please enter your firstname",
                        ref_firm: "Please enter your lastname",
                        ref_contact: '',
                        ref_affiliate_vc: "Please enter a valid email address",
                        ref_affiliate_type: "Please enter a valid email address",
                        ref_affiliate_type_other: "Please enter a valid email address"
                    },
                });
                break;
            case 1:
                form = $("#borrower-detail-form");
                form.validate({
                    // Specify validation rules
                    rules: {
                        // The key name on the left side is the name attribute
                        // of an input field. Validation rules are defined
                        // on the right side
                        bor_name: "required",
                        bor_amount: {
                            required:true,
                            digits:true
                        },
                        bor_time_limit: "required",
                        bor_purpose: "required",
                        bor_affiliate_vc: "required",
                        bor_affiliate_type: "required",
                        bor_affiliate_type_other: "required",
                        bor_pan_no: {
                            required:true,
                        },
                        bor_aadhar_no: {
                            required:true,
                        },
                        bor_pin_code: {
                            required:true,
                            digits:true
                        },
                        bor_dob: "required",
                    },
                    // Specify validation error messages
                    messages: {
                        bor_name: "Please enter your Borrower Name",
                        bor_amount: {
                            required:"Please enter your Borrower Amount",
                            digits:"Enter Valid Amount"
                        },
                        bor_time_limit: 'Please enter your Borrower Time Limit',
                        bor_purpose: "Please enter a valid Borrower Purpose",
                        bor_affiliate_vc: "Please select Borrower Affiliate VC",
                        bor_affiliate_type: "Please enter a valid email address",
                        bor_affiliate_type_other: "Please enter a valid email address",
                        bor_pan_no: {
                            required:"Please enter a Pan Number",
                        },
                        bor_aadhar_no: {
                            required:"Please enter a valid Aadhar Number",
                        },
                        bor_pin_code: {
                            required:"Please enter a valid Pin Number",
                            digits:"Please Enter Valid ZipCode Number"
                        },
                        bor_dob: "Please enter a valid Date Of birth"
                    },
                });
                break;
            case 2:
                form = $('#business_details').find('.business_detail_form');
                form.each(function() {   // <- selects every <form> on page
                    $(this).validate({        // <- initialize validate() on each form
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
                });
                break;
            case 3:
                form = $('#residence-detail');
                form.validate({
                    rules:{
                        home_address:'required',
                        home_type: {
                            required:true,
                        },
                        home_duration_place:'required',
                    },
                    messages: {
                        home_address:'required',
                        home_type: {
                            required:true,
                        },
                        home_duration_place:'required',
                    }
                });
                break;
        }
        return form.valid();
    },
    onStepChanged:function (event, nextIndex, currentIndex) {
        if (currentIndex > nextIndex){
            return true;
        }
        var data = [];
        if (currentIndex===0 || currentIndex===1 || currentIndex===3 ){
            data = form.serializeArray();
            data.push({name: 'id', value: $('#finance-form-id').val()});
        }
        if (currentIndex===2 || currentIndex===4){
            var formData=[];
            form.each(function() {
                var data = $(this).serializeArray().reduce(function(obj, item) {
                    obj[item.name] = item.value;
                    return obj;
                }, {});
                formData.push(data);
            });
            data.push({name: 'data', value: JSON.stringify(formData)});
            data.push({name: 'id', value: $('#finance-form-id').val()});
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:base_url+'finance-form/'+currentIndex,
            method:"POST",
            data:data,
            dataType:'json',
            success:function (response) {
                if (currentIndex===0){
                    $('#finance-form-id').val(response.data.id)
                }
                alert(response.message)
                return true;
            },
            error:function (error) {
                const sources = error.responseJSON;
                alert(sources.message)
                return !0;
            }
        })
    },
    onFinished: function (event, currentIndex)
    {
        alert("Submitted!");
    }
});

$('[data-type="adhaar-number"]').on("change, blur", function() {
    var value = $(this).val();
    var maxLength = $(this).attr("maxLength");
    if (value.length != maxLength) {
        $(this).addClass("highlight-error");
    } else {
        $(this).removeClass("highlight-error");
    }
});
$('[data-type="adhaar-number"]').keyup(function() {
    var value = $(this).val();
    value = value.replace(/\D/g, "").split(/(?:([\d]{4}))/g).filter(s => s.length > 0).join("-");
    $(this).val(value);
});

// Finance Form add
function addFinanceForm(step,data) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:base_url+'finance-form/'+step,
        method:"POST",
        data:data,
        dataType:'json',
        success:function (response) {
            alert(response.message);
        },
        error:function (error) {
            const sources = error.responseJSON;
            alert(sources.message)
        }
    })
    return false
}
