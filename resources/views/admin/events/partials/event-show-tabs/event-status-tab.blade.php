<div class="tab-pane fade " id="pills-4" role="tabpanel" aria-labelledby="pills-4-tab">
    <div class="boxes-section">
        {{-- <h4>Ahmed Sameh Mohamed </h4> --}}
        <ul class="list-unstyled">
            <li>
                <p>Available seats</p>
                <h5>
                    {{$event->registeredUsers->count()}}/{{$event->seats}}
                </h5>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Enable
                    </label>
                </div>
                <span class="message-status">Certificate available</span>
            </li>
            <li>
                <p><strong>Badge Status</strong></p>
                <h5>0/2</h5>
                <span>Send by mail | Download</span>
            </li>
            <li>
                <p>Registered Users</p>
                <h5>{{$event->registeredUsers->count()}}</h5>
            </li>
            <li>
                <p>Paid Amount </p>
                <h5>
                    {{-- @foreach ($event->shoppingCarts as $shoppingCart) --}}
                    <span>SAR</span> {{$event->total_paid_amount}}
                    {{-- @endforeach --}}
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
                    {{--                                        <td>{{$user->registeredCourses->first()->pivot->created_at->format('d M Y')}}</td>--}}
                    <td>SAR {{$event->price}}</td>
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                    <td></td>
                    <td>
                        <ul class="list-unstyled">
                            <li>
                                <a class="btn-action" href="{{route('admin.registered-users.show', ['event' => $event, 'user' => $user->id])}}"><i class="fa-solid fa-square-info"></i></a>
                            </li>
                        </ul></td>
                    <td><button class="btn btn-primary send-certificate-btn" data-url="{{route('admin.events.users.send-certificate',['event' => $event->id,'user'=>$user->id])}}">Send Certificate</button></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{$event->registeredUsers->links()}}
    {{--                            <form action="{{route('admin.registered-users.export.excel', $user->id)}}" method="POST" id="registered-users-export-excel-form">--}}
    {{--                                @csrf--}}
    {{--                            </form>--}}
    {{--                            <form action="{{route('admin.registered-users.export.pdf', $user->id)}}" method="POST" id="registered-users-export-pdf-form">--}}
    {{--                                @csrf--}}
    {{--                            </form>--}}
    {{-- <nav aria-label="Page navigation example">
    <div class="table-info text-end">
      <h3>Total Amount   23 Hours</h3>
  </div>


    <nav aria-label="Page navigation example">
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
