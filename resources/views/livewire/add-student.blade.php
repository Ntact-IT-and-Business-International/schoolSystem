<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header">Add Student</h6>
        <div class="card-body">
            <form wire:submit.prevent="submit">
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
                            <option>&nbsp;&nbsp;Choose Class</option>
                            @foreach ($classes as $class )
                                <option value="{{$class->id}}">&nbsp;&nbsp;{{$class->level}}</option>
                            @endforeach
                        </select>
                        @error('class_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">&nbsp;&nbsp;Gender</label>
                        <select class="custom-select" wire:model="gender">
                                <option>Select Gender</option>
                                <option value="M">&nbsp;&nbsp;Male</option>
                                <option value="F">&nbsp;&nbsp;Female</option>
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
                    <div class="form-group col-md-4">
                        <label class="form-label">Home Location</label>
                        <input type="text" class="form-control" wire:model="location" placeholder="">
                        @error('location') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label">Section</label>
                        <select class="custom-select" wire:model="section">
                                <option>&nbsp;&nbsp;Select Section</option>
                                <option value="Boarding">&nbsp;&nbsp;Boarding</option>
                                <option value="Day">&nbsp;&nbsp;Day</option>
                        </select>
                        @error('section') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label">Pay Code (Optional)</label>
                        <input type="text" class="form-control" wire:model="fees_pay_code" placeholder="">
                        @error('fees_pay_code') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" wire:model="password">
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" wire:model="confirm_password" placeholder="Confirm Password">
                        @error('confirm_password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="form-label">Student Photo</label>
                        <input type="file" class="form-control" wire:model="photo" placeholder="" accept=".jpg,.png,.webp">
                        <div wire:loading wire:target="photo" style="color:green;"><strong>Uploading Image, Please Wait...</strong></div>
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
