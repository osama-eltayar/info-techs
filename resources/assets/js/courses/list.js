$(function () {
    $('#course-search-btn').on('click', function (e) {
        e.preventDefault();
        searchCourses();
    })

    $('#my-speciality-checkbox').on('change', function (e) {
        const checked = $(this).is(':checked')
        $('#speciality-selector option:first').prop('selected', true)
        checked ? $('#speciality-selector').hide() :
            $('#speciality-selector').show()
    })
    $('.filter-checkbox').on('change', function () {
        searchCourses();
    })

    $('#clear-filters-btn').on('click',function (){
        clearFilters()
    })
})

function searchCourses() {
    const filters = []
    $('.filter-checkbox:checked').each(function (){
        filters.push({name : $(this).attr('name') , value : true})
    })
    const formElement = $('#courses-search-form')
    const action = formElement.attr('action')
    const method = formElement.attr('method')
    const data = [...formElement.serializeArray() , ...filters]
    $.ajax({
        url: action ,
        type: method,
        cache: false,
        data: data,
    })
        .done(res => {
            $('#courses-list').html(res)
            updateQueryString(getQueryString(data))
        })
        .fail(res => {
        })
        .always(() => {
        })
}

function getQueryString(data){
    const queries = {}
    data.forEach(element=>{
        queries[element.name] = element.value;
    })
    return $.param(queries)
}

function clearFilters(){
    $('.filter-checkbox').prop('checked',false)
    searchCourses();
}

