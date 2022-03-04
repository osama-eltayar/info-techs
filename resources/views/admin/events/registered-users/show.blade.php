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
                <span><strong>Event Title:</strong>  {{$event->title}}</span>
                <ul class="list-unstyled">
                    <li>{{$event->state}}</li>
                </ul>
                <div class="event-status">
                    @if ($event->isOnlineEvent())
                    <span>Event Online</span>
                    @endif
                </div>
            </div>
            
            <div class="event-body">
                <div class="boxes-section">
                    <h4>{{$user->name}} </h4>
                    <ul class="list-unstyled">
                        <li>
                            <p><strong>Certificate</strong></p>
                            <h5 class="red">
                                0/2
                                <small>No certificate</small>
                            </h5>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Enable
                                </label>
                            </div>
                            <span class="message-status">Certificate available</span>
                        </li>
                        {{-- <li>
                            <p><strong>Badge Status</strong></p>
                            <h5>0/2</h5>
                            <span>Send by mail | Download</span>
                        </li>
                        <li>
                            <p><strong>Certificate Print</strong> </p>
                            <h5>1/2</h5>
                            <span>Send by mail | Download</span>
                        </li> --}}
                        <li>
                            <p><strong>Invoice</strong></p>
                            <h5>
                                <span>SAR</span> {{$shopping_cart->price}}
                                {{-- <small>Early Pay | On time</small> --}}
                            </h5>
                            {{-- <span>Send by mail | Download</span> --}}
                        </li>
                        {{-- <li>
                            <p><strong>Promocode</strong></p>
                            <span>No discount used </span>
                            <span>25FOff (-200 SAR)</span>
                        </li> --}}
                    </ul>
                </div>
                <div class="table-title">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <h3>Course Progress</h3>
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
                            <th scope="col">Session List  </th>
                            <th scope="col">Start time</th>
                            <th scope="col">Out of Session</th>
                            <th scope="col">Total</th>
                          </thead>
                          <tbody>
                            <tr>
                                <td>1</td>
                                <td>15/11/2015</td>
                                <td>03:00 AM</td>
                                <td>03:10 AM</td>
                                <td>0:Hours - 10 min</td>
                              </tr>
                              <tr>
                                <td>1</td>
                                <td>15/11/2015</td>
                                <td>03:00 AM</td>
                                <td>03:10 AM</td>
                                <td>0:Hours - 10 min</td>
                              </tr>
                          </tbody>
                    </table>
                  </div>
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
                  </nav>
            </div>

        </div>
    </div>
</div>
@endsection