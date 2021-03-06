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

    $(document).on('click','.sort-col',function ($q){
        const col = $(this).attr('data-col')
        const direction = $(this).attr('data-direction')
        if ($('.form-search form').find('input[name=order_by]').length){
            $('.form-search form').find('input[name=order_by]').val(col)
        }else{
            $('.form-search form').append(`<input name="order_by" value="${col}" type="hidden">`)
        }
        if ($('.form-search form').find('input[name=order_direction]').length){
            $('.form-search form').find('input[name=order_direction]').val(direction)
        }else{
            $('.form-search form').append(`<input name="order_direction" value="${direction}" type="hidden">`)
        }
        $(this).attr('data-direction', (_, attr) => {
            console.log(attr)
            return attr == 'asc' ? 'desc' : 'asc'
        });
        $('.search-btn').click();
    })
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


function buildFormData(formData, data, parentKey) {
    if (data && typeof data === 'object' && !(data instanceof Date) && !(data instanceof File)) {
        Object.keys(data).forEach(key => {
            buildFormData(formData, data[key], parentKey ? `${parentKey}[${key}]` : key);
        });
    } else {
        let value = data;
        if(data == null)
            value = ''
        else if(data === true)
            value = 1
        else if(data === false)
            value = 0
        formData.append(parentKey, value);
    }
    return formData;
}
