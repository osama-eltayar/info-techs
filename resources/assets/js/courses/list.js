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

    $(document).on('click','.fav',function (){
        toggleFavouriteCourse($(this))
    });

    $(document).on('click','.add-cart',function (){
        addToShoppingCart($(this))
    })
})

function searchCourses() {
    const filters = []
    $('.filter-checkbox:checked').each(function (){
        filters.push({name : $(this).attr('name') , value : 1})
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

function toggleFavouriteCourse(element)
{
    element.toggleClass('active-red')
    let url = element.attr('data-action');
    $.ajax({
        url : url,
        type: 'post',
    })
     .done(res => {
     })
     .fail(res => {
         element.toggleClass('active-red')
     })
     .always(() => {
     })
}

function addToShoppingCart(element)
{
    element.attr('disabled', true)
    let url = element.attr('data-action');
    let courseId = element.closest('.single-course').attr('data-course-id');
    let data = {
        'course_id': courseId
    };

    $.ajax({
        url,
        type: 'post',
        data,
    })
     .done(res => {
     })
     .fail(res => {
         element.attr('disabled', false)
     })
     .always(() => {
     })

}
