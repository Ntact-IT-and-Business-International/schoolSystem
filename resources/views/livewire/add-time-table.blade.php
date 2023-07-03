<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header">Add TimeTable Information</h6>
        <div class="card-body">
            <form wire:submit.prevent="submit">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Class</label>
                        <select class="custom-select" wire:model="class_id">
                        @foreach ($classes as $class )
                            <option value="{{$class->id}}">{{$class->level}}</option>
                        @endforeach
                        </select>
                        @error('class_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Subject</label>
                        <select class="custom-select" wire:model="subject_id">
                            @foreach ($subjects as $subject )
                                <option value="{{$subject->id}}">{{$subject->subject}}</option>
                            @endforeach
                        </select>
                        @error('subject_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Teacher</label>
                        <select class="custom-select" wire:model="staff_id">
                            @foreach ($teachers as $teacher )
                                <option value="{{$teacher->id}}">{{$teacher->staff_first_name}} {{$teacher->staff_last_name}} {{$teacher->staff_other_names}}</option>
                            @endforeach
                        </select>
                        @error('staff_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div> 
                    <div class="form-group col-md-3">
                        <label class="form-label">Starting Time</label>
                        <input type="time"  class="form-control" wire:model="starting_time" placeholder="Time">
                        @error('starting_time') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label class="form-label">Ending Time</label>
                        <input type="time"  class="form-control" wire:model="end_time" placeholder="Time">
                        @error('end_time') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Day of The Week</label>
                        <select class="custom-select" wire:model="day">
                                <option value="Mon">Monday</option>
                                <option value="Tue">Tuesday</option>
                                <option value="Wed">Wednesday</option>
                                <option value="Thur">Thursday</option>
                                <option value="Fri">Friday</option>
                                <option value="Sat">Saturday</option>
                                <option value="Sun">Sunday</option>
                        </select>
                        @error('day') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Remark</label>
                        <textarea type="text" class="form-control" wire:model="title" placeholder="Title"></textarea>
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
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
