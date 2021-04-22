<!-- sidebar menu area start -->
<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{ route('admin.dashboard') }}"><img src="{{ URL::asset('backend')}}/images/icon/logo.png" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard text-danger"></i><span>
                            dashboard
                        </span></a>
                        <ul class="collapse">
                            <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                           
                            
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard text-success"></i><span>
                            Roles & Permissions
                        </span></a>
                        <ul class="collapse {{ Route::is('admin.roles.create') || Route::is('admin.roles.index') || Route::is('admin.roles.edit') || Route::is('admin.roles.show') ? 'in' : '' }}">
                            <li><a href="{{ route('admin.roles.index') }}">All Roles</a></li>
                            <li><a href="{{ route('admin.roles.create') }}">Create Role</a></li>
                            
                        </ul>
                    </li>
                    
                   
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->