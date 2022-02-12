let successRedirectTimeout;
$(function (){
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (data) {
            if (data && data.data && data.data.redirect)
                successRedirectTimeout = setTimeout(function () {
                    redirect(data.data.redirect);
                }, 1000);

                if (data && data.message)
                    toastr.success(data.message);
        },
        error: function (res) {
            if (res.status == 422) showBackValidationErrorMessage(res);

            if ([401,402,403,429].indexOf(res.status) != -1) {
                toastr.clear();
                toastr.error(res.responseJSON.message);
            }


            if(res.status == 500)
                toastr.error("Internal Server Error");
        },
    });
})
function redirect(url) {
    window.location.href = url;
}

function showBackValidationErrorMessage(res) {
    toastr.clear();
    toastr.error(getFirstBackEndErrorMessage(res));
}

function getFirstBackEndErrorMessage(res) {
    return Object.values(res.responseJSON.errors)[0][0];
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
