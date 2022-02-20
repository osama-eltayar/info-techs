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
                <h1><img src="/admin/assets/img/icon2.png" alt="icon"> events </h1>
            </div>

        </div>
        <div class="container-fluid bg-blue">
            <div class="content-body">
                <div class="form-body">
                    <h4>Create new user</h4>
                </div>
                <div class="form-search">
                    <form action="{{ route('admin.events.index') }}" method="GET" id="events-search-form">
                        <div class="row justify-content-end">
                            <div class="col-lg-3 col-12 mb-2">
                                <label for="" class="form-label">Name</label>
                                <div class="search-form">
                                    <input type="text" class="form-control" id="" name="name">
                                </div>
                            </div>
                            <div class="col-lg-3 col-12 mb-2">
                                <label for="" class="form-label">Creation date</label>
                                <div class="search-form">
                                    <input type="date" class="form-control" id="" name="created_at">
                                </div>
                            </div>
                            <div class="col-lg-3 col-12 mb-2">
                                <label for="" class="form-label">Email</label>
                                <div class="search-form">
                                    <input type="text" class="form-control" id="" name="email">
                                </div>
                            </div>
                            <div class="col-lg-3 col-12 mb-2">
                                <label for="" class="form-label">Status</label>
                                <div class="search-form">
                                    <select class="form-select" aria-label="Default select example" name="status">
                                        <option selected>All</option>
                                        <option value="1">Active</option>
                                        <option value="2">Not Active</option>
                                    </select>
                                    <button type="button" class="btn btn-primary search-btn"
                                        id="events-search-btn">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="table-title">
                    <div class="text-end">
                        <h3>
                            Export report
                            <button class="btn-file btn-pdf" type="button"><i class="fa-solid fa-file-pdf"></i></button>
                            <button class="btn-file btn-excel" type="button"><i class="fa-solid fa-file-excel"></i></button>
                        </h3>
                    </div>
                </div>
                <div id="events-list-container">
                    @include('admin.events.partials.events-list')
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('/admin/assets/js/events/list.min.js') }}"></script>
@endsection
