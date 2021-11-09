@extends('user.layouts.app')
@section('header')
    <title></title>
@endsection
@section('content')
    <!-- Start Banner-->
    <section class="banner" style="background-image: url('ui/media/images/banner-6.png');">
        <h1> My Certificates</h1>
    </section>

    <!-- Start Nav Links-->
    <section class="nav-links">
        <div class="container">
            <a href="#">Home page</a>
            <span>|</span>
            <a href="#"> My Certificates</a>
        </div>
    </section>

    <!-- Start Form -->
    <section class="form-section">
        <div class="form-content table-box">
            <form action="">
                <div class="title">
                    <i class="fa-solid fa-file-certificate"></i>  My Certificates
                </div>
                <div class="filter">
                    <div class="row no-gutters justify-content-between">
                        <div class="col-lg-2 col-12 input-row">
                            <h3>Filter by:</h3>
                        </div>
                        <div class="col-lg-10 col-12 input-row">
                            <div class="row">
                                <div class="col-lg-5 col-12">
                                    <div class="row">
                                        <div class="col-lg-3 col-12">
                                            <label for="Status" >Status</label>
                                        </div>
                                        <div class="col-lg-9 col-12">
                                            <select name="status" class="form-control" id="">
                                                <option value="0" selected>Status</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-12">
                                    <div class="row">
                                        <div class="col-lg-4 col-12">
                                            <label for="course-type" >Course Type</label>
                                        </div>
                                        <div class="col-lg-8 col-12">
                                            <select name="course-type" class="form-control" id="">
                                                <option value="0" selected>All</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-12">
                                    <button class="btn btn-default">Search</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">
{{--                            <i class="fa-solid fa-caret-up"></i> <i class="fa-solid fa-caret-down"></i> --}}
                            Date
                        </th>
                        <th scope="col">Event</th>
                        <th scope="col">Event type</th>
                        <th scope="col">CME's</th>
                        <th scope="col" class="status-th">Status</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($courses as $course)
                    <tr class="text-center">
                        <th scope="row" class="text-center">{{$loop->iteration}}</th>
                        <td>{{$course->start_date->toDateString()}}</td>
                        <td>{{$course->title}}</td>
                        <td>{{$course->type_string}} </td>
                        <td>{{$course->cme_count}}</td>

                        @if($course->auth_user_trackers_sum_check_point >= $course->successNeededMinutes())
                            <td><span class="status status-success">{{$course->certificate}}% Ready</span> </td>
                            <td><a href="{{route('certificates.send',$course->id)}}"  class="send-certificate-btn">Send by email</a></td>
                            <td><a href="{{route('certificates.print',$course->id)}}" class="print-certificate-btn"> Print</a></td>
                        @else
                            <td><span class="status status-danger">{{$course->certificate}}% Not completed</span> </td>
                            <td><span class="not-available">Certificate not available</span></td>
                            <td><button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="right" title="You done have the attendance percentage">
                                    <i class="fa-solid fa-circle-info"></i>
                                </button></td>
                        @endif
                    </tr>
                    @endforeach
                    <form action="" id="certificate-form" method="POST">
                        @csrf
                    </form>
                    </tbody>
                </table>
            </div>
{{--            <div class="text-right">--}}
{{--                <nav aria-label="Page navigation example">--}}
{{--                    <ul class="pagination">--}}
{{--                        <li class="page-item">--}}
{{--                            <a class="page-link" href="#" aria-label="Previous">--}}
{{--                                <i class="fa-solid fa-chevron-left"></i>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="page-item page-number"><a class="page-link" href="#">page 1 of 1</a></li>--}}
{{--                        <li class="page-item">--}}
{{--                            <a class="page-link" href="#" aria-label="Next">--}}
{{--                                <i class="fa-solid fa-chevron-right"></i>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </nav>--}}
{{--            </div>--}}
        </div>
    </section>

    <div class="qus">
        <a href="#"><i class="fa-solid fa-circle-question"></i></a>
    </div>
@endsection
@section('script')
    <script src="/js/certificates/list.min.js"></script>
@endsection
