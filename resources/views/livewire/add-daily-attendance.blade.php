<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header">Add Daily Attendance</h6>
        <div class="card-body">
            <form wire:submit.prevent="submit"> 
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Class</label>
                            <select class="custom-select" wire:model="class_id">
                                @foreach($classes as $class)
                                    <option value="{{$class->id}}">{{$class->level}}</option>
                                @endforeach
                            </select>
                        @error('class_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Boys</label>
                        <input type="number" class="form-control" wire:model="boys" placeholder="">
                        @error('boys') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Term</label>
                            <select class="custom-select" wire:model="term">
                                    <option value="1">Term 1</option>
                                    <option value="2">Term 2</option>
                                    <option value="3">Term 3</option>
                            </select>
                        @error('term') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Girls</label>
                            <input type="text" class="form-control" wire:model="girls" placeholder="">
                        @error('girls') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row"> 
                    <div class="form-group col-md-12">
                        <label class="form-label">Date</label>
                            <input type="date" class="form-control" wire:model="date" placeholder="">
                        @error('date') <span class="text-danger">{{ $message }}</span> @enderror
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
