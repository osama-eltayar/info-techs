let usersExcelExportUrl;
let usersPdfExportUrl;
$(function () {
    $('#users-search-btn').on('click',function (){
        searchUsers();
    });

    $(document).on('click','.btn-excel',function (){
        exportUsersExcel();
    })
    $(document).on('click','.btn-pdf',function (){
        exportUsersPdf();
    })

    $(document).on('click','.delete-btn',function (){
        const url = $(this).attr('data-url')
        const id = $(this).attr('data-id')
      deleteOwner(url).done(()=>{
          $(`.user-row[data-id=${id}]`).remove()
      })
    })
})

function searchUsers() {
    const formElement = $('#users-search-form');
    const method = formElement.attr('method');
    const url = formElement.attr('action');
    const data = formElement.serializeArray()
    return $.ajax({
        url: url,
        type: method,
        data: data,
        cache: false,
    }).done((res)=>{
        $('#users-list-container').html(res)
    })
}

function exportUsersExcel(){
    const searchData =  $('#users-search-form').serialize()
    if(!usersExcelExportUrl)
        usersExcelExportUrl =  $('#users-export-excel-form').attr('action')
    $('#users-export-excel-form').attr('action',`${usersExcelExportUrl}?${searchData}`)
    $('#users-export-excel-form').submit();
}

function exportUsersPdf(){
    const searchData =  $('#users-search-form').serialize()
    if(!usersPdfExportUrl)
        usersPdfExportUrl =  $('#users-export-pdf-form').attr('action')
    $('#users-export-pdf-form').attr('action',`${usersPdfExportUrl}?${searchData}`)
    $('#users-export-pdf-form').submit();
}

function deleteOwner(url) {
    return $.ajax({
        url: url,
        type: "DELETE",
        cache: false,
    })
}

