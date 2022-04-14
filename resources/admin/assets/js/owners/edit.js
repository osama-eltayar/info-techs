let countryId ;
$(function () {
    viewMaterials()
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

    $(document).on('click','.delete-material-btn',function (){
        onDeleteMaterials($(this).attr('data-idx'))
        viewMaterials()
    })

    $('#materials-input').on('change',function (event){
        onSelectMaterials(event)
        viewMaterials()
    })
})

function updateOwner() {
    const formElement = $('#edit-owner-form');
    const method = formElement.attr('method');
    const url = formElement.attr('action');
    let data = new FormData(formElement[0])
    data.delete('materials[]')
    data = appendMaterials(data)
    return $.ajax({
        url: url,
        type: method,
        data: data,
        cache: false,
        processData: false,
        contentType: false
    })
}




