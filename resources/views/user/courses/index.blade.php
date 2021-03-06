@extends('user.layouts.app')
@section('header')
    <title></title>
@endsection
@section('content')

        <!-- Start Banner-->
        <section class="banner-slide">
            <div class="owl-carousel">
                <div class="item" style="background-image: url('/media/images/slide.png');">
                    <div class="container">
                        <h2>
                            Discover <span>our courses</span> <br> It is you perfect choice
                        </h2>
                    </div>
                </div>
                <div class="item" style="background-image: url('/media/images/banner.png');">
                    <div class="container">
                        <h2>
                            Discover <span>our courses</span> <br> It is you perfect choice
                        </h2>
                    </div>
                </div>
            </div>
        </section>

        <!-- Start Courses Card-->
        <section class="courses">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-9 col-md-8 col-12">
                        <ul class="list-unstyled links">
                            <li class="{{request()->my_events ?: 'active' }}"><a href="{{route('courses.index')}}">Upcoming activities</a></li>
{{--                            <li><a href="#">Activities on Demand</a></li>--}}
                            @auth
                            <li class="{{request()->my_events ? 'active' : ''}}"><a href="{{route('courses.index',['my_events'=>1])}}"> My Activities</a></li>
                            @endauth
                            <li>
                                <div class="dropdown">
                                    <a class=" dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                        <div class="select-side">
                                            @auth
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input filter-checkbox" id="customCheck_11" name="favorites" {{request()->my_favorites ? 'checked' : ''}}>
                                                <label class="custom-control-label" for="customCheck_11">
                                                    My Favorites
                                                </label>
                                            </div>
                                            @endauth
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input filter-checkbox" id="customCheck_33" name="with_cme" {{request()->with_cme ? 'checked' : ''}}>
                                                <label class="custom-control-label" for="customCheck_33">
                                                    With CME's
                                                </label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input filter-checkbox" id="customCheck_44" name="free" {{request()->free ? 'checked' : ''}}>
                                                <label class="custom-control-label" for="customCheck_44">
                                                    Free
                                                </label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input filter-checkbox" id="customCheck_55" name="paid"{{request()->paid ? 'checked' : ''}} >
                                                <label class="custom-control-label" for="customCheck_55">
                                                    Paid
                                                </label>
                                            </div>
                                            @auth
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input filter-checkbox " id="customCheck_66" name="my_speciality" {{request()->my_speciality ? 'checked' : ''}}>
                                                <label class="custom-control-label" for="customCheck_66">
                                                    My Speciality
                                                </label>
                                            </div>
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
{{--                        <div class="filter">--}}
{{--                            <div class="left-side-text">Filter by:</div>--}}
{{--                            <input type="checkbox" class=" filter-checkbox"  name="my_events" {{request()->my_events ? 'checked' : ''}} style="display: none">--}}
{{--                            <div class="select-side">--}}
{{--                                @auth--}}
{{--                                    <div class="custom-control custom-checkbox">--}}
{{--                                        <input type="checkbox" class="custom-control-input filter-checkbox" id="customCheck" name="favorites" {{request()->my_favorites ? 'checked' : ''}} >--}}
{{--                                        <label class="custom-control-label" for="customCheck">--}}
{{--                                            My Favorites--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                @endauth--}}


{{--                                <div class="custom-control custom-checkbox">--}}
{{--                                    <input type="checkbox" class="custom-control-input filter-checkbox" id="customCheck2" name="upcoming_events" {{request()->upcoming_events ? 'checked' : ''}} >--}}
{{--                                    <label class="custom-control-label" for="customCheck2">--}}
{{--                                        Upcoming events--}}
{{--                                    </label>--}}
{{--                                </div>--}}

{{--                                <div class="custom-control custom-checkbox">--}}
{{--                                    <input type="checkbox" class="custom-control-input filter-checkbox" id="customCheck3" name="past_events" {{request()->past_events ? 'checked' : ''}}>--}}
{{--                                    <label class="custom-control-label" for="customCheck3">--}}
{{--                                        Past events--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <div class="custom-control custom-checkbox">--}}
{{--                                    <input type="checkbox" class="custom-control-input filter-checkbox" id="customCheck4" name="with_cme" {{request()->with_cme ? 'checked' : ''}}>--}}
{{--                                    <label class="custom-control-label" for="customCheck4">--}}
{{--                                        With CME's--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <div class="custom-control custom-checkbox">--}}
{{--                                    <input type="checkbox" class="custom-control-input filter-checkbox" id="customCheck5" name="free" {{request()->free ? 'checked' : ''}}>--}}
{{--                                    <label class="custom-control-label" for="customCheck5">--}}
{{--                                        Free--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <div class="custom-control custom-checkbox">--}}
{{--                                    <input type="checkbox" class="custom-control-input filter-checkbox" id="customCheck6" name="paid" {{request()->paid ? 'checked' : ''}}>--}}
{{--                                    <label class="custom-control-label" for="customCheck6">--}}
{{--                                        Paid--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                @auth()--}}
{{--                                    <div class="custom-control custom-checkbox">--}}
{{--                                        <input type="checkbox" class="custom-control-input filter-checkbox" id="my-speciality-checkbox" name="my_speciality" {{request()->my_speciality ? 'checked' : ''}}>--}}
{{--                                        <label class="custom-control-label" for="my-speciality-checkbox">--}}
{{--                                            My Speciality--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                @endauth--}}
{{--                            </div>--}}
{{--                            <div class="right-action">--}}
{{--                                <button type="button" class="clear" id="clear-filters-btn">Clear all</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div id="courses-list">
                                @include('user.courses.partials.courses-list')
                        </div>


                    </div>
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="top-pos">
                            <div class="search-box">
                                <form action="{{route('courses.index')}}" method="GET" id="courses-search-form">
                                    <h2><i class="fa-solid fa-magnifying-glass"></i> Search</h2>
                                    <div class="form-group">
                                        <label for="course-name">Course name</label>
                                        <input type="text" class="form-control" name="title" placeholder="Type course name" value="{{request()->title}}">
                                    </div>
                                    <div class="form-group" id="speciality-selector">
                                        <label for="speciality">Speciality</label>
                                        <select name="speciality" id="speciality" class="form-control">
                                            <option disabled selected>Speciality</option>
                                            @foreach($specialities as $speciality)
                                                <option value="{{$speciality->id}}" {{request()->speciality == $speciality->id ? 'selected' : ''}} >{{$speciality->name}}</option>
                                            @endforeach
                                        </select>
{{--                                        <input type="text" class="form-control" name="speciality" placeholder="">--}}
                                    </div>
                                    <div class="form-group">
                                        <label for="course-type">Course type</label>
                                        <select name="type" class="form-control" id="">
{{--                                            <option value="1" selected>Online event</option>--}}
                                                <option  selected value="" >All</option>
                                            @foreach($courseTypes as $courseType)
                                                <option value="{{$courseType->id}}" {{request()->type == $courseType->id ? 'selected' : ''}}>{{$courseType->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-8">
                                            <button class="btn btn-default " type="button" id="course-search-btn">Start Search </button>
                                        </div>
                                       <div class="col-4">
                                           <button class="btn btn-warning " type="button" onclick="this.form.reset();"  id="course-clear-btn">Clear </button>
                                       </div>
                                    </div>


                                </form>
                            </div>
                            <div class="spons5r-side">
                                <div class="sponsor-box">
                                    <img src="/media/images/banner4.png" class="img-fluid" alt="sponsor">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
@section('script')
    <script src="/js/courses/list.min.js"></script>
@endsection
