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

$("#pill-vertical").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    cssClass: 'pills wizard',
    titleTemplate: '#title#',
    stepsOrientation: "vertical",
    onStepChanging: function (event, currentIndex, newIndex)
    {
        var form = $("#referrance-finance-detail");
        switch (currentIndex) {
            case 0:
                form.validate({
                    // Specify validation rules
                    rules: {
                        // The key name on the left side is the name attribute
                        // of an input field. Validation rules are defined
                        // on the right side
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
                    }
                });
                break;
            case 2:
                form = $('#business-detail-form');
                form.validate({
                    rules:{
                        business_name:'required',
                        business_started_date:"required"
                    }
                });
                break;
        }
        if (form.valid()){
            addFinanceForm(currentIndex,form.serializeArray());
        }
        return form.valid();
    },
    onFinishing: function (event, currentIndex)
    {
        return !0;
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
