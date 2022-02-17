@extends('admin.layouts.app')
@section('content')
    <!-- Start Content -->
    <div class="content-side">
        <div class="page-title">
            <div class="container-fluid "><h1><img src="{{asset('admin/assets/img/icon2.png')}}" alt="icon"> Speakers </h1></div>
        </div>
        <div class="container-fluid bg-blue">
            <div class="content-body">
                <div class="event-body">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <h4>Speaker Details <a href="{{route('admin.speakers.edit', $speaker->id)}}">Update information</a></h4>
                            <h3>{{$speaker->name}}</h3>
                        </div>
                        <div class="col-lg-6 col-12 text-end">
                            <div class="event-image">
                                <img src="{{$speaker->image_url}}" class="img-fluid" alt="image">
                            </div>
                        </div>
                    </div>
                    <div class="row w-70">
                        <div class="col-lg-6 col-12">
                            <div class="box-date">
                                <div class="list-date">
                                    <ul class="list-unstyled">
                                        <li>
                                            <span class="left-side">Title :</span>
                                            <span class="right-side">{{$speaker->title->name}}.</span>
                                        </li>
                                        <li>
                                            <span class="left-side">Speaker name:</span>
                                            <span class="right-side">{{$speaker->name}}</span>
                                        </li>
                                        <li>
                                            <span class="left-side">Email:</span>
                                            <span class="right-side">{{$speaker->email}}</span>
                                        </li>
                                        <li>
                                            <span class="left-side">Mobile:</span>
                                            <span class="right-side">{{$speaker->mobile}}</span>
                                        </li>
                                        <li>
                                            <span class="left-side">Country:</span>
                                            <span class="right-side">{{$speaker->country? $speaker->country->name : '--'}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="box-date">
                                <div class="list-date">
                                    <ul class="list-unstyled">
                                        <li>
                                            <span class="left-side">
                                                Bio
                                            </span>
                                        </li>
                                    </ul>
                                    {!! $speaker->bio !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-title">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <h3>Speakers activities</h3>
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
                            <th scope="col">Speaker name</th>
                            <th scope="col">Event type</th>
                            <th scope="col">Days</th>
                            <th scope="col">Start date</th>
                            <th scope="col">End Date</th>
                            <th scope="col">Event status</th>
                          </thead>
                          <tbody>
                              @foreach ($speaker->courses as $course)    
                                <tr>
                                    <td>{{$course->id}}</td>
                                    <td>{{$course->title}}</td>
                                    <td>{{$course->type_string}}</td>
                                    <td>{{$course->days_count}}</td>
                                    <td>{{$course->formatted_start_date}}</td>
                                    <td>{{$course->formatted_end_date}}</td>
                                    <td>{{$course->status}}</td>
                                </tr>
                              @endforeach
                          </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('/admin/assets/js/speakers/show.min.js')}}"></script>
@endsection
