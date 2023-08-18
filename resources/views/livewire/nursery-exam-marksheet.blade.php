<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
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
                    @php
                        $term =\Modules\ReportCard\Entities\Result::where('class_id',$this->class_id)->where('term',$this->term)->whereYear('created_at', '=', \Carbon\Carbon::today())->value('term');
                    @endphp
                    <div style="box-shadow: 0 0 0 1px #8897AA inset; font-weight:bold;">EXAMINATIONS MARKSHEET TERM {{$term}} {{date('Y')}}</div>
                    
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

                                $la1 =\Modules\ReportCard\Entities\Result::where('student_id',$result->student_id)->where('term',$result->term)->where('subject_id',7)->whereYear('created_at', '=', \Carbon\Carbon::today())->value('examination_marks');

                                $la2 =\Modules\ReportCard\Entities\Result::where('student_id',$result->student_id)->where('term',$result->term)->where('subject_id',8)->whereYear('created_at', '=', \Carbon\Carbon::today())->value('examination_marks');

                                $la3 =\Modules\ReportCard\Entities\Result::where('student_id',$result->student_id)->where('term',$result->term)->where('subject_id',9)->whereYear('created_at', '=', \Carbon\Carbon::today())->value('examination_marks');

                                $la4 =\Modules\ReportCard\Entities\Result::where('student_id',$result->student_id)->where('term',$result->term)->where('subject_id',10)->whereYear('created_at', '=', \Carbon\Carbon::today())->value('examination_marks');

                                $examination_marks =\Modules\ReportCard\Entities\Result::where('student_id',$result->student_id)->where('term',$result->term)->whereYear('created_at', '=', \Carbon\Carbon::today())->get();
                                $total_marks =\Modules\ReportCard\Entities\Result::where('student_id',$result->student_id)->where('term',$result->term)->whereYear('created_at', '=', \Carbon\Carbon::today())->sum('examination_marks');
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
                                    <td></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="card-footer text-center">
                        @php
                            $class_id =\Modules\ReportCard\Entities\Result::where('class_id',$this->class_id)->get();
                        @endphp
                            <a href="/reportcard/print-marksheet-now/{{$this->class_id}}/{{$this->term}}" target="_blank" class="btn btn-success"><i class="ion ion-md-print"></i>&nbsp; Print Marksheet</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
