@extends('admin.layouts.app')
@section('styles')
    <style>
        .btn-file{
            border: none;
            background: transparent
        }
    </style>
@endsection
@section('content')

        <!-- Start Content -->
        <div class="content-side">
            <div class="page-title">
                <div class="container-fluid "><h1><img src="/admin/assets/img/icon2.png" alt="icon"> Sponsors  </h1></div>

            </div>
            <div class="container-fluid bg-blue">
                <div class="content-body">
                    <div class="form-body">
                        <h4 >Create new sponsor</h4>
                    </div>
                    <div class="form-search">
                        <form action="{{route('admin.sponsors.index')}}" method="GET" id="sponsors-search-form">
                            <div class="row justify-content-end">
                                <div class="col-lg-4 col-12 mb-2">
                                    <label for="" class="form-label">Search by name</label>
                                    <div class="search-form">
                                        <input type="text" class="form-control" id="" name="name">
                                        <button class="btn btn-primary search-btn"  type="button" id="sponsors-search-btn">Search</button>
                                    </div>
                                </div>


                            </div>
                        </form>
                    </div>
                    <div class="table-title">
                        <div class="text-end">
                            <h3>
                                Export report
                                <button class="btn-file btn-pdf"  type="button"><i class="fa-solid fa-file-pdf"></i></button>
                                <button class="btn-file btn-excel" type="button"><i class="fa-solid fa-file-excel"></i></button>
                            </h3>
                        </div>
                    </div>
                    <form action="{{route('admin.sponsors.export.excel')}}" method="POST" id="sponsors-export-excel-form">
                        @csrf
                    </form>
                    <form action="{{route('admin.sponsors.export.pdf')}}" method="POST" id="sponsors-export-pdf-form">
                        @csrf
                    </form>
                    <div id="sponsors-list-container">
                        @include('admin.sponsors.partials.sponsors-list')
                    </div>

                </div>
            </div>
        </div>
@endsection
@section('scripts')
    <script src="{{asset('/admin/assets/js/sponsors/list.min.js')}}"></script>
@endsection
