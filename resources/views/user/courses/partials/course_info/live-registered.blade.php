<button class="btn btn-success" type="button">Live now</button>
<div class="message  "><i class="fa-solid fa-circle-check"></i>You are already registered in this event</div>

@if($course->isHybrid() || $course->isPhysical())
    <div class="printer text-center">
        <button type="button" class="btn-printer"
                onclick="window.location.href = '{{route('invoices.print',$course->id)}}'"><i class="fa-solid fa-print"></i>
            Print Badge
        </button>
    </div>
@endif

<ul class="list-unstyled list-info">
    <li>
        <h3>Event date and time</h3>
        <p>{{$course->start_date}}<span>Open</span></p>
    </li>
    <li>
        <h3>Speciality</h3>
        <p>{{$course->specialities->pluck('name')->join(' - ')}}</p>
    </li>
    @if($course->cme_count)
        <li>
            <h3>Accreditation number (CME's)</h3>
            <p>{{$course->cme_count}}</p>
        </li>
    @endif
    @if($course->certificate)
        <li>
            <h3>Certification Availability</h3>
            <p>{{$course->certificate}}% attendance</p>
        </li>
    @endif

    <li>
        <h3>Attendance report</h3>
        <a href="{{route('attendance-report',$course->id)}}" id="attendance-report">Generate report</a>
    </li>
    <li class="congratulation-li">
        <h3>Congratulation you have finished this course</h3>
    </li>
    <div class="print-list text-center">
        <div class="top-icon ">
            <i class="fa-solid fa-file-certificate"></i>
            <small><i class="fa-solid fa-magnifying-glass"></i></small>
        </div>
        @if($course->auth_user_trackers_sum_check_point >= $course->successNeededMinutes())
            <p class="success-text">Congratulation You have enrolled
                {{$course->certificate}}% from the event</p>
        @endif

        @if(! auth()->user()->profile()->exists())
            <p class="danger-text"><i class="fa-solid fa-triangle-exclamation"></i> Your personal information not
                complete please update
                your information tp print your certificate</p>
        @elseif($course->auth_user_trackers_sum_check_point >= $course->successNeededMinutes())
            <form action="" id="certificate-form" method="POST">
                @csrf
            </form>
            <a href="{{route('certificates.print',$course->id)}}" class="btn btn-outline"><i class="fa-solid fa-print"></i> Print certificate</a>
            <a href="{{route('certificates.send',$course->id)}}" class="btn btn-outline"><i class="fa-solid fa-envelope"></i> Send by mail</a>
        @else
            <div class="bottom-icon">
                <span><i class="fa-solid fa-file-certificate"></i></span>
                <p>Sorry You don't have the permission
                    to print your certificate
                    <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="right"
                            title="You done have the attendance percentage">
                        <i class="fa-solid fa-circle-info"></i>
                    </button>
                </p>
            </div>
        @endif
    </div>

    <div class="footer-card">
        <a class="btn-calender"><i class="fa-solid fa-calendar-check"></i> Add to calender</a>
        <div class="icon-mail">
            <a href="#"><img src="/media/images/icon-emd-share-google-t1.png" alt="icon"></a>
            <a href="#"><img src="/media/images/icon-emd-share-outlook-t1.png" alt="icon"></a>
            <a href="#"><img src="/media/images/icon-emd-share-outlookcom-t1.png" alt="icon"></a>
        </div>
    </div>
</ul>
