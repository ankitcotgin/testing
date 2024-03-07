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
					<h4 class="mt-0 mb-1">{{ __('Profile') }}</h4>
					<p class="mb-2"><a href="#" style="color: #a1a1a1;"> Setting </a> / <a href="#" style="color: #a1a1a1;">{{ __('Profile') }}</a></p>
					<a href="{{ route('home')}}" class="btn btn-xs btn-yellow"> &nbsp; <i class="fa fa-arrow-left fa-lg ms-n2 "></i> BACK TO DASHBOARD</a>
				</div>
			</div>
			<ul class="profile-header-tab">
				<li class="nav-item"><a href="#" class="nav-link">DASHBOARD</a></li>
				<li class="nav-item"><a href="{{ route('setting.profile') }}" class="nav-link active">PROFILE</a></li>
				<li class="nav-item"><a href="{{ route('setting.setting') }}" class="nav-link">GLOBAL SETTING</a></li>
				<li class="nav-item"><a href="{{ route('setting.social-media') }}" class="nav-link">SOCIAL MEDIA</a></li>
				<li class="nav-item"><a href="{{ route('setting.password') }}" class="nav-link">CHANGE PASSWORD</a></li>
			</ul>
		</div>
	</div>
    {{-- Heading --}}
    {{-- Body Here --}}

    {{-- Body Here --}}
</div>    
@endsection