<div id="sidebar" class="app-sidebar">
    <div class="app-sidebar-content find-link" data-scrollbar="true" data-height="100%">
        <div class="menu">
            <div class="menu-header">Navigation</div>
            <div class="menu-item {{ (request()->routeIs('home')) ? 'active' : '' }}">
                <a href="{{ route('home') }}" class="menu-link">
                    <div class="menu-icon"> <i class="fa fa-home"></i> </div>
                    <div class="menu-text">Dashboard</div>
                </a>
            </div>

            <div class="menu-item has-sub {{ (request()->routeIs('category','category.create')) ? 'active' : '' }}"> 
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon"> <i class="fas fa-image"></i> </div>
                    <div class="menu-text">Category Management</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{ (request()->routeIs('category.create')) ? 'active' : '' }}">
                        <a href="{{ route('category.create') }}" class="menu-link">
                            <div class="menu-text">Create New Category</div>
                        </a>
                    </div>
                    <div class="menu-item {{ (request()->routeIs('category')) ? 'active' : '' }}">
                        <a href="{{ route('category') }}" class="menu-link">
                            <div class="menu-text">Manage Category</div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="menu-item {{ (request()->is('category*','category.create*')) ? 'active' : '' }}">
                <a href="" class="menu-link">
                    <div class="menu-icon"> <i class="fa fa-image"></i> </div>
                    <div class="menu-text">Category Management</div>
                </a>
            </div>

            <div class="menu-item">
                <a href="#" class="menu-link">
                    <div class="menu-icon"> <i class="fa fa-circle-question"></i> </div>
                    <div class="menu-text">Aboutus Management</div>
                </a>
            </div>

            <div class="menu-item has-sub"> <a href="javascript:;" class="menu-link">
                    <div class="menu-icon"> <i class="fas fa-image"></i> </div>
                    <div class="menu-text">Gallery Management</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item">
                        <a href="manage-photos" class="menu-link">
                            <div class="menu-text">Manage Photo</div>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="manage-videos" class="menu-link">
                            <div class="menu-text">Manage Video/Live</div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="menu-item d-flex"> 
                <a href="javascript:;" class="app-sidebar-minify-btn ms-auto" data-toggle="app-sidebar-minify"><i class="fa fa-angle-double-left"></i></a> 
            </div>
        </div>
    </div>
</div>
<div class="app-sidebar-bg"></div>
<div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a></div>
