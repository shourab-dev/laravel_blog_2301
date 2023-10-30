@extends('layouts.backendLayout')

@section('backend')
    
    <section id="profile">
        <div class="container mt-5 pt-3">

            <div class="row">


                <div class="col-lg-8">

                    <div class="card">
                        <div class="card-header">
                            <h4>Profile</h4>
                        </div>
                        <div class="card-body">
                            <form enctype="multipart/form-data" action="{{ route('profile.update') }}" method="POST">
                                @csrf
                                @method('put')

                                <input name="name" value="{{ auth()->user()->name }}" placeholder="You User Name" class="form-control my-2" type="text">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input name="email"  value="{{ auth()->user()->email }}" placeholder="Your Email" class="form-control my-2" type="text">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <label for="" class="my-2 d-block   ">
                                    
                                        Your Profile Image
                                    <input name="profile_img" class="form-control " type="file"></label>
                                    @error('profile_img')
                                    <span class="text-danger d-block">{{ $message }}</span>
                                    @enderror
                                <button class="btn btn-primary" type="submit">Update Profile</button>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">


                    <div class="card">
                        <div class="card-header">
                            <h4>Password Update</h4>
                        </div>
                        <div class="card-body">
                            <form action="">
                                <input placeholder="Old Password" type="text" class="form-control my-2">
                                <input placeholder="New Password" type="text" class="form-control my-2">
                                <input placeholder="Confirm Password" type="text" class="form-control my-2">
                                <button class="btn btn-primary">Update Password</button>
                            </form>
                        </div>
                    </div>


                </div>


            </div>


        </div>
    </section>

@endsection