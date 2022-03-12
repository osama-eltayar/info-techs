@extends('admin.layouts.app')
@section('styles')
    <style>
        .btn-file {
            border: none;
            background: transparent
        }

    </style>
@endsection
@section('content')
    <!-- Start Content -->
    <div class="content-side">
        <div class="page-title">
            <div class="container-fluid ">
                <h1><img src="/admin/assets/img/icon2.png" alt="icon"> surveys </h1>
            </div>

        </div>
        <div class="container-fluid bg-blue">
            <div class="content-body">
                <div class="form-body">
                    <a href="{{route('admin.surveys.create')}}">Create new survey</a>
                </div>

                <div id="surveys-list-container">
                    @include('admin.surveys.partials.surveys-list')
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('/admin/assets/js/surveys/list.min.js') }}"></script>
@endsection
