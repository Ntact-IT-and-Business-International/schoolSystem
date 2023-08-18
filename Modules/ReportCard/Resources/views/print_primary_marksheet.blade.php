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
                            {{-- @php
                                $term =\Modules\ReportCard\Entities\Result::where('class_id',$this->class_id)->where('term',$this->term)->whereYear('created_at', '=', \Carbon\Carbon::today())->value('term');
                            @endphp --}}
                            <div style="box-shadow: 0 0 0 1px #8897AA inset; font-weight:bold;">EXAMINATIONS MARKSHEET {{date('Y')}}</div>
                            
                        </div>
                    </div>
                    <div class="">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="report-table" class="clients-table table table-hover table-bordered m-0"><thead>
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>ENG <br><span class="font-weight-bold">Marks Grade</span></th>
                                            <th>MTC <br><span class="font-weight-bold">Marks Grade</span></th>
                                            <th>SCI <br><span class="font-weight-bold">Marks Grade</span></th>
                                            <th>SST <br><span class="font-weight-bold">Marks Grade</span></th>
                                            <th>TOTAL MKS</th>
                                            <th>AGG</th>
                                            <th>DIV</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($student_report_details as $i=> $result)
                                        @php
                                        $english_examination_marks =\Modules\ReportCard\Entities\Result::where('student_id',$result->student_id)->where('term',$result->term)->where('subject_id',2)->whereYear('created_at', '=', \Carbon\Carbon::today())->value('examination_marks');
                                        $english_examination_grade =\Modules\ReportCard\Entities\Result::where('student_id',$result->student_id)->where('term',$result->term)->where('subject_id',2)->whereYear('created_at', '=', \Carbon\Carbon::today())->value('grade');

                                        $mtc_examination_marks =\Modules\ReportCard\Entities\Result::where('student_id',$result->student_id)->where('term',$result->term)->where('subject_id',1)->whereYear('created_at', '=', \Carbon\Carbon::today())->value('examination_marks');
                                        $mtc_examination_grade =\Modules\ReportCard\Entities\Result::where('student_id',$result->student_id)->where('term',$result->term)->where('subject_id',1)->whereYear('created_at', '=', \Carbon\Carbon::today())->value('grade');

                                        $sci_examination_marks =\Modules\ReportCard\Entities\Result::where('student_id',$result->student_id)->where('term',$result->term)->where('subject_id',3)->whereYear('created_at', '=', \Carbon\Carbon::today())->value('examination_marks');
                                        $sci_examination_grade =\Modules\ReportCard\Entities\Result::where('student_id',$result->student_id)->where('term',$result->term)->where('subject_id',3)->whereYear('created_at', '=', \Carbon\Carbon::today())->value('grade');

                                        $sst_examination_marks =\Modules\ReportCard\Entities\Result::where('student_id',$result->student_id)->where('term',$result->term)->where('subject_id',4)->whereYear('created_at', '=', \Carbon\Carbon::today())->value('examination_marks');
                                        $sst_examination_grade =\Modules\ReportCard\Entities\Result::where('student_id',$result->student_id)->where('term',$result->term)->where('subject_id',4)->whereYear('created_at', '=', \Carbon\Carbon::today())->value('grade');

                                        $grade =\Modules\ReportCard\Entities\Result::where('student_id',$result->student_id)->where('term',$result->term)->whereYear('created_at', '=', \Carbon\Carbon::today())->get();
                                        $total_exam_marks =\Modules\ReportCard\Entities\Result::where('student_id',$result->student_id)->where('term',$result->term)->whereYear('created_at', '=', \Carbon\Carbon::today())->sum('examination_marks');
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
                                                {{$english_examination_marks}} <span class="text-danger font-weight-bold">{{$english_examination_grade}}</span>
                                            </td>
                                            <td class="align-middle py-3 text-center">
                                                {{$mtc_examination_marks}} <span class="text-danger font-weight-bold">{{$mtc_examination_grade}}</span>
                                            </td>
                                            <td class="align-middle py-3 text-center">
                                                {{$sci_examination_marks}} <span class="text-danger font-weight-bold">{{$sci_examination_grade}}</span>
                                            </td>
                                            <td class="align-middle py-3 text-center">
                                                {{$sst_examination_marks}} <span class="text-danger font-weight-bold">{{$sst_examination_grade}}</span>
                                            </td>
                                            <td class="align-middle py-3 text-center">
                                                <span class="font-weight-bold">{{$total_exam_marks}}</span>
                                            </td>
                                            <td class="align-middle py-3 text-center">
                                                <span class="text-danger font-weight-bold">{{$total_aggregate}}</span>
                                            </td>
                                            <td class="align-middle py-3 text-center">
                                            @if($grade !== null)
                                            @switch(true)
                                                @case($total_aggregate > 3 && $total_aggregate < 13)
                                                    @if($mathematic_with_nine == 1 || $english_with_nine == 1 ) 
                                                        II
                                                    @else
                                                        I
                                                    @endif
                                                @break
                                                @case(($total_aggregate > 3 && $total_aggregate < 13 || $total_aggregate > 12 && $total_aggregate < 25) && !($mathematic_with_nine || $english_with_nine))
                                                    II
                                                @break
                                                @case($total_aggregate > 12 && $total_aggregate < 25 || ($total_aggregate > 24 && $total_aggregate < 31 && ($mathematic_with_nine == 1|| $english_with_nine ==0)) || ($total_aggregate > 24 && $total_aggregate < 31 && ($mathematic_with_nine==0 || $english_with_nine == 1)))
                                                    III
                                                @break
                                                @case($total_aggregate > 12 && $total_aggregate < 25 || ($total_aggregate > 24 && $total_aggregate < 31 && ($mathematic_with_nine || $english_with_nine)) || ($total_aggregate > 24 && $total_aggregate < 31 && ($mathematic_with_nine ==1 || $english_with_nine==0)) || ($total_aggregate > 24 && $total_aggregate < 31 && ($mathematic_with_nine==0 || $english_with_nine==1)))
                                                    III
                                                @break
                                                @case($total_aggregate > 12 && $total_aggregate < 25 || ($total_aggregate > 24 && $total_aggregate < 31 && ($mathematic_with_nine || $english_with_nine)))
                                                    IV
                                                @break
                                                @case($total_aggregate > 24 && $total_aggregate < 31 || ($total_aggregate > 30 && $total_aggregate < 35 && ($mathematic_with_nine || $english_with_nine)) || ($total_aggregate > 30 && $total_aggregate < 35 && ($mathematic_with_nine== 1 || $english_with_nine == 0)) || ($total_aggregate > 30 && $total_aggregate < 35 && ($mathematic_with_nine == 0 || $english_with_nine== 1)))
                                                    IV
                                                @break
                                                @case($total_aggregate > 24 && $total_aggregate < 31 || ($total_aggregate > 30 && $total_aggregate < 35 && ($mathematic_with_nine || $english_with_nine)))
                                                    IV
                                                @break
                                                @default
                                                    U
                                                @endswitch 
                                                @else
                                                    X
                                                @endif 
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