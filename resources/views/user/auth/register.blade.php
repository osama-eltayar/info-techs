@extends('user.layouts.app')
@section('header')
    <title></title>
@endsection
@section('content')

        <!-- Start Banner-->
        <section class="banner" style="background-image: url('media/images/banner.png');">
            <h1>Start your learning journey</h1>
        </section>

        <!-- Start Nav Links-->
        <section class="nav-links">
            <div class="container">
                <a href="#">Home page</a>
                <span>|</span>
                <a href="#">Create new account</a>
            </div>
        </section>

        <!-- Start Form -->
        <section class="form-section">
            <div class="form-content">
                <form action="{{route('register')}}" method="post">
                    @csrf
                    <div class="title">
                        <i class="fa-solid fa-user-plus"></i> Create new account
                    </div>
                    <h3>Please fill these information to create your new account</h3>
                    <div class="form-group">
                        <span class="top-message">* All fields are mandatory</span>
                        <label for="fullName">Full name <span>*</span></label>
                        <div class="input-icon">
                            <input type="text" name="name" class="form-control">
                            <i class="fa-solid fa-circle-user"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email  <span>*</span></label>
                        <div class="input-icon">
                            <input type="email" name="email" class="form-control">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password  <span>*</span></label>
                        <div class="input-icon">
                            <input type="password" name="password" id="password" class="form-control">
                            <i class="fa-solid fa-lock-keyhole"></i>
                            <span class="message">minimum 6 characters</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password-confirmation">Retype password  <span>*</span></label>
                        <div class="input-icon">
                            <input type="password" id="password-confirmation" name="password_confirmation" class="form-control">
                            <i class="fa-solid fa-lock-keyhole"></i>
                        </div>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                        <label class="custom-control-label" for="customCheck">
                            I agree to Terms of Service and I have read the Privacy Policy.<br>
                            I would like to get up-to-date information regarding new features, updates, training, and activities .<br>
                            I can unsubscribe at any time.
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Create new account</button>
                    <div class="text-right">
                        <a href="#">Already have an account</a>
                    </div>
                </form>
            </div>
        </section>

        <div class="qus">
            <a href="#"><i class="fa-solid fa-circle-question"></i></a>
        </div>
@endsection
@section('script')

@endsection
