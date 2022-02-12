@extends('admin.layouts.app')
@section('content')
    <!-- Start Content -->
    <div class="content-side">
        <div class="page-title">
            <div class="container-fluid "><h1><img src="/admin/assets/img/icon2.png" alt="icon"> Owners  </h1></div>

        </div>
        <div class="container-fluid bg-blue">
            <div class="content-body">
                <div class="event-body">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <h4>Owner Details <a href="{{route('admin.owners.edit',$owner->id)}}">Update information</a></h4>
                            <h3>{{$owner->name}}</h3>
                        </div>
                        <div class="col-lg-6 col-12 text-end">
                            <div class="event-image">
                                <img src="{{$owner->logo_url}}" class="img-fluid" alt="image">
                            </div>
                        </div>
                    </div>
                    <div class="row w-70">
                        <div class="col-lg-6 col-12">
                            <div class="box-date">
                                <div class="list-date">
                                    <ul class="list-unstyled">
                                        <li>
                                            <span class="left-side">Owner name:</span>
                                            <span class="right-side">{{$owner->name}}</span>
                                        </li>
                                        <li>
                                            <span class="left-side">Email:</span>
                                            <span class="right-side">{{$owner->user->email}}</span>
                                        </li>
                                        <li>
                                            <span class="left-side">Mobile:</span>
                                            <span class="right-side">{{$owner->mobile}}</span>
                                        </li>
                                        <li>
                                            <span class="left-side">Country:</span>
                                            <span class="right-side">{{$owner->country->name}}</span>
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
                                                                Material
                                                                <a href="{{$owner->material_url}}" style="text-decoration: none">
                                                                    <p>{{$owner->name}}.pdf  - {{$owner->material_size}}  </p>
                                                                </a>
                                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-title">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <h3>Events owned</h3>
                        </div>
                        <div class="col-lg-6 col-12 text-end">
                            <h3>
                                Export report
                                <button class="btn-file btn-pdf" type="button"><i class="fa-solid fa-file-pdf"></i></button>
                                <button class="btn-file btn-excel" type="button"><i class="fa-solid fa-file-excel"></i></button>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped" >
                        <thead>
                        <th scope="col"># <i class="fa-solid fa-sort"></i></th>
                        <th scope="col">Event name</th>
                        <th scope="col">Event type</th>
                        <th scope="col">Days</th>
                        <th scope="col">Start date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Registered users</th>
                        <th scope="col">Event Amount</th>
                        </thead>
                        <tbody>
                        @foreach($owner->courses as $course)
                            <tr>
                                <td>{{$course->id}}</td>
                                <td>{{$course->title}}</td>
                                <td>{{$course->type_string}}</td>
                                <td>{{$course->days_count}}</td>
                                <td>{{$course->formatted_start_date}}</td>
                                <td>{{$course->formatted_end_date}}</td>
                                <td>{{$course->registered_users_count}}</td>
                                <td>
                                    SAR {{$course->price}}
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                {{$owner->courses->links()}}
                <form action="{{route('admin.courses.export.excel',['resource_type' =>'owners','resource_id' => $owner->id])}}" method="POST" id="courses-export-excel-form">
                    @csrf
                </form>
                <form action="{{route('admin.courses.export.pdf',['resource_type' =>'owners','resource_id' => $owner->id])}}" method="POST" id="courses-export-pdf-form">
                    @csrf
                </form>

{{--                <nav aria-label="Page navigation example">--}}
{{--                    <ul class="pagination">--}}
{{--                        <li class="page-item">--}}
{{--                            <a class="page-link" href="#" aria-label="Previous">--}}
{{--                                <span aria-hidden="true"><i class="fa-solid fa-angle-left"></i></span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                        <li class="page-item"><a class="page-link active" href="#">page 2 / 3</a></li>--}}
{{--                        <li class="page-item">--}}
{{--                            <a class="page-link" href="#" aria-label="Next">--}}
{{--                                <span aria-hidden="true"><i class="fa-solid fa-angle-right"></i></span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </nav>--}}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('/admin/assets/js/owners/show.min.js')}}"></script>
@endsection
