@extends('admin.layouts.app')
@section('content')
        <!-- Start Content -->
        <div class="content-side">
            <div class="page-title">
                <div class="container-fluid "><h1><img src="/admin/assets/img/icon2.png" alt="icon"> Speakers  </h1></div>

            </div>
            <div class="container-fluid bg-blue">
                <div class="content-body">
                    <div class="form-body">
                        <h4>Create new speaker</h4>
                        <form action="{{route('admin.speakers.store')}}" method="POST" enctype="multipart/form-data" id="create-speaker-form">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="mb-4">
                                        <label for="title_id" class="form-label">Title </label>
                                        <select class="form-select" aria-label="Default select example" name="user_title_id" td="title_id">
                                            <option selected></option>
                                            @foreach ($titles as $title)
                                                <option value="{{$title->id}}">{{$title->name}}</option>
                                            @endforeach
                                          </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="" class="form-label">Speaker name</label>
                                        <input type="text" class="form-control mb-3" name="name_en" placeholder="English name">
                                        <input type="text" class="form-control " name="name_ar" placeholder="Arabic Name">
                                    </div>
                                    <div class="mb-4">
                                        <label for="position" class="form-label">Position </label>
                                        <input type="text" class="form-control" id="position" name="position" placeholder="">
                                    </div>

                                    <div class="mb-4">
                                        <label for="email" class="form-label">Email </label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="">
                                    </div>

                                    <div class="mb-4">
                                        <label for="speciality_id" class="form-label">Speciality </label>
                                        <select class="form-select" aria-label="Default select example" name="speciality_id" td="speciality_id">
                                            <option selected></option>
                                            @foreach ($specialities as $speciality)
                                                <option value="{{$speciality->id}}">{{$speciality->name}}</option>
                                            @endforeach
                                          </select>
                                    </div>

                                    <div class="mb-4">
                                        <label for="mobile" class="form-label">Mobile </label>
                                        <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="">
                                    </div>

                                    <div class="mb-4">
                                        <label for="country-selector" class="form-label">Country </label>
                                        <select class="form-select" aria-label="Default select example" name="country_id" id="country-selector">
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label for="city-selector" class="form-label">City </label>
                                        <select class="form-select" aria-label="Default select example" name="city_id" id="city-selector" disabled>
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label for="bio" class="form-label">BIO </label>
                                        <textarea class="form-control" name="bio" id="bio"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="mb-4">
                                        <label for="image" class="form-label">Upload Picture </label>
                                        <div class="upload-file">
                                            <div class="custom-file">
                                                <input class="custom-file-input" name="image" id="image" type="file" />
                                                <label class="custom-file-label" ></label>
                                            </div>
                                            <div class="message">
                                                <span>Maximum size 5 MB
                                                </span>
                                                <span>Extensions available jpg, png</span>
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
    <script src="{{asset('/admin/assets/js/speakers/create.min.js')}}"></script>
    <script>
        // Upload file
        $(document).ready(function() {
            $(document).on('change', '.custom-file-input',function(event){
                var files = event.target.files;
                // console.log(files);
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    $(this).next('.custom-file-label').addClass("selected").html(file.name);
                }
            });
        });
    </script>
@endsection
