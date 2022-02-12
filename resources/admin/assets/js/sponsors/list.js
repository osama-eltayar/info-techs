let sponsorsExcelExportUrl;
let sponsorsPdfExportUrl;
$(function () {
    $('#sponsors-search-btn').on('click',function (){
        searchSponsors();
    });

    $(document).on('click','.btn-excel',function (){
        exportSponsorsExcel();
    })
    $(document).on('click','.btn-pdf',function (){
        exportSponsorsPdf();
    })

    $(document).on('click','.delete-btn',function (){
        const url = $(this).attr('data-url')
        const id = $(this).attr('data-id')
      deleteSponsor(url).done(()=>{
          $(`.sponsor-row[data-id=${id}]`).remove()
      })
    })
})

function searchSponsors() {
    const formElement = $('#sponsors-search-form');
    const method = formElement.attr('method');
    const url = formElement.attr('action');
    const data = formElement.serializeArray()
    return $.ajax({
        url: url,
        type: method,
        data: data,
        cache: false,
    }).done((res)=>{
        $('#sponsors-list-container').html(res)
    })
}

function exportSponsorsExcel(){
    const searchData =  $('#sponsors-search-form').serialize()
    if(!sponsorsExcelExportUrl)
        sponsorsExcelExportUrl =  $('#sponsors-export-excel-form').attr('action')
    $('#sponsors-export-excel-form').attr('action',`${sponsorsExcelExportUrl}?${searchData}`)
    $('#sponsors-export-excel-form').submit();
}

function exportSponsorsPdf(){
    const searchData =  $('#sponsors-search-form').serialize()
    if(!sponsorsPdfExportUrl)
        sponsorsPdfExportUrl =  $('#sponsors-export-pdf-form').attr('action')
    $('#sponsors-export-pdf-form').attr('action',`${sponsorsPdfExportUrl}?${searchData}`)
    $('#sponsors-export-pdf-form').submit();
}

function deleteSponsor(url) {
    return $.ajax({
        url: url,
        type: "DELETE",
        cache: false,
    })
}

