$(function (){
    $('#login-form').validate({
        rules:{
            email :{
                required : true,
                email : true
            },
            password : {
                required : true,
                minlength : 6
            }
        }
    })
})
