
$(function () {
    $(document).on('click', '.btn-excel', function () {
        exportEventsExcel();
    })
    $(document).on('click', '.btn-pdf', function () {
        exportEventsPdf();
    })


    $(document).on('change', '#certificate-input', function () {
        console.log("|asdsd")
        renderCertificateImg();
    })
    $(document).on('change', '#imageUpload', function () {
        $(".avatar-preview").show()
        readURL(this);
    })

    // $(document).on('click','#save-certificate-img-btn',function (){
    //     uploadCertificateImg();
    // })
    $('#certificate-form').on('submit', function (e) {
        e.preventDefault();
        uploadCertificateImg();
    })
})


function exportEventsExcel() {
    $('#courses-export-excel-form').submit();
}

function exportEventsPdf() {
    $('#courses-export-pdf-form').submit();
}

function renderCertificateImg() {
    const file = $('#certificate-input')[0].files[0];
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function (e) {
        const img = $('#certificate-img');
        img.attr('src', this.result);
    }
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
function uploadCertificateImg() {
    const data = new FormData($('#certificate-form')[0])
    const badgeData = new FormData($('#badge-form')[0])
    data.append('_method', 'PUT');
    data.append('badge', badgeData.get('badge'));
    // data.append('certificate_img',$('#imageUpload').val())
    const url = $('#imageUpload').attr('data-url')
    $.ajax({
        url,
        type: 'POST',
        cache: false,
        data: data,
        contentType: false,
        processData: false
    })
        .done(res => {

        })
        .fail(res => {
        })
        .always(() => {
        })
}


