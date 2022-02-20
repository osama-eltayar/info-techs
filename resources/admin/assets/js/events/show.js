
$(function () {
    $(document).on('click','.btn-excel',function (){
        exportEventsExcel();
    })
    $(document).on('click','.btn-pdf',function (){
        exportEventsPdf();
    })
})


function exportEventsExcel(){
    $('#courses-export-excel-form').submit();
}

function exportEventsPdf(){
    $('#courses-export-pdf-form').submit();
}


