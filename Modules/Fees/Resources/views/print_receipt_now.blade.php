<!DOCTYPE html>

<html lang="en" class="default-style layout-fixed layout-navbar-fixed">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

<!-- Icon fonts -->
<link rel="stylesheet" href="{{ asset('Admin/assets/fonts/fontawesome.css')}}">
<link rel="stylesheet" href="{{ asset('Admin/assets/fonts/ionicons.css')}}">
<link rel="stylesheet" href="{{ asset('Admin/assets/fonts/linearicons.css')}}">
<link rel="stylesheet" href="{{ asset('Admin/assets/fonts/open-iconic.css')}}">
<link rel="stylesheet" href="{{ asset('Admin/assets/fonts/pe-icon-7-stroke.css')}}">
<link rel="stylesheet" href="{{ asset('Admin/assets/fonts/feather.css')}}">

<!-- Core stylesheets -->
<link rel="stylesheet" href="{{ asset('Admin/assets/css/bootstrap-material.css')}}">
<link rel="stylesheet" href="{{ asset('Admin/assets/css/shreerang-material.css')}}">
<link rel="stylesheet" href="{{ asset('Admin/assets/css/uikit.css')}}">

<!-- Libs -->
<link rel="stylesheet" href="{{ asset('Admin/assets/libs/perfect-scrollbar/perfect-scrollbar.css')}}">
<style>
    html,
    body {
        background: #fff !important;
    }

    body> :not(.invoice-print) {
        display: none !important;
    }

    .invoice-print {
        min-width: 768px !important;
        font-size: 15px !important;
    }

    .invoice-print * {
        border-color: #aaa !important;
        color: #000 !important;
    }
</style>
<div class="invoice-print p-5">
                <div class="row">
                    <div class="col-sm-12 pb-4 text-center">
                        <div class="mb-1"><span class="app-brand-text demo font-weight-bold text-dark" style="text-transform:uppercase;font-size:40px;">Safeway Junior School</span></div>
                        <div class="mb-1" style="font-weight:bold; text-transform:uppercase;font-size:25px;">Kawempe- TTula</div>
                        <div class="mb-1" style="font-weight:bold; text-transform:uppercase;font-size:20px;">0772-380547 | 0702-932992</div>
                        <div style="box-shadow: 0 0 0 1px #8897AA inset; font-weight:bold; text-transform:uppercase;font-style:italic;">School Fees Payment Receipt</div>
                    </div>
                </div>
                <hr class="mb-4">

                @foreach($print_receipts as $detail)
                <div class="row">

                    <div class="col-sm-4 mb-4">
                        <div class="font-weight-bold mb-2 text-danger">No: &nbsp;<span style="color:red;">2023{{$detail->id}}</span></div>
                    </div>
                    <div class="col-sm-4 mb-4">
                        <div class="font-weight-bold mb-2"></div>
                    </div>
                    <div class="col-sm-4 mb-4">
                        <div class="font-weight-bold mb-2">Date:&nbsp; <span class="text-muted">{{$detail->created_at}}</span></div>
                    </div>
                </div>

                @endforeach
                <hr class="mb-4">
                <div class="row">
                    <div class="col-sm-12 mb-4">
                        <div class="font-weight-bold mb-2"><span style="font-style:italic;">Received with thanks from</span> :&nbsp;<span class="text-muted" style="border-bottom:1px dotted; width:500px;">{{$detail->last_name}} {{$detail->first_name}} {{$detail->other_names}} &nbsp;- {{$detail->level}}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 mb-4">
                        <div class="font-weight-bold mb-2"><span style="font-style:italic;">The sum of Shillings:</span>&nbsp; <span style="text-transform:capitalize;border-bottom:1px dotted" class="text-muted">{{Modules\Fees\Http\Controllers\FeesController::convert_number_to_words($detail->amount_paid)}} Shillings Only</span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 mb-4">
                        <div class="font-weight-bold mb-2"><span style="font-style:italic;">Being payment of:</span>&nbsp;<span class="text-muted" style="border-bottom:1px dotted;height:400px;width:200px;">School fees for &nbsp;{{$detail->term}} &nbsp; {{date('Y')}}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 mb-4">
                        <div class="font-weight-bold mb-2">Cash/Cheque No:...............................................................</div>
                    </div>
                    <div class="col-sm-6 mb-4">
                        <div class="font-weight-bold mb-2">Balance:<span style="border-bottom:1px dotted;">{{ number_format($detail->balance)}}</span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 mb-4">
                        <div class="font-weight-bold mb-2">Shs:&nbsp;<span class="text-muted btn btn-outline-default">{{ number_format($detail->amount_paid)}}</span></div>
                        <span style="font-style:italic; margin-left:30px;">With Thanks</span>
                    </div>
                    <div class="col-sm-6 mb-4">
                        <div class="font-weight-bold mb-2">Sign:...................................................</div>
                        <span style="font-style:italic; margin-left:30px;">For:</span><span>&nbsp;SAFEWAY JUNIOR SCHOOL.</span><br><span style="margin-left:30px;text-align:center;">KAWEMPE-TTULA</span>
                    </div>
                </div>
    <hr class="mb-4">
    <script src="{{ asset('Admin/assets/js/pace.js')}}"></script>
    <script src="{{ asset('Admin/assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('Admin/assets/libs/popper/popper.js')}}"></script>
    <script src="{{ asset('Admin/assets/js/bootstrap.js')}}"></script>
    <script src="{{ asset('Admin/assets/js/sidenav.js')}}"></script>
    <script src="{{ asset('Admin/assets/js/layout-helpers.js')}}"></script>
    <script src="{{ asset('Admin/assets/js/material-ripple.js')}}"></script>

    <!-- Libs -->
    <script src="{{ asset('Admin/assets/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('Admin/assets/libs/eve/eve.js')}}"></script>
    <script src="{{ asset('Admin/assets/libs/flot/flot.js')}}"></script>
    <script src="{{ asset('Admin/assets/libs/flot/curvedLines.js')}}"></script>
    <script src="{{ asset('Admin/assets/libs/chart-am4/core.js')}}"></script>
    <script src="{{ asset('Admin/assets/libs/chart-am4/charts.js')}}"></script>
    <script src="{{ asset('Admin/assets/libs/chart-am4/animated.js')}}"></script>

    <!-- Demo -->
    <script src="{{ asset('Admin/assets/js/demo.js')}}"></script>
    <script src="{{ asset('Admin/assets/js/analytics.js')}}"></script>
    <script src="{{ asset('Admin/assets/js/pages/dashboards_index.js')}}"></script>
    <script>
        // -------------------------------------------------------------------------
        // Print on window load

        $(function() {
            window.print();
        });
    </script>

</html>