@extends('user.layouts.app')
@section('header')
<title></title>
@endsection
@section('content')

<!-- Start Banner-->
<section class="banner" style="background-image: url('/media/images/pro3.png');">
</section>

<!-- Start Courses Card-->
<section class="courses course-details">
    <div class="container-fluid status-3">
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-12">
                <div class="top-fav text-right">
                    <div class="soical">
                        <a href="#"><i class="fa-solid fa-share-nodes"></i></a>
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter-square"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram-square"></i></a>
                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                    @if(! $course->favourite_auth_user_exists)
                        <button class="btn btn-fave add-to-fav" data-action="{{route('courses.favourite',$course->id)}}" type="button"> Add to favorite <i class="fa-solid fa-heart"></i>
                        </button>
                    @endif
                </div>
                <div class="card-content {{$course->type_class_name}}">
                    <div class="card-status">
                        {{$course->type_string}}
                    </div>

                    <div class="card-info">
                        <h2>
                            {{$course->title}}

                            <span class="view">{{$course->views_count ?? 0}} views</span>
                        </h2>
                        <h4>Description</h4>
                        <div>{!! $course->description !!}</div>
                        @if(($course->isLive() || $course->isEnded()) && $course->videos->isNotEmpty())
                        <div class="course-titles">
                            <h4>Course titles</h4>
                            <ul class="list-unstyled">
                                @foreach($course->videos as $video)
                                <li class="bold">
                                    <p>{{$loop->iteration}}: {{$video->name}}
                                        <span>{{$video->duration}}:00 min</span>
                                    </p>
                                    @if($video->is_free || $course->registered_auth_user_exists)
                                    <a href="{{$video->url}}" class="open-video"
                                       data-duration="{{$video->duration}}" data-videoId="{{$video->id}}"
                                       data-startPoint="{{optional($video->trackers->first())->check_point}}">
                                        <i class="fa-solid fa-circle-play"></i>{{$video->is_free ? 'Free' : 'paid'}}
                                    </a>
                                    @endif
                                </li>
                                @endforeach

                            </ul>
                        </div>
                        @endif
                        @if($course->isLive() && $course->sessions->isNotEmpty() )
                        <div class="course-titles">
                            <h4>Course Sessions</h4>
                            <ul class="list-unstyled">
                                @foreach($course->sessions as $session)
                                <li class="bold">
                                    <p>{{$loop->iteration}}: {{$session->name}}
                                        <span>{{$session->parsed_duration}}</span>
                                        start time :
                                        <span>{{$session->start_at}}</span>
                                    </p>
                                    @if($course->registered_auth_user_exists)
                                        <a data-url="{{route('course-sessions.show',$session->id)}}" class="join-meeting"
                                            data-available_at="{{$session->start_at}}" data-id="{{$session->id}}">
                                            <i class="fa-solid fa-circle-play"></i>join
                                        </a>
                                    @endif
                                </li>
                                @endforeach

                            </ul>
                        </div>
                        @endif

                        <div class="box-info ">
                            <div class="top-title">
                                <i class="fa-solid fa-circle-microphone-lines"></i> Chair person
                            </div>
                            @foreach($course->people as $person)
                            <div class="d-block">
                                <div class="d-block">
                                    <div class="left-side-box">
                                        <img src="/media/images/user.png" alt="user">
                                    </div>
                                    <div class="right-side-box">
                                        <p>{{$person->title}} {{$person->name}}</p>
                                    </div>
                                    <div class="bio">
                                        <span>person bio</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="box-info d-block">
                            <div class="top-title">
                                <i class="fa-solid fa-person-simple"></i> Speakers
                            </div>
                            @foreach($course->speakers as $speaker)
                            <div class="d-block">
                                <div class="left-side-box">
                                    <img src="{{$speaker->image_url}}" alt="user">
                                </div>
                                <div class="right-side-box">
                                    <p>{{$speaker->title->name}} {{$speaker->name}}</p>
                                </div>
                                <div class="bio">
                                    <span>speaker bio</span>
                                </div>
                            </div>
                            @endforeach

                        </div>

                        <div class="box-info">
                            <div class="top-title">
                                <i class="fa-solid fa-files"></i> Material
                            </div>
                            @foreach($course->materials as $material)
                            <div class="row">
                                <div class="col-6">
                                    <p><i class="fa-solid fa-files"></i> {{$material->name}}
                                        .{{$material->mime_type}} <small>1 MB</small></p>
                                </div>
                                <div class="col-6"><a href="{{$material->download_url}}" download><i
                                            class="fa-solid fa-angles-down"></i> download</a></div>
                            </div>
                            @endforeach

                        </div>

                    </div>
                </div>
                <div class="sponsor-row">
                    <h2>Sponsors</h2>
                    <ul class="list-unstyled row">
                        @foreach($course->sponsors as $sponsor)
                            <li class="type1 col-lg-3 col-md-6 col-12">
                                <div class="type">GOLD</div>
                                <a  href="#" data-toggle="modal" data-target="#sponsor{{$sponsor->id}}">
                                    <i class="fa-solid fa-crown"></i>
                                    <img src="{{$sponsor->logo_url}}" style="max-width:100px; max-height:100px;" alt="logo">
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-12">
                <div class="top-pos">
                    <div class="course-right-info">
                        <h2>Organized by</h2>
                        <div class="right-logo"><img src="{{$course->organization->logo_url}}" alt="icon"></div>
                        <div class="slide">
                            <div class="owl-carousel">
                                <div class="item">
                                    <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk"
                                       class="image-content video-trigger"
                                       style="background-image: url('/media/images/close-up-video-camera-filming-young-smiling-male-blogger.png');">
                                        <i class="fa-solid fa-circle-play"></i>
                                    </a>
                                </div>
                                <div class="item">
                                    <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk"
                                       class="image-content video-trigger"
                                       style="background-image: url('/media/images/close-up-video-camera-filming-young-smiling-male-blogger.png');">
                                        <i class="fa-solid fa-circle-play"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @if($course->isLive())
                            @includeWhen($course->registered_auth_user_exists,
                            'user.courses.partials.course_info.live-registered')
                            @includeWhen(!$course->registered_auth_user_exists, 'user.courses.partials.course_info.live')
                        @elseif($course->isEnded())
                            @includeWhen($course->registered_auth_user_exists,
                            'user.courses.partials.course_info.ended-registered')
                            @includeWhen(!$course->registered_auth_user_exists, 'user.courses.partials.course_info.ended')
                        @else
                            @includeWhen($course->registered_auth_user_exists,
                            'user.courses.partials.course_info.count-down-registered')
                            @includeWhen(!$course->registered_auth_user_exists,
                            'user.courses.partials.course_info.count-down')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection
