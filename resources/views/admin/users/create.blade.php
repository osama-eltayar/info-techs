@extends('admin.layouts.app')
@section('content')
        <!-- Start Content -->
        <div class="content-side">
            <div class="page-title">
                <div class="container-fluid "><h1><img src="/admin/assets/img/icon2.png" alt="icon"> Users  </h1></div>

            </div>
            <div class="container-fluid bg-blue">
                <div class="content-body">
                    <div class="form-body">
                        <h4>Create new owner</h4>
                        <form action="{{route('admin.users.store')}}" method="POST" enctype="multipart/form-data" id="create-user-form">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="mb-4">
                                        <label for="" class="form-label">Name </label>
                                        <input type="text" class="form-control " id="" placeholder="" name="name">
                                    </div>
                                    <div class="mb-4">
                                        <label for="" class="form-label">Email </label>
                                        <input type="email" class="form-control " id="" placeholder="" name="email">
                                    </div>
                                    <div class="mb-4">
                                        <label for="" class="form-label">Password </label>
                                        <input type="password" class="form-control " id="" placeholder="" name="password">
                                    </div>
                                    <div class="mb-4">
                                        <label for="" class="form-label">Confirm Password </label>
                                        <input type="password" class="form-control " id="" placeholder="" name="password_confirmation">
                                    </div>



                                    <div class="mb-4">
                                        <label for="speciality_id" class="form-label">Role </label>
                                        <select class="form-select" aria-label="Default select example" name="role" id="role">
                                            <option selected>Role</option>
                                            @foreach($roles as $role)
                                                <option value="{{$role->name}}">{{Str::title($role->name)}}</option>
                                            @endforeach
                                        </select>
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
    <script src="{{asset('/admin/assets/js/users/create.min.js')}}"></script>
@endsection
