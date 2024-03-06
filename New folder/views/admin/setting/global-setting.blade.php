@extends('admin.layouts.app')
@section('content')
<div id="content" class="app-content p-0">
    {{-- Heading --}}
	<div class="profile">
		<div class="profile-header">
			<div class="profile-header-cover"></div>
			<div class="profile-header-content">
				<div class="profile-header-img">
					<img src="{{ asset('assets/img/user.png')}}" alt />
				</div>
				<div class="profile-header-info">
					<h4 class="mt-0 mb-1">{{ Auth::user()->name }}</h4>
					<p class="mb-2">{{ Auth::user()->email }}</p>
					{{-- <a href="#" class="btn btn-xs btn-yellow">DASHBOARD</a> --}}
				</div>
			</div>
			<ul class="profile-header-tab">
				<li class="nav-item"><a href="#" class="nav-link">DASHBOARD</a></li>
				<li class="nav-item"><a href="#" class="nav-link">PROFILE</a></li>
				<li class="nav-item"><a href="#" class="nav-link active">SETTING</a></li>
				<li class="nav-item"><a href="#" class="nav-link">SOCIAL MEDIA</a></li>
				<li class="nav-item"><a href="#" class="nav-link">CHANGE PASSWORD</a></li>
			</ul>
		</div>
	</div>
    {{-- Heading --}}
    {{-- Body Here --}}

    {{-- Body Here --}}
</div>    
@endsection