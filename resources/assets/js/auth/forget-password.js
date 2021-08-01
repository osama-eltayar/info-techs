$(function (){
    $('#forget-password-form').validate({
        rules:{
            email : {
                required : true,
                email : true
            }
        }
    })
})
