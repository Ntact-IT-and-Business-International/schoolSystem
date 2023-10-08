<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="card overflow-hidden">
        <div class="row no-gutters row-bordered row-border-light">
            <div class="col-md-3 pt-0">
                <div class="list-group list-group-flush account-settings-links">
                    <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">HeadTeacher</a>
                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-passwords">ClassTeacher</a>
                </div>
            </div>
            <div class="col-md-9">
            <div class="table-responsive mb-4">
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

                    @foreach($comments as $card)
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
                            @php
                                $total_exam_marks = 0; // Initialize the variable
                                $total_aggregate = 0;
                            @endphp
                            @foreach($comments as $card)
                            @php
                            $total_exam_marks += $card->examination_marks;
                            $total_aggregate += $card->grade;
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
                            <td class="py-3">DIVISION
                            </td>
                            <td class="py-3 font-weight-bold">
                            @if($total_aggregate !== null)
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
                    </tbody>
                </table>
            </div>
                <div class="tab-content" style="margin-top:-45px">
                    <div class="tab-pane fade show active" id="account-general">
                        <div class="card-body">
                            <form wire:submit.prevent="addHeadteachersComment">
                                <div class="form-group">
                                    <label class="form-label font-weight-bold">Heatechers' Comment</label>
                                    <select class="custom-select col-sm-12" wire:model='headteachers_comment'>
                                        <option> &nbsp; &nbsp;Good Results Keep it Up</option>
                                        <option> &nbsp; &nbsp;You are capable of Performing better than these, Just work hard next time</option>
                                    </select>
                                    <div class="clearfix"></div>
                                </div>
                                <button type="button" class="btn btn-primary">Submit Comment</button>&nbsp;
                                <div wire:loading wire:target="addHeadteachersComment" class="text-success">Wait We are Saving Your Data...</div>
                            </form>
                        </div>
                        <div class="text-right mt-3">
                    </div>
                    </div>
                    <div class="tab-pane fade" id="account-change-passwords">
                        <div class="card-body pb-2">
                        <form wire:submit.prevent="submitClassTeacherComment">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="form-label">Pupils Name</label>
                                    <input type="text" class="form-control" wire:model="student_id" placeholder="Name">
                                    @error('student_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label">Position</label>
                                    <input type="text" class="form-control" wire:model="position" placeholder="Position">
                                    @error('position') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label class="form-label">Next Term Begins</label>
                                    <input type="date" class="form-control" wire:model="next_term_begins" placeholder="LastName">
                                    @error('next_term_begins') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            <div class="form-group col-md-6">
                                    <label class="form-label">Term</label>
                                    <input type="text" class="form-control" wire:model="term" placeholder="Position">
                                    @error('term') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                            <div class="form-group">
                                <label class="form-label font-weight-bold">Add Teachers Comment</label>
                                <select class="custom-select col-sm-12" wire:model='teachers_comment'>
                                    <option value="1"> &nbsp; &nbsp;Good Results Keep it Up</option>
                                    <option value="2"> &nbsp; &nbsp;You are capable of Performing better than these, Just work hard next time</option>
                                </select>
                                <div class="clearfix"></div>
                            </div>
                            <button type="button" class="btn btn-primary">Submit Comment</button>&nbsp;
                            <div wire:loading wire:target="submitClassTeacherComment" class="text-success">Wait We are Saving Your Data...</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
