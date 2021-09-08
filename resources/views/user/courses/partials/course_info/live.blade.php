
<button class="btn btn-success" type="button">Register now</button>

<div class="message not-register"><i class="fa-solid fa-circle-check"></i>You are not registered in this course</div>

<div class="icon price">
    <i class="fa-solid fa-sack-dollar"></i> <b>Price:</b> <span> ${{$course->price}} </span>
{{--    <del>$25</del>--}}
{{--    <div class="scissors">--}}
{{--        <i class="fa-solid fa-scissors"></i> this price is valid Before 25/5/2021--}}
{{--        <strong>Price: <b>$30</b></strong>--}}
{{--    </div>--}}
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
        <li>
            <h3>Payment Method</h3>
            <img src="/media/images/pay.png" alt="pay">
            <img src="/media/images/mastercard.png" alt="mastercard">
            <img src="/media/images/visa.png" alt="visa">
        </li>
</ul>
