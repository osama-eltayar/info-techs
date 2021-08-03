$(function (){
    $('#reset-password-form').validate({
        rules:{
            old_password : {
                required : true,
                minlength : 6
            },
            password : {
                required : true,
                minlength : 6
            },
            password_confirmation : {
                required : true,
                minlength : 6,
                equalTo : '#newpassword'
            },

        }
    })
})
