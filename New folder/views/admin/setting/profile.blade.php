@extends('admin.layouts.app')
@section('content')
    <div id="content" class="app-content p-0">
        {{-- Heading --}}
        <div class="profile">
            <div class="profile-header">
                <div class="profile-header-cover"></div>
                <div class="profile-header-content">
                    <div class="profile-header-img">
                        <img src="{{ asset('uploads/profile/' . auth()->user()->avatar) }}" alt />
                    </div>
                    <div class="profile-header-info">
                        <h4 class="mt-0 mb-1">Profile</h4>
                        <p class="mb-2"><a href="#" style="color: #a1a1a1;"> Setting </a> / <a href="#" style="color: #a1a1a1;">Profile</a></p>
                        {{-- <a href="#" class="btn btn-xs btn-yellow">DASHBOARD</a> --}}
                    </div>
                </div>
                <ul class="profile-header-tab">
                    <li class="nav-item"><a href="#" class="nav-link">DASHBOARD</a></li>
                    <li class="nav-item"><a href="{{ route('setting.profile') }}" class="nav-link active">PROFILE</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">SETTING</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">SOCIAL MEDIA</a></li>
                    <li class="nav-item"><a href="{{ route('setting.password') }}" class="nav-link">CHANGE PASSWORD</a></li>
                </ul>
            </div>
        </div>
        {{-- Heading --}}
        {{-- Body Here --}}
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-xl-3"></div>
                <div class="col-xl-9">
                    <div class="card border-0 mb-4">
                        <form method="POST" action="{{ route('setting.profile') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header h6 mb-0 bg-none p-3">
                                <i class="fa fa-user fa-lg fa-fw text-dark text-opacity-50 me-1"></i> {{ __('Profile') }}
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show rounded-0" role="alert">
                                    <strong>{{ session('success') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="card-body">
                                <div class="row  mb-3">
                                    <label class="form-label col-form-label col-md-2">Profile Name </label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control mb-5px @error('name') is-invalid @enderror" placeholder="Enter email" placeholder="Enter Name" id="name" name="name" value="{{ auth()->user()->name }}" autofocus=""/>
                                        @error('name')
                                            <span role="alert" class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row  mb-3">
                                    <label class="form-label col-form-label col-md-2">Email Address</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control mb-5px @error('email') is-invalid @enderror" placeholder="Enter Email" id="email" name="email" value="{{ auth()->user()->email }}" autofocus=""/>
                                        <small class="form-text text-muted"><b> Note: </b> Email Address Should be Valid and Required for login purpose</small>
                                        @error('email')
                                            <span role="alert" class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row  mb-3">
                                    <label class="form-label col-form-label col-md-2">Phone Number </label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control mb-5px @error('phone') is-invalid @enderror" placeholder="Enter Phone" id="phone" name="phone" value="{{ auth()->user()->phone }}" autofocus=""/>
                                        @error('phone')
                                            <span role="alert" class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row  mb-3">
                                    <label class="form-label col-form-label col-md-2">User Profile </label>
                                    <div class="col-md-10">
                                        <input type="file" class="form-control mb-5px @error('avatar') is-invalid @enderror" id="avatar" name="avatar" value="{{ old('avatar') }}" autocomplete="avatar" />
                                        @error('avatar')
                                            <span role="alert" class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <a href="{{ route('home') }}" class="btn btn-danger px-4"><i class="fa fa-arrow-left fa-lg ms-n2 "></i> &nbsp; Back</a>
                                <button type="submit" name="btnsubmit" value="update" class="btn btn-primary px-4"><i class="fa fa-refresh fa-lg ms-n2 "></i> &nbsp; {{ __('Upload Profile') }}</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
        </div>
        {{-- Body Here --}}
    </div>
@endsection
