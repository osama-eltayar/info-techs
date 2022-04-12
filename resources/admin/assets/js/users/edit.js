$(function () {

    $('#edit-user-form').validate({
        rules: {},
        submitHandler: function () {
           updateUser();
        }
    })


})

function updateUser() {
    const formElement = $('#edit-user-form');
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


