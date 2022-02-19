@extends('admin.layouts.app')
@section('styles')
    <link rel="stylesheet" href="/admin/assets/css/jquery-clockpicker.css" />
    <link rel="stylesheet" href="/admin/assets/css/datepicker.css" />
    <script src="{{asset('/js/app.js')}}" defer></script>
@endsection
@section('content')
    <div class="content-side">
        <div class="page-title">
            <div class="container-fluid "><h1><img src="assets/img/icon2.png" alt="icon"> Edit  event  </h1></div>

        </div>
        <div class="container-fluid bg-blue">
            <div class="tabs-body">
                <ul class="nav nav-pills " id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-1-tab" data-bs-toggle="pill" data-bs-target="#pills-1" type="button" role="tab" aria-controls="pills-1" aria-selected="true"><i class="fa-solid fa-align-left"></i> General information</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-2-tab" data-bs-toggle="pill" data-bs-target="#pills-2" type="button" role="tab" aria-controls="pills-2" aria-selected="false"><i class="fa-solid fa-credit-card"></i> Payments and discounts</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-3-tab" data-bs-toggle="pill" data-bs-target="#pills-3" type="button" role="tab" aria-controls="pills-3" aria-selected="false"><i class="fa-solid fa-keynote"></i> Chair persons & speakers</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-4-tab" data-bs-toggle="pill" data-bs-target="#pills-4" type="button" role="tab" aria-controls="pills-4" aria-selected="true"><i class="fa-solid fa-file-certificate"></i> Sponsors</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-5-tab" data-bs-toggle="pill" data-bs-target="#pills-5" type="button" role="tab" aria-controls="pills-5" aria-selected="false"><i class="fa-solid fa-file"></i> Materials</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-6-tab" data-bs-toggle="pill" data-bs-target="#pills-6" type="button" role="tab" aria-controls="pills-6" aria-selected="false"><i class="fa-solid fa-info"></i> Event description</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-7-tab" data-bs-toggle="pill" data-bs-target="#pills-7" type="button" role="tab" aria-controls="pills-7" aria-selected="false"><i class="fa-solid fa-photo-film"></i> Event Media</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-8-tab" data-bs-toggle="pill" data-bs-target="#pills-8" type="button" role="tab" aria-controls="pills-8" aria-selected="false"><i class="fa-solid fa-calendar-star"></i> Publish sceduale</button>
                    </li>

                </ul>
                <div id="app">
                    <event-form
                        :course-types='@json($courseTypes)'
                        :specialities='@json($specialities)'
                        :owners='@json($owners)'
                        :countries='@json($countries)'
                        :sponsor-types='@json($sponsorTypes)'
                        :sponsors='@json($sponsors)'
                        :speakers='@json($speakers)'
                        :chair-persons='@json($chairPersons)'
                        :is-edit="true"
                        :db-data='@json($eventData)'
                        form-submit-url="{{route('admin.events.update',$event)}}"
                    ></event-form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="/admin/assets/js/vendor/datepicker.js"></script>
    <script src="/admin/assets/js/vendor/jquery-clockpicker.js"></script>
    <script>
       // $(function (){
       //     $('[data-toggle="datepicker"]').datepicker();
       //
       //     $('.clockpicker').clockpicker({
       //         placement: 'top',
       //         align: 'left',
       //         donetext: 'Done'
       //     });
       // })
    </script>
@endsection
