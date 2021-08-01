@extends('user.layouts.app')
@section('header')
    <title></title>
@endsection
@section('content')

        <!-- Start Banner-->
        <section class="banner" style="background-image: url('media/images/banner3.png');">
            <h1>Change password</h1>
        </section>

        <!-- Start Nav Links-->
        <section class="nav-links">
            <div class="container">
                <a href="#">Home page</a>
                <span>|</span>
                <a href="#">Change password</a>
            </div>
        </section>

        <!-- Start Form -->
        <section class="form-section">
            <div class="form-content">
                <form action="{{auth()->check() ?  route('auth.password.reset') : route('password.reset') }}" method="post" id="reset-password-form">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @csrf
                    <div class="title">
                        <i class="fa-solid fa-lock-keyhole"></i> Change password
                    </div>
                    <h3>Please fill these information to change your password</h3>
                    @auth
                    <div class="form-group">
                        <span class="top-message">* All fields are mandatory</span>
                        <label for="oldpassword">Old Password  <span>*</span></label>
                        <div class="input-icon">
                            <input type="password" id="oldpassword" name="old_password" class="form-control">
                            <i class="fa-solid fa-lock-keyhole"></i>
                            @error('old_password')
                            <label  class="error" >{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    @endauth
                    @guest
                            <input type="hidden" name="token" value="{{$token}}">
                            <input type="hidden" name="email" value="{{$email}}">
                    @endguest

                    <div class="form-group">
                        <label for="newpassword">New Password  <span>*</span></label>
                        <div class="input-icon">
                            <input type="password" id="newpassword" name="password" class="form-control">
                            <i class="fa-solid fa-lock-keyhole"></i>
                            @error('password')
                            <label  class="error" >{{$message}}</label>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="retypepassword">Retype New password  <span>*</span></label>
                        <div class="input-icon">
                            <input type="password" id="retypepassword" name="password_confirmation" class="form-control">
                            <i class="fa-solid fa-lock-keyhole"></i>
                            @error('password_confirmation')
                            <label  class="error" >{{$message}}</label>
                            @enderror
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Reset</button>

                </form>
            </div>
        </section>

        <div class="qus">
            <a href="#"><i class="fa-solid fa-circle-question"></i></a>
        </div>
@endsection
@section('script')
    <script src="/js/auth/reset-password.min.js"></script>
@endsection
