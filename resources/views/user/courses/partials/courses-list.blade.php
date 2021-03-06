<div class="num">
    Total {{$courses->count()}} items
</div>
<div class="row row-cards">
    @foreach($courses as $course)
        <div class="col-xl-3 col-lg-4 col-md-6 col-12 single-course" data-course-id="{{$course->id}}">
            <div class="card-content {{$course->type_class_name}}">
                <div class="card-status">
                    {{$course->type_string}}
                </div>
                <div class="img-card">
                    <img src="/media/images/product.png" alt="product">
                    @auth()
                        <button data-action="{{route('courses.favourite',$course->id)}}" type="button"
                                class="fav {{$course->favourite_auth_user_exists ? 'active-red' : NULL}}"><i
                                class="fa-solid fa-heart "></i></button>
                    @endauth
                    <span class="info"><i class="fa-solid fa-circle-info"></i></span>
                </div>
                <div class="card-info">
                    <div class="box-clickable " onclick="window.location.href='{{route('courses.show' ,$course->id )}}'">
                    <h3>{{$course->title}}</h3>
                    @if($course->activeDiscount)
                        @if($course->activeDiscount->date)
                            <div class="icon price">
                                <i class="fa-solid fa-dollar-sign"></i> <b>Price:</b> <span><small class="currency" style="color: black !important;">SAR</small>{{$course->activeDiscount->price}}</span> <small>Before {{$course->activeDiscount->formattedDate}}</small>
                            </div>
                        @else
                            <div class="icon price">
                                <i class="fa-solid fa-dollar-sign"></i> <b>Price:</b>
                                <span> <small class="currency" style="color: black">SAR</small>{{$course->activeDiscount->price}} </span>
                                <del><small class="currency" style="color: red !important;">SAR</small>{{$course->price}}</del>
                            </div>
                        @endif
                    @else
                        <div class="icon price">
                            <i class="fa-solid fa-dollar-sign"></i> <b>Price:</b>
                            <span>
                                @if($course->price)  <small class="currency" style="color: black">SAR</small>{{$course->price}}
                                @else
                                    Free
                                @endif</span>
                        </div>
                    @endif
                    <div class="icon date">
                        <i class="fa-solid fa-calendar-day"></i> <b>Date:</b> {{$course->formatted_start_date}}
                    </div>
                    </div>
                    <p class="view">{{$course->views_count ?? 0}} views</p>
                    <div class="text-center">
                        @if($course->registered_auth_user_exists)
                            <button type="button" class="btn btn-default "
                                    onclick="window.location.href = '{{route('courses.show',$course->id)}}'"><i
                                    class="fa-solid fa-cart-plus"></i>
                                View
                            </button>

                        @elseif($course->shopping_cart_auth_user_exists)
                            <button type="button" class="btn btn-default "
                                    onclick="window.location.href = '{{route('shopping-cart.index')}}'"><i
                                    class="fa-solid fa-cart-plus"></i>
                                Pay now
                            </button>
                        @else
                            <button type="button" data-action="{{route('shopping-cart.store')}}"
                                    class="btn btn-default add-cart">
                                <i class="fa-solid fa-cart-plus"></i>
                                Add
                                to cart
                            </button>
                        @endif
                    </div>
                </div>

                <div class="overlay">
                    <span class="close-card"><i class="fa-solid fa-circle-xmark"></i></span>
                    <h4>
                        {{$course->title}}
                    </h4>
                    <p>Details</p>
                    <div class="status-info">
                        <div class="status-text">
                            <span></span> <small>{{$course->type_string}}</small>
                        </div>
                        <div class="price">
                            <b>Price:</b>
                            {{$course->price ? '$' . $course->price  : 'Free'}}
                        </div>
                    </div>
                    <div class="icon-info">
                        <div class="icon">
                            <i class="fa-solid fa-calendar-day"></i>
                            <div class="icon-text">
                                <span><b>Date:</b> {{$course->formatted_start_date}}</span>
                                <span> {{$course->formatted_from}} : {{$course->formatted_to}} </span>
                            </div>
                        </div>

                        <div class="icon">
                            <i class="fa-solid fa-briefcase-clock"></i>
                            <div class="icon-text">
                                <span><b>Time:</b> {{$course->hours_count}} hours</span>
                            </div>
                        </div>
                    </div>

                    <div class="icon-info">
                        <div class="icon">
                            <i class="fa-solid fa-trophy-star"></i>
                            <div class="icon-text">
                                <span><b>Organized by:</b></span>
                                <span>{{$course->organization->name}}</span>
                                <span><img src="{{$course->organization->logo_url}}" alt="logo"></span>
                            </div>
                        </div>
                    </div>

                    <ul class="list-unstyled">
                        <li>
                            <h3>Accreditation number (CME's)</h3>
                            <p>{{$course->cme_count ? 'Yes' : 'No'}}</p>
                        </li>
                        <li>
                            <h3>Specialities</h3>
                            <p>{{$course->specialities->pluck('name')->join(' - ')}}</p>
                        </li>
                        <li>
                            <h3>Speakers</h3>
                            @foreach($course->speakers as $speaker)
                                <p>{{$speaker->name}}</p>
                            @endforeach
                        </li>
                        @if($course->seats)
                            <li>
                                <h3>Available seats</h3>
                                <p>{{$course->seats}}</p>
                            </li>
                        @endif
                        @if($course->cme_count)
                            <li>
                                <h3>Total of CME's</h3>
                                <p>{{$course->cme_count}}</p>
                            </li>
                        @endif
                    </ul>

                    <div class="sponsor">
                        <h3>Sponsors</h3>
                        @foreach($course->sponsors as $sponsor)
                            <img src="{{$sponsor->logo_url}}" alt="logo">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
