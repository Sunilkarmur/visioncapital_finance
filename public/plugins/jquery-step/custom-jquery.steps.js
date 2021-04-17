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
    enableAllSteps: window.location.href===base_url+'finance-form'?0:1,
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

        var status=false;

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
                break;

        }
        console.log(status)
        return status;
    },
    onFinished: function (event, currentIndex)
    {
        return guarantorDetailsForm(currentIndex);
    }
});

function referranceDetailForm(currentIndex) {
    var data=[];
    var form = $('.referrance-finance-detail');
    var referral_affiliate_form =validation(form,{
        ref_name: "required",
        ref_firm: "required",
        ref_contact: "required",
        ref_affiliate_vc: "required",
        ref_affiliate_type: "required",
        ref_affiliate_type_other: "required",
    },{
        ref_name: "Please enter your firstname",
        ref_firm: "Please enter your lastname",
        ref_contact: 'Please Enter your Referral Contact',
        ref_affiliate_vc: "Please select a Referral Affiliate VC",
        ref_affiliate_type: "Please select a Referral Affiliate",
        ref_affiliate_type_other: "Please enter a Referral Affiliate Type Other"
    },false)
    if (!referral_affiliate_form){
        return referral_affiliate_form;
    }
    var id=$('#finance-form-id').val();
    if (id){
        referral_affiliate_form.push({name: 'id', value: id});
    }
    var status=false;
   return addFormData(currentIndex,referral_affiliate_form,function (response) {
        return response.status;
    })
    //    .then(function (response) {
    //     return response.status
    // }).catch(function (error) {
    //    return response.status
    // })
}

