// window.$ = window.jQuery = require('jquery')
require('jquery-validation')
$(function (){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        error  :function (res) {
            if (res.status == 401)
                redirect('/login')

            if(res.status == 403)
            {
                toastr.remove()
                toastr.error(res.responseJSON.message)
            }
        }
    });

    initToaster()
})


function redirect(url) {
    window.location.href = url;
}

$(document).ready(function(){
    $(document).ajaxStart(function(){
        loading();
    });

    $(document).ajaxComplete(function (){
        unLoading();
    })
})

function loading()
{
    $('#loader-wrapper').show();
}

function unLoading()
{
    $('#loader-wrapper').hide();
}

function initToaster(){
    toastr.options.hideEasing = 'linear';
    toastr.options.closeEasing = 'linear';
    toastr.options.hideEasing = 'linear';
    toastr.options.closeEasing = 'linear';
    toastr.options.timeOut = 3000; // How long the toast will display without user interaction
    toastr.options.extendedTimeOut = 5000; // How long the toast will display after a user hovers over it
    toastr.options.positionClass = 'toast-bottom-right';

}
