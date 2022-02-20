let ownersExcelExportUrl;
let ownersPdfExportUrl;
$(function () {
    $('#owners-search-btn').on('click',function (){
        searchOwners();
    });

    $(document).on('click','.btn-excel',function (){
        exportOwnersExcel();
    })
    $(document).on('click','.btn-pdf',function (){
        exportOwnersPdf();
    })

    $(document).on('click','.delete-btn',function (){
        const url = $(this).attr('data-url')
        const id = $(this).attr('data-id')
      deleteOwner(url).done(()=>{
          $(`.owner-row[data-id=${id}]`).remove()
      })
    })
})

function searchOwners() {
    const formElement = $('#owners-search-form');
    const method = formElement.attr('method');
    const url = formElement.attr('action');
    const data = formElement.serializeArray()
    return $.ajax({
        url: url,
        type: method,
        data: data,
        cache: false,
    }).done((res)=>{
        $('#owners-list-container').html(res)
    })
}

function exportOwnersExcel(){
    const searchData =  $('#owners-search-form').serialize()
    if(!ownersExcelExportUrl)
        ownersExcelExportUrl =  $('#owners-export-excel-form').attr('action')
    $('#owners-export-excel-form').attr('action',`${ownersExcelExportUrl}?${searchData}`)
    $('#owners-export-excel-form').submit();
}

function exportOwnersPdf(){
    const searchData =  $('#owners-search-form').serialize()
    if(!ownersPdfExportUrl)
        ownersPdfExportUrl =  $('#owners-export-pdf-form').attr('action')
    $('#owners-export-pdf-form').attr('action',`${ownersPdfExportUrl}?${searchData}`)
    $('#owners-export-pdf-form').submit();
}

function deleteOwner(url) {
    return $.ajax({
        url: url,
        type: "DELETE",
        cache: false,
    })
}

