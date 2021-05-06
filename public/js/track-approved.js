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


    $("#track-approved-form").on("submit", function (e) {
        var dataString = $(this).serializeArray();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: dataString,
            dataType: 'json',
            success: function (response) {
                console.log(response)
            },
            error: function (error) {
                const sources = error.responseJSON;
                swal("Error!", sources.message, "error");
                // return Promise.reject(sources);
            }
        })
        e.preventDefault();
    })
});
