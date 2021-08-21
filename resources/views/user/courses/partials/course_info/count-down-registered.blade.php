@if($course->isLive())
    <button class="btn btn-success" type="button">Live now</button>
@elseif($course->isEnded())
    <button class="btn btn-success" type="button" disabled>Events Ended</button>
@else
    <button class="btn btn-success" type="button" >Count Down</button>
@endif
<div class="message {{$course->isEnded() ? 'registerd' : '' }} {{$course->registered_users_exists ?: 'not-register' }}"><i class="fa-solid fa-circle-check"></i>{{$course->registered_users_exists ? 'You are already registered in this event' : 'You are not registered in this course' }} </div>
@if($course->registered_users_exists)
    <div class="printer text-center">
        <button type="button" class="btn-printer"><i class="fa-solid fa-print"></i> Print Badge</button>
    </div>
@else
    <div class="icon price">
        <i class="fa-solid fa-sack-dollar"></i> <b>Price:</b> <span> $20 </span> <del>$25</del>
        <div class="scissors">
            <i class="fa-solid fa-scissors"></i> this price is valid Before 25/5/2021
            <strong>Price: <b>$30</b></strong>
        </div>
    </div>
@endif


<ul class="list-unstyled list-info">
    @if($course->registered_users_exists)
        <li class="congratulation-li">
            <h3>Congratulation you have finished this course</h3>
        </li>
        <li>
            <h3>Certification Availability</h3>
            <p>100% attendance</p>
        </li>
        <li>
            <h3>Attendance report</h3>
            <p>Generate report</p>
        </li>
        <div class="print-list text-center">
            <div class="top-icon ">
                <i class="fa-solid fa-file-certificate"></i>
                <small><i class="fa-solid fa-magnifying-glass"></i></small>
            </div>
            <p class="success-text">Congratulation You have enrolled
                70% from the event</p>
            <a href="#" class="btn btn-outline"><i class="fa-solid fa-print"></i> Print cerrtificate</a>
            <a href="#" class="btn btn-outline"><i class="fa-solid fa-envelope"></i> Send by mail</a>

            <p class="danger-text"><i class="fa-solid fa-triangle-exclamation"></i> Your personal information not complete please update
                your information tp print your certificate</p>
            <div class="bottom-icon">
                <span><i class="fa-solid fa-file-certificate"></i></span>
                <p>Sorry You don't have the permission
                    to print your certificate <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="right" title="You done have the attenedance percentage">
                        <i class="fa-solid fa-circle-info"></i>
                    </button></p>
            </div>
        </div>

        <div class="footer-card">
            <a class="btn-calender"><i class="fa-solid fa-calendar-check"></i> Add to callender</a>
            <div class="icon-mail">
                <a href="#"><img src="/media/images/icon-emd-share-google-t1.png" alt="icon"></a>
                <a href="#"><img src="/media/images/icon-emd-share-outlook-t1.png" alt="icon"></a>
                <a href="#"><img src="/media/images/icon-emd-share-outlookcom-t1.png" alt="icon"></a>
            </div>

        </div>
    @else
        <li>
            <h3>Event date and time</h3>
            <p>yes</p>
        </li>
        <li>
            <h3>Specialities</h3>
            <p>Monday 25 june 2021 (03:00 pm - 05:00 pm) - <span>Open</span></p>
        </li>
        <li>
            <h3>Speciality</h3>
            <p>Orthodontics - Medical - Social</p>
        </li>
        <li>
            <h3>Accreditation number (CME's)</h3>
            <p>3</p>
        </li>
        <li>
            <h3>Available seats</h3>
            <p>20</p>
        </li>
        <li>
            <h3>Certification Availability</h3>
            <p>70% attendance</p>
        </li>
        <li>
            <h3>Certification Availability</h3>
            <p>70% attendance</p>
        </li>
        <li>
            <h3>Payment Method</h3>
            <img src="/media/images/pay.png" alt="pay">
            <img src="/media/images/mastercard.png" alt="mastercard">
            <img src="/media/images/visa.png" alt="visa">
        </li>
    @endif
</ul>
