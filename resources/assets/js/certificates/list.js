$(function () {
    $(document).on('click', '.print-certificate-btn', function (e) {
        e.preventDefault();
        $('#certificate-form').attr('action', $(this).attr('href'))
        $('#certificate-form').submit();
    })

    $(document).on('click','.send-certificate-btn',function (e){
        e.preventDefault()
       sendEmailRequest($(this).attr('href'))
    });
})

function sendEmailRequest(url)
{
    return $.ajax({
        url: url ,
        type: 'post',
    })
     .done(res => {
     })
     .fail(res => {
     })
     .always(() => {
     })
}
