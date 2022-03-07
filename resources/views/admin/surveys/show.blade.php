@extends('admin.layouts.app')
@section('content')
    <!-- Start Content -->
    <div class="content-side">
        <div class="page-title">
            <div class="container-fluid ">
                <h1><img src="/admin/assets/img/icon2.png" alt="icon"> Owners </h1>
            </div>

        </div>
        <div class="container-fluid bg-blue">
            <div class="content-body">
                <div class="event-body">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <h4>Survey Details
                            </h4>
                            <h3>{{ $survey->title }}</h3>
                        </div>
                    </div>
                    <div class="row w-70">
                        @foreach ($questions as $question)
                            <div class="col-lg-6 col-12">
                                <div class="box-date">
                                    <div class="list-date">
                                        <ul class="list-unstyled">
                                            <p>Question :</p>
                                            <li>
                                                <span class="left-side">{{ $question->title }}</span>
                                            </li>
                                            <p>Answers :</p>
                                            @foreach ($question->answers as $answer)
                                                <li>
                                                    <span class="left-side">{{ $answer->title }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('/admin/assets/js/owners/show.min.js') }}"></script>
@endsection
