$(function () {
    $('.join-meeting').on('click', function (e) {
        e.preventDefault()
        const courseSessionUrl = $(this).attr('data-url')
        // sessionId = $(this).attr('data-id')
        getJoinMeetingUrl(courseSessionUrl).done(function (res) {
            joinMeeting(res.join_meeting_url)
        })
    })

    $('#btn-close-iframe').on('click', function () {
        $('#meeting-iframe').addClass('hide')
        $('#meeting-iframe').attr('src', '')
        $('#video-modal').modal('hide')


    })

    $(document).on('click','.close',function (){
        $('#btn-close-iframe').click()
    })

    $('.add-to-cart').on('click', function () {
        addToCart($(this).attr('data-courseId'), $(this).attr('data-action'))
    });

    $('.add-to-fav').on('click', function () {
        console.log('fav')
        addToFavourite($(this))
    });

    $(document).on('click', '.print-certificate-btn', function (e) {
        e.preventDefault();
        $('#certificate-form').attr('action', $(this).attr('href'))
        $('#certificate-form').submit();
    })

    $(document).on('click','.send-certificate-btn',function (e){
        e.preventDefault()
        sendEmailRequest($(this).attr('href'))
    });

    $(document).on('click','#attendance-report',function (e){
        console.log('clicked')
        e.preventDefault();
        getAttendanceReport($(this).attr('href'))
    })
})

function getJoinMeetingUrl(url) {
    return $.ajax({
        url: url,
        type: 'GET',
        cache: false,
    })
        .done(res => {
        })
        .fail(res => {
        })
        .always(() => {
        })
}

function joinMeeting(url) {
    $('video').hide()
    window.open(url, '_blank').focus();
    // $('#meeting-iframe').attr('src', url)
    // $('#meeting-iframe').removeClass('hide')
    // $('#video-modal').modal('show')
}

function addToCart(courseId, url) {
    let data = {
        'course_id': courseId
    };

    $.ajax({
        url,
        type: 'post',
        data,
    })
        .done(res => {
            window.location.href = '/shopping-cart';
        })
        .fail(res => {
            element.attr('disabled', false)

        })
        .always(() => {
        })
}

function addToFavourite(element) {
    let url = element.attr('data-action');
    $.ajax({
        url: url,
        type: 'post',
    })
        .done(res => {
            $('#favourite-courses-count').text(+$('#favourite-courses-count').text() + 1)
            element.remove()
        })
        .fail(res => {
            element.toggleClass('active-red')
        })
        .always(() => {
        })
}


function sendEmailRequest(url)
{
    return $.ajax({
        url: url ,
        type: 'post',
    })
            .done(res => {
            })
            .fail(res => {
            })
            .always(() => {
            })
}

function getAttendanceReport(url)
{
    $.ajax({
        url: url ,
        type: 'get',
    })
            .done(res => {
                $('#reportModal').html(res).modal('show')
            })
            .fail(res => {
            })
            .always(() => {
            })
}
