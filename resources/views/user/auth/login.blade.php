@extends('user.layouts.app')
@section('header')
@endsection
@section('content')
        <!-- Start Banner-->
        <section class="banner" style="background-image: url('media/images/banner2.png');">
            <h1>Login to my account</h1>
        </section>

        <!-- Start Nav Links-->
        <section class="nav-links">
            <div class="container">
                <a href="#">Home page</a>
                <span>|</span>
                <a href="#">Login to my account</a>
            </div>
        </section>

        <!-- Start Form -->
        <section class="form-section">
            <div class="form-content">
                <form action="{{route('login')}}" method="post" id="login-form">
                    @csrf
                    <div class="title">
                        <i class="fa-solid fa-user-plus"></i> Login to my account
                    </div>
                    <h3>Please fill these information to login to you account</h3>
                    <div class="form-group">
                        <span class="top-message">* All fields are mandatory</span>
                        <label for="email">Email  <span>*</span></label>
                        <div class="input-icon">
                            <input type="email" id="email" name="email" class="form-control">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        @error('email')
                        <label  class="error" >{{$message}}</label>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password  <span>*</span></label>
                        <div class="input-icon">
                            <input type="password" id="password" name="password" class="form-control">
                            <i class="fa-solid fa-lock-keyhole"></i>
                        </div>
                        @error('password')
                        <label  class="error" >{{$message}}</label>
                        @enderror
                    </div>


                    <div class="row">
                        <div class="col-md-6 col-6">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck" name="remember_me">
                                <label class="custom-control-label" for="customCheck">
                                    Remember me
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 col-6">
                            <div class="text-right">
                                <a href="{{route('password.forget')}}">Forgot password ?</a>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>

                </form>
            </div>
        </section>

        <div class="qus">
            <a href="#"><i class="fa-solid fa-circle-question"></i></a>
        </div>

@endsection
@section('script')
    <script src="/js/auth/login.min.js"></script>
@endsection
