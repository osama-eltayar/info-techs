$(function () {
    $('#register-form').validate({
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 6
            },
            password_confirmation: {
                required: true,
                minlength: 6,
                equalTo : "#password"
            },
            agreement: {
                required: true
            }
        }
    })
})
