@extends('admin.layouts.app')
@section('styles')
@endsection
@section('content')
    <!-- Start Content -->
    <div class="content-side">
        <div class="page-title">
            <div class="container-fluid ">
                <h1><img src="/admin/assets/img/icon2.png" alt="icon"> Events </h1>
            </div>

        </div>
        <div class="container-fluid bg-blue">
            <div class="content-body">
                <div class="form-body">
                    <h4>Create new event</h4>
                </div>
                <div class="form-search">
                    <form action="{{ route('admin.events.index') }}" method="GET" id="events-search-form">
                        <div class="row justify-content-end">
                            <div class="col-lg-3 col-12 mb-2">
                                <label for="" class="form-label">From</label>
                                <div class="search-form">
                                    <input type="date" class="form-control" id="" name="start_date">
                                </div>
                            </div>
                            <div class="col-lg-3 col-12 mb-2">
                                <label for="" class="form-label">To</label>
                                <div class="search-form">
                                    <input type="date" class="form-control" id="" name="end_date">
                                </div>
                            </div>
                            <div class="col-lg-3 col-12 mb-2">
                                <label for="" class="form-label">Organization</label>
                                <div class="search-form">
                                    <select class="form-select" aria-label="Default select example"
                                        name="organization_id">
                                        <option value='' selected>All</option>
                                        @foreach ($organizations as $organization)
                                            <option value="{{ $organization->id }}">{{ $organization->name_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!--status-->
                            <div class="col-lg-3 col-12 mb-2">
                                <label for="" class="form-label">Status</label>
                                <div class="search-form">
                                    <select class="form-select" aria-label="Default select example" name="type">
                                        <option value="" selected>All</option>
                                        <option value="1">Online Event</option>
                                        <option value="2">Online Course</option>
                                        <option value="3">Recorded</option>
                                        <option value="4">Phyiscal</option>
                                        <option value="5">Hybrid</option>
                                    </select>
                                    <button type="button" class="btn btn-primary search-btn"
                                        id="events-search-btn">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>

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
