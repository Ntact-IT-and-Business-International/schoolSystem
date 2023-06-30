<!DOCTYPE html>

<html lang="en" class="default-style layout-fixed layout-navbar-fixed">
<head>
    @include('layouts.front.title')

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="description"
        content="" />
    <meta name="keywords" content="">
    <meta name="author" content="" />
    @include('layouts.css')
    <!-- Core stylesheets -->
    <link rel="stylesheet" href="{{ asset('Admin/assets/css/bootstrap-material.css')}}">
    <link rel="stylesheet" href="{{ asset('Admin/assets/css/shreerang-material.css')}}">
    <link rel="stylesheet" href="{{ asset('Admin/assets/css/uikit.css')}}">

</head>

<body>
    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] End -->

    <!-- [ Layout wrapper ] Start -->
    <div class="layout-wrapper layout-2">
        <div class="layout-inner">
            <!-- [ Layout sidenav ] Start -->
            <div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-white logo-dark">
                <!-- Brand demo (see assets/css/demo/demo.css) -->
                <div class="app-brand demo">
                    <span class="app-brand-logo demo">
                        {{--<img src="{{ asset('Admin/assets/img/logo.png')}}" alt="Brand Logo" class="img-fluid">--}}
                    </span>
                    <a href="/dashboard" class="app-brand-text demo sidenav-text font-weight-normal ml-2">Mukono Primary School</a>
                    <a href="javascript:" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
                        <i class="ion ion-md-menu align-middle"></i>
                    </a>
                </div>
                <div class="sidenav-divider mt-0"></div>

                <!-- Links -->
                @include('layouts.sidebar')
            </div>
            <!-- [ Layout sidenav ] End -->
            <!-- [ Layout container ] Start -->
            <div class="layout-container">
                <!-- [ Layout navbar ( Header ) ] Start -->
                @include('layouts.navbar')
                <!-- [ Layout navbar ( Header ) ] End -->

                <!-- [ Layout content ] Start -->
                <div class="layout-content">

                    <!-- [ content ] Start -->
                    <div class="container-fluid flex-grow-1 container-p-y">
                        @include('layouts.breadcrumb')
                        <div class="row">
                            <div class="col-md-12">
                                @include('layouts.message')
                                <div class="card mb-4">
                                    <div class="card-body">
                                        @yield('content')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [ content ] End -->

                    <!-- [ Layout footer ] Start -->
                    @include('layouts.footer')
                    <!-- [ Layout footer ] End -->
                </div>
                <!-- [ Layout content ] Start -->
            </div>
            <!-- [ Layout container ] End -->
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-sidenav-toggle"></div>
    </div>
    <!-- [ Layout wrapper] End -->

    <!-- Modal -->
    {{-- @include('layouts.modal') --}}
    <!-- Core scripts -->
    @include('layouts.javascript')
    <script src="{{ asset('Admin/assets/libs/chartjs/chartjs.js')}}"></script>

    <!-- Demo -->
    <script src="{{ asset('Admin/assets/js/pages/charts_chartjs.js')}}"></script>

</body>

</html>
