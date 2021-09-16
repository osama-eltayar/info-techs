$(function () {
    $(document).on('click', '.print-certificate-btn,.send-certificate-btn', function (e) {
        e.preventDefault();
        $('#certificate-form').attr('action', $(this).attr('href'))
        $('#certificate-form').submit();
    })
})
