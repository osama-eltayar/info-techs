let countryId;
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
     countryId = $('#country').val();
     initCountrySelector()
     initCitySelector()
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
            "profile[rank_id]": {
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
       if($(this).val() == 1)
       {
           $('#saudi-council-input').rules('add',{required:true})
       }
    });

    $('#country').on('select2:select',function (){
        countryId = $(this).val();
        $('#city').val('').trigger('change')
        // $('#city').prop('disabled',false)
    })

    $('#resend-verification').on('click',function (){
        $.ajax({
            type: 'POST',
            url  : '/en/email/verify/resend',
        })
         .done(res => {
             console.log('done')
             toastr.success('Your verification email was sent again.')
         })
         .fail(res => {

         })
    });



})

function initCountrySelector(){
    $('#country').select2({
        placeholder: "Country",
        allowClear: false,
        ajax: {
            url: function() {
                return `/api/countries`;
            },
            // global : false,
            dataType: "json",
            processResults: function(data) {
                return mapSelect2Data(data);
            },
        },
    });
}

function initCitySelector(){
    $('#city').select2({
        placeholder: "City",
        allowClear: false,
        ajax: {
            url: function() {
                return `/api/cities?country=${countryId}`;
            },
            // global : false,
            dataType: "json",
            processResults: function(data) {
                return mapSelect2Data(data);
            },
        },
    });
}

function mapSelect2Data(data) {
    var data2 = [];
    data.data.forEach(function (item) {
        data2.push({
            id: item.id,
            text: item.name
        })
    });
    return {
        results: data2
    };
}
