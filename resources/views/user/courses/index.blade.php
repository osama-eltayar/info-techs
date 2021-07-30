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
                            <li><a href="#">Upcoming activities</a></li>
                            <li><a href="#">Activities on Demand</a></li>
                            <li class="active"><a href="#"> My Activities</a></li>
                        </ul>
                        <div class="filter">
                            <div class="left-side-text">Filter by:</div>
                            <div class="select-side">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                                    <label class="custom-control-label" for="customCheck">
                                        My Favorites
                                    </label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2" name="example2">
                                    <label class="custom-control-label" for="customCheck2">
                                        Upcoming events
                                    </label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3" name="example3">
                                    <label class="custom-control-label" for="customCheck3">
                                        Past events
                                    </label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck4" name="example4">
                                    <label class="custom-control-label" for="customCheck4">
                                        With CME's
                                    </label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck5" name="example5">
                                    <label class="custom-control-label" for="customCheck5">
                                        Free
                                    </label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck6" name="example6">
                                    <label class="custom-control-label" for="customCheck6">
                                        My Speciality
                                    </label>
                                </div>
                            </div>
                            <div class="right-action">
                                <button type="button" class="clear">Clear all</button>
                            </div>
                        </div>
                        <div class="num">
                            Total 7 items
                        </div>
                        <div class="row row-cards">
                            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                <div class="card-content status-1">
                                    <div class="card-status">
                                        Online Event
                                    </div>
                                    <div class="img-card">
                                        <img src="/media/images/product.png" alt="product">
                                        <button type="button" class="fav"><i class="fa-solid fa-heart"></i></button>
                                        <span class="info"><i class="fa-solid fa-circle-info"></i></span>
                                    </div>
                                    <div class="card-info">
                                        <h3>2021 Saidian Egyptian orthodontic Annual meeting</h3>
                                        <div class="icon price">
                                            <i class="fa-solid fa-sack-dollar"></i> <b>Price:</b> Free
                                        </div>
                                        <div class="icon date">
                                            <i class="fa-solid fa-calendar-day"></i> <b>Date:</b> 11 July 2021
                                        </div>

                                        <a href="#" class="btn btn-light">More details</a>
                                        <p class="view">200 views</p>
                                        <div class="text-center">
                                            <button type="button" class="btn btn-default add-cart"><i class="fa-solid fa-cart-plus"></i> Add to cart </button>
                                        </div>
                                    </div>

                                    <div class="overlay">
                                        <span class="close-card"><i class="fa-solid fa-circle-xmark"></i></span>
                                        <h4>2021 Saidian Egyptian orthodontic Annual meeting KSA
                                            for EOS members
                                        </h4>
                                        <p>Details</p>
                                        <div class="status-info">
                                            <div class="status-text">
                                                <span></span> <small>Online Event</small>
                                            </div>
                                            <div class="price">
                                                <b>Price:</b> Free
                                            </div>
                                        </div>
                                        <div class="icon-info">
                                            <div class="icon">
                                                <i class="fa-solid fa-calendar-day"></i>
                                                <div class="icon-text">
                                                    <span><b>Date:</b> 11 July 2021</span>
                                                    <span>02:00 pm : 06:00pm</span>
                                                </div>
                                            </div>

                                            <div class="icon">
                                                <i class="fa-solid fa-briefcase-clock"></i>
                                                <div class="icon-text">
                                                    <span><b>Time:</b> 3 hours</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="icon-info">
                                            <div class="icon">
                                                <i class="fa-solid fa-trophy-star"></i>
                                                <div class="icon-text">
                                                    <span><b>Organized by:</b></span>
                                                    <span>Infotech coorpration</span>
                                                    <span><img src="/media/images/ligt-logo.png" alt="logo"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="list-unstyled">
                                            <li>
                                                <h3>Accreditation number (CME's)</h3>
                                                <p>yes</p>
                                            </li>
                                            <li>
                                                <h3>Specialities</h3>
                                                <p>Orthodontics - Medical - Social</p>
                                            </li>
                                            <li>
                                                <h3>Speakers</h3>
                                                <p>Ahmed Mharam</p>
                                            </li>
                                            <li>
                                                <h3>Available seats</h3>
                                                <p>20</p>
                                            </li>
                                            <li>
                                                <h3>Total of CME's</h3>
                                                <p>3</p>
                                            </li>
                                        </ul>

                                        <div class="sponsor">
                                            <h3>Sponsors</h3>
                                            <img src="/media/images/logo1.png" alt="logo">
                                            <img src="/media/images/logo2.png" alt="logo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                <div class="card-content status-2">
                                    <div class="card-status">
                                        Online Course
                                    </div>
                                    <div class="img-card">
                                        <img src="/media/images/product.png" alt="product">
                                        <button type="button" class="fav"><i class="fa-solid fa-heart"></i></button>
                                        <span class="info"><i class="fa-solid fa-circle-info"></i></span>
                                    </div>
                                    <div class="card-info">
                                        <h3>2021 Saidian Egyptian orthodontic Annual meeting</h3>
                                        <div class="icon price">
                                            <i class="fa-solid fa-sack-dollar"></i> <b>Price:</b> <span>$15</span>
                                        </div>
                                        <div class="icon date">
                                            <i class="fa-solid fa-calendar-day"></i> <b>Date:</b> 11 July 2021 (3 days)
                                        </div>

                                        <a href="#" class="btn btn-light">More details</a>
                                        <p class="view">200 views</p>
                                        <div class="text-center">
                                            <button type="button" class="btn btn-default add-cart"><i class="fa-solid fa-cart-plus"></i> Add to cart </button>
                                        </div>
                                    </div>

                                    <div class="overlay">
                                        <span class="close-card"><i class="fa-solid fa-circle-xmark"></i></span>
                                        <h4>2021 Saidian Egyptian orthodontic Annual meeting KSA
                                            for EOS members
                                        </h4>
                                        <p>Details</p>
                                        <div class="status-info">
                                            <div class="status-text">
                                                <span></span> <small>Online Event</small>
                                            </div>
                                            <div class="price">
                                                <b>Price:</b> Free
                                            </div>
                                        </div>
                                        <div class="icon-info">
                                            <div class="icon">
                                                <i class="fa-solid fa-calendar-day"></i>
                                                <div class="icon-text">
                                                    <span><b>Date:</b> 11 July 2021</span>
                                                    <span>02:00 pm : 06:00pm</span>
                                                </div>
                                            </div>

                                            <div class="icon">
                                                <i class="fa-solid fa-briefcase-clock"></i>
                                                <div class="icon-text">
                                                    <span><b>Time:</b> 3 hours</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="icon-info">
                                            <div class="icon">
                                                <i class="fa-solid fa-trophy-star"></i>
                                                <div class="icon-text">
                                                    <span><b>Organized by:</b></span>
                                                    <span>Infotech coorpration</span>
                                                    <span><img src="/media/images/ligt-logo.png" alt="logo"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="list-unstyled">
                                            <li>
                                                <h3>Accreditation number (CME's)</h3>
                                                <p>yes</p>
                                            </li>
                                            <li>
                                                <h3>Specialities</h3>
                                                <p>Orthodontics - Medical - Social</p>
                                            </li>
                                            <li>
                                                <h3>Speakers</h3>
                                                <p>Ahmed Mharam</p>
                                            </li>
                                            <li>
                                                <h3>Available seats</h3>
                                                <p>20</p>
                                            </li>
                                            <li>
                                                <h3>Total of CME's</h3>
                                                <p>3</p>
                                            </li>
                                        </ul>

                                        <div class="sponsor">
                                            <h3>Sponsors</h3>
                                            <img src="/media/images/logo1.png" alt="logo">
                                            <img src="/media/images/logo2.png" alt="logo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                <div class="card-content status-3">
                                    <div class="card-status">
                                        Recorded
                                    </div>
                                    <div class="img-card">
                                        <img src="/media/images/product.png" alt="product">
                                        <button type="button" class="fav"><i class="fa-solid fa-heart"></i></button>
                                        <span class="info"><i class="fa-solid fa-circle-info"></i></span>
                                    </div>
                                    <div class="card-info">
                                        <h3>2021 Saidian Egyptian orthodontic Annual meeting
                                        </h3>
                                        <span class="message">Registered</span>
                                        <div class="icon price">
                                            <i class="fa-solid fa-sack-dollar"></i> <b>Price:</b> <span> $20 </span> <del>$25</del>
                                        </div>
                                        <div class="icon date">
                                            <i class="fa-solid fa-calendar-day"></i> <b>Date:</b> 11 July 2021
                                        </div>

                                        <a href="#" class="btn btn-light">More details</a>
                                        <p class="view">200 views</p>
                                        <div class="text-center">
                                            <button type="button" class="btn btn-default add-cart"><i class="fa-solid fa-circle-check"></i> Enroll now </button>
                                        </div>
                                    </div>

                                    <div class="overlay">
                                        <span class="close-card"><i class="fa-solid fa-circle-xmark"></i></span>
                                        <h4>2021 Saidian Egyptian orthodontic Annual meeting KSA
                                            for EOS members
                                        </h4>
                                        <p>Details</p>
                                        <div class="status-info">
                                            <div class="status-text">
                                                <span></span> <small>Online Event</small>
                                            </div>
                                            <div class="price">
                                                <b>Price:</b> Free
                                            </div>
                                        </div>
                                        <div class="icon-info">
                                            <div class="icon">
                                                <i class="fa-solid fa-calendar-day"></i>
                                                <div class="icon-text">
                                                    <span><b>Date:</b> 11 July 2021</span>
                                                    <span>02:00 pm : 06:00pm</span>
                                                </div>
                                            </div>

                                            <div class="icon">
                                                <i class="fa-solid fa-briefcase-clock"></i>
                                                <div class="icon-text">
                                                    <span><b>Time:</b> 3 hours</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="icon-info">
                                            <div class="icon">
                                                <i class="fa-solid fa-trophy-star"></i>
                                                <div class="icon-text">
                                                    <span><b>Organized by:</b></span>
                                                    <span>Infotech coorpration</span>
                                                    <span><img src="/media/images/ligt-logo.png" alt="logo"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="list-unstyled">
                                            <li>
                                                <h3>Accreditation number (CME's)</h3>
                                                <p>yes</p>
                                            </li>
                                            <li>
                                                <h3>Specialities</h3>
                                                <p>Orthodontics - Medical - Social</p>
                                            </li>
                                            <li>
                                                <h3>Speakers</h3>
                                                <p>Ahmed Mharam</p>
                                            </li>
                                            <li>
                                                <h3>Available seats</h3>
                                                <p>20</p>
                                            </li>
                                            <li>
                                                <h3>Total of CME's</h3>
                                                <p>3</p>
                                            </li>
                                        </ul>

                                        <div class="sponsor">
                                            <h3>Sponsors</h3>
                                            <img src="/media/images/logo1.png" alt="logo">
                                            <img src="/media/images/logo2.png" alt="logo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                <div class="card-content status-4">
                                    <div class="card-status">
                                        Physical
                                    </div>
                                    <div class="img-card">
                                        <img src="/media/images/product.png" alt="product">
                                        <button type="button" class="fav"><i class="fa-solid fa-heart"></i></button>
                                        <span class="info"><i class="fa-solid fa-circle-info"></i></span>
                                    </div>
                                    <div class="card-info">
                                        <h3>2021 Saidian Egyptian orthodontic Annual meeting</h3>
                                        <div class="icon price">
                                            <i class="fa-solid fa-sack-dollar"></i> <b>Price:</b> <span>$10</span> <small>Before 25/5/2021</small>
                                        </div>
                                        <div class="icon date">
                                            <i class="fa-solid fa-calendar-day"></i> <b>Date:</b> 11 July 2021
                                        </div>

                                        <a href="#" class="btn btn-light">More details</a>
                                        <p class="view">200 views</p>
                                        <div class="text-center">
                                            <button type="button" class="btn btn-default add-cart"><i class="fa-solid fa-cart-plus"></i> Add to cart </button>
                                        </div>
                                    </div>

                                    <div class="overlay">
                                        <span class="close-card"><i class="fa-solid fa-circle-xmark"></i></span>
                                        <h4>2021 Saidian Egyptian orthodontic Annual meeting KSA
                                            for EOS members
                                        </h4>
                                        <p>Details</p>
                                        <div class="status-info">
                                            <div class="status-text">
                                                <span></span> <small>Online Event</small>
                                            </div>
                                            <div class="price">
                                                <b>Price:</b> Free
                                            </div>
                                        </div>
                                        <div class="icon-info">
                                            <div class="icon">
                                                <i class="fa-solid fa-calendar-day"></i>
                                                <div class="icon-text">
                                                    <span><b>Date:</b> 11 July 2021</span>
                                                    <span>02:00 pm : 06:00pm</span>
                                                </div>
                                            </div>

                                            <div class="icon">
                                                <i class="fa-solid fa-briefcase-clock"></i>
                                                <div class="icon-text">
                                                    <span><b>Time:</b> 3 hours</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="icon-info">
                                            <div class="icon">
                                                <i class="fa-solid fa-trophy-star"></i>
                                                <div class="icon-text">
                                                    <span><b>Organized by:</b></span>
                                                    <span>Infotech coorpration</span>
                                                    <span><img src="/media/images/ligt-logo.png" alt="logo"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="list-unstyled">
                                            <li>
                                                <h3>Accreditation number (CME's)</h3>
                                                <p>yes</p>
                                            </li>
                                            <li>
                                                <h3>Specialities</h3>
                                                <p>Orthodontics - Medical - Social</p>
                                            </li>
                                            <li>
                                                <h3>Speakers</h3>
                                                <p>Ahmed Mharam</p>
                                            </li>
                                            <li>
                                                <h3>Available seats</h3>
                                                <p>20</p>
                                            </li>
                                            <li>
                                                <h3>Total of CME's</h3>
                                                <p>3</p>
                                            </li>
                                        </ul>

                                        <div class="sponsor">
                                            <h3>Sponsors</h3>
                                            <img src="/media/images/logo1.png" alt="logo">
                                            <img src="/media/images/logo2.png" alt="logo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                <div class="card-content status-5">
                                    <div class="card-status">
                                        Hybird
                                    </div>
                                    <div class="img-card">
                                        <img src="/media/images/product.png" alt="product">
                                        <button type="button" class="fav"><i class="fa-solid fa-heart"></i></button>
                                        <span class="info"><i class="fa-solid fa-circle-info"></i></span>
                                    </div>
                                    <div class="card-info">
                                        <h3>2021 Saidian Egyptian orthodontic Annual meeting</h3>
                                        <div class="icon price">
                                            <i class="fa-solid fa-sack-dollar"></i> <b>Price:</b> Free
                                        </div>
                                        <div class="icon date">
                                            <i class="fa-solid fa-calendar-day"></i> <b>Date:</b> 11 July 2021
                                        </div>

                                        <a href="#" class="btn btn-light">More details</a>
                                        <p class="view">200 views</p>
                                        <div class="text-center">
                                            <button type="button" class="btn btn-default add-cart"><i class="fa-solid fa-cart-plus"></i> Add to cart </button>
                                        </div>
                                    </div>

                                    <div class="overlay">
                                        <span class="close-card"><i class="fa-solid fa-circle-xmark"></i></span>
                                        <h4>2021 Saidian Egyptian orthodontic Annual meeting KSA
                                            for EOS members
                                        </h4>
                                        <p>Details</p>
                                        <div class="status-info">
                                            <div class="status-text">
                                                <span></span> <small>Online Event</small>
                                            </div>
                                            <div class="price">
                                                <b>Price:</b> Free
                                            </div>
                                        </div>
                                        <div class="icon-info">
                                            <div class="icon">
                                                <i class="fa-solid fa-calendar-day"></i>
                                                <div class="icon-text">
                                                    <span><b>Date:</b> 11 July 2021</span>
                                                    <span>02:00 pm : 06:00pm</span>
                                                </div>
                                            </div>

                                            <div class="icon">
                                                <i class="fa-solid fa-briefcase-clock"></i>
                                                <div class="icon-text">
                                                    <span><b>Time:</b> 3 hours</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="icon-info">
                                            <div class="icon">
                                                <i class="fa-solid fa-trophy-star"></i>
                                                <div class="icon-text">
                                                    <span><b>Organized by:</b></span>
                                                    <span>Infotech coorpration</span>
                                                    <span><img src="/media/images/ligt-logo.png" alt="logo"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="list-unstyled">
                                            <li>
                                                <h3>Accreditation number (CME's)</h3>
                                                <p>yes</p>
                                            </li>
                                            <li>
                                                <h3>Specialities</h3>
                                                <p>Orthodontics - Medical - Social</p>
                                            </li>
                                            <li>
                                                <h3>Speakers</h3>
                                                <p>Ahmed Mharam</p>
                                            </li>
                                            <li>
                                                <h3>Available seats</h3>
                                                <p>20</p>
                                            </li>
                                            <li>
                                                <h3>Total of CME's</h3>
                                                <p>3</p>
                                            </li>
                                        </ul>

                                        <div class="sponsor">
                                            <h3>Sponsors</h3>
                                            <img src="/media/images/logo1.png" alt="logo">
                                            <img src="/media/images/logo2.png" alt="logo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                <div class="card-content status-5">
                                    <div class="card-status">
                                        Hybird
                                    </div>
                                    <div class="img-card">
                                        <img src="/media/images/product.png" alt="product">
                                        <button type="button" class="fav"><i class="fa-solid fa-heart"></i></button>
                                        <span class="info"><i class="fa-solid fa-circle-info"></i></span>
                                    </div>
                                    <div class="card-info">
                                        <h3>2021 Saidian Egyptian orthodontic Annual meeting</h3>
                                        <div class="icon price">
                                            <i class="fa-solid fa-sack-dollar"></i> <b>Price:</b> Free
                                        </div>
                                        <div class="icon date">
                                            <i class="fa-solid fa-calendar-day"></i> <b>Date:</b> 11 July 2021
                                        </div>

                                        <a href="#" class="btn btn-light">More details</a>
                                        <p class="view">200 views</p>
                                        <div class="text-center">
                                            <button type="button" class="btn btn-default add-cart">1 day: 2 hours: 5 min </button>
                                        </div>
                                    </div>

                                    <div class="overlay">
                                        <span class="close-card"><i class="fa-solid fa-circle-xmark"></i></span>
                                        <h4>2021 Saidian Egyptian orthodontic Annual meeting KSA
                                            for EOS members
                                        </h4>
                                        <p>Details</p>
                                        <div class="status-info">
                                            <div class="status-text">
                                                <span></span> <small>Online Event</small>
                                            </div>
                                            <div class="price">
                                                <b>Price:</b> Free
                                            </div>
                                        </div>
                                        <div class="icon-info">
                                            <div class="icon">
                                                <i class="fa-solid fa-calendar-day"></i>
                                                <div class="icon-text">
                                                    <span><b>Date:</b> 11 July 2021</span>
                                                    <span>02:00 pm : 06:00pm</span>
                                                </div>
                                            </div>

                                            <div class="icon">
                                                <i class="fa-solid fa-briefcase-clock"></i>
                                                <div class="icon-text">
                                                    <span><b>Time:</b> 3 hours</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="icon-info">
                                            <div class="icon">
                                                <i class="fa-solid fa-trophy-star"></i>
                                                <div class="icon-text">
                                                    <span><b>Organized by:</b></span>
                                                    <span>Infotech coorpration</span>
                                                    <span><img src="/media/images/ligt-logo.png" alt="logo"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="list-unstyled">
                                            <li>
                                                <h3>Accreditation number (CME's)</h3>
                                                <p>yes</p>
                                            </li>
                                            <li>
                                                <h3>Specialities</h3>
                                                <p>Orthodontics - Medical - Social</p>
                                            </li>
                                            <li>
                                                <h3>Speakers</h3>
                                                <p>Ahmed Mharam</p>
                                            </li>
                                            <li>
                                                <h3>Available seats</h3>
                                                <p>20</p>
                                            </li>
                                            <li>
                                                <h3>Total of CME's</h3>
                                                <p>3</p>
                                            </li>
                                        </ul>

                                        <div class="sponsor">
                                            <h3>Sponsors</h3>
                                            <img src="/media/images/logo1.png" alt="logo">
                                            <img src="/media/images/logo2.png" alt="logo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="top-pos">
                            <div class="search-box">
                                <form action="">
                                    <h2><i class="fa-solid fa-magnifying-glass"></i> Search</h2>
                                    <div class="form-group">
                                        <label for="course-name">Course name</label>
                                        <input type="text" class="form-control" name="course-name" placeholder="Type course name">
                                    </div>
                                    <div class="form-group">
                                        <label for="speciality">Speciality</label>
                                        <input type="text" class="form-control" name="speciality" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="course-type">Course type</label>
                                        <select name="course-type" class="form-control" id="">
                                            <option value="0" selected>Online event</option>
                                        </select>
                                    </div>

                                    <button class="btn btn-default" type="button">Start Search </button>
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

@endsection
