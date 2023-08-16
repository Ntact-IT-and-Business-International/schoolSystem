<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <style>
    .borderimg {
    border: 10px solid transparent;
    padding: 15px;
    -webkit-border-image: url(safeway.jpg) 30 round; /* Safari 3.1-5 */
    -o-border-image: url(safeway.jpg) 30 round; /* Opera 11-12.1 */
    border-image: url(/safeway.jpg) 30 round;
    }
    </style>
    <div class="card">
        <div class="card-body p-5 borderimg">
            <div class="row">
                <div class="col-sm-12 pb-4 text-center">
                    <div class="media align-items-center mb-1">
                        <a href="!#" class="navbar-brand app-brand demo py-0 mr-4">
                            <span class="app-brand-logo demo">
                                <img src="{{ asset('safeway.jpg')}}" style="width:100px;height:100px;" alt="Brand Logo" class="img-fluid">
                            </span>
                            <span class="app-brand-text demo font-weight-bold text-dark ml-4" style="text-transform:uppercase;font-size:40px;">Safeway Junior School</span>
                        </a>
                        @foreach($student_report_details as $detail)
                            <img style="width:100px;height:90px;" src="{{asset('storage/Student_photos/'.$detail->photo)}}">
                        @endforeach
                    </div>
                    <div class="mb-1" style="font-weight:bold; text-transform:uppercase;font-size:36px;">Kawempe- TTula</div>
                    <div class="mb-1" style="font-weight:bold; text-transform:uppercase;font-size:20px;">0772-380547 | 0702-932992</div>
                    <div style="box-shadow: 0 0 0 1px #8897AA inset; font-weight:bold;">TERMLY REPORT</div>
                </div>
            </div>
            <hr class="mb-4">
            
            @foreach($student_report_details as $detail)
            <div class="row">
                <div class="col-sm-4 mb-4">
                    <div class="font-weight-bold mb-2">Name:&nbsp; <span class="text-muted">{{$detail->last_name}} {{$detail->first_name}} {{$detail->other_names}}</span></div>
                </div>
                <div class="col-sm-4 mb-4">
                    <div class="font-weight-bold mb-2">Class:&nbsp;<span class="text-muted">{{$detail->level}}</span></div>
                </div>
                <div class="col-sm-4 mb-4">
                    <div class="font-weight-bold mb-2">Term:&nbsp;<span class="text-muted">{{$detail->term}}</span></div>
                </div>
                <div class="col-sm-4 mb-4">
                @php
                    $age=\Modules\ReportCard\Entities\Result::join('students','students.id','results.student_id')->where('student_id',$detail->student_id)->value('date_of_birth');
                    $year =\Carbon\Carbon::parse($detail->date_of_birth)->diff(\Carbon\Carbon::now())->format('%y years');
                    $today =\Carbon\Carbon::now()->format('Y-m-d');
                @endphp
                    <div class="font-weight-bold mb-2">Age: &nbsp;<span class="text-muted">{{$year}}</span></div>
                </div>
                <div class="col-sm-4 mb-4">
                    <div class="font-weight-bold mb-2">Sex: &nbsp;<span class="text-muted">{{$detail->gender}}</span></div>
                </div>
                <div class="col-sm-4 mb-4">
                    <div class="font-weight-bold mb-2">Date:&nbsp; <span class="text-muted">{{$today}}</span></div>
                </div>
            </div>
            
            @endforeach
            <div class="table-responsive mb-4">
            <div class="font-weight-bold text-center">MID TERM</div>
                <table class="table m-0 table-bordered">
                    <thead>
                        <tr>
                        <th class="py-3">
                                Subject
                            </th>
                        @foreach($student_report_cards as $card)
                            <th class="py-3">
                                {{$card->subject}}
                            </th>
                        @endforeach
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
                            @foreach($student_report_cards as $card)
                            @php
                                $total_marks =\Modules\ReportCard\Entities\Result::where('student_id',$card->student_id)->where('term',$card->term)->whereYear('created_at', '=', \Carbon\Carbon::today())->sum('assessment_marks');
                            @endphp
                            <td class="py-3">
                            {{$card->assessment_marks}}
                            </td>
                            @endforeach
                            
                            <td class="font-weight-bold">{{$total_marks}}</td>
                        </tr>
                        <tr>
                            <td class="py-3">
                                AGG.
                            </td>
                            @foreach($student_report_cards as $card)
                            @php
                                $total_assessment_grade =\Modules\ReportCard\Entities\Result::where('student_id',$card->student_id)->where('term',$card->term)->whereYear('created_at', '=', \Carbon\Carbon::today())->sum('assessment_grade');
                            @endphp
                            <td class="py-3 font-weight-bold" style="color:red;">
                            {{$card->assessment_grade}}
                            </td>
                            @endforeach
                            <td class="font-weight-bold text-danger">{{$total_assessment_grade}}</td>
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
                    
                        @foreach($student_report_cards as $card)
                        <tr>
                            <td class="py-3">
                                {{$card->subject}}
                            </td>
                            <td class="py-3">
                            {{$card->examination_marks}}
                            </td>
                            <td class="py-3 font-weight-bold text-danger">
                            {{$card->grade}}
                            </td>
                            <td class="py-3" style="text-transform:capitalize;">
                            {{$card->remark}}
                            </td>
                            <td class="py-3">
                            {{$card->teacher_initials}}
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            
                            <td class="py-3">
                                AVERAGE
                            </td>
                            @foreach($student_report_cards as $card)
                            @php
                                $grade =\Modules\ReportCard\Entities\Result::where('student_id',$card->student_id)->where('term',$card->term)->whereYear('created_at', '=', \Carbon\Carbon::today())->get();
                                $total_exam_marks =\Modules\ReportCard\Entities\Result::where('student_id',$card->student_id)->where('term',$card->term)->whereYear('created_at', '=', \Carbon\Carbon::today())->sum('examination_marks');
                                $total_aggregate =\Modules\ReportCard\Entities\Result::where('student_id',$card->student_id)->where('term',$card->term)->whereYear('created_at', '=', \Carbon\Carbon::today())->sum('grade');
                                $mathematic_with_nine =\Modules\ReportCard\Entities\Result::join('subjects','subjects.id','results.subject_id')->where('student_id',$card->student_id)->where('term',$card->term)->whereYear('results.created_at', '=', \Carbon\Carbon::today())->where('subjects.id', 1)->where('results.grade',9)->exists();
                                $english_with_nine =\Modules\ReportCard\Entities\Result::join('subjects','subjects.id','results.subject_id')->where('student_id',$card->student_id)->where('term',$card->term)->whereYear('results.created_at', '=', \Carbon\Carbon::today())->where('subjects.id', 2)->where('results.grade',9)->exists();                        
                                @endphp
                            @endforeach
                            <td class="py-3 font-weight-bold">
                            {{$total_exam_marks}}
                            </td>
                            <td class="py-3 font-weight-bold text-info">
                            {{$total_aggregate}}
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
                            <td class="py-3 font-weight-bold">
                            @if($card->grade !== null)
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
                                    @case($total_aggregate > 12 && $total_aggregate < 25 || ($total_aggregate > 24 && $total_aggregate < 31 && ($mathematic_with_nine || $english_with_nine)))
                                        III
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
                    @foreach($student_report_details as $detail)
                    <div class="font-weight-bold mb-2">School Pay Code: {{$detail->fees_pay_code}}</div>
                    @endforeach
                </div>
            </div>
            <div class="text-center" style="font-weight:bold; font-size:20px;font-family: "Times New Roman", Times, serif;">
                <strong>'Aim at excellence'</strong> 
            </div>
        </div>
        <div class="card-footer text-center">
            @foreach($student_report_details as $detail)
            <a href="/reportcard/print-report-card-now/{{$detail->student_id}}/{{$detail->term}}" target="_blank" class="btn btn-success"><i class="ion ion-md-print"></i>&nbsp; Print</a>
            @endforeach
        </div>
    </div>
</div>
