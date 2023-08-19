<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header">Add Team</h6>
        <div class="card-body">
            <form wire:submit.prevent="submit">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Name of Team</label>
                            <select class="custom-select" wire:model="staff_id">
                                @foreach ($staffs as $staff )
                                    <option value="{{$staff->id}}"> &nbsp;&nbsp;{{$staff->name}}</option>
                                @endforeach
                            </select>
                        @error('staff_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" wire:model="title" placeholder="">
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Contact</label>
                        <input type="text" class="form-control" wire:model="contact" placeholder="">
                        @error('contact') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Photo</label>
                            <input type="file" class="form-control" wire:model="photo" placeholder="">
                        @error('photo') <span class="text-danger">{{ $message }}</span> @enderror
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
