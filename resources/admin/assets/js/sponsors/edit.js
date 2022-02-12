let countryId ;
$(function () {
    countryId = $('#country').val();
    initCitySelector()
    initCountrySelector()
    $('#edit-owner-form').validate({
        rules: {},
        submitHandler: function () {
           updateOwner();
        }
    })

    $('#country-selector').on('select2:select',function (){
        countryId = $(this).val();
        $('#city-selector').val('').trigger('change')
        $('#city-selector').prop('disabled',false)
    })
})

function updateOwner() {
    const formElement = $('#edit-owner-form');
    const method = formElement.attr('method');
    const url = formElement.attr('action');
    const data = new FormData(formElement[0])
    return $.ajax({
        url: url,
        type: method,
        data: data,
        cache: false,
        processData: false,
        contentType: false
    })
}


