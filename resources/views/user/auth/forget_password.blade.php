@extends('user.layouts.app')
@section('header')
@endsection
@section('content')

        <!-- Start Banner-->
        <section class="banner" style="background-image: url('media/images/banner4.png');">
            <h1>Forgot password</h1>
        </section>

        <!-- Start Nav Links-->
        <section class="nav-links">
            <div class="container">
                <a href="{{route('courses.index')}}">Home page</a>
                <span>|</span>
                <a href="{{route('password.forget')}}">Forgot password</a>
            </div>
        </section>

        <!-- Start Form -->
        <section class="form-section">
            <div class="form-content">
                <form action="{{route('password.forget')}}" method="post" id="forget-password-form">
                    @csrf
                    <div class="title">
                        <i class="fa-solid fa-lock-keyhole"></i> Forgot password
                    </div>
                    <h3>Please fill these information to Retrieve your password</h3>
                    <div class="form-group">
                        <span class="top-message">* All fields are mandatory</span>
                        <label for="email">Email  <span>*</span></label>
                        <div class="input-icon">
                            <input type="email" id="email" name="email" class="form-control">
                            <i class="fa-solid fa-envelope"></i>
                            @error('email')
                            <label  class="error" >{{$message}}</label>
                            @enderror
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
    <script src="/js/auth/forget-password.min.js"></script>
@endsection
