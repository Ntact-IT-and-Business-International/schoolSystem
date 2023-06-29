<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header">Add Class</h6>
        <div class="card-body">
            <form wire:submit.prevent="submit">
                <div class="form-row">
                        <label class="form-label">Class</label>
                        <input type="text" class="form-control" wire:model="level" placeholder="Enter Class">
                        @error('level') <span class="text-danger">{{ $message }}</span> @enderror
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
