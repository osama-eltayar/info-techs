
$(function () {
    $(document).on('click','.btn-excel',function (){
        exportCoursesExcel();
    })
    $(document).on('click','.btn-pdf',function (){
        exportCoursesPdf();
    })
})


function exportCoursesExcel(){
    $('#courses-export-excel-form').submit();
}

function exportCoursesPdf(){
    $('#courses-export-pdf-form').submit();
}


