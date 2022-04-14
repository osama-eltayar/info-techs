@extends('admin.layouts.app')
@section('styles')
@endsection
@section('content')
    <div class="content-side">
        <div class="page-title">
            <div class="container-fluid "><h1><img src="/admin/assets/img/icon2.png" alt="icon"> Discounts & Promocodes  </h1></div>

        </div>
        <div class="container-fluid bg-blue">
            <div class="content-body">
                <div class="form-body">
                    <h4>Create new promocode</h4>
                    <form action="{{route('admin.discounts.store')}}" method="POST" id="discount-form">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="mb-4">
                                    <label for="" class="form-label">Discount offer </label>
                                    <select class="form-select" aria-label="Default select example" name="type">
                                        @foreach($discountTypes as $discountTypeName=> $discountTypeValue)
                                            <option value="{{$discountTypeValue}}" @if($loop->first) selected @endif>{{$discountTypeName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="" class="form-label">Discount name</label>
                                    <input type="text" class="form-control" id="" placeholder="freeblack friday" name="name">
                                </div>
                                <div class="mb-4">
                                    <label for="" class="form-label">Discount code</label>
                                    <input type="text" class="form-control" id="" placeholder="" name="code">
                                </div>

                                <div class="mb-4">
                                    <label for="" class="form-label">Discount type </label>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <input type="number" class="form-control mb-2 " id="" placeholder="" name="amount">
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <select class="form-select" aria-label="Default select example" name="amount_type">
                                                @foreach($discountAmountTypes as $discountAmountType)
                                                    <option value="{{$discountAmountType['value']}}" @if($loop->first) selected @endif>{{$discountAmountType['name']}}</option>
                                                @endforeach
                                            </select>
                                            <span class="message">SAR & %</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="" class="form-label">Generation number </label>
                                    <input type="number" class="form-control " id="" placeholder="100" name="generation_number">
                                </div>
                                <div class="mb-4">
                                    <label for="" class="form-label">Limit usage </label>
                                    <input type="number" class="form-control " id="" placeholder="" name="limit_usage">
                                    <span class="message">This type for one time only</span>
                                </div>
                                <div class="mb-4">
                                    <label for="" class="form-label">Event Name </label>
                                    <select class="form-select" aria-label="Default select example" name="course_id">
                                        <option selected disabled value=""> Event</option>
                                        @foreach($courses as $course)
                                            <option value="{{$course->id}}" >{{$course->title}}</option>
                                        @endforeach
                                    </select>
                                    <span class="message">Leave blank for all event name</span>
                                </div>
                                <div class="mb-4">
                                    <label for="" class="form-label">Event Speciality </label>
                                    <select class="form-select" aria-label="Default select example" multiple name="specialities[]" id="speciality-selector">
                                    @foreach($specialities as $speciality)
                                            <option value="{{$speciality->id}}" >{{$speciality->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="message">Leave blank for all speciality</span>
                                </div>

                                <div class="mb-4">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <label for="" class="form-label">Start Date</label>
                                            <div class="custom-date">
                                                <input type="date" class="form-control mb-2" id="" data-toggle="datepicker" placeholder="Date" aria-label="Date" name="start_date">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label for="" class="form-label">End Date </label>
                                            <div class="custom-date">
                                                <input type="date" class="form-control mb-2" id="" data-toggle="datepicker" placeholder="Date" aria-label="Date" name="end_date">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-action">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('admin/assets/js/discounts/edit.min.js')}}"></script>
@endsection
