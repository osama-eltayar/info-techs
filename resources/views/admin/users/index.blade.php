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
                <h1><img src="/admin/assets/img/icon2.png" alt="icon"> users </h1>
            </div>

        </div>
        <div class="container-fluid bg-blue">
            <div class="content-body">
                <div class="form-body">
                    <h4>Create new user</h4>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-2">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="text-center font-weight-bold">Registered User</h6>
                                    <p class="text-center font-weight-bold">{{ $registeredUsers }}</p>
                                    <h6 class="text-center font-weight-bold">Users</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="text-center font-weight-bold">Active User</h6>
                                    <p class="text-center font-weight-bold">{{ $activeUsers }}</p>
                                    <h6 class="text-center font-weight-bold">Users</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="card text-danger">
                                <div class="card-body">
                                    <h6 class="text-center font-weight-bold">Not Active</h6>
                                    <p class="text-center font-weight-bold">{{ $nonActiveUsers }}</p>
                                    <h6 class="text-center font-weight-bold">Users</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <br>
                <div class="form-search">
                    <form action="{{ route('admin.users.index') }}" method="GET" id="users-search-form">
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
                                        id="users-search-btn">Search</button>
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
                <form action="{{ route('admin.users.export.excel') }}" method="POST" id="users-export-excel-form">
                    @csrf
                </form>
                <form action="{{ route('admin.users.export.pdf') }}" method="POST" id="users-export-pdf-form">
                    @csrf
                </form>
                <div id="users-list-container">
                    @include('admin.users.partials.users-list')
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('/admin/assets/js/users/list.min.js') }}"></script>
@endsection
