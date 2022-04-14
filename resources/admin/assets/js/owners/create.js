let countryId ;
$(function () {
    countryId = $('#country').val();
    initCitySelector()
    initCountrySelector()
    $('#create-owner-form').validate({
        rules: {},
        submitHandler: function () {
            storeOwner();
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

function storeOwner() {
    const formElement = $('#create-owner-form');
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


function initCitySelector(){
    $('#city-selector').select2({
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
function initCountrySelector(){
    $('#country-selector').select2({
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

