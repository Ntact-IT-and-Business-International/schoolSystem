<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header font-weight-bold">Update Student Information</h6>
        <div class="card-body">
            <form wire:submit.prevent="updateStudent">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" wire:model="first_name" placeholder="First Name">
                        @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Lastname</label>
                        <input type="text" class="form-control" wire:model="last_name" placeholder="LastName">
                        @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Other Name (Opional)</label>
                        <input type="text" class="form-control" wire:model="other_names" placeholder="OtherName">
                        @error('other_names') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Class</label>
                        <select class="custom-select" wire:model="class_id">
                            @foreach ($classes as $class )
                                <option value="{{$class->id}}">{{$class->level}}</option>
                            @endforeach
                        </select>
                        @error('class_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Gender</label>
                        <select class="custom-select" wire:model="gender">
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                        </select>
                        @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" wire:model="date_of_birth" placeholder="DOB">
                        @error('date_of_birth') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Special Need</label>
                        <input type="text" class="form-control" wire:model="special_need" placeholder="e.g Lame,Sickness">
                        @error('special_need') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Name of Parent</label>
                        <input type="text" class="form-control" wire:model="parents_name" placeholder="Parents Name">
                        @error('parents_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Contact</label>
                        <input type="text" class="form-control" wire:model="contact" placeholder="e.g 075401793">
                        @error('contact') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">National Id Number</label>
                        <input type="text" class="form-control" wire:model="nin" placeholder="ID Number">
                        @error('nin') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Home Location</label>
                        <input type="text" class="form-control" wire:model="location" placeholder="">
                        @error('location') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Section</label>
                        <select class="custom-select" wire:model="section">
                                <option value="Boarding">Boarding</option>
                                <option value="Day">Day</option>
                        </select>
                        @error('section') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <div wire:loading wire:target="updateStudent" class="text-success">Wait We are Saving Your Data...</div>
                </div>
            </form>
        </div>
    </div>
</div>
