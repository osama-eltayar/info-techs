<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Dashboard</title>
    <link rel="icon" href="{{asset('/admin/assets/img/fav.png')}}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('admin/assets/css/font-awsome-all.css')}}"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('admin/assets/css/styles.css')}}"/>
    <link rel="stylesheet" href="/css/vendor/toastr.min.css">
    <style>
        .btn-file{
            border: none;
            background: transparent
        }
    </style>
    @yield('styles')

</head>

<body>
<div class="page-wrapper">
    <main>
        @auth()
            <div class="dashboard-content">
                <!-- Start Sidebar -->
                @include('admin.layouts.partials.sidebar')
                <!-- Start Dashboard -->
                <div class="dashboard-body">
                @endauth
                <!-- Start Header -->
                    @auth()
                        @include('admin.layouts.partials.header')
                    @endauth
                    @yield('content')
                    @auth()
                </div>
            </div>
        @endauth

    </main>
</div>
<!-- Start Footer -->
<!-- Scripts -->
<script src="{{asset('admin/assets/js/vendor/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"
        integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('/js/common/additional-methods.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="/js/vendor/toastr.min.js"></script>
<script src="{{asset('admin/assets/js/vendor/datepicker.js')}}"></script>
<script src="{{asset('admin/assets/js/scripts.js')}}"></script>
<script src="{{asset('/admin/assets/js/common.min.js')}}"></script>
@yield('scripts')
</body>

</html>
