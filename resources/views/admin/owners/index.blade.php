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
                <div class="container-fluid "><h1><img src="/admin/assets/img/icon2.png" alt="icon"> Owners  </h1></div>

            </div>
            <div class="container-fluid bg-blue">
                <div class="content-body">
                    <div class="form-body">
                        <h4>Create new owner</h4>
                    </div>
                    <div class="form-search">
                        <form action="{{route('admin.owners.index')}}" method="GET" id="owners-search-form">
                            <div class="row justify-content-end">
                                <div class="col-lg-4 col-12 mb-2">
                                    <label for="" class="form-label">Search by name</label>
                                    <div class="search-form">
                                        <input type="text" class="form-control" id="" name="name">
                                        <button class="btn btn-primary search-btn"  type="button" id="owners-search-btn">Search</button>
                                    </div>
                                </div>


                            </div>
                        </form>
                    </div>
                    <div class="table-title">
                        <div class="text-end">
                            <h3>
                                Export report
                                <button class="btn-file btn-pdf" ><i class="fa-solid fa-file-pdf"></i></button>
                                <button class="btn-file btn-excel"><i class="fa-solid fa-file-excel"></i></button>
                            </h3>
                        </div>
                    </div>
                    <form action="{{route('admin.owners.export.excel')}}" method="POST" id="owners-export-excel-form">
                        @csrf
                    </form>
                    <form action="{{route('admin.owners.export.pdf')}}" method="POST" id="owners-export-pdf-form">
                        @csrf
                    </form>
                    <div id="owners-list-container">
                        @include('admin.owners.partials.owners-list')
                    </div>

                </div>
            </div>
        </div>
@endsection
@section('scripts')
    <script src="{{asset('/admin/assets/js/owners/list.min.js')}}"></script>
@endsection
