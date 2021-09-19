<button class="btn btn-success" type="button" disabled>Events Ended</button>
<div class="message registerd not-register"><i class="fa-solid fa-circle-check"></i>You are already registered in this
    event
</div>
<ul class="list-unstyled list-info">
    <li>
        <h3>Event date and time</h3>
        <p>{{$course->start_date}}</p>
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
        <p>Generate report</p>
    </li>
    <li class="congratulation-li">
        <h3>Congratulation you have finished this course</h3>
    </li>
    <div class="print-list text-center">
        <div class="top-icon ">
            <i class="fa-solid fa-file-certificate"></i>
            <small><i class="fa-solid fa-magnifying-glass"></i></small>
        </div>

        <p class="success-text">Congratulation You have enrolled
            70% from the event</p>

        @if(! auth()->user()->profile()->exists())
            <p class="danger-text"><i class="fa-solid fa-triangle-exclamation"></i> Your personal information not
                complete please update
                your information tp print your certificate</p>
        @else
            <a href="#" class="btn btn-outline"><i class="fa-solid fa-print"></i> Print certificate</a>
            <a href="#" class="btn btn-outline"><i class="fa-solid fa-envelope"></i> Send by mail</a>
            <div class="bottom-icon">
                <span><i class="fa-solid fa-file-certificate"></i></span>
                <p>Sorry You don't have the permission
                    to print your certificate
                    <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="right"
                            title="You done have the attenedance percentage">
                        <i class="fa-solid fa-circle-info"></i>
                    </button>
                </p>
            </div>
        @endif

    </div>


</ul>
