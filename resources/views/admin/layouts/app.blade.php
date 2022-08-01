<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>:: Aero Bootstrap4 Admin :: eCommerce</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/plugins/morrisjs/morris.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/summernote/summernote-bs4.min.css') }}">
    @yield('css')
</head>

<body class="theme-blush">
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img class="zmdi-hc-spin" src="admin/images/loader.svg" width="48" height="48" alt="Aero"></div>
            <p>Please wait...</p>
        </div>
    </div>
    <div class="overlay"></div>
    @if (Auth::check())
        <div class="header_login">
            <div style="display: inline-block">
                <a href="" data-toggle="collapse" data-target="#demo"> {{ Auth::user()->name }} <i class="fa fa-angle-down"></i></a>
                <div id="demo" class="collapse header-clp">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Log Out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
            <button class="header_edit">Edit</button>
        </div>
    @endif
    @include('admin.layouts.sidebar')
    @yield('content')
    @yield('js')
    <script src="{{ asset('admin/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('admin/bundles/vendorscripts.bundle.js') }}"></script>
    <script src="{{ asset('admin/bundles/morrisscripts.bundle.js') }}"></script> <!-- Morris Plugin Js -->
    <script src="{{ asset('admin/bundles/jvectormap.bundle.js') }}"></script> <!-- JVectorMap Plugin Js -->
    <script src="{{ asset('admin/bundles/sparkline.bundle.js') }}"></script> <!-- Sparkline Plugin Js -->
    <script src="{{ asset('admin/bundles/knob.bundle.js') }}"></script> <!-- Jquery Knob Plugin Js -->
    <script src="{{ asset('admin/bundles/mainscripts.bundle.js') }}"></script>
    <script src="{{ asset('admin/js/pages/ecommerce.js') }}"></script>
    <script src="{{ asset('admin/js/pages/charts/jquery-knob.min.js') }}"></script>
    <script src="{{ asset('admin/summernote/summernote-bs4.min.js') }}"></script>
</body>

</html>
