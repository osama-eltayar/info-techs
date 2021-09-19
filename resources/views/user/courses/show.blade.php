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

                            <span class="view">200 views</span>
                        </h2>
                        <h4>Description</h4>
                        <div>{!! $course->description !!}</div>
                        <div class="course-titles">
                            <h4>Course titles</h4>
                            <ul class="list-unstyled">
                                @foreach($course->videos as $video)
                                <li class="bold">
                                    <p>{{$loop->iteration}}: {{$video->name}}
                                        <span>{{$video->duration}}:00 min</span>
                                    </p>
                                    @if($video->is_free || $course->registered_users_exists)
                                    <a href="{{$video->url}}" class="open-video">
                                        <i class="fa-solid fa-circle-play"></i>{{$video->is_free ? 'Free' : 'paid'}}
                                    </a>
                                    @endif
                                </li>
                                @endforeach

                            </ul>
                        </div>
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
                                    <a data-url="{{route('course-sessions.show',$session->id)}}" class="join-meeting"
                                        data-available_at="{{$session->start_at}}">
                                        <i class="fa-solid fa-circle-play"></i>join
                                    </a>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="box-info">
                            <div class="top-title">
                                <i class="fa-solid fa-circle-microphone-lines"></i> Chair person
                            </div>
                            @foreach($course->people as $person)
                            <div>
                                <p>{{$person->title}} {{$person->name}} <span>({{$person->speciality}})</span>
                                </p>
                            </div>
                            @endforeach
                        </div>

                        <div class="box-info">
                            <div class="top-title">
                                <i class="fa-solid fa-person-simple"></i> Speakers
                            </div>
                            @foreach($course->speakers as $speaker)
                            <div class="left-side-box">
                                <img src="{{$speaker->image_url}}" alt="user">
                            </div>
                            <div class="right-side-box">
                                <p>{{$speaker->title}} {{$speaker->name}}
                                    <span>({{$speaker->speciality->name}})</span></p>
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
                                <div class="col-6"><a href="{{$material->download_url}}"><i
                                            class="fa-solid fa-angles-down"></i> download</a></div>
                            </div>
                            @endforeach

                        </div>

                    </div>
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
                            @includeWhen($course->registered_users_exists,
                            'user.courses.partials.course_info.live-registered')
                            @includeWhen(!$course->registered_users_exists, 'user.courses.partials.course_info.live')
                        @elseif($course->isEnded())
                            @includeWhen($course->registered_users_exists,
                            'user.courses.partials.course_info.ended-registered')
                            @includeWhen(!$course->registered_users_exists, 'user.courses.partials.course_info.ended')
                        @else
                            @includeWhen($course->registered_users_exists,
                            'user.courses.partials.course_info.count-down-registered')
                            @includeWhen(!$course->registered_users_exists,
                            'user.courses.partials.course_info.count-down')
                        @endif

                        <div class="sponsor-row">
                            <h2>Sponsors</h2>
                            <ul class="list-unstyled row">
                                @foreach($course->sponsors as $sponsor)
                                    <li class="type1 col-lg-3 col-md-6 col-12">
                                        <div class="type">GOLD</div>
                                        <a href="#">
                                            <i class="fa-solid fa-crown"></i>
                                            <img src="{{$sponsor->logo_url}}" alt="logo">
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection
@section('modals')
<div class="modal   survey-modal modal-xl" id="video-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <video width="100%" height="100%" controls>
                    <source src="" id="mp4-video" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                {{--                    <button id="btn-close-iframe" class="hide" >close iframe</button>--}}

                {{--                    <iframe src="" id="meeting-iframe" class="hide" width="100%" height="100%"--}}
                {{--                            ></iframe>--}}
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="/js/courses/show.min.js"></script>
@endsection
