let eventsExcelExportUrl;
let eventsPdfExportUrl;
$(function () {
    $('#events-search-btn').on('click', function () {
        searchEvents();
    });

    $(document).on('click', '.btn-excel', function () {
        exportEventsExcel();
    })
    $(document).on('click', '.btn-pdf', function () {
        exportEventsPdf();
    })

    $(document).on('click', '.publish-btn', function () {
        const url = $(this).attr('data-url')
        const id = $(this).attr('data-id')
        publishEvent(url).done(() => {
            $(`.publish-btn[data-id=${id}]`).remove()
        })
    })
})

function searchEvents() {
    const formElement = $('#events-search-form');
    const method = formElement.attr('method');
    const url = formElement.attr('action');
    const data = formElement.serializeArray()
    return $.ajax({
        url: url,
        type: method,
        data: data,
        cache: false,
    }).done((res) => {
        $('#events-list-container').html(res)
    })
}

function exportEventsExcel() {
    const searchData = $('#events-search-form').serialize()
    if (!eventsExcelExportUrl)
        eventsExcelExportUrl = $('#events-export-excel-form').attr('action')
    $('#events-export-excel-form').attr('action', `${eventsExcelExportUrl}?${searchData}`)
    $('#events-export-excel-form').submit();
}

function exportEventsPdf() {
    const searchData = $('#events-search-form').serialize()
    if (!eventsPdfExportUrl)
        eventsPdfExportUrl = $('#events-export-pdf-form').attr('action')
    $('#events-export-pdf-form').attr('action', `${eventsPdfExportUrl}?${searchData}`)
    $('#events-export-pdf-form').submit();
}

function publishEvent(url) {
    return $.ajax({
        url: url,
        type: "PUT",
        cache: false,
    })
}

