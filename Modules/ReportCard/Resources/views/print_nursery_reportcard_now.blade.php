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
    </style>
        <div class="invoice-print p-2">
            <div class="row">
                <div class="col-sm-12 pb-4 text-center">
                    <div class="media align-items-center mb-1">
                        <a href="!#" class="navbar-brand app-brand demo py-0 mr-4">
                            <span class="app-brand-logo demo">
                                <img src="{{ asset('11.png')}}" style="width:120px;height:70px;" alt="Brand Logo" class="img-fluid">
                            </span>
                            <span class="app-brand-text demo font-weight-bold text-dark ml-4" style="text-transform:uppercase;font-size:40px;">Safeway Junior School</span>
                        </a>
                        @foreach($student_report_details as $detail)
                            <img style="width:100px;height:80px;" src="{{asset('storage/Student_photos/'.$detail->photo)}}">
                        @endforeach
                    </div>
                    <div class="mb-1" style="font-weight:bold; text-transform:uppercase;font-size:36px;">Kawempe- TTula</div>
                    <div class="mb-1" style="font-weight:bold; text-transform:uppercase;font-size:20px;">0772-380547 | 0702-932992</div>
                    <div style="box-shadow: 0 0 0 1px #8897AA inset; font-weight:bold;">NURSERY TERMLY REPORT</div>
                </div>
            </div>
            @foreach($student_report_details as $detail)
            <div class="row">
                <div class="col-sm-4 mb-3">
                    <div class="font-weight-bold mb-2">Name:&nbsp;<span class="text-muted">{{$detail->last_name}} {{$detail->first_name}} {{$detail->other_names}}</span></div>
                </div>
                <div class="col-sm-4 mb-3">
                    <div class="font-weight-bold mb-2">Class:&nbsp;<span class="text-muted">{{$detail->level}}</span></div>
                </div>
                <div class="col-sm-4 mb-3">
                    <div class="font-weight-bold mb-2">Term:&nbsp;<span class="text-muted">{{$detail->term}}</span></div>
                </div>
                <div class="col-sm-4 mb-3">
                @php
                    $age=\Modules\ReportCard\Entities\Result::join('students','students.id','results.student_id')->where('student_id',$detail->student_id)->value('date_of_birth');
                    $year =\Carbon\Carbon::parse($detail->date_of_birth)->diff(\Carbon\Carbon::now())->format('%y years');
                    $today =\Carbon\Carbon::now()->format('Y-m-d');
                @endphp
                    <div class="font-weight-bold mb-2">Age: &nbsp;<span class="text-muted">{{$year}}</span></div>
                </div>
                <div class="col-sm-4 mb-3">
                    <div class="font-weight-bold mb-2">Sex: &nbsp;<span class="text-muted">{{$detail->gender}}</span></div>
                </div>
                <div class="col-sm-4 mb-3">
                    <div class="font-weight-bold mb-2">Date:&nbsp; <span class="text-muted">{{$today}}</span></div>
                </div>
            </div>
            
            @endforeach
            <div class="table-responsive mb-4">
            <div class="font-weight-bold text-center">MID TERM</div>
                <table class="table m-0 table-bordered">
                    <thead>
                        <tr>
                        <th class="py-2">
                                LEARNING AREA (CODE)
                            </th>
                        @foreach($student_report_cards as $card)
                            <th class="py-2">
                                {{$card->subject}}
                            </th>
                        @endforeach
                        <th class="py-2">
                            TOTAL
                        </th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-2">
                                MARKS
                            </td>
                            @foreach($student_report_cards as $card)
                            @php
                                $total_marks =\Modules\ReportCard\Entities\Result::where('student_id',$card->student_id)->whereYear('created_at', '=', \Carbon\Carbon::today())->sum('assessment_marks');
                            @endphp
                            <td class="py-2">
                            {{$card->assessment_marks}}
                            </td>
                            @endforeach
                            
                            <td class="font-weight-bold">{{$total_marks}}</td>
                        </tr>
                        <tr>
                            <td class="py-2">
                                GRADE
                            </td>
                            <td rowspan="4"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="table-responsive mb-4">
            <div class="table-responsive mb-4">
            <div class="font-weight-bold text-center">END OF TERM EXAM</div>
                <table class="table m-0 table-bordered">
                    <thead>
                        <tr>
                            <th class="py-2">
                                LEARNING AREA (CODE)
                            </th>
                            <th class="py-2">
                                SCORE
                            </th>
                            <th class="py-2">
                                OUT OF
                            </th>
                            <th class="py-2">
                                REMARKS
                            </th>
                            <th class="py-2">
                                INITIALS
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        @foreach($student_report_cards as $card)
                        <tr>
                            <td class="py-2">
                                {{$card->subject}}
                            </td>
                            <td class="py-2">
                            {{$card->examination_marks}}
                            </td>
                            <td class="py-3 text-danger font-weight-bold">
                            100
                            </td>
                            <td class="py-2" style="text-transform:capitalize;">
                            {{$card->remark}}
                            </td>
                            <td class="py-2">
                            {{$card->teacher_initials}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="table-responsive mb-4">
            <div class="table-responsive mb-4">
                <table class="table m-0 table-bordered">
                    <thead>
                        <tr>
                            <th class="py-2 font-weight-bold">
                                PERSONAL ASSESSMENT
                            </th>
                            <th class="py-2 font-weight-bold">
                                GRADE
                            </th>
                            <th class="py-2 font-weight-bold">
                                PERSONAL ASSESSMENT
                            </th>
                            <th class="py-2 font-weight-bold">
                                GRADE
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        <tr>
                            <td class="py-2">
                                DISCIPLINE
                            </td>
                            <td class="py-2">
                            
                            </td>
                            <td class="py-2">
                                SMARTNESS
                            </td>
                            <td class="py-2">
                            
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2">
                                ATTENDANCE
                            </td>
                            <td class="py-2">
                            
                            </td>
                            <td class="py-2">
                                ENGLISH
                            </td>
                            <td class="py-2">
                            
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2">
                                INVOLVEMENT
                            </td>
                            <td class="py-2">
                            
                            </td>
                            <td class="py-2">
                                CO-OPERATION
                            </td>
                            <td class="py-2">
                            
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2">
                                TIME MANAGEMENT
                            </td>
                            <td class="py-2">
                            
                            </td>
                            <td class="py-2">
                                CLEANLINESS
                            </td>
                            <td class="py-2">
                            
                            </td>
                        </tr>
                        <tr class="font-weight-bold" rowspan="4">
                            <td class="py-2">
                                A-EXCELLENCE
                            </td>
                            <td class="py-2">
                                B-GOOD
                            </td>
                            <td class="py-2">
                                C-FAIR
                            </td>
                            <td class="py-2">
                                D-NEEDS IMPROVEMENT
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-2">
                    <div class="font-weight-bold mb-2">GRADE:.............................................................................................</div>
                </div>
                <div class="col-sm-6 mb-2">
                    <div class="font-weight-bold mb-2">OUT OF :................................................................................................</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 mb-2">
                    <div class="font-weight-bold mb-2">Class Teacher's Report:...................................................................................................</div>
                </div>
                <div class="col-sm-4 mb-2">
                    <div class="font-weight-bold mb-2">Sign:............................................................</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 mb-2">
                    <div class="font-weight-bold mb-2">Head Teacher's Report:.....................................................................................................</div>
                </div>
                <div class="col-sm-4 mb-2">
                    <div class="font-weight-bold mb-2">Sign:............................................................</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-2">
                    <div class="font-weight-bold mb-2">Next Term Begins On:...............................................................</div>
                </div>
                <div class="col-sm-6 mb-2">
                    <div class="font-weight-bold mb-2">School Pay Code:..............................................................................</div>
                </div>
            </div>
            <div class="text-center" style="font-weight:bold; font-size:20px;font-family: "Times New Roman", Times, serif;">
                <strong>'Aim at excellence'</strong> 
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