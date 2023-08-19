<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header">Update Pupils Permission</h6>
        <div class="card-body">
            <form wire:submit.prevent="updatePupilsPermission">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Enter Destination</label>
                        <input type="text" class="form-control" wire:model="destination" placeholder="">
                        @error('destination') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Reason</label>
                            <input type="text" class="form-control" wire:model="reason" placeholder="">
                        @error('reason') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <div wire:loading wire:target="updatePupilsPermission" class="text-success">Wait We are Saving Your Data...</div>
                </div>
            </form>
        </div>
    </div>
</div>
