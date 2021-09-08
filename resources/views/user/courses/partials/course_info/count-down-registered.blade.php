<button class="btn btn-success" type="button">Count Down</button>
<div class="message "><i class="fa-solid fa-circle-check"></i>You are already registered in this event</div>
<div class="printer text-center">
    <button type="button" class="btn-printer"><i class="fa-solid fa-print"></i> Print Badge</button>
</div>
<ul class="list-unstyled list-info">
    <li>
        <h3>Event date and time</h3>
        <p>Monday 25 june 2021 (03:00 pm - 05:00 pm) - <span>Open</span></p>
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
    @if($course->seats)
        <li>
            <h3>Available seats</h3>
            <p>{{$course->seats}}</p>
        </li>
    @endif
    @if($course->certificate)
        <li>
            <h3>Certification Availability</h3>
            <p>{{$course->certificate}}% attendance</p>
        </li>
    @endif
    <div class="footer-card">
        <a class="btn-calender"><i class="fa-solid fa-calendar-check"></i> Add to calender</a>
        <div class="icon-mail">
            <a href="#"><img src="/media/images/icon-emd-share-google-t1.png" alt="icon"></a>
            <a href="#"><img src="/media/images/icon-emd-share-outlook-t1.png" alt="icon"></a>
            <a href="#"><img src="/media/images/icon-emd-share-outlookcom-t1.png" alt="icon"></a>
        </div>
    </div>
</ul>
