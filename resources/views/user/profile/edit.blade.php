@extends('user.layouts.app')
@section('header')
    <title></title>
@endsection
@section('content')


    <!-- Start Banner-->
    <section class="banner" style="background-image: url('/media/images/banner5.png');">
        <h1>Update my information</h1>
    </section>

    <!-- Start Nav Links-->
    <section class="nav-links">
        <div class="container">
            <a href="#">Home page</a>
            <span>|</span>
            <a href="{{route('profile.edit')}}">Update my information</a>
        </div>
    </section>

    <!-- Start Form -->
    <section class="form-section">
        <div class="form-content box-lg">
            <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @csrf
                @method('PUT')
                <div class="title">
                    <i class="fa-solid fa-file-pen"></i> Update my information
                </div>
                <h3>Please fill these information to update your information </h3>
                <div class="form-row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <span class="top-message">* All fields are mandatory</span>
                            <label for="title">Title <span>*</span></label>
                            <div class="input-icon">
                                <select name="profile[title]" id="title" class="form-control">
                                    @foreach($titles as $title)
                                        <option
                                            value="{{$title->name}}" {{$profile->title == $title->name ? 'selected' : NULL}} >{{$title->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="mobile_number">Mobile number <span>*</span></label>
                            <div class="input-icon vaild">
                                <input type="tel" name="profile[mobile]" id="mobile_number" class="form-control"
                                       value="{{$profile->mobile}}">
                                <span class="vaild-label">Valid</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="fullName">Full name <span>*</span></label>
                            <div class="input-icon">
                                <input type="text" id="fullName" name="user[name]" class="form-control"
                                       value="{{auth()->user()->name}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="saudi-council-check">Do you have Saudi council number (SCR)? </label>
                            <div class="input-icon">
                                <select name="saudi_council_check" id="saudi-council-check" class="form-control">
                                    <option value="1" {{$profile->saudi_council ? 'selected' : NULL}}>Yes</option>
                                    <option value="0" {{$profile->saudi_council ?: 'selected'}}>No</option>
                                </select>
                                <span class="message">What is Saudi council number?</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="email">Email <span>*</span></label>
                            <div class="input-icon vaild">
                                <input type="email" name="email" class="form-control" disabled
                                       value="{{auth()->user()->email}}">
                                <span class="vaild-label">Verified</span>
                                <span class="message">you cannot change your e-mail</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-12 {{$profile->saudi_council ?: 'd-none' }}">
                        <div class="form-group ">
                            <label for="SCR">Saudi council number (SCR)</label>
                            <div class="input-icon">
                                <input type="tel" name="profile[saudi_council]" id="SCR" class="form-control"
                                       value="{{$profile->saudi_council }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="country">Country <span>*</span> </label>
                            <div class="input-icon">
                                <select name="profile[country_id]" id="country" class="form-control">
                                    <option value="1" selected>Saudi Arabia</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="speciality">Speciality <span>*</span> </label>
                            <div class="input-icon">
                                <select name="profile[speciality_id]" id="speciality" class="form-control">
                                    @foreach($specialities as $speciality)
                                        <option
                                            value="{{$speciality->id}}" {{$profile->speciality_id == $speciality->id ? 'selected' : NULL }}>{{$speciality->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="city">City <span>*</span> </label>
                            <div class="input-icon">
                                <select name="profile[city_id]" class="form-control">
                                    <option value="1">Jeddah</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="nationality">Nationality <span>*</span></label>
                            <div class="input-icon">
                                <input type="text" id="nationality" name="profile[nationality]" class="form-control"
                                       value="{{$profile->nationality}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="jop">Job title</label>
                            <div class="input-icon">
                                <input type="text" id="jop" name="profile[job]" class="form-control"
                                       value="{{$profile->job}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <label for="image">Add your Photo</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="imageUpload" name="profile[image]" accept=".png, .jpg, .jpeg"/>
                                <label for="imageUpload">Select your photo</label>
                                <span class="message">JPG, PNG Maximum 2 MB</span>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview"
                                     style="background-image: url({{$profile->image_url ?? 'http://i.pravatar.cc/500?img=7'}});">
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                            <label class="custom-control-label" for="customCheck">
                                Subscribe to our newsletter
                            </label>
                        </div>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Update my information</button>

            </form>
        </div>
    </section>

    <div class="qus">
        <a href="#"><i class="fa-solid fa-circle-question"></i></a>
    </div>
@endsection
@section('script')
    <script>
        function readURL(input)
        {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imageUpload").change(function () {
            readURL(this);
        });
    </script>
@endsection
