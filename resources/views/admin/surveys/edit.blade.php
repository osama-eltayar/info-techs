@extends('admin.layouts.app')
@section('styles')
    <script src="{{asset('/js/app.js')}}" defer></script>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <h1>Edit Survey</h1>
            <div class="col-6">
                <div id="app">
                    <survey-form
                        :question-types='@json($questionTypes)'
                        :is-edit="true"
                        :form-data='@json($surveyData)'
                        form-submit-url='{{route('admin.surveys.update',$survey->id)}}'
                    >

                    </survey-form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection
