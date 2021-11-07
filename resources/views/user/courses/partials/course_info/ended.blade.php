<button class="btn btn-success" type="button" disabled>Events Ended</button>
<div class="message registerd  not-register"><i class="fa-solid fa-circle-check"></i>You are not registered in this course</div>
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
            <h3>Accredited CMEs</h3>
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
</ul>
