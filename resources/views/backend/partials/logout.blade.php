<div class="col-sm-6 clearfix">
    <div class="user-profile pull-right">
        <img class="avatar user-thumb" src="{{ URL::asset('backend')}}/images/author/avatar.png" alt="avatar">
        <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Kumkum Rai 
            <a class="log-out-btn" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out text-white"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
            </form>
        </h4>
    </div>
</div>