function borrowerDetailForm(currentIndex) {
    var form = $('#borrower-detail-form');
    var data =validation(form,{
        bor_name: "required",
        bor_amount: {
            required:true,
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
    },{
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
    },false)
    if (!data){
        return data;
    }
    data.push({name: 'id', value: $('#finance-form-id').val()});
    var status=false;
  return  addFormData(currentIndex,data,function (response) {
        return response.status;
    })
    //    .then(function (response) {
    //     console.log(response)
    //     return response.status
    // }).catch(function (error) {
    //    return response.status
    // })
}

function businessBakingForm(currentIndex) {
    var data=[];
    var form = $('.business_detail_form');
    var business_finance_form =validation(form,
        {
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
        {
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
    })
    if (!business_finance_form){
        return business_finance_form;
    }
    data.push({name: 'id', value: $('#finance-form-id').val()});
    data.push({name: 'data', value: JSON.stringify(business_finance_form)});
   return  addFormData(currentIndex,data,function (response) {
        return response.status;
    })
    //     .then(function (response) {
    //     return response.status
    // }).catch(function (error) {
    //     return response.status
    // })
}

function residenceDetailForm(currentIndex) {
    var form = $('#residence-detail');
    var data =validation(form,{
        home_address:'required',
        home_type: {
            required:true,
        },
        home_duration_place:'required',
    },{
        home_address:'required',
        home_type: {
            required:true,
        },
        home_duration_place:'required',
    },false)
    if (!data){
        return data;
    }
    data.push({name: 'id', value: $('#finance-form-id').val()});
    var status=false;
    return addFormData(currentIndex,data,function (response) {
        return response.status;
    })
    //     .then(function (response) {
    //     console.log(response)
    //     return response.status
    // }).catch(function (error) {
    //     return response.status
    // })
}
function financeBakingForm(currentIndex) {
    var data=[];
    var form = $('.banking_finance_form');
    var banking_finance_form =validation(form,{
        bank_name:'required',
        previous_lona_type:'required',
        bank_branch:'required',
        loan_amount:'required',
        emi_amount:'required',
        bank_balance:'required',
        duration:'required',
    },{
        bank_name:'Please Enter Bank Name',
        previous_lona_type:'Please Enter Previous Loan Type',
        bank_branch:'Please Enter Bank Branch ',
        loan_amount:'Please Enter Loan Amount',
        emi_amount:'Please Enter EMI Amount',
        bank_balance:'Please Enter Bank Balance',
        duration:'Please Enter Duration',
    })
    if (!banking_finance_form){
        return banking_finance_form;
    }
    data.push({name: 'id', value: $('#finance-form-id').val()});
    data.push({name: 'finance_form', value: JSON.stringify(banking_finance_form)});

    var form = $('.saving_ac_bank_form');
   var saving_valid = validation(form,{
        saving_ac_bank:'required',
        saving_ac_branch:'required',
    },{
        saving_ac_bank:'Please Enter Current Account Bank',
        saving_ac_branch: {
            required:'Please Enter Current Account Branch',
        },
    })
    if (!saving_valid){
        return saving_valid;
    }
    data.push({name: 'saving_bank', value: JSON.stringify(saving_valid)});

    var form = $('.current_ac_bank_form');
   var current_bank_ac_form = validation(form,{
       current_ac_bank:'required',
       current_ac_branch:'required',
    },{
       current_ac_bank:'Please Enter Current Account Bank',
       current_ac_branch: {
            required:'Please Enter Current Account Branch',
        },
    })
    if (!current_bank_ac_form){
        return current_bank_ac_form;
    }
    data.push({name: 'current_bank', value: JSON.stringify(current_bank_ac_form)});
   return  addFormData(currentIndex,data,function (response) {
       return  response.status;
    });
}

function guarantorDetailsForm(currentIndex) {
    var data=[];
    var form = $('.guarantor_section_form');
    var banking_finance_form =validation(form,{
        guarantor_name:'required',
        guarantor_firm:'required',
        guarantor_firm_nature:'required',
        guarantor_address:'required',
        guarantor_affiliate_vc:'required',
        guarantor_affiliate_type:'required',
        guarantor_affiliate_type_other:'required',
    },{
        guarantor_name:'Please Enter Guarantor Name',
        guarantor_firm:'Please Enter Guarantor Firm',
        guarantor_firm_nature:'Please Enter Guarantor Firm Nature ',
        guarantor_address:'Please Enter Loan Amount',
        guarantor_affiliate_vc:'Please Enter EMI Amount',
        guarantor_affiliate_type:'Please Enter Bank Balance',
        guarantor_affiliate_type_other:'Please Enter Duration',
    },true)
    if (!banking_finance_form){
        return banking_finance_form;
    }
    data.push({name: 'id', value: $('#finance-form-id').val()});
    data.push({name: 'data', value: JSON.stringify(banking_finance_form)});
   return  addFormData(currentIndex,data,function (response) {
       if (response.status===true){
           var message='Form Update and Activate Done';
           var method='POST';
           if (window.location.href===base_url+'finance-form'){
               message='Form Add and Activate Done';
           }
           swal({
                   title: "Success!",
                   text: message,
                   type: "success"
               },
               function() {
                   window.location.href=base_url+'application';
               }
           );

       }
       return  response.status;
    });
}

function validation(form,rules,messages,isArray=true) {
    form.validate({
        rules:rules,
        messages: messages
    });
    if (form.valid()){
        if (isArray===true){
            return formData(form);
        }
        return form.serializeArray();
    }
    return form.valid();
}

function formData(form) {
    var formData=[];
    if (form.length>0){
        form.each(function() {
            var data = $(this).serializeArray().reduce(function(obj, item) {
                obj[item.name] = item.value;
                return obj;
            }, {});
            formData.push(data);
        });
    }else {
        var data = form.serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});
        formData.push(data);
    }

    return formData;
}

function addFormData(currentIndex,data,callback) {
    var id=$('#finance-form-id').val();
    var url=base_url+'finance-form/'+id+'/'+currentIndex;
    var method='POST';
    console.log(window.location.href===base_url+'finance-form')
    if (window.location.href===base_url+'finance-form'){
        url=base_url+'finance-form/'+currentIndex;
        method='POST';
    }
   return  $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:url,
        method:method,
        data:data,
        dataType:'json',
        success:function (response) {
            if (response.data.id){
                $('#finance-form-id').val(response.data.id)
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
            callback(response)
        },
        error:function (error) {
            const sources = error.responseJSON;
            swal("Error!", sources.message, "error");
            callback(sources)
            // return Promise.reject(sources);
        }
    })
}
