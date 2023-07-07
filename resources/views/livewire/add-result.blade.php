<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header">Add Student Results</h6>
        <div class="card-body">
            <form wire:submit.prevent="submit">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Name of Student</label>
                            <select class="custom-select" wire:model="student_id">
                                <option>Choose Student</option> 
                                <option class="font-weight-bold underline">&nbsp;&nbsp;All Primary Six Pupils</option>
                                @foreach ($students as $student )
                                    <option  value="{{$student->id}}">&nbsp;&nbsp;{{$student->last_name}} {{$student->first_name}} {{$student->other_names}}</option>
                                @endforeach
                                <option class="font-weight-bold ml-5"> &nbsp;&nbsp;All Primary Seven Pupils</option>
                                    @foreach ($p7_students as $p7pupil )
                                        <option value="{{$p7pupil->id}}"> &nbsp;&nbsp;{{$p7pupil->last_name}} {{$p7pupil->first_name}} {{$p7pupil->other_names}}</option>
                                    @endforeach
                                <option class="font-weight-bold ml-5"> &nbsp;&nbsp;All Nursery Top Pupils</option>
                                @foreach ($top_students as $top )
                                    <option value="{{$top->id}}"> &nbsp;&nbsp;{{$top->last_name}} {{$top->first_name}} {{$top->other_names}}</option>
                                @endforeach
                            </select>
                        @error('student_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Class</label>
                            <select class="custom-select" wire:model="class_id">
                                <option>Select A Class</option>
                                @foreach ($classes as $class )
                                    <option value="{{$class->id}}">&nbsp;&nbsp;{{$class->level}}</option>
                                @endforeach
                            </select>
                        @error('class_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Subject</label>
                            <select class="custom-select" wire:model="subject_id">
                                <option>Select Subject</option>
                                @foreach ($subjects as $subject )
                                    <option value="{{$subject->id}}">&nbsp;&nbsp;{{$subject->subject}}</option>
                                @endforeach
                            </select>
                        @error('subject_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Term</label>
                            <select class="custom-select" wire:model="term">
                                    <option>Choose Term</option>
                                    <option value="1"> &nbsp;&nbsp;Term 1</option>
                                    <option value="2"> &nbsp;&nbsp;Term 2</option>
                                    <option value="3"> &nbsp;&nbsp;Term 3</option>
                            </select>
                        @error('term') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Assessment Marks</label>
                        <input type="text" class="form-control" wire:model="assessment_marks" placeholder="">
                        @error('assessment_marks') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Assessment Grade</label>
                        <input type="text" class="form-control" wire:model="assessment_grade" placeholder="">
                        @error('assessment_grade') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                        <label class="form-label">Examination Marks</label>
                        <input type="text" class="form-control" wire:model="examination_marks" placeholder="">
                        @error('examination_marks') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Examination Grade</label>
                        <input type="text" class="form-control" wire:model="grade" placeholder="">
                        @error('grade') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Teachers Initials</label>
                        <input type="text" class="form-control" wire:model="teacher_initials" placeholder="">
                        @error('teacher_initials') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Remarks</label>
                        <input type="text" class="form-control" wire:model="remark" placeholder="">
                        @error('remark') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <div wire:loading wire:target="submit" class="text-success">Wait We are Saving Your Data...</div>
                </div>
            </form>
        </div>
    </div>
</div>
