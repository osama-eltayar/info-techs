$(function () {
    $('.join-meeting').on('click', function (e) {
        e.preventDefault()
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

    $('.add-to-cart').on('click',function (){
       addToCart($(this).attr('data-courseId'), $(this).attr('data-action'))
    });

    $('.add-to-fav').on('click',function (){
        console.log('fav')
       addToFavourite($(this))
    });
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

function addToCart(courseId,url)
{
    let data = {
        'course_id': courseId
    };

    $.ajax({
        url,
        type: 'post',
        data,
    })
     .done(res => {
         window.location.href = '/shopping-cart' ;
     })
     .fail(res => {
         element.attr('disabled', false)

     })
     .always(() => {
     })
}
function addToFavourite(element)
{
    let url = element.attr('data-action');
    $.ajax({
        url : url,
        type: 'post',
    })
     .done(res => {
         $('#favourite-courses-count').text( +$('#favourite-courses-count').text() + 1 )
         element.remove()
     })
     .fail(res => {
         element.toggleClass('active-red')
     })
     .always(() => {
     })
}
