@extends('admin.layouts.app')
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
                    <form action="{{route('admin.owners.update',$owner->id)}}" method="POST" enctype="multipart/form-data" id="edit-owner-form">
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="mb-4">
                                    <label for="" class="form-label">Owner name</label>
                                    <input type="text" class="form-control mb-3" id="" placeholder="English name" name="name_en" value="{{$owner->name_en}}">
                                    <input type="text" class="form-control " id="" placeholder="Arabic Name" name="name_ar" value="{{$owner->name_ar}}">
                                </div>

                                <div class="mb-4">
                                    <label for="" class="form-label">Email </label>
                                    <input type="email" class="form-control " id="" placeholder="" name="email" value="{{$owner->user->email}}">
                                </div>
                                <div class="mb-4">
                                    <label for="" class="form-label">Password </label>
                                    <input type="password" class="form-control " id="" placeholder="" name="password">
                                </div>
                                <div class="mb-4">
                                    <label for="" class="form-label">Mobile </label>
                                    <input type="tel" class="form-control " id="" placeholder="" name="mobile" value="{{$owner->mobile}}">
                                </div>
                                <div class="mb-4">
                                    <label for="" class="form-label">Country </label>
                                    <select class="form-select" aria-label="Default select example" name="country_id" id="country-selector">
                                        <option value="{{$owner->country->id}}" selected>{{$owner->country->name}}</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="" class="form-label">City </label>
                                    <select class="form-select" aria-label="Default select example" name="city_id" id="city-selector">
                                        <option value="{{$owner->city->id}}" selected>{{$owner->city->name}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="mb-4">
                                    <label for="" class="form-label">Logo </label>
                                    <div class="upload-file">
                                        <div class="custom-file">
                                            <input class="custom-file-input"  type="file" name="logo"/>
                                            <label class="custom-file-label" ></label>
                                        </div>
                                        <div class="message">
                                                        <span>Maximum size 5 MB
                                                        </span>
                                            <span>Extensions available jpg, png</span>
                                        </div>
                                        <div class="file-info">
                                            <span>Logo  - 5 MB  ( Right side ) <button class="remove-btn"><i class="fa-solid fa-trash-can"></i></button></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="" class="form-label">Material </label>
                                    <div class="upload-file">
                                        <div class="custom-file">
                                            <input class="custom-file-input"  type="file" name="material"/>
                                            <label class="custom-file-label" ></label>
                                        </div>
                                        <div class="message">
                                                        <span>Maximum size 20 MB

                                                        </span>
                                            <span>Extensions available PDF</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-action">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('/admin/assets/js/owners/edit.min.js')}}"></script>
    <script>
        // Upload file
        $(document).ready(function() {
            $(document).on('change', '.custom-file-input',function(event){
                var files = event.target.files;
                console.log(files);
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    $(this).next('.custom-file-label').addClass("selected").html(file.name);
                }
            });
        });
    </script>
@endsection
