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
                <a href="#">Home page</a>
                <span>|</span>
                <a href="#">Forgot password</a>
            </div>
        </section>

        <!-- Start Form -->
        <section class="form-section">
            <div class="form-content">
                <form action="" method="post">
                    @csrf
                    <div class="title">
                        <i class="fa-solid fa-lock-keyhole"></i> Forgot password
                    </div>
                    <h3>Please fill these information to Retrieve your password</h3>
                    <div class="form-group">
                        <span class="top-message">* All fields are mandatory</span>
                        <label for="email">Email  <span>*</span></label>
                        <div class="input-icon">
                            <input type="email" name="email" class="form-control">
                            <i class="fa-solid fa-envelope"></i>
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
