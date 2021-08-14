function readURL(input)
{
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}


$(function () {
    $("#imageUpload").change(function () {
        readURL(this);
    });

    $('#profile-form').validate({
        rules: {
            "profile[title]"        : {
                required: true,
            },
            "profile[mobile]"       : {
                required: true,
            },
            "user[name]"            : {
                required : true,
                minlength: 3
            },
            "profile[saudi_council]": {
                required: true,
            },
            "profile[country_id]"   : {
                required: true,
            },
            "profile[speciality_id]": {
                required: true,
            },
            "profile[city_id]"      : {
                required: true,
            },
            "profile[nationality]"  : {
                required: true,
            },
            "profile[job]"          : {},
            "profile[image]"        : {}

        }
    })

    $('#saudi-council-check').on('change',function (){
       $('#saudi-council-input').toggleClass('d-none');
    });
})
