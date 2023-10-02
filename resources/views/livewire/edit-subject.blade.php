<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header">Update Subject</h6>
        <div class="card-body">
            <form wire:submit.prevent="updateSubject">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="form-label">Subject</label>
                        <input type="text" class="form-control" wire:model="subject" placeholder="">
                        @error('subject') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <div wire:loading wire:target="updateSubject" class="text-success">Wait We are Saving Your Data...</div>
                </div>
            </form>
        </div>
    </div>
</div>
