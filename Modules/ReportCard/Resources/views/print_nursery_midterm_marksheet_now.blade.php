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
        .text-danger{
            color:red;
        }
        .borderimg {
        border: 10px solid transparent;
        padding: 15px;
        -webkit-border-image: url(safeway.jpg) 30 round; /* Safari 3.1-5 */
        -o-border-image: url(safeway.jpg) 30 round; /* Opera 11-12.1 */
        border-image: url(/safeway.jpg) 30 round;
        }
    </style>
        <div class="invoice-print p-2">
        <div class="row">
        <div class="col-sm-12">
        <div class="row">
                <div class="col-sm-12 pb-4 text-center">
                    <div class="media align-items-center mb-1">
                        <a href="!#" class="navbar-brand app-brand demo py-0 mr-4">
                            <span class="app-brand-logo demo">
                                <img src="{{ asset('safeway.jpg')}}" style="width:100px;height:100px;" alt="Brand Logo" class="img-fluid">
                            </span>
                            <span class="app-brand-text demo font-weight-bold text-dark ml-4" style="text-transform:uppercase;font-size:40px;">Safeway Junior School</span>
                        </a>
                    </div>
                    <div class="mb-1" style="font-weight:bold; text-transform:uppercase;font-size:25px;">Kawempe- TTula</div>
                    <div class="mb-1" style="font-weight:bold; text-transform:uppercase;font-size:20px;">0772-380547 | 0702-932992</div>
                    
                    @foreach($student_report_details as $result)
                    <div style="box-shadow: 0 0 0 1px #8897AA inset; font-weight:bold;"><u>EXAMINATIONS MARKSHEET TERM {{$result->term}} {{date('Y')}}</u></div>
                    @endforeach
                    
                </div>
            </div>
            <div class="">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="report-table" class="clients-table table table-hover table-bordered m-0"><thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>LEARNING AREA 1 <br><span class="font-weight-bold">Social Development</span></th>
                                    <th>LEARNING AREA 2  <br><span class="font-weight-bold">English</span></th>
                                    <th>LEARNING AREA 3  <br><span class="font-weight-bold">Health Habit</span></th>
                                    <th>LEARNING AREA 4  <br><span class="font-weight-bold">Maths Concept</span></th>
                                    <th>TOTAL</th>
                                    <th>GRADE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($student_report_details as $i=> $result)
                                @php

                                $la1 =\Modules\ReportCard\Entities\Result::where('student_id',$result->student_id)->where('term',$result->term)->where('subject_id',7)->whereYear('created_at', '=', \Carbon\Carbon::today())->value('assessment_marks');

                                $la2 =\Modules\ReportCard\Entities\Result::where('student_id',$result->student_id)->where('term',$result->term)->where('subject_id',8)->whereYear('created_at', '=', \Carbon\Carbon::today())->value('assessment_marks');

                                $la3 =\Modules\ReportCard\Entities\Result::where('student_id',$result->student_id)->where('term',$result->term)->where('subject_id',9)->whereYear('created_at', '=', \Carbon\Carbon::today())->value('assessment_marks');

                                $la4 =\Modules\ReportCard\Entities\Result::where('student_id',$result->student_id)->where('term',$result->term)->where('subject_id',10)->whereYear('created_at', '=', \Carbon\Carbon::today())->value('assessment_marks');

                                $grade =\Modules\ReportCard\Entities\Result::where('student_id',$result->student_id)->where('term',$result->term)->whereYear('created_at', '=', \Carbon\Carbon::today())->get();
                                $total_marks =\Modules\ReportCard\Entities\Result::where('student_id',$result->student_id)->where('term',$result->term)->whereYear('created_at', '=', \Carbon\Carbon::today())->sum('assessment_marks');
                                $total_aggregate =\Modules\ReportCard\Entities\Result::where('student_id',$result->student_id)->where('term',$result->term)->whereYear('created_at', '=', \Carbon\Carbon::today())->sum('grade');

                                $mathematic_with_nine =\Modules\ReportCard\Entities\Result::join('subjects','subjects.id','results.subject_id')->where('student_id',$result->student_id)->where('term',$result->term)->whereYear('results.created_at', '=', \Carbon\Carbon::today())->where('subjects.id', 1)->where('results.grade',9)->exists();
                                $english_with_nine =\Modules\ReportCard\Entities\Result::join('subjects','subjects.id','results.subject_id')->where('student_id',$result->student_id)->where('term',$result->term)->whereYear('results.created_at', '=', \Carbon\Carbon::today())->where('subjects.id', 2)->where('results.grade',9)->exists();    
                                @endphp
                                <tr>
                                    <td class="align-middle py-3 text-center">
                                        {{$i + 1}}
                                    </td>
                                    <td class="align-middle py-3 text-center">
                                        {{$result->last_name}} {{$result->first_name}} {{$result->other_names}}
                                    </td>
                                    <td class="align-middle py-3 text-center">
                                        {{$la1}}
                                    </td>
                                    <td class="align-middle py-3 text-center">
                                        {{$la2}} 
                                    </td>
                                    <td class="align-middle py-3 text-center">
                                        {{$la3}}
                                    </td>
                                    <td class="align-middle py-3 text-center">
                                        {{$la4}}
                                    </td>
                                    <td class="align-middle py-3 text-center">
                                        <span class="font-weight-bold">{{$total_marks}}</span>
                                    </td>
                                    <td class="align-middle py-3">
                                    
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
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
    </body>
</html>