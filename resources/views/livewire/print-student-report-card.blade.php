<!DOCTYPE html>

<html lang="en" class="default-style layout-fixed layout-navbar-fixed">


<head>
    <title>Empire | B4+ admin template</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="" />
    @include('layouts.css')
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
</head>

<body>
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>

    <!-- Content -->

    <div class="invoice-print p-5">
            <div class="row">
                <div class="col-sm-12 pb-4 text-center">
                    <div class="media align-items-center mb-1">
                        <a href="!#" class="navbar-brand app-brand demo py-0 mr-4">
                            <span class="app-brand-logo demo">
                                <img src="{{ asset('ociba.jpg')}}" style="width:120px;height:100px;" alt="Brand Logo" class="img-fluid">
                            </span>
                            <span class="app-brand-text demo font-weight-bold text-dark ml-4" style="text-transform:uppercase;font-size:50px;">Safeway Junior School</span>
                        </a>
                    </div>
                    <div class="mb-1" style="font-weight:bold; text-transform:uppercase;font-size:36px;">Kawempe- TTula</div>
                    <div class="mb-1" style="font-weight:bold; text-transform:uppercase;font-size:20px;">0772-380547 | 0702-932992</div>
                    <div style="box-shadow: 0 0 0 1px #8897AA inset; font-weight:bold;">TERMLY REPORT</div>
                </div>
            </div>
            <hr class="mb-4">
            <div class="row">
                <div class="col-sm-4 mb-4">
                    <div class="font-weight-bold mb-2">Name:....................................</div>
                </div>
                <div class="col-sm-4 mb-4">
                    <div class="font-weight-bold mb-2">Class:....................................</div>
                </div>
                <div class="col-sm-4 mb-4">
                    <div class="font-weight-bold mb-2">Term:......................................</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 mb-4">
                    <div class="font-weight-bold mb-2">Age:....................................</div>
                </div>
                <div class="col-sm-4 mb-4">
                    <div class="font-weight-bold mb-2">Sex:....................................</div>
                </div>
                <div class="col-sm-4 mb-4">
                    <div class="font-weight-bold mb-2">Date:......................................</div>
                </div>
            </div>
            <div class="table-responsive mb-4">
            <div class="font-weight-bold text-center">MID TERM</div>
                <table class="table m-0 table-bordered">
                    <thead>
                        <tr>
                            <th class="py-3">
                                Subject
                            </th>
                            <th class="py-3">
                                ENGLISH
                            </th>
                            <th class="py-3">
                                SOCIAL STUDIES 
                            </th>
                            <th class="py-3">
                                SCIENCE
                            </th>
                            <th class="py-3">
                                MATHEMATICS
                            </th>
                            <th class="py-3">
                                TOTAL
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-3">
                                MARKS
                            </td>
                            <td class="py-3">
                            </td>
                            <td class="py-3">
                            </td>
                            <td class="py-3">
                            </td>
                            <td class="py-3">
                            </td>
                            <td class="py-3">
                            </td>
                        </tr>
                        <tr>
                            <td class="py-3">
                                AGG.
                            </td>
                            <td class="py-3">
                            </td>
                            <td class="py-3">
                            </td>
                            <td class="py-3">
                            </td>
                            <td class="py-3">
                            </td>
                            <td class="py-3">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="table-responsive mb-4">
            <div class="font-weight-bold text-center">END OF TERM</div>
                <table class="table m-0 table-bordered">
                    <thead>
                        <tr>
                            <th class="py-3">
                                SUBJECT
                            </th>
                            <th class="py-3">
                                MARKS %
                            </th>
                            <th class="py-3">
                                AGG.
                            </th>
                            <th class="py-3">
                                REMARKS
                            </th>
                            <th class="py-3">
                                INITIALS
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-3">
                                ENGLISH
                            </td>
                            <td class="py-3">
                            </td>
                            <td class="py-3">
                            </td>
                            <td class="py-3">
                            </td>
                            <td class="py-3">
                            </td>
                        </tr>
                        <tr>
                            <td class="py-3">
                                SOCIAL STUDIES
                            </td>
                            <td class="py-3">
                            </td>
                            <td class="py-3">
                            </td>
                            <td class="py-3">
                            </td>
                            <td class="py-3">
                            </td>
                        </tr>
                        <tr>
                            <td class="py-3">
                                SCIENCE
                            </td>
                            <td class="py-3">
                            </td>
                            <td class="py-3">
                            </td>
                            <td class="py-3">
                            </td>
                            <td class="py-3">
                            </td>
                        </tr>
                        <tr>
                            <td class="py-3">
                                MATHEMATICS
                            </td>
                            <td class="py-3">
                            </td>
                            <td class="py-3">
                            </td>
                            <td class="py-3">
                            </td>
                            <td class="py-3">
                            </td>
                        </tr>
                        <tr>
                            <td class="py-3">
                                TOTAL
                            </td>
                            <td class="py-3">
                            </td>
                            <td class="py-3">
                            </td>
                            <td class="py-3">
                            </td>
                            <td class="py-3">
                            </td>
                        </tr>
                        <tr>
                            <td class="py-3">
                                AVERAGE
                            </td>
                            <td class="py-3">
                            </td>
                            <td class="py-3">
                            </td>
                            <td class="py-3">
                            </td>
                            <td class="py-3">
                            </td>
                        </tr>
                        <tr>
                            <td class="py-3">
                                DIVISION
                            </td>
                            <td class="py-3">
                            </td>
                            <td class="py-3">
                            </td>
                            <td class="py-3">
                            </td>
                            <td class="py-3">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <hr class="mb-4">
            <div class="row">
                <div class="col-sm-6 mb-4">
                    <div class="font-weight-bold mb-2">Position:.............................................................................................</div>
                </div>
                <div class="col-sm-6 mb-4">
                    <div class="font-weight-bold mb-2">Out of:................................................................................................</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 mb-4">
                    <div class="font-weight-bold mb-2">Class Teacher's Report:...................................................................................................</div>
                </div>
                <div class="col-sm-4 mb-4">
                    <div class="font-weight-bold mb-2">Sign:............................................................</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 mb-4">
                    <div class="font-weight-bold mb-2">Head Teacher's Report:.....................................................................................................</div>
                </div>
                <div class="col-sm-4 mb-4">
                    <div class="font-weight-bold mb-2">Sign:............................................................</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-4">
                    <div class="font-weight-bold mb-2">Next Term Begins On:...............................................................</div>
                </div>
                <div class="col-sm-6 mb-4">
                    <div class="font-weight-bold mb-2">School Pay Code:..............................................................................</div>
                </div>
            </div>
            <div class="text-center" style="font-weight:bold; font-size:20px;font-family: "Times New Roman", Times, serif;">
                <strong>'Aim at excellence'</strong> 
            </div>
        </div>
    <!-- / Content -->

    <!-- Core scripts -->
    @include('layouts.javascript')
    <script>
        // -------------------------------------------------------------------------
        // Print on window load

        $(function() {
            window.print();
        });
    </script>
</body>

</html>
