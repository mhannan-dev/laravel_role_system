
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Roles and Permission - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ URL::asset('backend')}}/images/icon/favicon.ico">
    @include('backend.partials.styles')
    @yield('styles')
   
</head>

<body>
    
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        @include('backend.partials.sidebar')
        <!-- main content area start -->
        <div class="main-content">
           @include('backend.partials.top_nav')
            
            <!-- page title area end -->
            @yield('main-content')
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        @include('backend.partials.footer')
    </div>
    <!-- page container area end -->
    @include('backend.partials.scripts')
    @yield('scripts')
    @toastr_js
    @toastr_render
</body>

</html>
