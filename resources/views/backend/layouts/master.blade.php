
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Roles and Permission - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ URL::asset('backend')}}/images/icon/favicon.ico">
    <link rel="stylesheet" href="{{ URL::asset('backend')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ URL::asset('backend')}}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::asset('backend')}}/css/themify-icons.css">
    <link rel="stylesheet" href="{{ URL::asset('backend')}}/css/metisMenu.css">
    <link rel="stylesheet" href="{{ URL::asset('backend')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ URL::asset('backend')}}/css/slicknav.min.css">
    <!-- amcharts css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="{{ URL::asset('backend')}}/css/typography.css">
    <link rel="stylesheet" href="{{ URL::asset('backend')}}/css/default-css.css">
    <link rel="stylesheet" href="{{ URL::asset('backend')}}/css/styles.css">
    <link rel="stylesheet" href="{{ URL::asset('backend')}}/css/responsive.css">
    <!-- jquery latest version -->
    <script src="{{ URL::asset('backend')}}/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- modernizr css -->
    <script src="{{ URL::asset('backend')}}/js/vendor/modernizr-2.8.3.min.js"></script>
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
            @include('backend.partials.page_title')
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
</body>

</html>
