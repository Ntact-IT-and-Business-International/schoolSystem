<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header">Edit  Staff Information</h6>
        <div class="card-body">
            <form wire:submit.prevent="updateStaff">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" wire:model="staff_first_name" placeholder="First Name">
                        @error('staff_first_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Lastname</label>
                        <input type="text" class="form-control" wire:model="staff_last_name" placeholder="LastName">
                        @error('staff_last_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Other Name (Opional)</label>
                        <input type="text" class="form-control" wire:model="staff_other_names" placeholder="OtherName">
                        @error('staff_other_names') <span class="text-danger">{{ $message }}</span> @enderror
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
                        <label class="form-label">Subject (Opional)</label>
                        <select class="custom-select" wire:model="subject_id">
                            @foreach ($subjects as $subject )
                                <option value="{{$subject->id}}">{{$subject->subject}}</option>
                            @endforeach
                        </select>
                        @error('subject_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Salary</label>
                        <input type="number" class="form-control" wire:model="salary">
                        @error('salary') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Gender</label>
                        <input type="text" class="form-control" wire:model="gender" placeholder="">
                        @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Date of Birth</label>
                        <input type="text" class="form-control" wire:model="date_of_birth" placeholder="DOB">
                        @error('date_of_birth') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Email (Optional)</label>
                        <input type="email" class="form-control" wire:model="staff_email" placeholder="school@gmail.com">
                        @error('staff_email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Registration Number (Optional)</label>
                        <input type="text" class="form-control" wire:model="registration_number" placeholder="Parents Name">
                        @error('registration_number') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Phone Number</label>
                        <input type="text" class="form-control" wire:model="phone_number" placeholder="e.g 075401793">
                        @error('phone_number') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">National Id Number</label>
                        <input type="text" class="form-control" wire:model="nin" placeholder="ID Number">
                        @error('nin') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" wire:model="title" placeholder="">
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Qualification</label>
                        <select class="custom-select" wire:model="qualification">
                                <option value="Primary">Primary</option>
                                <option value="Ordinary">Ordinary</option>
                                <option value="Advanced">Advanced</option>
                                <option value="Certificate">Certificate</option>
                                <option value="Diploma">Diploma</option>
                                <option value="Degree">Degree</option>
                                <option value="PHD">PHD</option>
                        </select>
                        @error('qualification') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <div wire:loading wire:target="updateStaff" class="text-success">Wait We are Saving Your Data...</div>
                </div>
            </form>
        </div>
    </div>
</div>
