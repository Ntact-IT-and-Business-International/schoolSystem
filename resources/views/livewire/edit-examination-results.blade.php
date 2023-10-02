<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header">Update Results information</h6>
        <div class="card-body">
            <form wire:submit.prevent="updateResult">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Student Name</label>
                        <input type="text" class="form-control" wire:model="student_id" placeholder="" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Term</label>
                            <input type="text" class="form-control" wire:model="term" placeholder="">
                        @error('term') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Class</label>
                            <select class="custom-select" wire:model="class_id">
                                <option>--Choose class --</option>
                                @foreach ($classes as $class )
                                    <option value="{{$class->id}}">&nbsp; &nbsp;{{$class->level}}</option>
                                @endforeach
                            </select>
                        @error('class_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Subject</label>
                            <select class="custom-select" wire:model="subject_id">
                                <option>--Choose Subject --</option>
                                @foreach ($subjects as $subject )
                                    <option value="{{$subject->id}}">&nbsp; &nbsp;{{$subject->subject}}</option>
                                @endforeach
                            </select>
                        @error('subject_id') <span class="text-danger">{{ $message }}</span> @enderror
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
                            <input type="text" class="form-control" wire:model="grade">
                        @error('grade') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Subject Teachers Initials</label>
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
                    <div wire:loading wire:target="updateResult" class="text-success">Wait We are Saving Your Data...</div>
                </div>
            </form>
        </div>
    </div>
</div>
