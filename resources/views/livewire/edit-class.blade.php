<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header">Update Class</h6>
        <div class="card-body">
            <form wire:submit.prevent="updateClass">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="form-label">Class</label>
                        <input type="text" class="form-control" wire:model="level" placeholder="">
                        @error('level') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <div wire:loading wire:target="updateClass" class="text-success">Wait We are Saving Your Data...</div>
                </div>
            </form>
        </div>
    </div>
</div>
