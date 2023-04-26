$('#registration-form').submit(function (e) {
    e.preventDefault();
    $('#button-submit').attr('disabled', true);
    $('.validation-error-message').text('').addClass('d-none');

    var formData = new FormData(this)
    var gtoken = grecaptcha.getResponse();
    formData.append('g_recaptcha_response', gtoken);
    $.ajax({
        url: $(this).attr('action'),
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': token,
        },
        data: formData,
        processData: false,
        contentType: false,
        enctype: 'multipart/form-data',
        success: function (res) {
            $('#button-submit').attr('disabled', false);
            if (res.success) {
                $('#registration-form')[0].reset();
                grecaptcha.reset();
                alert(res.message);
            }
        },
        error: function (res) {
            $('#button-submit').attr('disabled', false);
            grecaptcha.reset();
            if (res.status === 422) {
                var errors = res.responseJSON;
                $.each(res.responseJSON.errors, function (key, value) {
                    $("#" + key + "_error").html(value[0]);
                    $("#" + key + "_error").removeClass('d-none').css('display', 'unset');
                });
            }
        }
    });
});
