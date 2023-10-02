<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header">Update Library information</h6>
        <div class="card-body">
            <form wire:submit.prevent="updateLibrary">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Subject</label>
                            <select class="custom-select" wire:model="subject_id">
                                @foreach ($subjects as $subject )
                                    <option value="{{$subject->id}}">&nbsp; &nbsp;{{$subject->subject}}</option>
                                @endforeach
                            </select>
                        @error('subject_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Class</label>
                            <select class="custom-select" wire:model="class_id">
                                @foreach ($classes as $class )
                                    <option value="{{$class->id}}">&nbsp; &nbsp;{{$class->level}}</option>
                                @endforeach
                            </select>
                        @error('class_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Title of Book</label>
                        <input type="text" class="form-control" wire:model="title" placeholder="">
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Date of Receiving Book</label>
                            <input type="text" class="form-control" wire:model="date_of_entry" placeholder="">
                        @error('date_of_entry') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Number of Books</label>
                        <input type="number" class="form-control" wire:model="number_of_books" placeholder="">
                        @error('number_of_books') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Status</label>
                            <select class="custom-select" wire:model="status">
                            <option>--select Status--</option>
                                    <option value="available"> &nbsp; &nbsp;Available</option>
                                    <option value="borrowed"> &nbsp; &nbsp;Borrowed</option>
                                    <option value="out_of_stock"> &nbsp; &nbsp;Out Of Stock</option>
                            </select>
                        @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <div wire:loading wire:target="updateLibrary" class="text-success">Wait We are Saving Your Data...</div>
                </div>
            </form>
        </div>
    </div>
</div>
