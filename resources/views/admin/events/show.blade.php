@extends('admin.layouts.app')
@section('content')
<!-- Start Content -->
<div class="content-side">
    <div class="page-title">
        <div class="container-fluid "><h1><img src="/admin/assets/img/icon2.png" alt="icon">Event details</h1></div>

    </div>
    <div class="container-fluid bg-blue">
        <div class="content-body">
            <div class="event-title">
                <span><strong>Event Title:</strong>  About Sociology</span>
                <ul class="list-unstyled">
                    <li>{{$event->state}}</li>
                </ul>
                <div class="event-status">
                    @if ($event->isOnlineEvent())
                    <span>Event Online</span>
                    @endif
                </div>
            </div>

            <div class="tabs-event">
                <ul class="nav nav-pills " id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="pills-1-tab" data-bs-toggle="pill" data-bs-target="#pills-1" type="button" role="tab" aria-controls="pills-1" aria-selected="true"><i class="fa-solid fa-square-info"></i> Event Details</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="pills-2-tab" data-bs-toggle="pill" data-bs-target="#pills-2" type="button" role="tab" aria-controls="pills-2" aria-selected="false"><i class="fa-solid fa-file-certificate"></i> Certificate & Badges</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="pills-3-tab" data-bs-toggle="pill" data-bs-target="#pills-3" type="button" role="tab" aria-controls="pills-3" aria-selected="false"><i class="fa-solid fa-video"></i> Zoom Link</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-4-tab" data-bs-toggle="pill" data-bs-target="#pills-4" type="button" role="tab" aria-controls="pills-4" aria-selected="true"><i class="fa-solid fa-flag"></i> Event status</button>
                    </li>
                     
                  </ul>

                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="box-date">
                                    <h3><i class="fa-solid fa-align-left"></i>  General Information</h3>
                                    <div class="list-date">
                                        <ul class="list-unstyled">
                                            <li>
                                                <span class="left-side">Course type:</span>
                                                <span class="right-side">{{$event->type_string}}</span>
                                            </li>
                                            <li>
                                                <span class="left-side">Course Name:</span>
                                                <span class="right-side">
                                                    <p>{{$event->title_en}}</p>
                                                    <p>{{$event->title_ar}}</p>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="left-side">Course Date:</span>
                                                <span class="right-side">
                                                    <p>{{$event->formatted_start_date}}</p>
                                                    <p>{{$event->formatted_end_date}}</p>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="left-side">Available seats:</span>
                                                <span class="right-side">{{$event->seats}} seats</span>
                                            </li>
                                            <li>
                                                <span class="left-side">Accreditation number (CME's)</span>
                                                <span class="right-side">{{$event->cme_count}}</span>
                                            </li>
                                            <li>
                                                <span class="left-side">Certification Availabilty:</span>
                                                <span class="right-side">
                                                    {{$event->certificate}}% 
                                                    {{-- (show on) --}}
                                                </span>
                                            </li>
                                            <li>
                                                <span class="left-side">Course Survey:</span>
                                                <span class="right-side"></span>
                                            </li>
                                            <li>
                                                <span class="left-side">Speciality:</span>
                                                <span class="right-side">{{$event->specialities_string}}</span>
                                            </li>
                                            <li>
                                                <span class="left-side">Event Qwner:</span>
                                                <span class="right-side">{{optional($event->organization)->name}}</span>
                                            </li>
                                            <li>
                                                <span class="left-side">Zoom Link:</span>
                                                <span class="right-side">No Available</span>
                                            </li>
                                            <li>
                                                <span class="left-side">Publish date:</span>
                                                <span class="right-side">{{$event->formatted_published_at}}     </span>
                                            </li>
                                            <li>
                                                <span class="left-side">Create date:</span>
                                                <span class="right-side">{{$event->formatted_created_at}}     </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>


                                <div class="box-date">
                                    <div class="box-muli-date">
                                        <h3><i class="fa-solid fa-keynote"></i>  Chair persons & speakers </h3>
                                        <div class="list-date">
                                            <ul class="list-unstyled">
                                                @foreach ($event->speakers as $speaker)
                                                <li>
                                                    <span class="left-side-full">{{$speaker->name}}</span>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="box-muli-date">
                                        <h3><i class="fa-solid fa-keynote"></i>  Sponsors </h3>
                                        {{-- <h4>Gold sponsors</h4> --}}
                                        <div class="list-date">
                                            <ul class="list-unstyled">
                                                @foreach ($event->sponsors as $sponsor)
                                                <li>
                                                    <span class="left-side-full">{{$sponsor->name}}</span>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                    {{-- <div class="box-muli-date">
                                        <h4>Bronze sponsors</h4>
                                        <div class="list-date">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <span class="left-side-full">Madeha Clinic</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> --}}
                                </div>

                                <div class="box-date">
                                    <div class="box-muli-date">
                                        <h3><i class="fa-solid fa-file"></i>  Event Materials </h3>
                                        <div class="list-date">
                                            <ul class="list-unstyled">
                                                @foreach ($event->materials as $material)
                                                <li>
                                                    <span class="left-side-full">{{$material->name}}</span>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                    {{-- <div class="box-muli-date">
                                        <h3><i class="fa-solid fa-photo-film"></i> Event Media </h3>
                                        <div class="list-date">
                                            <ul class="list-unstyled">
                                                @foreach ($event->videos as $video)
                                                <li>
                                                    <span class="left-side-full">{{$video->name}}</span>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="box-date">
                                    <h3><i class="fa-solid fa-credit-card"></i>  Payments and Discounts</h3>
                                        <div class="list-date">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <span class="left-side">Fees:</span>
                                                    <span class="right-side">
                                                        @foreach ($event->discounts as $discount)
                                                            @if ($discount->date)
                                                                @if ($discount->date->gt(now()))
                                                                <p>
                                                                    {{$event->price}} SAR    [ {{$event->price -= $discount->price}} SAR before {{$discount->formatted_date}} ] <br> Discount {{$discount->price}} SAR
                                                                </p>
                                                                @endif
                                                            @else                                                            
                                                                <p>
                                                                    <del>{{$event->price}}SAR</del>    {{$event->price -=$discount->price}} SAR  <br> Discount {{$discount->price}} SAR
                                                                </p>
                                                            @endif    

                                                        @endforeach
                                                    </span>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                </div>

                                <div class="box-date">
                                    <h3><i class="fa-solid fa-file-certificate"></i>  Certificates and Badges</h3>
                                        <div class="list-date">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <span class="left-side">Certificate: </span>
                                                    {{-- <span class="right-side">Sociology certificate</span> --}}
                                                </li>
                                                <li>
                                                    <span class="left-side">Badges:</span>
                                                    <span class="right-side">Not Available</span>
                                                </li>
                                            </ul>
                                        </div>
                                </div>

                                <div class="box-date">
                                    <h3><i class="fa-solid fa-info"></i>  Event Description</h3>
                                       <div class="dis en-dis">
                                           {{$event->description_en}}
                                       </div>

                                       <div class="dis ar-dis">
                                            {{$event->description_ar}}
                                        </div>
                                </div>

                                <div class="box-date">
                                    <h3><i class="fa-solid fa-video"></i> Recorded Event List</h3>
                                        <div class="list-date">
                                            <div class="list-text">
                                                <span>Section Name</span>
                                                <span>Type</span>
                                            </div>

                                            @foreach ($event->videos as $video)
                                            <li>
                                                <span class="left-side">{{$video->name}}</span>
                                                <span class="right-side">{{$video->type}}</span>
                                            </li>
                                            @endforeach
                                        </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="tab-action">
                            <button type="button" class="btn btn-primary">Update information</button>
                        </div>
                    </div>
                    <div class="tab-pane fade " id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
                        <div class="certificate-content">
                            <h3>Event Certificate</h3>
                            <div class="image-content">
                                <img src="assets/img/certificate.png" class="img-fluid" alt="image">
                            </div>
                            <div class="image-info">
                                <span>my certificate.png  2 MB <button class="remove-btn"><i class="fa-solid fa-trash-can"></i></button></span>
                                <span>
                                    Dimension: Width (1024px) - Height (800px) <br> Maximum size: 10 MB
                                </span>
                            </div>
                        </div>
                        <div class="badge-content">
                            <h3>Event Badge</h3>
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                    <label for="imageUpload">Upload new Badge</label>
                                </div>
                                <div class="avatar-preview" style="display: none;">
                                    <div id="imagePreview">
                                    </div>
                                </div>
                            </div>
                            <div class="image-info">
                                <span>Dimension: Width (200px) - Height (500px) 
                                </span>
                                <span>
                                    Maximum size: 3 MB
                                </span>
                            </div>
                        </div>
                        <div class="tab-action">
                            <button type="button" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                    <div class="tab-pane fade " id="pills-3" role="tabpanel" aria-labelledby="pills-3-tab">
                        <div class="title">
                            <p class="message-zoom">No zoom link available to this event</p>
                            <h3>Create Zoom link for this event</h3>
                        </div>
                        <div class="zoom-form">
                            <form action="">
                                <div class="row">
                                    <div class="col-xl-6 col-12">
                                        <div class="mb-4">
                                            <label for="" class="form-label"><strong>Date 1:</strong> <span>15/11/2021      05:00 pm to 06:00 pm</span></label>
                                            <input type="text" class="form-control" id="" placeholder="" value="https://zoom.us/j/93018069971?pwd=YytmV1lyMG9QZjRMSTA5bWUyUnZyQT09">
                                            <span class="message">Add zoom link here</span>
                                          </div>
                                          <div class="mb-4">
                                            <label for="" class="form-label"><strong>Date 2:</strong> <span>15/11/2021      05:00 pm to 06:00 pm</span></label>
                                            <input type="text" class="form-control" id="" placeholder="" value="https://zoom.us/j/93018069971?pwd=YytmV1lyMG9QZjRMSTA5bWUyUnZyQT09">
                                            <span class="message">Add zoom link here</span>
                                          </div>
                                    </div>
                                </div>
                                <div class="tab-action">
                                    <button type="button" class="btn btn-primary">Attach Zoom link</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane fade " id="pills-4" role="tabpanel" aria-labelledby="pills-4-tab">
                        <div class="boxes-section">
                            {{-- <h4>Ahmed Sameh Mohamed </h4> --}}
                            <ul class="list-unstyled">
                                <li>
                                    <p>Available seats</p>
                                    <h5>
                                        {{$event->registeredUsers->count()}}/{{$event->seats}}
                                    </h5>
                                    
                                </li>
                                <li>
                                    <p>Registered Users</p>
                                    <h5>{{$event->registeredUsers->count()}}</h5>
                                </li>
                                <li>
                                    <p>Paid Amount </p>
                                    <h5>
                                        @foreach ($event->shoppingCarts as $shoppingCart)
                                            <span>SAR</span> {{$shoppingCart->pivot->price}}
                                        @endforeach
                                    </h5>
                                </li>
                                <li>
                                    <p>Event views</p>
                                    <h5>{{$event->views->count()}}</h5>
                                </li>
                            </ul>
                        </div>
                        <div class="table-title">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <h3>User list</h3>
                                </div>
                                <div class="col-lg-6 col-12 text-end">
                                    <h3>
                                        Export report    
                                        <a class="btn-file btn-pdf" href="#"><i class="fa-solid fa-file-pdf"></i></a>
                                        <a class="btn-file btn-excel" href="#"><i class="fa-solid fa-file-excel"></i></a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped" >
                                <thead>
                                    <th scope="col"># <i class="fa-solid fa-sort"></i></th>
                                    <th scope="col">Register name  </th>
                                    <th scope="col">Register Date</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Promo discount</th>
                                    <th scope="col">Sessions</th>
                                    <th scope="col">Attendance</th>
                                    <th scope="col">Invoice</th>
                                    <th scope="col"></th>
                                  </thead>
                                  <tbody>
                                      @foreach ($event->registeredUsers as $user)
                                      <tr>
                                        <td>{{$user->id}}</td>
                                        <td><span class="left-side-full">{{$user->name}}</span></td>
                                        <td>{{$user->registeredCourses->first()->pivot->created_at->format('d M Y')}}</td>
                                        <td>SAR {{$event->price}}</td>
                                        <td>--</td>
                                        <td>--</td>
                                        <td>--</td>
                                        <td></td>
                                        <td>                        
                                            <ul class="list-unstyled">
                                                <li>
                                                    <a class="btn-action" href="{{route('admin.registered-users.show', ['event' => $event, 'user' => $user->id])}}"><i class="fa-solid fa-square-info"></i></a>
                                                </li>
                                        </ul></td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                            </table>
                          </div>
                          {{$event->registeredUsers->links()}}
                            <form action="{{route('admin.registered-users.export.excel', $user->id)}}" method="POST" id="registered-users-export-excel-form">
                                @csrf
                            </form>
                            <form action="{{route('admin.registered-users.export.pdf', $user->id)}}" method="POST" id="registered-users-export-pdf-form">
                                @csrf
                            </form>
                          {{-- <nav aria-label="Page navigation example">
                            <ul class="pagination">
                              <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                  <span aria-hidden="true"><i class="fa-solid fa-angle-left"></i></span>
                                </a>
                              </li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link active" href="#">page 2 / 3</a></li>
                              <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                  <span aria-hidden="true"><i class="fa-solid fa-angle-right"></i></span>
                                </a>
                              </li>
                            </ul>
                          </nav> --}}
                    </div>
                    
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{asset('/admin/assets/js/events/show.min.js')}}"></script>
@endsection
