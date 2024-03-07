<div id="header" class="app-header">
    <div class="navbar-header">
        <a href="{{ route('home') }}" class="navbar-brand">
            <img src="{{ asset('uploads/logo.png')}}">
        </a>
        <button type="button" class="navbar-mobile-toggler" data-toggle="app-sidebar-mobile">
            <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
        </button>
    </div>
    <div class="navbar-nav">
        <div class="navbar-item navbar-user dropdown">
            <a href="#" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                <img src="{{ asset('uploads/profile/'.auth()->user()->avatar) }}" /><span> 
                <span class="d-none d-md-inline">{{ Auth::user()->name }}</span> <b class="caret"></b> </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end me-1">
                <a href="{{ route('setting.profile') }}" class="dropdown-item">Edit Profile</a>
                <a href="{{ route('setting.password') }}" class="dropdown-item">Change Password</a>
                <a href="{{ route('setting.setting') }}" class="dropdown-item">Setting</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>