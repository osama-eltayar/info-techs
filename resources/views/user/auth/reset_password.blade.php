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
                <form action="">
                    <div class="title">
                        <i class="fa-solid fa-lock-keyhole"></i> Change password
                    </div>
                    <h3>Please fill these information to change your password</h3>
                    <div class="form-group">
                        <span class="top-message">* All fields are mandatory</span>
                        <label for="oldpassword">Old Password  <span>*</span></label>
                        <div class="input-icon">
                            <input type="password" name="oldpassword" class="form-control">
                            <i class="fa-solid fa-lock-keyhole"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="newpassword">New Password  <span>*</span></label>
                        <div class="input-icon">
                            <input type="password" name="newpassword" class="form-control">
                            <i class="fa-solid fa-lock-keyhole"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="retypepassword">Retype New password  <span>*</span></label>
                        <div class="input-icon">
                            <input type="password" name="retypepassword" class="form-control">
                            <i class="fa-solid fa-lock-keyhole"></i>
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary">Login</button>

                </form>
            </div>
        </section>

        <div class="qus">
            <a href="#"><i class="fa-solid fa-circle-question"></i></a>
        </div>
@endsection
@section('script')

@endsection
