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
                        <h4 class="mt-0 mb-1">Change Password</h4>
                        <p class="mb-2"><a href="#" style="color: #a1a1a1;"> Setting </a> / <a href="#" style="color: #a1a1a1;">Change Password</a></p>
                        {{-- <a href="#" class="btn btn-xs btn-yellow">DASHBOARD</a> --}}
                    </div>
                </div>
                <ul class="profile-header-tab">
                    <li class="nav-item"><a href="#" class="nav-link">DASHBOARD</a></li>
                    <li class="nav-item"><a href="{{ route('setting.profile') }}" class="nav-link">PROFILE</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">SETTING</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">SOCIAL MEDIA</a></li>
                    <li class="nav-item"><a href="{{ route('setting.password') }}" class="nav-link active">CHANGE
                            PASSWORD</a></li>
                </ul>
            </div>
        </div>
        {{-- Heading --}}
        {{-- Body Here --}}
        <div class="container-fluid">
            <div class="mt-3">
                <div class="card border-0 mb-4">
                    <form method="POST" action="{{ route('setting.password') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header h6 mb-0 bg-none p-3">
                            <i class="fa fa-user fa-lg fa-fw text-dark text-opacity-50 me-1"></i>
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
                            <div class="mb-3">
                                <label for="oldPasswordInput" class="form-label">Old Password</label>
                                <input name="old_password" type="password"
                                    class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                    placeholder="Old Password">
                                @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newPasswordInput" class="form-label">New Password</label>
                                <input name="new_password" type="password"
                                    class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                    placeholder="New Password">
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                                <input name="new_password_confirmation" type="password" class="form-control"
                                    id="confirmNewPasswordInput" placeholder="Confirm New Password">
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('home') }}" class="btn btn-danger px-4"><i
                                    class="fa fa-arrow-left fa-lg ms-n2 "></i> &nbsp; Back</a>
                            <button type="submit" name="btnsubmit" value="update" class="btn btn-primary px-4"><i
                                    class="fa fa-refresh fa-lg ms-n2 "></i> &nbsp; {{ __('Change Password') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Body Here --}}
    </div>
@endsection
