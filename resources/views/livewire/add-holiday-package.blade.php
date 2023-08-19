<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header">Add Holiday Package</h6>
        <div class="card-body">
            <form wire:submit.prevent="submit">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Class</label>
                            <select class="custom-select" wire:model="class_id">
                                    @foreach($classes as $class)
                                    <option value="{{$class->id}}">  &nbsp;&nbsp;{{$class->level}}</option>
                                    @endforeach
                            </select>
                        @error('class_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Subject</label>
                            <select class="custom-select" wire:model="subject_id">
                                    @foreach($subjects as $subject)
                                    <option value="{{$subject->id}}"> &nbsp;&nbsp;{{$subject->subject}}</option>
                                    @endforeach
                            </select>
                        @error('subject_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Term</label>
                            <select class="custom-select" wire:model="term">
                                    <option value="1"> &nbsp;&nbsp;Term 1</option>
                                    <option value="2"> &nbsp;&nbsp;Term 2</option>
                                    <option value="3"> &nbsp;&nbsp;Term 3</option>
                            </select>
                        @error('term') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Upload Holiday Package</label>
                            <input type="file" class="form-control" wire:model="package" placeholder="">
                        @error('package') <span class="text-danger">{{ $message }}</span> @enderror
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
