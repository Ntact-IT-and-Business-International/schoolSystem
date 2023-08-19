<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header">Add Nurse Records</h6>
        <div class="card-body">
            <form wire:submit.prevent="submit">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="form-label">Name of Subject</label>
                            <select class="custom-select" wire:model="student_id">
                                @foreach ($students as $student )
                                    <option value="{{$student->id}}">&nbsp;&nbsp;{{$student->last_name}} {{$student->first_name}} {{$student->other_names}}</option>
                                @endforeach
                            </select>
                        @error('student_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label">Class</label>
                        <select class="custom-select" wire:model="class_id">
                                @foreach ($classes as $class )
                                    <option value="{{$class->id}}">&nbsp;&nbsp;{{$class->level}}</option>
                                @endforeach
                            </select>
                        @error('class_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label">Comment</label>
                        <input type="text" class="form-control" wire:model="comment" placeholder="">
                        @error('comment') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Sickness</label>
                        <input type="text" class="form-control" wire:model="sickness" placeholder="">
                        @error('sickness') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Medicine</label>
                        <input type="text" class="form-control" wire:model="medicine" placeholder="">
                        @error('medicine') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="form-label">Prescription</label>
                            <input type="text" class="form-control" wire:model="prescription" placeholder="">
                        @error('prescription') <span class="text-danger">{{ $message }}</span> @enderror
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
