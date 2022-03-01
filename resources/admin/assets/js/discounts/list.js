let discountsExcelExportUrl;
let discountsPdfExportUrl;
$(function () {
    $('#discounts-search-btn').on('click',function (){
        searchDiscounts();
    });

    $(document).on('click','.btn-excel',function (){
        exportDiscountsExcel();
    })
    $(document).on('click','.btn-pdf',function (){
        exportDiscountsPdf();
    })

    $(document).on('click','.delete-btn',function (){
        const url = $(this).attr('data-url')
        const id = $(this).attr('data-id')
      deleteDiscount(url).done(()=>{
          $(`.discount-row[data-id=${id}]`).remove()
      })
    })
})

function searchDiscounts() {
    const formElement = $('#discounts-search-form');
    const method = formElement.attr('method');
    const url = formElement.attr('action');
    const data = formElement.serializeArray()
    return $.ajax({
        url: url,
        type: method,
        data: data,
        cache: false,
    }).done((res)=>{
        $('#discounts-list-container').html(res)
    })
}

function exportDiscountsExcel(){
    const searchData =  $('#discounts-search-form').serialize()
    if(!discountsExcelExportUrl)
        discountsExcelExportUrl =  $('#discounts-export-excel-form').attr('action')
    $('#discounts-export-excel-form').attr('action',`${discountsExcelExportUrl}?${searchData}`)
    $('#discounts-export-excel-form').submit();
}

function exportDiscountsPdf(){
    const searchData =  $('#discounts-search-form').serialize()
    if(!discountsPdfExportUrl)
        discountsPdfExportUrl =  $('#discounts-export-pdf-form').attr('action')
    $('#discounts-export-pdf-form').attr('action',`${discountsPdfExportUrl}?${searchData}`)
    $('#discounts-export-pdf-form').submit();
}

function deleteDiscount(url) {
    return $.ajax({
        url: url,
        type: "DELETE",
        cache: false,
    })
}

