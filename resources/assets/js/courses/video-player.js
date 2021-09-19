const videoModal = $('#video-modal') ;
const video = videoModal.find('video')[0]
const mp4Src = $('#mp4-video') ;
let videoId ;
let duration;
let trackerInterval;
let timer = 0 ;
let timerInterval ;

$(function () {
    $('.open-video').on('click', function (e) {
        e.preventDefault();
        duration = parseInt($(this).attr('data-duration'));
        videoId = $(this).attr('data-videoId');
        let startPoint = $(this).attr('data-startPoint');
        timer = startPoint * 60 ;
        let checkpoint = checkPoint(duration) ;
        startTimer()
        startTracker(checkpoint)
        openVideoModal($(this).attr('href'),startPoint);

    })

    videoModal.on('hidden.bs.modal', function () {
        video.pause()
        video.currentTime = 0;
        mp4Src.attr('src','')
        clearInterval(timerInterval)
        clearInterval(trackerInterval)
    })
})

function openVideoModal(url,startMinute)
{
    console.log(startMinute)
    mp4Src.attr('src',url)
    video.load()
    videoModal.modal({show:true,backdrop:'static'})
    video.currentTime = startMinute * 60
    video.play()
}

function checkPoint(duration)
{
    if (duration > 120)
        return duration / 20

    if (duration > 60)
        return duration / 12

    if (duration > 30)
        return duration / 8

    if (duration > 10)
        return duration / 5

    return  1 ;
}

function startTracker(checkPoint)
{
    trackerInterval = setInterval(function () {
        updateUserTracker()

        if (duration <= getCurrentTime())
            clearInterval(trackerInterval)

        console.log(getCurrentTime())

    },checkPoint*60*1000)
}

function updateUserTracker()
{
    let check_point = getCurrentTime()
    console.log(getCurrentTime()  ,duration,Math.floor( (getCurrentTime() / duration) * 100))
    let time_progress = Math.floor( (getCurrentTime() / duration) * 100) ;

    return $.ajax({
        url  : '/courses/videos/tracker',
        type : 'Put',
        cache: false,
        data:{
            check_point,
            time_progress,
            trackable_id : videoId,
            trackable_type: 'App\\Models\\CourseVideo',
            course_id: courseId,
            video_id:videoId
        }
    })
            .done(res => {
                console.log(res)
            })
            .fail(res => {
                console.log(res)
            })
            .always(() => {
            })
}

function getCurrentTime()
{
    // return Math.round( video.currentTime / 60)
    return Math.round(timer / 60)
}

function startTimer()
{
    timerInterval = setInterval(function (){
        if (! video.paused)
            timer +=1 ;
    },1000) ;
}




