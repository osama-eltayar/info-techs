$(function () {
    initSpecialitySelector();
    // $('select[name=course_id]').on('change', function () {
    //     if ($(this).val()) {
    //         $('select[name=speciality_id]').val('')
    //         $('select[name=speciality_id]').prop('disabled', true)
    //     } else {
    //         $('select[name=speciality_id]').prop('disabled', false)
    //
    //     }
    // })
    // $('select[name=speciality_id]').on('change', function () {
    //     if ($(this).val()) {
    //         $('select[name=course_id]').val('')
    //         $('select[name=course_id]').prop('disabled', true)
    //     } else {
    //         $('select[name=course_id]').prop('disabled', false)
    //     }
    // })

    $('#discount-form').on('submit', function (e) {
        e.preventDefault();
        submitDiscount();
    })
})

function submitDiscount() {
    const formElement = $('#discount-form')
    const action = formElement.attr('action')
    const method = formElement.attr('method')
    const data = formElement.serializeArray()
    $.ajax({
        url: action,
        type: method,
        cache: false,
        data: data,
    })
}
function initSpecialitySelector(){
    $('#speciality-selector').select2({
        placeholder : "Specialities"
    })
}
