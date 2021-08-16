const videoModal = $('#video-modal') ;
const video = videoModal.find('video')[0]
const mp4Src = $('#mp4-video') ;

function openVideoModal(url)
{
    mp4Src.attr('src',url)
    video.load()
    videoModal.modal({show:true,backdrop:'static'})
    video.play()
}

$(function () {
    $('.open-video').on('click', function (e) {
        e.preventDefault();
        openVideoModal($(this).attr('href'));
    })

    videoModal.on('hidden.bs.modal', function () {
        video.pause()
        video.currentTime = 0;
        mp4Src.attr('src','')
    })
})

