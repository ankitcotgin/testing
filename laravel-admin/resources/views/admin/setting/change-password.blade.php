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
                        <h4 class="mt-0 mb-1">{{ __('Change Password') }}</h4>
                        <p class="mb-2"><a href="#" style="color: #a1a1a1;"> Setting </a> / <a href="#" style="color: #a1a1a1;">{{ __('Change Password') }}</a></p>
                        <a href="{{ route('home')}}" class="btn btn-xs btn-yellow"> &nbsp; <i class="fa fa-arrow-left fa-lg ms-n2 "></i> BACK TO DASHBOARD</a>
                    </div>
                </div>
                <ul class="profile-header-tab">
                    <li class="nav-item"><a href="#" class="nav-link">DASHBOARD</a></li>
                    <li class="nav-item"><a href="{{ route('setting.profile') }}" class="nav-link">PROFILE</a></li>
                    <li class="nav-item"><a href="{{ route('setting.setting') }}" class="nav-link">GLOBAL SETTING</a></li>
                    <li class="nav-item"><a href="{{ route('setting.social-media') }}" class="nav-link">SOCIAL MEDIA</a></li>
                    <li class="nav-item"><a href="{{ route('setting.password') }}" class="nav-link active">CHANGE
                            PASSWORD</a></li>
                </ul>
            </div>
        </div>
        {{-- Heading --}}
        {{-- Body Here --}}
        <div class="container">
            <div class="row mt-3">
                <div class="col-xl-12">
                    <div class="card border-0 mb-4">
                        <form method="POST" action="{{ route('setting.password') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header h6 mb-0 bg-none p-3">
                                <i class="fa fa-unlock-alt fa-lg fa-fw text-dark text-opacity-50 me-1"></i>
                                {{ __('Change Password') }}
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success" role="alert" class="text-danger">
                                    {{ session('success') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="card-body">

                                <div class="row  mb-3">
                                    <label class="form-label col-form-label col-md-2" for="oldpassword">Old Password </label>
                                    <div class="col-md-10">
                                        <input type="password" class="form-control mb-5px @error('old_password') is-invalid @enderror" name="old_password" id="oldpassword"
                                        placeholder="Old Password" value="{{ old('old_password') }}"/>
                                        @error('old_password')
                                            <span role="alert" class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row  mb-3">
                                    <label class="form-label col-form-label col-md-2" for="newpassword">New Password</label>
                                    <div class="col-md-10">
                                        <input type="password" class="form-control mb-5px @error('new_password') is-invalid @enderror" name="new_password" id="newpassword"
                                        placeholder="New Password"/>
                                        @error('new_password')
                                            <span role="alert" class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row  mb-3">
                                    <label class="form-label col-form-label col-md-2" for="confirmNewPassword">Confirm New Password</label>
                                    <div class="col-md-10">
                                        <input type="password" class="form-control mb-5px @error('new_password_confirmation') is-invalid @enderror" name="new_password_confirmation" id="confirmNewPassword"
                                        placeholder="Confirm New Password"/>
                                        @error('new_password_confirmation')
                                            <span role="alert" class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button type="reset" class="btn btn-danger px-4"><i
                                    class="fa fa-refresh fa-lg ms-n2 "></i> &nbsp; Reset</button>
                                <button type="submit" name="btnsubmit" value="update" class="btn btn-primary px-4"> &nbsp; {{ __('Change Password') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>    
        {{-- Body Here --}}
    </div>
@endsection
