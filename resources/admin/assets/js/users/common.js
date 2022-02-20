

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
