let transactionsExcelExportUrl;
let transactionsPdfExportUrl;
$(function () {
    $('#transactions-search-btn').on('click', function () {
        searchTransactions();
    });

    $(document).on('click', '.btn-excel', function () {
        exportTransactionsExcel();
    })
    $(document).on('click', '.btn-pdf', function () {
        exportTransactionsPdf();
    })

    $(document).on('click', '.delete-btn', function () {
        const url = $(this).attr('data-url')
        const id = $(this).attr('data-id')
        deleteOwner(url).done(() => {
            $(`.transaction-row[data-id=${id}]`).remove()
        })
    })
})

function searchTransactions() {
    const formElement = $('#transactions-search-form');
    const method = formElement.attr('method');
    const url = formElement.attr('action');
    const data = formElement.serializeArray()
    return $.ajax({
        url: url,
        type: method,
        data: data,
        cache: false,
    }).done((res) => {
        $('#transactions-list-container').html(res)
    })
}

function exportTransactionsExcel() {
    const searchData = $('#transactions-search-form').serialize()
    if (!transactionsExcelExportUrl)
        transactionsExcelExportUrl = $('#transactions-export-excel-form').attr('action')
    $('#transactions-export-excel-form').attr('action', `${transactionsExcelExportUrl}?${searchData}`)
    $('#transactions-export-excel-form').submit();
}

function exportTransactionsPdf() {
    const searchData = $('#transactions-search-form').serialize()
    if (!transactionsPdfExportUrl)
        transactionsPdfExportUrl = $('#transactions-export-pdf-form').attr('action')
    $('#transactions-export-pdf-form').attr('action', `${transactionsPdfExportUrl}?${searchData}`)
    $('#transactions-export-pdf-form').submit();
}

function deleteOwner(url) {
    return $.ajax({
        url: url,
        type: "DELETE",
        cache: false,
    })
}

