
$(function () {
    $(document).on('click','.btn-excel',function (){
        exportEventsExcel();
    })
    $(document).on('click','.btn-pdf',function (){
        exportEventsPdf();
    })
})


function exportEventsExcel(){
    $('#registered-users-export-excel-form').submit();
}

function exportEventsPdf(){
    $('#registered-users-export-pdf-form').submit();
}


