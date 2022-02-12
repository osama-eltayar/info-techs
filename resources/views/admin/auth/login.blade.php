@extends('admin.layouts.app')
@section('content')
    <div class="login">
        <div class="login-content">
            <div class="logo-form">
                <img src="{{asset('admin/assets/img/logo.png')}}" alt="logo">
            </div>
            <form action="{{route('admin.login')}}" method="POST" id="login-form">
                @csrf
                <div class="mb-4">
                    <label for="email" class="form-label">Email </label>
                    <input type="email" class="form-control " id="email" placeholder="" name="email" value="{{old('email')}}">
                    @error('email')
                    <label  class="error" >{{$message}}</label>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password </label>
                    <input type="password" class="form-control " id="password" placeholder="" name="password">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="remember_me" >
                    <label class="form-check-label" for="flexCheckDefault">
                        Remember
                    </label>
                </div>
                <div class="form-action">
                    <button  class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection()
@section('scripts')
    <script src="{{asset('admin/assets/js/auth/login.min.js')}}"></script>
@endsection()
