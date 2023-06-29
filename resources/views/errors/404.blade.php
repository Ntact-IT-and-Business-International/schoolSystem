<!DOCTYPE html>

<html lang="en" class="default-style layout-fixed layout-navbar-fixed">
<head>
    @include('layouts.front.title')

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="Empire is one of the unique admin template built on top of Bootstrap 4 framework. It is easy to customize, flexible code styles, well tested, modern & responsive are the topmost key factors of Empire Dashboard Template" />
    <meta name="keywords" content="bootstrap admin template, dashboard template, backend panel, bootstrap 4, backend template, dashboard template, saas admin, CRM dashboard, eCommerce dashboard">
    <meta name="author" content="Codedthemes" />
    @include('layouts.css')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('Admin/assets/css/pages/authentication.css')}}">
</head>

<body>
    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] End -->

    <!-- [ content ] Start -->
    <div class="authentication-wrapper authentication-1 px-4">
        <div class="authentication-inner py-5">

            <div class="media align-items-center">
                <img src="{{ asset('Admin/assets/img/avatars/1.png')}}" alt="" class="d-block ui-w-60 rounded-circle">
                <div class="media-body ml-3">
                    <div class="text-danger small font-weight-semibold line-height-1 mb-1">LOOKING FOR PAGE</div>
                    <div class="text-xlarge font-weight-bolder line-height-1">404 Error</div>
                </div>
            </div>

            <!-- [ Form ] Start -->
            <form class="mt-4">
                <p class="text-black small">You are Advised to Contact an Adminstrator For More Information.</p>
            </form>
            <!-- [ Form ] End -->

            <hr class="my-4">
            <div class="text-center text-muted small">
                Not Available?
                <a href="#" class="text-primary">Go Back</a>
            </div>

        </div>
    </div>
    <!-- [ content ] End -->

    <!-- Core scripts -->
    @include('layouts.javascript')
</body>
</html>
