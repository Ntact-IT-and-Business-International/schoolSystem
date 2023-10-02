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
    {{-- <link rel="stylesheet" href="{{ asset('Admin/assets/css/bootstrap-material.css')}}">
    <link rel="stylesheet" href="{{ asset('Admin/assets/css/shreerang-material.css')}}">
    <link rel="stylesheet" href="{{ asset('Admin/assets/css/uikit.css')}}"> --}}

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
                    <a href="/dashboard" class="app-brand-text demo sidenav-text font-weight-normal ml-1">School Management System</a>
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
                        <!-- Staustic card 2 Start -->
                            <div class="col-sm-6 col-xl-3">
                                <div class="card mb-4 bg-primary text-white">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="ion ion-ios-wallet display-4"></div>
                                            <div class="ml-4">
                                                <div class="text-white big">School Fees Collected</div>
                                                <div class="text-large">UGX: {{ number_format(auth()->user()->getFeesThisYear())}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <div class="card mb-4 bg-success text-white">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="ion ion-ios-card display-4"></div>
                                            <div class="ml-4">
                                                <div class="text-white big">School Fees Balances</div>
                                                <div class="text-large">UGX: {{ number_format(auth()->user()->getBalances())}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <div class="card mb-4 bg-danger text-white">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="ion ion-md-cart display-4"></div>
                                            <div class="ml-4">
                                                <div class="text-white big">Expenditure</div>
                                                <div class="text-large">UGX : {{number_format(auth()->user()->getExpenditureThisYear())}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <div class="card mb-4 bg-warning text-white">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="ion ion-md-pulse display-4"></div>
                                            <div class="ml-4">
                                                <div class="text-white big">Actual Balance</div>
                                                <div class="text-large">UGX : {{number_format(auth()->user()->getActualBalance())}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Staustic card 2 end -->
                            <!-- 1st row Start -->
                            <div class="col-lg-5">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="">
                                                        <h2 class="mb-2 font-weight-bold"> {{ number_format(auth()->user()->countUsers())}} </h2>
                                                        <p class="text-muted mb-0"><span class="badge badge-primary">Users</span></p>
                                                    </div>
                                                    <div class="lnr lnr-leaf display-4 text-primary"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="">
                                                        <h2 class="mb-2 font-weight-bold">{{ number_format(auth()->user()->countStudents())}}</h2>
                                                        <p class="text-muted mb-0"><span class="badge badge-success">Students</span></p>
                                                    </div>
                                                    <div class="lnr lnr-chart-bars display-4 text-success"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="">
                                                        <h2 class="mb-2 font-weight-bold">{{ number_format(auth()->user()->countTeachingStaff())}}</h2>
                                                        <p class="text-muted mb-0"><span class="badge badge-danger">Teaching Staff</span></p>
                                                    </div>
                                                    <div class="lnr lnr-rocket display-4 text-danger"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="">
                                                        <h2 class="mb-2 font-weight-bold">{{ number_format(auth()->user()->countNonTeachingStaff())}}</h2>
                                                        <p class="text-muted mb-0"><span class="badge badge-warning">Non Teaching Staff</span> </p>
                                                    </div>
                                                    <div class="lnr lnr-cart display-4 text-warning"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="card d-flex w-100 mb-4">
                                            <div class="row no-gutters row-bordered row-border-light h-100">
                                                <div class="d-flex col-md-6 align-items-center">
                                                    <div class="card-body">
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-auto">
                                                                <i class="lnr lnr-users text-primary display-4"></i>
                                                            </div>
                                                            <div class="col">
                                                                <h6 class="mb-0 text-muted">Parents <span class="text-primary">Complains</span></h6>
                                                                <h4 class="mt-3 mb-0 font-weight-bold">{{ number_format(auth()->user()->countComplains())}}<i class="ion ion-md-arrow-round-down ml-3 text-danger"></i></h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex col-md-6 align-items-center">
                                                    <div class="card-body">
                                                        <div class="row align-items-center mb-3">
                                                            <div class="col-auto">
                                                                <i class="lnr lnr-magic-wand text-primary display-4"></i>
                                                            </div>
                                                            <div class="col">
                                                                <h6 class="mb-0 text-muted">All <span class="text-primary">Request</span></h6>
                                                                <h4 class="mt-3 mb-0 font-weight-bold">{{ number_format(auth()->user()->countPendingRequests())}}<i class="ion ion-md-arrow-round-up ml-3 text-success"></i></h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="card mb-4">
                                    <!-- Staustic card 1 Start -->
                            <div class="col-sm-12 col-xl-12">
                                <div class="card mb-5 mt-4">
                                    <div class="d-flex align-items-center">
                                        <div class="card-body bg-primary text-center">
                                            <div class="ion ion-ios-wallet display-4 text-white"></div>
                                        </div>
                                        <div class="card-body py-0">
                                            <small class="font-weight-bold mb-1" style="font-size:20px;">Term 1 School Fees Collection</small>
                                            <h3 class="mb-0 font-weight-bold">UGX: {{number_format(auth()->user()->getFeesTerm1())}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-xl-12">
                                <div class="card mb-4">
                                    <div class="d-flex align-items-center">
                                        <div class="card-body bg-success text-center">
                                            <div class="ion ion-ios-card display-4 text-white"></div>
                                        </div>
                                        <div class="card-body py-0">
                                            <small class="font-weight-bold mb-1" style="font-size:20px;">Term 2 School Fees Collection</small>
                                            <h3 class="mb-0 font-weight-bold">UGX: {{number_format(auth()->user()->getFeesTerm2())}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-xl-12">
                                <div class="card mb-4">
                                    <div class="d-flex align-items-center">
                                        <div class="card-body bg-danger text-center">
                                            <div class="ion ion-md-cart display-4 text-white"></div>
                                        </div>
                                        <div class="card-body py-0">
                                            <small class="font-weight-bold mb-1" style="font-size:20px;">Term 3 School Fees Collection</small>
                                            <h3 class="mb-0 font-weight-bold">UGX: {{number_format(auth()->user()->getFeesTerm3())}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Staustic card 1 end -->
                                </div>
                            </div>
                            <!-- 1st row Start -->
                        </div>
                        <div class="row">
                            {{-- <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <canvas id="chart-graph" height="250" style="width:100%" class="chartjs-demo"></canvas>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-md-12 col-sm-12 col-xl-12 col-lg-12">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="text-center font-weight-bold mb-1"> Bar Graph Showing Boys and Girls Per Class</div>
                                        <canvas id="chart-bars"  style="width:100%; height:250px;" class="chartjs-demo"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                    <div class="text-center font-weight-bold mb-1"> Pie Chart Showing Number of All Staff and Students</div>
                                        <canvas id="chart-pie" height="250" class="chartjs-demo"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-body">
                                    <div class="text-center font-weight-bold mb-1"> Pie Chart Showing Number of Students</div>
                                        <canvas id="chart-pie2" height="250" class="chartjs-demo"></canvas>
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
    <script>
    $(function() {
        // Wrap charts
        $('.chartjs-demo').each(function() {
            $(this).wrap($('<div style="height:' + this.getAttribute('height') + 'px"></div>'));
        });


        

        var barsChart = new Chart(document.getElementById('chart-bars').getContext("2d"), {
            type: 'bar',
            data: {
            labels: ['Baby', 'Middle', 'Top', 'P1', 'P2', 'P3','P4', 'P5', 'P6', 'P7'],
            datasets: [{
                label: 'Boys',
                data: [53, 99, 14, 10, 43, 27, 99, 14, 10, 43, 27],
                borderWidth: 1,
                backgroundColor: 'rgba(255, 0, 0)',
                borderColor: '#ff0000'
            }, {
                label: 'Girls',
                data: [55, 74, 20, 90, 67, 97,20, 90, 67, 97],
                borderWidth: 1,
                backgroundColor: 'rgba(0, 51, 0)',
                borderColor: '#003300'
            }]
            },

            // Demo
            options: {
            responsive: false,
            maintainAspectRatio: false
            }
        });
        var pieChart = new Chart(document.getElementById('chart-pie').getContext("2d"), {
            type: 'pie',
            data: {
            labels: [ 'Teaching Staff', 'Non Teaching Staff', 'Students' ],
            datasets: [{
                data: [ {{ number_format(auth()->user()->countTeachingStaff())}}, {{ number_format(auth()->user()->countNonTeachingStaff())}}, {{ number_format(auth()->user()->countStudents())}} ],
                backgroundColor: [ '#FF4961', '#ff4a00', '#f4ab55' ],
                hoverBackgroundColor: [ '#FF4961', '#ff4a00', '#f4ab55' ]
            }]
            },

            // Demo
            options: {
            responsive: false,
            maintainAspectRatio: false
            }
        });
        var pieChart = new Chart(document.getElementById('chart-pie2').getContext("2d"), {
            type: 'pie',
            data: {
            labels: [ 'Boys', 'Girls', 'Special Needs' ],
            datasets: [{
                data: [ {{ number_format(auth()->user()->countNumberOfBoys())}}, {{ number_format(auth()->user()->countNumberOfGirls())}}, {{ number_format(auth()->user()->countNumberOfSpecialNeeds())}} ],
                backgroundColor: [ '#3333cc', '#ff4a00', '#f4ab55' ],
                hoverBackgroundColor: [ '#3333cc', '#ff4a00', '#f4ab55' ]
            }]
            },

            // Demo
            options: {
            responsive: false,
            maintainAspectRatio: false
            }
        });
        var radarChart = new Chart(document.getElementById('chart-radar').getContext("2d"), {
            type: 'radar',
            data: {
            labels: ['Eating', 'Drinking', 'Sleeping', 'Designing', 'Coding', 'Cycling', 'Running'],
            datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgba(40, 208, 148, 0.3)',
                borderColor: '#62d493',
                pointBackgroundColor: '#62d493',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: '#62d493',
                data: [39, 99, 77, 38, 52, 24, 89],
                borderWidth: 1
            }, {
                label: 'My Second dataset',
                backgroundColor: 'rgba(255, 73, 97, 0.3)',
                borderColor: '#FF4961',
                pointBackgroundColor: '#FF4961',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: '#FF4961',
                data: [6, 33, 14, 70, 58, 90, 26],
                borderWidth: 1
            }]
            },

            // Demo
            options: {
            responsive: false,
            maintainAspectRatio: false
            }
        });

        var polarAreaChart = new Chart(document.getElementById('chart-polar-area').getContext("2d"), {
            type: 'polarArea',
            data: {
            datasets: [{
                data: [ 12, 10, 14, 6, 15 ],
                backgroundColor: [ '#FF4961', '#62d493', '#f4ab55', '#E7E9ED', '#55a3f4' ],
                label: 'My dataset'
            }],
            labels: [ 'Red', 'Green', 'Yellow', 'Grey', 'Blue' ]
            },

            // Demo
            options: {
            responsive: false,
            maintainAspectRatio: false
            }
        });

        
        var doughnutChart = new Chart(document.getElementById('chart-doughnut').getContext("2d"), {
            type: 'doughnut',
            data: {
            labels: [ 'Red', 'Blue', 'Yellow' ],
            datasets: [{
                data: [ 137, 296, 213 ],
                backgroundColor: [ '#FF4961', '#ff4a00', '#f4ab55' ],
                hoverBackgroundColor: [ '#FF4961', '#ff4a00', '#f4ab55' ]
            }]
            },

            // Demo
            options: {
            responsive: false,
            maintainAspectRatio: false
            }
        });

        // Resizing charts

        function resizeCharts() {
            graphChart.resize();
            barsChart.resize();
            radarChart.resize();
            polarAreaChart.resize();
            pieChart.resize();
            doughnutChart.resize();
        }

        // Initial resize
        resizeCharts();

        // For performance reasons resize charts on delayed resize event
        window.layoutHelpers.on('resize.charts-demo', resizeCharts);
        });
    </script>

</body>

</html>
