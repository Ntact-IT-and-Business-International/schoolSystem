<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="row">
        <div class="col-sm-12">
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