@section('modals')
<div class="modal " id="reportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

</div>
<div class="modal survey-modal modal-xl" id="video-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <video width="100%" height="100%" controls >
                    <source src="" id="mp4-video" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                                    <button id="btn-close-iframe" class="hide" >close iframe</button>

                                    <iframe src="" id="meeting-iframe" class="hide embed-responsive-item" width="100%" height="600px"
                                            ></iframe>
            </div>
        </div>
    </div>
</div>
@foreach($course->sponsors as $sponsor)
    <div class="modal  survey-modal" id="sponsor{{$sponsor->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg  modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="row">
                        <div class="col-6">Name</div>
                        <div class="col-6">{{ $sponsor->name }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6">Description</div>
                        <div class="col-6">{{ $sponsor->description }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p><i class="fa-solid fa-files"></i> {{$sponsor->material->name}} . {{$sponsor->material->mime_type}} <small>1 MB</small></p>
                        </div>
                        <div class="col-6"><a href="{{$material->download_url}}" download>
                            <i class="fa-solid fa-angles-down"></i> download</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
@if($course->survey_id)
    <div class="modal  survey-modal" id="surveyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg  modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="top-icon"><i class="fa-solid fa-ballot-check"></i> Survey</h4>
                    <form action="{{route('courses.survey.answers.store',['course' => $course->id,'survey' =>  $course->survey->id])}}" id="survey-form" method="POST">
                        <div class="row survey-info">
                            <div class="col-md-9 col-12">
                                <p>To print your certificate you must finish this survey</p>
                            </div>
                            <div class="col-md-3 col-12 text-right">
                                <div class="num">
                                    Question <span id="current-question-number">1</span>/{{$course->survey->questions->count()}}
                                </div>
                            </div>
                        </div>
                        @foreach($course->survey->questions as $question)
                            <div class="form-group {{!$loop->first ? 'hide': ''}} survey-question-container" data-question-idx="{{$loop->iteration}}">
                                <label for="qus">{{$loop->iteration}}){{$question->title}}</label>
                                @foreach($question->answers as $answer)

                                    @if($question->type == \App\Models\SurveyQuestion::TEXT)

                                        <div class="input-group">
                                            <label class="input-group-text d-flex" for="input-{{$answer->id}}">{{$answer->title}}</label>
                                            <textarea id="input-{{$answer->id}}"  class="form-control" name="questions[{{$question->id}}][{{$answer->id}}]"></textarea>
                                        </div>
                                    @endif
                                    @if($question->type == \App\Models\SurveyQuestion::RADIO)
                                        {{$answer->title}}
                                        @foreach($answer->labels as $answerLabel)
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="answer-label{{$answerLabel->id}}" name="questions[{{$question->id}}][{{$answer->id}}]" value="{{$answerLabel->title}}" required>
                                                <label class="custom-control-label" id="answer-label{{$answerLabel->id}}">{{$answerLabel->title}}</label>
                                            </div>
                                        @endforeach
                                    @endif

                                    @if($question->type == \App\Models\SurveyQuestion::CHECKBOX)
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input type="checkbox"  class="form-check-input" id="answer-{{$answer->id}}" name="questions[{{$question->id}}][{{$answer->id}}]" value="{{$answer->title}}" required >
                                                <label class="form-check-label"  id="answer-{{$answer->id}}">{{$answer->title}}</label>
                                            </div>
                                        </div>
                                    @endif

                                @endforeach
                            </div>
                        @endforeach
                        <button class="btn btn-default submit-question-btn" type="button">Submit</button>
                        <h3 class="message text-center survey-success-msg hide"><i class="fa-solid fa-circle-check"></i> Congratulation you can now print your certificate</h3>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endif
@endsection



@section('script')
    <script>
     var courseId = "{{$course->id}}"
     let surveyQuestionIdx = 1;
     @if($course->survey_id)
     let surveyQuestionCount = '{{$course->survey->questions->count()}}'
     @endif
    </script>
<script src="/js/courses/show.min.js"></script>
    <script>
        $(function () {
            $(document).on('click', '.print-certificate-btn', function (e) {
                e.preventDefault();
                $('#certificate-form').attr('action', $(this).attr('href'))
                $('#certificate-form').submit();
            })

            $(document).on('click','.send-certificate-btn',function (e){
                e.preventDefault()
                sendEmailRequest($(this).attr('href'))
            });

            $('.submit-question-btn').on('click',function (){
                surveyQuestionIdx++;
                if(surveyQuestionIdx <= surveyQuestionCount ){
                    $('.survey-question-container').addClass('hide')
                    $(`.survey-question-container[data-question-idx=${surveyQuestionIdx}]`).removeClass('hide')
                    $('#current-question-number').text(surveyQuestionIdx)
                }else{
                    storeSurveyAnswers()
                }


            })
        })

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

        function storeSurveyAnswers(){
            $('.submit-question-btn').prop('disabled',true)
            console.log($('#survey-form').serializeArray())
            const formElement = $('#survey-form')
            const action = formElement.attr('action')
            const method = formElement.attr('method')
            const data = new FormData(formElement[0])
            $.ajax({
                url: action ,
                type: method,
                cache: false,
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                contentType:false,
                processData:false
            })
                .done(res => {
                    $('.survey-success-msg').removeClass('hide')
                })
                .fail(res => {
                    $('.submit-question-btn').prop('disabled',false)
                })
                .always(() => {
                })
        }


    </script>
@endsection
