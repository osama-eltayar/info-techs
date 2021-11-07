
<button class="btn btn-success add-to-cart" data-action="{{route('shopping-cart.store')}}" data-courseId="{{$course->id}}" type="button">Register now</button>

<div class="message not-register"><i class="fa-solid fa-circle-check"></i>You are not registered in this course</div>

@if($course->activeDiscount)
    @if($course->activeDiscount->date)
        <div class="icon price">
            <div class="scissors">
                <i class="fa-solid fa-scissors"></i> this price is valid Before {{$course->activeDiscount->date}}
                <strong>Price: <b>${{$course->activeDiscount->price}}</b></strong>
            </div>
        </div>
    @else
        <div class="icon price">
            <i class="fa-solid fa-sack-dollar"></i> <b>Price:</b> <span> ${{$course->activeDiscount->price}} </span>
            <del>${{$course->price}}</del>
        </div>
    @endif
@else
    <div class="icon price">
        <i class="fa-solid fa-sack-dollar"></i> <b>Price:</b> <span> ${{$course->price}} </span>
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
        <li>
            <h3>Payment Method</h3>
            <img src="/media/images/pay.png" alt="pay">
            <img src="/media/images/mastercard.png" alt="mastercard">
            <img src="/media/images/visa.png" alt="visa">
        </li>
</ul>
