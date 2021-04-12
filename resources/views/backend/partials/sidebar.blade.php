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
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>roles</span></a>
                        <ul class="collapse">
                            <li><a href="{{ route('roles.index') }}">View</a></li>
                            
                        </ul>
                    </li>
                    
                   
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->