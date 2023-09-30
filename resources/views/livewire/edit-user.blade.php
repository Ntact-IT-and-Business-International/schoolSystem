<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header">Update User Information</h6>
        <div class="card-body">
            <form wire:submit.prevent="updateUser">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">User Type</label>
                            <select class="custom-select" wire:model="user_type">
                                @foreach ($user_types as $type )
                                    <option value="{{$type->id}}">&nbsp; &nbsp;{{$type->category}}</option>
                                @endforeach
                            </select>
                        @error('user_type') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" wire:model="name" placeholder="">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" wire:model="email" placeholder="">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <div wire:loading wire:target="updateUser" class="text-success">Wait We are Saving Your Data...</div>
                </div>
            </form>
        </div>
    </div>
</div>
