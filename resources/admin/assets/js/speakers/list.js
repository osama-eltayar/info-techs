let speakersExcelExportUrl;
let speakersPdfExportUrl;
$(function () {
    $('#speakers-search-btn').on('click',function (){
        searchspeakers();
    });

    $(document).on('click','.btn-excel',function (){
        exportspeakersExcel();
    })
    $(document).on('click','.btn-pdf',function (){
        exportspeakersPdf();
    })

    $(document).on('click','.delete-btn',function (){
        const url = $(this).attr('data-url')
        const id = $(this).attr('data-id')
      deleteSpeaker(url).done(()=> {
          $(`.speaker-row[data-id=${id}]`).remove()
      })
    })
})

function searchspeakers() {
    const formElement = $('#speakers-search-form');
    const method = formElement.attr('method');
    const url = formElement.attr('action');
    const data = formElement.serializeArray()
    return $.ajax({
        url: url,
        type: method,
        data: data,
        cache: false,
    }).done((res)=>{
        $('#speakers-list-container').html(res)
    })
}

function exportspeakersExcel(){
    const searchData =  $('#speakers-search-form').serialize()
    if(!speakersExcelExportUrl)
        speakersExcelExportUrl =  $('#speakers-export-excel-form').attr('action')
    $('#speakers-export-excel-form').attr('action',`${speakersExcelExportUrl}?${searchData}`)
    $('#speakers-export-excel-form').submit();
}

function exportspeakersPdf(){
    const searchData =  $('#speakers-search-form').serialize()
    if(!speakersPdfExportUrl)
        speakersPdfExportUrl =  $('#speakers-export-pdf-form').attr('action')
    $('#speakers-export-pdf-form').attr('action',`${speakersPdfExportUrl}?${searchData}`)
    $('#speakers-export-pdf-form').submit();
}

function deleteSpeaker(url) {
    return $.ajax({
        url: url,
        type: "DELETE",
        cache: false,
    })
}

