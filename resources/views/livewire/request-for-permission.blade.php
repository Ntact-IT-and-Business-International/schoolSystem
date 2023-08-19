<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header">Request For Permission</h6>
        <div class="card-body">
            <form wire:submit.prevent="submit"> 
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="form-label">Student</label>
                            <select class="custom-select" wire:model="student_id">
                                <option value="Null"> &nbsp;&nbsp;Null</option>
                                @foreach($students as $student)
                                    <option value="{{$student->id}}"> &nbsp;&nbsp;{{$student->last_name}} {{$student->first_name}} {{$student->other_names}}</option>
                                @endforeach
                            </select>
                        @error('student_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-4">
                    <label class="form-label">Staff</label>
                            <select class="custom-select" wire:model="staff_id">
                                <option value="Null">&nbsp;&nbsp;Null</option>
                                @foreach($staffs as $staff)
                                    <option value="{{$staff->id}}"> &nbsp;&nbsp;{{$staff->staff_last_name}} {{$staff->staff_first_name}}  {{$staff->staff_other_names}}</option>
                                @endforeach
                            </select>
                        @error('staff_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label">Category</label>
                            <select class="custom-select" wire:model="user_type">
                                <option value="Null">&nbsp;&nbsp;Null</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"> &nbsp;&nbsp;{{$category->category}}</option>
                                @endforeach
                            </select>
                        @error('user_type') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Class (Optional for Only Non-teaching)</label>
                            <select class="custom-select" wire:model="class_id">
                                <option value="Null">&nbsp;&nbsp;Null</option>
                                @foreach($classes as $class)
                                    <option value="{{$class->id}}"> &nbsp;&nbsp;{{$class->level}}</option>
                                @endforeach
                            </select>
                        @error('class_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Destination</label>
                            <input type="text" class="form-control" wire:model="destination" placeholder="">
                        @error('destination') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row"> 
                    <div class="form-group col-md-12">
                        <label class="form-label">Reason </label>
                        <textarea type="text" class="form-control" rows="" wire:model="reason" placeholder=""></textarea>
                        @error('reason') <span class="text-danger">{{ $message }}</span> @enderror
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
