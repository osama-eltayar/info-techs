$(function () {
    $('.join-meeting').on('click', function () {
        const courseSessionUrl = $(this).attr('data-url')
        getJoinMeetingUrl(courseSessionUrl).done(function (res){
            joinMeeting(res.join_meeting_url)
        })
    })

    $('#btn-close-iframe').on('click',function (){
        $('#meeting-iframe').addClass('hide')
       $('#meeting-iframe').attr('src','')
        $('#video-modal').modal('hide')


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
    $('#meeting-iframe').attr('src',url)
    $('#meeting-iframe').removeClass('hide')
    $('#video-modal').modal('show')
}
