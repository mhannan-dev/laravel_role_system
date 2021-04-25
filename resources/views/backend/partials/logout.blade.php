<div class="col-sm-6 clearfix">
    <div class="user-profile pull-right">
        <img class="avatar user-thumb" src="{{ URL::asset('backend')}}/images/author/avatar.png" alt="avatar">
        <h4 class="user-name dropdown-toggle" data-toggle="dropdown">
            {{ Auth::guard('admin')->user()->name }}
            <a class="log-out-btn" href="#" onclick="event.preventDefault();document.getElementById('admin-logout-form').submit();">
                <i class="fa fa-sign-out text-white"></i>
            </a>
            <form id="admin-logout-form" action="{{ route('admin.logout.submit') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
            </form>
        </h4>
    </div>
</div>
