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
                <h1><img src="/admin/assets/img/icon2.png" alt="icon"> transactions </h1>
            </div>

        </div>
        <div class="container-fluid bg-blue">
            <div class="content-body">
                <div class="form-body">
                    <h4>Transaction</h4>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-2">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="text-center font-weight-bold">Invoices</h6>
                                    <p class="text-center font-weight-bold">{{$shoppingCartsCount}}</p>
                                    <h6 class="text-center font-weight-bold">Invoices</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="text-center font-weight-bold">Total of invoice</h6>
                                    <p class="text-center font-weight-bold">{{$shoppingCartsPricesSum}}</p>
                                    <h6 class="text-center font-weight-bold">SAR</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="card">
                                <div class="card-body font-weight-bold">
                                    <h6 class="text-center font-weight-bold">Total of events</h6>
                                    <p class="text-center font-weight-bold">{{$coursesCount}}</p>
                                    <h6 class="text-center font-weight-bold">Events</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <br>
                <div class="form-search">
                    <form action="{{ route('admin.shopping-carts.index') }}" method="GET" id="transactions-search-form">
                        <div class="row justify-content-end">
                            <div class="col-lg-2 col-12 mb-2">
                                <label for="" class="form-label">Number</label>
                                <div class="search-form">
                                    <input type="text" class="form-control" id="" name="number">
                                </div>
                            </div>
                            <div class="col-lg-2 col-12 mb-2">
                                <label for="" class="form-label">Name</label>
                                <div class="search-form">
                                    <input type="text" class="form-control" id="" name="name">
                                </div>
                            </div>
                            <div class="col-lg-2 col-12 mb-2">
                                <label for="" class="form-label">Course Name</label>
                                <div class="search-form">
                                    <input type="text" class="form-control" id="" name="course_name">
                                </div>
                            </div>
                            <div class="col-lg-3 col-12 mb-2">
                                <label for="" class="form-label">Invoice Date</label>
                                <div class="search-form">
                                    <input type="date" class="form-control" id="" name="paid_at">
                                </div>
                            </div>
                            <div class="col-lg-3 col-12 mb-2">
                                <label for="" class="form-label">Status</label>
                                <div class="search-form">
                                    <select class="form-select" aria-label="Default select example" name="type">
                                        <option value="" selected>All</option>
                                        <option value="pending">Pending</option>
                                        <option value="done">Done</option>
                                        <option value="failed">Failed</option>
                                    </select>
                                    <button type="button" class="btn btn-primary search-btn"
                                        id="transactions-search-btn">Search</button>
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
                <form action="{{ route('admin.shopping-carts.export.excel') }}" method="POST" id="transactions-export-excel-form">
                    @csrf
                </form>
                 
                <form action="{{ route('admin.shopping-carts.export.pdf') }}" method="POST" id="transactions-export-pdf-form">
                    @csrf
                </form>
                <div id="transactions-list-container">
                    @include('admin.shopping-carts.partials.shopping-carts-list')
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('/admin/assets/js/shoppingCarts/list.min.js') }}"></script>
@endsection
